<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="direct-loans-title">Direct Loans - Small Industries Development Bank of India</title>
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

    <!-- Add this in the head section of your HTML -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->

    <style>
        .card-banner {
            background-image: url('assets/front/images/Group\ 129\ \(1\).png');
            background-size: cover;
            background-position: center;
            /* padding-top: 50px;
            padding-bottom: 50px;
            padding-right: 180px;
            padding-left: 180px; */

        }

        .section-two {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            margin: 0;
            background: url('assets/front/images/rocket_banner.png') center/cover no-repeat;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .centered-container p {
            margin-bottom: 0;
            font-size: 20px;
            font-weight: 500;
        }

        .custom-card {

            /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-position: top right;
            color: white;
            border-radius: 0px;
            border: none;
            /* height: 30vh; */
            /* width: 550px; */

            /* Set text color to white or any color that contrasts well with your background */
        }

        .apply-now {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
        }

        .know-button {
            border-radius: 30px;
            padding: 10px 20px 10px 20px;
            border: 1px solid #fff;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            position: relative;
            text-decoration: none;
            display: inline-block;
            overflow: hidden !important;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            background: none;
            z-index: 10;
        }

        .know-button::before {
            content: '';
            position: absolute;
            bottom: 50%;
            left: 0px;
            width: 100%;
            height: 1px;
            display: block;
            -webkit-transform-origin: left top;
            -ms-transform-origin: left top;
            transform-origin: left top;
            -webkit-transform: scale(0, 1);
            -ms-transform: scale(0, 1);
            transform: scale(0, 1);
            -webkit-transition: transform 0.4s cubic-bezier(1, 0, 0, 1);
            transition: transform 0.4s cubic-bezier(1, 0, 0, 1);
        }

        .know-button::before {
            content: '';
            width: 0%;
            height: 100%;
            display: block;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            border: none;
            position: absolute;
            -ms-transform: skewX(-20deg);
            -webkit-transform: skewX(-20deg);
            transform: skewX(-20deg);
            left: -10%;
            opacity: 1;
            top: 0;
            z-index: -12;
            -moz-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
            -o-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
            -webkit-transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
            transition: all .7s cubic-bezier(0.77, 0, 0.175, 1);
            box-shadow: 2px 0px 14px rgba(0, 0, 0, .6);
        }

        .know-button:hover::before {
            -webkit-transform-origin: right top;
            -ms-transform-origin: right top;
            transform-origin: right top;
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            transform: scale(1, 1)
        }

        .know-button:hover {
            /* border: 1px solid #071982; */
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        }

        .know-button::after {
            content: '';
            width: 0%;
            height: 100%;
            display: block;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            position: absolute;
            -ms-transform: skewX(-20deg);
            -webkit-transform: skewX(-20deg);
            transform: skewX(-20deg);
            left: -10%;
            opacity: 0;
            top: 0;
            z-index: -15;
            -webkit-transition: all .94s cubic-bezier(.2, .95, .57, .99);
            -moz-transition: all .4s cubic-bezier(.2, .95, .57, .99);
            -o-transition: all .4s cubic-bezier(.2, .95, .57, .99);
            transition: all .4s cubic-bezier(.2, .95, .57, .99);
            box-shadow: 2px 0px 14px rgba(0, 0, 0, .6);
        }

        .know-button:hover::before,
        .know-button:hover::before {
            opacity: 1;
            width: 116%;
        }

        .know-button:hover::after,
        .know-button:hover::after {
            opacity: 1;
            width: 120%;
        }

        .growth-content {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            /* border: 1px solid #000; */
            border-right: none;

        }

        .growth-image {
            padding: 26px;
            /* background-color: #fff;
        border-radius: 50%; */
            z-index: 2000;

        }

        .growth {
            background: #E7F8FC;
            padding: 20px;
            margin-top: -33px;
        }

        .growth-content-head {
            font-family: Rubik;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;


        }

        .box {
            position: relative;
            width: 320px;
            height: 123px;
            background: #E7F8FC;
            border-radius: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;

        }

        .box::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background-image: conic-gradient(transparent, transparent, #00ccff, #D2DF43);
        }

        .box span {
            position: absolute;
            inset: 3px;
            border-radius: 16px;
            background: #E7F8FC;
            z-index: 1;
            border-radius: inherit;

        }

        .growth-header {
            margin: 2px 22px 2px 4px;
            background-color: #fff;
            border-radius: 50%;
        }

        .offering-title {
            font-family: Rubik;
            font-size: 25px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0em;
            /* text-align: left; */
            margin-top: 30px;
            color: #000;
            position: absolute;
            top: 83%;
            left: 38%;
            color: #fff;
            transform: translate(-50%, -50%);
            z-index: 1;
            /* Ensure the text appears above the image */
        }

        .growth-credit {
            font-family: Rubik;
            font-size: 25px;
            font-weight: 400;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: center;

        }

        .financing-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 40px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .promoting-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 30px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .impact-initiatives-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 40px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 50px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
        }

        .slider-section-para {
            color: #323232;
            font-family: Rubik;
            font-size: 35px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .financial-msme-button-head {
            display: flex;
            justify-content: center;
        }

        .financial-msme-button {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            text-decoration: none;

        }

        /* .top-nav-contact {
            font-size: clamp(11px, 3vw, 20px);
            color: #FFF;
            font-family: Rubik;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        } */

        /* .top-whatsapp-icon {
            width: clamp(11px, 3vw, 30px);
            height: clamp(11px, 4vw, 30px);

        }   */

        /* Zoom In Effect CSS */

        figure {
            height: auto;
            margin: 0;
            padding: 0;
            background: #fff;
            overflow: hidden;
            position: relative;
        }

        figure img {
            width: 100%;
        }

        .custom-card-image figure img {
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .8s ease-in-out;
            transition: .8s ease-in-out;
        }

        .custom-card-image figure:hover img {
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
        }

        .card-body-inner-image {
            position: absolute;
            top: 10px;
        }

        .apply_now_and_know_more {
            position: relative;
            bottom: -140px;
        }

        @media screen and (max-width: 1900px) {
            .apply_now_and_know_more {
                position: relative;
                top: 220px;
            }
        }

        @media screen and (max-width: 1800px) {
            .apply_now_and_know_more {
                position: relative;
                top: 200px;
            }
        }

        @media screen and (max-width: 1700px) {
            .apply_now_and_know_more {
                position: relative;
                top: 180px;
            }
        }

        @media screen and (max-width: 1600px) {
            .container-header {
                padding: 10px 80px 20px !important;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 150px;
            }
        }

        @media screen and (max-width: 1500px) {
            .apply_now_and_know_more {
                position: relative;
                top: 130px;
            }
        }

        @media screen and (max-width: 1400px) {
            .container-header {
                padding: 8px 75px 25px !important;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 115px;
            }
        }

        @media screen and (max-width: 1300px) {
            .container-header {
                padding: 7px 70px 15px !important;
            }

            .growth-header {
                margin: 2px 4px 2px 4px !important;
            }

            .growth-image {
                padding: 16px;
                width: 94px;
                height: 94px;
            }

            .growth-content-head {
                font-size: 20px;
                margin-bottom: 0;
            }

            .box {
                width: 290px;
                height: 110px;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 95px;
            }
        }

        @media screen and (max-width: 1200px) {
            .container-header {
                padding: 10px 65px 30px !important;
            }

            /* .top-bar {
                margin-top: 118px;
            } */

            .growth-header {
                margin: 2px 4px 2px 4px !important;
            }

            .growth-image {
                padding: 14px;
                width: 84px;
                height: 84px;
            }

            .growth-content-head {
                font-size: 18px;
                margin-bottom: 0;
            }

            .box {
                width: 285px;
                height: 105px;
            }

            .card-body-inner-image {
                position: absolute;
                top: -8px;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 75px;
            }
        }

        @media screen and (max-width: 992px) {
            .container-header {
                padding: 30px 60px !important;
            }

            .growth-header {
                margin: 2px 4px 2px 4px !important;
            }

            .growth-image {
                padding: 12px;
                width: 74px;
                height: 74px;
            }

            .growth-content-head {
                font-size: 16px;
                margin-bottom: 0;
            }

            .box {
                width: 205px;
                height: 95px;
            }

            .card-body-inner-image .card-title {
                font-size: 19px;
            }

            .card-body-inner-image {
                position: absolute;
                top: -8px;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 50px;
            }

            .apply_now_and_know_more .apply-now,
            .apply_now_and_know_more .know-button {
                border-radius: 20px;
                padding-top: 8px;
                padding-bottom: 8px;
                padding-right: 15px;
                padding-left: 15px;
                font-size: 12px;
            }
        }

        @media screen and (max-width: 767px) {
            .container-header {
                padding: 25px 55px !important;
            }

            .growth-header {
                margin: 2px 4px 2px 4px !important;
            }

            .growth-image {
                padding: 10px;
                width: 64px;
                height: 64px;
            }

            .growth-content-head {
                font-size: 16px;
                margin-bottom: 0;
                line-height: 15px;
            }

            .box {
                width: 190px !important;
                height: 90px !important;
            }

            .container-row {
                display: flex !important;
                flex-wrap: wrap;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 60px;
            }

            .logoSection {
                margin-top: 0px !important;
            }
        }

        @media screen and (max-width: 445px) {
            .container-header {
                padding: 20px 30px !important;
            }

            .growth-header {
                margin: 2px 4px 2px 4px !important;
            }

            .growth-image {
                padding: 10px;
                width: 64px;
                height: 64px;
            }

            .growth-content-head {
                font-size: 14px;
                margin-bottom: 0;
                line-height: 15px;
            }

            .box {
                width: 200px !important;
                height: 90px !important;
            }

            .container-row {
                margin-top: 20px;
            }

            .apply-now,
            .know-button {
                font-size: 13px;
                padding-top: 8px;
                padding-bottom: 8px;
                padding-right: 18px;
                padding-left: 18px;
            }

            .apply_now_and_know_more {
                position: relative;
                top: 40px;
            }

        }

        @media screen and (max-width: 350px) {
            .apply_now_and_know_more {
                position: relative;
                top: 20px;
            }

        }

        .know-button {
            border-radius: 30px;
            padding: 10px 20px 10px 20px;
            border: 1px solid #fff;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            position: relative;
            text-decoration: none;
            display: inline-block;
            overflow: hidden !important;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            background: none;
            z-index: 10;
        }


        .rightMenu #selectOption option:hover {
            background-color: yellow !important;
        }
    </style>
</head>

<body class="main-wrapper-en">
    <?php require_once('public/header.php'); ?>
    <div class="container-fluid p-sm-5 card-banner container-header">
        <div class="row ">
        <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `homeproduct_id`, `homeproduct_title`, `homeproduct_title_hindi`, `homeproduct_image`, `homeproduct_button1`, `homeproduct_button2`, `status` FROM `homeproduct` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());


            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $homeproduct_id = $row["homeproduct_id"];
                $homeproduct_title = $row["homeproduct_title"];
                $homeproduct_title_hindi = $row["homeproduct_title_hindi"];
                $homeproduct_image = $row["homeproduct_image"];
                $home_description_hindi = $row["home_description_hindi"];
                $homeproduct_button1 = $row["homeproduct_button1"];
                $homeproduct_button2 = $row["homeproduct_button2"];


            ?>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3 custom-card-image">
                <div class="card custom-card">
                    <figure><img src="<?= SEOURL; ?>assets/front/home/<?= $homeproduct_image ?>" class="img-fluid" />
                        <div class="card-body card-body-inner-image">
                            <h3 class="card-title fw-bold" >  <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $homeproduct_title_hindi;
                                                else:
                                                 echo   $homeproduct_title;
                                                endif; ?></h3>
                            <div class="d-flex align-items-end apply_now_and_know_more">
                                <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
                                <a href="<?= $homeproduct_button2 ?>" class="know-button ms-3" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'अधिक जानें';
                                                else:
                                                 echo   'Know More';
                                                endif; ?></a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
            <?php endwhile; ?>

        </div>
    </div>
        <div class="growth" data-aos="fade-up" data-aos-duration="2000">
            <div class="container mb-3 mt-3" data-aos="fade-up" data-aos-duration="2000">
           
                <div class="d-flex justify-content-center gap-4 section-icons container-row">
                <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `growthproduct_id`, `unlockgrowthproduct_title`, `unlockgrowthproduct_hindi_title`, `unlockgrowthproduct_image`, `status` FROM `unlock_growthproduct` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());


            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $growthproduct_id = $row["growthproduct_id"];
                $unlockgrowthproduct_title = $row["unlockgrowthproduct_title"];
                $unlockgrowthproduct_hindi_title = $row["unlockgrowthproduct_hindi_title"];
                $unlockgrowthproduct_image = $row["unlockgrowthproduct_image"];


            ?>
                    <div class="">
                        <div class="growth-content box">
                            <span class="d-flex align-items-center">
                                <div class="growth-header">
                                    <a href="prayaas">
                                        <img src="<?= SEOURL; ?>assets/front/home/<?= $unlockgrowthproduct_image ?>" class="growth-image" alt="growth Image">
                                    </a>
                                </div>
                                <div class="mt-xl-3">
                                    <h3 class="growth-content-head">
                                    <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $unlockgrowthproduct_hindi_title;
                                                else:
                                                 echo   $unlockgrowthproduct_title;
                                                endif; ?>
                                    </h3>
                                </div>
                            </span>
                        </div>

                    </div>
                    <?php endwhile; ?>
                </div>
             
                <!-- <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="<?= SEOURL; ?>assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="<?= SEOURL; ?>assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="<?= SEOURL; ?>assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="<?= SEOURL; ?>assets/front/images/timer.svg" class="growth-image" alt="Overlay Image">
                        </div>
                    </div>
                </div> -->
            </div>

        </div>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/aos.js"></script>
        <script src="<?= SEOURL; ?>assets/js/custom-common-script.js"></script>
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