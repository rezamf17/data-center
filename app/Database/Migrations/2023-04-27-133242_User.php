<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
			'nip'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
				'unique'            => TRUE
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'nomor_hp'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100,
			],
			'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['Admin', 'Pegawai', 'PJ', 'SU'],
				'default'        => 'Admin',
			],
			'status'      => [
				'type'           => 'ENUM',
				'constraint'     => ['Active', 'InActive'],
				'default'        => 'Active',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
