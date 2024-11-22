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
if ($save == "update") :
	

	$mission_title = $validation_globalclass->sanitize(ucwords($_REQUEST['mission_title']));
	$mission_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['mission_title_hindi']));
	$mission_content = $validation_globalclass->sanitize(ucwords($_REQUEST['mission_content']));
	$mission_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['mission_content_hindi']));
	$vision_title = $validation_globalclass->sanitize($_REQUEST['vision_title']);
	$vision_title_hindi = $validation_globalclass->sanitize($_REQUEST['vision_title_hindi']);
	$vision_content = $validation_globalclass->sanitize($_REQUEST['vision_content']);
	$vision_content_hindi = $validation_globalclass->sanitize($_REQUEST['vision_content_hindi']);
	// $vision_title = $validation_globalclass->sanitize(ucwords($_REQUEST['vision_title']));
	

	
	$missionandvisionstatus = $_REQUEST['missionandvisionstatus']; //value='on' == 1 || value='' == 0

	if (
		$missionandvisionstatus == 'on'
	) :
		$missionandvision_status = '1';
	else :
		$missionandvision_status = '0';
	endif;

	
	//Insert Query
	
	$arrFields = array('`mission_title`', '`mission_title_hindi`', '`mission_content`', '`mission_content_hindi`', '`vision_title`', '`vision_title_hindi`', '`vision_content`', '`vision_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$mission_title", "$mission_title_hindi", "$mission_content", "$mission_content_hindi",   "$vision_title",  "$vision_title_hindi",   "$vision_content",   "$vision_content_hindi", "$logged_user_id", "$missionandvision_status");


	$sqlWhere = " `missionandvision_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "missionandvision", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'missionandvision.php?route=edit'
		</script>
<?php
		//header("Location:missionandvision.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `missionandvision_ID`, `mission_title`,  `mission_title_hindi`,  `mission_content`, `mission_content_hindi`, `vision_title`,  `vision_title_hindi`, `vision_content`, `vision_content_hindi`, `status` FROM `missionandvision` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$missionandvision_ID = $row["missionandvision_ID"];
		$mission_title = $row['mission_title'];
		$mission_title_hindi = $row['mission_title_hindi'];
		$mission_content = $row['mission_content'];
		$mission_content_hindi = $row['mission_content_hindi'];
		$vision_title = $row['vision_title'];
		$vision_title_hindi = $row['vision_title_hindi'];
		$vision_content = $row['vision_content'];
		$vision_content_hindi = $row['vision_content_hindi'];
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
								<input type="hidden" name="hidden_missionandvision_ID" value="<?php echo $missionandvision_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="missionandvisionstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="missionandvisionstatus" id="missionandvisionstatus" <?php if ($status == '1') :
																																				echo 'checked=""';
																																			endif; ?>>
										<label class="custom-control-label" for="missionandvisionstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="mission_title" class="form-label">Mission Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="mission_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="mission_title" id="mission_title" required autocomplete="off"><?= $mission_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="mission_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="mission_title_hindi" id="mission_title_hindi" required autocomplete="off"><?= $mission_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="mission_content" class="form-label">Mission Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="mission_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="mission_content" id="mission_content" required autocomplete="off"><?= $mission_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="mission_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="mission_content_hindi" id="mission_content_hindi" required autocomplete="off"><?= $mission_content_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vision_title" class="form-label">Vision Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vision_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="vision_title" id="vision_title" required autocomplete="off"><?= $vision_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="vision_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="vision_title_hindi" id="vision_title_hindi" required autocomplete="off"><?= $vision_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="vision_content" class="form-label">Vision Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="vision_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="vision_content" id="vision_content" required autocomplete="off"><?= $vision_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="vision_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="vision_content_hindi" id="vision_content_hindi" required autocomplete="off"><?= $vision_content_hindi; ?></textarea>
								</div>

							</div>

						</div>
							

						
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$missionandvision_sidebar_view_type = 'create';
			include viewpath('__missionandvisionsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->