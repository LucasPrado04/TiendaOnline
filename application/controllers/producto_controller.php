<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Producto_controller extends CI_Controller{
		
		function __construct() 
		{
			parent::__construct();
			$this ->load->model('producto_model');
			
		}

		private function _veri_log(){
			if ($this->session->userdata('logged_in')) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
		/** Muestra todos los productos en tabla */
		function index(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos los Productos');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				
				if($data['perfil_id'] == '1'){
					$dat = array('productos' => $this->producto_model->get_productos() );

					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/productos',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		function mostrar_fernet(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				if($data['perfil_id'] == '1'){
					$dat = array('productos' => $this->producto_model->get_fernet() );

					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/fernet',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		function mostrar_gancia(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				if($data['perfil_id'] == '1'){
					$dat = array('productos' => $this->producto_model->get_gancia() );

					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/gancia',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		function mostrar_vodka(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				if($data['perfil_id'] == '1'){
					$dat = array('productos' => $this->producto_model->get_vodka() );

					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/vodka',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		function mostrar_vino(){
			if($this->_veri_log()){
				$data = array('titulo' => 'Todos');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
				if($data['perfil_id'] == '1'){
					$dat = array('productos' => $this->producto_model->get_vino() );

					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/vino',$dat);
					$this->load->view('partes/footer');
				}else{
					redirect('iniciarsesion', 'refresh'); 
				}
			}else{
				redirect('iniciarsesion', 'refresh'); 
			}
		}
		/** Muestra formulario para agregar producto*/
		function form_agrega_producto(){ //Si se modifica, modificar (agrega_producto) tambien
			if($this->_veri_log()){
				$data = array('titulo' => 'Agregar Producto');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/agregaproducto');
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh'); }
		}

		/** Verifica datos ingresados en el formulario para agregar producto*/
		function agrega_producto(){
			// Genero las reglas de validacion
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|is_unique[productos.descripcion]|regex_match[/^[\S\s]+$/]');
			$this->form_validation->set_rules('id_categoria', 'Categoria', 'required');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			$this->form_validation->set_rules('filename', 'Imagen', 'required|callback__image_upload');
		
			// Mensajes de error si no pasan las reglas
			$this->form_validation->set_message('regex_match','<div class="alert alert-danger">El campo %s</div>');
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
			$this->form_validation->set_message('is_unique','<div class="alert alert-danger">El campo %s ya existe</div>');
			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');
		
			if (!$this->form_validation->run()){
				$data = array('titulo' => 'Error de formulario');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
		
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('productos/agregaproducto');
				$this->load->view('partes/footer');
			}else{
				$this->_image_upload();         
			}
		}
		
		
		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		function _image_upload(){
			$this->load->library('upload');
            //Comprueba si hay un archivo cargado
            if (!empty($_FILES['filename']['name'])){
                // Especifica la configuración para el archivo
                $config['upload_path'] = './assets/img/';
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size'] = '2048';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';       
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);

                if (!empty($_FILES['filename']['name'])){
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $data = $this->upload->data();

                    // Path donde guarda el archivo..
                    $url ="./assets/img/".$_FILES['filename']['name'];

                    // Array de datos para insertar en productos
                    $data = array(
						'descripcion'=>$this->input->post('descripcion',true),
						'id_categoria'=>$this->input->post('id_categoria',true),
						'imagen'=>$url,
						'precio_venta'=>$this->input->post('precio_venta',true),
						'stock'=>$this->input->post('stock',true),
						'stock_min'=>$this->input->post('stock_min',true),
						'eliminado'=>'NO',
					);

					$productos = $this->producto_model->add_producto($data);
                    echo "<script>alert('El producto ha sido cargado correctamente!');</script>";
					redirect('productos', 'refresh');
					return TRUE;
                }else{
                	//Mensaje de error si no existe imagen correcta
                    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';//$this->upload->display_errors();
					$this->form_validation->set_message('_image_upload',$imageerrors );
					return false;
                }
            }
		}

		/**
	    * Muestra para modificar un producto
	    */
		function muestra_modificar(){
			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);
			if ($datos_producto != FALSE) {
				foreach ($datos_producto->result() as $row) {
					$descripcion = $row->descripcion;
					$id_categoria = $row->id_categoria;
					$imagen = $row->imagen;
					$precio_venta = $row->precio_venta;
					$stock = $row->stock;
					$stock_min = $row->stock_min;	
				}
				$dat = array('producto' =>$datos_producto,
					'id_producto'=>$id,
					'descripcion'=>$descripcion,
					'id_categoria'=>$id_categoria,
					'imagen'=>$imagen,
					'precio_venta'=>$precio_venta,
					'stock'=>$stock,
					'stock_min'=>$stock_min
				);
			}else{
				return FALSE;
			}
			if($this->_veri_log()){
				$data = array('titulo' => 'Modificar Producto');

				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/modificaproducto',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		/** Verifica datos para modificar un producto*/
		function modificar_producto(){
			//Validación del formulario
			$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|regex_match[/^[\S\s]+$/]');
			$this->form_validation->set_rules('id_categoria', 'Categoria', 'required|numeric');
			$this->form_validation->set_rules('precio_venta', 'Precio Venta', 'required|numeric');
			$this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
			$this->form_validation->set_rules('stock_min', 'Stock Minimo', 'required|numeric');
			
			//Mensaje del form_validation
			$this->form_validation->set_message('regex_match','<div class="alert alert-danger">El campo %s es obligatorio, no deje espacio vacio</div>');
			$this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio, al intentar modificar estaba vacio</div>');
			$this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico, al intentar modificar estaba vacio</div>'); 

			$id = $this->uri->segment(2);
			$datos_producto = $this->producto_model->edit_producto($id);

			foreach ($datos_producto->result() as $row) {
				$imagen = $row->imagen;
			}
			$dat = array(
				'id_producto'=>$id,
				'descripcion'=>$this->input->post('descripcion',true),
				'id_categoria'=>$this->input->post('id_categoria',true),
				'imagen'=>$imagen,
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true)
			);

			if ($this->form_validation->run()== FALSE)
			{
				$data = array('titulo' => 'Error de formulario');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

                $this->load->view('partes/head',$data);
				$this->load->view('partes/header2',$data);
                $this->load->view('partes/header');
                $this->load->view('productos/modificaproducto',$dat);
                $this->load->view('partes/footer');
			}else{
				if($this->form_validation->run()){
					$data = array('titulo' => 'Error de formulario');
					$session_data = $this->session->userdata('logged_in');
					$data['perfil_id'] = $session_data['perfil_id'];
					$data['nombre'] = $session_data['nombre'];
	
					$this->load->view('partes/head',$data);
					$this->load->view('partes/header2',$data);
					$this->load->view('partes/header');
					$this->load->view('productos/muestraactivos/productos',$dat);
					$this->load->view('partes/footer');
				}
				$this->_image_modif();		
			}	
		}

		/**
		* Obtiene los datos del archivo imagen.
		* Permite archivos gif, jpg, png
		* Verifica si los datos son correcto en conjunto con la imagen y lo inserta en la tabla correspondiente
		* Si el campo imagen se encuentra vacio asume que la imagen no fue moficado.
		* En la tabla guarda la URL de donde se encuentra la imagen.
		*/
		function _image_modif(){
			$this->load->library('upload'); //Cargo la libreria para subir archivos
	    	$id = $this->uri->segment(2); // Obtengo el id del producto
			$datos_producto = $this->producto_model->edit_producto($id);
			foreach ($datos_producto->result() as $row){
				$eliminado = $row->eliminado;
			}

	        // Array de datos para obtener datos del producto sin la imagen 
			$dat = array(
				'id_producto'=>$id,
				'descripcion'=>$this->input->post('descripcion',true),
				'id_categoria'=>$this->input->post('id_categoria',true),
				'precio_venta'=>$this->input->post('precio_venta',true),
				'stock'=>$this->input->post('stock',true),
				'stock_min'=>$this->input->post('stock_min',true),
			);

			// Si la iamgen esta vacia se asume que no se modifica
			if (!empty($_FILES['filename']['name'])){  
	            // Especifica la configuración para el archivo
				$config['upload_path'] = './assets/img/cat/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '2048';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';       
				if (!empty($_FILES['filename']['name'])){
					$data = $this->upload->data(); // Mueve archivo a la carpeta indicada en la variable $data
					$url ="./assets/img/".$_FILES['filename']['name'];// Path donde guarda el archivo..
					$dat['imagen']=$url; // Agrego la imagen si se modifico.  
	    			$this->producto_model->update_producto($id, $dat); // Actualiza datos del producto
                    echo "<script>alert('El producto ha sido modificado correctamente!');</script>";
					redirect('productos', 'refresh');
				}else{ //Mensaje de error si no existe imagen correcta
					$imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extención incorrecto o excede el tamaño permitido que es de: 2MB </div>';
					$this->form_validation->set_message('_image_modif',$imageerrors );
					return false;;
				} 
			}else{
				$this->producto_model->update_producto($id, $dat);
				if($eliminado == 'NO'){
					redirect('productos', 'refresh');
				} else {
					redirect('productos_elim', 'refresh');
				}
			}
		}

		/**
		* Obtiene los datos del producto a eliminar
		*$ this-> uri-> segment (n)
		* Permite recuperar un segmento específico. Donde n es el número de segmento que desea recuperar. Los segmentos están numerados de izquierda a derecha. 
		*/
		function eliminar_producto(){
			$id = $this->uri->segment(2); 
			$data = array(
				'eliminado'=>'SI'
			);
			$this->producto_model->estado_producto($id, $data);
			$datos_producto = $this->producto_model->edit_producto($id);
			echo "<script>alert('El producto ha sido dado de Baja!');</script>";
			redirect('productos', 'refresh');
		}

		function activar_producto(){
			$id = $this->uri->segment(2);
			$data = array(
				'eliminado'=>'NO'
			);
			$this->producto_model->estado_producto($id, $data);
			$datos_producto = $this->producto_model->edit_producto($id);
			echo "<script>alert('El producto ha sido dado de Alta!');</script>";			
			redirect('productos_elim', 'refresh');
		}

		function muestra_eliminados(){    	
			if($this->_veri_log()){
				$data = array('titulo' => 'Productos eliminados');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array(
							'productos' => $this->producto_model->not_active_productos()
				);

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/muestraeliminados/productos_elim',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		function mostrar_fernetelim(){    	
			if($this->_veri_log()){
				$data = array('titulo' => 'Productos eliminados');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array(
							'productos' => $this->producto_model->not_active_productos_fernet()
				);

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/muestraeliminados/fernet_elim',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		function mostrar_ganciaelim(){    	
			if($this->_veri_log()){
				$data = array('titulo' => 'Productos eliminados');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array(
							'productos' => $this->producto_model->not_active_productos_gancia()
				);

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/muestraeliminados/gancia_elim',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		function mostrar_vodkaelim(){    	
			if($this->_veri_log()){
				$data = array('titulo' => 'Productos eliminados');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array(
							'productos' => $this->producto_model->not_active_productos_vodka()
				);

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/muestraeliminados/vodka_elim',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		function mostrar_vinoelim(){    	
			if($this->_veri_log()){
				$data = array('titulo' => 'Productos eliminados');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array(
							'productos' => $this->producto_model->not_active_productos_vino()
				);

				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('productos/muestraeliminados/vino_elim',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('iniciarsesion', 'refresh');}
		}

		function listar_ventas(){ 
			if($this->_veri_log()){		
				$data = array('titulo' => 'Ventas');
			
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array('ventas_cabecera' => $this->producto_model->obtener_ventas());

				$this->load->view('partes/head',$data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('carrito/muestraventas',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('login', 'refresh');
			}
		}

		function mi_compra(){ 
			if($this->_veri_log()){
				$data = array('titulo' => 'Mi Compra');
		
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				$dat = array('ventas_cabecera' => $this->producto_model->obtener_ventas());

				$this->load->view('partes/head',$data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/header');
				$this->load->view('carrito/miscompras',$dat);
				$this->load->view('partes/footer');
			}else{
				redirect('login', 'refresh');
			}
		}

		function muestra_detalle($id){
			if($this->_veri_log()){
				$data = array('titulo' => 'Detalle');
				
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
						
				$dat = array('ventas_detalle' => $this->producto_model->get_ventas_detalle($id));

				$this->load->view('partes/head_view', $data);
				$this->load->view('partes/header2',$data);
				$this->load->view('partes/menu_view2', $data);
				$this->load->view('back/usuarios/muestradetalle', $dat);
				$this->load->view('partes/footer');
			}else{
				redirect('login', 'refresh');
			}
		}

		public function buscar() {
			if ($this->_veri_log()) {
				$data = array('titulo' => 'Resultados de Búsqueda');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				if ($data['perfil_id'] == '1') {
					$query = $this->input->get('query');
					if (empty($query)) { $data['productos'] = []; 
					} else { 
						$data['productos'] = $this->producto_model->buscar($query);
					}
					$this->load->view('partes/head', $data);
					$this->load->view('partes/header2', $data);
					$this->load->view('partes/header');
					$this->load->view('productos/buscar', $data); // Vista de búsqueda
					$this->load->view('partes/footer');
				} else {
					redirect('iniciarsesion', 'refresh'); 
				}
			} else {
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		public function buscar_eliminados() {
			if ($this->_veri_log()) {
				$data = array('titulo' => 'Resultados de Búsqueda');
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];

				if ($data['perfil_id'] == '1') {
					$query = $this->input->get('query');
					if (empty($query)) { $data['productos'] = []; 
					} else { 
						$data['productos'] = $this->producto_model->buscar_eliminados($query);
					}
					$this->load->view('partes/head', $data);
					$this->load->view('partes/header2', $data);
					$this->load->view('partes/header');
					$this->load->view('productos/buscar_eliminados', $data); // Vista de búsqueda
					$this->load->view('partes/footer');
				} else {
					redirect('iniciarsesion', 'refresh'); 
				}
			} else {
				redirect('iniciarsesion', 'refresh'); 
			}
		}

		public function buscarcat() {
			// Verificar si el usuario está logueado
			$is_logged_in = $this->session->userdata('logged_in');
		
			$query = $this->input->get('query');
			$data = array('titulo' => 'Resultado de búsqueda');
		
			if ($is_logged_in) {
				// Si el usuario está logueado, obtenemos los datos de la sesión
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
			} else {
				// Si el usuario no está logueado, no hacemos nada con los datos de la sesión
				$data['perfil_id'] = null;
				$data['nombre'] = 'Invitado';
			}
		
			// Realizar la búsqueda
			if (empty($query)) {
				$data['productos'] = $this->producto_model->all_prods();
			} else {
				$data['productos'] = $this->producto_model->buscarcategory($query);
			}
		
			// Cargar las vistas con los datos
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('catalogo/buscar_cat', $data); // Vista de búsqueda
			$this->load->view('partes/footer');
		}
		
		public function modificaproducto($id_producto){
			$producto = $this->producto_model->get_producto_by_id($id_producto); 
			if (!$producto){ 
				show_404(); 
			} 
			$data = array( 
				'id_producto' => $producto->id_producto, 
				'descripcion' => $producto->descripcion, 
				'precio_venta' => $producto->precio_venta, 
				'id_categoria' => $producto->id_categoria, 
				'stock' => $producto->stock, 
				'stock_min' => $producto->stock_min, 
				'imagen' => $producto->imagen 
			); 
				$this->load->view('partes/head', $data); $this->load->view('modificaproducto', $data); $this->load->view('partes/footer'); 
			}

			public function obtener_stock($productId) {
				$this->db->select('stock');
				$this->db->where('id_producto', $productId);
				$query = $this->db->get('productos');
				if ($query->num_rows() == 1) {
					return $query->row()->stock;
				} else {
					return 0; // Retorna 0 si no encuentra el producto
				}
			}

		public function mostrar_fernet_catalogo() {
			$is_logged_in = $this->session->userdata('logged_in');
			$query = $this->input->get('query');
			$data = array('titulo' => 'Busqueda de fernet');
		
			if ($is_logged_in) {
				// Si el usuario está logueado, obtenemos los datos de la sesión
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
			} else {
				// Si el usuario no está logueado, no hacemos nada con los datos de la sesión
				$data['perfil_id'] = null;
				$data['nombre'] = 'Invitado';
			}
		
				$dat = array('productos' => $this->producto_model->get_fernet());
		
				$this->load->view('partes/head', $data);
				$this->load->view('partes/header2', $data);
				$this->load->view('partes/header');
				$this->load->view('catalogo/catalogo_fernet', $dat); // Cambiar la vista a 'fernet'
				$this->load->view('partes/footer');
			}

		public function mostrar_gancia_catalogo() {

			$is_logged_in = $this->session->userdata('logged_in');
			$query = $this->input->get('query');
			$data = array('titulo' => 'Busqueda de fernet');
			
			if ($is_logged_in) {
				// Si el usuario está logueado, obtenemos los datos de la sesión
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
			} else {
			// Si el usuario no está logueado, no hacemos nada con los datos de la sesión
				$data['perfil_id'] = null;
				$data['nombre'] = 'Invitado';
			}
			$dat = array('productos' => $this->producto_model->get_gancia());
	
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('catalogo/catalogo_gancia', $dat); // Cambiar la vista a 'fernet'
			$this->load->view('partes/footer');
		}

		public function mostrar_vodka_catalogo() {

			$is_logged_in = $this->session->userdata('logged_in');
			$query = $this->input->get('query');
			$data = array('titulo' => 'Busqueda de fernet');
			
			if ($is_logged_in) {
				// Si el usuario está logueado, obtenemos los datos de la sesión
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
			} else {
			// Si el usuario no está logueado, no hacemos nada con los datos de la sesión
				$data['perfil_id'] = null;
				$data['nombre'] = 'Invitado';
			}
			$dat = array('productos' => $this->producto_model->get_vodka());
	
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('catalogo/catalogo_vodka', $dat); // Cambiar la vista a 'fernet'
			$this->load->view('partes/footer');
		}

		public function mostrar_vino_catalogo() {

			$is_logged_in = $this->session->userdata('logged_in');
			$query = $this->input->get('query');
			$data = array('titulo' => 'Busqueda de fernet');
			
			if ($is_logged_in) {
				// Si el usuario está logueado, obtenemos los datos de la sesión
				$session_data = $this->session->userdata('logged_in');
				$data['perfil_id'] = $session_data['perfil_id'];
				$data['nombre'] = $session_data['nombre'];
			} else {
			// Si el usuario no está logueado, no hacemos nada con los datos de la sesión
				$data['perfil_id'] = null;
				$data['nombre'] = 'Invitado';
			}
			$dat = array('productos' => $this->producto_model->get_vino());
	
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('catalogo/catalogo_vino', $dat); // Cambiar la vista a 'fernet'
			$this->load->view('partes/footer');
		}
	}