<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 py-5 px-5 d-flex flex-column justify-content-center login__form
        min-vh-100">
                <h1>Iniciar Sesión</h1>
                <form action="<?= base_url('/perfil') ?>" class="form d-flex flex-column justify-content-center" method="post">

                    <div class="form-label-group">
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Correo">
                        <!-- <label for="correo" class="label">Correo</label> -->
                    </div>
                    <br><br>
                    <div class="form-label-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                        <!-- <label for="password" class="label">Contraseña</label> -->
                    </div>
                
                    <div class="form-group text-right">
                        <a href="<?= base_url('/recover') ?>" class="link">¡Olvidé mi contraseña!</a>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill mt-4">Iniciar sesión</button>
                </form>
            </div>
            <div class="col-lg-8 login__decoration min-vh-100">
            </div>
        </div>
    </div>

</body>

</html>