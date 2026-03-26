<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller{

	function __construct() 
	{
		parent::__construct();
		$this->load->model('login_model');	
	}

	function index()
	{   //Reglas de validación
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required');
		$this->form_validation->set_rules('pass', 'Contraseña','trim|required|callback__valid_login');
		
		//Mensajes en caso de error
		$this->form_validation->set_message('_valid_login', 
			                                '<div class="alert alert-danger role="alert">El usuario o contraseña son incorrectos');
		
		//Forma en que muestra los mensajes de error
		$this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');

			$username = $this->input->post('usuario');
			$password = $this->input->post('pass');

		   $result = $this->login_model->valid_user($username, $password);

           

          foreach ($result as $row) {
          	 $baja = $row->baja;
          }

    

		if($baja == 'NO'){

           if ($this->form_validation->run() == FALSE){
           	//En caso de que falle la validacion vuelve a cargar la pagina de Login
			$data = array('titulo' => 'Iniciar Sesión');
			$this->load->view('partes/head',$data);
            $this->load->view('partes/header');
			$this->load->view('contenido/iniciarsesion');
			$this->load->view('partes/footer');
           
		   }else{

               //Pagina que carga despues de loguearse
			//redirect(current_url()); ---> Vuelve a la pagina que estaba antes de loguearse
			echo "<script>alert('¡Se ha logueado correctamente!');</script>";
			redirect('principal','refresh');
           }
            

		}else{
             
                echo "<script>alert('Su contraseña es incorrecta.');</script>";
			   redirect('iniciarsesion','refresh');
           
		}
			 
	}
	

	function _valid_login($password)
	{ 
		// Se validaron los campos exitosamente. Se valida con la base de datos
		$username = $this->input->post('usuario');
	
		// Consulta a la base
		$result = $this->login_model->valid_user($username, $password);
	
		if($result)
		{   
			// Si el resultado es correcto lo asigna a la variable session
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->id,
					'nombre' => $row->nombre,
					'apellido' => $row->apellido,
					'email' => $row->email,
					'usuario' => $row->usuario,
					'pass' => $row->pass, // Asegúrate de incluir el campo `pass`
					'perfil_id' => $row->perfil_id
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else    // Sino devuelve que los datos no coinciden
		{   
			$this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o Contraseña inválidos</div>');
			return false;
		}
	}
	

}