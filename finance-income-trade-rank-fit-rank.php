<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
$request_uri = $_SERVER['REQUEST_URI'];

// Explode the URI by "/" to get individual parts
$uri_parts = explode('/', $request_uri);

$fetched_url = end($uri_parts);

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
    
    <style>
        .fit-rank-link, .fit-rank-link:hover, .fit-rank-link:active{
            color: #0d6efd;
        }
    </style>
</head>

<body class="main-wrapper-en"></body>

<div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
<?php
        require_once('public/header.php');

        $show_innerpages_datas = sqlQUERY_LABEL("SELECT  `innerpage_ID`, `innerpage_title` , `innerpage_title_hindi`, `innerpage_content`, `innerpage_content_hindi`, `innerpage_image` FROM `js_innerpages` WHERE `seo_url` = '$fetched_url' AND `deleted` ='0'") or die("#1-UNABLE_TO_GETTING_DATAS:" . sqlERROR_LABEL());

        $count_show_innerpages_datas = sqlNUMOFROW_LABEL($show_innerpages_datas);

        if ($count_show_innerpages_datas > 0) :
            while ($row = sqlFETCHARRAY_LABEL($show_innerpages_datas)) :
                $innerpage_ID = $row["innerpage_ID"];
                $innerpage_title = html_entity_decode($row["innerpage_title"]);
                $innerpage_title_decode =html_entity_decode($row[$innerpage_title]);
                $innerpage_title_hindi = html_entity_decode($row["innerpage_title_hindi"]);
                $innerpage_content =  html_entity_decode($row["innerpage_content"]);
                $innerpage_content_hindi =   html_entity_decode($row["innerpage_content_hindi"]);
                $innerpage_image =  $row["innerpage_image"];
            endwhile;
        else :
            echo "No Data Found!!!";
        endif;
        ?>

<section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
        <div class="container">
            <div class="inner">
                <h1 ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $innerpage_title_hindi;
                                                else:
                                                 echo  $innerpage_title;
                                                endif; ?></h1>
            </div>
        </div>
    </section>
    <section class="breadcrumb-inner mb-5" data-aos="fade-right">
        <div class="container">
            <div class="inner">
            <ul>
                    <li><a href="<?= SEOURL; ?>index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                    <li><a class="active" href="<?= SEOURL; ?>#" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $innerpage_title_hindi;
                                                else:
                                                 echo  $innerpage_title;
                                                endif; ?></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="overview-section" data-aos="fade-right" data-aos-delay="500">
        <div class="container-fluid position-relative half-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="aos-init aos-animate">
                            <h2 ><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $innerpage_title_hindi;
                                                else:
                                                 echo  $innerpage_title;
                                                endif; ?></h2>
                            <p><?php  if($get_configured_lang == 'HI'): 
                                                 echo  $innerpage_content_hindi;
                                                else:
                                                 echo  $innerpage_content;
                                                endif; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-5 p-0">
                        <img src="<?= SEOURL; ?>assets/front/images/<?= $innerpage_image; ?>" alt="image" class="img-fluid">
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
    <script>
            function switchLanguage(selectedValue) {
                // Store the selected language in localStorage
                localStorage.setItem('selectedLanguage', selectedValue);

                // Get the stored language from localStorage
                const storedLanguage = localStorage.getItem('selectedLanguage');

                var englishTITLE = <?php echo json_encode($innerpage_title_decode); ?>;
                var hindiTITLE = <?php echo json_encode($innerpage_title_hindi); ?>;

                var englishHOME = "HOME";
                var hindiHOME = "होम पेज";

                var englishCONTENT = <?php echo json_encode($innerpage_content); ?>;
                var hindiCONTENT = <?php echo json_encode($innerpage_content_hindi); ?>;

                if (storedLanguage === 'en') {
                    document.getElementById("title").innerHTML = englishTITLE;
                    document.getElementById("home").innerHTML = englishHOME;
                    document.getElementById("heading").innerHTML = englishTITLE;
                       document.getElementById("content").innerHTML = englishCONTENT;
                } else if (storedLanguage === 'hi') {
                    document.getElementById("title").innerHTML = hindiTITLE;
                    document.getElementById("home").innerHTML = hindiHOME;
                    document.getElementById("heading").innerHTML = hindiTITLE;   
                    document.getElementById("content").innerHTML = hindiCONTENT;
                } else {
                    document.getElementById("title").innerHTML = englishTITLE;
                    document.getElementById("home").innerHTML = englishHOME;
                    document.getElementById("heading").innerHTML = englishTITLE;
                    document.getElementById("content").innerHTML = englishCONTENT;
                }
            }
            // Call switchLanguage function when the page loads
            window.onload = function() {
                // Check if a language is stored in localStorage
                const storedLanguage = localStorage.getItem('selectedLanguage');
                if (storedLanguage) {
                    // If a language is stored, switch to that language
                    switchLanguage(storedLanguage);
                }
            };
        </script>
    </body>

</html>