<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\UsuariosModel;


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


        if ($_REQUEST['transactionState'] == 4) {
            $estadoTx = "Transacción aprobada";
            $msj = "Estatus completado";
        } else if ($_REQUEST['transactionState'] == 6) {
            $estadoTx = "Transacción rechazada";
        } else if ($_REQUEST['transactionState'] == 104) {
            $estadoTx = "Error";
        } else if ($_REQUEST['transactionState'] == 7) {
            $estadoTx = "Transacción pendiente";
        } else {
            $estadoTx = $_REQUEST['mensaje'];
        }

        // echo "Estatus: " . $estadoTx . '<br>';
        // echo "Email: " . $email . '<br>';
        // echo "Firma: " . $firmacreada . '<br>';
        // echo "Descripción: " . $extra1 . '<br>';
        // echo "Monto: $" . $TX_VALUE . '<br>';
        // echo "Fecha: " . $fecha . '<br>';
        // echo "Referencia: " . $referenceCode . '<br>';

        $data = ['title' => 'Confirmacion PayU', 'estadoTx' => $estadoTx, 'referenceCode' => $referenceCode ,
         'extra1' => $extra1, 'TX_VALUE' => $TX_VALUE , 'email' => $email, 'msj' => $msj, 'firmacreada' => $firmacreada,
        'fecha' => $fecha, 'extra3' => $extra3];
        

        return view('pages/confirmacion', $data);

    }
}
