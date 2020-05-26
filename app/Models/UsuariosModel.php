<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
        protected $table      = 'usuarios';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['nombre', 'apellidos', 'email', 'password', 'fecha', 'id_rol'];

        protected $useTimestamps = false;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationRules    = [
                'nombre' => 'required|alpha_numeric_space',
                'apellidos' => 'required|alpha_numeric_space',
                'email' => 'required|valid_email|is_unique[usuarios.email]',
                'password' => 'required|min_length[4]',
                'id_rol' => 'required|numeric'

        ];
        protected $validationMessages = [

                'email'        => [
                        'is_unique' => 'Este correo pertenece a otra cuenta'
                ]
        ];


        protected $skipValidation     = false;
}
