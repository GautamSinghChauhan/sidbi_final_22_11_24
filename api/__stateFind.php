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

$state_name = $content_body['state_name'];

$result = sqlQUERY_LABEL("SELECT `id`, `code`, `name`, `created`, `flag` FROM `states` WHERE `name`='$state_name'");
// $result = sqlQUERY_LABEL("SELECT `id`, `code`, `name` FROM `states` WHERE `name`=$state_name;");
// echo $state_name;
// exit;

$count_list = sqlNUMOFROW_LABEL($result);

$response = array();

// Check if there are any contacts found
if ($count_list > 0) {
    $message = 'State Exists';
    $contacts = array();

    // Loop through each contact
    while ($row_pay = sqlFETCHARRAY_LABEL($result)) {
        $id = $row_pay["id"];
        $code = $row_pay["code"];
        $name = $row_pay["name"];
        // Construct contact array
      

        // Add contact to contacts array
        $response["state_name"] = $name;
        $response["state_id"] = $id;
    }

    // Construct final response
    $response['message'] = $message;
    // $response['data'] = $data;
} else {
    // No contacts found
    $message = 'User Doesnt Exists';
    $response['message'] = $message;
}

// Encode response to JSON and output
echo json_encode($response);

header('Content-type:application/json;charset=utf-8');
?>
