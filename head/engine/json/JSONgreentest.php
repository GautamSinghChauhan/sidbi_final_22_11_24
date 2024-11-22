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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `greentest_id`, `greentest_title`, `greentest_title_hindi`, `greentest_content`, `greentest_content_hindi`, `greentest_image`, `greentest_link`,  `status` FROM `greentest` WHERE deleted = '0'  ORDER BY greentest_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$greentest_id = $row["greentest_id"];
	$greentest_title = $row["greentest_title"];
	$greentest_title_hindi = $row["greentest_title_hindi"];
	$greentest_content = $row["greentest_content"];
	$greentest_content_hindi = $row["greentest_content_hindi"];
	$greentest_image = $row["greentest_image"];
	$greentest_link = $row["greentest_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"greentest_title": "' . $greentest_title . '",';
	$datas .= '"greentest_title_hindi": "' . $greentest_title_hindi . '",';
	$datas .= '"greentest_content": "' . $greentest_content . '",';
	$datas .= '"greentest_content_hindi": "' . $greentest_content_hindi . '",';
	$datas .= '"greentest_image": "' . $greentest_image . '",';
	$datas .= '"greentest_link": "' . $greentest_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $greentest_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
