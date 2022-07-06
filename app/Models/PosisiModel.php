<?php

namespace App\Models;

use CodeIgniter\Model;

class PosisiModel extends Model
{
    protected $table = 'posisi';
    protected $allowedFields = ['id_posisi', 'posisi'];
}
