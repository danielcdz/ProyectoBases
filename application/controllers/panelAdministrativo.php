<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelAdministrativo extends CI_Controller {
	public function index()
	{
		
    }
	


	public function validarInicioSesion(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuario', 'usuario', 'callback_validarUsuario');
        $this->form_validation->set_rules('clave', 'clave', 'callback_validarClave');
        
		if($this->form_validation->run()){
			$this->administrativo();
		}
		else{
            $this->mostrarLogin();
		}
	}

	
    public function mostrarMensajeExito($mensaje,$url){
        $datos = array('mensaje'=>$mensaje,'url'=>$url);
        // $datos=$consultaHabitaciones->result_array();
		// var_dump($datos);
        $data['listaMensaje']=$datos;
        // var_dump($data);
        $this->load->vars($data);
        $this->load->view('mensajeExito');
    }

	public function mostrarLogin(){
		$this->load->view('login_administrativo');
	}

	public function validarClave($str){
		if( $str=="admin"){
			return true;}
		else{
			$this->form_validation->set_message('validarClave', 'Clave incorrecta');
			return FALSE;
		}
	}

	public function validarUsuario($str){
		if( $str=="admin"){
			return true;}
		else{
			$this->form_validation->set_message('validarUsuario', 'Nombre de usuario incorrecto');
			return FALSE;
		}
	}
	

	public function validarRegistroHospedaje(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombreHotel', 'nombreHotel', 'required',array('required' => 'Nombre de hotel requerido'));
        $this->form_validation->set_rules('cedulaJuridica', 'cedulaJuridica','callback_validarCedulaJuridica', 'required',array('required' => 'Cédula jurídica requerida'));
        $this->form_validation->set_rules('telefono1', 'telefono1', 'required',array('required' => 'Número de teléfono requerido'));
        $this->form_validation->set_rules('canton', 'canton', 'required',array('required' => 'Cantón requerido'));
        $this->form_validation->set_rules('distrito', 'distrito', 'required',array('required' => 'Distrito requerido'));
		$this->form_validation->set_rules('barrio', 'barrio', 'required',array('required' => 'Barrio requerido'));
		$this->form_validation->set_rules('referenciaGps', 'referenciaGps', 'required',array('required' => 'Referencia Gps requerida'));

		if($this->form_validation->run()){
			$this->registrarHospedajeDB();
			// $this->registrarHospedaje();
			$this->mostrarMensajeExito('Registro de hospedaje exitoso','panelAdministrativo\registrarHospedaje');
			
		}
		else{
			$this->registrarHospedaje();
		}
		
	}

	public function validarCedulaJuridica($cedula){
		$consulta1=$this->db->query("exec validarCedulaEmpresa $cedula"); 
		$datos=$consulta1->result_array();
        if(empty($datos)){
            return true;
        }
        $id = array_values($datos);
        $id = $id[0]['CedulaJuridica'];
        if($id != null){
            $this->form_validation->set_message('validarCedulaJuridica', 'Este número de cédula ya se encuentra registrado');
            return false;}
        else{ return true; }

	}

	

	public function registrarHospedajeDB(){
		$nombre=$this->input->post("nombreHotel");
		$cedula=$this->input->post("cedulaJuridica");
		$telefono1=$this->input->post("telefono1");
		$telefono2=$this->input->post("telefono2");
		$correo=$this->input->post("correo");
		$provincia=$this->input->post("inputProvincia");
		$canton=$this->input->post("canton");
		$distrito=$this->input->post("distrito");
		$barrio=$this->input->post("barrio");
		$sennas=$this->input->post("sennas");
		$facebook=$this->input->post("facebook");
		$instagram=$this->input->post("instagram");
		$twitter=$this->input->post("twitter");
		$airbnb=$this->input->post("airbnb");
		$youtube=$this->input->post("youtube");
		$sitioweb=$this->input->post("sitioWeb");
		$tipo=$this->input->post("tipo");
		$referenciaGPS=$this->input->post("referenciaGps");
		$restaurante=$this->input->post("restaurante");
		$piscina=$this->input->post("piscina");
		$bar=$this->input->post("bar");
		$rancho=$this->input->post("rancho");
		$casino=$this->input->post("casino");
		$nombre=$this->input->post("nombreHotel");
		 
		//Valores de servicios
		if((int)($rancho) != 1){$rancho=0;}
		if((int)($piscina) != 1){$piscina=0;}
		if((int)($bar) != 1){$bar=0;}
		if((int)($restaurante) != 1){$restaurante=0;}
		if((int)($casino) != 1){$casino=0;}

		 $consulta1=$this->db->query("exec AgregarEmpresa $cedula,'$nombre','$referenciaGPS','$correo','$tipo'");
		 $consulta2=$this->db->query("exec Agregar_ServiciosEmpresa $cedula,$bar,$rancho,$piscina,$restaurante,$casino");
		 $consulta3=$this->db->query("exec AgregarLista_SitiosWeb '$sitioweb',$cedula");
		if($facebook!=null){
			 $consulta4=$this->db->query("exec AgregarLista_RedesSociales '$facebook',$cedula");}
		if($instagram!=null){
			 $consulta5=$this->db->query("exec AgregarLista_RedesSociales '$instagram',$cedula");}
		if($youtube!=null){
			 $consulta6=$this->db->query("exec AgregarLista_RedesSociales '$youtube',$cedula");}
		if($twitter!=null){
			 $consulta7=$this->db->query("exec AgregarLista_RedesSociales '$twitter',$cedula");}
		if($airbnb!=null){
			 $consulta8=$this->db->query("exec AgregarLista_RedesSociales '$airbnb',$cedula");}
		
		$consulta9=$this->db->query("exec AgregarDireccionEmpresa $cedula,'$provincia','$canton','$distrito','$barrio','$sennas'");
		$consulta10=$this->db->query("exec AgregarTelefonosEmpresa $telefono1,$telefono2,$cedula");
		 
		
	}

	public function registrarActividadDB(){
		$nombre=$this->input->post("nombreEmpresa");
		$nombrePersona=$this->input->post("nombrePersona");
		$telefono1=$this->input->post("telefono1");
		$correo=$this->input->post("correo");
		$provincia=$this->input->post("inputProvincia");
		$canton=$this->input->post("canton");
		$distrito=$this->input->post("distrito");
		$sennas=$this->input->post("sennas");
		$tipo=$this->input->post("tipo");
		$descripcion=$this->input->post("descripcion");
		$precio=$this->input->post("precio");

		$consulta1=$this->db->query("exec Agregar_ActividadRecreativa '$nombre','$nombrePersona','$correo',$precio,'$descripcion','$tipo'");
		
		//Tomar idActividad de la ultima actividad registrada
		$idActividad=$this->db->query("SELECT @@IDENTITY as id"); 
		$id=$idActividad->result_array();
		$id = array_values($id);
		$idActividad = $id[0]['id'];
		$consulta2=$this->db->query("exec AgregarDireccion_ACTRecreativa $idActividad,'$provincia','$canton','$distrito','$sennas'"); 
		$consulta3=$this->db->query("exec AgregarTelefonos_ACTRecreativa $telefono1,$idActividad"); 
		
	}

	


	public function validarRegistroActividad(){
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombreEmpresa', 'nombreEmpresa', 'required',array('required' => 'Nombre de empresa requerido'));
        $this->form_validation->set_rules('nombrePersona', 'nombrePersona', 'required',array('required' => 'Nombre de persona requerido'));
        $this->form_validation->set_rules('telefono1', 'telefono1', 'required',array('required' => 'Número de teléfono requerido'));
         $this->form_validation->set_rules('canton', 'canton', 'required',array('required' => 'Cantón requerido'));
         $this->form_validation->set_rules('distrito', 'distrito', 'required',array('required' => 'Distrito requerido'));
		$this->form_validation->set_rules('tipo', 'tipo', 'required',array('required' => 'Tipo de actividad requerido'));
		$this->form_validation->set_rules('precio', 'precio', 'required',array('required' => 'Precio requerido'));
		$this->form_validation->set_rules('descripcion', 'descripcion', 'required',array('required' => 'Descripción requerido'));

		if($this->form_validation->run()){
			$this->registrarActividadDB();
			// $this->registrarActividad();
			$this->mostrarMensajeExito('Registro de actividad recreativa exitoso','panelAdministrativo\registrarActividad');
		}
		else{
			$this->registrarActividad();
			
		}
		
	}

	public function cargarVariables(){
		$nombreUsuario = $this->session->userdata('nombreUsuario');
		$data['lista'] = array('nombreUsuario' => $nombreUsuario); 
		$this->load->vars($data); 
	}

    public function administrativo(){
        $this->load->view('headersAdministrativo');
		$this->load->view('administrativo_view');
	}

    public function registrarHospedaje(){
        $this->load->view('headersAdministrativo');
		$this->load->view('registrarHospedaje_view');
	}

	public function registrarActividad(){
        $this->load->view('headersAdministrativo');
		$this->load->view('registrarActividad_view');
	}

	public function salir(){
		$this->cargarVariables();
        $this->load->view('headersIAH');
		$this->load->view('inicio_view');
	}


}
