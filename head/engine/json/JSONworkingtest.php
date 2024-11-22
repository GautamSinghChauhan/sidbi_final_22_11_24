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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `workingtest_id`, `workingtest_title`, `workingtest_title_hindi`, `workingtest_content`, `workingtest_content_hindi`, `workingtest_image`, `workingtest_link`,  `status` FROM `workingtest` WHERE deleted = '0'  ORDER BY workingtest_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$workingtest_id = $row["workingtest_id"];
	$workingtest_title = $row["workingtest_title"];
	$workingtest_title_hindi = $row["workingtest_title_hindi"];
	$workingtest_content = $row["workingtest_content"];
	$workingtest_content_hindi = $row["workingtest_content_hindi"];
	$workingtest_image = $row["workingtest_image"];
	$workingtest_link = $row["workingtest_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"workingtest_title": "' . $workingtest_title . '",';
	$datas .= '"workingtest_title_hindi": "' . $workingtest_title_hindi . '",';
	$datas .= '"workingtest_content": "' . $workingtest_content . '",';
	$datas .= '"workingtest_content_hindi": "' . $workingtest_content_hindi . '",';
	$datas .= '"workingtest_image": "' . $workingtest_image . '",';
	$datas .= '"workingtest_link": "' . $workingtest_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $workingtest_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
