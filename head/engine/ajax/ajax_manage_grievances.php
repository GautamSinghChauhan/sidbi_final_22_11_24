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
        $_company_name = $_POST['_company_name'];
        $_branch_id = $_POST['_branch_id'];
        $_customer_type = $_POST['_customer_type'];
        $_complaint_reason = $_POST['_complaint_reason'];
        $_country_id = $_POST['_country_id'];
        $_state_id = $_POST['_state_id'];
        $_district_id = $_POST['_district_id'];
        $_pincode = $_POST['_pincode'];
        $_address = $_POST['_address'];
        $_landline_number = $_POST['_landline_number'];
        $_mobile_number = $_POST['_mobile_number'];
        $_subject = $_POST['_subject'];
        $_complaint_message = $_POST['_complaint_message'];
        $_email = $_POST['_email'];

        unset($_SESSION['_on_grivances_full_name']);
        unset($_SESSION['_on_grivances_company_name']);
        unset($_SESSION['_on_grivances_branch_id']);
        unset($_SESSION['_on_grivances_customer_type']);
        unset($_SESSION['_on_grivances_complaint_reason']);
        unset($_SESSION['_on_grivances_country_id']);
        unset($_SESSION['_on_grivances_state_id']);
        unset($_SESSION['_on_grivances_district_id']);
        unset($_SESSION['_on_grivances_pincode']);
        unset($_SESSION['_on_grivances_address']);
        unset($_SESSION['_on_grivances_landline_number']);
        unset($_SESSION['_on_grivances_mobile_number']);
        unset($_SESSION['_on_grivances_subject']);
        unset($_SESSION['_on_grivances_complaint_message']);
        unset($_SESSION['_on_grivances_email']);

        if (empty($_POST['_full_name'])) :
            $errors['fullname_required'] = 'Full Name Required !!!';
        endif;
        if (empty($_POST['_company_name'])) :
            $errors['companyname_required'] = 'Company Name Required !!!';
        endif;
        if (empty($_POST['_branch_id'])) :
            $errors['branchid_required'] = 'Branch is Required !!!';
        endif;
        if (empty($_POST['_customer_type'])) :
            $errors['customertype_required'] = 'Customer Type is Required !!!';
        endif;
        if (empty($_POST['_complaint_reason'])) :
            $errors['complaintreason_required'] = 'Complaint Reason is Required !!!';
        endif;
        if (empty($_POST['_country_id'])) :
            $errors['country_required'] = 'Country should be Required !!!';
        endif;
        if (empty($_POST['_state_id'])) :
            $errors['state_required'] = 'State should be Required !!!';
        endif;
        if (empty($_POST['_district_id'])) :
            $errors['districtid_required'] = 'District should be Required !!!';
        endif;
        if (empty($_POST['_pincode'])) :
            $errors['pincode_required'] = 'Pincode should be Required !!!';
        endif;
        if (empty($_POST['_address'])) :
            $errors['address_required'] = 'Address should be Required !!!';
        endif;
        if (empty($_POST['_mobile_number'])) :
            $errors['mobilenumber_required'] = 'Mobile No. should be Required !!!';
        endif;
        if (empty($_POST['_subject'])) :
            $errors['subject_required'] = 'Subject should be Required !!!';
        endif;
        if (empty($_POST['_complaint_message'])) :
            $errors['complaint_message_required'] = 'Compliant Message should be Required !!!';
        endif;
        if (empty($_POST['_email'])) :
            $errors['email_required'] = 'Email should be Required !!!';
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
                <div style="justify-items: center;align-items: center;text-align: center;display: grid;justify-content: center !important;">
                    <img src="https://www.sidbi.in/assets/front/images/enhi.jpg" width="150px" alt="Company Logo" class="logo">
                </div>
                <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">OTP Verification Required: Grievances Form Submission</h1>
                <p>Dear <b>' . $_full_name . '</b>,</p>
                <p>Thank you for submitting your grievance through our online form. To ensure the security and authenticity of your submission, we require an additional verification step. Please find below the One-Time Password (OTP) required to verify your grievance submission: </p>
                <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
                    <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
                </div>
                <p class="note">Please enter this OTP code in the designated field on our website to complete the verification process. If you did not initiate this request or have any concerns, please contact our support team immediately.Thank you for your cooperation.</p>
                <p><br />Best regards,<br /><br />Team SIDBI.</p>
            </div>
        </body>
        </html>';

            $subject = "OTP Verification Required: Grievances Form Submission - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_email; //$user_email
            $Bcc = '';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['_on_grivances_full_name'] = $_full_name;
            $_SESSION['_on_grivances_company_name'] = $_company_name;
            $_SESSION['_on_grivances_branch_id'] = $_branch_id;
            $_SESSION['_on_grivances_customer_type'] = $_customer_type;
            $_SESSION['_on_grivances_complaint_reason'] = $_complaint_reason;
            $_SESSION['_on_grivances_country_id'] = $_country_id;
            $_SESSION['_on_grivances_state_id'] = $_state_id;
            $_SESSION['_on_grivances_district_id'] = $_district_id;
            $_SESSION['_on_grivances_pincode'] = $_pincode;
            $_SESSION['_on_grivances_address'] = $_address;
            $_SESSION['_on_grivances_landline_number'] = $_landline_number;
            $_SESSION['_on_grivances_mobile_number'] = $_mobile_number;
            $_SESSION['_on_grivances_subject'] = $_subject;
            $_SESSION['_on_grivances_complaint_message'] = $_complaint_message;
            $_SESSION['_on_grivances_email'] = $_email;
            $_SESSION['_on_grivances_otp_no'] = $get_OTP;
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
                <div style="justify-items: center;align-items: center;text-align: center;display: grid;justify-content: center !important;">
                    <img src="https://www.sidbi.in/assets/front/images/enhi.jpg" width="150px" alt="Company Logo" class="logo">
                </div>
                <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">OTP Verification Required: Grievances Form Submission</h1>
                <p>Dear <b>' .  $_SESSION['_on_grivances_fullname'] . '</b>,</p>
                <p>Thank you for submitting your grievance through our online form. To ensure the security and authenticity of your submission, we require an additional verification step. Please find below the One-Time Password (OTP) required to verify your grievance submission: </p>
                <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
                    <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
                </div>
                <p class="note">Please enter this OTP code in the designated field on our website to complete the verification process. If you did not initiate this request or have any concerns, please contact our support team immediately.Thank you for your cooperation.</p>
                <p><br />Best regards,<br /><br />Team SIDBI.</p>
            </div>
        </body>
        </html>';

            $subject = "OTP Verification Required: Grievances Form Submission - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_SESSION['_on_grivances_email']; //$user_email
            $Bcc = '';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['_on_grivances_otp_no'] = $get_OTP;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'verify_otp') :

        $response = [];
        $errors = [];

        $_email_otp = $_POST['_email_otp'];

        $grivances_OTP_NO = $_SESSION['_on_grivances_otp_no'];

        if (empty($_email_otp)) :
            $errors['grivances_email_otp_required'] = 'OTP should be Required !!!';
        endif;

        if ($grivances_OTP_NO != $_email_otp) :
            $errors['grivances_email_otp_invalid'] = 'Entered OTP is Invalid !!!';
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

    elseif ($_GET['type'] == 'add') :

        $response = [];
        $errors = [];

        $user_captcha = $_POST['user_captcha'];
        $server_captcha = $_SESSION['grivances_captcha'];

        if (isset($user_captcha) && ($user_captcha != $server_captcha)) :
            $errors['captcha_verification_failed'] = true;
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $full_name = $_SESSION['_on_grivances_full_name'];
            $company_name = $_SESSION['_on_grivances_company_name'];
            $branch_id = $_SESSION['_on_grivances_branch_id'];
            $customer_type = $_SESSION['_on_grivances_customer_type'];
            $complaint_reason = $_SESSION['_on_grivances_complaint_reason'];
            $country_id = $_SESSION['_on_grivances_country_id'];
            $state_id = $_SESSION['_on_grivances_state_id'];
            $district_id = $_SESSION['_on_grivances_district_id'];
            $country_id = $_SESSION['_on_grivances_country_id'];
            $address = $_SESSION['_on_grivances_address'];
            $pincode = $_SESSION['_on_grivances_pincode'];
            $landline_number = $_SESSION['_on_grivances_landline_number'];
            $subject = $_SESSION['_on_grivances_subject'];
            $mobile_number = $_SESSION['_on_grivances_mobile_number'];
            $complaint_message = $_SESSION['_on_grivances_complaint_message'];
            $email = $_SESSION['_on_grivances_email'];
            $GRIVANCES_REF_NO = GRIVANCES_REF_NO();

            $arrFields = array('`grivances_ref_no`', '`full_name`', '`companyname`', '`branch`', '`customer_type`', '`reasonfor_rasing_complaint`', '`country_id`', '`state_id`', '`district_id`', '`pincode`', '`address`', '`landline_number`', '`mobile_number`', '`subject`', '`complaint_message`', '`email`', '`status`');
            $arrValues = array("$GRIVANCES_REF_NO", "$full_name", "$company_name", "$branch_id", "$customer_type", "$complaint_reason", "$country_id", "$state_id", "$district_id", "$pincode", "$address", "$landline_number", "$mobile_number", "$subject", "$complaint_message", "$email", "1");

            if (sqlACTIONS('INSERT', "js_grievanceform", $arrFields, $arrValues, '')) :
                $response['result'] = true;
                $response['result_success'] = 'Thank you for registering complaints with us !!!';

                $response['return_response'] = "<div class='center-container'>
                                                <style>
                                                    body {
                                                        background-image: url('your-background-image.jpg');
                                                        /* Replace with your image file path */
                                                        background-size: cover;
                                                        /* Cover the entire screen */
                                                        background-position: center;
                                                        /* Center the background image */
                                                        background-repeat: no-repeat;
                                                        /* Do not repeat the background image */
                                                        background-attachment: fixed;
                                                        /* Fixed background */
                                                    }
                                                    .center-container {
                                                        display: flex;
                                                        justify-content: center;
                                                        align-items: center;
                                                        min-height: 100vh;
                                                        background-color: rgba(0, 42, 82, 1);
                                                        /* Add a semi-transparent white background for content */
                                                    }
                                                    .welcome-message {
                                                        text-align: center;
                                                        margin-bottom: 20px;
                                                        color: #fff;
                                                        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                                                        /* Change the text color to dark gray (you can use any valid color value) */
                                                    }
                                                    .next-button {
                                                        display: block;
                                                        margin: 20px auto;
                                                        background-color: #5592C6;
                                                        /* Change the button background color to orange (you can use any valid color value) */
                                                        border-color: #5592C6;
                                                        /* Change the button border color to match the background color */
                                                        color: #fff;
                                                        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                                                        /* Change the text color of the button text to white */
                                                    }
                                                    .next-button:hover {
                                                        background-color: #5592C6;
                                                        /* Change the button background color on hover */
                                                        border-color: #5592C6;
                                                        /* Change the button border color on hover */
                                                    }
                                                    .welcome-image {
                                                        max-width: 30%;
                                                        /* Reduce the image size to 50% of its container's width */
                                                        height: auto;
                                                        /* Maintain the image's aspect ratio */
                                                        display: block;
                                                        /* Ensure proper alignment and spacing */
                                                        margin: 0 auto;
                                                        /* Ensure the image does not exceed its container's width */
                                                    }
                                                </style>
                                                <div class='col-md-6'>
                                                    <!-- Welcome Message -->
                                                    <div class='welcome-message'>
                                                        <img class='welcome-image' src='" . SEOURL . "/assets/front/images/success.gif' alt='Welcome Image'>
                                                        <h4>Thank you for registering complaints with us</h4>
                                                        <h4>Your Complaint ID : " . $GRIVANCES_REF_NO . "</h4>
                                                    </div>
                                                </div>
                                            </div>";

                $message_template = '<!DOCTYPE html>
                                    <html lang="en">
                                    <head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>SIDBI : Online Complaints</title>
                                        <style>
                                            /* Reset some default styles */
                                            body,
                                            h1,
                                            h2,
                                            p {
                                                margin: 0;
                                                padding: 0;
                                            }
                                        </style>
                                    </head>
                                    <body style="font-family: "DM Sans", sans-serif;background-color: #f5f5f5;padding-top: 30px;">
                                        <div class="email-container" style="width: 80%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); margin-top: 20px;margin-bottom: 30px;border: 1px solid lightgray;">
                                            <div class="email-header" style="text-align: center;">
                                                <h2 style="color: #484B49;">SIDBI : Online Complaints</h2>
                                            </div>
                                            <table style="width: 100%; border-collapse: collapse;">
                                                <tr>
                                                    <td>
                                                        <div align="center">
                                                            <!-- Content Details Table -->
                                                            <table width="100%" style="border-collapse: collapse; margin-top: 20px;">
                                                                <tr style="background: #f1f7f9;">
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 7.5pt;" colspan="2">
                                                                        <p style="text-align: center; color: black;">
                                                                            <a href="https://sidbi.in/" target="_blank" style="color: black; text-decoration: none;">
                                                                                <img width="150" src="' . SEOURL . '/assets/front/images/enhi.jpg" alt="Logo">
                                                                            </a>
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt; text-align: left;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Reference Number</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt; text-align: left;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $GRIVANCES_REF_NO . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Full Name</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $full_name . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Email ID</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $email . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Contact Number</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $mobile_number . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Company name</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $company_name . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Subject</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $subject . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Address</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $address . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Pincode</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $pincode . '</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Comments</b></p>
                                                                    </td>
                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $complaint_message . '</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div>
                                                                <p align="center" style="text-align: center; line-height: 10.5pt;margin-top:15px;">
                                                                    <span style="font-size: 10.5pt; color: #4c4d4f;">&copy; ' . date('Y') . ' Small Industries Development Bank of India (SIDBI)</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </body>
                                    </html>';

                $subject = "SIDBI : Online Complaints";
                $send_from = $SMTP_EMAIL_SEND_FROM;
                $to = $email; //$email;
                $Bcc = '';
                $cc = $grivances_complaint_to_email; //$grivances_complaint_to_email;
                $sender_name = $SMTP_EMAIL_SEND_NAME;
                SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);

            else :
                $response['result'] = false;
                $response['result_error'] = 'Error: Sorry, Unable to Submit the Enquiry Form. Please try again later...';
            endif;
        endif;

        echo json_encode($response);
    endif;

else :
    echo "Request Ignored";
endif;
