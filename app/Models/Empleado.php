<?php

namespace App\Models;

use CodeIgniter\Model;

class Empleado extends Model
{
    protected $table      = 'empleados';
    protected $primaryKey      = 'id';
    protected $allowedFields      = ['fecha_ingreso', 'nombre', 'salario'];
}
