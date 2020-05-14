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
            $ordenes = $model->where('id_clientes', $idCliente)->findAll();
            // $paginator = $model->pager;
            // $paginator->setPath('ordenes');

            $data = ['ordenes' => $ordenes, 'title' => 'Ordenes de pago'];

            return view('pages/ordenes', $data);
        }
        return redirect()->to('login');
    }
}
