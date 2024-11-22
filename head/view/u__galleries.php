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
if (isset($update) && $update == "update" && $hidden_galleries_id != '') :

	$galleries_content = $validation_globalclass->sanitize(ucwords($_REQUEST['galleries_content']));
	$galleries_content_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['galleries_content_hindi']));
	

	// $galleries_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['galleries_image']));
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['galleries_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$galleries_image_fileName = $_FILES["galleries_image"]["name"];
		$fileInfo = pathinfo($galleries_image_fileName);
		$galleries_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['galleries_image']['type'];
		$galleries_image_file_name = $galleries_image_fileName;
		$file_temp_loc  = $_FILES['galleries_image']['tmp_name'];
		$file_error_msg = $_FILES['galleries_image']['error'];
		$file_size = $_FILES['galleries_image']['size'];
		$galleries_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $galleries_image_file_name);
	endif;

	if ($galleries_image_move_file) :

		$arrFields = array('`galleries_content`', '`galleries_content_hindi`', '`galleries_image`', '`createdby`', '`status`');

		$arrValues = array("$galleries_content", "$galleries_content_hindi", "$galleries_image_file_name", "$logged_user_id", "$galleries_status");

	else :

		$arrFields = array('`galleries_content`', '`galleries_content_hindi`', '`createdby`', '`status`');

		$arrValues = array("$galleries_content", "$galleries_content_hindi", "$logged_user_id", "$galleries_status");

	endif;

	$sqlWhere = " `galleries_id` = '$hidden_galleries_id' ";

	if (sqlACTIONS("UPDATE", "galleries", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'galleries.php'
		</script>
<?php
		//header("Location:galleries.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `galleries_id`, `galleries_content`,`galleries_content_hindi`, `galleries_title`,`galleries_hindi_title`,  `galleries_image`, `status` FROM `_galleries` where deleted = '0' and `galleries_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `galleries_id`, `galleries_content`,`galleries_content_hindi`, `galleries_image`, `status` FROM `galleries` where deleted = '0' and `galleries_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$galleries_id  = $row["galleries_id"];
		$galleries_content = $row['galleries_content'];
		$galleries_content_hindi = $row['galleries_content_hindi'];
		$galleries_image = $row['galleries_image'];
		$status = $row["status"];
	}
}
?>

<div class="content">
	<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-10 mg-b-25">

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
								<input type="hidden" name="hidden_galleries_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="galleries_content" class="form-label">Content<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="galleries_content" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="galleries_content" id="galleries_content" required autocomplete="off" value="<?= $galleries_content; ?>" ></textarea>
								</div>
								<div class="col-md-5">
									<label for="galleries_content_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="galleries_content_hindi" id="galleries_content_hindi" required autocomplete="off" value="<?= $galleries_content_hindi; ?>" ></textarea>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="galleries_title" class="form-label"> galleries Image<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="galleries_image" class="control-label"><span class="tx-danger"> </span></label>
									<?php if ($galleries_image) : ?>
										<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $galleries_image; ?>">View</a>
									<?php endif; ?>
									<input class="form-control form-control-sm" name="galleries_image" id="galleries_image" type="file" autocomplete="off">
									<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								</div>
								

							</div>

						</div>

				</div>
			</div><!-- col -->

			<?php
			// $galleries_sidebar_view_type = 'create';
			// include viewpath('__galleriessidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->