<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Green pathways e-series - Small Industries Development Bank of India</title>
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
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
require_once('public/header.php');
?>
        <section class="about-us-banner"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'ग्रीन पाथवे ई-सीरीज़
                                                 ';
                                                else:
                                                 echo  'Green pathways e-series';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo  'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'ग्रीन पाथवे ई-सीरीज़
                                                 ';
                                                else:
                                                 echo  'Green pathways e-series';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <?php
       $select_greenpathway = sqlQUERY_LABEL("SELECT `greenpathway_id`, `greenpathway_description`, `greenpathway_hindi_description` FROM `js_greenpathway` where `deleted`='0' ");
       while($row =sqlFETCHARRAY_LABEL($select_greenpathway)):
        $greenpathway_id  =$row['greenpathway_id'];
        // $msme_title =$row['msme_title'];
        // $msme_hindi_title =$row['msme_hindi_title'];
        $greenpathway_description =$row['greenpathway_description'];
        $greenpathway_hindi_description =$row['greenpathway_hindi_description'];
        $greenpathway_description = html_entity_decode(html_entity_decode($row['greenpathway_description']));
        $greenpathway_hindi_description = html_entity_decode(html_entity_decode($row['greenpathway_hindi_description']));
     
       endwhile;


?>

        <div class="cms Crisidex">
            <div class="container">
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo  $greenpathway_hindi_description;
                                                else:
                                                 echo  $greenpathway_description;
                                                endif; ?>
                <!-- <p>India has adopted “Panchamrit” announced by our Hon’ble Prime Minister at CoP 26 at Glasgow.
                    The entire greening of ecosystem and transitioning to an energy independent, carbon neutral nation
                    is being furthered in a mission mode. SIDBI is helping MSMEs to adopt green and sustainable
                    practices such as energy efficiency, circular economy, solar, etc., in their business processes and
                    adopt low emissions pathways. In this context, SIDBI has developed dedicated thematic mission for
                    this cause, namely:</p>

                <ul>
                    <li><b>Mission Solar</b>- Enabling each Enterprise go Solar</li>
                    <li><b>Mission EV4ECO</b>- Supporting Electric Vehicle Eco system - aligned to GoI’s EV30@30 Mission</li>
                    <li><b>Mission Energy Efficiency</b>- Addressing Energy inefficiency by inducing EE investment in MSME
                        sector</li>
                    <li><b>Mission Waste 2 Environment Taste</b>- Supporting Circular Economy</li>
                    <li><b>Mission Nurture t Nature</b>- Standardised technology basket for facilitating green investments</li>
                </ul>

                <p>A report titled "Unlocking E Mobility," was released during GIFS-Grow annual theme event. This
                    comprehensive document is the result of extensive consultations with over 1000 stakeholders thus
                    drawing insights from diverse perspectives. Building on the lessons learned from the implementation
                    of the 50KEV4ECO scheme, the Green EV Team has endeavoured to disseminate the knowledge
                    gained from its journey in the electric vehicle (EV) landscape. Volume 1 of the Green e series
                    encapsulates valuable insights, expert opinions, various models in EV Ecosystem, comparison of EV
                    with ICE, and industry conversations, making it an indispensable knowledge sharing resource for
                    anyone currently engaged with or seeking involvement in the EV ecosystem. This report intends to
                    position itself as a guide for navigating the evolving landscape of electric mobility in India.</p> -->
                <div class="row">
                    <div class="customImageBlock"><a
                            href="<?= SEOURL; ?>uploads/article/articlefiles/Unlocking emobility_eseries volume I.pdf"
                            target="_blank"><img src="<?= SEOURL; ?>assets/front/images/Unlocking_emobility_eseries.png"
                                alt="Unlocking emobility_eseries volume I"
                                title="Unlocking emobility_eseries volume I"></a></div>
                </div>
            </div>
        </div>

        <!-- User Download Popup form -->
        <div class="modal fade msme-cluster-development-popup default-form" id="exampleModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fill in the form below to receive the product
                            through your Email Id</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="frmuserdownloads"
                            name="frmuserdownloads" data-bv-message="This value is not valid"
                            data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                            data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                            data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input
                                    type="hidden" name="_csrfToken" autocomplete="off" id="_csrfToken_1698735028.8879"
                                    value="7FY5WSb8FYnhKVheXBI7BQPSirCqqjmnjeOt7m9sWeXcUnbM8pQVGUbI0VY1a89Z97it6vNC5pecZPmEHG7GIg==" />
                            </div>
                            <div class="row">
                                <div class="col-md-6" id="userdownloads_fullname_field">
                                    <div class="form-group">
                                        <div class="col-md-12" id="div-full_name">
                                            <div class="form-group form-group-text field-full_name">
                                                <label for="full_name" class="control-label">Name <span
                                                        style="color:#ff0000;">*</span>
                                                </label>
                                                <input type="text" name="full_name" id="full_name" value=""
                                                    class="form-control text" autocomplete="off" required
                                                    data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z\s]+$"
                                                    data-bv-regexp-message="Only Alphabet allowed."
                                                    data-bv-notempty-message="Name  is required" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" id="userdownloads_occupation_field">
                                    <div class="form-group">
                                        <div class="col-md-12" id="div-occupation">
                                            <div class="form-group form-group-select field-occupation">
                                                <label for="occupation" class="control-label">Occupation<span
                                                        style="color:#ff0000;">*</span>
                                                </label>
                                                <select name="occupation" id="occupation"
                                                    class="form-control chosen-select"
                                                    data-bv-notempty-message="Please select Occupation" required>
                                                    <option value="">Select Occupation</option>
                                                    <option value="Govt. Organisation">Govt. Organisation</option>
                                                    <option value="Policy Maker">Policy Maker</option>
                                                    <option value="Student / Research Scholar">Student / Research
                                                        Scholar</option>
                                                    <option value="Aspiring Entrepreneur">Aspiring Entrepreneur</option>
                                                    <option value="Businessman">Businessman</option>
                                                    <option value="Financial Institution / Bank / NBFC / MFI">Financial
                                                        Institution / Bank / NBFC / MFI</option>
                                                    <option value="Others, please specify">Others, please specify
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" id="userdownloads_gender_field">
                                    <div class="form-group">
                                        <div class="col-md-12" id="div-gender">
                                            <div class="form-group form-group-select field-gender">
                                                <label for="gender" class="control-label">Gender<span
                                                        style="color:#ff0000;">*</span>
                                                </label>
                                                <select name="gender" id="gender" class="form-control chosen-select"
                                                    data-bv-notempty-message="Please select Gender" required>
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
                                                <label for="category" class="control-label">Category<span
                                                        style="color:#ff0000;">*</span>
                                                </label>
                                                <select name="category" id="category" class="form-control chosen-select"
                                                    data-bv-notempty-message="Please select Category" required>
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
                                                <input type="text" name="otherocc" id="otherocc" value=""
                                                    class="form-control text" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="userdownloads_email_field">
                                    <div class="form-group">
                                        <div class="col-md-12" id="div-email">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div id="emailverify-email"
                                                        class="form-group form-group-emailverify field-email">
                                                        <label for="email" class="control-label">Email<span
                                                                style="color:#ff0000;">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input onkeydown="return isCheckEmail(event, 'email');"
                                                                type="email" name="email" id="email" value=""
                                                                class="form-control emailverify" autocomplete="off"
                                                                required data-bv-regexp="true"
                                                                data-bv-regexp-regexp="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                                                                data-bv-regexp-message="Email is not valid" />
                                                            <div class="input-group-append">
                                                                <button onclick="sendemailotp('email');"
                                                                    id="email-sendotp-button" class="btn btn-info"
                                                                    type="button">Send OTP</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div style="display:none;" id="field-otp-email"
                                                        class="form-group form-group-otp field-otp-email">
                                                        <div class="input-group">
                                                            <label for="email" class="control-label">Email OTP<span
                                                                    style="color:#ff0000;">*</span></label> <input
                                                                maxlength="4" data-bv-stringlength-min="4"
                                                                data-bv-stringlength-message="Minimum 4 required"
                                                                type="text" name="email_otp" id="email_otp" value=""
                                                                class="form-control email_otp" autocomplete="off"
                                                                required data-bv-notempty-message="OTP is required" />
                                                            <div class="input-group-append">
                                                                <button id="email-verify"
                                                                    onclick="eotpverified('email');"
                                                                    class="btn btn-success" type="button"
                                                                    disabled="disabled">Verify OTP</button>
                                                            </div>
                                                        </div>
                                                        <div id="emailtimer-outer" class="emailtimer"
                                                            style="display: none;">Resend OTP In <span
                                                                id="emailtimer"></span></div>
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
                                                <label for="exampleInputPassword1">Verification<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" maxlength="5" autocomplete="off" class="form-control"
                                                    required name="captchatext" id="captchatext"
                                                    data-bv-notempty-message="Captcha is required" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="captcha">
                                                    <div class="captchaImg"><img id="captcha"
                                                            src="admin/ajax/generateCaptcha.png" /></div>
                                                    <div class="captchRefresh" onclick="refreshcaptcha();"><img
                                                            src="<?= SEOURL; ?>assets/front/images/refresh-icon.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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
        <!-- User Download Popup form END -->
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a
                                        href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.htm"
                                        target="_blank" title="Udyam Registration"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo1.jpg"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank"
                                        title="National Portal ( Jan Samarth )"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo2.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank"
                                        title="Ministry of Micro, Small and Medium Enterprises"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo3.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank"
                                        title="Udyami Mitra"><img src="<?= SEOURL; ?>assets/front/images/logo4.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank"
                                        title="The National Portal of Indian"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo5.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank"
                                        title="Central Vigilance Commission"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo6.jpg"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://financialservices.gov.in/beta/en" target="_blank"
                                        title="Department of financial services"><img
                                            src="<?= SEOURL; ?>assets/front/images/department-logo.jpg"
                                            class="img-fluid w-100"></a>
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