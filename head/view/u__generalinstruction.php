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
	
	
	$generalinstruction_title = $validation_globalclass->sanitize($_REQUEST['generalinstruction_title']);
	$generalinstruction_title_hindi = $validation_globalclass->sanitize($_REQUEST['generalinstruction_title_hindi']);
	$generalinstruction_content = $_REQUEST['generalinstruction_content'];
	$generalinstruction_content_hindi = $_REQUEST['generalinstruction_content_hindi'];
	// $generalinstruction_title = $validation_globalclass->sanitize(ucwords($_REQUEST['generalinstruction_title']));
	

	
	$generalinstructionstatus = $_REQUEST['generalinstructionstatus']; //value='on' == 1 || value='' == 0

	if (
		$generalinstructionstatus == 'on'
	) :
		$generalinstruction_status = '1';
	else :
		$generalinstruction_status = '0';
	endif;

	
	//Insert Query
	
	$arrFields = array('`generalinstruction_title`', '`generalinstruction_title_hindi`', '`generalinstruction_content`', '`generalinstruction_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$generalinstruction_title",  "$generalinstruction_title_hindi",   "$generalinstruction_content",   "$generalinstruction_content_hindi", "$logged_user_id", "$generalinstruction_status");


	$sqlWhere = " `generalinstruction_id` = '1' ";

	if (sqlACTIONS("UPDATE", "generalinstruction", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'generalinstruction.php?route=edit'
		</script>
<?php
		//header("Location:generalinstruction.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `generalinstruction_id`, `generalinstruction_title`,  `generalinstruction_title_hindi`, `generalinstruction_content`, `generalinstruction_content_hindi`, `status` FROM `generalinstruction` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$generalinstruction_id = $row["generalinstruction_id"];
		$generalinstruction_title = $row['generalinstruction_title'];
		$generalinstruction_title_hindi = $row['generalinstruction_title_hindi'];
		$generalinstruction_content = $row['generalinstruction_content'];
		$generalinstruction_content_hindi = $row['generalinstruction_content_hindi'];
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
								<input type="hidden" name="hidden_generalinstruction_id" value="<?php echo $generalinstruction_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="generalinstructionstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="generalinstructionstatus" id="generalinstructionstatus" <?php if ($status == '1') :
																																				echo 'checked=""';
																																			endif; ?>>
										<label class="custom-control-label" for="generalinstructionstatus">Yes</label>
									</div>
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="generalinstruction_title" class="form-label">generalinstruction Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="generalinstruction_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="generalinstruction_title" id="generalinstruction_title" required autocomplete="off"><?= $generalinstruction_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="generalinstruction_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="generalinstruction_title_hindi" id="generalinstruction_title_hindi" required autocomplete="off"><?= $generalinstruction_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="generalinstruction_content" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="generalinstruction_content" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="generalinstruction_content" id="generalinstruction_content" placeholder=""><?= $generalinstruction_content; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="generalinstruction_content" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="generalinstruction_content_hindi" id="generalinstruction_content_hindi" placeholder=""><?= $generalinstruction_content_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
							

						
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$generalinstruction_sidebar_view_type = 'create';
			include viewpath('__generalinstructionsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->