<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprobantesModel;
use App\Models\ClientesModel;


use Config\Services;

class Comprobar extends BaseController
{
    public function index()
    {

        if ($this->session->logged_admin) {



            $model = new ComprobantesModel();
            $comprobantes = $model->orderBy('id_comprobantes', 'desc')->findAll();

            $data = ['title' => 'Comprobantes', 'comprobantes' => $comprobantes];

            return view('pages/admin/comprobantes', $data);
        }
        return redirect()->to('login');
    }

    public function show()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $idComprobante = $req->getPost('id_comprobante');

            $model = new ComprobantesModel();
            $comprobantes = $model->where('id_comprobantes', $idComprobante)->findAll();

            $date = ['title' => 'Comprobante', 'comprobantes' => $comprobantes];

            return view('pages/admin/comprobantes_show', $date);
        }
        return redirect()->to('login');
    }

    public function comprobantes()
    {
        if ($this->session->logged_admin) {
            $req = Services::request();
            $idComprobante =  $req->getPost('id_comprobante');
            $estatus = 1;

            $model = new ComprobantesModel();
            $data['estatus'] = $estatus;

            if ($model->update($idComprobante, $data) === false) {
                return redirect()->to('/')->with('danger', 'No se pudo comprobar');
            } else {
                return redirect()->to(base_url('comprobar'))->with('success', 'Comprabado con éxito');
            }

            
        }
        return redirect()->to('login');
    }
}
