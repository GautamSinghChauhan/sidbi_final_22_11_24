<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2010-2023 Touchmark Descience Pvt Ltd
*
*/

include_once('../../jackus.php');
$tender_document_session_id = session_id();

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'add') :

        $response = [];
        $errors = [];

        $tender_document_type_id = $_POST['tender_document_type_id'];
        $tender_document_language_id = $_POST['tender_document_language_id'];
        $hidden_ID = $_POST['hidden_ID'];

        if ($tender_document_language_id == 1) :
            $culture = 'en';
        elseif ($tender_document_language_id == 2) :
            $culture = 'hi';
        endif;

        if (isset($_FILES['upload_document']['name'])) :
            $upload_dir = '../../../uploads/tenders/';
            $fileName = $_FILES["upload_document"]["name"];
            $fileInfo = pathinfo($fileName);
            $fileExtension = $fileInfo["extension"];
            $file_type = $_FILES['upload_document']['type'];
            $file_name = $fileName;
            $file_temp_loc = $_FILES['upload_document']['tmp_name'];
            $file_error_msg = $_FILES['upload_document']['error'];
            $file_size = $_FILES['upload_document']['size'];
            $move_file = move_uploaded_file($file_temp_loc, $upload_dir . $file_name);
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            if ($move_file) :

                $arrFields = array('`tender_session_id`', '`tender_id`', '`tender_document_language_id`', '`tender_document_type`', '`culture`', '`tender_document_name`', '`createdby`', '`status`');
                $arrValues = array("$tender_document_session_id", "$hidden_ID", "$tender_document_language_id", "$tender_document_type_id", "$culture", "$file_name", "$logged_user_id", "1");

                if (sqlACTIONS("INSERT", "js_tender_documents", $arrFields, $arrValues, '')) :
                    $response['result'] = true;
                else :
                    $response['result'] = false;
                endif;

            endif;
        endif;

        echo json_encode($response);

    endif;

else :
    echo "Request Ignored";
endif;
