<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid margen">
    <h1 class="text-center text-primary">Datos fiscales</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Id Cliente</th>
                <th scope="col">Id Usuario</th>
                <th scope="col">Apellido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?= $cliente['id_clientes'] ?></td>
                    <td><?= $cliente['id_Usuarios'] ?></td>
                    <td><?= $cliente['clientes_apellido_paterno'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Ordenes de Pago</h1>
            <?php foreach ($clientes as $cliente) : ?>
                <div class="text-center">
                    <form action="<?= base_url('ordenes') ?>" method="POST">
                        <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>




<?= $this->endSection() ?>