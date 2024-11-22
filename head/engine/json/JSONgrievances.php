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

//conditioning
// if (!empty($show)) :
// 	$showcondition = "and `status`='$show'";
// endif;
if ($name != '' && $name != '0') :
	$filter_by_name = " `full_name` = '$name' and";
endif;

if ($companyname != '' && $companyname != '0') :
	$filter_by_companyname = " `companyname` = '$name' and";
endif;

if ($email != '' && $email != '0') :
	$filter_by_email = " `email` = '$email' and";
endif;

if ($mobilenumber != '' && $mobilenumber != '0') :
	$filter_by_mobile = " `mobile_number` = '$mobilenumber' and";
endif;

if ($since_from != '' && $since_to != '') {
	$since_to = dateformat_database($since_to);
	$since_from = dateformat_database($since_from);
	$filter_date = " DATE(`createdon`) between  '$since_from' and '$since_to' and";
}

$counter = '0';
echo "{";
echo '"data":[';

$list_grievances_form = sqlQUERY_LABEL("SELECT `grievanceform_ID`, `full_name`, `companyname`, `branch`, `customer_type`, `reasonfor_rasing_complaint`, `country_id`, `state_id`, `district_id`, `pincode`, `address`, `landline_number`, `mobile_number`, `subject`, `complaint_message`, `email`, `status`, `createdon` FROM `js_grievanceform` WHERE {$filter_by_name} {$filter_by_companyname} {$filter_by_email} {$filter_by_mobile} {$filter_date} deleted = '0' ORDER BY `grievanceform_ID` DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_pressrelease_list = sqlNUMOFROW_LABEL($list_grievances_form);

while ($row = sqlFETCHARRAY_LABEL($list_grievances_form)) :
	$counter++;
	$grievanceform_ID  = $row["grievanceform_ID"];
	$full_name  = $row["full_name"];
	$email = $row['email'];
	$companyname = $row['companyname'];
	$reasonfor_rasing_complaint = getGRIEVANCE_REASON_TYPE($row['reasonfor_rasing_complaint'], 'label');
	$createdon = date('d/m/Y h:i A', strtotime($row['createdon']));
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"createdon": "' . $createdon . '",';
	$datas .= '"full_name": "' . $full_name . '",';
	$datas .= '"companyname": "' . $companyname . '",';
	$datas .= '"email": "' . $email . '",';
	$datas .= '"reasonfor_rasing_complaint": "' . $reasonfor_rasing_complaint . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $grievanceform_ID  . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";

