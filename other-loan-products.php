<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="Other_Loan_Products_Title">Direct Loans - More Product - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-family.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
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
        <section class="about-us-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1 data-translate="Other_Loan_Products"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रत्यक्ष ऋण - अधिक उत्पाद';
                                                else:
                                                 echo  'Direct Loans - More Product';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index" data-translate="home"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'मुख्य पृष्ठ';
                                                else:
                                                 echo  'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="other-loan-products" data-translate="Other_Loan_Products"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रत्यक्ष ऋण - अधिक उत्पाद';
                                                else:
                                                 echo  'Direct Loans - More Product';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="press-releases">
            <div class="container">
                <div class="inner">
                    <div class="title-content-button">
                        <div class="title-content bold-title with-underline green">
                            <h2 data-translate="Other_Loan_Products"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'प्रत्यक्ष ऋण - अधिक उत्पाद';
                                                else:
                                                 echo  'Direct Loans - More Product';
                                                endif; ?></h2>
                        </div>
                    </div>
                </div>
                <?php
                $list_circulars_datas_count = sqlQUERY_LABEL("SELECT `circulars_ID`, `circulars_title`, `circulars_date`, `circulars_print`, `status` FROM `js_circulars` where deleted = '0' ORDER BY circulars_ID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                $count_circulars_list_count = sqlNUMOFROW_LABEL($list_circulars_datas_count);

                $recordsPerPage = 10; // Number of records to display per page
                $totalRecords = $count_circulars_list_count; // Total number of records
                $totalPages = ceil($totalRecords / $recordsPerPage); // Calculate total pages

                // Get the current page from the URL parameter
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Adjust the current page if it's out of bounds
                if ($current_page < 1) {
                    $current_page = 1;
                } elseif ($current_page > $totalPages) {
                    $current_page = $totalPages;
                }
                // Calculate the offset for the SQL query
                $offset = ($current_page - 1) * $recordsPerPage;

                // Fetch records for the current page
                $list_circulars_datas = sqlQUERY_LABEL("SELECT `circulars_ID`, `circulars_title`, `circulars_date`, `circulars_print`, `status` FROM `js_circulars` where deleted = '0' ORDER BY circulars_ID ASC LIMIT $offset, $recordsPerPage") or die("#1-Unable to get records:" . sqlERROR_LABEL());
                $count_circulars_list = sqlNUMOFROW_LABEL($list_circulars_datas);
                ?>
 <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered" id="other_loansLIST">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10px" scope="col" data-translate="sno"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'क्र.सं.';
                                                else:
                                                 echo  'S. No.';
                                                endif; ?></th>
                                            <th class="text-center" width="400px" scope="col" data-translate="title"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'शीर्षक';
                                                else:
                                                echo  'Title';
                                                endif; ?></th>
                                            <th class="text-center" width="50px" scope="col" data-translate="date"><?php  if($get_configured_lang == 'HI'): 
                                                 echo  'डाउनलोड करना';
                                                else:
                                                 echo  'Download';
                                                endif; ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                
                <script>
                function gotopage(page) {
                    document.getElementById('page').value = page;
                    window.location.href = window.location.pathname + '?page=' + page;
                }
                </script>
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
        <?php
        require_once('public/footer.php');
        ?>
        
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js">
        </script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js">
        </script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.flash.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/jszip.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.html5.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.print.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.select.min.js"></script>
        <script>
        var dataTable = $('#other_loansLIST').DataTable({
                //responsive: true,
                'ajax': '<?= BASEPATH; ?>engine/json/JSONother_loans.php?show=frontend&language=' + localStorage.getItem('selectedLanguage'),
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
                        "data": "filename" //2
                    },

                ],
                "columnDefs": [{
                    "targets": 0,
                    "data": "count",
                    "searchable": false
                }, {
                    "targets": 1,
                    "data": "title",
                    "searchable": false,
                    "render": function(data, type, row) {
                        return data;
                    }
                }, {
                    "targets": 2,
                    "data": "filename",
                    "searchable": false,
                    "render": function(data, type, row) {
                        return '<a href="<?= SEOURL; ?>uploads/other_loans_document/' + data + '" title="Download" target="_blank"><img class="download-icon-blue" src="<?= SEOURL; ?>assets/front/images/cloud-download-blue.png" alt="Icon" /></a>';
                    }
                }],
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            async function other_loansDataTable(lang) {
                $.ajax({
                    url: '<?= BASEPATH; ?>engine/json/JSONother_loans.php?show=frontend&language=' + lang, // Replace with your actual PHP file/function
                    method: 'GET', // Use GET or POST based on your PHP function
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing data and add new data to the DataTable
                        dataTable.clear().rows.add(data.data).draw();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors if needed
                        console.error('Error:', error);
                    }
                });
            }
        </script>
</body>

</html>