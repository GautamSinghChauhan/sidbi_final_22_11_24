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
if (isset($update) && $update == "update" && $hidden_kyctable_id != '') {
    $kyctable_feature = ($_POST['kyctable_feature']);
    $kyctable_feature_hindi = ($_POST['kyctable_feature_hindi']);
    $kyctable_notice = ($_POST['kyctable_notice']);
    $kyctable_notice_hindi = ($_POST['kyctable_notice_hindi']);


    if ($kyctable_image_move_file) :

        $arrFields = array('`kyctable_feature`', '`kyctable_feature_hindi`', '`kyctable_notice`',  '`kyctable_notice_hindi`', '`createdby`', '`status`');

        $arrValues = array("$kyctable_feature", "$kyctable_feature_hindi", "$kyctable_notice", "$kyctable_notice_hindi",  "$logged_user_id", "$status");

    else :

        $arrFields = array('`kyctable_feature`', '`kyctable_feature_hindi`', '`kyctable_notice`', '`kyctable_notice_hindi`', '`createdby`', '`status`');

        $arrValues = array("$kyctable_feature", "$kyctable_feature_hindi", "$kyctable_notice", "$kyctable_notice_hindi", "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `kyctable_id` = '$hidden_kyctable_id' ";

    if (sqlACTIONS("UPDATE", "kyctable", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'kyctable.php?code=1'
        </script>
<?php

        if (isset($_FILES["kyctable_image"])) {
            if (move_uploaded_file($_FILES["kyctable_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: kyctable.php?code=1");
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
    // echo "SELECT `kyctable_feature`, `kyctable_feature_hindi`, `kyctable_notice`, `kyctable_notice_hindi`, `kyctable_image`, `kyctable_toll_number`, `kyctable_whatsapp_number`, `kyctable_button1`, `kyctable_button2`, `status` FROM `kyctable` WHERE `deleted` = '0'  AND `kyctable_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `kyctable_feature`, `kyctable_feature_hindi`, `kyctable_notice`, `kyctable_notice_hindi`,`status` FROM `kyctable` WHERE `deleted` = '0'  AND `kyctable_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $kyctable_id = $row["kyctable_id"];
            $kyctable_feature = (html_entity_decode($row['kyctable_feature']));
            $kyctable_feature_hindi = html_entity_decode($row['kyctable_feature_hindi']);
            $kyctable_notice = (html_entity_decode($row['kyctable_notice']));
            $kyctable_notice_hindi = (html_entity_decode($row['kyctable_notice_hindi']));
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
                            <input type="hidden" name="hidden_kyctable_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="kyctable_feature" class="form-label">Description<span class="tx-danger"></span></label>
                            </div>
                            <div class="col-md-5">
                                <label for="kyctable_feature" class="form-label">In English<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="kyctable_feature" id="kyctable_feature" placeholder=""><?= $kyctable_feature; ?></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="kyctable_feature" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="kyctable_feature_hindi" id="kyctable_feature_hindi" placeholder=""><?= $kyctable_feature_hindi; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="kyctable_notice" class="form-label">Description<span class="tx-danger"></span></label>
                            </div>
                            <div class="col-md-5">
                                <label for="kyctable_notice" class="form-label">In English<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="kyctable_notice" id="kyctable_notice" placeholder=""><?= $kyctable_notice; ?></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="kyctable_notice" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="kyctable_notice_hindi" id="kyctable_notice_hindi" placeholder=""><?= $kyctable_notice_hindi; ?></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>