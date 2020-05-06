<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>OrdenPago</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= base_url('admin') ?>">Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/crear-ordenes') ?>">Ordenes de pago</a>
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

    <div class="container text-center">
        <h1>Orden de Pago</h1>
    </div>
    <hr>
    <h5>Campos obligatorios</h5>
    <br>
    <div class="container-fluid">
        <form action="" method="POST">
        <div class="form-row">
        <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="id_orden_pagos" placeholder="ID Orden pagos" required="required">
                </div>
                <div class="form-group col-md-4">
                    <select id="inputState" name="id_clientes" class="form-control">
                        <option selected>ID Clientes</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select id="inputState" name="id_status_pago" class="form-control">
                        <option selected>ID Status pago</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_fecha_pago" placeholder="Orden fecha pago" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_calle" placeholder="Orden dirección calle" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_numero_exterior" placeholder="Orden dirección No.exterior" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_numero_interior" placeholder="Orden dirección No.Interior" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_colonia" placeholder="Orden dirección colonia" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_cp" placeholder="Orden dirección C.P" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_pais" placeholder="Orden dirección país" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_estado" placeholder="Orden direccion estado" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_ciudad" placeholder="Orden dirección Ciudad" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_telefono" placeholder="Orden direccin Telefonico" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_concepto" placeholder="Orden concepto" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_forma_de_pago_requerido" placeholder="Orden forma de pago requerido" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_moneda_de_pago" placeholder="Orden modena de pago" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_monto" placeholder="Orden monto" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_subtotal" placeholder="Orden subtotal" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_total" placeholder="Orden total" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_numero_de_operacion" placeholder="Orden numero de operción" required="required">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_RfcEmisorCtaOrd" placeholder="Orden RFC Emisor CtaOrd" required="required">
                </div>

            </div>
            <br>
            <div class="text-center">
                <button type="button" class="col-md-3 btn btn-primary" name="guardar">Guardar datos</butto>
            </div>

        </form>

    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>