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

ini_set('display_errors', 1);
ini_set('log_errors', 1);

$counter = 0;
$data = [];

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT impactassessment.impactassessment_id, impactassessment.impactassessment_title,  impactassessment.impactassessment_description, impactassessment.impactassessment_year, impactassessment.filename, impactassessment_translations.title,  impactassessment_translations.description, impactassessment.status FROM impactassessment INNER JOIN impactassessment_translations ON impactassessment.impactassessment_id = impactassessment_translations.impactassessment_id  AND impactassessment.deleted = '0' AND impactassessment_translations.deleted = '0'  ORDER BY impactassessment.impactassessment_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $impactassessment_id = $row["impactassessment_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $impactassessment_year = $row["impactassessment_year"];
    $impactassessment_title = htmlspecialchars_decode($row["impactassessment_title"]);
    $impactassessment_title_hindi = htmlspecialchars_decode($row["title"]);
    $impactassessment_description = htmlspecialchars_decode($row["impactassessment_description"]);
    $impactassessment_description_hindi = htmlspecialchars_decode($row["description"]);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $impactassessment_title = strlen($impactassessment_title) > 30 ? substr($impactassessment_title, 0, 30) . "..." : $impactassessment_title;
    //     $impactassessment_title_hindi = mb_strlen($impactassessment_title_hindi) > 30 ? mb_substr($impactassessment_title_hindi, 0, 30) . "..." : $impactassessment_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $impactassessment_title;
        $description = $impactassessment_description;
  
    } elseif ($language == 'hi') {
        $title = $impactassessment_title_hindi;
        $description = $impactassessment_description_hindi;
       
    } else {
        $title = $impactassessment_title;
        $description = $impactassessment_description;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $impactassessment_remarks_hindi = str_replace('<br>', '', $impactassessment_remarks_hindi);
    // $impactassessment_remarks_hindi = str_replace('<br />', '', $impactassessment_remarks_hindi);

    // $impactassessment_url = 'impactassessmentarchived/impactassessmentdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "impactassessment_title" => $title,
        "title" => $impactassessment_title_hindi,
        "impactassessment_description" => $description,
        "description" => $impactassessment_description_hindi,
        "impactassessment_year" => $impactassessment_year,
        "filename" => $filename,
        "status" => $status,
        "modify" => $impactassessment_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
