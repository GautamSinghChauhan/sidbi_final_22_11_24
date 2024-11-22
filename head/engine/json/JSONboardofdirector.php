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
$list_boardofdirector_datas = sqlQUERY_LABEL("SELECT `boardofdirector_ID`, `director_image`, `director_name`, `director_shortdescription`,  `director_description`,  `director_name_hindi`, `director_shortdescription_hindi`,  `director_description_hindi`,  `status` FROM `js_boardofdirector` where deleted = '0' order by boardofdirector_ID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_boardofdirector_list = sqlNUMOFROW_LABEL($list_boardofdirector_datas);

while ($row = sqlFETCHARRAY_LABEL($list_boardofdirector_datas)) :
	$counter++;
	$boardofdirector_ID = $row["boardofdirector_ID"];
	$director_image = $row['director_image'];
	$director_name = html_entity_decode($row['director_name']);
	$director_shortdescription = html_entity_decode($row['director_shortdescription']);
	$director_description = html_entity_decode($row['director_description']);
	$director_name_hindi = html_entity_decode($row['director_name_hindi']);
	$director_shortdescription_hindi = html_entity_decode($row['director_shortdescription_hindi']);
	$director_description_hindi = html_entity_decode($row['director_description_hindi']);
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"director_image": "' . $director_image . '",';
	$datas .= '"director_name": "' . $director_name . '",';
	$datas .= '"director_shortdescription": "' . $director_shortdescription . '",';
	// $datas .= '"director_description": "' . $director_description . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $boardofdirector_ID . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
