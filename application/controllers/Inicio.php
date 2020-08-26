<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public $time,$id;

	public function __construct(){
		parent::__construct();
		$this->load->model('categoriaModel');
		// $this->load->model('usuarioModel');
		$this->load->model('productoModel');
		
		// $this->load->helper('form');

		// date_default_timezone_set('America/Bogota');
		// $this->time = date("d-m-Y",time());
		// $this->id = $this->session->userdata('id');
    }
	
	public function index(){
		$data['categorias']= $this->categoriaModel->getAll();
		$data['productos']= $this->productoModel->getAll();
		
		// var_dump($data['categorias'][0]);
		$this->load->view('inicio',$data);
		
	}

	public function guardarOrden(){

		//code here
	}
}
