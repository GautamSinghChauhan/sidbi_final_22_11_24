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


	$shareholderabout_title = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholderabout_title']));
	$shareholderabout_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholderabout_title_hindi']));
	$shareholderabout_description = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholderabout_description']));
	$shareholderabout_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholderabout_description_hindi']));
	$shareholderabout_attachement = $validation_globalclass->sanitize($_REQUEST['shareholderabout_image']);
	// $shareholderabout_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholderabout_image']));



	$shareholderaboutstatus = $_REQUEST['shareholderaboutstatus']; //value='on' == 1 || value='' == 0

	if (
		$shareholderaboutstatus == 'on'
	) :
		$shareholderabout_status = '1';
	else :
		$shareholderabout_status = '0';
	endif;

	$fileName =  $_FILES["shareholderabout_image"]["name"];

	$file_size = $_FILES['shareholderabout_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_shareholderabout_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_shareholderabout_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbishare' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['shareholderabout_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$shareholderabout_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["shareholderabout_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $shareholderabout_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$shareholderabout_attachement = $shareholderabout_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`shareholderabout_title`', '`shareholderabout_title_hindi`', '`shareholderabout_description`',  '`shareholderabout_description_hindi`', '`shareholderabout_image`', '`createdby`', '`status`');

	$arrValues = array("$shareholderabout_title", "$shareholderabout_title_hindi", "$shareholderabout_description", "$shareholderabout_description_hindi",  "$shareholderabout_attachement", "$logged_user_id", "$shareholderabout_status");


	$sqlWhere = " `shareholderabout_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "shareholderabout", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'shareholderabout.php?route=edit'
		</script>
<?php
		//header("Location:shareholderabout.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `shareholderabout_ID`, `shareholderabout_title_hindi`,  `shareholderabout_title`,  `shareholderabout_description`, `shareholderabout_description_hindi`,  `shareholderabout_image`, `status` FROM `shareholderabout` where deleted = '0' and status = '1' and `shareholderabout_ID`='1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
	
	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$shareholderabout_ID = $row["shareholderabout_ID"];
		$shareholderabout_title = $row['shareholderabout_title'];
		$shareholderabout_title_hindi = $row['shareholderabout_title_hindi'];
		$shareholderabout_description = $row['shareholderabout_description'];
		$shareholderabout_description_hindi = $row['shareholderabout_description_hindi'];
		$shareholderabout_attachement = $row['shareholderabout_image'];
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
								<input type="hidden" name="hidden_shareholderabout_ID" value="<?php echo $shareholderabout_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="shareholderaboutstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="shareholderaboutstatus" id="shareholderaboutstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="shareholderaboutstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="shareholderabout_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="shareholderabout_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="shareholderabout_title" id="shareholderabout_title" required autocomplete="off" value="<?= $shareholderabout_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="shareholderabout_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="shareholderabout_title_hindi" id="shareholderabout_title_hindi" required autocomplete="off" value="<?= $shareholderabout_title_hindi; ?>" />
								</div>

							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="shareholderabout_description" class="form-label">Description<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="shareholderabout_description" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="shareholderabout_description" id="shareholderabout_description" required autocomplete="off"><?= $shareholderabout_description; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="shareholderabout_description_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="shareholderabout_description_hindi" id="shareholderabout_description_hindi" required autocomplete="off"><?= $shareholderabout_description_hindi; ?></textarea>
								</div>

							</div>


							<div class="form-group row">
							<div class="col-md-2">
								<label for="tutor_attachement" class="control-label">shareholderabout picture<span class="tx-danger"> *</span></label>
							</div>

							<div class="col-md-5">
								<input class="form-control form-control-sm" name="shareholderabout_image" id="shareholderabout_image" type="file" value="<?php echo $shareholderabout_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="shareholderabout_image_old" id="shareholderabout_image_old" placeholder="Tutor Attachement" value="<?= $shareholderabout_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $shareholderabout_attachement; ?>">View</a></span>
								</div>
							</div>
							</div>
						</div>
					</form>
				</div><!-- row -->
			</div><!-- col -->

			<?php
			$shareholderabout_sidebar_view_type = 'create';
			include viewpath('__shareholderaboutsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->