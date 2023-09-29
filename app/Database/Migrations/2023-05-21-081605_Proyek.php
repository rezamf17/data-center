<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proyek extends Migration
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
			'nama_proyek'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'document_title'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'kategori_document'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'deparment' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'created' => [
				'type'           => 'DATE'
			],
			'ended' => [
				'type'           => 'DATE'
			],
			'pj_proyek' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'industri' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'deskripsi' => [
				'type'           => 'TEXT'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('proyek', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('proyek');
    }
}
