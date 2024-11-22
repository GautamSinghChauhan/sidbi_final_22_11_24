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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT tenders.tender_id, tenders.`tender_url`, tender_translations.tender_id, tenders.tender_title, tender_translations.title, tenders.tender_date, tenders.tender_last_date, tenders.tender_remarks, tender_translations.remarks, tenders.status FROM tenders INNER JOIN tender_translations ON tenders.tender_id = tender_translations.tender_id  WHERE tenders.`tender_last_date` > CURRENT_DATE() AND tenders.deleted = '0' AND tender_translations.deleted = '0' ORDER BY `tenders`.`tender_date` DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $tender_id = $row["tender_id"];
    $status = $row["status"];
    $tender_title = html_entity_decode(html_entity_decode(html_entity_decode($row["tender_title"])));
    $tender_title_hindi = base64_decode($row["title"]);
    $tender_date = dateformat_datepicker($row['tender_date']);
    $tender_last_date = dateformat_datepicker($row['tender_last_date']);
    $tender_remarks = htmlspecialchars_decode($row['tender_remarks']);
    $tender_remarks_hindi = base64_decode($row['remarks']);
    $tender_url = $row["tender_url"];
    $tender_title = filterInvalidUtf8($tender_title);
    $tender_remarks = filterInvalidUtf8($tender_remarks);
    $tender_title_hindi = filterInvalidUtf8($tender_title_hindi);
    $tender_remarks_hindi = filterInvalidUtf8($tender_remarks_hindi);


    if ($show != 'frontend') {
        // Display the first 30 characters
        $tender_title = strlen($tender_title) > 130 ? substr($tender_title, 0, 130) . "..." : $tender_title;
        $tender_title_hindi = mb_strlen($tender_title_hindi) > 130 ? mb_substr($tender_title_hindi, 0, 130) . "..." : $tender_title_hindi;
        $tender_remarks = strlen($tender_remarks) > 130 ? substr($tender_remarks, 0, 130) . "..." : $tender_remarks;
        $tender_remarks_hindi = mb_strlen($tender_remarks_hindi) > 130 ? mb_substr($tender_remarks_hindi, 0, 30) . "..." : $tender_remarks_hindi;
    }

    if ($get_configured_lang == 'EN') {
        $title = $tender_title;
        $remarks = $tender_remarks;
    } elseif ($get_configured_lang == 'HI') {
        $title = $tender_title_hindi;
        $remarks = $tender_remarks_hindi;
    } else {
        $title = $tender_title;
        $remarks = $tender_remarks;
    }

    $remarks = str_replace('<br>', '', $remarks);
    $remarks = str_replace('<br />', '', $remarks);
    $tender_remarks_hindi = str_replace('<br>', '', $tender_remarks_hindi);
    $tender_remarks_hindi = str_replace('<br />', '', $tender_remarks_hindi);

    $tender_url = 'tenders/tenderarchived/tenderdetails/' . ($tender_url);

    $data[] = [
        "count" => $counter,
        "tender_title" => $title,
        "tender_title_eng" => $tender_title,
        "tender_title_hindi" => $tender_title_hindi,
        "tender_date" => $tender_date,
        "tender_last_date" => $tender_last_date,
        "tender_remarks" => $remarks,
        "tender_remarks_hindi" => $tender_remarks_hindi,
        "tender_url" => $tender_url,
        "status" => $status,
        "modify" => $tender_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
