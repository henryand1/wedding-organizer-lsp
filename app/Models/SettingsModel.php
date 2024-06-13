<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table = 'tb_settings';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'website_name', 
        'phone_number1', 
        'phone_number2', 
        'email1', 
        'email2', 
        'address',
        'maps',
        'logo',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'header_business_hour',
        'time_business_hour',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUserByEmail($username)
    {
        return $this->where('username', $username)->first();
    }
}
