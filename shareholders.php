<?php
require_once('head/jackus.php');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>shareholder - Small Industries Development Bank of India</title>
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
                    <h1 data-translate="share1"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'शेयरहोल्डर';
                                                else:
                                                 echo   'Shareholder';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="<?= SEOURL; ?>index" data-translate="home"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'मुख्य पृष्ठ';
                                                else:
                                                 echo   'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="<?= SEOURL; ?>shareholder.php" data-translate="share1"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'शेयरहोल्डर';
                                                else:
                                                 echo   'Shareholder';
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
                            <h2 class="mb-0" data-translate="share1"><?php  if($get_configured_lang == 'HI'): 
                                                 echo   'शेयरहोल्डर';
                                                else:
                                                 echo   'Shareholder';
                                                endif; ?></h2>
                            <p style="font-size: 23px;" data-translate="sharecon"><b>Shareholding Pattern of SIDBI (As on May 4, 2022)</b></p>
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
                        <table class="table table-bordered" id="shareholderLIST">
                            <thead>
                                <tr>
                                    <th class="text-center" width="50px" scope="col" data-translate="serial1">S. No.</th>
                                    <th class="text-center" width="500px" scope="col" data-translate="sharename">Name Of The Shareholder</th>
                                    <th class="text-center" width="100px" scope="col" data-translate="shareheld">No Of Shares Held</th>
                                    <th class="text-center" width="100px" scope="col" data-translate="sharehold">% Of Holding</th>
                                  
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
     
        

		
		var dataTable = $('#shareholderLIST').DataTable({
			  //responsive: true,
          
		  'ajax': '<?= BASEPATH; ?>engine/json/JSONshareholder.php?show=frontend&language='+ localStorage.getItem('selectedLanguage'),
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
				  "data": "no_of_shares_held" //2
				},
				{
				  "data": "holding_percentage" //3
				},
			
				
			  ],
			  "columnDefs": [{
				  "targets": 0,
				  "data": "count",
				  "searchable": false
				}, 
                {
                    "targets": 1,
                    "data": "title",
                    "searchable": false,
                    "render": function(data, type, row) {
                        return data;
                    }
                }, 
			
			  ],
			  language: {
				searchPlaceholder: 'Search...',
				sSearch: '',
				lengthMenu: '_MENU_ items/page',
			  }
			});
		
		async function shareholderDataTable(lang) {
			$.ajax({
                url: '<?= BASEPATH; ?>engine/json/JSONshareholder.php?show=frontend&language='+ lang, // Replace with your actual PHP file/function
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