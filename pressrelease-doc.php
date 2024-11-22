<?php
require_once('head/jackus.php');
$pressrelease_id = $_GET['id'];


?>
<!DOCTYPE html>
<html>

<!-- Mirrored from SIDBInew.php-staging.com/press-release-details/168 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Nov 2023 08:17:57 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>MSME & Start-Up Stakeholder Consultation Meet- Small Industries Development Bank of India</title>
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
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header1.php');
        ?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Press Release Details</h1>
                </div>
            </div>
        </section>

        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active" href="press-release">Press Releases</a></li>
                    </ul>
                </div>
            </div>
        </section>
       
        <section class="press-releases">
            <div class="container">
            <?php
                                $list_transaction = sqlQUERY_LABEL("SELECT `pressrelease_id`, `pressrelease_title`, `pressrelease_title_hindi`, `excerpt`, `content`, `meta_title`, `meta_keywords`, `meta_description`, `cloud_tags`, `pressrelease_url`, `user_id`, `sort_order`, `custom_link`, `upload_document_1`, `upload_document_2`, `pressrelease_date`, `pressrelease_archive`, `createdby`, `createdon`, `updatedon`, `status` FROM `pressreleases` where deleted = '0' and `pressrelease_id`='$pressrelease_id'") or die("Unable to get records:" . sqlERROR_LABEL());
                                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                    $pressrelease_title = $row["pressrelease_title"];
                                    $pressrelease_date = $row["pressrelease_date"];
                                    $upload_document_1 = $row["upload_document_1"];
                                    $upload_document_2 = $row["upload_document_2"];
                                ?>
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2><?= $pressrelease_title?>
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="over-cont complaint-inner">
                            <!-- <h2>Bid for Renewal of Citrix Select (CS) for various Citrix Software licenses through GeM portal</h2> -->
                            <div class="box-2 features-ul">
                                <ul>
                                    <h3>Documents</h3>
                                    <li>
                                        <a title="Download" target="_blank" href="uploads/pressrelease/<?= $upload_document_1?>"><i class="fa fa-file-pdf-o"></i>
                                        <?= $upload_document_1?></a>
                                    </li>
                                    <li>
                                        <a title="Download" target="_blank" href="<?= SEOURL; ?><?= $upload_document_2?>"><i class="fa fa-file-pdf-o"></i>
                                        <?= $upload_document_2?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
     
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
        <?php
        require_once('public/footer1.php');
        ?>
</body>

<!-- Mirrored from SIDBInew.php-staging.com/press-release-details/168 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Nov 2023 08:17:57 GMT -->

</html>