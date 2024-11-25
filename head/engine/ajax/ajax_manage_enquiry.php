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

include_once '../../jackus.php';
include_once '../../smtp_functions.php';

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')): //CHECK AJAX REQUEST

    if ($_GET['type'] == 'send_otp'):

        $response = [];
        $errors = [];

        $_name = $_POST['_name'];
        $_mobile_number = $_POST['_mobile_number'];
        $_location = $_POST['_location'];
        $_need_for = $_POST['_need_for'];
        $_qoas = $_POST['_qoas'];
        $_description = $_POST['_description'];
        $_emailid = $_POST['_emailid'];
        $_zipcode = $_POST['_zipcode'];

        unset($_SESSION['on_enquiry_name']);
        unset($_SESSION['on_enquiry_mobile_number']);
        unset($_SESSION['on_enquiry_location']);
        unset($_SESSION['on_enquiry_need_for']);
        unset($_SESSION['on_enquiry_qoas']);
        unset($_SESSION['on_enquiry_description']);
        unset($_SESSION['on_enquiry_emailid']);
        unset($_SESSION['on_enquiry_otp_no']);

        if (empty($_POST['_name'])):
            $errors['name_required'] = 'Full Name Required !!!';
        endif;
        if (empty($_POST['_mobile_number'])):
            $errors['mobile_number_required'] = 'Mobile No. Required !!!';
        endif;
        if (empty($_POST['_location'])):
            $errors['location_required'] = 'Location Required !!!';
        endif;
        if (empty($_POST['_need_for'])):
            $errors['need_for_required'] = 'Need for is Required !!!';
        endif;
        if (empty($_POST['_qoas'])):
            $errors['qoas_required'] = 'Quantum of assistance sought is Required !!!';
        endif;
        if (empty($_POST['_description'])):
            $errors['description_required'] = 'Description should be Required !!!';
        endif;
        if (empty($_POST['_emailid'])):
            $errors['emailid_required'] = 'Email ID should be Required !!!';
        endif;
        if (empty($_POST['_zipcode'])):
            $errors['zipcode_required'] = 'Zipcode should be Required !!!';
        endif;

        if (!empty($errors)):
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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
			                <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">SIDBI Enquiry OTP Verification</h1>
			                <p>Dear <b>' . $_name . '</b>,</p>
			                <p>Thank you for signing up with [Your Service Name]. To complete the registration process, please use the following verification code:</p>
			                <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
			                    <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
			                </div>
			                <p class="note">This code is valid for a limited time. If you did not sign up for [Your Service Name] or are having trouble, please contact our support team immediately.</p>
			                <p><br />Best regards,<br /><br />Team SIDBI.</p>
			            </div>
			        </body>
			        </html>';

            $subject = "SIDBI Enquiry OTP Verification - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_emailid; //$user_email
            $Bcc = 'ariyappan@touchmarkdes.com';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['on_enquiry_name'] = $_name;
            $_SESSION['on_enquiry_mobile_number'] = $_mobile_number;
            $_SESSION['on_enquiry_location'] = $_location;
            $_SESSION['on_enquiry_need_for'] = $_need_for;
            $_SESSION['on_enquiry_qoas'] = $_qoas;
            $_SESSION['on_enquiry_description'] = $_description;
            $_SESSION['on_enquiry_emailid'] = $_emailid;
            $_SESSION['on_enquiry_zipcode'] = $_zipcode;
            $_SESSION['on_enquiry_otp_no'] = $get_OTP;
            $response['result_success'] = 'OTP Sent Successfully';
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'otp_resent'):

        $response = [];
        $errors = [];

        if (!empty($errors)):
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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
			                <h1 style="justify-items: center;align-items: center;text-align: center;display: grid;">SIDBI Enquiry OTP Verification</h1>
			                <p>Dear <b>' . $_SESSION['on_enquiry_name'] . '</b>,</p>
			                <p>Thank you for signing up with [Your Service Name]. To complete the registration process, please use the following verification code:</p>
			                <div style="justify-items: center;align-items: center;text-align: center;display: grid;">
			                    <a href="javascript:void(0)" class="button">' . $get_OTP . '</a>
			                </div>
			                <p class="note">This code is valid for a limited time. If you did not sign up for [Your Service Name] or are having trouble, please contact our support team immediately.</p>
			                <p><br />Best regards,<br /><br />Team SIDBI.</p>
			            </div>
			        </body>
			        </html>';

            $subject = "SIDBI Enquiry OTP Verification - $get_OTP";
            $send_from = "$SMTP_EMAIL_SEND_FROM";
            $to = $_SESSION['on_enquiry_emailid']; //$user_email
            $Bcc = 'ariyappan@touchmarkdes.com';
            $cc = '';
            $sender_name = "$SMTP_EMAIL_SEND_NAME";
            SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);
            $_SESSION['on_enquiry_otp_no'] = $get_OTP;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'verify_otp'):

        $response = [];
        $errors = [];

        $_email_otp = $_POST['_email_otp'];

        $enquiry_OTP_NO = $_SESSION['on_enquiry_otp_no'];

        if (empty($_email_otp)):
            $errors['enquiry_email_otp_required'] = 'OTP should be Required !!!';
        endif;

        if ($enquiry_OTP_NO != $_email_otp):
            $errors['enquiry_email_otp_invalid'] = 'Entered OTP is Invalid !!!';
        endif;

        if (!empty($errors)):
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
            //success call
            $response['success'] = true;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'add'):

        $response = [];
        $errors = [];

        $user_captcha = $_POST['user_captcha'];
        $server_captcha = $_SESSION['enquiry_captcha'];

        if (isset($user_captcha) && ($user_captcha != $server_captcha)):
            $errors['captcha_verification_failed'] = true;
        endif;

        if (!empty($errors)):
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
            //success call
            $response['success'] = true;

            $name = $_SESSION['on_enquiry_name'];
            $mobile_number = $_SESSION['on_enquiry_mobile_number'];
            $location = $_SESSION['on_enquiry_location'];
            $need_for = $_SESSION['on_enquiry_need_for'];
            $qoas = $_SESSION['on_enquiry_qoas'];
            $description = $_SESSION['on_enquiry_description'];
            $emailid = $_SESSION['on_enquiry_emailid'];
            $zipcode = $_SESSION['on_enquiry_zipcode'];

            $ENQUIRY_REF_NO = ENQUIRY_REF_NO();

            // $arrFields = array('`enquiry_ref_no`', '`name`', '`mobile_number`', '`location`', '`need_for`', '`qunatumofassitancesought`', '`description`', '`email`', '`zipcode','`status`');
            // $arrValues = array("$ENQUIRY_REF_NO", "$name", "$mobile_number", "$location", "$need_for", "$qoas", "$description", "$emailid", "1");

            // Update the field names to match the database column name for zipcode
            $arrFields = array('`enquiry_ref_no`', '`name`', '`mobile_number`', '`location`', '`need_for`', '`qunatumofassitancesought`', '`description`', '`email`', '`zip_code`', '`status`'); // Changed '`zipcode`' to '`zip_code`'
            $arrValues = array("$ENQUIRY_REF_NO", "$name", "$mobile_number", "$location", "$need_for", "$qoas", "$description", "$emailid", "$zipcode", "1"); // Make sure the `$zipcode` value is included here

            if (sqlACTIONS('INSERT', "js_enquiryform", $arrFields, $arrValues, '')):
                $response['result'] = true;
                $response['result_success'] = 'Enquiry Submitted Successfully';

                $enquiry_cc_email = getENQUIRYFORM_NEEDFOR_LIST($need_for, 'email_label');

                $message_template = '<!DOCTYPE html>
				                                    <html lang="en">
				                                    <head>
				                                        <meta charset="UTF-8">
				                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
				                                        <title>SIDBI : Online Enquiry</title>
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
				                                                <h2 style="color: #484B49;">SIDBI : Online Enquiry</h2>
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
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $ENQUIRY_REF_NO . '</p>
				                                                                    </td>
				                                                                </tr>
				                                                                <tr>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Full Name</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $name . '</p>
				                                                                    </td>
				                                                                </tr>
				                                                                <tr>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Email ID</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $emailid . '</p>
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
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Location</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $location . '</p>
				                                                                    </td>
				                                                                </tr>
				                                                                <tr>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Need</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . getENQUIRYFORM_NEEDFOR_LIST($need_for, 'label') . '</p>
				                                                                    </td>
				                                                                </tr>
				                                                                <tr>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Quantum of Assistance sought</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $qoas . '</p>
				                                                                    </td>
				                                                                </tr>
				                                                                <tr>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;"><b>Description</b></p>
				                                                                    </td>
				                                                                    <td style="border: solid #dddddd 1.0pt; padding: 3.75pt;">
				                                                                        <p style="margin: 0; margin-bottom: 5.0pt;margin-top: 5.0pt;margin-left:15.0pt;">' . $description . '</p>
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

                $subject = "SIDBI : New Online Enquiry";
                $send_from = $SMTP_EMAIL_SEND_FROM;
                $to = $emailid; //$emailid;
                $Bcc = '';
                $cc = $enquiry_cc_email; //$enquiry_cc_email;
                $sender_name = $SMTP_EMAIL_SEND_NAME;
                SMTP_EMAIL_CONFIG($to, $cc, $send_from, $Bcc, $sender_name, $subject, $message_template);

                unset($_SESSION['on_enquiry_name']);
                unset($_SESSION['on_enquiry_mobile_number']);
                unset($_SESSION['on_enquiry_location']);
                unset($_SESSION['on_enquiry_need_for']);
                unset($_SESSION['on_enquiry_qoas']);
                unset($_SESSION['on_enquiry_description']);
                unset($_SESSION['on_enquiry_emailid']);
                unset($_SESSION['on_enquiry_otp_no']);

            else:
                $response['result'] = false;
                $response['result_error'] = 'Error: Sorry, Unable to Submit the Enquiry Form. Please try again later...';
            endif;
        endif;
        echo json_encode($response);
    endif;

else:
    echo "Request Ignored";
endif;
