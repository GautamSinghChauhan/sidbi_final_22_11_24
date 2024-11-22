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
if (isset($update) && $update == "update" && $hidden_micro_finance_id_id != '') {
	$micro_fince_description = ($_REQUEST['micro_finance_descrption']);
	$micro_fince_description_hindi = ($_REQUEST['micro_finance_hindi_description']);


	$micro_fince_description = htmlentities($micro_fince_description);
	$micro_fince_description_hindi = htmlentities($micro_fince_description_hindi);


 

	$arrFields = array('`micro_finance_descrption`', '`micro_finance_hindi_description`',  '`createdby`', '`status`');

	$arrValues = array("$micro_fince_description", "$micro_fince_description_hindi", "$logged_user_id", "$status");


    



    $sqlWhere = " `micro_finance_id` = '$hidden_micro_finance_id_id' ";

    if (sqlACTIONS("UPDATE", "js_microfinance", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

?>
        <script type="text/javascript">
            window.location = 'microfince.php?code=1'
        </script>
<?php

}
}
if ($route == 'edit') :
    // echo "SELECT `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiary_image`, `subsidiary_toll_number`, `subsidiary_whatsapp_number`, `subsidiary_button1`, `subsidiary_button2`, `status` FROM `subsidiary` WHERE `deleted` = '0'  AND `subsidiary_id` = '$id'";
    $list_datas = sqlQUERY_LABEL("SELECT `micro_finance_id`, `micro_finance_descrption`, `micro_finance_hindi_description`, `status` FROM `js_microfinance` WHERE `deleted` = '0'  AND `micro_finance_id` = '$id'") or die("Unable to get records: " . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    if ($check_record_availabity > 0) :
        while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
            $micro_finance_id = $row["micro_finance_id"];
            $micro_finance_descrption = html_entity_decode(html_entity_decode($row['micro_finance_descrption']));
            $micro_finance_hindi_description = html_entity_decode($row['micro_finance_hindi_description']);
    
        
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
                            <input type="hidden" name="hidden_micro_finance_id_id" value="<?= $id; ?>" />
                            <div class="col-sm-7">
                                <div class="col-form-label custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                    <label class="custom-control-label" for="status">Yes</label>
                                </div>
                            </div>
                        </div>
<!-- 
                        <div class="form-group row align-items-end">
                            <div class="col-md-2">
                                <label for="subsidiary_title" class="form-label">Msme pulseTitle<span class="tx-danger"></span></label>
                            </div>

                            <div class="col-md-5">
                                <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="msme_title" id="msme_title" autocomplete="off" value="<?= $msme_title; ?>" />
                            </div>
                            <div class="col-md-5">
                                <label for="msme_title_hindi" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                <input type="text" class="form-control" name="msme_title_hindi" id="msme_title_hindi" autocomplete="off" value="<?= $msme_hindi_title; ?>" />
                            </div>
                        </div> -->

                        <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="micro_fince_description" class="form-label"> Micro Fince Description<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="micro_fince_description" id="micro_fince_description" placeholder="" value="<?= $micro_finance_descrption; ?>"></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="micro_fince_description_hindi" id="micro_fince_description_hindi" placeholder="" value="<?= $micro_finance_hindi_description; ?>"></textarea>
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
                    <!-- <div class="form-group row">
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
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>