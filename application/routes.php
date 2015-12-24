<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "life";
$route['404_override'] = '';

//Config Router Multi Language
//$route['^en/(.+)$'] = "$1";
//$route['^vi/(.+)$'] = "$1";
//$route['^en$'] = $route['default_controller'];
//$route['^vi$'] = $route['default_controller'];

//Config Router Admincp
$route['admincp/statistics_ipbyday'] = "admincp/statistics_ipbyday";
$route['admincp'] = "admincp";
$route['admincp/menu'] = "admincp/menu";
$route['admincp/login'] = "admincp/login";
$route['admincp/logout'] = "admincp/logout";
$route['admincp/permission'] = "admincp/permission";
$route['admincp/saveLog'] = "admincp/saveLog";
$route['admincp/update_profile'] = "admincp/update_profile";
$route['admincp/setting'] = "admincp/setting";
$route['admincp/getSetting'] = "admincp/getSetting";
$route['admincp/(:any)/(:any)/(:any)/(:any)'] = "$1/admincp_$2/$3/$4";
$route['admincp/(:any)/(:any)/(:any)'] = "$1/admincp_$2/$3";
$route['admincp/(:any)/(:any)'] = "$1/admincp_$2";
$route['admincp/(:any)'] = "$1/admincp_index";

$route['dangnhap.html'] = "life/dangnhap";
//$route['gioi-thieu/ve-chung-toi.html'] = "life/aboutus";
$route['tintuc-sukien/tintucsukien']="life/sukien";
$route['article/article']="life/sukien";

//$route['san-pham-dich-vu/san-pham-dich-vu.html']="life/sanphamdichvu";
//$route['san-pham-dich-vu/cac-tien-bo-ky-thuat.html']="life/sanphamdichvu";
$route['hoat-dong-r-d/hoatdong-nghiencuu.html']="life/hoatdongnghiengcuu";//
$route['activity-r-d/activity-research.html']="life/hoatdongnghiengcuu";//
$route['hoat-dong-r-d/hoatdong-hoinghi-hoithao.html']="life/hoatdonghoinghihoithao";//xoa roi
$route['hoat-dong-r-d/hoatdong-baocao-khoahoc.html']="life/hoatdongbaocaokhoahoc";//xoa roi
$route['hoat-dong-r-d/hoatdongdetaill.html']="life/hoatdongdetaill";
$route['lien-he.html'] = "life/contactus";
$route['contact-us.html'] = "life/contactus";
$route['cong-trinh.html'] = "life/gallery";
$route['dich-vu/quy-trinh-thiet-ke.html'] = "life/quytrinhthietke";
$route['dich-vu/quy-trinh-lam-viec.html'] = "life/quytrinhlamviec";
//$route['captcha'] = "life/captcha";
#CATEGORIES
$route['hoatdongdetaill/(:any).html'] = "life/hoatdongdetaill/$1";//
$route['activity-detaill/(:any).html'] = "life/hoatdongdetaill/$1";//
$route['gioi-thieu/(:any).html'] = "life/abouturl/$1";//
$route['about/(:any).html'] = "life/abouturl/$1";//
$route['hoat-dong-r-d/hoatdong-(:any)-(:num).html'] = "life/hoatdonglist/$1/$2";
$route['activity-r-d/activity-(:any)-(:num).html'] = "life/hoatdonglist/$1/$2";
$route['san-pham-dich-vu/(:any).html']="life/sanphamdichvuurl/$1";//
$route['manager/(:any).html']="life/sanphamdichvuurl/$1";//managerurl
$route['products-services/(:any).html']="life/sanphamdichvuurl/$1";//
$route['tintucsukien/(:any).html']="life/sukienurldetail/$1";
$route['article/(:any).html']="life/sukienurldetail/$1";
//$route['(:any).htm'] = "life/cat/$1";
//$route['(:any)/(:any).html'] = "life/detail/$2";
//$route['(:any)/(:num)'] = "life/cat/$1/$2";
//$route['life/(:num)'] = "life/index/$1";
//$route['life/(:num)'] = "life/index/$1";
$route['loadcontent/acticle-(:num).html']="life/acticle/$1";
$route['loadcontent/services-(:num).html']="life/services/$1";
$route['mail/sentmail']="life/sentmailauto";
$route['search']="life/search";
//$route['mail/(:any).html']="life/sentmailauto/$1";
$route['switchLanguage/(:any)']="life/switchLanguage/$1";
$route['about/(:any).html'] = "life/abouturl/$1";
/*phan trang*/
$route['tintuc-sukien/tintucsukien/(:num)']="life/sukienpage/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */