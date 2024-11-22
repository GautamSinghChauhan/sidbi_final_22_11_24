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
if (isset($update) && $update == "update" && $hidden_cipos_id != '') {

    $title_eng = $validation_globalclass->sanitize(($_POST['title_eng']));
    $title_hindi = $validation_globalclass->sanitize(($_POST['title_hindi']));
    $title = $validation_globalclass->sanitize(($_POST['title']));
    $year = $validation_globalclass->sanitize(($_POST['year']));
    $status = isset($_POST['status']) ? 1 : 0;

    $arrFields = array('`title_eng`', '`title_hindi`', '`year`', '`createdby`', '`status`');

    $arrValues = array("$title_eng", "$title_hindi", "$year", "$logged_user_id", "$status");

    $sqlWhere = " `cipos_id` = '$hidden_cipos_id' ";

    if (sqlACTIONS("UPDATE", "cipos_orders", $arrFields, $arrValues, $sqlWhere))
    $cipos_id = $hidden_cipos_id;

    //Update Query
    $arrFields_translations = array('`cipos_id`', '`language_id`', '`title`','`createdby`', '`status`');

    $arrValues_translations = array("$hidden_cipos_id", "2", "$title", "$logged_user_id", "$status");

    $sqlWhere_translations = " cipos_orders = $hidden_cipos_id ";

    if (sqlACTIONS("UPDATE", "cipos_order_translations", $arrFields_translations, $arrValues_translations, $sqlWhere_translations)) :
    endif;
    {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'cpios.php?code=1'
        </script>
<?php

    }
}

if ($route == 'edit') :
    $list_datas = sqlQUERY_LABEL("SELECT `title_eng`, `title_hindi`, `year`, `status` FROM `cipos_orders` WHERE `deleted` = '0'  AND `cipos_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $cipos_id = $row["cipos_id"];
            $title_eng = $row['title_eng'];
            $title_hindi = $row['title_hindi'];
            $title_hindi = $row['title_hindi'];
            $year = $row['year'];
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
                            <input type="hidden" name="hidden_cipos_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title_eng" class="col-sm-2 col-form-label">English Title<span class="tx-danger"> *</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="title_eng" id="title_eng" placeholder="Enter English Title" required data-parsley-trigger="keyup" autocomplete="off" value="<?= $title_eng ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title_hindi" class="col-sm-2 col-form-label">Hindi Title<span class="tx-danger"> *</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="title_hindi" id="title_hindi" placeholder="Enter Hindi Title" data-parsley-trigger="keyup" autocomplete="off" value="<?= $title_hindi ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Year<span class="tx-danger"> *</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="year" id="year" placeholder="Year" data-parsley-trigger="keyup" autocomplete="off" value="<?= $year ?>" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>