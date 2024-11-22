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

// if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST
//     if ($_GET['type'] == 'show_document') :
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Fill in the form below to receive the product through your Email Id</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="ajax_bank_details_add" action="" method="post" data-parsley-validate>
        <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" id="_csrfToken_1698735399.3249" value="Z722SwtFe59evV9762xUcBSZGV2NvcBDvqcz8583BbdXufne3y17D/lc1nOCFaAs4PM+B9RVH3OvIGeZ7DWacA==" /></div>
        <div class="row">
            <div class="col-md-6" id="userdownloads_fullname_field">
                <div class="form-group">
                    <div class="col-md-12" id="div-full_name">
                        <div class="form-group form-group-text field-full_name">
                            <label for="full_name" class="control-label">Name <span style="color:#ff0000;">*</span>
                            </label>
                            <input type="text" name="full_name" id="full_name" value="" class="form-control text" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$" data-bv-regexp-message="Only Alphabet allowed." data-bv-notempty-message="Name  is required" />
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
                            <select name="occupation" id="occupation" class="form-control chosen-select" data-bv-notempty-message="Please select Occupation" required>
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
                            <select name="gender" id="gender" class="form-control chosen-select" data-bv-notempty-message="Please select Gender" required>
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
                            <select name="category" id="category" class="form-control chosen-select" data-bv-notempty-message="Please select Category" required>
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
            <div class="col-md-12" id="userdownloads_otherocc_field" style="display: none;">
                <div class="form-group">
                    <div class="col-md-12" id="div-otherocc">
                        <div class="form-group form-group-text field-otherocc">
                            <label for="otherocc" class="control-label">Other Occupation
                            </label>
                            <input type="text" name="otherocc" id="otherocc" value="" class="form-control text" autocomplete="off" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="userdownloads_email_field">
                <div class="form-group">
                    <div class="col-md-12" id="div-email">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="emailverify-email" class="form-group form-group-emailverify field-email">
                                    <label for="email" class="control-label">Email<span style="color:#ff0000;">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input onkeydown="return isCheckEmail(event, 'email');" type="email" name="email" id="email" value="" class="form-control emailverify" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" data-bv-regexp-message="Email is not valid" />
                                        <div class="input-group-append">
                                            <button onclick="sendemailotp();" id="email-sendotp-button" class="btn btn-info" type="button">Send OTP</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="display:none;" id="field_otp_email" class="form-group form-group-otp field-otp-email">
                                    <div class="input-group">
                                        <label for="email" class="control-label">Email OTP<span style="color:#ff0000;">*</span></label> <input maxlength="4" data-bv-stringlength-min="4" data-bv-stringlength-message="Minimum 4 required" type="text" name="email_otp" id="email_otp" value="" class="form-control email_otp" autocomplete="off" required data-bv-notempty-message="OTP is required" />
                                        <div class="input-group-append">
                                            <button id="email-verify" onclick="eotpverified('email');" class="btn btn-success" type="button" disabled="disabled">Verify OTP</button>
                                        </div>
                                    </div>
                                    <div id="emailtimer-outer" class="emailtimer" style="display: none;">Resend OTP In <span id="emailtimer"></span></div>
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
                            <input type="text" maxlength="5" autocomplete="off" class="form-control" required name="captchatext" id="captchatext" data-bv-notempty-message="Captcha is required" />
                        </div>
                        <div class="col-md-6">
                            <div class="captcha">
                                <div class="captchaImg"><img id="captcha" src="admin/ajax/generateCaptcha.png" /></div>
                                <div class="captchRefresh" onclick="refreshcaptcha();"><img src="assets/front/images/refresh-icon.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" name="save"  onclick="submitForm()"  class="btn btn-primary">Submit</button>
</div>
</form>
</div>
<?php
//     endif;
// endif;
?>
 <!-- <script src="assets\front\js\jquery.min.js"></script> -->
 <script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
<script>
    function sendemailotp(){
        var email = document.getElementById('email').value
        $('#field_otp_email').css('display', 'block');
  

        
        $.ajax({
                    url: 'head/engine/ajax/__ajax_insert_otp_email.php',
                    method: "POST",
                    data: {
                        _email:email
                    },
                    dataType: 'json',
                 }).done(function(response) {

                });

    }
      $('#ajax_bank_details_add').bootstrapValidator({
                excluded: [':disabled'],
            });

            // JavaScript/jQuery code for refreshing the captcha
            // function refreshCaptcha() {
            //     $.ajax({
            //         type: "GET",
            //         url: "engine/ajax/ajax_generateCaptchaImageForEnquiry.php?refresh=true",
            //         dataType: "json",
            //         success: function(response) {
            //             // Update the src attribute of the captcha image
            //             $("#generated_captcha").attr("src", "engine/ajax/ajax_generateCaptchaImageForEnquiry.php?" + new Date().getTime());

            //             // Clear the entered_captchatext field
            //             $("#user_captcha").val("");
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     });
            // } // JavaScript/jQuery code for inserting the data

            // JavaScript/jQuery code for inserting the data
            function submitForm() {
              
                // Validate the form using Bootstrap Validator
                // var bootstrapValidator = $('#ajax_bank_details_add').data('bootstrapValidator');
                // if (!bootstrapValidator.isValid()) {
                //     // Form validation failed
                //     return false;
                // }
                var form = $('#ajax_bank_details_add')[0];
                var data = new FormData(form);
                // $(this).find("button[type='submit']").prop('disabled', true);
              
                $.ajax({
                    type: "post",
                    url: 'head/engine/ajax/__ajax_mange_cluster_insert.php?type=add',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 80000,
                    dataType: 'json',
                    encode: true,
                }).done(function(response) {
                    // console.log(data);
                    
                        //SUCCESS RESPOSNE
                        if (response.result == true) {
                            //RESULT SUCCESS
                          
                            form.reset();
                            location.reload();
                            // showAlert('success', response.result_success);
                            // <?php unset($_SESSION['enquiry_captcha']); ?>
                            // setInterval(function() {
                            //     location.reload();
                            // }, 5000);
                        } else if (response.result == false) {
                            //RESULT FAILED
                            showAlert('error', response.result_error);
                        }
                  
                    if (response == "OK") {
                        return true;
                    } else {
                        return false;
                    }
                });
                // Prevent default form submission
                return false;
            }

            // Function to show alerts dynamically
            function showAlert(type, message) {
                var alertContainer = $("#alertContainer");
                alertContainer.empty(); // Clear existing alerts

                var alertDiv = $('<div>').addClass('alert_popup').attr('data-aos', 'zoom-out').attr('data-aos-duration', '1000');
                var closeBtn = $('<span>').addClass('alert_close_btn').html('&times;').click(function() {
                    $(this).parent().fadeOut(); // Hide the alert when close button is clicked
                });
                var alertTitle = $('<strong>').addClass('alert-title').text(type.charAt(0).toUpperCase() + type.slice(1) + '!!! ');
                var alertMessage = $('<span>').addClass('alert-title').text(message);

                alertDiv.append(closeBtn, alertTitle, alertMessage);
                alertContainer.append(alertDiv);
                alertDiv.fadeIn(); // Display the alert
            }
</script>