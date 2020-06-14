<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>


<div class="container text-center margen">
     <h1>Editar órdenes de pago</h1>
</div>
<hr>
<br>
<div class="container-fluid">
    <?php foreach($ordenes as $orden) : ?>
     <form action="<?= base_url('/admin/updateOrdenes') ?>" method="POST">
          <div class="form-row">
               <div class="form-group col-md-4">
                    <label> </label>
                    <input type="hidden" class="form-control" name="id_orden_pagos" value="<?= $orden['id_orden_pagos'] ?>" required="required">
                    <h4 class="text-center text-info">Datos de orden <?= $orden['id_orden_pagos'] ?></h4>
               </div>
               <div class="form-group col-md-4">
               <label>Clientes</label>
                    <input type="numeric" class="form-control" name="id_clientes" value="<?= $orden['id_clientes'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label for="">Status pago</label>
                    <input type="numeric" class="form-control" name="id_status_pago"  value="<?= $orden['id_status_pago'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Fecha de pago</label>
                    <input type="text" class="form-control" name="orden_fecha_pago" value="<?= $orden['orden_fecha_pago'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Calle</label>
                    <input type="text" class="form-control" name="orden_direccion_calle" value="<?= $orden['orden_direccion_calle'] ?>"  required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Calle No.exterior</label>
                    <input type="text" class="form-control" name="orden_direccion_numero_exterior" value="<?= $orden['orden_direccion_numero_exterior'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Calle No.interior</label>
                    <input type="text" class="form-control" name="orden_direccion_numero_interior" value="<?= $orden['orden_direccion_numero_interior'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Colonia</label>
                    <input type="text" class="form-control" name="orden_direccion_colonia" value="<?= $orden['orden_direccion_colonia'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Código postal</label>
                    <input type="text" class="form-control" name="orden_direccion_cp" value="<?= $orden['orden_direccion_cp'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label for="">País No.</label>
                    <input type="text" class="form-control" name="orden_direccion_pais" value="<?= $orden['orden_direccion_pais'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Estado No.</label>
                    <input type="text" class="form-control" name="orden_direccion_estado" value="<?= $orden['orden_direccion_estado'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Ciudad No.</label>
                    <input type="text" class="form-control" name="orden_direccion_ciudad" value="<?= $orden['orden_direccion_ciudad'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Teléfono</label>
                    <input type="text" class="form-control" name="orden_direccion_telefono" value="<?= $orden['orden_direccion_telefono'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Orden concepto </label>
                    <input type="text" class="form-control" name="orden_concepto" value="<?= $orden['orden_concepto'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Forma de pago </label>
                    <input type="text" class="form-control" name="orden_forma_de_pago_requerido" value="<?= $orden['orden_forma_de_pago_requerido']?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Moneda de pago </label>
                    <input type="text" class="form-control" name="orden_moneda_de_pago" value="<?= $orden['orden_moneda_de_pago'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Monto </label>
                    <input type="text" class="form-control" name="orden_monto" value="<?= $orden['orden_monto'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Subtotal</label>
                    <input type="text" class="form-control" name="orden_subtotal" value="<?= $orden['orden_subtotal'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Total</label>
                    <input type="text" class="form-control" name="orden_total" value="<?= $orden['orden_total'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>Número de operación </label>
                    <input type="text" class="form-control" name="orden_numero_de_operacion" value="<?= $orden['orden_numero_de_operacion'] ?>" required="required">
               </div>
               <div class="form-group col-md-4">
               <label>RfcEmisorCtaOrd</label>
                    <input type="text" class="form-control" name="orden_RfcEmisorCtaOrd" value="<?= $orden['orden_RfcEmisorCtaOrd'] ?>" required="required">
               </div>
          </div>
          <br>
          <div class="text-center">
               <button type="submit" class="col-md-3 btn btn-success" name="guardar">Guardar</butto>
          </div>
     </form>
    <?php endforeach; ?>
    <br>
</div>


<?= $this->endSection() ?>