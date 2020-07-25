<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function index()
	{
			
		$this->mostrarInicio();
	}


	public function mostrarInicio(){
		$this->session->set_flashdata('msg','');
		$this->consultarContactos();
		$this->load->view('main_view');
	}

	public function mostrarInicio2(){
		$this->consultarContactos();
		$this->load->view('main_view');
	}

	public function registrarContacto(){
		$nombre=$this->input->post('nombre');
		$apellido=$this->input->post('apellido');
		$telefono1=$this->input->post('telefono1');
		$telefono2=$this->input->post('telefono2');
		$correo=$this->input->post('correo');
		$profesion=$this->input->post('profesion');
		$datos = array('nombre'=>$nombre,'apellido'=>$apellido,'telefono1'=>$telefono1,'telefono2'=>$telefono2,'correo'=>$correo,'profesion'=>$profesion);
		$this->mongo_db->insert('contactos', $datos); // insercion de datos
		$this->session->set_flashdata('msg','Contacto registrado');
		$this->mostrarInicio2();
	}


	public function consultarContactos(){
		$datos=$this->mongo_db->select(array('contactos','nombre','apellido','telefono1','telefono2','correo','profesion'))->get('contactos');
		$data = ['listaContactos' => $datos, 'msg' => $this->session->flashdata('msg') ];
		$this->load->vars($data);
	}

	public function mostrarFiltrados(){
		$this->session->set_flashdata('msg','Resultados de la búsqueda:');
		$this->filtrarContactos();
		$this->load->view('main_view');
	}

	public function filtrarContactos(){
		$nombre=$this->input->post('nombreFiltrar');
		// var_dump($nombre);
		// $datos=$this->mongo_db->like($nombre,'nombre', 'im', FALSE, false)->get('contactos');
		$datos=$this->mongo_db->where_or(array('nombre' => $nombre,'apellido'=>$nombre))->get('contactos');
		$data = ['listaContactos' => $datos, 'msg' => $this->session->flashdata('msg') ];
		$this->load->vars($data);
		// var_dump($datos);	
	}


	public function eliminarContacto(){
		$id=$this->uri->segment(3);
		$this->mongo_db->where(array('_id' => new MongoDB\BSON\ObjectId ($id )))->delete('contactos');
		$this->session->set_flashdata('msg','Contacto eliminado');
		// var_dump($id);
		$this->mostrarInicio2();
	}


	public function editarContacto(){
		$id=$this->uri->segment(3);
		$nombre=$this->input->post('nombreE');
		$apellido=$this->input->post('apellidoE');
		$telefono1=$this->input->post('telefono1E');
		$telefono2=$this->input->post('telefono2E');
		$correo=$this->input->post('correoE');
		$profesion=$this->input->post('profesionE');
		$this->mongo_db->where(array('_id'=>new MongoDB\BSON\ObjectId ($id )))->set(array('nombre'=>$nombre,'apellido'=>$apellido,'telefono1'=>$telefono1,'telefono2'=>$telefono2,'correo'=>$correo,'profesion'=>$profesion))->update('contactos');
		$this->session->set_flashdata('msg','Información de contacto actualizada');
		$this->mostrarInicio2();
	}

	


}
