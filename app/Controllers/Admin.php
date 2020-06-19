<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\ClientesModel;
use App\Models\OrdenpagosModel;
use App\Models\StatusModel;
use App\Models\RolModel;




use Config\Services;

class Admin extends BaseController
{


    public function index()
    {
        if ($this->session->logged_admin) {

            $data = ['title' => 'Administrador'];

            return view('pages/admin/index', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function listarOrdenes()
    {
        if ($this->session->logged_admin) {

            $model = new OrdenpagosModel();
            $fecha_actual = strtotime(date("Y-m-d", time()));

            $date = ['ordenes' => $model->orderBy('id_orden_pagos', 'desc')->findAll(), 'title' => 'Ordenes', 'fecha_actual' => $fecha_actual];

            return view('pages/admin/ordenes', $date);
        }

        return redirect()->to(base_url('login'));
    }

    public function vencidasOrdenes()
    {
        if ($this->session->logged_admin) {

            $model = new OrdenpagosModel();


            $fecha_actual = strtotime(date("Y-m-d", time()));




            $date = ['ordenes' => $model->orderBy('id_orden_pagos', 'desc')->findAll(), 'title' => 'Ordenes', 'fecha_actual' => $fecha_actual];

            return view('pages/admin/ordenes_vencidas', $date);
        }

        return redirect()->to(base_url('login'));
    }

    public function crearOrdenes()
    {
        if ($this->session->logged_admin) {

            $status = new StatusModel();
            $clientes = new ClientesModel();
            // $clientes_nombre = $clientes->findColumn('clientes_nombre');


            $data = ['clientes' => $clientes->findAll(), 'status' => $status->findAll(), 'title' => 'Ordenes de pago'];

            return view('pages/admin/formularios/form_ordenes', $data);
        }

        return redirect()->to(base_url('login'));
    }


    public function saveOrdenes()
    {
        if ($this->session->logged_admin) {
            $data = [];
            $req = Services::request();
            $model = new OrdenpagosModel();

            $data['id_orden_pagos'] = $req->getPost('id_orden_pagos');
            $data['id_clientes'] = $req->getPost('id_clientes');
            $data['id_status_pago'] = $req->getPost('id_status_pago');
            $data['orden_fecha_pago'] = $req->getPost('orden_fecha_pago');
            $data['orden_concepto'] = $req->getPost('orden_concepto');
            $data['CondicionesDePago'] = $req->getPost('CondicionesDePago');
            $data['cantidad'] = $req->getPost('cantidad');
            $data['orden_moneda_de_pago'] = $req->getPost('orden_moneda_de_pago');
            $data['orden_monto'] = $req->getPost('orden_monto');
            $data['orden_subtotal'] = $req->getPost('orden_subtotal');
            $data['iva'] = $req->getPost('iva');
            $data['orden_total'] = $req->getPost('orden_total');



            if ($model->save($data) === false) {
                return redirect()->back()->with('danger', 'La orden  no fue creada');
            } else {

                return redirect()->back()->with('success', 'La orden fue creada con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function verOrden()
    {
        if ($this->session->logged_admin) {

            $req = Services::request();
            $idOrden = $req->getPost('idOrden');
            $model = new OrdenpagosModel();
            $data = ['ordenes' => $model->where('id_orden_pagos', $idOrden)->findAll(), 'title' => 'Ordenes'];
            return view('pages/admin/verOrden', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function emailOrdenes()
    {
        $req = Services::request();
        $idOrden = $req->getPost('idOrden');
        $CODE = 'AES-128-ECB';
        $KEY = 'SolucionesIM';
        $token = openssl_encrypt($idOrden, $CODE, $KEY);


        $model = new OrdenpagosModel();
        $idCliente = $model->where('id_orden_pagos', $idOrden)->findColumn('id_clientes');


        $cliente = new ClientesModel();
        $correo_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_direccion_email');
        $paterno = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_apellido_paterno');
        $clientes_nombre = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_nombre');
        $clientes_rfc = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_fiscal_rfc');


        $nombre =  $clientes_nombre[0];
        $apellidos =  $paterno[0];
        $correo =  $correo_cliente[0];
        $rfc = $clientes_rfc['0'];

        $data = [
            'ordenes' => $model->where('id_orden_pagos', $idOrden)->findAll(), 'title' => 'Soluciones IM',
            'nombre' => $nombre, 'apellidos' => $apellidos, 'correo' => $correo, 'idOrden' => $idOrden, 'token' => $token,
            'rfc' => $rfc
        ];


        $email = Services::email();
        $email->setFrom('facturacion@c1550361.ferozo.com', 'Soluciones IM');
        $email->setTo($correo);
        $email->setSubject('Soluciones IM, Fecha de pago');
        $email->setMessage(view('pages/admin/admin_correo', $data));

        if ($email->send()) {
            return redirect()->to(base_url('admin/listarOrdenes'))->with('correo', 'Correo envíado con exito');
        } else {
            return redirect()->to(base_url('admin/listarOrdenes'))->with('FalloCorreo', 'Fallo al envío de correo');
        }
    }

    public function editarOrden()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $idOrden = $req->getPost('idOrden');
            $model = new OrdenpagosModel();
            $data = ['ordenes' => $model->where('id_orden_pagos', $idOrden)->findAll(), 'title' => 'Ordenes'];

            return view('pages/admin/formularios/form_editarOrden', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function updateOrdenes()
    {
        if ($this->session->logged_admin) {
            $data = [];
            $model = new  OrdenpagosModel();
            $req = Services::request();

            $id = $req->getPost('id_orden_pagos');
            $data['id_clientes'] = $req->getPost('id_clientes');
            $data['id_status_pago'] = $req->getPost('id_status_pago');
            $data['orden_fecha_pago'] = $req->getPost('orden_fecha_pago');
            $data['orden_concepto'] = $req->getPost('orden_concepto');
            $data['CondicionesDePago'] = $req->getPost('CondicionesDePago');
            $data['cantidad'] = $req->getPost('cantidad');
            $data['orden_moneda_de_pago'] = $req->getPost('orden_moneda_de_pago');
            $data['orden_monto'] = $req->getPost('orden_monto');
            $data['orden_subtotal'] = $req->getPost('orden_subtotal');
            $data['iva'] = $req->getPost('iva');
            $data['orden_total'] = $req->getPost('orden_total');





            if ($model->update($id, $data) === false) {
                return redirect()->to('listarOrdenes')->with('danger', 'No se pudo actualizar la orden');
            } else {
                return redirect()->to('listarOrdenes')->with('success', 'Orden actualizada con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function eliminarOrden()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $idOrden = $req->getPost('idOrden');
            $model = new OrdenpagosModel();

            if ($model->delete($idOrden)) {
                return redirect()->back()->with('delete', 'La orden fue eliminada con exito');
            }
            return $idOrden;
        }
        return redirect()->to(base_url('login'));
    }

    public function resOrden()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $id = $req->getPost('idOrden');

            $model = new OrdenpagosModel();
            $data['orden_fecha_pago'] = date("Y-m-d", time());

            if ($model->update($id, $data) === false) {
                return redirect()->to('listarOrdenes')->with('danger', 'No se pudo restaurar la órden');
            } else {
                return redirect()->to('listarOrdenes')->with('success', 'Órden restaurar con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    
}


