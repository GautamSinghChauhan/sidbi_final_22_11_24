<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>GENERAL INSTRUCTIONS - Small Industries Development Bank of India</title>
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
        a,
        a:hover,
        a:active {
            color: #0d6efd;
        }

        .download-complete-list .download-complete-lists {
            list-style: none;
            position: relative;
            margin: 20px 0;
        }



        .download-complete-list .download-complete-lists::before {
            content: '';
            position: absolute;
            top: 7px;
            left: -20px;
            width: 12px;
            height: 12px;
            background-image: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            clip-path: polygon(100% 50%, 0 0, 0 100%);
        }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?> <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo   '
                                                 मुख्य पृष्ठ';
                                                else:
                                                 echo   'GENERAL INSTRUCTIONS';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सामान्य निर्देश';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="press-release"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सामान्य निर्देश';
                                                else:
                                                 echo   'GENERAL INSTRUCTIONS';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>


        <div class="cms Terms-Condition">
            <div class="container">
                <div class="row">
                <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT `generalinstruction_id`, `generalinstruction_title`, `generalinstruction_title_hindi`, `generalinstruction_content`, `generalinstruction_content_hindi`, `status` FROM `generalinstruction` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $generalinstruction_id = $row["generalinstruction_id"];
                                        $generalinstruction_title = html_entity_decode($row["generalinstruction_title"]);
                                        $generalinstruction_title_hindi = $row["generalinstruction_title_hindi"];
                                        $generalinstruction_content = html_entity_decode($row["generalinstruction_content"]);
                                        $generalinstruction_content_hindi = html_entity_decode($row["generalinstruction_content_hindi"]);
                                    ?>
                    <div class="col-sm-12">
                        <div class="over-cont psme-sec svt">
                            <h2 style="text-align:center;"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $generalinstruction_title_hindi;
                                                else:
                                                 echo   $generalinstruction_title;
                                                endif; ?></h2>
                            <p><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $generalinstruction_content_hindi;
                                                else:
                                                 echo   $generalinstruction_content;
                                                endif; ?></p>
                           
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
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
        <?php
        require_once('public/footer.php');
        ?>
    </div>

</body>

</html>