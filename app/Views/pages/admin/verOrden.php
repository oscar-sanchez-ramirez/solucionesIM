<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>

<style>
    .card {
        -webkit-box-shadow: -1px 5px 23px -1px rgba(189, 179, 189, 1);
        -moz-box-shadow: -1px 5px 23px -1px rgba(189, 179, 189, 1);
        box-shadow: -1px 5px 23px -1px rgba(189, 179, 189, 1);
    }
</style>

<div class="container-fluid margen">

    <?php foreach ($ordenes as $orden) : ?>

        <div class="container card" id="card">
            <br>
            <h2 style="text-align: center">Orden</h2><br>
            <div class="card-body">
                <div class="text-center">
                    <div class=row>
                        <div class="col-sm-4"> <strong>ID</strong>
                            <p><?= $orden['id_orden_pagos'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Fecha de pago</strong>
                            <p><?= $orden['orden_fecha_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Concepto</strong>
                            <p><?= $orden['orden_concepto'] ?> </p>
                        </div>
                    </div>
                    <br>
                    <div class=row>
                        <div class="col-sm-4"> <strong>Moneda de pago</strong>
                            <p><?= $orden['orden_moneda_de_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Cantidas</strong>
                            <p>$ <?= $orden['cantidad'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Monto</strong>
                            <p>$ <?= $orden['orden_monto'] ?> </p>
                        </div>
                    </div>
                    <br>
                    <div class=row>
                        <div class="col-sm-4"> <strong>Subtotal</strong>
                            <p>$ <?= $orden['orden_subtotal'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>IVA</strong>
                            <p>$ <?= $orden['iva'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Total</strong>
                            <p>$ <?= $orden['orden_total'] ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"> <strong>Moneda de pago</strong>
                            <p><?= $orden['orden_moneda_de_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Condiciones de pago</strong>
                            <p><?= $orden['CondicionesDePago'] ?> </p>
                        </div>

                    </div>
                    <br>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <br><br>
</div>


<?= $this->endSection() ?>