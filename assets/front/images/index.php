<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" /> -->
    <title>Direct Loans - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="assets/front/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link type="text/css" href="assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/front/css/font-awesome.css" />
    <link type="text/css" href="assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="assets/front/js/jquery-min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
            width:75px;
            height:75px;


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
            line-height: 30px;
            letter-spacing: 0em;
            text-align: left;

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
            margin: 2px 22px 2px 4px;
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

            .owl-theme .owl-dots {
                position: absolute;
                top: 290px;
                right: 19%;
            }

            .man-content h3 {
                line-height: 29px;
            }

            .owl-theme .owl-nav {
                height: 10px !important;
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

            .owl-theme .owl-dots {
                position: absolute;
                top: 273px;
                right: 19%;
            }

            .section-icons {
                display: flex !important;
                flex-wrap: wrap !important;
            }

            .man-content h3 {
                line-height: 26px;
            }

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
                line-height: 30px;
                letter-spacing: 0em;
                text-align: left;
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

            .owl-theme .owl-dots {
                position: absolute;
                top: 273px;
                right: 19%;
            }

            .section-icons {
                display: flex !important;
                flex-wrap: wrap !important;
            }

            .man-content h3 {
                line-height: 25px;
            }

            .man-content p,
            .overlay p {
                padding: 0px;
            }

            .man-content button {
                margin-left: 55px !important;
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
                font-weight: 600;
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
                padding: 18px 241px;
            }

            .man-content h3 {
                line-height: 23px;
            }

            .man-content p,
            .overlay p {
                padding: 0px;
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
                font-weight: 600;
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
                padding: 0 13px;
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
            background: rgba(242, 250, 244, .8);
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
    background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);    padding: 14px;
    border-top-right-radius: 22px;
    border-bottom-right-radius: 22px;
    /* border: 1px solid transparent; */
    height: 155px;
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
            font-size: small;
            z-index: 2000;
            top: 75%;
            left: 0;
            display: flex;
        }

       

        .home-floating-svg {
            position: absolute;
            top: 63px;
            left: 3px;
        }

        

        .four-image-transition {
            position: relative;
            transform: translate(-10%, 0%);
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
        background: rgb(0 0 0 / 80%);
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
        color: #fff;
    }

    .floating-pause-slide {
        background: none;
        border: none;
        color: #fff;

    }

    .floating-next-slide {
        background: none;
        border: none;
        color: #fff;

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

    .home-floating3 {
        min-height: 160px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 45%;
        left: 0;
        display: flex;
    }

    .home-floating-svg3 {
        top: 10px;
        margin: 10px -6px 10px -7px;
    }

  

    .home-floating2 {
        min-height: 40px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 50%;
        left: 0;
        display: flex;
    }
    .home-floating3 {
        min-height: 160px;
        position: fixed;
        color: #000;
        font-size: small;
        z-index: 2000;
        top: 45%;
        left: 0;
        display: flex;
    }
    /* Styles for the default state of the icon */
.home-floating-svg3 {
    transition: transform 0.5s ease; /* Add a transition for a smooth effect */
}

/* Styles for the icon when the element is open */
.home-floating-svg3.open-state {
    transform: rotate(180deg); /* Rotate the icon 180 degrees for the open state */
}
.floating-description{
    font-size:12px;
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
                                <div class="col-lg-12 col-md-12 col-xl-6 custom-card-image">
                                    <figure><img src="assets/front/images/image4.jpg" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                                </div>

                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div class="">
                                                <h1 class="text-center slider-section-title">Require MSME Loan?</h1>
                                                <p class="slider-section-para text-center">Quick Sanctions</p>
                                                <div class="banner-buttons">
                                                    <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank">Apply Now</a>
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
                                <div class="col-lg-12 col-md-12 col-xl-6 custom-card-image">
                                    <figure><img src="assets/front/images/image1.jpg" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div class="">
                                                <h1 class="text-center slider-section-title">Looking for a Machinery
                                                    loan?
                                                </h1>
                                                <p class="slider-section-para text-center">Minimum Paperwork</p>
                                                <div class="banner-buttons">
                                                    <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank">Apply Now</a>
                                                    <a href="machinery-loan" class="know-button ms-3">Know More</a>
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
                                <div class="col-lg-12 col-md-12 col-xl-6 custom-card-image">
                                    <figure><img src="assets/front/images/project-loan.png" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                                </div>
                                <div class="col-lg-12 col-md-12 col-xl-6">
                                    <div class="quick-content-main">
                                        <div class="quik-content">
                                            <div>
                                                <h1 class="text-center slider-section-title">Need Project Funding?</h1>
                                                <p class="slider-section-para text-center">Customized Solutions</p>
                                                <div class="banner-buttons">
                                                    <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank">Apply Now</a>
                                                    <a href="project-loan" class="know-button ms-3">Know
                                                        More</a>
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
                        <div class="col-lg-12 col-md-12 col-xl-6 custom-card-image">
                            <figure><img src="assets/front/images/banner-coin.png" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="quick-content-main">
                                <div class="quik-content">
                                    <div>
                                        <h1 class="text-center slider-section-title">Need Working Capital?</h1>
                                        <p class="slider-section-para text-center">Easy to Apply</p>
                                        <div class="banner-buttons">
                                            <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank">Apply Now</a>
                                            <a href="working-capital" class="know-button ms-3">Know More</a>
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
                        <div class="col-lg-12 col-md-12 col-xl-6 custom-card-image">
                            <figure><img src="assets/front/images/green-loan.png" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="quick-content-main">
                                <div class="quik-content">
                                    <div>
                                        <h1 class="text-center slider-section-title">Are you in
                                            Need of a</br> Green Finance Loan?</h1>
                                        <p class="slider-section-para text-center">Low Rate of Interest Rates Starting @
                                            8.30%*</p>
                                        <div class="banner-buttons">
                                            <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank">Apply Now</a>
                                            <a href="green-finance-loan" class="know-button ms-3">Know More</a>
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
    <div onclick="Opener3()" class="float-main">
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
        </div>
        <div class="home-floating2">
            <div class="floating2">
                <div class="floating-title">
                    <p class="rotate"> Latest Developments </p>
                </div>
            </div>
        </div>
    </div>
    <div class="home-floating">
        <div>
            <nav class="home-float p-0" id="home-float-head">
                <li><a href="digital-initiatives">Digital Initiatives</a></li>
                <li><a href="tenders">Tenders</a></li>
                <li><a href="contact-us">Contact Us</a></li>
            </nav>
        </div>
        <div class="floating1" onclick="Opener()" id="float">
            <div class="float-container">
                <div class="float-icon" data-aos="fade-right"><svg width="18" height="18" class="home-floating-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5899 12L10.2969 19.293L11.7109 20.707L20.4179 12L11.7109 3.29303L10.2969 4.70703L17.5899 12Z" fill="url(#paint0_linear_238_787)" />
                        <path d="M5.71087 3.29303L4.29688 4.70703L11.5899 12L4.29688 19.293L5.71087 20.707L14.4179 12L5.71087 3.29303Z" fill="url(#paint1_linear_238_787)" />
                        <defs>
                            <linearGradient id="paint0_linear_238_787" x1="10.2969" y1="19.1833" x2="10.2969" y2="-3.77501" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#fff" />
                                <stop offset="0.333333" stop-color="#fff" />
                                <stop offset="1" stop-color="#fff" />
                            </linearGradient>
                            <linearGradient id="paint1_linear_238_787" x1="4.29688" y1="19.1833" x2="4.29688" y2="-3.77501" gradientUnits="userSpaceOnUse">
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
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">Stepping up the green game!
                            SIDBI achieved another milestone at COP28 by signing a Green and Sustainability Finance
                            Facility (GSFF) with KfW for MSMEs. This was signed by Dr. RK Singh, CGM in presence of Shri
                            Prakash Kumar, DMD & Shri Rajiv Kumar, GM, SIDBI.
                            The project focuses on financing green initiatives with priority on energy efficiency and
                            the EV ecosystem. Technical Assistance includes updates of the existing green tech list and
                            enhancing SIDBI's ESG framework.</p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>

            </div>
            <div class="floating-slide">
                <!-- Content for slide 2 -->
                <!-- <h2>Slide 2</h2> -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">SIDBI invites Applications for Engagement of Business Analysts on
                            Contractual Basis (Full Time)- 2023</p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>
            <div class="floating-slide">
                <!-- Content for slide 3 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">Shri S Ramann, CMD, SIDBI flagged off the Jagriti Yatra, a unique
                            entrepreneurship train journey across India, spreading the message of Green Entrepreneurship
                            & Sustainability, to cultivate green innovation and empower the next generation of
                            eco-conscious entrepreneurs.</p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>
            <div class="floating-slide">
                <!-- Content for slide 4 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">MoU with India Post Payment Bank (IPPB)</p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>
            <div class="floating-slide">
                <!-- Content for slide 5 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">Swavalamban Challenge Fund (SCF – III) is accepting applications from
                            NGOs, Educational Institutions and Startups working in development sector to provide grant
                            funding support upto maximum of ₹50 lakh.
                            Eligible entities may register & apply before November 10, 2023 1800 hours at
                            https://scf.udyamimitra.in/</p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>
            <div class="floating-slide">
                <!-- Content for slide 6 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header floating-description">
                        <p class="text-white">FM inaugurates Coimbatore South Branch
                            Hon’ble FM, Smt. Nirmala Sitharaman shared praise to SIDBI for the profound development
                            achieved for MSME sector, in the presence of Shri S.Ramann, CMD, & Shri Sudatta Mandal, DMD
                            at the inauguration of SIDBI_Coimbatore South branch.
                        </p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>
            <div class="floating-slide">
                <!-- Content for slide 3 -->
                <div class="card border-0 floating-slider-card">
                    <div class="card-header">
                        <p class="text-white"><a href="latest-development">View All</a></p>
                    </div>
                    <div class="card-footer border-0 ">

                    </div>
                </div>
            </div>

            <!-- Add more slides as needed -->
        </div>

        <button class="floating-prev-slide floating-button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>

        </button>
        <button class="floating-pause-slide floating-button"><i class="fa fa-pause" aria-hidden="true"></i></button>

        <button class="floating-next-slide floating-button"><i class="fa fa-arrow-circle-right"
                aria-hidden="true"></i></button>
    </div>

    <!-- <div class="growth">
        <div class="container mb-3">
            <h3 class="growth-head mb-5">
                Unlock Growth: Empowering MSME’s through Digital Finance
            </h3>
            <div class="d-block d-lg-flex justify-content-between gap-4 section-icons">
                <div class="my-1 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/timer1.svg" class="growth-image" alt="growth Image">
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
                <div class="my-1 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 191.svg" class="growth-image" alt="growth Image">
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
                <div class="my-1 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 201.svg" class="growth-image" alt="growth Image">
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
                <div class="my-1 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 21.svg" class="growth-image" alt="growth Image">
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
                <div class="my-1 d-xl-0">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Vector3.svg" class="growth-image" alt="growth Image">
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

    </div> -->

    <div class="growth" data-aos="fade-up" data-aos-duration="2000">
        <div class="container mb-3" data-aos="fade-up" data-aos-duration="2000">
            <h3 class="growth-head mb-2">
                Unlocking Growth: Empowering MSME’s through Digital Finance
            </h3>
            <div class="d-flex justify-content-center gap-4 section-icons container-row">
                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/timer1.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-xl-3">
                                <h3 class="growth-content-head">
                                    Quick 
                                    Sanction
                                    in 48 Hours
                                </h3>
                            </div>
                        </span>
                    </div>

                </div>
                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 191.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-xl-3">
                                <h3 class="growth-content-head">
                                    Digital
                                    Process
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 201.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-xl-3">
                                <h3 class="growth-content-head">
                                    Interest Rate
                                    Starting
                                    8.3%*
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>

                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Group 21.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-xl-3">
                                <h3 class="growth-content-head">
                                    Easy to
                                    Apply
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>

                <div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="assets/front/images/Vector3.svg" class="growth-image" alt="growth Image">
                            </div>
                            <div class="mt-xl-3">
                                <h3 class="growth-content-head">
                                    Paperless 
                                    Sanction
                                </h3>
                            </div>
                        </span>


                    </div>

                </div>
            </div>
            <!-- <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="assets/front/images/timer.svg" class="growth-image" alt="growth Image">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="growth-content">
                        <div class="">
                            <img src="assets/front/images/timer.svg" class="growth-image" alt="Overlay Image">
                        </div>
                    </div>
                </div> -->
            <h5 class="growth-head-under mb-1">
                *Credit score linked interest rate. All loans are at the sole discretion of SIDBI. T&C apply.
            </h5>
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
                    <img class="img-fluid w-100" src="assets/front/images/001.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="assets/front/images/002.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="assets/front/images/003.jpg" alt="" />
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-md-block d-sm-none col-6">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="assets/front/images/004.jpg" alt="" />
                </div>
            </div>
        </div>
        <div class="financing-section">
            <h3 class="financing-head">Financing MSME Clusters in Different States/UTs</h3>
            <h4 class="text-center fw-normal mt-3 mb-5 promoting-head">Promoting MSME Cluster Through Infrastructure
                Development
            </h4>
            <div class="financial-msme-button-head mt-3">
                <a href="msme-cluster-development-initiatives" class="financial-msme-button">Know More</a>
            </div>
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
    <div class="swapping-card" data-aos="fade-up" data-aos-duration="2000">
        <!-- Column 1 -->
        <div data-aos="fade-up" data-aos-duration="2000">
            <div class="row">
                <h2 class="text-center  mt-5 impact-initiatives-head">Impact Initiatives</h2>
            </div>
            <div class="row p-0 justify-content-center swapping-card-row">

                <!-- Column 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0 ">
                    <div class="man-content">
                        <div class="overlay">
                            <h3 class="fade-in ms-5 m-sm-2 m-md-2">“On Tap” </br>Invoice Based Financing</br> (Cash Flow
                                Based Lending)</h3>
                            <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">SIDBI, in association with Online PSB
                                Loans Ltd (OPL) and iSPIRT, has developed a reference
                                GST Sahay Application.</p>
                            <a href="gst-sahay" class="card-know-more fade-in ms-5 mt-2">Know More</a>
                        </div>
                        <div>
                            <h2 class="offering-title m-md-0 m-sm-0">“On Tap” Invoice Based Financing (Cash Flow Based
                                Lending)</h2>
                            <img src="assets/front/images/image5.jpg" class="four-image-transition">
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                    <div class="man-content">
                        <div class="overlay">
                            <h3 class="fade-in ms-5 m-sm-2 m-md-2">Ranking </br>Model for </br>MSME Lending</h3>
                            <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">CIBIL, in collaboration with Online
                                PSB Loans Limited (OPL), under the mentorship of SIDBI,
                                launched FIT rank.</p>
                                <a href="fit-rank" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                        </div>
                        <div>
                            <h2 class="offering-title m-md-0 m-sm-0">Ranking Model for MSME Lending</h2>
                            <img src="assets/front/images/image6.jpg" class="four-image-transition">
                        </div>
                    </div>

                </div>

                <!-- Column 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                    <div class="man-content">
                        <div class="overlay">
                            <h3 class="fade-in ms-5 m-sm-2 m-md-2">TReDS</br> Platform for</br> Invoice Discounting</h3>
                            <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">TReDS is an electronic platform for
                                online discounting of bills of MSMEs for supplies to large
                                corporate..</p>
                            <a href="treds" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                        </div>
                        <div>
                            <h2 class="offering-title m-md-0 m-sm-0">TReDS Platform for Invoice Discounting</h2>
                            <img src="assets/front/images/Treds.jpg" class="four-image-transition">
                        </div>
                    </div>
                </div>

                <!-- Column 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0">
                    <div class="man-content">
                        <div class="overlay">
                            <h3 class="fade-in ms-5 m-sm-2 m-md-2">CGTMSE</br> Credit Guarantee</br> for MSME financing
                            </h3>
                            <p class="text-start fade-in mt-3 ms-5 m-sm-0 m-md-0">CGTMSE set up by SIDBI and Ministry of
                                MSME, GoI in 2000, operates the Credit Guarantee
                                Scheme (CGS) for MSEs.</p>
                             <a href="cgtmse" class="card-know-more fade-in ms-5 mt-4">Know More</a>
                        </div>
                        <div>
                            <h2 class="offering-title m-md-0 m-sm-0">CGTMSE Credit Guarantee for MSME financing</h2>
                            <img src="assets/front/images/Group 133.png" class="four-image-transition">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


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
                autoplay: false,
                autoplayTimeout: 10000 // Adjust this value to set the autoplay speed in milliseconds (4 seconds)
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
                            <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank" title="Udyami Mitra"><img src="assets/front/images/logo4.png" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank" title="The National Portal of Indian"><img src="assets/front/images/logo5.png" class="img-fluid w-100"></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank" title="Central Vigilance Commission"><img src="assets/front/images/logo6.jpg" class="img-fluid w-100"></a>
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
</body>

<!-- Mirrored from SIDBInew.php-staging.com/products by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Nov 2023 07:28:17 GMT -->

</html>