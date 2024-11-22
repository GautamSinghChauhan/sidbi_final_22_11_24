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

$list_subsidiary_banner_datas = sqlQUERY_LABEL("SELECT `subsidiary_id`, `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiaryimpact_title`, `subsidiaryimpact_title_hindi`, `subsidiaryimpact_description`, `subsidiaryimpact_description_hindi`, `subsidiary_image`, `subsidiary_link`, `status` FROM `subsidiary` WHERE deleted = '0' ORDER BY subsidiary_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($list_subsidiary_banner_datas)) {
    $counter++;
    $subsidiary_id = $row["subsidiary_id"];
    $subsidiary_title = html_entity_decode(html_entity_decode($row['subsidiary_title']));
    $subsidiary_title_hindi = html_entity_decode($row['subsidiary_title_hindi']);
    $subsidiary_description = html_entity_decode(html_entity_decode($row['subsidiary_description']));
    $subsidiary_description_hindi = html_entity_decode(html_entity_decode($row['subsidiary_description_hindi']));
    $subsidiaryimpact_title = html_entity_decode($row['subsidiaryimpact_title']);
    $subsidiaryimpact_title_hindi = html_entity_decode($row['subsidiaryimpact_title_hindi']);
    $subsidiaryimpact_description = html_entity_decode($row['subsidiaryimpact_description']);
    $subsidiaryimpact_description_hindi = html_entity_decode($row['subsidiaryimpact_description_hindi']);
    $subsidiary_link = $row['subsidiary_link'];
    $subsidiary_image = $row['subsidiary_image'];
    $status = $row['status'];

    $dataArray[] = [
        "count" => $counter,
        "subsidiary_title" => $subsidiary_title,
        "subsidiary_title_hindi" => $subsidiary_title_hindi,
        "subsidiary_description" => $subsidiary_description,
        "subsidiary_description_hindi" => $subsidiary_description_hindi,
        "subsidiaryimpact_title" => $subsidiaryimpact_title,
        "subsidiaryimpact_title_hindi" => $subsidiaryimpact_title_hindi,
        "subsidiaryimpact_description" => $subsidiaryimpact_description,
        "subsidiaryimpact_description_hindi" => $subsidiaryimpact_description_hindi,
        "subsidiary_link" => $subsidiary_link,
        "subsidiary_image" => $subsidiary_image,
        "status" => $status,
        "modify" => $subsidiary_id
    ];
}

$output = ["data" => $dataArray];

echo json_encode($output);
