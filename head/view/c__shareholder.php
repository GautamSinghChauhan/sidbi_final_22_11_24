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
	$arrFields = array('`shareholder_title`', '`no_of_shares_held`', '`holding_percentage`', '`shareholder_url`', '`createdby`', '`status`');

	$arrValues = array("$shareholder_title", "$no_of_shares_held", "$holding_percentage", "$shareholder_url", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "shareholders", $arrFields, $arrValues, '')) :
        $shareholder_ID = sqlINSERTID_LABEL();
	
		//Insert Query
		$arrFields_translations = array('`shareholder_id`', '`language_id`', '`title`', '`createdby`', '`status`');

		$arrValues_translations = array("$shareholder_ID", "2", "$shareholder_title_hindi", "$logged_user_id", "$status");

		if (sqlACTIONS("INSERT", "shareholder_translations", $arrFields_translations, $arrValues_translations, '')) :
		endif;
		
		$arrayCount = count($_FILES);

		
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :?>
			<script type="text/javascript">
				window.location = 'shareholder.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'shareholder.php?code=1'
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
								<label for="shareholder_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="shareholder_status" id="shareholder_status" checked="">
										<label class="custom-control-label" for="shareholder_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="shareholder_title" class="form-label">shareholder Title<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="shareholder_title" id="shareholder_title" required autocomplete="off" />
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-md-2">
									<label for="shareholder_title" class="form-label">shareholder Title<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="title" id="title" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="no_of_shares_held" class="form-label">No of shares held<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" name="no_of_shares_held" id="no_of_shares_held" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="holding_percentage" class="form-label">Holding Percentage<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<input type="text" class="form-control" name="holding_percentage" id="holding_percentage" required autocomplete="off" />
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