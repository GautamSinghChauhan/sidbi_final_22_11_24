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

    if ($_GET['type'] == 'show' && isset($_GET["menu_ID"]) && !empty($_GET["menu_ID"])) :

        $options = [];

        $menu_ID = $_GET['menu_ID'];

     
        $selected_query = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title` FROM `js_megamenu` WHERE `menu_for` = '$menu_ID' and `menu_type` = '1' and `deleted` = '0'") or die("#1-getCOURSE: UNABLE_TO_GET_DATA: " . sqlERROR_LABEL());

        if (sqlNUMOFROW_LABEL($selected_query) > 0) :
            while ($fetch_data  = sqlFETCHARRAY_LABEL($selected_query)) :
                $parent_id = $fetch_data["parent_id"];
                $menu_english_title = $fetch_data["menu_english_title"];

                $options[] = [
                    "value" => addslashes($fetch_data['menu_ID']),
                    "text" => addslashes($fetch_data['menu_english_title'])
                ];
            endwhile;
        else :
            $options[] = [
                "value" => '',
                "text" => "No records found"
            ];
        endif;

        header('Content-Type: application/json');
        echo json_encode($options);
    endif;
else :
    echo "Request Ignored";
endif;