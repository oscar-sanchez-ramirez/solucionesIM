<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<style>
    .loading {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('/img/giphy14.gif') 50% 50% no-repeat rgb(249, 249, 249);
        opacity: .8;
        background-color: black;
    }
</style>
<div id="carga"></div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="/img/stripe.jpg" alt="Card image cap">
                <div class="card-body">
                    <form action="<?= base_url('checador') ?>" method="POST" id="payment-form">
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
                                <div id="boxLoading"></div>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="/img/social.png" alt="Card image cap">
                <div class="card-body">
                    <?php foreach ($ordenes as $orden) : ?>
                        <p>ID venta: <?= $orden['id_orden_pagos'] ?></p>
                        <p>RFC: <?= $orden['orden_RfcEmisorCtaOrd'] ?></p>
                        <p>Fecha: <?= $orden['orden_fecha_pago'] ?></p>
                        <p>Concepto: <?= $orden['orden_concepto'] ?></p>
                        <p>Total a pagar: $<?= $orden['orden_total'] ?> <?= $orden['orden_moneda_de_pago'] ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="/img/so.png" alt="Card image cap">
                <div class="card-body">
                    <p>Infomacion sobre Stripe</p>
                    <div class="form-group col-sm-4 col-sm-offset-4 text-center">
                        <button type="button" id="navegar" class="btn btn-primary" onclick="executeAjaxRequest();">Navegar</button>
                        <div id="boxLoading"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?= $this->include('components/boton_stripe') ?>

    <script>
        function executeAjaxRequest() {
            $("#boxLoading").addClass("loading")
            setTimeout(() => $("#boxLoading").removeClass("loading"), 3000);
        }
    </script>


    <?= $this->endSection() ?>