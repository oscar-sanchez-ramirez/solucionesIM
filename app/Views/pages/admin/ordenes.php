<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<style>
    .my-custom-scrollbar {
        position: relative;
        height: 500px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
</style>
<br>
<h1 class="text-center margen"><i class="fas fa-shopping-cart fa-2x"></i></h1>
<br>
<div class="container">
    <?php if (session()->get('delete')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('delete') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('danger')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('danger') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('correo')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('correo') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('FalloCorreo')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('FalloCorreo') ?>
        </div>
    <?php endif; ?>

</div>
<div class="container-fluid">
    <input class="form-control col-md-3 light-table-filter " data-table="order-table" type="text" placeholder="Buscar..">
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar som-tabla margen">
        <table class="order-table table table-bordered table-hover w-auto">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Clientes ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Fecha de pago</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Total</th>
                    <th scope="col">RFC emisor</th>
                    <th colspan="4" class="text-center">Administrador</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordenes as $orden) : ?>
                    <?php if($fecha_actual <=  strtotime(vencer($orden['orden_fecha_pago']))) : ?>

                    <tr>
                        <td><?= $orden['id_orden_pagos'] ?></td>
                        <td><?= $orden['id_clientes'] ?></td>

                        <?php if ($orden['id_status_pago'] == 1) : ?>
                            <td class="text-warning"><?php echo "Por pagar" ?></td>
                        <?php elseif ($orden['id_status_pago'] == 2) : ?>
                            <td class="text-primary"><?php echo "Aprobado" ?></td>
                        <?php elseif ($orden['id_status_pago'] == 3) : ?>
                            <td class="text-success"><?php echo "Completado" ?></td>
                        <?php elseif ($orden['id_status_pago'] == 4) : ?>
                            <td class="text-danger"><?php echo "Rechazado" ?></td>
                        <?php endif; ?>

                        <td><?= $orden['orden_fecha_pago'] ?></td>
                        <td><?= $orden['orden_concepto'] ?></td>
                        <td>$ <?= $orden['orden_total'] ?></td>
                        <td><?= $orden['orden_RfcEmisorCtaOrd'] ?></td>
                        <td>
                            <form action="<?= base_url('admin/emailOrdenes') ?>" method="POST">
                                <input type="hidden" name="idOrden" value="<?= $orden['id_orden_pagos'] ?>">
                                <button class="btn btn-success  btn-sm" onclick="return confirm('¿Estas seguro?')"><i class="fas fa-envelope-square"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('admin/verOrden') ?>" method="POST">
                                <input type="hidden" name="idOrden" value="<?= $orden['id_orden_pagos'] ?>">
                                <button type="submit" class="btn btn-primary  btn-sm"><i class="fas fa-eye"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('admin/editarOrden') ?>" method="POST">
                                <input type="hidden" name="idOrden" value="<?= $orden['id_orden_pagos'] ?>">
                                <button type="submit" class="btn btn-secondary  btn-sm" onclick="return confirm('¿Estas seguro?')"><i class="far fa-edit"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url('admin/eliminarOrden') ?>" method="POST">
                                <input type="hidden" name="idOrden" value="<?= $orden['id_orden_pagos'] ?>">
                                <button type="submit" class="btn btn-danger  btn-sm" onclick="return confirm('¿Estas seguro?')"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                        <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('components/buscador'); ?>
<?= $this->endSection() ?>