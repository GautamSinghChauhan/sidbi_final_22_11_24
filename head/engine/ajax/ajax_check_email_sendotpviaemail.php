<?php

extract($_REQUEST);
require_once('../../head/jackus.php');
include_once('../../smtp_functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    //GENERATE OTP
    $otp = sprintf('%06d', rand(0, 999999));

    // Validate email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        $subject = "SIDBI - OTP Verification for Enquiry";
        $to = $email;
        $Bcc = $bcc_emailid;
        $cc = $cc_emailid;
        // $from = getEMAILCONFIG("from_name") . " <" . getEMAILCONFIG("from_address") . ">";
        $from = $SMTP_EMAIL_SEND_FROM;        
        $message = '<div class="container">
            <h1>$SIDBI - OTP Verification for Enquiry</h1>
            <p>Dear Pavithran,</p>
            <p>Thank you for using our application. Your One-Time Password (OTP) for verification is:</p>
            <p class="otp"> ' . $otp . ' </p>
            <p>This OTP is valid for a short period of time. Please do not share it with anyone.</p>
            <p>If you did not request this OTP, please ignore this email.</p>
            <p>Best regards,<br>SIDBI Team</p>
        </div>';
        $mailtemplate =  $message;
        $sender_name = "SIDBI";
        // echo "$message";
        // exit;
        SMTP_EMAIL_CONFIG($to, $cc, $from, $Bcc, $sender_name, $subject, $message);
    } else {
        echo "Invalid email format.";
    }
}
