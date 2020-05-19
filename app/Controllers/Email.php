<?php

namespace App\Controllers;

use App\Controllers\BaseController;


use Config\Services;

class Email extends BaseController
{
    public function index(){
        

        //  $request = Services::request();
        //  $model = new RecoverModel();
 
         $correo = 'osr910317@gmail.com';
        //  $token = random_string('sha1', 40);  gdfhjdjkhashdkjsahdkjqi273983912qwjdhsaye
 
        $email = Services::email();
        // $email = \Config\Services::email();
 
         $email->setFrom('osr170391@gmail.com', 'Oscar');
         $email->setTo('osr910317@gmail.com');
 
         $email->setSubject('Soluciones IM, pago del mes');
         $email->setMessage(view('pages/email'));
         //$email->setMessage('Verificar que funciona el email desde codeigniter');
 
        //  $model->insert(['correo' => $correo, 'token' => $token]);
        
      if($email->send()){
            echo "Se envio un correo";
      }
      echo $email->printDebugger();
        

       
    }

}