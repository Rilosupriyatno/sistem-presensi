<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\HistoriModel;
use App\Models\HaModel;
use App\Models\AkunModel;
use App\Models\StatusModel;
use App\Models\PsModel;
use App\Models\PgModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;

class Admin extends BaseController
{
    protected $adminModel, $historiModel, $HaModel, $akunModel, $statusModel, $psModel, $siswaModel, $kelasModel, $pgModel;
    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
        $this->adminModel = new AdminModel();
        $this->historiModel = new HistoriModel();
        $this->haModel = new HaModel();
        $this->akunModel = new AkunModel();
        $this->statusModel = new StatusModel();
        $this->psModel = new PsModel();
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
        $this->pgModel = new PgModel();
    }

    public function index()
    {
        $jumlah = $this->adminModel->data();
        $jumlah_siswa = $this->siswaModel->data_siswa();
        $data = [
            'title' => 'Dashboard',
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah' => $jumlah,
        ];
        return view('admin/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation(),
            'status' => $this->historiModel->findAll()
        ];
        return view('admin/create', $data);
    }
    public function save()
    {
        helper(['form', 'url']);
        // validasi
        if (!$this->validate([
            'NIP' => [
                'rules' => 'required|is_unique[data_staff.NIP]',
                'errors' => [
                    'required' => 'NIP harus diisi',
                    'is_unique' => 'NIP sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_staff.nama]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'alamat' => [
                'rules' => 'required[data_staff.alamat]',
                'errors' => [
                    'required' => 'tanggal harus diisi'
                ]
            ],
            'pendikte' => [
                'rules' => 'required[data_staff.pendikte]',
                'errors' => [
                    'required' => 'pendidikan terakhir harus diisi',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/admin/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/create')->withInput();
        }
        // // Ambil gambar
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
        $this->adminModel->save([
            'NIP' => $this->request->getVar('NIP'),
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'alamat' => $this->request->getVar('alamat'),
            'pendikte' => $this->request->getVar('pendikte'),
            'jenkel' => $this->request->getVar('jenkel'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/mutasi_pegawai');
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data',
            'validation' => \Config\Services::validation(),
            'staff' => $this->adminModel->where('id', $id)->first()
        ];
        return view('admin/edit', $data);
    }
    public function update($id)
    {
        $foto = $this->adminModel->find($id);
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
        $this->adminModel->save([
            'id' => $id,
            'NIP' => $this->request->getVar('NIP'),
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'alamat' => $this->request->getVar('alamat'),
            'pendikte' => $this->request->getVar('pendikte'),
            'jenkel' => $this->request->getVar('jenkel'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/daftar_staff');
    }
    public function create_siswa()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/create_siswa', $data);
    }
    public function save_siswa()
    {
        helper(['form', 'url']);
        // validasi
        if (!$this->validate([
            'ISN' => [
                'rules' => 'required|is_unique[data_siswa.ISN]',
                'errors' => [
                    'required' => 'ISN harus diisi',
                    'is_unique' => 'ISN sudah ada'
                ]
            ],
            'nama' => [
                'rules' => 'required[data_siswa.nama]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required[data_siswa.jenis_kelamin]',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi',
                ]
            ],
            'id_kelas' => [
                'rules' => 'required[data_siswa.id_kelas]',
                'errors' => [
                    'required' => 'Kelas harus diisi',
                ]
            ],
        ])) {
            return redirect()->to('/admin/create_siswa')->withInput();
        }
        $this->siswaModel->save([
            'ISN' => $this->request->getVar('ISN'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'id_kelas' => $this->request->getVar('id_kelas'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/admin/daftar_siswa');
    }
    public function edit_siswa($id)
    {
        $data = [
            'title' => 'Edit Data',
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswaModel->where('id', $id)->first(),
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/edit_siswa', $data);
    }
    public function update_siswa($id)
    {
        $this->siswaModel->save([
            'id' => $id,
            'ISN' => $this->request->getVar('ISN'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'id_kelas' => $this->request->getVar('kelas'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/daftar_siswa');
    }
    public function hapusJB($id)
    {
        $this->historiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/mutasi');
    }
    public function mutasi($id)
    {
        $data = [
            'title' => 'Status',
            'validation' => \Config\Services::validation(),
            'status' => $this->statusModel->findAll(4),
            'NIP' => $this->adminModel->findAll(),
            'stat' => $this->historiModel->where('id', $id)->first()

        ];
        return view('admin/mutasi', $data);
    }
    public function mutate($id)
    {
        // $fileSK = $this->request->getFile('SK');
        // // Apakah tidak ada gambar yang diupload
        // // Ambil nama file
        // $namaFile = $fileSK->getRandomName();
        // // Pindahkan gambar ke folder public
        // $fileSK->move('SK', $namaFile);
        $this->historiModel->save([
            'id' => $id,
            'NIP' => $this->request->getVar('NIP'),
            'id_status' => $this->request->getVar('id_status'),
            // 'no_sk' => $this->request->getVar('no_sk'),
            // 'sk' => $namaFile,
            'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'creator' => $this->request->getVar('creator'),
        ]);
        $del = $this->historiModel->find($id);
        if ($del['tgl_berakhir'] != null) {
            $data = [
                'tgl_berakhir' => null,
                'updator' => null
            ];
            $this->historiModel->update($id, $data);
        }
        session()->setFlashdata('pesan', 'Status Berhasil di Ubah');
        return redirect()->to('/admin/daftar_staff');
    }
    public function editStatus($id)
    {
        $data = [
            'title' => 'Edit Status',
            'validation' => \Config\Services::validation(),
            'status' => $this->historiModel->where('id', $id)->first()
        ];
        return view('admin/edit_histori', $data);
    }
    public function updateMutasi($id)
    {
        $this->historiModel->save([
            'id' => $id,
            'NIP' => $this->request->getVar('NIP'),
            'id_status' => $this->request->getVar('id_status'),
            'tgl_berakhir' => $this->request->getVar('tgl_berakhir'),
            'updator' => $this->request->getVar('updator'),
        ]);
        $del = $this->historiModel->find($id);
        if ($del['tgl_berakhir'] != null) {
            $data = [
                'id_status' => 8
            ];
            $this->historiModel->update($id, $data);
        }

        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/admin/mutasi_pegawai');
    }
    public function delete($id)
    {
        // $staff = $this->adminModel->find($id);
        // if ($staff['foto'] != 'default.svg') {
        //     unlink('img/' . $staff['foto']);
        // }
        $this->adminModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/daftar_staff');
    }
    public function delete_siswa($id)
    {
        $this->siswaModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/daftar_siswa');
    }
    public function daftar_staff()
    {
        $currentPage = $this->request->getVar('page_data_staff') ? $this->request->getVar('page_data_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->adminModel->search($keyword);
        } else {
            $data_staff = $this->adminModel;
        }
        $data = [
            'title' => 'Daftar staff',
            'currentPage' => $currentPage
        ];
        $datastaff = $this->adminModel->select('data_staff.id staffid, foto, data_staff.nama, data_staff.NIP, histori.id_status, status')->join('histori', 'data_staff.NIP = histori.NIP', 'left')->join('status', 'status.id_status = histori.id_status', 'left');
        $data['data_staff'] = $datastaff->paginate(5, 'data_staff');
        $data['pager'] = $this->adminModel->pager;
        return view('admin/daftar_staff', $data);
    }
    public function daftar_siswa()
    {
        $currentPage = $this->request->getVar('page_data_siswa') ? $this->request->getVar('page_data_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_siswa = $this->siswaModel->search($keyword);
        } else {
            $data_siswa = $this->siswaModel;
        }
        $data = [
            'title' => 'Daftar Siswa',
            'currentPage' => $currentPage
        ];

        $datasiswa = $this->siswaModel->select('data_siswa.id siswaid, ISN, data_siswa.nama, data_siswa.jenis_kelamin, kelas.id_kelas, kelas, wali_kelas')->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas', 'left');
        $data['data_siswa'] = $datasiswa->paginate(5, 'data_siswa');
        $data['pager'] = $this->siswaModel->pager;
        return view('admin/daftar_siswa', $data);
    }
    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';
        // $this->adminModel->select('data_siswa.id_usr as staffid, NIP, foto, nama, tangla, templa, alamat, id_status, pendikte, name');
        // $this->adminModel->join('users', 'users.id = staff.id');
        // $this->adminModel->join('auth_groups_users', 'auth_groups_users.user_id = data_staff.id_usr');
        // $this->adminModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $this->adminModel->where('data_staff.id_usr', $id);
        // $query = $this->adminModel->get();
        $this->adminModel->select('data_staff.id staffid, foto, data_staff.nama, data_staff.NIP, jenkel, status, histori.id_status');
        $this->adminModel->join('histori', 'data_staff.NIP = histori.NIP');
        $this->adminModel->join('status', 'status.id_status = histori.id_status');
        $this->adminModel->where('data_staff.id', $id);
        // $this->adminModel->select('data_staff.id staffid, NIP, foto, nama, data_staff.id_status, status');
        // $this->adminModel->join('status', 'status.id_status = data_staff.id_status');
        // $this->adminModel->where('data_staff.id', $id);
        $query = $this->adminModel->get();
        $data['data_staff'] = $query->getRow();
        if (empty($data['data_staff'])) {
            return redirect()->to('/admin');
        }
        return view('admin/detail', $data);
    }
    public function detail_siswa($id = 0)
    {
        $data['title'] = 'Detail Siswa';

        $this->siswaModel->select('data_siswa.id siswaid, ISN, data_siswa.nama, jenis_kelamin, kelas, wali_kelas');
        $this->siswaModel->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas');
        $this->siswaModel->where('data_siswa.id', $id);

        $query = $this->siswaModel->get();
        $data['data_siswa'] = $query->getRow();
        if (empty($data['data_siswa'])) {
            return redirect()->to('/admin');
        }
        return view('admin/detail_siswa', $data);
    }
    public function mutasi_pegawai()
    {
        $currentPage = $this->request->getVar('page_data_staff') ? $this->request->getVar('page_data_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->historiModel->search($keyword);
        } else {
            $data_staff = $this->historiModel;
        }
        $data = [
            'title' => 'Status',
            'currentPage' => $currentPage
        ];
        $logHistori = $this->historiModel->select('histori.id,histori.NIP,nama, histori.id_status, status, tgl_mulai, tgl_berakhir, histori.creator, histori.updator')->join('data_staff', 'data_staff.NIP = histori.NIP')->join('status', 'status.id_status = histori.id_status');
        $data['logHistori'] = $logHistori->paginate(5, 'histori');
        $data['pager'] = $this->historiModel->pager;
        return view('admin/mutasi_pegawai', $data);
    }

    //  Query akun managamennt

    public function histori_akun()
    {
        $currentPage = $this->request->getVar('page_data_staff') ? $this->request->getVar('page_data_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->haModel->search($keyword);
        } else {
            $data_staff = $this->haModel;
        }
        $data = [
            'title' => 'Histori Akun',
            'currentPage' => $currentPage
        ];
        $logHistori = $this->haModel->select('keterangan, username, user_image, waktu');
        $data['logHistoriAkun'] = $logHistori->paginate(5, 'histori');
        $data['pager'] = $this->haModel->pager;
        return view('admin/histori_akun', $data);
    }
    public function daftar_akun()
    {
        $currentPage = $this->request->getVar('page_data_staff') ? $this->request->getVar('page_data_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->akunModel->search($keyword);
        } else {
            $data_staff = $this->akunModel;
        }
        $data = [
            'title' => 'Daftar Akun',
            'currentPage' => $currentPage
        ];
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        // $this->akunModel->select('users.id as userid, username, email, name');
        // $this->akunModel->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        // $this->akunModel->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        // $datastaff = $this->akunModel->findAll();
        // $this->akunModel->select('data_staff.id staffid, foto, nama, data_staff.id_status, status');
        // $this->akunModel->join('status', 'data_staff.id_status = status.id_status');
        // $query = $this->akunModel->get();
        // $data['data_staff'] = $query->getResult();
        $data['data_akun'] = $this->akunModel->paginate(5, 'users');
        $data['pager'] = $this->akunModel->pager;
        // $data['data_staff'] = $query->getResult();
        return view('admin/daftar_akun', $data);
    }
    public function hapus($id)
    {
        $staff = $this->akunModel->find($id);
        // if ($staff['foto'] != 'default.svg') {
        //     unlink('img/' . $staff['foto']);
        // }
        $this->akunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/daftar_akun');
    }
    public function trash()
    {
        $currentPage = $this->request->getVar('page_data_staff') ? $this->request->getVar('page_data_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->adminModel->search($keyword);
        } else {
            $data_staff = $this->adminModel;
        }
        $data = [
            'title' => 'Trash',
            'currentPage' => $currentPage
        ];
        // $datastaff = $this->adminModel->select('data_staff.id staffid, foto, nama, data_staff.id_status, status')->join('status', 'data_staff.id_status = status.id_status');
        $datastaff = $this->adminModel->select('data_staff.id, foto, data_staff.nama, data_staff.NIP, histori.id_status, status')->join('histori', 'data_staff.NIP = histori.NIP')->join('status', 'status.id_status = histori.id_status')->onlyDeleted();

        $data['data_staff'] = $datastaff->paginate(5, 'data_staff');
        $data['pager'] = $this->adminModel->pager;
        return view('admin/trash', $data);
    }
    public function restore($id)
    {
        $del = $this->adminModel->onlyDeleted()->find($id);
        if ($del['deleted_at']) {
            $data = [
                'deleted_at' => null
            ];
            $this->adminModel->update($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil direstore');
            return redirect()->to('/admin/trash');
        }
    }
    public function delete2($id)
    {
        $staff = $this->adminModel->onlyDeleted()->find($id);
        if ($staff['foto'] != 'default.svg') {
            unlink('img/' . $staff['foto']);
        }
        $del = $this->adminModel->onlyDeleted()->find($id);
        if ($del['deleted_at'] != null) {
            $this->adminModel->purgeDeleted();
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/trash');
        }
    }
    public function trash_siswa()
    {
        $currentPage = $this->request->getVar('page_data_siswa') ? $this->request->getVar('page_data_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data_staff = $this->siswaModel->search($keyword);
        } else {
            $data_staff = $this->siswaModel;
        }
        $data = [
            'title' => 'Trash',
            'currentPage' => $currentPage
        ];
        $datasiswa = $this->siswaModel->select('data_siswa.id, ISN, data_siswa.nama, data_siswa.jenis_kelamin, kelas.id_kelas, kelas, wali_kelas')->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas', 'left')->onlyDeleted();

        $data['data_siswa'] = $datasiswa->paginate(5, 'data_siswa');
        $data['pager'] = $this->siswaModel->pager;
        return view('admin/trash_siswa', $data);
    }
    public function restore_siswa($id)
    {
        $del = $this->siswaModel->onlyDeleted()->find($id);
        if ($del['deleted_at']) {
            $data = [
                'deleted_at' => null
            ];
            $this->siswaModel->update($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil direstore');
            return redirect()->to('/admin/trash_siswa');
        }
    }
    public function delete2_siswa($id)
    {
        $del = $this->siswaModel->onlyDeleted()->find($id);
        if ($del['deleted_at'] != null) {
            $this->siswaModel->purgeDeleted();
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to('/admin/trash_siswa');
        }
    }
    // Manage presensi
    public function buatqr()
    {
        $NI = $this->request->getVar('NI');
        $url = "https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl={$NI}";
        if ($url != null) {
            $data = [
                'title' => 'buatqr',
                'url' => $url,
                'validation' => \Config\Services::validation(),
                'dat_kelas' => $this->kelasModel->findAll(),
            ];
            return view('admin/buatqr', $data);
        }
    }
    public function scanqr()
    {
        $data = [
            'title' => 'scan siswa'
        ];
        return view('admin/scanqr', $data);
    }
    public function savescan()
    {

        $this->psModel->save([
            'ISN' => $this->request->getVar('ISN'),
        ]);
        session()->setFlashdata('pesan', 'Presensi Berhasil');
        return redirect()->to('/admin/scanqr');
    }
    public function scanstaff()
    {
        $data = [
            'title' => 'scan staff'
        ];
        return view('admin/scanstaff', $data);
    }
    public function savescanstaff()
    {

        $this->pgModel->save([
            'NIP' => $this->request->getVar('NIP'),
        ]);
        session()->setFlashdata('pesan', 'Presensi Berhasil');
        return redirect()->to('/admin/scanstaff');
    }
    public function resultsiswa()
    {
        $currentPage = $this->request->getVar('page_result_siswa') ? $this->request->getVar('page_result_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $data_staff = $this->siswaModel->search($keyword);
        // } else {
        //     $data_staff = $this->siswaModel;
        // }
        $data = [
            'title' => 'resultsiswa',
            'currentPage' => $currentPage
        ];
        $resultsiswa = $this->kelasModel->select('presensi_siswa.ISN,nama,jenis_kelamin,kelas,tanggal,waktu_datang,keterangan')->join('data_siswa', 'kelas.id_kelas = data_siswa.id_kelas')->join('presensi_siswa', 'data_siswa.ISN = presensi_siswa.ISN');
        $data['resultsiswa'] = $resultsiswa->paginate(5, 'resultsiswa');
        $data['pager'] = $this->kelasModel->pager;

        return view('admin/result_siswa', $data);
    }
    public function resultstaff()
    {
        $currentPage = $this->request->getVar('page_result_staff') ? $this->request->getVar('page_result_staff') : 1;
        $keyword = $this->request->getVar('keyword');
        // if ($keyword) {
        //     $data_staff = $this->siswaModel->search($keyword);
        // } else {
        //     $data_staff = $this->siswaModel;
        // }
        $data = [
            'title' => 'resultstaff',
            'currentPage' => $currentPage
        ];
        $resultstaff = $this->statusModel->select('presensi_staff.NIP,data_staff.nama,status.status,tanggal,waktu_datang,waktu_pergi')->join('histori', 'status.id_status = histori.id_status')->join('data_staff', 'data_staff.NIP = histori.NIP')->join('presensi_staff', 'data_staff.NIP = presensi_staff.NIP');
        $data['resultstaff'] = $resultstaff->paginate(5, 'resultstaff');
        $data['pager'] = $this->statusModel->pager;

        return view('admin/result_staff', $data);
    }
}
