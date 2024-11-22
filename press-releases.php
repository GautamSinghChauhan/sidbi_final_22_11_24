<?php
require_once('head/jackus.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Press Releases - Small Industries Development Bank of India</title>
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
                    <h1 > <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 प्रेस प्रकाशनी
                                                 ';
                                                else:
                                                 echo 'Press Releases';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="<?= SEOURL; ?>index">   <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo 'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="<?= SEOURL; ?>pressreleases" >  <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 प्रेस प्रकाशनी
                                                 ';
                                                else:
                                                 echo 'Press Releases';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="press-releases">
            <div class="container">
                <div class="inner">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="title-content bold-title with-underline green">
                            <h2 class="mb-0"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 प्रेस प्रकाशनी
                                                 ';
                                                else:
                                                 echo 'Press Releases';
                                                endif; ?></h2>
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
                        <table class="table table-bordered" id="pressreleaseLIST">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px" scope="col"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्र.सं.
                                                 ';
                                                else:
                                                 echo 'S. No.';
                                                endif; ?></th>
                                    <th class="text-center" width="400px" scope="col"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?></th>
                                    <th class="text-center" width="50px" scope="col"> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 तारीख
                                                 ';
                                                else:
                                                 echo 'Date';
                                                endif; ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
    </section>
   
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
      

		
		var dataTable = $('#pressreleaseLIST').DataTable({
			  //responsive: true,
			  'ajax': '<?= BASEPATH; ?>engine/json/JSONpressrelease.php?show=frontend&language='+ localStorage.getItem('selectedLanguage'),
			"lengthChange": true,
			"pageLength": 5,  // Number of items per page
			"lengthMenu": [5, 10, 25, 50],
			  "columns": [{
				  "data": "count" //0
				},
				{
				  "data": "title" //1
				},
				{
				  "data": "pressrelease_date" //2
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
					return '<a href="pressrelease-doc.php?id='+row.modify+'">' + data + '</a>';
				  }
				}
			  ],
			  language: {
				searchPlaceholder: 'Search...',
				sSearch: '',
				lengthMenu: '_MENU_ items/page',
			  }
			});
		
		async function pressreleaseDataTable(lang) {
			$.ajax({
                url: '<?= BASEPATH; ?>engine/json/JSONpressrelease.php?show=frontend&language='+ lang, // Replace with your actual PHP file/function
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

</body>
</html>