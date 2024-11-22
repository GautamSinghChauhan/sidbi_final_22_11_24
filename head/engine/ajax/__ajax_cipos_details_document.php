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
    if ($_GET['type'] == 'show_document') :

        $ID = $_POST['ID'];
        // $LANGUAGE = $_POST['LANGUAGE'];

        // if($LANGUAGE == 'en'):
        // 	$LANGUAGE = '1';
        // elseif($LANGUAGE == 'hi'):
        // 	$LANGUAGE = '2';
        // endif;

?>

        <div class="container">

            <?php
            $list_tenders = sqlQUERY_LABEL("SELECT `cipos_id`, `title_eng`, `title_hindi`, `year` FROM `cipos_orders` WHERE `status`='1' AND `cipos_id` ='$ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

            $count_tenders_count = sqlNUMOFROW_LABEL($list_tenders);
            if ($count_tenders_count > 0) :
                while ($row_tender = sqlFETCHARRAY_LABEL($list_tenders)) :
                    $cipos_id = $row_tender["cipos_id"];
                    $title_eng = $row_tender["title_eng"];
                    $title_hindi = $row_tender["title_hindi"];

                // if($LANGUAGE == '1'):
                // 	$title = $title_eng;
                // elseif($LANGUAGE == '2'):
                // 	$title = $title_hindi;
                // endif;

                endwhile;
            endif;
            ?>
           
            <?php
            $list_tenders_document = sqlQUERY_LABEL("SELECT `cipos_doc_id`,`year`, `document_title_english`, `document_title_hindi`, `document_name` FROM `cipos_orders_document` WHERE `cipos_id` ='$ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
            $count_tenders_document_list_count = sqlNUMOFROW_LABEL($list_tenders_document);
            if ($count_tenders_document_list_count > 0) :

                while ($row_document = sqlFETCHARRAY_LABEL($list_tenders_document)) :
                    $counter++;
                    $cipos_doc_id = $row_document["cipos_doc_id"];
                    $document_title_english = $row_document["document_title_english"];
                    $document_title_hindi = $row_document["document_title_hindi"];
                    $document_name = $row_document["document_name"];
                    $year = $row_document["year"];
            ?>
                    <div class="box-2 features-ul">
                        <div class="card-body p-0 row">
                            <div class="col-md-12 mb-2">
                                <label for="document_title_english" class="form-label">English Title</label>
                                <input type="text" class="form-control" id="document_title_english" name="document_title_english" multiple>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="document_title_hindi" class="form-label">Hindi Title</label>
                                <input type="text" class="form-control" id="document_title_hindi" name="document_title_hindi" multiple>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="documentUpload" class="form-label">Upload Documents</label>
                                <input type="file" class="form-control" id="documentUpload" name="documentUpload" multiple>
                            </div>
                            <div class="col-md-12 mt-3 text-right">
                                <button class="btn btn-secondary" role="button" name="cancel" value="cancel">Cancel</button>
                                <button class="btn btn-success" role="button" name="cancel" value="cancel">Save</button><a href="cpios.ph?route=preview&id' + data + '"></a>
                                <div class="">
                                    <a href="cpios.ph?route=preview&id' + data + '" class="btn btn-outline-secondary" role="button"><span data-translate="backtolist">Back To List</span><i class="fa fa-angle-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                ?>

            <?php endif; ?>
        </div>
        </div>
        </div>
        </div>
        </div>
<?php
    endif;
endif;
?>