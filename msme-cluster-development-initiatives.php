<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>MSME Cluster Development Initiatives - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="assets/front/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link type="text/css" href="assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/front/css/font-awesome.css" />
    <link type="text/css" href="assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/navbar.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/responsive.css" rel="stylesheet" />
    <link type="text/css" href="assets/front/css/all-responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="assets/front/js/jquery-min.js"></script>
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
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1><?php if ($get_configured_lang == 'HI') :
                            echo   'एमएसएमई क्लस्टर विकास पहल';
                        else :
                            echo   'MSME Cluster Development Initiatives';
                        endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php if ($get_configured_lang == 'HI') :
                                                echo   'मुख्य पृष्ठ';
                                            else :
                                                echo   'Home';
                                            endif; ?></a></li>
                        <li><a class="active" href="javascript:void(0)"><?php if ($get_configured_lang == 'HI') :
                                                                            echo   'एमएसएमई क्लस्टर विकास पहल';
                                                                        else :
                                                                            echo   'MSME Cluster Development Initiatives';
                                                                        endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>


        <!-- Ubharte-Sitaare-details start -->
        <section class="mcdi_inner_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4><?php if ($get_configured_lang == 'HI') :
                                echo   'एमएसएमई क्लस्टर विकास पहल';
                            else :
                                echo   'MSME Cluster Development Initiatives';
                            endif; ?></h4>
                        <p><?php if ($get_configured_lang == 'HI') :
                                echo   'सिडबी अपने प्रत्यक्ष ऋण व्यवसाय के साथ-साथ प्रचार और विकास हस्तक्षेपों के माध्यम से क्लस्टरों में लगा हुआ है। ध्यान केंद्रित करने के लिए, सिडबी ने अब सॉफ्ट और हार्ड इन्फ्रा संरचना दोनों से क्लस्टर विकास में भाग लेने के लिए क्लस्टर डेवलपमेंट वर्टिकल की स्थापना की है। श्री यूके सिन्हा समिति की सिफारिशों के अनुरूप, SIDBI ने RBI के समर्थन से SIDBI क्लस्टर डेवलपमेंट फंड (SCDF) की स्थापना की है। एससीडीएफ एमएसएमई समूहों के विकास के लिए बुनियादी ढांचा तैयार करने के लिए राज्य सरकारों को सहायता प्रदान करेगा। ऋण के रूप में उक्त सहायता ग्रीनफील्ड (प्रेरित क्लस्टर) और ब्राउनफील्ड (मौजूदा क्लस्टर) एमएसएमई क्लस्टर दोनों के विकास के लिए राज्य सरकारों को दी जाएगी। नरम पक्ष के तहत, सिडबी समूहों में विषयगत जुड़ाव पर विचार करता है। निदान के अलावा, यह समूहों को उनके कौशल/पुनर्कुशलता, प्रौद्योगिकी, विपणन, ऋण सुविधा अंतराल आदि को संबोधित करने में सहायता करता है।';
                            else :
                                echo   'SIDBI has been engaged in clusters through its direct lending business as also through promotion and development interventions.For focused attention, SIDBI has now set up Cluster Development Vertical to attend to cluster development from both soft and hard infra structure. In line with Shri UK Sinha committee recommendations, SIDBI has set up SIDBI Cluster Development Fund (SCDF) with support from RBI. SCDF shall extend support to State Governments to create infrastructure towards development of MSME clusters. The said support in the form of loans shall be extended to State Governments for development of both greenfield (induced clusters) and brownfield (existing cluster) MSME Clusters. Under soft side, SIDBI considers thematic engagements in clusters. Besides diagnostics, it supports clusters in addressing its skilling/reskilling, technology, marketing, credit facilitation gaps etc.';
                            endif; ?></p>
                    </div>
                    <div class="d-flex col-md-6 col-sm-12">
                        <div class="ps_s">
                            <h4><?php if ($get_configured_lang == 'HI') :
                                    echo   'प्रकाशनों';
                                else :
                                    echo   'Publications';
                                endif; ?></h4>
                            <div class="pub_img">
                                <img src="assets/front/images/pub_img.jpg">
                            </div>
                            <div class="pub_c">
                                <ul>
                                    <li>
                                        <a class="registrationandDownloaddoc" onclick="showMSMEMODAL(1)" aria-hidden="true" data-documentid="form_100_100_index_custom" data-documentfile="msme_focus/SCDF Handbook_External Version II.pdf" data-modulename="MSME CLUSTER DEVELOPMENT INITIATIVES">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            <span data-translate="clusterdev"><?php if ($get_configured_lang == 'HI') :
                                                                                    echo   'चुनिंदा राज्यों में कठिन बुनियादी ढांचे के मुद्दों पर विकास दृष्टिकोण (#clusters4AatmaNibharभारत)';
                                                                                else :
                                                                                    echo   'Development Approach to Hard Infra Issues in Select States (#clusters4AatmaNibharBharat)';
                                                                                endif; ?></span>
                                        </a><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                        <a class="registrationandDownloaddoc" onclick="showMSMEMODAL(2)" aria-hidden="true" data-documentid="form_100_100_index_custom" data-documentfile="msme_focus/Takeaways from National Learnshop.pdf" data-modulename="MSME CLUSTER DEVELOPMENT INITIATIVES">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i> <span data-translate="cluster2"><?php if ($get_configured_lang == 'HI') :
                                                                                                                                        echo   'राज्यों के बीच बेहतर प्रथाओं को साझा करना नेशनल लर्नशॉप से ​​मुख्य बातें';
                                                                                                                                    else :
                                                                                                                                        echo   'Sharing Better Practices Amongst States Takeaways from National Learnshop';
                                                                                                                                    endif; ?> </span><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="registrationandDownloaddoc" onclick="showMSMEMODAL(3)" aria-hidden="true" data-documentid="form_100_100_index_custom" data-documentfile="msme_focus/#Clusters4Prosperity ver 2.pdf" data-modulename="MSME CLUSTER DEVELOPMENT INITIATIVES">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i><span data-translate="cluster3"> <?php if ($get_configured_lang == 'HI') :
                                                                                                                                        echo   '#cluster4prosperity - हस्तक्षेप के माध्यम से आगे का रास्ता तय करने वाले क्लस्टर की डायग्नोस्टिक मैपिंग';
                                                                                                                                    else :
                                                                                                                                        echo   '#cluster4prosperity - Diagnostic Mapping of cluster charting the path ahead through intervention';
                                                                                                                                    endif; ?></span><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- ./col-md-6 -->
                    <div class=" d-flex col-md-6 col-sm-12">
                        <div class="ps_s">
                            <h4 data-translate="cluster-title"><?php if ($get_configured_lang == 'HI') :
                                                                    echo   'सिडबी क्लस्टर विकास निधि';
                                                                else :
                                                                    echo   'SIDBI Cluster Development Fund';
                                                                endif; ?></h4>
                            <div class="pub_img">
                                <img src="assets/front/images/pub_img2.jpg">
                            </div>
                            <div class="pub_c scdf">
                                <ul>
                                    <li>
                                        <a class="registrationandDownloaddoc" onclick="showMSMEMODAL(4)" aria-hidden="true" data-documentid="form_100_100_index_custom" data-documentfile="msme_focus/SCDF Handbook_External Version II.pdf" data-modulename="MSME CLUSTER DEVELOPMENT INITIATIVES"><i class="fa fa-angle-right" aria-hidden="true"></i> <span data-translate="cluster4"><?php if ($get_configured_lang == 'HI') :
                                                                                                                                                                                                                                                                                                                                                                                                echo   'एमएसएमई क्लस्टर हितधारकों के लिए एससीडीएफ हैंडबुक संस्करण II';
                                                                                                                                                                                                                                                                                                                                                                                            else :
                                                                                                                                                                                                                                                                                                                                                                                                echo   'SCDF Handbook Version II for MSME Cluster Stakeholders';
                                                                                                                                                                                                                                                                                                                                                                                            endif; ?></span></a><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </li>
                                    <li>
                                        <a class="registrationandDownloaddoc" onclick="showMSMEMODAL(5)" aria-hidden="true" data-documentid="form_100_100_index_custom" data-documentfile="msme_focus/SCDF-FAQs-English.docx" data-modulename="MSME CLUSTER DEVELOPMENT INITIATIVES"><i class="fa fa-angle-right" aria-hidden="true"></i><span data-translate="cluster5"><?php if ($get_configured_lang == 'HI') :
                                                                                                                                                                                                                                                                                                                                                                                echo   'सिडबी क्लस्टर विकास निधि (एससीडीएफ) पर अक्सर पूछे जाने वाले प्रश्न';
                                                                                                                                                                                                                                                                                                                                                                            else :
                                                                                                                                                                                                                                                                                                                                                                                echo   'FAQs on SIDBI Cluster Development Fund (SCDF)';
                                                                                                                                                                                                                                                                                                                                                                            endif; ?></span></a><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- ./col-md-6 -->
                </div>
            </div>
        </section>

        <!-- User Download Popup form -->
        <div class="modal fade msme-cluster-development-popup default-form" id="showMSMECLUSTERMODALFORM" tabindex="-1" aria-labelledby="showMSMECLUSTERMODALFORMLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showMSMECLUSTERMODALFORMLabel">Fill in the form below to receive the product through your Email Id</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body receiving-msme-cluster-form-data">

                    </div>
                </div>
            </div>
        </div>

        <section class="logoSection">
            <div class="container">
                <div class="logoSlider">
                    <div class="swiper logoSliderInner">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamregistration.gov.in/Government-India/Ministry-MSME-registration.html" target="_blank" title="Udyam Registration"><img src="assets/front/images/logo1.jpg" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.jansamarth.in/home" target="_blank" title="National Portal ( Jan Samarth )"><img src="assets/front/images/logo2.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://msme.gov.in//" target="_blank" title="Ministry of Micro, Small and Medium Enterprises"><img src="assets/front/images/logo3.png" class="img-fluid w-100"></a></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://udyamimitra.in/" target="_blank" title="Udyami Mitra"><img src="assets/front/images/logo4.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.india.gov.in/" target="_blank" title="The National Portal of Indian"><img src="assets/front/images/logo5.png" class="img-fluid w-100"></a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ImgWrap"><a href="https://www.cvcunicurves.com/" target="_blank" title="Central Vigilance Commission"><img src="assets/front/images/logo6.jpg" class="img-fluid w-100"></a>
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

            function showMSMEMODAL(DOC_ID) {
                $('.receiving-msme-cluster-form-data').load('head/engine/ajax/ajax_msme_cluster_download_document.php?type=show_form&DOC_ID=' + DOC_ID + '', function() {
                    const container = document.getElementById("showMSMECLUSTERMODALFORM");
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
            $(".home-page-slider").trigger('refresh.owl.carousel');
        }

        function resetZoom() {
            currentZoom = 100;
            document.body.style.zoom = `${currentZoom}%`;
            $(".home-page-slider").trigger('refresh.owl.carousel');
        }
    </script>
    </div>

</body>

</html>