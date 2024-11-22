<!-- updated : 1:00 PM  | 30-12-23 -->
<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="corporate-head">Corporate Governance - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-family.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />

    <link href="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/css/jquery.dataTables.min.css"
        rel="stylesheet">
    <link
        href="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
        rel="stylesheet">

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
        <section class="about-us-banner"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'निगम से संबंधित शासन प्रणाली';
                                                else:
                                                 echo   'Corporate Governance';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="#" data-translate="corporate-head"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'निगम से संबंधित शासन प्रणाली';
                                                else:
                                                 echo   'Corporate Governance';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>


        <div class="cms CorporateGovernance">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'बैंक कॉरपोरेट गवर्नेंस को पूरी तरह से अपनाता है
                                                 द्वारा विनियामक आवश्यकताएँ
                                                 पारदर्शिता, जवाबदेही सुनिश्चित करना और नैतिकता के अनुकरणीय मानकों को बनाए रखना। यह
                                                 ने प्रेरणादायक होते हुए वित्तीय क्षेत्र में संस्थान का एक आशावादी दृष्टिकोण तैयार किया है
                                                 शेयरधारकों के बीच विश्वास का उच्च स्तर';
                                                else:
                                                 echo   'The Bank fully embraces Corporate Governance in line with
                                                 the regulatory requirements by
                                                 ensuring transparency, accountability and maintaining exemplary standards of ethics. This
                                                 has created an optimistic outlook of the Institution in financial space while inspiring
                                                 higher levels of confidence amongst the shareholders';
                                                endif; ?></p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered" id="corporate_governancesLIST">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10px" scope="col"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'क्र.सं.';
                                                else:
                                                 echo   'S. No.';
                                                endif; ?>
                                            </th>
                                            <th class="text-center" width="400px" scope="col">
                                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'शीर्षक';
                                                 else:
                                                 echo   'Title';
                                                endif; ?></th>
                                            <th class="text-center" width="50px" scope="col">
                                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo   'डाउनलोड करना';
                                                else:
                                                 echo   'Download';
                                                endif; ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 data-translate="important-link mt-5 mb-5"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'महत्वपूर्ण लिंक';
                                                 else:
                                                 echo   'Important Links';
                                                endif; ?></h3>

                <div class="row">
                    <div class="co-lg-4 col-md-6 col-sm-12">
                        <div class="box-4 uniqueBoxes "><a class="sameheight" href="chief-grievance-officer"
                                title="Chief Grievance Officer" target="_blank"
                                style="height: 65.6px;"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य शिकायत अधिकारी';
                                                else:
                                                 echo   'Chief Grievance Officer';
                                                endif; ?></a></div>
                    </div>
                    <div class="co-lg-4 col-md-6 col-sm-12">
                        <div class="box-4 uniqueBoxes "><a class="sameheight" href="complaints"
                                title="Online Complaints / Grievance Redressal" target="_blank"
                               style="height: 65.6px;"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'ऑनलाइन शिकायतें/शिकायत निवारण';
                                                else:
                                                 echo   'Online Complaints/Grievance
                                                 Redressal';
                                                endif; ?></a></div>
                    </div>
                </div>
            </div>
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
        }

        function resetZoom() {
            currentZoom = 100;
            document.body.style.zoom = `${currentZoom}%`;
        }
        </script>
        <!-- User Download Popup form END -->
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
        require_once('public/footer.php');
        ?>

        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.dataTables.min.js">
        </script>
        <script
            src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive/js/dataTables.responsive.min.js">
        </script>
        <script
            src="<?php echo BASEPATH; ?>/public/integration/datatables.net-responsive-dt/js/responsive.dataTables.min.js">
        </script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.buttons.min.js">
        </script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.flash.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/jszip.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.html5.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/buttons.print.min.js"></script>
        <script src="<?php echo BASEPATH; ?>/public/integration/datatables.net-dt/js/dataTables.select.min.js"></script>

        <script>
       


        var dataTable = $('#corporate_governancesLIST').DataTable({
            //responsive: true,
            'ajax': '<?= BASEPATH; ?>engine/json/JSONcorporate_governances.php?show=frontend&language=' +
                localStorage.getItem('selectedLanguage'),
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
                    return '<a href="<?= SEOURL; ?>uploads/publicationreport/' + data +
                        '" title="Download" target="_blank"><img class="download-icon-blue" src="<?= SEOURL; ?>assets/front/images/cloud-download-blue.png" alt="Icon" /></a>';
                }
            }],
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });

        async function corporate_governancesDataTable(lang) {
            $.ajax({
                url: '<?= BASEPATH; ?>engine/json/JSONcorporate_governances.php?show=frontend&language=' +
                    lang, // Replace with your actual PHP file/function
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

        function switchLanguage(language) {
            const elementsToTranslate = document.querySelectorAll('[data-translate]');
            elementsToTranslate.forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[key] && translations[key][language]) {
                    element.textContent = translations[key][language];
                }
            });
            // Store the selected language in localStorage
            localStorage.setItem('selectedLanguage', language);
        }

        // Check if a language is stored in localStorage
        const storedLanguage = localStorage.getItem('selectedLanguage');
        if (storedLanguage) {
            // If a language is stored, switch to that language
            switchLanguage(storedLanguage);
        }

        // Add an event listener to a button that triggers the language switch
        document.getElementById('languageButton').addEventListener('click', function() {
            // Replace 'hi' with the desired language code (e.g., 'en' for English)
            switchLanguage('hi');
        });
        </script>
</body>

</html>