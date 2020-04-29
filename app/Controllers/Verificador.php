<?php namespace App\Controllers;

class Verificador extends BaseController
{
	public function index()
	{
		$data = ['KEY' => 'SolucionesIM', 'CODE' => 'AES-128-ECB', 'id' => 1];
		return view('pages/verificador', $data);
    }
    
    
	//--------------------------------------------------------------------

}
