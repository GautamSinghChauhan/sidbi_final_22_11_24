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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `cipos_doc_id`, `year`, `document_title_english`, `document_title_hindi`, `document_name`,`status` FROM `cipos_orders_document` ORDER BY cipos_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$cipos_doc_id = $row["cipos_doc_id"];
	$year = $row['year'];
	$document_title_english = $row['document_title_english'];
	$document_title_hindi = $row['document_title_hindi'];
	$document_name = $row['document_name'];
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"document_title_english": "' . $document_title_english . '",';
	$datas .= '"document_title_hindi": "' . $document_title_hindi . '",';
	$datas .= '"year": "' . $year . '",';
	$datas .= '"document_name": "' . $document_name . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $cipos_doc_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
