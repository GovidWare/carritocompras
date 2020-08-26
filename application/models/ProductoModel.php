<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productoModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	public function getAll(){ 

		$query=$this->db->get('producto');
        
        return ($query->num_rows()>0)?$query: false;
	}
	
	public function getOne(){ 

		$id=$this->session->userdata('id');

		$query=$this->db->select('*')
						->where('id_profesor',$id)
						->order_by('id_modulo', 'ASD')
						->get('producto');

		return ($query->num_rows()>0)?$query: false;
	
	}

	public function changeEstado($modulo,$estado){ 

		$id=$this->session->userdata('id');

		$query=$this->db->select('*')
						->where('id_profesor',$id)
						->where('id_modulo',$modulo)
						->get('producto')
						->result();

		if(isset($query[0])){
			$estadoActual=$query[0]->fkid_estado;

			if($estadoActual<$estado){
				$this->db->set('fkid_estado',$estado)
				 ->where('id_profesor',$id)
				 ->where('id_modulo',$modulo)
				 ->update('producto');
		
				return ($this->db->affected_rows() > 0);
			}
		}
		return false;
	}
}
