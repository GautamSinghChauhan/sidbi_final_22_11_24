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
if ($save == "update" && $hidden_workingproduct_id != '') :

	$workingproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['workingproduct_title']));
	$workingproduct_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingproduct_title_hindi']));
	$workingproduct_tab = $validation_globalclass->sanitize(ucwords($_REQUEST['workingproduct_tab']));
	$workingproduct_tab_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingproduct_tab_hindi']));
	$workingproduct_key = ($_REQUEST['workingproduct_key']);
	$workingproduct_key_hindi = ($_REQUEST['workingproduct_key_hindi']);
	$workingproduct_eligibility = ($_REQUEST['workingproduct_eligibility']);
	$workingproduct_eligibility_hindi = ($_REQUEST['workingproduct_eligibility_hindi']);
	$workingproductstatus = $_REQUEST['workingproductstatus']; //value='on' == 1 || value='' == 0

	if (
		$workingproductstatus == 'on'
	) :
		$workingproduct_status = '1';
	else :
		$workingproduct_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`workingproduct_title`', '`workingproduct_title_hindi`', '`workingproduct_tab`', '`workingproduct_tab_hindi`', '`workingproduct_key`', '`workingproduct_key_hindi`', '`workingproduct_eligibility`', '`workingproduct_eligibility_hindi`',  '`createdby`', '`status`');

	$arrValues = array("$workingproduct_title", "$workingproduct_title_hindi", "$workingproduct_tab",  "$workingproduct_tab_hindi", "$workingproduct_key", "$workingproduct_key_hindi", "$workingproduct_eligibility",  "$workingproduct_eligibility_hindi", "$logged_user_id", "$workingproduct_status");


	$sqlWhere = "workingproduct_id=$hidden_workingproduct_id";

	if (sqlACTIONS("UPDATE", "workingproduct", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'workingproduct.php?code=1'
		</script>
<?php
		//header("Location:workingproduct.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `workingproduct_id`, `workingproduct_title`, `workingproduct_title_hindi`, `workingproduct_tab`, `workingproduct_tab_hindi`, `workingproduct_key`, `workingproduct_key_hindi`, `workingproduct_eligibility`, `workingproduct_eligibility_hindi`, `status` FROM `workingproduct` where deleted = '0' and `workingproduct_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$workingproduct_id = $row["workingproduct_id"];
		$workingproduct_title = $row['workingproduct_title'];
		$workingproduct_title_hindi = $row['workingproduct_title_hindi'];
		$workingproduct_tab = $row['workingproduct_tab'];
		$workingproduct_tab_hindi = $row['workingproduct_tab_hindi'];
		$workingproduct_key = $row['workingproduct_key'];
		$workingproduct_key_hindi = $row['workingproduct_key_hindi'];
		$workingproduct_eligibility = $row['workingproduct_eligibility'];
		$workingproduct_eligibility_hindi = $row['workingproduct_eligibility_hindi'];
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
								<input type="hidden" name="hidden_workingproduct_id" value="<?php echo $workingproduct_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="workingproductstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="workingproductstatus" id="workingproductstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
										<label class="custom-control-label" for="workingproductstatus">Yes</label>
									</div>
								</div>
							</div>
						
							
							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingproduct_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="workingproduct_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingproduct_title" id="workingproduct_title" autocomplete="off" value="<?= $workingproduct_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="workingproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingproduct_title_hindi" id="workingproduct_title_hindi"autocomplete="off" value="<?= $workingproduct_title_hindi; ?>" />
								</div>
							</div> -->
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingproduct_tab" class="form-label">Unlocking Growth Heading<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="workingproduct_tab" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="workingproduct_tab" id="workingproduct_tab" required autocomplete="off" value="<?= $workingproduct_tab; ?>" />
								</div>
								<div class="col-md-5">
									<label for="workingproduct_tab_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="workingproduct_tab_hindi" id="workingproduct_tab_hindi" required autocomplete="off" value="<?= $workingproduct_tab_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="workingproduct_key" class="form-label">Key Features<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="workingproduct_key" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="workingproduct_key" id="workingproduct_key" placeholder=""><?= $workingproduct_key; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="workingproduct_key" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="workingproduct_key_hindi" id="workingproduct_key_hindi" placeholder=""><?= $workingproduct_key_hindi; ?></textarea>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="workingproduct_eligibility" class="form-label">Eligibility<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="workingproduct_eligibility" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="workingproduct_eligibility" id="workingproduct_eligibility" placeholder=""><?= $workingproduct_eligibility; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="workingproduct_eligibility" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="workingproduct_eligibility_hindi" id="workingproduct_eligibility_hindi" placeholder=""><?= $workingproduct_eligibility_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$workingproduct_sidebar_view_type = 'create';
			include viewpath('__workingproductsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->