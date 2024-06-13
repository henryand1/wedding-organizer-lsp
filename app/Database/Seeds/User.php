<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => '1',
                'name' => 'Admin',
                'username' => 'admin@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '2',
                'name' => 'user1',
                'username' => 'user1@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ],
           
        ];

        $this->db->table('tb_users')->insertBatch($data);
    }
}
