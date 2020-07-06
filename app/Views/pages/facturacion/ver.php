<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



<div class="container-fluid margen">
    
    <?php foreach ($facturas as $factura) : ?>
       <br>
        <div class="container card" id="card">
            <br>
            <h2 class="text-center margen">Factura Electrónica</h2>
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-sm-4"><strong>ID Factura</strong>
                            <nav><?= $factura['id_factura'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>ID Comprobante</strong>
                            <nav><?= $factura['id_comprobante'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>ID Orden</strong>
                            <nav><?= $factura['id_orden'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>ID Cliente</strong>
                            <nav><?= $factura['id_cliente'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Serie</strong>
                            <nav><?= $factura['id_serie'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Folio </strong>
                            <nav><?= $factura['factura_folio'] ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Condiciones de pago</strong>
                            <nav><?= $factura['factura_condicionesPago'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Forma de pago</strong>
                            <nav><?= $factura['id_formapago'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Modena</strong>
                            <nav><?= $factura['factura_moneda'] ?> </nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Subtotal</strong>
                            <nav><?= $factura['factura_subtotal'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>IVA</strong>
                            <nav><?= $factura['factura_iva'] ?> </nav>
                        </div>
                        <div class="col-sm-4"><strong>Total</strong>
                            <nav><?= $factura['factura_total'] ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Tipo de comprobante</strong>
                            <nav><?= $factura['factura_tipoComprobante'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Metodo de pago</strong>
                            <nav><?= $factura['id_metodoPago'] ?> </nav>
                        </div>
                        <div class="col-sm-4"><strong>Lugar de expendición</strong>
                            <nav><?= $factura['factura_lugarExpedicion'] ?></nav>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4"><strong>Fecha de emisión</strong>
                            <nav><?= $factura['factura_fecha'] ?></nav>
                        </div>
                        <div class="col-sm-4"><strong>Mensje en PDF</strong>
                            <nav><?= $factura['factura_mensajePDF'] ?> </nav>
                        </div>
                        <div class="col-sm-4"><strong>RFC</strong>
                            <nav><?= $factura['factura_RFC'] ?></nav>
                        </div>
                    </div>
                    
                    <br>
                            <div class="row">  
                                <div class="col-sm-4"><strong>Razón Social</strong>
                                    <nav><?= $factura['factura_razonSocial'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Uso de CFDI</strong>
                                    <nav><?= $factura['id_usoCFDI'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>País</strong>
                                    <nav><?= $factura['factura_pais'] ?></nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Email</strong>
                                    <nav><?= $factura['factura_email'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Impuesto</strong>
                                    <nav><?= $factura['id_impuesto'] ?> </nav>
                                </div>
                                <div class="col-sm-4"><strong>Factor</strong>
                                    <nav><?= $factura['id_factor'] ?></nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Clave prodecto servicio</strong>
                                    <nav><?= $factura['id_claveProductoServicio'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Clave unidad</strong>
                                    <nav><?= $factura['id_claveUnidad'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Cantidad</strong>
                                    <nav><?= $factura['factura_cantidad'] ?></nav>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-4"><strong>Valor unitario</strong>
                                    <nav><?= $factura['factura_valorUnitario'] ?></nav>
                                </div>
                                <div class="col-sm-4"><strong>Importe</strong>
                                    <nav><?= $factura['factura_importe'] ?> </nav>
                                </div>
                                <div class="col-sm-4"><strong>Descripción</strong>
                                    <nav><?= $factura['factura_descripcion'] ?></nav>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>

                    </div>
                    <?php endforeach; ?>

                </div>
            </div>

<br><br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<?= $this->endSection() ?>