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

  $sqlWhere = "announcements_id=$id";

  if (sqlACTIONS("UPDATE", "announcements", $arrFields, $arrValues, $sqlWhere)) {
    echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
    echo "<script type='text/javascript'>window.location = 'announcements.php?code=5'; </script>";
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

    <script>

	$(function() {
      'use strict'
      <?php if ($route == '') {  ?>

        $('#announcementsLIST').DataTable({
          //responsive: true,
          'ajax': 'engine/json/JSONannouncements.php?show=<?php echo $show; ?>&language=en',
          "columns": [{
              "data": "count" //0
            },
            {
              "data": "announcements_title" //1
            },
            {
              "data": "announcements_date" //2
            },
            {
              "data": "status" //3
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
              "targets": 1,
              "data": "announcements_title",
              "searchable": false,
              "render": function(data, type, row) {
                return '<div><h6>In English</h6><p>' + data + '</p></div><div><h6>In Hindi</h6><p>' + row.title +'</p></div>';
              }
            }, 
             {
              "targets": 3,
              "data": "status",
              "searchable": false,
              "render": function(data, type, row) {
                switch (data) {
                  case '1':
                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="announcementstatus-' + row.modify + '" id="announcementstatus' + row.modify + '" checked="" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="announcementstatus' + row.modify + '">Yes</label></div>';
                    break;
                  case '0':
                    return '<div class="custom-control custom-switch"><input type="checkbox" class="custom-control-input" name="announcementstatus--' + row.modify + '" id="announcementstatus' + row.modify + '" onChange="togglestatusITEM(' + row.modify + ', ' + data + ');"> <label class="custom-control-label" for="announcementstatus' + row.modify + '">Yes</label></div>';
                    break;
                }
              }
            }, {
              "targets": 4,
              "data": "modify",
              "searchable": false,
              "render": function(data, type, full, meta) {
                return '<a title="Click to edit" href="announcements.php?route=edit&id=' + data + '" class="btn btn-light btn-icon"><i class="fa fa-edit"></i></a> <a href="javascript:void(0);" onClick ="deleteITEM(' + data + ');" title="Click to delete" class="btn btn-dark btn-icon"><i class="fa fa-trash"></i></a>';
                //return '';
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

    function deleteITEM(deleting_id) {
      var SELECTED_ID = deleting_id;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__announcements.php?type=delete&delete_id=' + SELECTED_ID + '', function() {
        $('#pleasewait-loader').hide();
        $('#deleteDATA').modal({
          show: true
        });
      });
    }
    function togglestatusITEM(announcements_id, status) {
      var SELECTED_ID = announcements_id;
      var SELECTED_STATUS = status;
      //alert(SELECTED_ID);
      $('#pleasewait-loader').show();
      $('.receiving-delete-data').load('view/x__announcements.php?type=changestatus&announcements_ID=' + SELECTED_ID + '&oldstatus=' + SELECTED_STATUS + '', function() {
        $('#pleasewait-loader').hide();
        location.reload();
      });
    }
	
	<?php if ($route == 'add' || $route == 'edit'):  ?>
		$('#announcements_date').datepicker({
		  dateFormat: 'dd/mm/yy',
		  showOtherMonths: true,
		  selectOtherMonths: true,
		  changeMonth: true,
		  changeYear: true
		});

		$('#announcements_last_date').datepicker({
		  dateFormat: 'dd/mm/yy',
		  showOtherMonths: true,
		  selectOtherMonths: true,
		  changeMonth: true,
		  changeYear: true
		});
		
			const uploadedFileList = $('#uploadedFileList');
			let selectedFiles = [];

			console.log('dfds');
			// Initially, hide the download links
			$('.download-link').hide();
			$('#submit_upload_document_vehicle_btn').click(function() {
				const newlySelectedDocumentType = $('#document_type').val();
				const newlySelectedDocumentLanguage = $('#announcements_document_language_id').val();
				const newlySelectedFiles = $('#fileInput').prop('files');

				if (newlySelectedDocumentLanguage == 0) {
					//TOAST_NOTIFICATION('warning', 'Document Type is Required', 'Warning !!!', '', '', '', '', '', '', '', '', '');
					<?php $displayMSG_globalclass->displayMSG($code, "Error", 'Language is Required', 'error'); ?>
				}

				if (newlySelectedFiles.length > 0) {
					// Get the newly selected files and add them to the list
					//selectedFiles = selectedFiles.concat(Array.from(newlySelectedFiles));
					displayUploadedFiles(newlySelectedDocumentType, newlySelectedFiles);

					// Hide the file_upload card and show the file_upload2 card
					$('#file_upload').hide();
					$('#file-upload2').show();

					// Close the modal
					$('#fileUploadModal').modal('hide');
				} else {
					//TOAST_NOTIFICATION('warning', 'Upload Document is Required', 'Warning !!!', '', '', '', '', '', '', '', '', '');
					<?php $displayMSG_globalclass->displayMSG($code, "Error", 'Upload Document is Required', 'error'); ?>
				}
			});
			
		var counter_image_for_id;
		var counter_image = '0';
		console.log('dsf');
		
		function getFileType(filename) {
			var fileExtension = filename.split('.').pop().toLowerCase();

			if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
				return 'image';
			} else if (['mp4', 'avi', 'mov'].includes(fileExtension)) {
				return 'video';
			} else if (['doc', 'docx', 'pdf'].includes(fileExtension)) {
				return 'document';
			} else {
				return 'other';
			}
		}

		function displayUploadedFiles(selectedDocumentType, selectedFiles) {
			const uploadedFileList = $('#uploadedFileList');

			// Display all selected files with download icons in rows with three columns
			for (let i = 0; i < selectedFiles.length; i++) {
				const file = selectedFiles[i];
				const fileName = file.name;
				const modifiedFileName = fileName;
				var fileType = getFileType(fileName);
				const selectedDocumentTypeID = $('#announcements_document_type_id').text();
				const selectedDocumentLangiageID = $('#announcements_document_language_id').val();
				
				// Create a new FileReader for each file
				var reader = new FileReader();

				// Use a closure to capture the file in the loop
				reader.onload = (function(file) {
					return function(e) {
						let image_src = e.target.result;
						let vehicle_col_gallery_counter_image = 'vehicle_col_gallery_' + counter_image_for_id;
						
						var previewHtml = '';
						var downloadLink = image_src; // Replace with your actual download link

						previewHtml = '<iframe src="' + image_src + '" width="600" height="400" frameborder="0" class="d-block w-100 h-100 rounded"></iframe>';

						const fileItemFinal = $(`
						<div class="col-md-3 mb-3" id=${vehicle_col_gallery_counter_image}>
							<div class="p-2 rounded position-relative alert alert-primary">
								<button type="button" class="btn btn-sm btn-icon waves-effect waves-light  position-absolute rounded-circle" style="top: -10px;right: -10px;" onclick="removeInsertedVEHICLEGALLERY('${vehicle_col_gallery_counter_image}')">
									<span class="ti ti-square-rounded-x-filled ti-lg"></span>
								</button>
								<div class="text-center">
									<div class="vendor-vehicle-image-container">
										${previewHtml}
										<div class="vendor-vehicle-download-button" onclick="downloadImage('${image_src}')"><i class="ti ti-download ti-sm"></i></div>
										<input type="text" name="announcements_document_type_id[${counter_image}]" id="announcements_document_type_id" value="${selectedDocumentTypeID}" hidden="" />
										<input type="text" name="announcements_document_language_id[${counter_image}]" id="announcements_document_language_id" value="${selectedDocumentLangiageID}" hidden="" />
										<input type="file" name="document[${counter_image}]" id="uploadDocument_${counter_image}" hidden="" />
									</div>
								</div>
								<div class="text-center mt-2">
									<p class="card-text mb-0 text-center"> ${modifiedFileName} </p>
								</div>
							</div>
						</div>`);

						uploadedFileList.append(fileItemFinal);

						// Access the input element dynamically
						var input2 = document.getElementById('uploadDocument_' + counter_image);

						// Create a new File object from the selected file
						var newFile = new File([file], file.name, {
							type: file.type
						});

						// Create a new DataTransfer object
						var dataTransfer = new DataTransfer();

						// Add the new file to the DataTransfer object
						dataTransfer.items.add(newFile);

						// Set the DataTransfer object to the second input
						input2.files = dataTransfer.files;
					};
				})(file);

				// Read the selected image file as a data URL
				reader.readAsDataURL(file);
				
				$('#announcements_document_language_id').find('option:selected').prop('selected', false);
				$('#upload_document_modal').on('hidden.bs.modal', function () {
				  // Set the backdrop to "static" and hide it
				  $(this).data('bs.modal')._config.backdrop = 'static';
				  $('.modal-backdrop').hide();
				}).modal('hide');
	
				document.getElementById('fileInput').value = '';
				counter_image++;
			}
		}

		function downloadImage(imageUrl) {
			// Extract the filename from the imageUrl
			var filename = imageUrl.split('/').pop();

			// Create an anchor element
			var link = document.createElement('a');

			// Set the href attribute to the image URL
			link.href = imageUrl;

			// Set the download attribute to specify the default file name
			link.download = filename;

			// Append the link to the document
			document.body.appendChild(link);

			// Trigger a click on the link to start the download
			link.click();

			// Remove the link from the document
			document.body.removeChild(link);
		}
		
		function showUPLOADFILEMODAL() {
			//$('.receiving-upload-file-data').load('engine/ajax/__ajax_manage_activity.php?type=activity_delete', function() {

			// });
			const container = document.getElementById("upload_document_modal");
			const modal = new bootstrap.Modal(container);
			modal.show();
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
      $displayMSG_globalclass->displayMSG($code, "Error", 'Unable to Add announcements.', 'error');
    }

    if ($code == '5') {
      $displayMSG_globalclass->displayMSG($code, "Success", 'Record Deleted Successfully', 'success');
    }
    if (!empty($err)) {
    ?>
       toastr.error('Error', '<?php foreach ($err as $e) { echo "$e <br>"; } ?>', {timeOut: 6000})
  <?php } ?>
    </script>
</body>

</html>