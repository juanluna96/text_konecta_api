<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Solicitud;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class SolicitudesController extends ResourceController
{
    protected $modelName = 'App\Models\Solicitud';
    protected $format = 'json';

    /**
     * Mostrar todos las solicitudes
     * @return Response
     */
    public function index()
    {
        $solicitud = new Solicitud();
        return $this->respond(array(
            "solicitudes" => $solicitud->empleados()
        ));
    }

    /**
     * Ingresar nuevo Solicitud
     * @return Response
     */
    public function store()
    {
        $rules = [
            "codigo" => "required",
            "descripcion" => "required",
            "resumen" => "required",
            "id_empleado" => "required|numeric"
        ];

        $messages = [
            "codigo" => [
                "required" => "El código es requerido"
            ],
            "descripcion" => [
                "required" => "La descripción es requerida"
            ],
            "resumen" => [
                "required" => "El resumen es requerido"
            ],
            "id_empleado" => [
                "required" => "La empleado de la solicitud es obligatorio",
                "numeric" => "El numero de empleado debe ser un numero valido"
            ],
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->respond(
                $this->validator->getErrors(),
                500
            );
        }

        $solicitud = new Solicitud();

        $id = $solicitud->insert(
            [
                'codigo' => $this->request->getPost('codigo'),
                'descripcion' => $this->request->getPost('descripcion'),
                'resumen' => $this->request->getPost('resumen'),
                'id_empleado' => $this->request->getPost('id_empleado'),
            ]
        );


        return $this->respond(array(
            "solicitud" => $this->model->find($id)
        ));
    }
}
