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

//Insert Operation
if ($save == "update") :

    $menu_for = $validation_globalclass->sanitize($_REQUEST['menu_for']);
    $parentSelect = $validation_globalclass->sanitize($_REQUEST['parentSelect']);
    $menu_english_title = $validation_globalclass->sanitize($_REQUEST['menu_english_title']);
    $menu_hindi_title = $validation_globalclass->sanitize($_REQUEST['menu_hindi_title']);
    $seo_url = $_REQUEST['seo_url'];

    $status = $_REQUEST['menusstatus']; //value='on' == 1 || value='' == 0

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



    $arrFields = array('`parent_id`', '`menu_for`', '`menu_type`', '`menu_english_title`', '`menu_hindi_title`', '`seo_url`', '`createdby`', '`status`');

    $arrValues = array("$parent_ID", "$menu_for", "$menutype", "$menu_english_title", "$menu_hindi_title", "$seo_url", "$logged_user_id", "$status");

    $sqlWhere = " `menu_ID` = '$id' ";

    if (sqlACTIONS("UPDATE", "js_megamenu", $arrFields, $arrValues, $sqlWhere)) :

        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
?>
        <script type="text/javascript">
            window.location = 'menus.php'
        </script>
<?php
        //header("Location:menus.php?code=1");
        exit();
    else :

        $err[] =  "Unable to Update Record";
    endif;
endif;

if ($route == 'edit') {

    $list_datas = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title`, `seo_url`, `status` FROM `js_megamenu` where deleted = '0' and `menu_ID` = '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
        $menu_ID = $row["menu_ID"];
        $parent_id = $row['parent_id'];
        $menu_for = $row['menu_for'];
        $menu_type = $row['menu_type'];
        $menu_english_title = html_entity_decode($row['menu_english_title']);
        $menu_hindi_title = html_entity_decode($row['menu_hindi_title']);
        $seo_url = html_entity_decode($row['seo_url']);
        $status = $row["status"];
    }
}
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
                                <button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
                                <input type="hidden" name="hidden_menu_ID" value="<?php echo $menu_ID; ?>" />
                            </div>
                        </div>

                        <!-- BASIC Starting -->
                        <div id="basic">
                            <div class="divider-text"><?php echo $__hbasicinfo ?></div>
                            <div class="form-group row">
                                <label for="menusstatus" class="col-sm-2 col-form-label"><?php echo $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="menusstatus" id="menusstatus" <?php if ($status == '1') :
                                                                                                                                    echo 'checked=""';
                                                                                                                                endif; ?>>
                                        <label class="custom-control-label" for="menusstatus">Yes</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menu_for">Menu for</label>
                                        <select class="form-control" name="menu_for" id="menu_for" readonly>
                                            <?php echo getMENU_DETAILS($menu_for, 'select_menu_for'); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Parent Menu</label>
                                <div class="row">
                                    <div class="col-md-3 mt-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" onclick="hideParentDropdown();" name="parent" class="custom-control-input" id="parent1" disabled <?php if ($parent_id == '0') : ?> checked <?php endif; ?>>
                                            <label class="custom-control-label" for="parent1">Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3  mt-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" onclick="showParentDropdown();" name="parent" class="custom-control-input" id="parent0" disabled <?php if ($parent_id != '0') : ?> checked <?php endif; ?>>
                                            <label class="custom-control-label" for="parent0">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Parent Menu Title</label>
                                        <input type="text" class="form-control" value="<?php echo get_PARENT_MENU_TITLE($parent_id, 'label_parent_megamenu'); ?>" readonly>
                                    </div>

                                </div>
                                <!-- Dropdown to show/hide -->
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
                                        <input type="text" id="menu_english_title" name="menu_english_title" class="form-control" required placeholder="Enter Title Name in English" value="<?php echo $menu_english_title; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>Child Menu Title (Hindi)</label>
                                        <input type="text" id="menu_hindi_title" name="menu_hindi_title" class="form-control" required placeholder="Enter Title Name in Hindi" value="<?php echo $menu_hindi_title; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label>SEO (URL):</label>
                                        <input type="text" class="form-control" name="seo_url" id="seo_url" readonly value="<?php echo $seo_url; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div><!-- row -->
        </div><!-- col -->
        <?php
        $menus_sidebar_view_type = 'create';
        include viewpath('__menussidebar.php');
        ?>

    </div><!-- row -->
</div><!-- container -->
</div><!-- content -->
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