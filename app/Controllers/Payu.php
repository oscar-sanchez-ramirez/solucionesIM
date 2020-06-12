<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;
use App\Models\ComprobantesModel;



use Config\Services;

class Payu extends BaseController
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
        $metodo = 3;

        $cliente = new ClientesModel();
        $cliente_rfc = $cliente->where('id_clientes', $idCliente[0])->findColumn('clientes_fiscal_rfc');

        $datos['id_clientes'] = $idCliente[0];
        $datos['id_orden_pagos'] = $extra3;
        $datos['comprobantes_status'] = $status[0];
        $datos['comprobantes_fecha_orden'] = $fecha_orden[0];
        $datos['comprobantes_concepto'] = $concepto[0];
        $datos['comprobantes_total'] = $pagoMes;
        $datos['comprobantes_metodo_pago'] = $metodo;
        $datos['comprobante_rfc_cliente'] = $cliente_rfc[0];


        $comprobantes = new ComprobantesModel();

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
                            $comprobantes_R  = $comprobantes->where('id_orden_pagos', $extra3)->findAll();
                            $data_R = ['title' => 'Comprobante', 'comprobantes' => $comprobantes_R];
                            return view('pages/comprobante_back', $data_R);
                        } else {
                            return redirect()->to('login')->with('comprobanteError', 'No se pudo guardar el comprobante');
                        }
                    }
                }
            }
        } else if ($_REQUEST['transactionState'] == 6) {
            $state = 4;
            $data['id_status_pago'] = $state;
            $data['orden_total'] = $pagoMes;
            if ($model->update($extra3, $data)) {

                return redirect()->to('login')->with('status', 'Tu pago fue rechazado');
            }
            $estadoTx = "Transacción rechazada";
        } else if ($_REQUEST['transactionState'] == 104) {
            $estadoTx = "Error";
        } else if ($_REQUEST['transactionState'] == 7) {
            $estadoTx = "Transacción pendiente";
        } else {
            $estadoTx = $_REQUEST['mensaje'];
        }


        // $idCliente = $model->where('id_orden_pagos', $extra3)->findColumn('id_clientes');
        // $cliente = new ClientesModel();
        // $correo_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_direccion_email');
        // $paterno = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_apellido_paterno');
        // $clientes_nombre = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_nombre');




        // $nombre =  $clientes_nombre[0];
        // $apellidos =  $paterno[0];
        // $correo =  $correo_cliente[0];

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
        //     return view('pages/confirmacion', $data);
        //     //  return redirect()->to('home')->with('correo', "Comprobante envíado a tu correo");
        //     //return $RespuestaVenta;
        // } else {
        //     return redirect()->to('/login');
        // }




        //return view('pages/confirmacion', $data);
    }
}
