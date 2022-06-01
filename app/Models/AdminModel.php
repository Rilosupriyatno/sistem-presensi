<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'data_staff';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'NIP', 'nama', 'jenkel', 'foto',  'alamat', 'pendikte', 'deleted_at'];
    protected $useSoftDeletes = true;
    public function data()
    {
        $data = $this->table('data_staff')->countAll();

        return $data;
    }
    public function getStaff($id)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }
    public function search($keyword)
    {
        // $builder = $this->table('data_pegawai');
        // $builder->like('nama', $keyword);
        return $this->table('data_staff')->like('nama', $keyword);
    }
}
