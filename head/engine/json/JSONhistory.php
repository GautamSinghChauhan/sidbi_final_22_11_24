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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `history_id`, `history_title`, `history_title_hindi`, `history_description`, `history_description_hindi`, `history_image`, `history_logo`, `history_year`, `status` FROM `history` WHERE deleted = '0'  ORDER BY history_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());


$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$history_id = $row["history_id"];
	$history_title = $row["history_title"];
	$history_title_hindi = $row["history_title_hindi"];
	$history_description = $row["history_description"];
	$history_description_hindi = $row["history_description_hindi"];
	$history_year = $row["history_year"];
	$history_image = $row["history_image"];
	$history_logo = $row["history_logo"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"history_title": "' . $history_title . '",';
	$datas .= '"history_title_hindi": "' . $history_title_hindi . '",';
	$datas .= '"history_description": "' . $history_description . '",';
	$datas .= '"history_description_hindi": "' . $history_description_hindi . '",';
	$datas .= '"history_year": "' . $history_year . '",';
	$datas .= '"history_image": "' . $history_image . '",';
	$datas .= '"history_logo": "' . $history_logo . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $history_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
