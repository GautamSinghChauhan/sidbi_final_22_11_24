<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="AboutTITLE">About SIDBI - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link rel="stylesheet" href="<?= SEOURL; ?><?= SEOURL; ?>assets/front/css/font-family.css" />
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
    .img-thumbnail {
        transition: all 1s;
    }

    .img-thumbnail:hover {
        transform: scale(1.1);
    }
    </style>
</head>

<body class="main-wrapper-en"></body>

<div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <?php require_once('public/header.php'); ?>

    <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
        <div class="container">
            <div class="inner">
                <h1><?php if ($get_configured_lang == 'HI') :
                        echo   'हमारे बारे में';
                    else :
                        echo   'About Us';
                    endif; ?></h1>
            </div>
        </div>
    </section>
    <section class="breadcrumb-inner" data-aos="fade-right">
        <div class="container">
            <div class="inner">
                <ul>
                    <li><a href="<?= SEOURL; ?>index"><?php if ($get_configured_lang == 'HI') :
                                                            echo   'मुख्य पृष्ठ';
                                                        else :
                                                            echo   'Home';
                                                        endif; ?></a></li>
                    <li><a class="active" href="<?= SEOURL; ?>#"><?php if ($get_configured_lang == 'HI') :
                                                                        echo   'हमारे बारे में';
                                                                    else :
                                                                        echo   'About Us';
                                                                    endif; ?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="overview-section">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">


                <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `overview_ID`, `overview_title`, `overview_title_hindi`, `overview_description`, `overview_description_hindi`, `overview_image`, `status` FROM `overview` where deleted = '0' and `status` = '1' ") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $overview_title = $row["overview_title"];
                    $overview_description = $row["overview_description"];
                    $overview_title_hindi = $row["overview_title_hindi"];
                    $overview_description_hindi = $row["overview_description_hindi"];
                    $overview_attachement = $row["overview_image"];


                ?>
                    <div class="row">
                        <div class="col-lg-4 p-0">
                            <div class="image aos-init aos-animate" data-aos="fade-right">
                                <img src="<?= 'head/uploads/overview_documents/' . $overview_attachement; ?>" style=" background-size: cover;
  background-position: center;
  height: 450px;
  width: calc(50vw - 9px);
  margin-left: calc(-50vw + 100% + 9px);">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="right-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                <h2><?php if ($get_configured_lang == 'HI') :
                                        echo   $overview_title_hindi;
                                    else :
                                        echo   $overview_title;
                                    endif; ?></h2>
                                <p><?php if ($get_configured_lang == 'HI') :
                                        echo   $overview_description_hindi;
                                    else :
                                        echo   $overview_description;
                                    endif; ?></p>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
</div>
</section>
<section class="mission-vision" id="mission-vision">
    <div class="container-fluid position-relative half-fluid">
        <div class="container">
            <?php
            $list_transaction = sqlQUERY_LABEL("SELECT `missionandvision_ID`, `mission_title`, `mission_title_hindi`, `mission_content`, `mission_content_hindi`, `vision_title`, `vision_title_hindi`, `vision_content`, `vision_content_hindi`, `status` FROM `missionandvision` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                $mission_title = $row["mission_title"];
                $mission_content = $row["mission_content"];
                $mission_title_hindi = $row["mission_title_hindi"];
                $mission_content_hindi = $row["mission_content_hindi"];
                $vision_title = $row["vision_title"];
                $vision_content = $row["vision_content"];
                $vision_title_hindi = $row["vision_title_hindi"];
                $vision_content_hindi = $row["vision_content_hindi"];
            ?>
                <div class="row">
                    <div class="col-lg-4 aos-init aos-animate mission-des" data-aos="fade-right">
                        <div class="mission-vision-inner">

                            <h2><?php if ($get_configured_lang == 'HI') :
                                    echo   $mission_title_hindi;
                                else :
                                    echo   $mission_title;
                                endif; ?></h2>
                            <p><?php if ($get_configured_lang == 'HI') :
                                    echo   $mission_content_hindi;
                                else :
                                    echo   $mission_content;
                                endif; ?></p>

                        </div>
                    </div>
                    <div class="col-lg-8 p-0">
                        <div class="image mission-vision-image">

                            <h2><?php if ($get_configured_lang == 'HI') :
                                    echo   $vision_title_hindi;
                                else :
                                    echo   $vision_title;
                                endif; ?></h2>
                            <p><?php if ($get_configured_lang == 'HI') :
                                    echo   $vision_content_hindi;
                                else :
                                    echo   $vision_content;
                                endif; ?></p>

                        </div>
                    </div>
                </div>
            <?php endwhile; ?>


        </div>

    </div>
</section>
<section class="board-directors" id="board-directors">
    <div class="container-fluid">
        <div class="container">
            <h2 data-translate="boardofdirectors"><?php if ($get_configured_lang == 'HI') :
                                                        echo   'निदेशक मंडल';
                                                    else :
                                                        echo   'Board of Directors
                                                 ';
                                                    endif; ?></h2>
            <div class="listing">
                <div class="d-flex flex-wrap">
                    <div class="col-lg-6 col-md-6 col-sm-12" data-aos="zoom-in">
                        <div class="list text-center">
                            <div class="image"><a href="<?= SEOURL; ?>cmd.php">
                                    <img class="img-thumbnail" src="<?= SEOURL; ?>directors/CMD-SIDBI.jpeg" alt="Image Gallery" style="width:350px; height:350px;">
                                </a></div>
                            <div class="detais">
                                <h5><?php if ($get_configured_lang == 'HI') :
                                        echo   'श्री सिवसुब्रमणियन रमण';
                                    else :
                                        echo   'Shri Sivasubramanian Ramann
                                                 ';
                                    endif; ?></h5>
                                <div class="post"><?php if ($get_configured_lang == 'HI') :
                                                        echo   'अध्‍यक्ष एवं प्रबंध निदेशक';
                                                    else :
                                                        echo   'Chairman & Managing Director
                                                 ';
                                                    endif; ?></div>

                            </div>
                        </div>
                    </div>
                    <?php

                $list_transaction = sqlQUERY_LABEL("SELECT `boardofdirector_ID`, `director_image`, `director_name`, `director_name_hindi`, `director_shortdescription`, `director_shortdescription_hindi`, `director_description`, `director_description_hindi`, `status` FROM `js_boardofdirector` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $director_attachement = $row["director_image"];
                    $director_name = html_entity_decode($row["director_name"]);
                    $director_description = html_entity_decode($row["director_description"]);
                    $director_shortdescription = html_entity_decode($row["director_shortdescription"]);
                    $director_name_hindi = html_entity_decode($row["director_name_hindi"]);
                    $director_description_hindi = html_entity_decode($row["director_description_hindi"]);
                    $director_shortdescription_hindi = html_entity_decode($row["director_shortdescription_hindi"]);
                    $boardofdirector_ID = $row["boardofdirector_ID"];
                 

                ?>

                        <div class="col-lg-3 col-md-6 col-sm-12" data-aos="zoom-in">
                            <div class="list text-center">

                                <div class="image"><a href="director_detail.php?boardofdirector_ID=<?= $boardofdirector_ID ?>">
                                        <img class="img-thumbnail" src="<?= 'head/uploads/director_documents/' . $director_attachement; ?>" alt="Image Gallery">
                                    </a></div>
                                <div class="detais">
                                    <h5><?php if ($get_configured_lang == 'HI') :
                                            echo   $director_name_hindi;
                                        else :
                                            echo   $director_name;
                                        endif; ?></h5>
                                    <div class="post"><?php if ($get_configured_lang == 'HI') :
                                                            echo   $director_shortdescription_hindi;
                                                        else :
                                                            echo   $director_shortdescription;
                                                        endif; ?></div>

                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>

    </div>
</section>
<section class="role-SIDBI" id="role-SIDBI">
    <div class="container-fluid position-relative half-fluid">
        <div class="container">
            <div class="row">
                <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `roleandsidbi_ID`, `role_title`, `role_title_hindi`, `role_content`, `role_content_hindi`, `sidbi_title`, `sidbi_title_hindi`, `sidbi_content`, `sidbi_content_hindi`, `status` FROM `roleandsidbi` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $roleandsidbi_ID = $row["roleandsidbi_ID"];
                    $role_title = $row["role_title"];
                    $role_title_hindi = $row["role_title_hindi"];
                    $role_content = $row["role_content"];
                    $role_content_hindi = $row["role_content_hindi"];
                    $sidbi_title = html_entity_decode($row["sidbi_title"]);
                    $sidbi_title_hindi = $row["sidbi_title_hindi"];
                    $sidbi_content = html_entity_decode($row["sidbi_content"]);
                    $sidbi_content_hindi = html_entity_decode($row["sidbi_content_hindi"]);
                ?>
                    <div class="col-lg-4 aos-init aos-animate mission-des" data-aos="fade-right">
                        <div class="role-inner">
                            <h2><?php if ($get_configured_lang == 'HI') :
                                    echo   $role_title_hindi;
                                else :
                                    echo   $role_title;
                                endif; ?></h2>
                            <p><?php if ($get_configured_lang == 'HI') :
                                    echo   $role_content_hindi;
                                else :
                                    echo   $role_content;
                                endif; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8 p-0">
                        <div class="points">
                            <h2><?php if ($get_configured_lang == 'HI') :
                                    echo   $sidbi_title_hindi;
                                else :
                                    echo   $sidbi_title;
                                endif; ?></h2>

                            <p><?php if ($get_configured_lang == 'HI') :
                                    echo   $sidbi_content_hindi;
                                else :
                                    echo   $sidbi_content;
                                endif; ?>
                            </p>


                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

</section>
<section class="historical-journey" id="historical-journey">
    <div>
        <img src="<?= SEOURL; ?>assets/front/images/Historical journey.jpg" alt="" class="img-fluid">
    </div>
    <div class="history-new">


            <div class="container">
                <div class="row">
                    <div class="col-lg-5 aos-init aos-animate mission-des" data-aos="fade-right">
                        <div class="mission-vision-inner">
                            <h2 data-translate="historicaljourneyHEADING" class="mt-5"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सिडबी की ऐतिहासिक यात्रा';
                                                else:
                                                 echo   'SIDBI’s Historical Journey
                                                 ';
                                                endif; ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-7 historical-journey-slider">
                        <div class="slider__flex">
                            <div class="slider__images">
                                <div class="swiper-container">
                                    <div class="slider__prev"><img
                                            src="<?= SEOURL; ?>assets/front/images/arrow-up-about-slider.png">
                                    </div>
                                    <div class="swiper-wrapper">
                                    <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT `history_id`, `history_title`,`history_title_hindi`, `history_description`,`history_description_hindi`,  `history_image`,  `history_logo`,  `history_year`, `status` FROM `history` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $history_id = $row["history_id"];
                                        $history_title = $row["history_title"];
                                        $history_title_hindi = $row["history_title_hindi"];
                                        $history_description = $row["history_description"];
                                        $history_description_hindi = $row["history_description_hindi"];
                                        $history_image = $row["history_image"];
                                        $history_logo = $row["history_logo"];
                                        $history_year = $row["history_year"];
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="swiper-list-inner">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="year"><span><?= $history_year ?> </span></div>
                                                    <div class="icon"><img
                                                            src="<?= 'assets/front/home/' . $history_image; ?>"
                                                            align="icon1"></div>
                                                    <div class="content" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $history_description_hindi;
                                                else:
                                                 echo   $history_description;
                                                endif; ?></div>
                                                </div>

                                            </div>
                                        </div>
                                      <?php endwhile; ?>
                                    </div>
                                </div>
                                <div class="slider__next"><img src="<?= SEOURL; ?>assets/front/images/arrow-up-about-slider.png">
                                </div>
                            </div>

                            <div class="slider__col">
                                <div class="slider__thumbs">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                        <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT `history_id`, `history_title`,`history_title_hindi`, `history_description`,`history_description_hindi`,  `history_image`,  `history_logo`,  `history_year`, `status` FROM `history` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $history_id = $row["history_id"];
                                        $history_title = $row["history_title"];
                                        $history_title_hindi = $row["history_title_hindi"];
                                        $history_description = $row["history_description"];
                                        $history_description_hindi = $row["history_description_hindi"];
                                        $history_image = $row["history_image"];
                                        $history_logo = $row["history_logo"];
                                        $history_year = $row["history_year"];
                                    ?>
                                            <div class="swiper-slide">
                                                <div class="slider__image"><span class="year"><?= $history_year ?></span></div>
                                            </div>
                                           
                                            <?php endwhile; ?>


                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">1992</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">1994</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">1999</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2000</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2005</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2008</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2010</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2012</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2015</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2016</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2017</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2018</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2019</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2020</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2021</span></div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slider__image"><span class="year">2023</span></div>
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
</section>

<section class="financials-shareholding" id="financials-shareholding">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="financials-inner">
                        <h2 data-translate="financialsHEADING"><?php if ($get_configured_lang == 'HI') :
                                                                    echo   'वित्तीय आँकड़े';
                                                                else :
                                                                    echo   'Financials
                                                 ';
                                                                endif; ?></h2>
                        <div class="image"><img src="<?= SEOURL; ?>assets/front/images/financial-img.png" align="financials image"></div>
                        <div class="anual-repots">
                            <ul>
                                <li><a href="<?= SEOURL; ?>annualreports"><span data-translate="annualreportsHEADING"><?php if ($get_configured_lang == 'HI') :
                                                                                                                            echo   'वार्षिक रिपोर्टें';
                                                                                                                        else :
                                                                                                                            echo   'Annual Reports

                                                 ';
                                                                                                                        endif; ?></span>
                                        <span></span></a></li>
                            </ul>
                        </div>
                        <div class="image"><img src="<?= SEOURL; ?>assets/front/images/financial-img2.png" align="financials image"></div>
                        <div class="anual-repots">
                            <ul>
                                <li><a href="<?= SEOURL; ?>financialresults"><span data-translate="resultsHEADING">
                                            <?php if ($get_configured_lang == 'HI') :
                                                echo   'त्रैमासिक / अर्धवार्षिक
                                                 ';
                                            else :
                                                echo   'Quarterly/Half-yearly Results
                                                 ';
                                            endif; ?></span>
                                        <span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" id="shareholding">
                    <div class="shareholding-inner">
                        <?php
                        $list_transaction = sqlQUERY_LABEL("SELECT `shareholderabout_ID`, `shareholderabout_title`, `shareholderabout_title_hindi`, `shareholderabout_description`, `shareholderabout_description_hindi`, `shareholderabout_image`, `status` FROM `shareholderabout` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                        while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                            $shareholderabout_ID = $row["shareholderabout_ID"];
                            $shareholderabout_title = $row["shareholderabout_title"];
                            $shareholderabout_title_hindi = $row["shareholderabout_title_hindi"];
                            $shareholderabout_description = $row["shareholderabout_description"];
                            $shareholderabout_description_hindi = $row["shareholderabout_description_hindi"];
                            $shareholderabout_image = $row["shareholderabout_image"];

                        ?>
                            <h2><?php if ($get_configured_lang == 'HI') :
                                    echo   $shareholderabout_title_hindi;
                                else :
                                    echo   $shareholderabout_title;
                                endif; ?></h2>
                            <div class="shareholding-image-content">
                                <div class="d-flex flex-wrap">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="shareholding-des">
                                            <p><?php if ($get_configured_lang == 'HI') :
                                                    echo  $shareholderabout_description_hindi;
                                                else :
                                                    echo   $shareholderabout_description;
                                                endif; ?></p>
                                            <p><a href="<?= SEOURL; ?>shareholders" data-translate="viewdetailsbtn"><?php if ($get_configured_lang == 'HI') :
                                                                                                                        echo 'विवरण देखें';
                                                                                                                    else :
                                                                                                                        echo  'View Details';
                                                                                                                    endif; ?></a></p>

                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                        <div class="shareholding-image"><img src="<?= SEOURL; ?>assets/front/home/<?= $shareholderabout_image ?>" alt="shareholding-chart-image"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
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

<?php require_once('public/footer.php'); ?>
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

<script>
    $(document).ready(function() {
        $("body").css("overflow-y", "scroll");
    });
</script>
</body>

</html>