<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2010-2023 Touchmark Descience Pvt Ltd
*
*/

include_once('../../jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'show_form') :

        $ID = $_GET['ID'];

?>
        <form id="ajax_upload_document_form" enctype="multipart/form-data" method="POST" data-parsley-validate>
            <div class="modal-header pt-0 border-0">
                <h4 class="modal-title mx-auto" style="color:black">Document Upload</h4>
            </div>
            <div class="row mt-2">
                <div class="col-12 mb-3">
                    <label class="form-label" for="tender_document_type_id">Document Type<span class=" text-danger"> *</span></label>
                    <select name="tender_document_type_id" id="tender_document_type_id" class="form-control" data-live-search="true" required>
                        <?= getTENDERDOCUMENTTYPE($tender_document_type_id, 'select'); ?>
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label" for="tender_document_language_id">Language<span class=" text-danger"> *</span></label>

                    <select name="tender_document_language_id" id="tender_document_language_id" class="form-control" data-live-search="true" required>
                        <?= get_LANGUAGE_TYPE('', 'select'); ?>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label" for="upload_document">Upload Document<span class=" text-danger"> *</span></label>
                    <div class="form-group">
                        <input type="file" class="input-file" id="upload_document" name="upload_document" required>
                    </div>
                </div>
                <input type="hidden" name="hidden_ID" id="hidden_ID" value=" <?= $ID; ?>">
            </div>
            <div class=" d-flex justify-content-center pt-4">
                <button class="btn btn-secondary mx-1" data-dismiss="modal" aria-label="Close">Close</button>
                <button type="submit" id="submit_upload_document_tender_form_btn" class="btn btn-success btn-md">Save</button>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                //AJAX FORM SUBMIT
                $("#ajax_upload_document_form").submit(function(event) {
                    var form = $('#ajax_upload_document_form')[0];
                    var data = new FormData(form);
                    // $(this).find("button[type='submit']").prop('disabled', true);
                    $.ajax({
                        type: "post",
                        url: 'engine/ajax/ajax_manage_tender_document_upload.php?type=add',
                        data: data,
                        processData: false,
                        contentType: false,
                        cache: false,
                        timeout: 80000,
                        dataType: 'json',
                        encode: true,
                    }).done(function(response) {
                        if (!response.success) {
                            //NOT SUCCESS RESPONSE
                        } else {
                            //SUCCESS RESPOSNE
                            if (response.result == true) {
                                //RESULT SUCCESS
                                $('#showUPLOADDOCFORMMODAL').modal('hide');
                                $('#tenderuploaddocumentLIST').DataTable().ajax.reload();
                            } else if (response.result == false) {
                                //RESULT FAILED
                                toastr.error('Error', 'Unable to Upload Document', {
                                    timeOut: 6000
                                });
                            }
                        }
                        if (response == "OK") {
                            return true;
                        } else {
                            return false;
                        }
                    });
                    event.preventDefault();
                });
            });
        </script>
<?php endif;
else :
    echo "Request Ignored";
endif;
