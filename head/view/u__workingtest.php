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
if (isset($update) && $update == "update" && $hidden_workingtest_id != '') :

	$workingtest_title = $validation_globalclass->sanitize(ucwords($_REQUEST['workingtest_title']));
	$workingtest_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingtest_title_hindi']));
	$workingtest_content = $validation_globalclass->sanitize(ucwords($_REQUEST['workingtest_content']));
	$workingtest_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['workingtest_content_hindi']));
	$workingtestlink = $validation_globalclass->sanitize(ucwords($_REQUEST['workingtestlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['workingtest_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$workingtest_image_fileName = $_FILES["workingtest_image"]["name"];
		$fileInfo = pathinfo($workingtest_image_fileName);
		$workingtest_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['workingtest_image']['type'];
		$workingtest_image_file_name = $workingtest_image_fileName;
		$file_temp_loc  = $_FILES['workingtest_image']['tmp_name'];
		$file_error_msg = $_FILES['workingtest_image']['error'];
		$file_size = $_FILES['workingtest_image']['size'];
		$workingtest_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $workingtest_image_file_name);
	endif;

	if ($workingtest_image_move_file) :

		$arrFields = array('`workingtest_title`', '`workingtest_title_hindi`', '`workingtest_content`', '`workingtest_content_hindi`', '`workingtest_image`',  '`workingtest_link`', '`createdby`', '`status`');

		$arrValues = array("$workingtest_title", "$workingtest_title_hindi", "$workingtest_content", "$workingtest_content_hindi", "$workingtest_image_file_name", "$workingtest_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`workingtest_title`', '`workingtest_title_hindi`', '`workingtest_content`', '`workingtest_content_hindi`', '`workingtest_link`', '`createdby`', '`status`');

		$arrValues = array("$workingtest_title", "$workingtest_title_hindi", "$workingtest_content", "$workingtest_content_hindi", "$workingtest_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `workingtest_id` = '$hidden_workingtest_id' ";

	if (sqlACTIONS("UPDATE", "workingtest", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'workingtest.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `workingtest_id`, `workingtest_title`,`workingtest_title_hindi`, `workingtest_content`,`workingtest_content_hindi`,  `workingtest_image`, `status` FROM `workingtest` where deleted = '0' and `workingtest_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `workingtest_id`, `workingtest_title`,`workingtest_title_hindi`, `workingtest_content`,`workingtest_content_hindi`,  `workingtest_image`, `workingtest_link`, `status` FROM `workingtest` where deleted = '0' and `workingtest_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$workingtest_id  = $row["workingtest_id"];
		$workingtest_title = $row['workingtest_title'];
		$workingtest_title_hindi = $row['workingtest_title_hindi'];
		$workingtest_content = $row['workingtest_content'];
		$workingtest_content_hindi = $row['workingtest_content_hindi'];
		$workingtest_image = $row['workingtest_image'];
		$workingtest_link = $row['workingtest_link'];
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
								<button type="submit" name="update" value="update" id="update" class="btn btn-warning"><?= $__update; ?></button>
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="home_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<input type="hidden" name="hidden_workingtest_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingtest_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="workingtest_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingtest_title" id="workingtest_title" autocomplete="off" value="<?= $workingtest_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="workingtest_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="workingtest_title_hindi" id="workingtest_title_hindi" autocomplete="off" value="<?= $workingtest_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="workingtest_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="workingtest_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="workingtest_content" id="workingtest_content" required autocomplete="off"><?= $workingtest_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="workingtest_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="workingtest_content_hindi" id="workingtest_content_hindi" required autocomplete="off"><?= $workingtest_content_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="workingtest_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="workingtest_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($workingtest_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $workingtest_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="workingtest_image" id="workingtest_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="workingtest_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="workingtest_link" id="workingtest_link" required autocomplete="off"><?= $workingtest_link; ?></textarea>
								</div>
						</div>

				</div>
			</div><!-- col -->

			<?php
			// $overview_sidebar_view_type = 'create';
			// include viewpath('__overviewsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->