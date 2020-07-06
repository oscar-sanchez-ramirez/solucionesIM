<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="./img/Solu.jpeg" width="30" height="30" class="d-inline-block align-top" alt="Soluciones IM">
    </a>
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('home') ?>"><i class="fa fa-home mr-3">&nbspHome</i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('clientes') ?>"><i class="fa fa-credit-card-alt mr-3">&nbspDatos Fiscales</i></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
            </ul>
        </div>
        <?php foreach ($clientes as $cliente) : ?>
            <form action="<?= base_url('ordenes') ?>" method="POST">
                <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                <a><button type="submit" class="btn btn-outline-success btn-block"><span class="fa fa-shopping-cart mr-3"> Ordenes</span></button></a>
            </form>
        <?php endforeach; ?>
        &nbsp
        <?php foreach ($clientes as $cliente) : ?>
            <form action="<?= base_url('comprobantes') ?>" method="POST">
                <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                <a><button type="submit" class="btn btn-outline-info btn-block"><span class="fa fa-ticket mr-3"> Comprobantes</span></button></a>
            </form>
        <?php endforeach; ?>
        &nbsp
        <?php foreach ($clientes as $cliente) : ?>
            <form action="<?= base_url('comprobantes/factu') ?>" method="POST">
                <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                <a><button type="submit" class="btn btn-outline-primary btn-block"><span class="fa fa-credit-card mr-3"> Facturas</span></button></a>
            </form>
        <?php endforeach; ?>
    </div>
</nav>