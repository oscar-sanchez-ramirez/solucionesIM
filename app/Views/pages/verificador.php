<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>


<div class="container col-md-4 margen">
  <div class="alert alert-success text-center" role="alert">Comprobante enviado a: <?= $correo ?></div>
  <div class="card text-center sombra">
    <div class="card-header">
      <h3 class="text-success"><h4><?= $msj ?></h3>
    </div>
    <div class="card-body">
     <h4><?= $msjpaypal ?></h4>
      <p class="card-text">Pago de servicios</p>
      <p class="card-text">$ <?= $total ?> <?= $moneda ?></p>
      <p class="card-text">ID PayPal: <?= $idPay ?></p>
      <p class="card-text">Pagado por: <?= $email ?></p>

      <a class="btn btn-primary" href="<?= base_url('home') ?>">Regresar al sitio</a>
    </div>
    <div class="card-footer text-muted">
      <p class="text-info">ID Orden: <?= $id ?></p>
    </div>
  </div>
</div>

<script>
  alert('Revisa tu correo')
</script>

<?= $this->endSection() ?>