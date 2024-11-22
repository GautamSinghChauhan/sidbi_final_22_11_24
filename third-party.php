<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>
        Dates of Third-party Audit Of Voluntary Disclosures - Small Industries Development Bank of India
    </title>
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
    .features-ul ul li:after {
        display: none;
    }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?>

        <!-- <section class="about-us-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Tenders</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="tenders">Tenders</a></li>
                    </ul>
                </div>
            </div>
        </section> -->
        <!-- <section class="inner-section-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="over-cont wow fadeInDown">
                            <h2>	
Dates of Third-party Audit Of Voluntary Disclosures</h2>
                            <p>Hiring of Housekeeping, &nbsp;Service Agency at SIDBI Hyderabad</p>
                            <div class="box-2">
                                <ul>
                                    <h3>Documents</h3>
                                    <li>
                                        <a title="View" target="_blank"
                                            href="/files/tenders/GeM-Bidding-5752118-(2).pdf"><i
                                                class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            GeM-Bidding-5752118-(2).pdf</a>
                                    </li>
                                    <li>
                                        <a title="View" target="_blank"
                                            href="/files/tenders/GeM-Bidding-Corr-5752118-1-(1).pdf"><i
                                                class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            GeM-Bidding-Corr-5752118-1-(1).pdf</a>
                                    </li>
                                    <li>
                                        <a title="View" target="_blank"
                                            href="/files/tenders/RevMP_RFP_Housekeeping_Hyd.pdf"><i
                                                class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            RevMP_RFP_Housekeeping_Hyd.pdf</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="about-us-banner" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'स्वैच्छिक प्रकटीकरण के तृतीय-पक्ष ऑडिट की तिथियां';
                                                else:
                                                 echo 'Dates of Third-party Audit Of Voluntary Disclosures';
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
                                                 echo 'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'स्वैच्छिक प्रकटीकरण के तृतीय-पक्ष ऑडिट की तिथियां';
                                                else:
                                                 echo 'Dates of Third-party Audit Of Voluntary Disclosures';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="press-releases mt-5" data-aos="fade-right" data-aos-duration="2000">
            <div class="container">
                 <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT `thirdparty_ID`, `thirdparty_title`, `thirdparty_title_hindi`, `thirdparty_content`, `thirdparty_content_hindi`, `status` FROM `thirdparty` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $thirdparty_ID = $row["thirdparty_ID"];
                                        $thirdparty_title = $row["thirdparty_title"];
                                        $thirdparty_title_hindi = $row["thirdparty_title_hindi"];
                                        $thirdparty_content = html_entity_decode($row["thirdparty_content"]);
                                        $thirdparty_content_hindi = html_entity_decode($row["thirdparty_content_hindi"]);
                                    ?>
                       
                  
                <div class="inner">
                    <div class="">
                        <div class="title-content bold-title with-underline green">
                        <h3><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $thirdparty_title_hindi;
                                                else:
                                                 echo  $thirdparty_title;
                                                endif; ?></b></h3>

                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                            <?php  if($get_configured_lang == 'HI'): 
               echo  $thirdparty_content_hindi;
        else:
       echo  $thirdparty_content;
       endif; ?></tr>
                    <tbody>
                </table>
                <?php endwhile; ?>
            </div>
        </section>
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
                                        src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank"
                                    title="National Portal ( Jan Samarth )"><img
                                        src="<?= SEOURL; ?>assets/front/images/logo2.png" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank"
                                    title="Ministry of Micro, Small and Medium Enterprises"><img
                                        src="<?= SEOURL; ?>assets/front/images/logo3.png" class="img-fluid w-100"></a>
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
                                        src="<?= SEOURL; ?>assets/front/images/logo5.png" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank"
                                    title="Central Vigilance Commission"><img
                                        src="<?= SEOURL; ?>assets/front/images/logo6.jpg" class="img-fluid w-100"></a>
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