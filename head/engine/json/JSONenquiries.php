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
include_once('../../jackus.php');


if ($name != '' && $name != '0') :
	$filter_by_name = " `name` = '$name' and";
endif;
if ($email != '' && $email != '0') :
	$filter_by_email = " `email` = '$email' and";
endif;

// if ($mobilenumber != '' && $mobilenumber != '0') :
// 	$filter_by_mobile = " `mobile_number` = '$mobilenumber' and";
// endif;

if ($since_from != '' && $since_to != '') {
	$since_to = dateformat_database($since_to);
	$since_from = dateformat_database($since_from);
	$filter_date = " DATE(`createdon`) between  '$since_from' and '$since_to' and ";
}

$counter = '0';
echo "{";
echo '"data":[';

$list_enquires_form = sqlQUERY_LABEL("SELECT `enquiryform_ID`, `name`, `email` , `mobile_number`, `location`, `need_for`, `qunatumofassitancesought`, `description`, `createdon`, `status` FROM `js_enquiryform` WHERE {$filter_by_name} {$filter_by_mobile} {$filter_by_email} {$filter_date} deleted = '0' ORDER BY `enquiryform_ID` DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_pressrelease_list = sqlNUMOFROW_LABEL($list_enquires_form);

while ($row = sqlFETCHARRAY_LABEL($list_enquires_form)) :
	$counter++;
	$enquiryform_ID  = $row["enquiryform_ID"];
	$name  = $row["name"];
	$email = $row['email'];
	$mobile_number = $row['mobile_number'];
	$location = $row['location'];
	$need_for = getENQUIRYFORM_NEEDFOR_LIST($row['need_for'], 'label');
	$qunatumofassitancesought = $row['qunatumofassitancesought'];
	$createdon = date('d/m/Y h:i A', strtotime($row['createdon']));
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"createdon": "' . $createdon . '",';
	$datas .= '"name": "' . $name . '",';
	$datas .= '"mobile_number": "' . $mobile_number . '",';
	$datas .= '"email": "' . $email . '",';
	$datas .= '"need_for": "' . $need_for . '",';
	$datas .= '"qunatumofassitancesought": "' . $qunatumofassitancesought . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $enquiryform_ID  . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
