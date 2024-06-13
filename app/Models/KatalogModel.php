<?php

namespace App\Models;

use CodeIgniter\Model;

class KatalogModel extends Model
{
    protected $table = 'tb_catalogues';
    protected $primaryKey = 'catalogue_id';
    protected $allowedFields = 
    [
        'catalogue_id', 
        'image', 
        'package_name', 
        'description', 
        'price', 
        'status_publish',
        'user_id',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
