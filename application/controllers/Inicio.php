<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function index()
	{
		$this->mostrarInicio();
	}



	public function mostrarReservar(){
		$id=$this->uri->segment(3);
		
		$this->session->set_userdata('idHabitacion',$id);
		
		$this->cargarVariables();
		
		$this->load->view('headersIAH');
		$this->load->view('registrarReservacionOnline_view');
	}

	// public function validarReservacion(){
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('identificacion', 'identificacion', 'required',array('required' => 'Identificación requerida'));
    //     $this->form_validation->set_rules('cantPersonas', 'cantPersonas', 'required',array('required' => 'Cantidad de personas requerida'));
    //     $this->form_validation->set_rules('numeroHabitacion', 'numeroHabitacion', 'required',array('required' => 'Número de habitación requerido'));
       
    //     if($this->form_validation->run()){
	// 		$this->mostrarMensajeExito();
	// 	}
	// 	else{
    //         $this->mostrarReservar();
	// 	}
       
	// }

	public function validarReservacion(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cantPersonas', 'cantPersonas', 'required',array('required' => 'Cantidad de personas requerida'));
      
        if($this->form_validation->run()){
			$usuario=$this->session->userdata('nombreUsuario');
			if($usuario=='vacio')
				$this->mostrarLoginUsuario();
			else{
            $this->registrarReservacionDB();
            // $this->mostrarReservar();
			$this->mostrarMensajeExito('Reservación exitosa','Inicio\mostrarHoteles');}
		}
		else{

			$this->mostrarReservar();
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
	
	

    


	public function registrarReservacionDB(){
        // $identificacion=$this->input->post("identificacion");
		// $numeroHabitacion=$this->input->post("numeroHabitacion");
		$identificacion=$this->session->userdata('cedulaUsuario');
		$numeroHabitacion=$this->session->userdata('idHabitacion');
        $cantPersonas=$this->input->post("cantPersonas");
        $vehiculo=$this->input->post("inputVehiculo");
        $fechaSalida=$this->input->post("inputFecha");
        $fechaSalida = new DateTime($fechaSalida);
        $fechaSalida=date_format($fechaSalida, 'Ymd H:i:s A');
        $fechaIngreso=$this->input->post("inputFechaIngreso");
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaIngreso=date_format($fechaIngreso, 'Ymd H:i:s A');

        if($vehiculo=='Si'){$vehiculo=1;}else{$vehiculo=0;}
        $consulta1=$this->db->query("exec AgregarReservacion $cantPersonas,'$fechaIngreso','$fechaSalida',$numeroHabitacion,$vehiculo,$identificacion"); 
       
    }


	
	
	// public function mostrarMensajeExito(){

    //     $this->load->view('mensajeExito');
    // }

	public function mostrarInicio(){
		$this->cargarVariables();
		$this->load->view('headersIAH');
		$this->load->view('inicio_view');
	}

	public function mostrarActividades(){
		$this->cargarVariables();
		$this->cargarActividadesRegistradas();
		$this->load->view('headersIAH');
		$this->load->view('actividades_view');
	}

	public function cerrarSesion(){
		$this->session->set_userdata('sesionIniciada',0);
        $this->session->set_userdata('nombreUsuario', 'vacio');
        $this->session->set_userdata('cedulaUsuario', 0);
        $data['lista'] = array('nombreUsuario' => 'vacio'); 
        // var_dump($data['lista']['nombreUsuario']);
		$this->load->vars($data); 
		$this->mostrarInicio();
		
	}

	public function mostrarHoteles(){
		$this->cargarVariables();
		$this->cargarHotelesRegistrados();
		$this->load->view('headersIAH');
		$this->load->view('hoteles_view');
	}

	public function cargarHotelesRegistrados(){
		$consultaHoteles=$this->db->query("exec ConsultaDatos_Empresa");
		$datos=$consultaHoteles->result_array();
		// var_dump($datos);
		
		$data['listaHoteles']=$datos;
		$this->load->vars($data);
	}

	public function mostrarReservacionActividad(){
		$idActividad=$this->uri->segment(3);
		$this->session->set_userdata('idActividad',$idActividad);
		// var_dump($idActividad);
		$this->cargarVariables();
		$this->load->view('headersIAH');
		$this->load->view('reservacionActividad_view');
	}

	public function registrarReservacionActividad(){
		$idActividad=$this->session->userdata('idActividad');
		// var_dump($idActividad);
		$fecha = $this->input->post('fechaActividad');
		$tarjeta = $this->input->post('tarjeta');
		$consulta=$this->db->query("exec Agregar_ReservarcionActividad $idActividad,'$fecha','$tarjeta'");
		$this->mostrarMensajeExito('Reservación exitosa','Inicio\mostrarActividades');
	}

	public function cargarActividadesRegistradas(){
		$consultaActividades=$this->db->query("exec consultaActividadRecreativa");
		$datos=$consultaActividades->result_array();
		$data['listaActividades']=$datos;
		$this->load->vars($data);
	}

	public function cargarVariables(){
		$nombreUsuario = $this->session->userdata('nombreUsuario');
		$data['lista'] = array('nombreUsuario' => $nombreUsuario); 
		$this->load->vars($data); 
	}


	public function mostrarInfoHotel(){
		$this->cargarVariables();
		$this->consultaHabitaciones();
		$this->load->view('headersIAH');
		$this->load->view('infoHospedaje_view');
	}

	public function consultaHabitaciones(){
		$cedulaHotel=$this->uri->segment(3);
		$this->session->set_userdata('cedulaHotel',$cedulaHotel);
		$consultaHabitaciones=$this->db->query("exec consultaHabitaciones $cedulaHotel");
		$datos=$consultaHabitaciones->result_array();
		$res=array();
		// $res2=array();
		// $var = 0;
		foreach($datos as $item){
			$idHabitacion = $item['ID_Habitacion'];
			$consultaFotografias = $this->db->query("exec Consulta_ListaFotografias $idHabitacion");
			$fotos=$consultaFotografias->result_array();
			// var_dump($fotos);
			$foto = $fotos [0]['FotosHabitacion'];
			array_push($item,$foto);
			array_push($res,$item);
			// $res2 = array_push($res2,$res);
			// var_dump($item);	
		}
		// var_dump($res);
		// var_dump($datos);
		$data['listaHabitaciones']=$res;
		$this->load->vars($data);
		
	}


	public function mostrarLoginAdministrativo(){
		$this->load->view('login_administrativo');
	}

	public function mostrarLoginHospedaje(){
		$this->load->view('login_hospedaje');
	}

	public function mostrarLoginUsuario(){
		$this->load->view('loginUsuario_view');
	}

	
}
