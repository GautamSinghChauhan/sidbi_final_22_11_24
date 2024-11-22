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
	

	$partnership_title = $validation_globalclass->sanitize($_REQUEST['partnership_title']);
	$partnership_title_hindi = $validation_globalclass->sanitize($_REQUEST['partnership_title_hindi']);
	$partnership_content = $_REQUEST['partnership_content'];
	$partnership_content_hindi = $_REQUEST['partnership_content_hindi'];
	// $partnership_title = $validation_globalclass->sanitize(ucwords($_REQUEST['partnership_title']));
	

	
	$partnershipstatus = $_REQUEST['partnershipstatus']; //value='on' == 1 || value='' == 0

	if (
		$partnershipstatus == 'on'
	) :
		$partnership_status = '1';
	else :
		$partnership_status = '0';
	endif;

	
	//Insert Query
	
	$arrFields = array('`partnership_title`', '`partnership_title_hindi`', '`partnership_content`', '`partnership_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$partnership_title",  "$partnership_title_hindi",   "$partnership_content",   "$partnership_content_hindi", "$logged_user_id", "$partnership_status");


	$sqlWhere = " `partnership_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "partnership", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'partnership.php?route=edit'
		</script>
<?php
		//header("Location:partnership?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `partnership_ID`, `partnership_title`, `partnership_title_hindi`, `partnership_content`, `partnership_content_hindi`, `status` FROM `partnership` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$partnership_ID = $row["partnership_ID"];
		$partnership_title = $row['partnership_title'];
		$partnership_title_hindi = $row['partnership_title_hindi'];
		$partnership_content = $row['partnership_content'];
		$partnership_content_hindi = $row['partnership_content_hindi'];
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
								<input type="hidden" name="hidden_partnership_ID" value="<?php echo $partnership_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="partnershipstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="partnershipstatus" id="partnershipstatus" <?php if ($status == '1') :
																																				echo 'checked=""';
																																			endif; ?>>
										<label class="custom-control-label" for="partnershipstatus">Yes</label>
									</div>
								</div>
							</div>
							
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="partnership_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="partnership_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="partnership_title" id="partnership_title" required autocomplete="off"><?= $partnership_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="partnership_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="partnership_title_hindi" id="partnership_title_hindi" required autocomplete="off"><?= $partnership_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="partnership_content" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="partnership_content" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="partnership_content" id="partnership_content" placeholder=""><?= $partnership_content; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="partnership_content" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="partnership_content_hindi" id="partnership_content_hindi" placeholder=""><?= $partnership_content_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
							

						
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$partnership_sidebar_view_type = 'create';
			include viewpath('__partnershipsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->