<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Media extends MX_Controller
{

    private $module = 'media';
    private $table = 'media';

    function __construct()
    {
        parent::__construct();
        $this->load->model($this->module . '_model', 'model');
        $this->load->model('admincp_modules/admincp_modules_model');
        if ($this->uri->segment(1) == 'admincp') {
            if ($this->uri->segment(2) != 'login') {
                if (!$this->session->userdata('userInfo')) {
                    header('Location: ' . PATH_URL . 'admincp/login');
                    return false;
                }
                $get_module = $this->admincp_modules_model->check_modules($this->uri->segment(2));
                $this->session->set_userdata('ID_Module', $get_module[0]->id);
                $this->session->set_userdata('Name_Module', $get_module[0]->name);
            }
            $this->template->set_template('admin');
            $this->template->write('title', 'Admin Control Panel');
        }
    }

    /*------------------------------------ Admin Control Panel ------------------------------------*/
    public function admincp_index()
    {
        modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'r', 0);
        $default_func = 'id';
        $default_sort = 'DESC';
        $data = array(
            'module' => $this->module,
            'module_name' => $this->session->userdata('Name_Module'),
            'default_func' => $default_func,
            'default_sort' => $default_sort
        );

        $this->template->write_view('content', 'BACKEND/index', $data);
        $this->template->render();
    }

    public function admincp_update($id = 0)
    {
        if ($id == 0) {
            modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 0);
        } else {
            modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'r', 0);
        }
        $result[0] = array();
        if ($id != 0) {
            $result = $this->model->getDetailManagement($id);
        }
        $data = array(
            'result' => $result[0],
            'module' => $this->module,
            'id' => $id
        );
        $this->template->write_view('content', 'BACKEND/ajax_editContent', $data);
        $this->template->render();
    }

    public function admincp_save()
    {
        //pr($_FILES,1);
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 1);
        if ($perm == 'permission-denied') {
            print $perm;
            exit;
        }
        if ($_POST) {
            //Upload Image
            $fileName = array('thumbnail' => '', 'thumb' => '');
            if ($_FILES) {
                foreach ($fileName as $k => $v) {
                    if (isset($_FILES['fileAdmincp']['error'][$k])) {
                        $typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k], 0, 5));
                        if ($typeFileImage == 'image' || strpos($_FILES['fileAdmincp']['type'][$k], 'x-shockwave-flash') !== false) {
                            $tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
                            $file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
                            $ext = strtolower(substr($file_name[$k], -4, 4));
                            if ($ext == 'jpeg') {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -5)) . '.jpg';
                            } else {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . $ext;
                            }
                        } else {
                            print 'Only upload Image.';
                            exit;
                        }
                    }
                }
            }
            //End Upload Image

            if ($this->model->saveManagement($fileName)) {
                //Upload Image
                if ($_FILES) {
                    foreach ($fileName as $k => $v) {
                        if (isset($_FILES['fileAdmincp']['error'][$k])) {
                            $upload_path = BASEFOLDER . DIR_UPLOAD_SLIDER;
                            //  return $upload_path;die;
                            move_uploaded_file($tmp_name[$k], $upload_path . $fileName[$k]);
                        }
                    }
                }
                //End Upload Image
                print 'success';
                exit;
            }
        }
    }

    public function admincp_delete()
    {
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'd', 1);
        if ($perm == 'permission-denied') {
            print $perm;
            exit;
        }
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $result = $this->model->getDetailManagement($id);
            modules::run('admincp/saveLog', $this->module, $id, 'Delete', 'Delete');
            $this->db->where('id', $id);
            if ($this->db->delete(PREFIX . $this->table)) {
                //Xóa hình khi Delete
                @unlink(BASEFOLDER . DIR_UPLOAD_SLIDER . $result[0]->thumbnail);
                return true;
            }
        }
    }

    public function admincp_ajaxLoadContent()
    {
        $this->load->library('AdminPagination');
        $config['total_rows'] = $this->model->getTotalsearchContent();
        $config['per_page'] = $this->input->post('per_page');
        $config['num_links'] = 3;
        $config['func_ajax'] = 'searchContent';
        $config['start'] = $this->input->post('start');
        $this->adminpagination->initialize($config);

        $result = $this->model->getsearchContent($config['per_page'], $this->input->post('start'));
        $data = array(
            'result' => $result,
            'per_page' => $this->input->post('per_page'),
            'start' => $this->input->post('start'),
            'module' => $this->module
        );
        $this->session->set_userdata('start', $this->input->post('start'));
        $this->load->view('BACKEND/ajax_loadContent', $data);
    }

    public function admincp_ajaxUpdateActive()
    {
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 1);
        if ($perm == 'permission-denied') {
            print '<script type="text/javascript">show_perm_denied()</script>';
            $active = $this->input->post('active');
            $data = array(
                'active' => $active
            );
        } else {
            if ($this->input->post('active') == 0) {
                $active = 1;
            } else {
                $active = 0;
            }
            $data = array(
                'active' => $active
            );
            modules::run('admincp/saveLog', $this->module, $this->input->post('id'), 'active', 'update', $this->input->post('active'), $active);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update(PREFIX . $this->table, $data);
        }

        $update = array(
            'active' => $active,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateActive', $update);
    }
    /*------------------------------------ End Admin Control Panel --------------------------------*/


    /*------------------------------------ FRONTEND ------------------------------------*/
    public function getMedia($controlName)
    {
        $this->load->model($this->module . '_model', 'media');
        $position = $this->media->getAds_position($controlName);
        $result = $this->media->getAds($position['id'], 1);
        $data['results'] = array();
        $data['results'] = $result;
        $data['position'] = $position;

        echo $this->load->view('FRONTEND/media', $data, NULL);
    }
    public function getImg($controlName)
    {
        $this->load->model($this->module . '_model', 'media');
        $position = $this->media->getAds_position($controlName);
        $result = $this->media->getAds($position['id'], 1);
        $data['results'] = array();
        $data['results'] = $result;
        $data['position'] = $position;

        echo $this->load->view('FRONTEND/empty', $data, NULL);
    }
    /*------------------------------------ End FRONTEND --------------------------------*/
}
