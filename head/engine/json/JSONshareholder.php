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
$list_aboutcontent_datas = sqlQUERY_LABEL("SELECT shareholders.shareholder_id, shareholder_translations.shareholder_id, shareholders.shareholder_title, shareholders.status, shareholder_translations.title, shareholders.no_of_shares_held, shareholders.holding_percentage FROM shareholders INNER JOIN shareholder_translations ON shareholders.shareholder_id=shareholder_translations.shareholder_id AND shareholders.deleted = '0' AND shareholder_translations.deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);
while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    $shareholder_id = $row["shareholder_id"];
    $status = $row["status"];
    $shareholder_title = htmlspecialchars_decode($row["shareholder_title"]);
    $shareholder_title_hindi = htmlspecialchars_decode($row["title"]);
    $no_of_shares_held = $row['no_of_shares_held'];
    $holding_percentage = $row['holding_percentage'];
  if ($status== '0'){
    $status_label = 'Inactive';
  }
  else{
    $status_label = 'Active';
  }
    // if ($show != 'frontend') {
    //     // Display the first 30 characters
    //     $shareholder_title = strlen($shareholder_title) > 30 ? substr($shareholder_title, 0, 30) . "..." : $shareholder_title;
    //     $shareholder_title_hindi = mb_strlen($shareholder_title_hindi) > 30 ? mb_substr($shareholder_title_hindi, 0, 30) . "..." : $shareholder_title_hindi;
    
    // }


    if ($get_configured_lang == 'EN') {
      $title = $shareholder_title;
  } elseif ($get_configured_lang == 'HI') {
      $title = $shareholder_title_hindi;
  } else {
      $title = $shareholder_title;
  }

    
  
    $data[] = [
        "count" => $counter,
        "title" => $title,
        "shareholder_title_eng" => $shareholder_title,
        "shareholder_title_hindi" => $shareholder_title_hindi,
        "no_of_shares_held" => $no_of_shares_held,
        "holding_percentage" => $holding_percentage,
        "shareholder_url" => $shareholder_url,
        "status" => $status_label,
        "modify" => $shareholder_id
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
