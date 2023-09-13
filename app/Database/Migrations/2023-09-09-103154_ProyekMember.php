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
