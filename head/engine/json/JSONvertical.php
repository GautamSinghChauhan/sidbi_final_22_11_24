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

//conditioning
if (!empty($show)) :
	$showcondition = "and `status`='$show'";
endif;

$counter = '0';
echo "{";
echo '"data":[';
$list_vertical_datas = sqlQUERY_LABEL("SELECT `vertical_id`, `vertical_leadership`, `vertical_leadership_hindi`, `vertical_name`, `vertical_name_hindi`, `vertical_contact`, `vertical_email`, `status` FROM `vertical` where deleted = '0' order by vertical_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_vertical_list = sqlNUMOFROW_LABEL($list_vertical_datas);

while ($row = sqlFETCHARRAY_LABEL($list_vertical_datas)) :
	$counter++;
	$vertical_id = $row["vertical_id"];
	$vertical_leadership = $row['vertical_leadership'];
	$vertical_leadership_hindi = $row['vertical_leadership_hindi'];
	$vertical_name = $row['vertical_name'];
	$vertical_name_hindi = $row['vertical_name_hindi'];
	$vertical_email = $row['vertical_email'];
	$vertical_contact = $row['vertical_contact'];



	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"vertical_leadership": "' . $vertical_leadership . '",';
	$datas .= '"vertical_leadership_hindi": "' . $vertical_leadership_hindi . '",';
	$datas .= '"vertical_name": "' . $vertical_name . '",';
	$datas .= '"vertical_name_hindi": "' . $vertical_name_hindi . '",';
	$datas .= '"vertical_email": "' . $vertical_email . '",';
	$datas .= '"vertical_contact": "' . $vertical_contact . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $vertical_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
