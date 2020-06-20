<?= $this->extend('templates/admin') ?>
<?= $this->section('content') ?>
<br>
<style>
     .card {
          -webkit-box-shadow: 0px 0px 12px -2px rgba(143, 143, 143, 1);
          -moz-box-shadow: 0px 0px 12px -2px rgba(143, 143, 143, 1);
          box-shadow: 0px 0px 12px -2px rgba(143, 143, 143, 1);
     }
</style>
<div class="container">
     <div class="card">
          <div class="card-header">
               <h3 class="text-center"><i class="fas fa-edit">&nbspEditar orden de pago</i></h3>
          </div>
          <div class="card-body">
               <?php foreach ($ordenes as $orden) : ?>
                    <form action="<?= base_url('/admin/updateOrdenes') ?>" method="POST">
                         <div class="form-row">

                              <div class="form-group col-md-4">
                                   <label>Clientes</label>
                                   <input type="numeric" class="form-control" name="id_clientes" value="<?= $orden['id_clientes'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label for="">Status pago</label>
                                   <input type="numeric" class="form-control" name="id_status_pago" value="<?= $orden['id_status_pago'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Fecha de pago</label>
                                   <input type="text" class="form-control" name="orden_fecha_pago" value="<?= $orden['orden_fecha_pago'] ?>" required="required">
                              </div>

                              <div class="form-group col-md-4">
                                   <label>Orden concepto </label>
                                   <input type="text" class="form-control" name="orden_concepto" value="<?= $orden['orden_concepto'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Condiciones de pago </label>
                                   <input type="text" class="form-control" name="CondicionesDePago" value="<?= $orden['CondicionesDePago'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Cantidad </label>
                                   <input type="number" class="form-control" name="cantidad" value="<?= $orden['cantidad'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Moneda de pago </label>
                                   <input type="text" class="form-control" name="orden_moneda_de_pago" value="<?= $orden['orden_moneda_de_pago'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Monto </label>
                                   <input type="number" class="form-control" name="orden_monto" value="<?= $orden['orden_monto'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Subtotal</label>
                                   <input type="number" class="form-control" name="orden_subtotal" value="<?= $orden['orden_subtotal'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>IVA</label>
                                   <input type="number" class="form-control" name="iva" value="<?= $orden['iva'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-4">
                                   <label>Total</label>
                                   <input type="number" class="form-control" name="orden_total" value="<?= $orden['orden_total'] ?>" required="required">
                              </div>
                              <div class="form-group col-md-12">
                                   <label> </label>
                                   <input type="hidden" class="form-control" name="id_orden_pagos" value="<?= $orden['id_orden_pagos'] ?>" required="required">
                                   <h4 class="text-center text-info">No.Orden <?= $orden['id_orden_pagos'] ?></h4>
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
     </div>
</div>
<?= $this->endSection() ?>