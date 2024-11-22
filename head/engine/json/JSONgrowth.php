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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `growth_id`, `unlockgrowth_heading`, `unlockgrowth_heading_hindi`, `unlockgrowth_title`, `unlockgrowth_hindi_title`, `unlockgrowth_image`, `status` FROM `unlock_growth` WHERE deleted = '0'  ORDER BY growth_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$growth_id = $row["growth_id"];
	$unlockgrowth_heading = $row["unlockgrowth_heading"];
	$unlockgrowth_heading_hindi = $row["unlockgrowth_heading_hindi"];
	$unlockgrowth_title = $row["unlockgrowth_title"];
	$unlockgrowth_hindi_title = $row["unlockgrowth_hindi_title"];
	$unlockgrowth_image = $row["unlockgrowth_image"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"unlockgrowth_heading": "' . $unlockgrowth_heading . '",';
	$datas .= '"unlockgrowth_heading_hindi": "' . $unlockgrowth_heading_hindi . '",';
	$datas .= '"unlockgrowth_title": "' . $unlockgrowth_title . '",';
	$datas .= '"unlockgrowth_hindi_title": "' . $unlockgrowth_hindi_title . '",';
	$datas .= '"unlockgrowth_image": "' . $unlockgrowth_image . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $growth_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
