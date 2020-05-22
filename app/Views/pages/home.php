<?= $this->extend('templates/inicio') ?>
<?= $this->section('content') ?>
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>

    <?= $this->include('components/sideBar') ?>

    <!-- sidebar-wrapper  -->
    <main class="page-content">

        <div class="container-fluid">

            <div class="form-group col-md-12">
                <h1 class="text-center"><strong>FACT@E-COM</strong></h1>
            </div>

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
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <p class="text-center"><?= session()->get('correoFallo') ?></p>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <h5><i class="fas fa-cart-arrow-down">&nbspPasarelas de pagos con las que contamos</i></h5>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/stripe.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">Stripe</h6>
                            <a href="https://stripe.com/" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://dashboard.stripe.com/register" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/payu.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">PayU</h6>
                            <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="card rounded-0 p-0 shadow-sm">
                        <img src="img/paypal.jpg" class="card-img-top rounded-0" alt="Angular pro sidebar">
                        <div class="card-body text-center">
                            <h6 class="card-title">PayPal</h6>
                            <a href="https://www.paypal.com/mx/home" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                            <a href="https://www.paypal.com/mx/webapps/mpp/account-selection" target="_blank" class="btn btn-success btn-sm">Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- page-content" -->
</div>
<!-- page-wrapper -->
<?= $this->endSection() ?>