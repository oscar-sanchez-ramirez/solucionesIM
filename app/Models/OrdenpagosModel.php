<?php namespace App\Models;

use CodeIgniter\Model;

class OrdenpagosModel extends Model
{
        protected $table      = 'orden_pagos';
        protected $primaryKey = 'id_orden_pagos';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['id_clientes','id_status_pago','orden_fecha_pago','orden_direccion_calle',
                                    'orden_direccion_numero_exterior','orden_direccion_numero_interior',
                                    'orden_direccion_colonia','orden_direccion_cp','orden_direccion_pais',
                                    'orden_direccion_estado','orden_direccion_ciudad','orden_direccion_telefono',
                                    'orden_concepto','orden_forma_de_pago_requerido','orden_moneda_de_pago',
                                    'orden_monto','orden_subtotal','orden_total','orden_numero_de_operacion',
                                    'orden_RfcEmisorCtaOrd'];

        protected $useTimestamps = false; 
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}