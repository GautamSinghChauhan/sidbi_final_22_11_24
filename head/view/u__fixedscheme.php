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
	

	$fixedscheme_title = $validation_globalclass->sanitize($_REQUEST['fixedscheme_title']);
	$fixedscheme_title_hindi = $validation_globalclass->sanitize($_REQUEST['fixedscheme_title_hindi']);
	$fixedscheme_content = $_REQUEST['fixedscheme_content'];
	$fixedscheme_content_hindi = $_REQUEST['fixedscheme_content_hindi'];
	// $fixedscheme_title = $validation_globalclass->sanitize(ucwords($_REQUEST['fixedscheme_title']));
	

	
	$fixedschemestatus = $_REQUEST['fixedschemestatus']; //value='on' == 1 || value='' == 0

	if (
		$fixedschemestatus == 'on'
	) :
		$fixedscheme_status = '1';
	else :
		$fixedscheme_status = '0';
	endif;

	
	//Insert Query
	
	$arrFields = array('`fixedscheme_title`', '`fixedscheme_title_hindi`', '`fixedscheme_content`', '`fixedscheme_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$fixedscheme_title",  "$fixedscheme_title_hindi",   "$fixedscheme_content",   "$fixedscheme_content_hindi", "$logged_user_id", "$fixedscheme_status");


	$sqlWhere = " `fixedscheme_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "fixedscheme", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'fixedscheme.php?route=edit'
		</script>
<?php
		//header("Location:fixedscheme.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `fixedscheme_ID`, `fixedscheme_title`, `fixedscheme_title_hindi`, `fixedscheme_content`, `fixedscheme_content_hindi`, `status` FROM `fixedscheme` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$fixedscheme_ID = $row["fixedscheme_ID"];
		$fixedscheme_title = $row['fixedscheme_title'];
		$fixedscheme_title_hindi = $row['fixedscheme_title_hindi'];
		$fixedscheme_content = $row['fixedscheme_content'];
		$fixedscheme_content_hindi = $row['fixedscheme_content_hindi'];
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
								<input type="hidden" name="hidden_fixedscheme_ID" value="<?php echo $fixedscheme_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="fixedschemestatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="fixedschemestatus" id="fixedschemestatus" <?php if ($status == '1') :
																																				echo 'checked=""';
																																			endif; ?>>
										<label class="custom-control-label" for="fixedschemestatus">Yes</label>
									</div>
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="fixedscheme_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="fixedscheme_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="fixedscheme_title" id="fixedscheme_title" required autocomplete="off"><?= $fixedscheme_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="fixedscheme_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="fixedscheme_title_hindi" id="fixedscheme_title_hindi" required autocomplete="off"><?= $fixedscheme_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="fixedscheme_content" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="fixedscheme_content" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="fixedscheme_content" id="fixedscheme_content" placeholder=""><?= $fixedscheme_content; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="fixedscheme_content" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="fixedscheme_content_hindi" id="fixedscheme_content_hindi" placeholder=""><?= $fixedscheme_content_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
							

						
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$fixedscheme_sidebar_view_type = 'create';
			include viewpath('__fixedschemesidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->