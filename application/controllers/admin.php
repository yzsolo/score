<?php if (!defined('BASEPATH')) exit ('no direct script access allowed');
class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		
		$this->data['base'] = $this->config->item('base_url');
		$this->data['css'] = $this->config->item('css');
		$this->data['js'] = $this->config->item('js');
		$this->data['img'] = $this->config->item('img');

		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');



	}
	public function login(){

		if(!$this->input->post('commit')){
			$this->load->view("template/header",$this->data);
			$this->load->view("manageView/login");
		} else{
			$datas = array(
				'user'=>$this->input->post('login'),
				'password'=>$this->input->post('password'));
				$res = $this->admin_model->login_model($datas);
				 if(($datas['user']!=null)||($datas['password']!=null)){
					if($datas['password'] == $res['user_pass']){
						$this->session->set_userdata($datas);
						redirect("./admin/info_list");
						
					}else{
						
						redirect("./admin/login");
						
					}
				}else{
					redirect("./admin/login");


				}


		}
		

	}
	/*增加信息*/



	//向数据库中添加待开始选手名单
	public function stu_info($stu_number){
		$res=$this->admin_model->stu_info($stu_number);
		if($res){
			redirect("./admin/info_list");
		}
		
	}
	//在数据库中开始评分选手的名单
	public function stu_scoring($stu_number){
		$res=$this->admin_model->stu_scoring($stu_number);
		if($res){
			redirect("./admin/info_list");
		}

	}
	//向数据库中添加最后得分选手的名单
	public function stu_fin_score($stu_number){
		$res=$this->admin_model->stu_fin_score($stu_number);
		if($res){
			redirect("./admin/info_list");
		}

	}

	public function add(){
		 if(!$this->session->userdata('user')){
		 		redirect('./admin/login');
		 }else{
		 	if(!$this->input->post('submit')){
		 		$this->load->view("template/header",$this->data);
				$this->load->view("manageView/man-add-info");
		 	}else{
		 		

		 		$config['upload_path'] = "data/upload/";

		 		//print_r($config['upload_path'] );
		 		//var_dump(is_dir($config['upload_path']));
		 		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		 		$config['max_size'] ='2048';
		 		$config['max_width'] ='0';
		 		$config['max_height'] ='0';
		 		$config['remove_spaces']=TRUE;
		 		$config['overwrite']=true;
		 		$config['encrypt_name']=false;
		 		
		 		$this->load->library('upload',$config);
		 		$this->upload->initialize($config);
		 		
		 		// $path = "data/upload";
		 		// $this->upload->set_upload_path($path);
		 	
		 		//fopen(base_url()."data/upload", "w+r");
		 		if(!$this->upload->do_upload("userfile")){
		 			$error = array('error'=>$this->upload->display_errors());
		 			print_r($error);
		 			$this->load->view('template/header',$this->data);
		 			$this->load->view('manageView/man-add-info',$error);
		 		}else{
		 			$data_file=array('upload_data'=>$this->upload->data());
		 			
		 			$str=mb_substr($data_file['upload_data']['full_path'],14);
		 			//print $_SERVER['HTTP_HOST']."/".$str;
			 		$datas = array('optionsradios' =>$this->input->post('optionsRadios') ,
			 						'username' =>$this->input->post('user-name'),
			 						'number' =>$this->input->post('number'),
			 						'school' =>$this->input->post('school'),
			 						'lecture' =>$this->input->post('lecture'),
			 						'motto' =>$this->input->post('motto'),
			 						'man_info' =>$this->input->post('man_info'),
			 						'img_path' =>("http://".$_SERVER['HTTP_HOST']."/".$str)
			 						 );
			 	
			 		$flag = $this->admin_model->add_info($datas);
			 	
		 		
		 		if($flag){
		 			$this->load->view('template/header',$this->data);
		 			$this->load->view('template/success');
		 			$this->load->view('manageView/man-add-info');

		 		}else{

		 			redirect("./admin/fail");
		 		}

		 	}
		 }


	}

}


	 function info_list(){
	 	if (!$this->session->userdata('user')) {
	 		redirect('./admin/login');
	 		
	 	} else {
	 		$this->res[1] = $this->admin_model->read_info(1);
	 		$this->res[2] = $this->admin_model->read_info(2);

	 		$this->load->view("template/header",$this->data);
			$this->load->view("manageView/man-list",$this->res);
			$this->load->view("template/footer",$this->data);
	 		
	 	}
	 	

		

	}




	public function modify($parm,$flag){

		$this->res=$this->admin_model->modify_info($parm,$flag); 
		$this->load->view("template/header",$this->data);
		$this->load->view("manageView/modify",$this->res);
		if($this->input->post('submit')){
			

			 		$datas = array(
			 						'number' =>$this->input->post('number'),
			 						'school' =>$this->input->post('school'),
			 						'lecture' =>$this->input->post('lecture'),
			 						'motto' =>$this->input->post('motto'),
			 						'man_info' =>$this->input->post('man_info'),
			 						
			 						 );

			 		$fl=$this->admin_model->update_info($parm,$datas,$flag);
	
		 		if($fl){
		 			
		 			redirect("./admin/info_list");

		 		}else{

		 			redirect("./admin/fail");
		 		}

		 	
		 }


		}



	
	public function delete_info($parm,$flag){

		$res=$this->admin_model->del_info($parm,$flag);
		if($res){
			redirect("./admin/info_list");
		}else{
			redirect("./admin/fail");
		}


	}
	//最后所有成绩汇总
	public function all_score(){
		$this->res=$this->admin_model->all_score();
	
		$this->load->view("template/header",$this->data);
		$this->load->view("manageView/all_score",$this->res);
		 $this->load->view("template/footer",$this->data);
	}

	//修改score_flag标志位
	public function change_flag($para){
		$this->admin_model->change_flag($para);
	
	}


	
	public function score_exit(){
		$this->session->sess_destroy();
		$this->load->view("template/score_exit");
		redirect("./admin/login");

	}
	
	public function fail(){
		$this->load->view("template/fail");

	}

}