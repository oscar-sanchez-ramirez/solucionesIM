<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="/img/stripe.jpg" alt="Card image cap">
                <div class="card-body">
                    <form action="<?= base_url('pagos/stripe') ?>" method="POST" id="payment-form">
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
                            <button class="btn btn-primary btn-lg btn-block">
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


<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_ukPXouO5CkeuyuJBmGnPB4iL00Bna7txGq');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
  

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>

<?= $this->endSection() ?>