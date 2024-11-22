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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `machinerytest_id`, `machinerytest_title`, `machinerytest_title_hindi`, `machinerytest_content`, `machinerytest_content_hindi`, `machinerytest_image`, `machinerytest_link`,  `status` FROM `machinerytest` WHERE deleted = '0'  ORDER BY machinerytest_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$machinerytest_id = $row["machinerytest_id"];
	$machinerytest_title = $row["machinerytest_title"];
	$machinerytest_title_hindi = $row["machinerytest_title_hindi"];
	$machinerytest_content = $row["machinerytest_content"];
	$machinerytest_content_hindi = $row["machinerytest_content_hindi"];
	$machinerytest_image = $row["machinerytest_image"];
	$machinerytest_link = $row["machinerytest_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"machinerytest_title": "' . $machinerytest_title . '",';
	$datas .= '"machinerytest_title_hindi": "' . $machinerytest_title_hindi . '",';
	$datas .= '"machinerytest_content": "' . $machinerytest_content . '",';
	$datas .= '"machinerytest_content_hindi": "' . $machinerytest_content_hindi . '",';
	$datas .= '"machinerytest_image": "' . $machinerytest_image . '",';
	$datas .= '"machinerytest_link": "' . $machinerytest_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $machinerytest_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
