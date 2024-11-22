<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2018-2019 Touchmark Descience Pvt Ltd
*
*/
//mysql_set_charset("UTF8");
//header('Content-type: text/html; charset=utf-8');

/// API PATH URL ///
define('SEOURL', 'http://localhost/sidbi_website/');
define('SITEHOME', 'http://localhost/sidbi_website/');
define('BASEPATH', 'http://localhost/sidbi_website/head/');
define('PUBLIC', BASEPATH . '/public');
define('VIEW', BASEPATH . '/view');
define('LICENSE_ACCESS', '0');
define('APIACCESSPATH', 'http://localhost/sidbi_website/head/controller/core/');  //External API Path
define('APIPATH', 'http://localhost/sidbi_website/head/controller/api/');  //External API Path
/* define('IMAGEPATH', 'https://radprix.com/uploads/productmediagallery/');  */ //External API Path
define('TIMEZONE', 'Asia/Kolkata');
define('LANG', 'EN');
define('general_currency_symbol', '₹ ');

define('EMPTYFIELD', 'N/A');
define('PAGINATION_LIMIT', '24');
date_default_timezone_set(TIMEZONE);
define("COOKIE_TIME_OUT", 10); //specify cookie timeout in days (default is 10 days)
define('SALT_LENGTH', 9); // salt for password
define("ADMIN_LEVEL", 5);
define("USER_LEVEL", 1);
define("GUEST_LEVEL", 0);
define('PAGINATION_LIMIT_ORDER', '5');

session_start();
$sid = session_id();
$randno = md5(time());
$random_code = rand(1000, 9999);
$user_registration = 0;  // 0- manual approval 1- automatic approval
$logged_user_id = $_SESSION['reg_user_id'];
$logged_customer_id = $_SESSION['vm_reg_user_id'];
$logged_staff_id = $_SESSION['reg_staff_id'];

$get_configured_lang = $_SESSION['set_global_lang'];

$msme_document_1 = 'Development Approach to Hard Infra issues in select states.pdf';
$msme_document_2 ='Takeaways from National Learnshop.pdf';
$msme_document_3 ='#Clusters4Prosperity ver 2.pdf';
$msme_document_4 ='SCDF Handbook_External Version II.pdf';
$msme_document_5 ='SCDF-FAQs-English.docx';

//$logged_client_id = $_SESSION['reg_client_id'];
$logged_user_level = $_SESSION['reg_user_level'];
//$logged_outletID= $_SESSION['reg_outlet_id'];
$accesscontrol_license = LICENSE_ACCESS;
$accessaccess_auth = APIACCESSPATH;   //path to get validation
$accessrequest_api = APIPATH;  //path for all api calls

define("SET_TIMER_VALUE", 90);
$gloabl_OTP_TIMER = SET_TIMER_VALUE;

define("ENCRYPT_API_DATA", 'D24BEF88526A42F2717CB2A1AD87CE127F5F5679992A16D513D52A8117414F25DA1BCCCF3F4BFEC7C73AD5B');
$access_ENCRYPT_API_DATA = ENCRYPT_API_DATA;

$grivances_complaint_to_email = 'complaints@sidbi.in';

//set email id
$admin_emailid = 'nisg_sair@sidbi.in';
$bcc_emailid = 'arthisakthivel.tds@gmail.com';
$cc_emailid = 'ariyappan@touchmarkdes.com';

$SMTP_EMAIL_SEND_FROM = 'noreply@sidbi.in';
$SMTP_EMAIL_SEND_NAME = 'SIDBI';

//print_r($_SESSION);
//block opening included page
function protectpg_includes()
{
	if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
		echo "How did you end up here.  <a href='" . BASEPATH . "/index'>click here</a> we will take you to safe place.";
		exit();
	}
}

function publicpath($path)
{
	$public_path_link = "public/$path";
	return ($public_path_link);
}

function viewpath($path)
{
	$view_path_link = "view/$path";
	return ($view_path_link);
}

function protectpg_included($basepath, $serverpath)
{
	if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
		echo "How did you end up here.  <a href='" . $SEO_URL . "/index'>click here</a> we will take you to safe place.";
		exit();
	}
}

function curPageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function curPageName()
{
	return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
}

$currentpage = curPageName();

//include_once('controller/core/active_menus.php');

function getPAGELOAD($position, $start)
{
	if ($position == 'top' && $start == '') {
		$time = microtime();
		$time = explode(" ", $time);
		$time = $time[1] + $time[0];
		return $start = $time;
	}

	if ($position == 'bottom') {
		$time = microtime();
		$time = explode(" ", $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$totaltime = round(($finish - $start), 4);
		echo ("<small>&nbsp;&nbsp;(Page generated in $totaltime seconds.)</small>");
	}
}
