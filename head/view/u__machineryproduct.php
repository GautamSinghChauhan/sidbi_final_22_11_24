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
if ($save == "update" && $hidden_machineryproduct_id != '') :

	$machineryproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['machineryproduct_title']));
	$machineryproduct_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['machineryproduct_title_hindi']));
	$machineryproduct_tab = $validation_globalclass->sanitize(ucwords($_REQUEST['machineryproduct_tab']));
	$machineryproduct_tab_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['machineryproduct_tab_hindi']));
	$machineryproduct_key = ($_REQUEST['machineryproduct_key']);
	$machineryproduct_key_hindi = ($_REQUEST['machineryproduct_key_hindi']);
	$machineryproduct_eligibility = ($_REQUEST['machineryproduct_eligibility']);
	$machineryproduct_eligibility_hindi = ($_REQUEST['machineryproduct_eligibility_hindi']);
	$machineryproductstatus = $_REQUEST['machineryproductstatus']; //value='on' == 1 || value='' == 0

	if (
		$machineryproductstatus == 'on'
	) :
		$machineryproduct_status = '1';
	else :
		$machineryproduct_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`machineryproduct_title`', '`machineryproduct_title_hindi`', '`machineryproduct_tab`', '`machineryproduct_tab_hindi`', '`machineryproduct_key`', '`machineryproduct_key_hindi`', '`machineryproduct_eligibility`', '`machineryproduct_eligibility_hindi`',  '`createdby`', '`status`');

	$arrValues = array("$machineryproduct_title", "$machineryproduct_title_hindi", "$machineryproduct_tab",  "$machineryproduct_tab_hindi", "$machineryproduct_key", "$machineryproduct_key_hindi", "$machineryproduct_eligibility",  "$machineryproduct_eligibility_hindi", "$logged_user_id", "$machineryproduct_status");


	$sqlWhere = "machineryproduct_id=$hidden_machineryproduct_id";

	if (sqlACTIONS("UPDATE", "machineryproduct", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'machineryproduct.php?code=1'
		</script>
<?php
		//header("Location:machineryproduct.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `machineryproduct_id`, `machineryproduct_title`, `machineryproduct_title_hindi`, `machineryproduct_tab`, `machineryproduct_tab_hindi`, `machineryproduct_key`, `machineryproduct_key_hindi`, `machineryproduct_eligibility`, `machineryproduct_eligibility_hindi`, `status` FROM `machineryproduct` where deleted = '0' and `machineryproduct_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$machineryproduct_id = $row["machineryproduct_id"];
		$machineryproduct_title = $row['machineryproduct_title'];
		$machineryproduct_title_hindi = $row['machineryproduct_title_hindi'];
		$machineryproduct_tab = $row['machineryproduct_tab'];
		$machineryproduct_tab_hindi = $row['machineryproduct_tab_hindi'];
		$machineryproduct_key = $row['machineryproduct_key'];
		$machineryproduct_key_hindi = $row['machineryproduct_key_hindi'];
		$machineryproduct_eligibility = $row['machineryproduct_eligibility'];
		$machineryproduct_eligibility_hindi = $row['machineryproduct_eligibility_hindi'];
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
								<input type="hidden" name="hidden_machineryproduct_id" value="<?php echo $machineryproduct_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="machineryproductstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="machineryproductstatus" id="machineryproductstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
										<label class="custom-control-label" for="machineryproductstatus">Yes</label>
									</div>
								</div>
							</div>
						
							
							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="machineryproduct_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="machineryproduct_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="machineryproduct_title" id="machineryproduct_title" autocomplete="off" value="<?= $machineryproduct_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="machineryproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="machineryproduct_title_hindi" id="machineryproduct_title_hindi"autocomplete="off" value="<?= $machineryproduct_title_hindi; ?>" />
								</div>
							</div> -->
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="machineryproduct_tab" class="form-label">Unlocking Growth Heading<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="machineryproduct_tab" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="machineryproduct_tab" id="machineryproduct_tab" required autocomplete="off" value="<?= $machineryproduct_tab; ?>" />
								</div>
								<div class="col-md-5">
									<label for="machineryproduct_tab_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="machineryproduct_tab_hindi" id="machineryproduct_tab_hindi" required autocomplete="off" value="<?= $machineryproduct_tab_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="machineryproduct_key" class="form-label">Key Features<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="machineryproduct_key" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="machineryproduct_key" id="machineryproduct_key" placeholder=""><?= $machineryproduct_key; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="machineryproduct_key" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="machineryproduct_key_hindi" id="machineryproduct_key_hindi" placeholder=""><?= $machineryproduct_key_hindi; ?></textarea>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="machineryproduct_eligibility" class="form-label">Eligibility<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="machineryproduct_eligibility" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="machineryproduct_eligibility" id="machineryproduct_eligibility" placeholder=""><?= $machineryproduct_eligibility; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="machineryproduct_eligibility" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="machineryproduct_eligibility_hindi" id="machineryproduct_eligibility_hindi" placeholder=""><?= $machineryproduct_eligibility_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$machineryproduct_sidebar_view_type = 'create';
			include viewpath('__machineryproductsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->