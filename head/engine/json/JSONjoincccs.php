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

$list_joincccs_banner_datas = sqlQUERY_LABEL("SELECT `joincccs_id`, `joincccs_title`, `joincccs_title_hindi`, `joincccs_link`, `joincccs_image`, `status` FROM `joincccs` WHERE deleted = '0' ORDER BY joincccs_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_joincccs_banner_list = sqlNUMOFROW_LABEL($list_joincccs_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_joincccs_banner_datas)) :
	$counter++;
	$joincccs_id = $row["joincccs_id"];
	$joincccs_title = $row['joincccs_title'];
	$joincccs_title_hindi = $row['joincccs_title_hindi'];
	$joincccs_link = $row['joincccs_link'];
	$joincccs_image = $row['joincccs_image'];
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"joincccs_title": "' . $joincccs_title . '",';
	$datas .= '"joincccs_title_hindi": "' . $joincccs_title_hindi . '",';
	$datas .= '"joincccs_link": "' . $joincccs_link . '",';
	$datas .= '"joincccs_image": "' . $joincccs_image . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $joincccs_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';
