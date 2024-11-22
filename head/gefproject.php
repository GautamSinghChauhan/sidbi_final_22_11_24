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

//reguser_protect();
//include_once('check_restricted.php');

//update query
if ($action == "delete" && $id != '') {
    //Insert query
    $arrFields = array('`deleted`');

    $arrValues = array("1");

    $sqlWhere = "gef_id=$id";

    if (sqlACTIONS("UPDATE", "js_gefproject", $arrFields, $arrValues, $sqlWhere)) {
        echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
        echo "<script type='text/javascript'>window.location = 'gefproject.php?code=5'; </script>";
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
                            <div class="avatar avatar-sm" id="profileImage1"
                                style="background-color: #12e3f1 !important;">A</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right tx-13">
                            <div class="avatar avatar-lg mg-b-15" id="profileImage">A</div>
                            <h6 class="tx-semibold mg-b-5" id="username">admin@sidbi.in</h6>
                            <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
                            <a href="changepassword.php" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-edit-3">
                                    <polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon>
                                    <line x1="3" y1="22" x2="21" y2="22"></line>
                                </svg> Change Password</a>
                            <a href="logout.php" class="dropdown-item"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-log-out">
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
    <!-- Delete -->
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
        if ($("#gef_content_en,#gef_content_hin").length > 0) {
            tinymce.init({
                selector: "textarea#gef_content_en, textarea#gef_content_hin",
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
        $(document).on('click', '.remove_item_btn', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

        function showImageUpload() {
            document.getElementById("image-upload").style.display = "block";
            document.getElementById("pdf-upload").style.display = "none";
            document.getElementById("image-thumbnail-upload").style.display = "none";
            document.getElementById("addBtn").style.display = "none";
            document.getElementById("pdfButton").style.display = "none";
            document.getElementById("addMorePDFButton").style.display = "none";
        }

        function showPDFUpload() {
            document.getElementById("image-upload").style.display = "block";
            document.getElementById("pdf-upload").style.display = "block";
            document.getElementById("image-thumbnail-upload").style.display = "block";
            document.getElementById("pdfButton").style.display = "block";
            document.getElementById("pdfButton").classList.remove("d-none");
            document.getElementById("addMorePDFButton").style.display = "block";
            document.getElementById("addBtn").style.display = "block";
            document.getElementById("image-upload").style.display = "none";
        }

        function addMorePDF() {
            var pdfButton = document.getElementById('pdfButton');
            pdfButton.innerHTML += `<div class="row mt-3">
    <div class="col-lg-5">
        <div class="file-upload text-left">
            <label for="thumbimage_additional">Choose Thumbnail image:</label>
            <input type="file" name="thumbimage_additional[]" id="thumbimage_additional" class="form-control" multiple>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="file-upload text-left">
            <label for="pdf_additional">Choose PDF:</label>
            <input type="file" name="pdf_additional[]" id="pdf_additional" class="form-control" multiple>
        </div>
    </div>
    <div class="col-lg-2 d-flex align-items-end justify-content-center">
        <button type="button" onclick="removePDF(this)" class="btn btn-danger">X</button>
    </div>
</div>
`;
        }

        $(function() {
            'use strict'
            <?php if ($route == '') {  ?>

                $('#gefLIST').DataTable({
                    //responsive: true,
                    'ajax': 'engine/json/JSONgefproject.php',
                    "columns": [{
                            "data": "count" //0
                        },
                        {
                            "data": "gef_heading_en" //1
                        },
                        {
                            "data": "status" //2
                        },
                        {
                            "data": "modify" //3
                        }
                    ],
                    "columnDefs": [{
                        "targets": 0,
                        "data": "count",
                        "searchable": false
                    }, {
                        "targets": 2,
                        "data": "status",
                        "searchable": false,
                        "render": function(data, type, row) {
                            switch (data) {
                                case '1':
                                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus-' +
                                        row.modify + '" id="tenderstatus' + row.modify +
                                        '" checked="" onChange="togglestatusITEM(' + row.modify +
                                        ', ' + data +
                                        ');"> <label class="custom-control-label" for="tenderstatus' +
                                        row.modify + '">Yes</label></div>';
                                    break;
                                case '0':
                                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="tenderstatus--' +
                                        row.modify + '" id="tenderstatus' + row.modify +
                                        '" onChange="togglestatusITEM(' + row.modify + ', ' + data +
                                        ');"> <label class="custom-control-label" for="tenderstatus' +
                                        row.modify + '">Yes</label></div>';
                                    break;
                            }
                        }
                    }, {
                        "targets": 3,
                        "data": "modify",
                        "searchable": false,
                        "render": function(data, type, full, meta) {
                            return '<a title="Click to edit" href="gefproject.php?route=edit&id=' +
                                data +
                                '" class="btn btn-info btn-icon"><i class="fa fa-edit"></i></a><a href="gefproject.php?route=preview&id=' + data + '" title="Click to preview" class="btn btn-light btn-icon"><i class="fa fa-eye"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' +
                                data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
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

        $(function() {
            'use strict';
            <?php if ($route == 'preview') : ?>
                $('#gefprojectdocLIST').DataTable({
                    // DataTables options here
                    'ajax': 'engine/json/JSONgefprojectdoc.php',
                    "columns": [{
                            "data": "count" //0
                        },
                        {
                            "data": "gef_doc_name" //1
                        },
                        {
                            "data": "status" //2
                        },
                        {
                            "data": "modify" //3
                        }

                    ],
                    "columnDefs": [{
                            "targets": 0,
                            "data": "count",
                            "searchable": false
                        },

                        {
                            "targets": 2,
                            "data": "status",
                            "searchable": false,
                            "render": function(data, type, row) {
                                switch (data) {
                                    case '1':
                                        return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status-' + row.modify + '" id="status' + row.modify + '" checked="" onChange="togglestatusDOC(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="status' + row.modify + '">Yes</label></div>';
                                        break;
                                    case '0':
                                        return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="status--' + row.modify + '" id="status' + row.modify + '" onChange="togglestatusDOC(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="status' + row.modify + '">Yes</label></div>';
                                        break;
                                }
                            }
                        },
                        {
                            "targets": 3,
                            "data": "modify",
                            "searchable": false,
                            "render": function(data, type, full, meta) {
                                return '<a href="javascript:void(0);" onClick ="deleteDOC(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
                            }
                        }
                    ],

                });
            <?php endif; ?>

        });

        function deleteITEM(deleting_id) {
            var SELECTED_ID = deleting_id;
            //alert(SELECTED_ID);
            $('#pleasewait-loader').show();
            $('.receiving-delete-data').load('view/x__gefproject.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
                $('#pleasewait-loader').hide();
                $('#deleteDATA').modal({
                    show: true
                });
            });
        }

        function togglestatusITEM(gef_id, status) {
            var SELECTED_ID = gef_id;
            var SELECTED_STATUS = status;
            //alert(SELECTED_ID);
            $('#pleasewait-loader').show();
            $('.receiving-delete-data').load('view/x__gefproject.php?type=changestatus&gef_id =' + SELECTED_ID +
                '&oldstatus=' + SELECTED_STATUS + '',
                function() {
                    $('#pleasewait-loader').hide();
                    location.reload();
                });
        }

        function togglestatusDOC(gef_doc_id, status) {
            var SELECTED_ID = gef_doc_id;
            var SELECTED_STATUS = status;
            //alert(SELECTED_ID);
            $('#pleasewait-loader').show();
            $('.receiving-delete-data').load('view/x__gefproject.php?type=doc_status&gef_doc_id=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
                $('#pleasewait-loader').hide();
                location.reload();
            });
        }

        function deleteDOC(deleting_id) {
            var SELECTED_ID = deleting_id;
            //alert(SELECTED_ID);
            $('#pleasewait-loader').show();
            $('.receiving-delete-data').load('view/x__gefproject.php?type=doc_delete&delete_id=' + SELECTED_ID + '', function() {
                $('#pleasewait-loader').hide();
                $('#deleteDATA').modal({
                    show: true
                });
            });
        }
        <?php
        if ($code == '1') {
            $displayMSG_globalclass->displayMSG($code, "Success", 'Record Created Successfully.', 'success');
        }

        if ($code == '2') {
            $displayMSG_globalclass->displayMSG($code, "Success", 'Record Updated Successfully.', 'success');
        }

        if ($code == '0') {
            $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add Details.', 'error');
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