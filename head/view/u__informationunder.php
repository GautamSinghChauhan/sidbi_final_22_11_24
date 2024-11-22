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
if (isset($update) && $update == "update" && $hidden_informationunder_id != '') {
    $informationunder_provision = ($_POST['informationunder_provision']);
    $informationunder_provision_hindi = ($_POST['informationunder_provision_hindi']);
    $informationunder_detail = ($_POST['informationunder_detail']);
    $informationunder_detail_hindi = ($_POST['informationunder_detail_hindi']);
    $informationunder_sno = ($_POST['informationunder_sno']);


    if ($informationunder_image_move_file) :

        $arrFields = array('`informationunder_provision`', '`informationunder_provision_hindi`', '`informationunder_detail`',  '`informationunder_detail_hindi`', '`informationunder_sno`', '`createdby`', '`status`');

        $arrValues = array("$informationunder_provision", "$informationunder_provision_hindi", "$informationunder_detail", "$informationunder_detail_hindi", "$informationunder_sno", "$logged_user_id", "$status");

    else :

        $arrFields = array('`informationunder_provision`', '`informationunder_provision_hindi`', '`informationunder_detail`', '`informationunder_detail_hindi`', '`informationunder_sno`', '`createdby`', '`status`');

        $arrValues = array("$informationunder_provision", "$informationunder_provision_hindi", "$informationunder_detail", "$informationunder_detail_hindi", "$informationunder_sno", "$logged_user_id", "$status");

    endif;

    $sqlWhere = " `informationunder_id` = '$hidden_informationunder_id' ";

    if (sqlACTIONS("UPDATE", "informationunder", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'informationunder.php?code=1'
        </script>
<?php

        if (isset($_FILES["informationunder_image"])) {
            if (move_uploaded_file($_FILES["informationunder_image"]["tmp_name"], $targetFilePath)) {
                echo "MOVED";

                // Redirect after successful update
                header("Location: informationunder.php?code=1");
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
    // echo "SELECT `informationunder_provision`, `informationunder_provision_hindi`, `informationunder_detail`, `informationunder_detail_hindi`, `informationunder_image`, `informationunder_toll_number`, `informationunder_whatsapp_number`, `informationunder_button1`, `informationunder_button2`, `status` FROM `informationunder` WHERE `deleted` = '0'  AND `informationunder_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `informationunder_provision`, `informationunder_provision_hindi`, `informationunder_detail`, `informationunder_detail_hindi`, `informationunder_sno`, `status` FROM `informationunder` WHERE `deleted` = '0'  AND `informationunder_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $informationunder_id = $row["informationunder_id"];
            $informationunder_provision = (html_entity_decode($row['informationunder_provision']));
            $informationunder_provision_hindi = html_entity_decode($row['informationunder_provision_hindi']);
            $informationunder_detail = (html_entity_decode($row['informationunder_detail']));
            $informationunder_detail_hindi = (html_entity_decode($row['informationunder_detail_hindi']));
            $informationunder_sno = (html_entity_decode($row['informationunder_sno']));
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
                            <input type="hidden" name="hidden_informationunder_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="informationunder_sno" class="form-label">Sno<span class="tx-danger"></span></label>
                            </div>
                            <div class="col-md-5">
                                <label for="informationunder_sno" class="form-label">In English<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="informationunder_sno" id="informationunder_sno" placeholder=""><?= $informationunder_sno; ?></textarea>
                            </div>
                           
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="informationunder_provision" class="form-label">Provision<span class="tx-danger"></span></label>
                            </div>
                            <div class="col-md-5">
                                <label for="informationunder_provision" class="form-label">In English<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="informationunder_provision" id="informationunder_provision" placeholder=""><?= $informationunder_provision; ?></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="informationunder_provision" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="informationunder_provision_hindi" id="informationunder_provision_hindi" placeholder=""><?= $informationunder_provision_hindi; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="informationunder_detail" class="form-label">Detail<span class="tx-danger"></span></label>
                            </div>
                            <div class="col-md-5">
                                <label for="informationunder_detail" class="form-label">In English<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="informationunder_detail" id="informationunder_detail" placeholder=""><?= $informationunder_detail; ?></textarea>
                            </div>
                            <div class="col-md-5">
                                <label for="informationunder_detail" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <textarea type="text" class="form-control" name="informationunder_detail_hindi" id="informationunder_detail_hindi" placeholder=""><?= $informationunder_detail_hindi; ?></textarea>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>