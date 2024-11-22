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
if (isset($update) && $update == "update" && $hidden_home_id != '') {
    $home_title = $validation_globalclass->sanitize(($_POST['home_title']));
    $home_title_hindi = $validation_globalclass->sanitize(($_POST['home_title_hindi']));
    $home_description = $validation_globalclass->sanitize(($_POST['home_description']));
    $home_description_hindi = $validation_globalclass->sanitize(($_POST['home_description_hindi']));
    $home_toll_number = $validation_globalclass->sanitize(($_POST['home_toll_number']));
    $home_whatsapp_number = $validation_globalclass->sanitize(($_POST['home_whatsapp_number']));
    $home_button1 = $validation_globalclass->sanitize(($_POST['home_button1']));
    $home_button2 = $validation_globalclass->sanitize(($_POST['home_button2']));
    $home_image = $validation_globalclass->sanitize(($_POST['home_image']));
    $status = isset($_POST['status']) ? 1 : 0;

    $targetDirectory = "../assets/front/home/";
    $targetFilePath = $targetDirectory . basename($_FILES["home_image"]["tmp_name"]);

    if (isset($_FILES['home_image']['name'])) :
        $upload_dir = '../assets/front/home/';
        $home_image_fileName = $_FILES["home_image"]["name"];
        $fileInfo = pathinfo($home_image_fileName);
        $home_image_fileExtension = $fileInfo["extension"];
        $file_type = $_FILES['home_image']['type'];
        $home_image_file_name = $home_image_fileName;
        $file_temp_loc  = $_FILES['home_image']['tmp_name'];
        $file_error_msg = $_FILES['home_image']['error'];
        $file_size = $_FILES['home_image']['size'];
        $home_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $home_image_file_name);
    endif;

    if ($home_image_move_file) :

        $arrFields = array('`home_title`', '`home_title_hindi`', '`home_description`', '`home_description_hindi`', '`home_toll_number`', '`home_whatsapp_number`', '`home_image`', '`home_button1`', '`home_button2`', '`createdby`', '`status`');

        $arrValues = array("$home_title", "$home_title_hindi", "$home_description", "$home_description_hindi", "$home_toll_number", "$home_whatsapp_number", "$home_image_file_name", "$home_button1", "$home_button2", "$logged_user_id", "$status");

    else :

        $arrFields = array('`home_title`', '`home_title_hindi`', '`home_description`', '`home_description_hindi`', '`home_toll_number`', '`home_whatsapp_number`', '`home_button1`', '`home_button2`', '`createdby`', '`status`');

        $arrValues = array("$home_title", "$home_title_hindi", "$home_description", "$home_description_hindi", "$home_toll_number", "$home_whatsapp_number", "$home_button1", "$home_button2", "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `home_id` = '$hidden_home_id' ";

    if (sqlACTIONS("UPDATE", "home", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'home.php?code=1'
        </script>
<?php

        if (isset($_FILES["home_image"])) {
            if (move_uploaded_file($_FILES["home_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: home.php?code=1");
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
    // echo "SELECT `home_title`, `home_title_hindi`, `home_description`, `home_description_hindi`, `home_image`, `home_toll_number`, `home_whatsapp_number`, `home_button1`, `home_button2`, `status` FROM `home` WHERE `deleted` = '0'  AND `home_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `home_title`, `home_title_hindi`, `home_description`, `home_description_hindi`, `home_image`, `home_toll_number`, `home_whatsapp_number`, `home_button1`, `home_button2`, `status` FROM `home` WHERE `deleted` = '0'  AND `home_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $home_id = $row["home_id"];
            $home_title = $row['home_title'];
            $home_title_hindi = $row['home_title_hindi'];
            $home_description = $row['home_description'];
            $home_description_hindi = $row['home_description_hindi'];
            $home_toll_number = $row['home_toll_number'];
            $home_whatsapp_number = $row['home_whatsapp_number'];
            $home_button1 = $row['home_button1'];
            $home_button2 = $row['home_button2'];
            $home_image = $row['home_image'];
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
                            <input type="hidden" name="hidden_home_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="home_title" class="form-label">Home Title<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="home_title" id="home_title" required autocomplete="off" value="<?= $home_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="home_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="home_title_hindi" id="home_title_hindi" required autocomplete="off" value="<?= $home_title_hindi; ?>" />
                            </div>
                        </div>

                        <div class=" form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="home_description" class="form-label">Home Discription<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="home_description" class="form-label">In English<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="home_description" id="home_description" required autocomplete="off"><?= $home_description; ?></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="home_description_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="home_description_hindi" id="home_description_hindi" required autocomplete="off"><?= $home_description_hindi; ?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row align-items-end">
                        <div class="col-md-2">
                            <label for="home_description" class="form-label">Contact<span class="tx-danger">*</span></label>
                        </div>
                        <div class="col-md-5">
                            <label for="home_toll_number" class="form-label">Toll Free Number<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="home_toll_number" id="home_toll_number" required autocomplete="off" value="<?= $home_toll_number; ?>"></input>
                        </div>
                        <div class="col-md-5">
                            <label for="home_whatsapp_number" class="form-label">Whatsapp Number<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="home_whatsapp_number" id="home_whatsapp_number" required autocomplete="off" value="<?= $home_whatsapp_number; ?>"></input>
                        </div>
                    </div>
                    <div class="form-group row align-items-end">
                        <div class="col-md-2">
                            <label for="button" class="form-label">Buttons<span class="tx-danger">*</span></label>
                        </div>
                        <div class="col-md-5">
                            <label for="home_button1" class="form-label">Button Label One<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="home_button1" id="home_button1" required autocomplete="off" value="<?= $home_button1 ?>"></input>
                        </div>
                        <div class="col-md-5">
                            <label for="home_button2" class="form-label">Button Label Two<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="home_button2" id="home_button2" required autocomplete="off" value="<?= $home_button2 ?>"></input>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-2">
                            <label for="button" class="form-label">Home Image<span class="tx-danger">*</span></label>
                        </div>
                        <div class="col-md-5">
                            <!-- <label for="home_image" class="control-label"><span class="tx-danger"> *</span></label> -->
                            <?php if ($home_image) : ?>
                                <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $home_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="home_image" id="home_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                        <!-- <div class="col-md-5">
                            <label for="home_button2" class="form-label">Button Label Two<span class="tx-danger">*</span></label>
                            <input type="num" class="form-control" name="home_button2" id="home_button2" required autocomplete="off" value="<?= $home_button2 ?>"></input>
                        </div> -->
                    </div>
                    <!-- <div class="form-group row">
                        <div class="col-md-6">
                            <label for="home_image" class="control-label">Home Image<span class="tx-danger"> *</span></label>
                            <?php if ($home_image) : ?>
                                <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $home_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="home_image" id="home_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>