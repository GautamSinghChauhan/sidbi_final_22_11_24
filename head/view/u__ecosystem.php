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


	$ecosystem_content = $_REQUEST['ecosystem_content'];
	$ecosystem_content_hindi = $_REQUEST['ecosystem_content_hindi'];
	$ecosystem_attachement = $validation_globalclass->sanitize($_REQUEST['ecosystem_image']);
	// $ecosystem_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['ecosystem_image']));

	$ecosystemstatus = $_REQUEST['ecosystemstatus']; //value='on' == 1 || value='' == 0

	if (
		$ecosystemstatus == 'on'
	) :
		$ecosystem_status = '1';
	else :
		$ecosystem_status = '0';
	endif;

	$fileName =  $_FILES["ecosystem_image"]["name"];

	$file_size = $_FILES['ecosystem_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_ecosystem_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_ecosystem_attachement, PATHINFO_EXTENSION);
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbieco' . '_' .  $new_file_ecosystem_attachement;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['ecosystem_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$ecosystem_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["ecosystem_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $ecosystem_attachement_old);
				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :
		$ecosystem_attachement = $ecosystem_attachement_old;
	endif;
	//Insert Query

	$arrFields = array('`ecosystem_content`', '`ecosystem_content_hindi`', '`ecosystem_image`', '`createdby`', '`status`');

	$arrValues = array("$ecosystem_content", "$ecosystem_content_hindi", "$ecosystem_attachement", "$logged_user_id", "$ecosystem_status");


	$sqlWhere = " `ecosystem_ID` = '1' ";

	if (sqlACTIONS("UPDATE", "ecosystem", $arrFields, $arrValues, $sqlWhere)) :

		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'ecosystem.php?route=edit'
		</script>
<?php
		//header("Location:ecosystem?code=1");
		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;
endif;

if ($route == 'edit') {

	$list_datas = sqlQUERY_LABEL("SELECT `ecosystem_ID`, `ecosystem_content`,  `ecosystem_content_hindi`,  `ecosystem_image`, `status` FROM `ecosystem` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$ecosystem_ID = $row["ecosystem_ID"];
		$ecosystem_content = $row['ecosystem_content'];
		$ecosystem_content_hindi = $row['ecosystem_content_hindi'];
		$ecosystem_attachement = $row['ecosystem_image'];
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
								<input type="hidden" name="hidden_ecosystem_ID" value="<?php echo $ecosystem_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="ecosystemstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="ecosystemstatus" id="ecosystemstatus" <?php if ($status == '1') :
																																			echo 'checked=""';
																																		endif; ?>>
										<label class="custom-control-label" for="ecosystemstatus">Yes</label>
									</div>
								</div>
							</div>
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="ecosystem_content" class="form-label">Content <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="ecosystem_content" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="ecosystem_content" id="ecosystem_content" placeholder=""><?= $ecosystem_content; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="ecosystem_content" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="ecosystem_content_hindi" id="ecosystem_content_hindi" placeholder=""><?= $ecosystem_content_hindi; ?></textarea>
                                </div>
                            </div>

							<div class="form-group row">
							<div class="col-md-2">
								<label for="tutor_attachement" class="control-label">ecosystem picture<span class="tx-danger"> *</span></label>
							</div>

							<div class="col-md-5">
								<input class="form-control form-control-sm" name="ecosystem_image" id="ecosystem_image" type="file" value="<?php echo $ecosystem_attachement ?>" autocomplete="off">
								<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
								<input type="hidden" class="form-control" name="ecosystem_image_old" id="ecosystem_image_old" placeholder="Tutor Attachement" value="<?= $ecosystem_attachement ?>" autocomplete="off">
								<div class="mt-2">
									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $ecosystem_attachement; ?>">View</a></span>
								</div>
							</div>


							</div>
						</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$ecosystem_sidebar_view_type = 'create';
			include viewpath('__ecosystemsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->