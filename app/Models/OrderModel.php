<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'tb_orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = 
    [
        'catalogue_id', 
        'name', 
        'email', 
        'phone_number', 
        'wedding_date', 
        'status',
        'user_id',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}
