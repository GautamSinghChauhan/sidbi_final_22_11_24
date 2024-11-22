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
$list_zonal_datas = sqlQUERY_LABEL("SELECT `zonal_id`, `zonal_office`, `zonal_office_hindi`, `zonal_name`, `zonal_name_hindi`, `zonal_contact`, `zonal_email`, `status` FROM `zonal` where deleted = '0' order by zonal_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_zonal_list = sqlNUMOFROW_LABEL($list_zonal_datas);

while ($row = sqlFETCHARRAY_LABEL($list_zonal_datas)) :
	$counter++;
	$zonal_id = $row["zonal_id"];
	$zonal_office = $row['zonal_office'];
	$zonal_office_hindi = $row['zonal_office_hindi'];
	$zonal_name = $row['zonal_name'];
	$zonal_name_hindi = $row['zonal_name_hindi'];
	$zonal_email = $row['zonal_email'];
	$zonal_contact = $row['zonal_contact'];

	
	// $director_description = $row['director_description'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"zonal_office": "' . $zonal_office . '",';
	$datas .= '"zonal_office_hindi": "' . $zonal_office_hindi . '",';
	$datas .= '"zonal_name": "' . $zonal_name . '",';
	$datas .= '"zonal_name_hindi": "' . $zonal_name_hindi . '",';
	$datas .= '"zonal_email": "' . $zonal_email . '",';
	$datas .= '"zonal_contact": "' . $zonal_contact . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $zonal_id . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
