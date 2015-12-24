<?php
class Category_model extends MY_Model {
    private $module = 'category';
    private $table = 'category';
    private $table_position = 'ads_position';
	function getsearchContent($limit,$page){
		$this->db->select('*');
		$this->db->limit($limit,$page);
        $this->db->order_by($this->input->post('func_order_by'),$this->input->post('order_by'));

		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('(`name` LIKE "%'.$this->input->post('content').'%"' );
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
			$this->db->where('created_date >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
		}
		if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
			$this->db->where('created_date <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
			$this->db->where('created_date >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
			$this->db->where('created_date <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
        $this->db->where('parent_id',null);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
    function getTotalsearchContent(){
		$this->db->select('*');
		if($this->input->post('content')!='' && $this->input->post('content')!='type here...'){
			$this->db->where('(`name` LIKE "%'.$this->input->post('content').'%"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')==''){
			$this->db->where('created_date >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
		}
		if($this->input->post('dateFrom')=='' && $this->input->post('dateTo')!=''){
			$this->db->where('created_date <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
		if($this->input->post('dateFrom')!='' && $this->input->post('dateTo')!=''){
			$this->db->where('created_date >= "'.date('Y-m-d 00:00:00',strtotime($this->input->post('dateFrom'))).'"');
			$this->db->where('created_date <= "'.date('Y-m-d 23:59:59',strtotime($this->input->post('dateTo'))).'"');
		}
        $this->db->where('parent_id',null);
		$query = $this->db->count_all_results(PREFIX.$this->table);

		if($query > 0){
			return $query;
		}else{
			return false;
		}
	}

	function getDetailManagement($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function saveManagement($fileName=''){

		if($this->input->post('hiddenIdAdmincp')==0){
			$data = array(
				'name'=> $this->input->post('titleAdmincp'),
                'order'=> $this->input->post('orderAdmincp'),
				'alias'=> $this->input->post('aliasAdmincp'),
                'active'=>$this->input->post('activeAdmincp') == 'on',
				'created_date'=> date('Y-m-d H:i:s',time()),
                'parent_id'=> ($this->input->post('ParentCatAdmincp') != "-1"?$this->input->post('ParentCatAdmincp'):null),
			);
			if($this->db->insert(PREFIX.$this->table,$data)){
				return true;
			}
		}else{
			$result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));

			$data = array(
                'name'=> $this->input->post('titleAdmincp'),
                'order'=> $this->input->post('orderAdmincp'),
                'alias'=> $this->input->post('aliasAdmincp'),
                'created_date'=> date('Y-m-d H:i:s',time()),
                'active'=>$this->input->post('activeAdmincp') =='on',
                'parent_id'=> ($this->input->post('ParentCatAdmincp') != "-1"?$this->input->post('ParentCatAdmincp'):null),
			);
			$this->db->where('id',$this->input->post('hiddenIdAdmincp'));
			if($this->db->update(PREFIX.$this->table,$data)){
				return true;
			}
		}
		return false;
	}
	
	function checkData($title){
		$this->db->select('id');
		$this->db->where('name',$title);
		$this->db->limit(1);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return true;
		}else{
			return false;
		}
	}
	
	function checkSlug($slug){
		$this->db->select('id');
		$this->db->where('alias',$slug);
		$this->db->limit(1);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return true;
		}else{
			return false;
		}
	}

    function getParentAll($cat,$active=null)
    {
        $this->db->select('*');
        if($active != null)
            $this->db->where('active',$active);
        $this->db->where('parent_id',$cat);
        $this->db->order_by('order',$cat);
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }
	/*----------------------FRONTEND----------------------*/

	function getNews($limit){
		$this->db->select('*');
		$this->db->where('active',1);
        if($limit)
            $this->db->limit($limit);
		$this->db->order_by('created_date','DESC');
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}

    function getOlderNews($id, $limit){
        $this->db->select('*');
        $this->db->where('active',1);
        if($id)
            $this->db->where('id <', $id);
        if($limit)
            $this->db->limit($limit);
        $this->db->order_by('created_date','DESC');
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }
	
	function getNewsDetail($alias_detail){
		$this->db->select('id, name, link');
		$this->db->where('link',$alias_detail);
		$this->db->where('active',1);
		$this->db->limit(1);
		$query = $this->db->get(PREFIX.$this->table);

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}

    function getCategoryByName($catid){
		$this->db->select('*');
		$this->db->where('id',$catid);
		$query = $this->db->get(PREFIX.'category');

		if($query->result()){
			return $query->result();
		}else{
			return false;
		}
	}
    function getCategoryByID($catid){
        $this->db->select('*');
        $this->db->where('id',$catid);
        $query = $this->db->get(PREFIX.$this->table);
        if($query->result()){
            return $query->row();
        }else{
            return false;
        }
    }
	function getAds($position,$limit)
    {
        $this->db->select('*');
        $this->db->where('active',1);
        $this->db->where('position',$position);
        if($limit)
            $this->db->limit($limit);
        $this->db->order_by('created_date','DESC');
        $query = $this->db->get(PREFIX.$this->table);

        if($query->result()){
            return $query->result_array();
        }else{
            return false;
        }
    }
    function getAds_position($code)
    {
        $this->db->select('*');
        $this->db->where('code',$code);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX.$this->table_position);

        if($query->result()){
            return $query->row_array();
        }else{
            return false;
        }
    }
	/*--------------------END FRONTEND--------------------*/
}