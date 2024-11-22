<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Publication Reports - Small Industries Development Bank of India</title>
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
        /* CSS code for the alert */
        .alert_popup {
            padding: 20px;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            color: white;
            z-index: 3000;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* Added box shadow for a subtle effect */
            display: none;
        }

        .alert_close_btn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .alert_close_btn:hover {
            color: black;
        }

        .alert-title {
            font-size: clamp(14px, 3vw, 17px);
            /* Adjusted font size */
            font-weight: bold;
            margin-right: 5px;
        }

        .alert-message {
            font-size: clamp(13px, 3vw, 17px);
        }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>Publications & Reports</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="publication-and-reports">Publications & Reports</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="careers publication-and-reports press-releases">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>Publications & Reports</h2>
                        </div>
                    </div>
                    <p>The publication & Reports of SIDBI include Annual Series Reports, MSME Knowledge Kit, MSME Policies & Important Circular and MSME studies & reports.</p>
                </div>
                <?php
                $select_publication_title = sqlQUERY_LABEL("SELECT `publication_id`, `publication_title`, `publication_hindi_title` FROM `js_publication_title`  WHERE  `status`='1'  ORDER BY `publication_id` ASC ") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row_publication_title = sqlFETCHARRAY_LABEL($select_publication_title)) :
                    $counter++;
                    $publication_id = $row_publication_title["publication_id"];
                    $publication_title = html_entity_decode($row_publication_title["publication_title"]);
                    $publication_hindi_title = html_entity_decode($row_publication_title["publication_hindi_title"]);

                ?>
                    <div class="row border border-success publication-and-reports-table mb-2">
                        <div class="col-md-12">

                            <h4 class="py-3 m-0"><?= $publication_title; ?></h4>
                        </div>
                        <?php
                        $select_publication_details = sqlQUERY_LABEL("SELECT `id`, `publication_cat_id`,`is_archive`, `title`, `document_link` FROM `publication_reports`  WHERE  `publication_cat_id` = '$publication_id' and `status`='1' and `is_archive`='0' ORDER BY `publication_cat_id` DESC ") or die("Unable to get records:" . sqlERROR_LABEL());
                        ?>
                        <div class="col-md-12 mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="75px" scope="col">Sr. No.</th>
                                        <th scope="col">Report Name</th>
                                        <th width="100px" class="text-center" scope="col">Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter_title = '1';
                                    while ($row_publication_data = sqlFETCHARRAY_LABEL($select_publication_details)) :
                                        $id = $row_publication_data["id"];
                                        $publication_cat_id = $row_publication_data["publication_cat_id"];
                                        $title = html_entity_decode($row_publication_data["title"]);
                                        $document_link = html_entity_decode($row_publication_data["document_link"]);

                                    ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $counter_title; ?></th>
                                            <td><?= $title ?></a></td>
                                            <td class="text-center">
                                                <a href="javascript:void(0);" onclick="showPUBLICATIONMODAL('<?= $id; ?>')" title="SIDBI Publication Report">
                                                    <i class="fa fa-cloud-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $counter_title = $counter_title + 1;
                                    endwhile; ?>
                                    <!-- <tr>
                                    <th class="text-center" scope="row">2</th>
                                    <td>Annual Report 2020-21 <a href="<?= SEOURL; ?>uploads/financialreport/SIDBI-Part-I-Eng-Single-page-view-Low.pdf" target="_blank">Part-1</a> <a href="<?= SEOURL; ?>uploads/financialreport/SIDBI_AR_Part-II_Eng.pdf" target="_blank">Part-2</a></a></td>
                                    <td class="text-center">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">3</th>
                                    <td>Annual Report 2019-20 <a href="<?= SEOURL; ?>uploads/financialreport/Sidbi-AR-Part-I-Eng.pdf" target="_blank">Part-1</a> <a href="<?= SEOURL; ?>uploads/financialreport/Sidbi-AR-Part-II-Eng.pdf" target="_blank">Part-2</a></a></td>
                                    <td class="text-center">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">4</th>
                                    <td>SIDBI Working Report FY 2021</a></td>
                                    <td class="text-center">
                                        <a href="https://development.sidbi.in/en/publication-and-reports/download/173/1/index" target="_blank" title="SIDBI Working Report FY 2021">
                                            <i class="fa fa-cloud-download"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">5</th>
                                    <td>SIDBI Working Report FY 2020</a></td>
                                    <td class="text-center">
                                        <a href="https://development.sidbi.in/en/publication-and-reports/download/157/1/index" target="_blank" title="SIDBI Working Report FY 2020">
                                            <i class="fa fa-cloud-download"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row">6</th>
                                    <td><a href="https://development.sidbi.in/AnnualReport201819/" traget="_blank">Annual Report 2018-19</a> </a></td>
                                    <td class="text-center">
                                    </td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="button-1 green-btn text-center mb-5 mt-5">
                            <a href="publication_and_reports/publication1.php" target="_blank">View More<i class="fa fa-angle-right"></i></a>
                        </div> -->
                    </div>
                <?php
                endwhile;
                ?>

            </div>
        </section>

        <!-- User Download Popup form -->
        <div class="modal fade msme-cluster-development-popup default-form" id="showPUBLICATIONREPORTMODALFORM" tabindex="-1" aria-labelledby="showPUBLICATIONREPORTMODALFORMLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showPUBLICATIONREPORTMODALFORMLabel">Fill in the form below to receive the product through your Email Id</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body receiving-publication-report-form-data">

                    </div>
                </div>
            </div>
        </div>

        <!-- User Download Popup form END -->
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
        <script>
            // Function to show alerts dynamically
            function showAlert(type, message) {
                var alertContainer = $("#alertContainer");
                alertContainer.empty(); // Clear existing alerts

                var alertDiv = $('<div>').addClass('alert_popup').attr('data-aos', 'zoom-out').attr('data-aos-duration', '1000');
                var closeBtn = $('<span>').addClass('alert_close_btn').html('&times;').click(function() {
                    $(this).parent().fadeOut(); // Hide the alert when close button is clicked
                });
                var alertTitle = $('<strong>').addClass('alert-title').text(type.charAt(0).toUpperCase() + type.slice(1) + '!!! ');
                var alertMessage = $('<span>').addClass('alert-title').text(message);

                alertDiv.append(closeBtn, alertTitle, alertMessage);
                alertContainer.append(alertDiv);
                alertDiv.fadeIn(); // Display the alert
            }

            function showPUBLICATIONMODAL(DOC_ID) {
                $('.receiving-publication-report-form-data').load('head/engine/ajax/ajax_publication_report_download.php?type=show_form&DOC_ID=' + DOC_ID + '', function() {
                    const container = document.getElementById("showPUBLICATIONREPORTMODALFORM");
                    const modal = new bootstrap.Modal(container);
                    modal.show();
                });
            }
        </script>
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