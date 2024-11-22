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
include_once('check_restricted.php');

reguser_protect();


$generateINCLUDE = viewGENERATOR($currentpage, $route);
  //update query
  if ($action == "delete" && $id != '') {
    //Insert query
    $arrFields = array('`deleted`');

    $arrValues = array("1");

    $sqlWhere = "menu_ID =$id";

    if (sqlACTIONS("UPDATE", "js_megamenu", $arrFields, $arrValues, $sqlWhere)) {
      // sqlACTIONS("UPDATE", "home", $arrFields, $arrValues, $sqlWhere);
      echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
      echo "<script type='text/javascript'>window.location = 'menus.php?code=5'; </script>";
    }
  }

// Generating dynamic file names to view/add/edit/delete O/P:  r_{module-name}.php
?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title><?php include publicpath('__pagetitle.php'); ?> | <?php echo $_SITETITLE; ?></title>
  <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.bubble.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
  <link href=".<?php echo BASEPATH; ?>@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href=".<?php echo BASEPATH; ?>ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href=".<?php echo BASEPATH; ?>jqvmap/jqvmap.min.css" rel="stylesheet">

  <!-- DashForge CSS -->
  <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.css">
  <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/dashforge.dashboard.css">
  <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/selectize.css">
  <link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/bootstrap.min.css">
  <style>
    .avatar {
      background-color: #000;
    }
  </style>
</head> <?php
        include publicpath('__commonscripts.php');
        ?>


</head>

<body>

  <!-- main header -->
  <?php include publicpath('__header.php'); ?>
  <!-- main header ends -->


  <div class="content p-4">
    <div class="mt-5 mx-4">
      <div class="pd-x-0 pd-lg-x-10 pd-xl-x-0 p">
        <div class="d-sm-flex align-items-center justify-content-between mt-5">

          <?php include publicpath('__breadcrumb.php'); ?>
          <div class="mg-t-20 mg-sm-t-0">

            <div class="mg-t-20 mg-sm-t-0">

              <?php
              if (!in_array($route, array('add', 'edit', 'trash'))) { ?>
                <a href="javascript:;" onclick="show_filterdiv();" id="show_filter" class="btn btn-xs btn-secondary btn-icon mg-r-2"> <i data-feather="filter"></i>Filter</a>
                <a href="?route=add" class="btn btn-xs btn-success btn-icon"><i data-feather="plus"></i> <?php echo $__create ?></a>
              <?php } ?>

              <?php $list_datas = sqlQUERY_LABEL("SELECT `menu_ID` FROM `js_megamenu` where deleted = '1' order by `menu_ID` desc") or die("Unable to get trash records:" . sqlERROR_LABEL());

              $fetch_list = sqlNUMOFROW_LABEL($list_datas);

              if ($fetch_list != 0) { ?>
                <a href="menus.php?route=trash" class="btn btn-xs btn-warning btn-icon" style="display:show;"><i data-feather="trash"></i> Trash (<?= getTRASHCOUNT('get_trash_count_megamenus'); ?>)</a>
              <?php }
              if ($action == 'trash') { ?>
                <a href="menus.php" class="btn btn-xs btn-secondary"> Back</a>

                <a href="#" class="btn btn-xs btn-danger" onclick="showTRASHDELETE()"><i data-feather="x"></i> Clear All</a>
              <?php }
              ?>
              <!-- <?php echo "SELECT COUNT(`menu_ID`) FROM `js_megamenu` WHERE `deleted` = '1';" ?> -->
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

      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/select2/js/select2.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/jqueryui/jquery-ui.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/parsleyjs/parsley.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.flash.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/jszip.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.html5.min.js"></script>
      <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.print.min.js"></script>
      <!-- <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.select.min.js"></script/> -->
      <script src="<?php echo BASEPATH; ?>public/js/selectize.min.js"></script>
      <script>
        
        document.addEventListener("DOMContentLoaded", function() {
              // Get references to the input fields
              const menuenglishInput = document.getElementById("menu_english_title");
              const seoUrlInput = document.getElementById("seo_url");

              // Add event listener to the innerpage title input
              menuenglishInput.addEventListener("input", function() {
                // Generate SEO URL from innerpage title
                const seoUrl = generateSeoUrl(menuenglishInput.value);
                // Set the generated SEO URL to the SEO URL input field
                seoUrlInput.value = seoUrl;
              });

              function generateSeoUrl(title) {
                // Convert title to lowercase
                let seoUrl = title.toLowerCase();
                // Replace spaces with hyphens
                seoUrl = seoUrl.replace(/\s+/g, '-');
                // Replace any non-alphanumeric characters (except hyphens) with empty string
                seoUrl = seoUrl.replace(/[^a-z0-9-]/g, '');
                // Replace consecutive hyphens with a single hyphen
                seoUrl = seoUrl.replace(/-+/g, '-');
                // Trim leading and trailing hyphens
                seoUrl = seoUrl.replace(/^-+|-+$/g, '');
                return seoUrl;
              }
            });
        $(document).ready(function() {
          $("#show_filter").click(function() {
            $("#filter_content").slideToggle("slow");
          });

          $(".parentSelect").selectize();
          $(".menu_for").selectize();

          $('#since_from').datepicker({
            dateFormat: 'dd/mm/yy',
            showOtherMonths: true,
            selectOtherMonths: true,
            // changeMonth: true,
            // changeYear: true,
            // minDate: 0,
          });
          $('#since_to').datepicker({
            dateFormat: 'dd/mm/yy',
            showOtherMonths: true,
            selectOtherMonths: true,
            // changeMonth: true,
            // changeYear: true,
            // minDate: 0,
          });

          function showReportSummary() {
            var reportSummarySection = document.getElementById("reportSummarySection");
            if (reportSummarySection.style.display === "none") {
              reportSummarySection.style.display = "block";
            } else {
              reportSummarySection.style.display = "none";
            }
          }
        });
        $(function() {
          'use strict'
          <?php if ($route == '') { ?>

            $('#menusLIST').DataTable({

              dom: 'Bfrtip',
              'ajax': 'engine/json/JSONmenus.php',
              "columns": [{
                  "data": "counter"
                },
                {
                  "data": "menu_title"
                },
                {
                  "data": "menu_for"
                },
                {
                  "data": "parent_title"
                },
              ],
              "columnDefs": [{
                  "targets": 0,
                  "data": "count",
                  "searchable": false
                },
                {
                  "targets": 4,
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
                }, {
                  "targets": 5,
                  "data": "modify",
                  "searchable": false,
                  "render": function(data, type, full, meta) {
                    return '<a  title="Click to edit" href="menus.php?route=edit&formtype=edit&&id=' + data + '" class="btn btn-xs btn-info btn-icon"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' + data + ');" title="Click to delete" class="btn btn-xs btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
                  }
                }
              ],
              language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
              }
            });

            // Select2
            $('.dataTables_length select').select2({
              minimumResultsForSearch: Infinity
            });


          
          <?php }
          if ($route == 'add' || $route == 'edit') {  ?>

            function uploadImage(input) {
              if (input.files && input.files[0]) {
                var url = URL.createObjectURL(input.files[0]);
                $('#imagePreview').attr('style', 'background-image:url(' + url + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
              }
            }


            $("#categoryimage").change(function() {
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

          <?php } ?>

        });


        function togglestatusITEM(menu_ID, status) {
      var SELECTED_ID = menu_ID;
      var SELECTED_STATUS = status;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__menus.php?type=changestatus&menu_ID=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
        $('#pleasewait-loader').hide();
        location.reload();
      });
    }


  

        function deleteITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__menus.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }

        <?php
        if ($code == '1') {
          $displayMSG_globalclass->displayMSG($code, "Success", 'Record created Successfully', 'success');
        }

        if ($code == '0') {
          $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add Category.', 'error');
        }

        if (!empty($err)) {
        ?>
          toastr.error('Error', '<?php foreach ($err as $e) {
                                    echo "$e <br>";
                                  } ?>', {
            timeOut: 6000;
          });
        <?php } ?>
      </script>
</body>

</html>