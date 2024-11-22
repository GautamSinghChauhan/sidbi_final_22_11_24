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
if (isset($update) && $update == "update" && $hidden_subsidiary_id != '') {
    $subsidiary_title = $validation_globalclass->sanitize(ucwords($_POST['subsidiary_title']));
    $subsidiary_title_hindi = $validation_globalclass->sanitize(ucwords($_POST['subsidiary_title_hindi']));
    $subsidiary_description = ($_POST['subsidiary_description']);
    $subsidiary_description_hindi = ($_POST['subsidiary_description_hindi']);
    $subsidiaryimpact_title = $validation_globalclass->sanitize(ucwords($_POST['subsidiaryimpact_title']));
    $subsidiaryimpact_title_hindi = $validation_globalclass->sanitize(ucwords($_POST['subsidiaryimpact_title_hindi']));
    $subsidiaryimpact_description = ($_POST['subsidiaryimpact_description']);
    $subsidiaryimpact_description_hindi = ($_POST['subsidiaryimpact_description_hindi']);
    $subsidiary_link = $validation_globalclass->sanitize(ucwords($_POST['subsidiary_link']));
    $subsidiary_image = $validation_globalclass->sanitize(ucwords($_POST['subsidiary_image']));
    $status = isset($_POST['status']) ? 1 : 0;

    $targetDirectory = "../assets/front/home/";
    $targetFilePath = $targetDirectory . basename($_FILES["subsidiary_image"]["tmp_name"]);

    if (isset($_FILES['subsidiary_image']['name'])) :
        $upload_dir = '../assets/front/home/';
        $subsidiary_image_fileName = $_FILES["subsidiary_image"]["name"];
        $fileInfo = pathinfo($subsidiary_image_fileName);
        $subsidiary_image_fileExtension = $fileInfo["extension"];
        $file_type = $_FILES['subsidiary_image']['type'];
        $subsidiary_image_file_name = $subsidiary_image_fileName;
        $file_temp_loc  = $_FILES['subsidiary_image']['tmp_name'];
        $file_error_msg = $_FILES['subsidiary_image']['error'];
        $file_size = $_FILES['subsidiary_image']['size'];
        $subsidiary_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $subsidiary_image_file_name);
    endif;

    if($subsidiary_image_move_file):

        $arrFields = array('`subsidiary_title`', '`subsidiary_title_hindi`', '`subsidiary_description`',  '`subsidiary_description_hindi`', '`subsidiaryimpact_title`', '`subsidiaryimpact_title_hindi`', '`subsidiaryimpact_description`',  '`subsidiaryimpact_description_hindi`', '`subsidiary_image`', '`subsidiary_link`', '`createdby`', '`status`');

        $arrValues = array("$subsidiary_title", "$subsidiary_title_hindi", "$subsidiary_description", "$subsidiary_description_hindi", "$subsidiaryimpact_title", "$subsidiaryimpact_title_hindi", "$subsidiaryimpact_description", "$subsidiaryimpact_description_hindi", "$subsidiary_image_file_name", "$subsidiary_link", "$logged_user_id", "$status");

    else:

        $arrFields = array('`subsidiary_title`', '`subsidiary_title_hindi`', '`subsidiary_description`', '`subsidiary_description_hindi`', '`subsidiaryimpact_title`', '`subsidiaryimpact_title_hindi`', '`subsidiaryimpact_description`', '`subsidiaryimpact_description_hindi`', '`subsidiary_link`', '`createdby`', '`status`');

        $arrValues = array("$subsidiary_title", "$subsidiary_title_hindi", "$subsidiary_description", "$subsidiary_description_hindi", "$subsidiaryimpact_title", "$subsidiaryimpact_title_hindi", "$subsidiaryimpact_description", "$subsidiaryimpact_description_hindi", "$subsidiary_link",  "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `subsidiary_id` = '$hidden_subsidiary_id' ";

    if (sqlACTIONS("UPDATE", "subsidiary", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'subsidiary.php?code=1'
        </script>
<?php

        if (isset($_FILES["subsidiary_image"])) {
            if (move_uploaded_file($_FILES["subsidiary_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: subsidiary.php?code=1");
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
    // echo "SELECT `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiary_image`, `subsidiary_toll_number`, `subsidiary_whatsapp_number`, `subsidiary_button1`, `subsidiary_button2`, `status` FROM `subsidiary` WHERE `deleted` = '0'  AND `subsidiary_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiary_image`, `subsidiaryimpact_title`, `subsidiaryimpact_title_hindi`, `subsidiaryimpact_description`, `subsidiaryimpact_description_hindi`, `subsidiary_link`, `status` FROM `subsidiary` WHERE `deleted` = '0'  AND `subsidiary_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $subsidiary_id = $row["subsidiary_id"];
            $subsidiary_title = html_entity_decode(html_entity_decode($row['subsidiary_title']));
            $subsidiary_title_hindi = html_entity_decode($row['subsidiary_title_hindi']);
            $subsidiary_description = html_entity_decode(html_entity_decode($row['subsidiary_description']));
            $subsidiary_description_hindi = html_entity_decode(html_entity_decode($row['subsidiary_description_hindi']));
            $subsidiaryimpact_title = html_entity_decode($row['subsidiaryimpact_title']);
            $subsidiaryimpact_title_hindi = html_entity_decode($row['subsidiaryimpact_title_hindi']);
            $subsidiaryimpact_description = html_entity_decode($row['subsidiaryimpact_description']);
            $subsidiaryimpact_description_hindi = html_entity_decode($row['subsidiaryimpact_description_hindi']);
            $subsidiary_image = $row['subsidiary_image'];
            $subsidiary_link = $row['subsidiary_link'];
            $status = $row["status"];
        endwhile;
    endif;
endif;
?>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
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
                            <input type="hidden" name="hidden_subsidiary_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="subsidiary_title" class="form-label">subsidiary Title<span class="tx-danger"></span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="subsidiary_title" id="subsidiary_title" autocomplete="off" value="<?= $subsidiary_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="subsidiary_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="subsidiary_title_hindi" id="subsidiary_title_hindi" autocomplete="off" value="<?= $subsidiary_title_hindi; ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="subsidiary_description" class="form-label">Description<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="subsidiary_description" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiary_description" id="subsidiary_description" placeholder=""><?= $subsidiary_description; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="subsidiary_description" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiary_description_hindi" id="subsidiary_description_hindi" placeholder=""><?= $subsidiary_description_hindi; ?></textarea>
                                </div>
                            </div>
                        <!-- <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="subsidiaryimpact_title" class="form-label">Subsidiary impact Title<span class="tx-danger"></span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="subsidiaryimpact_title" id="subsidiaryimpact_title" autocomplete="off" value="<?= $subsidiaryimpact_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="subsidiaryimpact_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="subsidiaryimpact_title_hindi" id="subsidiaryimpact_title_hindi" autocomplete="off" value="<?= $subsidiary_title_hindi; ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="subsidiaryimpact_description" class="form-label">Impact Description<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="subsidiaryimpact_description" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiaryimpact_description" id="subsidiaryimpact_description" placeholder=""><?= $subsidiaryimpact_description; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="subsidiaryimpact_description" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="subsidiaryimpact_description_hindi" id="subsidiaryimpact_description_hindi" placeholder=""><?= $subsidiaryimpact_description_hindi; ?></textarea>
                                </div>
                            </div> -->
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="subsidiary_image" class="control-label">subsidiary Image<span class="tx-danger"> *</span></label>
                        </div>
                        <div class="col-md-5">
                            <?php if($subsidiary_image): ?>
                            <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $subsidiary_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="subsidiary_image" id="subsidiary_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                        <div class="col-md-5">
                                <label for="subsidiary_link" class="form-label">Link<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="subsidiary_link" id="subsidiary_link" autocomplete="off"><?= $subsidiary_link; ?></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>