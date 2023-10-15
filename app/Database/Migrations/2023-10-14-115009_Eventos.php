<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Eventos extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'data_hora' => [
                'type' => 'datetime',
                'default' => null,
            ],
            'local' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'descricao' => [
                'type' => 'text',
            ],
            'creator' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => null,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('creator', false);
        $this->forge->createTable('eventos');
    }

    public function down()
    {
        $this->forge->dropTable('eventos');
    }
}
