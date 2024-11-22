<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="subsiTITLE">Subsidiary Network - Small Industries Development Bank of India</title>
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
        .webLink:hover {
    color: #333333;
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
                    <h1 data-translate="subsiHEADING"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सहायक नेटवर्क';
                                                else:
                                                 echo   'Subsidiary Network';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'सहायक नेटवर्क';
                                                else:
                                                 echo   'Subsidiary Network';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="ecosystemWrap">
            <div class="container">
                <div class="row">
                    <?php
                    $list_transaction = sqlQUERY_LABEL("SELECT `ecosystem_ID`, `ecosystem_content`, `ecosystem_content_hindi`, `ecosystem_image`, `status` FROM `ecosystem` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                        $ecosystem_ID = $row["ecosystem_ID"];
                        $ecosystem_content = html_entity_decode($row["ecosystem_content"]);
                        $ecosystem_content_hindi = html_entity_decode($row["ecosystem_content_hindi"]);
                        $ecosystem_attachement = $row["ecosystem_image"];

                    ?>
                        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right">
                            <div class="ecosystemContant">

                                <p><?php if ($get_configured_lang == 'HI') :
                                        echo  $ecosystem_content_hindi;
                                    else :
                                        echo  $ecosystem_content;
                                    endif; ?></p>

                            </div>
                        </div>
                        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left">
                            <div class="ecosystemImg"><img src="assets/front/home/<?= $ecosystem_attachement; ?>"></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <section class="ecosystemAccodianWrap" data-aos="zoom-in">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <div class="ecosystemInner">
                            <?php
                            $list_transaction = sqlQUERY_LABEL("SELECT `subsidiary_id`, `subsidiary_title`, `subsidiary_title_hindi`, `subsidiary_description`, `subsidiary_description_hindi`, `subsidiaryimpact_title`, `subsidiaryimpact_title_hindi`, `subsidiaryimpact_description`, `subsidiaryimpact_description_hindi`, `subsidiary_image`, `subsidiary_link`, `status` FROM `subsidiary` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                            while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                $subsidiary_id = $row["subsidiary_id"];
                                $subsidiary_title = html_entity_decode($row["subsidiary_title"]);
                                $subsidiary_title_hindi = html_entity_decode($row["subsidiary_title_hindi"]);
                                $subsidiary_description = html_entity_decode($row["subsidiary_description"]);
                                $subsidiary_description_hindi = html_entity_decode($row["subsidiary_description_hindi"]);
                                $subsidiaryimpact_title = html_entity_decode($row["subsidiaryimpact_title"]);
                                $subsidiaryimpact_title_hindi = html_entity_decode($row["subsidiaryimpact_title_hindi"]);
                                $subsidiaryimpact_description = html_entity_decode($row["subsidiaryimpact_description"]);
                                $subsidiaryimpact_description_hindi = html_entity_decode($row["subsidiaryimpact_description_hindi"]);
                                $subsidiary_image = $row["subsidiary_image"];
                                $subsidiary_link = $row["subsidiary_link"];


                            ?>
                                <div class="ecosy-listing">
                                    <div class="ecosyTitle" id="ecoS1">
                                        <div class="ecosyUnits">
                                            <a class="mudraLogo" href="#"><img src="assets/front/home/<?= $subsidiary_image ?>"></a>
                                            <div class="refinance"><strong><?php if ($get_configured_lang == 'HI') :
                                                                                echo  $subsidiary_title_hindi;
                                                                            else :
                                                                                echo  $subsidiary_title;
                                                                            endif; ?></strong></div>
                                        </div>
                                        <a class="webLink" href="<?= $subsidiary_link ?>"><span><svg xmlns="http://www.w3.org/2000/svg" width="26.741" height="26.731" viewBox="0 0 26.741 26.731">
                                                    <path id="icon-url-link" d="M12.692,0H14.05a2.007,2.007,0,0,0,.229.039,12.485,12.485,0,0,1,3.267.634,13.15,13.15,0,0,1,6.807,5.1,12.986,12.986,0,0,1,2.119,10.182,12.937,12.937,0,0,1-5.339,8.277,13.017,13.017,0,0,1-9.274,2.407,12.578,12.578,0,0,1-5.429-1.86A13.177,13.177,0,0,1,.144,15.211C.083,14.808.047,14.4,0,14V12.744c.035-.318.069-.636.105-.954A13.01,13.01,0,0,1,1.7,6.868,13.3,13.3,0,0,1,6.33,2.017,12.993,12.993,0,0,1,11.453.148c.412-.058.826-.1,1.238-.148M2.368,10.2a11.492,11.492,0,0,0,0,6.34H8.414a39.054,39.054,0,0,1,0-6.34Zm22.007.011H18.328a38.736,38.736,0,0,1,0,6.332h6.047a11.491,11.491,0,0,0,0-6.332m-7.972,0H10.338a35.087,35.087,0,0,0,0,6.333H16.4a35.413,35.413,0,0,0,0-6.333M10.565,8.252H16.17A16.077,16.077,0,0,0,14.756,3.4a5.985,5.985,0,0,0-.893-1.237.619.619,0,0,0-.988,0,3.129,3.129,0,0,0-.525.609,14.851,14.851,0,0,0-1.785,5.485m.028,10.231a16.047,16.047,0,0,0,1.386,4.859,6.471,6.471,0,0,0,.67,1.021c.5.6.937.6,1.44.008a5.068,5.068,0,0,0,.56-.814,12.529,12.529,0,0,0,1.177-3.3c.134-.58.237-1.167.358-1.773Zm-.28-16.124A11.439,11.439,0,0,0,3.124,8.243a.839.839,0,0,0,.132.027c1.731,0,3.461,0,5.192,0,.167,0,.2-.083.221-.218a19.485,19.485,0,0,1,1.645-5.7m6.06-.05c.135.285.244.5.342.722a19.534,19.534,0,0,1,1.348,4.962c.033.216.1.285.324.284,1.652-.01,3.3-.005,4.957-.006.081,0,.161-.011.279-.02a11.648,11.648,0,0,0-7.25-5.943m-6,22.123c-.138-.292-.247-.508-.345-.73a19.4,19.4,0,0,1-1.345-4.963c-.035-.229-.122-.274-.333-.273-1.644.008-3.287,0-4.931,0H3.107a11.653,11.653,0,0,0,7.262,5.962m13.253-5.939c-.1-.011-.155-.022-.212-.023-1.7,0-3.392,0-5.088,0-.189,0-.229.082-.253.243a20.662,20.662,0,0,1-.994,4.094c-.2.533-.432,1.051-.666,1.619a11.606,11.606,0,0,0,7.213-5.928" fill="#23ace1" />
                                                </svg></span><?= $subsidiary_link ?></a>
                                    </div>
                                    <div class="ecosyContent">
                                        <p>
                                        <p><?php if ($get_configured_lang == 'HI') :
                                                echo  $subsidiary_description_hindi;
                                            else :
                                                echo  $subsidiary_description;
                                            endif; ?></p>

                                        </p>
                                        <div class="impactUl">
                                            <div class="kindlyvisit">
                                                <p>For more details kindly visit </p>
                                                <a class="visitLink" href="<?= $subsidiary_link ?>"><?= $subsidiary_link ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <script>
            $(document).ready(function() {
                if (window.location.hash) {
                    setTimeout(function() {
                        var hash = window.location.hash.substring(1);
                        if (hash !== 'ecoS1') {
                            var link = document.getElementById(hash);
                            link.click();
                        }
                    }, 1500);
                }
            });
        </script>
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank" title="Udyami Mitra"><img src="assets/front/images/logo4.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank" title="The National Portal of Indian"><img src="assets/front/images/logo5.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank" title="Central Vigilance Commission"><img src="assets/front/images/logo6.jpg" class="img-fluid w-100"></a>
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