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
$id = $_GET['id'];
//Insert Operation
if (isset($update) && $update == "update" && $hidden_boardofdirector_ID != '') :

	$director_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['director_image']));
	$director_name = $validation_globalclass->sanitize(ucwords($_REQUEST['director_name']));
	$director_shortdescription = $validation_globalclass->sanitize(ucwords($_REQUEST['director_shortdescription']));
	$director_description = $validation_globalclass->sanitize(ucwords($_REQUEST['director_description']));
	$director_name_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['director_name_hindi']));
	$director_shortdescription_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['director_shortdescription_hindi']));
	$director_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['director_description_hindi']));
	$boardofdirectorstatus = $_REQUEST['boardofdirectorstatus']; //value='on' == 1 || value='' == 0

	if (
		$boardofdirectorstatus == 'on'
	) :
		$boardofdirector_status = '1';
	else :
		$boardofdirector_status = '0';
	endif;



	$fileName =  $_FILES["director_image"]["name"];

	$file_size = $_FILES['director_image']['size'];

	$valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

	$ext = explode(".", $fileName);
	$ext = strtoupper(end($ext));

	if (!empty($fileName)) :

		if (in_array($ext, $valid_formats)) :

			if ($file_size < 2097152) :


				$new_file_director_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

				$new_file_name_stu  = pathinfo($new_file_director_attachement, PATHINFO_EXTENSION);;
				$current_time = date("Ymdhis");
				$NEWfileName = 'sidbiabout' . '_' .  $new_file_director_attachement;
				// echo $NEWfileName;
				// exit();
				// $upNEWfileNameloadStatus = 1;
				$files_upload = $_FILES['director_image']["name"];

				// Upload file 
				$uploadedFile = '';
				$uploadDir = '../assets/front/home/';
				$targetFilePath = $uploadDir . $NEWfileName;

				$director_attachement = $NEWfileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

				// Upload file to the server 
				if (move_uploaded_file($_FILES["director_image"]["tmp_name"], $targetFilePath)) :
					$uploadedFile = $NEWfileName;
					unlink($uploadDir . $director_attachement_old);

					//Insert Query
					$arrFields = array('`director_image`','`director_name`', '`director_shortdescription`', '`director_description`',  '`director_name_hindi`', '`director_shortdescription_hindi`', '`director_description_hindi`', '`createdby`', '`status`');

					$arrValues = array("$director_attachement", "$director_name", "$director_shortdescription", "$director_description",  "$director_name_hindi", "$director_shortdescription_hindi", "$director_description_hindi",  "$logged_user_id", "$boardofdirector_status");

				endif;
			else :
				echo '3';
				$err[] = 'Maximum Upload File Size is 2 MB only.';

			endif;
		else :
			$err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
		endif;
	else :

		//Insert Query
		$arrFields = array( '`director_name`', '`director_shortdescription`', '`director_description`',  '`director_name_hindi`', '`director_shortdescription_hindi`', '`director_description_hindi`', '`createdby`', '`status`');

		$arrValues = array("$director_name", "$director_shortdescription", "$director_description",  "$director_name_hindi", "$director_shortdescription_hindi", "$director_description_hindi",  "$logged_user_id", "$boardofdirector_status");

	endif;

	$sqlWhere = "boardofdirector_ID=$hidden_boardofdirector_ID";


	if (sqlACTIONS("UPDATE", "js_boardofdirector", $arrFields, $arrValues, $sqlWhere)) :


		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
		<script type="text/javascript">
			window.location = 'boardofdirector.php?code=1'
		</script>
<?php
		//header("Location:boardofdirector.php?code=1");

		exit();
	else :

		$err[] =  "Unable to Update Record";
	endif;

endif;

if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `boardofdirector_ID`, `director_image`, `director_name`, `director_shortdescription`,  `director_description`,  `director_name_hindi`, `director_shortdescription_hindi`,  `director_description_hindi`, `status` FROM `js_boardofdirector` where deleted = '0' and `boardofdirector_ID`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());

	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$boardofdirector_ID = $row["boardofdirector_ID"];
		$director_attachement = $row['director_image'];
		$director_name =html_entity_decode( $row['director_name']);
		$director_shortdescription = html_entity_decode($row['director_shortdescription']);
		$director_description = html_entity_decode($row['director_description']);
		$director_name_hindi =html_entity_decode($row['director_name_hindi']);
		$director_shortdescription_hindi = html_entity_decode($row['director_shortdescription_hindi']);
		$director_description_hindi = html_entity_decode($row['director_description_hindi']);
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
								<input type="hidden" name="hidden_boardofdirector_ID" value="<?php echo $boardofdirector_ID; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?php echo $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="boardofdirectorstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="boardofdirectorstatus" id="boardofdirectorstatus" <?php if ($status == '1') :
																																						echo 'checked=""';
																																					endif; ?>>
										<label class="custom-control-label" for="boardofdirectorstatus">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="director_name" class="form-label">Name<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_name" id="director_name" autocomplete="off" value="<?= $director_name; ?>" />
								</div>
								<div class="col-md-5">
									<label for="director_name_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_name_hindi" id="director_name_hindi" autocomplete="off" value="<?= $director_name_hindi; ?>" />
								</div>

							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="director_shortdescription" class="form-label">Short Description<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="director_shortdescription" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_shortdescription" id="director_shortdescription" autocomplete="off" value="<?= $director_shortdescription; ?>" />
								</div>
								<div class="col-md-5">
									<label for="director_shortdescription_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_shortdescription_hindi" id="director_shortdescription_hindi" autocomplete="off" value="<?= $director_shortdescription_hindi; ?>" />
								</div>

							</div>
							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="director_description" class="form-label">Description<span class="tx-danger"></span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_description" id="director_description" autocomplete="off" value="<?= $director_description; ?>" />
								</div>
								<div class="col-md-5">
									<label for="director_description_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
									<input type="text" class="form-control" name="director_description_hindi" id="director_description_hindi" autocomplete="off" value="<?= $director_description_hindi; ?>" />
								</div>

							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label for="tutor_attachement" class="control-label">Director Image<span class="tx-danger"> *</span></label>
								</div>
								<div class="col-md-5">
									<input class="form-control form-control-sm" name="director_image" id="director_image" type="file" value="<?php echo $director_attachement ?>" autocomplete="off">
									<small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
									<input type="hidden" class="form-control" name="director_image_old" id="director_image_old" placeholder="Tutor Attachement" value="<?= $director_attachement ?>" autocomplete="off">

									<span class="mg-l-10 badge badge-sm bg-warning"><a class="text-white" target="_blank" href="<?= BASEPATH . '../assets/front/home/' . $director_attachement; ?>">View</a></span>

								</div>
					</form>

				</div><!-- row -->
			</div><!-- col -->

			<?php
			$boardofdirector_sidebar_view_type = 'create';
			include viewpath('__boardofdirectorsidebar.php');
			?>

		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->