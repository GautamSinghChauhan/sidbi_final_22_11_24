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

	$announcements_status = $validation_globalclass->sanitize($_REQUEST['announcements_status']);
	if ($announcements_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$announcements_title = $validation_globalclass->sanitize(ucwords($_REQUEST['announcements_title']));
	$announcements_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));

	$announcements_url = $validation_globalclass->sanitize($_REQUEST['announcements_url']);

	$announcements_title = htmlentities($announcements_title);
	$announcements_title_hindi = htmlentities($announcements_title_hindi);

	$announcements_date = $validation_globalclass->sanitize($_REQUEST['announcements_date']);
	$announcements_date = dateformat_database($announcements_date);

	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/announcements/';
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
		$arrFields = array('`announcements_title`', '`announcements_date`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$announcements_title", "$announcements_date", "$choose_document_file_name","$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`announcements_title`', '`announcements_date`', '`createdby`', '`status`');
		$arrValues = array("$announcements_title", "$announcements_date",   "$logged_user_id", "$status");
	endif;
    $sqlWhere = " `announcements_id` = '$id' ";

	if (sqlACTIONS("UPDATE", "announcements", $arrFields, $arrValues, $sqlWhere)) :
	

		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`announcements_id`', '`hin_filename`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "$choose_document_file_name", "2", "$announcements_title_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`announcements_id`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$id", "2", "$announcements_title_hindi", "$logged_user_id", "$status");
		endif;

        $sqlWhere_translations = " `announcements_id` = '$id' ";
	
		if (sqlACTIONS("UPDATE", "announcements_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
			echo "<script type='text/javascript'>window.location = 'announcements.php?code=1'</script>";
		endif;
		
endif;
endif;
if ($route == 'edit') :


	$list_datas = sqlQUERY_LABEL("SELECT `announcements_id`, `announcements_title`,  `announcements_date`, `filename`, `sort_order`, `user_id`, `createdby`, `createdon`, `updatedon`, `deleted`, `status` FROM `announcements` WHERE `deleted` = '0'  AND `announcements_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $announcements_id = $row["announcements_id"];
            $announcements_title = $row['announcements_title'];
            $announcements_date = $row['announcements_date'];
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
                                <label for="announcements_status"
                                    class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="col-form-label custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="announcements_status"
                                            id="announcements_status" checked="">
                                        <label class="custom-control-label" for="announcements_status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="announcements_title" class="form-label">Annual Reports Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="announcements_title"
                                        id="announcements_title" value="<?= $announcements_title ; ?>" required
                                        autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="announcements_title" class="form-label">Annual Reports Title<span
                                            class="tx-danger">*</span></label>
                                </div>

                                <div class="col-md-5">
                                    <label for="title" class="form-label">In Hindi<span
                                            class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        value="<?= $announcements_title ; ?>" required autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group row">
								<div class="col-md-2">
									<label for="announcements_date" class="form-label">announcements Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="announcements_date" id="announcements_date" value="<?php echo $announcements_date; ?>" required autocomplete="off" />
								</div>
							</div>
                            <!-- 
							<div class="form-group row">
								<div class="col-md-2">
									<label for="announcements_url" class="form-label">announcements URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" data-parsley-type="url" placeholder="Corporate Governances URL" name="announcements_url" id="announcements_url" value="" required autocomplete="off" />
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