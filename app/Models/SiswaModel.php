<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'data_siswa';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'ISN', 'nama', 'jenis_kelamin', 'id_kelas', 'kelas', 'deleted_at'];
    protected $useSoftDeletes = true;
    public function data_siswa()
    {
        $data = $this->table('data_siswa')->countAll();

        return $data;
    }
    public function getSiswa($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }
}
