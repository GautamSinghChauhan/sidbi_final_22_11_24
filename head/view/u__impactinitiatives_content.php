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
if (isset($update) && $update == "update" && $hidden_impact_id != '') {
    $impactinitiatives_title = $validation_globalclass->sanitize(ucwords($_REQUEST['impactinitiatives_title']));
    $impactinitiatives_hindi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['impactinitiatives_hindi_title']));
    $impactinitiatives_description = $validation_globalclass->sanitize(ucwords($_REQUEST['impactinitiatives_description']));
    $impactinitiatives_description_hindi = $validation_globalclass->sanitize(ucwords($_REQUEST['impactinitiatives_description_hindi']));
    $impactinitiatives_button1 = $validation_globalclass->sanitize(ucwords($_REQUEST['impactinitiatives_button1']));

    $impactinitiatives_status = isset($_POST['impactinitiatives_status']) ? 1 : 0;

    if (isset($_FILES['impactinitiatives_image']['name'])) :
        $upload_dir = '../assets/front/home/';
        $impactinitiatives_image_fileName = $_FILES["impactinitiatives_image"]["name"];
        $fileInfo = pathinfo($impactinitiatives_image_fileName);
        $impactinitiatives_image_fileExtension = $fileInfo["extension"];
        $file_type = $_FILES['impactinitiatives_image']['type'];
        $impactinitiatives_image_file_name = $impactinitiatives_image_fileName;
        $file_temp_loc  = $_FILES['impactinitiatives_image']['tmp_name'];
        $file_error_msg = $_FILES['impactinitiatives_image']['error'];
        $file_size = $_FILES['impactinitiatives_image']['size'];
        $impactinitiatives_image_move_file = move_uploaded_file($file_temp_loc, $upload_dir . $impactinitiatives_image_file_name);
    endif;

    if ($impactinitiatives_image_move_file) :
        // Update Query
        $arrFields = array('`impactinitiatives_title`', '`impactinitiatives_hindi_title`', '`impactinitiatives_description`', '`impactinitiatives_description_hindi`', '`impactinitiatives_button1`', '`impactinitiatives_image`', '`createdby`', '`status`');

        $arrValues = array("$impactinitiatives_title", "$impactinitiatives_hindi_title", "$impactinitiatives_description", "$impactinitiatives_description_hindi", "$impactinitiatives_button1", "$impactinitiatives_image_file_name", "$logged_user_id", "$impactinitiatives_status");

    else :
        // Update Query
        $arrFields = array('`impactinitiatives_title`', '`impactinitiatives_hindi_title`', '`impactinitiatives_description`', '`impactinitiatives_description_hindi`', '`impactinitiatives_button1`', '`createdby`', '`status`');

        $arrValues = array("$impactinitiatives_title", "$impactinitiatives_hindi_title", "$impactinitiatives_description", "$impactinitiatives_description_hindi", "$impactinitiatives_button1", "$logged_user_id", "$impactinitiatives_status");

    endif;

    $sqlWhere = " `impact_id` = '$hidden_impact_id' ";

    if (sqlACTIONS("UPDATE", "js_impact_initiatives", $arrFields, $arrValues, $sqlWhere)) {

        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?> <script type="text/javascript">
            window.location = 'impactinitiatives_content.php?code=1'
        </script>
<?php
    } else {
        $err[] = "Unable to Update Record";
    }
}

if ($route == 'edit') :
    $list_datas = sqlQUERY_LABEL("SELECT `impact_id`, `impactinitiatives_title`, `impactinitiatives_hindi_title`, `impactinitiatives_description`, `impactinitiatives_description_hindi`, `impactinitiatives_button1`, `impactinitiatives_image` FROM `js_impact_initiatives` WHERE `deleted` = '0'  AND `impact_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $impact_id = $row["impact_id"];
            $impactinitiatives_title = $row['impactinitiatives_title'];
            $impactinitiatives_hindi_title = $row['impactinitiatives_hindi_title'];
            $impactinitiatives_description = $row['impactinitiatives_description'];
            $impactinitiatives_image = $row['impactinitiatives_image'];
            $impactinitiatives_description_hindi = $row['impactinitiatives_description_hindi'];
            $impactinitiatives_button1 = $row['impactinitiatives_button1'];
            $impactinitiatives_status = $row["impactinitiatives_status"];
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
                            <label for="impactinitiatives_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
                            <input type="hidden" name="hidden_impact_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="impactinitiatives_status" id="impactinitiatives_status" checked="">
                                    <label class="custom-control-label" for="impactinitiatives_status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="impactinitiatives_title" class="form-label">Impact Initiavtives Title<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="impactinitiatives_title" id="impactinitiatives_title" required autocomplete="off" value="<?= $impactinitiatives_title ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="impactinitiatives_hindi_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <input type="text" class="form-control" name="impactinitiatives_hindi_title" id="impactinitiatives_hindi_title" required autocomplete="off" value="<?= $impactinitiatives_hindi_title ?>" />
                            </div>
                        </div>

                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="impactinitiatives_description" class="form-label">Impact Initiatives Discription<span class="tx-danger">*</span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="impactinitiatives_description" class="form-label">In English<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="impactinitiatives_description" id="impactinitiatives_description" required autocomplete="off"><?= $impactinitiatives_description ?></textarea>
                            </div>
                            <div class=" col-md-5">
                                <label for="impactinitiatives_description_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                <textarea type="text" class="form-control" name="impactinitiatives_description_hindi" id="impactinitiatives_description_hindi" required autocomplete="off"><?= $impactinitiatives_description_hindi ?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-2">
                            <label for="home_description" class="form-label">Button Label<span class="tx-danger"></span></label>
                        </div>
                        <div class="col-md-5">
                            <label for="impactinitiatives_button1" class="form-label"><span class="tx-danger"></span></label>
                            <input type="num" class="form-control" name="impactinitiatives_button1" id="impactinitiatives_button1" required autocomplete="off" value="<?= $impactinitiatives_button1 ?>"></input>
                        </div>
                        <div class="col-md-5">
                            <label for="impactinitiatives_image" class="control-label">Impact Initiative Image<span class="tx-danger"> *</span></label>
                            <?php if ($impactinitiatives_image) : ?>
                                <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $impactinitiatives_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="impactinitiatives_image" id="impactinitiatives_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                    </div>
<!-- 
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="impactinitiatives_image" class="control-label">Impact Initiative Image<span class="tx-danger"> *</span></label>
                            <?php if ($impactinitiatives_image) : ?>
                                <a class="text-white badge badge-warning float-right" target="_blank" href="../assets/front/home/<?= $impactinitiatives_image; ?>">View</a>
                            <?php endif; ?>
                            <input class="form-control form-control-sm" name="impactinitiatives_image" id="impactinitiatives_image" type="file" autocomplete="off">
                            <small class="text-danger">Allowed format JPG, JPEG, PNG, PDF, DOCX. Max file size 2 MB.</small>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
</div>
</form>
</div><!-- row -->
</div><!-- col -->
<?php
// $js_innerpage_sidebar_view_type = 'create';
// include viewpath('__js_innerpagesidebar.php');
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- content -->