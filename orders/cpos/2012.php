<?php
include_once('../../head/jackus.php');

$year = $_GET['year'];
?>

<!DOCTYPE html>
<html>


<!-- Mirrored from sidbinew.php-staging.com/orders/cpos/2012 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Nov 2023 08:32:11 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>CPOS Orders - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
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
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
    <?php
require_once('../../public/header2.php');
?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('../../assets/front/images/Inner%20Banenr.jpg') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1>CPOS</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="../../index">Home</a></li>
                        <li><a class="active" href="#">CPOS</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="press-coverages">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2>CPOS</h2>
                        </div>
                    </div>
                </div>
                <?php

                $total_record_count = sqlQUERY_LABEL("SELECT `id` FROM `cipos_orders` WHERE `year`='$year'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

                $count_tenders_list_count = sqlNUMOFROW_LABEL($total_record_count);

                $recordsPerPage = 10; // Number of records to display per page
                $totalRecords = $count_tenders_list_count; // Total number of records
                $totalPages = ceil($totalRecords / $recordsPerPage); // Calculate total pages

                // Get the current page from the URL parameter
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Adjust the current page if it's out of bounds
                if ($current_page < 1) {
                    $current_page = 1;
                } elseif ($current_page > $totalPages) {
                    $current_page = $totalPages;
                }

                if ($current_page > 1) :
                    // Calculate the offset for the SQL query
                    $offset = ($current_page - 1) * $recordsPerPage;
                else :
                    $offset = 0;
                endif;
        
                $list_cipos_orders = sqlQUERY_LABEL("SELECT `id`, `title`, `excerpt`, `content`, `cloud_tags`, `year`, `upload_document`, `status` FROM `cipos_orders` WHERE `year`='$year' ORDER BY `id` DESC LIMIT $offset, $recordsPerPage") or die("#1-Unable to get records:" . sqlERROR_LABEL());
 
                // $count_cipos_orders_list_count = sqlNUMOFROW_LABEL($list_cipos_orders);

                // $recordsPerPage = 10; // Number of records to display per page
                // $totalRecords = $count_cipos_orders_list_count; // Total number of records
                // $totalPages = ceil($totalRecords / $recordsPerPage); // Calculate total pages

                // // Get the current page from the URL parameter
                // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // // Adjust the current page if it's out of bounds
                // if ($current_page < 1) {
                //     $current_page = 1;
                // } elseif ($current_page > $totalPages) {
                //     $current_page = $totalPages;
                // }

                // // Calculate the offset for the SQL query
                // $offset = ($current_page - 1) * $recordsPerPage;

                ?>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">File Name</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Download</th>

                                </tr>
                            </thead>
                            <?php
                            if ($count_tenders_list_count > 0) :
                                while ($row = sqlFETCHARRAY_LABEL($list_cipos_orders)) :
                                    $counter++;

                                    $title = $row["title"];
                                    $year = $row['year'];
                                    $upload_document = $row['upload_document'];


                            ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?= $counter; ?></th>
                                            <td><?= $title; ?></td>
                                            <td><?= $year; ?></td>
                                            <td>
                                                <a href="../../uploads/cipos_orders/<?= $upload_document ?>" target="_blank" class="btn btn-info" title="Download"><i class="fa fa-file-pdf-o"></i> Download</a>
                                            </td>

                                        </tr>
                                    </tbody>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </table>
                    </div>
                </div>
                <form method="get" accept-charset="utf-8" id="frmlist" name="frmlist" data-bv-message="This value is not valid" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    <div class="d-lg-flex flex-wrap justify-content-between align-items-center mt-5">
                        <div class="page-numbers py-3 text-center">
                            Displaying <?= min($offset + 1, $totalRecords) ?> to <?= min($offset + $recordsPerPage, $totalRecords) ?> of <?= $totalRecords ?> </div>
                        <div class="pagination">
                            <div class="input-group align-items-center justify-content-center">
                                <div class="input-group-prepend">
                                    <button title="Goto First Page" class="btn" onclick="gotopage(1);" type="button"><i class="fa fa-angle-double-left" aria-hidden="true"></i></button>
                                </div>
                                <div class="input-group-prepend ml-1">
                                    <button title="Goto Previous Page" class="btn" onclick="gotopage(<?php echo max($current_page - 1, 1); ?>);" type="button"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                </div>
                                <input name="page" id="page" type="text" class="form-control" style="text-align:center;" value="<?= $current_page ?>">
                                <div class="input-group-append ml-1">
                                    <button title="Goto Next Page" class="btn" onclick="gotopage(<?php echo min($current_page + 1, $totalPages); ?>);" type="button"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                </div>
                                <div class="input-group-append ml-1">
                                    <button title="Goto Last Page" class="btn" onclick="gotopage(<?php echo $totalPages; ?>);" type="button"><i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function gotopage(page) {
                            document.getElementById('page').value = page;
                            window.location.href = window.location.pathname + '?page=' + page + '&year=' + <?= $year ?>;
                        }
                    </script>
            </div>
        </section>
        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a
                                        href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.htm"
                                        target="_blank" title="Udyam Registration"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo1.jpg"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank"
                                        title="National Portal ( Jan Samarth )"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo2.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank"
                                        title="Ministry of Micro, Small and Medium Enterprises"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo3.png"
                                            class="img-fluid w-100"></a>
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
                                            src="<?= SEOURL; ?>assets/front/images/logo5.png"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank"
                                        title="Central Vigilance Commission"><img
                                            src="<?= SEOURL; ?>assets/front/images/logo6.jpg"
                                            class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://financialservices.gov.in/beta/en" target="_blank"
                                        title="Department of financial services"><img
                                            src="<?= SEOURL; ?>assets/front/images/department-logo.jpg"
                                            class="img-fluid w-100"></a>
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
require_once('../../public/footer2.php');
?>
</body>

</html>