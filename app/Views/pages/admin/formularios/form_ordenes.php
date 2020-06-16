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
                <label>Clientes</label>
                <select id="inputState" name="id_clientes"  onchange="select_usuario();" class="form-control">
                    <option>ID Clientes</option>
                    <?php foreach ($clientes as $cliente) : ?>
                        <option value="<?= $cliente['id_clientes'][0] ?>"><?= $cliente['clientes_nombre'] ?></option>
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
                <label>Orden concepto </label>
                <input type="text" class="form-control" name="orden_concepto" placeholder="Orden concepto" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Condiciones de pago</label>
                <input type="text" class="form-control" name="CondicionesDePago" placeholder="Condiciones de pago" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Moneda de pago </label>
                <input type="text" class="form-control" name="orden_moneda_de_pago" value="MXN" placeholder="Orden modena de pago" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Cantidad </label>
                <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="cantidad" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Importe </label>
                <input type="number" step='0.01' class="form-control" name="orden_monto" id="importe" placeholder="Orden monto" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Subtotal</label>
                <input type="number" class="form-control" name="orden_subtotal" id="subtotal" placeholder="Orden subtotal" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>IVA</label>
                <input type="number" class="form-control" name="iva" id="iva" placeholder="iva" required="required">
            </div>
            <div class="form-group col-md-4">
                <label>Total</label>
                <input type="number" class="form-control" name="orden_total" id="total" placeholder="Orden total" required="required">
            </div>
        </div>
        <br>
        <div class="text-center">
            <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
        </div>

    </form>
    <br>
</div>


<?= $this->include('js/iva') ?>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>



<?= $this->endSection() ?>