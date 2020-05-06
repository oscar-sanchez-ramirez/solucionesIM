<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use Config\Services;

class Admin extends BaseController
{


    public function index()
    {
        if ($this->session->logged_admin) {

            return view('pages/admin/index');
        }
        return redirect()->to('login');
    }

    public function create()
    {
        if ($this->session->logged_admin) {

            return view('pages/admin/formularios/ordenes');
        }
        return redirect()->to('login');
    }
}
