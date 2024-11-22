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
$data = [];

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT careers.career_id, career_translations.career_id, careers.career_title, career_translations.title, careers.career_start_date, careers.career_expiry_date, careers.status FROM careers INNER JOIN career_translations ON careers.career_id = career_translations.career_id  WHERE careers.`career_expiry_date` > CURRENT_DATE() AND careers.deleted = '0' AND career_translations.deleted = '0' ORDER BY careers.career_start_date DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);

while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $career_id = $row["career_id"];
    $status = $row["status"];

    $career_title = htmlspecialchars_decode($row["career_title"]);
    $career_title_hindi = base64_decode($row["title"]);
    $career_start_date = dateformat_datepicker($row['career_start_date']);
    $career_expiry_date = dateformat_datepicker($row['career_expiry_date']);
    $career_title = filterInvalidUtf8($career_title);
    $career_title_hindi = filterInvalidUtf8($career_title_hindi);

    if ($show != 'frontend') {
        // Display the first 30 characters
        $career_title = strlen($career_title) > 30 ? substr($career_title, 0, 30) . "..." : $career_title;
        $career_title_hindi = mb_strlen($career_title_hindi) > 30 ? mb_substr($career_title_hindi, 0, 30) . "..." : $career_title_hindi;
    }

    if ($get_configured_lang == 'EN') {
        $title = $career_title;
    } elseif ($get_configured_lang == 'HI') {
        $title = $career_title_hindi;
    } else {
        $title = $career_title;
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $career_remarks_hindi = str_replace('<br>', '', $career_remarks_hindi);
    // $career_remarks_hindi = str_replace('<br />', '', $career_remarks_hindi);

    $career_url = 'careerarchived/careerdetails/' . convertSEOURL($title);

    $data[] = [
        "count" => $counter,
        "career_title" => $title,
        "title" => $career_title_hindi,
        "career_start_date" => $career_start_date,
        "career_expiry_date" => $career_expiry_date,
        "career_url" => $career_url,
        "status" => $status,
        "modify" => $career_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
