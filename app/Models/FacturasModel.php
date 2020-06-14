<?php

namespace App\Models;

use CodeIgniter\Model;

class FacturasModel extends Model
{
        protected $table      = 'facturas';
        protected $primaryKey = 'id_facturas';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = [
                'id_comprobantes','facturas_serie','facturas_folio','facturas_condiciones_de_pago',
                'facturas_forma_de_pago','facturas_moneda','facturas_importe','facturas_subtotal',
                'facturas_iva','facturas_total','facturas_tipo_de_comprobante','facturas_metodo_pago',
                'facturas_lugar_de_expedicion','facturas_fecha','facturas_mensaje_pdf','facturas_rfc',
                'facturas_razon_social','facturas_usocfdi','facturas_pais','facturas_email','facturas_clave_prodserv',
                'facturas_cantidad','facturas_clave_unidad','facturas_descripcion','facturas_valor_unitario',
                'facturas_xml','facturas_pdf','facturas_status'
        ];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = true;
}

