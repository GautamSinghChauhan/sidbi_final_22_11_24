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
include_once('../../smtp_functions.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST

    if ($_GET['type'] == 'show_form') :

        $DOC_ID = $_GET['DOC_ID'];
?>
        <form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="publication_report_download_form" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
            <div class="row">
                <div class="col-md-12">
                    <div id="alertContainer"></div>
                </div>
                <div class="col-md-6" id="userdownloads_fullname_field">
                    <div class="form-group">
                        <div class="col-md-12" id="div-full_name">
                            <div class="form-group form-group-text field-full_name">
                                <label for="full_name" class="control-label">Name <span style="color:#ff0000;">*</span></label>
                                <input type="text" name="full_name" id="full_name" class="form-control frozen" autocomplete="off" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$" data-bv-regexp-message="Only Alphabet allowed." placeholder="Enter Full Name" data-bv-notempty-message="Name is required" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="userdownloads_occupation_field">
                    <div class="form-group">
                        <div class="col-md-12" id="div-occupation">
                            <div class="form-group form-group-select field-occupation">
                                <label for="occupation" class="control-label">Occupation<span style="color:#ff0000;">*</span>
                                </label>
                                <select name="occupation" id="occupation" class="form-control chosen-select frozen" data-bv-notempty-message="Please select Occupation">
                                    <option value="">Select Occupation</option>
                                    <option value="Govt. Organisation">Govt. Organisation</option>
                                    <option value="Policy Maker">Policy Maker</option>
                                    <option value="Student / Research Scholar">Student / Research Scholar</option>
                                    <option value="Aspiring Entrepreneur">Aspiring Entrepreneur</option>
                                    <option value="Businessman">Businessman</option>
                                    <option value="Financial Institution / Bank / NBFC / MFI">Financial Institution / Bank / NBFC / MFI</option>
                                    <option value="Others, please specify">Others, please specify</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="userdownloads_gender_field">
                    <div class="form-group">
                        <div class="col-md-12" id="div-gender">
                            <div class="form-group form-group-select field-gender">
                                <label for="gender" class="control-label">Gender<span style="color:#ff0000;">*</span>
                                </label>
                                <select name="gender" id="gender" class="form-control chosen-select frozen" data-bv-notempty-message="Please select Gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Third Gender">Third Gender</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="userdownloads_category_field">
                    <div class="form-group">
                        <div class="col-md-12" id="div-category">
                            <div class="form-group form-group-select field-category">
                                <label for="category" class="control-label">Category<span style="color:#ff0000;">*</span>
                                </label>
                                <select name="category" id="category" class="form-control chosen-select frozen" data-bv-notempty-message="Please select Category">
                                    <option value="">Select Category</option>
                                    <option value="General">General</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="Unidentified">Unidentified</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <?php /* <div class="col-md-12" id="userdownloads_otherocc_field" style="display: none;">
                    <div class="form-group">
                        <div class="col-md-12" id="div-otherocc">
                            <div class="form-group form-group-text field-otherocc">
                                <label for="otherocc" class="control-label">Other Occupation
                                </label>
                                <input type="text" name="otherocc" id="otherocc" value="" class="form-control text" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div> */ ?>
                <div class="col-md-12" id="userdownloads_email_field">
                    <div class="form-group">
                        <div class="col-md-12" id="div-email">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="emailverify-email" class="form-group form-group-emailverify field-email">
                                        <label for="email" class="control-label">Email<span style="color:#ff0000;">*</span>
                                        </label>
                                        <div class="input-group">
                                            <input type="email" name="email" id="email" class="form-control frozen" autocomplete="off" data-bv-regexp="true" data-bv-regexp-regexp="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" data-bv-regexp-message="Email is not valid" />
                                            <div class="input-group-append">
                                                <button type="button" onclick="sendOTP()" id="email-sendotp-button" class="btn btn-info sent_otp_btn" type="button">Send OTP</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="show_email_otp_div">
                                    <div id="field-otp-email" class="form-group form-group-otp field-otp-email">
                                        <div class="input-group">
                                            <label for="email" class="control-label">Enter OTP<span style="color:#ff0000;">*</span></label><input maxlength="6" data-bv-stringlength-min="6" data-bv-stringlength-message="Minimum 6 required" type="text" name="email_otp" id="email_otp" class="form-control email_otp" autocomplete="off" data-bv-notempty-message="OTP is required" />
                                            <button id="verify_otp" onclick="verify_OTP()" class="btn btn-success" type="button">Verify OTP</button>
                                            <div id='endtime_div' style="display: none;" class='form-text small text-muted mg-0 ms-2 my-auto' style='margin-top:0;'>Resend OTP in - <a href='javascript:void(0);'><span id='resent_otp_endtimer' class='text-primary'></span></a>
                                            </div>
                                            <small id='resent_otp_div' class="ms-2 my-auto">Didn't receive the OTP yet? <a href='javascript:void(0);' style='font-size: 12px;font-weight: 500;color: #001A94;' onclick='otp_RESENT();'>Resend OTP</a></small>
                                        </div>
                                        <span id="show_verified_otp" class="d-none text-success fw-bold">OTP Verified Successfully</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" id="userdownloads_captcha_field">
                    <div class="form-group reSetPass">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <label for="exampleInputPassword1">Verification<span class="text-danger">*</span></label>
                                <input type="text" maxlength="5" autocomplete="off" class="form-control" name="publication_captcha" id="publication_captcha" data-bv-notempty-message="Captcha is required" />
                            </div>
                            <div class="col-md-6">
                                <div class="captcha">
                                    <div class="captchaImg">
                                        <img id="generated_captcha" src="head/engine/ajax/ajax_generateCaptchaImagepublicationreport.php" />
                                    </div>
                                    <div class="captchRefresh" onclick="refreshCaptcha();">
                                        <img src="<?= SEOURL; ?>assets/front/images/refresh-icon.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hidden_DOC_ID" value="<?= $DOC_ID; ?>" hidden>
                <span id="ajax_show_download_document"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" disabled id="publication_report_download_btn" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <script>
            // JavaScript/jQuery code for refreshing the captcha
            function refreshCaptcha() {
                $.ajax({
                    type: "GET",
                    url: "head/engine/ajax/ajax_generateCaptchaImagepublicationreport.php?refresh=true",
                    dataType: "json",
                    success: function(response) {
                        // Update the src attribute of the captcha image
                        $("#generated_captcha").attr("src", "head/engine/ajax/ajax_generateCaptchaImagepublicationreport.php?" + new Date().getTime());

                        // Clear the entered_captchatext field
                        $("#publication_captcha").val("");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } // JavaScript/jQuery code for inserting the data

            function sendOTP() {
                var full_name = $('#full_name').val();
                var occupation = $('#occupation').val();
                var gender = $('#gender').val();
                var category = $('#category').val();
                var email = $('#email').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_publication_report_document_download.php?type=send_otp",
                    data: {
                        _full_name: full_name,
                        _occupation: occupation,
                        _gender: gender,
                        _category: category,
                        _email: email
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            if (response.errors.full_name_required) {
                                showAlert('Error', response.errors.full_name_required);
                            } else if (response.errors.occupation_required) {
                                showAlert('Error', response.errors.occupation_required);
                            } else if (response.errors.gender_required) {
                                showAlert('Error', response.errors.gender_required);
                            } else if (response.errors.category_required) {
                                showAlert('Error', response.errors.category_required);
                            } else if (response.errors.email_id_required) {
                                showAlert('Error', response.errors.email_id_required);
                            }
                        } else {
                            $('.sent_otp_btn').attr('disabled', true);
                            $("#endtime_div").show();
                            $("#resent_otp_div").hide();
                            $("#email_otp").focus();
                            timer(<?= $gloabl_OTP_TIMER; ?>);
                            showAlert('Success', response.result_success);
                            $('#email-sendotp-button').remove();
                            $('.frozen').attr('readonly', true);
                            $('.frozen').attr('disabled', true);
                            $('.frozen').addClass('bg-light');
                            $('#show_email_otp_div').removeClass('d-none');
                            $('#email_otp').attr('required', true);
                        }
                    }
                });
            }

            function otp_RESENT() {
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_publication_report_document_download.php?type=otp_resent",
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            showAlert('Error', 'Unable to Resent the OTP');
                            //Error
                        } else {
                            showAlert('Success', 'OTP Resent Successfully');
                            //Succss
                            $("#endtime_div").show();
                            $("#resent_otp_div").hide();
                            timer(<?= $gloabl_OTP_TIMER; ?>);
                        }
                    }
                });
            }

            function verify_OTP() {
                var email_otp = $('#email_otp').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_publication_report_document_download.php?type=verify_otp",
                    data: {
                        _email_otp: email_otp
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            if (response.errors.publication_email_otp_required) {
                                showAlert('Error', response.errors.publication_email_otp_required);
                            } else if (response.errors.publication_email_otp_invalid) {
                                showAlert('Error', response.errors.publication_email_otp_invalid);
                            }
                        } else {
                            $('#endtime_div').remove();
                            $('#resent_otp_div').remove();
                            $('#verify_otp').remove();
                            $('#email_otp').attr('readonly', true);
                            $('#publication_captcha').attr('required', true);
                            $('#show_verified_otp').removeClass('d-none');
                            $('#publication_report_download_btn').removeAttr('disabled');
                        }
                    }
                });
            }

            ///OTP TIMER SECTION
            let timerOn = true;

            function timer(remaining) {
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;

                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('resent_otp_endtimer').innerHTML = m + ':' + s;
                remaining -= 1;

                if (remaining >= 0 && timerOn) {
                    setTimeout(function() {
                        timer(remaining);
                    }, 1000);
                    return;
                }

                if (!timerOn) {
                    // Do validate stuff here
                    return;
                }
                $("#endtime_div").hide();
                $("#resent_otp_div").show();
            }

            $('#publication_captcha').on('keyup', function(e) {
                $('#publication_report_download_btn').removeAttr('disabled');
            });

            $(document).ready(function() {

                refreshCaptcha();

                //AJAX FORM SUBMIT
                $("#publication_report_download_form").submit(function(event) {
                    var form = $('#publication_report_download_form')[0];
                    var data = new FormData(form);
                    $(this).find("button[type='submit']").prop('disabled', true);
                    $('.loader-container').show();
                    $.ajax({
                        type: "post",
                        url: 'head/engine/ajax/ajax_manage_publication_report_document_download.php?type=download_document',
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
                            if (response.errors.publication_captcha_verification_failed) {
                                showAlert('Error', response.errors.publication_captcha_verification_failed)
                            }
                        } else {
                            //SUCCESS RESPOSNE
                            if (response.result == true) {
                                //RESULT SUCCESS
                                $('#ajax_show_download_document').html(response.download_document_url);
                                $("#download_publication_docs")[0].click();
                                setTimeout(function() {
                                    $('#ajax_show_download_document').remove();
                                }, 3000);
                                form.reset();
                                $('#showPUBLICATIONREPORTMODALFORM').modal('hide');
                            } else if (response.result == false) {
                                //RESULT FAILED
                                showAlert('Error', response.result_error);
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
