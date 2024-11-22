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
            $LANGUAGE_ID = '1';
        elseif ($LANGUAGE == 'HI') :
            $LANGUAGE_ID = '2';
        else :
            $LANGUAGE_ID = '1';
        endif;
?>
        <section class="press-releases mt-5" data-aos="fade-right" data-aos-duration="2000">
            <div class="container">

                <?php
                $list_careers = sqlQUERY_LABEL("SELECT `career_id`, `career_title`, `career_title_hindi` FROM `careers` WHERE `status`='1' AND `career_id` ='$ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                $count_careers_count = sqlNUMOFROW_LABEL($list_careers);
                if ($count_careers_count > 0) :
                    while ($row_career = sqlFETCHARRAY_LABEL($list_careers)) :
                        $career_id = $row_career["career_id"];
                        $career_title = $row_career["career_title"];
                        $career_title_hindi = $row_career["career_title_hindi"];

                        if ($LANGUAGE == '1') :
                            $title = $career_title;
                        elseif ($LANGUAGE == '2') :
                            $title = $career_title_hindi;
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
                                    <a href="careers" class="btn btn-outline-secondary" role="button"><span data-translate="backtolist">Back To List</span><i class="fa fa-angle-right ms-2"></i></a>
                                </div>
                            </div>
                            <div class="box-2 features-ul">
                                <ul>
                                    <li>
                                        <h3 data-translate="documents">Documents</h3>
                                        <?php
                                        $list_careers_document = sqlQUERY_LABEL("SELECT `career_document_id`, `career_document_name` FROM `js_career_documents` WHERE `career_id` ='$ID' AND `career_document_type` = '1' AND `career_document_language_id` = '$LANGUAGE_ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                        $count_careers_document_list_count = sqlNUMOFROW_LABEL($list_careers_document);
                                        if ($count_careers_document_list_count > 0) :

                                            while ($row_document = sqlFETCHARRAY_LABEL($list_careers_document)) :
                                                $counter++;
                                                $career_document_id = $row_document["career_document_id"];
                                                $career_document_name = $row_document["career_document_name"];
                                        ?>
                                    <li>
                                        <a title="View" target="_blank" href="uploads/careers/<?php echo $career_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $career_document_name; ?></a>
                                    </li>
                                <?php endwhile;
                                        else : ?>
                                <p class="mt-1" data-translate="nodocumentsavaialable">No Documents Available</p>
                            <?php endif; ?>
                            </li>
                            <li>
                                <h3 data-translate="corrigendum">Corrigendum</h3>
                                <?php
                                $list_careers_corrigendum = sqlQUERY_LABEL("SELECT `career_document_id`, `career_document_name` FROM `js_career_documents` WHERE `career_id` ='$ID' AND `career_document_type` = '2' AND `career_document_language_id` = '$LANGUAGE_ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                $count_careers_corrigendum_list_count = sqlNUMOFROW_LABEL($list_careers_corrigendum);
                                if ($count_careers_corrigendum_list_count > 0) :
                                    while ($row_corrigendum = sqlFETCHARRAY_LABEL($list_careers_corrigendum)) :
                                        $counter++;
                                        $career_document_id = $row_corrigendum["career_document_id"];
                                        $career_document_name = $row_corrigendum["career_document_name"];
                                ?>
                            <li>
                                <a title="View" target="_blank" href="uploads/careers/<?php echo $career_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $career_document_name; ?></a>
                            </li>
                        <?php endwhile;
                                else : ?>
                        <p class="mt-1" data-translate="nocorrigendumavaialable">No Corrigendum Available</p>
                    <?php endif; ?>
                    </li>
                    <li>
                        <h3 data-translate="annexure">Annexure</h3>
                        <?php
                        $list_careers_annexure = sqlQUERY_LABEL("SELECT `career_document_id`, `career_document_name` FROM `js_career_documents` WHERE `career_id` ='$ID' AND `career_document_type` = '3' AND `career_document_language_id` = '$LANGUAGE_ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                        $count_careers_annexure_list_count = sqlNUMOFROW_LABEL($list_careers_annexure);
                        if ($count_careers_annexure_list_count > 0) :
                        ?>
                            <?php
                            while ($row_annexure = sqlFETCHARRAY_LABEL($list_careers_annexure)) :
                                $counter++;
                                $career_document_id = $row_annexure["career_document_id"];
                                $career_document_name = $row_annexure["career_document_name"];
                            ?>
                    <li>
                        <a title="View" target="_blank" href="uploads/careers/<?php echo $career_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $career_document_name; ?></a>
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
        <script>
        </script>
<?php
    endif;
endif;
?>