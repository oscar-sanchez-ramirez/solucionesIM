<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="deposito.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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

        <?php foreach ($comprobantes as $comprobante) : ?>
            <table id="factura_head">
                <tr>
                    <td class="col-sm-4">
                        <div>
                            <img src="https://www.solucionesim.net/imgusr/logo_solucionesim.png" alt="" width="200px">
                        </div>
                    </td>
                    <!-- <td class="col-sm-4">
                        <div>
                            <span class="h2">FACTICOM </span>
                        </div>
                    </td> -->
                    <td class="col-sm-4">
                        <div class="round">
                            <span class="h3">Comprobante</span>
                            <p class="id_fact"><?= $comprobante['id_comprobantes'] ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <table id="factura_cliente">
                <tr>
                    <td class="info_cliente">
                        <div class="round">
                            <span class="h3">Datos</span>
                            <table class="datos_cliente">
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>No.Orden: <?= $comprobante['id_orden_pagos'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($comprobante['comprobantes_status'] == 1) : ?>
                                            <div class="col-sm-4">
                                                <p>Estatus: <?php echo "Por pagar" ?></p>
                                            </div>
                                        <?php elseif ($comprobante['comprobantes_status'] == 2) : ?>
                                            <div class="col-sm-4">
                                                <p>Estatus: <?php echo "Aprobado" ?></p>
                                            </div>
                                        <?php elseif ($comprobante['comprobantes_status'] == 3) : ?>
                                            <div class="col-sm-4">
                                                <p>Estatus: <?php echo "Completado" ?></p>
                                            </div>
                                        <?php elseif ($comprobante['comprobantes_status'] == 4) : ?>
                                            <div class="col-sm-4">
                                                <p>Estatus: <?php echo "Rechazado" ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Fecha orden: <?= fecha_formato_humano($comprobante['comprobantes_fecha_orden']) ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Concepto: <?= $comprobante['comprobantes_concepto'] ?></p>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>RfcEmisorCtaOrd: <?= $comprobante['comprobantes_RfcEmisorCtaOrd'] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Fecha: <?= fecha_formato_humano($comprobante['comprobantes_fecha']) ?></p>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <?php if ($comprobante['comprobantes_metodo_pago'] == 1) : ?>
                                            <div class="col-sm-4">
                                                <p>Método de pago: <?php echo "PayPal" ?></p>
                                            </div>
                                        <?php elseif ($comprobante['comprobantes_metodo_pago'] == 2) : ?>
                                            <div class="col-sm-4">
                                                <p>Método de pago:: <?php echo "Stripe" ?></p>
                                            </div>
                                        <?php elseif ($comprobante['comprobantes_metodo_pago'] == 3) : ?>
                                            <div class="col-sm-4">
                                                <p>Método de pago: <?php echo "PayU" ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="col-sm-4">
                                            <p>Total: <b>$ <?= number_format($comprobante['comprobantes_total'], 2) ?></b></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
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

    <div class="container col-md-4">
        <form action="<?= base_url('comprobantes/pdf') ?>" method="POST">
            <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
            <button class="btn btn-block btn-info">Generar PDF</button>
        </form>
    </div>
    <br>
    <div class="container col-md-4">
        <form action="<?= base_url('comprobantes/email') ?>" method="POST">
            <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
            <button class="btn btn-block btn-success">Enviar Correo Electrónico</button>
        </form>
    </div>

<?php endforeach; ?>
<script>
    alert("Comprobante guardado con exito");
</script>

</body>

</html>