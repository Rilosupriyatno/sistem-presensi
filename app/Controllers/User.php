<?php

namespace App\Controllers;

use App\Models\AkunModel;

class User extends BaseController
{
    protected $akunModel, $haModel;
    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->akunModel = new AkunModel();
    }
    public function index($id)
    {
        $data['title'] = 'MyProfile';
        $NI = $this->akunModel->select('NIP')->find($id);
        $IS = $this->akunModel->select('ISN')->find($id);
        if ($NI['NIP'] != null) {
            $this->akunModel->select('users.id as userid, NIP, user_image, username, email, name, fullname');
            $this->akunModel->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->akunModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->akunModel->where('users.id', $id);
            $query = $this->akunModel->get();
            $data['users'] = $query->getRow();
            if (empty($data['users'])) {
                return redirect()->to('/user');
            }
            return view('user/index', $data);
        } elseif ($IS['ISN'] != null) {
            $this->akunModel->select('users.id as userid, users.ISN, kelas, wali_kelas, user_image, username, email, name, fullname');
            $this->akunModel->join('data_siswa', 'data_siswa.ISN = users.ISN');
            $this->akunModel->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas');
            $this->akunModel->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->akunModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->akunModel->where('users.id', $id);
            $query = $this->akunModel->get();
            $data['users'] = $query->getRow();
            if (empty($data['users'])) {
                return redirect()->to('/user');
            }
            return view('user/index', $data);
        }
    }
    public function page()
    {
        if (in_groups('admin')) {
            return redirect()->to('admin/index');
        }
        return redirect()->to('user/index/' . user_id());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data',
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->akunModel->where('id', $id)->first()
        ];
        return view('user/edit', $data);
    }
    public function update($id)
    {
        $fileFoto = $this->request->getFile('foto');
        // Apakah tidak ada gambar yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.svg';
        } else {
            // Ambil nama file
            $namaFoto = $fileFoto->getRandomName();
            // Pindahkan gambar ke folder public
            $fileFoto->move('img', $namaFoto);
        }
        $iden = $this->request->getVar('nomor_iden');
        if (strlen($iden) >= 18) {
            $this->akunModel->save([
                'id' => $id,
                'username' => $this->request->getVar('username'),
                'fullname' => $this->request->getVar('fullname'),
                'NIP'   => $this->request->getVar('nomor_iden'),
                'user_image' => $namaFoto
            ]);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('user/index/' . user_id());
        } else if (strlen($iden) <= 9) {
            $this->akunModel->save([
                'id' => $id,
                'username' => $this->request->getVar('username'),
                'fullname' => $this->request->getVar('fullname'),
                'ISN' => $this->request->getVar('nomor_iden'),
                'user_image' => $namaFoto
            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('user/index/' . user_id());
        }
    }
}
