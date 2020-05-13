<!DOCTYPE html>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <title><?= $title ?></title>
</head>

<body>

    <!-- Set up a container element for the button -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Soluciones IM</a>
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
        <div class="col-md-4">
            <div class="jumbotron sombra">
                <h3 class="text-center">Soluciones <span class="text-success">IM</span></h3>
                <br>
                <div class="">

                </div>
                <hr class="my-4">
                <p class="lead text-center">Pagar: <span class="text-danger">$<?= number_format($pagoMes, 2) ?> </span><?= $pago['orden_moneda_de_pago'] ?></p>
                <div id="paypal-button-container"></div>
                <hr class="my-4">
                <div class="text-center">
                    <form action="<?= base_url('pagos/tarjeta') ?>" method="POST">
                        <input type="hidden" value="<?= $idVenta ?>" name="id_orden_stripe">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fab fa-cc-stripe">&nbspPagar con tarjeta</i></button>
                    </form>
                </div>
                <hr class="my-4">

                <p class="text-center text-info">Fecha a pagar: <?= $pago['orden_fecha_pago'] ?></p>

                <hr>

                <p class="text-center">Centro de atención telefonica: <br> (55) 5970 6848</p>
            </div>
        </div>
    </div>
</div>






<?= $this->endSection() ?>