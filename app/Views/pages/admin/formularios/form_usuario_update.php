<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<div class="container text-center">
    <h1>Actualizar Usuario</h1>
</div>
<hr>

<div class="container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('danger')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('danger') ?>
        </div>
    <?php endif; ?>
</div>



<br>
<?php foreach ($usuarios as $usuario) : ?>
    <form action="<?= base_url('/admin/updateUser') ?>" method="POST">
        <div class="container">

            <input type="hidden" class="form-control" value="<?= $usuario['id'] ?>" name="id" >

            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" value="<?= $usuario['nombre'] ?>" name="nombre"  required=required>
            </div>
            <div class="form-group col-md-6">
                <label for="apellidos">Apellido</label>
                <input type="text" class="form-control" value="<?= $usuario['apellidos'] ?>" name="apellidos"  required=required>
            </div>
        </div>

        <br><br>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
        </div>

    </form>
<?php endforeach; ?>
</div>

<?= $this->endSection() ?>