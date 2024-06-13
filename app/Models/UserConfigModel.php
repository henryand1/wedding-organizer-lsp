<?php

namespace App\Models;

use CodeIgniter\Model;

class UserConfigModel extends Model
{
    protected $table = 'user_config';
    protected $primaryKey = 'config_id';
    protected $allowedFields = ['user_id', 'is_admin', 'created_at', 'updated_at'];

    public function isAdmin($userId)
    {
        return $this->where('user_id', $userId)->first()['is_admin'];
    }
}
