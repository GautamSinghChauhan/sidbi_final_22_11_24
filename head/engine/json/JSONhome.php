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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `home_id`, `home_title`, `home_title_hindi`, `home_description`, `home_description_hindi`, `home_image`, `home_toll_number`, `home_whatsapp_number`, `home_button1`, `home_button2`, `status` FROM `home` WHERE deleted = '0' ORDER BY home_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) :
	$counter++;
	$home_id = $row["home_id"];
	$home_title = $row['home_title'];
	$home_title_hindi = $row['home_title_hindi'];
	$home_description = $row['home_description'];
	$home_description_hindi = $row['home_description_hindi'];
	$home_toll_number = $row['home_toll_number'];
	$home_whatsapp_number = $row['home_whatsapp_number'];
	$home_button1 = $row['home_button1'];
	$home_button2 = $row['home_button2'];
	$home_image = htmlspecialchars_decode($row['home_image']);
	$status = $row['status']; 

	$datas .= '{';
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"home_title": "' . $home_title . '",';
	$datas .= '"home_title_hindi": "' . $home_title_hindi . '",';
	$datas .= '"home_description": "' . $home_description . '",';
	$datas .= '"home_description_hindi": "' . $home_description_hindi . '",';
	$datas .= '"home_image": "' . $home_image . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $home_id . '"';
	$datas .= ' },';
endwhile;

$data_formatted = rtrim($datas, ",");
echo $data_formatted;
echo ']}';