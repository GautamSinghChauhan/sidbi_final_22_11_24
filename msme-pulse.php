<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>MSME Pulse - Small Industries Development Bank of India</title>
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
        <section class="about-us-banner" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'एमएसएमई पल्स';
                                                else:
                                                 echo   'MSME Pulse';
                                                endif; ?>
                                                </h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'एमएसएमई पल्स';
                                                else:
                                                 echo   'MSME Pulse';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
       $select_msme_pluse = sqlQUERY_LABEL("SELECT `msme_pluse_id`, `msme_title`, `msme_hindi_title`, `msme_pluse_description`, `msme_pluse_hindi_description` FROM `js_msmepulse` where `deleted`='0' ");
       while($row =sqlFETCHARRAY_LABEL($select_msme_pluse)):
        $msme_pluse_id =$row['msme_pluse_id'];
        $msme_title =$row['msme_title'];
        $msme_hindi_title =$row['msme_hindi_title'];
        $msme_pluse_description =$row['msme_pluse_description'];
        $msme_pluse_hindi_description =$row['msme_pluse_hindi_description'];
        $msme_pluse_description = html_entity_decode(html_entity_decode($row['msme_pluse_description']));
        $msme_pluse_hindi_description = html_entity_decode(html_entity_decode($row['msme_pluse_hindi_description']));
        
       endwhile;


?>
        <div class="cms MsmePulse">
            <div class="container">
                <h2><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $msme_hindi_title;
                                                else:
                                                 echo  $msme_title;
                                                endif; ?></h2>
               <?php  if($get_configured_lang == 'HI'): 
                                                 echo  $msme_pluse_hindi_description;
                                                else:
                                                 echo  $msme_pluse_description;
                                                endif; ?>
                <!-- <p data-translate="para1-msme">Information is key to decision making and if it is available at the right time, meaningful interventions can be made.</br>Since structured data in respect of MSME is not available during the year, no early signs are available to help taking decisions to those who matter and make policies, be it bankers or policy maker A comprehensive document based on close monitoring and tracking of MSME segment providing insights to policy makers, therefore, becomes imperative.</br>
                    Till date, no such report based on a on a study done on over 5 Million active MSMEs having access to formal credit, with live credit facilities in the Indian banking system, is available.
                <p data-translate="para2-msme"> While there is some data available with respect to Banks, there is no data in respect to NBFCs. Further, such data does not tell as to how many new entrepreneurs have accessed credit and what is the situation across different states. The launch of MSME Pulse, a quarterly comprehensive report, is an attempt to fill this gap and aims to provide the credit industry with trends and insights for making information oriented business decisions.
                </p>
                <p><strong>MSME Pulse- Edition XIV– Highlights</strong></p>
                <p>The Indian economy has sustained its growth momentum, with overall economic activity remaining
                    resilient. MSME sector, which is the backbone of India’s economy, reflects these trends and shows
                    steady credit growth trajectory. This edition of MSME Pulse decodes Commercial1 credit insights from
                    FY 23-Q4 and its findings indicate:</p>
                <ul>
                    <li>Commercial credit growth momentum continues: Commercial credit portfolio grew at 15%
                        year-over-year (YOY) and credit exposure stood at INR 27.7 Lakh Crores in FY 23-Q4.</li>
                    <li>Highest growth in ‘micro’-segment originations: New-originations for FY 23-Q4 stood at INR
                        241K Crore. ‘Micro’ segment (credit exposure less than INR 1 Crore) registered 23% YOY
                        growth in originations value while ‘small’ segment (credit exposure between INR 1 Crore to
                        INR 10 Crores) grew at a mere 1%. Also, originations value on ‘medium’ segment (credit
                        exposure between INR 10 Crores to INR 50 Crores) fell by 19% YOY</li>
                    <li>Growth directly proportional to industrialization: Higher MSME credit growth is seen in
                        states that have higher industrialization. State wise analysis shows that credit growth was
                        highest in Uttar Pradesh, Karnataka, Telangana and Haryana, primarily driven by ‘micro’
                        loans. Amongst these four states, Karnataka exhibited highest growth rate of 8%. Credit
                        supply by Public Sector Banks to ‘micro’ enterprises in Karnataka grew by 119% YOY.</li>
                    <li>MSME credit performance improved: Following the pandemic induced stress, delinquency
                        rates had surged. It has gradually declined through the quarters as MSMEs continued to
                        serve their credit obligations well. Delinquency rates have dropped across all the three
                        lender categories, with private banks being the lowest at 1.4%.</li>
                    <li>Bridging the demand supply gap is priority call-to-action for lenders: With rising demand,
                        improved credit performance and promising economic growth prospects, time is conducive
                        for lenders to expand their MSME credit portfolios. India has approximately 630 Lakh MSME
                        corporates of which only 250 Lakh have ever availed credit from formal sources. While the
                        sector continues to grow at a projected compound annual growth rate (CAGR) of 2.5%, the
                        approximate number of MSME corporate entities is expected to touch 750 Lakh by FY 23. Of
                        these, around 500 Lakh are expected to be NTC MSME entities. Lenders can tap into this
                        vast segment by identifying deserving NTC MSMEs, connecting with them and customising
                        credit products for their requirements.</li>
                    <li>New-to-credit (NTC) entities will define the next phase of MSME credit growth: This edition
                        of MSME Pulse covers a study on micro NTC MSMEs and analyses the potential of this
                        segment in catalysing MSME credit growth. In FY 23-Q4, 56% originations were NTC driving
                        home the fact that NTC segment will be instrumental in defining the next phase of MSME
                        credit growth. NTC segment contributed more than 61% of originations within ‘micro’ loans
                        with high share of borrowers who have availed sub 10 Lakh loan.</li>
                    <li>With rapid evolution of information infrastructure and technology, MSME credit
                        underwriting has become information oriented, quicker, and more trustworthy. Credit
                        institutions must astutely wield the power of data for identifying deserving NTC MSMEs and
                        supply credit to them to scale sustainable growth.</li>
                </ul> -->


                <div class="row">
                    <div class="customImageBlock h-250"><a href="<?= SEOURL; ?>msme-report-august-2023" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/MSME_Report_August_2023.png" alt="August 23" title="August 23"></a>
                    </div>
                    <div class="customImageBlock h-250"><a href="<?= SEOURL; ?>msme-pulse-march-23" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/MSME-Pulse-March2023-web-20230322_page-0001.jpg" alt="March 23" title="March 23"></a></div>

                    <div class="customImageBlock h-250"><a href="<?= SEOURL; ?>msme-pulse-august-22" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/aug-final-2022.png" alt="August 22" title="August 22"></a>
                    </div>
                    <div class="customImageBlock h-250"><a href="<?= SEOURL; ?>msme-pulse-all-edition" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/structural13.jpg" alt="MSME Pulse - All Editions" title="MSME Pulse - All Editions"></a></div>
                </div>
            </div>
        </div>

        <!-- User Download Popup form -->
        <div class="modal fade msme-cluster-development-popup default-form" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fill in the form below to receive the product
                            through your Email Id</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" method="post" accept-charset="utf-8" id="frmuserdownloads" name="frmuserdownloads" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                            <div style="display:none;"><input type="hidden" name="_method" value="POST" /><input type="hidden" name="_csrfToken" autocomplete="off" id="_csrfToken_1698734996.7872" value="IAeE5+vUqHlGVbY4pmND0pv6RqCIyEJcdpeqtE36u04QA8tyP7yo6eG0PzDPGreOb5Bh+tEgnWxnEP7ePvgkiQ==" />
                            </div>
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
                                                                <button onclick="sendemailotp('email');" id="email-sendotp-button" class="btn btn-info" type="button">Send OTP</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div style="display:none;" id="field-otp-email" class="form-group form-group-otp field-otp-email">
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
                                                    <div class="captchRefresh" onclick="refreshcaptcha();"><img src="<?= SEOURL; ?>assets/front/images/refresh-icon.png"></div>
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