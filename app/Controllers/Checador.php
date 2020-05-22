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
			$venta = $model->where('id_orden_pagos', $id_venta)->findColumn('id_orden_pagos');
			$idVenta = (int) $venta[0];
			$concepto_R = $concepto[0];
			$pagoMes = (int) $pagoTotal[0];

			while ($pagoMes > 0) {
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
				$seller_message = $charge['outcome']['seller_message'];
				//$card  = $charge['payment_method_details']['card']['brand'];
				$cardNumero  = $charge['payment_method_details']['card']['last4'];
				$cardTipo  = $charge['payment_method_details']['card']['network'];



				$msjStripe = "";
				$msj = "";
				if ($status == 'approved_by_network') {

					$msjStripe = "Estatus: aprovado";

					$state = 2;
					$data['id_status_pago'] = $state;

					if ($pagoMes > 0) {

						$total_nuevo = ($pagoMes - $monto);
						$data['orden_total'] = $total_nuevo;
						$msjStripe = "Estatus: aprovado";

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
					$state = 4;
					$data['id_status_pago'] = $state;
					$data['orden_total'] = $pagoMes;
					if ($model->update($id_venta, $data)) {

						$msj = "Tu pago fue rechazado";
					}
					$msjStripe = "Hay un problema con su pago, no fue aprovado";
				}

				$nombre =  session('nombre');
				$apellidos =  session('apellidos');
				$correo =  session('email');


				$data = [
					'id' => $id, 'monto' => $monto, 'moneda' => $moneda, 'descripcion' => $descripcion, 'status' => $status,
					'concepto' => $concepto_R, 'title' => 'Stripe', 'msjStripe' => $msjStripe,
					'msj' => $msj, 'idVenta' => $idVenta, 'cardNumero' => $cardNumero, 'cardTipo' => $cardTipo,
					'nombre' => $nombre, 'paterno' => $apellidos, 'ordenes' => $model->where('id_orden_pagos', $id_venta)->findAll()
				];


				$email = Services::email();

				$email->setFrom('cnavarro@solucionesim.net', 'Soluciones IM');
				$email->setTo($correo);
				$email->setSubject('Soluciones IM, Comprobante');
				$email->setMessage(view('pages/tarjeta', $data));

				


				if($email->send()){
					return redirect()->to('home')->with('correo', "Comprobante envíado a tu correo");
				//return $RespuestaVenta;
				}else{
					return redirect()->to('home')->with('correoFallo', "Error al envío de comprobante al correo");
				}
				

				//return view('pages/tarjeta', $data);
				//return redirect()->to('home')->with('correo', "Comprobante envíado a tu correo");
				//return $charge;
			}
			return redirect()->to('home');
		}
		return redirect()->to('login');
	}


	//--------------------------------------------------------------------

}
