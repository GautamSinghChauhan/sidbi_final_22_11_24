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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT rating.rating_id, rating.rating_title, rating.rating_subtitle,  rating.rating_agency,  rating.rating_outlook, rating.rating_date,  rating.filename, rating_translations.title,  rating_translations.subtitle,   rating_translations.agency,  rating_translations.outlook, rating.status FROM rating INNER JOIN rating_translations ON rating.rating_id = rating_translations.rating_id  AND rating.deleted = '0' AND rating_translations.deleted = '0'  ORDER BY rating.rating_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $rating_id = $row["rating_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $rating_title = htmlspecialchars_decode($row["rating_title"]);
    $rating_title_hindi = htmlspecialchars_decode($row["title"]);
    $rating_agency = htmlspecialchars_decode($row["rating_agency"]);
    $rating_agency_hindi = htmlspecialchars_decode($row["agency"]);
    $rating_outlook = htmlspecialchars_decode($row["rating_outlook"]);
    $rating_outlook_hindi = htmlspecialchars_decode($row["outlook"]);
    $rating_subtitle = htmlspecialchars_decode($row["rating_subtitle"]);
    $rating_subtitle_hindi = htmlspecialchars_decode($row["subtitle"]);
    $rating_date = dateformat_datepicker($row['rating_date']);
  
  
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $rating_title = strlen($rating_title) > 30 ? substr($rating_title, 0, 30) . "..." : $rating_title;
    //     $rating_title_hindi = mb_strlen($rating_title_hindi) > 30 ? mb_substr($rating_title_hindi, 0, 30) . "..." : $rating_title_hindi;
    
    // }

    if ($language == 'en') {
        $title = $rating_title;
        $subtitle = $rating_subtitle;
        $outlook = $rating_outlook;
        $agency = $rating_agency;
  
    } elseif ($language == 'hi') {
        $title = $rating_title_hindi;
        $subtitle = $rating_subtitle_hindi;
        $outlook = $rating_outlook_hindi;
        $agency = $rating_agency_hindi;
       
    } else {
        $title = $rating_title;
        $subtitle = $rating_subtitle;
        $outlook = $rating_outlook;
        $agency = $rating_agency;
     
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $rating_remarks_hindi = str_replace('<br>', '', $rating_remarks_hindi);
    // $rating_remarks_hindi = str_replace('<br />', '', $rating_remarks_hindi);

    // $rating_url = 'ratingarchived/ratingdetails/' . convertSEOURL($title);
  
    $data[] = [
        "count" => $counter,
        "rating_title" => $title,
        "title" => $rating_title_hindi,
        "rating_subtitle" => $subtitle,
        "subtitle" => $rating_subtitle_hindi,
        "rating_agency" => $agency,
        "agency" => $rating_agency_hindi,
        "rating_outlook" => $outlook,
        "outlook" => $rating_outlook_hindi,
        "rating_date" => $rating_date,
        "filename" => $filename,
        "status" => $status,
        "modify" => $rating_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
