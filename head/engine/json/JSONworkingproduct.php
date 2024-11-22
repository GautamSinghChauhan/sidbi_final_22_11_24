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
$list_workingproduct_datas = sqlQUERY_LABEL("SELECT `workingproduct_id`, `workingproduct_title`, `workingproduct_title_hindi`, `workingproduct_tab`, `workingproduct_tab_hindi`, `workingproduct_key`, `workingproduct_key_hindi`, `workingproduct_eligibility`, `workingproduct_eligibility_hindi`,  `status` FROM `workingproduct` where deleted = '0' order by workingproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_workingproduct_list = sqlNUMOFROW_LABEL($list_workingproduct_datas);

while ($row = sqlFETCHARRAY_LABEL($list_workingproduct_datas)) :
	$counter++;
	$workingproduct_id = $row["workingproduct_id"];
	$workingproduct_tab = $row['workingproduct_tab'];
	$workingproduct_tab_hindi = $row['workingproduct_tab_hindi'];
	

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"workingproduct_tab": "' . $workingproduct_tab . '",';
	$datas .= '"workingproduct_tab_hindi": "' . $workingproduct_tab_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $workingproduct_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
