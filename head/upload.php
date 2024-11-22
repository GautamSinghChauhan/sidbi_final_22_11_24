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
include_once('jackus.php');

$file_name = 'career translations.csv';

$csvFile = './uploads/excel_uploads/' . $file_name;
$csvFileLength = filesize($csvFile);
$csvSeparator = ",";
$handle = fopen($csvFile, 'r');
$flag = true;
$count = '';

while (($data = fgetcsv($handle, $csvFileLength, $csvSeparator)) !== FALSE) : // while for each row
  /****************************
    Checking if record is empty
   ****************************/
  if ($data[8] != '') :
    foreach ($_POST as $key => $value) :
      $data[$key] = filter($value);
    endforeach;

    $id = $data[0];
    if ($data[0] != "") :
      $count++;
      $career_id = $data[1];
      $language_id = $data[2];
      $culture = $data[3];
      $title = base64_encode($data[4]);
      $excerpt = base64_encode($data[5]);
      $content = base64_encode($data[6]);
      $url = $data[7];

      $arrFields = array('`id`', '`career_id`', '`language_id`', '`culture`', '`title`', '`excerpt`', '`content`', '`url`', '`status`');

      $arrValues = array("$id", "$career_id", "$language_id", "$culture", "$title", "$excerpt", "$content", "$url", "1");

      if (sqlACTIONS("INSERT", "career_translations", $arrFields, $arrValues, '')) :
        //success
        $result = 1;
      else :
        $result = 2;
      endif;
    endif;
  endif; //end of checking data
endwhile;

fclose($handle);
