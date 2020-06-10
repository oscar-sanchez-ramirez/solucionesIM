<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;
//use Nusoap\Nusoap;
//use Cdfi\Cfdi;

require '../facturacion/vendor/autoload.php';

use Config\Services;
use nusoap_client;

class Facturacion extends BaseController
{
  public  function GeneraCFDI()
    {

        try {

            date_default_timezone_set('America/Mexico_City');
            $startDate = strval(date("Y-m-d") . 'T' . date("H:i:s"));

            $parametros['CFDIRequest']['DatosCFDI']['Serie'] = "A";  
            $parametros['CFDIRequest']['DatosCFDI']['Folio'] = 0;
            $parametros['CFDIRequest']['DatosCFDI']['CondicionesDePago'] = "En una sola exhibicion";
            $parametros['CFDIRequest']['DatosCFDI']['FormadePago'] = "04";
            $parametros['CFDIRequest']['DatosCFDI']['Subtotal'] = 1230.00;
            $parametros['CFDIRequest']['DatosCFDI']['Moneda'] = "MXN";
            $parametros['CFDIRequest']['DatosCFDI']['Total'] = 1230.00;
            $parametros['CFDIRequest']['DatosCFDI']['TipodeComprobante'] = "FA";
            $parametros['CFDIRequest']['DatosCFDI']['MetodoPago'] = 'PUE';
            $parametros['CFDIRequest']['DatosCFDI']['LugarDeExpedicion'] = "56337";
            $parametros['CFDIRequest']['DatosCFDI']['Fecha'] = $startDate;
            $parametros['CFDIRequest']['DatosCFDI']['MensajePDF'] = "Comprobante para facturar";


            $parametros['CFDIRequest']['ReceptorCFDI']['RFC'] = "SIM120209UF9";
            $parametros['CFDIRequest']['ReceptorCFDI']['RazonSocial'] = "Soluciones IM NET SA de CU";
            $parametros['CFDIRequest']['ReceptorCFDI']['UsoCfdi'] = "I04";
            $parametros['CFDIRequest']['ReceptorCFDI']['Pais'] = "MEXICO";
            $parametros['CFDIRequest']['ReceptorCFDI']['Email1'] = "cnavarro@soluciones.net";



            $Parte['ClaveProdServ'] = '81111503';
            $Parte['Cantidad'] = 1.0;
            $Parte['calveUnidad'] = 'E48';
            $Parte['Descripcion'] = 'Equipo de computo';
            $Parte['ValorUnitario'] = 1230.00;
            $Parte['Importe'] = 1230.00;

            $conceptosDatos = array(array(
                'ClaveProdServ' => '81111503',
                'Cantidad' => 1.0,
                'claveUnidad' => 'E48',
                'Descripcion' => "Equipo de computo",
                'ValorUnitario' => 1230.00,
                'Importe' => 1230.00
            ));

            foreach ($conceptosDatos as $concepto => $value) {
                $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][$concepto] = $value;
                $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][0]['Parte']['Parte'][0] = $Parte;
            }



            $parametros['CFDIRequest']['Usuario'] = "demo33023@mail.com";
            $parametros['CFDIRequest']['Contrasena'] = "12345";
            $serverURL = 'http://demo.sicofi.com.mx/SicofiWS33';
            $serverScript = 'Digifact.asmx';
            $metodoALlamar = 'GeneraCFDIV33';
            $cliente = new nusoap_client("$serverURL/$serverScript?WSDL", 'wsdl');

            $error = $cliente->getError();
            if ($error) {
                echo '<pre style="color: red">' . $error . '</pre>';
                echo '<p style="color:red;' > htmlspecialchars($cliente->getDebug(), ENT_QUOTES) . '</p>';
                die();
            }
            // Llamar a la funcion GeneraCFD del servidor
            $result = $cliente->call($metodoALlamar, $parametros, "uri:$serverURL/$serverScript", "uri:$serverURL/$serverScript/$metodoALlamar");
            //$result . soap_fault::class;
            // Analizando rsultados
            if ($cliente->fault) {
                echo '<b>Error: ';
                print_r($result);
                echo '</b>';
            } else {
                $error = $cliente->getError();

                if ($result['GeneraCFDIV33Result']['CFDICorrecto'] == "false") {
                    echo '<b style="color: red">Error encontrado: ' . $error . '</b>';
                } else {
                    // Creando el archivo XML
                    $id = 3;
                    file_put_contents("/var/www/html/solu-ecom/public/XML/Mixml($id).xml", $result['GeneraCFDIV33Result']['XMLCFDI']);
                    $UUID = $result['GeneraCFDIV33Result']['UUID'];
                    $info = ['title' => 'XML', 'uuid' => $UUID];
                    //return view('pages/facturacion/index', $info);
                   return redirect()->to('GeneraPDF?uuid=' . $UUID);
                    
                }


            }
        } catch (Exception $e) {
            echo $e;
            return false;
        }
       //
    }



public  function GeneraPDF(){

        $UUID =  $_GET['uuid'];
       
        try {


            $parametros['pdfrequest']['Usuario'] = "demo33023@mail.com";
            $parametros['pdfrequest']['Contrasena'] = "12345";
            $serverURL = 'http://demo.sicofi.com.mx/SicofiWS33';
            $serverScript = 'Digifact.asmx';
            $metodoALlamar = 'GeneraPDFCFDIV33';

            $cliente = new nusoap_client("$serverURL/$serverScript?WSDL", 'wsdl');
            $parametros['pdfrequest']['UUID'] = $UUID;
            $parametros['pdfrequest']['Timbrado'] = false;
            $parametros['pdfrequest']['CFDI'] = true;




            // Obtenemos el numero de folio del XML recibido
            // Llamar a la funcion GeneraCFD del servidor
            $result = $cliente->call($metodoALlamar, $parametros, "uri:$serverURL/$serverScript", "uri:$serverURL/$serverScript/$metodoALlamar");
            // var_dump($result);
            // die();
            // Analizando resultados
            if ($cliente->fault) {
                echo '<b>Error: ';
                print_r($result);
                echo '</b>';
            } else {
                $error = $cliente->getError();

                if ($result['GeneraPDFCFDIV33Result']['PDFCorrecto'] == "false") {
                    echo '<b style="color: red">Error encontrado:' . $result['GeneraPDFCFDIV33Result']['CodigoError'] . '</b>';
                } else {

                    date_default_timezone_set('America/Mexico_City');
                    $startDate = strval(date("Y-m-d") . 'T' . date("H:i:s"));
                    $id = 3;
                    // Creando el archivo PDF
                    $file_name = "miPDF.pdf($id)";
                    $data = base64_decode($result['GeneraPDFCFDIV33Result']['PDF']);
                    file_put_contents("/var/www/html/solu-ecom/public/PDF/" . $file_name, $data);

                    $info = ['title' => "Facturación" , 'pdf' => $file_name];
                    return view('pages/facturacion/pdf', $info);
                    
                }
            }
        } catch (Exception $e) {
            echo $e;
            return false;
        
        }

      
    }
}
