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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT  `fintech_id`, `fintech_description`, `fintech_description_hindi`, `createdby`, `createdon`, `updatedon`, `status`, `deleted` FROM `js_fintech`") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $fintech_id  = $row["fintech_id"];
    $status = $row["status"];
    // $msme_title = $row["msme_title"];
    // $msme_hindi_title = $row["msme_hindi_title"];


    $fintech_description = html_entity_decode(html_entity_decode($row['fintech_description']));
    $fintech_description_hindi = html_entity_decode(html_entity_decode($row['fintech_description_hindi']));
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $other_loans_title = strlen($other_loans_title) > 30 ? substr($other_loans_title, 0, 30) . "..." : $other_loans_title;
    //     $other_loans_title_hindi = mb_strlen($other_loans_title_hindi) > 30 ? mb_substr($other_loans_title_hindi, 0, 30) . "..." : $other_loans_title_hindi;
    
    // }

    // if ($language == 'en') {
    //     $title = $other_loans_title;
  
    // } elseif ($language == 'hi') {
    //     $title = $other_loans_title_hindi;
       
    // } else {
    //     $title = $other_loans_title;
     
    // }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $other_loans_remarks_hindi = str_replace('<br>', '', $other_loans_remarks_hindi);
    // $other_loans_remarks_hindi = str_replace('<br />', '', $other_loans_remarks_hindi);

    // $other_loans_url = 'other_loansarchived/other_loansdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "fintech_description" => $fintech_description,
        "fintech_description_hindi" => $fintech_description_hindi,
     
        "status" => $status,
        "modify" => $fintech_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);