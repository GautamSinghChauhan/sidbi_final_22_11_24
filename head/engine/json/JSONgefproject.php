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

$counter = '0';
echo "{";
echo '"data":[';

// echo "SELECT `gef_id`, `gef_heading_en`, `gef_heading_hin`, `gef_content_en`, `gef_content_hin`, `gef_title_eng`, `gef_title_hin`, `status` FROM `js_gefproject` WHERE deleted = '0' ORDER BY gef_id ASC";
// exit;


$list_innerpage_datas = sqlQUERY_LABEL("SELECT `gef_id`, `gef_heading_en`, `gef_heading_hin`, `gef_content_en`, `gef_content_hin`, `gef_title_eng`, `gef_title_hin`, `status` FROM `js_gefproject` WHERE deleted = '0' ORDER BY gef_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_innerpage_list = sqlNUMOFROW_LABEL($list_innerpage_datas);

// while ($row = sqlFETCHARRAY_LABEL($list_innerpage_datas)) :

// 	$counter++;
// 	$gef_id = $row["gef_id"];
// //ENGLISH
// 	$gef_heading_en = $row["gef_heading_en"];
// 	$gef_heading_en = htmlspecialchars_decode($gef_heading_en);
// 	$gef_heading_en = preg_replace('/\s\s+/', '\n\n', $gef_heading_en);
// 	$gef_heading_en = html_entity_decode($gef_heading_en);

// //HINDI
// 	$gef_heading_hin = $row["gef_heading_hin"];
// 	$gef_heading_hin = htmlspecialchars_decode($gef_heading_hin);
// 	$gef_heading_hin = preg_replace('/\s\s+/', '\n\n', $gef_heading_hin);
// 	$gef_heading_hin = html_entity_decode($gef_heading_hin);


	while ($row = sqlFETCHARRAY_LABEL($list_innerpage_datas)) :
		$counter++;
		$gef_id = $row["gef_id"];
		$gef_heading_en = $row['gef_heading_en'];
		$gef_heading_hin = $row['gef_heading_hin'];
		$gef_content_en = $row['gef_content_en'];
		$gef_content_hin = $row['gef_content_hin'];
		$gef_title_eng = $row['gef_title_eng'];
		$gef_title_hin = $row['gef_title_hin'];
		$status = $row['status'];

		$datas .= '{';
		$datas .= '"count": "' . $counter . '",';
		$datas .= '"gef_heading_en": "' . $gef_heading_en . '",';
		$datas .= '"gef_heading_hin": "' . $gef_heading_hin . '",';
		$datas .= '"gef_content_en": "' . $gef_content_en . '",';
		$datas .= '"gef_content_hin": "' . $gef_content_hin . '",';
		$datas .= '"gef_title_eng": "' . $gef_title_eng . '",';
		$datas .= '"gef_title_hin": "' . $gef_title_hin . '",';
		$datas .= '"status": "' . $status . '",';
		$datas .= '"modify": "' . $gef_id . '"';
		$datas .= ' },';
	endwhile;



$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo ']}';