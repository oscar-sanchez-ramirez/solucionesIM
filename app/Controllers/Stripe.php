<?php

namespace App\Controllers;



use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;
use App\Models\ComprobantesModel;



use Config\Services;

class Stripe extends BaseController
{


    public function index()
    {

        $req = Services::request();
        $id_venta = $req->getPost('id-venta');
        //$id_venta = $_GET['id'];

        $model = new OrdenpagosModel();
        $pagoTotal = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_total');
        $concepto = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_concepto');
        $venta = $model->where('id_orden_pagos', $id_venta)->findColumn('id_orden_pagos');
        $idVenta = (int) $venta[0];
        $concepto_R = $concepto[0];
        $pagoMes = (int) $pagoTotal[0];
        $idCliente = $model->where('id_orden_pagos', $id_venta)->findColumn('id_clientes');
        $status_R = $model->where('id_orden_pagos', $id_venta)->findColumn('id_status_pago');
        $fecha_orden = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_fecha_pago');
        $RfcEmisorCtaOrd = $model->where('id_orden_pagos', $id_venta)->findColumn('orden_RfcEmisorCtaOrd');
        $metodo = 2;








        while ($pagoMes > 0) {
            require '../vendor/autoload.php';

            \Stripe\Stripe::setApiKey("sk_test_wThLvIsqNPNfofKheRhOjHJt002ThKiwBj");

            $token = $_POST["stripeToken"];


            $charge = \Stripe\Charge::create([
                "amount" => $pagoMes,
                "currency" => "usd",
                "description" => "$concepto_R, ID orden: $id_venta",
                "source" => $token
            ]);

           

            $id = $charge["id"];
            $monto = $charge["amount"];
            $moneda = $charge["currency"];
            $descripcion = $charge["description"];
            $status = $charge['outcome']['network_status'];
            $seller_message = $charge['outcome']['seller_message'];
            //$card  = $charge['payment_method_details']['card']['brand'];
            $cardNumero  = $charge['payment_method_details']['card']['last4'];
            $cardTipo  = $charge['payment_method_details']['card']['network'];

            $datos['id_clientes'] = $idCliente[0];
            $datos['id_orden_pagos'] = $idVenta;
            $datos['comprobantes_status'] = $status_R[0];
            $datos['comprobantes_fecha_orden'] = $fecha_orden[0];
            $datos['comprobantes_concepto'] = $concepto_R;
            $datos['comprobantes_total'] = $pagoMes;
            $datos['comprobantes_RfcEmisorCtaOrd'] = $RfcEmisorCtaOrd[0];
            $datos['comprobantes_metodo_pago'] = $metodo;

            $comprobantes = new ComprobantesModel();




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
                        //$msj = "Pago realizado con exito";
                        $state = 3;
                        $datos['comprobantes_status'] = $state = 3;

                        if ($comprobantes->save($datos)) {

                            $comprobantes_R  = $comprobantes->where('id_orden_pagos', $id_venta)->findAll();
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
                if ($model->update($id_venta, $data)) {
                    return redirect()->to('login')->with('status', 'Tu pago fue rechazado');
                   
                }
               
            }

           
        }
        return redirect()->to('login');
    }


    //--------------------------------------------------------------------

}
