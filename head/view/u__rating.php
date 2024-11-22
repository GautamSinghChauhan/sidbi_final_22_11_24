<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2018-2020 Touchmark De`Science
*
*/
//Dont place PHP Close tag at the bottom
protectpg_includes();
$id = $_GET['id'];

//Insert Operation
if ($save == "update" && $id != '') :

	$rating_status = $validation_globalclass->sanitize($_REQUEST['rating_status']);

	if ($rating_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$rating_title = $validation_globalclass->sanitize(ucwords($_REQUEST['rating_title']));
	$rating_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));
    $rating_agency = $validation_globalclass->sanitize(ucwords($_REQUEST['rating_agency']));
	$rating_agency_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['agency']));
	$rating_subtitle = $validation_globalclass->sanitize(ucwords($_REQUEST['rating_subtitle']));
	$rating_subtitle_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['subtitle']));
	$rating_outlook = $validation_globalclass->sanitize(ucwords($_REQUEST['rating_outlook']));
	$rating_outlook_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['outlook']));

	$rating_url = $validation_globalclass->sanitize($_REQUEST['rating_url']);

	$rating_title = htmlentities($rating_title);
	$rating_title_hindi = htmlentities($rating_title_hindi);

	$rating_date = $validation_globalclass->sanitize($_REQUEST['rating_date']);
	$rating_date = dateformat_database($rating_date);

	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/rating_document/';
		$choose_document_fileName = $_FILES["choose_document"]["name"];
		$fileInfo = pathinfo($choose_document_fileName);
		$choose_document_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['choose_document']['type'];
		$choose_document_file_name = $choose_document_fileName;
		$file_temp_loc  = $_FILES['choose_document']['tmp_name'];
		$file_error_msg = $_FILES['choose_document']['error'];
		$file_size = $_FILES['choose_document']['size'];
		$choose_document_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $choose_document_file_name);
	endif;

	if ($choose_document_move_file) :
		//Insert Query
		$arrFields = array('`rating_title`', '`rating_subtitle`', '`rating_agency`', '`rating_outlook`', '`rating_date`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$rating_title", "$rating_subtitle", "$rating_agency", "$rating_outlook", "$rating_date", "$choose_document_file_name", "$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`rating_title`', '`rating_subtitle`', '`rating_agency`', '`rating_outlook`',  '`rating_date`', '`createdby`', '`status`');
		$arrValues = array("$rating_title", "$rating_subtitle", "$rating_agency", "$rating_outlook", "$rating_date", "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `rating_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "rating", $arrFields, $arrValues, $sqlWhere)) :
	

		
		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`rating_id`', '`hin_filename`', '`language_id`', '`title`', '`subtitle`', '`agency`', '`outlook`', '`createdby`', '`status`');
			$arrValues_translations = array("$rating_ID", "$choose_document_file_name", "2", "$rating_title_hindi",  "$rating_subtitle_hindi",  "$rating_agency_hindi",  "$rating_outlook_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`rating_id`', '`language_id`', '`title`', '`subtitle`', '`agency`', '`outlook`',  '`createdby`', '`status`');
			$arrValues_translations = array("$rating_ID", "2", "$rating_title_hindi",  "$rating_subtitle_hindi",  "$rating_agency_hindi",  "$rating_outlook_hindi","$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `rating_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "rating_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'rating.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `rating_id`, `rating_title`,  `rating_subtitle`,  `rating_agency`,  `rating_outlook`, `rating_date`, `filename`, `sort_order`, `user_id`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `rating` WHERE `deleted` = '0'  AND `rating_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $rating_id = $row["rating_id"];
            $rating_title = $row['rating_title'];
            $rating_title = $row['rating_subtitle'];
            $rating_title = $row['rating_outlook'];
            $rating_title = $row['rating_agency'];
            $rating_date = $row['rating_date'];
            $filename = $row['filename'];
            $status = $row["status"];
        endwhile;
    endif;
endif;
?>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="mg-b-25">

                    <form method="post" enctype="multipart/form-data" data-parsley-validate>

                        <div id="stick-here"></div>
                        <div id="stickThis" class="form-group row mg-b-0">
                            <div class="col-3 col-sm-6">
                                <?php pageCANCEL($currentpage, $__cancel); ?>
                            </div>
                            <div class="col-9 col-sm-6 text-right">
                                <button type="submit" name="save" value="update"
                                    class="btn btn-warning"><?php echo $__update ?></button>
                                                  </div>
                        </div>

                        <!-- BASIC Starting -->
                        <div id="basic">
                            <div class="divider-text"><?= $__hbasicinfo ?></div>
                            <div class="form-group row">
                                <label for="rating_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="rating_status"
                                            id="rating_status" checked="">
                                        <label class="custom-control-label" for="rating_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="rating_title"
                                        id="rating_title" value="<?= $rating_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $rating_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_subtitle" class="form-label">subtitle<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_subtitle" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="rating_subtitle"
                                        id="rating_subtitle" value="<?= $rating_subtitle ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_subtitle" class="form-label">subtitle<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="subtitle" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="subtitle" id="subtitle"
                                        value="<?= $rating_subtitle ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_outlook" class="form-label">outlook<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_outlook" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="rating_outlook"
                                        id="rating_outlook" value="<?= $rating_outlook ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_outlook" class="form-label">outlook<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="outlook" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="outlook" id="outlook"
                                        value="<?= $rating_outlook ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_agency" class="form-label">agency<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_agency" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="rating_agency"
                                        id="rating_agency" value="<?= $rating_agency ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="rating_agency" class="form-label">agency<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="agency" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="agency" id="agency"
                                        value="<?= $rating_agency ; ?>" required autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row">
								<div class="col-md-2">
									<label for="rating_date" class="form-label">rating Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="rating_date" id="rating_date" value="<?php echo $rating_date; ?>" required autocomplete="off" />
								</div>
							</div>
                            <!-- 
							<div class="form-group row">
								<div class="col-md-2">
									<label for="rating_url" class="form-label">rating URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" data-parsley-type="url" placeholder="Corporate Governances URL" name="rating_url" id="rating_url" value="" required autocomplete="off" />
								</div>
							</div> -->

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="choose_document" class="form-label">Choose Document <span
                                            class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <input type="file" class="form-control" name="choose_document" id="choose_document"
                                        autocomplete="off" required />
                                </div>
                            </div>

                        </div>
                        <!-- End of BASIC -->
                    </form>
                </div><!-- row -->
            </div><!-- col -->

            <?php
			//$aboutcontent_sidebar_view_type = 'create';
			//include viewpath('__aboutcontentsidebar.php');
			?>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->