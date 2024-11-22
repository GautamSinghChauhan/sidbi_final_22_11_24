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

$list_informationunder_banner_datas = sqlQUERY_LABEL("SELECT `informationunder_id`, `informationunder_provision`, `informationunder_provision_hindi`, `informationunder_detail`, `informationunder_detail_hindi`, `informationunder_sno`,  `status` FROM `informationunder` WHERE deleted = '0' ORDER BY informationunder_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($list_informationunder_banner_datas)) {
    $counter++;
    $informationunder_id = $row["informationunder_id"];
    $informationunder_provision = html_entity_decode(html_entity_decode($row['informationunder_provision']));
    $informationunder_provision_hindi = html_entity_decode(html_entity_decode($row['informationunder_provision_hindi']));
    $informationunder_detail = html_entity_decode(html_entity_decode($row['informationunder_detail']));
    $informationunder_detail_hindi = html_entity_decode(html_entity_decode($row['informationunder_detail_hindi']));
    $informationunder_sno = html_entity_decode(html_entity_decode($row['informationunder_sno']));
    $status = $row['status'];

    $dataArray[] = [
        "count" => $counter,
        "informationunder_provision" => $informationunder_provision,
        "informationunder_provision_hindi" => $informationunder_provision_hindi,
        "informationunder_detail" => $informationunder_detail,
        "informationunder_detail_hindi" => $informationunder_detail_hindi,
        "informationunder_snoa" => $informationunder_snoa,
        "status" => $status,
        "modify" => $informationunder_id
    ];
}

$output = ["data" => $dataArray];


echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
