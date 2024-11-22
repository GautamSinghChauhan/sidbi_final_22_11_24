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

	$latestdevelopment_title = $validation_globalclass->sanitize(ucwords($_REQUEST['latestdevelopment_title']));
	$latestdevelopment_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['latestdevelopment_title_hindi']));
	$latestdevelopment_date = $validation_globalclass->sanitize(ucwords($_REQUEST['latestdevelopment_date']));
	$latestdevelopment_date = dateformat_database($latestdevelopment_date);
	$latestdevelopment_image = $validation_globalclass->sanitize($_REQUEST['latestdevelopment_image']);
	$latestdevelopment_count = $validation_globalclass->sanitize($_REQUEST['latestdevelopment_count']);
	
	$latestdevelopment_title = htmlentities($latestdevelopment_title);
	$latestdevelopment_title_hindi = htmlentities($latestdevelopment_title_hindi);

	$fileName =  $_FILES["latestdevelopment_image"]["name"];

	$file_size = $_FILES['latestdevelopment_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_latestdevelopment_image = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_latestdevelopment_image, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbilatestdevelopment' . '_' .  $new_file_latestdevelopment_image;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['latestdevelopment_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$latestdevelopment_image = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["latestdevelopment_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $latestdevelopment_image_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$latestdevelopment_image = $latestdevelopment_image_old;
	endif;

	//Insert Query
	$arrFields = array('`latestdevelopment_title`', '`latestdevelopment_title_hindi`', '`latestdevelopment_date`', '`latestdevelopment_image`', '`latestdevelopment_count`', '`createdby`', '`status`');

	$arrValues = array("$latestdevelopment_title", "$latestdevelopment_title_hindi", "$latestdevelopment_date",  "$latestdevelopment_image",
	"$latestdevelopment_count", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "latestdevelopment", $arrFields, $arrValues, '')) :
		$latestdevelopment_id = sqlINSERTID_LABEL();

		// //Insert Query
		// $arrFields_translations = array('`latestdevelopment_id`', '`language_id`', '`title`', '`description`', '`createdby`', '`status`');

		// $arrValues_translations = array("$latestdevelopment_id", "2", "$latestdevelopment_title_hindi", "$latestdevelopment_description_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "latestdevelopment_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'latestdevelopment.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'latestdevelopment.php?code=1'
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
									<label for="latestdevelopment_title" class="form-label">latestdevelopment Title<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="latestdevelopment_title" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="latestdevelopment_title" id="latestdevelopment_title"  autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="latestdevelopment_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="latestdevelopment_title_hindi" id="latestdevelopment_title_hindi"  autocomplete="off" />
								</div>
							</div>


						<div class="form-group row">
							<div class="col-md-2">
								<label for="latestdevelopment_image" class="control-label">latestdevelopment Image and link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="latestdevelopment_image" class="form-label">Image<span class="tx-danger">*</span></label>
								<input class="form-control form-control-sm" name="latestdevelopment_image" id="latestdevelopment_image" type="file" value="<?php echo $latestdevelopment_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="latestdevelopment_image_old" id="latestdevelopment_image_old" placeholder="Tutor Attachement" value="<?= $latestdevelopment_image ?>" autocomplete="off">
						
								<span class="mg-l-10 badge badge-sm"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $latestdevelopment_image; ?>"></a></span>
							</div>

							<div class="col-md-5">
									<label for="latestdevelopment_date" class="form-label">Date<span class="tx-danger">*</span></label>
							
									<input type="date" class="form-control" placeholder="DD/MM/YYYY" name="latestdevelopment_date" id="latestdevelopment_date" value="<?php echo $latestdevelopment_date ; ?>" required autocomplete="off" />
								</div>
						</div>
						<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="latestdevelopment_count" class="form-label">Count<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="latestdevelopment_count" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="latestdevelopment_count" id="latestdevelopment_count"  autocomplete="off" />
								</div>
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