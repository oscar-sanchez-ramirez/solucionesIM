<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container margen">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Datos de la orden de pago
                </div>
                <div class="card-body">
                    <?php foreach ($pagos as $pago) : ?>

                        <?php if ($pago['id_status_pago'] == 1) : ?>
                            <p class="text-info">Estatus: <?php echo "Por pagar" ?></p>
                        <?php elseif ($pago['id_status_pago'] == 2) : ?>
                            <p class="text-primary">Estatus: <?php echo "Aprovado" ?></p>
                        <?php elseif ($pago['id_status_pago'] == 3) : ?>
                            <p class="text-success">Estatus: <?php echo "Completado" ?></p>
                        <?php endif; ?>

                        <hr>
                        <p>Calle: <?= $pago['orden_direccion_calle'] ?>, Numero interior: <?= $pago['orden_direccion_numero_interior'] ?>, Numero exterior: <?= $pago['orden_direccion_numero_exterior'] ?></p>
                        <p>Colonia: <?= $pago['orden_direccion_colonia'] ?>, CP: <?= $pago['orden_direccion_cp'] ?></p>
                        <p>Pais: <?= $pago['orden_direccion_pais'] ?>, Estado: <?= $pago['orden_direccion_estado'] ?> Ciudad: <?= $pago['orden_direccion_ciudad'] ?></p>
                        <p>Telefono: <?= $pago['orden_direccion_telefono'] ?></p>
                        <p>Forma requerida: <?= $pago['orden_forma_de_pago_requerido'] ?></p>
                        <hr>
                        <p class="">Fecha a pagar: <?= $pago['orden_fecha_pago'] ?></p>
                        <p class="">Monto: $<?= number_format($pago['orden_monto'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?></p>
                        <p class="">Subtotal: $<?= number_format($pago['orden_subtotal'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?></p>
                        <p class="card-title">Concepto: <?= $pago['orden_concepto'] ?></p>
                    <?php endforeach; ?>

                    <hr>
                    <h4 class="card-text text-primary text-right">Total a pagar: $<?= number_format($pago['orden_total'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?></h4>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron sombra ">
                <h3 class="text-center">Soluciones <span class="text-success">IM</span></h3>
                <br>
                <div class="">

                </div>
                <hr class="my-4">
                <p class="lead text-center">Pagar: <span class="text-danger">$<?= number_format($pagoMes, 2) ?> </span><?= $pago['orden_moneda_de_pago'] ?></p>
                <div id="paypal-button-container"></div>
                <hr class="my-4">
                <div class="text-center">
                    <form action="<?= base_url('pagos/tarjeta') ?>" method="POST">
                        <input type="hidden" value="<?= $idVenta ?>" name="id_orden_stripe">
                        <button type="submit" class="btn btn-primary">Pagar con tarjeta</button>  
                    </form>
                </div>
                <hr class="my-4">

                <p class="text-center">Fecha a pagar: <?= $pago['orden_fecha_pago'] ?></p>

                <p class="text-center">Centro de atención telefonica: <br> (55) 5970 6848</p>
            </div>
        </div>

    </div>
</div>






<?= $this->endSection() ?>