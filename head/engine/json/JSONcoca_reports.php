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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT coca_reports.coca_reports_id, coca_reports.coca_reports_title, coca_reports.coca_reports_date,  coca_reports.filename, coca_reports_translations.title, coca_reports.status FROM coca_reports INNER JOIN coca_reports_translations ON coca_reports.coca_reports_id = coca_reports_translations.coca_reports_id  AND coca_reports.deleted = '0' AND coca_reports_translations.deleted = '0'  ORDER BY coca_reports.coca_reports_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $coca_reports_id = $row["coca_reports_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $coca_reports_title = htmlspecialchars_decode($row["coca_reports_title"]);
    $coca_reports_title_hindi = htmlspecialchars_decode($row["title"]);
    $coca_reports_date = dateformat_datepicker($row['coca_reports_date']);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $coca_reports_title = strlen($coca_reports_title) > 30 ? substr($coca_reports_title, 0, 30) . "..." : $coca_reports_title;
    //     $coca_reports_title_hindi = mb_strlen($coca_reports_title_hindi) > 30 ? mb_substr($coca_reports_title_hindi, 0, 30) . "..." : $coca_reports_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $coca_reports_title;
  
    } elseif ($language == 'hi') {
        $title = $coca_reports_title_hindi;
       
    } else {
        $title = $coca_reports_title;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $coca_reports_remarks_hindi = str_replace('<br>', '', $coca_reports_remarks_hindi);
    // $coca_reports_remarks_hindi = str_replace('<br />', '', $coca_reports_remarks_hindi);

    // $coca_reports_url = 'coca_reportsarchived/coca_reportsdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "coca_reports_title" => $title,
        "title" => $coca_reports_title_hindi,
        "coca_reports_date" => $coca_reports_date,
        "filename" => $filename,
        "status" => $status,
        "modify" => $coca_reports_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
