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

	$regional_location = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_location']));
	$regional_location_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_location_hindi']));
	$regional_name = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_name']));
	$regional_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_name_hindi']));
	$regional_email = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_email']));
	$regional_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_contact']));
	$regional_address = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_address']));
	$regional_address_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_address_hindi']));
	$regional_state = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_state']));
	$regional_state_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_state_hindi']));

	$regionalstatus = $_REQUEST['regionalstatus']; //value='on' == 1 || value='' == 0

	if ($regionalstatus == 'on') :
		$regional_status = '1';
	else :
		$regional_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`regional_location`', '`regional_location_hindi`', '`regional_name`', '`regional_name_hindi`', '`regional_email`', '`regional_contact`', '`regional_address`', '`regional_address_hindi`', '`regional_state`', '`regional_state_hindi`', '`createdby`', '`status`');

	$arrValues = array("$regional_location", "$regional_location_hindi",  "$regional_name",  "$regional_name_hindi",  "$regional_email",  "$regional_contact",  "$regional_address",  "$regional_address_hindi", "$regional_state",  "$regional_state_hindi",  "$logged_user_id", "$regional_status");

	if (sqlACTIONS("INSERT", "regional", $arrFields, $arrValues, '')) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
?>
			<script type="text/javascript">
				window.location = 'regional.php?route=add&code=1'
			</script>
		<?php
		//header("Location:regional.php?route=add&code=1");
		else :
		?>
			<script type="text/javascript">
				window.location = 'regional.php?code=1'
			</script>
	<?php
		//header("Location:category.php?code=1");
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
								<label for="regionalstatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="regionalstatus" id="regionalstatus" checked="">
										<label class="custom-control-label" for="regionalstatus">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_location" class="form-label">Location<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="regional_location" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="regional_location" id="regional_location" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="regional_location_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="regional_location_hindi" id="regional_location_hindi" autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_name" id="regional_name" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="regional_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_name_hindi" id="regional_name_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_email" id="regional_email" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="regional_contact" class="form-label">Contact No<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_contact" id="regional_contact" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_address" class="form-label">Address<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_address" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_address" id="regional_address" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="regional_address_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_address_hindi" id="regional_address_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_state" class="form-label">State<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_state" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_state" id="regional_state" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="regional_state_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_state_hindi" id="regional_state_hindi" required autocomplete="off" />
								</div>
							</div>
						</div>

						<!-- End of BASIC -->
					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			$regional_sidebar_view_type = 'create';
			include viewpath('__regionalsidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->