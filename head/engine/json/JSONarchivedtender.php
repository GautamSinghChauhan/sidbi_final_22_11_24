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

$current_DATETIME = date('Y-m-d H:i:s');

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT tenders.tender_id, `tenders`.`tender_url`, tender_translations.tender_id, tenders.tender_title, tender_translations.title, tenders.tender_date, tenders.tender_last_date, tenders.tender_remarks, tender_translations.remarks, tenders.status FROM tenders INNER JOIN tender_translations ON tenders.tender_id = tender_translations.tender_id  WHERE tenders.`tender_last_date` < '$current_DATETIME' AND tenders.deleted = '0' AND tender_translations.deleted = '0' ORDER BY tenders.`tender_date` DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);

while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $tender_id = $row["tender_id"];
    $status = $row["status"];
    $tender_title = html_entity_decode(html_entity_decode($row["tender_title"]));
    $tender_title_hindi = base64_decode($row["title"]);
    $tender_url = $row["tender_url"];
    $tender_date = dateformat_datepicker($row['tender_date']);
    $tender_last_date = dateformat_datepicker($row['tender_last_date']);
    $tender_remarks = html_entity_decode(html_entity_decode($row['tender_remarks']));
    $tender_remarks_hindi = base64_decode($row['remarks']);

    $tender_title = filterInvalidUtf8($tender_title);
    $tender_remarks = filterInvalidUtf8($tender_remarks);
    $tender_title_hindi = filterInvalidUtf8($tender_title_hindi);
    $tender_remarks_hindi = filterInvalidUtf8($tender_remarks_hindi);

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

    $tender_title_hindi = preg_replace('/\s+/', ' ', $tender_title_hindi);
    $tender_title_hindi = preg_replace('/\s\s+/', ' ', $tender_title_hindi);
    $tender_title_hindi = str_replace('"', "", $tender_title_hindi);
    $tender_title_hindi = str_replace("\\", '', $tender_title_hindi);

    $tender_remarks_hindi = preg_replace('/\s+/', ' ', $tender_remarks_hindi);
    $tender_remarks_hindi = preg_replace('/\s\s+/', ' ', $tender_remarks_hindi);
    $tender_remarks_hindi = str_replace('"', "", $tender_remarks_hindi);
    $tender_remarks_hindi = str_replace("\\", '', $tender_remarks_hindi);

    $tender_url_link = base64_encode('tenderarchived/tenderdetails/' . ($tender_url));

    $data[] = [
        "count" => $counter,
        "tender_title" => $title,
        "tender_title_hindi" => $tender_title_hindi,
        "tender_date" => $tender_date,
        "tender_last_date" => $tender_last_date,
        "tender_remarks" => $remarks,
        "tender_remarks_hindi" => $tender_remarks_hindi,
        "tender_url" => $tender_url_link,
        "status" => $status,
        "modify" => $tender_id,
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
