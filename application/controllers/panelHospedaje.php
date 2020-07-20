<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PanelHospedaje extends CI_Controller {
	public function index()
	{
		
    }
    

    
    public function validarRegistroCliente(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('inputNombre', 'inputNombre', 'required',array('required' => 'Debe ingresar un nombre'));
        $this->form_validation->set_rules('inputApellido1', 'inputApellido1', 'required',array('required' => 'Apellido requerido'));
        $this->form_validation->set_rules('inputApellido2', 'inputApellido2', 'required',array('required' => 'Apellido requerido'));
        $this->form_validation->set_rules('inputNumeroIdentificacion', 'inputNumeroIdentificacion', 'callback_validarIdentificacionCliente','required',array('required' => 'Número de identificación requerido'));
        $this->form_validation->set_rules('inputCorreo', 'inputCorreo', 'required',array('required' => 'Correo requerido'));
        $this->form_validation->set_rules('inputTelefono', 'inputTelefono', 'required',array('required' => 'Teléfono requerido'));
        $this->form_validation->set_rules('inputUsuario', 'inputUsuario', 'required',array('required' => 'Nombre de usuario requerido'));
        
        $this->form_validation->set_rules(
            'inputClave', 'inputClave',
            'required|min_length[5]|max_length[12]',
            array('required' => 'Debe ingresar una contraseña ',
                    'min_length'=>'La contraseña debe tener más de 5 cáracteres',
                    'max_length'=>'La contraseña debe tener menos de 12 cáracteres'
        ));

         $this->form_validation->set_rules('inputClave2', 'inputClave2', 'required|matches[inputClave]',array('matches' => 'La confirmación  debe coincidir con la contraseña ','required'=>'Debe ingresar una confirmación'));

        if($this->form_validation->run()){
            $this->registrarClienteDB();
            // $this->registrarCliente();
            $this->mostrarMensajeExito('Registro de cliente exitoso','panelHospedaje\registrarCliente');
		}
		else{
            $this->registrarCliente();
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

    public function validarRegistroHabitacion(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nombre', 'nombre', 'required',array('required' => 'Debe ingresar un nombre'));
        $this->form_validation->set_rules('tipo', 'tipo', 'required',array('required' => 'Tipo de habitación requerido'));
        $this->form_validation->set_rules('numero', 'numero','callback_validarNumeroHabitacion', 'required',array('required' => 'Número de habitación requerido'));
        $this->form_validation->set_rules('precio', 'precio', 'required',array('required' => 'Precio requerido'));
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required',array('required' => 'Descripción requerida'));
        $this->form_validation->set_rules('foto', 'foto', 'required',array('required' => 'Debe registrar al menos una fotografía'));
       
        if($this->form_validation->run()){
            $this->registrarHabitacionDB();
            // $this->registrarHabitacion();
            $this->mostrarMensajeExito('Registro de habitación exitoso','panelHospedaje\registrarHabitacion');
		}
		else{
            $this->registrarHabitacion();
		}
       
    }

    public function validarNumeroHabitacion($numero){
        $consulta1=$this->db->query("exec validarNumeroHabitacion $numero"); 
        $datos=$consulta1->result_array();
        if(empty($datos)){
            return true;
        }
        $numeroHabitacion = array_values($datos);
        $numero = $numeroHabitacion[0]['NumHabitacion'];
        if($numero != null){
            $this->form_validation->set_message('validarNumeroHabitacion', 'Este número de habitación ya se encuentra registrado');
            return false;}
        else{ return true; }
    }

    public function registrarReservacionDB(){
        $identificacion=$this->input->post("identificacion");
        $numeroHabitacion=$this->input->post("numeroHabitacion");
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

    public function cargarVariables(){
		$nombreEmpresa = $this->session->userdata('nombreEmpresa');
		$data['lista'] = array('nombreEmpresa' => $nombreEmpresa); 
		$this->load->vars($data); 
	}


    public function registrarClienteDB(){
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

    public function registrarHabitacionDB(){
        $nombre=$this->input->post("nombre");
        $tipo=$this->input->post("tipo");
        $numero=$this->input->post("numero");
        $precio=$this->input->post("precio");
        $descripcion=$this->input->post("descripcion");
        $wifi=$this->input->post("wifi");
        $ac=$this->input->post("ac");
        $ventilador=$this->input->post("ventilador");
        $aguaCaliente=$this->input->post("aguaCaliente");
        $tv=$this->input->post("tv");
        $foto=$this->input->post("foto");
        $foto1=$this->input->post("foto1");
        $foto2=$this->input->post("foto2");

        
        if((int)($wifi) != 1){$wifi=0;}
        if((int)($tv) != 1){$tv=0;}
        if((int)($ac) != 1){$ac=0;}
        if((int)($ventilador) != 1){$ventilador=0;}
        if((int)($aguaCaliente) != 1){$aguaCaliente=0;}

        //Obtener id de la ultima habitacion registrada
        $cedula = $this->session->userdata('cedula');
        $consulta1=$this->db->query("exec AgregarHabitacion $cedula,'$nombre',$numero,$precio,'$tipo','$descripcion',1"); 


        $idHabitacion=$this->db->query("SELECT @@IDENTITY as id"); 
		$id=$idHabitacion->result_array();
		$id = array_values($id);
        $idHabitacion = $id[0]['id'];

     
        $consultax=$this->db->query("exec AgregarTablaHabitaciones $idHabitacion,$cedula,1"); 
        
        $consulta2=$this->db->query("exec AgregarComodidades $idHabitacion,$wifi,$ac,$aguaCaliente,$tv"); 
        if($foto!=null){$consulta3=$this->db->query("exec Agregar_ListaFotografias $idHabitacion,'$foto'"); }
        if($foto1!=null){$consulta3=$this->db->query("exec Agregar_ListaFotografias $idHabitacion,'$foto1'"); }   
        if($foto2!=null){$consulta3=$this->db->query("exec Agregar_ListaFotografias $idHabitacion,'$foto2'"); }

    }

    public function validarReservacion(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('identificacion', 'identificacion','callback_existeCliente', 'required',array('required' => 'Identificación requerida'));
        $this->form_validation->set_rules('cantPersonas', 'cantPersonas', 'required',array('required' => 'Cantidad de personas requerida'));
        $this->form_validation->set_rules('numeroHabitacion', 'numeroHabitacion','callback_existeNumeroHabitacion', 'required',array('required' => 'Número de habitación requerido'));
       
        if($this->form_validation->run()){
            $this->registrarReservacionDB();
            $this->registrarFacturaDB();
            // $this->registrarReservacion();
            // $this->mostrarMensajeExito();
            $this->mostrarMensajeExito('Reservación  exitosa','panelHospedaje\registrarReservacion');
		}
		else{
            $this->registrarReservacion();
		}
       
    }

    public function registrarFacturaDB(){
        $idHabitacion = $this->input->post('numeroHabitacion');
        $fecha1 = $this->input->post('inputFechaIngreso');
        $fecha1 = new DateTime($fecha1);
        $fechaDB=date_format($fecha1, 'Y-m-d');
        $fecha2 = $this->input->post('inputFecha');
        $fecha2 = new DateTime($fecha2);
        $habitacion=$this->db->query("exec consultaHabitacion $idHabitacion"); 
        $datos=$habitacion->result_array();
        $fechaSalida=$this->input->post("inputFecha");
        $fechaSalida = new DateTime($fechaSalida);
        $fechaSalida=date_format($fechaSalida, 'Ymd');
        $reserva=$this->db->query("SELECT @@IDENTITY as id"); 
		$numReserva=$reserva->result_array();
        $numReserva = array_values($numReserva);
        $precio = $datos[0]['Precio'];
        $numeroReserva = $numReserva[0]['id'];
        $numeroNoches = $fecha2->diff($fecha1)->format("%a");
        $tipoHabitacion = $datos[0]['Tipo'];
        $numeroHabitacion = $idHabitacion;
        $fecha = $fechaDB;
        $montoTotal = $precio * (int)$numeroNoches;

        // var_dump($numeroReserva,$numeroNoches,$tipoHabitacion,$numeroHabitacion,$fecha,$montoTotal);
        
        $consulta=$this->db->query("exec agregarFactura $numeroReserva,$numeroNoches,'$tipoHabitacion',$numeroHabitacion,'$fecha',$montoTotal"); 
    }


    


    public function cargarFacturas(){
		$consultaFacturas=$this->db->query("exec consultaFactura");
		$datos=$consultaFacturas->result_array();
		$data['listaFacturas']=$datos;
		$this->load->vars($data);
	}

    public function existeNumeroHabitacion($numero){
        $consulta1=$this->db->query("exec validarNumeroHabitacion $numero"); 
        $datos=$consulta1->result_array();
        if(empty($datos)){
            $this->form_validation->set_message('existeNumeroHabitacion', 'Este número de habitación no se encuentra registrado');
            return false;
        }
        $numeroHabitacion = array_values($datos);
        $numero = $numeroHabitacion[0]['NumHabitacion'];
        if($numero != null){
             return true;}
        else{$this->form_validation->set_message('existeNumeroHabitacion', 'Este número de habitación no se encuentra registrado');
            return false; }
    }

    public function existeCliente($identificacion){
        $consulta1=$this->db->query("exec validarIdCliente $identificacion"); 
        $datos=$consulta1->result_array();
        if(empty($datos)){
            $this->form_validation->set_message('existeCliente', 'Este número de identificación no se encuentra registrado');
            return false;
        }
        $id = array_values($datos);
        $id = $id[0]['Cedula'];
        if($id != null){
            return true;}
        else{ $this->form_validation->set_message('existeCliente', 'Este número de identificación no se encuentra registrado');
            return false; }
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


    public function mostrarInicio(){
        $this->cargarVariables();
        $this->cargarFacturas();
        $this->load->view('headersPanelHospedaje');
        $this->load->view('panelHospedaje_view');
    }

    public function registrarCliente(){
        $this->cargarVariables();
        $this->load->view('headersPanelHospedaje');
        $this->load->view('registrarCliente_view');
    }

    public function registrarHabitacion(){
        $this->cargarVariables();
        $this->load->view('headersPanelHospedaje');
        $this->load->view('registrarHabitacion_view');
    }
    
    public function registrarReservacion(){
        $this->cargarVariables();
        $this->load->view('headersPanelHospedaje');
        $this->load->view('registrarReservacion_view');
    }

    public function moduloFacturacion(){
        $this->mostrarInicio();
    }

    public function reportes(){}


}
