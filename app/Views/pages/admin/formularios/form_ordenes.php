<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
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
<div class="container">
    <div class="card text-center">
        <div style="background-color:#EDF0ED" class="card-header">
            <h2>Alta de órdenes de pago</h2>
        </div>
        <div style="background-color:#F7F7F7;" class="card-body">
            <form action="<?= base_url('/admin/saveOrdenes') ?>" method="POST">
                <div class="form-row">

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
                        <input step="0.01" type="number" class="form-control" name="iva" id="iva" placeholder="iva" required="required">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Total</label>
                        <input step="0.01" type="number" class="form-control" name="orden_total" id="total" placeholder="Orden total" required="required">
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
                </div>

            </form>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            var cantidad = document.querySelector("#cantidad");
            var importe = document.querySelector("#importe");
            var subtotal = document.querySelector("#subtotal");
            var iva = document.querySelector("#iva");
            var total = document.querySelector("#total");

            importe.addEventListener('change', function() {
                var can = parseFloat(cantidad.value);
                var impor = parseFloat(importe.value);
                var resul = (can * impor);
                subtotal.value = resul.toFixed(2);
                var sub = subtotal.value;
                var subR = parseFloat(sub);
                let ivaP = parseFloat(0.160000);
                var ivaR = (subR * ivaP);
                iva.value = parseFloat(ivaR).toFixed(2);
                totalR = (subR + ivaR);
                total.value = totalR.toFixed(2);
            });

        });
    </script>

    <?= $this->endSection() ?>