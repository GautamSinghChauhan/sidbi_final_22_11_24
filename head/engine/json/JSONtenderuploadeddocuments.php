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

if (isset($_GET['id'])) :
    $tender_id = $_GET['id'];
    $filter_by_data = " AND `tender_id` = '$tender_id' ";
elseif (isset($_GET['session_id'])) :
    $tender_session_id = $_GET['session_id'];
    $filter_by_data = " AND `tender_session_id` = '$tender_session_id' ";
endif;

echo "{";
echo '"data":[';

$list_tender_document_datas = sqlQUERY_LABEL("SELECT `tender_document_id`, `tender_id`, `tender_document_language_id`, `culture`, `tender_document_type`, `tender_document_name` FROM `js_tender_documents` WHERE `status` = '1' AND `deleted` = '0' {$filter_by_data}") or die("#1-UNABLE_TO_GET_DATA:" . sqlERROR_LABEL());
while ($row = sqlFETCHARRAY_LABEL($list_tender_document_datas)) :
    $counter++;
    $tender_document_id = $row["tender_document_id"];
    $tender_id = $row["tender_id"];
    $tender_document_language_id = $row["tender_document_language_id"];
    if ($tender_document_language_id == 1) :
        $tender_document_language_id = 'English';
    else :
        $tender_document_language_id = 'Hindi';
    endif;
    $culture = $row["culture"];
    $tender_document_type = getTENDERDOCUMENTTYPE($row["tender_document_type"], 'label');
    $tender_document_name = $row["tender_document_name"];

    $datas .= "{";
    $datas .= '"count": "' . $counter . '",';
    $datas .= '"tender_document_language_id": "' . $tender_document_language_id . '",';
    $datas .= '"tender_document_type": "' . $tender_document_type . '",';
    $datas .= '"tender_document_name": "' . $tender_document_name . '",';
    $datas .= '"modify": "' . $tender_document_id . '"';
    $datas .= " },";

endwhile;

$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
