<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>

<br>
<div class="container text-center margen">
     <h1>Editar ordenes de pago</h1>
</div>
<hr>

<div class="container-fluid">
    <?php foreach($ordenes as $orden) : ?>
     <form action="<?= base_url('/admin/saveOrdenes') ?>" method="POST">
          <div class="form-row">
               <div class="form-group col-md-4">
                    <input type="hidden" class="form-control" name="id_orden_pagos" value="<?= $orden['id_orden_pagos'] ?>" required="required">
                    <h4 class="text-center text-info">Datos</h4>
               </div>
               <div class="form-group col-md-4">
                    <input type="numeric" class="form-control" name="id_clientes" value="<?= $orden['id_clientes'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="numeric     " class="form-control" name="id_status_pago"  value="<?= $orden['id_status_pago'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="hidden" class="form-control" name="orden_fecha_pago" value="<?= $orden['orden_fecha_pago'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_calle" value="<?= $orden['orden_direccion_calle'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_numero_exterior" value="<?= $orden['orden_direccion_numero_exterior'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_numero_interior" value="<?= $orden['orden_direccion_numero_interior'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_colonia" value="<?= $orden['orden_direccion_colonia'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_cp" value="<?= $orden['orden_direccion_cp'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_pais" value="<?= $orden['orden_direccion_pais'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_estado" value="<?= $orden['orden_direccion_estado'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_ciudad" value="<?= $orden['orden_direccion_ciudad'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_direccion_telefono" value="<?= $orden['orden_direccion_telefono'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_concepto" placeholder="Orden concepto" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_forma_de_pago_requerido" placeholder="Orden forma de pago requerido" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_moneda_de_pago" value="<?= $orden['orden_moneda_de_pago'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_monto" value="<?= $orden['orden_monto'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_subtotal" value="<?= $orden['orden_subtotal'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_total" value="<?= $orden['orden_total'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_numero_de_operacion" value="<?= $orden['orden_numero_de_operacion'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="orden_RfcEmisorCtaOrd" value="<?= $orden['orden_RfcEmisorCtaOrd'] ?>" required="required">
               </div>
          </div>
          <br>
          <div class="text-center">
               <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
          </div>
     </form>
    <?php endforeach; ?>
</div>


<?= $this->endSection() ?>