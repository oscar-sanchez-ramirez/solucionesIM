<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style3.css"> -->
    <link rel="stylesheet" href="css/style-home.css">
</head>

<body>



    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="#" class="logo">Facticom</a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="#"><span class="fa fa-home mr-3"> Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-user mr-3"> <?= session('nombre') ?></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('clientes') ?>"><span class="fa fa-credit-card-alt mr-3"> Cliente</span></a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-bar-chart mr-3"> Grafica</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('comprobantes/subir') ?>"><span class="fa fa-upload mr-3"> Archivo</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('comprobantes/ver') ?>"><span class="fa fa-file mr-3"> Archivos</span></a>
                    </li>
                    <li>
                        <?php foreach ($clientes as $cliente) : ?>
                            <form action="<?= base_url('ordenes') ?>" method="POST">
                                <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                                <a><button type="submit" class="btn btn-success btn-block"><span class="fa fa-shopping-cart mr-3"> Ordenes</span></button></a>
                            </form>
                        <?php endforeach; ?>
                    </li>
                    <li>
                        <?php foreach ($clientes as $cliente) : ?>
                            <form action="<?= base_url('comprobantes') ?>" method="POST">
                                <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                                <a><button type="submit" class="btn btn-info btn-block"><span class="fa fa-ticket mr-3"> Comprobantes</span></button></a>
                            </form>
                        <?php endforeach; ?>
                    </li>
                    <br>
                    <li>
                        <a class="btn btn-danger btn-block" href="<?= base_url('/perfil/signout') ?>" onclick="return confirm('Estas seguro');"><span class="fa fa-sign-out mr-3"> Cerrar Sesión</span></a>
                    </li>
                </ul>
                
                <!-- <div class="mb-5">
                    <h3 class="h6 mb-3"></h3>
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div> -->

                <!-- <div class="footer">
                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    </p>
                </div> -->
                <?= $this->include('components/msj-sidebar') ?>


            </div>
        </nav>
        <?= $this->renderSection('content') ?>

    </div>




    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>



    <?= $this->renderSection('scripts') ?>

</body>

</html>