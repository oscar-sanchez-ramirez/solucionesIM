<?= $this->extend('templates/home') ?>
<?= $this->section('content') ?>


<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="active">
        <h1><a href="<?= base_url('home') ?>" class="logo">F</a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
                <a href="#"><span class="fa fa-user"></span><?= session('nombre') ?></a>
            </li>
            <li>
                <a href="<?= base_url('clientes') ?>"><span class="fa fa-credit-card-alt"></span>Cliente</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-bar-chart"></span>Grafica</a>
            </li>
            <li class="active">
                <?php foreach ($clientes as $cliente) : ?>
                    <form action="<?= base_url('ordenes') ?>" method="POST">
                        <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-sm"><span class="fa fa-shopping-cart"></span> Ordenes</button>
                    </form>
                <?php endforeach; ?>
                <hr>
            </li>
            <li class="active">
                <?php foreach ($clientes as $cliente) : ?>
                    <form action="<?= base_url('comprobantes') ?>" method="POST">
                        <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                        <button type="submit" class="btn btn-primary btn-block btn-sm"><span class="fa fa-ticket"></span> Tickets</button>
                    </form>
                <?php endforeach; ?>
                <hr>
            </li>
        </ul>

        <div class="footer">
            <p class="text-center">
                Bienvenido
            </p>
        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('/perfil/signout') ?>">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2 class="mb-4 text-center">FACTICOM</h2>
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <?php if (session()->get('correo')) : ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <p class="text-center"><?= session()->get('correo') ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('correoFallo')) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <p class="text-center"><?= session()->get('correoFallo') ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('status')) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <p class="text-center"><?= session()->get('status') ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('comprobante')) : ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <?= session()->get('comprobante') ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('comprobanteError')) : ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <?= session()->get('comprobanteError') ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/paypal.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">PayPal</h6>
                            <a href="https://www.paypal.com/mx/home" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://www.paypal.com/mx/webapps/mpp/account-selection" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/payu.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">PayU</h6>
                            <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/stripe.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">Stripe</h6>
                            <a href="https://stripe.com/" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://dashboard.stripe.com/register" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>