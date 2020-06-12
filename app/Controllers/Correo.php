<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;

use Dompdf\Dompdf;



use Config\Services;


class Correo extends BaseController
{
	public function index()
	{

		$token = $_GET['token'];
		// var_dump($token);
		// die();

		$CODE = 'AES-128-ECB';
		$KEY = 'SolucionesIM';
		$idOrden = openssl_decrypt($token, $CODE, $KEY);


		$total = new OrdenpagosModel();
		$pagoTotal = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_total');
		$pagoMes = (int) $pagoTotal[0];

		$id_or = new OrdenpagosModel();
		$idVe = $id_or->where('id_orden_pagos', $idOrden)->findColumn('id_orden_pagos');
		$concepto = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_concepto');
		$moneda = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_moneda_de_pago');
		$concepto_R = $concepto[0];
		$idVenta = (int) $idVe[0];

		$fecha = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_fecha_pago');


		$model = new OrdenpagosModel();

		$idCliente = $model->where('id_orden_pagos', $idOrden)->findColumn('id_clientes');
		$cliente = new ClientesModel();
		$correo_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_direccion_email');
		$rfc_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_fiscal_rfc');



		$apiKey = "4Vj8eK4rloUd272L48hsrarnUA";
		$merchantId = 508029;
		$referenceCode = $idVenta . rand(20, 40);
		$amount = $pagoMes;
		$currency = "MXN";
		$extra3 = $idVenta;
		$signature = md5($apiKey . "~" . $merchantId . "~" . $referenceCode . "~" . $amount . "~" . $currency);

		$data = [
			'pagos' => $model->where('id_orden_pagos', $idOrden)->findAll(),  'title' => 'Correo de orden', 'KEY' => 'SolucionesIM',
			'CODE' => 'AES-128-ECB', 'pagoMes' => $pagoMes, 'idVenta' => $idVenta, 'concepto' => $concepto_R,
			'apiKey' => $apiKey, 'merchantId' => $merchantId, 'referenceCode' => $referenceCode, 'amount' => $amount,
			'currency' => $currency, 'signature' => $signature, 'extra3' => $extra3, 'correo' => $correo_cliente[0], 'fecha' => $fecha[0],
			'moneda' => $moneda[0], 'rfc' => $rfc_cliente[0]
		];

		$fecha_actual = strtotime(date("Y-m-d", time()));
		$fecha_entrada =  strtotime(vencer($fecha[0]));
		// var_dump($fecha_actual."<br>");
		// var_dump($fecha_entrada."<br>");
        // die(); 
        if($fecha_actual <= $fecha_entrada){
			return view('pages/correo/correo', $data) . view('components/correo_paypal', $data);
		}
		return redirect()->to('login')->with('correo', 'Tu orden expiró');
		//return $data;		
	}


	public function tarjeta()
	{

		$req = Services::request();
		$idOrdenStripe = $req->getPost('id_orden_stripe');
		//$idOrdenStripe = 118;


		$model = new OrdenpagosModel();
		$idVe = $model->where('id_orden_pagos', $idOrdenStripe)->findColumn('id_orden_pagos');
		$idVenta = (int) $idVe[0];
		$data = ['ordenes' => $model->where('id_orden_pagos', $idOrdenStripe)->findAll(), 'title' => 'Stripe', 'idVenta' => $idVenta];

		return view('pages/correo/correo_stripe', $data);
	}


	public function deposito()
	{

		$req = Services::request();
		$idOrden = $req->getPost('id_orden_stripe');
		$filename = 'comprobante_pago';


		$model = new OrdenpagosModel();
		$ordenes = $model->where('id_orden_pagos', $idOrden)->findAll();
		$idCliente = $model->where('id_orden_pagos', $idOrden)->findColumn('id_clientes');
		

		$cliente = new ClientesModel();
		$clientes_rfc = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_fiscal_rfc');
        $rfc = $clientes_rfc[0];


		$data = ['title' => 'Ficha de deposito', 'id' => $idOrden, 'ordenes' => $ordenes, 'rfc' => $rfc];

		// instanciar y usar la clase dompdf
		$dompdf = new DOMPDF();
		//$dompdf->loadHtml('Ficha de deposito: ' . $idOrden);

		$dompdf->loadHtml(view('pages/deposito', $data));

		// (Opcional) Configurar el tamaño y la orientación del papel
		$dompdf->setPaper('A4', 'paisaje');

		// Renderiza el HTML como PDF
		$dompdf->render();

		// Salida del PDF generador al navegador
		$dompdf->stream($filename . ".pdf", array("Attachment" => 1));

		return true;
	}




	//--------------------------------------------------------------------

}
