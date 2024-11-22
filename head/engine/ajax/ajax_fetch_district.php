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
require_once('../../jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'selected_state' && isset($_POST["STATE_ID"]) && !empty($_POST["STATE_ID"])) :

        $options = [];

        $STATE_ID = $_POST['STATE_ID'];

        $selected_query = sqlQUERY_LABEL("SELECT `id`, `name` FROM `js_districts` WHERE `state_id` = '$STATE_ID' and `status` = '1' ORDER BY `name` ASC") or die("#1-getDISTRICT: UNABLE_TO_GET_DATA: " . sqlERROR_LABEL());

        if (sqlNUMOFROW_LABEL($selected_query) > 0) :
            while ($fetch_data  = sqlFETCHARRAY_LABEL($selected_query)) :
                $name = $fetch_data["name"];

                $options[] = [
                    "value" => $fetch_data['id'],
                    "text" => $fetch_data['name']
                ];
            endwhile;
        else :
            $options[] = [
                "value" => '',
                "text" => "No district found"
            ];
        endif;

        header('Content-Type: application/json');
        echo json_encode($options);

    endif;

else :
    echo "Request Ignored";
endif;
