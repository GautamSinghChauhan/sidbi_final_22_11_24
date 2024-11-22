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
$list_financials_datas = sqlQUERY_LABEL("SELECT `missionandvision_ID`, `mission_title`, `mission_content`, `vision_title`,  `vision_content`, `status` FROM `missionandvision` where deleted = '0' order by missionandvision_ID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_financials_list = sqlNUMOFROW_LABEL($list_financials_datas);

while ($row = sqlFETCHARRAY_LABEL($list_financials_datas)) :
	$counter++;
	$missionandvision_ID = $row["missionandvision_ID"];
	$mission_title = $row['mission_title'];
	$mission_content = $row['mission_content'];
	$vision_title = $row['vision_title'];
	$vision_content = $row['vision_content'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"mission_title": "' . $mission_title . '",';
	$datas .= '"mission_content": "' . $mission_content . '",';
	$datas .= '"vision_title": "' . $vision_title . '",';
	$datas .= '"vision_content": "' . $vision_content . '",';

	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $missionandvision_ID . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
