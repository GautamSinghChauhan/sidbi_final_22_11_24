<!-- Google tag (gtag.js) -->
<script async src=https://www.googletagmanager.com/gtag/js?id=G-YF7YJPYRR3></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());
gtag('config', 'G-YF7YJPYRR3');
</script>

<?php
$current_page = basename($_SERVER['PHP_SELF']);

// Function to check if the current page matches any of the given page names
function isPageActive($current_page, ...$pages)
{
    foreach ($pages as $page) {
        if ($page === $current_page) {
            return 'nav-active';
        }
    }
    return '';
}
?>

<header>
    <nav>
        <div class="container
                            main-nav-container
                            p-0">
            <div id="mainNav" class="mainNavigation">
                <div class="logo col-2">
                    <h1>
                        <a class="navbar-brand" href="index"><img src="<?= SEOURL; ?>assets/front/images/enhi.jpg"
                                title="Small Industries Development Bank of India"
                                alt="Small Industries Development Bank of India" width="163" height="60"
                                class="img-fluid mainLogo"></a>
                        <!-- <a class="navbar-brand" href="https://amritmahotsav.nic.in/" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/logo_azad1 1.png" title="Small Industries Development Bank of India" alt="Small Industries Development Bank of India" width="106" height="60" class="img-fluid amritLogo"></a>
                        <a class="navbar-brand" href="https://www.g20.org/en/" target="_blank"><img src="<?= SEOURL; ?>assets/front/images/G20_India_2023_logo 1.png" title="g20 logo" alt="g20 logo" width="100" height="53" class="img-fluid g20-logo"></a> -->
                    </h1>
                </div>
                <div class="MainMenu col-8 mx-0 px-0
                                d-flex
                                align-items-center justify-content-center
                                top-main">
                    <div class="sideBarBtn
                                nav-a-megamenu-burger">
                        <button class="hamburger">
                            <span>
                            </span>
                            <small class="menu-text">
                            </small>
                        </button>
                    </div>
                    <div class="menuPart
                                  cf">
                        <ul class="mainmenu">
                            <?php
                            $show_headermenu_datas = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title`, `seo_url` FROM `js_megamenu` WHERE `menu_for` = '2' AND `status`='1'  AND parent_id='0' and `deleted`='0'") or die("#1-UNABLE_TO_GETTING_DATAS:" . sqlERROR_LABEL());
                            $count_showHEDAER_datas = sqlNUMOFROW_LABEL($show_headermenu_datas);

                            if ($count_showHEDAER_datas > 0) :
                            while ($row = sqlFETCHARRAY_LABEL($show_headermenu_datas)) :
                                $menu_ID = $row["menu_ID"];
                                $menu_type =  $row["menu_type"];
                                $parent_id =  html_entity_decode($row["parent_id"]);
                                $menu_english_title =  html_entity_decode($row["menu_english_title"]);
                                $menu_hindi_title =  html_entity_decode($row["menu_hindi_title"]);
                                $seo_url =  html_entity_decode($row["seo_url"]);
                                //menu drop-down class
                                $newdropdown_a_tag = "MSME-loan";
                                    // Check if the URL starts with "https"
                                    if (strpos($seo_url, 'http') === 0) :
                                        $modified_main_href = $seo_url;
                                        $target = "target='_blank'";
                                    else :
                                        $modified_main_href = SEOURL . $seo_url;
                                        $target = '';
                                    endif;
                            ?>
                            <li class="<?php echo $newdropdown_a_tag; ?> d-none d-xl-block">
                                        <a href="<?= $modified_main_href; ?>" <?= $target; ?> class="nav-a-megamenu">
                                    <span>
                                    <?php if ($get_configured_lang == 'HI') :
                                        echo   $menu_hindi_title;
                                    else :
                                        echo   $menu_english_title;
                                    endif; ?>
                                    </span>
                                </a>

                                <?php
                                    //checking submenu - present or not
                                    if ($parent_id == 0) :
                                        $show_childmenu_datas = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title`, `seo_url` FROM `js_megamenu` WHERE `menu_for` = '2' AND parent_id='$menu_ID' AND `menu_type`='2' and `deleted`='0'") or die("#1-UNABLE_TO_GETTING_DATAS:" . sqlERROR_LABEL());
                                        $count_childmenu_datas = sqlNUMOFROW_LABEL($show_childmenu_datas);

                                        if ($count_childmenu_datas > 0) :
                                                
                                        ?>
                                <ul class="<?php echo $newdropdown_a_tag; ?>-content px-0">
                                    <?php
                                            
                                            while ($row = sqlFETCHARRAY_LABEL($show_childmenu_datas)) :
                                                $menu_ID = $row["menu_ID"];
                                                $parent_id = $row["parent_id"];
                                                $menu_for = $row["menu_for"];
                                                $menu_type =  $row["menu_type"];
                                                $menu_english_child_title =  html_entity_decode($row["menu_english_title"]);
                                                $menu_hindi_title =  html_entity_decode($row["menu_hindi_title"]);
                                                $seo_url =  html_entity_decode($row["seo_url"]);
												
												
                                                        // Check if the URL starts with "https"
                                                        if (strpos($seo_url, 'http') === 0) :
                                                            $modified_child_href = $seo_url;
                                                            $target = "target='_blank'";
                                                        else :
                                                            $modified_child_href = SEOURL . $seo_url;
                                                            $target = '';
                                                        endif;
                                        ?>
                                    <li>
                                                            <a href="<?= $modified_child_href; ?>" <?= $target; ?>>
                                    <span>
                                    <?php if ($get_configured_lang == 'HI') :
                                        echo   $menu_hindi_title;
                                    else :
                                        echo   $menu_english_child_title;
                                    endif; ?>
                                    </span>
                                </a>
                                    </li>
                                    <?php endwhile;?>
                                </ul>
                                <?php
                                        endif;
                                     endif; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <?php
                            endif;
                    ?>
                    </div>

                </div>
                <div class="search-and-language col-2 d-flex align-items-center justify-content-evenly px-0">

                    <div class="searchBar">
                        <div class="search-toggle">
                            <button class="search-icon
                                    icon-search">
                                <svg width="20" height="20" viewBox="0
                                      0
                                      20
                                      20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7049
                                        18.2881L16.8813
                                        15.4745C18.412
                                        13.5834
                                        19.1587
                                        11.1771
                                        18.9674
                                        8.75175C18.7762
                                        6.32637
                                        17.6616
                                        4.06684
                                        15.8534
                                        2.43908C14.0452
                                        0.811326
                                        11.6814
                                        -0.0605381
                                        9.24931
                                        0.00327078C6.81723
                                        0.0670797
                                        4.50236
                                        1.0617
                                        2.78203
                                        2.78203C1.0617
                                        4.50236
                                        0.0670797
                                        6.81723
                                        0.00327078
                                        9.24931C-0.0605381
                                        11.6814
                                        0.811326
                                        14.0452
                                        2.43908
                                        15.8534C4.06684
                                        17.6616
                                        6.32637
                                        18.7762
                                        8.75175
                                        18.9674C11.1771
                                        19.1587
                                        13.5834
                                        18.412
                                        15.4745
                                        16.8813L18.2881
                                        19.7049C18.3808
                                        19.7984
                                        18.4912
                                        19.8726
                                        18.6128
                                        19.9233C18.7344
                                        19.9739
                                        18.8648
                                        20
                                        18.9965
                                        20C19.1282
                                        20
                                        19.2586
                                        19.9739
                                        19.3802
                                        19.9233C19.5018
                                        19.8726
                                        19.6121
                                        19.7984
                                        19.7049
                                        19.7049C19.7984
                                        19.6121
                                        19.8726
                                        19.5018
                                        19.9233
                                        19.3802C19.9739
                                        19.2586
                                        20
                                        19.1282
                                        20
                                        18.9965C20
                                        18.8648
                                        19.9739
                                        18.7344
                                        19.9233
                                        18.6128C19.8726
                                        18.4912
                                        19.7984
                                        18.3808
                                        19.7049
                                        18.2881ZM2.03502
                                        9.51802C2.03502
                                        8.03802
                                        2.47389
                                        6.59126
                                        3.29613
                                        5.36069C4.11837
                                        4.13011
                                        5.28706
                                        3.171
                                        6.6544
                                        2.60463C8.02174
                                        2.03826
                                        9.52632
                                        1.89007
                                        10.9779
                                        2.1788C12.4294
                                        2.46753
                                        13.7628
                                        3.18022
                                        14.8093
                                        4.22674C15.8558
                                        5.27325
                                        16.5685
                                        6.6066
                                        16.8572
                                        8.05816C17.146
                                        9.50972
                                        16.9978
                                        11.0143
                                        16.4314
                                        12.3816C15.865
                                        13.749
                                        14.9059
                                        14.9177
                                        13.6753
                                        15.7399C12.4448
                                        16.5621
                                        10.998
                                        17.001
                                        9.51802
                                        17.001C7.5334
                                        17.001
                                        5.63007
                                        16.2126
                                        4.22674
                                        14.8093C2.8234
                                        13.406
                                        2.03502
                                        11.5026
                                        2.03502
                                        9.51802Z" fill="url(#paint0_linear_6_1036)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_6_1036" x1="1.75" y1="0" x2="28.1176" y2="0"
                                            gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#00B6F0" />
                                            <stop offset="0.333333" stop-color="#46C4B6" />
                                            <stop offset="1" stop-color="#D2DF43" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </button>
                            <button class="search-icon
                                    icon-close">
                                <i class="fa
                                      fa-fw
                                      fa-close" style="color:#000;">
                                </i>
                            </button>
                        </div>
                        <div class="search-container">
                            <form action="http://SIDBInew.php-staging.com/search">
                                <input type="text" name="q" id="search-terms" placeholder="Search
                                      terms..." />
                                <input type="submit" name="submit" value="Go" class="search-icon">
                            </form>
                        </div>
                    </div>
                    <div class="rightMenu px-1">
                        <select id="choose_lang" class="custom-select select-dropdown">
                            <?= get_LANG_LIST($get_configured_lang, 'select_option');
                            ?>
                        </select>
                    </div>
                    <div class="megamenu-font d-xl-block">
                        <a class="dropbtn"><img src="<?= SEOURL; ?>assets/front/images/megamenu_font.svg" alt=""></a>
                        <div class="megamenu-font-content">
                            <a href="javascript:void(0);" onclick="changeZoom('decrease')">A-</a>
                            <a href="javascript:void(0);" onclick="resetZoom()" class="megamenu-font-A">A</a>
                            <a href="javascript:void(0);" onclick="changeZoom('increase')">A+</a>
                        </div>
                    </div>
                </div>
            </div>
    </nav>
</header>
<section class="headerSideBar" id="headerSideBar">
    <div class="container-fluid
                          scrollbar">
        <div class="close-btn">
            <i class="fa
                              fa-times" aria-hidden="true">
            </i>
        </div>

        <div class="d-block
                            d-xl-flex
                            mx-5 flex-wrap
                            ">
            <?php
            $show_innerpages_datas = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title` FROM `js_megamenu` WHERE `menu_for` = '1' AND `menu_type`='1' and `deleted`='0'") or die("#1-UNABLE_TO_GETTING_DATAS:" . sqlERROR_LABEL());
            $count_show_innerpages_datas = sqlNUMOFROW_LABEL($show_innerpages_datas);

            if ($count_show_innerpages_datas > 0) :
                while ($row = sqlFETCHARRAY_LABEL($show_innerpages_datas)) :
                    $menu_ID = $row["menu_ID"];
                    $parent_id = $row["parent_id"];
                    $menu_for = $row["menu_for"];
                    $menu_type =  $row["menu_type"];
                    $menu_english_title =  html_entity_decode($row["menu_english_title"]);
                    $menu_hindi_title =  html_entity_decode($row["menu_hindi_title"]);
            ?>
            <div class="d-xl-flex col-xl-2 col-12
                              d-block flex-column about-mega-menu">
                <h6 class="megamenu-title" data-translate="about">
                <?php if ($get_configured_lang == 'HI') :
                                        echo   $menu_hindi_title;
                                    else :
                                        echo   $menu_english_title;
                                    endif; ?>
                </h6>
                <ul class="megamenu-custom-ul overlay-menu">
                    <?php
    $show_child_datas = sqlQUERY_LABEL("SELECT menu_ID, parent_id, menu_for, menu_type, menu_english_title, menu_hindi_title, seo_url FROM js_megamenu WHERE parent_id = '$menu_ID' AND menu_type='2' and deleted='0'") or die("#1-UNABLE_TO_GETTING_DATAS:" . sqlERROR_LABEL());
    $count_show_child_datas = sqlNUMOFROW_LABEL($show_child_datas);

    if ($count_show_child_datas > 0) :
        while ($row = sqlFETCHARRAY_LABEL($show_child_datas)) :
            $menu_english_title =  html_entity_decode($row["menu_english_title"]);
            $menu_hindi_title =  html_entity_decode($row["menu_hindi_title"]);
            $menu_seo_url =  html_entity_decode($row["seo_url"]);

            // Check if the URL starts with "https"
                                    if (strpos($menu_seo_url, 'http') === 0) :
                                        $modified_href = $menu_seo_url;
                                        $target = "target='_blank'";
                                    else :
                                        $modified_href = SEOURL . $menu_seo_url;
                                        $target = '';
                                    endif;
    ?>
                    <li>
                                        <a href="<?= $modified_href; ?>" <?= $target; ?>>
                            <span>
                            <?php if ($get_configured_lang == 'HI') :
                                        echo   $menu_hindi_title;
                                    else :
                                        echo   $menu_english_title;
                                    endif; ?>
                            </span>
                        </a>
                    </li>
                    <?php
        endwhile;
    else :
        echo ""; // No Data Found!!!
    endif;
    ?>
                </ul>

            </div>
            <?php endwhile;
            else :
                echo "No Data Found!!!";
            endif; ?>
        </div>
    </div>
</section>
<div class="top-bar">
    <div class="container
                          p-2
                          d-flex
                          justify-content-between">
        <div class="d-flex
                            align-items-center">
            <a href="https://wa.me/+918693033333?text=Hello%20there!" target="_blank">
                <div>
                    <a>
                        <svg class="top-whatsapp-icon" viewBox="0
                                  0
                                  20
                                  20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_6_963)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3875
                                      11.1691C12.009
                                      11.3238
                                      11.7672
                                      11.9164
                                      11.5219
                                      12.2191C11.3961
                                      12.3742
                                      11.2461
                                      12.3984
                                      11.0527
                                      12.3207C9.63204
                                      11.7547
                                      8.54298
                                      10.8066
                                      7.759
                                      9.49922C7.62618
                                      9.29648
                                      7.65001
                                      9.13633
                                      7.81017
                                      8.94805C8.04689
                                      8.66914
                                      8.34454
                                      8.35234
                                      8.40861
                                      7.97656C8.55079
                                      7.14531
                                      7.46408
                                      4.5668
                                      6.02892
                                      5.73516C1.89923
                                      9.10039
                                      12.918
                                      18.0258
                                      14.9067
                                      13.1984C15.4692
                                      11.8301
                                      13.0149
                                      10.9121
                                      12.3875
                                      11.1691ZM10
                                      18.2531C8.53947
                                      18.2531
                                      7.10236
                                      17.8648
                                      5.84415
                                      17.1297C5.6422
                                      17.0113
                                      5.39806
                                      16.9801
                                      5.17228
                                      17.0414L2.43829
                                      17.7918L3.39064
                                      15.6938C3.52033
                                      15.4082
                                      3.48712
                                      15.0758
                                      3.30392
                                      14.8219C2.28517
                                      13.4098
                                      1.7465
                                      11.7426
                                      1.7465
                                      10C1.7465
                                      5.44883
                                      5.44884
                                      1.74648
                                      10
                                      1.74648C14.5512
                                      1.74648
                                      18.2531
                                      5.44883
                                      18.2531
                                      10C18.2531
                                      14.5508
                                      14.5508
                                      18.2531
                                      10
                                      18.2531ZM10
                                      0C4.48595
                                      0
                                      1.29913e-05
                                      4.48594
                                      1.29913e-05
                                      10C1.29913e-05
                                      11.9398
                                      0.550794
                                      13.8027
                                      1.59728
                                      15.4195L0.078138
                                      18.7652C-0.0620964
                                      19.0742
                                      -0.0109245
                                      19.4359
                                      0.208607
                                      19.6934C0.377357
                                      19.8906
                                      0.621497
                                      20
                                      0.873451
                                      20C1.43673
                                      20
                                      4.50822
                                      19.0348
                                      5.28986
                                      18.8203C6.73478
                                      19.5934
                                      8.35548
                                      20
                                      10
                                      20C15.5137
                                      20
                                      20
                                      15.5137
                                      20
                                      10C20
                                      4.48594
                                      15.5137
                                      0
                                      10
                                      0Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_6_963">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="ms-2">
                    <a href="https://web.whatsapp.com/" style="text-decoration: none;" target="_blank"> <span
                            class="top-nav-contact">
                            +91 86930 33333
                        </span></a>
                </div>
            </a>
        </div>
        <div class="d-flex
                            align-items-center">
            <div>
                <a>
                    <svg class="top-whatsapp-icon" viewBox="0
                                  0
                                  20
                                  20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_6_1019)">
                            <path d="M10
                                      0.625C4.83032
                                      0.625
                                      0.625
                                      4.83063
                                      0.625
                                      10C0.625
                                      15.1694
                                      4.83032
                                      19.375
                                      10
                                      19.375C10.9723
                                      19.375
                                      11.6693
                                      19.1022
                                      12.0703
                                      18.5645C12.5549
                                      17.9144
                                      12.4579
                                      17.0926
                                      12.3077
                                      16.4764L13.2324
                                      16.1395C13.6237
                                      15.9973
                                      13.9368
                                      15.7101
                                      14.1132
                                      15.3314C14.2902
                                      14.9524
                                      14.3091
                                      14.5285
                                      14.1663
                                      14.137L13.5248
                                      12.3752C13.2397
                                      11.59
                                      12.3114
                                      11.1536
                                      11.5222
                                      11.4413L10.6415
                                      11.7618L9.35913
                                      8.23792L10.2399
                                      7.91718C11.0498
                                      7.62268
                                      11.4685
                                      6.72424
                                      11.1737
                                      5.91461L10.5322
                                      4.15283C10.2472
                                      3.367
                                      9.31885
                                      2.93121
                                      8.52966
                                      3.21899L7.06177
                                      3.75305C5.4425
                                      4.34235
                                      4.60449
                                      6.13892
                                      5.19348
                                      7.75848L7.75879
                                      14.8065C8.20618
                                      16.0358
                                      9.38904
                                      16.8619
                                      10.7013
                                      16.8619C10.8374
                                      16.8619
                                      10.9717
                                      16.8442
                                      11.1053
                                      16.8265C11.1884
                                      17.1872
                                      11.236
                                      17.5931
                                      11.0687
                                      17.8171C10.9204
                                      18.0154
                                      10.5408
                                      18.125
                                      10
                                      18.125C5.52002
                                      18.125
                                      1.875
                                      14.4803
                                      1.875
                                      10C1.875
                                      5.51971
                                      5.52002
                                      1.875
                                      10
                                      1.875C14.48
                                      1.875
                                      18.125
                                      5.51971
                                      18.125
                                      10C18.125
                                      12.7972
                                      16.7151
                                      15.3616
                                      14.353
                                      16.8597C14.0613
                                      17.0444
                                      13.9746
                                      17.4307
                                      14.1595
                                      17.7222C14.3445
                                      18.0142
                                      14.7314
                                      18.0997
                                      15.022
                                      17.915C17.7478
                                      16.1865
                                      19.375
                                      13.2275
                                      19.375
                                      10C19.375
                                      4.83063
                                      15.1697
                                      0.625
                                      10
                                      0.625ZM8.93311
                                      14.379L6.3678
                                      7.33124C6.0144
                                      6.35956
                                      6.51733
                                      5.28137
                                      7.48901
                                      4.92767L8.95691
                                      4.39331C8.99109
                                      4.3811
                                      9.02649
                                      4.37469
                                      9.06189
                                      4.37469C9.17175
                                      4.37469
                                      9.30603
                                      4.43848
                                      9.35791
                                      4.58038L9.99939
                                      6.34216C10.0574
                                      6.50146
                                      9.97192
                                      6.68488
                                      9.81262
                                      6.74255L8.34412
                                      7.27692C8.18848
                                      7.33368
                                      8.06152
                                      7.44995
                                      7.99133
                                      7.6001C7.92114
                                      7.75055
                                      7.91382
                                      7.92236
                                      7.97058
                                      8.078L9.68079
                                      12.7765C9.73755
                                      12.9324
                                      9.85352
                                      13.0594
                                      10.0037
                                      13.1293C10.1538
                                      13.1995
                                      10.3253
                                      13.2068
                                      10.4816
                                      13.15L11.9495
                                      12.6157C12.0886
                                      12.5656
                                      12.2815
                                      12.6151
                                      12.3505
                                      12.8027L12.9919
                                      14.5645C13.0298
                                      14.6692
                                      13.0011
                                      14.7589
                                      12.9803
                                      14.8032C12.9596
                                      14.8471
                                      12.9095
                                      14.9271
                                      12.8052
                                      14.9649L11.4661
                                      15.4526C11.4343
                                      15.4565
                                      11.4026
                                      15.451
                                      11.3708
                                      15.4599C11.3251
                                      15.473
                                      11.2891
                                      15.5011
                                      11.2488
                                      15.5231C11.0706
                                      15.5783
                                      10.8875
                                      15.6119
                                      10.7013
                                      15.6119C9.91211
                                      15.6119
                                      9.20166
                                      15.1163
                                      8.93311
                                      14.379Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_6_1019">
                                <rect width="20" height="20" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <div class="ms-2">
                <span class="top-nav-contact" data-translate="toll">
                <?php  if($get_configured_lang == 'HI'): 
                                                 echo  'टोल फ्री नंबर: 180-022-6753
                                                 ';
                                                else:
                                                 echo  'Toll Free Number: 180-022-6753';
                                                endif; ?> 
                </span>
            </div>
        </div>
    </div>
</div>


<!-- <script>
$(document).ready(function() {
    // Function to close the headerSideBar section
    function closeHeaderSideBar() {
        $('#headerSideBar').removeClass('active');
    }

    // Click event for mega menu links
    $('.megamenu-custom-ul a').on('click', function(e) {
        e.preventDefault();
        var targetSection = $($(this).attr('href'));
        if (targetSection.length) {
            // Close the headerSideBar section
            closeHeaderSideBar();

            // If the link is for the same page anchor, scroll to the section
            if (this.pathname === window.location.pathname) {
                $('html, body').animate({
                    scrollTop: targetSection.offset().top
                }, 1000);
            }
        }
    });

    // Click event for closing the menu on other menu items
    $('.megamenu-custom-ul a').not('.megamenu-custom-ul.overlay-menu a').on('click', function() {
        closeHeaderSideBar();
    });

    // Click event for the close button
    $('.close-btn').on('click', function() {
        closeHeaderSideBar();
    });
});
</script> -->
<script>
$(document).ready(function() {
    $('.about-mega-menu a').on('click', function() {
        $(".headerSideBar").removeClass('active');
        $(".hamburger").removeClass('active');
        $(".menu-btn a").toggleClass('btn-open').toggleClass('btn-close');
    });

    //LANGUAGE CONVERSION
    $('#choose_lang').on('change', function() {
        //    var lang1= document.getElementById('choose_lang').value;
        var lang = $(this).val();
        $.ajax({
            type: "POST",
                url: '<?= SEOURL; ?>/head/engine/ajax/ajax_set_language.php', //url to file
            data: {
                val: lang
            },
            success: function(data) {
                location.reload();
            }
        });
    });
        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            var search = $('#search-terms').val();
            $.ajax({
                type: "POST",
                url: './head/engine/ajax/ajax_search_page.php?type=search',
                data: {
                    val: search
                },
                success: function(data) {
                    // Parse the JSON data received from the server
                    result = JSON.parse(data);
                    console.log(result);
                    // Check if the response field exists in the JSON object
                    if (result.response) {
                        // Redirect to the URL specified in the response field
                        window.location.href = result.response;
                    } else if (result.error) {
                        // Alert the error message if the error field exists
                        console.error(result.error);
                    }
                }
});
        });
    });
</script>