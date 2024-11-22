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

    $MACHINERY_PRDT_ID = $_POST['MACHINERY_PRDT_ID'];

    $select_machineryproduct_details = sqlQUERY_LABEL("SELECT `machineryproduct_id`, `machineryproduct_key`, `machineryproduct_key_hindi`, `machineryproduct_eligibility`, `machineryproduct_eligibility_hindi` FROM `machineryproduct` WHERE `status` = '1' and `deleted` = '0' AND `machineryproduct_id` = '$MACHINERY_PRDT_ID'") or die("Unable to get records:" . sqlERROR_LABEL());
    while ($row_machineryproduct_data = sqlFETCHARRAY_LABEL($select_machineryproduct_details)) :
        $machineryproduct_id = $row_machineryproduct_data["machineryproduct_id"];
        $machineryproduct_key = html_entity_decode($row_machineryproduct_data["machineryproduct_key"]);
        $machineryproduct_key_hindi = html_entity_decode($row_machineryproduct_data["machineryproduct_key_hindi"]);
        $machineryproduct_eligibility = html_entity_decode($row_machineryproduct_data["machineryproduct_eligibility"]);
        $machineryproduct_eligibility_hindi = html_entity_decode($row_machineryproduct_data["machineryproduct_eligibility_hindi"]);
    endwhile;
?>
    <div class="row">
        <div class="col-md-8 machinaery-content">
            <h6 class="machinery-key-title" data-translate="key-features-express"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रमुख विशेषताऐं';
                                                else:
                                                 echo   'Key Features';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $machineryproduct_key_hindi;
                                                else:
                                                 echo   $machineryproduct_key;
                                                endif; ?>
        </div>
        <div class="col-md-4 machinaery-content">
            <h6 class="machinery-key-title" data-translate="eligibility-express"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'पात्रता';
                                                else:
                                                 echo   'Eligibility';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $machineryproduct_eligibility_hindi;
                                                else:
                                                 echo   $machineryproduct_eligibility;
                                                endif; ?>
        </div>
    </div>
    <div class="machinaery-apply-head">
        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="machinaery-apply" target="_blank" style="text-decoration:none;" data-translate="apply-now"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
    </div>
<?php
else :
    echo "Request Ignored";
endif;
