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
if (isset($update) && $update == "update" && $hidden_history_id != '') :

	$history_title = $validation_globalclass->sanitize(ucwords($_REQUEST['history_title']));
	$history_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['history_title_hindi']));
	$history_description = $validation_globalclass->sanitize(ucwords($_REQUEST['history_description']));
	$history_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['history_description_hindi']));

	// $unlockgrowth_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['history_image']));
	$status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	//Insert Query
	if (isset($_FILES['history_image']['name'])) :
		$upload_dir = '../assets/front/home/';
		$history_image_fileName = $_FILES["history_image"]["name"];
		$fileInfo = pathinfo($history_image_fileName);
		$history_image_fileExtension = $fileInfo["extension"];
		$file_type = $_FILES['history_image']['type'];
		$history_image_file_name = $history_image_fileName;
		$file_temp_loc  = $_FILES['history_image']['tmp_name'];
		$file_error_msg = $_FILES['history_image']['error'];
		$file_size = $_FILES['history_image']['size'];
		$history_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $history_image_file_name);
	endif;
	
	

	if ($history_image_move_file) :

		$arrFields = array('`history_title`', '`history_title_hindi`', '`history_description`', '`history_description_hindi`', '`history_image`', '`history_logo`', '`history_year`', '`createdby`', '`status`');

		$arrValues = array("$history_title", "$history_title_hindi", "$history_description", "$history_description_hindi", "$history_image_file_name", "$history_logo_file_name", "$history_year", "$logged_user_id", "$history_status");

	else :

		$arrFields = array('`history_title`', '`history_title_hindi`', '`history_description`', '`history_description_hindi`', '`createdby`', '`status`');

		$arrValues = array("$history_title", "$history_title_hindi", "$history_description", "$history_description_hindi", "$logged_user_id", "$history_status");

	endif;

	$sqlWhere = " `history_id` = '$hidden_history_id' ";

	if (sqlACTIONS("UPDATE", "history", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'history.php'
		</script>
<?php
		//header("Location:history.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	// echo "SELECT `history_id`, `history_title`,`history_title_hindi`, `history_description`,`history_description_hindi`,  `history_image`, `status` FROM `history` where deleted = '0' and `history_id`= '$id'";

	$list_datas = sqlQUERY_LABEL("SELECT `history_id`, `history_title`,`history_title_hindi`, `history_description`,`history_description_hindi`,  `history_image`,  `history_logo`,  `history_year`, `status` FROM `history` where deleted = '0' and `history_id`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$history_id  = $row["history_id"];
		$history_title = $row['history_title'];
		$history_title_hindi = $row['history_title_hindi'];
		$history_description = $row['history_description'];
		$history_description_hindi = $row['history_description_hindi'];
		$history_image = $row['history_year'];
		$history_image = $row['history_image'];
		$history_image = $row['history_logo'];
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
								<input type="hidden" name="hidden_history_id" value="<?= $id; ?>" />
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="home_status" id="home_status" checked="">
										<label class="custom-control-label" for="home_status">Yes</label>
									</div>
								</div>
							</div>

							<!-- <div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="history_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="history_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="history_title" id="history_title" required autocomplete="off" value="<?= $history_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="history_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="history_title_hindi" id="history_title_hindi" required autocomplete="off" value="<?= $history_title_hindi; ?>" />
								</div>
							</div> -->

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="history_description" class="form-label">Description<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="history_description" class="form-label">In English<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="history_description" id="history_description" required autocomplete="off"><?= $history_description; ?></textarea>
								</div>
								<div class="col-md-5">
									<label for="history_description_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<textarea type="text" class="form-control" name="history_description_hindi" id="history_description_hindi" required autocomplete="off"><?= $history_description_hindi; ?></textarea>
								</div>

							</div>
						</div>

						<div class="form-group row align-items-center">
							<div class="col-md-2">
								<label for="history_image" class="form-label">History Image<span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-5">
								<label for="history_image" class="control-label">Image<span class="tx-danger"> *</span></label>
								<?php if ($history_image) : ?>
									<a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $history_image; ?>">View</a>
								<?php endif; ?>
								<input class="form-control form-control-sm" name="history_image" id="history_image" type="file" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
							</div>
							<div class="col-md-5">
									<label for="history_year" class="form-label">Year<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="history_year" id="history_year" required autocomplete="off" value="<?= $history_year; ?>" />
								</div>
					
						</div>
					

				</div>
			</div><!-- col -->

			<?php
			// $history_sidebar_view_type = 'create';
			// include viewpath('__historysidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->