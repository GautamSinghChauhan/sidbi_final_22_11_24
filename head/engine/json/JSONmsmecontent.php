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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `msme_id`, `msmecluster_title`, `msmecluster_description`, `msmecluster_hindi_title`, `msmecluster_hindi_description`, `msmecluster_image`, `msmecluster_button1`, `status` FROM `msme_cluster` WHERE deleted = '0'  ORDER BY msme_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$msme_id = $row["msme_id"];
	$msmecluster_title = $row["msmecluster_title"];
	$msmecluster_description = $row["msmecluster_description"];
	$msmecluster_hindi_title = $row["msmecluster_hindi_title"];
	$msmecluster_hindi_description = $row["msmecluster_hindi_description"];
	$msmecluster_image = $row["msmecluster_image"];
	$msmecluster_button1 = $row["msmecluster_button1"];
	$status = $row["status"];

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"msmecluster_title": "' . $msmecluster_title . '",';
	$datas .= '"msmecluster_description": "' . $msmecluster_description . '",';
	$datas .= '"msmecluster_hindi_title": "' . $msmecluster_hindi_title . '",';
	$datas .= '"msmecluster_hindi_description": "' . $msmecluster_hindi_description . '",';
	$datas .= '"msmecluster_image": "' . $msmecluster_image . '",';
	$datas .= '"msmecluster_button1": "' . $msmecluster_button1 . '",';
	$datas .= '"status": "' . $status . '",'; 
	$datas .= '"modify": "' . $msme_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
