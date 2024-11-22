<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Online Complaints / Grievance - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" HREF="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" HREF="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/responsive.css" rel="stylesheet" />
    <link type="text/css" HREF="<?= SEOURL; ?>assets/front/css/all-responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
    <style>
        .online-enquiry-otp {
            height: auto;
            border: none;
            background: #3FA253;
            font-size: 15px;
            color: #fff;
            padding: 21px 15px;
            transition: all 0.4s;
        }

        .online-enquiry-otp:hover {
            background: #004265;
            color: #fff;
        }

        /* CSS code for the alert */
        .alert_popup {
            padding: 20px;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            color: white;
            position: absolute;
            z-index: 3000;
            top: 10px;
            /* Updated top position */
            right: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* Added box shadow for a subtle effect */
            display: none;
        }

        .alert_close_btn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .alert_close_btn:hover {
            color: black;
        }

        .alert-title {
            font-size: clamp(14px, 3vw, 17px);
            /* Adjusted font size */
            font-weight: bold;
            margin-right: 5px;
        }

        .alert-message {
            font-size: clamp(13px, 3vw, 17px);
        }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');

        ?>
        <div id="alertContainer"></div>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Grievance Form</h1>
                </div>
            </div>
        </section>

        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="grievance-forms">Grievance Form</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <span id="show_grivances_response"></span>

        <section class="feedback-from RegisterForm" id="MainContent">
            <div class="container">
                <div class="col-md-12 col-lg-12">
                    <form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="grievance_form" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" data-parsley-validate>
                        <div class="send-enquiry default-form">
                            <!--<form class="default-form">-->
                            <div class="row">
                                <div class="col-md-4" id="div-full_name">
                                    <div class="form-group form-group-text field-full_name">
                                        <label for="full_name" class="control-label">Name <span style="color:#ff0000;">*</span>
                                        </label>
                                        <input type="text" name="full_name" id="full_name" class="form-control frozen text" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$" data-bv-regexp-message="Only Alphabet allowed." data-bv-notempty-message="Name  is required" />
                                    </div>
                                </div>
                                <div class="col-md-4" id="div-company_name">
                                    <div class="form-group form-group-text field-company_name">
                                        <label for="company_name" class="control-label">Company Name<span style="color:#ff0000;">*</span>
                                        </label>
                                        <input type="text" name="company_name" id="company_name" class="form-control frozen text" autocomplete="off" required data-bv-notempty-message="Company Name is required" />
                                    </div>
                                </div>
                                <div class="col-md-4" id="div-branch_id">
                                    <div class="form-group form-group-select field-branch_id">
                                        <label for="branch_id" class="control-label">Branch<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="branch_id" id="branch_id" class="form-control frozen chosen-select" data-bv-notempty-message="Please select Branch" required>
                                            <?= getGRIEVANCE_BRANCH('', 'select'); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-select field-customer_type">
                                        <label for="customer_type" class="control-label">Customer Type<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="customer_type" id="customer_type" class="form-control frozen chosen-select" data-bv-notempty-message="Please select Customer Type" required>
                                            <?= getGRIEVANCES_CUSTOMER_TYPE('', 'select'); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-select field-complaint_reason">
                                        <label for="complaint_reason" class="control-label">Reason For Raising Compliant<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="complaint_reason" id="complaint_reason" class="form-control frozen chosen-select" data-bv-notempty-message="Please select Reason For Raising Compliant" required>
                                            <?= getGRIEVANCE_REASON_TYPE('', 'select'); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-select field-country_id">
                                        <label for="country_id" class="control-label">Country<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="country_id" id="country_id" class="form-control frozen chosen-select" data-bv-notempty-message="Please select Country" required>
                                            <option value="1">India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-select field-state_id">
                                        <label for="state_id" class="control-label">State<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="state_id" id="state_id" class="form-control frozen chosen-select" data-bv-notempty-message="Please select State" required>
                                            <?= getSTATELIST('', 'select'); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-select field-districts_id">
                                        <label for="district_id" class="control-label">District<span style="color:#ff0000;">*</span>
                                        </label>
                                        <select name="district_id" id="district_id" class="form-control frozen chosen-select" data-bv-notempty-message="Please select District" required>
                                            <option value="">Choose State First</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-text field-pincode">
                                        <label for="pincode" class="control-label">Pincode<span style="color:#ff0000;">*</span>
                                        </label>
                                        <input type="text" name="pincode" id="pincode" class="form-control frozen text" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Only Numbers allowed." maxlength="6" data-bv-notempty-message="Pincode is required" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-textarea field-address">
                                        <label for="address" class="control-label">Address<span style="color:#ff0000;">*</span>
                                        </label>
                                        <textarea name="address" id="address" class="form-control frozen" rows="1" cols="30" required data-bv-notempty-message="Address is required"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-text field-fixed_line_number">
                                        <label for="landline_number" class="control-label">Landline Number </label>
                                        <input type="text" name="landline_number" id="landline_number" class="form-control frozen text" autocomplete="off" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Landline number is not valid" maxlength="12" data-bv-notempty-message="Landline Number is required" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-text field-mobile_number">
                                        <label for="mobile_number" class="control-label">Mobile Number<span style="color:#ff0000;">*</span>
                                        </label>
                                        <input type="text" name="mobile_number" id="mobile_number" class="form-control frozen text" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" data-bv-regexp-message="Mobile number is not valid" maxlength="10" data-bv-notempty-message="Mobile Number is required" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-0">
                                    <div class="form-group form-group-text field-subject">
                                        <label for="subject" class="control-label">Subject<span style="color:#ff0000;">*</span>
                                        </label>
                                        <input type="text" name="subject" id="subject" class="form-control frozen text" autocomplete="off" required maxlength="100" data-bv-notempty-message="Subject is required" />
                                    </div>
                                </div>
                                <div class="col-md-4 mb-0">
                                    <div class="form-group form-group-textarea field-complaint_message">
                                        <label for="complaint_message" class="control-label">Complaint Message<span style="color:#ff0000;">*</span>
                                        </label>
                                        <textarea name="complaint_message" id="complaint_message" class="form-control frozen" rows="1" cols="30" required data-bv-notempty-message="Complaint Message is required"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="emailverify-email" class="form-group form-group-emailverify field-email">
                                                <label for="email" class="control-label">Email<span style="color:#ff0000;">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <input data-bv-email-regexp="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" data-bv-email-message="Please enter the valid email id." type="email" name="email" id="email" class="form-control frozen emailverify" autocomplete="off" required data-bv-notempty-message="Email is required" />
                                                    <div class="input-group-append">
                                                        <button type="button" onclick="sendOTP()" id="email-sendotp-button" class="btn btn-info sent_otp_btn" type="button">Send OTP</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-none" id="show_email_otp_div">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="emailverify-emailid" class="form-group form-group-emailverify field-emailid">
                                                <label for="email_otp" class="control-label">Enter OTP<span style="color:#ff0000;">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <input maxlength="6" data-bv-stringlength-min="6" data-bv-stringlength-message="Minimum 6 required" type="text" name="email_otp" id="email_otp" class="form-control emailverify" autocomplete="off" data-bv-notempty-message="OTP is required" />
                                                    <div class="input-group-append">
                                                        <button type="button" onclick="verify_OTP()" id="equire-email-sendotp-button" class="btn btn-info" type="button">Verify OTP</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id='endtime_div' style="display: none;" class='form-text small text-muted mg-0 my-auto' style='margin-top:0;'>Resend OTP in - <a href='javascript:void(0);'><span id='resent_otp_endtimer' class='text-primary'></span></a>
                                    </div>
                                    <small id='resent_otp_div' class="my-auto">Didn't receive the OTP yet? <a href='javascript:void(0);' style='font-size: 12px;font-weight: 500;color: #001A94;' onclick='otp_RESENT();'>Resend OTP</a></small>
                                    <span id="show_verified_otp" class="d-none text-success fw-bold">OTP Verified Successfully</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group reSetPass">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-4">
                                                <label for="user_captcha">Verification<span class="text-danger">*</span></label>
                                                <input type="text" maxlength="5" autocomplete="off" class="form-control" required name="user_captcha" id="user_captcha" data-bv-notempty-message="Verification Captcha is required" />
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="captcha">
                                                    <div class="captchaImg">
                                                        <img id="generated_captcha" src="head/engine/ajax/ajax_generateCaptchaImageForGrivances.php" />
                                                    </div>
                                                    <div class="captchRefresh" onclick="refreshCaptcha();">
                                                        <img src="<?= SEOURL; ?>assets/front/images/refresh-icon.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row allbtn">
                                <button type="button" onclick="submitFORM()" id="grivances_submit_btn" class="btn loginBtn editSubmitBtn m-0 submit-btn" disabled>Submit</button>
                                <button class="btn resetBtn btn-reset formreset editSubmitBtn reset-btn" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--<script type="text/javascript" src="emailvalidate.js"></script>-->
        <script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
        <script>
            $('#grievance_form').bootstrapValidator({
                excluded: [':disabled'],
            });


            function sendOTP() {
                var full_name = $('#full_name').val();
                var company_name = $('#company_name').val();
                var branch_id = $('#branch_id').val();
                var customer_type = $('#customer_type').val();
                var complaint_reason = $('#complaint_reason').val();
                var country_id = $('#country_id').val();
                var state_id = $('#state_id').val();
                var district_id = $('#district_id').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();
                var landline_number = $('#landline_number').val();
                var mobile_number = $('#mobile_number').val();
                var subject = $('#subject').val();
                var complaint_message = $('#complaint_message').val();
                var email = $('#email').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_grievances.php?type=send_otp",
                    data: {
                        _full_name: full_name,
                        _company_name: company_name,
                        _branch_id: branch_id,
                        _customer_type: customer_type,
                        _complaint_reason: complaint_reason,
                        _country_id: country_id,
                        _state_id: state_id,
                        _district_id: district_id,
                        _pincode: pincode,
                        _address: address,
                        _landline_number: landline_number,
                        _mobile_number: mobile_number,
                        _subject: subject,
                        _complaint_message: complaint_message,
                        _email: email
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            scrollToTop();
                            if (response.errors.fullname_required) {
                                showAlert('Error', response.errors.fullname_required);
                            } else if (response.errors.companyname_required) {
                                showAlert('Error', response.errors.companyname_required);
                            } else if (response.errors.branchid_required) {
                                showAlert('Error', response.errors.branchid_required);
                            } else if (response.errors.customertype_required) {
                                showAlert('Error', response.errors.customertype_required);
                            } else if (response.errors.complaintreason_required) {
                                showAlert('Error', response.errors.complaintreason_required);
                            } else if (response.errors.country_required) {
                                showAlert('Error', response.errors.country_required);
                            } else if (response.errors.state_required) {
                                showAlert('Error', response.errors.state_required);
                            } else if (response.errors.districtid_required) {
                                showAlert('Error', response.errors.districtid_required);
                            } else if (response.errors.pincode_required) {
                                showAlert('Error', response.errors.pincode_required);
                            } else if (response.errors.address_required) {
                                showAlert('Error', response.errors.address_required);
                            } else if (response.errors.mobilenumber_required) {
                                showAlert('Error', response.errors.mobilenumber_required);
                            } else if (response.errors.subject_required) {
                                showAlert('Error', response.errors.subject_required);
                            } else if (response.errors.complaint_message_required) {
                                showAlert('Error', response.errors.complaint_message_required);
                            } else if (response.errors.email_required) {
                                showAlert('Error', response.errors.email_required);
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

            // Function to scroll to the top of the page
            function scrollToTop() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }

            function otp_RESENT() {
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_grievances.php?type=otp_resent",
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            scrollToTop();
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
                    url: "head/engine/ajax/ajax_manage_grievances.php?type=verify_otp",
                    data: {
                        _email_otp: email_otp
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            scrollToTop();
                            if (response.errors.grivances_email_otp_required) {
                                showAlert('Error', response.errors.grivances_email_otp_required);
                            } else if (response.errors.grivances_email_otp_invalid) {
                                showAlert('Error', response.errors.grivances_email_otp_invalid);
                            }
                        } else {
                            $('#endtime_div').remove();
                            $('#resent_otp_div').remove();
                            $('#verify_otp').remove();
                            $('#equire-email-sendotp-button').remove();
                            $('#email_otp').attr('readonly', true);
                            $('#user_captcha').attr('required', true);
                            $('#show_verified_otp').removeClass('d-none');
                            $('#enquire_now').removeAttr('disabled');
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

            $('#user_captcha').on('keyup', function(e) {
                $('#grivances_submit_btn').removeAttr('disabled');
            });

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

            // JavaScript/jQuery code for refreshing the captcha
            function refreshCaptcha() {
                $.ajax({
                    type: "GET",
                    url: "head/engine/ajax/ajax_generateCaptchaImageForGrivances.php?refresh=true",
                    dataType: "json",
                    success: function(response) {
                        // Update the src attribute of the captcha image
                        $("#generated_captcha").attr("src", "head/engine/ajax/ajax_generateCaptchaImageForGrivances.php?" + new Date().getTime());

                        // Clear the entered_captchatext field
                        $("#user_captcha").val("");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } // JavaScript/jQuery code for inserting the data

            function submitFORM() {
                // Validate the form using Bootstrap Validator
                // var bootstrapValidator = $('#grievance_form').data('bootstrapValidator');
                /* if (!bootstrapValidator.isValid()) {
                    // Form validation failed
                    return false;
                } */
                var form = $('#grievance_form')[0];
                var data = new FormData(form);
                // $(this).find("button[type='submit']").prop('disabled', true);
                $.ajax({
                    type: "post",
                    url: 'head/engine/ajax/ajax_manage_grievances.php?type=add',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 80000,
                    dataType: 'json',
                    encode: true,
                }).done(function(response) {
                    // console.log(data);
                    if (!response.success) {
                        //NOT SUCCESS RESPONSE
                        if (response.errors.captcha_verification_failed) {
                            showAlert('error', 'Captcha Verification Failed');
                        }
                    } else {
                        //SUCCESS RESPOSNE
                        if (response.result == true) {
                            //RESULT SUCCESS
                            form.reset();
                            showAlert('success', response.result_success);
                            <?php unset($_SESSION['grivances_captcha']); ?>
                            $('#MainContent').addClass('d-none');
                            $('#show_grivances_response').html(response.return_response);
                            setInterval(function() {
                                location.reload();
                            }, 50000);
                        } else if (response.result == false) {
                            //RESULT FAILED
                            showAlert('error', response.result_error);
                        }
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

            //GET THE CITY VALUES IN DROPDOWN FOR SELECTED STATE
            $('#state_id').on('change', function() {
                var STATE_ID = $(this).val();

                // Get the response from the server.
                $.ajax({
                    url: 'head/engine/ajax/ajax_fetch_district.php?type=selected_state',
                    type: "post",
                    data: {
                        STATE_ID: STATE_ID
                    },
                    success: function(response) {
                        // Clear existing values
                        $('#district_id').empty();

                        // Append the values to the dropdown.
                        $('#district_id').append('<option value="">Select District</option>');
                        $.each(response, function(index, item) {
                            $('#district_id').append('<option value="' + item.value + '">' + item.text + '</option>');
                        });
                    }
                });
            });

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
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.htm" target="_blank" title="Udyam Registration"><img src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="<?= SEOURL; ?>assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="<?= SEOURL; ?>assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank" title="Udyami Mitra"><img src="<?= SEOURL; ?>assets/front/images/logo4.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank" title="The National Portal of Indian"><img src="<?= SEOURL; ?>assets/front/images/logo5.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank" title="Central Vigilance Commission"><img src="<?= SEOURL; ?>assets/front/images/logo6.jpg" class="img-fluid w-100"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="logoSliderNav">
                        <div class="logoNavNext swiper-button-next"></div>
                        <div class="logoNavPrev swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        require_once('public/footer.php');
        ?>
    </div>


</body>

</html>