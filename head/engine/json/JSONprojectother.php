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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `projectother_id`, `projectother_title`, `projectother_title_hindi`, `projectother_name`, `projectother_name_hindi`, `projectother_image`, `projectother_link`,  `status` FROM `projectother` WHERE deleted = '0'  ORDER BY projectother_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$projectother_id = $row["projectother_id"];
	$projectother_title = $row["projectother_title"];
	$projectother_title_hindi = $row["projectother_title_hindi"];
	$projectother_name = $row["projectother_name"];
	$projectother_name_hindi = $row["projectother_name_hindi"];
	$projectother_image = $row["projectother_image"];
	$projectother_link = $row["projectother_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"projectother_title": "' . $projectother_title . '",';
	$datas .= '"projectother_title_hindi": "' . $projectother_title_hindi . '",';
	$datas .= '"projectother_name": "' . $projectother_name . '",';
	$datas .= '"projectother_name_hindi": "' . $projectother_name_hindi . '",';
	$datas .= '"projectother_image": "' . $projectother_image . '",';
	$datas .= '"projectother_link": "' . $projectother_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $projectother_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
