<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="prayaasTitle">PRAYAAS - Small Industries Development Bank of India</title>
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
    table tr:nth-child(even) {
        background: none;
    }

    table tr:nth-child(even):hover {
        background: #f2f2f2;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 2px;
    }

    tbody tr td {
        padding: 20px !important;
        /* cursor: pointer; */
    }
    </style>
</head>

<body class="main-wrapper-en"></body>

<div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <?php require_once('public/header.php'); ?>

    <section class="about-us-banner" data-aos="fade-down"
        style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
        <div class="container">
            <div class="inner">
                <h1 data-translate="prayaas"><?php  if($get_configured_lang == 'HI'): 
                                                 echo 'प्रयास';
                                                else:
                                                 echo 'PRAYAAS';
                                                endif; ?></h1>
            </div>
        </div>
    </section>
    <section class="breadcrumb-inner" data-aos="fade-right" style="margin-bottom: 50px">
        <div class="container">
            <div class="inner">
                <ul>
                    <li><a href="index"  data-translate="home"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo 'Home';
                                                endif; ?></a></li>
                    <li ><a class="active" href="#" data-translate="prayaas"><?php  if($get_configured_lang == 'HI'): 
                                                 echo 'प्रयास';
                                                else:
                                                 echo 'PRAYAAS';
                                                endif; ?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="overview-section mb-5" id="overview-section PM_Vishwakarma_Scheme" data-aos="fade-right">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT `prayaas_ID`, `prayaas_title`, `prayaas_title_hindi`, `prayaas_content`, `prayaas_content_hindi`, `status` FROM `prayaas` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $prayaas_ID = $row["prayaas_ID"];
                                        $prayaas_title = $row["prayaas_title"];
                                        $prayaas_title_hindi = $row["prayaas_title_hindi"];
                                        $prayaas_content = html_entity_decode($row["prayaas_content"]);
                                        $prayaas_content_hindi = html_entity_decode($row["prayaas_content_hindi"]);
                                    ?>
                        <h3 ><b><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $prayaas_title_hindi;
                                                else:
                                                 echo  $prayaas_title;
                                                endif; ?></b></h3>
                        <div><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $prayaas_content_hindi;
                                                else:
                                                 echo  $prayaas_content;
                                                endif; ?></div>
                    <?php endwhile; ?>
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

    <script>
    $(document).ready(function() {
        $("#read_more_button").click(function() {
            var elem = $("#read_more_button").text();
            if (elem == "Read More") {
                //Stuff to do when btn is in the read more state
                $("#read_more_button").text("Read Less");
                $(".read_more_content").slideDown();
            } else {
                //Stuff to do when btn is in the read less state
                $("#read_more_button").text("Read More");
                $(".read_more_content").slideUp();
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
    <?php require_once('public/footer.php'); ?>
   
    </body>
</html>