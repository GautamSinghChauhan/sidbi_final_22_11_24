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
        $LANGUAGE = $_POST['LANGUAGE'];

        if ($LANGUAGE == 'EN') :
            $LANGUAGE = '1';
        elseif ($LANGUAGE == 'HI') :
            $LANGUAGE = '2';
        else :
            $LANGUAGE = '1';
        endif;

?>

        <section class="press-releases mt-5" data-aos="fade-right" data-aos-duration="2000">
            <div class="container">

                <?php
                $list_tenders = sqlQUERY_LABEL("SELECT `tender_id`, `tender_title`, `tender_title_hindi` FROM `tenders` WHERE `status`='1' AND `tender_id` ='$ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

                $count_tenders_count = sqlNUMOFROW_LABEL($list_tenders);
                if ($count_tenders_count > 0) :
                    while ($row_tender = sqlFETCHARRAY_LABEL($list_tenders)) :
                        $tender_id = $row_tender["tender_id"];
                        $tender_title = html_entity_decode(html_entity_decode($row_tender["tender_title"]));
                        $tender_title_hindi = $row_tender["tender_title_hindi"];

                        if ($LANGUAGE == '1') :
                            $title = $tender_title;
                        elseif ($LANGUAGE == '2') :
                            $title = $tender_title_hindi;
                        endif;
                    endwhile;
                endif;
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="title-content bold-title with-underline green">
                            <div class="d-flex justify-content-between">
                                <h2><?= $title; ?></h2>
                                <div class="">
                                    <a href="tenders" class="btn btn-outline-secondary" role="button"><span data-translate="backtolist">Back To List</span><i class="fa fa-angle-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="box-2 features-ul">
                                <ul>
                                    <li>
                                        <h3 data-translate="documents">Documents</h3>
                                        <?php
                                        $list_tenders_document = sqlQUERY_LABEL("SELECT `tender_document_id`, `tender_document_name` FROM `js_tender_documents` WHERE `tender_id` ='$ID' AND `tender_document_type` = '1' AND `tender_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                        $count_tenders_document_list_count = sqlNUMOFROW_LABEL($list_tenders_document);
                                        if ($count_tenders_document_list_count > 0) :

                                            while ($row_document = sqlFETCHARRAY_LABEL($list_tenders_document)) :
                                                $counter++;
                                                $tender_document_id = $row_document["tender_document_id"];
                                                $tender_document_name = $row_document["tender_document_name"];
                                        ?>
                                    <li>
                                        <a title="View" target="_blank" href="<?= SEOURL; ?>/uploads/tenders/<?= $tender_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $tender_document_name; ?></a>
                                    </li>
                                <?php endwhile;
                                        else : ?>
                                <p class="mt-1" data-translate="nodocumentsavaialable">No Documents Available</p>
                            <?php endif; ?>
                            </li>
                            <li>
                                <h3 data-translate="corrigendum">Corrigendum</h3>
                                <?php
                                $list_tenders_corrigendum = sqlQUERY_LABEL("SELECT `tender_document_id`, `tender_document_name` FROM `js_tender_documents` WHERE `tender_id` ='$ID' AND `tender_document_type` = '2' AND `tender_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                $count_tenders_corrigendum_list_count = sqlNUMOFROW_LABEL($list_tenders_corrigendum);
                                if ($count_tenders_corrigendum_list_count > 0) :
                                    while ($row_corrigendum = sqlFETCHARRAY_LABEL($list_tenders_corrigendum)) :
                                        $counter++;
                                        $tender_document_id = $row_corrigendum["tender_document_id"];
                                        $tender_document_name = $row_corrigendum["tender_document_name"];
                                ?>
                            <li>
                                <a title="View" target="_blank" href="uploads/tenders/<?= $tender_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $tender_document_name; ?></a>
                            </li>
                        <?php endwhile;
                                else : ?>
                        <p class="mt-1" data-translate="nocorrigendumavaialable">No Corrigendum Available</p>
                    <?php endif; ?>
                    </li>
                    <li>
                        <h3 data-translate="annexure">Annexure</h3>
                        <?php
                        $list_tenders_annexure = sqlQUERY_LABEL("SELECT `tender_document_id`, `tender_document_name` FROM `js_tender_documents` WHERE `tender_id` ='$ID' AND `tender_document_type` = '3' AND `tender_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                        $count_tenders_annexure_list_count = sqlNUMOFROW_LABEL($list_tenders_annexure);
                        if ($count_tenders_annexure_list_count > 0) :
                        ?>
                            <?php
                            while ($row_annexure = sqlFETCHARRAY_LABEL($list_tenders_annexure)) :
                                $counter++;
                                $tender_document_id = $row_annexure["tender_document_id"];
                                $tender_document_name = $row_annexure["tender_document_name"];
                            ?>
                    <li>
                        <a title="View" target="_blank" href="uploads/tenders/<?php echo $tender_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $tender_document_name; ?></a>
                    </li>
                <?php endwhile;
                        else : ?>
                <p class="mt-1" data-translate="noannexureavaialable">No Annexure Available</p>
            <?php endif;
            ?>
            </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    endif;
endif;
?>