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
if (!empty($show)) :
	$showcondition = "and `status`='$show'";
endif;

$counter = '0';
echo "{";
echo '"data":[';
$list_regional_datas = sqlQUERY_LABEL("SELECT `regional_id`, `regional_location`, `regional_location_hindi`, `regional_name`, `regional_name_hindi`, `regional_contact`, `regional_email`, `regional_address`, `regional_address_hindi`,  `regional_state`, `regional_state_hindi`, `status` FROM `regional` where deleted = '0' order by regional_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_regional_list = sqlNUMOFROW_LABEL($list_regional_datas);

while ($row = sqlFETCHARRAY_LABEL($list_regional_datas)) :
	$counter++;
	$regional_id = $row["regional_id"];
	$regional_location = $row['regional_location'];
	$regional_location_hindi = $row['regional_location_hindi'];
	$regional_name = $row['regional_name'];
	$regional_name_hindi = $row['regional_name_hindi'];
	$regional_email = $row['regional_email'];
	$regional_contact = $row['regional_contact'];
	$regional_address = $row['regional_address'];
	$regional_address_hindi = $row['regional_address_hindi'];
	$regional_state = $row['regional_state'];
	$regional_state_hindi = $row['regional_state_hindi'];

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"regional_location": "' . $regional_location . '",';
	$datas .= '"regional_location_hindi": "' . $regional_location_hindi . '",';
	$datas .= '"regional_name": "' . $regional_name . '",';
	$datas .= '"regional_name_hindi": "' . $regional_name_hindi . '",';
	$datas .= '"regional_email": "' . $regional_email . '",';
	$datas .= '"regional_contact": "' . $regional_contact . '",';
	$datas .= '"regional_address": "' . $regional_address . '",';
	$datas .= '"regional_address_hindi": "' . $regional_address_hindi . '",';
	$datas .= '"regional_state": "' . $regional_state . '",';
	$datas .= '"regional_state_hindi": "' . $regional_state_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $regional_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
