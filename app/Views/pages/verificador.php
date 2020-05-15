<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>


<div class="container col-md-4 margen">
  <div class="alert alert-success" role="alert"><?= $msj ?></div>
  <div class="card text-center sombra">
    <div class="card-header">
      <h4 class="text-success"><?= $msjpaypal ?></h4>
    </div>
    <div class="card-body">
      <h5 class="card-title">Soluciones IM</h5>
      <p class="card-text">Pago de servicios</p>
      <p class="card-text">$ <?= $total ?> <?= $moneda ?></p>
      <p class="card-text">Pagado por: <?= $email ?></p>


      <a href="#" class="btn btn-primary">Enviar comprobante</a>
    </div>
    <div class="card-footer text-muted">
      <p class="text-info">Id Orden: <?= $id ?></p>
    </div>
  </div>
</div>



<?= $this->endSection() ?>