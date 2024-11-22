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

//Insert Operation
if ($save == "save" || $save_close == "save_close") :

    $gef_heading_en = trim(addslashes($_REQUEST['gef_heading_en']));
    $gef_content_en = trim(addslashes($_REQUEST['gef_content_en']));
    $gef_heading_hin = trim(addslashes($_REQUEST['gef_heading_hin']));
    $gef_content_hin = trim(addslashes($_REQUEST['gef_content_hin']));
    $gef_title_eng = trim(addslashes($_REQUEST['gef_title_eng']));
    $gef_title_hin = trim(addslashes($_REQUEST['gef_title_hin']));
    $status = trim(addslashes($_REQUEST['status']));
    // $seo_url = $_REQUEST['seo_url'];
    // $innerpagestatus = $_REQUEST['innerpagestatus']; //value='on' == 1 || value='' == 0

    // if ($innerpagestatus == 'on') :
    //     $gefproject_status = '1';
    // else :
    //     $gefproject_status = '0';
    // endif;
    // $targetDirectory = "../assets/front/innerpages/";

    // // Process image upload (if any)
    // $image = $_FILES["image"]["name"];

    // if (isset($_FILES["image"])) :
    //     $image = $_FILES["image"]["name"];
    //     if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDirectory . $image)) :
    //     endif;
    // else :
    //     $image = "";
    // endif;

    //Insert Query
    $arrFields = array('`gef_heading_en`', '`gef_heading_hin`', '`gef_content_en`', '`gef_content_hin`',  '`gef_title_eng`', '`gef_title_hin`', '`createdby`', '`status`');

    $arrValues = array("$gef_heading_en", "$gef_heading_hin", "$gef_content_en", "$gef_content_hin", "$gef_title_eng", "$gef_title_hin", "$logged_user_id", "$status");
    // print_r($arrFields);
    // print_r($arrValues);
    // exit;
    if (sqlACTIONS("INSERT", "js_gefproject", $arrFields, $arrValues, '')) :

        $innerpage_id = sqlINSERTID_LABEL();

        // if (isset($_FILES["thumbnail_image"]) && isset($_FILES["pdf"])) {
        //     $thumbnail_image = $_FILES["thumbnail_image"]["name"];
        //     $pdf = $_FILES["pdf"]["name"];
        //     if (move_uploaded_file($_FILES["thumbnail_image"]["tmp_name"], $targetDirectory . $thumbnail_image) && (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetDirectory . $pdf))) {
        //         $arrFields = array('`innerpage_ID`', '`innerpage_thumbnail_image`', '`innerpage_pdf_attachment`', '`createdby`', '`status`');
        //         $arrValues = array("$innerpage_id", "$thumbnail_image", "$pdf", "$logged_user_id", "1");
        //         if (!sqlACTIONS("INSERT", "js_innerpage_attachments", $arrFields, $arrValues, '')) {
        //             $err[] = "Unable to Upload the PDF Attachment !!!";
        //         }
        //     } else {
        //         $err[] = "Error uploading thumbnail image: $thumbimage_additional or PDF: $pdf_additional";
        //     }
        // }

        // if (isset($_FILES["thumbimage_additional"]) && isset($_FILES["pdf_additional"])) {

        //     $err = array(); // Array to store errors if any        
        //     // Check if the number of thumbnails and PDFs matches
        //     if (count($_FILES["thumbimage_additional"]["tmp_name"]) != count($_FILES["pdf_additional"]["tmp_name"])) {
        //         $err[] = "Number of thumbnails and PDFs do not match.";
        //     } else {
        //         // Iterate through each pair of thumbnail and PDF
        //         for ($i = 0; $i < count($_FILES["thumbimage_additional"]["tmp_name"]); $i++) {
        //             $thumbimage_additional = $_FILES["thumbimage_additional"]["name"][$i];
        //             $thumbimage_tmp = $_FILES["thumbimage_additional"]["tmp_name"][$i];
        //             $thumbimage_target = $targetDirectory . $thumbimage_additional;

        //             $pdf_additional = $_FILES["pdf_additional"]["name"][$i];
        //             $pdf_tmp = $_FILES["pdf_additional"]["tmp_name"][$i];
        //             $pdf_target = $targetDirectory . $pdf_additional;

        //             // Move thumbnail and PDF to target directory
        //             if (move_uploaded_file($thumbimage_tmp, $thumbimage_target) && move_uploaded_file($pdf_tmp, $pdf_target)) {
        //                 // Insert thumbnail data into the database
        //                 $arrFields = array('`innerpage_ID`', '`innerpage_thumbnail_image`', '`innerpage_pdf_attachment`', '`createdby`', '`status`');
        //                 $arrValues = array("$innerpage_id", "$thumbimage_additional", "$pdf_additional", "$logged_user_id", "1");

        //                 if (!sqlACTIONS("INSERT", "js_innerpage_attachments", $arrFields, $arrValues, '')) {
        //                     $err[] = "Unable to Upload the PDF Attachment !!!";
        //                 }
        //             } else {
        //                 $err[] = "Error uploading thumbnail image: $thumbimage_additional or PDF: $pdf_additional";
        //             }
        //         }
        //     }

        //     if (!empty($err)) {
        //         // Handle errors if any
        //         foreach ($err as $error) {
        //             echo $error . "<br>";
        //         }
        //     }
        // }

        // Redirect
        if (empty($err)) {
            echo "<script type='text/javascript'>window.location = 'gefproject.php?code=1'</script>";
        }
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
                                <?php pageCANCEL($currentpage, $__cancel); ?>
                            </div>
                            <div class="col-9 col-sm-6 text-right">
                                <button type="submit" name="save" value="save" id="save" class="btn btn-success"><?= $__save ?></button>
                                <button type="submit" name="save_close" id="save_close" value="save_close" class="btn btn-success"><?= $__save_close ?></button>
                            </div>
                        </div>

                        <!-- BASIC Starting -->
                        <div id="basic">
                            <div class="divider-text"><?= $__hbasicinfo ?></div>
                            <div class="form-group row">
                                <label for="innerpagestatus" class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="innerpagestatus" id="innerpagestatus" checked="">
                                        <label class="custom-control-label" for="innerpagestatus">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="tender_title" class="form-label">Heading : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="gef_heading_en" id="gef_heading_en">
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="gef_heading_hin" id="gef_heading_hin">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="gef_content_en" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_content_en" id="gef_content_en" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_content_hin" id="gef_content_hin" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="gef_title_eng" class="form-label">Title : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="gef_title_eng" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_title_eng" id="gef_title_eng" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="gef_title_hin" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_title_hin" id="gef_title_hin" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <!-- End of BASIC -->
                    </form>
                </div><!-- row -->
            </div><!-- col -->
            <?php
            $innerpage_sidebar_view_type = 'create';
            include viewpath('__innerpagesidebar.php');
            ?>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- content -->