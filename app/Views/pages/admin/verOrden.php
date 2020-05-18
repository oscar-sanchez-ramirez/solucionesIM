<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<div class="container">
    <?php foreach ($ordenes as $orden) : ?>
        <h1><?= $orden['id_orden_pagos'] ?></h1>
        <h1><?= $orden['orden_total'] ?></h1>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>