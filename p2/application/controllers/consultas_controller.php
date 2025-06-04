<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Consulta_model');
    }

    public function index() {
        // Reglas de validación
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('numero', 'Numero', 'required|numeric');
        $this->form_validation->set_rules('mensaje', 'Mensaje', 'required');
        
        // Mensajes de error si no pasan las reglas
        $this->form_validation->set_message('required', '<div>El campo %s es obligatorio</div>');
        $this->form_validation->set_message('numeric', '<div>El campo %s deben ser solo numeros</div>');
        
        if ($this->form_validation->run() == FALSE) {
            // Muestra la página de consulta con el título de error
            if ($this->_veri_log()) {
            $data = array('titulo' => 'Error de formulario');
            $session_data = $this->session->userdata('logged_in');
            $data['perfil_id'] = $session_data['perfil_id'];
            $data['nombre'] = $session_data['nombre'];
            
            $this->load->view('partes/head', $data);
            $this->load->view('partes/header2', $data);
            $this->load->view('partes/header');
            $this->load->view('contenido/contacto');
            $this->load->view('partes/footer'); 
            }else{
                $this->load->view('partes/head');
                $this->load->view('partes/header2');
                $this->load->view('partes/header');
                $this->load->view('contenido/contacto');
                $this->load->view('partes/footer'); 
            }
        } else {
            // Preparo los datos para guardar en la base
            $data = array(
                'nombre' => $this->input->post('nombre', true),
                'email' => $this->input->post('email', true),
                'numero' => $this->input->post('numero', true),
                'mensaje' => $this->input->post('mensaje', true),
                'leido' => 'NO'
            );

            // Envío array al método insert para registro de datos
            $this->Consulta_model->add_consulta($data);

            // Redirecciono a la página de contacto con mensaje de éxito
            echo "<script>alert('¡Su consulta fue enviada correctamente!');</scrip t>";
            redirect('contacto', 'refresh');
        }
    }

    private function _veri_log() {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function listar_consultas() { 
        if ($this->_veri_log()) {
            $dat = array('titulo' => 'Consultas');
            $session_data = $this->session->userdata('logged_in');
            $dat['perfil_id'] = $session_data['perfil_id'];
            $dat['nombre'] = $session_data['nombre'];

            $consultas = $this->Consulta_model->get_consultas_no_lei();
            $dat['consultas'] = $consultas;

            $this->load->view('partes/head', $dat);
			$this->load->view('partes/header2', $dat);
            $this->load->view('partes/header');
            $this->load->view('consultas/consultasLeer', $dat);
            $this->load->view('partes/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function leer_consulta($id) {
        $data = array(
            'leido' => 'SI'
        );

        $this->Consulta_model->estado_consulta($id, $data);
        echo "<script>alert('La consulta fue leída Correctamente!');</script>";
        redirect('ver_consultas', 'refresh');
    }

    function listar_consultas_leidas() { 
        if ($this->_veri_log()) {
            $dat = array('titulo' => 'Consultas Leídas');
            $session_data = $this->session->userdata('logged_in');
            $dat['perfil_id'] = $session_data['perfil_id'];
            $dat['nombre'] = $session_data['nombre'];

            $consultas = $this->Consulta_model->get_consultas_lei();
            $dat['consultas'] = $consultas;

            $this->load->view('partes/head', $dat);
			$this->load->view('partes/header2', $dat);
            $this->load->view('partes/header');
            $this->load->view('consultas/consultasLeidas', $dat);
            $this->load->view('partes/footer');
        } else {
            redirect('login', 'refresh');
        }
    }

    function ver_consulta($id){ 
        if ($this->_veri_log()){ 
            $dat = array('titulo' => 'Detalle de la Consulta'); 
            $session_data = $this->session->userdata('logged_in'); 
            $dat['perfil_id'] = $session_data['perfil_id']; 
            $dat['nombre'] = $session_data['nombre']; 
            $consulta = $this->Consulta_model->get_consulta_by_id($id); 
            $dat['consulta'] = $consulta; 
            $this->load->view('partes/head', $dat); 
            $this->load->view('partes/header2', $dat);
            $this->load->view('partes/header'); 
            $this->load->view('consultas/ver_consulta', $dat); 
            $this->load->view('partes/footer'); 
        }else{ 
            redirect('login', 'refresh'); 
        }
    }
}
?>
