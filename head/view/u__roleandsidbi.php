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
	

	$role_title = $validation_globalclass->sanitize(ucwords($_REQUEST['role_title']));
	$role_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['role_title_hindi']));
	$role_content = $validation_globalclass->sanitize(ucwords($_REQUEST['role_content']));
	$role_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['role_content_hindi']));
	$sidbi_title = $validation_globalclass->sanitize($_REQUEST['sidbi_title']);
	$sidbi_title_hindi = $validation_globalclass->sanitize($_REQUEST['sidbi_title_hindi']);
	$sidbi_content = $_REQUEST['sidbi_content'];
	$sidbi_content_hindi = $_REQUEST['sidbi_content_hindi'];
	// $sidbi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['sidbi_title']));
	

	
	$roleandsidbistatus = $_REQUEST['roleandsidbistatus']; //value='on' == 1 || value='' == 0

	if (
		$roleandsidbistatus == 'on'
	) :
		$roleandsidbi_status = '1';
	else :
		$roleandsidbi_status = '0';
	endif;

	
	//Insert Query
	
	$arrFields = array('`role_title`', '`role_title_hindi`', '`role_content`', '`role_content_hindi`', '`sidbi_title`', '`sidbi_title_hindi`', '`sidbi_content`', '`sidbi_content_hindi`', '`createdby`', '`status`');

	$arrValues = array("$role_title", "$role_title_hindi", "$role_content", "$role_content_hindi",   "$sidbi_title",  "$sidbi_title_hindi",   "$sidbi_content",   "$sidbi_content_hindi", "$logged_user_id", "$roleandsidbi_status");


	$sqlWhere = " `roleandsidbi_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "roleandsidbi", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'roleandsidbi.php?route=edit'
		</script>
<?php
		//header("Location:roleandsidbi.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `roleandsidbi_ID`, `role_title`,  `role_title_hindi`,  `role_content`, `role_content_hindi`, `sidbi_title`,  `sidbi_title_hindi`, `sidbi_content`, `sidbi_content_hindi`, `status` FROM `roleandsidbi` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$roleandsidbi_ID = $row["roleandsidbi_ID"];
		$role_title = $row['role_title'];
		$role_title_hindi = $row['role_title_hindi'];
		$role_content = $row['role_content'];
		$role_content_hindi = $row['role_content_hindi'];
		$sidbi_title = $row['sidbi_title'];
		$sidbi_title_hindi = $row['sidbi_title_hindi'];
		$sidbi_content = $row['sidbi_content'];
		$sidbi_content_hindi = $row['sidbi_content_hindi'];
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
								<input type="hidden" name="hidden_roleandsidbi_ID" value="<?php echo $roleandsidbi_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="roleandsidbistatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="roleandsidbistatus" id="roleandsidbistatus" <?php if ($status == '1') :
																																				echo 'checked=""';
																																			endif; ?>>
										<label class="custom-control-label" for="roleandsidbistatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="role_title" class="form-label">Role Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="role_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="role_title" id="role_title" required autocomplete="off"><?= $role_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="role_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="role_title_hindi" id="role_title_hindi" required autocomplete="off"><?= $role_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="role_content" class="form-label">Role Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="role_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="role_content" id="role_content" required autocomplete="off"><?= $role_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="role_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="role_content_hindi" id="role_content_hindi" required autocomplete="off"><?= $role_content_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="sidbi_title" class="form-label">Sidbi Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="sidbi_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="sidbi_title" id="sidbi_title" required autocomplete="off"><?= $sidbi_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="sidbi_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="sidbi_title_hindi" id="sidbi_title_hindi" required autocomplete="off"><?= $sidbi_title_hindi; ?></textarea>
								</div>

							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="sidbi_content" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="sidbi_content" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="sidbi_content" id="sidbi_content" placeholder=""><?= $sidbi_content; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="sidbi_content" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="sidbi_content_hindi" id="sidbi_content_hindi" placeholder=""><?= $sidbi_content_hindi; ?></textarea>
                                </div>
                            </div>

						</div>
							

						
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$roleandsidbi_sidebar_view_type = 'create';
			include viewpath('__roleandsidbisidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->