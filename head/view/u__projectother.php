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
if (isset($update) && $update == "update" && $hidden_projectother_id != '') :

	$projectother_title = $validation_globalclass->sanitize(ucwords($_REQUEST['projectother_title']));
	$projectother_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projectother_title_hindi']));
	$projectother_name = $validation_globalclass->sanitize(ucwords($_REQUEST['projectother_name']));
	$projectother_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projectother_name_hindi']));
	$projectotherlink = $validation_globalclass->sanitize(ucwords($_REQUEST['projectotherlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['projectother_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$projectother_image_fileName = $_FILES["projectother_image"]["name"];
		$fileInfo = pathinfo($projectother_image_fileName);
		$projectother_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['projectother_image']['type'];
		$projectother_image_file_name = $projectother_image_fileName;
		$file_temp_loc  = $_FILES['projectother_image']['tmp_name'];
		$file_error_msg = $_FILES['projectother_image']['error'];
		$file_size = $_FILES['projectother_image']['size'];
		$projectother_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $projectother_image_file_name);
	endif;

	if ($projectother_image_move_file) :

		$arrFields = array('`projectother_title`', '`projectother_title_hindi`', '`projectother_name`', '`projectother_name_hindi`', '`projectother_image`',  '`projectother_link`', '`createdby`', '`status`');

		$arrValues = array("$projectother_title", "$projectother_title_hindi", "$projectother_name", "$projectother_name_hindi", "$projectother_image_file_name", "$projectother_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`projectother_title`', '`projectother_title_hindi`', '`projectother_name`', '`projectother_name_hindi`', '`projectother_link`', '`createdby`', '`status`');

		$arrValues = array("$projectother_title", "$projectother_title_hindi", "$projectother_name", "$projectother_name_hindi", "$projectother_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `projectother_id` = '$hidden_projectother_id' ";

	if (sqlACTIONS("UPDATE", "projectother", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'projectother.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `projectother_id`, `projectother_title`,`projectother_title_hindi`, `projectother_name`,`projectother_name_hindi`,  `projectother_image`, `status` FROM `projectother` where deleted = '0' and `projectother_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `projectother_id`, `projectother_title`,`projectother_title_hindi`, `projectother_name`,`projectother_name_hindi`,  `projectother_image`, `projectother_link`, `status` FROM `projectother` where deleted = '0' and `projectother_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$projectother_id  = $row["projectother_id"];
		$projectother_title = $row['projectother_title'];
		$projectother_title_hindi = $row['projectother_title_hindi'];
		$projectother_name = $row['projectother_name'];
		$projectother_name_hindi = $row['projectother_name_hindi'];
		$projectother_image = $row['projectother_image'];
		$projectother_link = $row['projectother_link'];
		$status = $row["status"];
	}
}
?>

<div class="name">
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
								<input type="hidden" name="hidden_projectother_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projectother_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="projectother_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projectother_title" id="projectother_title" autocomplete="off" value="<?= $projectother_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="projectother_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="projectother_title_hindi" id="projectother_title_hindi" autocomplete="off" value="<?= $projectother_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projectother_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="projectother_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projectother_name" id="projectother_name" required autocomplete="off"><?= $projectother_name; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="projectother_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projectother_name_hindi" id="projectother_name_hindi" required autocomplete="off"><?= $projectother_name_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="projectother_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="projectother_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($projectother_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $projectother_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="projectother_image" id="projectother_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="projectother_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="projectother_link" id="projectother_link" required autocomplete="off"><?= $projectother_link; ?></textarea>
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
</div><!-- name -->