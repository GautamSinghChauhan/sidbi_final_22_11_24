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

// // conditioning
// $showcondition = !empty($show) ? "AND `status`='$show'" : '';

 $counter = 0;
echo '{';
echo '"data":[';

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `impact_id`, `impactinitiatives_title`, `impactinitiatives_hindi_title`, `impactinitiatives_description`, `impactinitiatives_description_hindi`, `impactinitiatives_button1`, `impactinitiatives_image`,`status` FROM `js_impact_initiatives` WHERE deleted = '0'  ORDER BY impact_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$impact_id = $row["impact_id"];
	$impactinitiatives_title = $row['impactinitiatives_title'];
	$impactinitiatives_hindi_title = $row['impactinitiatives_hindi_title'];
	$impactinitiatives_description = $row['impactinitiatives_description'];
	$impactinitiatives_description_hindi = $row['impactinitiatives_description_hindi'];
	$impactinitiatives_button1 = $row['impactinitiatives_button1'];
	$impactinitiatives_image = $row['impactinitiatives_image'];
	$status = $row['status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"impactinitiatives_title": "' . $impactinitiatives_title . '",';
	$datas .= '"impactinitiatives_hindi_title": "' . $impactinitiatives_hindi_title . '",';
	$datas .= '"impactinitiatives_description": "' . $impactinitiatives_description . '",';
	$datas .= '"impactinitiatives_description_hindi": "' . $impactinitiatives_description_hindi . '",';
	$datas .= '"impactinitiatives_button1": "' . $impactinitiatives_button1 . '",';
	$datas .= '"impactinitiatives_image": "' . $impactinitiatives_image . '",';
	$datas .= '"status": "' . $status . '",'; // Include the status
	$datas .= '"modify": "' . $impact_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
