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
	
	public function getOne($user, $pass){ 

		$query=$this->db->select('*')
						->where('correo',$user)
						->get('usuario')
						->result();

		if(isset($query[0]))
			return (password_verify($pass, $query[0]->pass))? $query[0] : false;
		else
			return false;
	
	}

	public function getUser($id){ 

		$query=$this->db->select('*')
						->where('id_usuario',$id)
						->get('usuario');
		
		return $query;
	
	}
	
	public function update($data){ 

		$this->db->set('pass',$data['pass'])
				 ->where('nombre',$data['name'])
				 ->where('apellido',$data['lastname'])
				 ->where('correo',$data['email'])
				 ->where('question',$data['question'])
				 ->where('answer',$data['answer'])
				 ->update('usuario');
		
		return ($this->db->affected_rows() > 0);

	}

	public function update2($data){ 

		$passHash = password_hash($data['passNew'],PASSWORD_DEFAULT);

		$this->db->set('pass',$passHash)
				 ->set('nombre',$data['nombre'])
				 ->set('apellido',$data['apellido'])
				 ->set('fechanmto',$data['nacimiento'])
				 ->where('correo',$data['email'])
				 ->update('usuario');
		
		return ($this->db->affected_rows() > 0);

	}
	public function update3($data){ 


		$this->db->set('nombre',$data['nombre'])
				 ->set('apellido',$data['apellido'])
				 ->set('fechanmto',$data['nacimiento'])
				 ->where('correo',$data['email'])
				 ->update('usuario');
		
		return ($this->db->affected_rows() > 0);

	}

	public function insert($data){ 

		$query=$this->db->select('*')
						->where('correo',$data['correo'])
						->get('usuario');
        
		if($query->num_rows()>0){
			return FALSE;
		}else{
			$this->db->insert('usuario', $data);
			return TRUE;
		}

	}
}
