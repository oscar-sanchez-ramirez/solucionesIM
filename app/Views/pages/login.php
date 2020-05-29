<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="icon" href="img/icono.ico" type="image/icon">
    <link rel="stylesheet" href="css/login.css">
    <title>FACTICOM</title>
    <style>
       
    </style>
</head>

<body style="background-image: url('img/ecom2.jpeg')">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #37517e;">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <h3 style="color: white">FACTICOM</h3>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
        </div>
    </nav>

    <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper fadeInDown">
        <div class="container col-md-3">
            <?php if (session()->get('error')) : ?>
                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                    <i class="fas fa-exclamation-triangle"></i>&nbsp<?= session()->get('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->get('correo')) : ?>
                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert">
                        &times;
                    </button>
                    <i class="fas fa-exclamation-triangle"></i>&nbsp<?= session()->get('correo') ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="img/usr.png" id="icon" alt="Usuario" />
            </div>


            <!-- Login Form -->
            <form action="<?= base_url('/perfil') ?>" method="POST" autocomplete="">
                <input type="email" id="login" class="fadeIn second" name="correo" placeholder="Correo" required=required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" minlength="4" required=required>
                <input type="submit" class="fadeIn fourth" value="Iniciar sesión">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="<?= base_url('/recover') ?>">¡Olvidé mi contraseña!</a>
            </div>

        </div>
    </div>
    <!-- <p class="text-center">© Copyright 2020 soluciones.com.net</p> -->

    <!-- Footer -->
    <footer class="page-footer font-small fixed-bottom" style="background-color: #37517e;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-white">
            © 2020 Copyright: FACTICOM
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>