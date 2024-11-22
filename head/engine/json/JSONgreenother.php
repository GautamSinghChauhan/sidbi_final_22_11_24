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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `greenother_id`, `greenother_title`, `greenother_title_hindi`, `greenother_name`, `greenother_name_hindi`, `greenother_image`, `greenother_link`,  `status` FROM `greenother` WHERE deleted = '0'  ORDER BY greenother_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$greenother_id = $row["greenother_id"];
	$greenother_title = $row["greenother_title"];
	$greenother_title_hindi = $row["greenother_title_hindi"];
	$greenother_name = $row["greenother_name"];
	$greenother_name_hindi = $row["greenother_name_hindi"];
	$greenother_image = $row["greenother_image"];
	$greenother_link = $row["greenother_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"greenother_title": "' . $greenother_title . '",';
	$datas .= '"greenother_title_hindi": "' . $greenother_title_hindi . '",';
	$datas .= '"greenother_name": "' . $greenother_name . '",';
	$datas .= '"greenother_name_hindi": "' . $greenother_name_hindi . '",';
	$datas .= '"greenother_image": "' . $greenother_image . '",';
	$datas .= '"greenother_link": "' . $greenother_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $greenother_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
