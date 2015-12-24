<?php

class Media_model extends MY_Model
{
    private $module = 'media';
    private $table = 'media';
    private $table_position = 'media_position';

    function getsearchContent($limit, $page)
    {
        $this->db->select('*');
        $this->db->limit($limit, $page);
        $this->db->order_by($this->input->post('func_order_by'), $this->input->post('order_by'));
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $this->db->where('(`name` LIKE "%' . $this->input->post('content') . '%"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created_date >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created_date <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created_date >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created_date <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getTotalsearchContent()
    {
        $this->db->select('*');
        if ($this->input->post('content') != '' && $this->input->post('content') != 'type here...') {
            $this->db->where('(`name` LIKE "%' . $this->input->post('content') . '%"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') == '') {
            $this->db->where('created_date >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
        }
        if ($this->input->post('dateFrom') == '' && $this->input->post('dateTo') != '') {
            $this->db->where('created_date <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        if ($this->input->post('dateFrom') != '' && $this->input->post('dateTo') != '') {
            $this->db->where('created_date >= "' . date('Y-m-d 00:00:00', strtotime($this->input->post('dateFrom'))) . '"');
            $this->db->where('created_date <= "' . date('Y-m-d 23:59:59', strtotime($this->input->post('dateTo'))) . '"');
        }
        $query = $this->db->count_all_results(PREFIX . $this->table);

        if ($query > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function getDetailManagement($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function saveManagement($fileName = '')
    {
        if ($this->input->post('activeAdmincp') == 'on') {
            $active = 1;
        } else {
            $active = 0;
        }

        if ($this->input->post('hiddenIdAdmincp') == 0) {
            $data = array(
                'name' => $this->input->post('titleAdmincp'),
                'link' => $this->input->post('linkAdmincp'),
                'position' => $this->input->post('positionAdmincp'),
                'type' => $this->input->post('typeAdmincp'),
                'image' => $fileName['thumbnail'],
                'active' => $active,
                'created_date' => date('Y-m-d H:i:s', time()),
            );
            if ($this->db->insert(PREFIX . $this->table, $data)) {
                modules::run('admincp/saveLog', $this->module, $this->db->insert_id(), 'Add new', 'Add new');
                return true;
            }
        } else {
            $result = $this->getDetailManagement($this->input->post('hiddenIdAdmincp'));

            //Xử lý xóa hình khi update thay đổi hình
            if ($fileName['thumbnail'] == '') {
                $fileName['thumbnail'] = $result[0]->image;
            } else {
                @unlink(BASEFOLDER . DIR_UPLOAD_ADS . $result[0]->image);
            }
            //End xử lý xóa hình khi update thay đổi hình

            $data = array(
                'name' => $this->input->post('titleAdmincp'),
                'link' => $this->input->post('linkAdmincp'),
                'position' => $this->input->post('positionAdmincp'),
                'type' => $this->input->post('typeAdmincp'),
                'image' => $fileName['thumbnail'],
                'active' => $active,
                'created_date' => date('Y-m-d H:i:s', time()),
            );
            modules::run('admincp/saveLog', $this->module, $this->input->post('hiddenIdAdmincp'), '', 'Update', $result, $data);
            $this->db->where('id', $this->input->post('hiddenIdAdmincp'));
            if ($this->db->update(PREFIX . $this->table, $data)) {
                return true;
            }
        }
        return false;
    }

    function checkData($title)
    {
        $this->db->select('id');
        $this->db->where('name', $title);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return true;
        } else {
            return false;
        }
    }

    function checkSlug($slug)
    {
        $this->db->select('id');
        $this->db->where('alias', $slug);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->result()) {
            return true;
        } else {
            return false;
        }
    }

    /*----------------------FRONTEND----------------------*/

    function getAds($position, $limit = null)
    {
        $this->db->select('*');
        $this->db->where('active', 1);
        $this->db->where('position', $position);
        if ($limit)
            $this->db->limit($limit);
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get(PREFIX . $this->table);

        if ($query->num_rows() > 0) {
            if ($limit && $limit === 1)
                return $query->row_array();
            else
                return  $query->result_array();
        } else {
            return false;
        }
    }

    function getAds_position($code)
    {
        $this->db->select('*');
        $this->db->where('code', $code);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX . $this->table_position);

        if ($query->result()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getPosition($code)
    {
        $this->db->select('*');
        $this->db->where('id', $code);
        $this->db->limit(1);
        $query = $this->db->get(PREFIX . $this->table_position);

        if ($query->result()) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function getPositionName($id)
    {
        $result = $this->getPosition($id);
        return $result['Name'];
    }

    function getAllPosition()
    {
        $query = $this->db->get(PREFIX . $this->table_position);
        return $query->result();
    }
    /*--------------------END FRONTEND--------------------*/
}