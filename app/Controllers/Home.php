<?php namespace App\Controllers;

use Config\Services;
class Home extends BaseController
{
	public function index()
	{   if ($this->session->logged_in) {
		return redirect()->to('/pagos');
	}
	return view('welcome_message');

	}

	public function login()
    {
        if ($this->session->logged_in) {
		
            return redirect()->to('pagos');
        }
        return view('pages/login');
    }

}
