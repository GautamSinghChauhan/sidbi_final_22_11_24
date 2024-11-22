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
if ($route == '') :
  session_regenerate_id(TRUE);
  $tender_document_session_id = session_id();
endif;
$tender_document_session_id = session_id();

//reguser_protect();
//include_once('check_restricted.php');

//update query
if ($action == "delete" && $id != '') {
  //Insert query
  $arrFields = array('`deleted`');

  $arrValues = array("1");

  $sqlWhere = "tender_id=$id";

  if (sqlACTIONS("UPDATE", "tenders", $arrFields, $arrValues, $sqlWhere)) {
    echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
    echo "<script type='text/javascript'>window.location = 'tender.php?code=5'; </script>";
  }
}

//Generating dynamic file names to view/add/edit/delete O/P:  r_{module-name}.php
$generateINCLUDE = viewGENERATOR($currentpage, $route);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title><?php include publicpath('__pagetitle.php'); ?> | <?php echo $_SITETITLE; ?></title>
  <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.bubble.css">
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <?php
  include publicpath('__commonscripts.php');
  ?>
</head>

<body class="page-profile">

  <!-- main header -->
  <?php include publicpath('__header.php'); ?>
  <!-- main header ends -->

  <div class="content pd-0">
    <div class="content-header">
      <div class="content-search">

      </div>
      <!-- <nav class="nav">
                <div class="navbar-right">
                    <div class="dropdown dropdown-profile">
                        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                            <div class="avatar avatar-sm" id="profileImage1" style="background-color: #12e3f1 !important;">A</div>
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
    </div><!-- content-header -->

    <div class="mt-5 mx-4">
      <div class="d-sm-flex align-items-center justify-content-between">

        <?php include publicpath('__breadcrumb.php'); ?>

        <div class="mg-t-20 mg-sm-t-0">

          <?php
          if (!in_array($route, array('add', 'edit'))) { ?>
            <a href="?route=add" class="btn btn-xs btn-success btn-icon"><i data-feather="plus"></i> Add</a>
          <?php } ?>
          <?php
          if (!in_array($route, array('archived'))) { ?>
            <a href="?route=archived" class="btn btn-xs btn-info btn-icon"><i data-feather="plus"></i> Archived</a>
          <?php } ?>

          <?php pageREFRESH(curPageURL(), $__refresh); ?>

        </div>
      </div>

    </div>

    <?php include($generateINCLUDE); ?>

    <?php include publicpath('__footer.php'); ?>

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

    <div class="modal fade" id="showUPLOADDOCFORMMODAL" tabindex="-1" role="dialog" aria-labelledby="showUPLOADDOCFORMMODALLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content p-4">
          <div class="modal-body receiving-upload-doc-form-data">

          </div>
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
  </div>

  <!-- Footer -->
  <!-- End of Footer -->

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
  <script src="<?php echo BASEPATH; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASEPATH; ?>feather-icons/feather.min.js"></script>
  <script src="<?php echo BASEPATH; ?>perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?php echo BASEPATH; ?>jquery.flot/jquery.flot.js"></script>
  <script src="<?php echo BASEPATH; ?>jquery.flot/jquery.flot.stack.js"></script>
  <script src="<?php echo BASEPATH; ?>jquery.flot/jquery.flot.resize.js"></script>
  <script src="<?php echo BASEPATH; ?>chart.js/Chart.bundle.min.js"></script>
  <script src="<?php echo BASEPATH; ?>jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo BASEPATH; ?>jqvmap/maps/jquery.vmap.usa.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.aside.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.sampledata.js"></script>

  <!-- append theme customizer -->
  <script src="<?php echo BASEPATH; ?>js-cookie/js.cookie.js"></script>
  <script src="<?php echo BASEPATH; ?>public/js/dashforge.settings.js"></script>
  <script src="<?php echo BASEPATH; ?>public/integration/tinymce/tinymce.min.js"></script>

  <script>
    $(function() {
      'use strict'
      <?php if ($route == '') {  ?>

        $('#tenderLIST').DataTable({
          //responsive: true,
          'ajax': 'engine/json/JSONtender.php?show=<?= $show; ?>',
          "columns": [{
              "data": "count" //0
            },
            {
              "data": "tender_title" //1
            },
            {
              "data": "tender_date" //2
            },
            {
              "data": "tender_last_date" //3
            },
            {
              "data": "tender_remarks" //4
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
          }, {
            "targets": 1,
            "data": "tender_title",
            "render": function(data, type, row) {
              return '<div><h6>In English</h6><p>' + row.tender_title_eng + '</p></div><div><h6>In Hindi</h6><p>' + row.tender_title_hindi + '</p></div>';
            }
          }, {
            "targets": 4,
            "data": "tender_remarks",
            "render": function(data, type, row) {
              return '<div><h6>In English</h6><p>' + data + '</p></div><div><h6>In Hindi</h6><p>' + row.tender_remarks_hindi + '</p></div>';
            }
          }, {
            "targets": 5,
            "data": "status",
            "searchable": false,
            "render": function(data, type, row) {
              switch (data) {
                case '1':
                  return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus-' + row.modify + '" id="tenderstatus' + row.modify + '" checked="" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="tenderstatus' + row.modify + '">Yes</label></div>';
                  break;
                case '0':
                  return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus--' + row.modify + '" id="tenderstatus' + row.modify + '" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="tenderstatus' + row.modify + '">Yes</label></div>';
                  break;
              }
            }
          }, {
            "targets": 6,
            "data": "modify",
            "searchable": false,
            "render": function(data, type, full, meta) {
              return '<a title="Click to edit" href="tender.php?route=edit&id=' + data + '" class="btn btn-light btn-icon"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
              //return '';
            }
          }],
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
      if ($route == 'archived') {  ?>

        $('#archivedtenderLIST').DataTable({
          //responsive: true,
          'ajax': 'engine/json/JSONarchivedtender.php?show=<?php echo $show; ?>',
          "columns": [{
              "data": "count" //0
            },
            {
              "data": "tender_title" //1
            },
            {
              "data": "tender_date" //2
            },
            {
              "data": "tender_last_date" //3
            },
            {
              "data": "tender_remarks" //4
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
          }, {
            "targets": 1,
            "data": "tender_title",
            "render": function(data, type, row) {
              return '<div><h6>In English</h6><p>' + data + '</p></div><div><h6>In Hindi</h6><p>' + row.tender_title_hindi + '</p></div>';
            }
          }, {
            "targets": 4,
            "data": "tender_remarks",
            "render": function(data, type, row) {
              return '<div><h6>In English</h6><p>' + data + '</p></div><div><h6>In Hindi</h6><p>' + row.tender_remarks_hindi + '</p></div>';
            }
          }, {
            "targets": 5,
            "data": "status",
            "searchable": false,
            "render": function(data, type, row) {
              switch (data) {
                case '1':
                  return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus-' + row.modify + '" id="tenderstatus' + row.modify + '" checked="" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="tenderstatus' + row.modify + '">Yes</label></div>';
                  break;
                case '0':
                  return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus--' + row.modify + '" id="tenderstatus' + row.modify + '" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="tenderstatus' + row.modify + '">Yes</label></div>';
                  break;
              }
            }
          }, {
            "targets": 6,
            "data": "modify",
            "searchable": false,
            "render": function(data, type, full, meta) {
              return '<a title="Click to edit" href="tender.php?route=edit&id=' + data + '" class="btn btn-light btn-icon"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
              //return '';
            }
          }],
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
      //////////////////////////////////      
      if ($route == 'add' || $route == 'edit') {  ?>

        function uploadImage(input) {
          if (input.files && input.files[0]) {
            var url = URL.createObjectURL(input.files[0]);
            $('#imagePreview').attr('style', 'background-image:url(' + url + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
          }
        }

        <?php if ($route == 'add') :
          $filter = "session_id=$tender_document_session_id";
        elseif ($route == 'edit') :
          $filter = "id=$id";
        endif; ?>
        $('#tenderuploaddocumentLIST').DataTable({
          //responsive: true,
          'ajax': 'engine/json/JSONtenderuploadeddocuments.php?<?= $filter; ?>',
          "columns": [{
              "data": "count" //0
            },
            {
              "data": "tender_document_language_id" //1
            },
            {
              "data": "tender_document_type" //2
            },
            {
              "data": "tender_document_name" //3
            },
            {
              "data": "modify" //4
            }
          ],
          "columnDefs": [{
            "targets": 0,
            "data": "count",
            "searchable": false
          }, {
            "targets": 4,
            "data": "modify",
            "searchable": false,
            "render": function(data, type, full, meta) {
              return '<a href="javascript:void(0);" onClick ="deleteDOCUMENTITEM(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
              //return '';
            }
          }],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
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

    document.addEventListener("DOMContentLoaded", function() {
      // Get references to the input fields
      const innerpageTitleInput = document.getElementById("tender_title");
      const seoUrlInput = document.getElementById("tender_url");

      // Add event listener to the innerpage title input
      innerpageTitleInput.addEventListener("input", function() {
        // Generate SEO URL from innerpage title
        const seoUrl = generateSeoUrl(innerpageTitleInput.value);
        // Set the generated SEO URL to the SEO URL input field
        seoUrlInput.value = seoUrl;
      });
    });

    function deleteDOCUMENTITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__tender.php?type=delete_document&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }

    function deleteITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__tender.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }

    function togglestatusITEM(tender_id, status) {
      var SELECTED_ID = tender_id;
      var SELECTED_STATUS = status;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__tender.php?type=changestatus&tender_ID=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
        $('#pleasewait-loader').hide();
        location.reload();
      });
    }

    function confirmDELETE(ID) {
      $.ajax({
        type: "POST",
        url: "view/x__tender.php?type=confirm_document_delete",
        data: {
          ID: ID,
        },
        dataType: 'json',
        success: function(response) {
          if (!response.success) {
            //Error
          } else {
            $('#deleteDATA').modal({
              show: false
            });
            $('#tenderuploaddocumentLIST').DataTable().ajax.reload();
          }
        }
      });
    }

    <?php if ($route == 'add' || $route == 'edit') :  ?>
      $('#tender_date').datepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true
      });

      $('#tender_last_date').datepicker({
        dateFormat: 'dd/mm/yy',
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true
      });

      function showTENDERUPLOADFILEMODAL(ID) {
        $('.receiving-upload-doc-form-data').load('engine/ajax/ajax_show_tender_upload_doc_form.php?type=show_form&ID=' + ID, function() {
          const container = document.getElementById("showUPLOADDOCFORMMODAL");
          const modal = new bootstrap.Modal(container);
          modal.show();
        });
      }
    <?php endif; ?>

    <?php
    if ($code == '1') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record Created Successfully.', 'success');
    }

    if ($code == '2') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record Updated Successfully.', 'success');
    }

    if ($code == '0') {
      $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add tender.', 'error');
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