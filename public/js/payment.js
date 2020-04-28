
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
                        total: '<?= $total ?>',
                        currency: 'MXN'
                    },
                    description: "Pago de servicios a Soluciones IM",
                    custom: "<?= $usuarios[0]['id'] ?>"
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
