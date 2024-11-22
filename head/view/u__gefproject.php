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
//Update Operation
if ($save == "update" && $hidden_gef_id != '') {
    $gef_heading_en = trim(addslashes($_REQUEST['gef_heading_en']));
    $gef_heading_hin = trim(addslashes($_REQUEST['gef_heading_hin']));

    $gef_content_en = trim(addslashes($_REQUEST['gef_content_en']));
    $gef_content_hin = trim(addslashes($_REQUEST['gef_content_hin']));

    $gef_title_eng = trim(addslashes($_REQUEST['gef_title_eng']));
    $gef_title_hin = trim(addslashes($_REQUEST['gef_title_hin']));
    // $seo_url = $_REQUEST['seo_url'];
    $status = $_REQUEST['status'];

    if ($status == 'on'):
        $gef_status = '1';
    else:
        $gef_status = '0';
    endif;
}

// Insert or update query
$arrFields = array('`gef_heading_en`', '`gef_heading_hin`', '`gef_content_en`', '`gef_content_hin`',  '`gef_title_eng`', '`gef_title_hin`', '`createdby`', '`status`');

$arrValues = array("$gef_heading_en", "$gef_heading_hin", "$gef_content_en", "$gef_content_hin", "$gef_title_eng","$gef_title_hin", "$logged_user_id", "1");

$sqlWhere = " `gef_id` = '$hidden_gef_id' ";

if (sqlACTIONS("UPDATE", "js_gefproject", $arrFields, $arrValues, $sqlWhere)) {
    echo "<script type='text/javascript'>window.location = 'gefproject.php?code=1'</script>";

 }
// }
// }

if ($route == 'edit') :

    $list_datas = sqlQUERY_LABEL("SELECT `gef_id`, `gef_heading_en`, `gef_heading_hin`, `gef_content_en`, `gef_content_hin`, `gef_title_eng`, `gef_title_hin`, `status` FROM `js_gefproject` WHERE `deleted` = '0' AND `status` = '1' and `gef_id` = '$id'") or die("Unable to get records:" . sqlERROR_LABEL());
    $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);

    while ($row = sqlFETCHARRAY_LABEL($list_datas)) :
        $gef_id = $row["gef_id"];
        $gef_heading_en = $row["gef_heading_en"];
        $gef_heading_hin = $row['gef_heading_hin'];
        $gef_content_en = htmlspecialchars_decode($row['gef_content_en']);
        $gef_content_hin = htmlspecialchars_decode($row['gef_content_hin']);
        $gef_title_eng = $row['gef_title_eng'];
        $gef_title_hin = $row["gef_title_hin"];
        $status = $row["status"];
    endwhile;
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
                                <div class="col-3 col-sm-6">
                                    <a href="gefproject.php" class="btn btn-secondary" type="cancel">Cancel</a>
                                </div>
                            </div>
                            <div class="col-9 col-sm-6 text-right">
                                <button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
                                <input type="hidden" name="hidden_gef_id" value="<?php echo $gef_id; ?>" />
                            </div>
                        </div>

                        <!-- BASIC Starting -->
                        <div id="basic">
                            <div class="divider-text"><?= $__hbasicinfo ?></div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label"><?= $__active ?></label>
                                <div class="col-sm-7">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
                                        <label class="custom-control-label" for="status">Yes</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row align-items-end">
                                <div class="col-md-2">
                                    <label for="tender_title" class="form-label">Heading : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="gef_heading_en" id="gef_heading_en" value="<?= $gef_heading_en; ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" name="gef_heading_hin" id="gef_heading_hin" value="<?= $gef_heading_hin; ?>">
                                </div>
                            </div>
                         

                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="gef_content_en" class="form-label">Content : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_content_en" id="gef_content_en" placeholder=""><?= $gef_content_en; ?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="overview_title" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_content_hin" id="gef_content_hin" placeholder=""><?= $gef_content_hin; ?></textarea>
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-md-2">
                                    <label for="gef_title_eng" class="form-label">Title : <span class="tx-danger">*</span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="gef_title_eng" class="form-label">In English<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_title_eng" id="gef_title_eng" placeholder=""><?= $gef_title_eng?></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="gef_title_hin" class="form-label">In Hindi<span class="tx-danger">*</span></label>
                                    <textarea type="text" class="form-control" name="gef_title_hin" id="gef_title_hin" placeholder=""><?= $gef_title_hin?></textarea>
                                </div>
                            </div>
                        </div>
                       
                </div>
            </div>
        </div>
        </tbody>
        </table>
    </div>
</div>
</form>
</div><!-- row -->
</div><!-- col -->
<?php
// $js_innerpage_sidebar_view_type = 'create';
// include viewpath('__js_innerpagesidebar.php');
?>