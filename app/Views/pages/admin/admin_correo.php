<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>Soluciones IM</h1>
    <h3><?= $nombre." ".$apellidos?></h3>
    <?php foreach ($ordenes as $orden) : ?>
        <p>Fecha a pagar: <?= $orden['orden_fecha_pago'] ?></p>
        <p>ID: <?= $orden['id_orden_pagos'] ?></p>
        <p>CP: <?= $orden['orden_direccion_cp'] ?></p>
        <p>Estatus: <?= $orden['id_status_pago'] ?></p>
        <p>RFC: <?= $orden['orden_RfcEmisorCtaOrd'] ?></p>
        <p>Concepto: <?= $orden['orden_concepto'] ?></p>
        <p>Subtotal: <?= $orden['orden_subtotal'] ?></p>
        <p>Total: <?= $orden['orden_total']." ". $orden['orden_moneda_de_pago'] ?></p>
    <?php endforeach; ?>
    <a href="<?= base_url('correo').'?token='.urlencode($token) ?>">Paga ahora</a>
</body>

</html>