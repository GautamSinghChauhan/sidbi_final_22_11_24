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

$list_menus = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `parent_id`, `menu_english_title`, `menu_hindi_title` ,`status` FROM `js_megamenu` WHERE deleted = '0' order by menu_ID  ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$countMENU_list = sqlNUMOFROW_LABEL($list_menus);

while ($row = sqlFETCHARRAY_LABEL($list_menus)) :
	$counter++;
	$menu_ID  = $row["menu_ID"];
	$menu_title  = html_entity_decode($row["menu_english_title"]);
	$menu_hindi_title  = html_entity_decode($row["menu_hindi_title"]);
	$menu_for = $row['menu_for'];
	$menu_for_title = getMENU_DETAILS($menu_for,'label_menu_for');
	$menu_type = $row['menu_type'];
	$parent_id = $row['parent_id'];	
	if($parent_id == '0'):
		$parent_title = 'Yes';
	else:
		$parent_title = 'No';
	endif;

	$status = $row["status"];

	$datas .= "{";
	$datas .= '"counter": "' . $counter . '",';
	$datas .= '"menu_title": "' . $menu_title . '",';
	$datas .= '"menu_for": "' . $menu_for_title . '",';
	$datas .= '"parent_title": "' . $parent_title . '",';  
	$datas .= '"status": "' . $status . '",';
    $datas .= '"modify": "' . $menu_ID  . '"';
	$datas .= " },";
endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";