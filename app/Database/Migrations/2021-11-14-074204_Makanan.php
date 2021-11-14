<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Makanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'jumlah'       => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'berat' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ],
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => '11',
            ]
        ]);
        
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tbl_makanan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_makanan');
    }
}
