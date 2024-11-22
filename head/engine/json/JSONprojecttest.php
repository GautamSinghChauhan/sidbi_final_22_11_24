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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `projecttest_id`, `projecttest_title`, `projecttest_title_hindi`, `projecttest_content`, `projecttest_content_hindi`, `projecttest_image`, `projecttest_link`,  `status` FROM `projecttest` WHERE deleted = '0'  ORDER BY projecttest_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$projecttest_id = $row["projecttest_id"];
	$projecttest_title = $row["projecttest_title"];
	$projecttest_title_hindi = $row["projecttest_title_hindi"];
	$projecttest_content = $row["projecttest_content"];
	$projecttest_content_hindi = $row["projecttest_content_hindi"];
	$projecttest_image = $row["projecttest_image"];
	$projecttest_link = $row["projecttest_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"projecttest_title": "' . $projecttest_title . '",';
	$datas .= '"projecttest_title_hindi": "' . $projecttest_title_hindi . '",';
	$datas .= '"projecttest_content": "' . $projecttest_content . '",';
	$datas .= '"projecttest_content_hindi": "' . $projecttest_content_hindi . '",';
	$datas .= '"projecttest_image": "' . $projecttest_image . '",';
	$datas .= '"projecttest_link": "' . $projecttest_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $projecttest_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';