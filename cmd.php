<!-- updated : 1:30 PM  | 30-12-23 -->
<?php
        require_once('head/jackus.php');
        ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Shri Sivasubramanian Ramann - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link href="../https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
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
        <section class="about-us-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1 data-translate="directorNAME"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'श्री सिवसुब्रमणियन रमण';
                                                else:
                                                 echo   'Shri Sivasubramanian Ramann
                                                 ';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a href="about#board-directors"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'निदेशक';
                                                else:
                                                 echo   'Directors
                                                 ';
                                                endif; ?></a></li>
                        <li><a class="active" href="1.html" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'श्री सिवसुब्रमणियन रमण';
                                                else:
                                                 echo   'Shri Sivasubramanian Ramann
                                                 ';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="speakers">
            <div class="container">
                <div class="speakers-inner">
                    <div class="d-flex flex-wrap">
                        <div class="speakers-image text-center userp" data-aos="fade-right" style="display: block;">
                            <div class="borad-profile-user">
                                <img class="img-thumbnail" src="directors/CMD-SIDBI.jpeg"
                                    alt="Shri Sivasubramanian Ramann">

                            </div>
                        </div>
                        <div class="speakers-info" data-aos="fade-left">
                            <h2 ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'श्री सिवसुब्रमणियन रमण';
                                                else:
                                                 echo   'Shri Sivasubramanian Ramann
                                                 ';
                                                endif; ?></h2>
                            <div class="center-block-sec content profile-block-content mCustomScrollbar _mCS_2 mCS_no_scrollbar"
                                style="height:250px;">
                                <div id="mCSB_2" tabindex="0">
                                    <div id="mCSB_2_container" style="position:relative; top:0; left:0;" dir="ltr">
                                        <p>
                                        <p><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'श्री शिवसुब्रमण्यम रमन, 1991 बैच के हैं
                                                 भारतीय लेखापरीक्षा के
                                                 एवं लेखा सेवा (आईए एवं एएस)। वह अध्यक्ष एवं प्रबंध के रूप में शामिल हुए
                                                 निदेशक, भारतीय लघु उद्योग विकास बैंक (सिडबी)।
                                                 19 अप्रैल 2021। सिडबी में शामिल होने से पहले, वह नेशनल के एमडी और सीईओ थे
                                                 ई-गवर्नेंस सर्विसेज लिमिटेड (NeSL) दिसंबर 2016 से
                                                 एनईएसएल में शामिल होने पर, श्री रमनन प्रधान महालेखाकार थे
                                                 (ऑडिट), झारखंड, रांची 2015-2016 के दौरान। उन्होंने सेबी के साथ काम किया
                                                 2007 और 2013 के बीच सीजीएम और बाद में कार्यकारी निदेशक।';
                                                else:
                                                 echo   'Shri Sivasubramanian Ramann, belongs to 1991 batch
                                                 of Indian Audit
                                                 & Accounts Service (IA & AS). He joined as Chairman & Managing
                                                 Director, Small Industries Development Bank of India (SIDBI) from
                                                 19th April 2021. Before joining SIDBI, he was MD & CEO of National
                                                 E-Governance Services Limited (NeSL) from December 2016. Prior to
                                                 joining NeSL, Shri Ramann was the Principal Accountant General
                                                 (Audit), Jharkhand, Ranchi during 2015-2016. He worked with SEBI as
                                                 CGM and later Executive Director between 2007 & 2013.
                                                 ';
                                                endif; ?></p>
                                        <p><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'के अधीन कार्यालयों में विभिन्न पदों पर रहे
                                                 भारत के C&AG में
                                                 विभिन्न राज्यों और C&AG के कार्यकारी सचिव के रूप में भी काम किया
                                                 भारत। उन्होंने भारतीय उच्चायोग में प्रथम सचिव के रूप में काम किया,
                                                 विभिन्न भारतीय दूतावासों के खातों के ऑडिट के लिए लंदन
                                                 यूरोप. वह सेंट स्टीफंस कॉलेज से बीए (ऑनर्स) अर्थशास्त्र हैं
                                                 एफएमएस, दिल्ली विश्वविद्यालय से एमबीए। उन्होंने एम.एससी. किया है. विनियमों में
                                                 लंदन स्कूल ऑफ इकोनॉमिक्स से और प्रमाणित आंतरिक लेखा परीक्षक से
                                                 आईआईए फ्लोरिडा। उन्होंने मुंबई यूनिवर्सिटी से एलएलबी और पोस्ट की पढ़ाई पूरी की
                                                 प्रतिभूति कानून में स्नातक डिप्लोमा।';
                                                else:
                                                 echo   'He held various positions in the offices under the
                                                 C&AG of India in
                                                 various States and also worked as Executive Secretary to the C&AG of
                                                 India. He worked as First Secretary, at Indian High Commission,
                                                 London for auditing the accounts of various Indian Embassies in
                                                 Europe. He is BA (Hons) Economics from St Stephens College and
                                                 MBA from FMS, Delhi University. He has done M. Sc. in Regulations
                                                 from London School of Economics and Certified Internal Auditor from
                                                 IIA Florida. He completed LLB from Mumbai University and Post
                                                 Graduate Diploma in Securities Law.
                                                 ';
                                                endif; ?></p>
                                        </p>
                                    </div>
                                    <div id="mCSB_2_scrollbar_vertical"
                                        class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical"
                                        style="display: none;">
                                        <a href="../#" class="mCSB_buttonUp" oncontextmenu="return false;"></a>
                                        <div class="mCSB_draggerContainer">
                                            <div id="mCSB_2_dragger_vertical" class="mCSB_dragger"
                                                style="position: absolute; min-height: 30px; top: 0px;"
                                                oncontextmenu="return false;">
                                                <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                                <div class="mCSB_draggerRail"></div>
                                            </div>
                                        </div>
                                        <a href="../#" class="mCSB_buttonDown" oncontextmenu="return false;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




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


        <?php require_once('public/footer.php'); ?>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js" asp-append-version="true"></script>-->
      

</body>

</html>