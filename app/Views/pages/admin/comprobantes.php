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
<br><br>

<div class="container">

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

</div>

<div class="container margen">
    <h3 class="text-center"><i class="fas fa-ticket-alt fa-2x"></i></h3>
    <input class="form-control col-md-3 light-table-filter " data-table="order-table" type="text" placeholder="Buscar..">
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar som-tabla margen">
        <table class="order-table table table-bordered table-hover w-auto">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="2">Vista</th>
                    <th scope="col">ID Cliente</th>
                    <th scope="col">ID Orden</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Estatus</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($comprobantes as $comprobante) : ?>
                    <tr>
                        <th scope="row">
                            <form action="<?= base_url('comprobar/show') ?>" method="POST">
                                <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
                                <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                            </form>
                        </th>
                        <th scope="row">
                            <form action="<?= base_url('comprobar/comprobantes') ?>" method="POST">
                                <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
                                <button class="btn btn-success" onclick="return confirm('¿Estas seguro?')"><i class="fas fa-check-double"> Validar</i></button>
                            </form>
                        </th>
                        <th scope="row"><?= $comprobante['id_clientes'] ?></th>
                        <th scope="row"><?= $comprobante['id_orden_pagos'] ?></th>
                        <th scope="row"><?= fecha_formato_humano($comprobante['comprobantes_fecha']) ?></th>
                        <th scope="row"><?= $comprobante['comprobante_rfc_cliente'] ?></th>
                        <th scope="row">
                            <?php if($comprobante['estatus'] == 2) :?>
                            <?= 'No Comprobado' ?>
                            <?php else : ?>
                               <?= 'Comprobado' ?>
                            <?php endif; ?>   
                            </th>



                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<br><br>

<?= $this->include('components/buscador'); ?>


<?= $this->endSection() ?>