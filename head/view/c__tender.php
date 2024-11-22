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

	//Insert Query
	$arrFields = array('`tender_title`', '`tender_remarks`', '`tender_date`', '`tender_last_date`', '`tender_url`', '`createdby`', '`status`');

	$arrValues = array("$tender_title", "$tender_remarks", "$tender_date", "$tender_last_date", "$tender_url", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "tenders", $arrFields, $arrValues, '')) :
		$tender_ID = sqlINSERTID_LABEL();

		//Insert Query
		$arrFields_translations = array('`tender_id`', '`language_id`', '`title`', '`remarks`', '`createdby`', '`status`');

		$arrValues_translations = array("$tender_ID", "2", "$tender_title_hindi", "$tender_remarks_hindi", "$logged_user_id", "$status");

		if (sqlACTIONS("INSERT", "tender_translations", $arrFields_translations, $arrValues_translations, '')) :

			$arrFields_docs = array('`tender_id`');
			$arrValues_docs = array("$tender_ID");

			$sqlwhere_docs = " `tender_session_id` = '$tender_document_session_id' ";
			if (sqlACTIONS("UPDATE", "js_tender_documents", $arrFields_docs, $arrValues_docs, $sqlwhere_docs)) :

			endif;

		endif;

		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
			session_regenerate_id(TRUE);
			$tender_document_session_id = session_id();
?>
			<script type="text/javascript">
				window.location = 'tender.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'tender.php?code=1'
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
									<label for="tender_title" class="form-label">Tender Title<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="tender_title" id="tender_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="tender_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="tender_title_hindi" id="tender_title_hindi" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="tender_remarks" class="form-label">Tender Remark<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="tender_remarks" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="tender_remarks" id="tender_remarks" required autocomplete="off"></textarea>
								</div>
								<div class="col-md-5">
									<label for="tender_remarks_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="tender_remarks_hindi" id="tender_remarks_hindi" required autocomplete="off"></textarea>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_date" class="form-label">Tender Date<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="tender_date" id="tender_date" value="<?php echo $tender_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_last_date" class="form-label">Tender Last Date<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="tender_last_date" id="tender_last_date" value="<?php echo $tender_last_date; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="tender_url" class="form-label">Tender URL<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="Tender URL" name="tender_url" id="tender_url" readonly required autocomplete="off" />
								</div>
							</div>
						</div>
						<!-- End of BASIC -->

						<!-- DOCUMENT Starting -->
						<div id="document">
							<div class="divider-text">Document</div>
							<div class="col-md-12">
								<div class="row mb-3">
									<div class="col-md-6 p-0">
										<h5 class="text-primary">Upload</h5>
									</div>
									<div class="col-md-6 p-0 text-right">
										<button type="button" class="btn btn-primary" onclick="showTENDERUPLOADFILEMODAL()">+ Upload File</button>
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
					</form>
				</div><!-- row -->
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->