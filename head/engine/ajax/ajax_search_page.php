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
include_once('../../jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST
    if ($_GET['type'] == 'search') :
        $val = $_POST['val'];
        $result = [];

        // Check if any of the queries returned results
        if (stripos("careers", $val) !== false) :
            $result['response'] = 'careers';
        elseif (stripos("tenders", $val) !== false) :
            $result['response'] = 'tenders';
        elseif (stripos("press releases", $val) !== false || stripos($val, "release") !== false) :
            $result['response'] = 'press-releases';
        else :
            // No match found
            $result['error'] = 'No matching results found.';
        endif;
        echo json_encode($result);
        exit;
    endif;
endif;
