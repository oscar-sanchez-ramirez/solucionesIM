<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="deposito.css">

    <style>
        @import url('fonts/BrixSansRegular.css');
        @import url('fonts/BrixSansBlack.css');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        p,
        label,
        span,
        table {
            font-family: 'BrixSansRegular';
            font-size: 11pt;



        }

        .h2 {
            font-family: 'BrixSansBlack';
            font-size: 20pt;
        }

        .h3 {
            font-family: 'BrixSansBlack';
            font-size: 14pt;
            display: block;
            background: #0a4661;
            color: #FFF;
            text-align: center;
            padding: 5px;
            margin-bottom: 5px;
        }

        #page_pdf {
            width: 78%;
            margin: 15px auto 10px auto;
        }

        #factura_head,
        #factura_cliente,
        #factura_detalle {
            width: 100%;
            margin-bottom: 30px;
        }

        .logo_factura {
            width: 15%;
        }

        .info_empresa {
            width: 50%;
            text-align: center;
        }

        .info_factura {
            width: 25%;
        }

        .info_cliente {
            width: 100%;
        }

        .datos_cliente {
            width: 100%;
        }

        .datos_cliente tr td {
            width: 50%;
        }

        .datos_cliente {
            padding: 10px 10px 7px 20px;
        }

        .datos_cliente label {
            width: 75px;
            display: inline-block;
        }

        .datos_cliente p {
            display: inline-block;
        }

        .textright {
            text-align: right;
        }

        .textleft {
            text-align: center;
        }

        .textcenter {
            text-align: center;
        }

        .round {
            border-radius: 10px;
            border: 1px solid #0a4661;
            overflow: hidden;
            padding-bottom: 15px;
        }

        .round p {
            padding: 0 15px;
        }

        #factura_detalle {
            border-collapse: collapse;
            text-align: center;
        }

        #factura_detalle thead th {
            background: #058167;
            color: #FFF;
            padding: 9px;
        }

        #detalle_productos tr:nth-child(even) {
            background: #ededed;
        }

        #detalle_totales span {
            font-family: 'BrixSansBlack';
        }

        .nota {
            font-size: 8pt;
        }

        .label_gracias {
            font-family: verdana;
            font-weight: bold;
            font-style: italic;
            text-align: center;
            margin-top: 50px;
        }

        .anulada {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
        
        
    </style>

</head>

<body>
<br><br><br><br>
    <div id="page_pdf">
        <?php foreach ($ordenes as $orden) : ?>

            <table id="factura_head">
                <tr>
                    <td class="col-sm-4">
                        <div>
                            <span class="h2">FACTICOM </span>
                        </div>
                    </td>
                    <td class="col-sm-4">
                        <div class="round">
                            <span class="h3">Ficha de Deposito</span>
                                <p class="label_gracias"><?= $orden['id_orden_pagos'] ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="factura_cliente">
                <tr>
                    <td class="info_cliente">
                        <div class="round">
                            <span class="h3">Datos de la orden</span>
                            <table class="datos_cliente">
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Colonia: <?= $orden['orden_direccion_colonia'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Calle: <?= $orden['orden_direccion_calle'] ?></p>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>No.exterior: <?= $orden['orden_direccion_numero_exterior'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>No.Interior: <?= $orden['orden_direccion_numero_interior'] ?></p>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Codigo postal: <?= $orden['orden_direccion_cp'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Teléfono: <?= $orden['orden_direccion_telefono'] ?></p>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Fecha: <?= $orden['orden_fecha_pago'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>RFC: <?= $orden['orden_RfcEmisorCtaOrd'] ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Forma de pago: <?= $orden['orden_forma_de_pago_requerido'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Moneda : <?= $orden['orden_moneda_de_pago'] ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="factura_cliente">
                <tr>
                    <td class="info_cliente">
                        <div class="round">
                            <span class="h3">Datos Bancarios</span>
                            <table class="datos_cliente">
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Subtotal: <?= $orden['orden_subtotal'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Total a pagar: <?= $orden['orden_total'] ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Cuenta: 43456 35678 94512 45321</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Referencia: Soluciones IM</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>



        <div>
            <p class="label_gracias">
                San Pablo Iztapalapa Calle.Estrella #4 102-B <br>
                Teléfono: +(52)59706848 <br>
                correo: cnavarro@solucionesim.net
            </p>
        </div>
    </div>

</body>

</html>