<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container margen">
    <h3 class="text-center"><i class="fas fa-ticket-alt fa-2x"></i></h3>
    <input class="form-control col-md-3 light-table-filter " data-table="order-table" type="text" placeholder="Buscar..">
    <div class="table-wrapper-scroll-y my-custom-scrollbar som-tabla margen">
        <table class="order-table table table-bordered table-hover w-auto">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Vista</th>
                    <th scope="col">Total pagado</th>
                   
                    <th scope="col">ID orden</th>
                   
                    <th scope="col">Fecha</th>
                    <th scope="col">Concepto</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comprobantes as $comprobante) : ?>
                    <tr>
                        <th scope="row">
                            <form action="<?= base_url('comprobantes/show') ?>" method="POST">
                                <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
                                <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                            </form>
                        </th>
                        <th scope="row">$ <?= $comprobante['comprobantes_total'] ?></th>
                        
                        <th scope="row"><?= $comprobante['id_orden_pagos'] ?></th>
                        
                        <th scope="row"><?= fecha_formato_humano($comprobante['comprobantes_fecha']) ?></th>
                        <th scope="row"><?= $comprobante['comprobantes_concepto'] ?></th>
                       
                       

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
 
<br><br>

<?= $this->include('components/buscador'); ?>


<?= $this->endSection() ?>