<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<br><br>
<div class="container col-md-4">
    <?php if (!empty($msj['email'])) : ?>
        <div class="alert alert-danger">
            <p class="text-center"><i class="fas fa-info-circle">&nbsp&nbsp<?= $msj['email'] ?></i></p>
        </div>
    <?php endif ?>
</div>

<br><br>
<div class="container">
    <div class="jumbotron">
    <h3 class="text-center"><i class="fas fa-user-plus">&nbspRegistro de usuario</i></h3> 
    <br>
        <form action="<?= base_url('/admin/saveUsuario') ?>" method="POST">
            <div class="container">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre" required=required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellidos">Apellido</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Ingresar apellidos" required=required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="soluciones@hotmail.com" required=required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Rol de usuario</label>
                        <select id="inputState" name="id_rol" class="form-control">
                            <?php foreach ($rols as $rol) : ?>
                                <option value="<?= $rol['id'] ?>"><?= $rol['rol'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Ingrese la password" minlength="4" required=required>
                        <small class="text-muted">
                            Debe contener 4 o más caracteres.
                        </small>
                    </div>
                </div>

                <br>
                <div class="text-center">
                    <button type="submit" class="col-md-3 btn btn-success" name="guardar"><i class="far fa-save">&nbspGuardar</i></butto>
                </div>

        </form>
    </div>
</div>


<?= $this->endSection() ?>