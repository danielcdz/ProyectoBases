<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUsuario extends CI_Controller {
	public function index()
	{
		$this->validarInicio();
    }
    

    public function mostrarLogin(){
        $this->load->view('loginUsuario_view');
    }

    public function validarInicio(){
        //Validar formulario de inicio
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'usuario','callback_consultaUsuario');
        $this->form_validation->set_rules('clave', 'clave','callback_consultaClave');
        if($this->form_validation->run()){
            // $this->guardarDatosSesion();
            $this->mostrarInicio();
		}
		else{
            $this->mostrarLogin();
		}

    }


    public function guardarDatosSesion($nombre,$clave,$identificacion){
        $this->session->set_userdata('sesionIniciada',1);
        $this->session->set_userdata('nombreUsuario', $nombre);
        $this->session->set_userdata('cedulaUsuario', $identificacion);
        $data['lista'] = array('nombreUsuario' => $nombre); 
        // var_dump($data['lista']['nombreUsuario']);
        $this->load->vars($data); 
        // $var=$this->session->userdata('nombreUsuario'); // cargar datos de la sesion
    }


    public function consultaClave($clave){
        
        $nombre=$this->input->post('usuario');
        $consulta1=$this->db->query("exec consultaUsuarioClave $nombre,$clave"); 
        $datos=$consulta1->result_array();
        
        if(empty($datos)){
            $this->form_validation->set_message('consultaClave', 'Clave incorrecta');
            return false;
        }
        // echo($datos);
        $datos = array_values($datos);

        $claveUsuario = $datos[0]['Clave'];
        $identificacion = $datos[0]['Cedula'];
        if($claveUsuario==$clave){
            $this->guardarDatosSesion($nombre,$clave,$identificacion);
            return true;
        }
        else{
            $this->form_validation->set_message('consultaClave', 'Clave incorrecta');
            return false;
        }
        // if($nombreUsuario != null){
        //     $this->form_validation->set_message('consultaUsuario', 'Este usuario no se encuentra registrado');
        //     return false;}
        // else{ return true; }
    
    
    }
    

public function consultaUsuario($nombre){
    $consulta1=$this->db->query("exec consultaUsuario $nombre"); 
    $datos=$consulta1->result_array();
    
    if(empty($datos)){
        $this->form_validation->set_message('consultaUsuario', 'Este usuario no se encuentra registrado');
        return false;
    }
   
    $nombreUsuario = array_values($datos);
    $nombreUsuario = $nombreUsuario[0]['NombreUsuario'];
    // echo($nombreUsuario);
    if($nombreUsuario != null){
        return true;}
    else{
        $this->form_validation->set_message('consultaUsuario', 'Este usuario no se encuentra registrado'); return false; }


}

    public function mostrarMensajeExito(){
        $datos = array('mensaje'=>'Registro de usuario exitoso','url'=>'LoginUsuario\mostrarLogin');
        // $datos=$consultaHabitaciones->result_array();
		// var_dump($datos);
        $data['listaMensaje']=$datos;
        // var_dump($data);
        $this->load->vars($data);
        $this->load->view('mensajeExito');
    }

    public function mostrarRegistroUsuario(){
        $this->load->view('registrarUsuario');
    
    }

    public function validarRegistro(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputNombre', 'inputNombre', 'required',array('required' => 'Debe ingresar un nombre'));
        $this->form_validation->set_rules('inputApellido1', 'inputApellido1', 'required',array('required' => 'Apellido requerido'));
        $this->form_validation->set_rules('inputApellido2', 'inputApellido2', 'required',array('required' => 'Apellido requerido'));
        $this->form_validation->set_rules('inputNumeroIdentificacion', 'inputNumeroIdentificacion','callback_validarIdentificacionCliente', 'required',array('required' => 'Número de identificación requerido'));
        $this->form_validation->set_rules('inputCorreo', 'inputCorreo', 'required',array('required' => 'Correo requerido'));
        $this->form_validation->set_rules('inputTelefono', 'inputTelefono', 'required',array('required' => 'Teléfono requerido'));
        $this->form_validation->set_rules('inputUsuario', 'inputUsuario', 'required',array('required' => 'Nombre de usuario requerido'));
        // $this->form_validation->set_rules('inputClave', 'inputClave', 'required',array('required' => 'Debe ingresar un nombre'));
        // $this->form_validation->set_rules('inputClave2', 'inputClave2', 'required',array('required' => 'Debe ingresar un nombre'));
        
        $this->form_validation->set_rules(
            'inputClave', 'inputClave',
            'required|min_length[5]|max_length[12]',
            array('required' => 'Debe ingresar una contraseña ',
                    'min_length'=>'La contraseña debe tener más de 5 cáracteres',
                    'max_length'=>'La contraseña debe tener menos de 12 cáracteres'
        ));

        // $this->form_validation->set_rules('inputClave', 'inputClave', 'required',array('required' => 'Debe ingresar un nombre'));
        $this->form_validation->set_rules('inputClave2', 'inputClave2', 'required|matches[inputClave]',array('matches' => 'La confirmación  debe coincidir con la contraseña ','required'=>'Debe ingresar una confirmación'));

        if($this->form_validation->run()){
            // $this->validarInicio();
            $this->registrarUsuarioDB();
            // $this->mostrarLogin();
            $this->mostrarMensajeExito();
		}
		else{
            $this->mostrarRegistroUsuario();
		}
       
    }

    public function validarIdentificacionCliente($identificacion){
        $consulta1=$this->db->query("exec validarIdCliente $identificacion"); 
        $datos=$consulta1->result_array();
        if(empty($datos)){
            return true;
        }
        $id = array_values($datos);
        $id = $id[0]['Cedula'];
        if($id != null){
            $this->form_validation->set_message('validarIdentificacionCliente', 'Este número de identificación ya se encuentra registrado');
            return false;}
        else{ return true; }
    }


    public function registrarUsuarioDB(){
        $nombre=$this->input->post("inputNombre");
        $apellido1=$this->input->post("inputApellido1");
        $apellido2=$this->input->post("inputApellido2");
        $fecha=$this->input->post("inputFecha");
        $tipoIdentificacion=$this->input->post("inputTipoIdentificacion");
        $numeroIdentificacion=$this->input->post("inputNumeroIdentificacion");
        $provincia=$this->input->post("inputProvincia");
        $distrito=$this->input->post("inputDistrito");
        $canton=$this->input->post("inputCanton");
        $correo=$this->input->post("inputCorreo");
        $telefono=$this->input->post("inputTelefono");
        $sexo=$this->input->post("inputSexo");
        $usuario=$this->input->post("inputUsuario");
        $clave=$this->input->post("inputClave");
       
        $consulta1=$this->db->query("exec AgregarCliente $numeroIdentificacion,'$fecha','$tipoIdentificacion','$nombre','$apellido1','$apellido2','$correo'"); 
        $consulta2=$this->db->query("exec AgregarDireccionCliente $numeroIdentificacion,'$provincia','$canton','$distrito'"); // cmabiar procedure 
        $consulta3=$this->db->query("exec AgregarCredenciales $numeroIdentificacion,'$usuario','$clave'"); 
        $consulta4=$this->db->query("exec Agregar_TelefonosCliente $telefono,$numeroIdentificacion"); 
    }

    public function mostrarInicio(){
        $this->load->view('headersIAH');
        $this->load->view('inicio_view');
    }

}
