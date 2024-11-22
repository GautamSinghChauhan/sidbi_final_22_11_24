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
if ($save == "update") :


	$projectbanner_title = $validation_globalclass->sanitize(ucwords($_REQUEST['projectbanner_title']));
	$projectbanner_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['projectbanner_title_hindi']));
	$projectbanner_attachement = $validation_globalclass->sanitize($_REQUEST['projectbanner_image']);
	// $projectbanner_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['projectbanner_image']));



	$projectbannerstatus = $_REQUEST['projectbannerstatus']; //value='on' == 1 || value='' == 0

	if (
		$projectbannerstatus == 'on'
	) :
		$projectbanner_status = '1';
	else :
		$projectbanner_status = '0';
	endif;

	$fileName =  $_FILES["projectbanner_image"]["name"];

	$file_size = $_FILES['projectbanner_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_projectbanner_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_projectbanner_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");

				$NEWfileName = 'sidbiproject' . '_' . $new_file_projectbanner_attachement;


				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['projectbanner_image']["name"];
				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$projectbanner_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["projectbanner_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $projectbanner_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$projectbanner_attachement = $projectbanner_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`projectbanner_title`', '`projectbanner_title_hindi`', '`projectbanner_image`', '`createdby`', '`status`');

	$arrValues = array("$projectbanner_title", "$projectbanner_title_hindi", "$projectbanner_attachement", "$logged_user_id", "$projectbanner_status");


	$sqlWhere = " `projectbanner_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "projectbanner", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'projectbanner.php?route=edit'
		</script>
<?php
		//header("Location:projectbanner.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `projectbanner_ID`, `projectbanner_title`,  `projectbanner_title_hindi`, `projectbanner_image`, `status` FROM `projectbanner` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$projectbanner_ID = $row["projectbanner_ID"];
		$projectbanner_title = $row['projectbanner_title'];
		$projectbanner_title_hindi = $row['projectbanner_title_hindi'];
		$projectbanner_attachement = $row['projectbanner_image'];
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
								<?php
								//  pageCANCEL($currentpage, $__cancel); ?>
							</div>
							<div class="col-9 col-sm-6 text-right">
								<button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
								<input type="hidden" name="hidden_projectbanner_ID" value="<?php echo $projectbanner_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="projectbannerstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="projectbannerstatus" id="projectbannerstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="projectbannerstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="projectbanner_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="projectbanner_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="projectbanner_title" id="projectbanner_title" required autocomplete="off" value="<?= $projectbanner_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="projectbanner_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="projectbanner_title_hindi" id="projectbanner_title_hindi" required autocomplete="off" value="<?= $projectbanner_title_hindi; ?>" />
								</div>
							</div>
							<div class="form-group row">

								<div class="col-md-2">
									<label for="tutor_attachement" class="control-label">projectbanner picture<span class="tx-danger"> *</span></label>
								</div>


							<div class="col-md-5">
								<input class="form-control form-control-sm" name="projectbanner_image" id="projectbanner_image" type="file" value="<?php echo $projectbanner_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="projectbanner_image_old" id="projectbanner_image_old" placeholder="Tutor Attachement" value="<?= $projectbanner_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $projectbanner_attachement; ?>">View</a></span>

								</div>
							</div>


							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$projectbanner_sidebar_view_type = 'create';
			include viewpath('__projectbannersidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->