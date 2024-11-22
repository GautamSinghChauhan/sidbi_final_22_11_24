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
if ($save == "update" && $hidden_zonal_id != '') :

	$zonal_office = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_office']));
	$zonal_office_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_office_hindi']));
	$zonal_name = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_name']));
	$zonal_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_name_hindi']));
	$zonal_email = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_email']));
	$zonal_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['zonal_contact']));
	$zonalstatus = $_REQUEST['zonalstatus']; //value='on' == 1 || value='' == 0

	if (
		$zonalstatus == 'on'
	) :
		$zonal_status = '1';
	else :
		$zonal_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`zonal_office`', '`zonal_office_hindi`', '`zonal_name`', '`zonal_name_hindi`', '`zonal_email`', '`zonal_contact`', '`createdby`', '`status`');

	$arrValues = array("$zonal_office", "$zonal_office_hindi", "$zonal_name",  "$zonal_name_hindi", "$zonal_email", "$zonal_contact", "$logged_user_id", "$zonal_status");


	$sqlWhere = "zonal_id=$hidden_zonal_id";

	if (sqlACTIONS("UPDATE", "zonal", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'zonal.php?code=1'
		</script>
<?php
		//header("office:zonal.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `zonal_id`, `zonal_office`, `zonal_office_hindi`, `zonal_name`, `zonal_name_hindi`, `zonal_email`, `zonal_contact`, `status` FROM `zonal` where deleted = '0' and `zonal_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$zonal_id = $row["zonal_id"];
		$zonal_office = $row['zonal_office'];
		$zonal_office_hindi = $row['zonal_office_hindi'];
		$zonal_name = $row['zonal_name'];
		$zonal_name_hindi = $row['zonal_name_hindi'];
		$zonal_email = $row['zonal_email'];
		$zonal_contact = $row['zonal_contact'];
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
								<input type="hidden" name="hidden_zonal_id" value="<?php echo $zonal_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="zonalstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="zonalstatus" id="zonalstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
										<label class="custom-control-label" for="zonalstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="zonal_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="zonal_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="zonal_name" id="zonal_name" required autocomplete="off" value="<?= $zonal_name; ?>" />
								</div>
								<div class="col-md-5">
									<label for="zonal_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="zonal_name_hindi" id="zonal_name_hindi" required autocomplete="off" value="<?= $zonal_name_hindi; ?>" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="zonal_office" class="form-label">Office<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="zonal_office" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="zonal_office" id="zonal_office" autocomplete="off" value="<?= $zonal_office; ?>" />
								</div>
								<div class="col-md-5">
									<label for="zonal_office_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="zonal_office_hindi" id="zonal_office_hindi"autocomplete="off" value="<?= $zonal_office_hindi; ?>" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="zonal_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="zonal_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="zonal_email" id="zonal_email" required autocomplete="off" value="<?= $zonal_email; ?>" />
								</div>
								<div class="col-md-5">
									<label for="zonal_contact" class="form-label">Contact<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="zonal_contact" id="zonal_contact" required autocomplete="off" value="<?= $zonal_contact; ?>" />
								</div>
							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$zonal_sidebar_view_type = 'create';
			include viewpath('__zonalsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->