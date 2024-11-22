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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT investor_grievances.investor_grievances_id, investor_grievances.investor_grievances_title, investor_grievances.investor_grievances_date,  investor_grievances.filename, investor_grievances_translations.title, investor_grievances.status FROM investor_grievances INNER JOIN investor_grievances_translations ON investor_grievances.investor_grievances_id = investor_grievances_translations.investor_grievances_id  AND investor_grievances.deleted = '0' AND investor_grievances_translations.deleted = '0'  ORDER BY investor_grievances.investor_grievances_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $investor_grievances_id = $row["investor_grievances_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $investor_grievances_title = htmlspecialchars_decode($row["investor_grievances_title"]);
    $investor_grievances_title_hindi = htmlspecialchars_decode($row["title"]);
    $investor_grievances_date = dateformat_datepicker($row['investor_grievances_date']);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $investor_grievances_title = strlen($investor_grievances_title) > 30 ? substr($investor_grievances_title, 0, 30) . "..." : $investor_grievances_title;
    //     $investor_grievances_title_hindi = mb_strlen($investor_grievances_title_hindi) > 30 ? mb_substr($investor_grievances_title_hindi, 0, 30) . "..." : $investor_grievances_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $investor_grievances_title;
  
    } elseif ($language == 'hi') {
        $title = $investor_grievances_title_hindi;
       
    } else {
        $title = $investor_grievances_title;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $investor_grievances_remarks_hindi = str_replace('<br>', '', $investor_grievances_remarks_hindi);
    // $investor_grievances_remarks_hindi = str_replace('<br />', '', $investor_grievances_remarks_hindi);

    // $investor_grievances_url = 'investor_grievancesarchived/investor_grievancesdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "investor_grievances_title" => $title,
        "title" => $investor_grievances_title_hindi,
        "investor_grievances_date" => $investor_grievances_date,
        "filename" => $filename,
        "status" => $status,
        "modify" => $investor_grievances_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
