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
include_once('head/smtp_functions.php');
include_once('../../jackus.php');
$email = $_POST['_email'];
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

      










?>


