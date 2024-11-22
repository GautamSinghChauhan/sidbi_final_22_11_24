<!-- updated : 1:00 PM  | 30-12-23 -->
<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Media - Small Industries Development Bank of India</title>
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
    .card {
        position: relative !important;
        display: flex !important;
        flex-direction: column !important;
        min-width: 0 !important;
        word-wrap: break-word !important;
        background-color: #fff !important;
        background-clip: border-box !important;
        border: 1px solid rgba(0, 0, 0, .125) !important;
        border-radius: 0.25rem !important;
        /* width: 100%; */
    }

    .success-card {
        border-radius: 10px !important;
        background: #FFF !important;
        box-shadow: 0px 4px 14px 0px rgba(0, 182, 240, 0.19) !important;
        /* margin: 0 16px 12px 16px !important; */
        border: none !important;
        min-height: 320px !important;
        margin: 20px 0;
    }

    .photogallery img,
    .videogallery img {
        display: block;
        width: 100%;
    }

    .swiper-slider-social-media {
        width: 400px !important;
        margin-right: 10px !important;
    }

    .socialSliderNav .socialNavPrev {
        left: -70px !important;
    }

    .socialSliderNav .socialNavNext {
        right: -70px !important;
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

    .owl-theme .owl-nav [class*='owl-'] {
        transition: all .3s ease;
    }

    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
        background-color: #D6D6D6;
    }

    .videogallery .owl-theme .owl-nav,
    .videogallery .owl-dots {
        display: none;
    }
    </style>
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
                    <h1>Media</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="#">Media</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="press-releases media-press-releases" id="pressreleses">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Press Releases</h2>
                        </div>
                    </div>
                    <div class="listing">
                        <div class="swiper press-releases-listing">
                            <div class="swiper-wrapper">
                            </div>
                        </div>
                        <div class="press-releases-slider-nav">
                            <div class="press-releases-slider-next swiper-button-next"></div>
                            <div class="press-releases-slider-prev swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="clarifications text-center" id="clarifications">
            <!-- <div class="container">
                <div class="inner" style="background:url(assets/front/images/clarifications-bg-img.png) no-repeat center center / cover;">
                    <div class="title" data-aos="fade-right">
                        <h2>Clarifications</h2>
                    </div>
                    <div class="listing">
                        <div class="d-flex">
                            <div class="list" data-aos="fade-right" data-aos-delay="1000">
                                <div class="icon">
                                    <a href="uploads/clarifications/167352830988English%20(2).docx" target="_blank">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-pdf-bigger.png" alt="icon-pdf-bigger"><span></a>
                                </div>
                                <div class="details">
                                    <h6>Frauds perpetrated using the name of SIDBI</h6>
                                    <div class="content"></div>
                                </div>
                            </div>
                            <div class="list" data-aos="fade-right" data-aos-delay="1000">
                                <div class="icon">
                                    <a href="uploads/clarifications/167352835324SIDBI-clarifies-on-Startup-India-fund.pdf" target="_blank">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-pdf-bigger.png" alt="icon-pdf-bigger"><span></a>
                                </div>
                                <div class="details">
                                    <h6> SIDBI clarifies on Startup India fund</h6>
                                    <div class="content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="button-1 green-btn">
                <a href="press-release" target="_blank">view all<i class="fa fa-angle-right"></i></a>
            </div>
        </section>

        <!-- <section class="latest-news" style="background-color: #F6F6F6;" id="latest-news">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Latest News</h2>
                        </div>
                        <div class="button-1 green-btn">
                            <a href="news.html">view all<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="listing">
                        <div class="swiper latest-news-listing">
                            <div class="swiper-wrapper">
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>22 Aug, 2022</span>
                                    </div>
                                    <div class="content sameheight">SIDBI and Tata Power’s TPRMG partner to foster green
                                        entrepreneurs</div>
                                    <div class="read-more">
                                        <a href="news-details/55.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>04 Jul, 2022</span>
                                    </div>
                                    <div class="content sameheight">Tremendous resilience by SMEs during Covid but a lot
                                        of entities in SMA-2 category: SIDBI CMD Sivasubramanian Ramann</div>
                                    <div class="read-more">
                                        <a href="news-details/54.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>16 May, 2022</span>
                                    </div>
                                    <div class="content sameheight">Govt offers stimulus to SIDBI-backed PE-VC funds,
                                        gives fillip to startup financing </div>
                                    <div class="read-more">
                                        <a href="news-details/52.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>31 Mar, 2022</span>
                                    </div>
                                    <div class="content sameheight">SIDBI, RKMA to set up alternative livelihood centre
                                        at Sohra</div>
                                    <div class="read-more">
                                        <a href="news-details/51.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>27 Mar, 2022</span>
                                    </div>
                                    <div class="content sameheight">SIDBI sanctions Rs 1,000 crore to Odisha govt for
                                        development of MSME clusters, credit to small businesses</div>
                                    <div class="read-more">
                                        <a href="news-details/49.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>08 Feb, 2022</span>
                                    </div>
                                    <div class="content sameheight">SIDBI takes measures to facilitate greening of MSMEs
                                    </div>
                                    <div class="read-more">
                                        <a href="news-details/46.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>18 Nov, 2021</span>
                                    </div>
                                    <div class="content sameheight">SIDBI launches second window of Swavalamban
                                        Challenge Fund</div>
                                    <div class="read-more">
                                        <a href="news-details/44.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>18 Nov, 2021</span>
                                    </div>
                                    <div class="content sameheight">SIDBI, Google ink partnership with $15 million
                                        corpus to help MSMEs</div>
                                    <div class="read-more">
                                        <a href="news-details/45.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>22 Aug, 2021</span>
                                    </div>
                                    <div class="content sameheight">FM Sitharaman launches new fund for MSMEs</div>
                                    <div class="read-more">
                                        <a href="news-details/41.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png"
                                            alt="icon-calendar">
                                        <span>10 Aug, 2021</span>
                                    </div>
                                    <div class="content sameheight">SIDBI unveils Digital Prayaas lending platform</div>
                                    <div class="read-more">
                                        <a href="news-details/42.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="latest-news-slider-nav">
                            <div class="latest-news-slider-next swiper-button-next"></div>
                            <div class="latest-news-slider-prev swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="social-media" style="background-color: #E9E9E9;" id="social-media">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Social Media</h2>
                        </div>
                    </div>
                    <div class="listing">
                        <div class="row">
                            <div class="swiper social-media-slider">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide swiper-slider-social-media">
                                        <div class="facebook-feed">
                                            <iframe
                                                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSIDBIOfficial%2F&amp;tabs=timeline&amp;width=320&amp;height=400&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                                                width="340" height="400" style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slider-social-media">
                                        <div class="instagram-feed">
                                            <iframe width="320" height="400"
                                                src="https://www.instagram.com/SIDBIofficial/embed"
                                                frameborder="0"></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slider-social-media">
                                        <div class="youtube-feed">
                                            <iframe width="320" height="400"
                                                src="https://www.youtube.com/embed/7ESmhEAfE3U"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slider-social-media">
                                        <div class="twitter-feed">
                                            <a class="twitter-timeline" data-width="320" data-height="400"
                                                href="https://twitter.com/SIDBIofficial?ref_src=twsrc%5Etfw">Tweets by
                                                SIDBIofficial</a>
                                            <script async src="../platform.twitter.com/widgets.js" charset="utf-8">
                                            </script>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slider-social-media">
                                        <div class="linkedin-feed">
                                            <a href="https://www.linkedin.com/company/SIDBI-small-industries-development-bank-of-india"
                                                target="_blank">
                                                <img class="customWidthSlider"
                                                    src="<?= SEOURL; ?>assets/front/images/SIDBI-linkedin.jpg"
                                                    alt="Linked In Feeds" />
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="socialSliderNav">
                                <div class="socialNavNext"></div>
                                <div class="socialNavPrev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="photos-videos videogallery" id="videos">
            <div class="container" data-aos="fade-up" data-aos-duration="2000">
                <div class="title-content-button">
                    <div class="title-content bold-title with-underline green">
                        <h2>Video Gallery</h2>
                    </div>
                </div>

                <div class="owl-carousel owl-theme videogallery-carousel">
                <?php
                        $list_transaction = sqlQUERY_LABEL("SELECT `videos_id`, `videos_title`, `videos_title_hindi`, `videos_image`, `videos_link`, `status` FROM `videos`  where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                        while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                            $videos_id = $row["videos_id"];
                            $videos_title = $row["videos_title"];
                            $videos_title_hindi = $row["videos_title_hindi"];
                            $videos_image = $row["videos_image"];
                            $videos_link = $row["videos_link"];


                        ?>
                    <div class="item">
                        <div class="card success-card">
                            <div class="card-head">
                                <a target="_blank" href="<?= $videos_link ?>" class="playvideo">
                                    <img src="assets/front/home/<?= $videos_image ?>">
                                    <p class="success-p"><?= $videos_title ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
<?php endwhile; ?>

                </div>
            </div>
        </section>


        <section class="photos-videos photogallery" id="photos">
            <div class="container mt-5">
                <div class="title-content-button">
                    <div class="title-content bold-title with-underline green">
                        <h2>Photo Gallery</h2>
                    </div>
                </div>
                <div class="item row">
                <?php
                        $list_transaction = sqlQUERY_LABEL("SELECT `galleries_id`, `galleries_content`, `galleries_content_hindi`, `galleries_image`, `status` FROM `galleries`  where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                        while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                            $galleries_id = $row["galleries_id"];
                            $galleries_content = $row["galleries_content"];
                            $galleries_content_hindi = $row["galleries_content_hindi"];
                            $galleries_image = $row["galleries_image"];
                           


                        ?>
                <div class="card success-card col-xl-4 col-lg-4 col-sm-6 col-12 mt-3">
                        <div class="card-head overflow-hidden">
                            <img src="assets/front/home/<?= $$galleries_image ?>">
                            <p class="success-p"><?= $$galleries_content ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </section>

        <!-- <section class="press-coverage" id="press-coverage">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Press Coverage</h2>
                        </div>
                        <div class="button-1 green-btn">
                            <a href="press-coverages">view all<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="listing">
                        <div class="swiper press-coverage-listing">
                            <div class="swiper-wrapper">
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/99.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112975967SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI launches second window of Swavalamban Challenge Fund with Green Bharat
                                            as prioritised theme </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/98.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112976861SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI joins hands with Google to help MSMEs </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/97.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112975128SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            Microfinance Industry standing its ground with flat Y-o-Y growth:
                                            SIDBI-Equifax Report </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/96.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112973913SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI collaborates with Government of Assam to strengthen ties for
                                            development of MSMEs </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/95.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112972454SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI and EXIM Bank launch Ubharte Sitaare Fund in the presence of Hon’ble
                                            Finance Minister </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/94.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112971452SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI launches various initiatives under Swavalamban Resource Facility in a
                                            week-long celebration of </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/93.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112970535SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI provides first approval to Government of Tamil Nadu under SIDBI
                                            Cluster Development Fund </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/92.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112969516SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI launches 3rd phase of setting up 750 Swavalamban Silai Schools to
                                            promote women entrepreneursh </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/91.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168112964837SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            Microfinance industry resilient during Covid with 18% growth year-on-year,
                                            says SIDBI-Equifax quarte </div>
                                    </div>
                                </div>
                                <div class="press-coverage-list swiper-slide">
                                    <a href="press-coverages-details/90.html"></a>
                                    <div class="press-coverage-list-inner">
                                        <div class="image">
                                            <img src="uploads/presscategories/168113135481SIDBI_LOGO.png"
                                                alt="challenge-fund-with-green-bharat">
                                        </div>
                                        <div class="content">
                                            SIDBI launches “Digital Prayaas” programme, an App based digital initiative
                                            to reach out to liveliho </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="press-coverage-slider-nav">
                            <div class="press-coverage-slider-next swiper-button-next"></div>
                            <div class="press-coverage-slider-prev swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/owl.carousel.min.js"></script>
        <script>
        $(document).ready(function() {
            $('.carousel').carousel();
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
                navText: ['<i class="fa fa-angle-left"></i>',
                    '<i class="fa fa-angle-right"></i>'
                ],
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
                                        src="<?= SEOURL; ?>assets/front/images/department-logo.jpg" class="img-fluid w-100"></a>
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
<script>
    $(document).ready(function() {
        $("body").css("overflow-y", "scroll");
    });
    </script>
</body>
</html>