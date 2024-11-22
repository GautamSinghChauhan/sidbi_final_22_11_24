<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title data-translate="visit-app-title">Visit App - Small Industries Development Bank of India</title>
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

    <!-- Add this in the head section of your HTML -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->

    <style>
    .visitAppImage {
        /* box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; */
        /* box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px; */
        /* box-shadow: 0px 10px -14px 14px #FFF; */
        /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    }

    .visitAppImage:hover {
        /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: scale(1.1, 1.1);
        transition-duration: .25s;
        transition-timing-function: ease-in-out;
    }
    </style>
</head>

<body class="main-wrapper-en">
    <?php require_once('public/header.php'); ?>
    <div class="container-fluid p-sm-5 card-banner container-header" data-aos="fade-up" data-aos-duration="2000">

        <div class="justify-content-center text-center">
            <h2 class="text-9">Get the app</h2>
            <p class="text-center mb-4">Click here to download on the Apple Store and Play Store.</p>
            <a class="d-inline-flex mx-3 my-3 visitAppImage"
                href="https://apps.apple.com/us/app/sidbi-visit/id6464369956" target="_blank"><img alt="" width="168"
                    height="49" src="<?= SEOURL; ?>assets/front/images/app-store.png" class="img-fluid w-100">
            </a>
            <a class="d-inline-flex mx-3 my-3 visitAppImage"
                href="https://play.google.com/store/apps/details?id=com.sidbivisit&pli=1" target="_blank"><img alt=""
                    width="166" height="49" src="<?= SEOURL; ?>assets/front/images/google-play-store.png"
                    class="img-fluid w-100">
            </a>
        </div>

    </div>
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/aos.js"></script>
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

    <script>
    const translations = {
        'visit-app-title': {
            'en': 'Visit App - Small Industries Development Bank of India',
            'hi': 'ऐप पर जाएँ - भारतीय लघु उद्योग विकास बैंक'
        },
        'apply-now': {
            'en': 'Apply Now',
            'hi': 'अभी अप्लाई करें'
        },
        'know-more': {
            'en': 'Know More',
            'hi': 'अधिक जानते हैं'
        },
        'machinery-loan': {
            'en': 'Machinery Loan',
            'hi': 'मशीनरी ऋण'
        },
        'green-finance-loan': {
            'en': 'Green Finance Loan',
            'hi': 'हरित वित्त ऋण'
        },
        'project-loan': {
            'en': 'Project Loan',
            'hi': 'परियोजना ऋण'
        },
        'working-capital': {
            'en': 'Working Capital',
            'hi': 'कार्यशील पूंजी'
        },
        'prayaas': {
            'en': 'PRAYAAS',
            'hi': 'प्रयास'
        },
        'fund-of-funds': {
            'en': 'Fund of Funds for Startup',
            'hi': 'स्टार्टअप के लिए फंड का फंड'
        },
        'impact-initiatives': {
            'en': 'Impact Initiatives',
            'hi': 'प्रभाव पहल'
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
            'en': 'Financials Reports',
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