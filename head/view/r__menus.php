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
?>
<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <?php if ($route == '') : ?>
            <div class="col-lg-12">
                <div class="row row-xs mg-b-25">
                    <div data-label="Example" class="df-example demo-table table-responsive">
                        <table id="menusLIST" class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Menu Title</th>
                                    <th>For</th>
                                    <th>Parent Title</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                        </table>
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
                        <!-- </div>

                        <<br />
                        <table id="_TRASHLIST" class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                          <  <?php
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
             </div> -->
        <?php endif; ?>
    </div>
</div>