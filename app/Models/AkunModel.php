<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'users';
    protected $useTimeStamps = true;
    protected $allowedFields = ['username', 'user_image', 'fullname', 'NIP', 'ISN'];
}
