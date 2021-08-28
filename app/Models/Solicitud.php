<?php

namespace App\Models;

use CodeIgniter\Model;

class Solicitud extends Model
{
    protected $table      = 'solicitudes';
    protected $primaryKey      = 'id';
    protected $allowedFields      = ['codigo', 'descripcion', 'resumen', 'id_empleado'];

    public function get($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()->where(['id' => $id])->first();
    }

    public function empleados()
    {
        $results = $this->db->query("SELECT * FROM solicitudes, empleados WHERE empleados.id = solicitudes.id_empleado")->getResultArray();

        return $results;
    }
}
