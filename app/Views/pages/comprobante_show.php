<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<br><br>
<?php foreach ($comprobantes as $comprobante) : ?>
    <div class="container col-md-4">
        <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action active text-center">
                Comprobante
            </button>
            <button type="button" class="list-group-item list-group-item-action">ID: <?= $comprobante['id_comprobantes'] ?></button>
            <!-- <button type="button" class="list-group-item list-group-item-action"><?= $comprobante['id_clientes'] ?></button> -->
            <button type="button" class="list-group-item list-group-item-action">No.Orden: <?= $comprobante['id_orden_pagos'] ?></button>
            <button type="button" class="list-group-item list-group-item-action">
                <?php if ($comprobante['comprobantes_status'] == 1) : ?>
                    Estatus: <?php echo "Por pagar" ?>
                <?php elseif ($comprobante['comprobantes_status'] == 2) : ?>
                    Estatus: <?php echo "Aprobado" ?>
                <?php elseif ($comprobante['comprobantes_status'] == 3) : ?>
                    Estatus: <?php echo "Completado" ?>
                <?php elseif ($comprobante['comprobantes_status'] == 4) : ?>
                    Estatus: <?php echo "Rechazado" ?>
                <?php endif; ?>
            </button>
            <button type="button" class="list-group-item list-group-item-action">Fecha orden: <?= fecha_formato_humano($comprobante['comprobantes_fecha_orden']) ?></button>
            <button type="button" class="list-group-item list-group-item-action">Fecha: <?= fecha_formato_humano($comprobante['comprobantes_fecha']) ?></button>
            <button type="button" class="list-group-item list-group-item-action">Concepto: <?= $comprobante['comprobantes_concepto'] ?></button>
            <button type="button" class="list-group-item list-group-item-action">Total: $ <?= number_format($comprobante['comprobantes_total']) ?></button>
            <button type="button" class="list-group-item list-group-item-action">RFC: <?= $comprobante['comprobante_rfc_cliente'] ?></button>
            <button type="button" class="list-group-item list-group-item-action">
                <?php if ($comprobante['comprobantes_metodo_pago'] == 1) : ?>
                   Método de pago: <?php echo "PayPal" ?>                  
                <?php elseif ($comprobante['comprobantes_metodo_pago'] == 2) : ?>
                    Método de pago:: <?php echo "Stripe" ?>
                <?php elseif ($comprobante['comprobantes_metodo_pago'] == 3) : ?>
                    Método de pago: <?php echo "PayU" ?>
                <?php endif; ?>
            </button>
            <div>
                <div class="text-right list-group-item list-group-item-action">
                    <form action="<?= base_url('comprobantes/pdf') ?>" method="POST">
                        <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
                        <button class="btn btn-block btn-info">Generar PDF</button>
                    </form>
                </div>
            </div>
            <div>
                <div class="text-right list-group-item list-group-item-action">
                    <form action="<?= base_url('comprobantes/email') ?>" method="POST">
                        <input type="hidden" name="id_comprobante" value="<?= $comprobante['id_comprobantes'] ?>">
                        <button class="btn btn-block btn-success">Enviar Correo Electrónico</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">


    </div>

<?php endforeach; ?>
<?= $this->endSection() ?>