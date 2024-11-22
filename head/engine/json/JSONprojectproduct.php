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
$list_projectproduct_datas = sqlQUERY_LABEL("SELECT `projectproduct_id`, `projectproduct_title`, `projectproduct_title_hindi`, `projectproduct_tab`, `projectproduct_tab_hindi`, `projectproduct_key`, `projectproduct_key_hindi`, `projectproduct_eligibility`, `projectproduct_eligibility_hindi`,  `status` FROM `projectproduct` where deleted = '0' order by projectproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_projectproduct_list = sqlNUMOFROW_LABEL($list_projectproduct_datas);

while ($row = sqlFETCHARRAY_LABEL($list_projectproduct_datas)) :
	$counter++;
	$projectproduct_id = $row["projectproduct_id"];
	$projectproduct_tab = $row['projectproduct_tab'];
	$projectproduct_tab_hindi = $row['projectproduct_tab_hindi'];
	

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"projectproduct_tab": "' . $projectproduct_tab . '",';
	$datas .= '"projectproduct_tab_hindi": "' . $projectproduct_tab_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $projectproduct_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
