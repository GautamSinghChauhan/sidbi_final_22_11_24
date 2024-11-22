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

$list_homeproduct_banner_datas = sqlQUERY_LABEL("SELECT `homeproduct_id`, `homeproduct_title`, `homeproduct_title_hindi`, `homeproduct_image`, `homeproduct_button1`, `homeproduct_button2`, `status` FROM `homeproduct` WHERE deleted = '0' ORDER BY homeproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_homeproduct_banner_list = sqlNUMOFROW_LABEL($list_homeproduct_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_homeproduct_banner_datas)) :
	$counter++;
	$homeproduct_id = $row["homeproduct_id"];
	$homeproduct_title = $row['homeproduct_title'];
	$homeproduct_title_hindi = $row['homeproduct_title_hindi'];
	$homeproduct_button1 = $row['homeproduct_button1'];
	$homeproduct_button2 = $row['homeproduct_button2'];
	$homeproduct_image = $row['homeproduct_image'];
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"homeproduct_title": "' . $homeproduct_title . '",';
	$datas .= '"homeproduct_title_hindi": "' . $homeproduct_title_hindi . '",';
	$datas .= '"homeproduct_button1": "' . $homeproduct_button1 . '",';
	$datas .= '"homeproduct_button2": "' . $homeproduct_button2 . '",';
	$datas .= '"homeproduct_image": "' . $homeproduct_image . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $homeproduct_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
