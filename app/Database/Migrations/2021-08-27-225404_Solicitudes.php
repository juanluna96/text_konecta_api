<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Solicitudes extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'codigo'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50'
			],
			'descripcion' => [
				'type'       => 'VARCHAR',
				'constraint' => '50'
			],
			'resumen' => [
				'type'       => 'VARCHAR',
				'constraint' => '50'
			],
			'id_empleado' => [
				'type' => 'INT',
				'unsigned' => TRUE
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_empleado', 'empleados', 'id');
		$this->forge->createTable('solicitudes');
	}

	public function down()
	{
		$this->forge->dropTable('solicitudes');
	}
}
