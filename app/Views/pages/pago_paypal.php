<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container margen">
    <div class="jumbotron sombra">
        <h1 class="display-4 text-center">Soluciones <span class="text-success">IM</span></h1>
        <br>
        <div class="">
            <h3>Pago del mes:</h3>


            <?php foreach ($pagos as $pago) : ?>
                <h4 class="text-info">Fecha: <?= $pago['orden_fecha_pago'] ?></h4>
                <h5 class="text-danger">Total a pagar:  $<?= number_format($pago['orden_total'], 2) ?></h5>
            <?php endforeach; ?>
        </div>
        <hr class="my-4">
        <p class="lead">Tu pago del mes: <span class="text-success">$<?= number_format($pagoMes,2) ?></span></p>
        <div id="paypal-button-container"></div>
        <hr class="my-4">
        <p class="text-center">Centro de atención telefonica: <br> (55) 5970 6848</p>
    </div>

</div>


<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout', // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'blue' // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'ASklWPwGBMpjsM3h-ABxGjPgAZPy_AAncwUBNzJDK1TJemQJe5n3JL3JpTpdriAW79klve9apxPYcgym',
            production: 'Afj7VNDzQUE6yURGYqAwl4WLeIYs5haUXzweOrTuCgANvfuNUhV7MDrdQ2k-jj1SCDBEvOHw3EfQGX4K'
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: '<?= $pagoMes ?>',
                            currency: 'MXN'
                        },
                        description: "$<?= $pagoMes ?> MXN, Pago de servicios a Soluciones IM",
                        custom: "<?= session('id') ?>#<?php echo openssl_encrypt($idVenta, $CODE, $KEY); ?>"
                    }]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                //window.location="verificador.php?paymentToken="+data.paymentToken
                window.location = "http://solucionesim.com.net/verificador?paymentToken=" + data.paymentToken + "&paymentID=" + data.paymentID;

                // window.alert('Pago completado');
            });
        }

    }, '#paypal-button-container');
</script>


<?= $this->endSection() ?>