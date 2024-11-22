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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT annual_reports.annual_reports_id, annual_reports.annual_reports_title,  annual_reports.filename, annual_reports_translations.title, annual_reports_translations.hin_filename, annual_reports.status FROM annual_reports INNER JOIN annual_reports_translations ON annual_reports.annual_reports_id = annual_reports_translations.annual_reports_id  AND annual_reports.deleted = '0' AND annual_reports_translations.deleted = '0'  ORDER BY annual_reports.annual_reports_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $annual_reports_id = $row["annual_reports_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $hin_filename = $row["hin_filename"];
    $annual_reports_title = htmlspecialchars_decode($row["annual_reports_title"]);
    $annual_reports_title_hindi = htmlspecialchars_decode($row["title"]);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $annual_reports_title = strlen($annual_reports_title) > 30 ? substr($annual_reports_title, 0, 30) . "..." : $annual_reports_title;
    //     $annual_reports_title_hindi = mb_strlen($annual_reports_title_hindi) > 30 ? mb_substr($annual_reports_title_hindi, 0, 30) . "..." : $annual_reports_title_hindi;
    
    // }

//    if ($hin_filename) {
//         $filename = $hin_filename;
//     } else {
//         $filename = $filename;
//     }

    

    if ($get_configured_lang == 'EN') {
        $title = $annual_reports_title; 
    } elseif ($get_configured_lang == 'HI') {
        $title = $annual_reports_title_hindi;
        $filename = $hin_filename;
    } else {
        $title = $annual_reports_title;
    }


    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $annual_reports_remarks_hindi = str_replace('<br>', '', $annual_reports_remarks_hindi);
    // $annual_reports_remarks_hindi = str_replace('<br />', '', $annual_reports_remarks_hindi);

    // $annual_reports_url = 'annual_reportsarchived/annual_reportsdetails/' . convertSEOURL($title);

     // Choose the appropriate filename based on availability
    

  
    $data[] = [
        "count" => $counter,
        "title" => $title,
        "annual_reports_title_eng" => $annual_reports_title,
        "annual_reports_title_hindi" => $annual_reports_title_hindi,
        "filename" => $filename,
        "status" => $status,
        "modify" => $annual_reports_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
