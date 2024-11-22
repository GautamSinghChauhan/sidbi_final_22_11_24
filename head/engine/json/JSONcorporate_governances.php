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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT corporate_governances.corporate_governances_id, 
corporate_governances.corporate_governances_title, corporate_governances.corporate_governances_date,  corporate_governances.filename, corporate_governances_translations.title,
corporate_governances.status FROM corporate_governances INNER JOIN corporate_governances_translations ON 
corporate_governances.corporate_governances_id = corporate_governances_translations.corporate_governances_id  AND 
corporate_governances.deleted = '0' AND corporate_governances_translations.deleted = '0'  ORDER BY 
corporate_governances.corporate_governances_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $corporate_governances_id = $row["corporate_governances_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $corporate_governances_title = htmlspecialchars_decode($row["corporate_governances_title"]);
    $corporate_governances_title_hindi = htmlspecialchars_decode($row["title"]);
    $corporate_governances_date = dateformat_datepicker($row['corporate_governances_date']);

    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $corporate_governances_title = strlen($corporate_governances_title) > 30 ? substr($corporate_governances_title, 0, 30) . "..." : $corporate_governances_title;
    //     $corporate_governances_title_hindi = mb_strlen($corporate_governances_title_hindi) > 30 ? mb_substr($corporate_governances_title_hindi, 0, 30) . "..." : $corporate_governances_title_hindi;

    // }

    if ($get_configured_lang == 'EN') {
        $title = $corporate_governances_title; 
    } elseif ($get_configured_lang == 'HI') {
        $title = $corporate_governances_title_hindi;
    } else {
        $title = $corporate_governances_title;
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $corporate_governances_remarks_hindi = str_replace('<br>', '', $corporate_governances_remarks_hindi);
    // $corporate_governances_remarks_hindi = str_replace('<br />', '', $corporate_governances_remarks_hindi);

    // $corporate_governances_url = 'corporate_governancesarchived/corporate_governancesdetails/' . convertSEOURL($title);

    $data[] = [
        "count" => $counter,
        "title" => $title,
        "corporate_governances_title_eng" => $corporate_governances_title,
        "corporate_governances_title_hindi" => $corporate_governances_title_hindi,
        "filename" => $filename,
        "corporate_governances_date" => $corporate_governances_date,
        "status" => $status,
        "modify" => $corporate_governances_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
