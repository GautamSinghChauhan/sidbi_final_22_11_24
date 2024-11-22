<?php
session_start();
require_once('../../head/jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) { // CHECK AJAX REQUEST

    $entered_captchatext = $_POST['entered_captchatext'];
    $captcha = $_SESSION['captcha'];

    if (strtolower($entered_captchatext) == strtolower($captcha)) {

        $name = $_POST['name'];
        $mobile_number = $_POST['mobile_number'];
        $location = $_POST['location'];
        $need_for = $_POST['need_for'];
        $qoas = $_POST['qoas'];
        $description = $_POST['description'];
        $emailid = $_POST['emailid'];

        $arrFields = array('`name`', '`mobile_number`', '`location`', '`need_for`', '`qunatumofassitancesought`', '`description`', '`email`',  '`createdby`', '`status`');
        $arrValues = array("$name", "$mobile_number", "$location", "$need_for", "$qoas", "$description", "$emailid", "$logged_user_id", "1");

        if (sqlACTIONS('INSERT', "js_enquiryform", $arrFields, $arrValues, '')) {
            $response = array('status' => 'success', 'message' => 'Data inserted successfully!');
        } else {
            $response = array('status' => 'error', 'message' => 'Error inserting data into the database.');
        }
    } else {
        $response = array('status' => 'error', 'message' => 'Invalid Captcha!');
    }

    // Send JSON response back to the AJAX request
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
