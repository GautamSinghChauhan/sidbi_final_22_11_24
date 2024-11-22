<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Coca Report - Small Industries Development Bank of India</title>
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
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?>

        <section class="press-releases mt-5">
            <div class="container" data-aos="fade-up">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'सूक्ष्म ऋण विकास विभाग';
                                                else:
                                                 echo  'MICRO LENDING DEVELOPMENT DEPARTMENT';
                                                endif; ?></h2>
                        </div>
                    </div>
                </div>
                <h4><?php  if($get_configured_lang == 'HI'): 
                                                 echo  '(I) कोका रिपोर्ट (वित्तीय वर्ष 2010 - 2015)';
                                                else:
                                                 echo  '(I) COCA REPORTS (FY 2010 - 2015)';
                                                endif; ?></h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th class="text-center" width="65px" scope="col">Sr. No.</th> -->
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'एमएफआई/सोसायटी/एनजीओ का नाम';
                                                else:
                                                 echo  'Name of MFI/ Society/ NGO';
                                                endif; ?></th>
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'रिपोर्ट की तारीख';
                                                else:
                                                 echo  'Date of Report';
                                                endif; ?></th>
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'डाउनलोड करना';
                                                else:
                                                 echo  'Download';
                                                endif; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT coca_reports.coca_reports_id, coca_reports.coca_reports_title, coca_reports.coca_reports_date,  coca_reports.filename, coca_reports_translations.title, coca_reports.status FROM coca_reports INNER JOIN coca_reports_translations ON coca_reports.coca_reports_id = coca_reports_translations.coca_reports_id  AND coca_reports.deleted = '0' AND coca_reports_translations.deleted = '0'  ORDER BY coca_reports.coca_reports_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $coca_reports_id = $row["coca_reports_id"];
                                        $coca_reports_title = $row["coca_reports_title"];
                                        $coca_reports_date = $row["coca_reports_date"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                <tr>
                                    <!-- <td style="text-align:center">1</td> -->
                                    <td><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $coca_reports_title;
                                                endif; ?></td>
                                    <td><?= $coca_reports_date ?></td>
                                    <td style="text-align:center"> <a title="View" target="_blank"
                                            href="<?= SEOURL; ?>uploads/coca_reports/<?= $filename ?>"><i
                                                class="fa fa-download" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
<?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container mt-5" data-aos="fade-up">
                <h4><?php  if($get_configured_lang == 'HI'): 
                                                 echo  '(II) हार्मोनाइज्ड कोका रिपोर्ट (वित्तीय वर्ष 2016-17)';
                                                else:
                                                 echo  '(II) HARMONISED COCA REPORTS (FY 2016 -17)';
                                                endif; ?></h4>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th class="text-center" width="65px" scope="col">Sr. No.</th> -->
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'एमएफआई/सोसायटी/एनजीओ का नाम';
                                                else:
                                                 echo  'Name of MFI/ Society/ NGO';
                                                endif; ?></th>
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'रिपोर्ट की तारीख';
                                                else:
                                                 echo  'Date of Report';
                                                endif; ?></th>
                                    <th class="text-center" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'डाउनलोड करना';
                                                else:
                                                 echo  'Download';
                                                endif; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT harmonised.harmonised_id, harmonised.harmonised_title, harmonised.harmonised_date,  harmonised.filename, harmonised_translations.title, harmonised.status FROM harmonised INNER JOIN harmonised_translations ON harmonised.harmonised_id = harmonised_translations.harmonised_id  AND harmonised.deleted = '0' AND harmonised_translations.deleted = '0'  ORDER BY harmonised.harmonised_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $harmonised_id = $row["harmonised_id"];
                                        $harmonised_title = $row["harmonised_title"];
                                        $harmonised_date = $row["harmonised_date"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                <tr>
                                    <!-- <td style="text-align:center">1</td> -->
                                    <td><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $harmonised_title;
                                                endif; ?></td>
                                    <td><?= $harmonised_date ?></td>
                                    <td style="text-align:center"> <a title="View" target="_blank"
                                            href="<?= SEOURL; ?>uploads/coca_reports/<?= $filename ?>"><i class="fa fa-download"
                                                aria-hidden="true"></i></a>
                                    </td>
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
</body>

</html>