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
$list_machineryproduct_datas = sqlQUERY_LABEL("SELECT `machineryproduct_id`, `machineryproduct_title`, `machineryproduct_title_hindi`, `machineryproduct_tab`, `machineryproduct_tab_hindi`, `machineryproduct_key`, `machineryproduct_key_hindi`, `machineryproduct_eligibility`, `machineryproduct_eligibility_hindi`,  `status` FROM `machineryproduct` where deleted = '0' order by machineryproduct_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_machineryproduct_list = sqlNUMOFROW_LABEL($list_machineryproduct_datas);

while ($row = sqlFETCHARRAY_LABEL($list_machineryproduct_datas)) :
	$counter++;
	$machineryproduct_id = $row["machineryproduct_id"];
	$machineryproduct_tab = $row['machineryproduct_tab'];
	$machineryproduct_tab_hindi = $row['machineryproduct_tab_hindi'];
	

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"machineryproduct_tab": "' . $machineryproduct_tab . '",';
	$datas .= '"machineryproduct_tab_hindi": "' . $machineryproduct_tab_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $machineryproduct_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
