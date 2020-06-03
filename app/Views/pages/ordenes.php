<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>



<div class="container margen">
  <h3 class="text-center"><i class="fas fa-shopping-cart fa-2x"></i></h3>
  <input class="form-control col-md-3 light-table-filter " data-table="order-table" type="text" placeholder="Buscar..">
  <div class="table-wrapper-scroll-y my-custom-scrollbar som-tabla margen">
    <table class="order-table table table-bordered table-hover w-auto">
      <thead>
        <tr class="bg-dark text-white">
          <th scope="col">ID</th>
          <th scope="col">Fecha Pago</th>
          <th scope="col">Estatus</th>
          <th scope="col">Pagos</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ordenes as $orden) : ?>
        <?php if($fecha_actual <=  strtotime(vencer($orden['orden_fecha_pago']))) : ?>
          <tr>
            <td><?= $orden['id_orden_pagos'] ?></td>
            <td><?= fecha_formato_humano($orden['orden_fecha_pago']); ?></td>

            <?php if ($orden['id_status_pago'] == 1) : ?>
              <td class="text-warning"><?php echo "Por pagar" ?></td>
            <?php elseif ($orden['id_status_pago'] == 2) : ?>
              <td class="text-primary"><?php echo "Aprobado" ?></td>
            <?php elseif ($orden['id_status_pago'] == 3) : ?>
              <td class="text-success"><?php echo "Completado" ?></td>
            <?php elseif ($orden['id_status_pago'] == 4) : ?>
              <td class="text-danger"><?php echo "Rechazado" ?></td>
            <?php endif; ?>

            <td class="text-center">
              <form action="<?= base_url('pagos') ?>" method="POST">
                <input type="hidden" name="id_orden" value="<?= $orden['id_orden_pagos'] ?>">
                <button type="submit" class="btn btn-primary btn-block sombra"><i class="fas fa-dollar-sign">&nbsp<?= $orden['orden_total'] ?></i></button>
              </form>
            </td>
          </tr>
            <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<br><br>

<?= $this->include('components/buscador'); ?>

<?= $this->endSection() ?>