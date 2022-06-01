<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $allowedFields = ['id_kelas', 'kelas', 'wali_kelas'];
}
