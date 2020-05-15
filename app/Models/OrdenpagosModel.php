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
                'id_clientes', 'id_status_pago', 'orden_fecha_pago', 'orden_direccion_calle',
                'orden_direccion_numero_exterior', 'orden_direccion_numero_interior',
                'orden_direccion_colonia', 'orden_direccion_cp', 'orden_direccion_pais',
                'orden_direccion_estado', 'orden_direccion_ciudad', 'orden_direccion_telefono',
                'orden_concepto', 'orden_forma_de_pago_requerido', 'orden_moneda_de_pago',
                'orden_monto', 'orden_subtotal', 'orden_total', 'orden_numero_de_operacion',
                'orden_RfcEmisorCtaOrd'
        ];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [
                'id_clientes' => 'required|numeric',
                'id_status_pago'=> 'required|numeric',
                'orden_fecha_pago' => 'required',
                'orden_direccion_calle' => 'required|alpha_numeric_space',
                'orden_direccion_numero_exterior' => 'required|alpha_numeric_space',
                'orden_direccion_numero_interior'=> 'required|alpha_numeric_space',
                'orden_direccion_colonia' => 'required|alpha_numeric_space',
                'orden_direccion_cp' => 'required|alpha_numeric',
                'orden_direccion_pais' => 'required|numeric',
                'orden_direccion_estado' => 'required|numeric',
                'orden_direccion_ciudad' => 'required|numeric',
                'orden_direccion_telefono' => 'required|numeric',
                'orden_concepto' => 'required|alpha_space',
                'orden_forma_de_pago_requerido' => 'required|alpha_space',
                'orden_moneda_de_pago' => 'required|alpha',
                'orden_monto' => 'required|numeric',
                'orden_subtotal' => 'required|numeric',
                'orden_total' => 'required|numeric',
                'orden_numero_de_operacion' => 'required|numeric',
                'orden_RfcEmisorCtaOrd' => 'required|alpha_numeric'
        ];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}
