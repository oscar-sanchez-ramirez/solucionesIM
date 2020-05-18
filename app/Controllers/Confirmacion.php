<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;

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

                        $msj = "Pago realizado con exito";
                    }
                }
            }
        } else if ($_REQUEST['transactionState'] == 6) {
            $state = 4;
            $data['id_status_pago'] = $state;
            $data['orden_total'] = $pagoMes;
            if ($model->update($extra3, $data)) {

                $msj = "Tu pago fue rechazado";
            }
            $estadoTx = "Transacción rechazada";
        } else if ($_REQUEST['transactionState'] == 104) {
            $estadoTx = "Error";
        } else if ($_REQUEST['transactionState'] == 7) {
            $estadoTx = "Transacción pendiente";
        } else {
            $estadoTx = $_REQUEST['mensaje'];
        }



        $data = [
            'title' => 'Confirmacion PayU', 'estadoTx' => $estadoTx, 'referenceCode' => $referenceCode,
            'extra1' => $extra1, 'TX_VALUE' => $TX_VALUE, 'email' => $email, 'msj' => $msj, 'firmacreada' => $firmacreada,
            'fecha' => $fecha, 'extra3' => $extra3
        ];


        return view('pages/confirmacion', $data);
    }
}
