<?php

namespace App\Controllers;



use App\Controllers\BaseController;

use App\Models\OrdenpagosModel;
use App\Models\ComprobantesModel;
use App\Models\ClientesModel;

use Config\Services;

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

			//print_r($objDatosTransaccion);
			//print_r($objDatosTransaccion->transactions[0]->custom);
			$idPay = $objDatosTransaccion->id;
			$state = $objDatosTransaccion->state;
			$cart = $objDatosTransaccion->cart;
			$status = $objDatosTransaccion->payer->status;
			$email = $objDatosTransaccion->payer->payer_info->email;
			$nombre = $objDatosTransaccion->payer->payer_info->first_name;
			$paterno = $objDatosTransaccion->payer->payer_info->last_name;
			$payer_id = $objDatosTransaccion->payer->payer_info->payer_id;

			$total = $objDatosTransaccion->transactions[0]->amount->total;
			$currency = $objDatosTransaccion->transactions[0]->amount->currency;
			$custom = $objDatosTransaccion->transactions[0]->custom;
			$email_Rec = $objDatosTransaccion->transactions[0]->payee->email;




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

			$idCliente = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('id_clientes');
			$status = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('id_status_pago');
			$fecha_orden = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_fecha_pago');
			$concepto = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_concepto');
			$metodo = 1;


			$cliente = new ClientesModel();
			$cliente_rfc = $cliente->where('id_clientes', $idCliente[0])->findColumn('clientes_fiscal_rfc');
			

			$datos['id_clientes'] = $idCliente[0];
			$datos['id_orden_pagos'] = $ClaveVenta;
			$datos['comprobantes_status'] = $status[0];
			$datos['comprobantes_fecha_orden'] = $fecha_orden[0];
			$datos['comprobantes_concepto'] = $concepto[0];
			$datos['comprobantes_total'] = $pagoMes;
			$datos['comprobantes_metodo_pago'] = $metodo;
			$datos['comprobante_rfc_cliente'] = $cliente_rfc[0];


			$comprobantes = new ComprobantesModel();


			//echo $ClaveVenta;
			// $msjpaypal = "";
			// $msj = "";
			if ($state == 'approved') {

				$state = 2;
				$data['id_status_pago'] = $state;

				if ($pagoMes > 0) {

					$total_nuevo = ($pagoMes - $total_N);
					$data['orden_total'] = $total_nuevo;

					if ($total_nuevo == 0) {
						$state = 3;
						$data['id_status_pago'] = $state;
					}
					if ($model->update($ClaveVenta, $data)) {
						$state = 3;
						$datos['comprobantes_status'] = $state;

						if ($comprobantes->save($datos)) {
							return redirect()->to('home')->with('comprobante', 'Comprobante guardado con exito');
						} else {
							return redirect()->to('home')->with('comprobanteError', 'No se pudo guardar el comprobante');
						}
					}
				}
			} else {
				$state = 4;
				$data['id_status_pago'] = $state;
				$data['orden_total'] = $pagoMes;
				if ($model->update($ClaveVenta, $data)) {

					return redirect()->to('home')->with('status', 'Tu pago fue rechazado');
				}
			}

			//$correo =  session('email');


			// $info = [
			// 	'title' => 'Comprobante PayPal', 'id' => $ClaveVenta, 'total' => $total_N,
			// 	'moneda' => $currency, 'msjpaypal' => $msjpaypal, 'email' => $email, 'ordenes' => $orden,
			// 	'msj' => $msj, 'correo' => $correo, 'payId' => $idPay, 'email_r' => $email_Rec, 'state' => $state, 
			// 	'cart' => $cart, 'nombre' => $nombre, 'paterno' => $paterno, 'pay_id' => $payer_id, 'status' => $status				
			// ];

			// $email = Services::email();

			// $email->setFrom('facturacion@c1550361.ferozo.com', 'Soluciones IM');
			// $email->setTo($correo);
			// $email->setSubject('Soluciones IM, Comprobante');
			// $email->setMessage(view('pages/verificador', $info));


			// if($email->send()){
			// 	return redirect()->to('home')->with('correo', "Comprobante envíado a tu correo");
			// //return $RespuestaVenta;
			// }else{
			// 	return redirect()->to('home')->with('correoFallo', "Error al envío de comprobante al correo");
			// }


		}
		return redirect()->to('login');
	}




	//--------------------------------------------------------------------

}
