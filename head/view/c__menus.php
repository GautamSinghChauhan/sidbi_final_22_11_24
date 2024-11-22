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
if ($save == "save" || $save_close == "save_close") {

    $menu_for = $validation_globalclass->sanitize($_REQUEST['menu_for']);
    $parentSelect = $validation_globalclass->sanitize($_REQUEST['parentSelect']);

    $menu_english_title = $validation_globalclass->sanitize($_REQUEST['menu_english_title']);
    $menu_hindi_title = $validation_globalclass->sanitize($_REQUEST['menu_hindi_title']);
    $seo_url = $_REQUEST['seo_url'];

    $status = $_REQUEST['status']; //value='on' == 1 || value='' == 0

    if ($status == 'on') {
        $status = '1';
    } else {
        $status = '0';
    }

    //Insert query
    if ($parent == '1') {
        $parent_ID = 0;
        $menutype = 1;
    } else {
        $menutype = 2;
        $parent_ID = $parentSelect;
    }



    $arrFields = array('`parent_id`', '`menu_for`', '`menu_type`', '`menu_english_title`', '`menu_hindi_title`', '`seo_url`','`createdby`', '`status`');

    $arrValues = array("$parent_ID", "$menu_for", "$menutype", "$menu_english_title", "$menu_hindi_title", "$seo_url" ,"$logged_user_id", "$status");

    // print_r($arrFields);
    // print_r($arrValues);
    // exit;
    if (sqlACTIONS("INSERT", "js_megamenu", $arrFields, $arrValues, '')) {
    
        echo "<script type='text/javascript'>window.location = 'menus.php?code=1'</script>";
        exit();
    } else {

        $err[] =  "Unable to Insert Record";
    }
}
?>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
            <div class="col-lg-10">
                <div class="mg-b-25">

                    <form method="post" enctype="multipart/form-data" data-parsley-validate>

                        <div id="stick-here"></div>
                        <div id="stickThis" class="form-group row mg-b-0">
                            <div class="col-3 col-sm-6">
                                <?php pageCANCEL($currentpage, $__cancel); ?>
                            </div>
                            <div class="col-9 col-sm-6 text-right">
                                <button type="submit" name="save" value="save" class="btn btn-success"><?php echo $__save ?></button>
                                <button type="submit" name="save_close" value="save_close" class="btn btn-success"><?php echo $__save_close ?></< /button>
                            </div>
                        </div>

                        <!-- BASIC Starting -->
                        <div id="basic">
                            <div class="divider-text"><?php echo $__hbasicinfo ?></div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 mg-l-35 col-form-label"><?php echo $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="custom-control custom-switch mg-t-10">
                                        <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                        <label class="custom-control-label" for="status">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menu_for">Menu for</label>
                                        <select class="form-control" name="menu_for" id="menu_for" onchange="show_parent();">
                                            <?php echo getMENU_DETAILS($menu_for, 'select_menu_for'); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Parent Menu</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" onclick="hideParentDropdown();" name="parent" class="custom-control-input" id="parent1" value="1">
                                            <label class="custom-control-label" for="parent1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" onclick="showParentDropdown();" name="parent" class="custom-control-input" id="parent0" value="0">
                                            <label class="custom-control-label" for="parent0">No</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dropdown to show/hide -->
                                <div id="parentDropdown" style="display: none; margin-top: 15px;">
                                    <label for="parentSelect">Select Parent</label>
                                    <select class="" name="parentSelect" id="parentSelect">
                                        <!-- Your dropdown options go here -->

                                    </select>
                                </div>
                            </div>

                            <script>
                                function showParentDropdown() {
                                    document.getElementById('parentDropdown').style.display = 'block';
                                }

                                function hideParentDropdown() {
                                    document.getElementById('parentDropdown').style.display = 'none';
                                }
                            </script>

                            <div class="row mt-4">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Child Menu Title (English)</label>
                                        <input type="text" id="menu_english_title" name="menu_english_title" class="form-control" required placeholder="Enter Title Name in English">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Child Menu Title (Hindi)</label>
                                        <input type="text" id="menu_hindi_title" name="menu_hindi_title" class="form-control" required placeholder="Enter Title Name in Hindi">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>SEO (URL):</label>
                                        <input type="text" class="form-control" name="seo_url" id="seo_url" readonly>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <!-- End of BASIC -->

        </div><!-- row -->
    </div><!-- col -->

    <?php
    //$brand_sidebar_view_type='create';
    //include viewpath('__brandsidebar.php'); 
    ?>

</div><!-- row -->
<script>
    function show_parent() {
        var parentSelect = $('#parentSelect').selectize()[0].selectize;
        var menu_for = $('#menu_for').val();

        // Get the response from the server.
        $.ajax({
            url: 'engine/ajax/ajax_parent.php?type=show&menu_ID=' + menu_for,
            type: "GET",
            success: function(response) {
                // Parse the response as JSON if needed
                // response = JSON.parse(response);
                // Clear existing options
                parentSelect.clearOptions();

                // Add new options
                parentSelect.addOption(response);

                // If $parentSelect is defined, set the value
                <?php if ($parentSelect) : ?>
                    parentSelect.setValue('<?= $parentSelect; ?>');
                <?php endif; ?>
            }
        });
    }
</script>