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
if ($save == "update" && $hidden_greenproduct_id != '') :

	$greenproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['greenproduct_title']));
	$greenproduct_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greenproduct_title_hindi']));
	$greenproduct_tab = $validation_globalclass->sanitize(ucwords($_REQUEST['greenproduct_tab']));
	$greenproduct_tab_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greenproduct_tab_hindi']));
	$greenproduct_key = ($_REQUEST['greenproduct_key']);
	$greenproduct_key_hindi = ($_REQUEST['greenproduct_key_hindi']);
	$greenproduct_eligibility = ($_REQUEST['greenproduct_eligibility']);
	$greenproduct_eligibility_hindi = ($_REQUEST['greenproduct_eligibility_hindi']);
	$greenproductstatus = $_REQUEST['greenproductstatus']; //value='on' == 1 || value='' == 0

	if (
		$greenproductstatus == 'on'
	) :
		$greenproduct_status = '1';
	else :
		$greenproduct_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`greenproduct_title`', '`greenproduct_title_hindi`', '`greenproduct_tab`', '`greenproduct_tab_hindi`', '`greenproduct_key`', '`greenproduct_key_hindi`', '`greenproduct_eligibility`', '`greenproduct_eligibility_hindi`',  '`createdby`', '`status`');

	$arrValues = array("$greenproduct_title", "$greenproduct_title_hindi", "$greenproduct_tab",  "$greenproduct_tab_hindi", "$greenproduct_key", "$greenproduct_key_hindi", "$greenproduct_eligibility",  "$greenproduct_eligibility_hindi", "$logged_user_id", "$greenproduct_status");


	$sqlWhere = "greenproduct_id=$hidden_greenproduct_id";

	if (sqlACTIONS("UPDATE", "greenproduct", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'greenproduct.php?code=1'
		</script>
<?php
		//header("Location:greenproduct.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `greenproduct_id`, `greenproduct_title`, `greenproduct_title_hindi`, `greenproduct_tab`, `greenproduct_tab_hindi`, `greenproduct_key`, `greenproduct_key_hindi`, `greenproduct_eligibility`, `greenproduct_eligibility_hindi`, `status` FROM `greenproduct` where deleted = '0' and `greenproduct_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$greenproduct_id = $row["greenproduct_id"];
		$greenproduct_title = $row['greenproduct_title'];
		$greenproduct_title_hindi = $row['greenproduct_title_hindi'];
		$greenproduct_tab = $row['greenproduct_tab'];
		$greenproduct_tab_hindi = $row['greenproduct_tab_hindi'];
		$greenproduct_key = $row['greenproduct_key'];
		$greenproduct_key_hindi = $row['greenproduct_key_hindi'];
		$greenproduct_eligibility = $row['greenproduct_eligibility'];
		$greenproduct_eligibility_hindi = $row['greenproduct_eligibility_hindi'];
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
								<input type="hidden" name="hidden_greenproduct_id" value="<?php echo $greenproduct_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="greenproductstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="greenproductstatus" id="greenproductstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
										<label class="custom-control-label" for="greenproductstatus">Yes</label>
									</div>
								</div>
							</div>
						
							
							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greenproduct_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="greenproduct_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greenproduct_title" id="greenproduct_title" autocomplete="off" value="<?= $greenproduct_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="greenproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greenproduct_title_hindi" id="greenproduct_title_hindi"autocomplete="off" value="<?= $greenproduct_title_hindi; ?>" />
								</div>
							</div> -->
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greenproduct_tab" class="form-label">Unlocking Growth Heading<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="greenproduct_tab" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="greenproduct_tab" id="greenproduct_tab" required autocomplete="off" value="<?= $greenproduct_tab; ?>" />
								</div>
								<div class="col-md-5">
									<label for="greenproduct_tab_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="greenproduct_tab_hindi" id="greenproduct_tab_hindi" required autocomplete="off" value="<?= $greenproduct_tab_hindi; ?>" />
								</div>
							</div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="greenproduct_key" class="form-label">Key Features<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="greenproduct_key" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="greenproduct_key" id="greenproduct_key" placeholder=""><?= $greenproduct_key; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="greenproduct_key" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="greenproduct_key_hindi" id="greenproduct_key_hindi" placeholder=""><?= $greenproduct_key_hindi; ?></textarea>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="greenproduct_eligibility" class="form-label">Eligibility<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="greenproduct_eligibility" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="greenproduct_eligibility" id="greenproduct_eligibility" placeholder=""><?= $greenproduct_eligibility; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="greenproduct_eligibility" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="greenproduct_eligibility_hindi" id="greenproduct_eligibility_hindi" placeholder=""><?= $greenproduct_eligibility_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$greenproduct_sidebar_view_type = 'create';
			include viewpath('__greenproductsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->