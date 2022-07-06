<?php

namespace App\Models;

use CodeIgniter\Model;

class HaModel extends Model
{
    protected $table = 'histori_akun';
    protected $useTimeStamps = true;
    protected $allowedFields = ['keterangan', 'username', 'user_image', 'waktu'];
}
