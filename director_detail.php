<!-- updated : 1:30 PM  | 30-12-23 -->
<?php
require_once('head/jackus.php');
$id= $_GET['boardofdirector_ID'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Shri Sudatta Mandal - Small Industries Development Bank of India</title>
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
                $list_transaction = sqlQUERY_LABEL("SELECT `boardofdirector_ID`, `director_image`, `director_name`, `director_name_hindi`, `director_shortdescription`, `director_shortdescription_hindi`, `director_description`, `director_description_hindi`,  `status` FROM `js_boardofdirector` where deleted = '0' and `status` = '1' and `boardofdirector_ID` = $id ") or die("Unable to get records:" . sqlERROR_LABEL());
                while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                    $director_attachement = $row["director_image"];
                    $director_name = $row["director_name"];
                    $director_description = $row["director_description"];
                    $director_shortdescription = $row["director_shortdescription"];
                    $director_name_hindi = $row["director_name_hindi"];
                    $director_description_hindi = $row["director_description_hindi"];
                    $director_shortdescription_hindi = $row["director_shortdescription_hindi"];
                 

                ?>
        <?php require_once('public/header.php') ?>
        <section class="about-us-banner" data-aos="fade-down" style="background: url('assets/front/images/Inner\ Banenr\(1\).png') no-repeat center center / cover;">
            <div class="container">
                <div class="inner">
                    <h1 data-translate="directorNAME"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $director_name_hindi;
                                                else:
                                                 echo   $director_name;
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="../index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a href="../about#board-directors"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'निदेशक';
                                                else:
                                                 echo   'Directors';
                                                endif; ?></a></li>
                        <li><a class="active" href="2.html" ><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $director_name_hindi;
                                                else:
                                                 echo   $director_name;
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="speakers">
    
            <div class="container">
                <div class="speakers-inner">
                    <div class="d-flex flex-wrap">
                        <div class="speakers-image text-center userp" data-aos="fade-right" style="display: block;">
                            <div class="borad-profile-user">
                                <img class="img-thumbnail" src="<?= 'head/uploads/director_documents/' . $director_attachement; ?>" alt="Shri Sudatta Manda">

                            </div>
                        </div>
                        <div class="speakers-info" data-aos="fade-left">
                            <h2 data-translate="directorNAME"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $director_name_hindi;
                                                else:
                                                 echo   $director_name;
                                                endif; ?></h2>
                            <div class="center-block-sec content profile-block-content mCustomScrollbar _mCS_2 mCS_no_scrollbar" style="height:250px;">
                                <div id="mCSB_2" tabindex="0">
                                    <div id="mCSB_2_container" style="position:relative; top:0; left:0;" dir="ltr">
                                        <p>
                                        <p data-translate="content1"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   $director_description_hindi;
                                                else:
                                                 echo   $director_description;
                                                endif; ?></p>
                                        </p>
                                    </div>
                                    <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;">
                                        <a href="#" class="mCSB_buttonUp" oncontextmenu="return false;"></a>
                                        <div class="mCSB_draggerContainer">
                                            <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;" oncontextmenu="return false;">
                                                <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                                <div class="mCSB_draggerRail"></div>
                                            </div>
                                        </div>
                                        <a href="#" class="mCSB_buttonDown" oncontextmenu="return false;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php endwhile; ?>
    </div>
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


        <?php require_once('public/footer.php'); ?>

        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/bootstrap-v5-0-2.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/functions.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/swiper-bundle.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/fancybox.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/customScroll.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/general.js"></script>

        <script src="<?= SEOURL; ?>assets/plugins/jsencrypt.min.js"></script>
        <script src="<?= SEOURL; ?>assets/plugins/emailvalidate.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js" asp-append-version="true"></script>-->
      <script>

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
            $('#exampleModal').on('hidden.bs.modal', function(e) {
                $(this)
                    .find("input,textarea,select")
                    .val('')
                    .end()
                    .find("input[type=checkbox], input[type=radio]")
                    .prop("checked", "")
                    .end();

                $('#exampleModal').bootstrapValidator('resetForm', true);
            });

            function refreshcaptcha() {
                time = Date.now();
                document.getElementById('captcha').src = '/admin/ajax/generateCaptcha?' + time;
            }

            $(document).ready(function() {

                $('#occupation').change(function() {
                    if ($('#occupation').val() == 'Others, please specify') {
                        $('#userdownloads_otherocc_field').show();
                    } else {
                        $('#userdownloads_otherocc_field').hide();
                    }
                });

                $('#frmuserdownloads').bootstrapValidator().on('success.form.bv', function(e) {
                    e.preventDefault();

                    submitRegistrationForm();
                    //var content = $('#pwd').val();
                    //var encrypt = new JSEncrypt();
                    //encrypt.setKey(publicKey);
                    //var encoded = encrypt.encrypt(content);
                    //document.frmlogin.action = "/login";
                    //document.getElementById('frmuserdownloads').submit();
                });
            });

            $(".registrationandDownloaddoc").click(function() {
                $("#documentfile_name").remove();
                $("#documentfile_modulename").remove();
                $('#frmuserdownloads').append(
                    "<input type='hidden' name='documentfile' id='documentfile_name' value='" + $(this).attr(
                        "data-documentfile") + "' />");
                $('#frmuserdownloads').append(
                    "<input type='hidden' name='documentmodulename' id='documentfile_modulename' value='" + $(this)
                    .attr("data-modulename") + "' />");
                //console.log($(this).attr("data-documentid"));
                download_id = $(this).attr("data-documentid");
            });

            function submitRegistrationForm() {
                var setpath = $(location).attr('hostname');
                /*if(setpath == 'SIDBI.in')
                {
                    var redurl = 'http://SIDBI.in/';
                }
                else{
                    var redurl = 'http://www.SIDBI.in/';
                }*/

                var registrationData = $('#frmuserdownloads').serializeArray();
                registrationData.push({
                    name: 'download_id',
                    value: download_id
                });
                var para = download_id.split('_');
                if (para[3] == 'Structural') {
                    //var redirect = redurl+'en/Articles/download/'+para[1]+'/'+para[2]+'/'+para[3];
                    var redirect = 'index';
                } else {
                    if (!para[4]) {
                        var redirect = '/publication-and-reports-download';
                        //var redirect = redurl+'en/PublicationAndReports/download/'+para[1]+'/'+para[2]+'/'+para[3];
                    } else {
                        var redirect = '/publication-and-reports-download';
                        //var redirect = redurl+'en/PublicationAndReports/download/'+para[1]+'/'+para[2]+'/'+para[3]+'/'+para[4];
                    }
                }

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-Token': $('[name="_csrfToken"]').val()
                    },
                    url: redirect,
                    data: registrationData,
                    success: function(response) {
                        var response = JSON.parse(response);
                        if (response.status == 'success') {
                            alert(response.message);
                            $("#exampleModal").modal('hide');
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
                // }
            }
        </script>


</body>

</html>