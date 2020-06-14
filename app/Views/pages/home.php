<?= $this->extend('templates/home') ?>
<?= $this->section('content') ?>

<!-- Page Content  -->

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="container d-none d-sm-none d-md-block">
        <br><br>
        <div class="row justify-content-center">
         <?= $this->include('components/msj-home.php') ?>
        </div>
        <div class="row justify-content-center margen">
            <div class="col-sm-8">
                <div id="carouselExampleControls" class="carousel slide sombra" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/PayPal.png" alt="PayPal" title="payPal" width="auto" height="364px">
                            <div class="opacity card-body text-center">
                                <a href="https://www.paypal.com/mx/home" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                                <a href="https://www.paypal.com/mx/webapps/mpp/account-selection" target="_blank" class="btn btn-success btn-sm">Registro</a>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/payu.jpg" alt="PayU" title="PayU" width="auto" height="364px">
                            <div class="card-body text-center">
                                <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                                <a href="https://www.payulatam.com/mx/abre-tu-cuenta/?utm_source=web&utm_medium=home&utm_term=superior&utm_content=menu&utm_campaign=tw" target="_blank" class="btn btn-success btn-sm">Registro</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/Stripe.png" alt="Stripe" title="Stripe" width="auto" height="364px">
                            <div class="card-body text-center">
                                <a href="https://stripe.com/" target="_blank" class="btn btn-primary btn-sm">Sitio Web</a>
                                <a href="https://dashboard.stripe.com/register" target="_blank" class="btn btn-success btn-sm">Registro</a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endsection() ?>