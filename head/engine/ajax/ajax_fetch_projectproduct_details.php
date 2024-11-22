<?php

/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1z
* Copyright (c) 2010-2023 Touchmark Descience Pvt Ltd
*
*/

include_once('../../jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    $PROJECT_PRDT_ID = $_POST['PROJECT_PRDT_ID'];

    $select_projectproduct_details = sqlQUERY_LABEL("SELECT `projectproduct_id`, `projectproduct_key`, `projectproduct_key_hindi`, `projectproduct_eligibility`, `projectproduct_eligibility_hindi` FROM `projectproduct` WHERE `status` = '1' and `deleted` = '0' AND `projectproduct_id` = '$PROJECT_PRDT_ID'") or die("Unable to get records:" . sqlERROR_LABEL());
    while ($row_projectproduct_data = sqlFETCHARRAY_LABEL($select_projectproduct_details)) :
        $projectproduct_id = $row_projectproduct_data["projectproduct_id"];
        $projectproduct_key = html_entity_decode($row_projectproduct_data["projectproduct_key"]);
        $projectproduct_key_hindi = html_entity_decode($row_projectproduct_data["projectproduct_key_hindi"]);
        $projectproduct_eligibility = html_entity_decode($row_projectproduct_data["projectproduct_eligibility"]);
        $projectproduct_eligibility_hindi = html_entity_decode($row_projectproduct_data["projectproduct_eligibility_hindi"]);
    endwhile;
?>
    <div class="row">
        <div class="col-md-8 project-content">
            <h6 class="project-key-title"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रमुख विशेषताऐं';
                                                else:
                                                 echo   'Key Features';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projectproduct_key_hindi;
                                                else:
                                                 echo   $projectproduct_key;
                                                endif; ?>
        </div>
        <div class="col-md-4 project-content">
            <h6 class="project-key-title" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'पात्रता';
                                                else:
                                                 echo   'Eligibility';
                                                endif; ?></h6>
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projectproduct_eligibility_hindi;
                                                else:
                                                 echo   $projectproduct_eligibility;
                                                endif; ?>
        </div>
    </div>
    <div class="project-apply-head">
        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="project-apply" target="_blank" style="text-decoration:none;" data-translate="apply-now"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
    </div>
<?php
else :
    echo "Request Ignored";
endif;
