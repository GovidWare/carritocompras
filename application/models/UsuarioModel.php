<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	public function getAll(){ 

		$query=$this->db->get('usuario');
        
        return ($query->num_rows()>0)? $query : false;
	}
	


	public function getUser($id){ 

		$query=$this->db->select('*')
						->where('id',$id)
						->get('usuario');
		
		return $query;
	
	}
	
}
