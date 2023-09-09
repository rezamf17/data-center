<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProyekMember extends Migration
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
			'id_proyek'       => [
				'type'           => 'INT',
				'constraint'     => '5',
                'unsigned' => true,
			],
			'id_user'       => [
				'type'           => 'INT',
				'constraint'     => '5',
                'unsigned' => true,
			],
			'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['Admin', 'Pegawai', 'PJ', 'SU', 'Member'],
				'default'        => 'Admin',
			],
			'nama_member'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('id_proyek', 'proyek', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_user', 'user', 'id', 'CASCADE', 'CASCADE');
		// Membuat tabel news
		$this->forge->createTable('proyek_member', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('proyek_member');
    }
}
