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

	$projectproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['projectproduct_title']));
	$projectproduct_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projectproduct_title_hindi']));
	$projectproduct_tab = $validation_globalclass->sanitize(ucwords($_REQUEST['projectproduct_tab']));
	$projectproduct_tab_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projectproduct_tab_hindi']));
	$projectproduct_key =($_REQUEST['projectproduct_key']);
	$projectproduct_key_hindi =($_REQUEST['projectproduct_key_hindi']);
	$projectproduct_eligibility =($_REQUEST['projectproduct_eligibility']);
	$projectproduct_eligibility_hindi =($_REQUEST['projectproduct_eligibility_hindi']);

	$projectproductstatus = $_REQUEST['projectproductstatus']; //value='on' == 1 || value='' == 0

	if ($projectproductstatus == 'on') :
		$projectproduct_status = '1';
	else :
		$projectproduct_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`projectproduct_title`', '`projectproduct_title_hindi`', '`projectproduct_tab`', '`projectproduct_tab_hindi`', '`projectproduct_key`', '`projectproduct_key_hindi`', '`projectproduct_eligibility`', '`projectproduct_eligibility_hindi`', '`createdby`', '`status`');

	$arrValues = array("$projectproduct_title", "$projectproduct_title_hindi",  "$projectproduct_tab",  "$projectproduct_tab_hindi",  "$projectproduct_key",  "$projectproduct_key_hindi",  "$projectproduct_eligibility",  "$projectproduct_eligibility_hindi", "$logged_user_id", "$projectproduct_status");

	if (sqlACTIONS("INSERT", "projectproduct", $arrFields, $arrValues, '')) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
?>
			<script type="text/javascript">
				window.location = 'projectproduct.php?route=add&code=1'
			</script>
		<?php
		//header("Location:projectproduct.php?route=add&code=1");
		else :
		?>
			<script type="text/javascript">
				window.location = 'projectproduct.php?code=1'
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
								<label for="projectproductstatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="projectproductstatus" id="projectproductstatus" checked="">
										<label class="custom-control-label" for="projectproductstatus">Yes</label>
									</div>
								</div>
							</div>

							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projectproduct_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="projectproduct_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projectproduct_title" id="projectproduct_title" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="projectproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projectproduct_title_hindi" id="projectproduct_title_hindi" autocomplete="off" />
								</div>
							</div> -->
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projectproduct_tab" class="form-label">Tab<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="projectproduct_tab" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="projectproduct_tab" id="projectproduct_tab" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="projectproduct_tab_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="projectproduct_tab_hindi" id="projectproduct_tab_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="projectproduct_key" class="form-label">Key Feature<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="projectproduct_key" id="projectproduct_key" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="projectproduct_key_hindi" id="projectproduct_key_hindi" placeholder=""></textarea>
                                </div>
                            </div>
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="projectproduct_eligibility" class="form-label">Eligibility<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="projectproduct_eligibility" id="projectproduct_eligibility" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="projectproduct_eligibility_hindi" id="projectproduct_eligibility_hindi" placeholder=""></textarea>
                                </div>
                            </div>
						</div>

						<!-- End of BASIC -->
					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			$projectproduct_sidebar_view_type = 'create';
			include viewpath('__projectproductsidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->