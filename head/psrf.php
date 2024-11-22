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
include_once('check_restricted.php');

$generateINCLUDE = viewGENERATOR($currentpage, $route);

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

  <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/select2/js/select2.min.js"></script>
  <script src="<?php echo BASEPATH; ?>/public/integration/parsleyjs/parsley.min.js"></script>
  <script src="<?php echo BASEPATH; ?>public/integration/tinymce/tinymce.min.js"></script>
  <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
  <!-- Include the Quill library -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <!-- Initialize Quill editor -->
  <script>
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: '#toolbar-container'
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'
    });
  </script>




  <script>
     if ($("#psrf_content,#psrf_content_hindi").length > 0) {
        tinymce.init({
            selector: "textarea#psrf_content, textarea#psrf_content_hindi",
            theme: "modern",
            menubar: false,
            min_height: 300,
            plugins: 'image preview fullscreen code',
            toolbar: 'undo redo | styleselect bold italic | link image preview | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify code',
            // enable title field in the Image dialog
            image_title: true,
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();

                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        // call the callback and populate the Title field with the file name
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            }

        });
    }
    $(function() {
      'use strict'
     
        $("#psrfimage").change(function() {
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

      <?php ?>

    });

    function deleteITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__psrf.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }

    function togglestatusITEM(psrf_ID, status) {
      var SELECTED_ID = psrf_ID;
      var SELECTED_STATUS = status;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__psrf.php?type=changestatus&psrf_ID=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
        $('#pleasewait-loader').hide();
        location.reload();
      });
    }


    $(document).ready(function() {
      $('#psrfname').parsley();
      var old_psrf_name = document.getElementById("encrypt_psrf_name").value;
      window.ParsleyValidator.addValidator('checkpsrfname', {
        validateString: function(value) {
          return $.ajax({
            url: 'engine/ajax/ajax_psrf_name.php',
            method: "POST",
            data: {
              psrf_name: value,
              old_psrf_name: old_psrf_name
            },
            dataType: "json",
            success: function(data) {

              return true;
            }
          });
        }
      });

    });


    $(document).ready(function() {
      $('#psrfcode').parsley();
      var old_psrf_name = document.getElementById("encrypt_psrfcode").value;
      window.ParsleyValidator.addValidator('checkpsrfcode', {
        validateString: function(value) {
          return $.ajax({
            url: 'engine/ajax/ajax_psrf_code.php',
            method: "POST",
            data: {
              psrf_code: value,
              old_psrf_code: old_psrf_name
            },
            dataType: "json",
            success: function(data) {

              return true;
            }
          });
        }
      });

    });




    <?php
    if ($code == '1') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record created Successfully', 'success');
    }

    if ($code == '0') {
      $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add psrf.', 'error');
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

</html>