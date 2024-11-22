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
if ($save == "save" || $save_close == "save_close") :

	$status = $validation_globalclass->sanitize($_REQUEST['status']);

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$msmecluster_title = $validation_globalclass->sanitize(ucwords($_REQUEST['msmecluster_title']));
	$msmecluster_hindi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['msmecluster_hindi_title']));
	$msmecluster_description = $validation_globalclass->sanitize(ucwords($_REQUEST['msmecluster_description']));
	$msmecluster_hindi_description = $validation_globalclass->sanitize(ucwords($_REQUEST['msmecluster_hindi_description']));
	$msmecluster_button1 = $validation_globalclass->sanitize(ucwords($_REQUEST['msmecluster_button1']));

	$msmecluster_image = $validation_globalclass->sanitize($_REQUEST['msmecluster_image']);

	$msmecluster_title = htmlentities($msmecluster_title);
	$msmecluster_hindi_title = htmlentities($msmecluster_hindi_title);
	$msmecluster_description = htmlentities($msmecluster_description);
	$msmecluster_hindi_description = htmlentities($msmecluster_hindi_description);

	$msmecluster_button1 = $validation_globalclass->sanitize($_REQUEST['msmecluster_button1']);


	// $home_whatsapp_number = $validation_globalclass->sanitize($_REQUEST['home_whatsapp_number']);

	$fileName =  $_FILES["msmecluster_image"]["name"];

	$file_size = $_FILES['msmecluster_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_msmecluster_image = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_msmecluster_image, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbimsme' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['msmecluster_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = 'uploads/home_pictures/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$msmecluster_image = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["msmecluster_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $msmecluster_image_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$msmecluster_image = $msmecluster_image_old;
	endif;

	//Insert Query
	$arrFields = array('`msmecluster_title`', '`msmecluster_hindi_title`', '`msmecluster_description`', '`msmecluster_hindi_description`', '`msmecluster_button1`', '`msmecluster_image`', '`createdby`', '`status`');

	$arrValues = array("$msmecluster_title", "$msmecluster_hindi_title", "$msmecluster_description", "$msmecluster_hindi_description", "$msmecluster_button1", "$msmecluster_image", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "msme_cluster", $arrFields, $arrValues, '')) :
		$msme_id = sqlINSERTID_LABEL();

		//Insert Query
		// $arrFields_translations = array('`msme_id`', '`language_id`', '`title`', '`description`', '`createdby`', '`status`');

		// $arrValues_translations = array("$msme_id", "2", "$msmecluster_hindi_title", "$msmecluster_hindi_description", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "msme_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'msmecluster_content.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'msmecluster_content.php?code=1'
			</script>
<?php
		endif;
		exit();
	else :

		$err[] =  "Unable to Insert Record";
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
								<button type="submit" name="save" value="save" id="save" class="btn btn-success"><?= $__save ?></button>
								<button type="submit" name="save_close" id="save_close" value="save_close" class="btn btn-success"><?= $__save_close ?></button>
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
										<label class="custom-control-label" for="status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="msmecluster_title" class="form-label">Mame Cluster Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="msmecluster_title" id="msmecluster_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="msmecluster_hindi_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="msmecluster_hindi_title" id="msmecluster_hindi_title" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="msmecluster_description" class="form-label">Msme Cluster Discription<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="msmecluster_description" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="msmecluster_description" id="msmecluster_description" required autocomplete="off"></textarea>
								</div>
								<div class="col-md-5">
									<label for="msmecluster_hindi_description" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="msmecluster_hindi_description" id="msmecluster_hindi_description" required autocomplete="off"></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="home_description" class="form-label"><span class="tx-danger"></span></label>
							</div>
							<div class="col-md-5">
								<label for="msmecluster_button1" class="form-label">Button Label<span class="tx-danger">*</span></label>
								<input type="num" class="form-control" name="msmecluster_button1" id="msmecluster_button1" required autocomplete="off"></input>
							</div>
							
							<!-- <div class="col-md-5">
								<label for="home_whatsapp_number" class="form-label">Msme Image<span class="tx-danger">*</span></label>
								<input class="form-control form-control-sm" name="msmecluster_image" id="msmecluster_image" type="file" value="<?php echo $msmecluster_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="msmecluster_image_old" id="msmecluster_image_old" placeholder="Tutor Attachement" value="<?= $msmecluster_image ?>" autocomplete="off">
							</div> -->
						</div>

						<!-- <div class="form-group row">
							<div class="col-md-6">
								<label for="msmecluster_image" class="control-label">Msme Image<span class="tx-danger"> *</span></label>
								<input class="form-control form-control-sm" name="msmecluster_image" id="msmecluster_image" type="file" value="<?php echo $msmecluster_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="msmecluster_image_old" id="msmecluster_image_old" placeholder="Tutor Attachement" value="<?= $msmecluster_image ?>" autocomplete="off">
							</div>
							<div class="mt-2">
								<span class="mg-l-10 badge badge-sm"><a class="text-white" target="_blank" href="<?= BASEPATH . 'assets/front/home/' . $msmecluster_image; ?>"></a></span>
							</div>


						</div> -->

				</div>
				<!-- End of BASIC -->

				</form>
			</div>
		</div>
	</div>
</div>
<?php
//$aboutcontent_sidebar_view_type = 'create';
//include viewpath('__aboutcontentsidebar.php');
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- content -->