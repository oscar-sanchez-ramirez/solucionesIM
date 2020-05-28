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

        protected $validationRules    = [
                'id_Usuarios' => 'required|numeric',
                'clientes_tipo' => 'required|numeric',
                'clientes_razon_social' => 'required|alpha_space',
                'clientes_nombre_comercial' => 'required|alpha_space',
                'clientes_apellido_paterno' => 'required|alpha_space',
                'clientes_apellido_materno' => 'required|alpha_space',
                'clientes_nombre' => 'required|alpha_space',
                'clientes_representante_legal' => 'required|alpha_space',
                'clientes_acta_escritura' => 'required|alpha_space',
                'clientes_acta_fecha' => 'required',
                'clientes_acta_notario' => 'required|numeric',
                'clientes_acta_ciudad' => 'required|numeric',
                'clientes_acta_licenciado' => 'required|alpha_space',
                'clientes_apoderado_legal' =>'required|alpha_space',
                'clientes_apoderado_escritura' => 'required|alpha_space',
                'clientes_apoderado_fecha' => 'required',
                'clientes_apoderado_notario'=> 'required|numeric',
                'clientes_apoderado_ciudad' => 'required|numeric',
                'clientes_apoderado_licenciado' => 'required|alpha_space',
                'clientes_direccion_calle' => 'required|alpha_numeric_space',
                'clientes_direccion_numero_exterior' => 'required|alpha_numeric_space',
                'clientes_direccion_numero_interior' => 'required|alpha_numeric_space',
                'clientes_direccion_colonia' => 'required|alpha_numeric_space',
                'clientes_direccion_cp' => 'required|alpha_numeric',
                'clientes_direccion_pais' => 'required|numeric',
                'clientes_direccion_estado' => 'required|numeric',
                'clientes_direccion_ciudad' => 'required|numeric',
                'clientes_direccion_telefono' => 'required|numeric',
                // 'clientes_direccion_email' => 'required|valid_email|is_unique[clientes.email]',
                // 'clientes_direccion_emailcomercial' => 'required|valid_email|is_unique[clientes.email]',
                'clientes_direccionfiscal_calle' => 'required|alpha_numeric_space',
                'clientes_direccionfiscal_numero_exterior'=> 'required|alpha_numeric_space',
                'clientes_direccionfiscal_numero_interior' => 'required|alpha_numeric_space',
                'clientes_direccionfiscal_colonia' => 'required|alpha_numeric_space',
                'clientes_direccionfiscal_cp' => 'required|alpha_numeric',
                'clientes_direccionfiscal_pais' => 'required|numeric',
                'clientes_direccionfiscal_estado' => 'required|numeric',
                'clientes_direccionfiscal_ciudad' => 'required|numeric',
                'clientes_direccionfiscal_telefono' => 'required|numeric',
                // 'clientes_direccionfiscal_email' => 'required|valid_email|is_unique[clientes.email]',
                // 'clientes_direccionfiscal_email_comercial' => 'required|valid_email|is_unique[clientes.email]',
                'clientes_fiscal_rfc' => 'required|alpha_numeric',
                'clientes_giro' => 'required|alpha_space',
                'clientes_status' => 'required|alpha_space',
                'clientes_alta_fecha' => 'required',
                'clientes_alta_usuario' => 'required|numeric',
                'clientes_modifica_usuario' => 'required|numeric'


        ];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}