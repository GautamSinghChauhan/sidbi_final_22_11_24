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
if (isset($update) && $update == "update" && $hidden_growthproduct_id != '') :

	$unlockgrowthproduct_title = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowthproduct_title']));
	$unlockgrowthproduct_hindi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowthproduct_hindi_title']));

	// $unlockgrowthproduct_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['unlockgrowthproduct_image']));
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['unlockgrowthproduct_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$unlockgrowthproduct_image_fileName = $_FILES["unlockgrowthproduct_image"]["name"];
		$fileInfo = pathinfo($unlockgrowthproduct_image_fileName);
		$unlockgrowthproduct_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['unlockgrowthproduct_image']['type'];
		$unlockgrowthproduct_image_file_name = $unlockgrowthproduct_image_fileName;
		$file_temp_loc  = $_FILES['unlockgrowthproduct_image']['tmp_name'];
		$file_error_msg = $_FILES['unlockgrowthproduct_image']['error'];
		$file_size = $_FILES['unlockgrowthproduct_image']['size'];
		$unlockgrowthproduct_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $unlockgrowthproduct_image_file_name);
	endif;

	if ($unlockgrowthproduct_image_move_file) :

		$arrFields = array('`unlockgrowthproduct_title`', '`unlockgrowthproduct_hindi_title`', '`unlockgrowthproduct_image`', '`createdby`', '`status`');

		$arrValues = array( "$unlockgrowthproduct_title", "$unlockgrowthproduct_hindi_title", "$unlockgrowthproduct_image_file_name", "$logged_user_id", "$overview_status");

	else :

		$arrFields = array('`unlockgrowthproduct_title`', '`unlockgrowthproduct_hindi_title`', '`createdby`', '`status`');

		$arrValues = array("$unlockgrowthproduct_heading", "$unlockgrowthproduct_heading_hindi", "$unlockgrowthproduct_title", "$unlockgrowthproduct_hindi_title", "$logged_user_id", "$overview_status");

	endif;

	$sqlWhere = " `growthproduct_id` = '$hidden_growthproduct_id' ";

	if (sqlACTIONS("UPDATE", "unlock_growthproduct", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'growthproduct.php'
		</script>
<?php
		//header("Location:overview.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `growthproduct_id`, `unlockgrowthproduct_heading`,`unlockgrowthproduct_heading_hindi`, `unlockgrowthproduct_title`,`unlockgrowthproduct_hindi_title`,  `unlockgrowthproduct_image`, `status` FROM `unlock_growthproduct` where deleted = '0' and `growthproduct_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `growthproduct_id`, `unlockgrowthproduct_title`,`unlockgrowthproduct_hindi_title`,  `unlockgrowthproduct_image`, `status` FROM `unlock_growthproduct` where deleted = '0' and `growthproduct_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$growthproduct_id  = $row["growthproduct_id"];
		$unlockgrowthproduct_title = $row['unlockgrowthproduct_title'];
		$unlockgrowthproduct_hindi_title = $row['unlockgrowthproduct_hindi_title'];
		$unlockgrowthproduct_image = $row['unlockgrowthproduct_image'];
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
								<input type="hidden" name="hidden_growthproduct_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

						

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="unlockgrowthproduct_title" class="form-label">Unlock growthproduct Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="unlockgrowthproduct_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="unlockgrowthproduct_title" id="unlockgrowthproduct_title" required autocomplete="off"><?= $unlockgrowthproduct_title; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="unlockgrowthproduct_hindi_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="unlockgrowthproduct_hindi_title" id="unlockgrowthproduct_hindi_title" required autocomplete="off"><?= $unlockgrowthproduct_hindi_title; ?></textarea>
								</div>

							</div>
						

						<div class="form-group row">
							<div class="col-md-2">
								<label for="unlockgrowthproduct_image" class="control-label">Unlock growthproduct Image<span class="tx-danger"> *</span></label>
							</div>
							<div class= "col-md-5">
							<label for="unlockgrowthproduct_image" class="control-label">Unlock growthproduct Image<span class="tx-danger"> *</span></label>
								<?php if ($unlockgrowthproduct_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $unlockgrowthproduct_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="unlockgrowthproduct_image" id="unlockgrowthproduct_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
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