<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container col-md-4 margen">
    <div class="alert alert-success" role="alert"><?= $msj ?></div>
    <div class="card text-center sombra">
        <div class="card-header">
            <h4 class="text-success"><?= $estadoTx ?></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">Soluciones IM</h5>
            <p class="card-text">Correo: <?= $email ?></p>
            <p class="card-text">Monto: $<?= $TX_VALUE ?></p>
            <p class="card-text">Concepto: <?= $extra1 ?></p>
            <p class="card-text">Referencia: <?= $referenceCode ?></p>
            <p class="card-text">Firma digital: <?= $firmacreada ?></p>
            <p class="card-text">Fecha de pago: <?= $fecha ?></p>         
            <a href="<?= base_url('comprobantes') ?>" class="btn btn-primary">Comprobante</a>
        </div>
        <div class="card-footer text-muted">
           <p class="text-center text-primary">ID Orden:<?= $extra3 ?> </p>
        </div>
    </div>
</div>

<?= $this->endSection() ?>