<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<br><br>
<?php foreach ($usuarios as $usuario) : ?>
    <div class="container col-md-4">
        <div class="jumbotron">
            <h3 class="text-center"><i class="fas fa-user-edit">&nbspActualizar usuario</i></h3>
            <form action="<?= base_url('/admin/updateUser') ?>" method="POST">
                <div class="">

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="<?= $usuario['nombre'] ?>" name="nombre" required=required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellido</label>
                        <input type="text" class="form-control" value="<?= $usuario['apellidos'] ?>" name="apellidos" required=required>
                    </div>
                </div>
                <input type="hidden" class="form-control" value="<?= $usuario['id'] ?>" name="id">
                <br>
                <div class="text-center">
                    <button type="submit" class="col-md-3 btn btn-success" name="guardar"><i class="far fa-save">&nbspGuardar</i></butto>
                </div>

            </form>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>