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


            $date = ['ordenes' => $model->findAll(), 'title' => 'Ordenes'];

            return view('pages/admin/ordenes', $date);
        }

        return redirect()->to(base_url('login'));
    }

    public function crearOrdenes()
    {
        if ($this->session->logged_admin) {

            $status = new StatusModel();
            $clientes = new ClientesModel();
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


            if ($model->save($data) === false) {
                return redirect()->back()->with('danger', 'La orden de pago no fue creada');
            } else {
                return redirect()->back()->with('success', 'La orden de pago fue creada con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function verOrden()
    {
        if ($this->session->logged_admin) {

            $model = new OrdenpagosModel();
            $data = ['ordenes' => $model->where('id_orden_pagos', 2)->findAll(), 'title' => 'Ordenes'];
            return view('pages/admin/verOrden', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function crearUsuario()
    {
        if ($this->session->logged_admin) {
            $model = new RolModel();
            $data = ['rols' => $model->findAll(), 'title' => 'Usuarios'];

            return view('pages/admin/formularios/form_usuarios', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function saveUsuario()
    {
        if ($this->session->logged_admin) {
            $data = [];
            $req = Services::request();
            $model = new UsuariosModel();

            $data['nombre'] = $req->getPost('nombre');
            $data['apellidos'] = $req->getPost('apellidos');
            $data['email'] = $req->getPost('email');
            $password = $req->getPost('password');
            $data['password'] = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
            $data['id_rol'] = $req->getPost('id_rol');

            $roles = new RolModel();

            if ($model->save($data) === false) {
                //$datos = ['errors' => $roles->validationRules];
                return redirect()->to('/admin/listarUsuarios')->with('dangerUsr', 'No se guardo el usuario');
            } else {
                return redirect()->to('/admin/listarUsuarios')->with('successUsr', 'Usuario creado con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function listarUsuarios()
    {

        if ($this->session->logged_admin) {
            $model = new UsuariosModel();
            $usuarios = $model->findAll();
            $data = ['usuarios' => $usuarios, 'title' => 'Usuarios'];
            return view('pages/admin/usuarios', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function actualizarUsuario()
    {
        if ($this->session->logged_admin) {

            $req = Services::request();
            $id = $req->getPost('id_usr');
            $model = new UsuariosModel();
            $data = ['usuarios' => $model->where('id', $id)->findAll(), 'title' => 'Actualizar'];
            return view('pages/admin/formularios/form_usuario_update', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function updateUser()
    {
        if ($this->session->logged_admin) {


            $data = [];
            $model = new UsuariosModel();
            $req = Services::request();

            $id = $req->getPost('id');
            $data['nombre'] = $req->getPost('nombre');
            $data['apellidos'] = $req->getPost('apellidos');



            if ($model->update($id, $data) === false) {
                return redirect()->to('/admin/listarUsuarios')->with('danger', 'No se pudo actualizar el usuario');
            } else {
                return redirect()->to('/admin/listarUsuarios')->with('success', 'Usuario actualizado con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function deleteUser()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $id = $req->getPost('id_usr_d');
            $model = new UsuariosModel();
            if ($model->delete($id)) {
                return redirect()->back()->with('delete', 'Usuario eliminado con exito');
            }
        }
        return redirect()->to(base_url('login'));
    }
}


// $erros = $model->validationRules;
// $rols = new RolModel();
// $dat = ['rols' => $rols->findAll(),'errors' => $rules, 'title' => 'Usuarios' ];
