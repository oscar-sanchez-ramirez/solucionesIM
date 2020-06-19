<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;

//use Nusoap\Nusoap;
//use Cdfi\Cfdi;

require '../facturacion/vendor/autoload.php';



use nusoap_client;

class Facturacion extends BaseController
{
  public  function GeneraCFDI()
    {

            date_default_timezone_set('America/Mexico_City');
            $startDate = strval(date("Y-m-d") . 'T' . date("H:i:s"));

            $parametros['CFDIRequest']['DatosCFDI']['Serie'] = "B"; // Fijo SELECT serie= "B" o C
            $parametros['CFDIRequest']['DatosCFDI']['Folio'] = 1; // Fijo "1" 
            $parametros['CFDIRequest']['DatosCFDI']['CondicionesDePago'] = "En una sola exhibicion";   // Orden * Cambiar nombre
            $parametros['CFDIRequest']['DatosCFDI']['FormadePago'] = "04";  // Select
            $parametros['CFDIRequest']['DatosCFDI']['Moneda'] = "MXN";  // Orden *
            $parametros['CFDIRequest']['DatosCFDI']['Subtotal'] = 1230.00;  // Orden *
            $parametros['CFDIRequest']['DatosCFDI']['Total'] = 1426.8;  // Orden * a 6 decimales
            $parametros['CFDIRequest']['DatosCFDI']['TipodeComprobante'] = "FA";  // Fijo
            $parametros['CFDIRequest']['DatosCFDI']['MetodoPago'] = 'PUE';  // Fijo select
            $parametros['CFDIRequest']['DatosCFDI']['LugarDeExpedicion'] = "09000";  // Fijo * 09000
            $parametros['CFDIRequest']['DatosCFDI']['Fecha'] = $startDate;   //Fijo
            $parametros['CFDIRequest']['DatosCFDI']['MensajePDF'] = "Comprobante para facturar"; // Fijo o Orden "input vacio "


            $parametros['CFDIRequest']['ReceptorCFDI']['RFC'] = "SIM120209UF9";  // Cliente *
            $parametros['CFDIRequest']['ReceptorCFDI']['RazonSocial'] = "Soluciones IM NET SA de CU";   //Cliente * o Orden 
            $parametros['CFDIRequest']['ReceptorCFDI']['UsoCfdi'] = "I04";    // Fijo Select default por definir
            $parametros['CFDIRequest']['ReceptorCFDI']['Pais'] = "MEXICO";   // Cliente *
            $parametros['CFDIRequest']['ReceptorCFDI']['Email1'] = "cnavarro@soluciones.net";   // Cliente *


            $Traslado['Base'] =1230.00;
            $Traslado['Impuesto'] = '002';
            $Traslado['TipoFactor'] = 'Tasa';
            $Traslado['TasaOCuota'] = 0.160000;
            $Traslado['Importe'] = 196.8;

            // $Parte['ClaveProdServ'] = '81111503';  // Fijo = 
            // $Parte['Cantidad'] = 1.0;  // input
            // $Parte['calveUnidad'] = 'E48';  // Fijo = 
            // $Parte['Descripcion'] = 'Equipo de computo';  // input vacio
            // $Parte['ValorUnitario'] = 1230.00;   // Orden 
            // $Parte['Importe'] = 1230.00;   // unitario * valorunitario

            $conceptosDatos = array(array(
                'ClaveProdServ' => '81111503',  // Fijo = 
                'Cantidad' => 1.0,   // input
                'claveUnidad' => 'E48', // Fijo = 
                'Descripcion' => "Equipo de computo", // input vacio
                'ValorUnitario' => 1230.00,  // Orden 
                'Importe' => 1230.00 )); // unitario * valorunitario
            

            foreach ($conceptosDatos as $concepto => $value) {
                $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][$concepto] = $value;
                // $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][0]['Parte']['Parte'][0] = $Parte;
                $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][0]['Traslados']['ImpuestoTrasladado'][0] = $Traslado;

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
                    $id = 5;
                    file_put_contents("/var/www/html/solu-ecom/public/uploads/XML/Mixml($id).xml", $result['GeneraCFDIV33Result']['XMLCFDI']);
                    $UUID = $result['GeneraCFDIV33Result']['UUID'];
                    $info = ['title' => 'XML', 'uuid' => $UUID];
                    //return view('pages/facturacion/index', $info);
                   return redirect()->to('GeneraPDF?uuid=' . $UUID);
                    
                }


            }
     
     
            return false;
        }
      //
    



public  function GeneraPDF(){

        $UUID =  $_GET['uuid']; //post

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
                    $id = 5;
                    // Creando el archivo PDF
                    $file_name = "miPDF($id).pdf";
                    $data = base64_decode($result['GeneraPDFCFDIV33Result']['PDF']);
                    file_put_contents("/var/www/html/solu-ecom/public/uploads/PDF/" . $file_name, $data);

                    $info = ['title' => "Facturación" , 'pdf' => $file_name];
                    return view('pages/facturacion/pdf', $info);
                    
                }
            }
        
            return false;
        
        }

      
    }

