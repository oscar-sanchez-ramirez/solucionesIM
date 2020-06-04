<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br>
    <div class="container col-md-4">
        <?php if (session()->get('success')) : ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
                <p class="text-center"><?= session()->get('success') ?></p>
            </div>
        <?php endif; ?>
        <?php if (session()->get('danger')) : ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    &times;
                </button>
                <p class="text-center"><?= session()->get('danger') ?></p>
            </div>
        <?php endif; ?>
    </div>


<br>
<div class="container">
    <div class="col-md-12"> <br>
        <div class="text-center">
            <h1 class=""><i class="fas fa-file-invoice-dollar fa-2x"></i></h1>
        </div>
        <div class="row" style="margin-top: 50px;">


            <?php foreach ($archivos as $archivo) : ?>

                <div class="card sombra bg-light" style="width: 10rem; margin-top: 13px;">
                    <img class="card-img-top" src="/img/archivo.png" alt="Card image cap">
                    <div class="card-body ">
                        <p class="card-text"><?= $archivo['archivos_file'] ?></p>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#<?= $archivo['id_archivos'] ?>" style="color: white">
                            Mostrar
                        </a>

                        <div class="modal fade" id="<?= $archivo['id_archivos'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLongTitle">Soluciones <span class="text-success">IM</span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <div class="" style="width: 22rem;">
                                            <img class="card-img-top img-fluid" src="#" alt="Card image cap">
                                        </div> -->

                                        <p style="text-align: justify;" align="justify"><?= $archivo['archivos_descripcion'] ?></p>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-check form-check-inline">
                                            <form action="<?= base_url('comprobantes/delete') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $archivo['id_archivos'] ?>">
                                                <input type="submit" value="Eliminar" class="btn btn-danger">
                                            </form>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <a href="<?= base_url('/uploads/comprobantes/' . $archivo['archivos_file']) ?>" class="btn btn-success" target="_blank" rel="noopener noreferrer">Descargar</a>
                                        </div>
                                        <br> <br>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                &nbsp &nbsp
            <?php endforeach ?>
        </div>
    </div>
    <br>
</div>
<br><br>
<?= $this->endSection() ?>