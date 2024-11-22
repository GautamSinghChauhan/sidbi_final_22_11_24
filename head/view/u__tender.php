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

//Update Operation
if ($save == "update" && $hidden_tender_ID != '') :

	$tender_status = $validation_globalclass->sanitize($_REQUEST['tender_status']);

	if ($tender_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$tender_title = $validation_globalclass->sanitize($_REQUEST['tender_title']);
	$tender_title_hindi = base64_encode($_REQUEST['tender_title_hindi']);
	$tender_remarks = $validation_globalclass->sanitize($_REQUEST['tender_remarks']);
	$tender_remarks_hindi = base64_encode($_REQUEST['tender_remarks_hindi']);

	$tender_url = $validation_globalclass->sanitize($_REQUEST['tender_url']);

	$tender_title = htmlentities($tender_title);
	$tender_title_hindi = htmlentities($tender_title_hindi);
	$tender_remarks = htmlentities($tender_remarks);
	$tender_remarks_hindi = htmlentities($tender_remarks_hindi);

	$tender_date = $validation_globalclass->sanitize($_REQUEST['tender_date']);
	$tender_date = dateformat_database($tender_date);

	$tender_last_date = $validation_globalclass->sanitize($_REQUEST['tender_last_date']);
	$tender_last_date = dateformat_database($tender_last_date);

	//Update Query
	$arrFields = array('`tender_title`', '`tender_remarks`', '`tender_date`', '`tender_last_date`', '`tender_url`', '`createdby`', '`status`');

	$arrValues = array("$tender_title", "$tender_remarks", "$tender_date", "$tender_last_date", "$tender_url", "$logged_user_id", "$status");

	$sqlWhere = " tender_id = $hidden_tender_ID ";

	if (sqlACTIONS("UPDATE", "tenders", $arrFields, $arrValues, $sqlWhere)) :
		$tender_ID = $hidden_tender_ID;

		//Update Query
		$arrFields_translations = array('`tender_id`', '`language_id`', '`title`', '`remarks`', '`createdby`', '`status`');

		$arrValues_translations = array("$hidden_tender_ID", "2", "$tender_title_hindi", "$tender_remarks_hindi", "$logged_user_id", "$status");

		$sqlWhere_translations = " tender_id = $hidden_tender_ID ";

		if (sqlACTIONS("UPDATE", "tender_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
		endif;

		$arrayCount = count($_FILES);

		if ($arrayCount !== 0) :
			//VEHICLE GALLERY
			$document_count = count($_FILES['document']['name']);

			if ($document_count > 0) :
				for ($i = 1; $i <= $document_count; $i++) :
					if (isset($_FILES['document']['name'][$i]) && $_FILES['document']['name'][$i] != '') :
						$upload_dir = 'uploads/tender_document/';
						$file_extension = strtolower(end(explode('.', $_FILES['document']['name'][$i])));
						$file_name = str_replace(' ', '_', $tender_title) . '-' . rand(0, 99999) . time() . '.' . $file_extension;
						$file_type = $_FILES['document']['type'][$i];
						$file_temp_loc  = $_FILES['document']['tmp_name'][$i];
						$file_error_msg = $_FILES['document']['error'][$i];
						$file_size = $_FILES['document']['size'][$i];
						$move_file = move_uploaded_file($file_temp_loc, $upload_dir . $file_name);

						$tender_document_language_id = $_POST['tender_document_language_id'][$i];
						$tender_document_type = $_POST['tender_document_type_id'][$i];

						if ($move_file) :
							$arrFields_gallery = array('`tender_id`', '`tender_document_language_id`', '`tender_document_type`', '`tender_document_name`', '`createdby`', '`status`');
							$arrValues_gallery = array("$tender_ID", "$tender_document_language_id", "$tender_document_type", "$file_name", "$logged_user_id", "1");
							if (sqlACTIONS("INSERT", "js_tender_documents", $arrFields_gallery, $arrValues_gallery, '')) :
							endif;
						endif;
					endif;
				endfor;
			endif;
		endif;

		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
		<script type="text/javascript">
			window.location = 'tender.php?code=2'
		</script>
<?php

		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;
if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT TENDER.`tender_id`, TENDER.`tender_title`, TENDER_TRANSLATION.`title`, TENDER.`tender_date`, TENDER.`tender_last_date`, TENDER.`tender_remarks`, TENDER_TRANSLATION.`remarks`, TENDER.`tender_url`, TENDER.`status` FROM `tenders` AS TENDER INNER JOIN tender_translations AS TENDER_TRANSLATION ON TENDER.tender_id=TENDER_TRANSLATION.tender_id where TENDER.deleted = '0' and TENDER.`tender_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$tender_id = $row["tender_id"];
		$tender_title = html_entity_decode(html_entity_decode($row["tender_title"]));
		$tender_title_hindi = base64_decode($row["title"]);
		$tender_title_hindi = filterInvalidUtf8($tender_title_hindi);
		$tender_date = dateformat_datepicker($row['tender_date']);
		$tender_last_date = dateformat_datepicker($row['tender_last_date']);
		$tender_remarks = $row['tender_remarks'];
		$tender_remarks_hindi = base64_decode($row['remarks']);
		$tender_remarks_hindi = filterInvalidUtf8($tender_remarks_hindi);
		$tender_url = $row['tender_url'];
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
								<?php pageCANCEL($currentpage, $__cancel); ?>
							</div>
							<div class="col-9 col-sm-6 text-right">
								<button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
								<input type="hidden" name="hidden_tender_ID" value="<?= $tender_id; ?>" />
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
									<label for="tender_title" class="form-label">Tender Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="tender_title" id="tender_title" value="<?= $tender_title; ?>" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="tender_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="tender_title_hindi" id="tender_title_hindi" value="<?= $tender_title_hindi; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="tender_remarks" class="form-label">Tender Remark<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="tender_remarks" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="tender_remarks" id="tender_remarks" required autocomplete="off"><?= $tender_remarks; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="tender_remarks_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="tender_remarks_hindi" id="tender_remarks_hindi" required autocomplete="off"><?= $tender_remarks_hindi; ?></textarea>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_date" class="form-label">Tender Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="tender_date" id="tender_date" value="<?= $tender_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_last_date" class="form-label">Tender Last Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="tender_last_date" id="tender_last_date" value="<?= $tender_last_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_url" class="form-label">Tender URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="Tender URL" name="tender_url" id="tender_url" readonly value="<?= $tender_url; ?>" required autocomplete="off" />
								</div>
							</div>

						</div>
						<!-- End of BASIC -->

						<!-- DOCUMENT Starting -->
						<div id="document">
							<div class="divider-text">Document</div>

							<!-- DOCUMENT Starting -->
							<div id="document">
								<div class="divider-text">Document</div>
								<div class="col-md-12">
									<div class="row mb-3">
										<div class="col-md-6 p-0">
											<h5 class="text-primary">Upload</h5>
										</div>
										<div class="col-md-6 p-0 text-right">
											<button type="button" class="btn btn-primary" onclick="showTENDERUPLOADFILEMODAL(<?= $id; ?>)">+ Upload File</button>
										</div>
									</div>
									<div class="row">
										<div data-label="Example" class="df-example demo-table table-responsive">
											<table id="tenderuploaddocumentLIST" class="table table-bordered w-100">
												<thead>
													<tr>
														<th class="wd-5p"><?= $__contentsno ?></th>
														<th class="wd-15p">Document Type</th>
														<th class="wd-10p">Language</th>
														<th class="wd-10p">Document</th>
														<th class="wd-10p"><?= $__options ?></th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- End of DOCUMENT -->
						</div>
						<!-- End of DOCUMENT -->

					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->