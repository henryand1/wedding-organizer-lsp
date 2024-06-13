<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserConfigTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'config_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'is_admin' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('config_id', true);
        $this->forge->addForeignKey('user_id', 'tb_users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_config');
    }

    public function down()
    {
        $this->forge->dropTable('user_config');
    }
}