<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('carrito_model');
		$this->load->model('producto_model');
		$this->load->model('usuario_model');
        $this->load->library('cart');
	}

	public function index(){
       	$data['titulo'] = 'Catalogo';
	 
	 if($session_data = $this->session->userdata('logged_in')){

		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];

		 $dat = array('productos' => $this->producto_model->get_productos() );
	       $this->load->view('partes/head',$data);
		   $this->load->view('partes/header2',$data);
          $this->load->view('partes/header');
	       $this->load->view('catalogo/catalogo',$dat);
	       $this->load->view('partes/footer');
	
	 }else{

		 $this->load->view('partes/head',$data);
		 $this->load->view('partes/header2',$data);
		 $this->load->view('partes/header');
		 $this->load->view('contenido/iniciarsesion');
		 $this->load->view('partes/footer');

		}
	}
 

		
	//Agrega elemento al carrito
	function add()
	{
        // Genera array para insertar en el carrito
		$insert_data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('descripcion'),
			'price' => $this->input->post('precio_venta'),
			'qty' => 1
			);	

        // Inserta elemento al carrito
		$this->cart->insert($insert_data);
	      
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	public function remove_one() {
		$rowid = $this->input->post('rowid');
	
		// Si el rowid está presente, eliminar el artículo del carrito
		if ($rowid) {
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
	
			$this->cart->update($data);
		}
	
		// Redirigir al carrito para ver los cambios
		redirect('carro');
	}	

	//Elimina elemento del carrito o el carrito entero
	public function remove() {
		$rowid = $this->input->post('rowid');
			
		// Si $rowid es "all", destruye todo el carrito
		if ($rowid === "all") {
			$this->cart->destroy();
		} else {
			// Sino, destruye solo la fila seleccionada
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			// Actualiza los datos
			$this->cart->update($data);
		}
		// Redirige de vuelta a la página del carrito
		redirect('carrito');
	}
	
	//Actualiza el carrito que se muestra
	function actualiza_carrito(){        
	   	$cart_info =  $_POST['cart']; // Recibe los datos del carrito, calcula y actualiza
		foreach( $cart_info as $id => $cart){	
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array(
					'rowid'   => $rowid,
					'price'   => $price,
					'amount' =>  $amount,
					'qty'     => $qty
					);
			$this->cart->update($data);
		}

		// Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}

	//Muestra los detalles de la venta y confirma(función guarda_compra())
	function muestra_compra()
	{
		$data = array('titulo' => 'Confirmar compra');
		
		$session_data = $this->session->userdata('logged_in');
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
		
		$this->load->view('partes/head', $data);
		$this->load->view('partes/header2',$data);
         $this->load->view('partes/header');
		$this->load->view('carrito/carrito_view', $data);
		$this->load->view('partes/footer');
    }

	public function form_compras(){
		$session_data = $this->session->userdata('logged_in');
		$cart = $this->cart->contents();
	
		if (empty($cart)) {
			redirect('catalogo');
		}
	
		$data = array(
			'titulo' => 'Confirmar compra',
			'perfil_id' => $session_data['perfil_id'],
			'nombre' => $session_data['nombre'],
			'apellido' => $session_data['apellido'],
			'email' => $session_data['email'],
			'error' => $this->session->flashdata('error') // Recibir error de la sesión
		);
	
		$this->load->view('partes/head', $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('carrito/form_compra', $data);
		$this->load->view('partes/footer');
	}
	
	public function guardar_cierre_venta()
	{
		// Verificar la sesión antes de comenzar
		if (!$this->session->userdata('logged_in')) {
			redirect('login'); // Redirigir al inicio de sesión si no hay sesión activa
		}
	
		$session_data = $this->session->userdata('logged_in');
		log_message('debug', 'Datos de sesión antes de guardar la venta: ' . print_r($session_data, TRUE));
	
		// Establecer reglas de validación
		$this->form_validation->set_rules('name', 'Nombre', 'required|alpha');
		$this->form_validation->set_rules('tel', 'Teléfono', 'required|numeric|min_length[10]|max_length[15]|regex_match[/^\S+$/]');
		$this->form_validation->set_rules('direc', 'Dirección', 'required');
	
		// Mensajes de error personalizados
		$this->form_validation->set_message('regex_match', 'El %s no puede contener espacios.');
		$this->form_validation->set_message('required', 'El %s es obligatorio.');
		$this->form_validation->set_message('alpha', 'El %s no puede contener números ni caracteres especiales.');
		$this->form_validation->set_message('numeric', 'El %s debe ser un número.');
		$this->form_validation->set_message('min_length', 'El %s debe tener al menos %s caracteres.');
		$this->form_validation->set_message('max_length', 'El %s no puede tener más de %s caracteres.');
	
		// Comprobar si la validación es exitosa
		if ($this->form_validation->run() == FALSE) {
			// Si la validación falla, establecer el error en la sesión
			$this->session->set_flashdata('error', validation_errors());
			redirect('form_compra');
			return;
		}
	
		// Datos de la venta
		$venta = array(
			'fecha'       => date('Y-m-d'),
			'usuario_id'  => $session_data['id'],
			'total_venta' => $this->cart->total()
		);
	
		// Insertar en tabla de ventas y obtener el ID de la venta
		$venta_id = $this->carrito_model->insert_venta($venta);
	
		if (!$venta_id) {
			log_message('error', 'Error al insertar la venta.');
			return; // Salir de la función si ocurre un error
		}
	
		// Datos del cierre de venta
		$data = array(
			'venta_id' => $venta_id,
			'name'     => $this->input->post('name'),
			'tel'      => $this->input->post('tel'),
			'direc'    => $this->input->post('direc')
		);
	
		// Insertar datos del cierre de venta
		$this->carrito_model->insert_cierre_venta($data);
	
		// Insertar los detalles de los productos vendidos en ventas_detalle y actualizar stock
		foreach ($this->cart->contents() as $item) {
			$venta_detalle = array(
				'venta_id'    => $venta_id,
				'producto_id' => $item['id'],
				'cantidad'    => $item['qty'],
				'precio'      => $item['price'],
				'total'       => $item['subtotal']
			);
	
			$this->carrito_model->insert_venta_detalle($venta_detalle);
	
			// Obtener el stock actual del producto
			$producto = $this->producto_model->edit_producto($item['id']);
			foreach($producto->result() as $row){
				$stock = $row->stock;
			}
	
			$stock_edit = $stock - $item['qty'];
	
			// Actualizar el stock del producto
			$stock_nuevo = array(
				'stock' => $stock_edit
			);
	
			$this->producto_model->update_producto($item['id'], $stock_nuevo);
		}
	
		// Limpiar el carrito
		$this->cart->destroy();
	
		// Verificar la sesión después de las operaciones
		$session_data = $this->session->userdata('logged_in');
		log_message('debug', 'Datos de sesión después de guardar la venta: ' . print_r($session_data, TRUE));
	
		// Redirigir al comprobante
		redirect('comprobar/'.$venta_id);
	}
	
	
	
	public function comprobantear($venta_id)
	{
		// Verificar si la sesión está activa
		if (!$this->session->userdata('logged_in')) {
			redirect('login'); // Redirigir al inicio de sesión si no hay sesión activa
		}
	
		$session_data = $this->session->userdata('logged_in');
		log_message('debug', 'Datos de sesión en comprobante: ' . print_r($session_data, TRUE));
	
		// Definir datos necesarios
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
	
		// Obtener detalles de la venta
		$data['venta_detalles'] = $this->carrito_model->get_ventas_con_detalles($venta_id);
	
		if (!$data['venta_detalles']->num_rows()) {
			show_404(); // Mostrar error 404 si no se encuentran los detalles de la venta
		}
	
		// Verificar los detalles de la venta
		log_message('debug', 'Detalles de la venta: ' . print_r($data['venta_detalles']->result(), TRUE));
	
		// Cargar las vistas con los datos correspondientes

		$this->load->view('partes/head',$data);
		$this->load->view('partes/header2',$data);
		$this->load->view('partes/header');
		$this->load->view('carrito/comprobante', $data);
		$this->load->view('partes/footer');
	}

	public function detalle_compra($venta_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Redirigir al inicio de sesión si no hay sesión activa
        }

        $session_data = $this->session->userdata('logged_in');
        log_message('debug', 'Datos de sesión en comprobante: ' . print_r($session_data, TRUE));

        // Definir datos necesarios
        $data['perfil_id'] = $session_data['perfil_id'];
        $data['nombre'] = $session_data['nombre'];

        // Obtener detalles de la venta
        $data['venta_detalles'] = $this->carrito_model->get_compras_con_detalles($venta_id);

        if (!$data['venta_detalles']->num_rows()) {
            show_404(); // Mostrar error 404 si no se encuentran los detalles de la venta
        }

        // Verificar los detalles de la venta
        log_message('debug', 'Detalles de la venta: ' . print_r($data['venta_detalles']->result(), TRUE));

        // Cargar las vistas con los datos correspondientes
        $this->load->view('partes/head', $data);
        $this->load->view('partes/header2', $data);
        $this->load->view('partes/header');
        $this->load->view('carrito/detalle_compras', $data);
        $this->load->view('partes/footer');
    }

	public function detalle_venta($venta_id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('login'); // Redirigir al inicio de sesión si no hay sesión activa
		}
	
		$session_data = $this->session->userdata('logged_in');
		log_message('debug', 'Datos de sesión en comprobante: ' . print_r($session_data, TRUE));
	
		// Definir datos necesarios
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
	
		// Obtener detalles de la venta
		$data['venta_detalles'] = $this->carrito_model->get_compras_con_detalles($venta_id);
	
		if (!$data['venta_detalles']->num_rows()) {
			show_404(); // Mostrar error 404 si no se encuentran los detalles de la venta
		}
	
		// Obtener información del usuario
		$venta_detalle = $data['venta_detalles']->row();
		$usuario_id = $venta_detalle->usuario_id; // Asegúrate de que esta columna esté disponible en los detalles de la venta
		$data['usuario_info'] = $this->usuario_model->get_usuario($usuario_id);
	
		// Verificar los detalles de la venta
		log_message('debug', 'Detalles de la venta: ' . print_r($data['venta_detalles']->result(), TRUE));
		log_message('debug', 'Información del usuario: ' . print_r($data['usuario_info'], TRUE));
	
		// Cargar las vistas con los datos correspondientes
		$this->load->view('partes/head', $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('carrito/detalle_ventas', $data);
		$this->load->view('partes/footer');
	}
	

    //Guarda los datos de la venta en la base de datos    
    public function guarda_compra()
	{	
		$session_data = $this->session->userdata('logged_in');
		$data['id'] = $session_data['id'];
		$total = $this->cart->total();
		
		$venta = array(
			'fecha' 		=> date('Y-m-d'),
			'usuario_id' 	=> $data['id'],
			'total_venta'	=> $total
		);	
		$venta_id = $this->carrito_model->insert_venta($venta); //inserta en la tabla venta_cabecera
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$venta_detalle = array(
					'venta_id' 		=> $venta_id,
					'producto_id' 	=> $item['id'],
					'cantidad' 		=> $item['qty'],
					'precio' 		=> $item['price'],
					'total' 		=> $item['subtotal']
					);	
            
            	$cust_id = $this->carrito_model->insert_venta_detalle($venta_detalle); //inserta en la tabla venta_detalle

            	//Descuenta del stock y lo guarda en la base de datos
            	$producto = $this->producto_model->edit_producto($item['id']);
            	foreach ($producto->result() as $row) 
				{
					$stock = $row->stock;
				}

            	$stock_edit = $stock - 	$item['qty'];

            	$stock_nuevo = array(
            		'stock'	=> $stock_edit
            		);

            	$modifica = $this->producto_model->update_producto($item['id'], $stock_nuevo);

			endforeach;
		endif;
	    
            $final = $this->cart->destroy();
	        echo "<script>alert('Su Compra ha sido Confirmada!');</script>";
			return redirect('catalogo');
	}

	function borrar_carrito() 
	{
		$this->cart->destroy();
			
        // Redirige a la misma página que se encuentra
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	
	public function guardar_comprobante($venta_id)
	{
		// Verificar si la sesión está activa
		if (!$this->session->userdata('logged_in')) {
			redirect('login'); // Redirigir al inicio de sesión si no hay sesión activa
		}
	
		// Obtener detalles de la venta
		$data['venta_detalles'] = $this->carrito_model->get_ventas_con_detalles($venta_id);
	
		if (!$data['venta_detalles']->num_rows()) {
			show_404(); // Mostrar error 404 si no se encuentran los detalles de la venta
		}
	
		// Generar el contenido del comprobante (HTML, PDF, etc.)
		$html = $this->load->view('carrito/comprobante', $data, TRUE);
	
		// Aquí puedes usar una librería para generar PDF si lo deseas.
		// Por ejemplo, con la librería dompdf:
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->render();
		$this->pdf->stream("comprobante_venta_$venta_id.pdf", array("Attachment" => 1)); // Descargar el PDF
	
		// Opcionalmente, puedes guardar el PDF en el servidor
		// $output = $this->pdf->output();
		// file_put_contents("path/to/save/comprobante_venta_$venta_id.pdf", $output);
	}

	public function historial_compras() {
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	
		$session_data = $this->session->userdata('logged_in');
		$usuario_id = $session_data['id'];
	
		$ventas_cabecera = $this->carrito_model->get_compras_usuario($usuario_id);
		$data['combined_results'] = [];
	
		if ($ventas_cabecera->num_rows() > 0) {
			foreach ($ventas_cabecera->result() as $row) {
				$cierre_venta = $this->carrito_model->get_cierre_venta($row->id);
				if ($cierre_venta->num_rows() > 0) {
					$combined_row = (object) array_merge((array) $row, (array) $cierre_venta->row());
					$data['combined_results'][] = $combined_row;
				}
			}
		}
	
		$data['titulo'] = 'Historial de Compras';
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
	
		// Cargar la vista con los datos
		$this->load->view('partes/head', $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('carrito/miscompras', $data);
		$this->load->view('partes/footer');
	}	

	public function historial_ventas() {
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	
		$session_data = $this->session->userdata('logged_in');
		$admin_id = $session_data['id'];
	
		// Obtener todas las ventas realizadas por todos los usuarios
		$ventas_cabecera = $this->carrito_model->get_todas_ventas();
		$data['combined_results'] = [];
	
		if ($ventas_cabecera->num_rows() > 0) {
			foreach ($ventas_cabecera->result() as $row) {
				$cierre_venta = $this->carrito_model->get_cierre_venta($row->id);
				if ($cierre_venta->num_rows() > 0) {
					$usuario = $this->usuario_model->get_usuario($row->usuario_id);
					$combined_row = (object) array_merge((array) $row, (array) $cierre_venta->row());
					$data['combined_results'][] = $combined_row;
				}
			}
		}
	
		$data['titulo'] = 'Historial de Ventas';
		$data['perfil_id'] = $session_data['perfil_id'];
		$data['nombre'] = $session_data['nombre'];
		$data['apellido'] = $session_data['apellido'];
		$data['email'] = $session_data['email'];
	
		// Cargar la vista con los datos
		$this->load->view('partes/head', $data);
		$this->load->view('partes/header2', $data);
		$this->load->view('partes/header');
		$this->load->view('carrito/muestraventas', $data);
		$this->load->view('partes/footer');
	}
	
		public function carrito_actualiza() {
			$cart = $this->input->post('cart');
	
			foreach ($cart as $item) {
				$stock_disponible = $this->carrito_model->get_stock_producto($item['id']);
	
				if ($item['qty'] > $stock_disponible->stock) {
					$item['qty'] = $stock_disponible->stock;
					$this->session->set_flashdata('mensaje', 'Supera la cantidad maxima de stock de uno o mas productos. Estos se actualizarán al maximo disponible.');
				}
	
				$data = array(
					'rowid' => $item['rowid'],
					'qty' => $item['qty']
				);
	
				$this->cart->update($data);
			}
			redirect('carrito');
		}
		
		public function buscar_compras_por_fecha() {
			if (!$this->session->userdata('logged_in')) {
				redirect('login');
			}
		
			$session_data = $this->session->userdata('logged_in');
			$usuario_id = $session_data['id'];
			$fecha_inicio = $this->input->post('fecha_inicio');
			$fecha_fin = $this->input->post('fecha_fin');
		
			// Realizar la búsqueda por fecha de inicio y fecha fin
			$compras = $this->carrito_model->get_compras_por_fecha($usuario_id, $fecha_inicio, $fecha_fin);
			$combined_results = $compras->result();
		
			// Si no hay resultados en la búsqueda por fecha, cargar todas las compras
			if (empty($combined_results)) {
				$ventas_cabecera = $this->carrito_model->get_compras_usuario($usuario_id);
				$combined_results = [];
		
				if ($ventas_cabecera->num_rows() > 0) {
					foreach ($ventas_cabecera->result() as $row) {
						$cierre_venta = $this->carrito_model->get_cierre_venta($row->id);
						if ($cierre_venta->num_rows() > 0) {
							$combined_row = (object) array_merge((array) $row, (array) $cierre_venta->row());
							$combined_results[] = $combined_row;
						}
					}
				}
			}
		
			$data['combined_results'] = $combined_results;
		
			$data['titulo'] = 'Historial de Compras';
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['apellido'] = $session_data['apellido'];
			$data['email'] = $session_data['email'];
		
			// Verificar si hay compras
			$data['compra'] = !empty($data['combined_results']);
		
			// Cargar la vista con los datos
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('carrito/miscompras', $data);
			$this->load->view('partes/footer');
		}
		
		public function buscar_ventas_por_fecha() {
			if (!$this->session->userdata('logged_in')) {
				redirect('login');
			}
		
			$session_data = $this->session->userdata('logged_in');
			$usuario_id = $session_data['id'];
			$fecha_inicio = $this->input->post('fecha_inicio');
			$fecha_fin = $this->input->post('fecha_fin');
		
			log_message('debug', 'Fecha inicio: ' . $fecha_inicio);
			log_message('debug', 'Fecha fin: ' . $fecha_fin);
		
			// Realizar la búsqueda por fecha de inicio y fecha fin
			$ventas = $this->carrito_model->get_ventas_por_fecha($usuario_id, $fecha_inicio, $fecha_fin);
			$combined_results = $ventas->result();
		
			log_message('debug', 'Resultados de la búsqueda por fecha: ' . print_r($combined_results, true));
		
			// Si no hay resultados en la búsqueda por fecha, cargar todas las ventas
			if (empty($combined_results)) {
				$ventas_cabecera = $this->carrito_model->get_ventas_usuario($usuario_id);
				$combined_results = [];
		
				if ($ventas_cabecera->num_rows() > 0) {
					foreach ($ventas_cabecera->result() as $row) {
						$cierre_venta = $this->carrito_model->get_cierre_venta($row->id);
						if ($cierre_venta->num_rows() > 0) {
							$combined_row = (object) array_merge((array) $row, (array) $cierre_venta->row());
							$combined_results[] = $combined_row;
						}
					}
				}
			}
		
			log_message('debug', 'Resultados combinados: ' . print_r($combined_results, true));
		
			$data['combined_results'] = $combined_results;
			$data['titulo'] = 'Historial de Ventas';
			$data['perfil_id'] = $session_data['perfil_id'];
			$data['nombre'] = $session_data['nombre'];
			$data['apellido'] = $session_data['apellido'];
			$data['email'] = $session_data['email'];
			$data['venta'] = !empty($data['combined_results']);
		
			log_message('debug', '¿Hay ventas? ' . ($data['venta'] ? 'Sí' : 'No'));
		
			// Cargar la vista con los datos
			$this->load->view('partes/head', $data);
			$this->load->view('partes/header2', $data);
			$this->load->view('partes/header');
			$this->load->view('carrito/misventas_fecha', $data);
			$this->load->view('partes/footer');
		}
				
}