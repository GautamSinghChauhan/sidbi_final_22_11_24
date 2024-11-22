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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT pressreleases.pressrelease_id, pressreleases.pressrelease_title, pressrelease_translations.title, pressreleases.pressrelease_date, pressreleases.status FROM pressreleases INNER JOIN pressrelease_translations ON pressreleases.pressrelease_id = pressrelease_translations.pressrelease_id  AND pressreleases.deleted = '0' AND pressrelease_translations.deleted = '0'  ORDER BY pressreleases.pressrelease_id DESC;") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $pressrelease_id = $row["pressrelease_id"];
    $status = $row["status"];
    $pressrelease_title = htmlspecialchars_decode($row["pressrelease_title"]);
    $pressrelease_title_hindi = base64_decode($row["title"]);
    $pressrelease_date = dateformat_datepicker($row['pressrelease_date']);
    $pressrelease_title = filterInvalidUtf8($pressrelease_title);
    $pressrelease_title_hindi = filterInvalidUtf8($pressrelease_title_hindi);

    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $pressrelease_title = strlen($pressrelease_title) > 30 ? substr($pressrelease_title, 0, 30) . "..." : $pressrelease_title;
    //     $pressrelease_title_hindi = mb_strlen($pressrelease_title_hindi) > 30 ? mb_substr($pressrelease_title_hindi, 0, 30) . "..." : $pressrelease_title_hindi;
    // }


    if ($get_configured_lang == 'HI') :

        $title = $pressrelease_title_hindi;
    else :
      
        $title = $pressrelease_title;
    endif;


    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $pressrelease_remarks_hindi = str_replace('<br>', '', $pressrelease_remarks_hindi);
    // $pressrelease_remarks_hindi = str_replace('<br />', '', $pressrelease_remarks_hindi);

    // $pressrelease_url = 'pressreleasearchived/pressreleasedetails/' . convertSEOURL($title);

    $data[] = [
        "count" => $counter,
        "title" => $title,
        "pressrelease_date" => $pressrelease_date,
        "pressrelease_url" => $pressrelease_date,
        "status" => $status,
        "modify" => $pressrelease_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
