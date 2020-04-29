<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
//use App\Models\UsuariosModel;
use Config\Services;


class Pagos extends BaseController
{
	public function index()
	{   
		define("KEY", "SolucionesIM");
        define("CODE", "AES-128-ECB");

  //      $model = new UsuariosModel();
		$data = ['usuarios' => '17', 'title' => 'SolucionesIM' ,
		'pagoMes' => 3850, 'total' => 10500 ,'KEY' => 'SolucionesIM', 'CODE' => 'AES-128-ECB', 'idVenta' => 1];
		return view('pages/pago_paypal', $data);
    }
    
    

	//--------------------------------------------------------------------

}
    