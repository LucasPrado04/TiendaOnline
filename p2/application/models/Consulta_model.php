<?php

if ( ! defined('BASEPATH')) exit('No direct script acces allowed');


class Consulta_model extends CI_Model
{
	
	/* Constructor de la Clase */
	function __construct()
	{
		parent::__construct();
	}

	/* ----------------------- Inserta una consulta ----------------------- */

	function add_consulta($data)
	{
		$this->db->insert('consultas', $data);
	}

	function get_consultas()
    {
        $query = $this->db->get_where('consultas');
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

    	function get_consultas_lei()
    {
        $query = $this->db->get_where('consultas', array('leido' => 'SI'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


	function get_consultas_no_lei()
    {
        $query = $this->db->get_where('consultas', array('leido' => 'NO'));
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }


    function estado_consulta($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('consultas', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	
    function get_consulta_by_id($id){ 
        $this->db->where('id', $id); 
        $query = $this->db->get('consultas'); 
        if ($query->num_rows() > 0){ 
            return $query->row(); 
        }else{ 
            return FALSE;
        } 
    }
}