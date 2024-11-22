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

reguser_protect();
/* include_once('check_restricted.php'); */

$generateINCLUDE = viewGENERATOR($currentpage, $route);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  
<title><?php include publicpath('__pagetitle.php'); ?> | <?php echo $_SITETITLE; ?></title>
 

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
   

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/dashforge.dashboard.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>/public/css/header_profile_icon.css">


    <!-- vendor css -->
    <link href=".<?php echo BASEPATH; ?>@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href=".<?php echo BASEPATH; ?>ionicons/css/ionicons.min.css" rel="stylesheet">
   

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.css">
    <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.dashboard.css">
    <style>
        .avatar {
            background-color: #000;
        }
        .projectbanner-container{
          padding-left: 200px;
          padding-right: 200px;
        }
    </style>
  <?php
  include publicpath('__commonscripts.php');
  ?>

</head>

<body>

  <!-- main header -->
  <?php include publicpath('__header.php'); ?>
  <!-- main header ends -->

  <div class="mt-5">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0 mt-5">
      <div class="d-sm-flex align-items-center justify-content-between mt-5">

        <?php include publicpath('__breadcrumb.php'); ?>

        <div class="mg-t-20 mg-sm-t-0">

          <?php
          if (!in_array($route, array('add', 'edit'))) { ?>
            <a href="?route=add" class="btn btn-xs btn-success btn-icon"><i data-feather="plus"></i> Add</a>
          <?php } ?>

          <?php pageREFRESH(curPageURL(), $__refresh); ?>

        </div>

      </div>
    </div>
  </div>

  <!-- container -->
  <?php include($generateINCLUDE); ?>

  <!-- Footer -->
  <?php include publicpath('__footer.php'); ?>
  <!-- End of Footer -->

  <div class="modal fade" id="deleteDATA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel2">Please confirm your action</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body receiving-delete-data"></div>
      </div>
    </div>
  </div>

  <!-- onclick spinner -->
  <div class="modal fade effect-scale show" id="pleasewait-loader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-150" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div class="spinner-border wd-80 ht-80" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <p>working on it...</p>
        </div>
      </div>
    </div>
  </div>

  
  <script src="<?php echo BASEPATH; ?>/public/integration/select2/js/select2.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/parsleyjs/parsley.min.js"></script>
  
 
 




  <script>
    $(function() {
      'use strict'
        $("#projectbannerimage").change(function() {
          uploadImage(this);
        });

        //fix submit buttons to top on scroll
        function sticktothetop() {
          var window_top = $(window).scrollTop();
          var top = $('#stick-here').offset().top;
          if (window_top > top) {
            $('#stickThis').addClass('stick');
            $('#stick-here').height($('#stickThis').outerHeight());
          } else {
            $('#stickThis').removeClass('stick');
            $('#stick-here').height(0);
          }
        }

        $(window).scroll(sticktothetop);
        sticktothetop();

   

    });

  

    <?php
    if ($code == '1') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record created Successfully', 'success');
    }

    if ($code == '0') {
      $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add projectbanner.', 'error');
    }

    if ($code == '5') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record Deleted Successfully', 'success');
    }
    if (!empty($err)) {
    ?>
      toastr.error('Error', '<?php foreach ($err as $e) {
                                echo "$e <br>";
                              } ?>', {
        timeOut: 6000
      })
    <?php } ?>
  </script>
</body>

</html>