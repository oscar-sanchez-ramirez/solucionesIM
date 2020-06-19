<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\RolModel;

use Config\Services;

class Usuarios extends BaseController
{



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


