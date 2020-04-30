<?php namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model
{
        protected $table      = 'clientes';
        protected $primaryKey = 'id_clientes';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['id_Usuarios','clientes_tipo','clientes_razon_social','clientes_nombre_comercial','clientes_apellido_paterno',
                                    'clientes_apellido_materno','clientes_nombre','clientes_representante_legal','clientes_acta_escritura','clientes_acta_fecha',
                                    'clientes_acta_notario','clientes_acta_ciudad','clientes_acta_licenciado','clientes_apoderado_legal','clientes_apoderado_escritura',
                                    'clientes_apoderado_fecha','clientes_apoderado_notario','clientes_apoderado_ciudad','clientes_apoderado_licenciado','clientes_direccion_calle',
                                    'clientes_direccion_numero_exterior','clientes_direccion_numero_interior','clientes_direccion_colonia','clientes_direccion_cp','clientes_direccion_pais',
                                    'clientes_direccion_estado','clientes_direccion_ciudad','clientes_direccion_telefono','clientes_direccion_email','clientes_direccion_emailcomercial',
                                    'clientes_direccionfiscal_calle','clientes_direccionfiscal_numero_exterior','clientes_direccionfiscal_numero_interior','clientes_direccionfiscal_colonia',
                                    'clientes_direccionfiscal_cp','clientes_direccionfiscal_pais','clientes_direccionfiscal_estado','clientes_direccionfiscal_ciudad','clientes_direccionfiscal_telefono',
                                    'clientes_direccionfiscal_email','clientes_direccionfiscal_email_comercial','clientes_fiscal_rfc','clientes_giro','clientes_status','clientes_alta_fecha',
                                    'clientes_alta_usuario','clientes_modifica_usuario']; 

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}