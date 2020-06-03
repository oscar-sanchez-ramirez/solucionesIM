<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;



use Config\Services;

class Ordenes extends BaseController
{
    public function index()
    {

        if ($this->session->logged_in) {

            $req = Services::request();
            $idCliente = $req->getPost('idCliente');


            $model = new OrdenpagosModel();
            $ordenes = $model->where('id_clientes', $idCliente)->orderBy('orden_fecha_pago', 'desc')->findAll();
            $fecha = $model->where('id_orden_pagos', $idCliente)->findColumn('orden_fecha_pago');

            $fecha_actual = strtotime(date("Y-m-d", time()));
            $fecha_entrada =  strtotime(vencer($fecha[0]));
             

            // $paginator = $model->pager;
            // $paginator->setPath('ordenes');

            $data = [
                'ordenes' => $ordenes, 'title' => 'Ordenes de pago',
                'fecha_actual' => $fecha_actual, 'fecha_entrada' => $fecha_entrada
            ];

            return view('pages/ordenes', $data);
        }
        return redirect()->to('login');
    }
}
