<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid margen">
  <h1 class="text-center text-primary">Ordenes de pago</h1>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Pagos</th>
        <th scope="col">Id Cliente</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ordenes as $orden) : ?>
        <tr>
          <td>
            <form action="<?= base_url('pagos') ?>" method="POST">
              <input type="hidden" name="id_orden" value="<?= $orden['id_orden_pagos'] ?>">
              <button type="submit" class="btn btn-success">Ver Pago</button>
            </form>
          </td>
          <td><?= $orden['id_clientes'] ?></td>
          <td>$<?= $orden['orden_total'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



<?= $this->endSection() ?>