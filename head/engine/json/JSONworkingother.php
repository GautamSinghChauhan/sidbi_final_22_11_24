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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `workingother_id`, `workingother_title`, `workingother_title_hindi`, `workingother_name`, `workingother_name_hindi`, `workingother_image`, `workingother_link`,  `status` FROM `workingother` WHERE deleted = '0'  ORDER BY workingother_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$workingother_id = $row["workingother_id"];
	$workingother_title = $row["workingother_title"];
	$workingother_title_hindi = $row["workingother_title_hindi"];
	$workingother_name = $row["workingother_name"];
	$workingother_name_hindi = $row["workingother_name_hindi"];
	$workingother_image = $row["workingother_image"];
	$workingother_link = $row["workingother_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"workingother_title": "' . $workingother_title . '",';
	$datas .= '"workingother_title_hindi": "' . $workingother_title_hindi . '",';
	$datas .= '"workingother_name": "' . $workingother_name . '",';
	$datas .= '"workingother_name_hindi": "' . $workingother_name_hindi . '",';
	$datas .= '"workingother_image": "' . $workingother_image . '",';
	$datas .= '"workingother_link": "' . $workingother_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $workingother_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
