<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admincp extends MX_Controller {
	
	function __construct(){
		parent::__construct();
		if($this->uri->segment(2)!='login'){
			if(!$this->session->userdata('userInfo')){
				header('Location: '.PATH_URL.'admincp/login');
				return false;
			}
		}
		$this->load->model('admincp_model','model');
		$this->template->set_template('admin');
		$this->template->write('title','Admin Control Panel');
	}
	
	function index(){
		$limit = array("admin", "vuivui007");
		if (in_array($this->session->userdata('userInfo'), $limit)) {
			$data['sta_poster'] = $this->model->statistics_poster();
			$data['sta_month'] = $this->model->statistics_month();    
		}
		else
		{
			$data['sta_poster'] = '';
			$data['sta_month'] = '';  
		}

		
		$data['module'] = 'admincp';
		$this->template->write_view('content','index',$data);
		$this->template->render();
	}
	
	function menu(){
		$this->load->model('admincp_modules/admincp_modules_model');
		$this->load->model('admincp_accounts/admincp_accounts_model');
		$data['perm'] = $this->admincp_accounts_model->getData($this->session->userdata('userInfo'));
		$data['menu'] = $this->admincp_modules_model->list_module();
		$this->load->view('menu',$data);
	}
	
	function login(){
		if(!empty($_POST)){
			if(md5($this->input->post('pass'))==$this->model->checkLogin($this->input->post('user'))){

				$this->session->set_userdata('userInfo', $this->input->post('user'));
				print 1;
			}else{
				print 0;
			}
		}else{
			$this->load->view('BACKEND/login');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('userInfo');
		header('Location: '.PATH_URL.'admincp/login');
	}
	
	function permission(){
		$data['module'] = 'admincp';
		$this->template->write_view('content','permission',$data);
		$this->template->render();
	}
	
	function chk_perm($id_module,$type,$isAjax){
		$this->load->model('admincp_accounts/admincp_accounts_model');
		$this->load->model('admincp/admincp_model');
		$info = $this->admincp_model->getInfo($this->session->userdata('userInfo'));
		$pos = strpos($info[0]->permission,','.$id_module.'|');
		if($pos!==false){
			$pos = $pos+strlen($id_module);
            $pos = $pos+1; //truong hop dau ","
		}else{
			$pos = 0 +strlen($id_module);
		}

		$sub_str = substr($info[0]->permission,$pos+1,3);
		$pos_result = strpos($sub_str,$type);
		if($pos_result===false){
			if($isAjax==0){
				header('Location: '.PATH_URL.'admincp/permission');
				exit();
			}else{
				return 'permission-denied';
				exit;
			}
		}
	}
	
	function saveLog($func,$func_id,$field,$type,$old_value='',$new_value=''){
		if($field!=''){
			$data = array(
				'function' => $func,
				'function_id' => $func_id,
				'field' => $field,
				'type' => $type,
				'old_value' => $old_value,
				'new_value' => $new_value,
				'account' => $this->session->userdata('userInfo'),
				'ip' => getIP(),
				'created' => date('Y-m-d H:i:s')
			);
			$this->db->insert('admin_logs',$data);
		}else{
			foreach($new_value as $k=>$v){
				if($v!=$old_value[0]->$k){
					$data = array(
						'function' => $func,
						'function_id' => $func_id,
						'field' => $k,
						'type' => $type,
						'old_value' => $old_value[0]->$k,
						'new_value' => $v,
						'account' => $this->session->userdata('userInfo'),
						'ip' => getIP(),
						'created' => date('Y-m-d H:i:s')
					);
					$this->db->insert('admin_logs',$data);
				}
			}
		}
	}
	
	function update_profile(){
		if(!empty($_POST)){
			if(md5($this->input->post('oldpassAdmincp'))==$this->model->checkLogin($this->session->userdata('userInfo'))){
				$data = array(
					'username'=> $this->session->userdata('userInfo'),
					'password'=> md5($this->input->post('newpassAdmincp')),
				);
				$this->db->where('username', $this->session->userdata('userInfo'));
				if($this->db->update('admin_users',$data)){
					$this->load->model('admincp_accounts/admincp_accounts_model');
					$userInfo = $this->admincp_accounts_model->getData($this->session->userdata('userInfo'));
					$this->saveLog('update_profile',$userInfo[0]->id,'password','Update',$this->input->post('oldpassAdmincp'),$this->input->post('newpassAdmincp'));
					print 'success_update_profile';
					exit;
				}
			}else{
				print 'error_update_profile';
				exit;
			}
		}else{
			$this->template->write_view('content','update_profile');
			$this->template->render();
		}
	}
	
	function setting(){
		if(!empty($_POST)){
			foreach($this->input->post('hd_slugAdmincp') as $k=>$v){
				$content = $this->input->post('contentAdmincp');
				$chk_slug = $this->model->checkSlug($v);
				if($chk_slug){
					$data = array(
						'content'=>$content[$k],
						'modified'=>date('Y-m-d H:i:s')
					);
					$this->db->where('id',$chk_slug[0]->id);
					$this->db->update('admin_settings',$data);
				}else{
					$data = array(
						'slug'=>$v,
						'content'=>$content[$k],
						'modified'=>date('Y-m-d H:i:s')
					);
					$this->db->insert('admin_settings',$data);
				}
			}
			print 'success-setting';
			exit;
		}else{
			$data['setting'] = $this->model->getSetting();
			$this->template->write_view('content','setting',$data);
			$this->template->render();
		}
	}
	
	function getSetting($slug=''){
		$this->load->model('admincp_model');
		$data['setting'] = $this->admincp_model->getSetting($slug);
		$this->load->view('getSetting',$data);
	}

	function statistics_ipbyday(){
		$day = $this->input->post("day");
		$result = $this->model->statistics_ipbyday($day);
			//pr($result);
		if($result)
		{
			echo "Tổng Ip hiện tại trong ngày: <b>".count($result)."</b> <br/>";
			echo "<table class='sta_poster'>";
			echo "<tr><th>IP</th><th>Số Lượng</th></tr>";
			foreach ($result as $value) {
				echo "
				<tr><td>".$value->ip."</td>

				<td>".$value->count."</td></tr>";
			}
			echo "</table>";
		}
		else
			echo "Chưa có dữ liệu";
		pr(last_query());

	}
}