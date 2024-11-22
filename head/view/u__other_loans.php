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
if ($save == "update" && $hidden_other_loans_ID != '') :

	$other_loans_status = $validation_globalclass->sanitize($_REQUEST['other_loans_status']);

	if ($other_loans_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$other_loans_title = $validation_globalclass->sanitize(($_REQUEST['other_loans_title']));
	$other_loans_title_hindi = base64_encode($_REQUEST['title']);

	$other_loans_title = html_entity_decode(html_entity_decode($other_loans_title));
	$other_loans_title_hindi = html_entity_decode(html_entity_decode($other_loans_title_hindi));


	if (isset($_FILES['choose_document']['name'])) :
		$upload_dir = '../uploads/other_loans_document/';
		$choose_document_fileName = $_FILES["choose_document"]["name"];
		$fileInfo = pathinfo($choose_document_fileName);
		$choose_document_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['choose_document']['type'];
		$choose_document_file_name = $choose_document_fileName;
		$file_temp_loc  = $_FILES['choose_document']['tmp_name'];
		$file_error_msg = $_FILES['choose_document']['error'];
		$file_size = $_FILES['choose_document']['size'];
		$choose_document_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $choose_document_file_name);
	endif;

	if ($choose_document_move_file) :
		//Insert Query
		$arrFields = array('`other_loans_title`', '`filename`', '`createdby`', '`status`');
		$arrValues = array("$other_loans_title", "$choose_document_file_name", "$logged_user_id", "$status");
	else :
		//Insert Query
		$arrFields = array('`other_loans_title`', '`createdby`', '`status`');
		$arrValues = array("$other_loans_title", "$logged_user_id", "$status");
	endif;
	$sqlWhere_translations = " other_loans_id = $hidden_other_loans_ID ";

	if (sqlACTIONS("UPDATE", "other_loans", $arrFields, $arrValues, $sqlWhere_translations)) :

		$other_loans_ID = sqlINSERTID_LABEL();

		if ($choose_document_move_file) :
			//Insert Query
			$arrFields_translations = array('`other_loans_id`', '`hin_filename`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$hidden_other_loans_ID", "$choose_document_file_name", "2", "$other_loans_title_hindi", "$logged_user_id", "$status");
		else :
			//Insert Query
			$arrFields_translations = array('`other_loans_id`', '`language_id`', '`title`', '`createdby`', '`status`');
			$arrValues_translations = array("$hidden_other_loans_ID", "2", "$other_loans_title_hindi", "$logged_user_id", "$status");
		endif;

		$sqlWhere_translations = " other_loans_id = $hidden_other_loans_ID ";

		if (sqlACTIONS("UPDATE", "other_loans_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :

		endif;

		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'other_loans.php?code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'other_loans.php?code=1'
			</script>
<?php
		endif;
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT LOAN_TRANS.`title` AS `hi_title`, LOAN_TRANS.`hin_filename`, LOAN.`other_loans_title`, LOAN.`filename` AS `en_filename`, LOAN.`status`, LOAN.`other_loans_id` FROM `other_loans` LOAN LEFT JOIN `other_loans_translations` LOAN_TRANS ON LOAN.`other_loans_id` = LOAN_TRANS.`other_loans_id` where LOAN.`deleted` = '0' AND LOAN.`other_loans_id` = '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$other_loans_id = $row["other_loans_id"];
		$hi_title = base64_decode($row['hi_title']);
		$hi_title = filterInvalidUtf8($hi_title);
		$hin_filename = $row['hin_filename'];
		$other_loans_title = $row['other_loans_title'];
		$en_filename = $row['en_filename'];
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
								<input type="hidden" name="hidden_other_loans_ID" value="<?= $other_loans_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="other_loans_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="other_loans_status" id="other_loans_status" checked="">
										<label class="custom-control-label" for="other_loans_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="other_loans_title" class="form-label">Other Loans Title (EN)<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="other_loans_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="other_loans_title" id="other_loans_title" value="<?= $other_loans_title; ?>" required autocomplete="off" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="other_loans_title" class="form-label">Other Loans Title (HI)<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="title" id="title" value="<?= $other_loans_title; ?>" required autocomplete="off" />
								</div>
							</div>

							<!-- <div class="form-group row">
								<div class="col-md-2">
									<label for="other_loans_date" class="form-label">Other Loans Date<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" placeholder="DD/MM/YYYY" name="other_loans_date" id="other_loans_date" value="<?php echo $other_loans_date; ?>" required autocomplete="off" />
								</div>
							</div> -->
							<!-- 
							<div class="form-group row">
								<div class="col-md-2">
									<label for="other_loans_url" class="form-label">Other Loans URL<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" data-parsley-type="url" placeholder="Corporate Governances URL" name="other_loans_url" id="other_loans_url" value="" required autocomplete="off" />
								</div>
							</div> -->

							<div class="form-group row">
								<div class="col-md-2">
									<label for="choose_document" class="form-label">Choose Document</label>
								</div>
								<div class="col-md-5">
									<input type="file" class="form-control" name="choose_document" id="choose_document" autocomplete="off" />
								</div>
							</div>

						</div>
						<!-- End of BASIC -->
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