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
$search = $_GET['search'];
$sql = "SELECT 
tender_title AS tenderTitle, 
tender_id AS tenderId,
tender_title_hindi AS hindi,
tender_date AS date,
NULL AS careerTitle,
NULL AS careerId,
NULL AS pressreleaseTitle,
NULL AS pressreleaseId
FROM 
tenders 
WHERE 
tender_title LIKE '%$search%' AND deleted='0'

UNION 

SELECT 
NULL AS tenderTitle,
NULL AS tenderId,
career_title_hindi AS hindi,
career_start_date AS date,
career_title AS careerTitle, 
career_id AS careerId,
NULL AS pressreleaseTitle,
NULL AS pressreleaseId
FROM 
careers 
WHERE 
career_title LIKE '%$search%' AND deleted='0'

UNION 

SELECT 
NULL AS tenderTitle,
NULL AS tenderId,
pressrelease_title_hindi AS hindi,
pressrelease_date AS date,
NULL AS careerTitle,
NULL AS careerId,
pressrelease_title AS pressreleaseTitle, 
pressrelease_id AS pressreleaseId
FROM 
pressreleases 
WHERE 
pressrelease_title LIKE '%$search%' AND deleted='0'
";
$list_aboutcontent_datas = sqlQUERY_LABEL($sql) or die("#1-Unable to get records:" . sqlERROR_LABEL());
$count_aboutcontent_list = sqlNUMOFROW_LABEL($list_aboutcontent_datas);

while ($row = sqlFETCHARRAY_LABEL($list_aboutcontent_datas)) :
    $counter++;
    if ($row["careerTitle"] != "") :
        $search_title = htmlspecialchars_decode($row["careerTitle"]);
        $search_title_hindi = base64_decode($row["hindi"]);

    elseif ($row["tenderTitle"] != "") :
        $search_title = htmlspecialchars_decode($row["tenderTitle"]);
        $search_title_hindi = base64_decode($row["hindi"]);

    elseif ($row["pressreleaseTitle"] != "") :
        $search_title = htmlspecialchars_decode($row["pressreleaseTitle"]);
        $search_title_hindi = base64_decode($row["hindi"]);

    endif;
    $search_title = filterInvalidUtf8($search_title);
    $search_title_hindi = filterInvalidUtf8($search_title_hindi);



    if ($show != 'frontend') {
        // Display the first 30 characters
        $search_title = strlen($search_title) > 30 ? substr($search_title, 0, 30) . "..." : $search_title;
        $search_title_hindi = mb_strlen($search_title_hindi) > 30 ? mb_substr($search_title_hindi, 0, 30) . "..." : $search_title_hindi;
    }

    if ($get_configured_lang == 'EN') {
        $title = $search_title;
    } elseif ($get_configured_lang == 'HI') {
        $title = $search_title_hindi;
    } else {
        $title = $search_title;
    }

    if ($row["careerId"] != "") :
        $id = $row["careerId"];
        $url = str_replace(" ", "-", $title);
        $search_title = "<a href='" . SEOURL . "careers/careerarchived/careerdetails/$url'>$title</a>";
    elseif ($row["tenderId"] != "") :
        $id = $row["tenderId"];
        $url = str_replace(" ", "-", $title);
        $search_title = "<a href='" . SEOURL . "tenders/tenderarchived/tenderdetails/$url'>$title</a>";
    elseif ($row["pressreleaseId"] != "") :
        $id = $row["pressreleaseId"];
        $search_title = "<a href='" . SEOURL . "pressrelease-doc.php?id=$id'>$title</a>";
    endif;

    $data[] = [
        "count" => $counter,
        "title" => $search_title,
        "date" => date("d/m/Y", strtotime($row['date']))
    ];

endwhile;

$response = [
    "data" => $data
];

echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
