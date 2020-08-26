<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profesoractividadModel extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	public function getAll(){ 

		$query=$this->db->get('profesoractividad');
        
        return ($query->num_rows()>0)?$query: false;
	}
	
	public function getAllWhere($id){ 

		$query=$this->db->select('*')
						->where('id_profesor',$id)
						->order_by('id_actividad', 'ASD')
					    ->get('profesoractividad');
        
        return ($query->num_rows()>0)?$query: false;
	}
	
	public function consult($data){
		
		$query=$this->db->select('*')
					    ->where('id_profesor',$data['id_profesor'])
					    ->where('id_actividad',$data['id_actividad'])
					    ->get('profesoractividad');

		$result=($query->num_rows()>0)? true : false;

		if($result){
			$this->update($data);
		}else{
			$this->insert($data);
		}

	}

	public function insert($data){

		$this->db->insert('profesoractividad', $data);
	
	}

	public function update($data){

		$this->db->set('respuesta',$data['respuesta'])
				 ->set('fecharealizacion',$data['fecharealizacion'])
				 ->set('nota',$data['nota'])
				 ->where('id_profesor',$data['id_profesor'])
				 ->where('id_actividad',$data['id_actividad'])
				 ->update('profesoractividad');
		
		return ($this->db->affected_rows() > 0);
	}


}
