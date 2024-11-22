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

// Insert Operation
// if (isset($_POST['save']) && $_POST['save'] == "update") {
if (isset($update) && $update == "update" && $hidden_joincccs_id != '') {
    $joincccs_title = $validation_globalclass->sanitize(ucwords($_POST['joincccs_title']));
    $joincccs_title_hindi = $validation_globalclass->sanitize(ucwords($_POST['joincccs_title_hindi']));
    $joincccs_link = $validation_globalclass->sanitize(ucwords($_POST['joincccs_link']));
    $joincccs_image = $validation_globalclass->sanitize(ucwords($_POST['joincccs_image']));
    $status = isset($_POST['status']) ? 1 : 0;

    $targetDirectory = "../assets/front/home/";
    $targetFilePath = $targetDirectory . basename($_FILES["joincccs_image"]["tmp_name"]);

    if (isset($_FILES['joincccs_image']['name'])) :
        $upload_dir = '../assets/front/home/';
        $joincccs_image_fileName = $_FILES["joincccs_image"]["name"];
        $fileInfo = pathinfo($joincccs_image_fileName);
        $joincccs_image_fileExtension = $fileInfo["extension"];
        $file_type = $_FILES['joincccs_image']['type'];
        $joincccs_image_file_name = $joincccs_image_fileName;
        $file_temp_loc  = $_FILES['joincccs_image']['tmp_name'];
        $file_error_msg = $_FILES['joincccs_image']['error'];
        $file_size = $_FILES['joincccs_image']['size'];
        $joincccs_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $joincccs_image_file_name);
    endif;

    if ($joincccs_image_move_file) :

        $arrFields = array('`joincccs_title`', '`joincccs_title_hindi`', '`joincccs_link`','`joincccs_image`', '`createdby`', '`status`');

        $arrValues = array("$joincccs_title", "$joincccs_title_hindi", "$joincccs_link", "$joincccs_image_file_name", "$logged_user_id", "$status");

    else :

        $arrFields = array('`joincccs_title`', '`joincccs_title_hindi`', '`joincccs_link`',  '`createdby`', '`status`');

        $arrValues = array("$joincccs_title", "$joincccs_title_hindi", "$joincccs_link", "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `joincccs_id` = '$hidden_joincccs_id' ";

    if (sqlACTIONS("UPDATE", "joincccs", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'joincccs.php?code=1'
        </script>
<?php

        if (isset($_FILES["joincccs_image"])) {
            if (move_uploaded_file($_FILES["joincccs_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: joincccs.php?code=1");
                exit();
            } else {
                $err[] = "Unable to Move Attachment";
            }
        }
    } else {
        $err[] = "Unable to Update Record";
    }
}

if ($route == 'edit') :
    // echo "SELECT `joincccs_title`, `joincccs_title_hindi`, `joincccs_link`, `joincccs_link_hindi`, `joincccs_image`, `joincccs_toll_number`, `joincccs_whatsapp_number`, `joincccs_button1`, `joincccs_button2`, `status` FROM `joincccs` WHERE `deleted` = '0'  AND `joincccs_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `joincccs_title`, `joincccs_title_hindi`, `joincccs_link`, `joincccs_image`, `status` FROM `joincccs` WHERE `deleted` = '0'  AND `joincccs_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $joincccs_id = $row["joincccs_id"];
            $joincccs_title = $row['joincccs_title'];
            $joincccs_title_hindi = $row['joincccs_title_hindi'];
            $joincccs_link = $row['joincccs_link'];
            $joincccs_image = $row['joincccs_image'];
            $status = $row["status"];
        endwhile;
    endif;
endif;
?>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
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
                            <label for="status" class="col-sm-2 col-form-label"><?= $__active ?></label>
                            <input type="hidden" name="hidden_joincccs_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="joincccs_title" class="form-label">joincccs Title<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="joincccs_title" id="joincccs_title" required autocomplete="off" value="<?= $joincccs_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="joincccs_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="joincccs_title_hindi" id="joincccs_title_hindi" required autocomplete="off" value="<?= $joincccs_title_hindi; ?>" />
                            </div>
                        </div>

                        
                    </div>

                   
                    <div class="form-group row ">
                        <div class="col-md-2">
                            <label for="button" class="form-label">Image and Link<span class="tx-danger">*</span></label>
                        </div>
                        <div class="col-md-5">
                            <label for="joincccs_image" class="control-label">Image<span class="tx-danger"> *</span></label>
                            <?php if ($joincccs_image) : ?>
                                <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $joincccs_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="joincccs_image" id="joincccs_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                        <div class="col-md-5">
                                <label for="joincccs_link" class="form-label">Link<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="joincccs_link" id="joincccs_link" required autocomplete="off"><?= $joincccs_link; ?></textarea>
                            </div>
                      
                    </div>
                   
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>