<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriModel extends Model
{
    protected $table = 'histori';
    protected $useTimeStamps = true;
    protected $allowedFields = ['id', 'NIP', 'id_status', 'tgl_mulai', 'tgl_berakhir', 'creator', 'updator'];
    // protected $allowedFields = ['id', 'NIP', 'id_status', 'no_sk', 'sk', 'tgl_mulai', 'tgl_berakhir', 'creator', 'updator'];

    public function search($keyword)
    {
        // $builder = $this->table('data_pegawai');
        // $builder->like('nama', $keyword);
        return $this->table('histori')->like('NIP', $keyword);
    }
}
