<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginHospedaje extends CI_Controller {
	public function index()
	{
		$this->validarInicio();
    }
    

    public function validarInicio(){
        //Validar formulario de inicio
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cedula', 'cedula','callback_consultaCedula');
        if($this->form_validation->run()){
            $this->mostrarPanelHospedaje();
		}
		else{
            $this->mostrarLogin();
		}

    }

    public function mostrarLogin(){
        $this->load->view('login_hospedaje');
    }

    public function guardarDatosSesion($cedula,$nombreEmpresa){
        $this->session->set_userdata('sesionIniciadaEmpresa',1);
        $this->session->set_userdata('nombreEmpresa', $nombreEmpresa);
        $this->session->set_userdata('cedula', $cedula);
        $data['lista'] = array('nombreEmpresa' => $nombreEmpresa,'cedulaEmpresa ' => $cedula); 
        $this->load->vars($data); 
    }

    public function consultaCedula($cedula){
        $consulta1=$this->db->query("exec consultaEmpresa $cedula"); 
        $datos=$consulta1->result_array();
        
        if(empty($datos)){
            $this->form_validation->set_message('consultaCedula', 'No se encuentra registrada ninguna empresa con el número indicado');
            return false;
        }
    
        $datos = array_values($datos);
        $cedulaJ = $datos[0]['CedulaJuridica'];
        $nombreEmpresa = $datos[0]['Nombre'];
        // echo($nombreUsuario);
        if($cedulaJ != null){
           $this->guardarDatosSesion($cedulaJ,$nombreEmpresa); return true;}
        // else{
        //     $this->form_validation->set_message('consultaUsuario', 'Este usuario no se encuentra registrado'); return false; }


    }

    public function mostrarPanelHospedaje(){
        $this->load->view('headersPanelHospedaje');
        $this->load->view('panelHospedaje_view');
    }

}
