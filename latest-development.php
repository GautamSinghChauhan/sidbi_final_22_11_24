<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Press Releases - Small Industries Development Bank of India</title>
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
    .latest-development-banner {}
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
require_once('public/header.php');
?>
        <section class="about-us-banner latest-development-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Latest Development</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="#">Latest Development</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="press-releases">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Latest Development</h2>
                        </div>
                        <div class="button-form">
                            <div class="search-form">
                                <form method="post" accept-charset="utf-8" id="search_form" name="search_form"
                                    data-bv-message="This value is not valid"
                                    data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
                                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
                                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                                    <div style="display:none;"><input type="hidden" name="_csrfToken" autocomplete="off"
                                            id="_csrfToken_1698735449.4647"
                                            value="WbMPFG32Sl8Tbi8jg2d2H1Ugf5fCSeNWQ158JVSKiQFpt0CBuZ5Kz7SPpivqHoJDoUpYzZuhPGZS2ShPJ4gWxg==" />
                                    </div> <input type="hidden" name="task" value="search">
                                    <div class="form-group mb-2" id="searcBox">
                                        <input id="search-terms" type="text" class="form-control ui-autocomplete-input"
                                            name="q" placeholder="Enter Keywords" autocomplete="off" value="">
                                    </div>
                                    <input type="submit" value="Search" class="active" id="search-terms" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Title</th>
                                    <th width="130px;" scope="col">Date</th>
                                    <th width="130px;" scope="col">Document</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `latestdevelopment_id`, `latestdevelopment_title`, `latestdevelopment_title_hindi`, `latestdevelopment_date`, `latestdevelopment_image`, `latestdevelopment_count`, `status` FROM `latestdevelopment` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $latestdevelopment_id = $row["latestdevelopment_id"];
                    $latestdevelopment_title = html_entity_decode($row["latestdevelopment_title"]);
                    $latestdevelopment_title_hindi = $row["latestdevelopment_title_hindi"];
                    $latestdevelopment_count = html_entity_decode($row["latestdevelopment_count"]);
                    $latestdevelopment_date = $row["latestdevelopment_date"];
                    $latestdevelopment_image = $row["latestdevelopment_image"];
                ?>
                                <tr>
                                    
                                    <td><a href="<?= SEOURL; ?>uploads/<?= $latestdevelopment_image ?>" style="text-decoration:none;" target="_blank"> <?php if ($get_configured_lang == 'HI') :
                                        echo   $latestdevelopment_title_hindi;
                                    else :
                                        echo   $latestdevelopment_title;
                                    endif; ?></a></td>
                                    <td><?= $latestdevelopment_date ?></td>
                                    <td></td>
                                </tr>
                               
<?php endwhile; ?>
                            </tbody>
                        </table>
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
        <?php
require_once('public/footer.php');
?>

    </div>
</body>
</html>