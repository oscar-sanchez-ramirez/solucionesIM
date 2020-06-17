<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br><br>
<div class="container-fluid margen">

    <?php foreach ($comprobantes as $comprobante) : ?>

        <div class="container card" id="card">
            <h2 class="text-center margen">Comprobante</h2>
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-4"><strong>ID</strong>
                            <nav><?= $comprobante['id_comprobantes'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>ID Cliente</strong>
                            <nav><?= $comprobante['id_clientes'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>No.Orden</strong>
                            <nav><?= $comprobante['id_orden_pagos'] ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>RFC</strong>
                            <nav><?= $comprobante['comprobante_rfc_cliente'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Estatus</strong>
                            <nav>
                            <?php if ($comprobante['comprobantes_status'] == 1) : ?>
                                 <?php echo "Por pagar" ?>
                            <?php elseif ($comprobante['comprobantes_status'] == 2) : ?>
                                 <?php echo "Aprobado" ?>
                            <?php elseif ($comprobante['comprobantes_status'] == 3) : ?>
                                 <?php echo "Completado" ?>
                            <?php elseif ($comprobante['comprobantes_status'] == 4) : ?>
                                 <?php echo "Rechazado" ?>
                            <?php endif; ?>
                        </nav>
                        </div>
                        <div class="col-sm-4"><strong>Fecha de pago</strong>
                            <nav><?= fecha_formato_humano($comprobante['comprobantes_fecha_orden']) ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Fecha limite de pago</strong>
                            <nav><?= fecha_formato_humano($comprobante['comprobantes_fecha']) ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Concepto</strong>
                            <nav><?= $comprobante['comprobantes_concepto'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Metodo de pago</strong>
                            <nav>
                            <?php if ($comprobante['comprobantes_metodo_pago'] == 1) : ?>
                                 <?php echo "PayPal" ?>                  
                            <?php elseif ($comprobante['comprobantes_metodo_pago'] == 2) : ?>
                                 <?php echo "Stripe" ?>
                            <?php elseif ($comprobante['comprobantes_metodo_pago'] == 3) : ?>
                                 <?php echo "PayU" ?>
                            <?php endif; ?>
                            </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Total</strong>
                            <nav>$ <?= number_format($comprobante['comprobantes_total']) ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Estado de estatus</strong>
                            <nav><?= $comprobante['estatus'] ?></nav>
                        </div>
                    </div>
                    
                    <br>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
</div>


<?= $this->endSection() ?>