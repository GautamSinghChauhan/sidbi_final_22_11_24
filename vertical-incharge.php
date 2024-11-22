<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Contact Us - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link href="<?= SEOURL; ?>https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>../code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
    <style>
        .active {
            fill: #FFD700;
            /* Change the color to indicate an active state */
        }
    </style>

</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'कार्यक्षेत्र/जोनल प्रभारी';
                                                else:
                                                 echo   'Zonal In-charge';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="<?= SEOURL; ?>index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo  'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="<?= SEOURL; ?>index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'कार्यक्षेत्र/जोनल प्रभारी';
                                                else:
                                                 echo   'Zonal In-charge';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="350px" data-translate="careersParaTitle"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'कार्यक्षेत्र नेतृत्व';
                                                else:
                                                 echo   'Zonal In-charge';
                                                endif; ?></th>
                                <th scope="col" width="350px" data-translate="careersStart"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'लंबवत नाम';
                                                else:
                                                 echo   'Vertical Name';
                                                endif; ?></th>
                                <th class="text-center" width="200px" scope="col" data-translate="careersEnd"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'संपर्क नंबर।';
                                                else:
                                                 echo   'Contact No.';
                                                endif; ?></th>
                                <th class="text-center" width="200px" scope="col" data-translate="careersEnd"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ईमेल आईडी';
                                                else:
                                                 echo   'Email ID';
                                                endif; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `vertical_id`, `vertical_leadership`, `vertical_leadership_hindi`, `vertical_name`, `vertical_name_hindi`, `vertical_contact`, `vertical_email`, `status` FROM `vertical`  where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $vertical_id = $row["vertical_id"];
                    $vertical_leadership = $row["vertical_leadership"];
                    $vertical_leadership_hindi = $row["vertical_leadership_hindi"];
                    $vertical_name = $row["vertical_name"];
                    $vertical_name_hindi = $row["vertical_name_hindi"];
                    $vertical_contact = $row["vertical_contact"];
                    $vertical_email = $row["vertical_email"];


                ?>
                            <tr>
                                <td > <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $vertical_leadership_hindi;
                                                else:
                                                 echo   $vertical_leadership;
                                                endif; ?></td>
                                <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $vertical_name_hindi;
                                                else:
                                                 echo   $vertical_name;
                                                endif; ?></td>
                                <td><?= $vertical_contact ?></td>
                                <td><?= $vertical_email ?></td>
                            </tr>
                           <?php endwhile; ?>
                        </tbody>
                    </table>
                </div></div>
                <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" width="350px" data-translate="careersParaTitle"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'जोनल प्रभारी';
                                                else:
                                                 echo   'Zonal In-charge';
                                                endif; ?></th>
                                <th scope="col" width="350px" data-translate="careersStart"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'आंचलिक कार्यालय';
                                                else:
                                                 echo   'Zonal Office';
                                                endif; ?></th>
                                <th class="text-center" width="200px" scope="col" data-translate="careersEnd"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'संपर्क नंबर।';
                                                else:
                                                 echo   'Contact No.';
                                                endif; ?></th>
                                <th class="text-center" width="230px" scope="col" data-translate="careersEnd"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ईमेल आईडी';
                                                else:
                                                 echo   'Email ID';
                                                endif; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `zonal_id`, `zonal_office`, `zonal_office_hindi`, `zonal_name`, `zonal_name_hindi`, `zonal_contact`, `zonal_email`, `status` FROM `zonal`  where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $zonal_id = $row["zonal_id"];
                    $zonal_office = $row["zonal_office"];
                    $zonal_office_hindi = $row["zonal_office_hindi"];
                    $zonal_name = $row["zonal_name"];
                    $zonal_name_hindi = $row["zonal_name_hindi"];
                    $zonal_contact = $row["zonal_contact"];
                    $zonal_email = $row["zonal_email"];


                ?>
                            <tr>
                                <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $zonal_name_hindi;
                                                else:
                                                 echo   $zonal_name;
                                                endif; ?></td>
                                <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $zonal_office_hindi;
                                                else:
                                                 echo   $zonal_office;
                                                endif; ?></td>
                                <td><?= $zonal_contact ?></td>
                                <td><?= $zonal_email ?></td>
                            </tr>
                           <?php endwhile; ?>
                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



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