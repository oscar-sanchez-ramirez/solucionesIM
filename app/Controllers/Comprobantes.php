<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use Config\Services;

class Comprobantes extends BaseController
{
    public function index()
    {

        if ($this->session->logged_in) {            

            $data = ['title' => 'Comprobantes'];

            return view('pages/comprobantes', $data);
        }
        return redirect()->to('login');
    }

    

    
}
