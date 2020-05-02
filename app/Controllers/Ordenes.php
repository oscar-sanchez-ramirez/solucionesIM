<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;


use Config\Services;

class Ordenes extends BaseController
{
	public function index(){

        $model = new OrdenpagosModel();
        $data = ['ordenes' => $model->findAll() ];
     
        return view('pages/ordenes', $data);
    }
	

	

}
