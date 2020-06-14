<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>


<div class="container text-center margen">
    <h1>Alta de órdenes de pago</h1>
</div>
<hr>

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

<br>
<div class="container-fluid">

    <form action="<?= base_url('/admin/saveOrdenes') ?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4">
            <label>  </label>
                <input type="hidden" class="form-control" name="id_orden_pagos" placeholder="ID Orden pagos" required="required">
                <h4 class="text-center text-info">Datos</h4>
            </div>
            <div class="form-group col-md-4">
            <label>Clientes</label>
                <select id="inputState" name="id_clientes" class="form-control">
                    <option>ID Clientes</option>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?= $cliente['id_clientes'] ?>"><?= $cliente['clientes_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label for="">Status pago</label>
                <select id="inputState" name="id_status_pago" class="form-control">
                    <!-- <option>ID Status pago</option> -->
                    <?php foreach ($status as $statu) : ?>
                        <option value="<?= $statu['id_status_pagos'] ?>"><?= $statu['status_tipo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
            <label>Fecha de pago</label>
                <input type="date" class="form-control" name="orden_fecha_pago" placeholder="Fecha pago" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Calle</label>
                <input type="text" class="form-control" name="orden_direccion_calle" placeholder="Dirección calle" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Calle No.exterior</label>
                <input type="text" class="form-control" name="orden_direccion_numero_exterior" placeholder="Dirección calle No.exterior" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Calle No.interior</label>
                <input type="text" class="form-control" name="orden_direccion_numero_interior" placeholder="Dirección calle No.Interior" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Colonia</label>
                <input type="text" class="form-control" name="orden_direccion_colonia" placeholder="Dirección colonia" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Código postal</label>
                <input type="text" class="form-control" name="orden_direccion_cp" placeholder="Dirección Código postal" required="required">
            </div>
            <div class="form-group col-md-4">
            <label for="">País No.</label>
                <input type="text" class="form-control" name="orden_direccion_pais" placeholder="Dirección País No." required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Estado No.</label>
                <input type="text" class="form-control" name="orden_direccion_estado" placeholder="Dirección Estado No." required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Ciudad No.</label>
                <input type="text" class="form-control" name="orden_direccion_ciudad" placeholder="Dirección Ciudad No." required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Teléfono</label>
                <input type="text" class="form-control" name="orden_direccion_telefono" placeholder="Orden dirección Teléfono" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Orden concepto </label>
                <input type="text" class="form-control" name="orden_concepto" placeholder="Orden concepto" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Forma de pago </label>
                <input type="text" class="form-control" name="orden_forma_de_pago_requerido" placeholder="Orden forma de pago requerido" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Moneda de pago </label>
                <input type="text" class="form-control" name="orden_moneda_de_pago" placeholder="Orden modena de pago" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Monto </label>
                <input type="text" class="form-control" name="orden_monto" placeholder="Orden monto" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Subtotal</label>
                <input type="text" class="form-control" name="orden_subtotal" placeholder="Orden subtotal" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Total</label>
                <input type="text" class="form-control" name="orden_total" placeholder="Orden total" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>Número de operación </label>
                <input type="text" class="form-control" name="orden_numero_de_operacion" placeholder="Orden número de operción" required="required">
            </div>
            <div class="form-group col-md-4">
            <label>RfcEmisorCtaOrd</label>
                <input type="text" class="form-control" name="orden_RfcEmisorCtaOrd" placeholder="RFC Emisor CtaOrd" required="required">
            </div>

        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
        </div>

    </form>
<br>
</div>



<?= $this->endSection() ?>