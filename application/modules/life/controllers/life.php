<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Life extends MX_Controller
{

    private $module = 'life';
    private $table = 'life';
    private $site_lang = 'vn';

    function __construct()
    {
        parent::__construct();
        $this->load->model($this->module . '_model', 'model');
        $this->load->model('media/media_model', 'media');
        $this->load->model('admincp_modules/admincp_modules_model');
        $this->load->model('category/category_model', 'category');
        $this->load->model('admincp/admincp_model', 'admin');
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

        $this->form_validation->set_message('required', 'Bạn chưa nhập %s');
        $this->site_lang = $this->session->userdata('site_lang');
    }

    /*------------------------------------ Admin Control Panel ------------------------------------*/
    public function admincp_index()
    {
        modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'r', 0);
        $default_func = 'order_num';
        $default_sort = 'ASC';
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
            'id' => $id,
            'categories' => $this->category->getParentAll(null)
        );

        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->ckeditor->basePath = base_url() . 'static/asset/ckeditor/';
//            $this->ckeditor->config['toolbar'] = array(
//                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
//            );
        //            //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, '/static/asset/ckfinder/');


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
            $fileName = array('thumbnail' => '', 'thumb' => '', 'document' => '');
            if (!$this->input->post('removeThumbnailAdmincp') && $_FILES) {
                foreach ($fileName as $k => $v) {
                    if (isset($_FILES['fileAdmincp']['error'][$k])) {
                        $typeFileImage = strtolower(substr($_FILES['fileAdmincp']['type'][$k], 0, 5));
                        if ($typeFileImage == 'image') {
                            $tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
                            $file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
                            $ext = strtolower(substr($file_name[$k], -4, 4));
                            if ($ext == 'jpeg') {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -5)) . '.jpg';
                            } else {
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . "." . $ext;
                            }
                        } else {
                            /*  print 'Only upload Image.';
                              exit;
                            */
                            $tmp_name[$k] = $_FILES['fileAdmincp']["tmp_name"][$k];
                            $file_name[$k] = $_FILES['fileAdmincp']['name'][$k];
                            $ext = strtolower(substr($file_name[$k], -4, 4));
                            // $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . $ext;
                            if (strlen($ext) == 4)
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -4)) . "." . $ext;
                            else
                                $fileName[$k] = time() . '_' . SEO(substr($file_name[$k], 0, -5)) . "." . $ext;
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
                            $upload_path = BASEFOLDER . DIR_UPLOAD_NEWS;
                            if ($k == 'document')
                                $upload_path = BASEFOLDER . DIR_UPLOAD_FILES;
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
                @unlink(BASEFOLDER . DIR_UPLOAD_LIFE . $result[0]->thumbnail);
                return true;
            }
        }
    }

    public function admincp_ajaxLoadContent()
    {
        if ($catid = $this->input->get('catid')) {
            $this->load->library('AdminPagination');
            $config['total_rows'] = $this->model->getTotalsearchContentCat($catid);
            $config['per_page'] = $this->input->post('per_page');
            $config['num_links'] = 3;
            $config['func_ajax'] = 'searchContent';
            $config['start'] = $this->input->post('start');
            $this->adminpagination->initialize($config);

            $result = $this->model->getsearchContentCat($catid, $config['per_page'], $this->input->post('start'));
            $data = array(
                'result' => $result,
                'per_page' => $this->input->post('per_page'),
                'start' => $this->input->post('start'),
                'module' => $this->module
            );
            $this->session->set_userdata('start', $this->input->post('start'));
            $this->load->view('BACKEND/ajax_loadContent', $data);
        } else {


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

    public function admincp_ajaxUpdateHot()
    {
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 1);
        if ($perm == 'permission-denied') {
            print '<script type="text/javascript">show_perm_denied()</script>';
            $active = $this->input->post('hot');
            $data = array(
                'hot' => $active
            );
        } else {
            if ($this->input->post('hot') == 0) {
                $active = 1;
            } else {
                $active = 0;
            }
            $data = array(
                'hot' => $active
            );
            modules::run('admincp/saveLog', $this->module, $this->input->post('id'), 'hot', 'update', $this->input->post('hot'), $active);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update(PREFIX . $this->table, $data);
        }

        $update = array(
            'hot' => $active,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateHot', $update);
    }

    public function admincp_ajaxUpdateHome()
    {
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 1);
        if ($perm == 'permission-denied') {
            print '<script type="text/javascript">show_perm_denied()</script>';
            $active = $this->input->post('home');
            $data = array(
                'home' => $active
            );
        } else {
            if ($this->input->post('home') == 0) {
                $active = 1;
            } else {
                $active = 0;
            }
            $data = array(
                'home' => $active
            );
            modules::run('admincp/saveLog', $this->module, $this->input->post('id'), 'home', 'update', $this->input->post('home'), $active);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update(PREFIX . $this->table, $data);
        }

        $update = array(
            'home' => $active,
            'id' => $this->input->post('id'),
            'module' => $this->module
        );
        $this->load->view('BACKEND/ajax_updateHome', $update);
    }

    public function admincp_ajaxUpdateSort()
    {
        $perm = modules::run('admincp/chk_perm', $this->session->userdata('ID_Module'), 'w', 1);
        if ($perm == 'permission-denied') {
            print '<script type="text/javascript">show_perm_denied()</script>';
        } else {
            $vl = $this->input->get('vl');
            $this->db->set('order_num', $vl);
            $this->db->where('id', $this->input->get('id'));
            $this->db->update(PREFIX . $this->table);

            modules::run('admincp/saveLog', $this->module, $this->input->post('id'), 'order', 'update', $this->input->post('vl'));

        }

    }
    /*------------------------------------ End Admin Control Panel --------------------------------*/

    /*------------------------------------ FRONTEND ------------------------------------*/
    public function index()
    {

        $data = array();

        $slug_cat = 'index';
        if (($cat_id = $this->model->checkNoneCatSlug($slug_cat))) {
          //  var_dump($cat_id);exit();
            $data['home'] = array('list_article' => $this->model->list_article_all($cat_id, 10, 0),
                'slug_cat' => $slug_cat);
           //  var_dump($this->model->list_article_all($cat_id, 10, 0));exit();
        }


        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/index', $data);
        $this->template->render();
    }
    public function head()
    {

        $data = array();


        $this->load->view("FRONTEND/head",$data);
    }
    public function top()
    {

        $data = array();


        $this->load->view("FRONTEND/top",$data);
    }
    public function header()
    {

        $data = array();


        $this->load->view("FRONTEND/header",$data);
    }
    public function menu()
    {
        $data = array();

        $this->load->view("FRONTEND/menu",$data);
    }
    public function footer()
    {

        $data = array();


        $this->load->view("FRONTEND/footer",$data);
    }
    public function page_kienthucnangmui()
    {

        $data = array();

        $slug_cat = 'kien-thuc-nang-mui';
        if (($cat_id = $this->model->checkNoneCatSlug($slug_cat))) {
            //  var_dump($cat_id);exit();
            $data['page'] = array('list_article' => $this->model->list_article_all($cat_id, 20, 0),
                'slug_cat' => $slug_cat);
            //  var_dump($this->model->list_article_all($cat_id, 10, 0));exit();
        }
        $this->model->update_view_page($slug_cat);
        $ishome = 1;

        $this->model->update_view_ip(); //Insert IP
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_kienthucnangmui', $data);
        $this->template->render();

    }
    public function page_chatlieunangmui()
    {

        $data = array();
        $slug_cat = 'chat-lieu-nang-mui';
        if (($cat_id = $this->model->checkNoneCatSlug($slug_cat))) {
            $data['page'] = array('list_article' => $this->model->list_article_all($cat_id, 1, 0),
                'slug_cat' => $slug_cat);
        }
        $this->model->update_view_page('chat-lieu-nang-mui-detaill');
        $ishome = 1;
        $this->model->update_view_ip(); //Insert IP

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_chatlieunangmui', $data);
        $this->template->render();

    }
    public function page_chuyensuamui()
    {

        $data = array();
        $slug_cat = 'chuyen-sua-mui';
        if (($cat_id = $this->model->checkNoneCatSlug($slug_cat))) {
            $data['page'] = array('list_article' => $this->model->list_article_all($cat_id, 1, 0),
                'slug_cat' => $slug_cat);
        }
        $this->model->update_view_page('chuyen-sua-mui-1');
        $ishome = 1;
        $this->model->update_view_ip(); //Insert IP

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_chuyensuamui', $data);
        $this->template->render();

    }
    public function page_2_3()
    {

        $data = array();

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_2_3', $data);
        $this->template->render();

    }
    public function page_4()
    {
        $data = array();

        $slug_cat = 'phuong-phap-sua-mui';
        if (($cat_id = $this->model->checkNoneCatSlug($slug_cat))) {
            //  var_dump($cat_id);exit();
            $data['page'] = array('list_article' => $this->model->list_article_all($cat_id, 20, 0),
                'slug_cat' => $slug_cat);
            //  var_dump($this->model->list_article_all($cat_id, 10, 0));exit();
        }

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_phuongphapsuamui', $data);
        $this->template->render();
        /*$data = array();

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_4', $data);
        $this->template->render();
        */
    }
    public function page_5()
    {

        $data = array();

        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/page_5', $data);
        $this->template->render();

    }
    public function lien_he()
    {

        $data = array();
        $slug_cat = 'mot-so-thong-tin-can-luu-y';
        if (!($detailinfo = $this->model->getSingleNewsDetail($slug_cat))) {//var_dump("b");exit();
            redirect(site_url());
        }
        $data['info'] = $detailinfo;


        if ($this->input->post("ajax")) {
            // $result=true;
            $name = $this->input->post("Name");
            $phone = $this->input->post("Phone");
            $email = $this->input->post("Email");
            $msg = $this->input->post("EmailMsg");
            $result["message"] = "Đang thực thi";
            if (!empty($name) && !empty($phone) && !empty($email)) {

                if ($this->model->saveEnroll($name, $email, $phone,$msg)) {
//var_dump(PATH_URL);exit();
                  //  require(PATH_URL.'PHPMailer-master/PHPMailerAutoload.php');
                    require_once('/PHPMailer-master/PHPMailerAutoload.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

                    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'letruongthinh0210@gmail.com';                 // SMTP username
                    $mail->Password = 'iuemiuanhsaobang@';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $noidungthu=file_get_contents("sentmaildata.php");
                    $mail->From = 'letruongthinh0210@gmail.com';
                    $mail->FromName = 'Mailer';
                    $mail->addAddress('letruongthinh0210@gmail.com', 'Lê Thịnh');     // Add a recipient
                    $mail->addAddress('thriving1991la@gmail.com');               // Name is optional
                  //  $mail->addReplyTo('letruongthinh0210@gmail', 'Information');
                   // $mail->addCC('thinh.le@vnetwork.vn');
                  //  $mail->addBCC('thinh.le@vnetwork.vn');

                   // $mail->addAttachment('var/tmp/file.tar.gz');         // Add attachments
                   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'LIEN HE TU VAN';
                    //$mail->Body    ='This is the HTML message body <b>in bold!</b>';
                    $mail->Body=str_replace(
                      array("{name}","{phone}","{email}","{msg}")  ,
                      array($name,$phone,$email,$msg),
                      $noidungthu
                    );
                    $mail->AltBody = '';//thêm này cuối nếu có nội dung

                    if(!$mail->send()) {
                       // echo 'Message could not be sent.';
                       // echo 'Mailer Error: ' . $mail->ErrorInfo;
                        $result["message"] = "Message could not be sent.".'<br/>'.'Mailer Error: ' . $mail->ErrorInfo;
                        $result["ret"] = true;
                    } else {
                        $result["message"] = "Success!";
                        $result["ret"] = true;
                       // echo 'Message has been sent';
                    }


                   /* $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.vnetwork.vn',
                        'smtp_port' => '25',
                        'smtp_user' => 'thinh.le@vnetwork.vn',
                        'smtp_pass' => 'Password@123'
                    );

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($email, $name);
                    $this->email->to("thinh.le@vnetwork.vn");
                    $this->email->subject('[Contact us] Register');
                    $this->email->message("Name: $name \r\n Email: $email \r\n Phone: $phone, \r\n Message: $msg");
                    if ($this->email->send()) {
                        $result["message"] = "Success!";
                        $result["ret"] = true;
                    } else {
                        echo $this->email->print_debugger();
                    }
                   */

                }/* else {
                    $result["message"] = "Success!";
                    $result["ret"] = true;
                }*/

            }
        }else {
            $result = false;
            $result["message"] = "";
            $result["ret"] = false;
        }
/*
        $slug_cat = 'thong-tin-ca-nhan';
        if (!($detailinfo = $this->model->getSingleNewsDetail($slug_cat))) {//var_dump("b");exit();
            redirect(site_url());
        }
        $data['info'] = $detailinfo;
*/
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/lien-he', $data);
        $this->template->render();

    }
    public function detail_kienthucnangmui($urlcat)
    {
        $data = array();
        $slug_cat = $urlcat;
        if (!($detail = $this->model->getSingleNewsDetail($slug_cat))) {
            redirect(site_url());
        }//var_dump($detail);exit();
       /* $slug_catdetaill = 'article';
        if (($cat_id = $this->model->checkCatSlug($slug_catdetaill))) {
            $data['tintucsukientop2'] = array('list_article' => $this->model->list_article_all_g($cat_id, 25, 2),
                'slug_cat' => $slug_cat);
            $data['tintucsukienramdom'] = array('list_article' => $this->model->getRandomNewsNotTop($cat_id,6),
                'slug_cat' => $slug_cat);
            //var_dump($data);exit();
        }*/
        //$cat = $this->model->getCategoryById($detail->catid);
        //$data["cat"] = $cat;
        $this->model->update_view_page($slug_cat);
        $ishome = 1;
        $this->model->update_view_ip(); //Insert IP

       // $data['cat_slug'] = $slug_cat;
        $data['result'] = $detail;
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/detail_kienthucnangmui', $data);
        $this->template->render();

    }
    public function aboutus()
    {
        $data = array();
        $slug_cat = 've-chung-toi';
        if (!($detail = $this->model->getSingleNewsDetail($slug_cat))) {
            redirect(site_url());
        }
        $cat = $this->model->getCategoryById($detail->catid);
        $data["cat"] = $cat;
        $ishome = 1;
        $this->model->update_view_ip($ishome); //Insert IP

        $data['cat_slug'] = $slug_cat;
        $data['result'] = $detail;
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/gioithieu', $data);
        $this->template->render();

    }



    public function sendemail()
    {
        $result = array("message" => false);
        if ($this->input->post("ajax")) {
            $name = $this->input->post("Name");
            $phone = $this->input->post("Phone");
            $email = $this->input->post("Email");
            $msg = $this->input->post("EmailMsg");

            if (!empty($name) && !empty($phone) && !empty($email)) {

                if ($this->model->saveEnroll($name, $email, $phone)) {
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.marvel-house.edu.vn',
                        'smtp_port' => '25',
                        'smtp_user' => 'info@marvel-house.edu.vn',
                        'smtp_pass' => 'marvel123'
                    );

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($email, $name);
                    $this->email->to("info@marvel-house.edu.vn");
                    $this->email->subject('[MarvelHouse] Register');
                    $this->email->message("Name: $name \r\n Email: $email \r\n Phone: $phone, \r\n Message: $msg");
                    if ($this->email->send()) {
                        $result["message"] = lang("Success!");
                        $result["ret"] = true;
                    } else {
                        echo $this->email->print_debugger();
                    }

                } else {
                    $result["message"] = lang("Success!");
                    $result["ret"] = true;
                }

            }
        } else {
            $result["message"] = lang("Method is not valid!");
            $result["ret"] = false;
        }
        echo json_encode($result);
    }

    public function sentmailauto()
    {
        $result = array("message" => false);
        if ($this->input->post("ajax")) {
            // $result=true;
            $name = $this->input->post("Name");
            $phone = $this->input->post("Phone");
            $email = $this->input->post("Email");
            $msg = $this->input->post("EmailMsg");
            $result["message"] = "Đang thực thi";
            if (!empty($name) && !empty($phone) && !empty($email)) {

                if ($this->model->saveEnroll($name, $email, $phone)) {
                    $config = array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'mail.vnetwork.vn',
                        'smtp_port' => '25',
                        'smtp_user' => 'thinh.le@vnetwork.vn',
                        'smtp_pass' => 'Password@123'
                    );

                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from($email, $name);
                    $this->email->to("thinh.le@vnetwork.vn");
                    $this->email->subject('[Contact us] Register');
                    $this->email->message("Name: $name \r\n Email: $email \r\n Phone: $phone, \r\n Message: $msg");
                    if ($this->email->send()) {
                        $result["message"] = "Success!";
                        $result["ret"] = true;
                    } else {
                        echo $this->email->print_debugger();
                    }

                } else {
                    $result["message"] = "Success!";
                    $result["ret"] = true;
                }

            }
        } else {
            $result = false;
            $result["message"] = "Chưa được thực thi";
            $result["ret"] = false;
        }
        echo json_encode($result);
    }



    public function cat($slug_cat)
    {
        if (!($cat_id = $this->model->checkCatSlug($slug_cat))) {
            redirect(site_url());
        }
        $cat = $this->model->getCategoryById($cat_id);
        $data["cat"] = $cat;
        $ishome = 1;
        $this->model->update_view_ip($ishome); //Insert IP

        $config['base_url'] = site_url($slug_cat);
        $config['total_rows'] = $this->model->count_article_all($cat_id);
        $config['per_page'] = 5;
        $config['num_links'] = 10;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 2;
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link_class'] = 'pages-next float-right';
        $config['prev_link_class'] = 'pages-prew float-left';
        $start = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->load->library("pagination", $config);
        $data['pagination'] = $this->pagination->create_links();

        $data['cat_slug'] = $slug_cat;
        $data['results'] = $this->model->list_article_all($cat_id, $config['per_page'], $start);
        //check if ajax is called
        if ($this->input->post("life")) {
            $this->load->view("paging_view", $data);
        } else {
            $this->template->set_template('life');
            $this->template->write_view('content', 'FRONTEND/index', $data);
            $this->template->render();
        }
    }

    public function hoatdongdetaill($slug_detail)
    {
        $data['result'] = $this->model->getSingleNewsDetail($slug_detail);

        $this->model->update_view_page($slug_detail); // Insert View
        $this->model->update_view_ip(); //Insert IP
        if (!$data['result']) {
            header('Location: ' . PATH_URL . $this->uri->segment(1));
            exit;
        }
        $catid = $data['result']->catid;
        if ($catid != null || $catid != '') {
            settype($catid, "int");
            $data['menulist'] = array('list_article' => $this->model->list_article_with_category($catid, 4));
        }
        $this->template->set_template('life');
        $this->template->write('title', $data['result']->title . '');
        $this->template->write('meta_image', DIR_UPLOAD_NEWS . $data['result']->thumbnail);
        $this->template->write('meta_description', $data['result']->summary);
        $this->template->write_view('content', 'FRONTEND/hoatdongdetaill', $data);
        $this->template->render();

    }


    public function getSetting($slug = '')
    {
        $this->load->model('admincp/admincp_model', 'admin');
        $data['setting'] = $this->admin->getSetting($slug);
        $this->load->view('admincp/getSetting', $data);
    }

    public function getUserNum()
    {
        $day = $this->input->post("day");
        $result = $this->model->statistics_ipbyday($day);

    }

    function switchLanguage($language = "")
    {
        $language = ($language != "") ? $language : "vn";
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }

    /* public function hash_passwd( $password, $random_salt )
     {
         return crypt( $password . config_item('encryption_key'), '$2a$09$' . $random_salt . '$' );
     }
     public function random_salt()
     {
         return md5( mt_rand() );
     }

    $sram=$this->random_salt();
    var_dump($this->hash_passwd('132456',$sram ));exit();
    */

    function dangnhapcp()
    {
        $data = array();
        $data['b_err'] = array('err' => "");
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->library('session');
        // var_dump($this->load->library('session'));//exit();
        // var_dump($this->session->userdata[0]->username);
        //var_dump($this->session->userdata[0]->group_id);
        if (!empty($_POST)) {
            if (md5($this->input->post('pass')) == $this->model->checkLogincp($this->input->post('user'))) {
                //$this->session->set_userdata('group_id',$this)
                //var_dump($this->model->getUserLogincp($this->input->post('user')));exit();
                // $this->session->set_userdata('userInfo', $this->model->getUserLogincp($this->input->post('user')));//$this->input->post('user'));
                $newdata = $this->model->getUserLogincp($this->input->post('user'));
                $this->session->set_userdata($newdata, 604800);
                redirect(site_url());
                //$data['b_err']=array('err' =>"dang nhap thanh cong");
                // print 1;
            } else {
                $data['b_err'] = array('err' => "Kiểm tra lại user và password");
                // print 0;
            }
        }
        $slug_cat = 'system';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['sanphamthuongmai'] = array('list_article' => $this->model->list_article_all_g($cat_id, 38, 5),
                'slug_cat' => $slug_cat);
        }
        $slug_cat = 'services_technology';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['dichvukithuat'] = array('list_article' => $this->model->list_article_all_g($cat_id, 39, 4),
                'slug_cat' => $slug_cat);
        }
        $ishome = 1;
        $this->model->update_view_ip($ishome); //Insert IP
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/login', $data);
        $this->template->render();
    }

    function dangnhap()
    {
        $data = array();
        // $data['re']=$this->session->userdata[0]->user_id;
        // var_dump($data);exit();
        if (!empty($this->session->userdata[0])) {
            $data['checkcool'] = array('zdata' => true, 'user_id' => $this->session->userdata[0]->user_id
            , 'user_email' => $this->session->userdata[0]->user_email
            , 'user_level' => $this->session->userdata[0]->user_level
            , 'user_salt' => $this->session->userdata[0]->user_salt
            );
        } else {
            $data['checkcool'] = array('zdata' => false);
        }

        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->library('session');
        // var_dump($data);
        /* if($this->session) {
             var_dump($this->session);//exit();
         }*/
        // var_dump($this->session);exit();
        /*  $aaaaa = array(
              'user_id'=>'545344435',
              'username'  => 'johndoe',
              'email'     => 'johndoe@some-site.com',
              'logged_in' => TRUE
          );*/
        // $this->session->set_userdata($aaaaa,300);
        $data['b_err'] = array('err' => "");
        if ($postData = $this->input->post(null, TRUE)) {
            // var_dump("_____".$postData['user_id']."_______".$postData['Pass']);
            // $this->session->sess_destroy();//pha huy session cu di
            if ($this->checklogin($data)) {
                $check = $this->model->Checklogin($data);
                if ($check) {
                    // var_dump($this->model->getUserLogin($data));exit();
                    $check = $this->model->getUserLogin($data);
                    if ($check) {//var_dump($check);exit();
                        //  if($this->session->userdata) {
                        // var_dump($check);exit();
                        $newdata = $check;
                        //  $newdata = array('user_id'=>$check['user_id']);
                        // var_dump($newdata);exit();
                        $this->session->set_userdata($newdata, 604800);
                        redirect(site_url());
                        // }

                        //  var_dump($this->session);exit();
                    } else {
                        // var_dump("sai usser");exit();
                        $data['b_err'] = array('err' => "Kiểm tra lại password");
                        // $this->loaddangnhap();
                    }
                } else {
                    //var_dump("sai usser");exit();
                    $data['b_err'] = array('err' => "Kiểm tra lại password");
                    // $this->loaddangnhap();
                }
            }

        }


        $slug_cat = 'system';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['sanphamthuongmai'] = array('list_article' => $this->model->list_article_all_g($cat_id, 38, 5),
                'slug_cat' => $slug_cat);
        }
        $slug_cat = 'services_technology';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['dichvukithuat'] = array('list_article' => $this->model->list_article_all_g($cat_id, 39, 4),
                'slug_cat' => $slug_cat);
        }

        if (!($zuser = $this->model->get_user_group())) {
            redirect(site_url());
        }
        $data['zuser'] = $zuser;
        $data['listuser'] = array('listuser1' => $this->model->get_user(1)
        , 'listuser2' => $this->model->get_user(2)
        , 'listuser3' => $this->model->get_user(3));

        $ishome = 1;
        $this->model->update_view_ip($ishome); //Insert IP
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/dangnhap', $data);
        $this->template->render();


        /********create session********/


        //$this->session->sess_destroy();
        /*
                $newdata = array(
                    'user_id'=>'545344435',
                    'username'  => 'johndoe',
                    'email'     => 'johndoe@some-site.com',
                    'logged_in' => TRUE
                );

              //  $this->session->set_userdata($newdata,300);//set session voi ten la:: userdata
               // var_dump($this->session->userdata);exit();
               // if(!$this->session->userdata) {
                    //kiem tra neu session rong thi add session

                   // $logged_in = $this->session->userdata['logged_in'];//lay session ra
                   // $username = $this->session->userdata['email'];//lay session ra
                   // var_dump($username);
                   // exit();
               // }
                /**********end create session****************/


    }

    function  loaddangnhap()
    {
        $slug_cat = 'system';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['sanphamthuongmai'] = array('list_article' => $this->model->list_article_all_g($cat_id, 38, 5),
                'slug_cat' => $slug_cat);
        }
        $slug_cat = 'services_technology';
        if (($cat_id = $this->model->checkCatSlug($slug_cat))) {
            $data['dichvukithuat'] = array('list_article' => $this->model->list_article_all_g($cat_id, 39, 4),
                'slug_cat' => $slug_cat);
        }

        if (!($zuser = $this->model->get_user_group())) {
            redirect(site_url());
        }
        $data['zuser'] = $zuser;
        $data['listuser'] = array('listuser1' => $this->model->get_user(1)
        , 'listuser2' => $this->model->get_user(2)
        , 'listuser3' => $this->model->get_user(3));

        $ishome = 1;
        $this->model->update_view_ip($ishome); //Insert IP
        $this->template->set_template('life');
        $this->template->write_view('content', 'FRONTEND/dangnhap', $data);
        $this->template->render();
    }

    function  checklogin(&$data)
    {
        if (!$this->input->post('user_id')) {
            $data['b_err'] = array('err' => "Chưa nhập tên");
            return false;
        }
        if (!$this->input->post('Pass')) {
            $data['b_err'] = array('err' => "Chưa nhập Password");
            return false;
        }

        return true;
    }

    function  checklogout()
    {
        $this->session->sess_destroy();
        $array_items = array(
            'user_id' => null,
            'user_name' => null,
            'full_name' => null,
            'user_email' => null,
            'user_pass' => null,
            'user_salt' => null,
            'user_last_login' => null,
            'user_login_time' => null,
            'user_session_id' => null,
            'user_date' => null,
            'user_modified' => null,
            'user_agent_string' => null,
            'user_level' => null,
            'user_group_id' => null,
            'user_banned' => null,
            'passwd_recovery_code' => null,
            'passwd_recovery_date' => null
        );
        //  $this->session->unset_userdata($array_items);
        redirect(site_url());
    }
    /*------------------------------------ End FRONTEND --------------------------------*/
}