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

	$subsidiary_title = $validation_globalclass->sanitize(ucwords($_REQUEST['subsidiary_title']));
	$subsidiary_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['subsidiary_title_hindi']));
	$subsidiary_description = ($_REQUEST['subsidiary_description']);
	$subsidiary_description_hindi = ($_REQUEST['subsidiary_description_hindi']);

	$subsidiaryimpact_title = $validation_globalclass->sanitize(ucwords($_REQUEST['subsidiaryimpact_title']));
	$subsidiaryimpact_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['subsidiaryimpact_title_hindi']));
	$subsidiaryimpact_description = ($_REQUEST['subsidiaryimpact_description']);
	$subsidiaryimpact_description_hindi = ($_REQUEST['subsidiaryimpact_description_hindi']);

	$subsidiary_link = $validation_globalclass->sanitize($_REQUEST['subsidiary_link']);
	$subsidiary_image = $validation_globalclass->sanitize($_REQUEST['subsidiary_image']);
	
	$subsidiary_title = htmlentities($subsidiary_title);
	$subsidiary_title_hindi = htmlentities($subsidiary_title_hindi);
	$subsidiary_description = htmlentities($subsidiary_description);
	$subsidiary_description_hindi = htmlentities($subsidiary_description_hindi);
	$subsidiaryimpact_title = htmlentities($subsidiaryimpact_title);
	$subsidiaryimpact_title_hindi = htmlentities($subsidiaryimpact_title_hindi);
	$subsidiaryimpact_description = htmlentities($subsidiaryimpact_description);
	$subsidiaryimpact_description_hindi = htmlentities($subsidiaryimpact_description_hindi);

	$fileName =  $_FILES["subsidiary_image"]["name"];

	$file_size = $_FILES['subsidiary_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_subsidiary_image = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_subsidiary_image, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbisubsidiary' . '_' .  $new_file_subsidiary_image;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['subsidiary_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$subsidiary_image = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["subsidiary_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $subsidiary_image_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$subsidiary_image = $subsidiary_image_old;
	endif;

	//Insert Query
	$arrFields = array('`subsidiary_title`', '`subsidiary_title_hindi`', '`subsidiary_description`', '`subsidiary_description_hindi`', '`subsidiaryimpact_title`', '`subsidiaryimpact_title_hindi`', '`subsidiaryimpact_description`', '`subsidiaryimpact_description_hindi`', '`subsidiary_link`', '`subsidiary_image`', '`createdby`', '`status`');

	$arrValues = array("$subsidiary_title", "$subsidiary_title_hindi", "$subsidiary_description", "$subsidiary_description_hindi", "$subsidiaryimpact_title", "$subsidiaryimpact_title_hindi", "$subsidiaryimpact_description", "$subsidiaryimpact_description_hindi", "$subsidiary_image", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "subsidiary", $arrFields, $arrValues, '')) :
		$subsidiary_id = sqlINSERTID_LABEL();

		// //Insert Query
		// $arrFields_translations = array('`subsidiary_id`', '`language_id`', '`title`', '`description`', '`createdby`', '`status`');

		// $arrValues_translations = array("$subsidiary_id", "2", "$subsidiary_title_hindi", "$subsidiary_description_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "subsidiary_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'subsidiary.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'subsidiary.php?code=1'
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
									<label for="subsidiary_title" class="form-label">subsidiary Title<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="subsidiary_title" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="subsidiary_title" id="subsidiary_title"  autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="subsidiary_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="subsidiary_title_hindi" id="subsidiary_title_hindi"  autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="subsidiary_description" class="form-label">Description<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiary_description" id="subsidiary_description" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiary_description_hindi" id="subsidiary_description_hindi" placeholder=""></textarea>
                                </div>
                            </div>
							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="subsidiaryimpact_title" class="form-label">subsidiary Impact Title<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="subsidiaryimpact_title" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="subsidiaryimpact_title" id="subsidiaryimpact_title"  autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="subsidiaryimpact_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="subsidiaryimpact_title_hindi" id="subsidiaryimpact_title_hindi"  autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="subsidiaryimpact_description" class="form-label">Description<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiaryimpact_description" id="subsidiaryimpact_description" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiaryimpact_description_hindi" id="subsidiaryimpact_description_hindi" placeholder=""></textarea>
                                </div>
                            </div>
						</div> -->

						<div class="form-group row">
							<div class="col-md-2">
								<label for="subsidiary_image" class="control-label">subsidiary Image and link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="subsidiary_image" class="form-label">Image<span class="tx-danger">*</span></label>
								<input class="form-control form-control-sm" name="subsidiary_image" id="subsidiary_image" type="file" value="<?php echo $subsidiary_image ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="subsidiary_image_old" id="subsidiary_image_old" placeholder="Tutor Attachement" value="<?= $subsidiary_image ?>" autocomplete="off">
						
								<span class="mg-l-10 badge badge-sm"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $subsidiary_image; ?>"></a></span>
							</div>

							<div class="col-md-5">
									<label for="subsidiary_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="subsidiary_link" id="subsidiary_link"  autocomplete="off"/>
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