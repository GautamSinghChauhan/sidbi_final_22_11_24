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
$list_prayaasglance_datas = sqlQUERY_LABEL("SELECT `prayaasglance_id`, `prayaasglance_heading`, `prayaasglance_heading_hindi`, `prayaasglance_title`, `prayaasglance_title_hindi`, `prayaasglance_content`, `prayaasglance_content_hindi`, `status` FROM `prayaasglance` where deleted = '0' order by prayaasglance_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_prayaasglance_list = sqlNUMOFROW_LABEL($list_prayaasglance_datas);

while ($row = sqlFETCHARRAY_LABEL($list_prayaasglance_datas)) :
	$counter++;
	$prayaasglance_id = $row["prayaasglance_id"];
	$prayaasglance_heading = $row['prayaasglance_heading'];
	$prayaasglance_heading_hindi = $row['prayaasglance_heading_hindi'];
	$prayaasglance_title = $row['prayaasglance_title'];
	$prayaasglance_title_hindi = $row['prayaasglance_title_hindi'];
	$prayaasglance_content = $row['prayaasglance_content'];
	$prayaasglance_content_hindi = $row['prayaasglance_content_hindi'];

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"prayaasglance_heading": "' . $prayaasglance_heading . '",';
	$datas .= '"prayaasglance_heading_hindi": "' . $prayaasglance_heading_hindi . '",';
	$datas .= '"prayaasglance_title": "' . $prayaasglance_title . '",';
	$datas .= '"prayaasglance_title_hindi": "' . $prayaasglance_title_hindi . '",';
	$datas .= '"prayaasglance_content": "' . $prayaasglance_content . '",';
	$datas .= '"prayaasglance_content_hindi": "' . $prayaasglance_content_hindi . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $prayaasglance_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
