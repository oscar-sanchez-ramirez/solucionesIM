<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\OrdenpagosModel;

use Config\Services;


class Pagos extends BaseController
{
	public function index()
	{
		if ($this->session->logged_in) {


			//define("KEY", "SolucionesIM");
			//define("CODE", "AES-128-ECB");
			//$id = session('id');

			$req = Services::request();
			$idOrden = $req->getPost('id_orden');

		//	$model = new UsuariosModel();
		//	$data = [
		//		'usuarios' => $model->where('id', $id)->findAll(), 'title' => 'Pagos Paypal',
		//		'pagoMes' => 3850, 'total' => 10500, 'KEY' => 'SolucionesIM', 'CODE' => 'AES-128-ECB', 'idVenta' => 1
		//	];
		    $total = new OrdenpagosModel();
			$pagoTotal = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_total');
			$pagoMes = (int)$pagoTotal[0];

			$id_or = new OrdenpagosModel();
			$idVe = $id_or->where('id_orden_pagos', $idOrden)->findColumn('id_orden_pagos');
            $idVenta = (int)$idVe[0];
			//var_dump($pagoTotal);
			//var_dump($idVenta);	
		    
		
			 $model = new OrdenpagosModel();
			  
			 $data = ['pagos' => $model->where('id_orden_pagos', $idOrden)->findAll(),  'title' => 'Pagos Paypal', 'KEY' => 'SolucionesIM', 
			 'CODE' => 'AES-128-ECB', 'pagoMes' => $pagoMes, 'idVenta' => $idVenta];
        
			return view('pages/pago_paypal', $data);
		    //return $data;
		}
		return redirect()->to('login');
	}



	//--------------------------------------------------------------------

}
