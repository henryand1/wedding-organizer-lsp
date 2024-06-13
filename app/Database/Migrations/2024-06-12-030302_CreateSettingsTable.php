<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'website_name' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'phone_number1' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'phone_number2' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'default' => null,
                'null' => true,
            ],
            'email1' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
            ],
            'email2' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
                'default' => null,
                'null' => true,
            ],
            'address' => [
                'type' => 'text',
            ],
            'maps' => [
                'type' => 'text',
                'default' => null,
                'null' => true,
            ],
            'logo' => [
                'type' => 'VARCHAR',
                'constraint' => '80',
            ],
            'facebook_url' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'default' => null,
                'null' => true,
            ],
            'instagram_url' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'default' => null,
                'null' => true,
            ],
            'youtube_url' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'default' => null,
                'null' => true,
            ],
            'header_business_hour' => [
                'type' => 'VARCHAR',
                'constraint' => '160',
            ],
            'time_business_hour' => [
                'type' => 'text',
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_settings');
    }

    public function down()
    {
        $this->forge->dropTable('tb_settings');
    }
}
