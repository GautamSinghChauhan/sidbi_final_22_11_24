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
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/responsive.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/all-responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.carousel.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.theme.default.min.css" rel="stylesheet" />

    <style>
    /*Home-3-start*/
    .section-head {
        /* font-weight: 700;
        font-size: 35px;
        font-family: 'Rubik'; */
        color: #323232;
        font-family: Rubik;
        font-size: 50px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        /* padding: 37px 0px 36px 109px;     */

    }

    .section-apply {
        background: url(assets/front/images/maskgroup\ \(1\).png);
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
    }

    .products-h5 {
        color: #46C4B6;
        font-size: 20px;
        font-weight: 700;
        line-height: 23.7px;
        font-family: Rubik;

    }

    .products-h6 {
        font-size: 18px;
        font-weight: 400;
        line-height: 21.33px;
        font-family: Rubik;
    }

    .project-product {
        background: url(assets/front/images/Group80.png);
        background-repeat: no-repeat;
        background-size: cover;
        /* height: 500px; */
    }

    .project-heading {
        font-size: 35px;
        font-weight: 700;
        line-height: 41.48px;
        font-family: Rubik;
        text-align: center;
    }

    .project-tap {
        border: 1px solid #00B6F0;
        border-radius: 40px;
        background-color: #F9F8F8;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.20) inset;

    }

    .nav-pills .nav-link.active {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        font-size: 18px;
        font-family: 'Rubik';
        font-weight: 600;
        width: 100%;
        height: 100%;
    }

    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: 40px;
        color: #A4A4A4;
        font-family: Rubik;
        font-size: 18px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
        width: 100%;
        height: 100%;
    }

    .project-button {
        padding: 16px 76px;
    }

    .project-ul li {
        list-style-type: none;
        font-size: 16px;
        font-weight: 400;
        line-height: 23.7px;
        font-family: Rubik;
        margin: 15px 0;
    }

    .project-key-title {
        margin-left: 30px;
        color: #00B6F0;
        font-weight: 700;
        font-family: 'Rubik';
        font-size: 20px;

    }

    .project-ul {
        border-right: 1px solid #00B6F033;

    }

    .project-apply-head {
        display: flex;
        justify-content: center;
        margin-top: 17px;
        padding-bottom: 32px;
    }

    .project-apply {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        padding: 12px 32px;
        border: none;
        border-radius: 40px;
        color: #fff;
        font-weight: 700;

    }



    .section-apply-head {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        padding: 12px 32px;
        border: none;
        border-radius: 40px;
        color: #fff;
        font-weight: 700;
        text-decoration: none;
    }


    #sync2 .item {
        padding: 10px 0px;
        margin: 5px;
        color: #FFF;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
    }

    #sync2 .item h1 {
        font-size: 18px;
    }

    .owl-theme .owl-nav {
        /*default owl-theme theme reset .disabled:hover links */
    }

    .owl-theme .owl-nav [class*='owl-'] {
        transition: all .3s ease;
    }

    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
        background-color: #D6D6D6;
    }

    .owl-theme .owl-nav {
        display: none;
    }

    .success-title {
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        font-family: Rubik;
        /* margin: 98px 0 59px 0; */
        text-align: center;
    }

    .success-p {
        color: #000;
        font-family: Rubik;
        font-size: 18px;
        line-height: normal;
        text-align: left !important;
        padding: 10px 10px 0 10px;
    }

    .success-story-head {
        color: #00B6F0;
        font-family: Rubik;
        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-align: left;
    }

    .success-story-foot {
        font-size: 14px;
    }

    .success-story-foot a,
    .success-story-foot a:hover,
    .success-story-foot a:active {
        color: #0d6efd;
        text-decoration: none;
    }

    .success-story-title {
        color: #D2DF43;
        font-family: Rubik;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-align: left;

    }

    .success-card {
        border-radius: 10px;
        background: #FFF;
        box-shadow: 0px 4px 14px 0px rgba(0, 182, 240, 0.19) !important;
        margin: 0 16px 12px 16px;
        border: none;
        min-height: 320px;
    }

    .card {
        display: flex;
        justify-content: space-around;
    }

    .success-date-head {
        color: #ABABAB;
        font-family: Rubik;
        font-size: 18px;
        font-weight: 400;
        line-height: 21px;
        letter-spacing: 0em;
        text-align: left;
    }

    .owl-dot {
        margin-top: 52px !important;
        margin-bottom: 52px !important;
    }

    .success-card-footer {
        border-top: none !important;
        background-color: transparent !important;
    }

    /* .owl-carousel .owl-item img {
        width: 28px !important;
    } */

    .eligibility-ul li {
        list-style-type: none;
        font-size: 16px;
        font-weight: 400;
        line-height: 23.7px;
        font-family: Rubik;
        margin: 15px 0;
    }


    /* Style the counter cards */
    .swapping-card {
        /* padding-top: 140px; */
        padding-right: 120px;
        padding-left: 120px;
        background: url('assets/front/images/Offering.png') center/cover no-repeat;
        /* height: 70vh; */


    }

    .man-content {
        position: relative;
        overflow: hidden;

    }

    .overlay-image {
        /* width: 50% !important; */
        /* Adjust the width as needed */
        height: 100%;
        object-fit: cover;
        /* Adjust the opacity as needed */
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
        /* transition: background-color 0.3s ease, color 0.3s ease; */
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

    .card-know-more:hover {
        background-color: #000;
        color: #fff;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 480px;
        height: 100%;
        background: linear-gradient(180deg, #00B6F0 0%, #D2DF43 100%);
        display: flex;
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

    .man-content:hover .overlay {
        opacity: 1;
        transform: rotateY(0deg);
        /* Rotate back to 0 degrees on hover */
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

    .section-image {
        width: 700px;
        /* height: 300px; */
        max-width: auto;
        max-height: auto;
    }

    /*Home-3-end*/
    .megamenu-ul {
        padding: 0 !important;

    }

    .megamenu-ul li {
        list-style-type: none;
        margin: 0;
        font-size: 15px;
        font-weight: 400;
    }

    .megamenu-title {
        color: #fff;
        font-size: 18px;
        /* border-bottom: 3px solid #fff; */
        padding: 3px 0;
        font-weight: 700;
        font-family: 'Rubik';
    }

    /* 
    .swapping-card-row {
        position: relative;
        top: 50px;
    } */

    .impact-initiatives-head {
        color: #323232;
        text-align: center;
        font-family: Rubik;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    @media only screen and (min-width:1700.98px) {
        .section-head {

            font-size: 50px !important;

        }
    }

    @media only screen and (min-width:1600.98px) {
        .section-head {
            color: #323232;
            font-family: Rubik;
            font-size: 45px !important;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            padding: 37px 0px 3px 46px;
        }

        .section-apply-button {
            margin-left: 45px;
            text-align: left !important;
        }

        .section-apply-head {
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            padding: 10px 30px;
            border: none;
            border-radius: 40px;
            color: #fff;
            font-weight: 700;
        }

        .section-image {
            width: 700px !important;
            /* height: 300px; */
            max-width: auto;
            max-height: auto;
        }

    }

    @media only screen and (min-width:1200.98px) {
        .section-head {
            color: #323232;
            font-family: Rubik;
            font-size: 45px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            padding: 98px 0px 3px 46px;
        }

        .section-apply-button {
            margin-left: 45px;
            text-align: left !important;
            padding: 20px 0px 40px 0px;

        }

        .section-apply-head {
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            padding: 10px 30px;
            border: none;
            border-radius: 40px;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

    }

    @media only screen and (max-width: 992px) {
        .project-button {
            padding: 12px 45px;
        }
    }

    @media only screen and (min-width:768.98px) {
        .section-image {
            width: 100%;

        }

        .section-head {
            color: #323232;
            font-family: Rubik;
            font-size: 32px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            /* padding: 37px 0px 36px 109px;     */

        }

        .section-apply-button {
            text-align: center;
            padding: 20px 0px 40px 0px;
        }
    }

    @media only screen and (max-width:768.98px) {
        .section-image {
            width: 100%;
        }

        .section-apply-button {
            text-align: center;
            padding: 20px 0px 40px 0px;
        }

        .nav-pills .nav-link {
            background: 0 0;
            border: 0;
            border-radius: 40px;
            color: #A4A4A4;
            font-family: Rubik;
            font-size: 21px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .nav-pills .nav-link.active {
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 21px;
            font-family: 'Rubik';
            font-weight: 700;
        }

        .project-button {
            padding: 9px 14px;
        }

        .project-ul li {
            list-style-type: none;
            font-size: 16px;
            font-weight: 400;
            line-height: 23.7px;
            font-family: Rubik;
            margin: 15px 0;
        }

        .project-heading {
            font-size: 27px;
            font-weight: 600;
            line-height: 41.48px;
            font-family: 'Rubik';
            text-align: center;
        }

        .section-head {
            color: #323232;
            font-family: Rubik;
            font-size: 28px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            /* padding: 15px 40px 15px 40px; */
        }

        .project-apply-head {
            display: flex;
            justify-content: center;
            margin-top: 18px;
            padding-bottom: 45px;
        }

        .success-title {
            font-size: 31px;
            font-weight: 600;
            line-height: normal;
            font-family: Rubik;
            /* margin: 98px 0 59px 0; */
            text-align: center;
        }

        .success-p {
            color: #000;
            font-family: Rubik;
            font-size: 20px;
            line-height: normal;
            text-align: left !important;
            padding: 10px 10px 0px 10px;
            margin-bottom: 0;
        }

        .success-story-head {
            color: #00B6F0;
            font-family: Rubik;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-align: left;
        }

        .success-story-title {
            color: #D2DF43;
            font-family: Rubik;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            text-align: left;
        }

        .success-date-head {
            color: #ABABAB;
            font-family: Rubik;
            font-size: 14px;
            font-weight: 400;
            line-height: 21px;
            letter-spacing: 0em;
            text-align: left;
            text-align: left;
        }

        .project-key-title {
            margin-left: 30px;
            color: #00B6F0;
            font-weight: 600;
            font-family: 'Rubik';
            font-size: 17px;
        }

        .eligibility-ul li {
            list-style-type: none;
            font-size: 17px;
            font-weight: 400;
            line-height: 23.7px;
            font-family: Rubik;
            margin: 15px 0;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 480px;
            height: 100%;
            background: linear-gradient(180deg, #00B6F0 0%, #D2DF43 100%);
            display: flex;
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

        .swapping-card-row img {
            width: 100%;
        }

        .owl-dot {
            margin-top: 20px !important;
            margin-bottom: 30px !important;
        }

        .impact-initiatives-head {
            color: #323232;
            text-align: center;
            font-family: Rubik;
            font-size: 31px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
        }

        .swapping-card {
            padding-right: 0;
            padding-left: 0;
            background: url(assets/front/images/Offering.png) center/cover no-repeat;
        }

        .offering-title {
            font-family: Rubik;
            font-size: 21px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0em;
            /* text-align: left; */
            margin-top: 0px;
            color: #000;
            position: absolute;
            top: 83%;
            left: 38%;
            color: #fff;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .logoSection {
            margin-top: 0px !important;
        }

        .project-tap {
            width: 95%;
        }
    }

    @media only screen and (max-width: 475px) {

        .nav-pills .nav-link.active,
        .nav-pills .nav-link {
            font-size: 16px;
            line-height: 1;
            height: 100%;
            width: 100%;
            padding: 7px 13px;
        }

        .project-key-title {
            font-size: 15px;
        }

        .project-ul li,
        .eligibility-ul li {
            font-size: 14px;
        }

        .logoSection {
            margin-top: 0px !important;
        }

        .working_capital_products_tab,
        .project-heading {
            margin-bottom: 0 !important;
        }
    }

    figure img {
        width: 100%;
    }

    /* ZOOM IN */

    .custom-card-image figure img {
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .custom-card-image figure:hover img {
        -webkit-transform: scale(1.3);
        transform: scale(1.3);
    }
    </style>
</head>

<body class="main-wrapper-en">
    <?php require_once('public/header.php'); ?>
    <div class="section-apply">
        <div class="row g-0">
            <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `projectbanner_ID`, `projectbanner_title`, `projectbanner_title_hindi`, `projectbanner_image`, `status` FROM `projectbanner` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());


            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $projectbanner_ID = $row["projectbanner_ID"];
                $projectbanner_title = $row["projectbanner_title"];
                $projectbanner_title_hindi = $row["projectbanner_title_hindi"];
                $projectbanner_attachement = $row["projectbanner_image"];


            ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5 p-0 ">
                <img src="<?= SEOURL; ?>assets/front/home/<?= $projectbanner_attachement ?>" title="#" alt="#"
                    class="section-image">
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 col-xxl-7 p-0">
                <div>
                    <div>
                        <h5 class="section-head mx-5 mx-xl-0 my-3">  <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projectbanner_title_hindi;
                                                else:
                                                 echo   $projectbanner_title;
                                                endif; ?></h5>
                    </div>
                    <div class="section-apply-button">
                        <a href="https://onlineloanappl.sidbi.in/OnlineApplication/"
                            class="section-apply-head mt-1 mb-4 my-xl-0"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अभी अप्लाई करें';
                                                else:
                                                 echo   'Apply Now';
                                                endif; ?></a>
                    </div>
                </div>

            </div>
            <?php endwhile; ?>

        </div>

    </div>

   
    <?php
    $select_projectproduct = sqlQUERY_LABEL("SELECT `projectproduct_id`, `projectproduct_tab`,  `projectproduct_tab_hindi` FROM `projectproduct` WHERE `status` = '1' and `deleted` = '0' ORDER BY `projectproduct_id` ASC") or die("Unable to get records:" . sqlERROR_LABEL());
    $total_projectproduct_count = sqlNUMOFROW_LABEL($select_projectproduct);
    if ($total_projectproduct_count > 0) :
    ?>
    <div class="project-product">
        <div data-aos="fade-up" data-aos-duration="2000">
            <h5 class="project-heading py-4 py-md-5 mx-4 mb-0"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'प्रोजेक्ट फ़ंडिंग उत्पाद';
                                                else:
                                                 echo   'Project Funding Products';
                                                endif; ?>
            </h5>
            <div class="d-flex justify-content-center mb-4 mb-md-5">
                <ul class="nav nav-pills mb-3 project-tap" id="pills-tab" role="tablist">
                    <?php
                        $projectproduct_counter = 0;
                        while ($row_projectproduct = sqlFETCHARRAY_LABEL($select_projectproduct)) :
                            $projectproduct_counter++;
                            $projectproduct_id = $row_projectproduct["projectproduct_id"];
                            $projectproduct_tab = $row_projectproduct["projectproduct_tab"];
                            $projectproduct_tab_hindi = $row_projectproduct["projectproduct_tab_hindi"];

                            if ($projectproduct_counter == 1) :
                                $get_active_project_product = $projectproduct_id;
                            endif;
                        ?>
                    <li class="nav-item col-4" role="presentation">
                        <button class="nav-link project-button"
                            onclick="fetch_PROJECT_DETAILS('<?= $projectproduct_id; ?>')" type="button"
                            id="projectproduct_btn_<?= $projectproduct_id; ?>" role="tab"
                            aria-selected="true">  <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projectproduct_tab_hindi;
                                                else:
                                                 echo   $projectproduct_tab;
                                                endif; ?></button>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="tab-content container">
                <div class="tab-pane fade show active" id="projectproduct_<?= $projectproduct_id; ?>"
                    role="tabpanel" aria-labelledby="pills-home-tab">
                    <span id="show_ajax_project_product_response"></span>
                </div>
            </div>

        </div>
    </div>
    <?php endif; ?>

    <div class="pt-3 py-sm-5">
        <h2 class="success-title" data-aos="fade-up" data-aos-duration="2000">
        <?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रशंसापत्र';
                                                else:
                                                 echo   'Testimonials';
                                                endif; ?></h2>
    </div>


    <div class="container testimonials-container" data-aos="fade-up" data-aos-duration="2000">
        <div class="owl-carousel owl-theme">
            <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `projecttest_id`, `projecttest_title`, `projecttest_title_hindi`, `projecttest_content`, `projecttest_content_hindi`, `projecttest_image`, `projecttest_link`,  `status` FROM `projecttest` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $projecttest_id = $row["projecttest_id"];
                $projecttest_title = $row["projecttest_title"];
                $projecttest_title_hindi = $row["projecttest_title_hindi"];
                $projecttest_content = $row["projecttest_content"];
                $projecttest_content_hindi = $row["projecttest_content_hindi"];
                $projecttest_image = $row["projecttest_image"];
                $projecttest_link = $row["projecttest_link"];
            ?>
            <div class="item">
                <div class="card success-card">
                    <div class="card-head">
                        <img src="assets/front/home/<?= $projecttest_image ?>">
                        <p class="success-p">  <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projecttest_content_hindi;
                                                else:
                                                 echo   $projecttest_content;
                                                endif; ?>
                        </p>
                    </div>
                    <!-- <div class="card-body pb-1 pb-md-3">
                        <h5 class="success-story-head"><a href="https://www.youtube.com/watch?v=NUzzaGW7CaU">Watch here</a></h5>
                    </div> -->
                    <div class="card-footer success-card-footer">
                        <div class="d-flex justify-content-between">
                            <h5 class="success-story-foot"><a href="<?= $projecttest_link ?>" target="_blank"
                                    ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'यहाँ क्लिक करें
                                                 ';
                                                else:
                                                 echo  'Click here ';
                                                endif; ?></a></h5>
                            <div class="d-flex">
                                <img src="assets/front/images/star 1.svg" title="#" alt="#" width="20px" height="20px">
                                <img src="assets/front/images/star 1.svg" title="#" alt="#" width="20px" height="20px">
                                <img src="assets/front/images/star 1.svg" title="#" alt="#" width="20px" height="20px">
                                <img src="assets/front/images/star 1.svg" title="#" alt="#" width="20px" height="20px">
                                <img src="assets/front/images/star 1.svg" title="#" alt="#" width="20px" height="20px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>


    <div class="">
        <div class="swapping-card">
            <!-- Column 1 -->
            <div class="pt-4 pt-md-5">
                <h2 class="text-center   impact-initiatives-head" data-aos="fade-up" data-aos-duration="2000"
              ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'अन्य पेशकश';
                                                else:
                                                 echo   'Other Offerings';
                                                endif; ?></h2>
            </div>
            <div class="row g-0 gap-5 justify-content-center swapping-card-row">
                <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `projectother_id`, `projectother_title`, `projectother_title_hindi`, `projectother_name`, `projectother_name_hindi`, `projectother_image`, `projectother_link`,  `status` FROM `projectother` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());


                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $projectother_id = $row["projectother_id"];
                    $projectother_title = $row["projectother_title"];
                    $projectother_title_hindi = $row["projectother_title_hindi"];
                    $projectother_name = $row["projectother_name"];
                    $projectother_name_hindi = $row["projectother_name_hindi"];
                    $projectother_image = $row["projectother_image"];
                    $projectother_link = $row["projectother_link"];
                ?>
                <!-- Column 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 p-0 ">
                    <div class="man-content mx-5 mx-md-0" data-aos="fade-up" data-aos-duration="2000">
                        <div>
                            <a href="<?= $projectother_link ?>">
                                <h2 class="offering-title m-md-0 m-sm-0">  <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $projectother_name_hindi;
                                                else:
                                                 echo   $projectother_name;
                                                endif; ?></h2>
                                <img src="<?= SEOURL; ?>assets/front/home/<?= $projectother_image ?>" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/aos.js"></script>




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

    <script>
    $(document).ready(function() {
        $('.carousel').carousel();
        fetch_PROJECT_DETAILS('<?= $get_active_project_product; ?>');
    });
    </script>
    <!-- <script>
            var swiper = new Swiper('.logoSliderInner', {
                slidesPerView: 3,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.logoNavNext',
                    prevEl: '.logoNavPrev',
                },
            });
        </script> -->

    <script>
    $(function() {
        // Owl Carousel
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 3,
            margin: 30,
            padding: 10,
            loop: true,
            nav: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },

                600: {
                    items: 1
                },

                1024: {
                    items: 3
                }
            }
        });
    });
    </script>

    <script>
    jQuery(document).ready(function($) {
        "use strict";
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 30,
            autoplay: true,
            dots: true,
            nav: true,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });

    

    function fetch_PROJECT_DETAILS(PROJECT_PRDT_ID) {
        // Make an AJAX request to fetch content
        $.ajax({
            url: 'head/engine/ajax/ajax_fetch_projectproduct_details.php',
            type: 'POST',
            data: {
                PROJECT_PRDT_ID: PROJECT_PRDT_ID
            },
            success: function(data) {
                // Update the content of the active tab with the fetched data
                $('#show_ajax_project_product_response').html(data);
                $('.nav-link').removeClass('active');
                $('#projectproduct_btn_' + PROJECT_PRDT_ID).addClass('active');
            }
        });
    }
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
    
</body>

</html>