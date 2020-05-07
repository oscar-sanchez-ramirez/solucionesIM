<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>


<div class="container text-center margen">
    <h1>Alta de ordenes de pago</h1>
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
</div>

<br>
<div class="container-fluid">

    <form action="<?= base_url('/admin/save-ordenes') ?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="hidden" class="form-control" name="id_orden_pagos" placeholder="ID Orden pagos" required="required">
                <h4 class="text-center text-info">Datos</h4>
            </div>
            <div class="form-group col-md-4">
                <select id="inputState" name="id_clientes" class="form-control">
                    <option>ID Clientes</option>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?= $cliente['id_clientes'] ?>"><?= $cliente['clientes_nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select id="inputState" name="id_status_pago" class="form-control">
                    <option>ID Status pago</option>
                    <?php foreach ($status as $statu) : ?>
                        <option value="<?= $statu['id_status_pagos'] ?>"><?= $statu['status_tipo'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input type="date" class="form-control" name="orden_fecha_pago" placeholder="Orden fecha pago" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_calle" placeholder="Orden dirección calle" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_numero_exterior" placeholder="Orden dirección No.exterior" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_numero_interior" placeholder="Orden dirección No.Interior" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_colonia" placeholder="Orden dirección colonia" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_cp" placeholder="Orden dirección C.P" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_pais" placeholder="Orden dirección país" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_estado" placeholder="Orden direccion estado" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_ciudad" placeholder="Orden dirección Ciudad" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_direccion_telefono" placeholder="Orden direccin Telefonico" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_concepto" placeholder="Orden concepto" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_forma_de_pago_requerido" placeholder="Orden forma de pago requerido" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_moneda_de_pago" placeholder="Orden modena de pago" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_monto" placeholder="Orden monto" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_subtotal" placeholder="Orden subtotal" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_total" placeholder="Orden total" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_numero_de_operacion" placeholder="Orden numero de operción" required="required">
            </div>
            <div class="form-group col-md-4">
                <input type="text" class="form-control" name="orden_RfcEmisorCtaOrd" placeholder="Orden RFC Emisor CtaOrd" required="required">
            </div>

        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
        </div>

    </form>

</div>



<?= $this->endSection() ?>