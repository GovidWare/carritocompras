<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// var_dump(json_decode($answer));
class Modulo1 extends CI_Controller {

	public $time,$id;

	public function __construct(){
		parent::__construct();
		$this->load->model('institucionModel');
		// $this->load->model('usuarioModel');
		$this->load->model('profesormoduloModel');
		$this->load->model('profesoractividadModel');
		$this->load->model('profesorunidadModel');
		$this->load->helper('form');

		date_default_timezone_set('America/Bogota');
		$this->time = date("d-m-Y",time());
		$this->id = $this->session->userdata('id');
	}
	
	public function index(){
		
		if(isset($this->id)){
			$this->profesormoduloModel->changeEstado(1,1);

			$data['profesormodulo']=$this->profesormoduloModel->getOne();
			$this->load->view('modulos/modulo1/index',$data);

		}else{
			$this->logout();
		}
	}

	public function unidad1(){

		$seg['seg3']=$this->uri->segment(3);
		$seg['seg4']=$this->session->userdata('idAct');
		
		if(isset($this->id)){
			$data['profesormodulo']=$this->profesormoduloModel->getOne();

			$submit=$this->input->post('submit');
			if(!$seg['seg3']){
				
				$this->load->view('modulos/modulo1/unidad1/inicio',$data);
			}
			else if($seg['seg4'] && isset($submit)){
				
				$idAct=$seg['seg4'];
				switch ($idAct) {
					case 'm1u1a1':
						$points=$this->input->post('pointsGood');
						$answer='{"Actividad 1":{"Pregunta 1": "'.$points.' correctos de 16"}}';
						
						$nota=$this->input->post('pointsCanvas');
						
						$this->insertUpdate($idAct,$nota, $answer);

					break;
					
					case "m1u1a3":

						$m1 = $this->input->post('medios1');
						$m2 = $this->input->post('medios2');
						$m3 = $this->input->post('medios3');
						$m4 = $this->input->post('medios4');
						$m5 = $this->input->post('medios5');

						$tel=$rad=$rs=0;

						for ($i=1; $i <=8 ; $i++) { 
							for ($j=1; $j <=3 ; $j++) { 
								$val = $this->input->post(''.$i.$j.'');
								if(isset($val)){
									if($j==1) $tel++;
									else if ($j==2) $rad++;
									else if($j==3) $rs++;
								}
							}
						}  
						$r2="Televisión : ".$tel.", Radio : ".$rad.", Redes Sociales : ".$rs."";
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$m1.'",
												 "Pregunta 2": "'.$m2.'",
												 "Pregunta 3": "'.$m3.'",
												 "Pregunta 4": "'.$m4.'",
												 "Pregunta 5": "'.$m5.'"
												},
								  "Actividad 2":{"Pregunta 1": "'.$r2.'"}
								}';
						
						$nota="No Aplica";

						$this->insertUpdate($idAct,$nota, $answer);
						
					break;

					case "m1u1a5":
						$nota= $this->input->post('pointsCanvas');
						
						$points=$this->input->post('pointsGood');
						$answer='{"Actividad 1":{"Pregunta 1": "'.$points.' correctos de 4"}}';
						
						$this->insertUpdate($idAct,$nota, $answer);

					break;
					case "m1u1a6":
						$nota="No Aplica";

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						$p3 = $this->input->post('preg3');
						$p4 = $this->input->post('preg4');
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												"Pregunta 2": "'.$p2.'",
												"Pregunta 3": "'.$p3.'",
												"Pregunta 4": "'.$p4.'"
						   						}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
						
					break;
					case "m1u1a8":
						$p1 = $this->input->post('proveedor1');
						$p2 = $this->input->post('proveedor2');
						$p3 = $this->input->post('proveedor3');
						$p4 = $this->input->post('proveedor4');
						$p5 = $this->input->post('proveedor5');

						$ins=$bv=$rd=0;

						for ($i=1; $i <=8 ; $i++) { 
							for ($j=1; $j <=3 ; $j++) { 
								$val = $this->input->post(''.$i.$j.'');
								if(isset($val)){
									if($j==1) $ins++;
									else if ($j==2) $bv++;
									else if($j==3) $rd++;
								}
							}
						}  
						$r2="Instagrammer : ".$ins.", Bibliotecas Virtuales : ".$bv.", Recursos  Digitales : ".$rd."";
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												 "Pregunta 2": "'.$p2.'",
												 "Pregunta 3": "'.$p3.'",
												 "Pregunta 4": "'.$p4.'",
												 "Pregunta 5": "'.$p5.'"
												},
								  "Actividad 2":{"Pregunta 1": "'.$r2.'"}
								}';
						
						$nota="No Aplica";

						$this->insertUpdate($idAct,$nota, $answer);
						
					break;
					case "m1u1a9":
						$nota="No Aplica";

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						$p3 = $this->input->post('preg3');
						$p4 = $this->input->post('preg4');
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												"Pregunta 2": "'.$p2.'",
												"Pregunta 3": "'.$p3.'",
												"Pregunta 4": "'.$p4.'"
						   						}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
					break;
				}
			}
			if($seg['seg3']){
				
			$this->session->unset_userdata('idAct');
			$data['profesormodulo']=$this->profesormoduloModel->getOne();
			$this->load->view("modulos/modulo1/unidad1/".$seg['seg3'],$data);
			}
			
		}else{
			$this->logout();
		}
	}


	public function unidad2(){

		$seg['seg3']=$this->uri->segment(3);
		$seg['seg4']=$this->session->userdata('idAct');
		
		if(isset($this->id)){
			$data['profesormodulo']=$this->profesormoduloModel->getOne();
			
			$submit=$this->input->post('submit');
			if(!$seg['seg3']){
				$this->load->view('modulos/modulo1/unidad2/inicio',$data);
			}
			else if($seg['seg4'] && isset($submit)){
				
				$idAct=$seg['seg4'];
				
				switch ($idAct) {
					case 'm1u1':
						
						$nota= (double)($this->input->post('pre1'));
						$this->insertUpdateE($idAct,$nota);
					break;
					case "m1u2a2":
						$nota= $this->input->post('pointsNota');
						
						$points=$this->input->post('pointsGood');
						$answer='{"Actividad 1":{"Pregunta 1": "'.$points.' correctos de 8"}}';
						
						$this->insertUpdate($idAct,$nota, $answer);
						
					break;
					case "m1u2a3":
						$nota="No Aplica";

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						$p3 = $this->input->post('preg3');
						$p4 = $this->input->post('preg4');
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												"Pregunta 2": "'.$p2.'",
												"Pregunta 3": "'.$p3.'",
												"Pregunta 4": "'.$p4.'"
						   						}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
					break;
					case "m1u2a5":
						$nota="No Aplica";

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						$p3 = $this->input->post('preg3');
						$p4 = $this->input->post('preg4');
						$p5 = $this->input->post('preg5');
						$p6 = $this->input->post('preg6');
						$p7 = $this->input->post('preg7');
						$p8 = $this->input->post('preg8');

						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												"Pregunta 2": "'.$p2.'",
												"Pregunta 3": "'.$p3.'",
												"Pregunta 4": "'.$p4.'",
												"Pregunta 5": "'.$p5.'",
												"Pregunta 6": "'.$p6.'",
												"Pregunta 7": "'.$p7.'",
												"Pregunta 8": "'.$p8.'"
						   						}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
					break;
				}
			}
			
			if($seg['seg3']){
				$this->session->unset_userdata('idAct');
				$data['profesormodulo']=$this->profesormoduloModel->getOne();
				$this->load->view("modulos/modulo1/unidad2/".$seg['seg3'],$data);
			}
			
			
		}else{
			$this->logout();
		}
	}


	public function unidad3(){
		$seg['seg3']=$this->uri->segment(3);
		$seg['seg4']=$this->session->userdata('idAct');
		
		if(isset($this->id)){
			$data['profesormodulo']=$this->profesormoduloModel->getOne();

			$submit=$this->input->post('submit');
			if(!$seg['seg3'] && !isset($submit)){
				$this->load->view('modulos/modulo1/unidad3/inicio',$data);
			}
			else if($seg['seg4'] && isset($submit)){
				
				$idAct=$seg['seg4'];
				switch ($idAct) {
					case 'm1u2':
						$nota= (double)($this->input->post('opc1'));
						$this->insertUpdateE($idAct,$nota);
					break;
					case "m1u3a3":
						$nota="No Aplica";

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						$p3 = $this->input->post('preg3');
						$p4 = $this->input->post('preg4');
						$p5 = $this->input->post('preg5');
						$p6 = $this->input->post('preg6');
						$p7 = $this->input->post('preg7');
						$p8 = $this->input->post('preg8');
						$p9 = $this->input->post('preg9');
						$p10 = $this->input->post('preg10');

						$m1 = $this->input->post('m1');
						$m2 = $this->input->post('m2');
						$m3 = $this->input->post('m3');
						$m4 = $this->input->post('m4');
						$m5 = $this->input->post('m5');

						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$p1.'",
												"Pregunta 2": "'.$p2.'",
												"Pregunta 3": "'.$p3.'",
												"Pregunta 4": "'.$p4.'",
												"Pregunta 5": "'.$p5.'",
												"Pregunta 6": "'.$p6.'",
												"Pregunta 7": "'.$p7.'"
												},
								  "Actividad 2":{"Pregunta 1": "'.$m1.'",
												"Pregunta 2": "'.$m2.'",
												"Pregunta 3": "'.$m3.'",
												"Pregunta 4": "'.$m4.'",
												"Pregunta 5": "'.$m5.'"
												  },
									"Actividad 3":{"Pregunta 8": "'.$p8.'",
													"Pregunta 9": "'.$p9.'",
													"Pregunta 10": "'.$p10.'"
												}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
					break;
					
				}
			}

			$seg['seg3']=(isset($seg['seg3']))?$seg['seg3']:'inicio';
				
			$this->session->unset_userdata('idAct');
			$data['profesormodulo']=$this->profesormoduloModel->getOne();
			$this->load->view("modulos/modulo1/unidad3/".$seg['seg3'],$data);
		
			
		}else{
			$this->logout();
		}
	}
	public function unidad4(){
		$seg['seg3']=$this->uri->segment(3);
		$seg['seg4']=$this->session->userdata('idAct');
		
		if(isset($this->id)){
			$data['profesormodulo']=$this->profesormoduloModel->getOne();

			$submit=$this->input->post('submit');
			if(!$seg['seg3'] && !isset($submit)){
				$this->load->view('modulos/modulo1/unidad4/inicio',$data);
			}
			else if($seg['seg4'] && isset($submit)){
				
				$idAct=$seg['seg4'];
				switch ($idAct) {
					case 'm1u3':
						$t1=$this->input->post('temas_1');
						$t2=$this->input->post('temas_2');
						$t3=$this->input->post('temas_3');
						$t4=$this->input->post('temas_4');
					
						$nota=0;
						if(isset($t1))
							$nota=$nota+2.5;
						if(isset($t2))
							$nota=$nota+2.5;
						if(isset($t3))
							$nota=$nota-2.5;
						if(isset($t4))
							$nota=$nota-2.5;

						$this->insertUpdateE($idAct,$nota);
					break;
					case "m1u4a3":
						$nota="No Aplica";

						$e1 = $this->input->post('e1');
						$e2 = $this->input->post('e2');
						$e3 = $this->input->post('e3');
						$e4 = $this->input->post('e4');
						$e5 = $this->input->post('e5');

						$p1 = $this->input->post('preg1');
						$p2 = $this->input->post('preg2');
						
						$answer='{"Actividad 1":{"Pregunta 1": "'.$e1.'",
												"Pregunta 2": "'.$e2.'",
												"Pregunta 3": "'.$e3.'",
												"Pregunta 4": "'.$e4.'",
												"Pregunta 5": "'.$e5.'"
												  },
									"Actividad 2":{"Pregunta 1": "'.$p1.'",
													"Pregunta 2": "'.$p2.'"
												}
			 					}';
						
						$this->insertUpdate($idAct,$nota, $answer);
					break;
				}
			}

			$seg['seg3']=(isset($seg['seg3']))?$seg['seg3']:'inicio';
				
			$this->session->unset_userdata('idAct');
			$data['profesormodulo']=$this->profesormoduloModel->getOne();
			$this->load->view("modulos/modulo1/unidad4/".$seg['seg3'],$data);
		
		}else{
			$this->logout();
		}
	}



	public function insertUpdate($idAct,$nota, $answer){

		if($nota!="No Aplica" && $nota<=0){$nota=1;}
		$data= array(
			'id_actividad' 	   => $idAct,
			'id_profesor' 	   => $this->id,
			'respuesta' 	   => $answer,
			'fecharealizacion' => $this->time,
			'nota' 			   => $nota
		);	

		$this->profesoractividadModel->consult($data);
	}

	public function insertUpdateE($idEval,$nota){
		
		if($nota<=0){$nota=1;}
		
		$des= $this->calculoDes($nota);

		$data= array(
			'id_unidad' 	   => $idEval,
			'id_profesor' 	   => $this->id,
			'notaevaluacion'   => $nota,
			'desempeñounidad'  => $des,
			'fecharealizacion' => $this->time
			
		);	

		$this->profesorunidadModel->consult($data);
	}

	public function calculoDes($nota){

		if($nota!="No Aplica"){
			if($nota<3){
				return 'Malo';
			}else if ($nota<=4){
				return 'Regular';
			}
			return 'Bueno';
		}else
			return $nota;
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		$data['instituciones']= $this->institucionModel->getAll();
		$this->load->view('login',$data);
	}

	
}
