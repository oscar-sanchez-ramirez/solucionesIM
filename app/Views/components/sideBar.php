<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">Soluciones IM</a>
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
                    <input type="text" class="form-control search-menu" placeholder="Buscar...">
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
                        <span class="badge badge-pill badge-warning">Nuevo</span>
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
                        <span class="badge badge-pill badge-danger">2</span>
                    </a>
                    <div class="sidebar-submenu">
                        <br>
                        <div class="container">
                            <?php foreach ($clientes as $cliente) : ?>
                                <form action="<?= base_url('ordenes') ?>" method="POST">
                                    <input type="hidden" name="idCliente" value="<?= $cliente['id_clientes'] ?>">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-search-dollar">&nbspOrdenes</i></button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                        <ul>
                            <li>
                                <a href="<?= base_url('clientes') ?>"><i class="fas fa-digital-tachograph"></i>Datos Fiscales</a>
                            </li>
                </li>
            </ul>
        </div>
        </li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="far fa-gem"></i>
                <span>Componentes</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="#">General</a>
                    </li>
                    <li>
                        <a href="#">Paneles</a>
                    </li>
                    <li>
                        <a href="#">Tablas</a>
                    </li>
                    <li>
                        <a href="#">Iconos</a>
                    </li>
                    <li>
                        <a href="#">Formularios</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fa fa-chart-line"></i>
                <span>Graficas</span>
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
                <span>Mapas</span>
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
                <span>Documentacion</span>
                <span class="badge badge-pill badge-primary">Beta</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-calendar"></i>
                <span>Calendario</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-folder"></i>
                <span>Ejemplos</span>
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