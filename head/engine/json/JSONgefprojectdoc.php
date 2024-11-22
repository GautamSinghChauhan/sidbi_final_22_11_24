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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `gef_doc_id`, `gef_id`, `gef_doc_name`, `gef_doc_name_hin`, `status` FROM `js_gef_documents` ORDER BY gef_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$gef_doc_id = $row["gef_doc_id"];
	$gef_doc_name = $row['gef_doc_name'];
	$gef_doc_name_hin = $row['gef_doc_name_hin'];
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"gef_doc_name_hin": "' . $gef_doc_name_hin . '",';
	$datas .= '"gef_doc_name": "' . $gef_doc_name . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $gef_doc_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
