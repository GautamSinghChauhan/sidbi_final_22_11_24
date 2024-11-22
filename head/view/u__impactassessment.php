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

	$impactassessment_status = $validation_globalclass->sanitize($_REQUEST['impactassessment_status']);

	if ($impactassessment_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$impactassessment_title = $validation_globalclass->sanitize(ucwords($_REQUEST['impactassessment_title']));
	$impactassessment_year = $validation_globalclass->sanitize(ucwords($_REQUEST['impactassessment_year']));
	$impactassessment_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));
	$impactassessment_description = $validation_globalclass->sanitize(ucwords($_REQUEST['impactassessment_description']));
	$impactassessment_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['description']));
	$impactassessment_url = $validation_globalclass->sanitize($_REQUEST['impactassessment_url']);

	$impactassessment_title = htmlentities($impactassessment_title);
	$impactassessment_description = htmlentities($impactassessment_description);
	


	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/impactassessment/';
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
		$arrFields = array('`impactassessment_title`', '`impactassessment_description`', '`impactassessment_year`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$impactassessment_title", "$impactassessment_description",  "$impactassessment_year", "$choose_document_file_name", "$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`impactassessment_title`', '`impactassessment_description`',  '`impactassessment_year`', '`createdby`', '`status`');
		$arrValues = array("$impactassessment_title", "$impactassessment_description", "$impactassessment_year", "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `impactassessment_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "impactassessment", $arrFields, $arrValues, $sqlWhere)) :
	

		
		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`impactassessment_id`', '`hin_filename`', '`language_id`', '`title`',  '`description`', '`createdby`', '`status`');
			$arrValues_translations = array("$impactassessment_ID", "$choose_document_file_name", "2", "$impactassessment_title_hindi", "$impactassessment_description_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`impactassessment_id`', '`language_id`', '`title`',  '`description`', '`createdby`', '`status`');
			$arrValues_translations = array("$impactassessment_ID", "2", "$impactassessment_title_hindi",  "$impactassessment_description_hindi", "$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `impactassessment_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "impactassessment_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'impactassessment.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `impactassessment_id`, `impactassessment_title`, `impactassessment_description`, `impactassessment_year`, `filename`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `impactassessment` WHERE `deleted` = '0'  AND `impactassessment_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $impactassessment_id = $row["impactassessment_id"];
            $impactassessment_title = $row['impactassessment_title'];
            $impactassessment_description = $row['impactassessment_description'];
            $impactassessment_year = $row['impactassessment_year'];
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
                                <label for="impactassessment_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="impactassessment_status"
                                            id="impactassessment_status" checked="">
                                        <label class="custom-control-label" for="impactassessment_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="impactassessment_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="impactassessment_title"
                                        id="impactassessment_title" value="<?= $impactassessment_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="impactassessment_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $impactassessment_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="impactassessment_description" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_description" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="impactassessment_description"
                                        id="impactassessment_description" value="<?= $impactassessment_description ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="impactassessment_description" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="description" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="<?= $impactassessment_description ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="impactassessment_year" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="impactassessment_year" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="impactassessment_year" id="impactassessment_year"
                                        value="<?= $impactassessment_year ; ?>" required autocomplete="off" />
                                </div>
                            </div>

                           

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