<?php

namespace App\Controllers;

use App\Models\OrdenpagosModel;

class Verificador extends BaseController
{
	public function index()
	{
		if ($this->session->logged_in) {
			//print_r($_GET); 

			$ClientID = "ASklWPwGBMpjsM3h-ABxGjPgAZPy_AAncwUBNzJDK1TJemQJe5n3JL3JpTpdriAW79klve9apxPYcgym";
			$Secret = "EKGkdIiqJPyPnkmk3y11l_ktC7hN3dJAMQibe5pwIY-i7E1LeHZ_68OpJYtxkpmmYqSa40QEGLu8KW71";

			$Login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");

			curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);

			curl_setopt($Login, CURLOPT_USERPWD, $ClientID . ":" . $Secret);

			curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

			$Respuesta = curl_exec($Login);

			//print_r($Respuesta); 

			$objRespuesta = json_decode($Respuesta);

			$AccessToken = $objRespuesta->access_token;

			//print_r($AccessToken); 

			//print_r($_GET['paymentID']);

			$venta = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/" . $_GET['paymentID']);

			curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $AccessToken));

			curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);


			$RespuestaVenta = curl_exec($venta);

			//print_r($RespuestaVenta);

			$objDatosTransaccion = json_decode($RespuestaVenta);

			//print_r($objDatosTransaccion->transactions[0]->custom);

			$state = $objDatosTransaccion->state;
			$email = $objDatosTransaccion->payer->payer_info->email;

			$total = $objDatosTransaccion->transactions[0]->amount->total;
			$currency = $objDatosTransaccion->transactions[0]->amount->currency;
			$custom = $objDatosTransaccion->transactions[0]->custom;

			$total_N =  $total;

			//print_r($custom);
			$clave = explode("#", $custom);

			$CODE = 'AES-128-ECB';
			$KEY = 'SolucionesIM';
			$SID = $clave[0];
			$ClaveVenta = openssl_decrypt($clave[1], $CODE, $KEY);

			curl_close($venta);
			curl_close($Login);

			$model = new OrdenpagosModel();
			$orden = $model->where('id_orden_pagos', $ClaveVenta)->findAll();
			$pagoTotal = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_total');
			$pagoMes = (int) $pagoTotal[0];



			//$data['orden_total'] = $total_nuevo;

			//echo $ClaveVenta;
			$msjpaypal = "";
            $msj = "";
			if ($state == 'approved') {

				$msjpaypal = "Estatus: aprovado";

				$state = 2;
				$data['id_status_pago'] = $state;

				if ($pagoMes > 0) {

					$total_nuevo = ($pagoMes - $total_N);
					$data['orden_total'] = $total_nuevo;

					if ($total_nuevo == 0) {
						$state = 3;
						$data['id_status_pago'] = $state;
						$msjpaypal = "Estatus: completado";
					}
					if ($model->update($ClaveVenta, $data)) {

						$msj = "Pago realizado con exito";
					}
				}
			} else {
				$msjpaypal = "Hay un problema con su pago, no fue aprovado";
			}



			$info = [
				'title' => 'Comprobante PayPal', 'id' => $ClaveVenta, 'total' => $total_N,
				'moneda' => $currency, 'msjpaypal' => $msjpaypal, 'email' => $email, 'orden' => $orden, 'msj' => $msj
			];
			return view('pages/verificador', $info);
		}
		return redirect()->to('login');
	}


	//--------------------------------------------------------------------

}
