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

	$investor_grievances_status = $validation_globalclass->sanitize($_REQUEST['investor_grievances_status']);

	if ($investor_grievances_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$investor_grievances_title = $validation_globalclass->sanitize(ucwords($_REQUEST['investor_grievances_title']));
	$investor_grievances_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));

	$investor_grievances_url = $validation_globalclass->sanitize($_REQUEST['investor_grievances_url']);

	$investor_grievances_title = htmlentities($investor_grievances_title);
	$investor_grievances_title_hindi = htmlentities($investor_grievances_title_hindi);

	$investor_grievances_date = $validation_globalclass->sanitize($_REQUEST['investor_grievances_date']);
	$investor_grievances_date = dateformat_database($investor_grievances_date);

	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/investor_grievances_document/';
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
		$arrFields = array('`investor_grievances_title`', '`investor_grievances_date`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$investor_grievances_title", "$investor_grievances_date", "$choose_document_file_name","$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`investor_grievances_title`', '`investor_grievances_date`', '`createdby`', '`status`');
		$arrValues = array("$investor_grievances_title", "$investor_grievances_date",   "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `investor_grievances_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "investor_grievances", $arrFields, $arrValues, $sqlWhere)) :
	

		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`investor_grievances_id`', '`hin_filename`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "$choose_document_file_name", "2", "$investor_grievances_title_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`investor_grievances_id`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "2", "$investor_grievances_title_hindi", "$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `investor_grievances_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "investor_grievances_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'investor_grievances.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `investor_grievances_id`, `investor_grievances_title`,  `investor_grievances_date`, `filename`, `sort_order`, `user_id`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `investor_grievances` WHERE `deleted` = '0'  AND `investor_grievances_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $investor_grievances_id = $row["investor_grievances_id"];
            $investor_grievances_title = $row['investor_grievances_title'];
            $investor_grievances_date = $row['investor_grievances_date'];
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
                                <label for="investor_grievances_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="investor_grievances_status"
                                            id="investor_grievances_status" checked="">
                                        <label class="custom-control-label" for="investor_grievances_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="investor_grievances_title" class="form-label">Annual Reports Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="investor_grievances_title"
                                        id="investor_grievances_title" value="<?= $investor_grievances_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="investor_grievances_title" class="form-label">Annual Reports Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $investor_grievances_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row">
								<div class="col-md-2">
									<label for="investor_grievances_date" class="form-label">investor_grievances Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="investor_grievances_date" id="investor_grievances_date" value="<?php echo $investor_grievances_date; ?>" required autocomplete="off" />
								</div>
							</div>
                            <!-- 
							<div class="form-group row">
								<div class="col-md-2">
									<label for="investor_grievances_url" class="form-label">investor_grievances URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" data-parsley-type="url" placeholder="Corporate Governances URL" name="investor_grievances_url" id="investor_grievances_url" value="" required autocomplete="off" />
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