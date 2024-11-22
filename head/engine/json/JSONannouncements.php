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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT announcements.announcements_id, announcements.announcements_title, announcements.announcements_date,  announcements.filename, announcements_translations.title, announcements.status FROM announcements INNER JOIN announcements_translations ON announcements.announcements_id = announcements_translations.announcements_id  AND announcements.deleted = '0' AND announcements_translations.deleted = '0'  ORDER BY announcements.announcements_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $announcements_id = $row["announcements_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $announcements_title = htmlspecialchars_decode($row["announcements_title"]);
    $announcements_title_hindi = htmlspecialchars_decode($row["title"]);
    $announcements_date = dateformat_datepicker($row['announcements_date']);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $announcements_title = strlen($announcements_title) > 30 ? substr($announcements_title, 0, 30) . "..." : $announcements_title;
    //     $announcements_title_hindi = mb_strlen($announcements_title_hindi) > 30 ? mb_substr($announcements_title_hindi, 0, 30) . "..." : $announcements_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $announcements_title;
  
    } elseif ($language == 'hi') {
        $title = $announcements_title_hindi;
       
    } else {
        $title = $announcements_title;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $announcements_remarks_hindi = str_replace('<br>', '', $announcements_remarks_hindi);
    // $announcements_remarks_hindi = str_replace('<br />', '', $announcements_remarks_hindi);

    // $announcements_url = 'announcementsarchived/announcementsdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "announcements_title" => $title,
        "title" => $announcements_title_hindi,
        "announcements_date" => $announcements_date,
        "filename" => $filename,
        "status" => $status,
        "modify" => $announcements_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
