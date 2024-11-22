<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="homeTITLE">Home - Small Industries Development Bank of India</title>
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
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/animate.min.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.carousel.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.theme.default.min.css" rel="stylesheet" />


    <style>
    /* .owl-next span {
            display: none;
        }

        .owl-prev span {
            display: none;
        } */

    /* Add your custom styles here */
    .owl-nav {
        position: relative;
        top: 20px;
        display: flex;
        position: absolute;
        top: 130px;
        justify-content: space-between;
        width: 100%;
        padding: 0px 20px;

    }

    .owl-next span,
    .owl-prev span {
        /* display: none; */
        font-size: 64px;
        color: #87d4ec;
    }

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
        font-weight: 600;
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

    /* .quik-content {
        padding-top: 115px;
    } */

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
        font-weight: 600;
        line-height: normal;
        text-decoration: none;

    }

    .know-button {
        border-radius: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 20px;
        padding-left: 20px;
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
        background: transparent !important;
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

    /* .owl-theme .owl-dots {
        position: absolute;
        top: 388px;
        right: 22%;

    } */

    .owl-dot.active span {
        background: #00B6F0 !important;
    }

    .home-page-slider .owl-dots .owl-dot.active span {
        width: 9px !important;
        height: 9px !important;
    }

    .home-page-slider .owl-dots .owl-dot.active span,
    .home-page-slider .owl-dots .owl-dot:hover span {
        background: #00B6F0 !important;

    }

    .home-page-slider .owl-dots .owl-dot span {
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
        font-weight: 600;

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
        font-size: 24px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        margin-top: 20px;

    }


    .growth-content {
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        /* border: 1px solid #000; */
        border-right: none;

    }

    .growth-image {
        padding: 10px;
        /* background-color: #fff; */
        /* border-radius: 50%; */
        z-index: 2000;
        transition: transform .8s;
        /* Animation */
        width: 75px;
        height: 75px;


    }

    .growth-image:hover {
        transform: scale(1.2);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

    }

    .growth {
        background: #E7F8FC;
        padding: 20px 20px 2px 20px;
        margin-top: -33px;
    }

    .growth-content-head {

        font-family: Rubik;
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        letter-spacing: 0em;
        text-align: left;
        margin-bottom: 0;

    }

    .box {
        position: relative;
        width: 255px;
        height: 86px;
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
        margin: 2px 12px 2px 4px;
        background-color: #fff;
        border-radius: 50%;
    }

    .offering-title {
        font-family: Rubik;
        font-size: 25px;
        font-weight: 600;
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
        font-weight: 600;
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
        font-weight: 600;
        line-height: normal;
        /* margin-top: 77px;
        margin-bottom: -20px; */
    }

    .slider-section-title {
        color: #323232;
        text-align: center;
        font-family: Rubik;
        font-size: 50px;
        font-style: normal;
        font-weight: 600;
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

    .know-button {
        color: #000;
        background: none;
        border-radius: 30px;
        border: 1px solid #000;
        font-size: 18px;
        font-weight: 600;
        padding: 10px 20px 10px 20px;
        text-decoration: none;

    }

    .quick-content-main {
        width: 100%;
    }

    .owl-carousel .owl-item img {
        /* width: 50%; */
    }

    .swapping-card-title {
        --bs-gutter-x: 0 !important;
    }

    .swapping-card-row {
        position: relative;
        top: 50px;
        --bs-gutter-x: 0 !important;
    }

    /*min-width-media-query-start */

    /*min-width-media-query-end*/

    /*max-width-media-query-start*/

    @media only screen and (max-width:1600.98px) {
        /* .quik-content {
            padding-top: 60px;
        } */

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
            font-weight: 600;
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

        /* .owl-theme .owl-dots {
                position: absolute;
                top: 290px;
                right: 19%;
            } */

        /* .man-content h3 {
            line-height: 29px;
        } */

        .owl-theme .owl-nav {
            height: 10px !important;
        }
    }

    @media only screen and (max-width:1400.98px) {
        /* .quick-content-main {
                position: absolute;
                right: 8%;
            } */

        /* .quik-content {
            padding-top: 60px;
        } */

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 37px;
            font-style: normal;
            font-weight: 600;
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

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 273px;
            right: 19%;
        } */

        .section-icons {
            display: flex !important;
            /* flex-wrap: wrap !important; */
        }

        /* .man-content h3 {
            line-height: 26px;
        } */

        .man-content p,
        .overlay p {
            padding: 3px;
        }

        .man-content button {
            margin-top: 0px;
        }

        .growth-image {
            padding: 15px;
            /* background-color: #fff; */
            /* border-radius: 50%; */
            z-index: 2000;
        }

        .box {
            position: relative;
            width: 228px;
            height: 85px;
            background: #E7F8FC;
            border-radius: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .growth-content-head {
            font-family: Rubik;
            font-size: 16px;
            font-weight: 600;
            /* line-height: 30px; */
            letter-spacing: 0em;
            text-align: left;
        }

    }

    @media only screen and (max-width:1300.98px) {

        /* .quik-content {
            padding-top: 60px;

        } */

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 37px;
            font-style: normal;
            font-weight: 600;
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

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 273px;
            right: 19%;
        } */

        .section-icons {
            display: flex !important;
            /* flex-wrap: wrap !important; */
        }

        /* .man-content h3 {
            line-height: 25px;
        } */

        .man-content p,
        .overlay p {
            padding: 0px;
        }

        .man-content button {
            margin-left: 55px !important;
        }

    }


    @media only screen and (min-width: 1200px) and (max-width: 1201px) {

        /* .quik-content {
            position: absolute !important;
            top: 15% !important;
            left: 52% !important;
        } */

        .banner-buttons {
            display: flex !important;
            justify-content: center !important;
            padding: 18px 80px !important;
        }

        /* .owl-theme .owl-dots {
            position: absolute !important;
            top: 258px !important;
            right: 22% !important;
        } */

    }

    @media only screen and (min-width: 1128px) and (max-width: 1200px) {

        /* .owl-theme .owl-dots {
            position: absolute !important;
            top: 510px !important;
            right: 49% !important;
        } */

    }

    @media only screen and (width:1200px) {
        /* .owl-theme .owl-dots {
            position: absolute !important;
            top: 260px !important;
            right: 23% !important;
        } */

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
            opacity: 0.15;

        }

        .quik-content {
            font-family: Rubik;
            font-size: 25px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            /* text-align: left; */
            /* margin-top: 30px; */
            color: #000;
            /* position: absolute;
            top: 40%;
            left: 12%; */
            color: #fff;
            /* transform: translate(-50%, -50%); */
            z-index: 1;
            /* padding-top: 60px; */
        }

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 448px;
            right: 41%;
        } */

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
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

        .apply-now {
            border-radius: 30px;
            padding: 8px 13px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 15px;
            color: #fff;
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            line-height: normal;

        }

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

        .section-icons {
            display: flex !important;
            flex-wrap: wrap !important;
            /* justify-content: flex-start !important; */
        }

        .banner-buttons {
            display: flex;
            justify-content: center;
            /* padding: 18px 220px; */
        }

        /* .man-content h3 {
            line-height: 23px;
        } */

        .man-content p,
        .overlay p {
            padding: 0px;
        }

    }

    @media only screen and (max-width:992.98px) {

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 401px;
            right: 41%;
        } */

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
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            /* text-align: left; */
            /* margin-top: 30px; */
            color: #000;
            /* position: absolute;
            top: 40%;
            left: 49%; */
            color: #fff;
            /* transform: translate(-50%, -50%); */
            z-index: 1;
        }

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 260px;
            right: 40%;

        } */

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 24px;
            font-style: normal;
            font-weight: 600;
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
            /* padding: 0 13px; */
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 15px;
            color: #fff;
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 600;
            line-height: normal;

        }

        .know-button {
            border-radius: 30px;
            padding: 8px 13px;
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

        .banner-buttons {
            display: flex;
            justify-content: center;
            margin: 35px -28px;
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
            font-weight: 600;
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
            font-weight: 600;
        }

        .swapping-card {
            padding-top: 0;
            padding-right: 0;
            padding-left: 0;
            background: url(assets/front/images/swap_banner.png) center/cover no-repeat;
            /* height: 70vh; */
            position: relative;
            line-height: 28px;
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
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0em;
            /* text-align: left; */
            /* margin-top: 30px; */
            color: #000;
            /* position: absolute;
            top: 40%;
            left: 49%; */
            color: #fff;
            /* transform: translate(-50%, -50%); */
            z-index: 1;
        }

        /* .owl-theme .owl-dots {
            position: absolute;
            top: 182px;
            right: 36%;
        } */

        .slider-section-title {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 24px;
            font-style: normal;
            font-weight: 600;
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

        .banner-buttons {
            display: flex;
            justify-content: center;
            margin: 35px -28px;
        }

        .financing-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 24px;
            font-style: normal;
            font-weight: 600;
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
            font-weight: 600;
        }



        .impact-initiatives-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            margin-top: 77px;
            margin-bottom: -20px;
        }

    }

    .image-container-fluid {
        position: relative;
    }

    .financing-section {
        position: absolute;
        padding: 30px;
        width: 100%;
        height: 100%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        background: rgba(242, 250, 244, .7);
        color: #323232;
    }

    @media screen and (max-width: 992px) {

        .growth-head h3 {
            font-size: 35px;
        }

        .financing-section h3 {
            font-size: 35px;
        }

        .financing-section h4 {
            font-size: 25px;
            margin-bottom: 12px !important;
        }

        .financing-section a {
            font-size: 14px;
            margin: 0;
        }
    }

    @media screen and (max-width: 767px) {
        .growth-head h3 {
            font-size: 33px;
        }

        .financing-section h3 {
            font-size: 33px;
        }

        .financing-section h4 {
            font-size: 20px;
        }

        .financing-section a {
            font-size: 12px;
            margin: 0;
        }

        .financial-msme-button-head {
            margin-top: 5px !important;
        }
    }

    @media screen and (max-width: 445px) {
        .growth-head h3 {
            font-size: 30px;
        }

        .financing-section h3 {
            font-size: 30px;
        }

        .financing-section h4 {
            font-size: 18px;
        }

        .financing-section a {
            font-size: 12px;
            margin: 0;
        }

        .financial-msme-button-head {
            margin-top: 5px !important;
        }
    }

    /* On screens that are 1300px or less, set the background color to blue */
    @media screen and (max-width: 1300px) {
        .container-header {
            padding: 40px 70px !important;
        }

        .growth-header {
            margin: 2px 4px 2px 4px !important;
        }

        .growth-image {
            padding: 16px;
            width: 87px;
            height: 94px;
        }


        .box {
            width: 208px;
            height: 106px;
        }

        .growth-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            /* margin-top: 40px; */
        }

        .growth-content-head {
            font-size: 16px;
            margin-bottom: 0;
        }


    }

    /* On screens that are 1200px or less, set the background color to blue */
    @media screen and (max-width: 1200px) {
        .container-header {
            padding: 35px 65px !important;
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
    }

    /* On screens that are 992px or less, set the background color to blue */
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

    }

    /* On screens that are 767px or less, set the background color to blue */
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
            /* line-height: 15px; */
        }

        .box {
            width: 190px !important;
            height: 90px !important;
        }

        .container-row {
            display: flex !important;
            flex-wrap: wrap;
        }
    }

    @media screen and (max-width: 467px) {
        .box {
            width: 150px !important;
            height: 90px !important;
        }

        .growth-head {
            font-size: 23px;
        }

        .financing-section h3 {
            font-size: 23px;
        }

        .impact-initiatives-head {
            font-size: 28px;
        }
    }

    /* On screens that are 445px or less, set the background color to blue */
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
            /* line-height: 15px; */
        }

        /* .box {
            width: 170px !important;
            height: 80px !important;
        } */

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

    }

    .growth-head-under {
        color: #323232;
        text-align: center;
        font-family: Rubik;
        font-size: 14px;
        font-style: normal;

        line-height: normal;
        margin-top: 10px;
        font-weight: normal;

    }

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

    /* ZOOM IN */

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

    .floating1 {
        left: 0;
        color: #fff;
        font-size: small;
        z-index: 2000;
        top: 531px;
    }


    .float-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .float-icon {
        cursor: pointer;
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        padding: 14px;
        border-top-right-radius: 22px;
        border-bottom-right-radius: 22px;
        /* border: 1px solid transparent; */
        height: 104px;
    }

    .float-icon:hover {
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(66, 148, 227, 0.25);
    }

    .float-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        top: -47px;
        left: 82px;
        border-radius: 29px;
    }

    .float-content a {
        color: black;
        padding: 13px 33px;
        text-decoration: none;
        display: block;
        font-size: 18px;
    }

    .float-content a:hover {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        color: #fff;
        font-family: 'Rubik';
    }

    .home-float {
        margin-left: -700px;
    }

    .home-float li {
        list-style: none;
        padding: 12.2px;

    }

    .home-float li a {
        list-style: none;
        text-decoration: none;
        color: #000;
        font-size: 18px;
        font-family: 'Rubik';
    }

    .home-float li:hover {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        font-family: 'Rubik';
    }


    .home-float li a:hover,
    .home-float li:hover a {
        color: #fff;
    }

    .home-floating {
        min-height: 160px;
        position: fixed;
        color: #000;
        font-size: 18px;
        font-weight: 400;
        z-index: 2000;
        top: 75%;
        left: 0;
        display: flex;
    }



    .home-floating-svg {
        position: absolute;
        top: 43px;
        left: 3px;
    }



    .four-image-transition-1,
    .four-image-transition-3 {
        position: relative;
        transform: translate(0%, 0%);
    }

    .four-image-transition-4 {
        position: relative;
        transform: translate(0%, 0%);
    }

    .four-image-transition-2 {
        position: relative;
        transform: translate(0%, 0%);
    }

    .home-floating-svg.opposite {
        transform: scaleX(-1);
    }

    /* CSS styles for slider */
    .floating-slider-container {
        position: fixed;
        max-width: 100%;
        overflow: hidden;
        z-index: 999;
        top: 30%;
        left: 3%;
        background: #EAF7FB;
        /* background: #01b7f0; */
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 12px 20px;
        min-height: 220px;
        width: 320px;
        margin-left: -700px;
    }

    .floating-slider {
        display: flex;
        transition: transform 0.5s ease;
    }

    .floating-slide {
        flex: 0 0 100%;
        display: none;
        transition: opacity 0.5s ease, transform 0.5s ease;
        /* Transition effects */
        opacity: 0;
    }

    .floating-slide.active {
        display: block;
        opacity: 1;
        transform: translateX(0);
    }

    /* Styles for buttons */
    .floating-button {
        margin: 5px;
        cursor: pointer;
    }



    .floating-title {
        cursor: pointer;
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        padding: 13.5px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 22px;
        height: 165px;
        width: 24px;
    }

    .floating-prev-slide {
        background: none;
        border: none;
        color: #000;
    }

    .floating-pause-slide {
        background: none;
        border: none;
        color: #000;

    }

    .floating-next-slide {
        background: none;
        border: none;
        color: #000;

    }

    .floating-slider-card {
        background: transparent;
    }

    .rotate {
        display: inline-block;
        white-space: nowrap;
        transform-origin: 0 0;
        transform: rotate(-90deg);
        margin: 130px 0 0 -14px;
        font-size: 14px;
        color: #fff;
    }

    .float-icon3 {
        cursor: pointer;
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        padding: 11px;
        border-top-right-radius: 50px;
        border-bottom-right-radius: 0;
        /* border: 1px solid transparent; */
        height: 50px;
    }

    .float-section {
        min-height: 240px;
        position: fixed;
        color: #000;
        font-size: small;
        top: 45%;
        left: 0;
        display: flex;
        z-index: 2000;
    }

    /* .home-floating3 {
        min-height: 160px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 45%;
        left: 0;
        display: flex;
    } */

    .home-floating-svg3 {
        top: 10px;
        margin: 10px -6px 10px -7px;
    }

    .home-floating2 {
        position: absolute;
        left: 0;
        top: 49px;
    }

    .home-floating3 {
        position: relative;
    }

    /* .home-floating2 {
        min-height: 40px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 50%;
        left: 0;
        display: flex;
    } */

    /* .home-floating3 {
        min-height: 160px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 45%;
        left: 0;
        display: flex;
    } */

    /* Styles for the default state of the icon */
    .home-floating-svg3 {
        transition: transform 0.5s ease;
        /* Add a transition for a smooth effect */
    }

    /* Styles for the icon when the element is open */
    .home-floating-svg3.open-state {
        transform: rotate(180deg);
        /* Rotate the icon 180 degrees for the open state */
    }

    .floating-description {
        font-size: 12px;
    }

    /* .man-content .overlay h3 {
        margin-left: 0px !important;
    } */

    /* .overlay-image-white-bg {
        opacity: 0.3;
    } */

    @media screen and (max-width: 390px) {
        .box {
            width: 145px !important;
            height: 85px !important;
        }
    }


    .rightMenu #selectOption option:hover {
        background-color: yellow !important;
    }

    .latest-floatcontent {
        color: #000;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
    }

    .card-footer {
        font-size: 10px;

    }

    .welcomeBanner img {
        max-width: 100%;
        height: auto;
        width: 100%;
        max-height: 260px;
    }


    .welcomeBanner {
        position: fixed;
        bottom: 20px;
        right: 20px;
        max-width: 480px;
        background-color: #f1f1f1;
        /* background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%); */
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 2;
    }

    .welcomeBanner img {
        max-width: 100%;
        height: auto;
    }

    #welcomeBannerCloseButton {
        position: absolute;
        top: 10px;
        right: 15px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    @media screen and (min-width: 1835px) {

        .four-image-transition-1,
        .four-image-transition-2,
        .four-image-transition-3,
        .four-image-transition-4 {
            width: 100%;
        }
    }
    </style>
</head>

<body class="main-wrapper-en">
    <?php require_once('public/header.php'); ?>
    <div class="">
        <div class="owl-carousel owl-theme home-page-slider">
            <?php
              
             $list_transaction = sqlQUERY_LABEL("SELECT `home_id`, `home_title`, `home_title_hindi`, `home_description`, `home_description_hindi`, `home_image`, `home_toll_number`, `home_whatsapp_number`, `home_button1`, `home_button2`, `status`  FROM `home` where `deleted` = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());

             while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                 $home_image = $row["home_image"];
                 $home_title = $row["home_title"];
                 $home_title_hindi = $row["home_title_hindi"];
                 $home_description = $row["home_description"];
                 $home_description_hindi = $row["home_description_hindi"];
                 $home_toll_number = $row["home_toll_number"];
                 $home_whatsapp_number = $row["home_whatsapp_number"];
                 $home_button1 = $row["home_button1"];
                 $home_button2 = $row["home_button2"];
                 ?>
            <div class="item ">
                <div class="active background-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-xl-6 custom-card-image">
                                    <figure class="overlay-image-white-bg"><img
                                            src="<?= SEOURL; ?>assets/front/home/<?=  $home_image ?>"
                                            alt="Overlay Image" class="img-fluid banner-slider"></figure>
                                </div>

                                <div class="col-lg-6 col-md-6 col-xl-6 d-flex align-items-center custom-card-paragraph">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div class="">
                                                <h1 class="text-center slider-section-title">

                                                <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $home_title_hindi;
                                                else:
                                                 echo   $home_title;
                                                endif; ?></h1>
                                                <p class="slider-section-para text-center">   <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $home_description_hindi;
                                                else:
                                                 echo   $home_description;
                                                endif; ?></p>

                                                <div class="banner-buttons">
                                                    <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/"
                                                        class="apply-now" target="_blank" >
                                                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
                                                    <a href="<?=  $home_button2 ?>" class="know-button ms-3"
                                                     > <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'अधिक जानें';
                                                else:
                                                 echo   'Know More';
                                                endif; ?></a>
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
            <?php endwhile; ?>
        </div>
    </div>
    <div onclick="Opener3()" class="float-main">
        <div class="float-section">
            <div class="home-floating3">
                <div class="floating3">
                    <div class="floating3" id="float3">
                        <div class="float-container">
                            <div class="float-icon3"><svg width="18" height="18" class="home-floating-svg3"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.5899 12L10.2969 19.293L11.7109 20.707L20.4179 12L11.7109 3.29303L10.2969 4.70703L17.5899 12Z"
                                        fill="url(#paint0_linear_238_787)" />
                                    <path
                                        d="M5.71087 3.29303L4.29688 4.70703L11.5899 12L4.29688 19.293L5.71087 20.707L14.4179 12L5.71087 3.29303Z"
                                        fill="url(#paint1_linear_238_787)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_238_787" x1="10.2969" y1="19.1833"
                                            x2="10.2969" y2="-3.77501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#fff" />
                                            <stop offset="0.333333" stop-color="#fff" />
                                            <stop offset="1" stop-color="#fff" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_238_787" x1="4.29688" y1="19.1833"
                                            x2="4.29688" y2="-3.77501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#fff" />
                                            <stop offset="0.333333" stop-color="#fff" />
                                            <stop offset="1" stop-color="#fff" />
                                        </linearGradient>
                                    </defs>
                                </svg></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="home-floating2">
                <div class="floating2">
                    <div class="floating-title">
                        <p class="rotate" data-translate="latest"> Latest Developments </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-floating">
        <div>
            <nav class="home-float p-0" id="home-float-head">
                <!-- <li><a href="digital-initiatives">Digital Initiatives</a></li> -->
                <li><a href="tenders" data-translate="tenders">Tenders</a></li>
                <li><a href="contact-us" data-translate="contact">Contact Us</a></li>
            </nav>
        </div>
        <div class="floating1" onmouseover="Opener()" id="float">
            <div class="float-container">
                <div class="float-icon" data-aos="fade-right"><svg width="18" height="18" class="home-floating-svg"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.5899 12L10.2969 19.293L11.7109 20.707L20.4179 12L11.7109 3.29303L10.2969 4.70703L17.5899 12Z"
                            fill="url(#paint0_linear_238_787)" />
                        <path
                            d="M5.71087 3.29303L4.29688 4.70703L11.5899 12L4.29688 19.293L5.71087 20.707L14.4179 12L5.71087 3.29303Z"
                            fill="url(#paint1_linear_238_787)" />
                        <defs>
                            <linearGradient id="paint0_linear_238_787" x1="10.2969" y1="19.1833" x2="10.2969"
                                y2="-3.77501" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#fff" />
                                <stop offset="0.333333" stop-color="#fff" />
                                <stop offset="1" stop-color="#fff" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_238_787" x1="4.29688" y1="19.1833" x2="4.29688"
                                y2="-3.77501" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#fff" />
                                <stop offset="0.333333" stop-color="#fff" />
                                <stop offset="1" stop-color="#fff" />
                            </linearGradient>
                        </defs>
                    </svg></div>

            </div>
        </div>
    </div>
    <div class="floating-slider-container" id="floating-slider-head">
        <div class="floating-slider">

            <div class="floating-slide active">
                <!-- Content for slide 1 -->
                <!-- <h2>Slide 1</h2> -->
                <?php
                            $list_transaction = sqlQUERY_LABEL("SELECT `subsidiary_id`, `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiaryimpact_title`, `subsidiaryimpact_title_hindi`, `subsidiaryimpact_description`, `subsidiaryimpact_description_hindi`, `subsidiary_image`, `subsidiary_link`, `status` FROM `subsidiary` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                $subsidiary_id = $row["subsidiary_id"];
                                $subsidiary_title = html_entity_decode($row["subsidiary_title"]);
                                $subsidiary_title_hindi = $row["subsidiary_title_hindi"];
                                $subsidiary_description = html_entity_decode($row["subsidiary_description"]);
                                $subsidiary_description_hindi = html_entity_decode($row["subsidiary_description_hindi"]);
                                $subsidiaryimpact_title = html_entity_decode($row["subsidiaryimpact_title"]);
                                $subsidiaryimpact_title_hindi = $row["subsidiaryimpact_title_hindi"];
                                $subsidiaryimpact_description = html_entity_decode($row["subsidiaryimpact_description"]);
                                $subsidiaryimpact_description_hindi = html_entity_decode($row["subsidiaryimpact_description_hindi"]);
                                $subsidiary_image = $row["subsidiary_image"];
                                $subsidiary_link = $row["subsidiary_link"];
                            ?>
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description border-0 ">
                        <a href="<?= SEOURL; ?>uploads/Notification for Chair, Centre of Financial Inclusion nimsme.pdf"
                            style="text-decoration:none;" target="_blank">
                            <p class="latest-floatcontent" data-translate="sidbi-cgtmse">29 Jan 24 - SIDBI & CGTMSE have
                                set-up a Chair in NiMSME</p>
                        </a>
                    </div>
                    <div class="card-footer border-0 ">
                        <p>1/10</p>
                    </div>
                </div>
<?php endwhile; ?>
            </div>

           
            <div class="floating-slide">
                <!-- Content for slide 3 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header border-0 ">
                        <a href="latest-development" data-translate="view-all"
                            style="text-decoration: none; color:#000;" target="_blank">
                            <p class="latest-floatcontent">View
                                All </p>
                        </a>

                    </div>
                    <div class="card-footer border-0 ">
                        <p>10/10</p>
                    </div>
                </div>
            </div>

            <!-- Add more slides as needed -->
        </div>
        <div class="text-end">
            <button class="floating-prev-slide floating-button"><i class="fa fa-arrow-circle-left"
                    aria-hidden="true"></i>

            </button>
            <button class="floating-pause-slide floating-button"><i class="fa fa-pause" aria-hidden="true"></i></button>

            <button class="floating-next-slide floating-button"><i class="fa fa-arrow-circle-right"
                    aria-hidden="true"></i></button>
        </div>
    </div>


    <div class="growth" data-aos="fade-up" data-aos-duration="2000">
        <div class="container mb-3" data-aos="fade-up" data-aos-duration="2000">
            <h3 class="growth-head mb-2">
            <?php  if($get_configured_lang == 'HI'): 
                                                 echo  'विकास को अनलॉक करना: डिजिटल वित्त के माध्यमसे एमएसएमई को सशक्त बनाना';
                                                else:
                                                 echo   'Unlocking Growth: Empowering MSMEs through Digital Finance';
                                                endif; ?>
              
            </h3>
            <div class="d-flex justify-content-center gap-4 section-icons container-row">
                <?php
                  $list_transactions = sqlQUERY_LABEL("SELECT `growth_id`, `unlockgrowth_heading`, `unlockgrowth_heading_hindi`, `unlockgrowth_title`, `unlockgrowth_hindi_title`, `unlockgrowth_image`,`status` FROM `unlock_growth` where `deleted` = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                  $counts = sqlNUMOFROW_LABEL($list_transactions);
                  while ($row = sqlFETCHARRAY_LABEL($list_transactions)) :
                      $growth_id = $row["growth_id"];
                      $unlockgrowth_heading = $row["unlockgrowth_heading"];
                      $unlockgrowth_heading_hindi = $row["unlockgrowth_heading_hindi"];
                      $unlockgrowth_hindi_title = $row["unlockgrowth_hindi_title"];
                      $unlockgrowth_image = $row["unlockgrowth_image"];
                      $unlockgrowth_title = $row["unlockgrowth_title"];
                      ?>
                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/home/<?=  $unlockgrowth_image ?>"
                                    class="growth-image" alt="growth Image">
                            </div>
                            <div class="">
                                <h3 class="growth-content-head">
                                <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $unlockgrowth_hindi_title;
                                                else:
                                                 echo   $unlockgrowth_title;
                                                endif; ?>
                                </h3>
                            </div>
                        </span>
                    </div>

                </div>
                <?php endwhile; ?>

            </div>

        </div>


    </div>


    <!-- <div class="row">
        <div class="col-12">
            <div class="financial_msme">
                <div class="text-center" style="padding-top: 180px;">
                    <h3 class="financing-head">Financing MSME Clusters in Different States/UTs</h3>
                </div>
                <h4 class="text-center fw-normal mt-3 mb-5 promoting-head">Promoting MSME Cluster Through infrastructure
                    Development
                </h4>
                <div class="financial-msme-button-head mt-3">
                    <a href="home-product" class="financial-msme-button">Know More</a>
                </div>
            </div>
        </div>
    </div> -->

    <div class="container-fluid px-0 image-container-fluid" data-aos="fade-up" data-aos-duration="2000">
        <div class="row g-0">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="<?= SEOURL; ?>assets/front/images/001.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="<?= SEOURL; ?>assets/front/images/002.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="<?= SEOURL; ?>assets/front/images/003.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-md-block d-sm-none col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="<?= SEOURL; ?>assets/front/images/004.jpg" alt="" />
                </div>
            </div>
        </div>
        <div class="financing-section">
            <?php

            $list_transactions = sqlQUERY_LABEL("SELECT `msme_id`, `msmecluster_title`, `msmecluster_description`, `msmecluster_hindi_title`, `msmecluster_hindi_description`, `msmecluster_image`, `msmecluster_button1`, `status` FROM `msme_cluster` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
            $counts = sqlNUMOFROW_LABEL($list_transactions);

            while ($row = sqlFETCHARRAY_LABEL($list_transactions)) :
                $msme_id = $row["msme_id"];
                $msmecluster_title = $row["msmecluster_title"];
                $msmecluster_hindi_title = $row["msmecluster_hindi_title"];
                $msmecluster_description = $row["msmecluster_description"];
                $msmecluster_hindi_description = $row["msmecluster_hindi_description"];
                $msmecluster_button1 = $row["msmecluster_button1"];
            ?>
            <h3 class="financing-head"> <?php if($get_configured_lang == 'HI'): 
                                                 echo   $msmecluster_hindi_title;
                                                else:
                                                 echo   $msmecluster_title;
                                                endif; ?></h3>
            <h4 class="text-center fw-normal mt-3 mb-5 promoting-head"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $msmecluster_hindi_description;
                                                else:
                                                 echo   $msmecluster_description;
                                                endif; ?>
            </h4>
            <div class="financial-msme-button-head mt-3">
                <a href="<?= $msmecluster_button1 ?> " class="financial-msme-button">
                
                <?php  if($get_configured_lang == 'HI'): 
            
                                                 echo 'अधिक जानें';
                                                else:
                                                 echo   'Know More';
                                                endif; ?></a>
            </div>
            <?php endwhile; ?>
        </div>
        <!-- <div class="financing-section">
            <div class="text-center" style="padding-top: 180px;">
                <h3 class="financing-head">Financing MSME Clusters in Different States/UTs</h3>
            </div>
            <h4 class="text-center fw-normal mt-3 mb-5 promoting-head">Promoting MSME Cluster Through infrastructure
                Development
            </h4>
            <div class="financial-msme-button-head mt-3">
                <a href="home-product" class="financial-msme-button">Know More</a>
            </div>
      </div> -->
    </div>
    <div class="swapping-card" data-aos="fade-up" data-aos-duration="2000" id=impact>
        <!-- Column 1 -->
        <div data-aos="fade-up" data-aos-duration="2000">
            <div class="row swapping-card-title">
                <h2 class="text-center  mt-5 impact-initiatives-head" >
                    <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'प्रभाव पहल';
                                                else:
                                                 echo   'Impact Initiatives';
                                                endif; ?>
                                                </h2>
            </div>
            <div class="row p-0 justify-content-center swapping-card-row">
                <?php

                $list_transactions = sqlQUERY_LABEL("SELECT `impact_id`, `impactinitiatives_title`, `impactinitiatives_hindi_title`, `impactinitiatives_description`, `impactinitiatives_description_hindi`, `impactinitiatives_button1`, `impactinitiatives_image`,`status` FROM `js_impact_initiatives` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                $counts = sqlNUMOFROW_LABEL($list_transactions);

                while ($row = sqlFETCHARRAY_LABEL($list_transactions)) :
                    $growth_id = $row["growth_id"];
                    $impactinitiatives_title = $row["impactinitiatives_title"];
                    $impactinitiatives_hindi_title = $row["impactinitiatives_hindi_title"];
                    $impactinitiatives_description = $row["impactinitiatives_description"];
                    $impactinitiatives_description_hindi = $row["impactinitiatives_description_hindi"];
                    $impactinitiatives_button1 = $row["impactinitiatives_button1"];
                    $impactinitiatives_image = $row["impactinitiatives_image"];
                ?>
                <!-- Column 1 -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 p-0 ">
                    <div class="man-content">
                        <div class="overlay">
                            <h3 class="fade-in ms-5 m-sm-2 m-md-2"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $impactinitiatives_hindi_title;
                                                else:
                                                 echo   $impactinitiatives_title;
                                                endif; ?></h3>
                            <p class="text-start fade-in mt-3 ms-5 m-sm-2 m-md-2 ps-0">
                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $impactinitiatives_description_hindi;
                                                else:
                                                 echo   $impactinitiatives_description;
                                                endif; ?></p>
                            <div class="text-center w-100 mt-4">
                                <a href="<?= $impactinitiatives_button1 ?>" class="card-know-more fade-in">
                                <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'अधिक जानें';
                                                else:
                                                 echo   'Know More';
                                                endif; ?></a>
                            </div>
                        </div>
                        <div>
                            <h2 class="offering-title m-md-0 m-sm-0"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $impactinitiatives_hindi_title;
                                                else:
                                                 echo   $impactinitiatives_title;
                                                endif; ?></h2>
                            <img src="<?= SEOURL; ?>assets/front/home/<?= $impactinitiatives_image ?>"
                                class="four-image-transition-1">
                        </div>
                    </div>
                </div>

                <?php endwhile ?>
            </div>
        </div>
    </div>

    <div id="welcomeBanner" class="welcomeBanner animate__animated animate__fadeInUp">

        <?php
        $list_welcomebanner = sqlQUERY_LABEL("SELECT `welcome_banner_id`, `welcome_banner_image`, `welcome_banner_link` FROM `welcome_banner` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
        while ($row = sqlFETCHARRAY_LABEL($list_welcomebanner)) :
            $welcomebanner_id = $row["welcome_banner_id"];
            $welcomebanner_image = $row["welcome_banner_image"];
            $welcomebanner_link = $row["welcome_banner_link"];
        endwhile;
        ?>

        <a href="<?= $welcomebanner_link ?>" target="_blank">
            <img src="assets/front/home/<?= $welcomebanner_image ?>" alt="Welcome Image">

        </a>
        <span id="welcomeBannerCloseButton">&times;</span>
    </div>


    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/aos.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const welcomeBanner = document.getElementById("welcomeBanner");
        const closeButton = document.getElementById("welcomeBannerCloseButton");

        setTimeout(function() {
            welcomeBanner.style.display = "block";
        }, 500);

        closeButton.addEventListener("click", function() {
            welcomeBanner.style.display = "none";
        });

        // setTimeout(function() {
        //     welcomeBanner.classList.remove("animate__fadeInUp");
        //     welcomeBanner.classList.add("animate__zoomOutRight");
        //     // welcomeBanner.classList.add("animate__lightSpeedOutRight");
        //     // welcomeBanner.classList.add("animate__fadeOut");

        //     setTimeout(function() {
        //         welcomeBanner.style.display = "none";
        //     }, 1000);

        // }, 5000);
    });
    </script>

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
            autoplay: true,
            autoplayTimeout: 8000 // Adjust this value to set the autoplay speed in milliseconds (4 seconds)
        });
    });
    </script>

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
        $(".home-page-slider").trigger('refresh.owl.carousel');
    }

    function resetZoom() {
        currentZoom = 100;
        document.body.style.zoom = `${currentZoom}%`;
        $(".home-page-slider").trigger('refresh.owl.carousel');
    }
    </script>

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

    <?php require_once('public/footer.php'); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var x = document.getElementById("float");
        var y = document.getElementById("home-float-head");

        // Open the floating element initially
        x.style.left = "159px";
        y.style.marginLeft = "0";
        y.style.transition = "0.5s";

        // Close the floating element after 4 seconds
        setTimeout(function() {
            x.style.left = "0";
            y.style.marginLeft = "-300px";
            y.style.transition = "0.8s";
        }, 1500);
    });

    function Opener() {
        var x = document.getElementById("float");
        var y = document.getElementById("home-float-head");

        if (x.style.left === "159px") {
            x.style.left = "0";
            y.style.marginLeft = "-300px";
            y.style.transition = "0.5s";
        } else {
            x.style.left = "159px";
            y.style.marginLeft = "0";
            y.style.transition = "0.2s";
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var homeFloating = document.querySelector('.home-floating');
        var svgIcon = document.querySelector('.home-floating-svg');

        homeFloating.addEventListener('click', function() {
            svgIcon.classList.toggle('opposite');
        });
    });

    function Opener3() {
        var y = document.getElementById("floating-slider-head");
        var svgIcon = document.querySelector('.home-floating-svg3');

        if (y.style.marginLeft === "-600px" || y.style.marginLeft === "") {
            // If the element is closed or not set, open it
            y.style.marginLeft = "0";
            y.style.transition = "0.5s";
            // Add a class to change the icon
            svgIcon.classList.add('open-state');
        } else {
            // If the element is open, close it
            y.style.marginLeft = "-600px";
            y.style.transition = "0.2s";
            // Remove the class to revert the icon
            svgIcon.classList.remove('open-state');
        }
    }





    $(document).ready(function() {
        // Variables to track the pause/play state
        var isPaused = false;

        // Function to toggle the pause/play state and update the button
        function togglePausePlay() {
            isPaused = !isPaused;
            var iconClass = isPaused ? 'fa-play' : 'fa-pause';
            $('.floating-pause-slide i').removeClass('fa-pause fa-play').addClass(iconClass);

            // Pause or play the slider based on the current state
            if (isPaused) {
                pauseSlider();
            } else {
                startSlider();
            }
        }

        // Click event handler for the pause/play button
        $('.floating-pause-slide').on('click', function() {
            togglePausePlay();
        });
    });

    let slides = document.querySelectorAll('.floating-slide');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
        slides.forEach((slide) => {
            slide.classList.remove('active');
        });
        slides[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function startSlider() {
        slideInterval = setInterval(nextSlide, 3000); // Change slide every 3 seconds
    }

    function pauseSlider() {
        clearInterval(slideInterval);
    }

    document.querySelector('.floating-next-slide').addEventListener('click', () => {
        nextSlide();
        pauseSlider();
    });

    document.querySelector('.floating-prev-slide').addEventListener('click', () => {
        prevSlide();
        pauseSlider();
    });

    document.querySelector('.floating-pause-slide').addEventListener('click', () => {
        pauseSlider();
    });

    startSlider(); // Start the slider initially
    </script>

    <script>
    const translations = {
        'homeTITLE': {
            'en': 'Home - Small Industries Development Bank of India',
            'hi': 'मुख्य पृष्ठ - भारतीय लघु उद्योग विकास बैंक'
        },
        'reuire': {
            'en': 'Require MSME Loan?',
            'hi': 'क्या एमएसएमई ऋण की आवश्यकता है?'
        },
        'quick': {
            'en': 'Quick Sanctions',
            'hi': 'त्वरित मंजूरी'
        },
        'apply': {
            'en': 'Apply Now',
            'hi': 'अभी आवेदन करें'
        },
        'know': {
            'en': 'Know More',
            'hi': 'अधिक जानें'
        },
        'look': {
            'en': 'Looking for a Machinery loan?',
            'hi': 'क्या मशीनरी ऋण की आवश्यकता है?'
        },
        'minimum': {
            'en': 'Minimum Paperwork',
            'hi': 'न्यूनतम कागजी कार्रवाई'
        },
        'need': {
            'en': 'Need Project Funding?',
            'hi': 'क्या प्रोजेक्ट फ़ंडिंग की आवश्यकता है?'
        },
        'customized': {
            'en': 'Customized Solutions',
            'hi': 'अनुकूलित समाधान'
        },
        'working': {
            'en': 'Need Working Capital?',
            'hi': 'क्या कार्यशील पूंजी की आवश्यकता है?'
        },
        'easy': {
            'en': 'Easy to Apply',
            'hi': 'आवेदन करने केलिए सरल'
        },
        'green': {
            'en': 'Need Green Finance Loan?',
            'hi': 'क्या हरित वित्त ऋण की आवश्यकता है?'
        },
        'low': {
            'en': 'Attractive Rate of Interest',
            'hi': 'आकर्षक ब्याज दर'
        },
        'unlocking': {
            'en': 'Unlocking Growth: Empowering MSMEs through Digital Finance',
            'hi': 'विकास को अनलॉक करना: डिजिटल वित्त के माध्यमसे एमएसएमई को सशक्त बनाना'
        },
        'quick-san': {
            'en': 'Quick Sanction in 48 Hours',
            'hi': '48 घंटे में त्वरित मंजूरी'
        },
        'digital': {
            'en': 'Digital Process',
            'hi': 'डिजिटल प्रक्रिया'
        },
        'interest': {
            'en': 'Competitive Interest Rates',
            'hi': 'प्रतिस्पर्धी ब्याज दरें'
        },
        'unlockeasy': {
            'en': 'Easy to Apply',
            'hi': 'आवेदन करने केलिए सरल'
        },
        'paperless': {
            'en': 'Paperless Sanction',
            'hi': 'कागज रहित मंजूरी'
        },
        'credit-score': {
            'en': '*Credit score linked interest rate. All loans are at the sole discretion of SIDBI. T&C apply.',
            'hi': '*क्रेडिट स्कोर से जुड़ी ब्याज दर। सभी ऋण सिडबी के विवेक पर निर्भर हैं। नियम एवं शर्तें लागू.'
        },
        'financing': {
            'en': 'Financing MSME Clusters in Different States/UTs',
            'hi': 'विभिन्न राज्यों/केंद्रशासित प्रदेशों में एमएसएमई समूहों को वित्तपोषण'
        },
        'promoting': {
            'en': 'Promoting MSME Cluster Through Infrastructure Development',
            'hi': 'बुनियादी ढांचे के विकास के माध्यम से एमएसएमई क्लस्टर को बढ़ावा देना'
        },
        'on-tap': {
            'en': 'GST Sahay - ‘On tap’ based lending platform',
            'hi': "जीएसटी सहाय - 'ऑन टैप' आधारित ऋण देने वाला मंच"
        },
        'gst': {
            'en': 'SIDBI, in association with Online PSB Loans Ltd (OPL) and iSPIRT, has developed a reference GST Sahay Application.',
            'hi': 'सिडबी ने ऑनलाइन पीएसबी लोन लिमिटेड (ओपीएल) और आईएसपीआईआरटी के सहयोग से एक संदर्भ जीएसटी सहाय एप्लिकेशन विकसित किया है।'
        },
        'ranking1': {
            'en': 'FIT Rank for MSMEs',
            'hi': 'एमएसएमई के लिए एफआईटी रैंक'
        },
        'fit1': {
            'en': 'CIBIL, in collaboration with Online PSB Loans Limited (OPL), under the mentorship of SIDBI,launched FIT rank.',
            'hi': 'सिडबी की देखरेख में सिबिल ने ऑनलाइन पीएसबी लोन लिमिटेड (ओपीएल) के सहयोग से एफआईटी रैंक लॉन्च किया।'
        },


        'electronic': {
            'en': 'TReDS is an electronic platform for online discounting of bills of MSMEs for supplies to large corporate..',
            'hi': 'लिए एक प्लेटफ़ॉर्म है जो बड़े कॉर्पोरेट को आपूर्ति के लिए एमएसएमई के बिलों की ऑनलाइन भुनाई के लिए एक इलेक्ट्रॉनिक प्लेटफ़ॉर्म है।'
        },
        'cgtmse': {
            'en': 'CGTMSE Credit Guarantee for MSME financing',
            'hi': 'एमएसएमई वित्तपोषण के लिए सीजीटीएमएसई क्रेडिट गारंटी'
        },
        'credit-guarantee': {
            'en': 'CGTMSE set up by SIDBI and Ministry of MSME, GoI in 2000, operates the Credit Guarantee Scheme (CGS) for MSEs.',
            'hi': 'सिडबी और एमएसएमई मंत्रालय, भारत सरकार द्वारा 2000 में स्थापित सीजीटीएमएसई एमएसई के लिए क्रेडिट गारंटी योजना (सीजीएस) संचालित करता है।'
        },
        'impact': {
            'en': 'Impact Initiatives',
            'hi': 'प्रभाव पहल'
        },
        'latest': {
            'en': 'Latest Developments',
            'hi': 'नवीनतम घटनाक्रम'
        },
        'stepping': {
            'en': '9 Dec 23; COP 28 Stepping up the green game! SIDBI achieved another milestone at COP28 by signing a Green and Sustainability Finance Facility (GSFF) with KfW for MSMEs. This was signed by Dr. RK Singh, CGM in presence of Shri Prakash Kumar, DMD & Shri Rajiv Kumar, GM, SIDBI. The project focuses on financing green initiatives with priority on energy efficiency and the EV ecosystem. Technical Assistance includes updates of the existing green tech list and enhancing SIDBIs ESG framework.',
            'hi': '9 दिसम्बर 23; सीओपी 28 हरित खेल को आगे बढ़ा रहा है! SIDBI ने एमएसएमई के लिए KfW के साथ ग्रीन एंड सस्टेनेबिलिटी फाइनेंस फैसिलिटी (GSFF) पर हस्ताक्षर करके COP28 में एक और मील का पत्थर हासिल किया। इस पर सीजीएम डॉ. आरके सिंह ने श्री प्रकाश कुमार, डीएमडी और श्री राजीव कुमार, जीएम, सिडबी की उपस्थिति में हस्ताक्षर किए। यह परियोजना ऊर्जा दक्षता और ईवी पारिस्थितिकी तंत्र पर प्राथमिकता के साथ हरित पहल के वित्तपोषण पर केंद्रित है। तकनीकी सहायता में मौजूदा हरित तकनीकी सूची का अद्यतन और सिडबी के ईएसजी ढांचे को बढ़ाना शामिल है।'
        },
        'business': {
            'en': 'SIDBI invites Applications for Engagement of Business Analysts on Contractual Basis (Full Time)- 2023',
            'hi': 'सिडबी ने संविदात्मक आधार पर व्यवसाय विश्लेषकों की नियुक्ति (पूर्णकालिक)-2023 के लिए आवेदन आमंत्रित किए हैं।'
        },
        'sidbi-cgtmse': {
            'en': '29 Jan 24 - SIDBI & CGTMSE have set-up a Chair in NiMSME',
            'hi': '29 जनवरी 24 - सिडबी और सीजीटीएमएसई ने NiMSME में एक चेयर की स्थापना की है'
        },
        'bhuva': {
            'en': '12 Jan 24 – SIDBI MSME Conclave in Bhubaneswar The second event in the series at Bhubaneswar saw Mr. Sudatta Mandal, DMD, SIDBI open the conclave as he spoke about the states startup hub & role SIDBI has in Odisha as market maker. Followed by Mr. Saswat Mishra, Principal Secretary, MSME Government of Odisha & Mr. Omkar Rai, Executive Chairman, Startup Odisha, as they discussed development of clusters & district growth of Odisha & how programs intend to catalyze the growth, like government-based grants for startups.',
            'hi': '12 जनवरी 24 - भुवनेश्वर में सिडबी एमएसएमई कॉन्क्लेव भुवनेश्वर में श्रृंखला के दूसरे कार्यक्रम में श्री सुदत्त मंडल, डीएमडी, सिडबी ने सम्मेलन का उद्घाटन किया उन्होंने राज्य के स्टार्टअप हब और ओडिशा में बाजार निर्माता के रूप में सिडबी की भूमिका के बारे में बात की। श्रीमान द्वारा अनुसरण किया गया सास्वत मिश्रा, प्रमुख सचिव, एमएसएमई ओडिशा सरकार और श्री ओंकार राय, कार्यकारी अध्यक्ष, स्टार्टअप ओडिशा, उन्होंने ओडिशा के क्लस्टर और जिला विकास और कैसे विकास पर चर्चा की स्टार्टअप के लिए सरकार-आधारित अनुदान जैसे कार्यक्रमों का उद्देश्य विकास को उत्प्रेरित करना है।'
        },
        'indore': {
            'en': '9 Jan 24 – SIDBI MSME Conclave in Indore SIDBI in association with EconomicTimes.com organized a nationwide series of conclaves, aimed at defining the MSME playbook for the next decade. Starting at Indore, speakers - Mr. Shankar Lalwani, Member of Parliament, Lok Sabha ; Mr. Prakash Kumar, DMD, SIDBI ; Mr. Ravi Tyagi, CGM, SIDBI ; Ms. Mamta Bakliwal, Mr. Ankur Phadnis, Mr. Akshat Chordia, Mr. Kirti Joshi, graced the event with insightful conversations. Sanction Letters were also distributed in ceremony to SIDBI associated MSMEs. Shri Anjani Kumar Srivastava, GM, SIDBI delivered the concluding presentation, Q/A on SIDBI’s available schemes.',
            'hi': '9 जनवरी 24 - इंदौर में सिडबी एमएसएमई कॉन्क्लेव SIDBI ने इकोनॉमिकटाइम्स.कॉम के सहयोग से सम्मेलनों की एक राष्ट्रव्यापी श्रृंखला का आयोजन किया, जिसका उद्देश्य था अगले दशक के लिए एमएसएमई प्लेबुक को परिभाषित करना। इंदौर से प्रारंभ करते हुए, वक्ता - श्री शंकर लालवानी, संसद सदस्य, लोकसभा; प्रकाश जी कुमार, डीएमडी, सिडबी; श्री रवि त्यागी, सीजीएम, सिडबी; सुश्री ममता बाकलीवाल, श्री अंकुर फडनीस, श्री अक्षत चोर्डिया, श्री कीर्ति जोशी ने ज्ञानवर्धक बातचीत से कार्यक्रम की शोभा बढ़ाई। समारोह में सिडबी से जुड़े एमएसएमई को मंजूरी पत्र भी वितरित किए गए। श्री अंजनी कुमार श्रीवास्तव, जीएम, सिडबी ने सिडबी की उपलब्ध योजनाओं पर प्रश्नोत्तरी के रूप में समापन प्रस्तुति दी।'
        },
        'ramann': {
            'en': 'Shri S Ramann, CMD, SIDBI flagged off the Jagriti Yatra, a unique entrepreneurship train journey across India, spreading the message of Green Entrepreneurship & Sustainability, to cultivate green innovation and empower the next generation of eco-conscious entrepreneurs.',
            'hi': 'सिडबी के सीएमडी श्री एस रमन ने जागृति यात्रा को हरी झंडी दिखाई, जो पूरे भारत में एक अनूठी उद्यमिता ट्रेन यात्रा है, जो हरित उद्यमिता और स्थिरता का संदेश फैलाती है, ताकि हरित नवाचार को बढ़ावा दिया जा सके और पर्यावरण के प्रति जागरूक उद्यमियों की अगली पीढ़ी को सशक्त बनाया जा सके।'
        },
        'ippb': {
            'en': 'MoU with India Post Payment Bank (IPPB)',
            'hi': 'इंडिया पोस्ट पेमेंट बैंक (आईपीपीबी) के साथ समझौता ज्ञापन'
        },
        // 'scf': {
        //     'en': 'Swavalamban Challenge Fund (SCF – III) is accepting applications from NGOs, Educational Institutions and Startups working in development sector to provide grant funding support upto maximum of ₹50 lakh.Eligible entities may register & apply before November 10, 2023 1800 hours at https://scf.udyamimitra.in/',
        //     'hi': 'स्वावलंबन चैलेंज फंड (एससीएफ - III) अधिकतम ₹50 लाख तक अनुदान सहायता प्रदान करने के लिए विकास क्षेत्र में काम करने वाले गैर सरकारी संगठनों, शैक्षणिक संस्थानों और स्टार्टअप्स से आवेदन स्वीकार कर रहा है। पात्र संस्थाएं 10 नवंबर, 2023 1800 बजे से पहले https पर पंजीकरण और आवेदन कर सकती हैं: //scf.udyamimitra.in/'
        // },
        'scf': {
            'en': 'FM inaugurates Coimbatore South Branch Honble FM, Smt. Nirmala Sitharaman shared praise to SIDBI for the profound development achieved for MSME sector, in the presence of Shri S.Ramann, CMD, & Shri Sudatta Mandal, DMD at the inauguration of SIDBI_Coimbatore South branch.',
            'hi': 'एफएम ने कोयंबटूर दक्षिण शाखा का उद्घाटन किया माननीय एफएम, श्रीमती। SIDBI_कोयंबटूर दक्षिण शाखा के उद्घाटन के अवसर पर श्री एस.रमन, सीएमडी और श्री सुदत्त मंडल, डीएमडी की उपस्थिति में, निर्मला सीतारमण ने एमएसएमई क्षेत्र के लिए किए गए गहन विकास के लिए सिडबी की प्रशंसा की।'
        },
        'global': {
            'en': '12 Dec 23: Global Inclusive Finance Summit 2023 Global Inclusive Finance Summit 2023 conducted by ACCESS Development Services (ADS)! At the event, Shri S Ramann, CMD, addressed the inaugural session and participated in release of “Inclusive Finance India Report 2023” - an annual publication on the progress of the financial inclusion agenda at various levels in the country. Shri Prakash Kumar, DMD, SIDBI participated in the insightful plenary session on the Future of Finance-Crystal Ball Gazing. The summit explores the progress of financial inclusion in India.',
            'hi': '12 दिसंबर 23: वैश्विक समावेशी वित्त शिखर सम्मेलन 2023 वैश्विक समावेशी वित्त शिखर सम्मेलन 2023 ACCESS डेवलपमेंट सर्विसेज (ADS) द्वारा आयोजित किया गया! घटना में, श्री एस रमन, सीएमडी, ने उद्घाटन सत्र को संबोधित किया और "समावेशी वित्त" के विमोचन में भाग लिया इंडिया रिपोर्ट 2023 - विभिन्न स्तरों पर वित्तीय समावेशन एजेंडा की प्रगति पर एक वार्षिक प्रकाशन देश में स्तर. श्री प्रकाश कुमार, डीएमडी, सिडबी ने व्यावहारिक पूर्ण सत्र में भाग लिया वित्त का भविष्य-क्रिस्टल बॉल गेजिंग. शिखर सम्मेलन वित्तीय समावेशन की प्रगति का पता लगाता है भारत।'
        },
        'view-all': {
            'en': 'View All',
            'hi': 'सभी को देखें'
        },
        'treds1': {
            'en': 'TReDS Platform for Invoice Discounting',
            'hi': 'ट्रेड्स ट्रेड्स इनवॉइस डिस्काउंटिंग के'
        },
        'tenders': {
            'en': 'Tenders',
            'hi': 'निविदाएँ'
        }, //footer header
        'contact': {
            'en': 'Contact Us',
            'hi': 'हम से संपर्क करें'
        },
        'address': {
            'en': '15, Ashok Marg, Lucknow - 226001, Uttar Pradesh',
            'hi': '15, अशोक मार्ग, लखनऊ - 226001, उत्तर प्रदेश'
        },
        'customer': {
            'en': 'Contact Us',
            'hi': 'ग्राहक देखभाल'
        },
        'reports': {
            'en': 'Publication And Reports',
            'hi': 'प्रकाशन और रिपोर्ट'
        },
        'agencies': {
            'en': 'Multilateral Agencies',
            'hi': 'बहुपक्षीय एजेंसियाँ'
        },
        'press': {
            'en': 'Press Releases',
            'hi': 'प्रेस प्रकाशनी'
        },
        'reserve': {
            'en': 'Reservation Roster',
            'hi': 'प्रकाशन एवं रिपोर्ट'
        },
        'about': {
            'en': 'About us',
            'hi': 'हमारे बारे में'
        },
        'retiree': {
            'en': 'Retiree Portal',
            'hi': 'सेवानिवृत्त पोर्टल'
        },
        'rti': {
            'en': 'RTI Cell',
            'hi': 'सूचना का अधिकार कक्ष'
        },
        'circular': {
            'en': 'circulars',
            'hi': 'परिपत्र'
        },
        'terms': {
            'en': 'Terms & Conditions',
            'hi': 'नियम एवं शर्तें'
        },
        'privacy': {
            'en': 'Privacy Policy',
            'hi': 'गोपनीयता नीति'
        },
        'copyright-policy': {
            'en': 'Copyright Policy',
            'hi': 'कॉपीराइट नीति'
        },
        'hyperlink': {
            'en': 'Hyperlink Policy',
            'hi': 'हाइपरलिंक नीति'
        },
        'accessibility': {
            'en': 'Accessibility',
            'hi': 'सरल उपयोग'
        },
        'disclaimer': {
            'en': 'Disclaimer',
            'hi': 'अस्वीकरण'
        },
        'sitemap': {
            'en': 'Sitemap',
            'hi': 'साइट मैप'
        },
        'copyright': {
            'en': 'Copyright © 2023 Small Industries Development Bank of India(SIDBI). All rights reserved',
            'hi': 'कॉपीराइट © 2023 भारतीय लघु उद्योग विकास बैंक (सिडबी)। सभी अधिकार सुरक्षित'
        },
        'home': {
            'en': 'Home',
            'hi': 'मुख्य पृष्ठ'
        },
        'loan': {
            'en': 'Loans',
            'hi': 'ऋण'
        },
        'msme': {
            'en': 'MSME Loans',
            'hi': 'एमएसएमई ऋण'
        },
        'institute': {
            'en': 'Institutional Finance',
            'hi': 'संस्थागत वित्त'
        },
        'prayaas': {
            'en': 'PRAYAAS',
            'hi': 'प्रयास'
        },

        'promotion': {
            'en': 'Promotional Initiatives',
            'hi': 'संवर्धनात्मक पहल'
        },
        'ecosystem': {
            'en': 'Ecosystem',
            'hi': 'पारितंत्र'
        },
        'subs': {
            'en': 'Subsidiary Network',
            'hi': 'सहायक नेटवर्क'
        },
        'fund': {
            'en': 'Fund of Funds',
            'hi': 'निधियों का कोष'
        },
        'enquiry': {
            'en': 'Enquire Now',
            'hi': 'अब शिकायत दर्ज करें'
        },
        'toll': {
            'en': 'Toll Free Number: 180-022-6753',
            'hi': 'टोल फ्री नंबर: 180-022-6753'
        }, //megamenu
        'overview1': {
            'en': 'Overview',
            'hi': 'परिचय'
        },
        'misvis': {
            'en': 'Mission & Vision',
            'hi': 'मिशन & विज़न'
        },
        'board1': {
            'en': 'Board Of Directors',
            'hi': 'निदेशक मण्डल'
        },
        'evolution1': {
            'en': 'Evolution Of SIDBI',
            'hi': 'सिडबी का प्रादुर्भाव'
        },
        'historical1': {
            'en': 'Historical Journey',
            'hi': 'ऐतिहासिक यात्रा'
        },
        'organization1': {
            'en': 'Organization Chart',
            'hi': 'संगठन चार्ट'
        },
        'loans1': {
            'en': 'Loans For MSMEs',
            'hi': 'एमएसएमई के लिए ऋण'
        },
        'msme1': {
            'en': 'MSME Loans',
            'hi': 'एमएसएमई ऋण'
        },
        'prayaas1': {
            'en': 'PRAYAAS',
            'hi': 'प्रयास'
        },
        'treds2': {
            'en': 'TReDS',
            'hi': 'ट्रेड्स'
        },
        'cluster1': {
            'en': 'Cluster Development Initiatives',
            'hi': 'क्लस्टर विकास पहल'
        },
        'customer1': {
            'en': 'Customer Portal',
            'hi': 'ग्राहक पोर्टल'
        },
        'other1': {
            'en': 'Other Loan Products',
            'hi': 'अन्य ऋण उत्पाद'
        },
        'institutional1': {
            'en': 'Institutional Finance',
            'hi': 'संस्थागत वित्त'
        },
        'refinance1': {
            'en': 'Refinance To Banks',
            'hi': 'बैंकों को पुनर्वित्त'
        },
        'lending1': {
            'en': 'Lending To NBFCs',
            'hi': 'गैर बैंकिंग वित्त कंपनियों को उधार देना'
        },
        'mfi1': {
            'en': 'Lending To MFIs',
            'hi': 'सूक्ष्म वित्त संस्थाओं को उधार देना'
        },
        'government1': {
            'en': 'Government Programmes',
            'hi': 'सरकारी कार्यक्रम'
        },
        'vishwakarma1': {
            'en': 'PM Vishwakarma Scheme',
            'hi': 'प्रधान मंत्री विश्वकर्मा योजना'
        },
        'svanidhi1': {
            'en': 'PM SVANidhi Scheme',
            'hi': 'प्रधान मंत्री स्वनिधि योजना'
        },
        'scheme1': {
            'en': 'PLI Schemes',
            'hi': 'पीएलआई योजनाएं'
        },
        'otherscheme1': {
            'en': 'Other Schemes',
            'hi': 'अन्य योजनाएँ'
        },
        'corporate1': {
            'en': 'Corporate Governance',
            'hi': 'नैगम अभिशासन'
        },
        'information1': {
            'en': 'Information/Policies',
            'hi': 'जानकारी/नीतियाँ'
        },
        'listiong1': {
            'en': 'Listing Disclosure',
            'hi': 'सूचीबद्धकरण प्रकटीकरण'
        },
        'chief1': {
            'en': 'Chief Grievance Officer/Grievance Redressal Officer For PWD',
            'hi': 'मुख्य व्यथा अधिकारी/ पीड्व्ल्यूडी के लिए व्यथा निवारण अधिकारी'
        },
        'complaints1': {
            'en': 'Complaints/ Grievance Redressal',
            'hi': 'शिकायतें/ व्यथा निवारण'
        },
        'reports1': {
            'en': 'Financials Reports',
            'hi': 'वित्तीय रिपोर्टें'
        },
        'impact1': {
            'en': 'Impact Initiatives',
            'hi': 'प्रभाव पहल'
        },
        'gst1': {
            'en': 'GST Sahay',
            'hi': 'जीएसटी सहाय'
        },
        'fitrank1': {
            'en': 'FIT Rank',
            'hi': 'एफआईटी रैंक'
        },
        'udyam1': {
            'en': 'Udyam Assist Platform',
            'hi': 'उद्यम असिस्ट प्लेटफार्म'
        },
        'jocata1': {
            'en': 'Jocata Sumpoorn',
            'hi': 'जोकाटा सम्पूर्ण'
        },
        'knowledge1': {
            'en': 'Knowledge Products',
            'hi': 'ज्ञान उत्पाद'
        },
        'msmepulse1': {
            'en': 'MSME Pulse',
            'hi': 'एमएसएमई पल्स'
        },
        'microfinanace1': {
            'en': 'Microfinance Pulse',
            'hi': 'माइक्रोफाइनेंस पल्स'
        },
        'fintech1': {
            'en': 'Fintech Pulse',
            'hi': 'फिनटेक पल्स'
        },
        'spex1': {
            'en': 'SPex The Green Pulse',
            'hi': 'स्पेक्स दि ग्रीन पल्स'
        },
        'investor1': {
            'en': 'Investor Relations',
            'hi': 'निवेशक संबंध'
        },
        'fixed1': {
            'en': 'Fixed Deposit Scheme',
            'hi': 'सावधि जमा योजना'
        },
        'details1': {
            'en': 'Details Of Debenture Trustees',
            'hi': 'डिबेंचर ट्रस्टियों का विवरण'
        },
        'media1': {
            'en': 'Media',
            'hi': 'मिडिया'
        },
        'social1': {
            'en': 'Social Media',
            'hi': 'सामाजिक मीडिया'
        },
        'gallery1': {
            'en': 'Galleries',
            'hi': 'गैलरी'
        },
        'events1': {
            'en': 'Events',
            'hi': 'घटनाएँ'
        },
        'workwith1': {
            'en': 'Work with us',
            'hi': 'हमारे साथ कार्य करें'
        },
        'career1': {
            'en': 'Career',
            'hi': 'कैरियर'
        },
        'join1': {
            'en': 'Join Us As CCCs',
            'hi': 'सीसीसी के रूप में हमसे जुड़ें'
        },
        'others2': {
            'en': 'Others',
            'hi': 'अन्य'
        },
        'poverty1': {
            'en': 'Poverty Interventions',
            'hi': 'गरीबी हस्तक्षेप'
        },
        'visitapp': {
            'en': 'Visit App',
            'hi': 'ऐप पर जाएं'
        },
        'fixedrate': {
            'en': 'Fixed Deposit Rates',
            'hi': 'सावधि जमा दरें'
        }
    };


    function switchLanguage(language) {
        const elementsToTranslate = document.querySelectorAll('[data-translate]');
        elementsToTranslate.forEach(element => {
            const key = element.getAttribute('data-translate');
            if (translations[key] && translations[key][language]) {
                element.textContent = translations[key][language];
            }
        });
        // Store the selected language in localStorage
        localStorage.setItem('selectedLanguage', language);
        document.getElementById('changeLanguage').value = language;
    }

    // Check if a language is stored in localStorage
    const storedLanguage = localStorage.getItem('selectedLanguage');
    if (storedLanguage) {
        // If a language is stored, switch to that language
        switchLanguage(storedLanguage);
    }

    // Add an event listener to a button that triggers the language switch
    document.getElementById('languageButton').addEventListener('click', function() {
        // Replace 'hi' with the desired language code (e.g., 'en' for English)
        switchLanguage('hi');
    });
    </script>

</body>

</html>