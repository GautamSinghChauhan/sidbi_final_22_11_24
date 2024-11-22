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

	$coca_reports_status = $validation_globalclass->sanitize($_REQUEST['coca_reports_status']);

	if ($coca_reports_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$coca_reports_title = $validation_globalclass->sanitize(ucwords($_REQUEST['coca_reports_title']));
	$coca_reports_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));

	$coca_reports_url = $validation_globalclass->sanitize($_REQUEST['coca_reports_url']);

	$coca_reports_title = htmlentities($coca_reports_title);
	$coca_reports_title_hindi = htmlentities($coca_reports_title_hindi);

	$coca_reports_date = $validation_globalclass->sanitize($_REQUEST['coca_reports_date']);
	$coca_reports_date = dateformat_database($coca_reports_date);

	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/coca_reports/';
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
		$arrFields = array('`coca_reports_title`', '`coca_reports_date`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$coca_reports_title", "$coca_reports_date", "$choose_document_file_name","$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`coca_reports_title`', '`coca_reports_date`', '`createdby`', '`status`');
		$arrValues = array("$coca_reports_title", "$coca_reports_date",   "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `coca_reports_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "coca_reports", $arrFields, $arrValues, $sqlWhere)) :
	

		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`coca_reports_id`', '`hin_filename`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "$choose_document_file_name", "2", "$coca_reports_title_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`coca_reports_id`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "2", "$coca_reports_title_hindi", "$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `coca_reports_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "coca_reports_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'coca_reports.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `coca_reports_id`, `coca_reports_title`,  `coca_reports_date`, `filename`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `coca_reports` WHERE `deleted` = '0'  AND `coca_reports_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $coca_reports_id = $row["coca_reports_id"];
            $coca_reports_title = $row['coca_reports_title'];
            $coca_reports_date = $row['coca_reports_date'];
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
                                <label for="coca_reports_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="coca_reports_status"
                                            id="coca_reports_status" checked="">
                                        <label class="custom-control-label" for="coca_reports_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="coca_reports_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="coca_reports_title"
                                        id="coca_reports_title" value="<?= $coca_reports_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="coca_reports_title" class="form-label">Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $coca_reports_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row">
								<div class="col-md-2">
									<label for="coca_reports_date" class="form-label"> Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="coca_reports_date" id="coca_reports_date" value="<?php echo $coca_reports_date; ?>" required autocomplete="off" />
								</div>
							</div>
                            <!-- 
							<div class="form-group row">
								<div class="col-md-2">
									<label for="coca_reports_url" class="form-label">coca_reports URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" data-parsley-type="url" placeholder="Corporate Governances URL" name="coca_reports_url" id="coca_reports_url" value="" required autocomplete="off" />
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