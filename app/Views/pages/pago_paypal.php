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


                        <hr>
                        <h4 class="card-text text-primary text-right">Total a pagar: $<?= number_format($pago['orden_total'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?></h4>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="jumbotron sombra">
                <h3 class="text-center">Soluciones <span class="text-success">IM</span></h3>
                <br>
                <div class="">

                </div>
                <hr class="my-4">
                <p class="lead text-center">Pagar: <span class="text-danger">$<?= number_format($pagoMes, 2) ?> </span><?= $pago['orden_moneda_de_pago'] ?></p>
                <hr>
                <div id="paypal-button-container"></div>
                <hr class="my-4">
                <div class="text-center">
                    <form action="<?= base_url('pagos/tarjeta') ?>" method="POST">
                        <input type="hidden" value="<?= $idVenta ?>" name="id_orden_stripe">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fab fa-cc-stripe">&nbspPagar con Stripe</i></button>
                    </form>
                </div>
                <hr class="my-4">
                <?php 
                $apiKey = "4Vj8eK4rloUd272L48hsrarnUA";
                $merchantId = 508029;
                $idV = $pago['id_orden_pagos'].rand(5, 15);
                $referenceCode = md5($idV);
                $amount = $pago['orden_total']; 
                $currency = "MXN";
                $signature = md5($apiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency);

                  
                ?>
                <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
                    <input name="merchantId" type="hidden" value="<?= $merchantId ?>">
                    <input name="accountId" type="hidden" value="512324">
                    <input name="description" type="hidden" value="Pago de hosting">
                    <input name="referenceCode" type="hidden" value="<?= $referenceCode ?>">
                    <input name="amount" type="hidden" value="<?= $amount ?>">
                    <input name="tax" type="hidden" value="0">
                    <input name="taxReturnBase" type="hidden" value="0">
                    <input name="currency" type="hidden" value="<?= $currency ?>">
                    <input name="signature" type="hidden" value="<?= $signature ?>">
                    <input name="test" type="hidden" value="1">
                    <input name="buyerEmail" type="hidden" value="oscar_sr_609@hotmail.com">
                    <input name="responseUrl" type="hidden" value="http://solucionesim.com.net/home">
                    <input name="confirmationUrl" type="hidden" value="http://solucionesim.com.net/home">
                    <!-- <input name="Submit" class="btn btn-success btn-lg btn-block" type="submit" value="Pagar con PayU"> -->
                    <button name="Submit" class="btn btn-success btn-lg btn-block" type="submit"><i class="fas fa-credit-card">&nbspPagar con PayU</i></button>
                </form>


                <hr>
                <p class="text-center text-info">Fecha a pagar: <?= $pago['orden_fecha_pago'] ?></p>
            <?php endforeach; ?>
            <hr>
            <p class="text-center">Centro de atención telefonica: <br> (55) 5970 6848</p>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection() ?>