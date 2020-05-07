<?php namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
        protected $table      = 'status_pagos';
        protected $primaryKey = 'id_status_pagos';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['status_tipo', 'status_descripcion'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [];
        protected $validationMessages = [];
        protected $skipValidation     = false;
}