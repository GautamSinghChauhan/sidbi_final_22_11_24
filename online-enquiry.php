<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="OnlineEnquiryTitle">Online Enquiry - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/responsive.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/all-responsive.css" rel="stylesheet" />
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
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index" data-translate="home"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#" data-translate="OnlineEnquiry"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ऑनलाइन पूछताछ';
                                                else:
                                                 echo   'Online Enquiry';
                                                endif; ?></a></li>
                    </ul>
                </div>

            </div>
        </section>

        <section class="feedback-from RegisterForm" id="MainContent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-3 p-lg-0">
                        <div class="get-wrap">
                            <div class="get-information">
                                <h2 data-translate="SidbiLoanProducts"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   "क्या आपको सिडबी के ऋण उत्पादों के बारे में जानकारी चाहिए?";
                                                else:
                                                 echo   "Need information on SIDBI's loan products?";
                                                endif; ?></h2>
                                <div class="click-here"><a href="home-product" data-translate="ClickHere"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'यहाँ क्लिक करें';
                                                else:
                                                 echo   'Click Here';
                                                endif; ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9 enquirybg">
                        <form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="enquiry_form_submit" data-bv-message=" This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" data-parsley-validate>
                            <div class="send-enquiry default-form">
                                <!--<form class="default-form">-->
                                <div class="row">
                                    <div class="col-md-6" id="div-name">
                                        <div class="form-group form-group-text field-name">
                                            <label for="name" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'नाम';
                                                else:
                                                 echo   'Name';
                                                endif; ?> <span style="color:#ff0000;">*</span>
                                            </label>
                                            <input type="text" name="name" id="name" class="form-control frozen text mb-4" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$" data-bv-regexp-message="Only Alphabet allowed." data-bv-notempty-message="Name  is required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-mobile_number">
                                        <div class="form-group form-group-text field-mobile_number">
                                            <label for="mobile_number" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मोबाइल नंबर';
                                                else:
                                                 echo   'Mobile Number';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                            </label>
                                            <input type="text" name="mobile_number" id="mobile_number" class="form-control frozen text mb-4" autocomplete="off" required data-bv-regexp="true" data-bv-regexp-regexp="^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$" data-bv-regexp-message="Mobile number is not valid" maxlength="10" data-bv-notempty-message="Mobile Number is required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-location">
                                        <div class="form-group form-group-text field-location">
                                            <label for="location" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'पता';
                                                else:
                                                 echo   'Address';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                            </label>
                                            <input type="text" name="location" id="location" class="form-control frozen text mb-4" autocomplete="off" required data-bv-notempty-message="Address is required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-need">
                                        <div class="form-group form-group-select field-need">
                                            <label for="need" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ज़रूरत';
                                                else:
                                                 echo   'Need';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                            </label>
                                            <select name="need_for" id="need_for" class="form-control frozen chosen-select mb-4" data-bv-notempty-message="Please select Need" required>
                                                <?= getENQUIRYFORM_NEEDFOR_LIST('', 'select'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-qoas">
                                        <div class="form-group form-group-number field-qoas">
                                            <label for="qoas" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मांगी गई सहायता की मात्रा (लाखों में)';
                                                else:
                                                 echo   'Quantum of assistance sought (In Lakhs)';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                            </label>
                                            <input type="text" name="qoas" id="qoas" class="form-control frozen text mb-4" autocomplete="off" required data-bv-notempty-message="Quantum of assistance sought is required" />
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-description">
                                        <div class="form-group form-group-textarea field-description">
                                            <label for="description" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'विवरण';
                                                else:
                                                 echo   'Description';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                            </label>
                                            <textarea name="description" id="description" class="form-control frozen mb-4" rows="1" cols="30" required data-bv-notempty-message="Description is required"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="div-emailid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="emailverify-emailid" class="form-group form-group-emailverify field-emailid">
                                                    <label for="emailid" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ईमेल';
                                                else:
                                                 echo   'Email';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="email" name="emailid" id="emailid" data-bv-email-regexp="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" data-bv-email-message="Please enter the valid email id." class="form-control frozen emailverify mb-4" autocomplete="off" required data-bv-notempty-message="Email is required" />
                                                        <div class="input-group-append">
                                                            <button type="button" onclick="sendOTP()" id="email-sendotp-button" class="btn btn-info sent_otp_btn" type="button"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'OTP भेजें';
                                                else:
                                                 echo   'Send OTP';
                                                endif; ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-none" id="show_email_otp_div">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="emailverify-emailid" class="form-group form-group-emailverify field-emailid">
                                                    <label for="emailid" class="control-label"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ओटीपी दर्ज करें';
                                                else:
                                                 echo   'Enter OTP';
                                                endif; ?><span style="color:#ff0000;">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <input maxlength="6" data-bv-stringlength-min="6" data-bv-stringlength-message="Minimum 6 required" type="text" name="email_otp" id="email_otp" class="form-control emailverify" autocomplete="off" data-bv-notempty-message="OTP is required" />
                                                        <div class="input-group-append">
                                                            <button type="button" onclick="verify_OTP()" id="equire-email-sendotp-button" class="btn btn-info" type="button"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ओटीपी सत्यापित करें';
                                                else:
                                                 echo   'Verify OTP';
                                                endif; ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id='endtime_div' style="display: none;" class='form-text small text-muted mg-0 my-auto' style='margin-top:0;'><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ओटीपी पुनः भेजें -';
                                                else:
                                                 echo   'Resend OTP in - ';
                                                endif; ?><a href='javascript:void(0);'><span id='resent_otp_endtimer' class='text-primary'></span></a>
                                        </div>
                                        <small id='resent_otp_div' class="my-auto"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   "अभी तक ओटीपी नहीं मिला?";
                                                else:
                                                 echo   "Didn't receive the OTP yet?";
                                                endif; ?> <a href='javascript:void(0);' style='font-size: 12px;font-weight: 500;color: #001A94;' onclick='otp_RESENT();'><?php  if($get_configured_lang == 'HI'): 
                                                    echo   'ओटीपी पुनः भेजें';
                                                   else:
                                                    echo   'Resend OTP';
                                                   endif; ?></a></small>
                                        <span id="show_verified_otp" class="d-none text-success fw-bold"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ओटीपी सफलतापूर्वक सत्यापित';
                                                else:
                                                 echo   'OTP Verified Successfully';
                                                endif; ?></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="user_captcha"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सत्यापन';
                                                else:
                                                 echo   'Verification';
                                                endif; ?><span class="text-danger">*</span></label>
                                                <input type="text" maxlength="5" autocomplete="off" class="form-control text" required name="user_captcha" id="user_captcha" data-bv-notempty-message="Captcha is required" />
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="captcha">
                                                    <div class="captchaImg">
                                                        <img id="generated_captcha" src="head/engine/ajax/ajax_generateCaptchaImageForEnquiry.php" />
                                                    </div>
                                                    <div class="captchRefresh" onclick="refreshCaptcha();">
                                                        <img src="<?= SEOURL; ?>assets/front/images/refresh-icon.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- zip code here -->
                                    <div class="col-md-6" id="div-zipcode">
    <div class="form-group form-group-text field-zipcode">
        <label for="zipcode" class="control-label"><?php if ($get_configured_lang == 'HI'):
            echo 'पिन कोड';
        else:
            echo 'Zip Code';
        endif;?><span style="color:#ff0000;">*</span>
        </label>
        <input type="text" name="zipcode" id="zipcode" class="form-control frozen text mb-4" autocomplete="off" required data-bv-notempty-message="Zip Code is required" data-bv-regexp="true" data-bv-regexp-regexp="^\d{6}$" data-bv-regexp-message="Enter a valid 6-digit Zip Code" maxlength="6" />
    </div>
</div>

                                     <!-- end zip code -->
                                </div>
                                <div class="row allbtn">
                                    <button type="button" onclick="submitForm()" class=" btn loginBtn editSubmitBtn m-0 submit-btn" id="enquire_now" disabled><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'जमा करना';
                                                else:
                                                 echo   'Submit';
                                                endif; ?></button>
                                    <button class="btn resetBtn btn-reset formreset editSubmitBtn reset-btn" type="reset"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'रीसेट';
                                                else:
                                                 echo   'Reset';
                                                endif; ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
        <script>
            $('#enquiry_form_submit').bootstrapValidator({
                excluded: [':disabled'],
            });

            function sendOTP() {
                var name = $('#name').val();
                var mobile_number = $('#mobile_number').val();
                var location = $('#location').val();
                var need_for = $('#need_for').val();
                var qoas = $('#qoas').val();
                var description = $('#description').val();
                var emailid = $('#emailid').val();
                var zipcode = $('#zipcode').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_enquiry.php?type=send_otp",
                    data: {
                        _name: name,
                        _mobile_number: mobile_number,
                        _location: location,
                        _need_for: need_for,
                        _qoas: qoas,
                        _description: description,
                        _emailid: emailid,
                        _zipcode: zipcode
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            if (response.errors.name_required) {
                                showAlert('Error', response.errors.name_required);
                            } else if (response.errors.mobile_number_required) {
                                showAlert('Error', response.errors.mobile_number_required);
                            } else if (response.errors.location_required) {
                                showAlert('Error', response.errors.location_required);
                            } else if (response.errors.need_for_required) {
                                showAlert('Error', response.errors.need_for_required);
                            } else if (response.errors.qoas_required) {
                                showAlert('Error', response.errors.qoas_required);
                            } else if (response.errors.description_required) {
                                showAlert('Error', response.errors.description_required);
                            } else if (response.errors.emailid_required) {
                                showAlert('Error', response.errors.emailid_required);
                            }else if(response.errors.zipcode_required){
                                showAlert('Error', response.errors.zipcode_required);
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
                    url: "head/engine/ajax/ajax_manage_enquiry.php?type=otp_resent",
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
                    url: "head/engine/ajax/ajax_manage_enquiry.php?type=verify_otp",
                    data: {
                        _email_otp: email_otp
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            if (response.errors.enquiry_email_otp_required) {
                                showAlert('Error', response.errors.enquiry_email_otp_required);
                            } else if (response.errors.enquiry_email_otp_invalid) {
                                showAlert('Error', response.errors.enquiry_email_otp_invalid);
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
                $('#enquire_now').removeAttr('disabled');
            });
            // JavaScript/jQuery code for refreshing the captcha
            function refreshCaptcha() {
                $.ajax({
                    type: "GET",
                    url: "head/engine/ajax/ajax_generateCaptchaImageForEnquiry.php?refresh=true",
                    dataType: "json",
                    success: function(response) {
                        // Update the src attribute of the captcha image
                        $("#generated_captcha").attr("src", "head/engine/ajax/ajax_generateCaptchaImageForEnquiry.php?" + new Date().getTime());

                        // Clear the entered_captchatext field
                        $("#user_captcha").val("");
                    },
                    error: function(error) {
                        showAlert('Error', error);
                        // console.log(error);
                    }
                });
            } 
// by gautam capta
//             function refreshCaptcha() {
//     $.ajax({
//         type: "GET",
//         url: "head/engine/ajax/ajax_generateCaptchaImageForEnquiry.php?refresh=true",
//         dataType: "json",
//         success: function(response) {
//             // Assuming 'response' is already in JSON format
//             if (response.success === false) {
//                 // Check for captcha error and show an alert
//                 if (response.errors && response.errors.captcha_verification_failed) {
//                     showAlert('Error', 'Captcha verification failed. Please try again.');
//                 } else {
//                     // Handle other errors (if any)
//                     showAlert('Error', 'An error occurred. Please try again.');
//                 }
//             } else {
//                 // Success case (if no CAPTCHA error and the process is successful)
//                 showAlert('Success', 'Captcha refreshed successfully!');
//                 // You can also reload the page if needed, or perform any other action.
//                 // location.reload();
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle AJAX error
//             alert('Error occurred: ' + error);
//         }
//     });
// }

// by end gautam capta

            // JavaScript/jQuery code for inserting the data

            // JavaScript/jQuery code for inserting the data
            // function submitForm() {
            //     // Validate the form using Bootstrap Validator
            //     var bootstrapValidator = $('#enquiry_form_submit').data('bootstrapValidator');
            //     if (!bootstrapValidator.isValid()) {
            //         // Form validation failed
            //         return false;
            //     }
            //     var form = $('#enquiry_form_submit')[0];
            //     var data = new FormData(form);
            //     // $(this).find("button[type='submit']").prop('disabled', true);
            //     $.ajax({
            //         type: "post",
            //         url: 'head/engine/ajax/ajax_manage_enquiry.php?type=add',
            //         data: data,
            //         processData: false,
            //         contentType: false,
            //         cache: false,
            //         timeout: 80000,
            //         dataType: 'json',
            //         encode: true,
            //     }).done(function(response) {
            //         // console.log(data);
            //         if (!response.success) {
            //             //NOT SUCCESS RESPONSE
            //             if (response.errors.captcha_verification_failed) {
            //                 showAlert('error', 'Captcha Verification Failed');
            //             }
            //         } else {
            //             //SUCCESS RESPOSNE
            //             if (response.result == true) {
            //                 //RESULT SUCCESS
            //                 form.reset();
            //                 showAlert('success', response.result_success);
            //                 <?php unset($_SESSION['enquiry_captcha']); ?>
            //                 setInterval(function() {
            //                     location.reload();
            //                 }, 5000);
            //             } else if (response.result == false) {
            //                 //RESULT FAILED
            //                 showAlert('error', response.result_error);
            //             }
            //         }
            //         if (response == "OK") {
            //             return true;
            //         } else {
            //             return false;
            //         }
            //     });
            //     // Prevent default form submission
            //     return false;
            // }

//             function submitForm() {
//                    // Check if OTP verification is done

//                    if ($('#show_verified_otp').hasClass('d-none')) {
//         // Email verification is not done
//         showAlert('Error', 'Please complete the email verification process first.');
//         return false; // Prevent form submission
//     }

   
//     // Validate the form using Bootstrap Validator
//     var bootstrapValidator = $('#enquiry_form_submit').data('bootstrapValidator');
//     if (!bootstrapValidator.isValid()) {
//         // Form validation failed
//         return false;
//     }

//     var form = $('#enquiry_form_submit')[0];
//     var data = new FormData(form);

//     $.ajax({
//         type: "POST",
//         url: 'head/engine/ajax/ajax_manage_enquiry.php?type=add',
//         data: data,
//         processData: false,
//         contentType: false,
//         success: function(response) {
//             console.log("Response from server:", response); // Log response for debugging
//             // var result = JSON.parse(response);
//             console.log("Response from server ANoop:", response);

//             if (response.status === 'success') {
//                  // Show the success message from backend
//                  showAlert('Success', result.message);
//                     form.reset(); // Reset the form
                    
//                     <?php unset($_SESSION['enquiry_captcha']); ?> // Unset captcha session
                    
//                     setTimeout(function() {
//                         location.reload(); // Reload the page on success
//                     }, 3000); // Delay reload to show success message
//             } else if (response.errors && response.errors.captcha_verification_failed) {
//                 // Show captcha error message
//                 showAlert('Error', 'Invalid captcha. Please try again.');
//             } else {
//                 // Handle other possible errors
//                 showAlert('Error', 'An unexpected error occurred. Please try again Gautam');
//             }
//         },
//         error: function(xhr, status, error) {
//             // Handle error case
//             showAlert('Error occurred:', error);
//             // alert('Error occurred: ' + error);
//         }
//     });
// }

function submitForm() {
    // Check if OTP verification is done
    if ($('#show_verified_otp').hasClass('d-none')) {
        showAlert('Error', 'Please complete the email verification process first.');
        return false; // Prevent form submission
    }

    // Validate the form using Bootstrap Validator
    var bootstrapValidator = $('#enquiry_form_submit').data('bootstrapValidator');
    if (!bootstrapValidator.isValid()) {
        // Form validation failed
        return false;
    }

    var form = $('#enquiry_form_submit')[0];
    var data = new FormData(form);

    $.ajax({
        type: "POST",
        url: 'head/engine/ajax/ajax_manage_enquiry.php?type=add',
        data: data,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log("Raw response from server:", response); // Log raw response for debugging

            try {
                // Ensure response is parsed correctly
                let result = typeof response === 'string' ? JSON.parse(response) : response;

                console.log("Parsed response:", result);
                // do break code from here
        



                if (result.status === 'success') {
                    // Show the success message from backend
                    showAlert('Success', result.message);
                    form.reset(); // Reset the form

                    <?php unset($_SESSION['enquiry_captcha']); ?> // Unset captcha session

                    setTimeout(function () {
                        location.reload(); // Reload the page on success
                    }, 3000); // Delay reload to show success message
                } else if (result.errors && result.errors.captcha_verification_failed) {
                    // Show captcha error message
                    showAlert('Error', 'Invalid captcha. Please try again.');
                } else {
                    // Handle other possible errors
                    showAlert('Error', 'An unexpected error occurred. Please try again.');
                }
            } catch (e) {
                console.error("Error parsing server response:", e);
                console.error("Response content:", response);
                showAlert('Error', 'An error occurred while processing the response. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            // Handle error case
            console.error("AJAX error:", status, error);
            showAlert('Error', 'An error occurred while submitting the form. Please try again.');
        }
    });
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
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
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

        <?php
        if ($code == '1') {
            $displayMSG_globalclass->displayMSG($code, "Success", 'Record created Successfully', 'success');
        }
        ?>

        <script>
        let currentZoom = 100; // Initial zoom level

        function changeZoom(action) {
            const zoomIncrement = 5;

            if (action === 'decrease' && currentZoom > 50) {
                currentZoom -= zoomIncrement;
            } else if (action === 'increase' && currentZoom < 200) {
                currentZoom += zoomIncrement;
                    }

            document.body.style.zoom = `${currentZoom}%`;
            }

        function resetZoom() {
            currentZoom = 100;
            document.body.style.zoom = `${currentZoom}%`;
            }

        </script>
</body>

</html>
