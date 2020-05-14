<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<h1 class="text-center"><i class="fas fa-user-friends">&nbspUsuarios</i></h1>
<br>
<div class="container">
    <?php if (session()->get('successUsr')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('successUsr') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('dangerUsr')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('dangerUsr') ?>
        </div>
    <?php endif; ?>
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
    <?php if (session()->get('delete')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('delete') ?>
        </div>
    <?php endif; ?>
</div>
<div class="container">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2" class="text-center">
                    <i class="fas fa-pen-square"></i>
                    <i class="fas fa-trash-alt"></i>
                </th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha de alta</th>
                <th scope="col">Rol</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td class="text-center">
                        <form action="<?= base_url('admin/actualizarUsuario') ?>" method="POST">
                            <input type="hidden" name="id_usr" value="<?= $usuario['id']  ?>">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-pen-square">&nbspEditar</i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form action="<?= base_url('admin/deleteUser') ?>" method="POST" onclick="return confirm('¿Estás seguro?');">
                            <input type="hidden" name="id_usr_d" value="<?= $usuario['id']  ?>">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt">&nbspEliminar</i></button>
                        </form>
                    </td>
                    <td><?= $usuario['id']  ?></td>
                    <td><?= $usuario['nombre']  ?></td>
                    <td><?= $usuario['apellidos']  ?></td>
                    <td><?= $usuario['email']  ?></td>
                    <td><?= $usuario['fecha']  ?></td>
                    <td>
                        <?php if ($usuario['id_rol'] == 1) : ?>
                            <?php echo "Administrador" ?>
                        <?php elseif ($usuario['id_rol'] == 2) : ?>
                            <?php echo "Cliente" ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>


<?= $this->endSection() ?>