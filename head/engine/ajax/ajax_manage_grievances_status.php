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

    if ($_GET['type'] == 'check_complaint_status_in_level_2') :

        $response = [];
        $errors = [];

        $_complaint_id = trim($_POST['_complaint_id_level_2']);

        if (empty($_POST['_complaint_id_level_2'])) :
            $errors['complaintid_required'] = 'Complaint ID Required !!!';
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $check_grivances_data = sqlQUERY_LABEL("SELECT `grivances_ref_no` FROM `js_grievanceform` WHERE `grivances_ref_no` = '$_complaint_id' and `status` = '1' and `deleted` = '0'") or die("#UNABLE_TO_GET_GRIVANCES_DATA: " . sqlERROR_LABEL());
            $check_total_records_count = sqlNUMOFROW_LABEL($check_grivances_data);

            if ($check_total_records_count == 0) :
                $response['result_error'] = '<div><h5 style="color: #ff6347;" class="mb-2 text-center">Error: Invalid Complaint ID</h5><p style="color: #333;" class="mb-2 text-center">Please enter a valid complaint ID.</p><p class="text-success text-center">e.g: SIDBI/G/2024/02/25/000001</p></div>';
            else :
                $check_grivances_more_than_eight_days_data = sqlQUERY_LABEL("SELECT `state_id`, `grivances_ref_no` FROM `js_grievanceform` WHERE `grivances_ref_no` = '$_complaint_id' and `status` = '1' and `deleted` = '0' AND DATE(`createdon`) <= DATE_SUB(NOW(), INTERVAL 8 DAY)") or die("#UNABLE_TO_GET_GRIVANCES_DATA: " . sqlERROR_LABEL());
                $check_total_pending_records_count = sqlNUMOFROW_LABEL($check_grivances_more_than_eight_days_data);
                $fetch_grivances_data = sqlFETCHARRAY_LABEL($check_grivances_more_than_eight_days_data);
                $state_ID = $fetch_grivances_data['state_id'];
                $state_NAME = getSTATELIST($state_ID, 'label');

                if ($check_total_pending_records_count > 0) :
                    $response_data .= '<div><h5 class="mb-4 ms-3 text-success text-start">Complaint ID : #' . $_complaint_id . '</h5></div><section class="main-announcement cms pb-0" data-aos="fade-up">
            <div class="container"><table class="table table-bordered">
                    <thead>
                        <tr>

                            <th style="vertical-align: middle;">Name Of The Regional Office</th>
                            <th style="vertical-align: middle;">Name Of The Regional In-charge</th>
                            <th style="vertical-align: middle;">Contact Number </th>
                            <th style="vertical-align: middle;" width="190px">Email ID</th>
                            <th style="vertical-align: middle;" width="240px">Address</th>
                            <th style="vertical-align: middle;" width="340px">Geographical Coverage / State(S) Under The Jurisdiction
                                Of RO.</th>
                            <!-- <th style="vertical-align: middle;" width="65px" class="text-center"></th> -->
                        </tr>
                    </thead>';

                    $list_of_regional_officers_data = sqlQUERY_LABEL("SELECT `regional_id`, `regional_location`, `regional_location_hindi`, `regional_name`, `regional_name_hindi`, `regional_contact`, `regional_email`, `regional_address`, `regional_address_hindi`,  `regional_state`, `regional_state_hindi`, `status` FROM `regional` where deleted = '0' and `status` = '1' AND FIND_IN_SET('" . $state_NAME . "', `regional_state`)") or die("Unable to get records:" . sqlERROR_LABEL());
                    $total_no_of_regional_officers_count = sqlNUMOFROW_LABEL($list_of_regional_officers_data);
                    if ($total_no_of_regional_officers_count > 0) :
                        while ($row = sqlFETCHARRAY_LABEL($list_of_regional_officers_data)) :
                            $regional_id = $row["regional_id"];
                            $regional_location = $row["regional_location"];
                            $regional_location_hindi = $row["regional_location_hindi"];
                            $regional_name = $row["regional_name"];
                            $regional_name_hindi = $row["regional_name_hindi"];
                            $regional_contact = $row["regional_contact"];
                            $regional_email = $row["regional_email"];
                            $regional_address = html_entity_decode(html_entity_decode($row["regional_address"]));
                            $regional_address_hindi = html_entity_decode(html_entity_decode($row["regional_address_hindi"]));
                            $regional_state = $row["regional_state"];
                            $regional_state_hindi = $row["regional_state_hindi"];

                            $response_data .= '<tr>
                            <td>' . $regional_location . '</td>
                            <td>' . $regional_name . '</td>
                            <td>' . $regional_contact . '</td>
                            <td>' . $regional_email . '</td>
                            <td>' . $regional_address . '</td>
                            <td>' . $regional_state . '</td>
                        </tr>';

                        endwhile;
                    else :
                        $response_data .= '<tr>
                            <td colspan="6">No Records Found !!!</td>
                        </tr>';
                    endif;

                    $response_data .= '</table></div>
        </section>';
                    $response['result_success'] = $response_data;
                else :
                    $response['result_error'] = '<div><h5 class="mb-2 text-success text-center">Complaint ID : #' . $_complaint_id . '</h5><p class="mb-2 fw-bold text-center" style="color: #ff6347;">In-Progress</p></div>';
                endif;
            endif;
        endif;

        echo json_encode($response);

    elseif ($_GET['type'] == 'check_complaint_status_in_level_3') :

        $response = [];
        $errors = [];

        $_complaint_id = trim($_POST['_complaint_id_level_3']);

        if (empty($_POST['_complaint_id_level_3'])) :
            $errors['complaintid_required'] = 'Complaint ID Required !!!';
        endif;

        if (!empty($errors)) :
            //error call
            $response['success'] = false;
            $response['errors'] = $errors;
        else :
            //success call		
            $response['success'] = true;

            $check_grivances_data = sqlQUERY_LABEL("SELECT `grivances_ref_no` FROM `js_grievanceform` WHERE `grivances_ref_no` = '$_complaint_id' and `status` = '1' and `deleted` = '0'") or die("#UNABLE_TO_GET_GRIVANCES_DATA: " . sqlERROR_LABEL());
            $check_total_records_count = sqlNUMOFROW_LABEL($check_grivances_data);

            if ($check_total_records_count == 0) :
                $response['result_error'] = '<div><h5 style="color: #ff6347;" class="mb-2 text-center">Error: Invalid Complaint ID</h5><p style="color: #333;" class="mb-2 text-center">Please enter a valid complaint ID.</p><p class="text-success text-center">e.g: SIDBI/G/2024/02/25/000001</p></div>';
            else :
                $check_grivances_more_than_eight_days_data = sqlQUERY_LABEL("SELECT `state_id`, `grivances_ref_no` FROM `js_grievanceform` WHERE `grivances_ref_no` = '$_complaint_id' and `status` = '1' and `deleted` = '0' AND DATE(`createdon`) <= DATE_SUB(NOW(), INTERVAL 8 DAY)") or die("#UNABLE_TO_GET_GRIVANCES_DATA: " . sqlERROR_LABEL());
                $check_total_pending_records_count = sqlNUMOFROW_LABEL($check_grivances_more_than_eight_days_data);
                $fetch_grivances_data = sqlFETCHARRAY_LABEL($check_grivances_more_than_eight_days_data);
                $state_ID = $fetch_grivances_data['state_id'];
                $state_NAME = getSTATELIST($state_ID, 'label');

                if ($check_total_pending_records_count > 0) :
                    $response_data .= '<div><h5 class="mb-4 ms-4 text-success text-start">Complaint ID : #' . $_complaint_id . '</h5></div><section class="main-announcement cms pb-0" data-aos="fade-up">
            <div class="container">';

                    $list_cheif_grivances_offices_data = sqlQUERY_LABEL("SELECT `cheifgrievances_ID`, `cheifgrievances_title`, `cheifgrievances_title_hindi`, `cheifgrievances_content`, `cheifgrievances_content_hindi`, `status` FROM `cheifgrievances` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                    $total_cheif_grivances_officers_count = sqlNUMOFROW_LABEL($list_cheif_grivances_offices_data);
                    if ($total_cheif_grivances_officers_count > 0) :
                        while ($row = sqlFETCHARRAY_LABEL($list_cheif_grivances_offices_data)) :
                            $cheifgrievances_ID = $row["cheifgrievances_ID"];
                            $cheifgrievances_title = $row["cheifgrievances_title"];
                            $cheifgrievances_title_hindi = $row["cheifgrievances_title_hindi"];
                            $cheifgrievances_content = html_entity_decode($row["cheifgrievances_content"]);
                            $cheifgrievances_content_hindi = html_entity_decode($row["cheifgrievances_content_hindi"]);

                            $response_data .= $cheifgrievances_content;

                        endwhile;
                    else :
                        $response_data .= '<div><h5 class="mb-2 text-black text-center">No Records found !!!</h5></div>';
                    endif;
                    $response_data .= '</div>
        </section>';
                    $response['result_success'] = $response_data;
                else :
                    $response['result_error'] = '<div><h5 class="mb-2 text-success text-center">Complaint ID : #' . $_complaint_id . '</h5><p class="mb-2 fw-bold text-center" style="color: #ff6347;">Already In-Progress in Level 2</p></div>';
                endif;
            endif;
        endif;

        echo json_encode($response);

    endif;

else :
    echo "Request Ignored";
endif;
