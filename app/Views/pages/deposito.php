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

        .id_fact {
            text-align: center;
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
                            <img src="assets/img/clients/Soluciones.png" alt="" width="200px">
                        </div>
                    </td>
                    <!-- <td class="col-sm-4">
                        <div>
                            <span class="h2">FACTICOM </span>
                        </div>
                    </td> -->
                    <td class="col-sm-4">
                        <div class="round">
                            <span class="h3">Ficha de Depósito</span>
                            <p class="id_fact"><?= $orden['id_orden_pagos'] ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="factura_cliente">
                <tr>
                    <td class="info_cliente">
                        <div class="round">
                            <span class="h3">Datos de la órden</span>
                            <table class="datos_cliente">

                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Fecha límite: <?= fecha_formato_humano(vencer($orden['orden_fecha_pago'])) ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Concepto: <?= $orden['orden_concepto'] ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Moneda : <?= strtoupper($orden['orden_moneda_de_pago']) ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Cantidad: <?= $orden['cantidad'] ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Subtotal: <?= number_format($orden['orden_subtotal'], 2) ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>IVA: <?= number_format($orden['iva'], 2) ?></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Total+IVA: <b><?= number_format($orden['orden_total'], 2) ?></b></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>RFC: <?= $rfc ?></p>
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
                                            <p>Nombre: Soluciones IM.net, S.A. de C.V.</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Banco: Banamex</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p> No. de cuenta: 2027618</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>No. de Sucursal: 7003</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>CLABE: 002180700320276185</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p></p>
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
                Teléfono: +(52)55 5970-6848 <br>
                WhatsApp 55 1262 3929 <br>
                contacto@solucionesim.net <br>
                Calle Estrella #4, int 102B, San Pablo, <br>
                Iztapalapa, México CDMX, CP 09000.
            </p>
        </div>
    </div>

</body>

</html>