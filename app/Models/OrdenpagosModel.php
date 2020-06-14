<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdenpagosModel extends Model
{
        protected $table      = 'orden_pagos';
        protected $primaryKey = 'id_orden_pagos';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = [
                'id_clientes', 'id_status_pago', 'orden_fecha_pago', 
                'orden_concepto', 'CondicionesDePago', 'cantidad', 'orden_moneda_de_pago',
                'orden_monto', 'orden_subtotal', 'iva', 'orden_total'
        ];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [ 
        'id_clientes' => 'required|numeric',
        'id_status_pago' => 'required|numeric',
        'orden_fecha_pago' => 'required',
        'orden_concepto' => 'required',
        'CondicionesDePago' => 'required',
        'cantidad' => 'required|numeric',
        'orden_moneda_de_pago' => 'required',
        'orden_monto' => 'required|numeric',
        'orden_subtotal' => 'required|numeric',
        'iva' => 'required|numeric',
        'orden_total' => 'required|numeric',
        ];
        protected $validationMessages = [];
        protected $skipValidation     = true;
}

