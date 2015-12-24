<?php
class Admincp_model extends MY_Model {

	function checkLogin($user){
		$this->db->select('*');
		$this->db->where('username', $user);
		$this->db->where('status', 1);
		$query = $this->db->get('admin_users');
		
		foreach ($query->result() as $row){
			$pass = $row->password;
		}
		
		if(!empty($pass)){
			return $pass;
		}else{
			return false;
		}
	}
	
	function getInfo($user){
		$this->db->select('*');
		$this->db->where('username', $user);
		$this->db->where('status', 1);
		$query = $this->db->get('admin_users');

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getSetting($slug=''){
		$this->db->select('*');
		if($slug!=''){
			$this->db->where('slug', $slug);
			$this->db->limit(1);
		}
        $this->db->order_by('id');
		$query = $this->db->get('admin_settings');

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function checkSlug($slug){
		$this->db->select('id');
		$this->db->where('slug', $slug);
		$this->db->limit(1);
		$query = $this->db->get('admin_settings');

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}

	function statistics_poster(){
		$sql = "SELECT poster, COUNT(  `id` ) AS sum
				FROM  `life` 
				GROUP BY  `poster`";
		$result = $this->db->query($sql)->result();
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	function statistics_month(){
		$sql = "SELECT  `created_date` , COUNT(  `id` ) AS sum
				FROM  `life` 
				GROUP BY MONTH(  `created_date` ) , YEAR(  `created_date` ) 
				ORDER BY  `created_date` DESC 
				LIMIT 0 , 30";
		$result = $this->db->query($sql)->result();
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	function statistics_posterbyday(){
		$sql = "SELECT  `created_date` , COUNT(  `id` ) AS sum
				FROM  `life` 
				GROUP BY  `poster` , DAY(  `created_date` ) , MONTH(  `created_date` ) , YEAR(  `created_date` ) 
				ORDER BY  `created_date` DESC 
				LIMIT 0 , 30";
		$result = $this->db->query($sql)->result();
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	function statistics_ipbyday($day){
		if(empty($day))
		{
			$start = date("Y-m-d 00:00:00", time());
			$end = date("Y-m-d 23:59:59", time());	
		}
		else
		{
			$start = date("Y-m-d 00:00:00", strtotime($day));
			$end = date("Y-m-d 23:59:59", strtotime($day));	
		}
		$sql = "SELECT  `ip` , COUNT(  `ip` ) AS count
				FROM  `countip` 
				WHERE  `created` >=  '{$start}'
				AND  `created` <=  '{$end}'
				GROUP BY ip";
		$result = $this->db->query($sql)->result();
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}

	
}