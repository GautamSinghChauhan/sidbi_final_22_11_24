<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>About SIDBI - Small Industries Development Bank of India</title>
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
        <?php require_once('public/header.php'); ?>

        <section class="about-us-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Social Media</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="#">Social Media</a></li>
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
                        <div class="button-1 green-btn">
                            <a href="press-release" target="_blank">view all<i class="fa fa-angle-right"></i></a>
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

        <section class="clarifications" id="clarifications">
            <div class="container">
                <div class="inner"
                    style="background:url(assets/front/images/clarifications-bg-img.png) no-repeat center center / cover;">
                    <div class="title" data-aos="fade-right">
                        <h2>Clarifications</h2>
                    </div>
                    <div class="listing">
                        <div class="d-flex">
                            <div class="list" data-aos="fade-right" data-aos-delay="1000">
                                <div class="icon">
                                    <a href="uploads/clarifications/167352830988English%20(2).docx" target="_blank">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-pdf-bigger.png"
                                            alt="icon-pdf-bigger"><span></a>
                                </div>
                                <div class="details">
                                    <h6>Frauds perpetrated using the name of SIDBI</h6>
                                    <div class="content"></div>
                                </div>
                            </div>
                            <div class="list" data-aos="fade-right" data-aos-delay="1000">
                                <div class="icon">
                                    <a href="uploads/clarifications/167352835324SIDBI-clarifies-on-Startup-India-fund.pdf"
                                        target="_blank">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-pdf-bigger.png"
                                            alt="icon-pdf-bigger"><span></a>
                                </div>
                                <div class="details">
                                    <h6> SIDBI clarifies on Startup India fund</h6>
                                    <div class="content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="latest-news" style="background-color: #F6F6F6;" id="latest-news">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Latest News</h2>
                        </div>
                        <div class="button-1 green-btn">
                            <a href="news.php">view all<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="listing">
                        <div class="swiper latest-news-listing">
                            <div class="swiper-wrapper">
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
                                        <span>22 Aug, 2021</span>
                                    </div>
                                    <div class="content sameheight">FM Sitharaman launches new fund for MSMEs</div>
                                    <div class="read-more">
                                        <a href="news-details/41.html">read more<i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                                <div class="latest-news-list swiper-slide" data-aos="fade-right">
                                    <div class="date">
                                        <img src="<?= SEOURL; ?>assets/front/images/icon-calendar.png" alt="icon-calendar">
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
        </section>

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

                                    <div class="swiper-slide">
                                        <div class="facebook-feed">
                                            <iframe
                                                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSIDBIOfficial%2F&amp;tabs=timeline&amp;width=320&amp;height=400&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                                                width="340" height="400" style="border:none;overflow:hidden"
                                                scrolling="no" frameborder="0" allowfullscreen="true"
                                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="instagram-feed">
                                            <iframe width="320" height="400"
                                                src="https://www.instagram.com/sidbiofficial/embed"
                                                frameborder="0"></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="youtube-feed">
                                            <iframe width="320" height="400"
                                                src="https://www.youtube.com/embed/7ESmhEAfE3U"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="twitter-feed">
                                            <!-- <a class="twitter-timeline" data-width="320" data-height="400"
                                                href="https://twitter.com/sidbiofficial?ref_src=twsrc%5Etfw">Tweets by
                                                sidbiofficial</a> -->
                                                <!-- <iframe width="320" height="400"
                                                src="https://twitter.com/sidbiofficial?ref_src=twsrc%5Etfw"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe> -->
                                                <a width="320" height="400" class="twitter-timeline" href="https://twitter.com/sidbiofficial?ref_src=twsrc%5Etfw">Tweets by sidbiofficial</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                            <script async src="../platform.twitter.com/widgets.js" charset="utf-8">
                                            </script>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="linkedin-feed">
                                            <a href="https://www.linkedin.com/company/sidbi-small-industries-development-bank-of-india"
                                                target="_blank">
                                                <img class="customWidthSlider"
                                                    src="<?= SEOURL; ?>assets/front/images/sidbi-linkedin.jpg"
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

        <section class="photos-videos" id="photos-videos">
            <div class="container">
                <div class="tabing-main" data-aos="zoom-in">
                    <div class="tabing-main-parent">
                        <ul class="tab-titles">
                            <li><a href="#tab-1">Photos</a></li>
                            <li><a href="#tab-2">Videos</a></li>
                        </ul>
                        <div class="button-1 green-btn">
                            <a href="photo-gallery.html">view all<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="tabContainer">
                        <div class="tab-content-main" id="tab-1">
                            <div class="mobile-tab-title"><a class="r-tabs-anchor">Photos</a></div>
                            <div class="tabContent">
                                <div class="card-parent">
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722153627Swavalamban-Kumbh-4.png"
                                            data-fancybox="gallery" data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722153627Swavalamban-Kumbh-4.png"
                                                    alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>Swavalamban-Kumbh</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/1677221411462019-02-21-103424-9r78w-11.png"
                                            data-fancybox="gallery" data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/1677221411462019-02-21-103424-9r78w-11.png"
                                                    alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>19-02-2019</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/1677221390752019-02-21-103435-b3j7t-199.png"
                                            data-fancybox="gallery" data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/1677221390752019-02-21-103435-b3j7t-199.png"
                                                    alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>19-02-2019</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/1677221369812019-02-21-103447-geps9-09.png"
                                            data-fancybox="gallery" data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/1677221369812019-02-21-103447-geps9-09.png"
                                                    alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>19-02-2019</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/1677221337802019-02-21-103521-34te1-145.png"
                                            data-fancybox="gallery" data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/1677221337802019-02-21-103521-34te1-145.png"
                                                    alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>19-02-2019</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722130571IMG_3027.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722130571IMG_3027.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>30</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722126727IMG_3019.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722126727IMG_3019.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>29</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722128400IMG_3007.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722128400IMG_3007.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>28</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722122000IMG_3000.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722122000IMG_3000.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>27</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722119227IMG_2992.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722119227IMG_2992.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>26</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722113833IMG_2983.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722113833IMG_2983.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>24</h6>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card">
                                        <a href="<?= SEOURL; ?>assets/front/photos/167722110703IMG_2972.jpg" data-fancybox="gallery"
                                            data-caption="Capt
											ion Images 1">
                                            <div class="card-image">
                                                <img src="<?= SEOURL; ?>assets/front/photos/167722110703IMG_2972.jpg" alt="Image Gallery">
                                            </div>
                                            <div class="card-caption">
                                                <h6>25</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content-main" id="tab-2">
                            <div class="mobile-tab-title"><a class="r-tabs-anchor">Videos</a></div>
                            <div class="tabContent">
                                <div class="video-cards">
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=8NYreuT9FNw"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167715164273Digital-Prayaas.jpg"
                                                alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=57y82nTw1z0"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722377569video1.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=--tWpM-HeMA"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722382594video2.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=Vq_yfbwH7YA"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722388036video3.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=YdGBux_Rk-Y"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722392804video4.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=cmAJPl7MzXg"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722396969video5.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=r64atRk_-88"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722401477video6.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=hpQ34ajwMPs"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722413263video7.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=yOvW3jfq3J4"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722419908video8.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=XtFTwoIW3q0"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/167722533863video9.jpg" alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=BJ63k9zCOjo"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/1677225482752020-02-20-160537-9mkrq-Capture.png"
                                                alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox
                                            href="https://www.youtube.com/watch?v=AtKpeDPuDGM&amp;t=8s"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/1677225535062020-02-20-160734-sig3a-Capture.png"
                                                alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox
                                            href="https://www.youtube.com/watch?v=F-1wNBOVLfA&amp;t=1s"><img
                                                class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/1677225584632020-02-20-160943-0658r-Capture.png"
                                                alt="video-image" /></a>

                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="#myVideo2">
                                            <img class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/168000048471file_example_JPG_2500kB.jpg"
                                                alt="video-image" />
                                        </a>
                                        <video width="100%" height="100%" controls id="myVideo2" style="display:none;">
                                            <source
                                                src="<?= SEOURL; ?>assets/front/videos/168000048463sample_1280x720_surfing_with_audio.mp4"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                    <div class="video-card">
                                        <a data-fancybox href="#myVideo2">
                                            <img class="card-img-top img-fluid"
                                                src="<?= SEOURL; ?>assets/front/videos/168242310373sample_JPG_5.30mb_5184%c3%973456.jpg"
                                                alt="video-image" />
                                        </a>
                                        <video width="100%" height="100%" controls id="myVideo2" style="display:none;">
                                            <source src="<?= SEOURL; ?>assets/front/videos/1682423435945mb.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="press-coverage" id="press-coverage">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Press Coverage</h2>
                        </div>
                        <div class="button-1 green-btn">
                            <a href="press-coverages.html">view all<i class="fa fa-angle-right"></i></a>
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
        <?php require_once('public/footer.php'); ?>
</body>

</html>