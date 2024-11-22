<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="paintingTITLE">Painting - Small Industries Development Bank of India</title>
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
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    

    <style>
    .fit-rank-link,
    .fit-rank-link:hover,
    .fit-rank-link:active {
        color: #0d6efd;
    }
    </style>
</head>

<body class="main-wrapper-en"></body>

<div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <?php
require_once('public/header.php');
?>

    <section class="about-us-banner" data-aos="fade-down"
        style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
        <div class="container">
            <div class="inner">
                <h1>Paintings</h1>
            </div>
        </div>
    </section>

    <section class="breadcrumb-inner" data-aos="fade-right">
        <div class="container">
            <div class="inner">
                <ul>
                    <li><a href="index" data-translate="home">Home</a></li>
                    <li><a class="active" href="#">Paintings</a></li>
                </ul>
            </div>
        </div>
    </section>


    <!-- <section class="press-releases" data-aos="fade-up" data-aos-delay="500">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="title-content bold-title with-underline green">
                        <h2>Painting</h2>
                    </div>
                    <div id="qrcode" class="d-flex justify-content-center"></div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="press-releases" data-aos="fade-up" data-aos-delay="500">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="title-content bold-title with-underline green">
                        <h2>Paintings</h2>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php
                        $numPaintings = 2; // Change this dynamically based on the total number of paintings
                        for ($i = 1; $i <= $numPaintings; $i++) {
                            $redirectUrl = SEOURL . "painting-$i.php";
                            echo "<div class='mx-3' id='qrcode$i'></div>";
                        ?>
                        <script>
                            var qrcode<?= $i ?> = new QRCode(document.getElementById("qrcode<?= $i ?>"), {
                                text: "<?= $redirectUrl ?>",
                                width: 128,
                                height: 128,
                            });

                            document.getElementById("qrcode<?= $i ?>").addEventListener("click", function () {
                                window.open("<?= $redirectUrl ?>", '_blank');
                            });
                        </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- <script>
        var paintingNumber = 2;
        var redirectUrl = "<?= SEOURL; ?>painting-" + paintingNumber + ".php";

        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: redirectUrl,
            width: 128,
            height: 128,
        });

        document.getElementById("qrcode").addEventListener("click", function () {
            window.open(redirectUrl, '_blank');
        });
    </script> -->

</body>
</html>