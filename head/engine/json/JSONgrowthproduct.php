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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `growthproduct_id`, `unlockgrowthproduct_title`, `unlockgrowthproduct_hindi_title`, `unlockgrowthproduct_image`, `status` FROM `unlock_growthproduct` WHERE deleted = '0'  ORDER BY growthproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$growthproduct_id = $row["growthproduct_id"];
	$unlockgrowthproduct_title = $row["unlockgrowthproduct_title"];
	$unlockgrowthproduct_hindi_title = $row["unlockgrowthproduct_hindi_title"];
	$unlockgrowthproduct_image = $row["unlockgrowthproduct_image"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"unlockgrowthproduct_title": "' . $unlockgrowthproduct_title . '",';
	$datas .= '"unlockgrowthproduct_hindi_title": "' . $unlockgrowthproduct_hindi_title . '",';
	$datas .= '"unlockgrowthproduct_image": "' . $unlockgrowthproduct_image . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $growthproduct_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
