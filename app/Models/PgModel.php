<?php

namespace App\Models;

use CodeIgniter\Model;

class PgModel extends Model
{
    // protected $table = 'users';
    // protected $allowedFields = ['NIK', 'foto', 'nama', 'templa', 'tangla', 'alamat', 'pendikte', 'id_jabatan', 'keterangan'];
    protected $table = 'presensi_staff';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'NIP', 'tanggal', 'waktu_datang', 'waktu_pergi', 'keterangan'];
    // protected $useSoftDeletes = true;

    // public function getPegawai($id)
    // {
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where('id', $id)->first();
    // }
    public function search($keyword)
    {
        // $builder = $this->table('data_pegawai');
        // $builder->like('nama', $keyword);
        return $this->table('presensi_staff')->like('nama', $keyword);
    }
}
