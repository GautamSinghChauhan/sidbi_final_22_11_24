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

	$prayaasglance_heading = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_heading']));
	$prayaasglance_heading_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_heading_hindi']));
	$prayaasglance_title = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_title']));
	$prayaasglance_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_title_hindi']));
	$prayaasglance_content = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_content']));
	$prayaasglance_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['prayaasglance_content_hindi']));

	$prayaasglancestatus = $_REQUEST['prayaasglancestatus']; //value='on' == 1 || value='' == 0

	if ($prayaasglancestatus == 'on') :
		$prayaasglance_status = '1';
	else :
		$prayaasglance_status = '0';
	endif;

	//Insert Query
	$arrFields = array('`prayaasglance_heading`', '`prayaasglance_heading_hindi`', '`prayaasglance_title`', '`prayaasglance_title_hindi`', '`prayaasglance_content`', '`prayaasglance_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$prayaasglance_heading", "$prayaasglance_heading_hindi",  "$prayaasglance_title",  "$prayaasglance_title_hindi", "$prayaasglance_content",  "$prayaasglance_content_hindi", "$logged_user_id", "$prayaasglance_status");

	if (sqlACTIONS("INSERT", "prayaasglance", $arrFields, $arrValues, '')) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") :
?>
			<script type="text/javascript">
				window.location = 'prayaasglance.php?route=add&code=1'
			</script>
		<?php
		//header("location:prayaasglance.php?route=add&code=1");
		else :
		?>
			<script type="text/javascript">
				window.location = 'prayaasglance.php?code=1'
			</script>
	<?php
		//header("heading:category.php?code=1");
		endif;

		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;
	// }else{
	?>
	<!--<script type="text/javascript">window.heading = 'category.php?route=add&code=0' </script>-->
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
								<button type="submit" title="save" value="save" id="save" class="btn btn-success"><?= $__save ?></button>
								<button type="submit" title="save_close" id="save_close" value="save_close" class="btn btn-success"><?= $__save_close ?></button>
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="prayaasglancestatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" title="prayaasglancestatus" id="prayaasglancestatus" checked="">
										<label class="custom-control-label" for="prayaasglancestatus">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="prayaasglance_heading" class="form-label">Heading<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="prayaasglance_heading" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" title="prayaasglance_heading" id="prayaasglance_heading" autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="prayaasglance_heading_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" title="prayaasglance_heading_hindi" id="prayaasglance_heading_hindi" autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="prayaasglance_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="prayaasglance_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" title="prayaasglance_title" id="prayaasglance_title" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="prayaasglance_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" title="prayaasglance_title_hindi" id="prayaasglance_title_hindi" required autocomplete="off" />
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="prayaasglance_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>
								<div class="col-md-5">
									<label for="prayaasglance_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" title="prayaasglance_content" id="prayaasglance_content" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="prayaasglance_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" title="prayaasglance_content_hindi" id="prayaasglance_content_hindi" required autocomplete="off" />
								</div>
							</div>
						</div>

						<!-- End of BASIC -->
					</form>
				</div><!-- row -->
			</div><!-- col -->
			<?php
			$prayaasglance_sidebar_view_type = 'create';
			include viewpath('__prayaasglancesidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->