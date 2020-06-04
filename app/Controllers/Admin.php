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

        $nombre =  $clientes_nombre[0];
        $apellidos =  $paterno[0];
        $correo =  $correo_cliente[0];

        $data = [
            'ordenes' => $model->where('id_orden_pagos', $idOrden)->findAll(), 'title' => 'Soluciones IM',
            'nombre' => $nombre, 'apellidos' => $apellidos, 'correo' => $correo, 'idOrden' => $idOrden, 'token' => $token
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

        $data = [];
        $model = new  OrdenpagosModel();
        $req = Services::request();

        $id = $req->getPost('id_orden_pagos');
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



        if ($model->update($id, $data) === false) {
            return redirect()->to('listarOrdenes')->with('danger', 'No se pudo actualizar la orden');
        } else {
            return redirect()->to('listarOrdenes')->with('success', 'Orden actualizada con exito');
        }
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

    public function crearUsuario()
    {
        if ($this->session->logged_admin) {
            $model = new RolModel();
            $data = ['rols' => $model->orderBy('id', 'desc')->findAll(), 'title' => 'Usuarios'];

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
                $model = new RolModel();
                $usuarios = new UsuariosModel();

                //$rules = $usuarios->validationRules;
                // $rol = $usuarios->validationRules;


                //validaciones
                // $msj = null;
                //$msj_rol = null;
                $rules = $usuarios->getValidationRules(['only' => ['email', 'id_rol']]);
                if ($rules['email']) {
                    $msj['email'] = "Este correo ya esta registrado, favor de usar otro";
                } else {
                    $msj['email'] = null;
                }


                // if($rules['id_rol']){
                //     $msj['id_rol'] = "El campo rol de usuario es requerido";
                // }else{
                //     $msj['id_rol'] = null;
                // }


                $data = ['rols' => $model->orderBy('id', 'desc')->findAll(), 'title' => 'Usuarios', 'msj' => $msj];
                return view('pages/admin/formularios/form_usuarios', $data);
            } else {
                return redirect()->to('listarUsuarios')->with('successUsr', 'Usuario creado con exito');
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
                return redirect()->to('listarUsuarios')->with('danger', 'No se pudo actualizar el usuario');
            } else {
                return redirect()->to('listarUsuarios')->with('success', 'Usuario actualizado con exito');
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