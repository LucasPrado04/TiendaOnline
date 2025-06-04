<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');


class Usuario_model extends CI_Model
{
	
	/* Constructor de la Clase */
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_usuario($usuario_id) {
		$this->db->select('nombre, apellido, email, usuario'); // Asegúrate de seleccionar las columnas correctas
		$this->db->from('usuarios');
		$this->db->where('id', $usuario_id);
		return $this->db->get()->row();
	}
	

	public function get_user_info_by_id($id) {
		$this->db->select('nombre, apellido, email, pass'); // Selecciona solo los campos necesarios
		$this->db->where('id', $id); 
		$query = $this->db->get('usuarios');
		return $query->row();
		}
	
		public function update_user($id, $data) {
			// Asegúrate de que el estado "baja" no esté siendo modificado accidentalmente
			unset($data['baja']); // Remueve cualquier campo 'baja' del array de datos si no es intencionalmente pasado
		
			$this->db->where('id', $id);
			$this->db->update('usuarios', $data);
		
			// Verificación adicional
			if ($this->db->affected_rows() == 0) {
				log_message('error', 'Error actualizando el usuario con ID ' . $id . ': ' . $this->db->_error_message());
			}
		}
	
	function all_users(){
        $this->db->where('baja', 'NO');
        $result = $this->db->get('usuarios');
        return $result->result();
    }

	function all_users_elim(){
        $this->db->where('baja', 'SI');
        $result = $this->db->get('usuarios');
        return $result->result();
    }

	function get_usuarios_no_elim()
    {
        $query = $this->db->get_where('usuarios', array('baja' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

	function get_administradores()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'NO', 'perfil_id' => '1'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}

	function get_administradores_eli()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'SI', 'perfil_id' => '1'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}

	function get_usuarios_clientes()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'NO', 'perfil_id' => '2'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}

	function get_usuarios_clientes_eli()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'SI', 'perfil_id' => '2'));
	    
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}
	

	function add_usuario($data)
	{
		$this->db->insert('usuarios', $data);
	}
	
	function edit_usuario($id)
	{
		$query = $this->db->get_where('usuarios', array('id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
	}
	

	function estado_usuario($id, $data){
	    $this->db->where('id', $id);
	    $query = $this->db->update('usuarios', $data);
	    if($query) {
	        return TRUE;
	    } else {
	        return FALSE;
	    }
	}


	function not_active_usuarios()
	{
	    $query = $this->db->get_where('usuarios', array('baja' => 'SI'));
	    if($query->num_rows()>0) {
	        return $query;
	    } else {
	        return FALSE;
	    }        
	}



	function delete_usuario($id)
	{			
		$this->db->where('id', $id);
		$query = $this->db->delete('usuarios'); 
		return true;	
	}

	public function buscar($query) {
        // Verificar si el query está vacío
        if(empty($query)) {
        return [];
        }
            // Realizar búsqueda con LIKE
        $this->db->like('nombre', $query);
		$this->db->or_like('apellido', $query);
		$this->db->or_like('email', $query);
        $this->db->where('baja', 'NO');
        $query = $this->db->get('usuarios');
        return $query->result();
    }

	public function buscarelim($query) {
        // Verificar si el query está vacío
        if(empty($query)) {
        return [];
        }
            // Realizar búsqueda con LIKE
        $this->db->like('nombre', $query);
		$this->db->or_like('apellido', $query);
		$this->db->or_like('email', $query);
        $this->db->where('baja', 'SI');
        $query = $this->db->get('usuarios');
        return $query->result();
    }
}