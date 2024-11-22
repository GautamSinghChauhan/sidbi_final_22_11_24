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

$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT reservation_roster.reservation_roster_id, reservation_roster.reservation_roster_title,  reservation_roster.filename, reservation_roster_translations.title, reservation_roster.status FROM reservation_roster INNER JOIN reservation_roster_translations ON reservation_roster.reservation_roster_id = reservation_roster_translations.reservation_roster_id  AND reservation_roster.deleted = '0' AND reservation_roster_translations.deleted = '0'  ORDER BY reservation_roster.reservation_roster_id DESC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $reservation_roster_id = $row["reservation_roster_id"];
    $status = $row["status"];
    $filename = $row["filename"];
    $reservation_roster_title = htmlspecialchars_decode($row["reservation_roster_title"]);
    $reservation_roster_title_hindi = htmlspecialchars_decode($row["title"]);
    $reservation_roster_title = html_entity_decode(html_entity_decode($row["reservation_roster_title"]));
    $reservation_roster_title_hindi = html_entity_decode(html_entity_decode($row["title"]));

    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $reservation_roster_title = strlen($reservation_roster_title) > 30 ? substr($reservation_roster_title, 0, 30) . "..." : $reservation_roster_title;
    //     $reservation_roster_title_hindi = mb_strlen($reservation_roster_title_hindi) > 30 ? mb_substr($reservation_roster_title_hindi, 0, 30) . "..." : $reservation_roster_title_hindi;

    // }

    if ($language == 'en') {
        $title = $reservation_roster_title;
    } elseif ($language == 'hi') {
        $title = $reservation_roster_title_hindi;
    } else {
        $title = $reservation_roster_title;
    }

    // $remarks = str_replace('<br>', '', $remarks);
    // $remarks = str_replace('<br />', '', $remarks);
    // $reservation_roster_remarks_hindi = str_replace('<br>', '', $reservation_roster_remarks_hindi);
    // $reservation_roster_remarks_hindi = str_replace('<br />', '', $reservation_roster_remarks_hindi);

    // $reservation_roster_url = 'reservation_rosterarchived/reservation_rosterdetails/' . convertSEOURL($title);

    $data[] = [
        "count" => $counter,
        "reservation_roster_title" => $title,
        "title" => $reservation_roster_title_hindi,
        "filename" => $filename,
        "status" => $status,
        "modify" => $reservation_roster_id,
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
