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

$list_home_banner_datas = sqlQUERY_LABEL("SELECT `government_id`, `government_title`, `government_title_hindi`, `government_link`, `status` FROM `government` WHERE deleted = '0'  ORDER BY government_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($list_home_banner_datas)) {
    $counter++;
    $government_id = $row["government_id"];
    $government_title = $row["government_title"];
    $government_title_hindi = $row["government_title_hindi"];
    $government_link = $row["government_link"];
    $status = $row["status"];

    $dataArray[] = [
        "count" => $counter,
        "government_title" => $government_title,
        "government_title_hindi" => $government_title_hindi,
        "government_link" => $government_link,
        "status" => $status,
        "modify" => $government_id
    ];
}

$output = ["data" => $dataArray];

echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
