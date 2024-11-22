
<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2018-2020 Touchmark De`Science
*
*/

ini_set('display_errors', 0);
ini_set('log_errors', 0);
ini_set('error_log', dirname(__FILE__) . 'tmp/logs/error_log.txt');


include_once('config/config.php');
//Contains all Common Fields
include_once('controller/lang/general_lang_' . LANG . '.php');
//Custom language 
include_once('controller/lang/custom_lang_' . LANG . '.php');
//To verify license
//MENU Titles
include_once('controller/lang/menu_' . LANG . '.php');
//Custom Page Titles
include_once('controller/lang/pagetitle_lang_' . LANG . '.php');
//Database Configuration
include_once('config/database.php');
//Common Functions without DATABASE / TABLES involved
include_once('controller/core/global_SQLifunctions.php');
include_once('controller/core/global_functions.php');
include_once('controller/core/custom_function.php');
include_once('controller/core/custom_view_function.php');
include_once('controller/core/sql_functions_customer.php');
//Validate API Calls to 3rd Party Links
//SQL codes for quick operations
include_once('controller/core/sql_functions.php');
//Can be used for generating Reports
include_once('controller/core/report_functions.php');
//validation auto enabler
include_once('controller/validation/validation.class.inc');
include_once('controller/validation/messagepopup.class.inc');
//Common Breadcrumb
include_once('controller/core/breadcrumb.class.inc');

if ($validationCLASS != NULL) {
    include_once('controller/validation/validationjs.class.inc');
    include_once('controller/validation/error.class.inc');
    //page-auto-gen-codinator
    include_once('controller/validation/' . $validationCLASS . '.class.inc');
}
