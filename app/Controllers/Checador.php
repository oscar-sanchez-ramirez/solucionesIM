<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;

use Config\Services;

class Checador extends BaseController
{
	

	public function index()
	{
		if ($this->session->logged_in) {
			$req = Services::request();
			$id_venta = $req->getPost('id-venta');

			$model = new OrdenpagosModel();
			$pagoTotal = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_total');
			$concepto = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_concepto');
			$concepto_R = $concepto[0];
			$pagoMes = (int) $pagoTotal[0];

            while($pagoMes > 0){
			require '../vendor/autoload.php';

			\Stripe\Stripe::setApiKey("sk_test_wThLvIsqNPNfofKheRhOjHJt002ThKiwBj");

			$token = $_POST["stripeToken"];

			$charge = \Stripe\Charge::create([
				"amount" => $pagoMes,
				"currency" => "usd",
				"description" => "$concepto_R",
				"source" => $token
			]);

			//echo "<pre>", print_r($charge), "</pre>";

			$id = $charge["id"];
			$monto = $charge["amount"];
			$moneda = $charge["currency"];
			$descripcion = $charge["description"];
			$status = $charge['outcome']['network_status'];

			$msjStripe = "";
            $msj = "";
			if ($status == 'approved_by_network') {

				$msjStripe = "Estatus: aprovado";

				$state = 2;
				$data['id_status_pago'] = $state;

				if ($pagoMes > 0) {

					$total_nuevo = ($pagoMes - $monto);
					$data['orden_total'] = $total_nuevo;

					if ($total_nuevo == 0) {
						$state = 3;
						$data['id_status_pago'] = $state;
						$msjStripe = "Estatus: completado";
					}
					if ($model->update($id_venta, $data)) {

						$msj = "Pago realizado con exito";
					}
				}
			} else {
				$msjStripe = "Hay un problema con su pago, no fue aprovado";
			}

			

			$data = ['id' => $id, 'monto' => $monto, 'moneda' => $moneda, 'descripcion' => $descripcion, 'status' => $status,
			 'concepto' => $concepto_R, 'title' => 'Stripe', 'msjStripe' => $msjStripe, 'msj' => $msj];

			return view('pages/tarjeta', $data);
			//return $charge;
		}
		return redirect()->to('clientes');
		    
		}
		return redirect()->to('login');
	}


	//--------------------------------------------------------------------

}
