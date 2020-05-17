<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>



<br><br>
<div class="container col-md-8">
    <div class="row">
        <div class="col-md-4">
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
                            <button class="btn btn-primary btn-lg btn-block do-request" onclick="return confirm('¿Estás seguro?');">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="button-text">Pagar</span><span id="order-amount"></span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="card bg-light">
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
</div>


<?= $this->include('components/boton_stripe') ?>

<?= $this->endSection() ?>