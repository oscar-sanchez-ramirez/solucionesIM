<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use Config\Services;

class Perfil extends BaseController
{

    public function signin()
    {
        $req = Services::request();
        $model = new UsuariosModel();
        $inUser = trim($req->getPost('correo'));
        $inPass = trim($req->getPost('password'));

        $user = $model->where('email', $inUser)->first();

        if ($user === null) {
            return redirect()->to('/login');
        } else {
            if (!password_verify($inPass, $user['password'])) {
                return redirect()->to('/login');
            }
            $user['logged_in'] = true;
            $this->session->set($user);
            return redirect()->to('/pagos');
        }
    }

    public function signout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
