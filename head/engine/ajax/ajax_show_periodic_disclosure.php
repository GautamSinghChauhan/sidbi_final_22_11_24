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

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'show_form') :

        $response = [];

        $selected_fy_year = $_POST['selectedFyYear'];
        $selected_quarter = $_POST['selectedQuarter'];

        if ($selected_fy_year) :
            $get_fy_starting = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_starting');
            $get_fy_ending = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_ending');
        endif;

        //selected_quarter 1 - 30-June | 2 - 30-September | 3 - 31-December | 4 - 31-March 
        $startDate = '';
        $endDate = '';

        // Determine start and end dates based on selected quarter
        if ($selected_quarter == 1) :
            // For quarter 1 (up to June 30)
            $startDate = $get_fy_starting;
            $endDate = date('Y-m-d', strtotime($get_fy_starting . ' + 3 months - 1 day'));
        elseif ($selected_quarter == 2) :
            // For quarter 2 (up to September 30)
            $startDate = date('Y-m-d', strtotime($get_fy_starting . ' + 3 months'));
            $endDate = date('Y-m-d', strtotime($get_fy_starting . ' + 6 months - 1 day'));
        elseif ($selected_quarter == 3) :
            // For quarter 3 (up to December 31)
            $startDate = date('Y-m-d', strtotime($get_fy_starting . ' + 6 months'));
            $endDate = date('Y-m-d', strtotime($get_fy_starting . ' + 9 months - 1 day'));
        elseif ($selected_quarter == 4) :
            // For quarter 4 (up to March 31)
            $startDate = date('Y-m-d', strtotime($get_fy_starting . ' + 9 months'));
            $endDate = $get_fy_ending;
        endif;

        if ($selected_fy_year && $selected_quarter) :
            $filter_by_fy_range = " AND `disclosures_record_date` BETWEEN '$startDate' AND '$endDate' ";
        elseif ($selected_fy_year && empty($selected_quarter)) :
            $filter_by_fy_range = " AND `disclosures_record_date` BETWEEN '$get_fy_starting' AND '$get_fy_ending' ";
        endif;

        $list_of_periodic_discloser_record = sqlQUERY_LABEL("SELECT `title`, `disclosures_document`, `disclosures_isin` FROM `disclosures` WHERE `status` = '1' and `disclosure_category_id` = '1' {$filter_by_fy_range}") or die("#UNABLE_TO_GET_PERIODIC_DISCLOSER :" . sqlERROR_LABEL());
        $num_of_periodic_discloser_rows = sqlNUMOFROW_LABEL($list_of_periodic_discloser_record);
        if ($num_of_periodic_discloser_rows > 0) :
            while ($row = sqlFETCHARRAY_LABEL($list_of_periodic_discloser_record)) :
                $counter_periodic_discloser++;
                $title = $row["title"];
                $disclosures_document = $row["disclosures_document"];
                $disclosures_isin = $row["disclosures_isin"];
                $response_data .= '<tr>
                        <td>' . $counter_periodic_discloser . '</td>
                        <td>' . $title . '</td>
                        <td><a href="uploads/uploads/lodrDisclosure/' . $disclosures_document . '" target="_blank" title="SIDBI Working Report FY 2022">
                                <i class="fa fa-cloud-download"></i>
                            </a></td>
                    </tr>';
            endwhile;
        else :
            $response_data .= '<tr>
                <td colspan="3" class="text-center">No Records found !!!</td>
            </tr>';
        endif;

        echo $response_data;

    endif;
else :
    echo "Request Ignored";
endif;
