<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Map extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mapId'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'latLng'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'namaLokasi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenisLokasi'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addKey('mapId', true);
        $this->forge->createTable('map');
    }

    public function down()
    {
        $this->forge->dropTable('map');
    }
}
