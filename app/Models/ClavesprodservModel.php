<?php namespace App\Models;

use CodeIgniter\Model;

class ClavesprodservModel extends Model
{
        protected $table      = 'claves_prodserv';
        protected $primaryKey = 'id_claveProductoServicio';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['clave_prodserv ','descripcion'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}

