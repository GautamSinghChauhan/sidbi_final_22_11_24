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
if ($save == "update" && $hidden_regional_id != '') :

	$regional_location = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_location']));
	$regional_location_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_location_hindi']));
	$regional_name = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_name']));
	$regional_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_name_hindi']));
	$regional_email = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_email']));
	$regional_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_contact']));
	$regional_address = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_address']));
	$regional_address_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['regional_address_hindi']));
	$regionalstatus = $_REQUEST['regionalstatus']; //value='on' == 1 || value='' == 0

	if (
		$regionalstatus == 'on'
	) :
		$regional_status = '1';
	else :
		$regional_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`regional_location`', '`regional_location_hindi`', '`regional_name`', '`regional_name_hindi`', '`regional_email`', '`regional_contact`', '`regional_address`', '`regional_address_hindi`', '`regional_state`', '`regional_state_hindi`',  '`createdby`', '`status`');

	$arrValues = array("$regional_location", "$regional_location_hindi", "$regional_name",  "$regional_name_hindi", "$regional_email", "$regional_contact", "$regional_address",  "$regional_address_hindi",  "$regional_state",  "$regional_state_hindi", "$logged_user_id", "$regional_status");


	$sqlWhere = "regional_id=$hidden_regional_id";

	if (sqlACTIONS("UPDATE", "regional", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'regional.php?code=1'
		</script>
<?php
		//header("Location:regional.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `regional_id`, `regional_location`, `regional_location_hindi`, `regional_name`, `regional_name_hindi`, `regional_email`, `regional_contact`, `regional_address`, `regional_address_hindi`,  `regional_state`, `regional_state_hindi`, `status` FROM `regional` where deleted = '0' and `regional_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$regional_id = $row["regional_id"];
		$regional_location = $row['regional_location'];
		$regional_location_hindi = $row['regional_location_hindi'];
		$regional_name = $row['regional_name'];
		$regional_name_hindi = $row['regional_name_hindi'];
		$regional_email = $row['regional_email'];
		$regional_contact = $row['regional_contact'];
		$regional_address = $row['regional_address'];
		$regional_address_hindi = $row['regional_address_hindi'];
		$regional_state = $row['regional_state'];
		$regional_state_hindi = $row['regional_state_hindi'];
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
								<input type="hidden" name="hidden_regional_id" value="<?php echo $regional_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="regionalstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="regionalstatus" id="regionalstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
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
									<input type="text" class="form-control" name="regional_location" id="regional_location" autocomplete="off" value="<?= $regional_location; ?>" />
								</div>
								<div class="col-md-5">
									<label for="regional_location_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="regional_location_hindi" id="regional_location_hindi"autocomplete="off" value="<?= $regional_location_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_name" id="regional_name" required autocomplete="off" value="<?= $regional_name; ?>" />
								</div>
								<div class="col-md-5">
									<label for="regional_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_name_hindi" id="regional_name_hindi" required autocomplete="off" value="<?= $regional_name_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_email" id="regional_email" required autocomplete="off" value="<?= $regional_email; ?>" />
								</div>
								<div class="col-md-5">
									<label for="regional_contact" class="form-label">Contact<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_contact" id="regional_contact" required autocomplete="off" value="<?= $regional_contact; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_address" class="form-label">Address<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_address" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_address" id="regional_address" required autocomplete="off" value="<?= $regional_address; ?>" />
								</div>
								<div class="col-md-5">
									<label for="regional_address_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_address_hindi" id="regional_address_hindi" required autocomplete="off" value="<?= $regional_address_hindi; ?>" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="regional_state" class="form-label">State<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="regional_state" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_state" id="regional_state" required autocomplete="off" value="<?= $regional_state; ?>" />
								</div>
								<div class="col-md-5">
									<label for="regional_state_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="regional_state_hindi" id="regional_state_hindi" required autocomplete="off" value="<?= $regional_state_hindi; ?>" />
								</div>
							</div>

						</div>
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