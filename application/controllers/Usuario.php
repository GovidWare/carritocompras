<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public $id;

	public function __construct(){
		parent::__construct();
		$this->load->model('institucionModel');
		$this->load->model('usuarioModel');
		$this->load->model('profesormoduloModel');
		$this->load->helper('form');

		$this->id = $this->session->userdata('id');
	}
	
	function update(){
		if(isset($this->id)){

			$passHash = password_hash($this->input->post('pass1_r'),PASSWORD_DEFAULT);
			
			$data= array(
				'nombre'   	=> $this->input->post('nombre'),
				'apellido' 	=> $this->input->post('apellido'),
				'email'   	=> $this->input->post('correo'),
				'nacimiento'=> $this->input->post('nacimiento'),
				'passAct' 	=> $this->input->post('passAct'),
				'passNew' 	=> $this->input->post('passNew'),
				'passNew2' 	=> $this->input->post('passNew2')
			);

		
			if(isset($data['passAct'])){
				$user=$this->usuarioModel->getOne($data['email'],$data['passAct']);

				if($user){
					if(isset($data['passNew']) && isset($data['passNew2']) && $data['passNew']!=null){
						if($data['passNew'] == $data['passNew2'] ){
							//actualizar todo
							// echo "entro";
							$this->usuarioModel->update2($data);
							$this->session->set_userdata('name',$data['nombre']);
							
							$data['mensaje']="Datos actualizados correctamente";
						}else{
							$data['mensaje']="Las contraseñas no son iguales";
						}
					}else{
						//actulizar sin contrseñas
						$this->usuarioModel->update3($data);
						$this->session->set_userdata('name',$data['nombre']);
						$this->session->set_userdata('lastname',$data['apellido']);
						$data['mensaje']="Datos actualizados correctamente";
					}
				}else{
					$data['mensaje']="La contraseña actual es incorrecta";
				}
			}else{
				$data['mensaje']="Debe ingresar su contraseña actual";
			}

			$id=$this->id;
			$user=$this->usuarioModel->getUser($id);

			$data['usuario']=$user;
			$data['institucion']=$this->institucionModel->getOne((int)$user->result()[0]->fkid_institucion);

			$this->load->view('perfil',$data);

		}else{
			$this->logout();
		}
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('lastname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('rol');
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('idAct');

		$data['instituciones']= $this->institucionModel->getAll();
		$this->load->view('login',$data);
		
	}

}
