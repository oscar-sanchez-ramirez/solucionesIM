<?= $this->extend('templates/correo') ?>
<?= $this->section('content') ?>

<style>
    .sombra {
        -webkit-box-shadow: -2px 7px 5px 0px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -2px 7px 5px 0px rgba(0, 0, 0, 0.75);
        box-shadow: -2px 7px 5px 0px rgba(0, 0, 0, 0.75);
    }

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
        <div class="col-4">
            <div class="card sombra" style="width: 20rem;">
                <img class="card-img-top" src="/img/stripe.jpg" alt="Card image cap">
                <div class="card-body">

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
                                <div id="boxLoading"></div>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron sombra">
                <h3 class="text-center">Datos de la orden</h3>
                <hr>
                <?php foreach ($ordenes as $orden) : ?>
                    <p class="text-right">ID orden: <?= $orden['id_orden_pagos'] ?></p>
                    <p class="text-right">Concepto: <?= $orden['orden_concepto'] ?></p>
                    <p class="text-right">Fecha a pagar: <?= $orden['orden_fecha_pago'] ?></p>
                    <hr>
                    <p class="lead text-danger">Total a pagar: $<?= $orden['orden_total'] ?> <?= $orden['orden_moneda_de_pago'] ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <?= $this->include('components/correo_stripe') ?>

    <script>
        function executeAjaxRequest() {
            $("#boxLoading").addClass("loading")
            setTimeout(() => $("#boxLoading").removeClass("loading"), 2000);
        }
    </script>


    <?= $this->endSection() ?>