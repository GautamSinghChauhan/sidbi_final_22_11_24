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
if ($save == "update" && $hidden_vertical_id != '') :

	$vertical_leadership = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_leadership']));
	$vertical_leadership_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_leadership_hindi']));
	$vertical_name = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_name']));
	$vertical_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_name_hindi']));
	$vertical_email = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_email']));
	$vertical_contact = $validation_globalclass->sanitize(ucwords($_REQUEST['vertical_contact']));
	$verticalstatus = $_REQUEST['verticalstatus']; //value='on' == 1 || value='' == 0

	if (
		$verticalstatus == 'on'
	) :
		$vertical_status = '1';
	else :
		$vertical_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`vertical_leadership`', '`vertical_leadership_hindi`', '`vertical_name`', '`vertical_name_hindi`', '`vertical_email`', '`vertical_contact`', '`createdby`', '`status`');

	$arrValues = array("$vertical_leadership", "$vertical_leadership_hindi", "$vertical_name",  "$vertical_name_hindi", "$vertical_email", "$vertical_contact", "$logged_user_id", "$vertical_status");


	$sqlWhere = "vertical_id=$hidden_vertical_id";

	if (sqlACTIONS("UPDATE", "vertical", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'vertical.php?code=1'
		</script>
<?php
		//header("leadership:vertical.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `vertical_id`, `vertical_leadership`, `vertical_leadership_hindi`, `vertical_name`, `vertical_name_hindi`, `vertical_email`, `vertical_contact`, `status` FROM `vertical` where deleted = '0' and `vertical_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$vertical_id = $row["vertical_id"];
		$vertical_leadership = $row['vertical_leadership'];
		$vertical_leadership_hindi = $row['vertical_leadership_hindi'];
		$vertical_name = $row['vertical_name'];
		$vertical_name_hindi = $row['vertical_name_hindi'];
		$vertical_email = $row['vertical_email'];
		$vertical_contact = $row['vertical_contact'];
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
								<input type="hidden" name="hidden_vertical_id" value="<?php echo $vertical_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="verticalstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="verticalstatus" id="verticalstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
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
									<input type="text" class="form-control" name="vertical_leadership" id="vertical_leadership" autocomplete="off" value="<?= $vertical_leadership; ?>" />
								</div>
								<div class="col-md-5">
									<label for="vertical_leadership_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="vertical_leadership_hindi" id="vertical_leadership_hindi"autocomplete="off" value="<?= $vertical_leadership_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vertical_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vertical_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_name" id="vertical_name" required autocomplete="off" value="<?= $vertical_name; ?>" />
								</div>
								<div class="col-md-5">
									<label for="vertical_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_name_hindi" id="vertical_name_hindi" required autocomplete="off" value="<?= $vertical_name_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vertical_email" class="form-label">Email and Contact<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vertical_email" class="form-label">Email<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_email" id="vertical_email" required autocomplete="off" value="<?= $vertical_email; ?>" />
								</div>
								<div class="col-md-5">
									<label for="vertical_contact" class="form-label">Contact<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="vertical_contact" id="vertical_contact" required autocomplete="off" value="<?= $vertical_contact; ?>" />
								</div>
							</div>
						</div>
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