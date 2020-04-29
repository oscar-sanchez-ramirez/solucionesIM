<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use Config\Services;


class Pagos extends BaseController
{
	public function index()
	{
		if ($this->session->logged_in) {

            
			define("KEY", "SolucionesIM");
			define("CODE", "AES-128-ECB");
            $id = session('id');
			$model = new UsuariosModel();
			$data = [
				'usuarios' => $model->where('id', $id)->findAll(), 'title' => 'SolucionesIM',
				'pagoMes' => 3850, 'total' => 10500, 'KEY' => 'SolucionesIM', 'CODE' => 'AES-128-ECB', 'idVenta' => 1
			];

			return view('pages/pago_paypal', $data);
		}
		return redirect()->to('login');

	}



	//--------------------------------------------------------------------

}