<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid margen">
  <h1 class="text-center"><i class="fab fa-cc-amazon-pay fa-2x"></i></h1>
  <table class="table table-bordered table-hover sombra margen">
    <thead>
      <tr class="bg-dark text-white">
        <th scope="col">Id Orden</th>
        <th scope="col">Fecha Pago</th>
        <th scope="col">Concepto</th>
        <th scope="col">RFC</th>
        <th scope="col">Estatus</th>
        <th scope="col">Total</th>
        <th scope="col">Pagos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ordenes as $orden) : ?>
         <tr>
          <td><?= $orden['id_orden_pagos'] ?></td>
          <td><?= $orden['orden_fecha_pago'] ?></td>
          <td><?= $orden['orden_concepto'] ?></td>
          <td><?= $orden['orden_RfcEmisorCtaOrd'] ?></td>
          
          <?php if($orden['id_status_pago'] == 1) :?>
          <td class="text-info"><?php echo "Por pagar" ?></td>
          <?php elseif ($orden['id_status_pago'] == 2) : ?>
          <td class="text-primary"><?php echo "Aprovado" ?></td>
          <?php elseif ($orden['id_status_pago'] == 3) : ?>
          <td class="text-success"><?php echo "Completado" ?></td>
          <?php endif; ?>
          
          
          <td class="lead">$<?= $orden['orden_total'] ?></td>
          <td>
            <form action="<?= base_url('pagos') ?>" method="POST">
              <input type="hidden" name="id_orden" value="<?= $orden['id_orden_pagos'] ?>">
              <button type="submit" class="btn btn-secondary sombra"><i class="fas fa-search-dollar fa-2x"></i></button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



<?= $this->endSection() ?>