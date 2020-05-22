<?php

namespace App\Controllers;

use App\Models\ClientesModel;
use Config\Services;

class Home extends BaseController
{
	public function index()
	{
		if ($this->session->logged_in) {
			return redirect()->to('/clientes');
		}
		return view('inicio');
	}

	public function login()
	{
		if ($this->session->logged_in) {

			return redirect()->to('home');
		}
		return view('pages/login');
	}

	public function show()
	{
		if ($this->session->logged_in) {

			$user_id = session('id');
			$cliente = new ClientesModel();
			
			$data = ['clientes' => $cliente->where('id_Usuarios', $user_id)->findAll(),'title' => 'Home'];
			return view('pages/home', $data);
		}
		return view('pages/login');
	}
}
