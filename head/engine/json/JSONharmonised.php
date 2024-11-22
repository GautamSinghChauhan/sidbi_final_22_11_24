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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT harmonised.harmonised_id, harmonised.harmonised_title, harmonised.harmonised_date,  harmonised.filename, harmonised_translations.title, harmonised.status FROM harmonised INNER JOIN harmonised_translations ON harmonised.harmonised_id = harmonised_translations.harmonised_id  AND harmonised.deleted = '0' AND harmonised_translations.deleted = '0'  ORDER BY harmonised.harmonised_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $harmonised_id = $row["harmonised_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $harmonised_title = htmlspecialchars_decode($row["harmonised_title"]);
    $harmonised_title_hindi = htmlspecialchars_decode($row["title"]);
    $harmonised_date = dateformat_datepicker($row['harmonised_date']);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $harmonised_title = strlen($harmonised_title) > 30 ? substr($harmonised_title, 0, 30) . "..." : $harmonised_title;
    //     $harmonised_title_hindi = mb_strlen($harmonised_title_hindi) > 30 ? mb_substr($harmonised_title_hindi, 0, 30) . "..." : $harmonised_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $harmonised_title;
  
    } elseif ($language == 'hi') {
        $title = $harmonised_title_hindi;
       
    } else {
        $title = $harmonised_title;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $harmonised_remarks_hindi = str_replace('<br>', '', $harmonised_remarks_hindi);
    // $harmonised_remarks_hindi = str_replace('<br />', '', $harmonised_remarks_hindi);

    // $harmonised_url = 'harmonisedarchived/harmoniseddetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "harmonised_title" => $title,
        "title" => $harmonised_title_hindi,
        "harmonised_date" => $harmonised_date,
        "filename" => $filename,
        "status" => $status,
        "modify" => $harmonised_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
