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

// // conditioning
// $showcondition = !empty($show) ? "AND `status`='$show'" : '';

$counter = 0;
$dataArray = [];

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `galleries_id`, `galleries_content`, `galleries_content_hindi`, `galleries_image`, `status` FROM `galleries` WHERE deleted = '0'  ORDER BY galleries_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_home_banner_list = sqlNUMOFROW_LABEL($list_home_banner_datas);

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) {
	$counter++;
	$galleries_id = $row["galleries_id"];
	$galleries_content = html_entity_decode(html_entity_decode($row["galleries_content"]));
	$galleries_content_hindi = html_entity_decode(html_entity_decode($row["galleries_content_hindi"]));
	$galleries_image = $row["galleries_image"];
	$status = $row["status"];
	// $home_status = $row['home_status']; // Add this line to get the status
	$dataArray[] = [
        "count" => $counter,
        "galleries_content" => $galleries_content,
        "galleries_content_hindi" => $galleries_content_hindi,
        "galleries_image" => $galleries_image,
        "status" => $status,
        "modify" => $galleries_id
    ];
}

$output = ["data" => $dataArray];

echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
