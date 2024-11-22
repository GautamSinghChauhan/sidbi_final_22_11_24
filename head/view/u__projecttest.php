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
if (isset($update) && $update == "update" && $hidden_projecttest_id != '') :

	$projecttest_title = $validation_globalclass->sanitize(ucwords($_REQUEST['projecttest_title']));
	$projecttest_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projecttest_title_hindi']));
	$projecttest_content = $validation_globalclass->sanitize(ucwords($_REQUEST['projecttest_content']));
	$projecttest_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projecttest_content_hindi']));
	$projecttestlink = $validation_globalclass->sanitize(ucwords($_REQUEST['projecttestlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['projecttest_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$projecttest_image_fileName = $_FILES["projecttest_image"]["name"];
		$fileInfo = pathinfo($projecttest_image_fileName);
		$projecttest_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['projecttest_image']['type'];
		$projecttest_image_file_name = $projecttest_image_fileName;
		$file_temp_loc  = $_FILES['projecttest_image']['tmp_name'];
		$file_error_msg = $_FILES['projecttest_image']['error'];
		$file_size = $_FILES['projecttest_image']['size'];
		$projecttest_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $projecttest_image_file_name);
	endif;

	if ($projecttest_image_move_file) :

		$arrFields = array('`projecttest_title`', '`projecttest_title_hindi`', '`projecttest_content`', '`projecttest_content_hindi`', '`projecttest_image`',  '`projecttest_link`', '`createdby`', '`status`');

		$arrValues = array("$projecttest_title", "$projecttest_title_hindi", "$projecttest_content", "$projecttest_content_hindi", "$projecttest_image_file_name", "$projecttest_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`projecttest_title`', '`projecttest_title_hindi`', '`projecttest_content`', '`projecttest_content_hindi`', '`projecttest_link`', '`createdby`', '`status`');

		$arrValues = array("$projecttest_title", "$projecttest_title_hindi", "$projecttest_content", "$projecttest_content_hindi", "$projecttest_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `projecttest_id` = '$hidden_projecttest_id' ";

	if (sqlACTIONS("UPDATE", "projecttest", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'projecttest.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `projecttest_id`, `projecttest_title`,`projecttest_title_hindi`, `projecttest_content`,`projecttest_content_hindi`,  `projecttest_image`, `status` FROM `projecttest` where deleted = '0' and `projecttest_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `projecttest_id`, `projecttest_title`,`projecttest_title_hindi`, `projecttest_content`,`projecttest_content_hindi`,  `projecttest_image`, `projecttest_link`, `status` FROM `projecttest` where deleted = '0' and `projecttest_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$projecttest_id  = $row["projecttest_id"];
		$projecttest_title = $row['projecttest_title'];
		$projecttest_title_hindi = $row['projecttest_title_hindi'];
		$projecttest_content = $row['projecttest_content'];
		$projecttest_content_hindi = $row['projecttest_content_hindi'];
		$projecttest_image = $row['projecttest_image'];
		$projecttest_link = $row['projecttest_link'];
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
								<input type="hidden" name="hidden_projecttest_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projecttest_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="projecttest_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projecttest_title" id="projecttest_title" autocomplete="off" value="<?= $projecttest_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="projecttest_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projecttest_title_hindi" id="projecttest_title_hindi" autocomplete="off" value="<?= $projecttest_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projecttest_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="projecttest_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projecttest_content" id="projecttest_content" required autocomplete="off"><?= $projecttest_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="projecttest_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projecttest_content_hindi" id="projecttest_content_hindi" required autocomplete="off"><?= $projecttest_content_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="projecttest_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="projecttest_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($projecttest_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $projecttest_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="projecttest_image" id="projecttest_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="projecttest_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projecttest_link" id="projecttest_link" required autocomplete="off"><?= $projecttest_link; ?></textarea>
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