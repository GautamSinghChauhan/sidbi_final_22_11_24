<?php
require_once('./head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="homeTITLE">Search - Small Industries Development Bank of India</title>
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
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/animate.min.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.carousel.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php require_once('./public/header.php'); ?>

        <section class="about-us-banner" style="background: url('./assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1 data-translate="tenders">Searches</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="<?= SEOURL; ?>index">Home</a></li>
                        <li><a class="active" href="<?= SEOURL; ?>search.php?search=<?= $_GET['search'] ?>">Search</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="press-releases">
            <div class="container">
                <div class="inner">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="title-content bold-title with-underline green">
                            <h2 class="mb-0">Search Results</h2>
                        </div>
                        <!-- <div class="button-form">
                            <div class="">
                                <a href="pressreleasearchived.php" class="btn btn-outline-success" role="button"><span data-translate="viewarchived">View Archived</span> <i class="fa fa-angle-right ms-2"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="searchList">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px" scope="col">S. No.</th>
                                    <th class="text-center" width="450px" scope="col">Title</th>
                                    <th class="text-center" width="20px" scope="col">Date</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <?php require_once('./public/footer.php'); ?>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.flash.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/jszip.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.html5.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.print.min.js"></script>
    <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.select.min.js"></script>

    <script>
        var dataTable = $('#searchList').DataTable({
            //responsive: true,
            'ajax': '<?= BASEPATH; ?>engine/json/JSONsearch.php?search=<?= $_GET['search'] ?>&show=frontend&language=' + localStorage.getItem('selectedLanguage'),
            "lengthChange": true,
            "pageLength": 5, // Number of items per page
            "lengthMenu": [5, 10, 25, 50],
            "columns": [{
                    "data": "count" //0
                },
                {
                    "data": "title" //1
                },
                {
                    "data": "date" //4
                }
            ],
            "columnDefs": [{
                "targets": 0,
                "data": "count",
                "searchable": false
            }],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    </script>
</body>

</html>