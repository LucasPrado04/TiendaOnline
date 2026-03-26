<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct() 
	{
		parent::__construct();
		$this ->load->model('producto_model');
		
	}
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('contenido/principal');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
		    $this->load->view('partes/header2');
		    $this->load->view('partes/header');
		    $this->load->view('contenido/principal');
		    $this->load->view('partes/footer');
		}
	}

	public function comercializacion()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('contenido/comercializacion');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
		    $this->load->view('partes/header2');
			$this->load->view('partes/header');
		    $this->load->view('contenido/comercializacion');
		    $this->load->view('partes/footer');
		}
	}
	public function contacto()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2',$data);
			$this->load->view('partes/header');
			$this->load->view('contenido/contacto');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('contenido/contacto');
			$this->load->view('partes/footer');
		}

		
	}
	public function quien_soy()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('contenido/quien_soy');
		$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('contenido/quien_soy');
			$this->load->view('partes/footer');
		}
	}
	public function term_cond()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('contenido/term_cond');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
		    $this->load->view('partes/header2');
		    $this->load->view('partes/header');
	     	$this->load->view('contenido/term_cond');
		    $this->load->view('partes/footer');
		}
	}
	public function catalogo()
	{
		$dat = array('productos' => $this->producto_model->get_productos());
		if ($session_data = $this->session->userdata('logged_in')) {
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$this->load->view('partes/head' , $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('catalogo/catalogover', $dat);
		$this->load->view('partes/footer');

		} else {
			$this->load->view('partes/head');
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('catalogo/catalogover', $dat);
			$this->load->view('partes/footer');
		}
	}

	public function consulta(){
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2',$data);
			$this->load->view('partes/header');
			$this->load->view('contenido/consulta');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('contenido/consulta');
			$this->load->view('partes/footer');
		}
	}

	public function crearcuenta()
	{
		$data['titulo'] = 'Crear Cuenta';

		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);;
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('contenido/crearcuenta');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2');
			$this->load->view('partes/header');
			$this->load->view('contenido/crearcuenta');
			$this->load->view('partes/footer');
		}
	}


	public function iniciarsesion()
	{
		$data['titulo'] = 'Iniciar Sesión';

		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2',$data);
			$this->load->view('partes/header');
			$this->load->view('contenido/iniciarsesion');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('contenido/iniciarsesion');
			$this->load->view('partes/footer');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		//Pagina que carga despues del logout
		redirect('principal');
	}

	public function miperfil()
	{
		if ($session_data = $this->session->userdata('logged_in')) {

			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('usuarios/editarperfil');
			$this->load->view('partes/footer');
		} else {
			$this->load->view('partes/head');
		    $this->load->view('partes/header2');
			$this->load->view('partes/header');
		    $this->load->view('contenido/iniciarsesion');
		    $this->load->view('partes/footer');
		}
	}

}
