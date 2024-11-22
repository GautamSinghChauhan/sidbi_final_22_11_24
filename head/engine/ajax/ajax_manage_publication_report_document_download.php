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
include_once('../../smtp_functions.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'send_otp') :

        $response = [];
        $errors = [];

        $_full_name = $_POST['_full_name'];
        $_occupation = $_POST['_occupation'];
        $_gender = $_POST['_gender'];
        $_category = $_POST['_category'];
        $_email = $_POST['_email'];

        unset($_SESSION['publication_full_name']);
        unset($_SESSION['publication_occupation']);
        unset($_SESSION['publication_gender']);
        unset($_SESSION['publication_category']);
        unset($_SESSION['publication_email']);
        unset($_SESSION['publication_otp_no']);

        if (empty($_POST['_full_name'])) :
            $errors['full_name_required'] = 'Full Name Required !!!';
        endif;
        if (empty($_POST['_occupation'])) :
            $errors['occupation_required'] = 'Occupation Required !!!';
        endif;
        if (empty($_POST['_gender'])) :
            $errors['gender_required'] = 'Gender Required !!!';
        endif;
        if (empty($_POST['_category'])) :
            $errors['category_required'] = 'Category Required !!!';
        endif;
        if (empty($_POST['_email'])) :
            $errors['email_id_required'] = 'Email ID Required !!!';
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $get_OTP = generateOTP();

            $message_template = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verification OTP Email</title>
                <style>
                    body {
                        font-family: "DM Sans", sans-serif;
                        margin: 0;
                        padding: 0;
                        background: #f4f4f4;
                    }
            
                    .container {
                        max-width: 600px;
                        margin: 50px auto;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        color: #000;
                        background-color: #fff;
                        border: 1px solid #dcdcdc;
                    }
            
                    h1,
                    p {
                        color: #000;
                    }
            
                    .otp-code {
                        font-size: 24px;
                        font-weight: bold;
                        color: #ffb142;
                        margin-bottom: 20px;
                    }
            
                    .note {
                        color: #707070;
                    }
            
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        color: #fff;
                        text-decoration: none;
                        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                        border-radius: 5px;
                        align-items: center;
                        font-weight: bold;
                    }
            
                    .logo {
                        max-width: 100%;
                        height: auto;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            
            <body>
                <div class="container">
                    <div
                        style="justify-items: center;align-items: center;text-align: center;display: grid;justify-content: center !important;">
                        <img src="https://www.sidbi.in/assets/front/images/enhi.jpg" width="150px" alt="Company Logo" class="logo">
                    </div>
                    <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">SIDBI MSME OTP
                        Verification</h1>
                    <p>Dear <b>' . $_full_name . '</b>,</p>
                    <p>Thank you for signing up with [Your Service Name]. We\'re excited to have you join our community!
            
                        To complete the registration process, please use the following verification code</p>
                    <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
                        <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
                    </div>
                    <p class="note">This code is valid for a limited time to ensure the security of your account. If you did not
                        sign up for [Your Service Name] or are experiencing any difficulties, please don\'t hesitate to contact our
                        dedicated support team immediately. We\'re here to assist you every step of the way.</p>
                    <p><br />Best regards,<br /><br />Team SIDBI.</p>
                </div>

                <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">SIDBI MSME OTP Verification</h1>
                <p>Dear <b>' . $_full_name . '</b>,</p>
                <p>Thank you for signing up with SIDBI. We are excited to have you join our community!To complete the registration process, please use the following verification code</p>
                <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
                    <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
                </div>
                <p class="note">This code is valid for a limited time to ensure the security of your account. If you did not sign up for [Your Service Name] or are experiencing any difficulties, please don\'t hesitate to contact our dedicated support team immediately. We\'re here to assist you every step of the way.</p>
                <p><br />Best regards,<br /><br />Team SIDBI.</p>
            </div>
        </body>
        </html>';

            $subject = "SIDBI MSME OTP Verification - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_email; //$user_email
            $Bcc = 'ariyappan@touchmarkdes.com';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['publication_full_name'] = $_full_name;
            $_SESSION['publication_occupation'] = $_occupation;
            $_SESSION['publication_gender'] = $_gender;
            $_SESSION['publication_category'] = $_category;
            $_SESSION['publication_email'] = $_email;
            $_SESSION['publication_otp_no'] = $get_OTP;
            $response['result_success'] = 'OTP Sent Successfully';
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'otp_resent') :

        $response = [];
        $errors = [];

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $get_OTP = generateOTP();

            $message_template = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verification OTP Email</title>
                <style>
                    body {
                        font-family: "DM Sans", sans-serif;
                        margin: 0;
                        padding: 0;
                        background: #f4f4f4;
                    }
            
                    .container {
                        max-width: 600px;
                        margin: 50px auto;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        color: #000;
                        background-color: #fff;
                        border: 1px solid #dcdcdc;
                    }
            
                    h1,
                    p {
                        color: #000;
                    }
            
                    .otp-code {
                        font-size: 24px;
                        font-weight: bold;
                        color: #ffb142;
                        margin-bottom: 20px;
                    }
            
                    .note {
                        color: #707070;
                    }
            
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        color: #fff;
                        text-decoration: none;
                        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                        border-radius: 5px;
                        align-items: center;
                        font-weight: bold;
                    }
            
                    .logo {
                        max-width: 100%;
                        height: auto;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            
            <body>
                <div class="container">
                    <div
                        style="justify-items: center;align-items: center;text-align: center;display: grid;justify-content: center !important;">
                        <img src="https://www.sidbi.in/assets/front/images/enhi.jpg" width="150px" alt="Company Logo" class="logo">
                    </div>
                    <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">SIDBI MSME OTP
                        Verification</h1>
                    <p>Dear <b>' . $_SESSION['publication_full_name'] . '</b>,</p>
                    <p>Thank you for signing up with [Your Service Name]. We\'re excited to have you join our community!
            
                        To complete the registration process, please use the following verification code</p>
                    <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
                        <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
                    </div>
                    <p class="note">This code is valid for a limited time to ensure the security of your account. If you did not
                        sign up for [Your Service Name] or are experiencing any difficulties, please don\'t hesitate to contact our
                        dedicated support team immediately. We\'re here to assist you every step of the way.</p>
                    <p><br />Best regards,<br /><br />Team SIDBI.</p>
                </div>
            </body>
            
            </html>';

            $subject = "SIDBI MSME OTP Verification - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_SESSION['publication_email']; //$user_email
            $Bcc = 'ariyappan@touchmarkdes.com';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['publication_otp_no'] = $get_OTP;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'verify_otp') :

        $response = [];
        $errors = [];

        $_email_otp = $_POST['_email_otp'];

        $publication_OTP_NO = $_SESSION['publication_otp_no'];

        if (empty($_email_otp)) :
            $errors['publication_email_otp_required'] = 'OTP should be Required !!!';
        endif;

        if ($publication_OTP_NO != $_email_otp) :
            $errors['publication_email_otp_invalid'] = 'Entered OTP is Invalid !!!';
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'download_document') :

        $publication_user_captcha = $_POST['publication_captcha'];
        $pub_report_server_captcha = $_SESSION['pub_report_server_captcha'];

        if (isset($publication_user_captcha) && ($publication_user_captcha != $pub_report_server_captcha)) :
            $errors['publication_captcha_verification_failed'] = 'Captcha Verification Failed !!!';
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $_full_name = $_SESSION['publication_full_name'];
            $_occupation = $_SESSION['publication_occupation'];
            $_gender = $_SESSION['publication_gender'];
            $_category = $_SESSION['publication_category'];
            $_email = $_SESSION['publication_email'];
            $hidden_DOC_ID = $_POST['hidden_DOC_ID'];

            $select_publication_document_details = sqlQUERY_LABEL("SELECT `document_link` FROM `publication_reports` WHERE `id` = '$hidden_DOC_ID'") or die("#PUBLICATION_DOCUMENT:" . sqlERROR_LABEL());
            while ($row_publication_data = sqlFETCHARRAY_LABEL($select_publication_document_details)) :
                $document_link = $row_publication_data["document_link"];
            endwhile;

            $download_document_link = SEOURL . '/uploads/publicationreport/' . $document_link;

            $arrFields = array('`full_name`', '`occupation`', '`gender`', '`category`', '`email_id`', '`enquiry_document`', '`status`');
            $arrValues = array("$_full_name", "$_occupation", "$_gender", "$_category", "$_email", "$hidden_DOC_ID", "1");

            if (sqlACTIONS('INSERT', "publication_report_document_enquiry", $arrFields, $arrValues, '')) :
                $response['result'] = true;
                $response['download_document_url'] = '<a id="download_publication_docs" href="' . $download_document_link . '" style="display: none;" download>Download File</a>';
                unset($_SESSION['publication_full_name']);
                unset($_SESSION['publication_occupation']);
                unset($_SESSION['publication_gender']);
                unset($_SESSION['publication_category']);
                unset($_SESSION['publication_email']);
                unset($_SESSION['publication_otp_no']);
            else :
                $response['result'] = false;
                $response['result_error'] = 'Sorry, Unable to Download the Document !!!';
            endif;
        endif;

        echo json_encode($response);

    endif;

else :
    echo "Request Ignored";
endif;
