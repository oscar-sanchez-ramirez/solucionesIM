<?= $this->extend('templates/correo') ?>
<?= $this->section('content') ?>


<div id="carga"></div>



<div class="container-contact100">

    <div class="wrap-contact100 som-tabla">
        <div class="contact100-form validate-form">

            <div class="container">
                <p class="text-center text-danger"><?= "Fecha límite de pago: " . fecha_formato_humano(vencer($fecha)); ?></p>
            </div>

            <div class="container">
                <hr>
            </div>

            <div class="container">
                <div id="paypal-button-container"></div>
            </div>

            <div class="container">
                <hr>
            </div>


            <div class="container">
                <!-- <form action="<?= base_url('pagos/tarjeta') ?>" method="POST">
                    <input type="hidden" value="<?= $idVenta ?>" name="id_orden_stripe">
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fab fa-cc-stripe">&nbspPagar con Stripe</i></button>
                </form> -->
                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="fab fa-cc-stripe">&nbspPagar con Stripe</i>
                </button>
            </div>

            <div class="container">
                <hr>
            </div>

            <div class="container">
                <?= $this->include('components/correo_payu') ?>
            </div>

            <div class="container">
                <hr>
            </div>

            <div class="container">
                <form action="<?= base_url('correo/deposito') ?>" method="POST">
                    <input type="hidden" value="<?= $idVenta ?>" name="id_orden_stripe">
                    <button type="submit" class="btn btn-secondary btn-lg btn-block"><i class="far fa-file-pdf">&nbspFicha de Deposito</i></button>
                </form>
            </div>

        </div>
        <?php foreach ($pagos as $pago) : ?>
            <div class="contact100-more flex-col-c-m" style="background-image: url('img/ecom.jpg');">
                <div class="flex-w size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-map-marker"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Total a pagar: $<?= number_format($pago['orden_total'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?>
                        </span>

                        <span class="txt3">
                            Monto: $<?= number_format($pago['orden_monto'], 2) ?> <br>
                            Subtotal: $<?= number_format($pago['orden_subtotal'], 2) ?> <br>
                            Concepto: <?= $pago['orden_concepto'] ?> <br>
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Fecha a pagar: <?= fecha_formato_humano($pago['orden_fecha_pago']); ?> <br>
                        </span>

                        <span class="txt3">
                            Forma requerida: <?= $pago['orden_forma_de_pago_requerido'] ?> <br>
                            ID: <?= $pago['id_orden_pagos'] ?>
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-envelope"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Dirección
                        </span>

                        <span class="txt3">
                            Colonia: <?= $pago['orden_direccion_colonia'] ?>, CP: <?= $pago['orden_direccion_cp'] ?> <br>
                            Numero interior: <?= $pago['orden_direccion_numero_interior'] ?>, Numero exterior: <?= $pago['orden_direccion_numero_exterior'] ?>, <br>
                            Teléfono: <?= $pago['orden_direccion_telefono'] ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  " id="exampleModalLongTitle"><i class="fab fa-stripe fa-2x"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('stripe') ?>" method="POST" id="payment-form">
                    <div class="form-group">

                        <label for="card-element" class="text-primary">
                            Tarjeta de Credito o Debito
                        </label>
                        <div id="card-element" class="form-control">

                            <!-- Elements will create input elements here -->
                        </div>
                    </div>

                    <!-- Used to display form errors. -->

                    <div id="card-errors" role="alert"></div>

                    <input type="hidden" value="<?= $idVenta ?>" name="id-venta">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block do-request" id="navegar" onclick="executeAjaxRequest();">
                            Pagar
                        </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <h5 class="text-info">Total a pagar: $<?= number_format($pago['orden_total'], 2) ?> <?= $pago['orden_moneda_de_pago'] ?></h5>
            </div>

        </div>
    </div>
</div>

<div id="boxLoading"></div>

<?= $this->include('components/boton_stripe') ?>
<?= $this->include('components/spinner') ?>



<?= $this->endSection() ?>