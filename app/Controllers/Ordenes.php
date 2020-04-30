<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;


use Config\Services;

class Ordenes extends BaseController
{
	public function index(){

        $model = new ClientesModel();
        //$model = new OrdenpagosModel();
        $data = ['clientes' => $model->findAll() ];

       

        return view('pages/clientes', $data);


    }
	

	

}
