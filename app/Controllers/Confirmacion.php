<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ComprobantesModel;


use Config\Services;

class Confirmacion extends BaseController
{
    public function index()
    {


        $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
        $merchant_id = $_REQUEST['merchantId'];
        $referenceCode = $_REQUEST['referenceCode'];
        $TX_VALUE = $_REQUEST['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $_REQUEST['currency'];
        $transactionState = $_REQUEST['transactionState'];
        $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
        $firmacreada = md5($firma_cadena);
        $firma = $_REQUEST['signature'];
        $reference_pol = $_REQUEST['reference_pol'];
        $cus = $_REQUEST['cus'];
        $extra1 = $_REQUEST['description'];
        $pseBank = $_REQUEST['pseBank'];
        $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
        $transactionId = $_REQUEST['transactionId'];
        $email = $_REQUEST['buyerEmail'];
        $fecha = $_REQUEST['processingDate'];
        $extra3 = $_REQUEST['extra3'];

        $model = new OrdenpagosModel();
        $orden = $model->where('id_orden_pagos', $extra3)->findAll();
        $pagoTotal = $model->where('id_orden_pagos', $extra3)->findColumn('orden_total');
        $pagoMes = (int) $pagoTotal[0];
        $idCliente = $model->where('id_orden_pagos', $extra3)->findColumn('id_clientes');
        $status = $model->where('id_orden_pagos', $extra3)->findColumn('id_status_pago');
        $fecha_orden = $model->where('id_orden_pagos', $extra3)->findColumn('orden_fecha_pago');
        $concepto = $model->where('id_orden_pagos', $extra3)->findColumn('orden_concepto');
        $RfcEmisorCtaOrd = $model->where('id_orden_pagos', $extra3)->findColumn('orden_RfcEmisorCtaOrd');
        $metodo = 3;

        $datos['id_clientes'] = $idCliente[0];
        $datos['id_orden_pagos'] = $extra3;
        $datos['comprobantes_status'] = $status[0];
        $datos['comprobantes_fecha_orden'] = $fecha_orden[0];
        $datos['comprobantes_concepto'] = $concepto[0];
        $datos['comprobantes_total'] = $pagoMes;
        $datos['comprobantes_RfcEmisorCtaOrd'] = $RfcEmisorCtaOrd[0];
        $datos['comprobantes_metodo_pago'] = $metodo;

        $comprobantes = new ComprobantesModel();

        // $_REQUEST['transactionState'] = 6;
        if ($_REQUEST['transactionState'] == 4) {
            $estadoTx = "Transacción aprobada";
            $msj = "Estatus aprovado";
            $state = 2;
            $data['id_status_pago'] = $state;

            if ($pagoMes > 0) {
                $total_nuevo = ($pagoMes - $TX_VALUE);
                $data['orden_total'] = $total_nuevo;
                if ($total_nuevo == 0) {
                    $state = 3;
                    $data['id_status_pago'] = $state;
                    if ($model->update($extra3, $data)) {

                        //$msj = "Pago realizado con exito";
                        $state = 3;
                        $datos['comprobantes_status'] = $state = 3;

                        if ($comprobantes->save($datos)) {
                            return redirect()->to('home')->with('comprobante', 'Comprobante guardado con exito');
                        } else {
                            return redirect()->to('home')->with('comprobanteError', 'No se pudo guardar el comprobante');
                        }
                    }
                }
            }
        } else if ($_REQUEST['transactionState'] == 6) {
            $state = 4;
            $data['id_status_pago'] = $state;
            $data['orden_total'] = $pagoMes;
            if ($model->update($extra3, $data)) {
                return redirect()->to('home')->with('status', 'Tu pago fue rechazado');

                // $msj = "Tu pago fue rechazado";
            }
            $estadoTx = "Transacción rechazada";
        } else if ($_REQUEST['transactionState'] == 104) {
            $estadoTx = "Error";
        } else if ($_REQUEST['transactionState'] == 7) {
            $estadoTx = "Transacción pendiente";
        } else {
            $estadoTx = $_REQUEST['mensaje'];
        }

        // $nombre =  session('nombre');
        // $apellidos =  session('apellidos');
        // $correo =  session('email');

        // $data = [
        //     'title' => 'Confirmacion PayU', 'estadoTx' => $estadoTx, 'referenceCode' => $referenceCode,
        //     'extra1' => $extra1, 'TX_VALUE' => $TX_VALUE, 'email' => $email, 'msj' => $msj, 'firma' => $firma,
        //     'fecha' => $fecha, 'extra3' => $extra3, 'nombre' => $nombre, 'apellidos' => $apellidos,
        //     'transactionId' => $transactionId, 'moneda' => $currency, 'metodo' => $lapPaymentMethod,
        //     'ordenes' => $model->where('id_orden_pagos', $extra3)->findAll(), 'nombre' => $nombre, '$apellido' => $apellidos
        // ];


        // $email = Services::email();

        // $email->setFrom('facturacion@c1550361.ferozo.com', 'Soluciones IM');
        // $email->setTo($correo);
        // $email->setSubject('Soluciones IM, Comprobante');
        // $email->setMessage(view('pages/confirmacion', $data));

        // if ($email->send()) {
        //     return redirect()->to('home')->with('correo', "Comprobante envíado a tu correo");
        //     //return $RespuestaVenta;
        // } else {
        //     return redirect()->to('home')->with('correoFallo', "Error al envío de comprobante al correo");
        // }




        //return view('pages/confirmacion', $data);
    }
}
