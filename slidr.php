<!-- updated : 1:00 PM  | 30-12-23 -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Direct Loans - Small Industries Development Bank of India</title>
    <link rel="shortcut icon" href="<?= SEOURL; ?>assets/front/images/favicon.ico" />
       <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-family.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/bootstrap-v5-0-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= SEOURL; ?>assets/front/css/font-awesome.css" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/swiper-bundle.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/aos.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/style.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/fancybox.min.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/customScroll.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/responsive.css" rel="stylesheet" />
    <link type="text/css" href="<?= SEOURL; ?>assets/front/css/all-responsive.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery-min.js"></script>
       <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.carousel.min.css" rel="stylesheet" />
      <link type="text/css" href="<?= SEOURL; ?>assets/front/css/owl.theme.default.min.css" rel="stylesheet" />
    <style>
        .owl-next span {
            display: none;
        }

        .owl-prev span {
            display: none;
        }

        /* Add your custom styles here */

        #imageCarousel {
            position: relative;
        }

        .overlay-image {
            /* width: 50% !important; */
            /* Adjust the width as needed */
            height: 100%;
            object-fit: cover;
            /* Adjust the opacity as needed */
        }

        .section-two {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            margin: 0;
            background: url('assets/front/images/second_sec_bg.png') center/cover no-repeat;
        }

        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .centered-container p {
            margin-bottom: 0;
            font-size: 20px;
            font-weight: 500;
        }

        .unlock {
            font-size: 35px;
            font-weight: 700;
        }

        .section-three {
            padding-left: 180px;
            padding-top: 100px
        }

        .section-content {
            /* padding-right: 150px; */
            padding-top: 300px
        }

        .section-subcontent {
            font-size: 18px;
            font-weight: 500;
        }

        .know-more {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 16px;
            color: #fff;
            font-weight: 500;
        }

        .man-content {
            position: relative;
            overflow: hidden;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, #00B6F0 0%, #D2DF43 100%);

            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .man-content:hover .overlay {
            opacity: 1;
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .overlay h5,
        .overlay p {
            margin: 0;
            padding: 10px;
            text-align: start;
        }


        .card-know-more {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 30px;
            padding-left: 30px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            color: #fff;
            border: none;
            border-radius: 30px;
            /* Adjust the border-radius for rounded corners */
            cursor: pointer;
            /* transition: background-color 0.3s ease, color 0.3s ease; */
        }

        .card-know-more:hover {
            background-color: #000;
            color: #fff;
        }


        .background-container {
            background-image: url('assets/front/images/banner_2.png');
            background-size: cover;
            /* Adjust as needed */
            background-position: center;
            /* Adjust as needed */
            height: 50vh;
            /* width: 100%; */
            margin-left: -50 !important;
            /* Adjust as needed */
        }

        .quik-content {
            padding-top: 150px;
        }

        .apply-now {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: none;
            background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
            font-size: 16px;
            color: #fff;
            font-weight: 500;
        }

        .know-button {
            border-radius: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left: 20px;
            border: 1px solid #000;
            background: none;
            font-size: 16px;
            color: #000;
            font-weight: 500;
        }

        .banner-buttons {
            display: flex;
            justify-content: center;
        }

        .swapping-card {
            /* padding-top: 40px; */
            padding-right: 120px;
            padding-left: 120px;
            background: url('assets/front/images/banner_2.png') center/cover no-repeat;

        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Two columns with equal width */
            gap: 10px;
            padding: 150px;
            /* Adjust the gap between items */
        }

        /* Apply specific styling to the first column of the first row */
        .grid-item-1-1 {
            grid-row: 1;
            grid-column: 1;
            height: 20vh;
            /* margin-top: -70px; */
        }

        /* Apply specific styling to the second column of the first row */
        .grid-item-1-2 {
            grid-row: 1;
            grid-column: 2;
            height: 200px;
            /* margin-top: -100px; */
            /* Adjust the height as needed */
        }

        /* Apply specific styling to the first column of the second row */
        .grid-item-2-1 {
            grid-row: 2;
            grid-column: 1;
            height: 200px;
            /* Adjust the height as needed */
        }

        /* Apply specific styling to the second column of the second row */
        .grid-item-2-2 {
            grid-row: 2;
            grid-column: 2;
        }

        /* Apply styling to the images to ensure they fill their containers */
        .grid-images {
            width: 100%;
            /* height: 100%; */
            object-fit: cover;
            /* Ensure the entire image is visible without stretching */
        }

        .large-image1 {
            border-radius: 15px;
            margin-top: -85px;
        }

        .small-image1 {
            height: 100px;
        }

        .owl-theme .owl-dots {
            position: fixed;
            top: 378px;
            right: 21%;
        }

        .owl-dot.active span {
            background: #00B6F0 !important;
        }

        .owl-theme .owl-dots .owl-dot.active span {
            width: 9px !important;
            height: 9px !important;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background: #00B6F0 !important;

        }

        .owl-theme .owl-dots .owl-dot span {
            width: 13px !important;
            height: 13px !important;
            border: 1px solid #00B6F0;
            background: none !important;
        }
    </style>
</head>

<body>

    <div class="">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <div class="active background-container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" class="overlay-image" alt="Overlay Image">
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="quik-content">
                                    <h1 class="text-center">Require MSME Loan?</h1>
                                    <p>Quick Sanctions</p>
                                    <div class="banner-buttons">
                                        <button class="apply-now">Apply Now</button>
                                        <button class="know-button ms-3">Know More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="active background-container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" class="overlay-image" alt="Overlay Image">
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="quik-content">
                                    <h1 class="text-center">Require MSME Loan?</h1>
                                    <p>Quick Sanctions</p>
                                    <div class="banner-buttons">
                                        <button class="apply-now">Apply Now</button>
                                        <button class="know-button ms-3">Know More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="active background-container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" class="overlay-image" alt="Overlay Image">
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="quik-content">
                                    <h1 class="text-center">Require MSME Loan?</h1>
                                    <p>Quick Sanctions</p>
                                    <div class="banner-buttons">
                                        <button class="apply-now">Apply Now</button>
                                        <button class="know-button ms-3">Know More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="active background-container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" class="overlay-image" alt="Overlay Image">
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="quik-content">
                                    <h1 class="text-center">Require MSME Loan?</h1>
                                    <p>Quick Sanctions</p>
                                    <div class="banner-buttons">
                                        <button class="apply-now">Apply Now</button>
                                        <button class="know-button ms-3">Know More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="active background-container">

                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= SEOURL; ?>assets/front/images/banner_1.png" class="overlay-image" alt="Overlay Image">
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="quik-content">
                                    <h1 class="text-center">Require MSME Loan?</h1>
                                    <p>Quick Sanctions</p>
                                    <div class="banner-buttons">
                                        <button class="apply-now">Apply Now</button>
                                        <button class="know-button ms-3">Know More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>


          <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/jquery.min.js"></script>
          <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/bootstrap-v5-0-2.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/plugins/bootstrapvalidator/bootstrapValidator.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/functions.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/swiper-bundle.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/fancybox.min.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/customScroll.js"></script>
        <script type="text/javascript" src="<?= SEOURL; ?>assets/front/js/general.js"></script>
        <!-- Add this at the end of your HTML, just before the closing </body> tag -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <script src="<?= SEOURL; ?>assets/plugins/jsencrypt.min.js"></script>
        <script src="<?= SEOURL; ?>assets/plugins/emailvalidate.js"></script>
        <script>
            $(function() {
                // Owl Carousel
                var owl = $(".owl-carousel");
                owl.owlCarousel({
                    items: 1,
                    margin: 30,
                    padding:10,
                    loop: true,
                    nav: true,
                    autoplay: true
                });
            });
        </script>
</body>

</html>