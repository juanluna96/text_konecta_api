<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Empleados extends Migration
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
			'nombre'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'salario' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'fecha_ingreso' => [
				'type' => 'DATETIME',
				'null' => true
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('empleados');
	}

	public function down()
	{
		$this->forge->dropTable('empleados');
	}
}
