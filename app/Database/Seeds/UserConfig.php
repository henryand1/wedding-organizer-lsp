<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserConfig extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'is_admin' => true,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2,
                'is_admin' => false,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('user_config')->insertBatch($data);
    }
}
