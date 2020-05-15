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
			
				$req = Services::request();
				$idOrden = $req->getPost('id_orden');

				$total = new OrdenpagosModel();
				$pagoTotal = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_total');
				$pagoMes = (int) $pagoTotal[0];

				$id_or = new OrdenpagosModel();
				$idVe = $id_or->where('id_orden_pagos', $idOrden)->findColumn('id_orden_pagos');
				$concepto = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_concepto');
				$concepto_R = $concepto[0];
				$idVenta = (int) $idVe[0];


				$model = new OrdenpagosModel();

				$data = [
					'pagos' => $model->where('id_orden_pagos', $idOrden)->findAll(),  'title' => 'Pagos Paypal', 'KEY' => 'SolucionesIM',
					'CODE' => 'AES-128-ECB', 'pagoMes' => $pagoMes, 'idVenta' => $idVenta, 'concepto' => $concepto_R
				];

				return view('pages/pago_paypal', $data) . view('components/boton_paypal', $data);
				//return $data;
			}
			
		return redirect()->to('login');
	}


	public function tarjeta()
	{
		if ($this->session->logged_in) {
			$req = Services::request();
			$idOrdenStripe = $req->getPost('id_orden_stripe');


			$model = new OrdenpagosModel();
			$idVe = $model->where('id_orden_pagos', $idOrdenStripe)->findColumn('id_orden_pagos');
			$idVenta = (int) $idVe[0];
			$data = ['ordenes' => $model->where('id_orden_pagos', $idOrdenStripe)->findAll(), 'title' => 'Stripe', 'idVenta' => $idVenta];

			return view('pages/pago_stripe', $data);
		}
		return redirect()->to('login');
	}

	//--------------------------------------------------------------------

}
