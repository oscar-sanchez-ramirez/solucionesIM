<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<style>
    #resultado {
        background-color: red;
        color: white;
        font-weight: bold;
    }

    #resultado.ok {
        background-color: green;
    }
</style>
<br>
<div class="container col-md-4">
    <?php if (session()->get('errores')) : ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                &times;
            </button>
            <p class="text-center"><?= session()->get('errores') ?></p>
        </div>
    <?php endif; ?>
</div>
<div class="container">
    <div class="card text-center">
        <div style="background-color:#EDF0ED" class="card-header">
            <h3>Factura</h3>
        </div>
        <div style="background-color:#F7F7F7;" class="card-body">
            <form action="<?= base_url('facturacion/GeneraCFDI') ?>" method="POST" id="formulario">
                <div class="form-row">
                    <input type="hidden" name="id_comprobante" class="form-control" value="<?= $idComprobante ?>">
                    <input type="hidden" name="id_orden" class="form-control" value="<?= $idOrden ?>">
                    <input type="hidden" name="id_cliente" class="form-control" value="<?= $idCliente ?>">
                    <div class="form-group col-md-4">
                        <label>Serie</label>
                        <select name="id_serie" id="serie" class="form-control" required=required>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                        <span style="display: none;" id="errorSerie" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="folio">Folio</label>
                        <input type="number" name="factura_folio" id="folio" class="form-control" value="1">
                        <span style="display: none;" id="errorFolio" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Condiciones de pago</label>
                        <input type="text" class="form-control" name="factura_condicionesPago" id="condiciones" value="<?= $condicionesPago ?>" >
                        <span style="display: none;" id="errorCondiciones" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Forma de pago </label>
                        <select name="id_formapago" id="forma" class="form-control">
                            <option value="05">05</option>
                        </select>
                        <span style="display: none;" id="errorForma" class="text-danger">Este campo es requerido</span>
                    </div>

                    <div class="form-group col-md-4">
                        <label>Moneda</label>
                        <input type="text" class="form-control" name="factura_moneda" id="moneda" value="MXN">
                        <span style="display: none;" id="errorMoneda" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Subtotal</label>
                        <input type="number" class="form-control" id="subtotal" name="factura_subtotal"  step="0.01" value="<?= $subtotal ?>">
                        <span style="display: none;" id="errorSubtotal" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>IVA</label>
                        <input type="number" class="form-control" id="iva" name="factura_iva" step="0.01"  value="<?= $iva ?>">
                        <span style="display: none;" id="errorIVA" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Total</label>
                        <input type="number" class="form-control" id="total" name="factura_total" step="0.01"  value="<?= $total ?>">
                        <span style="display: none;" id="errorTotal" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Tipo de comprobante</label>
                        <input type="text" class="form-control" name="factura_tipoComprobante" id="comprobante" value="FA" required="required">
                        <span style="display: none;" id="errorComprobante" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Metodo de pago</label>
                        <select name="id_metodoPago" id="metodo" class="form-control">
                            <option value="PUE">PUE</option>
                        </select>
                        <span style="display: none;" id="errorMetodo" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lugar de expedición</label>
                        <input type="number" class="form-control" name="factura_lugarExpedicion" id="cp" value="09000" >
                        <span style="display: none;" id="errorCP" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Mensaje en PDF</label>
                        <input type="text" class="form-control" name="factura_mensajePDF">
                    </div>
                    <div class="form-group col-md-4">
                        <label>RFC</label>
                        <input type="text" class="form-control" name="factura_RFC" id="rfc_input" value="<?= $RFC ?>" oninput="validarInput(this)" >
                        <span style="display: none;" id="errorRFC" class="text-danger">Este campo es requerido</span>
                        <pre id="resultado"></pre>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Razon Social</label>
                        <input type="text" class="form-control" name="factura_razonSocial" id="razon" value="<?= $razonSocial ?>" >
                        <span style="display: none;" id="errorRazon" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>País</label>
                        <input type="text" class="form-control" name="factura_pais" id="pais" value="MÉXICO" required="required">
                        <span style="display: none;" id="errorPais" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Uso CFDI</label>
                        <select name="id_usocfdi" id="cfdi" class="form-control">
                            <option value="I04">I04</option>
                        </select>
                        <span style="display: none;" id="errorCFDI" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" name="factura_email" id="email" value="<?= $email ?>" >
                        <span style="display: none;" id="errorEmail" class="text-danger">El email no es valido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Impuesto</label>
                        <select name="id_impuesto" id="impuesto" class="form-control">
                            <option value="002">002</option>
                        </select>
                        <span style="display: none;" id="errorImpuesto" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Factor</label>
                        <select name="id_factor" id="factor" class="form-control">
                            <option value="Tasa">Tasa</option>
                            <option value="Cuota">Cuota</option>
                        </select>
                        <span style="display: none;" id="errorFactor" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Clave Producto Servicio</label>
                        <select name="id_claveProductoServicio" id="clave" class="form-control">
                            <option value="81111503">81111503</option>
                        </select>
                        <span style="display: none;" id="errorClave" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Cantidad</label>
                        <input type="number" class="form-control" name="factura_cantidad" id="cantidad" step="0.01" value="<?= $cantidad ?>">
                        <span style="display: none;" id="errorCantidad" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Descripción</label>
                        <textarea name="factura_descripcion" id="descripcion" class="form-control" cols="30" rows="3"></textarea>
                        <span style="display: none;" id="errorDes" class="text-danger">Este campo es requerido</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Valor Unitario</label>
                        <input type="number" class="form-control" name="factura_valorUnitario" id="unitario" step="0.01"  value="<?= $monto ?>">
                        <span style="display: none;" id="errorUnitario" class="text-danger">Este campo es requerido</span>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="col-md-3 btn btn-success" name="guardar" onclick="return enviarForm();" id="enviar" >Generar Factura</butto>
                </div>
            </form>
        </div>
    </div>
    <br>

    <?= $this->include('js/facturas') ?>
    <?= $this->endSection() ?>