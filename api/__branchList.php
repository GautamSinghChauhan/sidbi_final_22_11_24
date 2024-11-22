<?php
// Extracting data from the request (if required)
extract($_REQUEST);
require_once '../head/jackus.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
$dataURI = file_get_contents('php://input');
$content_body = json_decode($dataURI, true);

$headers = apache_request_headers();


$token = $headers['Token'];
$login_status = 'True';

$state_id = $content_body['state_id'];
$htmlResponse = ''; 
$result_state = sqlQUERY_LABEL("SELECT `id`, `code`, `name`, `created`, `flag` FROM `states` WHERE `id`=$state_id;");
$count_state= sqlNUMOFROW_LABEL($result_state);
if ($count_state > 0){
    $result = sqlQUERY_LABEL("SELECT `id`, `state_id`, `branch_name`, `location`, `phone_no`, `email_id` FROM `branch_offices` WHERE `state_id` = $state_id AND `status` = 1;");
$count_list = sqlNUMOFROW_LABEL($result);

$response = array();
while ($state_pay = sqlFETCHARRAY_LABEL($result_state)){
    $state_name = $state_pay["name"];
    $htmlResponse .= ' <div id="Maharashtra" class="tab-pane fade in active">';
    $htmlResponse .= ' <h2>' . $state_name . '&nbsp;(' . $count_list .')</h2>';
    $htmlResponse .= '  <div class="conrw1">';
    $htmlResponse .= '  <div class="owl-carousel owl-carousel8 owl-theme">';
// Check if there are any contacts found
if ($count_list > 0) {
    $message = 'State Exists';
    $contacts = array();

    // Loop through each contact
    while ($row_pay = sqlFETCHARRAY_LABEL($result)) {
        $id = $row_pay["id"];
        $state_id = $row_pay["state_id"];
        $branch_name = $row_pay["branch_name"];
        $location = $row_pay["location"];
        $phone_no = $row_pay["phone_no"];
        $email_id = $row_pay["email_id"];
        // Construct contact array
        $branchs = array(
            "id" => $id,
            "state_id" => $state_id,
            "branch_name" => $branch_name,
            "location" => $location,
            "phone_no" => $phone_no,
            "email_id" => $email_id,
        );
        $htmlResponse .= ' <div class="address-sec add-border">';
        $htmlResponse .= '<h4><i class="" aria-hidden="true"></i> ' . $branch_name . ' </h4>';
        $htmlResponse .= '<ul>
        <li>
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>' . $location . '</span>
        </li>
        <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span><a href="">' . $phone_no . '</a></span>
        </li>
        <li>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span><a href="coimbatore[at]sidbi[dot]in">' . $email_id . '</a></span>
        </li>
    </ul>';
        // ... (Add other HTML content dynamically based on branch information)
        $htmlResponse .= '</div>';
        // Add contact to contacts array
        $data[] = $branchs;
    }
    $htmlResponse .= '</div>';
    $htmlResponse .= '</div>';
    $htmlResponse .= '</div>';
    // Construct final response
    $response['message'] = $message;
    
    $response['data'] = $data;
} else {
    // No contacts found
    $message = 'Branch Doesnt Exists';
    $response['message'] = $message;
}}}
echo $htmlResponse;
// Encode response to JSON and output
// echo json_encode($response1);

// header('Content-type:application/json;charset=utf-8');
?>
