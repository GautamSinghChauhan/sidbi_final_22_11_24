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

	$title_eng = $validation_globalclass->sanitize(($_REQUEST['title_eng']));
	$title_hindi = $validation_globalclass->sanitize(($_REQUEST['title_hindi']));
	$year = $validation_globalclass->sanitize(($_REQUEST['year']));
	$status = $validation_globalclass->sanitize($_REQUEST['status']);

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	$arrFields = array('`title_eng`', '`title_hindi`', '`year`', '`createdby`', '`status`');

	$arrValues = array("$title_eng", "$title_hindi", "$year", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "cipos_orders", $arrFields, $arrValues, '')) :

		$cipos_id  = sqlINSERTID_LABEL();

		//Insert Query
		$arrFields_translations = array('`cipos_id`', '`language_id`', '`title`', '`createdby`', '`status`');

		$arrValues_translations = array("$cipos_id", "2", "$title", "$logged_user_id", "$status");

		if (sqlACTIONS("INSERT", "cipos_order_translations", $arrFields_translations, $arrValues_translations, '')) :
		endif;

		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'cpios.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'cpios.php?code=1'
			</script>
<?php
		endif;
	else :
		$err[] =  "Unable to Insert Record";
	endif;
endif;
?>

<div class="content">
	<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
		<div class="row">
			<div class="col-lg-10">
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
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
										<label class="custom-control-label" for="status">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="title_eng" class="col-sm-2 col-form-label">English Title<span class="tx-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="title_eng" id="title_eng" placeholder="Enter English Title" required data-parsley-trigger="keyup" autocomplete="off">
								</div>
							</div>
							<div class="form-group row">
								<label for="title_hindi" class="col-sm-2 col-form-label">Hindi Title<span class="tx-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="title_hindi" id="title_hindi" placeholder="Enter Hindi Title" data-parsley-trigger="keyup" autocomplete="off" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="year" class="col-sm-2 col-form-label">Year<span class="tx-danger"> *</span></label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="year" id="year" placeholder="Year" data-parsley-trigger="keyup" autocomplete="off" required>
								</div>
							</div>
						</div>
						<!-- End of BASIC -->
					</form>
				</div>
			</div>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->