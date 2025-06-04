<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

    public function __construct() 
    {
        parent::__construct();
    }
    
    public function valid_user($username, $password) {
        $this->db->where('usuario', $username);
        $this->db->where('pass', $password); // Asegúrate de que este campo coincida con la base de datos
        $query = $this->db->get('usuarios');
    
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    
}
/* End of file
*/