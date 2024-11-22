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

	$branch_location = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_location']));
	$branch_location_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_location_hindi']));
	$branch_name = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_name']));
	$branch_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_name_hindi']));
	$branch_email = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_email']));
	$branch_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_contact']));
	$branch_address = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_address']));
	$branch_address_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_address_hindi']));

	$branchstatus = $_REQUEST['branchstatus']; //value='on' == 1 || value='' == 0

	if ($branchstatus == 'on') :
		$branch_status = '1';
	else :
		$branch_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`branch_location`', '`branch_location_hindi`', '`branch_name`', '`branch_name_hindi`', '`branch_email`', '`branch_contact`', '`branch_address`', '`branch_address_hindi`', '`createdby`', '`status`');

	$arrValues = array("$branch_location", "$branch_location_hindi",  "$branch_name",  "$branch_name_hindi",  "$branch_email",  "$branch_contact",  "$branch_address",  "$branch_address_hindi", "$logged_user_id", "$branch_status");

	if (sqlACTIONS("INSERT", "branch", $arrFields, $arrValues, '')) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
?>
			<script type="text/javascript">
				window.location = 'branch.php?route=add&code=1'
			</script>
		<?php
		//header("Location:branch.php?route=add&code=1");
		else :
		?>
			<script type="text/javascript">
				window.location = 'branch.php?code=1'
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
								<label for="branchstatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="branchstatus" id="branchstatus" checked="">
										<label class="custom-control-label" for="branchstatus">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_location" class="form-label">Location<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="branch_location" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="branch_location" id="branch_location" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="branch_location_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="branch_location_hindi" id="branch_location_hindi" autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_name" id="branch_name" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="branch_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_name_hindi" id="branch_name_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_email" id="branch_email" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="branch_contact" class="form-label">Contact No<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_contact" id="branch_contact" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_address" class="form-label">Address<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_address" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_address" id="branch_address" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="branch_address_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_address_hindi" id="branch_address_hindi" required autocomplete="off" />
								</div>
							</div>
						</div>

						<!-- End of BASIC -->
					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			$branch_sidebar_view_type = 'create';
			include viewpath('__branchsidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->