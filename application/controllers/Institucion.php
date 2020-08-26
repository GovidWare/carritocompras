<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('institucionModel');
    }
	public function index(){ 

		$data['instituciones']= $this->institucionModel->getAll();
	}
}
