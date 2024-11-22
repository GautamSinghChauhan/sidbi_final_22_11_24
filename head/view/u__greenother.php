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
if (isset($update) && $update == "update" && $hidden_greenother_id != '') :

	$greenother_title = $validation_globalclass->sanitize(ucwords($_REQUEST['greenother_title']));
	$greenother_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greenother_title_hindi']));
	$greenother_name = $validation_globalclass->sanitize(ucwords($_REQUEST['greenother_name']));
	$greenother_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['greenother_name_hindi']));
	$greenotherlink = $validation_globalclass->sanitize(ucwords($_REQUEST['greenotherlink']));

	
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['greenother_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$greenother_image_fileName = $_FILES["greenother_image"]["name"];
		$fileInfo = pathinfo($greenother_image_fileName);
		$greenother_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['greenother_image']['type'];
		$greenother_image_file_name = $greenother_image_fileName;
		$file_temp_loc  = $_FILES['greenother_image']['tmp_name'];
		$file_error_msg = $_FILES['greenother_image']['error'];
		$file_size = $_FILES['greenother_image']['size'];
		$greenother_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $greenother_image_file_name);
	endif;

	if ($greenother_image_move_file) :

		$arrFields = array('`greenother_title`', '`greenother_title_hindi`', '`greenother_name`', '`greenother_name_hindi`', '`greenother_image`',  '`greenother_link`', '`createdby`', '`status`');

		$arrValues = array("$greenother_title", "$greenother_title_hindi", "$greenother_name", "$greenother_name_hindi", "$greenother_image_file_name", "$greenother_link", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`greenother_title`', '`greenother_title_hindi`', '`greenother_name`', '`greenother_name_hindi`', '`greenother_link`', '`createdby`', '`status`');

		$arrValues = array("$greenother_title", "$greenother_title_hindi", "$greenother_name", "$greenother_name_hindi", "$greenother_link", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `greenother_id` = '$hidden_greenother_id' ";

	if (sqlACTIONS("UPDATE", "greenother", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'greenother.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `greenother_id`, `greenother_title`,`greenother_title_hindi`, `greenother_name`,`greenother_name_hindi`,  `greenother_image`, `status` FROM `greenother` where deleted = '0' and `greenother_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `greenother_id`, `greenother_title`,`greenother_title_hindi`, `greenother_name`,`greenother_name_hindi`,  `greenother_image`, `greenother_link`, `status` FROM `greenother` where deleted = '0' and `greenother_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$greenother_id  = $row["greenother_id"];
		$greenother_title = $row['greenother_title'];
		$greenother_title_hindi = $row['greenother_title_hindi'];
		$greenother_name = $row['greenother_name'];
		$greenother_name_hindi = $row['greenother_name_hindi'];
		$greenother_image = $row['greenother_image'];
		$greenother_link = $row['greenother_link'];
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
								<input type="hidden" name="hidden_greenother_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greenother_title" class="form-label">Title<span class="tx-danger"></label>
								</div>

								<div class="col-md-5">
									<label for="greenother_title" class="form-label">In English<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greenother_title" id="greenother_title" autocomplete="off" value="<?= $greenother_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="greenother_title_hindi" class="form-label">In Hindi<span class="tx-danger"></label>
									<input type="text" class="form-control" name="greenother_title_hindi" id="greenother_title_hindi" autocomplete="off" value="<?= $greenother_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="greenother_name" class="form-label">Name<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="greenother_name" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greenother_name" id="greenother_name" required autocomplete="off"><?= $greenother_name; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="greenother_name_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greenother_name_hindi" id="greenother_name_hindi" required autocomplete="off"><?= $greenother_name_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-2">
								<label for="greenother_image" class="control-label">Image and Link<span class="tx-danger"> *</span></label>
							</div>
							<div class="col-md-5">
							<label for="greenother_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($greenother_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $greenother_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="greenother_image" id="greenother_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="greenother_link" class="form-label">Link<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="greenother_link" id="greenother_link" required autocomplete="off"><?= $greenother_link; ?></textarea>
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