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
		
		if($LANGUAGE == 'en'):
			$LANGUAGE = '1';
		elseif($LANGUAGE == 'hi'):
			$LANGUAGE = '2';
		endif;
		?>

        <section class="press-releases mt-5" data-aos="fade-right" data-aos-duration="2000">
            <div class="container">

				<?php
				$list_pressreleases = sqlQUERY_LABEL("SELECT `pressrelease_id`, `pressrelease_title`, `pressrelease_title_hindi` FROM `pressreleases` WHERE `status`='1' AND `pressrelease_id` ='$ID'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
				$count_pressreleases_count = sqlNUMOFROW_LABEL($list_pressreleases);
				if ($count_pressreleases_count > 0) :
					while ($row_pressrelease = sqlFETCHARRAY_LABEL($list_pressreleases)) :
						$pressrelease_id = $row_pressrelease["pressrelease_id"];
						$pressrelease_title = $row_pressrelease["pressrelease_title"];
						$pressrelease_title_hindi = $row_pressrelease["pressrelease_title_hindi"];
						
						if($LANGUAGE == '1'):
							$title = $pressrelease_title;
						elseif($LANGUAGE == '2'):
							$title = $pressrelease_title_hindi;
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
									<a href="pressreleases" class="btn btn-outline-secondary" role="button"><span data-translate="backtolist">Back To List</span><i class="fa fa-angle-right ms-2"></i></a>
								</div>
							</div>
                            <div class="box-2 features-ul">
                                <ul>
									<li>
                                    <h3 data-translate="documents">Documents</h3>
                                    <?php
                                    $list_pressreleases_document = sqlQUERY_LABEL("SELECT `pressrelease_document_id`, `pressrelease_document_name` FROM `js_pressrelease_documents` WHERE `pressrelease_id` ='$ID' AND `pressrelease_document_type` = '1' AND `pressrelease_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                    $count_pressreleases_document_list_count = sqlNUMOFROW_LABEL($list_pressreleases_document);
                                    if ($count_pressreleases_document_list_count > 0) :

                                        while ($row_document = sqlFETCHARRAY_LABEL($list_pressreleases_document)) :
                                            $counter++;
                                            $pressrelease_document_id = $row_document["pressrelease_document_id"];
                                            $pressrelease_document_name = $row_document["pressrelease_document_name"];
                                    ?>
                                            <li>
                                                <a title="View" target="_blank" href="uploads/pressreleases/<?php echo $pressrelease_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $pressrelease_document_name; ?></a>
                                            </li>
                                    <?php endwhile;
									else: ?>
										<p class="mt-1" data-translate="nodocumentsavaialable">No Documents Available</p>
                                    <?php endif; ?>
									</li>
									<li>
									<h3 data-translate="corrigendum">Corrigendum</h3>
                                    <?php
                                    $list_pressreleases_corrigendum = sqlQUERY_LABEL("SELECT `pressrelease_document_id`, `pressrelease_document_name` FROM `js_pressrelease_documents` WHERE `pressrelease_id` ='$ID' AND `pressrelease_document_type` = '2' AND `pressrelease_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                    $count_pressreleases_corrigendum_list_count = sqlNUMOFROW_LABEL($list_pressreleases_corrigendum);
                                    if ($count_pressreleases_corrigendum_list_count > 0) :
										while ($row_corrigendum = sqlFETCHARRAY_LABEL($list_pressreleases_corrigendum)) :
                                            $counter++;
                                            $pressrelease_document_id = $row_corrigendum["pressrelease_document_id"];
                                            $pressrelease_document_name = $row_corrigendum["pressrelease_document_name"];
                                    ?>
                                            <li>
                                                <a title="View" target="_blank" href="uploads/pressreleases/<?php echo $pressrelease_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $pressrelease_document_name; ?></a>
                                            </li>
                                    <?php endwhile;
									else: ?>
										<p class="mt-1" data-translate="nocorrigendumavaialable">No Corrigendum Available</p>
                                    <?php endif; ?>
									</li>
                                    <li>
										<h3 data-translate="annexure">Annexure</h3>
                                        <?php
                                        $list_pressreleases_annexure = sqlQUERY_LABEL("SELECT `pressrelease_document_id`, `pressrelease_document_name` FROM `js_pressrelease_documents` WHERE `pressrelease_id` ='$ID' AND `pressrelease_document_type` = '3' AND `pressrelease_document_language_id` = '$LANGUAGE'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                                        $count_pressreleases_annexure_list_count = sqlNUMOFROW_LABEL($list_pressreleases_annexure);
                                        if ($count_pressreleases_annexure_list_count > 0) :
                                        ?>
                                            <?php
                                            while ($row_annexure = sqlFETCHARRAY_LABEL($list_pressreleases_annexure)) :
                                                $counter++;
												$pressrelease_document_id = $row_annexure["pressrelease_document_id"];
												$pressrelease_document_name = $row_annexure["pressrelease_document_name"];
												?>
												<li>
													<a title="View" target="_blank" href="uploads/pressreleases/<?php echo $pressrelease_document_name; ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?= $pressrelease_document_name; ?></a>
												</li>
                                        <?php endwhile;
										else: ?>
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