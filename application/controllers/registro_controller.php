<?php 

	class Registro_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('usuario_model');
		}
		
		/**
	    * 
	    */
		function index()
		{
			//Genero las reglas de validacion
			$this->form_validation->set_rules('nombre', 'Nombre', 'regex_match[/^\S+$/]|required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required|regex_match[/^\S+$/]');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]');
			/*$this->form_validation->set_rules('username', 'Usuario', 
											'trim|required|xss_clean|is_unique[usuarios.username]');*/
			$this->form_validation->set_rules('usuario', 'Usuario', 
											'trim|required|is_unique[usuarios.usuario]|regex_match[/^\S+$/]');
			//$this->form_validation->set_rules('password', 'Contraseña','required|xss_clean');
			$this->form_validation->set_rules('pass', 'Contraseña','required|regex_match[/^\S+$/]');

			$this->form_validation->set_rules('re_pass', 'Repetir contraseña', 'required|matches[pass]');

			//Mensaje de error si no pasan las reglas
			$this->form_validation->set_message('regex_match','<div>El %s no debe contener espacios</div>');

			$this->form_validation->set_message('required','<div>El %s es obligatorio <br></div>');

			$this->form_validation->set_message('matches','<div>Las contraseñas ingresadas no coinciden</div>');

			$this->form_validation->set_message('is_unique','<div> El %s ya existe</div>');

			$pass = $this->input->post('re_pass',true);

			//Preparo los datos para guardar en la base, en caso de que pase la validacion
			$data = array(
				'nombre'=>$this->input->post('nombre',true),
				'apellido'=>$this->input->post('apellido',true),
				'email'=>$this->input->post('email',true),
				'usuario'=>$this->input->post('usuario',true),
				'pass'=>($pass),
				'perfil_id'=>'2'
			);


			//Si no pasa la validacion de datos
			if ($this->form_validation->run() == FALSE)
			{
				//Muestra la página de registro con el título de error
				$data = array('titulo' => 'Crear Cuenta');
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header');
				$this->load->view('contenido/crearcuenta');
				$this->load->view('partes/footer');		
			}
			
			else 	//Pasa la validacion
			{
				//Envio array al metodo insert para registro de datos
				$usuario = $this->usuario_model->add_usuario($data);

				//Redirecciono a la pagina de perfil
                echo "<script>alert('Su Cuenta ha sido creada Correctamente!');</script>";
				redirect('iniciarsesion', 'refresh');

			}	
		}
}

   