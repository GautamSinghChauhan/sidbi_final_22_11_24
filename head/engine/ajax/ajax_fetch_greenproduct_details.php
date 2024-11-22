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

    $GREEN_PRDT_ID = $_POST['GREEN_PRDT_ID'];

    $select_greenproduct_details = sqlQUERY_LABEL("SELECT `greenproduct_id`, `greenproduct_key`,  `greenproduct_key_hindi`,`greenproduct_eligibility` ,`greenproduct_eligibility_hindi` FROM `greenproduct` WHERE `status` = '1' and `deleted` = '0' AND `greenproduct_id` = '$GREEN_PRDT_ID'") or die("Unable to get records:" . sqlERROR_LABEL());
    while ($row_greenproduct_data = sqlFETCHARRAY_LABEL($select_greenproduct_details)) :
        $greenproduct_id = $row_greenproduct_data["greenproduct_id"];
        $greenproduct_key = html_entity_decode($row_greenproduct_data["greenproduct_key"]);
        $greenproduct_key_hindi = html_entity_decode($row_greenproduct_data["greenproduct_key_hindi"]);
        $greenproduct_eligibility = html_entity_decode($row_greenproduct_data["greenproduct_eligibility"]);
        $greenproduct_eligibility_hindi = html_entity_decode($row_greenproduct_data["greenproduct_eligibility_hindi"]);
    endwhile;
?>
    <div class="row">
        <div class="col-md-8 green-content">
            <h6 class="green-key-title" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रमुख विशेषताऐं';
                                                else:
                                                 echo   'Key Features';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $greenproduct_key_hindi;
                                                else:
                                                 echo   $greenproduct_key;
                                                endif; ?>
        </div>
        <div class="col-md-4 green-content">
            <h6 class="green-key-title"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'पात्रता';
                                                else:
                                                 echo   'Eligibility';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $greenproduct_eligibility_hindi;
                                                else:
                                                 echo   $greenproduct_eligibility;
                                                endif; ?>
        </div>
    </div>
    <div class="green-apply-head">
        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="green-apply" target="_blank" style="text-decoration:none;" data-translate="apply-now"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
    </div>
<?php
else :
    echo "Request Ignored";
endif;
