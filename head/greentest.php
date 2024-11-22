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
if ($action == "delete" && $id != '') {
  //Insert query
  $arrFields = array('`deleted`');

  $arrValues = array("1");

  $sqlWhere = "greentest_id  = $id";

  if (sqlACTIONS("UPDATE", "greentest", $arrFields, $arrValues, $sqlWhere)) {
    // sqlACTIONS("UPDATE", "home", $arrFields, $arrValues, $sqlWhere);
    echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
    echo "<script type='text/javascript'>window.location = 'greentest.php?code=5'; </script>";
  }
}
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
  </style>
  <?php
  include publicpath('__commonscripts.php');
  ?>

</head>

<body>

  <!-- main header -->
  <?php include publicpath('__header.php'); ?>
  <!-- main header ends -->

  <div class="content content-fixed bd-b">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
      <div class="d-sm-flex align-items-center justify-content-between">

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


  <script src="<?php echo BASEPATH; ?>/public/integration/parsleyjs/parsley.min.js"></script>
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
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.aside.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.sampledata.js"></script>

  <!-- append theme customizer -->
  <script src=".<?php echo BASEPATH; ?>js-cookie/js.cookie.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.settings.js"></script>
  <script src="<?php echo BASEPATH; ?>public/integration/tinymce/tinymce.min.js"></script>

  <script>
    $(function() {
      'use strict';

      <?php if ($route == '') { ?>
        $('#greentestLIST').DataTable({
          //responsive: true,
          'ajax': 'engine/json/JSONgreentest.php',
          "columns": [{
              "data": "count" //0
            },
            {
              "data": "greentest_content" //1
            },
            {
              "data": "greentest_content_hindi" //2
            },
            {
              "data": "greentest_image" //3
            },
            {
              "data": "greentest_link" //4
            },
            {
              "data": "status" //5
            },
            {
              "data": "modify" //6
            }
          ],
          "columnDefs": [{
              "targets": 0,
              "data": "count",
              "searchable": false
            },

            {
              "targets": 5,
              "data": "status",
              "searchable": false,
              "render": function(data, type, row) {
                switch (data) {
                  case '1':
                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status-' + row.modify + '" id="status' + row.modify + '" checked="" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="status' + row.modify + '">Yes</label></div>';
                    break;
                  case '0':
                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status--' + row.modify + '" id="status' + row.modify + '" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="status' + row.modify + '">Yes</label></div>';
                    break;
                }
              }
            },
            {
              "targets": 6,
              "data": "modify",
              "searchable": false,
              "render": function(data, type, full, meta) {
                return '<a title="Click to edit" href="greentest.php?route=edit&id=' + data + '" class="btn btn-light btn-icon"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
              }
            }
          ],


        });

    });

    function togglestatusITEM(greentest_id, status) {
      var SELECTED_ID = greentest_id;
      var SELECTED_STATUS = status;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__greentest.php?type=changestatus&greentest_id=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
        $('#pleasewait-loader').hide();
        location.reload();
      });
    }

    function deleteITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__greentest.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }
  </script>
<?php } ?>
<?php
if ($code == '1') {
  $displayMSG_globalclass->displayMSG($code, "Success", 'Record created Successfully', 'success');
}

if ($code == '0') {
  $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add Testimonial.', 'error');
}

if ($code == '5') {
  $displayMSG_globalclass->displayMSG($code, "Success", 'Record Deleted Successfully', 'success');
}

if (!empty($err)) {
  echo "toastr.error('Error', '";
  foreach ($err as $e) {
    echo "$e <br>";
  }
  echo "', { timeOut: 6000 });";
}
?>


</body>



</html>