<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profesorunidadModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	public function getAll(){ 

		$query=$this->db->get('profesorunidad');
        
        return ($query->num_rows()>0)?$query: false;
	}

	public function getAllWhere($id){ 

		$query=$this->db->select('*')
						->where('id_profesor',$id)
						->order_by('id_unidad', 'ASD')
					    ->get('profesorunidad');
        
        return ($query->num_rows()>0)?$query: false;
	}
	
	public function consult($data){
		
		$query=$this->db->select('*')
					    ->where('id_profesor',$data['id_profesor'])
					    ->where('id_unidad',$data['id_unidad'])
					    ->get('profesorunidad');

		$result=($query->num_rows()>0)? true : false;

		if($result){
			$this->update($data);
		}else{
			$this->insert($data);
		}

	}

	public function insert($data){

		$this->db->insert('profesorunidad', $data);
	
	}

	public function update($data){

		$this->db->set('desempeñounidad',$data['desempeñounidad'])
				 ->set('fecharealizacion',$data['fecharealizacion'])
				 ->set('notaevaluacion',$data['notaevaluacion'])
				 ->where('id_profesor',$data['id_profesor'])
				 ->where('id_unidad',$data['id_unidad'])
				 ->update('profesorunidad');
		
		return ($this->db->affected_rows() > 0);
	}


}
