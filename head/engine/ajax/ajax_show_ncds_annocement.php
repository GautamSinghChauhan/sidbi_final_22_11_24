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

        $ncd_year = $_POST['ncd_year'];
        $ncd_month = $_POST['ncd_month'];
        $_category_ID = $_POST['ID'];

        if ($ncd_year && empty($ncd_month)) :
            $filter_by_fy_range = " AND YEAR(`disclosures_record_date`) = '$ncd_year' ";
        elseif ($ncd_year && $ncd_month) :
            $filter_by_fy_range = " AND YEAR(`disclosures_record_date`) = '$ncd_year' AND MONTH(`disclosures_record_date`) = '$ncd_month' ";
        endif;

        $list_of_periodic_discloser_record = sqlQUERY_LABEL("SELECT `title`, `disclosures_document`, `disclosures_isin`, `disclosures_record_date` FROM `disclosures` WHERE `status` = '1' and `disclosure_category_id` = '$_category_ID' {$filter_by_fy_range}") or die("#UNABLE_TO_GET_PERIODIC_DISCLOSER :" . sqlERROR_LABEL());
        $num_of_periodic_discloser_rows = sqlNUMOFROW_LABEL($list_of_periodic_discloser_record);
        if ($num_of_periodic_discloser_rows > 0) :
            while ($row = sqlFETCHARRAY_LABEL($list_of_periodic_discloser_record)) :
                $counter_periodic_discloser++;
                $title = $row["title"];
                $disclosures_document = $row["disclosures_document"];
                $disclosures_isin = $row["disclosures_isin"];
                $disclosures_record_date = $row["disclosures_record_date"];
                $response_data .= '<tr>
                        <td>' . $disclosures_isin . '</td>
                        <td>' . dateformat_datepicker($disclosures_record_date) . '</td>
                        <td><a href="uploads/uploads/lodrDisclosure/' . $disclosures_document . '" target="_blank" title="SIDBI Document">' . $disclosures_isin . '</a></td>
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
