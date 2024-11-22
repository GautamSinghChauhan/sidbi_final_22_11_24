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
extract($_REQUEST);
include_once('jackus.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title><?php echo $__dashboard; ?> | <?php echo BASEPATH; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASEPATH; ?>/public/img/favicon.png">

    <!-- main header -->
    <?php include publicpath('__seo.php'); ?>
    <!-- main header ends -->
    <!-- vendor css -->

    <link href="<?php echo BASEPATH; ?>/public/integration/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/jqvmap/jqvmap.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/header_profile_icon.css">


    <!-- vendor css -->
    <link href="<?php echo BASEPATH; ?>public/integration/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>public/integration/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>public/integration/jqvmap/jqvmap.min.css" rel="stylesheet">


    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.dashboard.css">
    <!-- <style>
        .avatar {
            background-color: #000;
        }
    </style> -->
    
  <?php
  include publicpath('__commonscripts.php');
  ?>
</head>

<body class="page-profile">

    
    <!-- main header ends -->

    <div class="content pd-0">
        <!-- content-header -->
        <div class="content-header">
            <!-- main header -->
            <?php include publicpath('__header.php'); ?>
            <!-- <div class="content-search">

            </div>
            <nav class="nav">
                <div class="navbar-right">
                    <div class="dropdown dropdown-profile">
                        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                            <div class="avatar avatar-sm" id="profileImage1" style="background-color: #12e3f1 !important;">A</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right tx-13">
                            <div class="avatar avatar-lg mg-b-15" id="profileImage">A</div>
                            <h6 class="tx-semibold mg-b-5" id="username">admin@sidbi.in</h6>
                            <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
                            <a href="changepassword.php" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                    <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                                    <line x1="3" y1="22" x2="21" y2="22"></line>
                                </svg> Change Password</a>
                            <a href="logout.php" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>Sign Out</a>
                        </div>
                    </div>
                </div>
            </nav> -->
        </div>
        <!-- /content-header -->

        <div class="mt-5 mx-5">
            <div class="d-sm-flex align-items-center ">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mb-2">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sidbi Monitoring</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Welcome to Dashboard</h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-3">
                    <a href="generalenquiry.php">
                        <div class="card rounded-5 dashboard-card">
                            <div class="card-body text-center">
                                <h5 class="mb-3">Online Enquiry</h5>
                                <img src="public/img/enquiry.png" alt="enquiry" width="50">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="homeslider.php">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <h5 class="mb-3">Grievance</h5>
                                <img src="public/img/gallery.png" alt="enquiry" width="50">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="pressrelease.php">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <h5 class="mb-3">Contact</h5>
                                <img src="public/img/content.png" alt="enquiry" width="50">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="testimonials.php">
                        <div class="card dashboard-card">
                            <div class="card-body text-center">
                                <h5 class="mb-3">Cluster</h5>
                                <img src="public/img/testimonials.png" alt="enquiry" width="50">
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div>
                        <h4 class="mt-4 mb-3">List Of online Enquiry</h4>
                    </div>
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table id="generalenquiryLIT" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="">S.No</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th class="">Mobile Number</th>
                                    <th class="">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>
                                </tr>
                                
                            <tr>
                                <td>5</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            <tr>
                                    <td>6</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>
                                </tr>
                                
                            <tr>
                                <td>10</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <h4 class="mt-4 mb-3">List Of Recent Grievance</h4>
                    </div>
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table id="generalenquiryLIT" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="">S.No</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th class="">Mobile Number</th>
                                    <th class="">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>
                                </tr>
                                
                            <tr>
                                <td>5</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            <tr>
                                    <td>6</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>
                                </tr>
                                
                            <tr>
                                <td>10</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <h4 class="mt-4 mb-3">List Of Contact</h4>
                    </div>
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table id="generalenquiryLIT" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="">S.No</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th class="">Mobile Number</th>
                                    <th class="">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                            </tbody>
                            <tr>
                                <td>5</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            <tr>
                                    <td>6</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                           
                                <tr>
                                    <td>8</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>9820920280</td>
                                    <td>New</td>

                                </tr>
                            </tbdoy>
                            <tr>
                                <td>10</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>9820920280</td>
                                <td>New</td>

                            </tr>
                            </tbdoy>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div>
                        <h4 class="mt-4 mb-3">List Of Cluster</h4>
                    </div>
                    <div class="table-responsive" style="overflow-x:hidden;">
                        <table id="generalenquiryLIT" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="">S.No</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th class="">Occupation</th>
                                    <th class="">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>Policy maker</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>Businessman</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>other</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>policy maker</td>
                                    <td>New</td>

                                </tr>
                            </tbody>
                            <tr>
                                <td>5</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>Businessman</td>
                                <td>New</td>

                            </tr>
                            <tr>
                                    <td>6</td>
                                    <td>Kappor</td>
                                    <td>kapoor@gmail.com</td>
                                    <td>Businessman</td>
                                    <td>Open</td>

                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Anup</td>
                                    <td>anup@gmail.com</td>
                                    <td>Policy maker</td>
                                    <td>New</td>

                                </tr>
                            
                                <tr>
                                    <td>8</td>
                                    <td>Sunil</td>
                                    <td>sunil@gmail.com</td>
                                    <td>other</td>
                                    <td>New</td>

                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Rahul</td>
                                    <td>Rahul@gmail.com</td>
                                    <td>policy maker</td>
                                    <td>New</td>

                                </tr>
                            </tbdoy>
                            <tr>
                                <td>10</td>
                                <td>Khan</td>
                                <td>khan@gmail.com</td>
                                <td>Businessman</td>
                                <td>New</td>

                            </tr>
                            </tbdoy>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php include publicpath('__footer.php'); ?>

    </div>



    <!-- Footer -->
    <!-- End of Footer -->

    <script src="<?php echo BASEPATH; ?>/public/integration/jquery.flot/jquery.flot.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/chart.js/Chart.bundle.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/js/dashforge.sampledata.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js">
    </script>
    <script src="<?php echo BASEPATH; ?>/public/integration/select2/js/select2.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.flash.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/jszip.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.html5.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.print.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.select.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/jqueryui/jquery-ui.min.js"></script>

    <script src=".<?php echo BASEPATH; ?>jquery/jquery.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>feather-icons/feather.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>jquery.flot/jquery.flot.js"></script>
    <script src=".<?php echo BASEPATH; ?>jquery.flot/jquery.flot.stack.js"></script>
    <script src=".<?php echo BASEPATH; ?>jquery.flot/jquery.flot.resize.js"></script>
    <script src=".<?php echo BASEPATH; ?>chart.js/Chart.bundle.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>jqvmap/jquery.vmap.min.js"></script>
    <script src=".<?php echo BASEPATH; ?>jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="<?php echo BASEPATH; ?>public/js/dashforge.js"></script>
    <!-- <script src="<?php echo BASEPATH; ?>public/js/dashforge.aside.js"></script> -->
    <script src="<?php echo BASEPATH; ?>public/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="<?php echo BASEPATH; ?>js-cookie/js.cookie.js"></script>
    <script src="<?php echo BASEPATH; ?>public/js/dashforge.settings.js"></script>
    

    <script>
        $(function() {
            'use strict'

            var plot = $.plot('#flotChart', [{
                data: df3,
                color: '#69b2f8'
            }, {
                data: df1,
                color: '#d1e6fa'
            }, {
                data: df2,
                color: '#d1e6fa',
                lines: {
                    fill: false,
                    lineWidth: 1.5
                }
            }], {
                series: {
                    stack: 0,
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 0,
                        fill: 1
                    }
                },
                grid: {
                    borderWidth: 0,
                    aboveData: true
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 350
                },
                xaxis: {
                    show: true,
                    ticks: [
                        [0, ''],
                        [8, 'Jan'],
                        [20, 'Feb'],
                        [32, 'Mar'],
                        [44, 'Apr'],
                        [56, 'May'],
                        [68, 'Jun'],
                        [80, 'Jul'],
                        [92, 'Aug'],
                        [104, 'Sep'],
                        [116, 'Oct'],
                        [128, 'Nov'],
                        [140, 'Dec']
                    ],
                    color: 'rgba(255,255,255,.2)'
                }
            });


            $.plot('#flotChart2', [{
                data: [
                    [0, 55],
                    [1, 38],
                    [2, 20],
                    [3, 70],
                    [4, 50],
                    [5, 15],
                    [6, 30],
                    [7, 50],
                    [8, 40],
                    [9, 55],
                    [10, 60],
                    [11, 40],
                    [12, 32],
                    [13, 17],
                    [14, 28],
                    [15, 36],
                    [16, 53],
                    [17, 66],
                    [18, 58],
                    [19, 46]
                ],
                color: '#69b2f8'
            }, {
                data: [
                    [0, 80],
                    [1, 80],
                    [2, 80],
                    [3, 80],
                    [4, 80],
                    [5, 80],
                    [6, 80],
                    [7, 80],
                    [8, 80],
                    [9, 80],
                    [10, 80],
                    [11, 80],
                    [12, 80],
                    [13, 80],
                    [14, 80],
                    [15, 80],
                    [16, 80],
                    [17, 80],
                    [18, 80],
                    [19, 80]
                ],
                color: '#f0f1f5'
            }], {
                series: {
                    stack: 0,
                    bars: {
                        show: true,
                        lineWidth: 0,
                        barWidth: .5,
                        fill: 1
                    }
                },
                grid: {
                    borderWidth: 0,
                    borderColor: '#edeff6'
                },
                yaxis: {
                    show: false,
                    max: 80
                },
                xaxis: {
                    ticks: [
                        [0, 'Jan'],
                        [4, 'Feb'],
                        [8, 'Mar'],
                        [12, 'Apr'],
                        [16, 'May'],
                        [19, 'Jun']
                    ],
                    color: '#fff',
                }
            });

            $.plot('#flotChart3', [{
                data: df4,
                color: '#9db2c6'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0
                            }, {
                                opacity: .5
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 60
                },
                xaxis: {
                    show: false
                }
            });

            $.plot('#flotChart4', [{
                data: df5,
                color: '#9db2c6'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0
                            }, {
                                opacity: .5
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 80
                },
                xaxis: {
                    show: false
                }
            });

            $.plot('#flotChart5', [{
                data: df6,
                color: '#9db2c6'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0
                            }, {
                                opacity: .5
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 80
                },
                xaxis: {
                    show: false
                }
            });

            $.plot('#flotChart6', [{
                data: df4,
                color: '#9db2c6'
            }], {
                series: {
                    shadowSize: 0,
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0
                            }, {
                                opacity: .5
                            }]
                        }
                    }
                },
                grid: {
                    borderWidth: 0,
                    labelMargin: 0
                },
                yaxis: {
                    show: false,
                    min: 0,
                    max: 60
                },
                xaxis: {
                    show: false
                }
            });

            $('#vmap').vectorMap({
                map: 'usa_en',
                showTooltip: true,
                backgroundColor: '#fff',
                color: '#d1e6fa',
                colors: {
                    fl: '#69b2f8',
                    ca: '#69b2f8',
                    tx: '#69b2f8',
                    wy: '#69b2f8',
                    ny: '#69b2f8'
                },
                selectedColor: '#00cccc',
                enableZoom: false,
                borderWidth: 1,
                borderColor: '#fff',
                hoverOpacity: .85
            });


            var ctxLabel = ['6am', '10am', '1pm', '4pm', '7pm', '10pm'];
            var ctxData1 = [20, 60, 50, 45, 50, 60];
            var ctxData2 = [10, 40, 30, 40, 55, 25];

            // Bar chart
            var ctx1 = document.getElementById('chartBar1').getContext('2d');
            new Chart(ctx1, {
                type: 'horizontalBar',
                data: {
                    labels: ctxLabel,
                    datasets: [{
                        data: ctxData1,
                        backgroundColor: '#69b2f8'
                    }, {
                        data: ctxData2,
                        backgroundColor: '#d1e6fa'
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                display: false,
                                beginAtZero: true,
                                fontSize: 10,
                                fontColor: '#182b49'
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: true,
                                color: '#eceef4'
                            },
                            barPercentage: 0.6,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                                fontColor: '#8392a5',
                                max: 80
                            }
                        }]
                    }
                }
            });

        })
    </script>
    <script>
        $('#generalenquiryLIST').DataTable({
            'ajax': 'engine/json/JSONgeneralenquiry.php?show=<?php echo $show; ?>',
            "columns": [{
                    "data": "count"
                },
                {
                    "data": "customer_name"
                },
                {
                    "data": "customer_phone"
                },
                {
                    "data": "customer_email"
                },
                {
                    "data": "customer_service"
                },
                {
                    "data": "customer_message"
                },
                {
                    "data": "requested_date"
                },
                {
                    "data": "status"
                },
                {
                    "data": "modify"
                }
            ],
            "columnDefs": [{
                    "targets": 0,
                    "data": "count",
                    "searchable": false
                },

                {
                    "targets": 7,
                    "data": "status",
                    "searchable": false,
                    "render": function(data, type, row) {
                        switch (data) {
                            case '1':
                                return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status-' +
                                    row.modify + '" id="status' + row.modify +
                                    '" checked="" onChange="togglestatusITEM(' + row.modify + ', ' + data +
                                    ');"> <label class="custom-control-label" for="status' + row.modify +
                                    '">Yes</label></div>';
                                break;
                            case '0':
                                return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status--' +
                                    row.modify + '" id="status' + row.modify +
                                    '" onChange="togglestatusITEM(' + row.modify + ', ' + data +
                                    ');"> <label class="custom-control-label" for="status' + row.modify +
                                    '">Yes</label></div>';
                                break;
                        }
                    }
                }, {
                    "targets": 8,
                    "data": "modify",
                    "searchable": false,
                    "render": function(data, type, full, meta) {
                        return '<a href="javascript:void(0);" onClick ="deleteITEM(' + data +
                            ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';

                    }
                }
            ],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ Items/Page',
            }
        });
    </script>
</body>

</html>