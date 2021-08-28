<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Empleado;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class EmpleadosController extends ResourceController
{
    protected $modelName = 'App\Models\Empleado';
    protected $format = 'json';

    /**
     * Mostrar todos los empleados
     * @return Response
     */
    public function index()
    {
        $empleado = new Empleado();
        return $this->respond(array(
            "empleados" => $empleado->findAll()
        ));
    }

    /**
     * Ingresar nuevo empleado
     * @return Response
     */
    public function store()
    {
        $rules = [
            "nombre" => "required",
            "salario" => "required|numeric",
            // "fecha_ingreso" => "required",
        ];

        $messages = [
            "nombre" => [
                "required" => "Nombre es requerido"
            ],
            "salario" => [
                "required" => "Salario es requerido",
                "numeric" => "Salario debe ser un numero valido"
            ],
            "fecha_ingreso" => [
                "required" => "La fecha de ingreso es requerida"
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->respond(
                $this->validator->getErrors(),
                500
            );
        }

        $empleado = new Empleado();

        $fecha_ingreso = $this->request->getPost('salario') ? $this->request->getPost('salario') :  date('Y-m-d H:i:s', now());

        $id = $empleado->insert(
            [
                'nombre' => $this->request->getPost('nombre'),
                'salario' => $this->request->getPost('salario'),
                'fecha_ingreso' => $fecha_ingreso,
            ]
        );

        return $this->respond(array(
            "empleado" => $this->model->find($id)
        ));
    }
}
