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

	$vertical_leadership = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_leadership']));
	$vertical_leadership_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_leadership_hindi']));
	$vertical_name = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_name']));
	$vertical_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_name_hindi']));
	$vertical_email = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_email']));
	$vertical_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_contact']));

	$verticalstatus = $_REQUEST['verticalstatus']; //value='on' == 1 || value='' == 0

	if ($verticalstatus == 'on') :
		$vertical_status = '1';
	else :
		$vertical_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`vertical_leadership`', '`vertical_leadership_hindi`', '`vertical_name`', '`vertical_name_hindi`', '`vertical_email`', '`vertical_contact`', '`createdby`', '`status`');

	$arrValues = array("$vertical_leadership", "$vertical_leadership_hindi",  "$vertical_name",  "$vertical_name_hindi",  "$vertical_email",  "$vertical_contact", "$logged_user_id", "$vertical_status");

	if (sqlACTIONS("INSERT", "vertical", $arrFields, $arrValues, '')) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
?>
			<script type="text/javascript">
				window.location = 'vertical.php?route=add&code=1'
			</script>
		<?php
		//header("leadership:vertical.php?route=add&code=1");
		else :
		?>
			<script type="text/javascript">
				window.location = 'vertical.php?code=1'
			</script>
	<?php
		//header("leadership:category.php?code=1");
		endif;

		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;
	// }else{
	?>
	<!--<script type="text/javascript">window.location = 'category.php?route=add&code=0' </script>-->
<?php
// }

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
								<label for="verticalstatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="verticalstatus" id="verticalstatus" checked="">
										<label class="custom-control-label" for="verticalstatus">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vertical_leadership" class="form-label">Leadership<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="vertical_leadership" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="vertical_leadership" id="vertical_leadership" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="vertical_leadership_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="vertical_leadership_hindi" id="vertical_leadership_hindi" autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vertical_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vertical_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_name" id="vertical_name" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="vertical_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_name_hindi" id="vertical_name_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vertical_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vertical_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_email" id="vertical_email" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="vertical_contact" class="form-label">Contact No<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_contact" id="vertical_contact" required autocomplete="off" />
								</div>
							</div>
						</div>

						<!-- End of BASIC -->
					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			$vertical_sidebar_view_type = 'create';
			include viewpath('__verticalsidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->