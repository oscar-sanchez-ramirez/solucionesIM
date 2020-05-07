<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\ClientesModel;
use App\Models\OrdenpagosModel;
use App\Models\StatusModel;



use Config\Services;

class Admin extends BaseController
{


    public function index()
    {
        if ($this->session->logged_admin) {

            $data = ['title' => 'Administrador'];

            return view('pages/admin/index', $data);
        }
        return redirect()->to('login');
    }

    public function create_ordenes()
    {
        if ($this->session->logged_admin) {
            
            $status = new StatusModel();
            $clientes = new ClientesModel();
            $data = ['clientes' => $clientes->findAll(), 'status' => $status->findAll() ,'title' => 'Ordenes de pago'];

            return view('pages/admin/formularios/form_ordenes', $data);
        }

        return redirect()->to('login');
    }


    public function save_ordenes(){
           
        $data = [];
        $req = Services::request();
        $model = new OrdenpagosModel();

        $data['id_orden_pagos'] = $req->getPost('id_orden_pagos');
        $data['id_clientes'] = $req->getPost('id_clientes');
        $data['id_status_pago'] = $req->getPost('id_status_pago');
        $data['orden_fecha_pago'] = $req->getPost('orden_fecha_pago');
        $data['orden_direccion_calle'] = $req->getPost('orden_direccion_calle');
        $data['orden_direccion_numero_exterior'] = $req->getPost('orden_direccion_numero_exterior');
        $data['orden_direccion_numero_interior'] = $req->getPost('orden_direccion_numero_interior');
        $data['orden_direccion_colonia'] = $req->getPost('orden_direccion_colonia');
        $data['orden_direccion_cp'] = $req->getPost('orden_direccion_cp');
        $data['orden_direccion_pais'] = $req->getPost('orden_direccion_pais');
        $data['orden_direccion_estado'] = $req->getPost('orden_direccion_estado');
        $data['orden_direccion_ciudad'] = $req->getPost('orden_direccion_ciudad');
        $data['orden_direccion_telefono'] = $req->getPost('orden_direccion_telefono');
        $data['orden_concepto'] = $req->getPost('orden_concepto');
        $data['orden_forma_de_pago_requerido'] = $req->getPost('orden_forma_de_pago_requerido');
        $data['orden_moneda_de_pago'] = $req->getPost('orden_moneda_de_pago');
        $data['orden_monto'] = $req->getPost('orden_monto');
        $data['orden_subtotal'] = $req->getPost('orden_subtotal');
        $data['orden_total'] = $req->getPost('orden_total');
        $data['orden_numero_de_operacion'] = $req->getPost('orden_numero_de_operacion');
        $data['orden_RfcEmisorCtaOrd'] = $req->getPost('orden_RfcEmisorCtaOrd');
       

        if ($model->save($data)) {
            return redirect()->back()->with('success', 'La orden de pago fue creada con exito');
        }
    }


}
