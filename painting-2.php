<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Paintings - Small Industries Development Bank of India</title>
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
</head>

<body class="main-wrapper-en"></body>

<div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <?php require_once('public/header.php'); ?>

    <section class="about-us-banner" data-aos="fade-down"
        style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
        <div class="container">
            <div class="inner">
                <h1>Paintings</h1>
            </div>
        </div>
    </section>

    <section class="role-SIDBI" id="role-SIDBI">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 aos-init aos-animate mission-des" data-aos="fade-right">
                        <div class="role-inner">
                            <h2>Paintings</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 p-0">
                        <div class="paintings-points">
                            <img src="<?= SEOURL; ?>assets/front/images/painting-1.jpeg" alt="image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section paintings-points-breif-history mb-5" id="role-SIDBI">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 aos-init aos-animate mission-des" data-aos="fade-up">
                        <div class="title-content bold-title with-underline green">
                            <h2>Breif History</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum.</p>

                    </div>
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

</body>
</html>