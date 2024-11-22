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


	$machinerybanner_title = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerybanner_title']));
	$machinerybanner_title_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerybanner_title_hindi']));
	$machinerybanner_attachement = $validation_globalclass->sanitize($_REQUEST['machinerybanner_image']);
	// $machinerybanner_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['machinerybanner_image']));



	$machinerybannerstatus = $_REQUEST['machinerybannerstatus']; //value='on' == 1 || value='' == 0

	if (
		$machinerybannerstatus == 'on'
	) :
		$machinerybanner_status = '1';
	else :
		$machinerybanner_status = '0';
	endif;

	$fileName =  $_FILES["machinerybanner_image"]["name"];

	$file_size = $_FILES['machinerybanner_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_machinerybanner_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_machinerybanner_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbimachineybanner' . '_' . '.' . $new_file_name_stu;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['machinerybanner_image']["name"];
				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$machinerybanner_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["machinerybanner_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $machinerybanner_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$machinerybanner_attachement = $machinerybanner_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`machinerybanner_title`', '`machinerybanner_title_hindi`', '`machinerybanner_image`', '`createdby`', '`status`');

	$arrValues = array("$machinerybanner_title", "$machinerybanner_title_hindi", "$machinerybanner_attachement", "$logged_user_id", "$machinerybanner_status");


	$sqlWhere = " `machinerybanner_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "machinerybanner", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'machinerybanner.php?route=edit'
		</script>
<?php
		//header("Location:machinerybanner.php?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `machinerybanner_ID`, `machinerybanner_title`,  `machinerybanner_title_hindi`, `machinerybanner_image`, `status` FROM `machinerybanner` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$machinerybanner_ID = $row["machinerybanner_ID"];
		$machinerybanner_title = $row['machinerybanner_title'];
		$machinerybanner_title_hindi = $row['machinerybanner_title_hindi'];
		$machinerybanner_attachement = $row['machinerybanner_image'];
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
								<input type="hidden" name="hidden_machinerybanner_ID" value="<?php echo $machinerybanner_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="machinerybannerstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="machinerybannerstatus" id="machinerybannerstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="machinerybannerstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="machinerybanner_title" class="form-label">Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="machinerybanner_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="machinerybanner_title" id="machinerybanner_title" required autocomplete="off" value="<?= $machinerybanner_title; ?>" />
								</div>
								<div class="col-md-5">
									<label for="machinerybanner_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="machinerybanner_title_hindi" id="machinerybanner_title_hindi" required autocomplete="off" value="<?= $machinerybanner_title_hindi; ?>" />
								</div>
							</div>
							<div class="form-group row">
							<div class="col-md-2">
								<label for="tutor_attachement" class="control-label">machinerybanner picture<span class="tx-danger"> *</span></label>
							</div>

							<div class="col-md-5">
								<input class="form-control form-control-sm" name="machinerybanner_image" id="machinerybanner_image" type="file" value="<?php echo $machinerybanner_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="machinerybanner_image_old" id="machinerybanner_image_old" placeholder="Tutor Attachement" value="<?= $machinerybanner_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $machinerybanner_attachement; ?>">View</a></span>
								</div>
							</div>


							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$machinerybanner_sidebar_view_type = 'create';
			include viewpath('__machinerybannersidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->