<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\UsuariosModel;


use Config\Services;

class Clientes extends BaseController
{
    public function index()
    {

        if ($this->session->logged_in) {
            $user_id = session('id');
            $model = new ClientesModel();
            $cliente = new ClientesModel();


            $data = ['clientes' => $model->where('id_Usuarios', $user_id)->findAll(), 'title' => 'Clientes'];

            return view('pages/clientes', $data);
        }
        return redirect()->to('login');
    }

    

    
}
