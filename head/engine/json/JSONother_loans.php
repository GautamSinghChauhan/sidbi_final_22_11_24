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


$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT other_loans.other_loans_id, other_loans.other_loans_title,  other_loans.filename, other_loans_translations.title, other_loans.status FROM other_loans INNER JOIN other_loans_translations ON other_loans.other_loans_id = other_loans_translations.other_loans_id  AND other_loans.deleted = '0' AND other_loans_translations.deleted = '0'  ORDER BY other_loans.other_loans_id DESC;") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $other_loans_id = $row["other_loans_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $other_loans_title = htmlspecialchars_decode($row["other_loans_title"]);
    $other_loans_title_hindi = base64_decode($row["title"]);
    $other_loans_title_hindi = filterInvalidUtf8($other_loans_title_hindi);

    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $other_loans_title = strlen($other_loans_title) > 30 ? substr($other_loans_title, 0, 30) . "..." : $other_loans_title;
    //     $other_loans_title_hindi = mb_strlen($other_loans_title_hindi) > 30 ? mb_substr($other_loans_title_hindi, 0, 30) . "..." : $other_loans_title_hindi;
    
    // }

    if ($get_configured_lang == 'EN') {
        $title = $other_loans_title; 
    } elseif ($get_configured_lang == 'HI') {
        $title = $other_loans_title_hindi;
    } else {
        $title = $other_loans_title;
    }


    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $other_loans_remarks_hindi = str_replace('<br>', '', $other_loans_remarks_hindi);
    // $other_loans_remarks_hindi = str_replace('<br />', '', $other_loans_remarks_hindi);

    // $other_loans_url = 'other_loansarchived/other_loansdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "title" => $title,
        "other_loans_title_eng" => $other_loans_title,
        "other_loans_title_hindi" => $other_loans_title_hindi,
        "filename" => $filename,
        "status" => $status,
        "modify" => $other_loans_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
