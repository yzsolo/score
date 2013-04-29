<?php if(!defined('BASEPATH')) exit ("no direct script access allowed controller");
class console extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->data['base'] = $this->config->item('base_url');
		$this->data['js'] = $this->config->item('js');
		$this->data['img'] = $this->config->item('img');
		$this->data['css'] = $this->config->item('css');

		$this->load->model('console_model');
		$this->load->helper(array('form','url'));
		$this->load->library('session');
		$this->load->library('form_validation');



	}
//功能：评委登录控制
	public function judges_login(){
		if(!$this->input->post('submit')){
			$this->load->view("template/header",$this->data);
			$this->load->view("judgeView/judges_login");
		}else{
			$user = $this->input->post('judge_number');
			$res = $this->console_model->judge_status($user);
			$pass = $this->input->post('judge_pass');
			print_r($res);
			
		
			if($res&&($pass=="123")){
				$f1 = $this->console_model->judges_log($user);
				
				if($f1==0){
					//禁用用户登录标志
					 // $this->console_model->judges_flag($user,1);
					$d=$this->session->set_userdata($pass);
					
					redirect("./console/judges/".$user);
					
				}else if($f1==1){
					redirect("./console/judges_login_fail");
				}
			} else{
				redirect("./console/judges_login_fails");
			}
			
		}
		
	}

	//功能：评委评分
	public function judges($judge_number){
		
			$this->datas = $judge_number;
			$this->load->view("template/header",$this->data);
			$this->load->view("judgeView/judges",$this->datas);
			$this->load->view("template/footer",$this->data);
		
	}
	
	//功能：每次请求后返回一位选手的所有信息。
	
	public function athlete_info(){
		$res = $this->console_model->last_athlete();

		$fin_res=$this->console_model->athlete_info($res['athlete']);
	
		$data = json_encode($fin_res);
		echo $data;

	}



	
	//接受评委打分数据
	public function accepted_score(){
		$data = array('judge_number' =>$this->input->post('judge_number') ,
						'athlete_number'=>$this->input->post('athlete_number'),
						'result'=>$this->input->post('result') );
		$res=$this->console_model->insert_score($data);
		
		return $res;


	}


	//**************************
	//功能：返回一个选手对应所有老师的评分(2012/04/20)
	//judge_number_flag是判断是否到下个选手，当前端所传参数与我所点评分的参数相同时为0，
	//若传的参数与我所点评分的人不同，为1；
	public function athlete_score(){
		  $spknum = $this->input->post("spknum");
		  
		  $res = $this->console_model->last_athlete_score($spknum);

		  $data = json_encode($res);
		  echo $data;

	}
	//功能：返回所有评委的编号和名字
	public function all_judge_info(){
		$res = $this->console_model->all_judge_info();
		$data = json_encode($res);
		print_r($data);
		return $data;

	}

	//**************************
	//功能：返回一个选手的最后得分信息,其中将返回最大值、最小值，及去掉最值后的均值。(2012/04/20)
	public function athlete_score_fin(){
		$res = $this->console_model->athlete_score_fin();
		
		$data_result = json_encode($res);
		
		echo $data_result;
	}

	//功能：判断点击的按钮，返回按钮对应的标志位。
	public function judges_flag(){
		$res = $this->console_model->console_flag();
		if(($res['flag1']==1) && ($res['flag2']==0) && ($res['flag3']==0)){

			echo "1";

		}else if(($res['flag1']==0) && ($res['flag2']==1) && ($res['flag3']==0)){
			echo "2";
			

		}else if(($res['flag1']==0) && ($res['flag2']==0) && ($res['flag3']==1)){
			echo "3";
			

		}else{
			echo "0";
		}
	}
	

	public function screen_info(){
		$this->load->view("template/header",$this->data);
		$this->load->view("screenView/screen_info");
		$this->load->view("template/footer",$this->data);

	}








	public function judges_login_fail(){
		$this->load->view("template/header",$this->data);
		$this->load->view("template/judge_fail");
	}
	public function judges_login_fails(){
		$this->load->view("template/header",$this->data);
		$this->load->view("template/judge_fails");
	}


}