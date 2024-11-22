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

	$homeproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['homeproduct_title']));
	$homeproduct_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['homeproduct_title_hindi']));

	$homeproduct_button1 = $validation_globalclass->sanitize(ucwords($_REQUEST['homeproduct_button1']));
	$homeproduct_button2 = $validation_globalclass->sanitize(ucwords($_REQUEST['homeproduct_button2']));

	$homeproduct_image = $validation_globalclass->sanitize($_REQUEST['homeproduct_image']);

	$homeproduct_title = htmlentities($homeproduct_title);
	$homeproduct_title_hindi = htmlentities($homeproduct_title_hindi);


	$fileName =  $_FILES["homeproduct_image"]["name"];

	$file_size = $_FILES['homeproduct_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_homeproduct_image = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_homeproduct_image, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbihomeproduct' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['homeproduct_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$homeproduct_image = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["homeproduct_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $homeproduct_image_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$homeproduct_image = $homeproduct_image_old;
	endif;

	//Insert Query
	$arrFields = array('`homeproduct_title`', '`homeproduct_title_hindi`', '`homeproduct_button1`', '`homeproduct_button2`', '`homeproduct_image`', '`createdby`', '`status`');

	$arrValues = array("$homeproduct_title", "$homeproduct_title_hindi","$homeproduct_button1","$homeproduct_button1", "$homeproduct_image", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "homeproduct", $arrFields, $arrValues, '')) :
		$homeproduct_id = sqlINSERTID_LABEL();

		// //Insert Query
		// $arrFields_translations = array('`homeproduct_id`', '`language_id`', '`title`', '`description`', '`createdby`', '`status`');

		// $arrValues_translations = array("$homeproduct_id", "2", "$homeproduct_title_hindi", "$homeproduct_description_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "homeproduct_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'homeproduct.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'homeproduct.php?code=1'
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
									<label for="homeproduct_title" class="form-label">Homeproduct Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="homeproduct_title" id="homeproduct_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="homeproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="homeproduct_title_hindi" id="homeproduct_title_hindi" required autocomplete="off" />
								</div>
							</div>
						<div class="form-group row align-items-end">
							<div class="col-md-2">
								<label for="button" class="form-label">Buttons<span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-5">
								<label for="homeproduct_button1" class="form-label">Button Label One<span class="tx-danger">*</span></label>
								<input type="num" class="form-control" name="homeproduct_button1" id="homeproduct_button1" required autocomplete="off"></input>
							</div>
							<div class="col-md-5">
								<label for="homeproduct_button2" class="form-label">Button Label Two<span class="tx-danger">*</span></label>
								<input type="num" class="form-control" name="homeproduct_button2" id="homeproduct_button2" required autocomplete="off"></input>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="homeproduct_image" class="control-label">homeproduct Image<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="homeproduct_image" class="control-label">homeproduct Image<span class="tx-danger"> *</span></label>
								<input class="form-control form-control-sm" name="homeproduct_image" id="homeproduct_image" type="file" value="<?php echo $homeproduct_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="homeproduct_image_old" id="homeproduct_image_old" placeholder="Tutor Attachement" value="<?= $homeproduct_image ?>" autocomplete="off">
							</div>
							<div class="mt-2">
								<span class="mg-l-10 badge badge-sm"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $homeproduct_image; ?>"></a></span>
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
//$aboutcontent_sidebar_view_type = 'create';
//include viewpath('__aboutcontentsidebar.php');
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- content -->