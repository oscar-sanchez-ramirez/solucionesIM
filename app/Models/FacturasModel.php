<?php

namespace App\Models;

use CodeIgniter\Model;

class FacturasModel extends Model
{
        protected $table      = 'facturas';
        protected $primaryKey = 'id_factura';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = [
            'id_comprobante', 'id_orden', 'id_cliente', 'id_serie', 'factura_folio', 'factura_condicionesPago',
            'id_formapago', 'factura_moneda', 'factura_subtotal', 'factura_total', 'factura_iva', 
            'factura_tipoComprobante', 'id_metodoPago', 'factura_lugarExpedicion', 'factura_fecha', 
            'factura_mensajePDF', 'factura_RFC', 'factura_razonSocial', 'id_usoCFDI', 'factura_pais',
            'factura_email', 'id_impuesto', 'id_factor', 'id_claveProductoServicio', 'factura_cantidad', 'id_claveUnidad',
            'factura_descripcion', 'factura_valorUnitario', 'factura_importe', 'factura_uuid', 
            'factura_XML', 'factura_PDF', 'facturas_status'
        ];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = true;
}

