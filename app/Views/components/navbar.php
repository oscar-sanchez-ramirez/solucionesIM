<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin') ?>">Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home">&nbspHome</i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <div class="dropdown right">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-friends">&nbspUsuarios</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" id="Iniciar_sesion" href="<?= base_url('/admin/listarUsuarios') ?>"><i class="fas fa-list">&nbspListar Usuarios</i></a>
                            <a class="dropdown-item" id="Iniciar_sesion" href="<?= base_url('/admin/crearUsuario') ?>"><i class="fas fa-plus-circle">&nbspCrear Usuario</i></a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/crear-ordenes') ?>">Ordenes de pago</a>
                </li>
            </ul>
        </div>
        <div class="dropdown right">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user">&nbsp<?= session('nombre') ?></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" id="Iniciar_sesion" href="<?= base_url('/perfil/signout') ?>"><i class="fas fa-sign-out-alt">&nbspSalir</i></a>
            </div>
        </div>
    </div>
</nav>