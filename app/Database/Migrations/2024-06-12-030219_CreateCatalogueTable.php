<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCatalogueTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'catalogue_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'package_name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'description' => [
                'type' => 'text',
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'status_publish' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('catalogue_id', true);
        $this->forge->addForeignKey('user_id', 'tb_users', 'user_id', 'CASCADE', 'CASCADE'); // Menambahkan foreign key
        $this->forge->createTable('tb_catalogues');
    }

    public function down()
    {
        $this->forge->dropTable('tb_catalogues');
    }
}
