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

//Insert Operation
if ($save == "update") :


	$overview_title = $validation_globalclass->sanitize(ucwords($_REQUEST['overview_title']));
	$overview_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['overview_title_hindi']));
	$overview_description = $validation_globalclass->sanitize(ucwords($_REQUEST['overview_description']));
	$overview_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['overview_description_hindi']));
	$overview_attachement = $validation_globalclass->sanitize($_REQUEST['overview_image']);
	// $overview_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['overview_image']));



	$overviewstatus = $_REQUEST['overviewstatus']; //value='on' == 1 || value='' == 0

	if (
		$overviewstatus == 'on'
	) :
		$overview_status = '1';
	else :
		$overview_status = '0';
	endif;

	$fileName =  $_FILES["overview_image"]["name"];

	$file_size = $_FILES['overview_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_overview_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_overview_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbiabout' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['overview_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = 'uploads/overview_documents/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$overview_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["overview_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $overview_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$overview_attachement = $overview_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`overview_title`', '`overview_title_hindi`', '`overview_description`',  '`overview_description_hindi`', '`overview_image`', '`createdby`', '`status`');

	$arrValues = array("$overview_title", "$overview_title_hindi", "$overview_description", "$overview_description_hindi",  "$overview_attachement", "$logged_user_id", "$overview_status");


	$sqlWhere = " `overview_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "overview", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'overview.php?route=edit'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `overview_ID`, `overview_title`,  `overview_title_hindi`, `overview_description`,  `overview_description_hindi`, `overview_image`, `status` FROM `overview` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$overview_ID = $row["overview_ID"];
		$overview_title = $row['overview_title'];
		$overview_title_hindi = $row['overview_title_hindi'];
		$overview_description = $row['overview_description'];
		$overview_description_hindi = $row['overview_description_hindi'];
		$overview_attachement = $row['overview_image'];
		$status = $row["status"];
	}
}
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
								<?php
								//  pageCANCEL($currentpage, $__cancel); ?>
							</div>
							<div class="col-9 col-sm-6 text-right">
								<button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
								<input type="hidden" name="hidden_overview_ID" value="<?php echo $overview_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="overviewstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="overviewstatus" id="overviewstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="overviewstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="overview_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="overview_title" id="overview_title" required autocomplete="off" value="<?= $overview_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="overview_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="overview_title_hindi" id="overview_title_hindi" required autocomplete="off" value="<?= $overview_title_hindi; ?>" />
								</div>

							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="overview_description" class="form-label">Description<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_description" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="overview_description" id="overview_description" required autocomplete="off"><?= $overview_description; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="overview_description_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="overview_description_hindi" id="overview_description_hindi" required autocomplete="off"><?= $overview_description_hindi; ?></textarea>
								</div>

							</div>


							<div class="form-group row">
							<div class="col-md-2">
								<label for="tutor_attachement" class="control-label">Overview picture<span class="tx-danger"> *</span></label>
							</div>

							<div class="col-md-5">
								<input class="form-control form-control-sm" name="overview_image" id="overview_image" type="file" value="<?php echo $overview_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="overview_image_old" id="overview_image_old" placeholder="Tutor Attachement" value="<?= $overview_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . 'uploads/overview_documents/' . $overview_attachement; ?>">View</a></span>
								</div>
							</div>


							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$overview_sidebar_view_type = 'create';
			include viewpath('__overviewsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->