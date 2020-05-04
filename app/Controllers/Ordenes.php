<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;


use Config\Services;

class Ordenes extends BaseController
{
	public function index(){
        
        $req = Services::request();
        $idCliente = $req->getPost('idCliente');

        $model = new OrdenpagosModel();
        $data = ['ordenes' => $model->where('id_clientes', $idCliente)->findAll(), 'title' => 'Ordenes de pago' ];

        
     
        return view('pages/ordenes', $data);
    }
	

	

}
