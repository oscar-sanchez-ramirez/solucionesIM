<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;
use App\Models\ComprobantesModel;

use Dompdf\Dompdf;


use Config\Services;

class Paypal extends BaseController
{
    public function index()
    {

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



        //print_r($custom);
        // $clave = explode("#", $custom);

        $CODE = 'AES-128-ECB';
        $KEY = 'SolucionesIM';
        //$SID = $clave[0];
        //$ClaveVenta = openssl_decrypt($clave[1], $CODE, $KEY);
        $ClaveVenta = openssl_decrypt($custom, $CODE, $KEY);


        curl_close($venta);
        curl_close($Login);




        $model = new OrdenpagosModel();
        $orden = $model->where('id_orden_pagos', $ClaveVenta)->findAll();
        $pagoTotal = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_total');
        $pagoMes = (int) $pagoTotal[0];


        $idCliente = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('id_clientes');
        $cliente = new ClientesModel();
        $correo_cliente = $cliente->where('id_clientes', $idCliente)->findColumn('clientes_direccion_email');
        $status_p = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('id_status_pago');
        $fecha_orden = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_fecha_pago');
        $concepto = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_concepto');
        $RfcEmisorCtaOrd = $model->where('id_orden_pagos', $ClaveVenta)->findColumn('orden_RfcEmisorCtaOrd');
        $metodo = 1;


        $datos['id_clientes'] = $idCliente[0];
        $datos['id_orden_pagos'] = $ClaveVenta;
        $datos['comprobantes_status'] = $status_p[0];
        $datos['comprobantes_fecha_orden'] = $fecha_orden[0];
        $datos['comprobantes_concepto'] = $concepto[0];
        $datos['comprobantes_total'] = $pagoMes;
        $datos['comprobantes_RfcEmisorCtaOrd'] = $RfcEmisorCtaOrd[0];
        $datos['comprobantes_metodo_pago'] = $metodo;

        $comprobantes = new ComprobantesModel();

        $msjpaypal = "";
        $msj = "";
        if ($state == 'approved') {

            $msjpaypal = "Estado: Aprobado";

            $state = 2;
            $data['id_status_pago'] = $state;

            if ($pagoMes > 0) {

                $total_nuevo = ($pagoMes - $total);
                $data['orden_total'] = $total_nuevo;

                if ($total_nuevo == 0) {
                    $state = 3;
                    $data['id_status_pago'] = $state;
                }
                if ($model->update($ClaveVenta, $data)) {

                    $state = 3;
                    $datos['comprobantes_status'] = $state;

                    if ($comprobantes->save($datos)) {
                        $comprobantes_R  = $comprobantes->where('id_orden_pagos', $ClaveVenta)->findAll();
                        $data_R = ['title' => 'Comprobante', 'comprobantes' => $comprobantes_R];


                        return view('pages/comprobante_back', $data_R);
                    } else {
                        return redirect()->to('login')->with('comprobanteError', 'No se pudo guardar el comprobante');
                    }
                }
            }
        } else {
            $state = 4;
            $data['id_status_pago'] = $state;
            $data['orden_total'] = $pagoMes;
            if ($model->update($ClaveVenta, $data)) {

                return redirect()->to('login')->with('status', 'Tu pago fue rechazado');
            }
        }

        // $correo =  $correo_cliente[0];


        // $info = [
        //     'title' => 'Comprobante PayPal', 'id' => $ClaveVenta, 'total' => $total,
        //     'moneda' => $currency, 'msjpaypal' => $msjpaypal, 'email' => $email, 'ordenes' => $orden,
        //     'msj' => $msj, 'correo' => $correo, 'payId' => $idPay, 'email_r' => $email_Rec, 'state' => $state,
        //     'cart' => $cart, 'nombre' => $nombre, 'paterno' => $paterno, 'pay_id' => $payer_id, 'status' => $status
        // ];

        // $email = Services::email();

        // $email->setFrom('facturacion@c1550361.ferozo.com', 'Soluciones IM');
        // $email->setTo($correo);
        // $email->setSubject('Soluciones IM, Comprobante');
        // $email->setMessage(view('pages/verificador', $info));



        // if ($email->send()) {

        //     return view('pages/verificador', $info);

        //     // return $RespuestaVenta;
        // } else {

        //     return redirect()->to('/login');
        // }
    }


    //--------------------------------------------------------------------

}
