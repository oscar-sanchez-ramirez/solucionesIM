<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img alt="Soluciones IM" src="https://www.solucionesim.net/imgusr/logo_solucionesim.png" width="150px">
        </a>
    </div> 
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('home') ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <h6><a class="nav-link" href="<?= base_url('home') ?>"><i class="fas fa-home">&nbspHome</i><span class="sr-only">(current)</span></a></h6>
                </li>
                <li class="nav-item">
                    <h6><a class="nav-link" href="<?= base_url('clientes') ?>"><i class="fas fa-digital-tachograph">&nbspDatos Fiscales</i></a></h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
        <div class="dropdown right">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h6><i class="fas fa-user">&nbsp<?= session('nombre') ?></i></h6>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" id="Iniciar_sesion" href="<?= base_url('/perfil/signout') ?>"><i class="fas fa-sign-out-alt">&nbspSalir</i></a>
            </div>
        </div>
    </div>
</nav>