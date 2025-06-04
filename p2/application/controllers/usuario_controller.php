<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class usuario_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('usuario_model');
		}

		private function _veri_log(){
			if ($this->session->userdata('logged_in')){
				return TRUE;
			} else {
				return FALSE;
			}
    	}
		
		/**
	    * Muestra todos los Usuarios en tabla */
		function index(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos los Usuarios');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['id'] = $session_data['id'];
				$data['nombre'] = $session_data['nombre'];
				$data['apellido'] = $session_data['apellido'];
				$data['email'] = $session_data['email'];
				$data['pass'] = $session_data['pass'];
		
				if($data['perfil_id'] == '1'){
					$dat = array('usuarios' => $this->usuario_model->get_usuarios_no_elim());
		
					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('usuarios/muestrausuarios/usuariosactivos',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}		

		public function edit_user() {
			if ($this->_veri_log()) {
				$data = array('titulo' => 'Editar Perfil');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$id = $data['id'];
				$nombre = $data['nombre'];
				$apellido = $data['apellido'];
				$email = $data['email'];
				$pass = $data['pass'];
		
				if ($data['perfil_id'] == '2') {
					$id = $session_data['id'];
					$data['user'] = $this->usuario_model->get_user_by_id($id); // Obtenemos los datos del usuario desde el modelo
					if (!$data['user']) {
						show_error('Usuario no encontrado.', 404, 'Error al cargar el usuario');
					}
			
					$this->load->view('partes/head', $data);
					$this->load->view('partes/header2', $data);
					$this->load->view('partes/header');
					$this->load->view('usuarios/editarperfil', $data);
					$this->load->view('partes/footer');
					var_dump($data);
				} else {
					redirect('iniciarsesion', 'refresh');
				}
			} else {
				redirect('iniciarsesion', 'refresh');
			}
		}

		function mostrarperfil(){
			if($this->_veri_log()){
				$session_data = $this->session->userdata('logged_in');
		
				$data = array(
					'titulo' => 'Perfil del Usuario',
					'perfil_id' => $session_data['perfil_id'],
					'id' => $session_data['id'],
					'nombre' => $session_data['nombre'],
					'apellido' => $session_data['apellido'],
					'email' => $session_data['email'],
					'pass' => $session_data['pass']
				);
		
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/modificar_perfil', $data); 
				$this->load->view('partes/footer');
			}
		}

		function mostrarperfil2(){
			if($this->_veri_log()){
				$session_data = $this->session->userdata('logged_in');
		
				$data = array(
					'titulo' => 'Perfil del Usuario',
					'perfil_id' => $session_data['perfil_id'],
					'id' => $session_data['id'],
					'nombre' => $session_data['nombre'],
					'apellido' => $session_data['apellido'],
					'email' => $session_data['email'],
					'pass' => $session_data['pass']
				);
		
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/editarperfil', $data); 
				$this->load->view('partes/footer');
			}
		}

		public function actualizarperfil() {
			if ($this->_veri_log()) {
				// Obtener los datos del formulario
				$id = trim($this->input->post('id'));
				$nombre = trim($this->input->post('nombre'));
				$apellido = trim($this->input->post('apellido'));
				$email = trim($this->input->post('email'));
				$pass = trim($this->input->post('pass'));
				
				// Reglas de validación
				$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha|regex_match[/^\S+$/]');
				$this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha|regex_match[/^\S+$/]');
				$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
				$this->form_validation->set_rules('pass', 'Contraseña', 'required|regex_match[/^\S+$/]');
				
				// Mensajes de error
				$this->form_validation->set_message('regex_match', '<div>El %s no puede contener espacios.</div>');
				$this->form_validation->set_message('required', '<div>El %s es obligatorio.</div>');
				$this->form_validation->set_message('alpha', '<div>El %s no puede contener números ni caractéres especiales.</div>');
		
				if (!$this->form_validation->run()) {
					// Obtener los datos de la sesión
					$session_data = $this->session->userdata('logged_in');
		
					// Preparar datos para la vista
					$data = array(
						'titulo' => 'Error de formulario',
						'id' => $id,
						'nombre' => $nombre,
						'apellido' => $apellido,
						'email' => $email,
						'pass' => $pass,
						'perfil_id' => $session_data['perfil_id']
					);
		
					// Cargar las vistas
					$this->load->view('partes/head', $data);
					$this->load->view('partes/header2', $data);
					$this->load->view('partes/header');
					$this->load->view('usuarios/modificar_perfil', $data);
					$this->load->view('partes/footer');
				} else {
					$data = array(
						'nombre' => $nombre,
						'apellido' => $apellido,
						'email' => $email,
						'pass' => $pass
					);
		
					$session_data = $this->session->userdata('logged_in');
					$session_data['nombre'] = $nombre;
					$session_data['apellido'] = $apellido;
					$session_data['email'] = $email;
					$session_data['pass'] = $pass;
		
					// Actualizar los datos del usuario en la base de datos
					$this->usuario_model->update_user($id, $data);
		
					$this->session->set_userdata('logged_in', $session_data);
					$this->session->sess_destroy();
					echo "<script>alert('Contraseña actualizada correctamente. Por favor, inicia sesión nuevamente.');</script>";
					redirect('iniciarsesion', 'refresh');
				}
			}
		}			
		
		function mostrarusuarios_admin(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Administradores');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				if($data['perfil_id'] == '1'){
					$dat = array('usuarios' => $this->usuario_model->get_administradores() );
					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('usuarios/muestrausuarios/muestraadmin',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		function mostrarusuario_cliente(){
			if($this->_veri_log()){
			$data = array('titulo' => 'Clientes');
		
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];

			if($data['perfil_id'] == '1'){
				$dat = array('usuarios' => $this->usuario_model->get_usuarios_clientes() );

				$this->load->view('partes/head',$data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/muestrausuarios/usuariosclient',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

	function add_usuario(){
		// Genero las reglas de validacion
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|regex_match[/^\S+$/]');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|regex_match[/^\S+$/]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|is_unique[usuarios.usuario]|regex_match[/^\S+$/]');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|regex_match[/^\S+$/]');
		$this->form_validation->set_rules('re_pass', 'Repetir contraseña', 'required|matches[pass]');
	
		// Mensajes de error si no pasan las reglas
		$this->form_validation->set_message('regex_match', '<div class="alert alert-dark">El campo %s no puede contener espacios \n</div>');
		$this->form_validation->set_message('required', '<div class="alert alert-dark">El campo %s es obligatorios</div>');
		$this->form_validation->set_message('is_unique', '<div class="alert alert-dark">El campo %s ya existe</div>');
		$this->form_validation->set_message('matches', '<div class="alert alert-dark">Las contraseñas ingresadas no coinciden</div>');
	
		$pass = $this->input->post('re_pass', true);
	
		// Preparo los datos para guardar en la base, en caso de que pase la validacion
		$data = array(
			'nombre' => $this->input->post('nombre', true),
			'apellido' => $this->input->post('apellido', true),
			'email' => $this->input->post('email', true),
			'usuario' => $this->input->post('usuario', true),
			'pass' => ($pass),
			'perfil_id' => '2'
		);
	
		if (!$this->form_validation->run()){
			$data = array('titulo' => 'Error de formulario');
	
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$nombre = $data['nombre'];
			$apellido = $data['apellido'];
			$email = $data['email'];
			$pass = $data['pass'];
	
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('usuarios/agregausuario');
			$this->load->view('partes/footer');
		} else {
			// Envio array al metodo insert para registro de datos
			$usuario = $this->usuario_model->add_usuario($data);
			// Redirecciono a la pagina de perfil
			echo "<script>alert('El nuevo usuario ha sido agregado correctamente!');</script>";
			redirect('usuarios', 'refresh');
		}
	}
	
	
	


	function eliminar_usuario(){
		$id = $this->uri->segment(2); 
		$data = array(
			'baja'=>'SI'
			);

		$this->usuario_model->estado_usuario($id, $data);
		$datos_usuarios = $this->usuario_model->edit_usuario($id);
		echo "<script>alert('El usuario ha sido dado de Baja');</script>";
		redirect('usuarios' , 'refresh');
	}

	function activar_usuario(){
		$id = $this->uri->segment(2);
		$data = array(
			'baja'=>'NO'
		);
		$this->usuario_model->estado_usuario($id, $data);
		$datos_usuarios = $this->usuario_model->edit_usuario($id);
		echo "<script>alert('El usuario ha sido dado de alta nuevamente!');</script>";
		redirect('usuarios_eliminados' , 'refresh');
	}

    /* Productos eliminados logicamente*/
	function muestrausuarios_eliminados(){  
		
		if($this->_veri_log()){
			$data = array('titulo' => 'Usuarios eliminados');

			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


			$dat = array(
				'usuarios' => $this->usuario_model->not_active_usuarios()
			);

			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2',$data);
			$this->load->view('partes/header');
			$this->load->view('usuarios/muestrausuarioseli/usuarioseli',$dat);
			$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');
			}
		}

	function mostraradmin_eliminado(){
		if($this->_veri_log()){

		$data = array('titulo' => 'Administradores eliminados');
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];

			$dat = array(
					'usuarios' => $this->usuario_model->get_administradores_eli()
				);

			$this->load->view('partes/head',$data);
			$this->load->view('partes/header2',$data);
			$this->load->view('partes/header');
			$this->load->view('usuarios/muestrausuarioseli/usuariosadmineli',$dat);
			$this->load->view('partes/footer');
		}else{
			redirect('iniciarsesion', 'refresh');
		}
	}

    function mostrarcliente_eliminado(){
		if($this->_veri_log()){
			$data = array('titulo' => 'Clientes Eliminados');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];


				$dat = array(
						'usuarios' => $this->usuario_model->get_usuarios_clientes_eli()
					);

				$this->load->view('partes/head',$data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/muestrausuarioseli/usuariosclienteli',$dat);
				$this->load->view('partes/footer');
		}else{
			redirect('iniciarsesion', 'refresh');
		}
    }

	public function buscaruser() {
		if ($this->_veri_log()) {
			$data = array('titulo' => 'Resultados de Búsqueda');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$nombre = $data['nombre'];
			$apellido = $data['apellido'];
			$email = $data['email'];
			$pass = $data['pass'];

			if ($data['perfil_id'] == '1') {
				$query = $this->input->get('query');
				if (empty($query)) { 
					$data['usuarios'] = $this->usuario_model->all_users();  
				} else { 
					$data['usuarios'] = $this->usuario_model->buscar($query);
				}
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/buscaruser', $data); // Vista de búsqueda
				$this->load->view('partes/footer');
			} else {
				redirect('iniciarsesion', 'refresh'); 
			}
		} else {
			redirect('iniciarsesion', 'refresh'); 
		}
	}

	public function buscaruserelim() {
		if ($this->_veri_log()) {
			$data = array('titulo' => 'Resultados de Búsqueda');
			$session_data = $this->session->userdata('logged_in');
			$data['perfil_id'] = $session_data['perfil_id'];
			$nombre = $data['nombre'];
			$apellido = $data['apellido'];
			$email = $data['email'];
			$pass = $data['pass'];

			if ($data['perfil_id'] == '1') {
				$query = $this->input->get('query');
				if (empty($query)) { 
					$data['usuarios'] = $this->usuario_model->all_users_elim();  
				} else { 
					$data['usuarios'] = $this->usuario_model->buscarelim($query);
				}
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('usuarios/buscaruserelim', $data); // Vista de búsqueda
				$this->load->view('partes/footer');
			} else {
				redirect('iniciarsesion', 'refresh'); 
			}
		} else {
			redirect('iniciarsesion', 'refresh'); 
		}
	}
}