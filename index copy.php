<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Direct Loans - Small Industries Development Bank of India</title>
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
       <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.carousel.min.css" rel="stylesheet" />
      <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.theme.default.min.css" rel="stylesheet" />
    <style>
        .owl-next span {
            display: none;
        }

        .owl-prev span {
            display: none;
        }

        /* Add your custom styles here */

        #imageCarousel {
            position: relative;
        }
        .overlay-image {
            /* width: 50% !important; */
            /* Adjust the width as needed */
            height: 100%;
            /* width: 50% !im/portant; */
            /* object-fit: cover; */
            /* Adjust the opacity as needed */
        }

        .section-two {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            /* margin: 0; */
            background: url('assets/front/images/second_sec_bg.png') center/cover no-repeat;
            margin-top: -37px;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .centered-container p {
            margin-bottom: 0;
            font-size: 20px;
            font-weight: 500;
        }

        .unlock {
            font-size: 35px;
            font-weight: 700;
        }

        .section-three {
            padding-left: 180px;
            padding-top: 100px
        }

        .section-content {
            /* padding-right: 150px; */
            padding-top: 300px
        }

        .section-subcontent {
            font-size: 18px;
            font-weight: 500;
        }

        .know-more {
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
        }

        .man-content {
            position: relative;
            overflow: hidden;

        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, #00B6F0 0%, #D2DF43 100%);
            display: flex;
            padding: 20px;
            flex-direction: column;
            align-items: start;
            justify-content: center;
            color: #fff;
            opacity: 0;
            transform: rotateY(180deg);
            /* Initial rotation */
            transition: opacity 0.3s ease, transform 0.9s ease;
            /* Add transform to the transition */
            z-index: 10;
        }

        .man-content:hover .overlay {
            opacity: 1;
            transform: rotateY(0deg);
            /* Rotate back to 0 degrees on hover */
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .overlay h5,
        .overlay p {
            margin: 0;
            padding: 10px;
            text-align: start;
        }


        .card-know-more {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 30px;
            padding-left: 30px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            color: #fff;
            border: none;
            border-radius: 30px;
            /* Adjust the border-radius for rounded corners */
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            /* transition: background-color 0.3s ease, color 0.3s ease; */
        }

        .card-know-more:hover {
            background-color: #000;
            color: #fff;
        }


        .background-container {

            background-image: url('assets/front/images/Group 130.png');
            background-size: cover;
            /* Adjust as needed */
            background-position: center;
            /* Adjust as needed */
            /* height: 50vh; */
            /* width: 100%; */
            margin-left: -50 !important;
            /* Adjust as needed */
        }

        .quik-content {
            padding-top: 115px;
        }

        .apply-now {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 20px;
            color: #fff;
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            text-decoration: none;

        }

        .know-button {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: 1px solid #000;
            background: none;
            color: #000;
            font-weight: 500;
            color: #323232;
            font-family: Rubik;
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .banner-buttons {
            display: flex;
            justify-content: center;
            margin: 35px 40px;

        }

        .swapping-card {
            /* padding-top: 140px; */
            padding-right: 120px;
            padding-left: 120px;
            background: url('assets/front/images/swap_banner.png') center/cover no-repeat;
            /* height: 70vh; */
            position: relative;


        }

        .owl-theme .owl-dots {
            position: absolute;
            top: 388px;
            right: 22%;

        }

        .owl-dot.active span {
            background: #00B6F0 !important;
        }

        .owl-theme .owl-dots .owl-dot.active span {
            width: 9px !important;
            height: 9px !important;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background: #00B6F0 !important;

        }

        .owl-theme .owl-dots .owl-dot span {
            width: 13px !important;
            height: 13px !important;
            border: 1px solid #00B6F0;
            background: none !important;
        }

        .financial_msme {
            background: url('assets/front/images/financial-msme-light.png');
            background-blend-mode: darken;
            background-size: auto;
            background-repeat: no-repeat;
            height: 550px;
            font-size: 36px;
            color: #000;
            font-weight: 700;

        }

        .financial-msme-button {
            color: #fff;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            border-radius: 30px;
            border: none;
            font-size: 18px;
            font-weight: 600;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }

        .financial-msme-button-head {
            display: flex;
            justify-content: center;
        }

        .logoSection {
            margin-top: 100px;
        }

        .growth-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 40px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            margin-top: 40px;

        }


        .growth-content {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            /* border: 1px solid #000; */
            border-right: none;

        }

        .growth-image {
            padding: 21px;
            /* background-color: #fff; */
            /* border-radius: 50%; */
            z-index: 2000;

        }

        .growth {
            background: #E7F8FC;
            padding: 20px;
            margin-top: -33px;
        }

        .growth-content-head {

            font-family: Rubik;
            font-size: 18px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;

        }

        .box {
            position: relative;
            width: 255px;
            height: 114px;
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
            margin-top: 77px;
            margin-bottom: -20px;
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


        .top-nav-contact {
            font-size: clamp(11px, 3vw, 20px);
            color: #FFF;
            font-family: Rubik;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .top-whatsapp-icon {
            width: clamp(11px, 3vw, 30px);
            height: clamp(11px, 4vw, 30px);

        }

        .know-button {
            color: #000;
            background: none;
            border-radius: 30px;
            border: 1px solid #000;
            font-size: 18px;
            font-weight: 500;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        

        }

        .quick-content-main {
            width: 100%;
        }

        .owl-carousel .owl-item img {
            /* width: 50%; */
        }

        .swapping-card-row {
            position: relative;
            top: 50px;
        }

        /*min-width-media-query-start */
        @media only screen and (min-width:1600.98px) {
            .owl-theme .owl-dots {
                position: absolute;
                top: 353px;
                right: 21%;
            }
        }

        /*min-width-media-query-end*/

        /*max-width-media-query-start*/

        @media only screen and (max-width:1600.98px) {
            .quik-content {
                padding-top: 60px;
            }

            .banner-buttons {
                display: flex;
                justify-content: center;
                /* margin: 35px -28px 0 35px; */
            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 37px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 25px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 290px;
                right: 19%;
            }

        }

        @media only screen and (max-width:1400.98px) {
            /* .quick-content-main {
                position: absolute;
                right: 8%;
            } */

            .quik-content {
                padding-top: 60px;
            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 37px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 25px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 273px;
                right: 19%;
            }
        }

        @media only screen and (max-width:1300.98px) {

            .quik-content {
                padding-top: 60px;

            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 37px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 25px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 273px;
                right: 19%;
            }

        }


        @media only screen and (min-width: 1200px) and (max-width: 1201px) {

            .quik-content {
                position: absolute !important;
                top: 15% !important;
                left: 52% !important;
            }

            .banner-buttons {
                display: flex !important;
                justify-content: center !important;
                padding: 18px 80px !important;
            }

            .owl-theme .owl-dots {
                position: absolute !important;
                top: 258px !important;
                right: 22% !important;
            }

        }

        @media only screen and (min-width: 1128px) and (max-width: 1200px) {

            .owl-theme .owl-dots {
                position: absolute !important;
                top: 510px !important;
                right: 49% !important;
            }

        }

        @media only screen and (width:1200px) {
            .owl-theme .owl-dots {
                position: absolute !important;
                top: 260px !important;
                right: 23% !important;
            }

        }


        @media only screen and (max-width:1200.98px) {

/* 
            .top-bar {
                background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                color: #fff;
                font-size: 15px;
                margin-top: 105px;
            } */

            /* .overlay-image {
                opacity: 0.5;
                width: 100% !important;
                height: 75% !important;
            } */
            .banner-slider {
                opacity: 0.5;

            }

            .quik-content {
                font-family: Rubik;
                font-size: 25px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                /* text-align: left; */
                margin-top: 30px;
                color: #000;
                position: absolute;
                top: 40%;
                left: 12%;
                color: #fff;
                /* transform: translate(-50%, -50%); */
                z-index: 1;
                padding-top: 60px;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 448px;
                right: 41%;
            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 30px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 25px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }
/* 
            .apply-now {
                border-radius: 30px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 18px;
                padding-left: 18px;
                border: none;
                background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                font-size: 15px;
                color: #fff;
                font-family: 'Rubik';
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                text-decoration: none;

            } */

            .know-button {
                border-radius: 30px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 18px;
                padding-left: 18px;
                border: 1px solid #000;
                background: none;
                color: #000;
                font-weight: 500;
                color: #323232;
                font-family: Rubik;
                font-size: 15px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .quik-content {
                padding-top: 0;
                padding-left: 0;

            }

            .growth {
                background: #E7F8FC;
                padding: 20px;
                /* margin-top: -118px; */
            }

            .section-icons {
                display: flex !important;
                flex-wrap: wrap !important;
                justify-content: flex-start !important;
            }

            .growth-content-head {
                font-family: Rubik;
                font-size: 18px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
            }

            .banner-buttons {
                display: flex;
                justify-content: center;
                padding: 18px 241px;
            }
        }

        @media only screen and (max-width:992.98px) {

            .owl-theme .owl-dots {
                position: absolute;
                top: 401px;
                right: 41%;
            }

            .banner-buttons {
                display: flex;
                justify-content: center;
                padding: 0 0;
            }

        }

        @media only screen and (max-width:768.98px) {
            .overlay-image {
                opacity: 0.5;
                width: 100% !important;
                height: 50% !important;
            }

            .quik-content {
                font-family: Rubik;
                font-size: 25px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                /* text-align: left; */
                margin-top: 30px;
                color: #000;
                position: absolute;
                top: 40%;
                left: 49%;
                color: #fff;
                transform: translate(-50%, -50%);
                z-index: 1;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 260px;
                right: 40%;

            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 20px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }
/* 
            .apply-now {
                border-radius: 30px;
                padding: 0 13px;
                border: none;
                background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                font-size: 15px;
                color: #fff;
                font-family: 'Rubik';
                font-style: normal;
                font-weight: 600;
                line-height: normal;

            } */

            .know-button {
                border-radius: 30px;
                padding: 8px 10px;
                border: 1px solid #000;
                background: none;
                color: #000;
                font-weight: 500;
                color: #323232;
                font-family: Rubik;
                font-size: 15px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .quik-content {
                padding-top: 0;
                padding-left: 0;

            }

            .growth {
                background: #E7F8FC;
                padding: 20px;
                margin-top: -118px;
            }

            .banner-buttons {
                display: flex;
                justify-content: center;
                margin: 35px -28px;
            }

            .growth-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 24px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                margin-top: 98px;
            }

            .growth-content-head {
                font-family: Rubik;
                font-size: 20px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
            }

            .promoting-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 15px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .financing-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 30px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .financial_msme {
                background: url(assets/front/images/financial-msme-light.png);
                background-blend-mode: darken;
                background-size: auto;
                background-repeat: no-repeat;
                height: 500px;
                font-size: 36px;
                color: #000;
                font-weight: 700;
            }

            .swapping-card {
                padding-top: 0;
                padding-right: 0;
                padding-left: 0;
                background: url(assets/front/images/swap_banner.png) center/cover no-repeat;
                /* height: 70vh; */
                position: relative;
            }

            .swapping-card-row img {
                width: 100%;
            }
        }

        @media only screen and (max-width:425.98px) {
            .overlay-image {
                opacity: 0.5;
                width: 100% !important;
                height: 32% !important;
            }

            .quik-content {
                font-family: Rubik;
                font-size: 25px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                /* text-align: left; */
                margin-top: 30px;
                color: #000;
                position: absolute;
                top: 40%;
                left: 49%;
                color: #fff;
                /* transform: translate(-50%, -50%); */
                z-index: 1;
            }

            .owl-theme .owl-dots {
                position: absolute;
                top: 182px;
                right: 36%;
            }

            .slider-section-title {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .slider-section-para {
                color: #323232;
                font-family: Rubik;
                font-size: 20px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .apply-now {
                border-radius: 30px;
                padding: 0 10px;
                border: none;
                background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
                font-size: 12px;
                color: #fff;
                font-family: 'Rubik';
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                text-decoration: none;

            }

            .know-button {
                border-radius: 30px;
                padding: 5 10px;
                border: 1px solid #000;
                background: none;
                color: #000;
                font-weight: 500;
                color: #323232;
                font-family: Rubik;
                font-size: 12px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
            }

            .quik-content {
                padding-top: 0;
                padding-left: 0;

            }

            .growth {
                background: #E7F8FC;
                padding: 20px;
                margin-top: -118px;
            }

            .banner-buttons {
                display: flex;
                justify-content: center;
                margin: 35px -28px;
            }

            .growth-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                margin-top: 98px;
            }

            .growth-content-head {
                font-family: Rubik;
                font-size: 20px;
                font-weight: 700;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
            }

            .growth-credit {
                font-family: Rubik;
                font-size: 20px;
                font-weight: 400;
                line-height: 30px;
                letter-spacing: 0em;
                text-align: center;
            }

            .financing-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 24px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
            }

            .promoting-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: normal;
                margin: 0;
            }

            .financial_msme {
                background: url(assets/front/images/financial-msme-light.png);
                background-blend-mode: darken;
                background-size: auto;
                background-repeat: no-repeat;
                height: 500px;
                font-size: 36px;
                color: #000;
                font-weight: 700;
            }

            .growth-image {
                padding: 20px 28px 26px 12px;
                /* background-color: #fff; */
                /* border-radius: 50%; */
                z-index: 2000;
            }

            .impact-initiatives-head {
                color: #323232;
                text-align: center;
                font-family: Rubik;
                font-size: 30px;
                font-style: normal;
                font-weight: 700;
                line-height: normal;
                margin-top: 77px;
                margin-bottom: -20px;
            }

        }
    </style>
</head>

<body class="main-wrapper-en">
    <?php require_once('public/header.php'); ?>
    <div class="">
        <div class="owl-carousel owl-theme">
            <div class="item ">
                <div class="active background-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" title="#" alt="#" class="img-fluid banner-slider">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div class="">
                                                <h1 class="text-center slider-section-title">Require MSME Loan?</h1>
                                                <p class="slider-section-para text-center">Quick Sanctions</p>
                                                <div class="banner-buttons">
                                                    <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now"  target="_blank">Apply Now</a>
                                                    <a href="home-product" class="know-button ms-3">Know More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="background-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <img src="<?= SEOURL; ?>assets/front/images/banner_3.png" class="img-fluid banner-slider" alt="Overlay Image">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div class="">
                                                <h1 class="text-center slider-section-title">Looking for Machinery loan?</h1>
                                                <p class="slider-section-para text-center">Minimum Paperwork</p>
                                                <div class="banner-buttons">
                                                <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now"  target="_blank">Apply Now</a>
                                                    <a href="#" class="know-button ms-3">Know More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="item">
                <div class=" background-container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <img src="<?= SEOURL; ?>assets/front/images/project-loan.png" class="img-fluid banner-slider" alt="Overlay Image">
                                </div>
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div>
                                                <h1 class="text-center slider-section-title">Need Project Funding?</h1>
                                                <p class="slider-section-para text-center">Customized Solutions</p>
                                                <div class="banner-buttons">
                                                <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now"  target="_blank">Apply Now</a>
                                                    <a href="#" class="know-button ms-3">Know More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class=" background-container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner-coin.png" class="img-fluid banner-slider" alt="Overlay Image">
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="quick-content-main">
                                <div class="quik-content">
                                    <div>
                                        <h1 class="text-center slider-section-title">Need Working Capital?</h1>
                                        <p class="slider-section-para text-center">Easy to Apply</p>
                                        <div class="banner-buttons">
                                        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now"  target="_blank">Apply Now</a>
                                                    <a href="#" class="know-button ms-3">Know More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="background-container">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <img src="<?= SEOURL; ?>assets/front/images/green-loan.png" class="img-fluid banner-slider" alt="Overlay Image">
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="quick-content-main">
                                <div class="quik-content">
                                    <div>
                                        <h1 class="text-center slider-section-title">Are you in
                                            Need of a Green Finance Loan?</h1>
                                        <p class="slider-section-para text-center">Low Rate of Interest Rates Starting @
                                            8.30%*</p>
                                        <div class="banner-buttons">
                                        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now"  target="_blank">Apply Now</a>
                                                    <a href="#" class="know-button ms-3">Know More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="growth">
        <div class="container mb-3">
            <h3 class="growth-head mb-5">
                Unlock Growth: Empowering MSME’s through Digital Finance
            </h3>
            <div class="d-block d-lg-flex justify-content-between gap-4 section-icons">
                <div class="my-3 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/images/timer1.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-3">
                                <h3 class="growth-content-head">
                                    Quick
                                    Sanction
                                    in 48 Hours
                                </h3>
                            </div>
                        </span>
                    </div>

                </div>
                <div class="my-3 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/images/Group 191.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-3">
                                <h3 class="growth-content-head">
                                    Digital
                                    Process
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
                <div class="my-3 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/images/Group 201.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-3">
                                <h3 class="growth-content-head">
                                    Interest Rate
                                    Starting
                                    8.3%*
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
                <div class="my-3 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/images/Group 21.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-3">
                                <h3 class="growth-content-head">
                                    Easy to
                                    Apply
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
                <div class="my-3 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/images/Vector3.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-3">
                                <h3 class="growth-content-head">
                                    Paperless
                                    Sanction
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
            </div>
            <div class="mt-5">
                <h5 class="growth-credit">Credit score linked interest rate. All loans are at the sole direction of
                    SIDBI T&C apply.</h5>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="col-12">
            <div class="financial_msme">
                <div class="text-center" style="padding-top: 180px;">
                    <h3 class="financing-head">Financing MSME Clusters in Different States/UTs</h3>
                </div>
                <h4 class="text-center fw-normal mt-3 mb-5 promoting-head">Promoting MSME Cluster Through infrastructure
                    Development
                </h4>
                <div class="financial-msme-button-head mt-3">
                    <a href="#" class="financial-msme-button">Know More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="swapping-card">
        <!-- Column 1 -->
        <div class="row">
            <h2 class="text-center  fw-bolder impact-initiatives-head">Impact Initiatives</h2>
        </div>
        <div class="row p-0 justify-content-center swapping-card-row">

            <!-- Column 1 -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0 ">
                <div class="man-content">
                    <div class="overlay">
                        <h3 class="fade-in ms-5 m-sm-2 m-md-2">“On Tap” </br>Invoice Based Financing</br> (Cash Flow
                            Based Lending)</h3>
                        <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">SIDBI has been engaged in clusters through
                            its direct
                            lending business as also through promotion and development interventions. For focused
                            attention,
                            SIDBI has now set up Cluster Development Vertical to attend to cluster development from both
                            soft and hard infrastructure. In line with Shri UK Sinha committee recommendations, SIDBI
                            has
                            set up SIDBI Cluster Development Fund (SCDF) with support from RBI.</p>
                            <a href="#" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                    </div>
                    <div>
                        <h2 class="offering-title m-md-0 m-sm-0">“On Tap” Invoice Based Financing (Cash Flow Based
                            Lending)</h2>
                        <img src="<?= SEOURL; ?>assets/front/images/Group 134.png">
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                <div class="man-content">
                    <div class="overlay">
                        <h3 class="fade-in ms-5 m-sm-2 m-md-2">Ranking </br>Model for </br>MSME Lending</h3>
                        <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">SIDBI has been engaged in clusters through
                            its direct
                            lending business as also through promotion and development interventions. For focused
                            attention,
                            SIDBI has now set up Cluster Development Vertical to attend to cluster development from both
                            soft and hard infrastructure. In line with Shri UK Sinha committee recommendations, SIDBI
                            has
                            set up SIDBI Cluster Development Fund (SCDF) with support from RBI.</p>
                        <a href="#" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                    </div>
                    <div>
                        <h2 class="offering-title m-md-0 m-sm-0">Ranking Model for MSME Lending</h2>
                        <img src="<?= SEOURL; ?>assets/front/images/Group 131.png">
                    </div>
                </div>

            </div>

            <!-- Column 3 -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                <div class="man-content">
                    <div class="overlay">
                        <h3 class="fade-in ms-5 m-sm-2 m-md-2">TReDS</br> Platform for</br> Invoice Discounting</h3>
                        <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">SIDBI has been engaged in clusters through
                            its direct
                            lending business as also through promotion and development interventions. For focused
                            attention,
                            SIDBI has now set up Cluster Development Vertical to attend to cluster development from both
                            soft and hard infrastructure. In line with Shri UK Sinha committee recommendations, SIDBI
                            has
                            set up SIDBI Cluster Development Fund (SCDF) with support from RBI.</p>
                            <a href="#" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                    </div>
                    <div>
                        <h2 class="offering-title m-md-0 m-sm-0">TReDS Platform for Invoice Discounting</h2>
                        <img src="<?= SEOURL; ?>assets/front/images/Group 132.png">
                    </div>
                </div>
            </div>

            <!-- Column 4 -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                <div class="man-content">
                    <div class="overlay">
                        <h3 class="fade-in ms-5 m-sm-2 m-md-2">CGTMSE</br> Credit Guarantee</br> for MSME financing</h3>
                        <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">SIDBI has been engaged in clusters through
                            its direct
                            lending business as also through promotion and development interventions. For focused
                            attention,
                            SIDBI has now set up Cluster Development Vertical to attend to cluster development from both
                            soft and hard infrastructure. In line with Shri UK Sinha committee recommendations, SIDBI
                            has
                            set up SIDBI Cluster Development Fund (SCDF) with support from RBI.</p>
                            <a href="#" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                    </div>
                    <div>
                        <h2 class="offering-title m-md-0 m-sm-0">CGTMSE Credit Guarantee for MSME financing</h2>
                        <img src="<?= SEOURL; ?>assets/front/images/Group 133.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
   

      <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/owl.carousel.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.carousel').carousel();
        });
    </script>

    <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 1,
                margin: 50,
                padding: 10,
                loop: true,
                nav: true,
                autoplay: true

            });
        });
    </script>


    <section class="logoSection">
        <div class="container">
            <div class="logoSlider">
                <div class="swiper logoSliderInner">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://msme.gov.in/" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="<?= SEOURL; ?>assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank" title="Udyami Mitra"><img src="<?= SEOURL; ?>assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank" title="The National Portal of India"><img src="<?= SEOURL; ?>assets/front/images/logo4.png" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="<?= SEOURL; ?>assets/front/images/logo5.png" class="img-fluid w-100"></a>
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

</body>
</html>