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

	$sectoral_status = $validation_globalclass->sanitize($_REQUEST['sectoral_status']);

	if ($sectoral_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$sectoral_title = $validation_globalclass->sanitize(ucwords($_REQUEST['sectoral_title']));
	$sectoral_year = $validation_globalclass->sanitize(ucwords($_REQUEST['sectoral_year']));
	$sectoral_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));
	$sectoral_description = $validation_globalclass->sanitize(ucwords($_REQUEST['sectoral_description']));
	$sectoral_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['description']));
	$sectoral_url = $validation_globalclass->sanitize($_REQUEST['sectoral_url']);

	$sectoral_title = htmlentities($sectoral_title);
	$sectoral_description = htmlentities($sectoral_description);
	


	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/sectoral/';
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
		$arrFields = array('`sectoral_title`', '`sectoral_description`', '`sectoral_year`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$sectoral_title", "$sectoral_description",  "$sectoral_year", "$choose_document_file_name", "$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`sectoral_title`', '`sectoral_description`',  '`sectoral_year`', '`createdby`', '`status`');
		$arrValues = array("$sectoral_title", "$sectoral_description", "$sectoral_year", "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `sectoral_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "sectoral", $arrFields, $arrValues, $sqlWhere)) :
	

		
		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`sectoral_id`', '`hin_filename`', '`language_id`', '`title`',  '`description`', '`createdby`', '`status`');
			$arrValues_translations = array("$sectoral_ID", "$choose_document_file_name", "2", "$sectoral_title_hindi", "$sectoral_description_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`sectoral_id`', '`language_id`', '`title`',  '`description`', '`createdby`', '`status`');
			$arrValues_translations = array("$sectoral_ID", "2", "$sectoral_title_hindi",  "$sectoral_description_hindi", "$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `sectoral_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "sectoral_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'sectoral.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `sectoral_id`, `sectoral_title`, `sectoral_description`, `sectoral_year`, `filename`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `sectoral` WHERE `deleted` = '0'  AND `sectoral_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $sectoral_id = $row["sectoral_id"];
            $sectoral_title = $row['sectoral_title'];
            $sectoral_description = $row['sectoral_description'];
            $sectoral_year = $row['sectoral_year'];
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
                                <label for="sectoral_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="sectoral_status"
                                            id="sectoral_status" checked="">
                                        <label class="custom-control-label" for="sectoral_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="sectoral_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="sectoral_title"
                                        id="sectoral_title" value="<?= $sectoral_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="sectoral_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $sectoral_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="sectoral_description" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_description" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="sectoral_description"
                                        id="sectoral_description" value="<?= $sectoral_description ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="sectoral_description" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="description" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="description" id="description"
                                        value="<?= $sectoral_description ; ?>" required autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="sectoral_year" class="form-label">description<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="sectoral_year" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="sectoral_year" id="sectoral_year"
                                        value="<?= $sectoral_year ; ?>" required autocomplete="off" />
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