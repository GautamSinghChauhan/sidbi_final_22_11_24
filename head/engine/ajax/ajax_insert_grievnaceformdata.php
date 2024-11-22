<?php
session_start();
require_once('../../head/jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) { // CHECK AJAX REQUEST

    $entered_captchatext = $_POST['entered_captchatext'];
    $captcha = $_SESSION['captcha'];

    if (strtolower($entered_captchatext) == strtolower($captcha)) {

        $full_name = $_POST['full_name'];
        $company_name = $_POST['company_name'];
        $branch_id = $_POST['branch_id'];
        $customer_type = $_POST['customer_type'];
        $complaint_reason = $_POST['complaint_reason'];
        $country_id = $_POST['country_id'];
        $state_id = $_POST['state_id'];
        $districts_id = $_POST['districts_id'];
        $country_id = $_POST['country_id'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $fixed_line_number = $_POST['fixed_line_number'];
        $subject = $_POST['subject'];
        $mobile_number = $_POST['mobile_number'];
        $complaint_message = $_POST['complaint_message'];
        $email = $_POST['email'];

        $arrFields = array('`full_name`', '`companyname`', '`branch`', '`customer_type`', '`reasonfor_rasing_complaint`', '`country`', '`state_id`', '`city`', '`pincode`', '`address`', '`line_number`', '`mobile_number`', '`subject`', '`complaint_message`', '`email`', '`createdby`', '`status`');
        $arrValues = array("$full_name", "$company_name", "$branch_id", "$customer_type", "$complaint_reason", "$country_id", "$state_id", "$districts_id", "$pincode", "$address", "$fixed_line_number", "$mobile_number", "$subject", "$complaint_message", "$email","$logged_user_id", "1");

        if (sqlACTIONS('INSERT', "js_grievanceform", $arrFields, $arrValues, '')) {
            $response = array('status' => 'success', 'message' => 'Thank you! Your request is submitted!');
        } else {
            $response = array('status' => 'error', 'message' => 'Error! Something went wrong!');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Invalid Captcha!');
    }

    // Send JSON response back to the AJAX request
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
