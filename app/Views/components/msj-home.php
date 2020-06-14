<div class="col-md-4">
    <?php if (session()->get('correo')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <p class="text-center"><?= session()->get('correo') ?></p>
        </div>
    <?php endif; ?>
    <?php if (session()->get('correoFallo')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <p class="text-center"><?= session()->get('correoFallo') ?></p>
        </div>
    <?php endif; ?>
    <?php if (session()->get('status')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <p class="text-center"><?= session()->get('status') ?></p>
        </div>
    <?php endif; ?>
    <?php if (session()->get('comprobante')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('comprobante') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->get('comprobanteError')) : ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <?= session()->get('comprobanteError') ?>
        </div>
    <?php endif; ?>
</div>