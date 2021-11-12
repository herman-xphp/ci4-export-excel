<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nis'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '5',
            ],
            'nama_siswa'       => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('nis', true);
        $this->forge->createTable('siswas');
    }

    public function down()
    {
        $this->forge->dropTable('siswas');
    }
}
