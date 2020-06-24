<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdenpagosModel;
use App\Models\ClientesModel;
use App\Models\ComprobantesModel;
use App\Models\FacturasModel;
//use Nusoap\Nusoap;
//use Cdfi\Cfdi;

require '../facturacion/vendor/autoload.php';

use Config\Services;
use nusoap_client;


class Facturacion extends BaseController
{

    public function index()
    {

        $req = Services::request();
        $idComprobante = $req->getPost('idComprobante');

        $comprobantes = new ComprobantesModel();
        $ordenes = new OrdenpagosModel();
        $clientes = new ClientesModel();

        $idComprobante = $comprobantes->where('id_comprobantes', $idComprobante)->findColumn('id_comprobantes');
        $idCliente = $comprobantes->where('id_comprobantes', $idComprobante)->findColumn('id_clientes');
        $idOrden = $comprobantes->where('id_comprobantes', $idComprobante)->findColumn('id_orden_pagos');

        $estatus = $comprobantes->where('id_comprobantes', $idComprobante[0])->findColumn('estatus');

        $condicionesPago = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('CondicionesDePago');
        $moneda = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('orden_moneda_de_pago');
        $cantidad = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('cantidad');
        $monto = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('orden_monto');
        $subtotal = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('orden_subtotal');
        $iva = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('iva');
        //  $total = $ordenes->where('id_orden_pagos', $idOrden[0])->findColumn('orden_total'); 

        $RFC = $clientes->where('id_clientes', $idCliente[0])->findColumn('clientes_fiscal_rfc');
        $razonSocial = $clientes->where('id_clientes', $idCliente[0])->findColumn('clientes_razon_social');
        $pais = $clientes->where('id_clientes', $idCliente[0])->findColumn('clientes_direccionfiscal_pais');
        $email = $clientes->where('id_clientes', $idCliente[0])->findColumn('clientes_direccion_email');

        $sub = (float) $subtotal[0];
        $iv = (float) $iva[0];
        $total = ($sub + $iv);


        $data = [
            'title' => 'Facturación', 'condicionesPago' => $condicionesPago[0], 'moneda' => $moneda[0], 'cantidad' => $cantidad[0],
            'subtotal' => $subtotal[0], 'iva' => $iva[0], 'total' => $total, 'RFC' => $RFC[0],
            'razonSocial' => $razonSocial[0], 'pais' => $pais[0], 'email' => $email[0], 'monto' => $monto[0],
            'idComprobante' => $idComprobante[0], 'idCliente' => $idCliente[0], 'idOrden' => $idOrden[0]
        ];



        if ($estatus[0] == 1) {
            return view('pages/facturacion/factura_form', $data);
        } else {
            return redirect()->to('home')->with('status', 'Tu comprobante aun no se valida');
        }
    }



    public  function GeneraCFDI()
    {
        $req = Services::request();
        $id = $req->getPost('id_comprobante');
        // var_dump($id);
        $model = new FacturasModel();
        $comprobante = $model->where('id_comprobante', $id)->findAll();
        //var_dump(count($comprobante) === 0);
        //die();
        if (count($comprobante) === 0) {
            date_default_timezone_set('America/Mexico_City');
            $startDate = strval(date("Y-m-d") . 'T' . date("H:i:s"));
            // $req = Services::request();


            $data['id_comprobante'] = $req->getPost('id_comprobante');
            $data['id_orden'] = $req->getPost('id_orden');
            $data['id_cliente'] = $req->getPost('id_cliente');
            $data['id_serie'] = $req->getPost('id_serie');
            $data['factura_folio'] = $req->getPost('factura_folio');
            $data['factura_condicionesPago'] = $req->getPost('factura_condicionesPago');
            $data['id_formapago'] = $req->getPost('id_formapago');
            $data['factura_moneda'] = $req->getPost('factura_moneda');
            $data['factura_subtotal'] = $req->getPost('factura_subtotal');
            $data['factura_iva'] = $req->getPost('factura_iva');
            $data['factura_total'] = $req->getPost('factura_total');
            $data['factura_tipoComprobante'] = $req->getPost('factura_tipoComprobante');
            $data['id_metodoPago'] = $req->getPost('id_metodoPago');
            $data['factura_lugarExpedicion'] = $req->getPost('factura_lugarExpedicion');
            $data['factura_fecha'] =  $startDate;
            $data['factura_mensajePDF'] = $req->getPost('factura_mensajePDF');
            $data['factura_RFC'] = $req->getPost('factura_RFC');
            $data['factura_razonSocial'] = $req->getPost('factura_razonSocial');
            $data['id_usocfdi'] = $req->getPost('id_usocfdi');
            $data['factura_pais'] = $req->getPost('factura_pais');
            $data['factura_email'] = $req->getPost('factura_email');
            $data['id_impuesto'] = $req->getPost('id_impuesto');
            $data['id_factor'] = $req->getPost('id_factor');
            $data['id_claveProductoServicio'] = $req->getPost('id_claveProductoServicio');
            $data['factura_cantidad'] = $req->getPost('factura_cantidad');
            $data['id_claveUnidad'] = 'E48';
            $data['factura_descripcion'] = $req->getPost('factura_descripcion');
            $data['factura_valorUnitario'] = $req->getPost('factura_valorUnitario');
            $data['factura_importe'] = $req->getPost('factura_subtotal');




            try {



                $parametros['CFDIRequest']['DatosCFDI']['Serie'] = $data['id_serie'];    // "B"     Fijo SELECT serie= "B" o C
                $parametros['CFDIRequest']['DatosCFDI']['Folio'] = $data['factura_folio'];      // 1     Fijo "1" 
                $parametros['CFDIRequest']['DatosCFDI']['CondicionesDePago'] = $data['factura_condicionesPago']; //"En una sola exhibición"  Orden * Cambiar nombre
                $parametros['CFDIRequest']['DatosCFDI']['FormadePago'] = $data['id_formapago']; // "05" Select
                $parametros['CFDIRequest']['DatosCFDI']['Moneda'] = $data['factura_moneda'];   // "MXN" Orden *
                $parametros['CFDIRequest']['DatosCFDI']['Subtotal'] = $data['factura_subtotal'];   // 1230.00 Orden *  
                $parametros['CFDIRequest']['DatosCFDI']['Total'] = $data['factura_total'];   // 1426.8 Orden * a 6  
                $parametros['CFDIRequest']['DatosCFDI']['TipodeComprobante'] = $data['factura_tipoComprobante']; // "FA" Fijo
                $parametros['CFDIRequest']['DatosCFDI']['MetodoPago'] = $data['id_metodoPago'];   //'PUE'  Fijo select
                $parametros['CFDIRequest']['DatosCFDI']['LugarDeExpedicion'] = $data['factura_lugarExpedicion'];  // "09000" Fijo * 09000
                $parametros['CFDIRequest']['DatosCFDI']['Fecha'] = $startDate;    //Fijo
                $parametros['CFDIRequest']['DatosCFDI']['MensajePDF'] = $data['factura_mensajePDF']; // "Comprobante para facturar"  Fijo o Orden "input vacio "

                $parametros['CFDIRequest']['ReceptorCFDI']['RFC'] = $data['factura_RFC'];   //"SIM120209UF9"  Cliente *
                $parametros['CFDIRequest']['ReceptorCFDI']['RazonSocial'] = $data['factura_razonSocial'];  // "Soluciones IM NET S.A DE C.V"  Cliente * o Orden 
                $parametros['CFDIRequest']['ReceptorCFDI']['UsoCfdi'] = $data['id_usocfdi'];   // "I04"  Fijo Select default por definir
                $parametros['CFDIRequest']['ReceptorCFDI']['Pais'] = $data['factura_pais'];    //"MEXICO" Cliente *
                $parametros['CFDIRequest']['ReceptorCFDI']['Email'] = $data['factura_email'];  //"cnavarro@soluciones.net" Cliente *

                $Traslado['Base'] = $data['factura_subtotal'];    //1230.00 * Orden number_format($data['factura_valorUnitario'],2)
                $Traslado['Impuesto'] = $data['id_impuesto'];   //002' Preguntar ??????????????
                $Traslado['TipoFactor'] = $data['id_factor'];  // 'Tasa' Cuota
                $Traslado['TasaOCuota'] = 0.160000;  //  0.160000
                $Traslado['Importe'] = $data['factura_iva'];   // 196.8 * Orden $data['factura_iva']

                $conceptosDatos = array(array(
                    'ClaveProdServ' => $data['id_claveProductoServicio'],   // 81111503 ????????
                    'Cantidad' => $data['factura_cantidad'],             // 1.0 Orden *
                    'claveUnidad' => 'E48',        // 'E48'  ??????
                    'Descripcion' => $data['factura_descripcion'],  // "Equipo de computo" Texto
                    'ValorUnitario' =>  $data['factura_valorUnitario'],        /// 1230.00 Orden * monto $data['factura_valorUnitario']
                    'Importe' => $data['factura_subtotal']    // 1230.00  Orden * monto   $data['factura_valorUnitario']
                ));

                foreach ($conceptosDatos as $concepto => $value) {
                    $parametros['CFDIRequest']['ConceptosCFD']['Conceptos']['ConceptoCFDI'][$concepto] = $value;
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
                    //die();
                }
                // Llamar a la funcion GeneraCFD del servidor
                $result = $cliente->call($metodoALlamar, $parametros, "uri:$serverURL/$serverScript", "uri:$serverURL/$serverScript/$metodoALlamar");
                //var_dump($result['GeneraCFDIV33Result']['ErrorCFDI']);
                //$result . soap_fault::class;
                // Analizando rsultados
                if ($cliente->fault) {
                    echo '<b>Error: ';
                    print_r($result);
                    echo '</b>';
                } else {
                    $error = $cliente->getError();

                    if ($result['GeneraCFDIV33Result']['CFDICorrecto'] == "false") {
                        echo '<b style="color: red">Error encontrado: ' . $result['GeneraCFDIV33Result']['ErrorCFDI'] . '</b>';
                    } else {
                        // Creando el archivo XML

                        $idC = $data['id_comprobante'];
                        file_put_contents("/var/www/html/solu-ecom/public/uploads/XML/Mixml($idC).xml", $result['GeneraCFDIV33Result']['XMLCFDI']);
                        $nombre = "Mixml($idC).xml";
                        $UUID = $result['GeneraCFDIV33Result']['UUID'];
                        $data['factura_uuid'] = $UUID;
                        $data['factura_XML'] = "Mixml($idC).xml";
                        $data['factura_PDF'] =  "miPDF($UUID).pdf";
                        $model = new FacturasModel();
                        if ($model->save($data)) {
                            $datos = ['facturas' => $model->where('id_cliente', $data['id_cliente'])->findAll(), 'title' => 'Facturas'];
                           

                            return view('pages/facturacion/pdf', $datos);
                        } else {
                            return redirect()->to(base_url('home'))->with('correoFallo', 'No se pudo generar tu factura');
                        }
                    }
                }
            } catch (Exception $e) {
                echo $e;
                return false;
            }
        }
        return redirect()->to(base_url('home'))->with('correoFallo', 'Este comprobante ya fue facturado');
    }




    public  function GeneraPDF()
    {

        // $UUID =  $_GET['uuid']; //post
        // $xml = $_GET['xml'];
        $req = Services::request();
        $UUID = $req->getPost('uuid');

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
                    $id = $UUID;
                    // Creando el archivo PDF
                    $file_name = "miPDF($id).pdf";
                    $data = base64_decode($result['GeneraPDFCFDIV33Result']['PDF']);
                    file_put_contents("/var/www/html/solu-ecom/public/uploads/PDF/" . $file_name, $data);

                    // $info = ['title' => "Facturación", 'pdf' => $file_name, 'xml' => $xml];
                    // return view('pages/facturacion/pdf', $info);
                    $rutaArchivo = "/var/www/html/solu-ecom/public/uploads/PDF/" . $file_name;
                    $file_name = basename($rutaArchivo);

                    # Algunos encabezados que son justamente los que fuerzan la descarga
                    header('Content-Type: application/octet-stream');
                    header("Content-Transfer-Encoding: Binary");
                    header("Content-disposition: attachment; filename=$file_name");
                    # Leer el archivo y sacarlo al navegador
                    readfile($rutaArchivo);
                }
            }
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function downXML()
    {
        $req = Services::request();
        $file_name = $req->getPost('xml');

        $rutaArchivo = "/var/www/html/solu-ecom/public/uploads/XML/" . $file_name;
        ob_start();
        ob_get_contents();
        ob_end_clean();

        $file_name = basename($rutaArchivo);

        # Algunos encabezados que son justamente los que fuerzan la descarga
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=$file_name");
        // # Leer el archivo y sacarlo al navegador
        readfile($rutaArchivo);
        exit(0);
    }
}
