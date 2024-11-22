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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `videos_id`, `videos_title`, `videos_title_hindi`, `videos_image`, `videos_link`, `status` FROM `videos` WHERE deleted = '0'  ORDER BY videos_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$videos_id = $row["videos_id"];
	$videos_title = $row["videos_title"];
	$videos_title_hindi = $row["videos_title_hindi"];
	$videos_image = $row["videos_image"];
	$videos_link = $row["videos_link"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"videos_title": "' . $videos_title . '",';
	$datas .= '"videos_title_hindi": "' . $videos_title_hindi . '",';
	$datas .= '"videos_image": "' . $videos_image . '",';
	$datas .= '"videos_link": "' . $videos_link . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $videos_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
