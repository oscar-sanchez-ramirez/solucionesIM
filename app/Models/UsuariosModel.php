<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
        protected $table      = 'usuarios';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['nombre', 'apellidos', 'email', 'password', 'fecha'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}