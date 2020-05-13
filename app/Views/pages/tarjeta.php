<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<h1 class="text-center">Pago con tarjeta</h1>




<div class="container col-md-4 margen">
    <div class="alert alert-success" role="alert"><?= $msj ?></div>
    <div class="card text-center sombra">
        <div class="card-header">
            <h4 class="text-success"><?= $msjStripe ?></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Soluciones IM</h5>
            <p class="card-text">Concepto: <?= $concepto ?></p>
            <p class="card-text">$<?= $monto ?> <?= $moneda ?></p>
            <p class="card-text">Descripcion: <?= $descripcion ?></p>
            <!-- <p>Estatus: <?= $status ?></p> -->



            <a href="#" class="btn btn-primary">Enviar comprobante</a>
        </div>
        <div class="card-footer text-muted">
            <p class="text-info">Id de la venta: <?= $id ?></p>
        </div>
    </div>
</div>




<?= $this->endSection() ?>