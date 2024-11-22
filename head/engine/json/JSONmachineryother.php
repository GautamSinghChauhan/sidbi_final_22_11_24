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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `machineryother_id`, `machineryother_title`, `machineryother_title_hindi`, `machineryother_name`, `machineryother_name_hindi`, `machineryother_image`, `machineryother_link`,  `status` FROM `machineryother` WHERE deleted = '0'  ORDER BY machineryother_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$machineryother_id = $row["machineryother_id"];
	$machineryother_title = $row["machineryother_title"];
	$machineryother_title_hindi = $row["machineryother_title_hindi"];
	$machineryother_name = $row["machineryother_name"];
	$machineryother_name_hindi = $row["machineryother_name_hindi"];
	$machineryother_image = $row["machineryother_image"];
	$machineryother_link = $row["machineryother_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"machineryother_title": "' . $machineryother_title . '",';
	$datas .= '"machineryother_title_hindi": "' . $machineryother_title_hindi . '",';
	$datas .= '"machineryother_name": "' . $machineryother_name . '",';
	$datas .= '"machineryother_name_hindi": "' . $machineryother_name_hindi . '",';
	$datas .= '"machineryother_image": "' . $machineryother_image . '",';
	$datas .= '"machineryother_link": "' . $machineryother_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $machineryother_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
