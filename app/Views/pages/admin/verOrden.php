<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<head>


    <?php foreach ($ordenes as $orden) : ?>

        <div class="container card" id="card">

            <h2 style="text-align: center">Datos de orden de pagos </h2><br>
            <div class="card-body">
            <div class="text-center">
                    <div class=row>
                        <div class="col-sm-4"> <strong>Fecha de pago</strong>
                            <p><?= $orden['orden_fecha_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Concepto</strong>
                            <p><?= $orden['orden_concepto'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Forma de pago requerido</strong>
                            <p><?= $orden['orden_forma_de_pago_requerido'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Moneda de pago</strong>
                            <p><?= $orden['orden_moneda_de_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Cantidas</strong>
                            <p>$ <?= $orden['cantidad'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Monto</strong>
                            <p><?= $orden['orden_monto'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Subtotal</strong>
                            <p>$ <?= $orden['orden_subtotal'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>IVA</strong>
                            <p>$ <?= $orden['iva'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Total</strong>
                            <p><?= $orden['orden_total'] ?> </p>
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