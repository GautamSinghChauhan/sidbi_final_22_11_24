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

if ($save == "update") :


  $welcomebanner_link = $validation_globalclass->sanitize($_REQUEST['welcomebanner_link']);
  $welcomebanner_attachement = $validation_globalclass->sanitize($_REQUEST['welcomebanner_image']);
  // $welcomebanner_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['welcomebanner_image']));



  $welcomebannerstatus = $_REQUEST['status']; //value='on' == 1 || value='' == 0

  if (
    $welcomebannerstatus == 'on'
  ) :
    $welcomebanner_status = '1';
  else :
    $welcomebanner_status = '0';
  endif;

  $fileName =  $_FILES["welcomebanner_image"]["name"];

  $file_size = $_FILES['welcomebanner_image']['size'];

  $valid_formats = array("JPG", "JPEG", "PNG", "PDF", "DOCX");

  $ext = explode(".", $fileName);
  $ext = strtoupper(end($ext));

  if (!empty($fileName)) :

    if (in_array($ext, $valid_formats)) :

      if ($file_size < 2097152) :


        $new_file_welcomebanner_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;

        $new_file_name_stu  = pathinfo($new_file_welcomebanner_attachement, PATHINFO_EXTENSION);
        $current_time = date("Ymdhis");
        $NEWfileName = 'sidbiwelcomebanner' . '_'  . $new_file_welcomebanner_attachement;
        $files_upload = $_FILES['welcomebanner_image']["name"];

        // Upload file 
        $uploadedFile = '';
        $uploadDir = '../assets/front/home/';
        $targetFilePath = $uploadDir . $NEWfileName;

        $welcomebanner_attachement = $NEWfileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Upload file to the server 
        if (move_uploaded_file($_FILES["welcomebanner_image"]["tmp_name"], $targetFilePath)) :
          $uploadedFile = $NEWfileName;
          unlink($uploadDir . $welcomebanner_attachement_old);
        endif;
      else :
        echo '3';
        $err[] = 'Maximum Upload File Size is 2 MB only.';

      endif;
    else :
      $err[] = 'Only JPG, PNG, PDF, DOC file format is allowed.';
    endif;
  else :
    $welcomebanner_attachement = $welcomebanner_attachement_old;
  endif;
  //Insert Query

  $arrFields = array('`welcome_banner_link`', '`welcome_banner_image`', '`createdby`', '`status`', );

  $arrValues = array("$welcomebanner_link",  "$welcomebanner_attachement", "$logged_user_id", "$welcomebanner_status");


  $sqlWhere = " `welcome_banner_id` = '1' ";

  if (sqlACTIONS("UPDATE", "welcome_banner", $arrFields, $arrValues, $sqlWhere)) :
    $code = 1;
?>
    <!-- <script type="text/javascript">
      window.location = 'welcomebanner.php?code=1'
    </script> -->
<?php
  else :

    $err[] =  "Unable to Update Record";
  endif;
endif;

$welcomebanner_data = sqlQUERY_LABEL("SELECT `welcome_banner_id`, `welcome_banner_image`, `welcome_banner_link`, `status`, `deleted` FROM `welcome_banner` where deleted = '0' and status = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
$check_record_availabity = sqlNUMOFROW_LABEL($welcomebanner_data);

while ($row = sqlFETCHARRAY_LABEL($welcomebanner_data)) {
  $welcome_banner_id = $row["welcome_banner_id"];
  $welcomebanner_link = $row['welcome_banner_link'];
  $welcomebanner_attachement = $row['welcome_banner_image'];
  $status = $row["status"];
}
?>
<?php if ($route == '') : ?>
  <div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="row">
        <div class="col-lg-12">
          <div class="mg-b-25">

            <form method="post" enctype="multipart/form-data" data-parsley-validate>

              <div id="stick-here"></div>
              <div id="stickThis" class="form-group row mg-b-0">
                <div class="col-3 col-sm-6">
                </div>
                <div class="col-9 col-sm-6 text-right">
                  <button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
                  <input type="hidden" name="hidden_welcome_banner_id" value="<?php echo $welcome_banner_id; ?>" />
                </div>
              </div>

              <!-- BASIC Starting -->
              <div id="basic">

              <div class="form-group row">
								<label for="status" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
								<div class="col-sm-7">
									<div class="custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" <?php if ($status == '1') :
										echo 'checked=""';
										endif; ?>/>
										<label class="custom-control-label" for="status">Yes</label>
									</div>
								</div>
							</div>

                <div class="form-group row align-items-end">
                  <div class="col-md-2">
                    <label for="welcomebanner_link" class="form-label">Welcome Banner Link<span class="tx-danger">*</span></label>
                  </div>
                  <div class="col-md-5">
                    <label for="welcomebanner_link" class="form-label"><span class="tx-danger"></span></label>
                    <input type="text" class="form-control" name="welcomebanner_link" id="welcomebanner_link" required autocomplete="off" value="<?= $welcomebanner_link ?>"></input>
                  </div>

                </div>


                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="welcomebanner_image" class="control-label">Welcome Banner Image<span class="tx-danger"> *</span></label>
                  </div>

                  <div class="col-md-5">
                    <input class="form-control form-control-sm" name="welcomebanner_image" id="welcomebanner_image" type="file" value="<?php echo $welcomebanner_attachement ?>" autocomplete="off">
                    <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                    <input type="hidden" class="form-control" name="welcomebanner_image_old" id="welcomebanner_image_old" placeholder="Welcome Banner Image" value="<?= $welcomebanner_attachement ?>" autocomplete="off" required>
                    <div class="mt-2">
                      <span class="mg-l-10 badge badge-sm bg-warning"> <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $welcomebanner_attachement; ?>">View</a></span>
                    </div>
                  </div>


                </div>
              </div>
            </form>

          </div><!-- row -->
        </div><!-- col -->

        <?php
        // $overview_sidebar_view_type = 'create';
        // include viewpath('__overviewsidebar.php');
        ?>

      </div><!-- row -->
    </div><!-- container -->
  </div><!-- content -->
<?php endif; ?>