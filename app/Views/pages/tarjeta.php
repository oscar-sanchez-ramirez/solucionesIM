<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

    <h1>Pago con tarjeta</h1>

   <p>Id: <?= $id ?></p>
   <p>Monto: $<?= $monto ?> <?= $moneda ?></p>
   <p>Descripcion: <?= $descripcion ?></p>
   <p>Estatus: <?= $status ?></p>
   <p>Concepto: <?= $concepto ?></p>





   <?= $this->endSection() ?>