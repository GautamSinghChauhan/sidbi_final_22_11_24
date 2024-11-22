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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT 
    FINANCIAL_REPORT.`financial_report_id`, 
    FINANCIAL_REPORT.`financial_report_title`, 
    FINANCIAL_REPORT_TRANS.`title`, 
    FINANCIAL_REPORT.`report_date`, FINANCIAL_REPORT.`status`,
    MAX(CASE WHEN FINANCIAL_DOCS.`financialreport_document_language_id` = 1 THEN FINANCIAL_DOCS.`financialreport_document_name` END) AS eng_document_name,
    MAX(CASE WHEN FINANCIAL_DOCS.`financialreport_document_language_id` = 2 THEN FINANCIAL_DOCS.`financialreport_document_name` END) AS hin_document_name
FROM  
    `financial_reports` FINANCIAL_REPORT 
LEFT JOIN 
    `financial_report_translations` FINANCIAL_REPORT_TRANS 
    ON FINANCIAL_REPORT_TRANS.`financial_report_id` = FINANCIAL_REPORT.`financial_report_id` 
LEFT JOIN 
    `js_financial_documents` FINANCIAL_DOCS 
    ON FINANCIAL_DOCS.`financial_report_id` = FINANCIAL_REPORT.`financial_report_id` 
WHERE 
    FINANCIAL_REPORT.`status` = '1' 
    AND FINANCIAL_REPORT_TRANS.`status` = '1' 
    AND FINANCIAL_REPORT.`deleted` = '0' 
    AND FINANCIAL_REPORT_TRANS.`deleted` = '0'
GROUP BY 
    FINANCIAL_REPORT.`financial_report_id`") or die("#1-UNABLE_TO_GET_FINANCIAL_RECORDS:" . sqlERROR_LABEL());

$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);

while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) {
    $counter++;
    $financial_report_id = $row["financial_report_id"];
    $financial_report_title = htmlspecialchars_decode($row["financial_report_title"]);
    $financial_report_title_hindi = htmlspecialchars_decode($row["title"]);
    $financial_report_date = dateformat_datepicker($row['report_date']);
    $status = ($row['status']);
    $eng_document_name = ($row['eng_document_name']);
    $hin_document_name = ($row['hin_document_name']);

    if ($show != 'frontend') {
        // Display the first 30 characters
        $financial_report_title = strlen($financial_report_title) > 30 ? substr($financial_report_title, 0, 30) . "..." : $financial_report_title;
        $financial_report_title_hindi = mb_strlen($financial_report_title_hindi) > 30 ? mb_substr($financial_report_title_hindi, 0, 30) . "..." : $financial_report_title_hindi;
    }

    if ($get_configured_lang == 'HI') :
        $title = $financial_report_title_hindi;
    else :
        $title = $financial_report_title;
    endif;

    $data[] = [
        "count" => $counter,
        "financial_report_title" => $title,
        "financial_report_date" => $financial_report_date,
        "financial_report_title_eng" => $financial_report_title,
        "financial_report_title_hindi" => $financial_report_title_hindi,
        "eng_document_name" => $eng_document_name,
        "hin_document_name" => $hin_document_name,
        "status" => $status,
        "modify" => $financial_report_id,

    ];
}

echo json_encode(["data" => $data]);
