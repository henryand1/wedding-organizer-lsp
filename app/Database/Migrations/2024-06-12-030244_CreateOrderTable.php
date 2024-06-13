<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'catalogue_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'wedding_date' => [
                'type' => 'DATETIME',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['REQUESTED', 'APPROVED'],
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
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

        $this->forge->addKey('order_id', true);
        $this->forge->addForeignKey('catalogue_id', 'tb_catalogues', 'catalogue_id', 'CASCADE', 'CASCADE'); // Menambahkan foreign key
        $this->forge->createTable('tb_orders');
    }

    public function down()
    {
        $this->forge->dropTable('tb_orders');
    }
}
