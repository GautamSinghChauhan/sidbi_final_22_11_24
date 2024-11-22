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
?>
<?php 
if($route == ''):
  ?>
<div class="content">
  <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="row">
      <div class="col-12">
        <div class="row-xs mg-b-25">

          <div data-label="Example" class="df-example demo-table table-responsive">
            <table id="publicationLIST" class="table table-bordered w-100">
              <thead>
                <tr>
                  <th class="wd-5p"><?= $__contentsno ?></th>
                  <th class="wd-15p">Title</th>
                  <th class="wd-10p">Publication Hindi Title</th>
          
                  <th class="wd-10p"><?= $__status ?></th>
                  <th class="wd-10p"><?= $__options ?></th>
                </tr>
              </thead>
            </table>
          </div>

        </div><!-- row -->
      </div><!-- col -->

      <?php
      //include viewpath('__aboutusheadingsidebar.php');
      ?>

    </div><!-- row -->
  </div><!-- container -->
</div><!-- content -->

<?php elseif ($route == 'preview') :
    if ($save == "update") :


        $title = $validation_globalclass->sanitize($_REQUEST['title']);
        $document_pdf = $validation_globalclass->sanitize($_REQUEST['document_pdf']);
        // $welcomebanner_attachement = $validation_globalclass->sanitize(ucwords($_REQUEST['welcomebanner_image']));
      
      
      
        $welcomebannerstatus = $_REQUEST['welcomebannerstatus']; //value='on' == 1 || value='' == 0
      
        if (
          $welcomebannerstatus == 'on'
        ) :
          $welcomebanner_status = '1';
        else :
          $welcomebanner_status = '0';
        endif;
      
        $fileName =  $_FILES["document_pdf"]["name"];
      
        $file_size = $_FILES['document_pdf']['size'];
      
        $valid_formats = array( "PDF", "DOCX");
      
        $ext = explode(".", $fileName);
        $ext = strtoupper(end($ext));
      
        if (!empty($fileName)) :
      
          if (in_array($ext, $valid_formats)) :
      
            if ($file_size < 2097152) :
      
      
              $new_file_document_attachement = time() . substr(str_replace(" ", "_", $txt), 5) . "." . $ext;
      
              $new_file_name_stu  = pathinfo($new_file_document_attachement, PATHINFO_EXTENSION);
              $current_time = date("Ymdhis");
              $NEWfileName = 'sidbidocument' . '_' . $current_time . $new_file_document_attachement;
              $files_upload = $_FILES['document_pdf']["name"];
      
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

    endif;
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

                </div>
                <div class="col-9 col-sm-6 text-right">
                  <button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
                  <input type="hidden" name="hidden_welcome_banner_id" value="<?php echo $welcome_banner_id; ?>" />
                </div>
              </div>

              <!-- BASIC Starting -->
              <div id="basic">


                <div class="form-group row align-items-end">
                  <div class="col-md-2">
                    <label for="welcomebanner_link" class="form-label">English Title<span class="tx-danger">*</span></label>
                  </div>
                  <div class="col-md-5">
                    <label for="welcomebanner_link" class="form-label"><span class="tx-danger"></span></label>
                    <input type="text" class="form-control" name="title" id="title" required autocomplete="off" value="<?= $welcomebanner_link ?>"></input>
                  </div>

                </div>


                <div class="form-group row">
                  <div class="col-md-2">
                    <label for="welcomebanner_image" class="control-label">Document<span class="tx-danger"> *</span></label>
                  </div>

                  <div class="col-md-5">
                    <input class="form-control form-control-sm" name="document_pdf" id="document_pdf" type="file" value="<?php echo $welcomebanner_attachement ?>" autocomplete="off">
                    <small class="text-danger">Allowed format  PDF, DOCX. Max file size 2 MB.</small>
                    <!-- <input type="hidden" class="form-control" name="welcomebanner_image_old" id="welcomebanner_image_old" placeholder="Welcome Banner Image" value="<?= $welcomebanner_attachement ?>" autocomplete="off" required>
                    <div class="mt-2">
                      <span class="mg-l-10 badge badge-sm bg-warning"> <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $welcomebanner_attachement; ?>">View</a></span> -->
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