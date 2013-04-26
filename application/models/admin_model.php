<?php if(!defined('BASEPATH')) exit('no direct script access allowed model');
class Admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function login_model($parm){
		$sql = "select user_pass from score_console_user where user_name='$parm[user]'";
		$query=$this->db->query($sql);
		
		$res = $query->result_array();
		return $res[0];

	}

	public function add_info($parm){
		if($parm['optionsradios']=='1'){
			$sql = "insert into score_judge_info(ju_name,ju_school,ju_number,ju_info,ju_photo) 
					values('$parm[username]','$parm[school]','$parm[number]','$parm[man_info]','$parm[img_path]')";
			$query = $this->db->query($sql);
			return $query;


		}else if($parm['optionsradios']=='2'){
			$sql="insert into score_contestent_info(name,number,school,lecture,motto,info,photo) 
					values('$parm[username]','$parm[number]','$parm[school]','$parm[lecture]','$parm[motto]','$parm[man_info]','$parm[img_path]')";
			$query = $this->db->query($sql);
			return $query;
		}
	
	}

	
	public function read_info($parm){
		if($parm==1){
			$sql = "select id,name,number from score_contestent_info";
			$query = $this->db->query($sql);
			$res=$query->result_array();
			return $res;
		}else if($parm==2){
			$sql = "select ju_id,ju_name,ju_number from score_judge_info";
			$query = $this->db->query($sql);
			$res=$query->result_array();
			return $res;
		}


	}

	public function modify_info($parm,$flag){
		if($flag==1){
			$sql = "select * from score_contestent_info where id='$parm'";
			$query = $this->db->query($sql);
			$res=$query->result_array();
			return $res;
		}else if($flag==2){
			$sql = "select * from score_judge_info where ju_id='$parm'";
			$query = $this->db->query($sql);
			$res=$query->result_array();
			$result[0]['number'] = $res[0]['ju_number'];
			$result[0]['school'] = $res[0]['ju_school'];
			$result[0]['name'] = $res[0]['ju_name'];
			$result[0]['photo'] = $res[0]['ju_photo'];
			$result[0]['info'] = $res[0]['ju_info'];

			return $result;
		}


	}
	public function update_info($parm,$datas,$flag){
		if($flag==1){
			$sql="update score_contestent_info set number = '$datas[number]',
			school='$datas[school]',lecture='$datas[lecture]',motto='$datas[motto]',
			info='$datas[man_info]',photo='$datas[img_path]' where id='$parm'";
			$query=$this->db->query($sql);
			return $query;
		}else if($flag==2){
			$sql="update score_judge_info set ju_number = '$datas[number]',
			ju_school='$datas[school]',ju_info='$datas[man_info]',ju_photo='$datas[img_path]'
			where ju_id=$parm";
			$query=$this->db->query($sql);
			return $query;

		}


	}
	public function del_info($parm,$flag){
		if($flag==1){
			$sql="delete from score_contestent_info where id='$parm'";
			$query=$this->db->query($sql);
			return $query;
		}else if($flag==2){
			$sql="delete from score_judge_info where ju_id='$parm'";
			$query=$this->db->query($sql);
			return $query;
		}

	}
	//
	public function stu_info($parm){
		$sql = "insert into score_transition (athlete) values('$parm')";
		$query = $this->db->simple_query($sql);
		return $query;
		
	}

	public function stu_scoring($parm){
		$sql = "insert into score_transition1 (number) values('$parm')";
		$query = $this->db->simple_query($sql);
		return $query;

	}

	public function stu_fin_score($parm){
		$sql = "insert into score_transition2 (number) values('$parm')";
		$query = $this->db->simple_query($sql);
		return $query;
	}

	public function change_flag($para){
		if($para==1){
			$sql = "update score_flag set flag1='1',flag2='0',flag3='0' where id='1'";
			$query = $this->db->query($sql);
		}else if($para==2){
			$sql = "update score_flag set flag1='0',flag2='1',flag3='0' where id='1'";
			$query = $this->db->query($sql);

		}else if($para==3){
			$sql = "update score_flag set flag1='0',flag2='0',flag3='1' where id='1'";
			$query = $this->db->query($sql);
			
		}else if($para==4){
			$sql = "update score_flag set flag4='1',flag5='0' where id = '1'";
			$query = $this->db->query($sql);
		}else if($para==5){
			$sql = "update score_flag set flag4='0',flag5='1' where id = '1'";
			$query = $this->db->query($sql);
		}
	}
}