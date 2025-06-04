<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carrito_model extends CI_Model {

	/*
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('usuario_model');
    }

	public function insert_venta_detalle($data)
	{
		$this->db->insert('ventas_detalle', $data);
	}
       
	public function insert_venta($data)
	{
		$this->db->insert('ventas_cabecera', $data);
		$id = $this->db->insert_id();
		//isset — Determina si una variable está definida y no es NULL
		return (isset($id)) ? $id : FALSE;
	}
	
	public function get_venta_cabeceras($venta_id)
	{
		$query = $this->db->get_where('venta_cabeceras', array('id' => $venta_id), 1);
	
		if($query->num_rows() == 1) {
			return $query;
		} else {
			return FALSE;
		}
	}

	public function get_venta_detail($venta_id)
	{
		$query = $this->db->get_where('cierre_venta', array('id' => $venta_id), 1);
	
		if($query->num_rows() == 1) {
			return $query;
		} else {
			return FALSE;
		}
	}
	
	public function get_ventas_con_detalles($venta_id) {
		$this->db->select('vc.*, vc.fecha, cv.name, cv.tel, cv.direc, vd.producto_id, vd.cantidad, vd.precio, p.descripcion');
		$this->db->from('ventas_cabecera vc');
		$this->db->join('cierre_venta cv', 'vc.id = cv.venta_id', 'left');
		$this->db->join('ventas_detalle vd', 'vc.id = vd.venta_id', 'left');
		$this->db->join('productos p', 'vd.producto_id = p.id_producto', 'left');
		$this->db->where('vc.id', $venta_id);
		$this->db->order_by('vc.fecha', 'DESC'); // Ordenar por fecha de manera descendente
		return $this->db->get();
	}	

	public function get_compras_con_detalles($venta_id) {
		$this->db->select('vc.*, cv.name, cv.tel, cv.direc, vd.producto_id, vd.cantidad, vd.precio, p.descripcion, (vd.cantidad * vd.precio) AS subtotal, vc.total_venta');
		$this->db->from('ventas_cabecera vc');
		$this->db->join('cierre_venta cv', 'vc.id = cv.venta_id', 'left');
		$this->db->join('ventas_detalle vd', 'vc.id = vd.venta_id', 'left');
		$this->db->join('productos p', 'vd.producto_id = p.id_producto', 'left');
		$this->db->where('vc.id', $venta_id);
		$this->db->order_by('vc.fecha', 'DESC');
		return $this->db->get();
	}	
	
	public function get_todas_ventas() {
		$this->db->select('vc.*, u.usuario, vc.total_venta as total'); // Asegúrate de que estás obteniendo todos los campos necesarios
		$this->db->from('ventas_cabecera vc');
		$this->db->join('usuarios u', 'vc.usuario_id = u.id', 'left'); // Join con la tabla de usuarios para obtener el usuario
		$this->db->order_by('vc.fecha', 'DESC');
		return $this->db->get();
	}
	

	public function get_compras_usuario($usuario_id) {
        $this->db->select('vc.*, u.usuario, vc.total_venta as total'); // Asegúrate de que estás obteniendo todos los campos necesarios
        $this->db->from('ventas_cabecera vc');
        $this->db->join('usuarios u', 'vc.usuario_id = u.id', 'left'); // Join con la tabla de usuarios para obtener el usuario
        $this->db->where('vc.usuario_id', $usuario_id);
		$this->db->order_by('vc.fecha', 'DESC');
        return $this->db->get();
    }

	public function get_cierre_venta($venta_id) {
        $this->db->select('*');
        $this->db->from('cierre_venta');
        $this->db->where('venta_id', $venta_id);
        return $this->db->get();
    }

	public function insert_cierre_venta($data)
	{
		$this->db->insert('cierre_venta', $data);
	}

	 /* Retorna el stock del producto a comprar */
	 public function get_stock_producto($id) {
		$this->db->select('stock');
		$this->db->from('productos');
		$this->db->where('id_producto', $id);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
	
		if ($consulta->num_rows() > 0) {
			return $resultado;
		} else {
			return FALSE;
		}
	}
	
	public function get_compras_por_fecha($usuario_id, $fecha_inicio = null, $fecha_fin = null) {
		$this->db->select('vc.*, cv.name, cv.tel, cv.direc, u.usuario, vc.total_venta as total'); // Añadir campos necesarios de cierre_venta
		$this->db->from('ventas_cabecera vc');
		$this->db->join('usuarios u', 'vc.usuario_id = u.id', 'left');
		$this->db->join('cierre_venta cv', 'vc.id = cv.venta_id', 'left'); // Join con la tabla cierre_venta
		$this->db->where('vc.usuario_id', $usuario_id);
		
		if ($fecha_inicio) {
			$this->db->where('vc.fecha >=', $fecha_inicio);
		}
		if ($fecha_fin) {
			$this->db->where('vc.fecha <=', $fecha_fin);
		}
		
		$this->db->order_by('vc.fecha', 'DESC');
		return $this->db->get();
	}
	
	public function get_ventas_por_fecha($usuario_id, $fecha_inicio = null, $fecha_fin = null) {
		$this->db->select('vc.*, cv.name, cv.tel, cv.direc, u.usuario, vc.total_venta as total');
		$this->db->from('ventas_cabecera vc');
		$this->db->join('usuarios u', 'vc.usuario_id = u.id', 'left');
		$this->db->join('cierre_venta cv', 'vc.id = cv.venta_id', 'left');
		$this->db->where('vc.usuario_id', $usuario_id);
		if ($fecha_inicio) {
			$this->db->where('vc.fecha >=', $fecha_inicio);
		}
		if ($fecha_fin) {
			$this->db->where('vc.fecha <=', $fecha_fin);
		}
		$this->db->order_by('vc.fecha', 'DESC');
		return $this->db->get();
	}
	
	
	public function get_ventas_usuario($usuario_id) {
		$this->db->select('vc.*, u.usuario, vc.total_venta as total'); // Asegúrate de que estás obteniendo todos los campos necesarios
		$this->db->from('ventas_cabecera vc');
		$this->db->join('usuarios u', 'vc.usuario_id = u.id', 'left'); // Join con la tabla de usuarios para obtener el usuario
		$this->db->where('vc.usuario_id', $usuario_id);
		$this->db->order_by('vc.fecha', 'DESC');
		return $this->db->get();
	}
	
}