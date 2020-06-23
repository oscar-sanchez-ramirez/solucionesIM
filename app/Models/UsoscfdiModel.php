<?php namespace App\Models;

use CodeIgniter\Model;

class UsoscfdiModel extends Model
{
        protected $table      = 'usos_cfdi';
        protected $primaryKey = 'id_usoCFDI';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['uso_cfdi','descripcion'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}

