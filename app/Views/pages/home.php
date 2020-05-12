<?= $this->extend('templates/inicio') ?>
<?= $this->section('content') ?>
<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <a href="<?= base_url('home') ?>">Soluciones IM</a>
                <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="img/usr2.png" alt="User picture">
                </div>
                <div class="user-info">
                    <span class="user-name"><?= session('nombre') ?>
                        <strong><?= session('apellidos') ?></strong>
                    </span>
                    <span class="user-role">
                        <?php if (session('id_rol') == 1) : ?>
                            <?php echo "Administrador"; ?>
                        <?php elseif (session('id_rol') == 2) : ?>
                            <?php echo "Cliente"; ?>
                        <?php endif; ?>
                    </span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                            <span class="badge badge-pill badge-warning">New</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Dashboard 1
                                        <span class="badge badge-pill badge-success">Pro</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="#">Dashboard 3</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <span>E-commerce</span>
                            <span class="badge badge-pill badge-danger">3</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Products

                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('clientes') ?>">Orders</a>
                                </li>
                                <li>
                                    <a href="#">Credit cart</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="far fa-gem"></i>
                            <span>Components</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">General</a>
                                </li>
                                <li>
                                    <a href="#">Panels</a>
                                </li>
                                <li>
                                    <a href="#">Tables</a>
                                </li>
                                <li>
                                    <a href="#">Icons</a>
                                </li>
                                <li>
                                    <a href="#">Forms</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-chart-line"></i>
                            <span>Charts</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Pie chart</a>
                                </li>
                                <li>
                                    <a href="#">Line chart</a>
                                </li>
                                <li>
                                    <a href="#">Bar chart</a>
                                </li>
                                <li>
                                    <a href="#">Histogram</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-globe"></i>
                            <span>Maps</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Google maps</a>
                                </li>
                                <li>
                                    <a href="#">Open street map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                            <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
            <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">4</span>
            </a>
            <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
            </a>
            <a href="<?= base_url('/perfil/signout') ?>">
                Cerrar sesión <i class="fa fa-power-off"></i>
            </a>
        </div>
    </nav>
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