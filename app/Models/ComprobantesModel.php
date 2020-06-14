<?php

namespace App\Models;

use CodeIgniter\Model;

class ComprobantesModel extends Model
{
        protected $table      = 'comprobantes';
        protected $primaryKey = 'id_comprobantes';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = [
          'id_clientes', 'id_orden_pagos','comprobantes_status', 'comprobantes_fecha_orden', 'comprobantes_fecha datetime',
          'comprobantes_concepto', 'comprobantes_total',  'comprobantes_metodo_pago', 'comprobante_rfc_cliente'
        ];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = true;
}

