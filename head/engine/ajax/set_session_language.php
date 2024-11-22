<?php

/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2010-2023 Touchmark Descience Pvt Ltd
*
*/

include_once('../../jackus.php');

// Start the session
session_start();

// Retrieve the selected language from the POST data
$get_configured_lang = $_POST['get_configured_lang'];

// Set the language in the session
$_SESSION['get_lang'] = $get_configured_lang;

$response = [];

foreach ($_POST['types'] as $type) :

    if ($type == 'get_unlock_growth_response') :

        $data .= '<div class="d-flex justify-content-center gap-4 section-icons container-row">';

        $list_transactions = sqlQUERY_LABEL("SELECT `growth_id`, `unlockgrowth_heading`, `unlockgrowth_heading_hindi`, `unlockgrowth_title`, `unlockgrowth_hindi_title`, `unlockgrowth_image`,`status` FROM `unlock_growth` where `deleted` = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
        $counts = sqlNUMOFROW_LABEL($list_transactions);
        while ($row = sqlFETCHARRAY_LABEL($list_transactions)) :
            $growth_id = $row["growth_id"];
            $unlockgrowth_heading = $row["unlockgrowth_heading"];
            $unlockgrowth_heading_hindi = $row["unlockgrowth_heading_hindi"];
            $unlockgrowth_hindi_title = $row["unlockgrowth_hindi_title"];
            $unlockgrowth_image = $row["unlockgrowth_image"];
            $unlockgrowth_title = $row["unlockgrowth_title"];

            if ($get_configured_lang == 'hi') :
                $return_title = $unlockgrowth_hindi_title;
            else :
                $return_title = $unlockgrowth_title;
            endif;

            $data .= '<div class="my-1">
                    <div class="growth-content box">
                        <span class="d-flex align-items-center">
                            <div class="growth-header">
                                <img src="<?= SEOURL; ?>assets/front/home/' . $unlockgrowth_image . '" class="growth-image" alt="growth Image">
                            </div>
                            <div class="">
                                <h3 class="growth-content-head">' . $return_title . '</h3>
                            </div>
                        </span>
                    </div>
                </div>';
        endwhile;
        $data .= '</div>';

        $responses[] = array("type" => "get_unlock_growth_response", "unlock_growth_data" => $data);
    endif;

    if ($_GET['type'] == 'home_banner') :

        $data .= '<div class="owl-carousel owl-theme home-page-slider" id="home-page-slider">';

        $list_transaction = sqlQUERY_LABEL("SELECT `home_id`, `home_title`, `home_title_hindi`, `home_description`, `home_description_hindi`, `home_image`, `home_toll_number`, `home_whatsapp_number`, `home_button1`, `home_button2`, `status`  FROM `home` where `deleted` = '0' and `status` = '1'") or die("Unable to get records:" . sqlERROR_LABEL());
        while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
            $home_image = $row["home_image"];
            $home_title = $row["home_title"];
            $home_title_hindi = $row["home_title_hindi"];
            $home_description = $row["home_description"];
            $home_description_hindi = $row["home_description_hindi"];
            $home_toll_number = $row["home_toll_number"];
            $home_whatsapp_number = $row["home_whatsapp_number"];
            $home_button1 = $row["home_button1"];
            $home_button2 = $row["home_button2"];

            $data .= '<div class="item ">
                    <div class="active background-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-xl-6 custom-card-image">
                                        <figure class="overlay-image-white-bg"><img src="assets/front/home/' . $home_image . '" alt="Overlay Image" class="img-fluid banner-slider"></figure>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-xl-6 d-flex align-items-center custom-card-paragraph">
                                        <div class="quick-content-main">
                                            <div class="quik-content">
                                                <div class="">
                                                    <h1 class="text-center slider-section-title">' . $home_title . '</h1>
                                                    <p class="slider-section-para text-center">' . $home_description . '</p>
                                                    <div class="banner-buttons">
                                                        <a href="https://onlineloanappl.SIDBI.in/OnlineApplication/" class="apply-now" target="_blank" data-translate="apply">Apply
                                                            Now</a>
                                                        <a href="<?= $home_button2 ?>" class="know-button ms-3" data-translate="know">Know More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        endwhile;
        $data .= '</div>';
        $responses[] .= array("type" => "home_banner", "home_banner_data" => $data);
    endif;
endforeach;

$result = [$responses];

echo json_encode($result);