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
if (isset($update) && $update == "update" && $hidden_growth_id != '') :

	$unlockgrowth_heading = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowth_heading']));
	$unlockgrowth_heading_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowth_heading_hindi']));
	$unlockgrowth_title = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowth_title']));
	$unlockgrowth_hindi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowth_hindi_title']));

	// $unlockgrowth_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowth_image']));
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['unlockgrowth_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$unlockgrowth_image_fileName = $_FILES["unlockgrowth_image"]["name"];
		$fileInfo = pathinfo($unlockgrowth_image_fileName);
		$unlockgrowth_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['unlockgrowth_image']['type'];
		$unlockgrowth_image_file_name = $unlockgrowth_image_fileName;
		$file_temp_loc  = $_FILES['unlockgrowth_image']['tmp_name'];
		$file_error_msg = $_FILES['unlockgrowth_image']['error'];
		$file_size = $_FILES['unlockgrowth_image']['size'];
		$unlockgrowth_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $unlockgrowth_image_file_name);
	endif;

	if ($unlockgrowth_image_move_file) :

		$arrFields = array('`unlockgrowth_heading`', '`unlockgrowth_heading_hindi`', '`unlockgrowth_title`', '`unlockgrowth_hindi_title`', '`unlockgrowth_image`', '`createdby`', '`status`');

		$arrValues = array("$unlockgrowth_heading", "$unlockgrowth_heading_hindi", "$unlockgrowth_title", "$unlockgrowth_hindi_title", "$unlockgrowth_image_file_name", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`unlockgrowth_heading`', '`unlockgrowth_heading_hindi`', '`unlockgrowth_title`', '`unlockgrowth_hindi_title`', '`createdby`', '`status`');

		$arrValues = array("$unlockgrowth_heading", "$unlockgrowth_heading_hindi", "$unlockgrowth_title", "$unlockgrowth_hindi_title", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `growth_id` = '$hidden_growth_id' ";

	if (sqlACTIONS("UPDATE", "unlock_growth", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'growth.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `growth_id`, `unlockgrowth_heading`,`unlockgrowth_heading_hindi`, `unlockgrowth_title`,`unlockgrowth_hindi_title`,  `unlockgrowth_image`, `status` FROM `unlock_growth` where deleted = '0' and `growth_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `growth_id`, `unlockgrowth_heading`,`unlockgrowth_heading_hindi`, `unlockgrowth_title`,`unlockgrowth_hindi_title`,  `unlockgrowth_image`, `status` FROM `unlock_growth` where deleted = '0' and `growth_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$growth_id  = $row["growth_id"];
		$unlockgrowth_heading = $row['unlockgrowth_heading'];
		$unlockgrowth_heading_hindi = $row['unlockgrowth_heading_hindi'];
		$unlockgrowth_title = $row['unlockgrowth_title'];
		$unlockgrowth_hindi_title = $row['unlockgrowth_hindi_title'];
		$unlockgrowth_image = $row['unlockgrowth_image'];
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
								<input type="hidden" name="hidden_growth_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="unlockgrowth_heading" class="form-label">Unlocking Growth Heading<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="unlockgrowth_heading" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="unlockgrowth_heading" id="unlockgrowth_heading"  autocomplete="off" value="<?= $unlockgrowth_heading; ?>" />
								</div>
								<div class="col-md-5">
									<label for="unlockgrowth_heading_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="unlockgrowth_heading_hindi" id="unlockgrowth_heading_hindi"  autocomplete="off" value="<?= $unlockgrowth_heading_hindi; ?>" />
								</div>
							</div> -->

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="unlockgrowth_title" class="form-label">Unlock Growth Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="unlockgrowth_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="unlockgrowth_title" id="unlockgrowth_title" required autocomplete="off"><?= $unlockgrowth_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="unlockgrowth_hindi_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="unlockgrowth_hindi_title" id="unlockgrowth_hindi_title" required autocomplete="off"><?= $unlockgrowth_hindi_title; ?></textarea>
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="unlockgrowth_title" class="form-label">Unlock Growth Image<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="unlockgrowth_image" class="control-label"><span class="tx-danger"> </span></label>
									<?php if ($unlockgrowth_image) : ?>
										<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $unlockgrowth_image; ?>">View</a>
									<?php endif; ?>
									<input class="form-control form-control-sm" name="unlockgrowth_image" id="unlockgrowth_image" type="file" autocomplete="off">
									<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								</div>
								<!-- <div class="col-md-5">
									<label for="unlockgrowth_hindi_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="unlockgrowth_hindi_title" id="unlockgrowth_hindi_title" required autocomplete="off"><?= $unlockgrowth_hindi_title; ?></textarea>
								</div> -->

							</div>

						</div>

						<!-- <div class="form-group row">
							<div class="col-md-6">
								<label for="unlockgrowth_image" class="control-label">Unlock Growth Image<span class="tx-danger"> *</span></label>
								<?php if ($unlockgrowth_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $unlockgrowth_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="unlockgrowth_image" id="unlockgrowth_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
						</div> -->

				</div>
			</div><!-- col -->

			<?php
			// $overview_sidebar_view_type = 'create';
			// include viewpath('__overviewsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->