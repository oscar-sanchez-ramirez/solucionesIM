<?php namespace App\Models;

use CodeIgniter\Model;

class FormaspagoModel extends Model
{
        protected $table      = 'formas_pago';
        protected $primaryKey = 'id_formapago';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['forma_pago','descripcion'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}