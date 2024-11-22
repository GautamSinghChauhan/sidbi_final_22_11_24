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

	$workingother_title = $validation_globalclass->sanitize(ucwords($_REQUEST['workingother_title']));
	$workingother_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingother_title_hindi']));
	$workingother_name = $validation_globalclass->sanitize(ucwords($_REQUEST['workingother_name']));
	$workingother_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingother_name_hindi']));
	$workingother_link = $validation_globalclass->sanitize(ucwords($_REQUEST['workingother_link']));

	$workingother_image = $validation_globalclass->sanitize($_REQUEST['workingother_image']);

	// $workingother_title = htmlentities($workingother_title);
	// $workingother_title_hindi = htmlentities($workingother_title_hindi);
	// $workingother_name = htmlentities($workingother_name);
	// $workingother_name_hindi = htmlentities($workingother_name_hindi);

	
	$fileName =  $_FILES["workingother_image"]["name"];

	$file_size = $_FILES['workingother_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_workingother_image = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_workingother_image, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbiworkingother'  . '_' . $new_file_workingother_image;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['workingother_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$workingother_image = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["workingother_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $workingother_image_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$workingother_image = $workingother_image_old;
	endif;

	//Insert Query
	$arrFields = array('`workingother_title`', '`workingother_title_hindi`', '`workingother_name`', '`workingother_name_hindi`', '`workingother_image`',  '`workingother_link`','`createdby`', '`status`');

	$arrValues = array("$workingother_title", "$workingother_title_hindi", "$workingother_name", "$workingother_name_hindi", "$workingother_image", "$workingother_link", "$logged_user_id", "$status");

	// print_r($arrFields);
	// print_r($arrValues);
	// exit;
	
	if (sqlACTIONS("INSERT", "workingother", $arrFields, $arrValues, '')) :
		$home_id = sqlINSERTID_LABEL();

		// //Insert Query
		// $arrFields_translations = array('`home_id`', '`language_id`', '`title`', '`description`', '`createdby`', '`status`');

		// $arrValues_translations = array("$home_id", "2", "$home_title_hindi", "$home_description_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "workingother_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'workingother.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
	           window.location = 'workingother.php?code=1'
			</script>
<?php
		endif;
		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;
?>

<div class="name">
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
								<label for="home_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingother_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingother_title" id="workingother_title" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="workingother_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingother_title_hindi" id="workingother_title_hindi" autocomplete="off" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingother_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="workingother_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="workingother_name" id="workingother_name" required autocomplete="off"></textarea>
								</div>
								<div class="col-md-5">
									<label for="workingother_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="workingother_name_hindi" id="workingother_name_hindi" required autocomplete="off"></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="workingother_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="workingother_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<input class="form-control form-control-sm" name="workingother_image" id="workingother_image" type="file" value="<?php echo $workingother_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="workingother_image_old" id="workingother_image_old" placeholder="Tutor Attachement" value="<?= $workingother_image ?>" autocomplete="off">
								<span class="mg-l-10 badge badge-sm"><a class="text-white" target="_blank" href="<?= BASEPATH . 'assets/front/home/' . $workingother_image; ?>"></a></span>
							</div>
							<div class="col-md-5">
									<label for="workingother_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="workingother_link" id="workingother_link" required autocomplete="off"/>
								</div>

						</div>

				</div>
				<!-- End of BASIC -->

				</form>
			</div>
		</div>
	</div>
</div>
<?php
//$aboutname_sidebar_view_type = 'create';
//include viewpath('__aboutnamesidebar.php');
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- name -->