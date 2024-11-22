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
if (isset($update) && $update == "update" && $hidden_greentest_id != '') :

	$greentest_title = $validation_globalclass->sanitize(ucwords($_REQUEST['greentest_title']));
	$greentest_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greentest_title_hindi']));
	$greentest_content = $validation_globalclass->sanitize(ucwords($_REQUEST['greentest_content']));
	$greentest_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greentest_content_hindi']));
	$greentestlink = $validation_globalclass->sanitize(ucwords($_REQUEST['greentestlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['greentest_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$greentest_image_fileName = $_FILES["greentest_image"]["name"];
		$fileInfo = pathinfo($greentest_image_fileName);
		$greentest_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['greentest_image']['type'];
		$greentest_image_file_name = $greentest_image_fileName;
		$file_temp_loc  = $_FILES['greentest_image']['tmp_name'];
		$file_error_msg = $_FILES['greentest_image']['error'];
		$file_size = $_FILES['greentest_image']['size'];
		$greentest_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $greentest_image_file_name);
	endif;

	if ($greentest_image_move_file) :

		$arrFields = array('`greentest_title`', '`greentest_title_hindi`', '`greentest_content`', '`greentest_content_hindi`', '`greentest_image`',  '`greentest_link`', '`createdby`', '`status`');

		$arrValues = array("$greentest_title", "$greentest_title_hindi", "$greentest_content", "$greentest_content_hindi", "$greentest_image_file_name", "$greentest_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`greentest_title`', '`greentest_title_hindi`', '`greentest_content`', '`greentest_content_hindi`', '`greentest_link`', '`createdby`', '`status`');

		$arrValues = array("$greentest_title", "$greentest_title_hindi", "$greentest_content", "$greentest_content_hindi", "$greentest_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `greentest_id` = '$hidden_greentest_id' ";

	if (sqlACTIONS("UPDATE", "greentest", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'greentest.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `greentest_id`, `greentest_title`,`greentest_title_hindi`, `greentest_content`,`greentest_content_hindi`,  `greentest_image`, `status` FROM `greentest` where deleted = '0' and `greentest_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `greentest_id`, `greentest_title`,`greentest_title_hindi`, `greentest_content`,`greentest_content_hindi`,  `greentest_image`, `greentest_link`, `status` FROM `greentest` where deleted = '0' and `greentest_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$greentest_id  = $row["greentest_id"];
		$greentest_title = $row['greentest_title'];
		$greentest_title_hindi = $row['greentest_title_hindi'];
		$greentest_content = $row['greentest_content'];
		$greentest_content_hindi = $row['greentest_content_hindi'];
		$greentest_image = $row['greentest_image'];
		$greentest_link = $row['greentest_link'];
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
								<input type="hidden" name="hidden_greentest_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greentest_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="greentest_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greentest_title" id="greentest_title" autocomplete="off" value="<?= $greentest_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="greentest_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greentest_title_hindi" id="greentest_title_hindi" autocomplete="off" value="<?= $greentest_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greentest_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="greentest_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greentest_content" id="greentest_content" required autocomplete="off"><?= $greentest_content; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="greentest_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greentest_content_hindi" id="greentest_content_hindi" required autocomplete="off"><?= $greentest_content_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="greentest_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="greentest_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($greentest_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $greentest_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="greentest_image" id="greentest_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="greentest_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greentest_link" id="greentest_link" required autocomplete="off"><?= $greentest_link; ?></textarea>
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