<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<h1 class="text-center">Ordenes</h1>
<br>
<div class="container-fluid">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Clientes ID</th>
                <th scope="col">Status</th>
                <th scope="col">Fecha de pago</th>
                <th scope="col">Calle</th>
                <th scope="col">Numero exterior</th>
                <th scope="col">Numero interior</th>
                <th scope="col">Colonia</th>
                <th scope="col">CP</th>
                <th scope="col">Pais</th>
                <th scope="col">Estado</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Telefono</th>
                <th scope="col">Concepto</th>
                <th scope="col">Forma de pago</th>
                <th scope="col">Moneda</th>
                <th scope="col">Monto</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Total</th>
                <th scope="col">Numero de opereción</th>
                <th scope="col">RFC emisor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ordenes as $orden): ?>
            <tr>
                <td><?= $orden['id_orden_pagos'] ?></td>
                <td><?= $orden['id_clientes'] ?></td>
                <td><?= $orden['id_status_pago'] ?></td>
                <td><?= $orden['orden_fecha_pago'] ?></td>
                <td><?= $orden['orden_direccion_calle'] ?></td>
                <td><?= $orden['orden_direccion_numero_exterior'] ?></td>
                <td><?= $orden['orden_direccion_numero_interior'] ?></td>
                <td><?= $orden['orden_direccion_colonia'] ?></td>
                <td><?= $orden['orden_direccion_cp'] ?></td>
                <td><?= $orden['orden_direccion_pais'] ?></td>
                <td><?= $orden['orden_direccion_estado'] ?></td>
                <td><?= $orden['orden_direccion_ciudad'] ?></td>
                <td><?= $orden['orden_direccion_telefono'] ?></td>
                <td><?= $orden['orden_concepto'] ?></td>
                <td><?= $orden['orden_forma_de_pago_requerido'] ?></td>
                <td><?= $orden['orden_moneda_de_pago'] ?></td>
                <td><?= $orden['orden_monto'] ?></td>
                <td><?= $orden['orden_subtotal'] ?></td>
                <td><?= $orden['orden_total'] ?></td>
                <td><?= $orden['orden_numero_de_operacion'] ?></td>
                <td><?= $orden['orden_RfcEmisorCtaOrd'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>