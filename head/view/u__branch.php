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
if ($save == "update" && $hidden_branch_id != '') :

	$branch_location = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_location']));
	$branch_location_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_location_hindi']));
	$branch_name = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_name']));
	$branch_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_name_hindi']));
	$branch_email = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_email']));
	$branch_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_contact']));
	$branch_address = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_address']));
	$branch_address_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['branch_address_hindi']));
	$branchstatus = $_REQUEST['branchstatus']; //value='on' == 1 || value='' == 0

	if (
		$branchstatus == 'on'
	) :
		$branch_status = '1';
	else :
		$branch_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`branch_location`', '`branch_location_hindi`', '`branch_name`', '`branch_name_hindi`', '`branch_email`', '`branch_contact`', '`branch_address`', '`branch_address_hindi`',  '`createdby`', '`status`');

	$arrValues = array("$branch_location", "$branch_location_hindi", "$branch_name",  "$branch_name_hindi", "$branch_email", "$branch_contact", "$branch_address",  "$branch_address_hindi", "$logged_user_id", "$branch_status");


	$sqlWhere = "branch_id=$hidden_branch_id";

	if (sqlACTIONS("UPDATE", "branch", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'branch.php?code=1'
		</script>
<?php
		//header("Location:branch.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `branch_id`, `branch_location`, `branch_location_hindi`, `branch_name`, `branch_name_hindi`, `branch_email`, `branch_contact`, `branch_address`, `branch_address_hindi`, `status` FROM `branch` where deleted = '0' and `branch_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$branch_id = $row["branch_id"];
		$branch_location = $row['branch_location'];
		$branch_location_hindi = $row['branch_location_hindi'];
		$branch_name = $row['branch_name'];
		$branch_name_hindi = $row['branch_name_hindi'];
		$branch_email = $row['branch_email'];
		$branch_contact = $row['branch_contact'];
		$branch_address = $row['branch_address'];
		$branch_address_hindi = $row['branch_address_hindi'];
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
								<input type="hidden" name="hidden_branch_id" value="<?php echo $branch_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="branchstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="branchstatus" id="branchstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
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
									<input type="text" class="form-control" name="branch_location" id="branch_location" autocomplete="off" value="<?= $branch_location; ?>" />
								</div>
								<div class="col-md-5">
									<label for="branch_location_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="branch_location_hindi" id="branch_location_hindi"autocomplete="off" value="<?= $branch_location_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_name" id="branch_name" required autocomplete="off" value="<?= $branch_name; ?>" />
								</div>
								<div class="col-md-5">
									<label for="branch_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_name_hindi" id="branch_name_hindi" required autocomplete="off" value="<?= $branch_name_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_email" id="branch_email" required autocomplete="off" value="<?= $branch_email; ?>" />
								</div>
								<div class="col-md-5">
									<label for="branch_contact" class="form-label">Contact<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_contact" id="branch_contact" required autocomplete="off" value="<?= $branch_contact; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="branch_address" class="form-label">Address<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="branch_address" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_address" id="branch_address" required autocomplete="off" value="<?= $branch_address; ?>" />
								</div>
								<div class="col-md-5">
									<label for="branch_address_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="branch_address_hindi" id="branch_address_hindi" required autocomplete="off" value="<?= $branch_address_hindi; ?>" />
								</div>
							</div>

						</div>
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