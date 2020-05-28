<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<head>


    <?php foreach ($ordenes as $orden) : ?>

        <div class="container card" id="card">

            <h2 style="text-align: center">Datos de orden de pagos </h2><br>
            <div class="card-body">
            <div class="text-center">
                    <div class=row>
                        <div class="col-sm-4"> <strong>Fecha de pago</strong>
                            <p><?= $orden['orden_fecha_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Concepto</strong>
                            <p><?= $orden['orden_concepto'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Forma de pago requerido</strong>
                            <p><?= $orden['orden_forma_de_pago_requerido'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Moneda de pago</strong>
                            <p><?= $orden['orden_moneda_de_pago'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Monto</strong>
                            <p><?= $orden['orden_monto'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Subtotal</strong>
                            <p><?= $orden['orden_subtotal'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Total</strong>
                            <p><?= $orden['orden_total'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>No.Operación</strong>
                            <p><?= $orden['orden_numero_de_operacion'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Moneda de pago</strong>
                            <p><?= $orden['orden_moneda_de_pago'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>RFCemisor</strong>
                            <p><?= $orden['orden_RfcEmisorCtaOrd'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Teléfono</strong>
                            <p><?= $orden['orden_direccion_telefono'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Colonia</strong>
                            <p><?= $orden['orden_direccion_colonia'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Calle</strong>
                            <p><?= $orden['orden_direccion_calle'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>No.exterior</strong>
                            <p><?= $orden['orden_direccion_numero_exterior'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>No.interior</strong>
                            <p><?= $orden['orden_direccion_numero_interior'] ?> </p>
                        </div>
                    </div>
                    
                    <div class=row>
                        <div class="col-sm-4"> <strong>Codigo postal</strong>
                            <p><?= $orden['orden_direccion_cp'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Estado No.</strong>
                            <p><?= $orden['orden_direccion_estado'] ?> </p>
                        </div>
                        <div class="col-sm-4"> <strong>Ciudad No.</strong>
                            <p><?= $orden['orden_direccion_ciudad'] ?> </p>
                        </div>
                    </div>
                    <br>
                    <div class=row>
                        <div class="col-sm-4"> <strong>País No.</strong>
                            <p><?= $orden['orden_direccion_pais'] ?> </p>
                        </div>
                        </div>
                </div>
            </div>
            </div>   
    <?php endforeach; ?>
    
</div>
</div>


<?= $this->endSection() ?>

