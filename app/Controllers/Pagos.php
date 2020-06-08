<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;

use Dompdf\Dompdf;


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
			$moneda = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_moneda_de_pago');
			$fecha = $total->where('id_orden_pagos', $idOrden)->findColumn('orden_fecha_pago');

			$concepto_R = $concepto[0];
			$idVenta = (int) $idVe[0];
			$moneda_R = $moneda[0];
			$fecha_R = $fecha[0];




			$idCliente = $total->where('id_orden_pagos', $idOrden)->findColumn('id_clientes');
			$cliente = new ClientesModel();
			$correo_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_direccion_email');



			$model = new OrdenpagosModel();

			$apiKey = "4Vj8eK4rloUd272L48hsrarnUA";
			$merchantId = 508029;
			$referenceCode = $idVenta . rand(20, 40);
			$amount = $pagoMes;
			$currency = "MXN";
			$extra3 = $idVenta;
			$signature = md5($apiKey . "~" . $merchantId . "~" . $referenceCode . "~" . $amount . "~" . $currency);

			$data = [
				'pagos' => $model->where('id_orden_pagos', $idOrden)->findAll(),  'title' => 'Soluciones IM', 'KEY' => 'SolucionesIM',
				'CODE' => 'AES-128-ECB', 'pagoMes' => $pagoMes, 'idVenta' => $idVenta, 'concepto' => $concepto_R,
				'apiKey' => $apiKey, 'merchantId' => $merchantId, 'referenceCode' => $referenceCode, 'amount' => $amount,
				'currency' => $currency, 'signature' => $signature, 'extra3' => $extra3, 'correo' => $correo_cliente[0],
				 'moneda' => $moneda_R, 'fecha' => $fecha_R
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
		return redirect()->to(base_url('login'));
	}

	public function deposito()
	{
		if ($this->session->logged_in) {
			$req = Services::request();
			$idOrden = $req->getPost('id_orden_stripe');

			$model = new OrdenpagosModel();
			$ordenes = $model->where('id_orden_pagos', $idOrden)->findAll();

			$data = ['title' => 'Referencia', 'id' => $idOrden, 'ordenes' => $ordenes];

			$filename = 'ficha_deposito';
			// instanciar y usar la clase dompdf
			$dompdf = new DOMPDF();
			$dompdf->loadHtml(view('pages/deposito', $data));

			// (Opcional) Configurar el tamaño y la orientación del papel
			$dompdf->setPaper('A4', 'paisaje');

			// Renderiza el HTML como PDF
			$dompdf->render();

			// Salida del PDF generador al navegador
			$dompdf->stream($filename . ".pdf", array("Attachment" => true));

			return true;
		}
		return redirect()->to(base_url('login'));
	}


	//--------------------------------------------------------------------

}
