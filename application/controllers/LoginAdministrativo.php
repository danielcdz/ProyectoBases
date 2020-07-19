<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdministrativo extends CI_Controller {
	public function index()
	{
		$this->validarInicio();
    }
    

    public function validarInicio(){
        // Validar formulario de inicio de sesion
        $this->mostrarPanelAdministrativo();
    }

    public function mostrarPanelAdministrativo(){
        $this->load->view('headersAdministrativo');
        $this->load->view('administrativo_view');
    }

}
