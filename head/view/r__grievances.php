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
    $filter_by_name = " `full_name` = '$name' and";
endif;

if ($companyname != '' && $companyname != '0') :
    $filter_by_companyname = " `companyname` = '$companyname' and";
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

$select_enquiry_data = sqlQUERY_LABEL("SELECT `grievanceform_ID`, `full_name`, `companyname`, `branch`, `customer_type`, `reasonfor_rasing_complaint`, `country_id`, `state_id`, `district_id`, `pincode`, `address`, `landline_number`, `mobile_number`, `subject`, `complaint_message`, `email`, `status`, `createdon` FROM `js_grievanceform` WHERE `deleted` = '0' and `grievanceform_ID`= '$id'") or die("Unable to get records:" . sqlERROR_LABEL());

while ($row = sqlFETCHARRAY_LABEL($select_enquiry_data)) :
    $grievanceform_ID = $row["grievanceform_ID"];
    $full_name = $row["full_name"];
    $companyname = $row["companyname"];
    $branch = $row["branch"];
    $customer_type = $row["customer_type"];
    $mobile_number = $row["mobile_number"];
    $email = $row["email"];
    $address = $row["address"];
    $reasonfor_rasing_complaint = $row["reasonfor_rasing_complaint"];
    $country_id = $row["country_id"];
    $state_id = $row["state_id"];
    $district_id = $row["district_id"];
    $complaint_message = $row["complaint_message"];
    $landline_number = $row["landline_number"];
    $subject = $row["subject"];
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
        <?php if ($route == '') : ?>
            <form action="" method="get">
                <div class="card mg-md-b-20" id="filter_content" style="display:none">
                    <div class="card-body">
                        <h3 class="text-dark">Filter by</h3>
                        <div class="container">
                            <div class="row text-center mt-2">
                                <!-- Name Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <select type="text" class="form-control custom-select" name="name" id="name" style="width:220px;">
                                            <?php //getGRIEVANCES_FORM_DETAILS($name, 'get_name_in_select'); 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Company Name Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <select type="text" class="form-control custom-select" name="companyname" id="companyname" style="width:220px;">
                                            <?php //getGRIEVANCES_FORM_DETAILS($companyname, 'get_companyname_in_select'); 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Email Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">

                                        <select type="text" class="form-control custom-select" name="email" id="email" style="width:220px;">
                                            <?php //getGRIEVANCES_FORM_DETAILS($email, 'get_email_in_select'); 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Mobile Number Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">

                                        <select type="text" class="form-control custom-select" name="mobilenumber" id="mobilenumber" style="width:220px;">
                                            <?php //getGRIEVANCES_FORM_DETAILS($mobilenumber, 'get_mobile_in_select'); 
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 text-right">
                                <!-- From Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <label for="since_from" class="mg-b-0">From</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="DD/MM/YYYY" aria-label="Recipient's username" aria-describedby="basic-addon2" name="since_from" id="since_from" value="<?= $_GET['since_from']; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- To Field -->
                                <div class="col-md-3 mx-auto">
                                    <div class="form-group">
                                        <label for="since_to" class="mg-b-0">To</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="DD/MM/YYYY" aria-label="Recipient's username" aria-describedby="basic-addon2" name="since_to" id="since_to" value="<?= $_GET['since_to']; ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Apply Filter Button -->
                                <div class="col-md-3 mx-auto mt-3">
                                    <button type="submit" class="btn btn-info btn-block">Apply Filter</button>
                                </div>
                                <!-- Clear Button -->
                                <div class="col-md-3 mx-auto mt-2">
                                    <a href="enquiries.php" class="btn btn-light btn-block mt-2">Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    </form>
</div>

<div class="col-lg-12">
    <div class="row row-xs mg-b-25">
        <div data-label="Example" class="df-example demo-table table-responsive">
            <table id="grievancesLIST" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
<?php elseif ($route == 'preview' && $formtype = 'preview' && $id != '') :
?>
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <h4 class="card-header text-muted text-uppercase">Date - (<?= $createdon; ?>)</h4>
            <div class="card-body form-group row">
                <div class="col-md-3 border-right mg-t-20 ">
                    <div class="text-uppercase">
                        <span>Name </span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= $full_name; ?></span>
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
                        <span>Adrress</span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= $address; ?></span>
                    </div>
                </div>
                <div class="col-md-3 border-right mg-t-20 ">
                    <div class="text-uppercase">
                        <span>Country </span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?php if ($country_id == 1) : echo 'India';
                                endif; ?></span>
                    </div>
                </div>
                <div class="col-md-3 border-right mg-t-20 ">
                    <div class="text-uppercase">
                        <span>State </span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= getSTATELIST($state_id, 'label'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 border-right mg-t-20 ">
                    <div class="text-uppercase">
                        <span>District </span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= getDISTRICT_DETAILS($state_id, $district_id, 'label'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 mg-t-20 border-right">
                    <div class="text-uppercase">
                        <span>Reason for raising complaint</span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= getGRIEVANCE_REASON_TYPE($reasonfor_rasing_complaint, 'label'); ?></span>
                    </div>
                </div>
                <div class="col-md-3 mg-t-20">
                    <div class="text-uppercase">
                        <span>Complaint Message</span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= $complaint_message; ?></span>
                    </div>
                </div>
                <div class="col-md-3 mg-t-20 border-right">
                    <div class="text-uppercase">
                        <span>Subject</span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= $subject; ?></span>
                    </div>
                </div>
                <div class="col-md-3 mg-t-20">
                    <div class="text-uppercase">
                        <span>Landline Number</span>
                    </div>
                    <div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
                        <span><?= $landline_number; ?></span>
                    </div>
                </div>
                <div class="col-md-3 border-right mg-t-20 ">
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
                <div class="row">

                    <div class="col-8">
                        <h3>View the Trash List</h3>
                    </div>
                    <!-- <div class="col-4">
                        <a href=".php" class="btn btn-xs btn-secondary"> Back</a>

                        <a href="#" class="btn btn-xs btn-danger" onclick="showTRASHDELETE()"><i data-feather="x"></i> Clear All</a>
                    </div>  -->
                </div>

                <<br />
                <table id="_TRASHLIST" class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Date & Time</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <?php
                    $list__datas = sqlQUERY_LABEL("SELECT `grievanceform_ID`, `full_name`, `companyname`, `reasonfor_rasing_complaint`, `email`, `status`, `createdon` FROM `js_grievanceform` WHERE deleted = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

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
                            $full_name = $row["full_name"];
                            $email = $row["email"];
                            $companyname = $row['companyname'];
                            $reasonfor_rasing_complaint = $row['reasonfor_rasing_complaint'];
                            $createdon_date = dateformat_datepicker($row['createdon']);
                            // $_link = $row['_link'];
                            $status = $row["status"];
                        ?>
                            <tr>
                                <th><?= $counter; ?></th>
                                <th><?= $createdon_date; ?></th>
                                <th><?= $full_name; ?></th>
                                <th><?= $companyname; ?></th>
                                <th><?= $email; ?></th>
                                <th><?= $reasonfor_rasing_complaint; ?></th>
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
</div>
</div>