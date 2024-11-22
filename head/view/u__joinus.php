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


	
	$joinus_content = $validation_globalclass->sanitize(ucwords($_REQUEST['joinus_content']));
	$joinus_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['joinus_content_hindi']));
	$joinus_attachement = $validation_globalclass->sanitize($_REQUEST['joinus_image']);
	// $joinus_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['joinus_image']));



	$joinusstatus = $_REQUEST['joinusstatus']; //value='on' == 1 || value='' == 0

	if (
		$joinusstatus == 'on'
	) :
		$joinus_status = '1';
	else :
		$joinus_status = '0';
	endif;

	$fileName =  $_FILES["joinus_image"]["name"];

	$file_size = $_FILES['joinus_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_joinus_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_joinus_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbijoinus' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['joinus_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$joinus_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["joinus_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $joinus_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$joinus_attachement = $joinus_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`joinus_content`',  '`joinus_content_hindi`', '`joinus_image`', '`createdby`', '`status`');

	$arrValues = array("$joinus_content", "$joinus_content_hindi",  "$joinus_attachement", "$logged_user_id", "$joinus_status");


	$sqlWhere = " `joinus_id` = '1' ";

	if (sqlACTIONS("UPDATE", "joinus", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'joinus.php?route=edit'
		</script>
<?php
		//header("Location:joinus.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `joinus_id`, `joinus_content`,  `joinus_content_hindi`, `joinus_image`, `status` FROM `joinus` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$joinus_id = $row["joinus_id"];
		$joinus_content = $row['joinus_content'];
		$joinus_content_hindi = $row['joinus_content_hindi'];
		$joinus_attachement = $row['joinus_image'];
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
								<input type="hidden" name="hidden_joinus_id" value="<?php echo $joinus_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="joinusstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="joinusstatus" id="joinusstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="joinusstatus">Yes</label>
									</div>
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="joinus_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="joinus_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="joinus_content" id="joinus_content" required autocomplete="off"><?= $joinus_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="joinus_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="joinus_content_hindi" id="joinus_content_hindi" required autocomplete="off"><?= $joinus_content_hindi; ?></textarea>
								</div>

							</div>


							<div class="form-group row">
							<div class="col-md-2">
								<label for="tutor_attachement" class="control-label">joinus picture<span class="tx-danger"> *</span></label>
							</div>

							<div class="col-md-5">
								<input class="form-control form-control-sm" name="joinus_image" id="joinus_image" type="file" value="<?php echo $joinus_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="joinus_image_old" id="joinus_image_old" placeholder="Tutor Attachement" value="<?= $joinus_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $joinus_attachement; ?>">View</a></span>
								</div>
							</div>


							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$joinus_sidebar_view_type = 'create';
			include viewpath('__joinussidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->