<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;


use Config\Services;

class Clientes extends BaseController
{
	public function index(){

        $model = new ClientesModel();
        $data = ['clientes' => $model->findAll() ];
     
        return view('pages/clientes', $data);
    }
	

	

}
