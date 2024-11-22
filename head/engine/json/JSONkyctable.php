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

$list_kyctable_banner_datas = sqlQUERY_LABEL("SELECT `kyctable_id`, `kyctable_feature`, `kyctable_feature_hindi`, `kyctable_notice`, `kyctable_notice_hindi`,  `status` FROM `kyctable` WHERE deleted = '0' ORDER BY kyctable_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($list_kyctable_banner_datas)) {
    $counter++;
    $kyctable_id = $row["kyctable_id"];
    $kyctable_feature = html_entity_decode(html_entity_decode($row['kyctable_feature']));
    $kyctable_feature_hindi = html_entity_decode(html_entity_decode($row['kyctable_feature_hindi']));
    $kyctable_notice = html_entity_decode(html_entity_decode($row['kyctable_notice']));
    $kyctable_notice_hindi = html_entity_decode(html_entity_decode($row['kyctable_notice_hindi']));
    $status = $row['status'];

    $dataArray[] = [
        "count" => $counter,
        "kyctable_feature" => $kyctable_feature,
        "kyctable_feature_hindi" => $kyctable_feature_hindi,
        "kyctable_notice" => $kyctable_notice,
        "kyctable_notice_hindi" => $kyctable_notice_hindi,
        "status" => $status,
        "modify" => $kyctable_id
    ];
}

$output = ["data" => $dataArray];


echo json_encode($output, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
