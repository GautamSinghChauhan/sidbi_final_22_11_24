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

	$career_status = $validation_globalclass->sanitize($_REQUEST['career_status']);

	if ($career_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$career_new_gif = $_POST['career_new_gif'];
	if ($career_new_gif == 'on') :
		$career_new_gif_status = '1';
	else :
		$career_new_gif_status = '0';
	endif;

	$career_title = $validation_globalclass->sanitize(($_REQUEST['career_title']));
	$career_title_hindi = base64_encode($_REQUEST['title']);
	$career_start_date = $validation_globalclass->sanitize(($_REQUEST['career_start_date']));
	$career_expiry_date = $validation_globalclass->sanitize(($_REQUEST['career_expiry_date']));

	$career_url = $validation_globalclass->sanitize($_REQUEST['career_url']);

	$career_title = htmlentities($career_title);
	$career_title_hindi = htmlentities($career_title_hindi);


	$career_start_date = $validation_globalclass->sanitize($_REQUEST['career_start_date']);
	$career_start_date = dateformat_database($career_start_date);

	$career_expiry_date = $validation_globalclass->sanitize($_REQUEST['career_expiry_date']);
	$career_expiry_date = dateformat_database($career_expiry_date);

	//Insert Query
	$arrFields = array('`new_career`', '`career_title`', '`career_start_date`', '`career_expiry_date`', '`career_url`', '`createdby`', '`status`');

	$arrValues = array("$career_new_gif_status", "$career_title", "$career_start_date", "$career_expiry_date", "$career_url", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "careers", $arrFields, $arrValues, '')) :
		$career_ID = sqlINSERTID_LABEL();

		//Insert Query
		$arrFields_translations = array('`career_id`', '`language_id`', '`title`', '`createdby`', '`status`');

		$arrValues_translations = array("$career_ID", "2", "$career_title_hindi", "$logged_user_id", "$status");

		if (sqlACTIONS("INSERT", "career_translations", $arrFields_translations, $arrValues_translations, '')) :
		endif;

		$arrayCount = count($_FILES);

		if ($arrayCount !== 0) :
			//VEHICLE GALLERY
			$document_count = count($_FILES['document']['name']);

			if ($document_count > 0) :
				for ($i = 1; $i <= $document_count; $i++) :
					if (isset($_FILES['document']['name'][$i]) && $_FILES['document']['name'][$i] != '') :
						$upload_dir = 'uploads/career_document/';
						$file_extension = strtolower(end(explode('.', $_FILES['document']['name'][$i])));
						$file_name = str_replace(' ', '_', $career_title) . '-' . rand(0, 99999) . time() . '.' . $file_extension;
						$file_type = $_FILES['document']['type'][$i];
						$file_temp_loc  = $_FILES['document']['tmp_name'][$i];
						$file_error_msg = $_FILES['document']['error'][$i];
						$file_size = $_FILES['document']['size'][$i];
						$move_file = move_uploaded_file($file_temp_loc, $upload_dir . $file_name);

						$career_document_language_id = $_POST['career_document_language_id'][$i];
						$career_document_type = $_POST['career_document_type_id'][$i];

						if ($move_file) :
							$arrFields_gallery = array('`career_id`', '`career_document_language_id`', '`career_document_type`', '`career_document_name`', '`createdby`', '`status`');
							$arrValues_gallery = array("$career_ID", "$career_document_language_id", "$career_document_type", "$file_name", "$logged_user_id", "1");
							if (sqlACTIONS("INSERT", "js_career_documents", $arrFields_gallery, $arrValues_gallery, '')) :

							endif;
						endif;
					endif;
				endfor;
			endif;
		endif;
		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'career.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'career.php?code=1'
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
								<button type="submit" name="save_close" id="save_close" value="save_close" class="btn btn-success"><?= $__save_close ?></< /button>
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="career_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="career_status" id="career_status" checked="">
										<label class="custom-control-label" for="career_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="career_title" class="col-sm-2 col-form-label">Career New Gif (Optional)</label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="career_new_gif" id="career_new_gif">
										<label class="custom-control-label" for="career_new_gif">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="career_title" class="form-label">Career Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="career_title" id="career_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="title" id="title" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="career_start_date" class="form-label">Career Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="career_start_date" id="career_start_date" value="<?php echo $career_start_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="career_expiry_date" class="form-label">Career Expiry Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="career_expiry_date" id="career_expiry_date" value="<?php echo $career_expiry_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="career_url" class="form-label">Career URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="career URL" name="career_url" id="career_url" value="" required autocomplete="off" />
								</div>
							</div>

						</div>
						<!-- End of BASIC -->

						<!-- DOCUMENT Starting -->
						<div id="document">
							<div class="divider-text">Document</div>


							<div class="col-md-12">
								<h5 class="text-primary m-0 mb-3">Upload</h5>
								<div class="row">
									<div class="col-12">
										<div class="justify-content-center bulk-upload-body" id="file_upload">
											<div class="card-body bulk-import-body text-center p-5  bd-dashed border-info" id="uploadButtonContainer">
												<svg xmlns="http://www.w3.org/2000/svg" height="150" version="1.1" viewBox="-23 0 512 512" width="150">
													<g id="surface1">
														<path d="M 337.953125 230.601562 C 404.113281 239.886719 455.015625 296.65625 455.015625 365.378906 C 455.015625 440.503906 394.082031 501.4375 318.957031 501.4375 C 267.3125 501.4375 222.277344 472.625 199.335938 430.152344 C 188.878906 410.839844 182.902344 388.75 182.902344 365.273438 C 182.902344 290.148438 243.835938 229.214844 318.957031 229.214844 C 325.363281 229.320312 331.660156 229.75 337.953125 230.601562 Z M 337.953125 230.601562 " style="stroke:none;fill-rule:nonzero;fill:#fff;fill-opacity:1;"></path>
														<path d="M 337.953125 230.601562 C 331.765625 229.75 325.363281 229.320312 318.957031 229.320312 C 243.835938 229.320312 182.902344 290.253906 182.902344 365.378906 C 182.902344 388.855469 188.878906 410.945312 199.335938 430.257812 L 199.121094 430.367188 L 57.199219 430.367188 C 31.265625 430.367188 10.242188 409.34375 10.242188 383.414062 L 10.242188 57.730469 C 10.242188 31.800781 31.265625 10.777344 57.199219 10.777344 L 229.429688 10.777344 L 229.429688 88.464844 C 229.429688 108.523438 245.648438 124.746094 265.710938 124.746094 L 337.953125 124.746094 Z M 337.953125 230.601562 " style=" stroke:none;fill-rule:nonzero;fill:#fff;fill-opacity:1;"></path>
														<path d="M 229.429688 10.777344 L 337.953125 124.746094 L 265.710938 124.746094 C 245.648438 124.746094 229.429688 108.523438 229.429688 88.464844 Z M 229.429688 10.777344 " style=" stroke:none;fill-rule:nonzero;fill:#fff;fill-opacity:1;"></path>
														<path d="M 348.945312 221.640625 L 348.945312 124.746094 C 348.945312 121.96875 347.664062 119.410156 345.851562 117.382812 L 237.21875 3.308594 C 235.191406 1.175781 232.308594 0 229.429688 0 L 57.199219 0 C 25.398438 0 0 25.929688 0 57.730469 L 0 383.414062 C 0 415.214844 25.398438 440.71875 57.199219 440.71875 L 193.148438 440.71875 C 219.609375 485.535156 267.203125 512 318.960938 512 C 399.847656 512 465.6875 446.265625 465.6875 365.273438 C 465.6875 329.632812 452.988281 295.375 429.511719 268.59375 C 408.277344 244.476562 379.890625 228.042969 348.945312 221.640625 Z M 240.101562 37.457031 L 312.984375 114.179688 L 265.710938 114.179688 C 251.625 114.179688 240.097656 102.550781 240.097656 88.464844 L 240.097656 37.457031 Z M 21.34375 383.414062 L 21.34375 57.730469 C 21.34375 37.667969 37.242188 21.34375 57.199219 21.34375 L 218.757812 21.34375 L 218.757812 88.464844 C 218.757812 114.394531 239.78125 135.523438 265.710938 135.523438 L 327.605469 135.523438 L 327.605469 218.863281 C 324.402344 218.757812 321.839844 218.332031 319.066406 218.332031 C 281.824219 218.332031 247.570312 232.628906 221.746094 255.039062 L 86.222656 255.039062 C 80.355469 255.039062 75.550781 259.839844 75.550781 265.710938 C 75.550781 271.582031 80.351562 276.382812 86.222656 276.382812 L 201.898438 276.382812 C 194.320312 287.054688 188.023438 297.726562 183.117188 309.464844 L 86.222656 309.464844 C 80.355469 309.464844 75.550781 314.265625 75.550781 320.132812 C 75.550781 326.003906 80.351562 330.804688 86.222656 330.804688 L 176.179688 330.804688 C 173.511719 341.476562 172.125 353.320312 172.125 365.167969 C 172.125 383.839844 175.644531 402.300781 182.476562 419.375 L 57.199219 419.375 C 37.242188 419.375 21.34375 403.367188 21.34375 383.414062 Z M 318.960938 490.765625 C 272.96875 490.765625 230.601562 465.582031 208.621094 425.136719 C 198.695312 406.890625 193.46875 386.292969 193.46875 365.378906 C 193.46875 296.230469 249.703125 239.992188 318.851562 239.992188 C 324.722656 239.992188 330.589844 240.421875 336.351562 241.167969 C 366.019531 245.328125 393.335938 260.054688 413.183594 282.679688 C 433.246094 305.515625 444.238281 334.859375 444.238281 365.378906 C 444.34375 434.527344 388.109375 490.765625 318.960938 490.765625 Z M 318.960938 490.765625" style="stroke:none;fill-rule:nonzero;fill-opacity:1;" fill="#f4f4f7" data-original="#000000"></path>
														<path d="M 86.222656 223.027344 L 194.320312 223.027344 C 200.191406 223.027344 204.992188 218.222656 204.992188 212.355469 C 204.992188 206.484375 200.191406 201.683594 194.320312 201.683594 L 86.222656 201.683594 C 80.355469 201.683594 75.550781 206.484375 75.550781 212.355469 C 75.550781 218.222656 80.355469 223.027344 86.222656 223.027344 Z M 86.222656 223.027344 " style="stroke:none;fill-rule:nonzero;fill-opacity:1;" fill="#f4f4f7" data-original="#000000"></path>
														<path d="M 326.535156 286.625 C 324.507812 284.492188 321.734375 283.210938 318.746094 283.210938 C 315.757812 283.210938 312.984375 284.492188 310.957031 286.625 L 248.425781 353.746094 C 244.367188 358.015625 244.6875 364.84375 248.957031 368.792969 C 250.984375 370.714844 253.652344 371.675781 256.214844 371.675781 C 259.09375 371.675781 262.082031 370.5 264.21875 368.257812 L 308.394531 320.984375 L 308.394531 437.515625 C 308.394531 443.382812 313.199219 448.1875 319.066406 448.1875 C 324.9375 448.1875 329.738281 443.382812 329.738281 437.515625 L 329.738281 320.988281 L 373.597656 368.261719 C 377.652344 372.527344 384.269531 372.847656 388.644531 368.792969 C 392.910156 364.738281 393.125 358.015625 389.175781 353.746094 Z M 326.535156 286.625 " style="stroke:none;fill-rule:nonzero;fill-opacity:1;" fill="#f4f4f7" data-original="#000000"></path>
													</g>
												</svg>
												<div class="mt-2">
													<h5>No Documents Found</h5>
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_document_modal" onclick="showUPLOADFILEMODAL();">+ Upload File</button>
												</div>
											</div>
										</div>
										<div class="card-body p-0 pt-2" id="file-upload2" style="display: none;">
											<div class="d-flex justify-content-between">
												<p>Uploaded Files</p>
												<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload_document_modal" onclick="showUPLOADFILEMODAL();">
													+ Upload Again
												</button>
											</div>
											<div id="uploadedFilesArea" class="mt-3">
												<div class="row" id="uploadedFileList"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of DOCUMENT -->

					</form>
				</div><!-- row -->
			</div><!-- col -->

			<div class="modal fade" id="upload_document_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content p-4">
						<div class="modal-body receiving-upload-file-data"> <!-- Plugins css Ends-->
							<form id="ajax_upload_document_form" enctype="multipart/form-data" method="POST" data-parsley-validate>
								<div class="modal-header pt-0 border-0">
									<h4 class="modal-title mx-auto" style="color:black">Document Upload</h4>
								</div>
								<div class="row mt-2">
									<div class="col-12 mb-3">
										<label class="form-label" for="career_document_type_id">Document Type<span class=" text-danger"> *</span></label>

										<select name="career_document_type_id" id="career_document_type_id" class="form-control" data-live-search="true" required>
											<option value="1">Documents</option>
											<option value="2">Corrigendum</option>
											<option value="3">Annexure</option>
										</select>
									</div>
									<div class="col-12 mb-3">
										<label class="form-label" for="career_document_language_id">Language<span class=" text-danger"> *</span></label>

										<select name="career_document_language_id" id="career_document_language_id" class="form-control" data-live-search="true" required>
											<?= get_LANGUAGE_TYPE('', 'select'); ?>
										</select>
									</div>
									<div class="col-12">
										<label class="form-label" for="upload_document">Upload Document<span class=" text-danger"> *</span></label>
										<div class="form-group">
											<input type="file" class="input-file" id="fileInput" name="upload_document" required>
										</div>
									</div>
									<input type="hidden" name="hidden_vehicle_gallery_details_id" id="hidden_vehicle_gallery_details_id" class="form-control" value="" />
								</div>
								<div class="d-flex justify-content-center pt-4">
									<button type="button" class="btn btn-secondary mx-1" data-dismiss="modal" aria-label="Close">Close</button>
									<button type="button" id="submit_upload_document_vehicle_btn" class="btn btn-success btn-md">
										<!-- <button type="button" class="btn btn-primary mx-1"> -->
										Save</button>
								</div>
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