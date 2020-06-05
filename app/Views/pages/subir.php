<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br><br>
<div class="container col-md-4">
    <?php if (session()->get('archivo')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <p class="text-center"><?= session()->get('archivo') ?></p>
        </div>
    <?php endif; ?>
</div>
<div class="container col-md-4 ">
    <div class="jumbotron">
        <form action="<?= base_url('comprobantes/guardar') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="FormControlInput1">Comentario</label>
                <input type="text" class="form-control" name="archivos_descripcion" placeholder="">
                <input type="hidden" class="form-control" name="id_usuario" value="<?= session('id') ?>">
            </div>
            <div class="text-center">
                <label for="file-upload" id="subir">
                    <p id="info" class="text-info"></p>
                    <p class="btn btn-secondary"><i class="fas fa-cloud-upload-alt"> Archivo</i></p>
                </label>
                <input type="file" id="file-upload" onchange="cambiar()" name="archivos_file" style='display: none;' required=required>
            </div>
            <br>
            <div class="text-center">
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </form>
    </div>
</div>

<?= $this->include('components/subir.php') ?>


<?= $this->endSection() ?>