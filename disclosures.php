<!-- updated : 1:00 PM  | 30-12-23 -->
<?php
require_once('head/jackus.php');

$selected_fy_year = $_GET['selected_fy_year'];
$selected_quarter = $_GET['selected_quarter'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Disclosures - Small Industries Development Bank of India</title>
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
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover ;">
            <div class="container">
                <div class="inner">
                    <h1>DISCLOSURES / ANNOUNCEMENTS - NCDS / CP (LISTED)</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li><a class="active" href="index">DISCLOSURES / ANNOUNCEMENTS - NCDS / CP (LISTED)</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="main-announcement cms" data-aos="fade-up">
            <div class="container">
                <div class="row mb-5">
                    <div class="accordion">
                        <h4 class="accordion__title">
                            PERIODIC DISCLOSURES / ANNOUNCEMENTS - NCDS / CP (LISTED) <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <!-- end .accordion__title -->
                        <div class="accordion__content">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="selecty">
                                        <label>Financial Year</label>
                                        <select class="form-control" id="selected_fy_year" name="selected_fy_year" onchange="updateURL()">
                                            <option value="">-None-</option>
                                            <?= getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'select'); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-sm-3">
                                    <div class="selecty">
                                        <label>Quarter / Half-Year</label>
                                        <select class="form-control" id="selected_quarter" name="selected_quarter" onchange="updateURL()">
                                            <option value="">-None-</option>
                                            <option value="1" <?php if ($selected_quarter == 1) : echo 'selected';
                                                                endif; ?>>30-June</option>
                                            <option value="2" <?php if ($selected_quarter == 2) : echo 'selected';
                                                                endif; ?>>30-September</option>
                                            <option value="3" <?php if ($selected_quarter == 3) : echo 'selected';
                                                                endif; ?>>31-December</option>
                                            <option value="4" <?php if ($selected_quarter == 4) : echo 'selected';
                                                                endif; ?>>31-March</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Table  -->
                                <div class="responseTable">
                                    <table id="periodic_disclosures" class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <th class="srno sld">Sr. No.</th>
                                                <th>File Name</th>
                                                <th class="tddownload sld">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_ajax_periodic_disclosures_response">
                                            <?php
                                            $selected_fy_year = $_GET['selected_fy_year'];
                                            $selected_quarter = $_GET['selected_quarter'];
                                            $get_fy_starting = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_starting');

                                            if ($selected_fy_year) :
                                                $get_fy_ending = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_ending');
                                                $filter_by_fy_range = " AND `disclosures_record_date` BETWEEN '$get_fy_starting' AND '$get_fy_ending' ";
                                            endif;

                                            $list_of_periodic_discloser_record = sqlQUERY_LABEL("SELECT `title`, `disclosures_document`, `disclosures_isin` FROM `disclosures` WHERE `status` = '1' and `disclosure_category_id` = '1' {$filter_by_fy_range}") or die("#UNABLE_TO_GET_PERIODIC_DISCLOSER :" . sqlERROR_LABEL());
                                            $num_of_periodic_discloser_rows = sqlNUMOFROW_LABEL($list_of_periodic_discloser_record);
                                            if ($num_of_periodic_discloser_rows > 0) :
                                                while ($row = sqlFETCHARRAY_LABEL($list_of_periodic_discloser_record)) :
                                                    $counter_periodic_discloser++;
                                                    $title = $row["title"];
                                                    $disclosures_document = $row["disclosures_document"];
                                                    $disclosures_isin = $row["disclosures_isin"];
                                            ?>
                                                    <tr>
                                                        <td><?= $counter_periodic_discloser; ?></td>
                                                        <td><?= $title; ?></td>
                                                        <td><a href="uploads/uploads/lodrDisclosure/<?= $disclosures_document; ?>" target="_blank" title="SIDBI Document">
                                                                <i class="fa fa-cloud-download"></i>
                                                            </a></td>
                                                    </tr>
                                                <?php endwhile;
                                            else : ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">No Records found !!!</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end .accordion__content -->
                        </div>
                    </div>
                    <!-- end .accordion 01 -->
                    <div class="accordion">
                        <h4 class="accordion__title">
                            Announcements <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <!-- end .accordion__title -->
                        <div class="accordion__content">
                            <div class="accordion accordion--nested">
                                <h4 class="accordion__title">
                                    NCDs <i class="accordion__icon">
                                        <div class="line-01"></div>
                                        <div class="line-02"></div>
                                    </i>
                                </h4>
                                <!-- end .accordion__title -->
                                <div class="accordion__content">
                                    <?php
                                    $list_of_disclosure_categories_record = sqlQUERY_LABEL("SELECT `id`, `name` FROM `disclosure_categories` WHERE `status` = '1' and `id` != '1'") or die("#UNABLE_TO_GET_DISCLOSER_CATEGORY :" . sqlERROR_LABEL());
                                    $num_of_periodic_disclosure_categories_rows = sqlNUMOFROW_LABEL($list_of_disclosure_categories_record);
                                    if ($num_of_periodic_disclosure_categories_rows > 0) :
                                        while ($row = sqlFETCHARRAY_LABEL($list_of_disclosure_categories_record)) :
                                            $id = $row["id"];
                                            $name = $row["name"];
                                    ?>
                                            <div class="accordion accordion--nested">
                                                <h4 class="accordion__title">
                                                    <?= $name; ?> <i class="accordion__icon">
                                                        <div class="line-01"></div>
                                                        <div class="line-02"></div>
                                                    </i>
                                                </h4>
                                                <!-- end .accordion__title -->
                                                <div class="accordion__content">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="selecty">
                                                                <label>Year</label>
                                                                <select class="form-control" id="ncd_year" name="ncd_year" onchange="updateNCDURL('<?= $id; ?>')">
                                                                    <option value="">-None-</option>
                                                                    <?= getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'list_of_year'); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="selecty">
                                                                <label>Month</label>
                                                                <select class="form-control" id="ncd_month" name="ncd_month" onchange="updateNCDURL('<?= $id; ?>')">
                                                                    <option value="">-None-</option>
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <table class="table table-bordered 2maintable mt-5">
                                                            <thead>
                                                                <tr>
                                                                    <th>ISIN No.</th>
                                                                    <th>Record Date</th>
                                                                    <th>Document</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="show_ajax_ncds_annoncement_response">
                                                                <?php
                                                                $selected_fy_year = $_GET['selected_fy_year'];
                                                                $selected_quarter = $_GET['selected_quarter'];
                                                                $get_fy_starting = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_starting');

                                                                if ($selected_fy_year) :
                                                                    $get_fy_ending = getFINANCIALYEAR_DETAILS($selected_fy_year, '', '', 'get_fy_ending');
                                                                    $filter_by_fy_range = " AND `disclosures_record_date` BETWEEN '$get_fy_starting' AND '$get_fy_ending' ";
                                                                endif;

                                                                $list_of_periodic_discloser_record = sqlQUERY_LABEL("SELECT `disclosures_isin`, `disclosures_document`, `disclosures_isin`, `disclosures_record_date` FROM `disclosures` WHERE `status` = '1' and `disclosure_category_id` = '$id' {$filter_by_fy_range}") or die("#UNABLE_TO_GET_PERIODIC_DISCLOSER :" . sqlERROR_LABEL());
                                                                $num_of_periodic_discloser_rows = sqlNUMOFROW_LABEL($list_of_periodic_discloser_record);
                                                                if ($num_of_periodic_discloser_rows > 0) :
                                                                    while ($row = sqlFETCHARRAY_LABEL($list_of_periodic_discloser_record)) :
                                                                        $disclosures_isin = $row["disclosures_isin"];
                                                                        $disclosures_record_date = $row["disclosures_record_date"];
                                                                        $disclosures_document = $row["disclosures_document"];
                                                                ?>
                                                                        <tr>
                                                                            <td><?= $disclosures_isin; ?></td>
                                                                            <td><?= dateformat_datepicker($disclosures_record_date); ?></td>
                                                                            <td><a href="uploads/uploads/lodrDisclosure/<?= $disclosures_document; ?>" target="_blank" title="SIDBI Document"><?= $disclosures_isin; ?></a></td>
                                                                        </tr>
                                                                    <?php endwhile;
                                                                else : ?>
                                                                    <tr>
                                                                        <td colspan="3" class="text-center">No Records found !!!</td>
                                                                    </tr>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- end .accordion__content -->
                                            </div>
                                    <?php endwhile;
                                    endif; ?>
                                </div>
                                <!-- end .accordion__content -->
                            </div>
                        </div>
                        <!-- end .accordion__content -->
                    </div>
                    <!-- end .accordion 02 -->
                </div>
            </div>
        </section>

        <script>
            function updateURL() {
                var selectedFyYear = document.getElementById('selected_fy_year').value;
                var selectedQuarter = document.getElementById('selected_quarter').value;

                // Construct the URL with parameters
                var url = window.location.href.split('?')[0]; // Get the current URL without parameters
                var params = new URLSearchParams(window.location.search);

                if (selectedFyYear) {
                    params.set('selected_fy_year', selectedFyYear);
                } else {
                    params.delete('selected_fy_year');
                }

                if (selectedQuarter) {
                    params.set('selected_quarter', selectedQuarter);
                } else {
                    params.delete('selected_quarter');
                }
                ajaxLOAD_PERIODIC_DISCLOSURE(selectedFyYear, selectedQuarter);
                window.history.replaceState({}, '', url + '?' + params.toString());
            }

            function updateNCDURL(ID) {
                var ncd_year = document.getElementById('ncd_year').value;
                var ncd_month = document.getElementById('ncd_month').value;

                // Construct the URL with parameters
                var url = window.location.href.split('?')[0]; // Get the current URL without parameters
                var params = new URLSearchParams(window.location.search);

                if (ncd_year) {
                    params.set('ncd_year', ncd_year);
                } else {
                    params.delete('ncd_year');
                }

                if (ncd_month) {
                    params.set('ncd_month', ncd_month);
                } else {
                    params.delete('ncd_month');
                }
                ajaxLOAD_NCDs_ANNONCEMENT(ID, ncd_year, ncd_month);
                window.history.replaceState({}, '', url + '?' + params.toString());
            }

            function ajaxLOAD_NCDs_ANNONCEMENT(ID, ncd_year, ncd_month) {
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_show_ncds_annocement.php?type=show_form",
                    data: {
                        ncd_year: ncd_year,
                        ncd_month: ncd_month,
                        ID: ID
                    },
                    success: function(response) {
                        $('#show_ajax_ncds_annoncement_response').html(response);
                    }
                });
            }

            function ajaxLOAD_PERIODIC_DISCLOSURE(selectedFyYear, selectedQuarter) {
                $.ajax({
                    type: "POST",
                    url: "head/engine/ajax/ajax_show_periodic_disclosure.php?type=show_form",
                    data: {
                        selectedFyYear: selectedFyYear,
                        selectedQuarter: selectedQuarter,
                    },
                    success: function(response) {
                        $('#show_ajax_periodic_disclosures_response').html(response);
                    }
                });
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
</body>

</html>