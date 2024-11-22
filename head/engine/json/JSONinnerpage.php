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

$counter = '0';
echo "{";
echo '"data":[';

$list_innerpage_datas = sqlQUERY_LABEL("SELECT `innerpage_ID`, `innerpage_title`, `innerpage_content`, `innerpage_title_hindi` ,`innerpage_content_hindi`,`status` FROM `js_innerpages` WHERE deleted = '0' ORDER BY innerpage_ID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_innerpage_list = sqlNUMOFROW_LABEL($list_innerpage_datas);

while ($row = sqlFETCHARRAY_LABEL($list_innerpage_datas)) :

	$counter++;
	$innerpage_ID = $row["innerpage_ID"];
//ENGLISH
	$innerpage_title = $row["innerpage_title"];
	$innerpage_title = html_entity_decode($innerpage_title);
	$innerpage_title = preg_replace('/\s\s+/', '\n\n', $innerpage_title);
	$innerpage_title = html_entity_decode($innerpage_title);

//HINDI
	$innerpage_title_hindi = $row["innerpage_title_hindi"];
	$innerpage_title_hindi = html_entity_decode($innerpage_title_hindi);
	$innerpage_title_hindi = preg_replace('/\s\s+/', '\n\n', $innerpage_title_hindi);
	$innerpage_title_hindi = html_entity_decode($innerpage_title_hindi);

// Concatenate both English and Hindi titles
$combined_title = "<b>English </b>- ". $innerpage_title . "<br/> <br />" . "<b>Hindi </b>- " . $innerpage_title_hindi;
$status = $row['status'];

	$datas .= "{";
	$datas .= '"count": "' . $counter . '",';
	$datas .= '"innerpage_title": "' . $combined_title . '",';
	$datas .= '"status": "' . $status . '",';
	$datas .= '"modify": "' . $innerpage_ID . '"';
	$datas .= " },";
endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";