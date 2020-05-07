<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<div class="container text-center">
    <h1>Usuario</h1>
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
<form action="<?= base_url('/admin/save-usuarios') ?>" method="POST">
    <div class="container">

        <div class="form-row">
            <!-- <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" name="id" placeholder="ID" required="required">
                </div> -->
            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required=required>
            </div>
            <div class="form-group col-md-6">
                <label for="apellidos">Apellido</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required=required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="soluciones@hotmail.com" required=required>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="ingrese su password" required=required>
                <small id="passwordHelpInline" class="text-muted">
                    Debe tener entre 8 y 20 caracteres.
                </small>
            </div>
            <!-- <div class="form-group col-md-6">
                    <input type="hidden" class="form-control" name="fecha" placeholder="" required="required">
                </div> -->
            <div class="form-group col-md-6">
                <label for="password">Rol</label>
                <select id="inputState" name="id_rol" class="form-control" required=required>
                    <option selected>seleccionar</option>
                    <?php foreach($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>"><?= $rol['rol'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <br><br>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
        </div>

</form>
</div>

<?= $this->endSection() ?>