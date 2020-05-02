<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <link rel="stylesheet" href="boots-4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
     <title><?= $title ?></title>
</head>

<body>

    <!-- Set up a container element for the button -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= session('nombre') ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('/perfil/signout') ?>">Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>







    <div class="container margen">
        <div class="jumbotron sombra">
            <h1 class="display-4 text-center">Soluciones <span class="text-success">IM</span></h1>
            <br>
            <div class="">
                <h3>Datos del cliente:</h3>


                <?php foreach ($usuarios as $usuario) : ?>
                    <h4 class="text-info"><?= $usuario['nombre'] ?> <?= $usuario['apellidos'] ?></h4>
                    <a class="" href="#"><?= $usuario['email'] ?></a> <br><br>
                    <h5 class="text-danger">Total a pagar: $<?= number_format($total, 2) ?></h5>
                <?php endforeach; ?>
            </div>
            <hr class="my-4">
            <p class="lead">Tu pago del mes: <span class="text-success">$<?= number_format($pagoMes, 2) ?></span></p>
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


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="boots-4/js/bootstrap.min.js"></script>
</body>