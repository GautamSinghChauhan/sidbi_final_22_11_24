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
if (isset($update) && $update == "update" && $hidden_homeproduct_id != '') {
    $homeproduct_title = $validation_globalclass->sanitize(($_POST['homeproduct_title']));
    $homeproduct_title_hindi = $validation_globalclass->sanitize(($_POST['homeproduct_title_hindi']));
    $homeproduct_button1 = $validation_globalclass->sanitize(($_POST['homeproduct_button1']));
    $homeproduct_button2 = $validation_globalclass->sanitize(($_POST['homeproduct_button2']));
    $homeproduct_image = $validation_globalclass->sanitize(($_POST['homeproduct_image']));
    $status = isset($_POST['status']) ? 1 : 0;

    $targetDirectory = "../assets/front/home/";
    $targetFilePath = $targetDirectory . basename($_FILES["homeproduct_image"]["tmp_name"]);

    if (isset($_FILES['homeproduct_image']['name'])) :
        $upload_dir = '../assets/front/home/';
        $homeproduct_image_fileName = $_FILES["homeproduct_image"]["name"];
        $fileInfo = pathinfo($homeproduct_image_fileName);
        $homeproduct_image_fileExtension = $fileInfo["extension"];
        $file_type = $_FILES['homeproduct_image']['type'];
        $homeproduct_image_file_name = $homeproduct_image_fileName;
        $file_temp_loc  = $_FILES['homeproduct_image']['tmp_name'];
        $file_error_msg = $_FILES['homeproduct_image']['error'];
        $file_size = $_FILES['homeproduct_image']['size'];
        $homeproduct_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $homeproduct_image_file_name);
    endif;

    if($homeproduct_image_move_file):

        $arrFields = array('`homeproduct_title`', '`homeproduct_title_hindi`', '`homeproduct_image`', '`homeproduct_button1`', '`homeproduct_button2`', '`createdby`', '`status`');

        $arrValues = array("$homeproduct_title", "$homeproduct_title_hindi", "$homeproduct_image_file_name", "$homeproduct_button1", "$homeproduct_button2", "$logged_user_id", "$status");

    else:

        $arrFields = array('`homeproduct_title`', '`homeproduct_title_hindi`', '`homeproduct_button1`', '`homeproduct_button2`', '`createdby`', '`status`');

        $arrValues = array("$homeproduct_title", "$homeproduct_title_hindi", "$homeproduct_button1", "$homeproduct_button2", "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `homeproduct_id` = '$hidden_homeproduct_id' ";

    if (sqlACTIONS("UPDATE", "homeproduct", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'homeproduct.php?code=1'
        </script>
<?php

        if (isset($_FILES["homeproduct_image"])) {
            if (move_uploaded_file($_FILES["homeproduct_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: homeproduct.php?code=1");
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
    // echo "SELECT `homeproduct_title`, `homeproduct_title_hindi`, `homeproduct_description`, `homeproduct_description_hindi`, `homeproduct_image`, `homeproduct_toll_number`, `homeproduct_whatsapp_number`, `homeproduct_button1`, `homeproduct_button2`, `status` FROM `homeproduct` WHERE `deleted` = '0'  AND `homeproduct_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `homeproduct_title`, `homeproduct_title_hindi`, `homeproduct_image`, `homeproduct_button1`, `homeproduct_button2`, `status` FROM `homeproduct` WHERE `deleted` = '0'  AND `homeproduct_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $homeproduct_id = $row["homeproduct_id"];
            $homeproduct_title = $row['homeproduct_title'];
            $homeproduct_title_hindi = $row['homeproduct_title_hindi'];
            $homeproduct_button1 = $row['homeproduct_button1'];
            $homeproduct_button2 = $row['homeproduct_button2'];
            $homeproduct_image = $row['homeproduct_image'];
            $status = $row["status"];
        endwhile;
    endif;
endif;
?>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="">
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
                            <label for="status" class="col-sm-2 col-form-label"><?= $__active ?></label>
                            <input type="hidden" name="hidden_homeproduct_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="homeproduct_title" class="form-label">homeproduct Title<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="homeproduct_title" id="homeproduct_title" required autocomplete="off" value="<?= $homeproduct_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="homeproduct_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="homeproduct_title_hindi" id="homeproduct_title_hindi" required autocomplete="off" value="<?= $homeproduct_title_hindi; ?>" />
                            </div>
                        </div>

                  
                    <div class="form-group row align-items-end">
                        <div class="col-md-2">
                            <label for="button" class="form-label">Buttons<span class="tx-danger">*</span></label>
                        </div>
                        <div class="col-md-5">
                            <label for="homeproduct_button1" class="form-label">Button Label One<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="homeproduct_button1" id="homeproduct_button1" required autocomplete="off" value="<?= $homeproduct_button1 ?>"></input>
                        </div>
                        <div class="col-md-5">
                            <label for="homeproduct_button2" class="form-label">Button Label Two<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="homeproduct_button2" id="homeproduct_button2" required autocomplete="off" value="<?= $homeproduct_button2 ?>"></input>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="homeproduct_image" class="control-label">homeproduct Image<span class="tx-danger"> *</span></label>
                        </div>
                        <div class="col-md-5">
                        <label for="homeproduct_image" class="control-label">homeproduct Image<span class="tx-danger"> *</span></label>
                            <?php if($homeproduct_image): ?>
                            <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $homeproduct_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="homeproduct_image" id="homeproduct_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>