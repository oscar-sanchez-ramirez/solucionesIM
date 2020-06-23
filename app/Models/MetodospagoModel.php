<?php namespace App\Models;

use CodeIgniter\Model;

class MetodospagoModel extends Model
{
        protected $table      = 'metodos_pago';
        protected $primaryKey = 'id_metodoPago';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['metodo_pago','descripcion'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}