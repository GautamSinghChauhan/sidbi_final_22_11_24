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
if ($save == "update" && $hidden_shareholder_ID != '') :

	$shareholder_status = $validation_globalclass->sanitize($_REQUEST['shareholder_status']);

	if ($shareholder_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$shareholder_title = $validation_globalclass->sanitize(ucwords($_REQUEST['shareholder_title']));
	$shareholder_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['title']));
	$no_of_shares_held = $validation_globalclass->sanitize(ucwords($_REQUEST['no_of_shares_held']));
	$holding_percentage = $validation_globalclass->sanitize(ucwords($_REQUEST['holding_percentage']));

	$shareholder_url = $validation_globalclass->sanitize($_REQUEST['shareholder_url']);

	$shareholder_title = htmlentities($shareholder_title);
	$shareholder_title_hindi = htmlentities($shareholder_title_hindi);


	// $no_of_shares_held = $validation_globalclass->sanitize($_REQUEST['no_of_shares_held']);
	// $no_of_shares_held = dateformat_database($no_of_shares_held);


	//Insert Query
	$arrFields = array('`shareholder_title`', '`no_of_shares_held`', '`holding_percentage`', '`createdby`', '`status`');

	$arrValues = array("$shareholder_title", "$no_of_shares_held", "$holding_percentage", "$logged_user_id", "$status");

	if (sqlACTIONS("UPDATE", "shareholders", $arrFields, $arrValues, '')) :

		//Insert Query
		$arrFields_translations = array('`shareholder_id`', '`language_id`', '`title`', '`createdby`', '`status`');

		$arrValues_translations = array("$hidden_shareholder_ID", "2", "$shareholder_title_hindi", "$logged_user_id", "$status");

		if (sqlACTIONS("UPDATE", "shareholder_translations", $arrFields_translations, $arrValues_translations, '')) :
		endif;

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>

		<script type="text/javascript">
			window.location = 'shareholder.php?code=1'
		</script>
<?php
		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT shareholders.shareholder_id, shareholder_translations.shareholder_id, shareholders.shareholder_title, shareholders.status, shareholder_translations.title, shareholders.no_of_shares_held, shareholders.holding_percentage FROM shareholders INNER JOIN shareholder_translations ON shareholders.shareholder_id=shareholder_translations.shareholder_id AND shareholders.deleted = '0' AND shareholder_translations.deleted = '0' and shareholders.`shareholder_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$shareholder_id = $row["shareholder_id"];
		$shareholder_title = htmlspecialchars_decode($row["shareholder_title"]);
		$shareholder_title_hindi = htmlspecialchars_decode($row["title"]);
		$no_of_shares_held = $row['no_of_shares_held'];
		$holding_percentage = $row['holding_percentage'];
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
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="shareholder_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="shareholder_status" id="shareholder_status" checked="">
										<label class="custom-control-label" for="shareholder_status">Yes</label>
										<input type="hidden" name="hidden_shareholder_ID" id="hidden_shareholder_ID" value="<?= $id; ?>">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="shareholder_title" class="form-label">shareholder Title<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="shareholder_title" id="shareholder_title" value="<?= $shareholder_title; ?>" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="shareholder_title" class="form-label">shareholder Title<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="title" id="title" value="<?= $shareholder_title_hindi; ?>" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="no_of_shares_held" class="form-label">No of shares held<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" name="no_of_shares_held" id="no_of_shares_held" value="<?= $no_of_shares_held; ?>" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="holding_percentage" class="form-label">Holding Percentage<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" name="holding_percentage" id="holding_percentage" value="<?= $holding_percentage; ?> " required autocomplete="off" />
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