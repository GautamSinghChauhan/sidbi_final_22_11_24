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

    $WORKING_PRDT_ID = $_POST['WORKING_PRDT_ID'];

    $select_workingproduct_details = sqlQUERY_LABEL("SELECT `workingproduct_id`, `workingproduct_key`,  `workingproduct_key_hindi`,  `workingproduct_eligibility`, `workingproduct_eligibility_hindi` FROM `workingproduct` WHERE `status` = '1' and `deleted` = '0' AND `workingproduct_id` = '$WORKING_PRDT_ID'") or die("Unable to get records:" . sqlERROR_LABEL());
    while ($row_workingproduct_data = sqlFETCHARRAY_LABEL($select_workingproduct_details)) :
        $workingproduct_id = $row_workingproduct_data["workingproduct_id"];
        $workingproduct_key = html_entity_decode($row_workingproduct_data["workingproduct_key"]);
        $workingproduct_key_hindi = html_entity_decode($row_workingproduct_data["workingproduct_key_hindi"]);
        $workingproduct_eligibility = html_entity_decode($row_workingproduct_data["workingproduct_eligibility"]);
        $workingproduct_eligibility_hindi = html_entity_decode($row_workingproduct_data["workingproduct_eligibility_hindi"]);
    endwhile;
?>
    <div class="row">
        <div class="col-md-8 working-content">
            <h6 class="working-key-title" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रमुख विशेषताऐं';
                                                else:
                                                 echo   'Key Features';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $workingproduct_key_hindi;
                                                else:
                                                 echo   $workingproduct_key;
                                                endif; ?>
        </div>
        <div class="col-md-4 working-content">
            <h6 class="working-key-title"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'पात्रता';
                                                else:
                                                 echo   'Eligibility';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $workingproduct_eligibility_hindi;
                                                else:
                                                 echo   $workingproduct_eligibility;
                                                endif; ?>
        </div>
    </div>
    <div class="working-apply-head">
        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="working-apply" target="_blank" style="text-decoration:none;" data-translate="apply-now"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
    </div>
<?php
else :
    echo "Request Ignored";
endif;
