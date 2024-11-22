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

$date_title = '"' . ($since_from) . ' - ' . ($since_to) . '"';

if ($name != '' && $name != '0') :
    $filter_by_name = " `name` = '$name' and";
endif;

if ($email != '' && $email != '0') :
    $filter_by_email = " `email` = '$email' and";
endif;

if ($mobilenumber != '' && $mobilenumber != '0') :
    $filter_by_mobile = " `mobile_number` = '$mobilenumber' and";
endif;

if ($since_from != '' && $since_to != '') {
    $since_from = dateformat_database($since_from);
    $since_to = dateformat_database($since_to);
    $filter_date = " DATE(`createdon`) between '$since_from' and '$since_to' and ";
}

$select_enquiry_data = sqlQUERY_LABEL("SELECT `enquiryform_ID`, `name`, `mobile_number`, `location`, `need_for`, `qunatumofassitancesought`, `description`, `email`, `createdon`,`updatedon`, `status` FROM `js_enquiryform` WHERE `deleted` = '0' and `enquiryform_ID`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($select_enquiry_data)) :
    $enquiryform_ID = $row["enquiryform_ID"];
    $name = $row["name"];
    $mobile_number = $row["mobile_number"];
    $location = $row["location"];
    $need_for = getENQUIRYFORM_NEEDFOR_LIST($row["need_for"], 'label');
    $qunatumofassitancesought = $row["qunatumofassitancesought"];
    $description = $row["description"];
    $email = $row["email"];
    $createdon = dateformat_datepicker($row["createdon"]);
    $status = $row["status"];
    if ($status = "1") :
        $status_label = "Active";
    else :
        $status_label = "In-Active";
    endif;
endwhile;

?>
<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
            <?php if ($route == '' && $formtype == '') : ?>
                <div class="col-lg-12 d-none">
                    <form action="" method="get">
                        <div class="card mg-md-b-20" id="filter_content" style="display:none">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12 ml-auto">
                                        <label for="filter_by_name" class="mg-b-0">Filter Production Unit</label>
                                        <select name="filter_by_name" id="filter_by_name" class="form-control" style="width:315px;">
                                            <?= getENQUIRYFORM_DETAILS($name, 'get_name_in_select'); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-12 ml-auto">
                                        <label for="production_unit" class="mg-b-0">Filter Production Unit</label>
                                        <select name="production_unit" id="production_unit" class="form-control" style="width:315px;">
                                            <?= getENQUIRYFORM_DETAILS($email, 'get_email_in_select'); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-12 ml-auto">
                                        <label for="production_unit" class="mg-b-0">Filter Production Unit</label>
                                        <select name="production_unit" id="production_unit" class="form-control" style="width:315px;">
                                            <?= getENQUIRYFORM_DETAILS($mobilenumber, 'get_mobile_in_select'); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 ml-auto">
                                        <label for="fy_from_date" class="mg-b-0">From Date</label>
                                        <div class="input-group mg-md-b-10">
                                            <input type="text" class="form-control" placeholder="DD/MM/YYYY" aria-label="Recipient's username" aria-describedby="basic-addon2" name="from_monthandyear" id="from_monthandyear" value="<?= $fy_from_date; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-12">
                                        <label for="fy_from_date" class="mg-b-0">To Date</label>
                                        <div class="input-group mg-md-b-10">
                                            <input type="text" class="form-control" placeholder="DD/MM/YYYY" aria-label="Recipient's username" aria-describedby="basic-addon2" name="to_monthandyear" id="to_monthandyear" value="<?= $fy_to_date; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mg-md-t-20 text-left col-md-3">
                                        <button type="submit" class="btn btn-info">Apply Filter</button>
                                        <a href="enquiries.php" class="btn btn-light">Clear</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12">
                    <div class="row row-xs mg-b-25">
                        <div data-label="Example" class="df-example demo-table table-responsive">
                            <table id="enquiriesLIST" class="table table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date & Time</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Need for</th>
                                        <th>QAS (In Lakhs)</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            <?php elseif ($route == 'preview' && $formtype = 'preview' && $id != '') :
            ?>
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <h4 class="card-header text-muted text-uppercase">Enquiry On - (<?= $createdon; ?>)</h4>
                        <div class="card-body form-group row">
                            <div class="col-md-3 border-right mg-t-20 ">
                                <div class="text-uppercase">
                                    <span>Name </span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $name; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 border-right mg-t-20 ">
                                <div class="text-uppercase">
                                    <span>Email</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $email; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 border-right mg-t-20">
                                <div class="text-uppercase">
                                    <span>Mobile No.</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $mobile_number; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-20">
                                <div class="text-uppercase">
                                    <span>Email ID</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $email; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-20 border-right">
                                <div class="text-uppercase">
                                    <span>Location</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $location; ?></span>
                                </div>
                            </div>
                            <div class="col-md-3 mg-t-20 border-right">
                                <div class="text-uppercase">
                                    <span>Need-For</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $need_for; ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mg-t-20">
                                <div class="text-uppercase">
                                    <span>Quantum of assitance sought (In Lakhs)</span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $qunatumofassitancesought; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 border-right mg-t-20 ">
                                <div class="text-uppercase">
                                    <span>Decription </span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span><?= $description; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6 border-right mg-t-20 ">
                                <div class="text-uppercase">
                                    <span>Status </span>
                                </div>
                                <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                                    <span class="badge badge-info"><?= $status_label; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php elseif (isset($route) && $route == 'trash') : ?> <div class="col-lg-12">
            <div class="row row-xs mg-b-25">
                <div data-label="Example" class="df-example demo-table table-responsive">
                    <!-- <hr /> -->
                    <!-- <div class="row">
                               
                                <div class="col-8">
                                    <h3>View the Trash List</h3>
                                </div>
                                <div class="col-4">
                                    <a href=".php" class="btn btn-xs btn-secondary"> Back</a>

                                    <a href="#" class="btn btn-xs btn-danger" onclick="showTRASHDELETE()"><i data-feather="x"></i> Clear All</a>
                                </div>
                            </div> -->

                    <br />
                    <table id="_TRASHLIST" class="table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Need for</th>
                                <th>QOA (in lakhs)</th>
                                <th>Description</th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>

                        <?php
                        $list__datas = sqlQUERY_LABEL("SELECT `enquiryform_ID`, `name`, `mobile_number`, `location`, `need_for`, `qunatumofassitancesought`, `description`, `email`, `status`, `createdon` FROM `js_enquiryform` WHERE deleted = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

                        $count__list = sqlNUMOFROW_LABEL($list__datas);

                        if ($count__list == 0) :
                        ?>
                            <tr>
                                <th colspan="7" class="text-center border-0">No Data Found !!!!!
                                <th>
                            </tr>
                            <?php
                        else :
                            while ($row = sqlFETCHARRAY_LABEL($list__datas)) {
                                $counter++;
                                $name = $row["name"];
                                $email = $row["email"];
                                $mobile_number = $row['mobile_number'];
                                $need_for = $row['need_for'];
                                $qunatumofassitancesought = $row['qunatumofassitancesought'];
                                $description = $row['description'];
                                $createdon_date = dateformat_datepicker($row['createdon']);
                                // $_link = $row['_link'];
                                $status = $row["status"];
                            ?>
                                <tr>
                                    <th><?= $counter; ?></th>
                                    <th><?= $createdon_date; ?></th>
                                    <th><?= $name; ?></th>
                                    <th><?= $email; ?></th>
                                    <th><?= $mobile_number; ?></th>
                                    <th><?= $need_for; ?></th>
                                    <th><?= $qunatumofassitancesought; ?></th>
                                    <th><?= $description; ?></th>
                                </tr>
                            <?php
                            }
                            ?>

                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
    </div>
</div><!-- container -->
</div><!-- content -->