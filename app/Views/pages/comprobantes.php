<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container">
    <?php if (session()->get('success')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('danger')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('danger') ?>
        </div>
    <?php endif; ?>
</div>

<h1 class="text-center margen">Comprobantes</h1>

<p ><?= $msj ?></p>

<?= $this->endSection() ?>