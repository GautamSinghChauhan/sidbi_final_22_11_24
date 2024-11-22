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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT sectoral.sectoral_id, sectoral.sectoral_title,  sectoral.sectoral_description, sectoral.sectoral_year, sectoral.filename, sectoral_translations.title,  sectoral_translations.description, sectoral.status FROM sectoral INNER JOIN sectoral_translations ON sectoral.sectoral_id = sectoral_translations.sectoral_id  AND sectoral.deleted = '0' AND sectoral_translations.deleted = '0'  ORDER BY sectoral.sectoral_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $sectoral_id = $row["sectoral_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $sectoral_year = $row["sectoral_year"];
    $sectoral_title = htmlspecialchars_decode($row["sectoral_title"]);
    $sectoral_title_hindi = htmlspecialchars_decode($row["title"]);
    $sectoral_description = htmlspecialchars_decode($row["sectoral_description"]);
    $sectoral_description_hindi = htmlspecialchars_decode($row["description"]);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $sectoral_title = strlen($sectoral_title) > 30 ? substr($sectoral_title, 0, 30) . "..." : $sectoral_title;
    //     $sectoral_title_hindi = mb_strlen($sectoral_title_hindi) > 30 ? mb_substr($sectoral_title_hindi, 0, 30) . "..." : $sectoral_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $sectoral_title;
        $description = $sectoral_description;
  
    } elseif ($language == 'hi') {
        $title = $sectoral_title_hindi;
        $description = $sectoral_description_hindi;
       
    } else {
        $title = $sectoral_title;
        $description = $sectoral_description;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $sectoral_remarks_hindi = str_replace('<br>', '', $sectoral_remarks_hindi);
    // $sectoral_remarks_hindi = str_replace('<br />', '', $sectoral_remarks_hindi);

    // $sectoral_url = 'sectoralarchived/sectoraldetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "sectoral_title" => $title,
        "title" => $sectoral_title_hindi,
        "sectoral_description" => $description,
        "description" => $sectoral_description_hindi,
        "sectoral_year" => $sectoral_year,
        "filename" => $filename,
        "status" => $status,
        "modify" => $sectoral_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
