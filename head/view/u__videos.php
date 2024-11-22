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
if (isset($update) && $update == "update" && $hidden_videos_id != '') :

	$videos_title = $validation_globalclass->sanitize(ucwords($_REQUEST['videos_title']));
	$videos_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['videos_title_hindi']));
	$videos_link = $validation_globalclass->sanitize(ucwords($_REQUEST['videos_link']));
	

	// $videos_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['videos_image']));
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['videos_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$videos_image_fileName = $_FILES["videos_image"]["name"];
		$fileInfo = pathinfo($videos_image_fileName);
		$videos_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['videos_image']['type'];
		$videos_image_file_name = $videos_image_fileName;
		$file_temp_loc  = $_FILES['videos_image']['tmp_name'];
		$file_error_msg = $_FILES['videos_image']['error'];
		$file_size = $_FILES['videos_image']['size'];
		$videos_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $videos_image_file_name);
	endif;

	if ($videos_image_move_file) :

		$arrFields = array('`videos_title`', '`videos_title_hindi`', '`videos_image`', '`videos_link`', '`createdby`', '`status`');

		$arrValues = array("$videos_title", "$videos_title_hindi", "$videos_image_file_name", "$videos_link", "$logged_user_id", "$videos_status");

	else :

		$arrFields = array('`videos_title`', '`videos_title_hindi`', '`videos_link`', '`createdby`', '`status`');

		$arrValues = array("$videos_title", "$videos_title_hindi", "$videos_link", "$logged_user_id", "$videos_status");

	endif;

	$sqlWhere = " `videos_id` = '$hidden_videos_id' ";

	if (sqlACTIONS("UPDATE", "videos", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'videos.php'
		</script>
<?php
		//header("Location:videos.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `videos_id`, `videos_title`,`videos_title_hindi`, `videos_title`,`videos_hindi_title`,  `videos_image`, `status` FROM `_videos` where deleted = '0' and `videos_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `videos_id`, `videos_title`,`videos_title_hindi`, `videos_image`, `videos_link`, `status` FROM `videos` where deleted = '0' and `videos_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$videos_id  = $row["videos_id"];
		$videos_title = $row['videos_title'];
		$videos_title_hindi = $row['videos_title_hindi'];
		$videos_image = $row['videos_image'];
		$videos_link = $row['videos_link'];
		$status = $row["status"];
	}
}
?>

<div class="title">
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
								<input type="hidden" name="hidden_videos_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="videos_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="videos_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="videos_title" id="videos_title" required autocomplete="off" value="<?= $videos_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="videos_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="videos_title_hindi" id="videos_title_hindi" required autocomplete="off" value="<?= $videos_title_hindi; ?>" />
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-2">
									<label for="videos_title" class="form-label">Image and Link<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
								<label for="videos_title" class="form-label"> Image<span class="tx-danger">*</span></label>
									<label for="videos_image" class="control-label"><span class="tx-danger"> </span></label>
									<?php if ($videos_image) : ?>
										<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $videos_image; ?>">View</a>
									<?php endif; ?>
									<input class="form-control form-control-sm" name="videos_image" id="videos_image" type="file" autocomplete="off">
									<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								</div>
								<div class="col-md-5">
									<label for="videos_link" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="videos_link" id="videos_link" required autocomplete="off" value="<?= $videos_link; ?>" />
								</div>
								

							</div>

						</div>

				</div>
			</div><!-- col -->

			<?php
			// $videos_sidebar_view_type = 'create';
			// include viewpath('__videossidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- title -->