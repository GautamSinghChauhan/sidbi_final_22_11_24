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
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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
            $to = $_emailid;
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
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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
            $to = $_SESSION['on_enquiry_emailid'];
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
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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
            $response['success'] = false;
            $response['errors'] = $errors;
        else:
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

            $arrFields = array('`enquiry_ref_no`', '`name`', '`mobile_number`', '`location`', '`need_for`', '`qunatumofassitancesought`', '`description`', '`email`', '`zip_code`', '`status`');
            $arrValues = array("$ENQUIRY_REF_NO", "$name", "$mobile_number", "$location", "$need_for", "$qoas", "$description", "$emailid", "$zipcode", "1");

            if (sqlACTIONS('INSERT', "js_enquiryform", $arrFields, $arrValues, '')):
                $response['result'] = true;
                $response['result_success'] = 'Enquiry Submitted Successfully';

                // Handle API calls here for CDA Encryption, Token, and Form Encryption...
                // Include error handling for all API calls

				function makeApiCall($url, $payload, $headers = []) {
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => $url,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						CURLOPT_POSTFIELDS => json_encode($payload),
						CURLOPT_HTTPHEADER => $headers,
					));
				
					$response = curl_exec($curl);
					$error = curl_error($curl);
					curl_close($curl);
				
					if ($error) {
						throw new Exception("CURL Error: $error");
					}
				
					$decodedResponse = json_decode($response, true);
					if (json_last_error() !== JSON_ERROR_NONE) {
						throw new Exception("Invalid JSON response from API.");
					}
				
					return $decodedResponse;
				}
				
				/**
				 * Function to handle the CDA Encryption API.
				 */
				function handleCdaEncryption($url, $username, $password) {
					$payload = [
						"username" => $username,
						"password" => $password
					];
					return makeApiCall($url, $payload, ['Content-Type: application/json']);
				}
				
				/**
				 * Function to handle token generation API.
				 */
				function handleGenerateToken($url, $encryptedPayload, $utilsDtls) {
					$payload = [
						"payload" => $encryptedPayload,
						"utilsDtls" => $utilsDtls
					];
					$headers = [
						'client-id: SIDBI_NETOYED',
						'Content-Type: application/json'
					];
					return makeApiCall($url, $payload, $headers);
				}
				
				/**
				 * Function to handle the SIDBI Decryption API.
				 */
				function handleDecryption($url, $encryptedPayload, $utilsDtls) {
					$payload = [
						"payload" => $encryptedPayload,
						"utilsDtls" => $utilsDtls
					];
					return makeApiCall($url, $payload, ['Content-Type: application/json']);
				}
				

				           // Start API handling logic
						   try {
							// Step 1: CDA Encryption
							$cdaEncryptionResponse = handleCdaEncryption(
								"https://lead.sidbi.in/sidbi/cdaencryption",
								"755fb86c-17bd-4451-a6a9-7fcc054544ba",
								"736c9683-3fd8-4af2-a160-508ea551ea70"
							);
			
							if (!isset($cdaEncryptionResponse['payload'], $cdaEncryptionResponse['utilsDtls'])) {
								throw new Exception("CDA Encryption response missing required fields.");
							}
			
							$encryptedPayload = $cdaEncryptionResponse['payload'];
							$utilsDtls = $cdaEncryptionResponse['utilsDtls'];
			
							// Step 2: Generate Token
							$generateTokenResponse = handleGenerateToken(
								"https://partneruat.sidbi.in/user/auth/generate-token",
								$encryptedPayload,
								$utilsDtls
							);

							    //  echo "Genmerate API (SIDBI Decryption) Response:\n";
                                //  echo json_encode($generateTokenResponse, JSON_PRETTY_PRINT); // Output the response
			
							if (!isset($generateTokenResponse['payload'], $generateTokenResponse['utilsDtls'])) {
								throw new Exception("Generate Token response missing required fields.");
							}
			
							$encryptedPayload2 = $generateTokenResponse['payload'];
							$utilsDtls2 = $generateTokenResponse['utilsDtls'];
			
							// Step 3: Decrypt Token
							$decryptionResponse = handleDecryption(
								"https://lead.sidbi.in/sidbi/sidbidecryption",
								$encryptedPayload2,
								$utilsDtls2
							);

							// echo "Decaption api  API (SIDBI Decryption) Response:\n";
							// echo json_encode($decryptionResponse, JSON_PRETTY_PRINT); // Output the response
			
							if (!isset($decryptionResponse['token'])) {
								throw new Exception("Token decryption failed.");
							}
			
							$_SESSION['token'] = $decryptionResponse['token'];
			
							// Step 4: Form Data Encryption
							$formData = [
								"cdaId" => "PARTNER001",
								"customerName" => $name,
								"mobileNumber" => $mobile_number,
								"emailId" => $emailid,
								"address" => $location,
								"need" => $need_for,
								"quantumOfAssistance" => $qoas,
								"description" => $description,
								"pincode" => $zipcode
								// "cdaId" => "PARTNER001",
								// "customerName" => "Lal Singh Gautam Raju",
								// "mobileNumber" => "4433492266",
								// "emailId" => "gautam1fdr145f21.singh@gmail.com",
								// "address" => "chennai,tousand light",
								// "need" => "TEXTILE",
								// "quantumOfAssistance" => 990,
								// "description" => "need one Crore loan",
								// "pincode" => "721147"
							];
							$formEncryptionResponse = makeApiCall(
								"https://lead.sidbi.in/sidbi/cdaencryption",
								$formData,
								['Content-Type: application/json']
							);

							// echo "Form api  API (SIDBI Decryption) Response:\n";
							// echo json_encode($formEncryptionResponse, JSON_PRETTY_PRINT); // Output the response
			
							// Step 5: Submit Final Form Data
							$finalApiResponse = makeApiCall(
								"https://partneruat.sidbi.in/online/lead/management",
								$formEncryptionResponse,
								[
									'Authorization: Bearer ' . $_SESSION['token'],
									'Content-Type: application/json',
									'client-id: SIDBI_NETOYED'
								]
							);

                        // Initialize the response array
                  $response = [];

	// echo json_encode($finalApiResponse);

	// exit();

	

    // Allow duplicate data for mobile numbers and email addresses
    // if (isset($finalApiResponse['statusCode']) && $finalApiResponse['statusCode'] == "1008") {
    //     // Previously, this would return an error. Now, we simply log a message but proceed normally.
    //     $response['duplicate_warning'] = "Duplicate data detected for Mobile Number or Email, but the process will continue.";
    // }

    // Process successful response from the API
    if (isset($finalApiResponse['payload']) && isset($finalApiResponse['utilsDtls'])) {
        // Step 6: Decrypt the payload using sidbidecryption API
        $decryptionResponse = handleDecryption(
            "https://lead.sidbi.in/sidbi/sidbidecryption",
            $finalApiResponse['payload'],
            $finalApiResponse['utilsDtls']
        );

			//echo json_encode($decryptionResponse); // we get {"Status":"200","Message":"Data Saved SuccessFully"} 
			//exit();

			// Check if the decryption response contains the expected fields
			if (isset($decryptionResponse['Status']) && $decryptionResponse['Status'] == "200") {
				// Return the decryption success message
				echo json_encode([
					'status' => 'success',
					'message' => $decryptionResponse['Message']
				], JSON_PRETTY_PRINT);
			} else {
				// Handle any unexpected response
				echo json_encode([
					'status' => 'error',
					'message' => $decryptionResponse['Message'] ?? 'Unknown error in decryption'
				], JSON_PRETTY_PRINT);
			}
			} else {
			// Handle missing payload or utilsDtls
			echo json_encode([
				'status' => 'error',
				'message' => 'Invalid response from API. Missing required fields.'
			], JSON_PRETTY_PRINT);
			}
			} 

			catch (Exception $e) {
				// Handle exceptions
				$response['api_error'] = "Exception occurred: " . $e->getMessage();
				echo json_encode($response, JSON_PRETTY_PRINT);
			}



						// by gs 

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
				

				// test

            endif;

        endif;

        //echo json_encode($response);

    endif;

endif;
?>
