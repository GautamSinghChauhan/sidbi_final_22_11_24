<!-- updated : 1:00 PM  | 30-12-23 -->
<?php require_once('head/jackus.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Branch In-charges - Small Industries Development Bank of India</title>
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
    <style>
        .childTableRow {
            display: none;
        }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php require_once('public/header.php'); ?>

        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'शाखा प्रभारी
                                                 ';
                                                else:
                                                 echo  'Branch In-charges';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo  'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'शाखा प्रभारी
                                                 ';
                                                else:
                                                 echo  'Branch In-charges';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="main-announcement cms" data-aos="fade-up">
            <div class="container">
           
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th style="vertical-align: middle;" width="220px"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'शाखा का स्थान
                                                 ';
                                                else:
                                                 echo  'Branch Location';
                                                endif; ?></th>
                            <th style="vertical-align: middle;" width="220px"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'शाखा प्रभारी का नाम (श्री/श्रीमती)
                                                 ';
                                                else:
                                                 echo  'Name of the Branch In-charge (Shri/Shrimati)';
                                                endif; ?></th>
                            <th style="vertical-align: middle;" width="190px"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'संपर्क संख्या
                                                 ';
                                                else:
                                                 echo  'Contact Number ';
                                                endif; ?></th>
                            <th style="vertical-align: middle;" width="190px"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'ईमेल
                                                 ';
                                                else:
                                                 echo  'Email';
                                                endif; ?></th>
                            <th style="vertical-align: middle;" width="240px"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'पता
                                                 ';
                                                else:
                                                 echo  'Address';
                                                endif; ?></th>

                            <!-- <th style="vertical-align: middle;" width="65px" class="text-center"></th> -->
                        </tr>
                    </thead>
                    <?php
                $list_transaction = sqlQUERY_LABEL("SELECT `branch_id`, `branch_location`, `branch_location_hindi`, `branch_name`, `branch_name_hindi`, `branch_contact`, `branch_email`, `branch_address`, `branch_address_hindi`, `status` FROM `branch` where deleted = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $branch_id = $row["branch_id"];
                    $branch_location = $row["branch_location"];
                    $branch_location_hindi = $row["branch_location_hindi"];
                    $branch_name = $row["branch_name"];
                    $branch_name_hindi = $row["branch_name_hindi"];
                    $branch_contact = $row["branch_contact"];
                    $branch_email = $row["branch_email"];
                    $branch_address = $row["branch_address"];
                    $branch_address_hindi = $row["branch_address_hindi"];


                ?>
                    <tr>
                    <td><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $branch_location_hindi;
                                                else:
                                                 echo   $branch_location;
                                                endif; ?></td>
                    <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $branch_name_hindi;
                                                else:
                                                 echo   $branch_name;
                                                endif; ?></td>
                    <td><?= $branch_contact ?></td>
                    <td><?= $branch_email ?></td>
                    <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $branch_address_hindi;
                                                else:
                                                 echo   $branch_address;
                                                endif; ?></td>
                </tr>
                <?php endwhile; ?>
                </table>
               
            </div>
        </section>
        <script>
            $(function() {
                $('.expandChildTable').on('click', function() {
                    $(this).toggleClass('selected').closest('tr').next().toggle();
                    $(this).find('i').removeClass('fa-minus-circle').addClass('fa-plus-circle');
                    $('.expandChildTable.selected i').removeClass('fa-plus-circle').addClass(
                        'fa-minus-circle');
                })
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