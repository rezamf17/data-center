<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class File extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'proyek_id'       => [
				'type'           => 'INT',
				'constraint'     => '5',
                'unsigned' => true,
			],
			'nama_file'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
		]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('proyek_id', 'proyek', 'id', 'CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('file', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('proyek');
    }
}
