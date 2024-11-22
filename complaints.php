<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Online Complaints / Grievance - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-family.css" />
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
                        <li><a class="active" href="index#">Grievance Form</a></li>
                    </ul>
                </div>
            </div>
        </section>


        <section class="complaint">
            <div class="container">
                <div class="title-content bold-title with-underline green">
                    <h2>Grievance Redressal Escalation Levels</h2>
                </div>
                <div class="tabing-main" data-aos="zoom-in">
                    <div class="tabing-main-parent">
                        <ul class="tab-titles">
                            <li><a href="#tab-1">Level 01</a></li>
                            <li><a href="#tab-2">Level 02</a></li>
                            <li><a href="#tab-3">Level 03</a></li>
                        </ul>
                    </div>
                    <div class="tabContainer">
                        <div class="tab-content-main" id="tab-1">
                            <div class="mobile-tab-title"><a class="r-tabs-anchor">Level 01</a></div>
                            <div class="complaint-inner">
                                <div class="features-ul">
                                    <p>You may file your complaint at the branch level/ write to us /register your
                                        complaints online.</p>
                                    <h3>Option 1. Complaint in Person</h3>
                                    <ul>
                                        <li>You may visit the Branch in person and lodge your complaint in the Complaint
                                            Book / Register.</li>
                                        <li>Handover your written complaint to the Branch Incharge and obtain an
                                            acknowledgement</li>
                                        <li>Drop your written complaint in the Complaint / Suggestion Box kept in the
                                            Branch Office and obtain an acknowledgement.</li>
                                        <!-- <li><a href="assets/front/pdf/GrievanceRedressal-EscalationMatrix.xlsx">Nodal
                                                officers for handling Grievance</a></li> -->
                                    </ul>
                                    <h3>Option 2. Write to us at</h3>
                                    <ul>
                                        <li>Submit your grievance through post/mail/email to SIDBI Branch Offices.</li>
                                        <li><a href="contact-us">Click here to check details of SIDBI Branch
                                                Offices and its respective postal address, email id</a></li>
                                    </ul>
                                    <h3>Option 3. Fill an Online Complaint Form</h3>
                                    <ul>
                                        <li>You may submit your grievance through online registration of complaints /
                                            Grievances</li>
                                        <li><a href="grievance-forms">Click here to go to Online Complaint
                                                Form</a></li>
                                    </ul>
                                    <p>When a complaint is registered through any one of the above channels, a unique
                                        Complaint ID will be generated/issued. In case of non-receipt of reply within 8
                                        working days of your registering the complaint or unsatisfactory reply, you can
                                        escalate your complaint to Level II, using your Complaint ID.</p>
                                    <p>Please make sure that you provide us with the following details while registering
                                        a grievance with us. It will enable us to address your concern(s) in a holistic
                                        and timely manner.</p>
                                    <ul>
                                        <li>Your full name</li>
                                        <li>Customer ID, if you are an existing Customer</li>
                                        <li>Your contact details (address, telephone number and e-mail)</li>
                                        <li>Reference number of Transaction/Complaint ID, depending on your purpose of
                                            contact</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-main" id="tab-2">
                            <div class="mobile-tab-title"><a class="r-tabs-anchor">Level 02</a></div>
                            <div class="complaint-inner">
                                <p>In case of non-receipt of reply within 8 working days of registering your Complaint
                                    or unsatisfactory reply, you can escalate complaint to Level II (Regional Incharge),
                                    using Complaint ID.</p>
                                <p>For escalation of your grievance to Regional Incharge*</p>
                                <div class="complaint-search">
                                    <p>Enter your complaint ID: <input type="text" name="complaint_id_level_2" id="complaint_id_level_2" class="finding"> <button type="button" class="complaint_search_btn_in_level_2" data-type="l2" tabdata="tab-2"><i class="fa fa-search text-search"></i></button></p>
                                </div>
                                <p>“Regional Office Name & Address/RO Incharge/ RO Incharge email id” will populate</p>
                                <div class="regData text-center" id="level_two">

                                </div>
                            </div>
                        </div>
                        <div class=" tab-content-main" id="tab-3">
                            <div class="mobile-tab-title"><a class="r-tabs-anchor">Level 03</a></div>
                            <div class="complaint-inner">
                                <p>If your complaint is not resolved satisfactorily within 5 working days from date of
                                    escalation, you may contact Chief Grievance Officer / Alternate Chief Grievance
                                    Officer.</p>
                                <div class="complaint-search">
                                    <form method="get" accept-charset="utf-8" id="caseStatusFilterForm" name="caseStatusFilterForm" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                        <p>Enter your complaint ID: <input type="text" name="complaint_id_level_3" id="complaint_id_level_3" class="finding"> <button type="button" class="complaint_search_btn_in_level_3" data-type="l3" tabdata="tab-3"><i class="fa fa-search text-search"></i></button></p>
                                </div>

                                <div class="regData" id="level_three">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $('#level_two').hide();
            $('#level_three').hide();
            $('.complaint_search_btn_in_level_2').click(function() {
                var complaint_id_level_2 = $('#complaint_id_level_2').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_grievances_status.php?type=check_complaint_status_in_level_2",
                    data: {
                        _complaint_id_level_2: complaint_id_level_2
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            scrollToTop();
                            if (response.errors.complaintid_required) {
                                showAlert('Error', response.errors.complaintid_required);
                            }
                            //Error
                        } else {
                            //Success
                            if (response.result_error) {
                                $('#level_two').show();
                                $('#level_two').html('');
                                $('#level_two').html(response.result_error);
                            } else {
                                $('#level_two').show();
                                $('#level_two').html('');
                                $('#level_two').html(response.result_success);
                            }
                        }
                    }
                });
            });

            $('.complaint_search_btn_in_level_3').click(function() {
                var complaint_id_level_3 = $('#complaint_id_level_3').val();
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_manage_grievances_status.php?type=check_complaint_status_in_level_3",
                    data: {
                        _complaint_id_level_3: complaint_id_level_3
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            scrollToTop();
                            if (response.errors.complaintid_required) {
                                showAlert('Error', response.errors.complaintid_required);
                            }
                            //Error
                        } else {
                            //Success
                            if (response.result_error) {
                                $('#level_three').show();
                                $('#level_three').html('');
                                $('#level_three').html(response.result_error);
                            } else {
                                $('#level_three').show();
                                $('#level_three').html('');
                                $('#level_three').html(response.result_success);
                            }
                        }
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

            // Function to scroll to the top of the page
            function scrollToTop() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            }

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
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.htm" target="_blank" title="Udyam Registration"><img src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="<?= SEOURL; ?>assets/front/images/logo2.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="<?= SEOURL; ?>assets/front/images/logo3.png" class="img-fluid w-100"></a>
                                </div>
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
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://financialservices.gov.in/beta/en" target="_blank" title="Department of financial services"><img src="<?= SEOURL; ?>assets/front/images/department-logo.jpg" class="img-fluid w-100"></a>
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
</body>

</html>