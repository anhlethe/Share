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


//$route['captcha'] = "life/captcha";
#CATEGORIES
$route['kien-thuc-nang-mui.html']="life/page_kienthucnangmui";

$route['chat-lieu-nang-mui.html']="life/page_chatlieunangmui";//page_2_3";
$route['chuyen-sua-mui.html']="life/page_chuyensuamui";//page_2_3";
$route['phuong-phap-sua-mui.html']="life/page_4";
$route['page-5.html']="life/page_5";
$route['lien-he.html']="life/lien_he";

$route['kien-thuc-nang-mui/(:any).html']="life/detail_kienthucnangmui/$1";
//$route['manager/document-new-documents-66.html']="life/managernews/new-documents/66";
//$route['manager/document-normative-document-67.html']="life/managernews/normative-document/67";
//$route['manager/document-working-schedule-68.html']="life/managernews/working-schedule/68";

//$route['(:any).htm'] = "life/cat/$1";
//$route['(:any)/(:any).html'] = "life/detail/$2";
//$route['(:any)/(:num)'] = "life/cat/$1/$2";
//$route['life/(:num)'] = "life/index/$1";
//$route['life/(:num)'] = "life/index/$1";

//$route['mail/(:any).html']="life/sentmailauto/$1";
$route['switchLanguage/(:any)']="life/switchLanguage/$1";

/*phan trang*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */