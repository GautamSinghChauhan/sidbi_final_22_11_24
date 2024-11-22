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
if (isset($update) && $update == "update" && $hidden_machinerytest_id != '') :

	$machinerytest_title = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerytest_title']));
	$machinerytest_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerytest_title_hindi']));
	$machinerytest_content = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerytest_content']));
	$machinerytest_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerytest_content_hindi']));
	$machinerytestlink = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerytestlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['machinerytest_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$machinerytest_image_fileName = $_FILES["machinerytest_image"]["name"];
		$fileInfo = pathinfo($machinerytest_image_fileName);
		$machinerytest_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['machinerytest_image']['type'];
		$machinerytest_image_file_name = $machinerytest_image_fileName;
		$file_temp_loc  = $_FILES['machinerytest_image']['tmp_name'];
		$file_error_msg = $_FILES['machinerytest_image']['error'];
		$file_size = $_FILES['machinerytest_image']['size'];
		$machinerytest_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $machinerytest_image_file_name);
	endif;

	if ($machinerytest_image_move_file) :

		$arrFields = array('`machinerytest_title`', '`machinerytest_title_hindi`', '`machinerytest_content`', '`machinerytest_content_hindi`', '`machinerytest_image`',  '`machinerytest_link`', '`createdby`', '`status`');

		$arrValues = array("$machinerytest_title", "$machinerytest_title_hindi", "$machinerytest_content", "$machinerytest_content_hindi", "$machinerytest_image_file_name", "$machinerytest_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`machinerytest_title`', '`machinerytest_title_hindi`', '`machinerytest_content`', '`machinerytest_content_hindi`', '`machinerytest_link`', '`createdby`', '`status`');

		$arrValues = array("$machinerytest_title", "$machinerytest_title_hindi", "$machinerytest_content", "$machinerytest_content_hindi", "$machinerytest_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `machinerytest_id` = '$hidden_machinerytest_id' ";

	if (sqlACTIONS("UPDATE", "machinerytest", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'machinerytest.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `machinerytest_id`, `machinerytest_title`,`machinerytest_title_hindi`, `machinerytest_content`,`machinerytest_content_hindi`,  `machinerytest_image`, `status` FROM `machinerytest` where deleted = '0' and `machinerytest_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `machinerytest_id`, `machinerytest_title`,`machinerytest_title_hindi`, `machinerytest_content`,`machinerytest_content_hindi`,  `machinerytest_image`, `machinerytest_link`, `status` FROM `machinerytest` where deleted = '0' and `machinerytest_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$machinerytest_id  = $row["machinerytest_id"];
		$machinerytest_title = $row['machinerytest_title'];
		$machinerytest_title_hindi = $row['machinerytest_title_hindi'];
		$machinerytest_content = $row['machinerytest_content'];
		$machinerytest_content_hindi = $row['machinerytest_content_hindi'];
		$machinerytest_image = $row['machinerytest_image'];
		$machinerytest_link = $row['machinerytest_link'];
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
								<input type="hidden" name="hidden_machinerytest_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>
<!-- 
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="machinerytest_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="machinerytest_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="machinerytest_title" id="machinerytest_title" autocomplete="off" value="<?= $machinerytest_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="machinerytest_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="machinerytest_title_hindi" id="machinerytest_title_hindi" autocomplete="off" value="<?= $machinerytest_title_hindi; ?>" />
								</div>
							</div> -->

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="machinerytest_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="machinerytest_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="machinerytest_content" id="machinerytest_content" required autocomplete="off"><?= $machinerytest_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="machinerytest_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="machinerytest_content_hindi" id="machinerytest_content_hindi" required autocomplete="off"><?= $machinerytest_content_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="machinerytest_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="machinerytest_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($machinerytest_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $machinerytest_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="machinerytest_image" id="machinerytest_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="machinerytest_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="machinerytest_link" id="machinerytest_link" required autocomplete="off"><?= $machinerytest_link; ?></textarea>
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