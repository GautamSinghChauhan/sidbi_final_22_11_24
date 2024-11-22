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
$list_financials_datas = sqlQUERY_LABEL("SELECT `overview_ID`, `overview_title`, `overview_description`, `overview_image`, `status` FROM `overview` where deleted = '0' order by overview_ID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_financials_list = sqlNUMOFROW_LABEL($list_financials_datas);

while ($row = sqlFETCHARRAY_LABEL($list_financials_datas)) :
	$counter++;
	$overview_ID = $row["overview_ID"];
	$overview_title = $row['overview_title'];
	$overview_description = $row['overview_description'];
	$overview_image = $row['overview_image'];
	$status = $row["status"];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"overview_title": "' . $overview_title . '",';
	$datas .= '"overview_description": "' . $overview_description . '",';
	$datas .= '"overview_image": "' . $overview_image . '",';

	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $overview_ID . '"';
	$datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
