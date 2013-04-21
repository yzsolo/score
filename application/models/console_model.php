<?php if(!defined('BASEPATH')) exit ("no direct script access allowed model");
class console_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		// global $is_next = 0;


	}

	
	//查询用户是否登录
	public function judges_log($user){
		$sql ="select flag from score_judge_info where ju_number='$user'";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		return $res[0]['flag'];


	}
	public function judges_flag($parm,$flag){
		
		$sql = "update score_judge_info set flag='$flag' where ju_number='$parm'";
		$query = $this->db->query($sql);
		return $query;

	}
	//判断用户是否存在
	public function judge_status($number){
		$sql = "select ju_number from score_judge_info where ju_number = '$number'";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		return $res[0]['ju_number'];

	}

	public function last_athlete(){

		$sql = "select athlete from score_transition where id=(select max(id) from score_transition ) ";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		return $res[0];
	}

	public function athlete_info($number){
		$sql = "select * from score_contestent_info where number = '$number'";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		return $res;
	}

	//功能：返回所有评委对该选手所打的分。
	public function last_athlete_score($spknum){

		$sql = "select number from score_transition1 
		where 
		id= (select max(id) from score_transition1) AND number = '$spknum' ";

		$query = $this->db->query($sql);
		$res = $query->result_array();
		
		 if($res){
			$parm = $res[0]['number'];
			
		
				$sql1 = "select  from score_table,score_judge_info,score_contestent_info where sperker_number = '$parm' and (flags !='1') and
					(score_table.judge_number=score_judge_info.ju_number and score_table.sperker_number=score_contestent_info.number) "; 
			$query = $this->db->query($sql1);
			$result = $query->result_array();
			return $result;
		
			
		 }else{
		 	return 0;
		 }



	}

	// public function m_flag(){

	// 			$sql2 = "update score_table set flags='1'";
	// 			$this->db->simple_query($sql2);

			


	// }
	//功能：返回最大值、最小值、及去掉最值后的均值
	public function athlete_score_fin(){
		$sql = "select number from score_transition2 where id=(select max(id) from score_transition2)";	
		$query = $this->db->query($sql);
		$res = $query->result_array();
		
		if($res){
			$parm = $res[0]['number'];
			$sql1 = "select score from score_table where sperker_number = '$parm'";
			
			$sql_f = "update score_table set flags ='1'";

			$f = $this->db->simple_query($sql_f);
			// print_r($f);
			// $sql_f = "update score_table set flags ='1' where sperker_number='$parm'";
			// $this->db->simple_query($sql_f);
			$query = $this->db->query($sql1);

			$result = $query->result_array();
			// print_r($result);
			sort($result);
			
			$i=0;
			foreach ($result as $key => $value) {	
				$i++;	
			}
			if($i<=2){
				return "数据不够";

			}else{
					$data['min_score']= $result[0]['score'];
					
					$data['max_score'] = $result[$i-1]['score'];
					
					$res=0;
					for($m=1;$m<=$i-2;$m++){
						
						$res =$res+$result[$m]['score'];
						
					}
					$fin_score=$res/($i-2);
					
					$data['fin_score'] = $fin_score;
					
					return $data;
				}
			

		}else{
			return 0;
		}

	}

	//功能：判断点击的是哪个按钮
	public function console_flag(){
		$sql = "select * from score_flag where id = '1'";
		$query = $this->db->query($sql);
		$res = $query->result_array();
		return $res[0];

	}

	//功能：将评委打的分数写入
	public function insert_score($data){
		$sql = "insert into score_table (judge_number,sperker_number,score) values('$data[judge_number]','$data[athlete_number]','$data[result]')";
		$query = $this->db->simple_query($sql);
		return $query;


	}

}