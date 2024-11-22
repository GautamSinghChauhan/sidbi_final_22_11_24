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
	
	$tender_status = $validation_globalclass->sanitize($_REQUEST['tender_status']);

	if ($tender_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;
	
	$publication_title = $validation_globalclass->sanitize(ucwords($_REQUEST['publication_title']));
	$publication_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['publication_title_hindi']));
	

	//Insert Query
	$arrFields = array('`publication_title`', '`publication_hindi_title`','`createdby`', '`status`');

	$arrValues = array("$publication_title", "$publication_title_hindi", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "js_publication_title", $arrFields, $arrValues, '')) :
        // $tender_ID = sqlINSERTID_LABEL();
	
		// //Insert Query
		// $arrFields_translations = array('`tender_id`', '`language_id`', '`title`', '`remarks`', '`createdby`', '`status`');

		// $arrValues_translations = array("$tender_ID", "2", "$tender_title_hindi", "$tender_remarks_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "tender_translations", $arrFields_translations, $arrValues_translations, '')) :
		// endif;
		
		// $arrayCount = count($_FILES);

		// if ($arrayCount !== 0) :
		// 	//VEHICLE GALLERY
		// 	$document_count = count($_FILES['document']['name']);

		// 	if ($document_count > 0) :
		// 		for ($i = 1; $i <= $document_count; $i++) :
		// 			if (isset($_FILES['document']['name'][$i]) && $_FILES['document']['name'][$i] != '') :
		// 				$upload_dir = 'uploads/tender_document/';
		// 				$file_extension = strtolower(end(explode('.', $_FILES['document']['name'][$i])));
		// 				$file_name = str_replace(' ', '_', $tender_title) . '-' . rand(0, 99999) . time() . '.' . $file_extension;
		// 				$file_type = $_FILES['document']['type'][$i];
		// 				$file_temp_loc  = $_FILES['document']['tmp_name'][$i];
		// 				$file_error_msg = $_FILES['document']['error'][$i];
		// 				$file_size = $_FILES['document']['size'][$i];
		// 				$move_file = move_uploaded_file($file_temp_loc, $upload_dir . $file_name);

		// 				$tender_document_language_id = $_POST['tender_document_language_id'][$i];
		// 				$tender_document_type = $_POST['tender_document_type_id'][$i];

		// 				if ($move_file) :
		// 					$arrFields_gallery = array('`tender_id`', '`tender_document_language_id`', '`tender_document_type`', '`tender_document_name`', '`createdby`', '`status`');
		// 					$arrValues_gallery = array("$tender_ID", "$tender_document_language_id", "$tender_document_type", "$file_name", "$logged_user_id", "1");
		// 					if (sqlACTIONS("INSERT", "js_tender_documents", $arrFields_gallery, $arrValues_gallery, '')) :
								
		// 					endif;
		// 				endif;
		// 			endif;
		// 		endfor;
		// 	endif;
		// endif;
		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :?>
			<script type="text/javascript">
				window.location = 'publication_report.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'publication_report.php?code=1'
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
								<label for="tender_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="tender_status" id="tender_status" checked="">
										<label class="custom-control-label" for="tender_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="publication_title" class="form-label">Publication Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="publication_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="publication_title" id="publication_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="publication_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="publication_title_hindi" id="publication_title_hindi" required autocomplete="off" />
								</div>
							</div>

							
							
						</div>
						<!-- End of BASIC -->
						
						<!-- DOCUMENT Starting -->
						
						
						<!-- End of DOCUMENT -->
						
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