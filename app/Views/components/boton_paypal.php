<script src="https://www.paypalobjects.com/api/checkout.js"></script>


<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout', // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold' // gold | blue | silver | black
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
                        description: "$<?= $pagoMes ?> MXN, Concepto: <?= $concepto ?>",
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
