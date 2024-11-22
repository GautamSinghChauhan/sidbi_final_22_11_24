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

$counter = 0;
$dataArray = [];

$list_latestdevelopment_banner_datas = sqlQUERY_LABEL("SELECT `latestdevelopment_id`, `latestdevelopment_title`, `latestdevelopment_title_hindi`, `latestdevelopment_date`, `latestdevelopment_image`, `latestdevelopment_count`, `status` FROM `latestdevelopment` WHERE deleted = '0' ORDER BY latestdevelopment_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($list_latestdevelopment_banner_datas)) {
    $counter++;
    $latestdevelopment_id = $row["latestdevelopment_id"];
    $latestdevelopment_title = html_entity_decode(html_entity_decode($row['latestdevelopment_title']));
    $latestdevelopment_title_hindi = html_entity_decode($row['latestdevelopment_title_hindi']);
    $latestdevelopment_date =$row['latestdevelopment_date'];
    $latestdevelopment_count =$row['latestdevelopment_count'];
    $latestdevelopment_image = $row['latestdevelopment_image'];
    $status = $row['status'];

    $dataArray[] = [
        "count" => $counter,
        "latestdevelopment_title" => $latestdevelopment_title,
        "latestdevelopment_title_hindi" => $latestdevelopment_title_hindi,
        "latestdevelopment_image" => $latestdevelopment_image,
        "status" => $status,
        "modify" => $latestdevelopment_id,
    ];
}

$output = ["data" => $dataArray];

echo json_encode($output);

