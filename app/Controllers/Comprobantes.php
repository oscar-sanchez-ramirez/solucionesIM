<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ComprobantesModel;
use App\Models\ClientesModel;


use Dompdf\Dompdf;


use Config\Services;

class Comprobantes extends BaseController
{
    public function index()
    {

        if ($this->session->logged_in) {

            $req = Services::request();
            $idCliente = $req->getPost('idCliente');

            $model = new ComprobantesModel();
            $comprobantes = $model->where('id_clientes', $idCliente)->orderBy('id_comprobantes', 'desc')->findAll();

            $data = ['title' => 'Comprobantes', 'comprobantes' => $comprobantes];

            return view('pages/comprobantes', $data);
        }
        return redirect()->to('login');
    }

    public function show()
    {
        if ($this->session->logged_in) {
            $req = Services::request();
            $idComprobante = $req->getPost('id_comprobante');

            $model = new ComprobantesModel();
            $comprobantes = $model->where('id_comprobantes', $idComprobante)->findAll();

            $date = ['title' => 'Comprobante', 'comprobantes' => $comprobantes];

            return view('pages/comprobante_show', $date);
        }
        return redirect()->to('login');
    }

    public function pdf()
    {
        if ($this->session->logged_in) {
            $req = Services::request();
            $idComprobante = $req->getPost('id_comprobante');

            $model = new ComprobantesModel();
            $comprobantes = $model->where('id_comprobantes', $idComprobante)->findAll();
            $comprobantes_id = $model->where('id_comprobantes', $idComprobante)->findColumn('id_comprobantes');
            $cliente_id = $model->where('id_comprobantes', $idComprobante)->findColumn('id_clientes');

            $cliente = new ClientesModel();
            $correo_cliente = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_direccion_email');
            $paterno = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_apellido_paterno');
            $clientes_nombre = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_nombre');

            $nombre =  $clientes_nombre[0];
            $apellidos =  $paterno[0];
            $correo =  $correo_cliente[0];



            $data = ['title' => 'Comprobante', 'comprobantes' => $comprobantes, 'id' => $comprobantes_id,
                      'nombre' => $nombre, 'apellidos' => $apellidos, 'correo' => $correo ];

            $filename = 'comprobante_solucionesIM';
            // instanciar y usar la clase dompdf
            $dompdf = new DOMPDF();
            $dompdf->loadHtml(view('pages/comprobante_pdf', $data));

            // (Opcional) Configurar el tamaño y la orientación del papel
            $dompdf->setPaper('A4', 'paisaje');

            // Renderiza el HTML como PDF
            $dompdf->render();

            // Salida del PDF generador al navegador
            $dompdf->stream($filename . ".pdf", array("Attachment" => true));

            return true;
        }
        return redirect()->to('login');
    }

    public function email()
    {
        $req = Services::request();
        $idComprobante = $req->getPost('id_comprobante');

        $model = new ComprobantesModel();
        $comprobantes = $model->where('id_comprobantes', $idComprobante)->findAll();
        $cliente_id = $model->where('id_comprobantes', $idComprobante)->findColumn('id_clientes');


        $cliente = new ClientesModel();
        $correo_cliente = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_direccion_email');
        $paterno = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_apellido_paterno');
        $clientes_nombre = $cliente->where('id_clientes', $cliente_id)->findColumn('clientes_nombre');

        $nombre =  $clientes_nombre[0];
        $apellidos =  $paterno[0];
        $correo =  $correo_cliente[0];



        $data = [
            'title' => 'Comprobante', 'comprobantes' => $comprobantes,
            'nombre' => $nombre, 'apellidos' => $apellidos, 'correo' => $correo
        ];

        $email = Services::email();

        $email->setFrom('facturacion@c1550361.ferozo.com', 'Soluciones IM');
        $email->setTo($correo);
        $email->setSubject('Soluciones IM, Comprobante');
        $email->setMessage(view('pages/comprobante_email', $data));


        if ($email->send()) {
            return redirect()->to(base_url('home'))->with('correo', 'Correo enviado con exito');
        }
    }

    public function subir(){
        return "Subir";
    }
}
