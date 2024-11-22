<?php
require_once('head/jackus.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Financialreport - Small Industries Development Bank of India</title>
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

    <style>
        @keyframes blink {
            0% {
                opacity: 1.0;
            }

            50% {
                opacity: 0.0;
            }

            100% {
                opacity: 1.0;
            }
        }

        .blinking {
            animation: blink 1s infinite;
            color: red;
            /* Add this line to set the text color to red */
        }
    </style>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php
        require_once('public/header.php');
        ?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner%20Banenr.jpg') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1 data-translate="financial">Financial report</h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="<?= SEOURL; ?>index" data-translate="home">Home</a></li>
                        <li><a class="active" href="<?= SEOURL; ?>financialreport.php" data-translate="financial">Financial Report</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="press-releases">
            <div class="container">
                <div class="inner">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="title-content bold-title with-underline green">
                            <h2 class="mb-0" data-translate="financial">Financial Report</h2>
                        </div>
                        <!-- <div class="button-form">
                            <div class="">
                                <a href="financial-reportarchived.php" class="btn btn-outline-success" role="button"><span data-translate="viewarchived">View Archived</span> <i class="fa fa-angle-right ms-2"></i></a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="financialreportLIST">
                            <thead>
                                <tr>
                                    <th class="text-center" width="65px" scope="col" data-translate="sno">S. No.</th>
                                    <th class="text-center" width="400px" scope="col" data-translate="title">Title</th>
                                    <th class="text-center" width="100px" scope="col" data-translate="date">Date</th>
                                    <th class="text-center" width="50px" scope="col" data-translate="english">English</th>
                                    <th class="text-center" width="50px" scope="col" data-translate="hindi">Hindi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </section>
    <section class="logoSection">
        <div class="container">
            <div class="logoSlider">
                <div class="swiper logoSliderInner">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="<?= SEOURL; ?>assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="<?= SEOURL; ?>assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="<?= SEOURL; ?>assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
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
        const translations = {
            'financial': {
                'en': 'Financial Report',
                'hi': 'वित्तीय रिपोर्ट'
            },
            'date': {
                'en': 'Date',
                'hi': 'तारीख'
            },
            'tenders': {
                'en': 'Tenders',
                'hi': 'निविदाएँ'
            }, //footer header
            'contact': {
                'en': 'Contact Us',
                'hi': 'हम से संपर्क करें'
            },
            'address': {
                'en': '15, Ashok Marg, Lucknow - 226001, Uttar Pradesh',
                'hi': '15, अशोक मार्ग, लखनऊ - 226001, उत्तर प्रदेश'
            },
            'customer': {
                'en': 'Contact Us',
                'hi': 'ग्राहक देखभाल'
            },
            'reports': {
                'en': 'Publication And Reports',
                'hi': 'प्रकाशन और रिपोर्ट'
            },
            'agencies': {
                'en': 'Multilateral Agencies',
                'hi': 'बहुपक्षीय एजेंसियाँ'
            },
            'press': {
                'en': 'Press Releases',
                'hi': 'प्रेस प्रकाशनी'
            },
            'reserve': {
                'en': 'Reservation Roster',
                'hi': 'प्रकाशन एवं रिपोर्ट'
            },
            'about': {
                'en': 'About us',
                'hi': 'हमारे बारे में'
            },
            'retiree': {
                'en': 'Retiree Portal',
                'hi': 'सेवानिवृत्त पोर्टल'
            },
            'rti': {
                'en': 'RTI Cell',
                'hi': 'सूचना का अधिकार कक्ष'
            },
            'circular': {
                'en': 'circulars',
                'hi': 'परिपत्र'
            },
            'terms': {
                'en': 'Terms & Conditions',
                'hi': 'नियम एवं शर्तें'
            },
            'privacy': {
                'en': 'Privacy Policy',
                'hi': 'गोपनीयता नीति'
            },
            'copyright-policy': {
                'en': 'Copyright Policy',
                'hi': 'कॉपीराइट नीति'
            },
            'hyperlink': {
                'en': 'Hyperlink Policy',
                'hi': 'हाइपरलिंक नीति'
            },
            'accessibility': {
                'en': 'Accessibility',
                'hi': 'सरल उपयोग'
            },
            'disclaimer': {
                'en': 'Disclaimer',
                'hi': 'अस्वीकरण'
            },
            'sitemap': {
                'en': 'Sitemap',
                'hi': 'साइट मैप'
            },
            'copyright': {
                'en': 'Copyright © 2023 Small Industries Development Bank of India(SIDBI). All rights reserved',
                'hi': 'कॉपीराइट © 2023 भारतीय लघु उद्योग विकास बैंक (सिडबी)। सभी अधिकार सुरक्षित'
            },
            'home': {
                'en': 'Home',
                'hi': 'होम'
            },
            'loan': {
                'en': 'Loans',
                'hi': 'ऋण'
            },
            'msme': {
                'en': 'MSME Loans',
                'hi': 'एमएसएमई ऋण'
            },
            'institute': {
                'en': 'Institutional Finance',
                'hi': 'संस्थागत वित्त'
            },
            'prayaas': {
                'en': 'PRAYAAS',
                'hi': 'प्रयास'
            },

            'promotion': {
                'en': 'Promotional Initiatives',
                'hi': 'संवर्धनात्मक पहल'
            },
            'ecosystem': {
                'en': 'Ecosystem',
                'hi': 'पारितंत्र'
            },
            'subs': {
                'en': 'Subsidiary Network',
                'hi': 'सहायक नेटवर्क'
            },
            'fund': {
                'en': 'Fund of Funds',
                'hi': 'निधियों का कोष'
            },
            'enquiry': {
                'en': 'Enquire Now',
                'hi': 'अब शिकायत दर्ज करें'
            },
            'toll': {
                'en': 'Toll Free Number: 180-022-6753',
                'hi': 'टोल फ्री नंबर: 180-022-6753'
            }, //megamenu
            'overview1': {
                'en': 'Overview',
                'hi': 'परिचय'
            },
            'misvis': {
                'en': 'Mission & Vision',
                'hi': 'मिशन & विज़न'
            },
            'board1': {
                'en': 'Board Of Directors',
                'hi': 'निदेशक मण्डल'
            },
            'evolution1': {
                'en': 'Evolution Of SIDBI',
                'hi': 'सिडबी का प्रादुर्भाव'
            },
            'historical1': {
                'en': 'Historical Journey',
                'hi': 'ऐतिहासिक यात्रा'
            },
            'organization1': {
                'en': 'Organization Chart',
                'hi': 'संगठन चार्ट'
            },
            'loans1': {
                'en': 'Loans For MSMEs',
                'hi': 'एमएसएमई के लिए ऋण'
            },
            'msme1': {
                'en': 'MSME Loans',
                'hi': 'एमएसएमई ऋण'
            },
            'prayaas1': {
                'en': 'PRAYAAS',
                'hi': 'प्रयास'
            },
            'treds2': {
                'en': 'TReDS',
                'hi': 'ट्रेड्स'
            },
            'cluster1': {
                'en': 'Cluster Development Initiatives',
                'hi': 'क्लस्टर विकास पहल'
            },
            'customer1': {
                'en': 'Customer Portal',
                'hi': 'ग्राहक पोर्टल'
            },
            'other1': {
                'en': 'Other Loan Products',
                'hi': 'अन्य ऋण उत्पाद'
            },
            'institutional1': {
                'en': 'Institutional Finance',
                'hi': 'संस्थागत वित्त'
            },
            'refinance1': {
                'en': 'Refinance To Banks',
                'hi': 'बैंकों को पुनर्वित्त'
            },
            'lending1': {
                'en': 'Lending To NBFCs',
                'hi': 'गैर बैंकिंग वित्त कंपनियों को उधार देना'
            },
            'mfi1': {
                'en': 'Lending To MFIs',
                'hi': 'सूक्ष्म वित्त संस्थाओं को उधार देना'
            },
            'government1': {
                'en': 'Government Programmes',
                'hi': 'सरकारी कार्यक्रम'
            },
            'vishwakarma1': {
                'en': 'PM Vishwakarma Scheme',
                'hi': 'प्रधान मंत्री विश्वकर्मा योजना'
            },
            'svanidhi1': {
                'en': 'PM SVANidhi Scheme',
                'hi': 'प्रधान मंत्री स्वनिधि योजना'
            },
            'scheme1': {
                'en': 'PLI Schemes',
                'hi': 'पीएलआई योजनाएं'
            },
            'otherscheme1': {
                'en': 'Other Schemes',
                'hi': 'अन्य योजनाएँ'
            },
            'corporate1': {
                'en': 'Corporate Governance',
                'hi': 'नैगम अभिशासन'
            },
            'information1': {
                'en': 'Information/Policies',
                'hi': 'जानकारी/नीतियाँ'
            },
            'listiong1': {
                'en': 'Listing Disclosure',
                'hi': 'सूचीबद्धकरण प्रकटीकरण'
            },
            'chief1': {
                'en': 'Chief Grievance Officer/Grievance Redressal Officer For PWD',
                'hi': 'मुख्य व्यथा अधिकारी/ पीड्व्ल्यूडी के लिए व्यथा निवारण अधिकारी'
            },
            'complaints1': {
                'en': 'Complaints/ Grievance Redressal',
                'hi': 'शिकायतें/ व्यथा निवारण'
            },
            'reports1': {
                'en': 'Financial Reports',
                'hi': 'वित्तीय रिपोर्टें'
            },
            'impact1': {
                'en': 'Impact Initiatives',
                'hi': 'प्रभाव पहल'
            },
            'gst1': {
                'en': 'GST Sahay',
                'hi': 'जीएसटी सहाय'
            },
            'fitrank1': {
                'en': 'FIT Rank',
                'hi': 'एफआईटी रैंक'
            },
            'udyam1': {
                'en': 'Udyam Assist Platform',
                'hi': 'उद्यम असिस्ट प्लेटफार्म'
            },
            'jocata1': {
                'en': 'Jocata Sumpoorn',
                'hi': 'जोकाटा सम्पूर्ण'
            },
            'knowledge1': {
                'en': 'Knowledge Products',
                'hi': 'ज्ञान उत्पाद'
            },
            'msmepulse1': {
                'en': 'MSME Pulse',
                'hi': 'एमएसएमई पल्स'
            },
            'microfinanace1': {
                'en': 'Microfinance Pulse',
                'hi': 'माइक्रोफाइनेंस पल्स'
            },
            'fintech1': {
                'en': 'Fintech Pulse',
                'hi': 'फिनटेक पल्स'
            },
            'spex1': {
                'en': 'SPex The Green Pulse',
                'hi': 'स्पेक्स दि ग्रीन पल्स'
            },
            'investor1': {
                'en': 'Investor Relations',
                'hi': 'निवेशक संबंध'
            },
            'fixed1': {
                'en': 'Fixed Deposit Scheme',
                'hi': 'सावधि जमा योजना'
            },
            'details1': {
                'en': 'Details Of Debenture Trustees',
                'hi': 'डिबेंचर ट्रस्टियों का विवरण'
            },
            'media1': {
                'en': 'Media',
                'hi': 'मिडिया'
            },
            'social1': {
                'en': 'Social Media',
                'hi': 'सामाजिक मीडिया'
            },
            'gallery1': {
                'en': 'Galleries',
                'hi': 'गैलरी'
            },
            'events1': {
                'en': 'Events',
                'hi': 'घटनाएँ'
            },
            'workwith1': {
                'en': 'Work with us',
                'hi': 'हमारे साथ कार्य करें'
            },
            'career1': {
                'en': 'Career',
                'hi': 'कैरियर'
            },
            'join1': {
                'en': 'Join Us As CCCs',
                'hi': 'सीसीसी के रूप में हमसे जुड़ें'
            },
            'others2': {
                'en': 'Others',
                'hi': 'अन्य'
            },
            'poverty1': {
                'en': 'Poverty Interventions',
                'hi': 'गरीबी हस्तक्षेप'
            },
            'visitapp': {
                'en': 'Visit App',
                'hi': 'ऐप पर जाएं'
            },
            'tenders': {
                'en': 'Tenders',
                'hi': 'निविदाओं'
            },
            'sno': {
                'en': 'S. No.',
                'hi': 'क्र.सं.'
            },
            'viewarchived': {
                'en': 'View Archived',
                'hi': 'संग्रहीत देखें'
            },
            'title': {
                'en': 'Title',
                'hi': 'शीर्षक'
            },
            'tenderdate': {
                'en': 'Tender Date',
                'hi': 'निविदा तिथि'
            },
            'lastdateofsubmission': {
                'en': 'Last Date Of Submission',
                'hi': 'जमा करने की अंतिम तिथि'
            },
            'remark': {
                'en': 'Remark',
                'hi': 'टिप्पणी'
            }
        };

		
		var dataTable = $('#financialreportLIST').DataTable({
			  //responsive: true,
			  'ajax': '<?= BASEPATH; ?>engine/json/JSONfinancialreport.php?show=frontend&language='+ localStorage.getItem('selectedLanguage'),
			"lengthChange": true,
			"pageLength": 5,  // Number of items per page
			"lengthMenu": [5, 10, 25],
			  "columns": [{
				  "data": "count" //0
				},
				{
				  "data": "financial_report_title" //1
				},
				{
				  "data": "financial_report_date" //2
				},
				{
				  "data": "eng_documents" //3
				},
				{
				  "data": "hin_documents" //4
				},
				
			  ],
			  "columnDefs": [{
				  "targets": 0,
				  "data": "count",
				  "searchable": false
				}, 
				{
				  "targets": 3,
				  "data": "eng_documents",
				  "searchable": false,
				  "render": function(data, type, row) {
					return '<a href="<?= SEOURL; ?>uploads/financialreport/'+ data +'" target="_blank" title="Financial-results_30_09_23_Hindi.pdf"><i class="fa fa-file-pdf-o"></i></a>';
				  }
				},
				{
				  "targets": 4,
				  "data": "hin_documents",
				  "searchable": false,
				  "render": function(data, type, row) {
					return '  <a href="<?= SEOURL; ?>uploads/financialreport/'+ data +'" target="_blank" title="Financial-results_30_09_23_Hindi.pdf"><i class="fa fa-file-pdf-o"></i></a>';
				  }
				}
			  ],
			  language: {
				searchPlaceholder: 'Search...',
				sSearch: '',
				lengthMenu: '_MENU_ items/page',
			  }
			});
		
		async function financialreportDataTable(lang) {
			$.ajax({
                url: '<?= BASEPATH; ?>engine/json/JSONfinancialreport.php?show=frontend&language='+ lang, // Replace with your actual PHP file/function
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
            document.getElementById('changeLanguage').value = language;
			
			// Call the asynchronous function inside an IIFE (Immediately Invoked Function Expression)
			(async () => {
				await financialreportDataTable(language);
			})();
        }

        // Check if a language is stored in localStorage
        const storedLanguage = localStorage.getItem('selectedLanguage');
        if (storedLanguage) {
            // If a language is stored, switch to that language
            switchLanguage(storedLanguage);
        }
	</script>

</body>
</html>