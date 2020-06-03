<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br>
<div class="container">
<h1 class="text-center"><i class="fas fa-file-invoice-dollar fa-2x"></i></h1>
</div>
<br>
<div class="container">
    <div class="row">
        <?php foreach ($archivos as $archivo) : ?>
            <div class="card bg-light" style="width: 10rem;">
                <img class="card-img-top" src="/img/archivo.png" alt="PDF">
                <div class="card-body">
                    <p class="card-text text-center"> <?= $archivo['archivos_file'] ?></p>
                    <a href="<?= base_url('/uploads/comprobantes/' . $archivo['archivos_file']) ?>" target="_blank" rel="noopener noreferrer" class="text-center">Descargar</a>
                </div>
            </div>
            &nbsp; &nbsp;
        <?php endforeach ?>
    </div>
</div>

<?= $this->endSection() ?>