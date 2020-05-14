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
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Novedades</h4>
                    <p>Nuevo hosting, Soporte en español y 99.9% de operatividad.
                        Seguridad para todos tus sitios con SSL gratuito. </p>
                </div>

            </div>

            <h3 class="margen"><i class="fas fa-info-circle"> E-commerce y Facturación Eletrónica</i></h3>
            <hr>
            <div class="row">
                <div class="form-group col-md-12">
                    <p class="text-secondary">Cada una de las facturas emitidas desde este sistema electrónico son enviadas automáticamente hacia cada comprador utilizando la información almacenada en el programa.<br>
                        De esta manera, se realiza una operación transparente que brinda mayor confianza a nuestros clientes.<br>
                        La globalización en la Red ha permitido la apertura de negocios en todo el mundo durante las 24 horas del día</p>
                </div>


            </div>
            <h5><i class="fas fa-cart-arrow-down">&nbspPasarelas de pagos incluidas en el sitio</i></h5>
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