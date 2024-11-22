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

// $list_home_banner_datas = sqlQUERY_LABEL("SELECT `cipos_id`, `title_eng`, `title_hindi`, `year`, `status` FROM `cipos_orders` WHERE deleted = '0' ORDER BY cipos_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `cipos_id`, `title_eng`, `title_hindi`, `year`, `status` FROM `cipos_orders` WHERE deleted = '0' ORDER BY cipos_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

// SELECT cipos_orders.cipos_id, cipos_order_translations.cipos_id, cipos_orders.title_eng, cipos_order_translations.title, cipos_orders.status
// FROM cipos_orders
// INNER JOIN cipos_order_translations ON cipos_orders.cipos_id = cipos_order_translations.cipos_id;
// SELECT careers.career_id, career_translations.career_id, careers.career_title, career_translations.title, careers.career_start_date, careers.career_expiry_date, careers.status FROM careers INNER JOIN career_translations ON careers.career_id = career_translations.career_id  WHERE careers.`career_expiry_date` > CURDATE() AND careers.deleted = '0' AND career_translations.deleted = '0' ORDER BY careers.career_id DESC

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$cipos_id = $row["cipos_id"];
	$title_eng = $row['title_eng'];
	$title_hindi = $row['title_hindi'];
	$year = $row['year'];
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"title_eng": "' . $title_eng . '",';
	$datas .= '"title_hindi": "' . $title_hindi . '",';
	$datas .= '"year": "' . $year . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $cipos_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
