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
$list_greenproduct_datas = sqlQUERY_LABEL("SELECT `greenproduct_id`, `greenproduct_title`, `greenproduct_title_hindi`, `greenproduct_tab`, `greenproduct_tab_hindi`, `greenproduct_key`, `greenproduct_key_hindi`, `greenproduct_eligibility`, `greenproduct_eligibility_hindi`,  `status` FROM `greenproduct` where deleted = '0' order by greenproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_greenproduct_list = sqlNUMOFROW_LABEL($list_greenproduct_datas);

while ($row = sqlFETCHARRAY_LABEL($list_greenproduct_datas)) :
	$counter++;
	$greenproduct_id = $row["greenproduct_id"];
	$greenproduct_tab = $row['greenproduct_tab'];
	$greenproduct_tab_hindi = $row['greenproduct_tab_hindi'];
	

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"greenproduct_tab": "' . $greenproduct_tab . '",';
	$datas .= '"greenproduct_tab_hindi": "' . $greenproduct_tab_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $greenproduct_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
