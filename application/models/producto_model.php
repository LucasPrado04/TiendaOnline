<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Producto_model extends CI_Model{
		
	/**
    * Constructor de la clase
    */
    public function __construct() {
        parent::__construct();
    }

    function all_prods(){
        $this->db->where('eliminado', 'NO');
        $result = $this->db->get('productos');
        return $result->result();
    }

    /**
    * Retorna todos los productos
    */
    function get_productos()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    public function get_producto_by_id($id){ 
        $this->db->where('id', $id); 
        $query = $this->db->get('productos'); 
        if ($query->num_rows() == 1){
            return $query->row(); 
        }else{
            return false; 
        } 
    }

    function get_fernet()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '1'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_gancia(){
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '2'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_vodka(){
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '3'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function get_vino(){
        $query = $this->db->get_where('productos', array('eliminado' => 'NO', 'id_categoria' => '4'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


    /**
    * Inserta un producto
    */
    public function add_producto($data){
        $this->db->insert('productos', $data);
    }

    /**
    * Retorna todos los datos de un producto
    */
    function edit_producto($id){

        $query = $this->db->get_where('productos', array('id_producto' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
    * Actualiza los datos de un producto
    */
    function update_producto($id, $data){
        $this->db->where('id_producto', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Eliminación y activación logica de un producto
    */
    function estado_producto($id, $data){
        $this->db->where('id_producto', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
    * Retorna todos los productos inactivos o eliminados
        */
    function not_active_productos()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function not_active_productos_fernet()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI' , 'id_categoria' => '1'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function not_active_productos_gancia()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI', 'id_categoria' => '2'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function not_active_productos_vodka()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI', 'id_categoria' => '3'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    function not_active_productos_vino()
    {
        $query = $this->db->get_where('productos', array('eliminado' => 'SI', 'id_categoria' => '4'));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }
    function get_ventas_cabecera()
    {
        $this->db->join('usuarios','usuarios.id = ventas_cabecera.usuario_id') ;   
        //select * from ventas_cabecera;
        $query = $this->db->get('ventas_cabecera', 'usuarios.nombre','usuarios.apellido');
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    
        function get_ventas_detalle($id)
    {
        $this->db->join('productos','productos.id = ventas_detalle.producto_id');   

        //select * from ventas_detalle;
        $query = $this->db->get_where('ventas_detalle', array('venta_id' => $id));
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function obtener_ventas()
    {
        $this->db->select('vc.fecha, us.nombre, us.apellido, pr.descripcion, vd.cantidad, vd.total ,vc.usuario_id,vd.precio,vc.total_venta, us.usuario');
        $this->db->from('ventas_cabecera as vc');
        $this->db->join('usuarios as us','vc.usuario_id = us.id');
        $this->db->join('ventas_detalle as vd', 'vc.id = vd.venta_id');
        $this->db->join('productos as pr','vd.producto_id = pr.id_producto');
        $query = $this->db->get();

        if($query->num_rows()>0){
            return $query;
        }else {
            return FALSE;
        }
    }

    public function buscar($query) {
        // Verificar si el query está vacío
        if (empty($query)) {
        return [];
        }
            // Realizar búsqueda con LIKE
        $this->db->like('descripcion', $query);
        $this->db->where('eliminado', 'NO');
        $query = $this->db->get('productos');
        return $query->result();
    }

    public function buscar_eliminados($query) {
        if (empty($query)) {
            return [];
            }
            $this->db->like('descripcion', $query);
            $this->db->where('eliminado', 'SI');
            $query = $this->db->get('productos');
            return $query->result();
    }

        public function buscarcategory($query) {
            if (empty($query)) {
                return [];
            }

        $this->db->like('descripcion', $query);
        $this->db->where('eliminado', 'NO');
        $result = $this->db->get('productos');
        return $result->result();
    }

 
} 