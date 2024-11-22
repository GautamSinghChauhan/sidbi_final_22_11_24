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
extract($_REQUEST);
include_once('jackus.php');

//CRON JOBS RUN ON EVERY MONTH ON FIRST
$gensetting_fy_starts_from = 04;

$get_current_year = date('Y');
$get_next_year = date('Y', strtotime('+1 year'));

$fy_starting = $get_current_year . '-' . $gensetting_fy_starts_from . '-01';
$get_previous_month_format = date("Y-m-d", strtotime('-1 month', strtotime($fy_starting)));
$get_previous_month = date('m', strtotime($get_previous_month_format));
$fy_ending = $get_next_year . '-' . $get_previous_month . '-31';
$fy_label = $get_current_year . '-' . $get_next_year;
echo 'FY YEAR STARTING - ' . $fy_starting;
echo "<br>";
echo 'FY YEAR ENDING - ' . $fy_ending;
echo "<br>";
echo 'FY YEAR LABEL - ' . $get_current_year . '-' . $get_next_year;
echo "<br>";

// Insert New Financial year
$list_fy_data = sqlQUERY_LABEL("SELECT `fy_id` FROM `financial_year` where deleted = '0' and status = '1' and `fy_label` = '$fy_label'") or die("#1-Unable to get PRODUCT CATEGORY:" . sqlERROR_LABEL());
$count_fy_list = sqlNUMOFROW_LABEL($list_fy_data);

if ($count_fy_list == 0) :
    //Insert query
    $arrFields = array('`fy_starting`', '`fy_ending`', '`fy_label`', '`createdby`', '`status`');

    $arrValues = array("$fy_starting", "$fy_ending", "$fy_label", "$logged_user_id", "1");

    if (sqlACTIONS("INSERT", "financial_year", $arrFields, $arrValues, '')) :
        echo " Record Inserted for FY - $fy_label ";
        echo "<br>";
    endif;
else :
    echo " Record Already Inserted for this FY - $fy_label ";
    echo "<br>";
endif;
