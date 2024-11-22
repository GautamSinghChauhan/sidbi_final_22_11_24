<?php
// if ($currentpage == 'pressrelease.php' || $currentpage == 'presscoverage.php'|| $currentpage == 'photogallery.php' || $currentpage == 'clarifications.php' ) :
//     $active_about = "active";
// endif;


if ($currentpage == 'dashboard.php') :
    $active_home = "active";
endif;


if ($currentpage == 'tender.php') :
    $active_tender = "active";
endif;

if ($currentpage == 'cpios.php') :
    $active_tender = "active";
endif;

if ($currentpage == 'financialreport.php') :
    $active_tender = "active";
endif;

if ($currentpage == 'manus.php') :
    $active_menus = "active";
endif;

if ($currentpage == 'innerpage.php') :
    $active_innerpages = "active";
endif;

if ($currentpage == 'home.php') :
    $active_innerpages = "active";
endif;

if ($currentpage == 'home-product.php') :
    $active_innerpages = "active";
endif;

if ($currentpage == 'welcomebanner.php') :
    $active_home_menu = "active";
endif;



/////////////////////////////////////////////////////////////////////////////////////////

//about
if ($currentpage == 'overview.php?route=edit' || $currentpage == 'missionandvision.php?route=edit' || $currentpage == 'boardofdirector.php' || $currentpage == 'history.php' || $currentpage == 'roleandsidbi.php?route=edit' || $currentpage == 'shareholderabout.php?route=edit' || $currentpage == 'organizationchart.php') :
    $active_about = "active";
endif;

//home
if ($currectpage == 'home.php' || $currentpage == 'growth.php' || $currentpage == 'msmecluster_content.php?route=edit'  || $currentpage == 'impactinitiatives_content.php'  || $currentpage == 'home-product.php'   || $currentpage == 'growthproduct.php'   || $currentpage == 'machinerybanner.php?route=edit'  || $currentpage == 'machineryproduct.php' || $currentpage == 'machinerytest.php' || $currentpage == 'machineryother.php'  || $currentpage == 'projectbanner.php?route=edit'  || $currentpage == 'projectproduct.php' || $currentpage == 'projecttest.php' || $currentpage == 'projectother.php' || $currentpage == 'greenbanner.php?route=edit'  || $currentpage == 'greenproduct.php' || $currentpage == 'greentest.php' || $currentpage == 'greenother.php' || $currentpage == 'workingbanner.php?route=edit'  || $currentpage == 'workingproduct.php' || $currentpage == 'workingtest.php' || $currentpage == 'workingother.php') :
    $active_home = "active";
endif;
//list
if ($currectpage == 'tender.php' || $currentpage == 'pressrelease.php' || $currentpage == 'career.php'  || $currentpage == 'publication_report.php'  || $currentpage == 'announcements.php'   || $currentpage == 'coca_reports.php'   || $currentpage == 'reservation_roster.php'  || $currentpage == 'other_loans.php' || $currentpage == 'shareholder.php' || $currentpage == 'annual_reports.php' || $currentpage == 'corporate_governances.php'  || $currentpage == 'investor_grievances.php') :
    $active_list = "active";
endif;
//list
if ($currectpage == 'enquiries.php' || $currentpage == 'grievances.php' ) :
    $active_form = "active";
endif;


//corporate
if ($currentpage == 'complaints' || $currentpage == 'listingdisclosures.php' || $currentpage == 'chiefgrievanceofficer.php' || $currentpage == 'informationpolicies.php') :
    $active_corporate = "active";
endif;

// media
if ($currentpage == 'prayaas.php?route=edit' || $currentpage == 'institutionalfinance.php?route=edit' || $currentpage == 'government.php?route=edit' || $currentpage == 'cheifgrievances.php?route=edit' || $currentpage == 'media_presscoverage.php'  || $currentpage == 'fixedscheme.php?route=edit' || $currentpage == 'fixedscheme.php?route=edit' || $currentpage == 'debenture.php?route=edit'  || $currentpage == 'joinus.php?route=edit'  || $currentpage == 'ecosystem.php?route=edit'  || $currentpage == 'subsidiary.php'  || $currentpage == 'environmental.php?route=edit'  || $currentpage == 'psrf.php?route=edit' || $currentpage == 'aboutpsig.php?route=edit'  || $currentpage == 'psigkey.php?route=edit'  || $currentpage == 'psigfinance.php?route=edit'  || $currentpage == 'genderfinance.php?route=edit'  || $currentpage == 'psigother.php?route=edit'  || $currentpage == 'listofpartners.php?route=edit'   || $currentpage == 'psigcontact.php?route=edit'   || $currentpage == 'rightinformation.php?route=edit'  || $currentpage == 'informationunder.php'  || $currentpage == 'appellate.php?route=edit'   || $currentpage == 'informationcost.php?route=edit'   || $currentpage == 'consultancy.php?route=edit'   || $currentpage == 'thirdparty.php?route=edit') :
    $active_media = "active";
endif;

//menus
if ($currentpage == 'megamenus.php' || $currentpage == 'header.php' || $currentpage == 'footer.php') :
    $active_menus = "active";
endif;

// contactus
if ($currentpage == 'contactus_enquiry.php' || $currentpage == 'contactus_sidbinews.php' || $currentpage == 'contactus_socialmedia.php' || $currentpage == 'contactus_videosphotos.php' || $currentpage == 'contactus_presscoverage.php') :
    $active_contactus = "active";
endif;

// general
if ($currentpage == 'general_header.php' || $currentpage == 'general_footer.php' || $currentpage == 'general_socialmedia.php' || $currentpage == 'general_mainmenu.php' || $currentpage == 'general_master.php' || $currentpage == 'general_disclaimer') :
    $active_general = "active";
endif;

// configuration
if ($currentpage == 'configuration_sitesetting.php' || $currentpage == 'configuration_emailconfiguration.php' || $currentpage == 'configuration_rolepermission.php' || $currentpage == 'configuration_pagemenu.php' || $currentpage == 'configuration_logout.php' || $currentpage == 'configuration_disclaimer') :
    $active_configuration = "active";
endif;

/////////////////////////////////////////////////////////////////////////////////////////

if ($currentpage == 'circulars.php') :
    $active_circulars = "active";
endif;

if ($currentpage == 'dashboard.php') :
    $active_dashboard = "active";
endif;

if ($currentpage == 'enquiries.php') :
    $active_enquiryform = "active";
endif;

if ($currentpage == 'grievances.php') :
    $active_grievances = "active";
endif;

if ($currentpage == 'pagemenu.php' ||  $currentpage == 'rolepermission.php') : $active_settings = "active";
endif;
?>

<header class="navbar navbar-header navbar-header-fixed">
    <a href="" id="mainMenuOpen" class="burger-menu"><i data-feather="menu"></i></a>
    <div class="navbar-brand">
        <!-- <a href="dashboard.php" class="df-logo">SIDBI &nbsp;<b><i> CMS</i> <sub class="text-warning">v1.0</sub></b></a> -->
        <a href="./index" class="aside-logo mt-1"><img src="public/img/enhi.jpg" class="img-fluid" alt="enquiry" width="100">
            <!-- <span class="mt-5">SIDBI</span></a> -->
    </div>
    <!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
            <div class="aside-header">
                <a href="./index" class="aside-logo mt-1"><img src="public/img/enhi.jpg" class="img-fluid" alt="enquiry" width="100">
                    <!-- <a href="./index" class="aside-logo"><img src="public/img/logo.png" alt="enquiry" width="50"> -->
                    <span class="mt-5">SIDBI</span></a>
                <a href="" class="aside-menu-link">
                    <i data-feather="menu"></i>
                    <i data-feather="x"></i>
                </a>
            </div>
            <!-- <a href="dashboard.php" class="df-logo">SIDBI</a>
            <a id="mainMenuClose" href=""><i data-feather="x"></i></a> -->
        </div>
        <!-- navbar-menu-header -->
        <ul class="nav navbar-menu">

            <?php
            $home_page_ID = checkmenu('List Home');
            $growth_page_ID = checkmenu('List Growth');
            $msme_cluster_page_ID = checkmenu('Edit MSME Cluster');
            $impactinitiatives_content_page_ID = checkmenu('List Impact Initiatives');
            $homeproduct_content_page_ID = checkmenu('List Home Product');
            $growthproduct_content_page_ID = checkmenu('List Growth Product');
            $machinerybanner_content_page_ID = checkmenu('Edit Machinery Banner');
            $machineryproduct_content_page_ID = checkmenu('List Machinery Product');
            $machinerytest_content_page_ID = checkmenu('List Machinery Testimonials');
            $machineryother_content_page_ID = checkmenu('List Machinery Other');
            $projectbanner_content_page_ID = checkmenu('Edit Project Banner');
            $projectproduct_content_page_ID = checkmenu('List Project Product');
            $projecttest_content_page_ID = checkmenu('List Project Testimonials');
            $projectother_content_page_ID = checkmenu('List Project Other');
            $greenbanner_content_page_ID = checkmenu('Edit Green Banner');
            $greenproduct_content_page_ID = checkmenu('List Green Product');
            $greentest_content_page_ID = checkmenu('List Green Testimonials');
            $greenother_content_page_ID = checkmenu('List Green Other');
            $workingbanner_content_page_ID = checkmenu('Edit Working Banner');
            $workingproduct_content_page_ID = checkmenu('List Working Product');
            $workingtest_content_page_ID = checkmenu('List Working Testimonials');
            $workingother_content_page_ID = checkmenu('List Working Other');

            if (($home_page_ID != '' && checkrolemenu($home_page_ID, $logged_user_level)) || ($growth_page_ID != '' && checkrolemenu($growth_page_ID, $logged_user_level)) || ($msme_cluster_page_ID != '' && checkrolemenu($msme_cluster_page_ID, $logged_user_level)) || ($impactinitiatives_content_page_ID != '' && checkrolemenu($impactinitiatives_content_page_ID, $logged_user_level))) : ?>
                <li class="nav-item with-sub <?= $active_home; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="home"></i> Home </a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                                <li class="nav-label <?= $active_home; ?>">All Home Setup</li>
                                <?php
                                if ($home_page_ID != '' && checkrolemenu($home_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="home.php" class="nav-sub-link"><i data-feather="home"></i> Home </a></li>
                                <?php endif; ?>
                                <?php
                                if ($growth_page_ID != '' && checkrolemenu($growth_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="growth.php" class="nav-sub-link"><i data-feather="trending-up"></i> Growth </a></li>
                                <?php endif; ?>
                                <?php
                                if ($msme_cluster_page_ID != '' && checkrolemenu($msme_cluster_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="msmecluster_content.php" class="nav-sub-link"><i data-feather="layers"></i> MSME Cluster </a></li>
                                <?php endif; ?>
                                <?php
                                if ($impactinitiatives_content_page_ID != '' && checkrolemenu($impactinitiatives_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="impactinitiatives_content.php" class="nav-sub-link"><i data-feather="box"></i> Impact Initiatives </a></li>
                                <?php endif; ?>
                                <li class="nav-label mg-t-20 <?= $active_home; ?>">Project</li>
                                <?php
                                if ($projectbanner_content_page_ID != '' && checkrolemenu($projectbanner_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="projectbanner.php" class="nav-sub-link"><i data-feather="home"></i> Banner </a></li>
                                <?php endif; ?>
                                <?php
                                if ($projectproduct_content_page_ID != '' && checkrolemenu($projectproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="projectproduct.php" class="nav-sub-link"><i data-feather="box"></i>Product</a></li>
                                <?php endif; ?>
                                <?php
                                if ($projecttest_content_page_ID != '' && checkrolemenu($projecttest_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="projecttest.php" class="nav-sub-link"><i data-feather="disc"></i> Testimonials </a></li>
                                <?php endif; ?>
                                <?php
                                if ($projectother_content_page_ID != '' && checkrolemenu($projectother_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="projectother.php" class="nav-sub-link"><i data-feather="x-square"></i> Other </a></li>
                                <?php endif; ?>
                            </ul>
                            <ul>

                                <li class="nav-label  <?= $active_home; ?>">Working</li>
                                <?php
                                if ($workingbanner_content_page_ID != '' && checkrolemenu($workingbanner_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="workingbanner.php" class="nav-sub-link"><i data-feather="home"></i> Banner </a></li>
                                <?php endif; ?>
                                <?php
                                if ($workingproduct_content_page_ID != '' && checkrolemenu($workingproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="workingproduct.php" class="nav-sub-link"><i data-feather="box"></i>Product</a></li>
                                <?php endif; ?>
                                <?php
                                if ($workingtest_content_page_ID != '' && checkrolemenu($workingtest_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="workingtest.php" class="nav-sub-link"><i data-feather="disc"></i> Testimonials </a></li>
                                <?php endif; ?>
                                <?php
                                if ($workingother_content_page_ID != '' && checkrolemenu($workingother_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="workingother.php" class="nav-sub-link"><i data-feather="x-square"></i> Other </a></li>
                                <?php endif; ?>
                                <li class="nav-label mg-t-20 <?= $active_home; ?>">Green</li>
                                <?php
                                if ($greenbanner_content_page_ID != '' && checkrolemenu($greenbanner_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="greenbanner.php" class="nav-sub-link"><i data-feather="home"></i> Banner </a></li>
                                <?php endif; ?>
                                <?php
                                if ($greenproduct_content_page_ID != '' && checkrolemenu($greenproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="greenproduct.php" class="nav-sub-link"><i data-feather="box"></i>Product</a></li>
                                <?php endif; ?>
                                <?php
                                if ($greentest_content_page_ID != '' && checkrolemenu($greentest_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="greentest.php" class="nav-sub-link"><i data-feather="disc"></i> Testimonials </a></li>
                                <?php endif; ?>
                                <?php
                                if ($greenother_content_page_ID != '' && checkrolemenu($greenother_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="greenother.php" class="nav-sub-link"><i data-feather="x-square"></i> Other </a></li>
                                <?php endif; ?>
                            </ul>
                            <ul>
                                <li class="nav-label <?= $active_home; ?>">Machinery</li>
                                <?php
                                if ($machinerybanner_content_page_ID != '' && checkrolemenu($machinerybanner_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="machinerybanner.php" class="nav-sub-link"><i data-feather="home"></i> Banner </a></li>
                                <?php endif; ?>
                                <?php
                                if ($machineryproduct_content_page_ID != '' && checkrolemenu($machineryproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="machineryproduct.php" class="nav-sub-link"><i data-feather="box"></i>Product</a></li>
                                <?php endif; ?>
                                <?php
                                if ($machinerytest_content_page_ID != '' && checkrolemenu($machinerytest_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="machinerytest.php" class="nav-sub-link"><i data-feather="disc"></i> Testimonials </a></li>
                                <?php endif; ?>
                                <?php
                                if ($machineryother_content_page_ID != '' && checkrolemenu($machineryother_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="machineryother.php" class="nav-sub-link"><i data-feather="x-square"></i> Other </a></li>
                                <?php endif; ?>
                                <li class="nav-label mg-t-20<?= $active_home; ?>">Product</li>
                                <?php
                                if ($homeproduct_content_page_ID != '' && checkrolemenu($homeproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="homeproduct.php" class="nav-sub-link"><i data-feather="home"></i> Home Product </a></li>
                                <?php endif; ?>
                                <?php
                                if ($growthproduct_content_page_ID != '' && checkrolemenu($growthproduct_content_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home; ?>"> <a href="growthproduct.php" class="nav-sub-link"><i data-feather="trending-up"></i> Growth Product</a></li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <?php
            $tender_page_ID = checkmenu('List Tender');
            $career_page_ID = checkmenu('List Career');
            $pressrelease_page_ID = checkmenu('List Pressrelease');
            $publication_report_page_ID = checkmenu('List Publication Report');
            $announcements_page_ID = checkmenu('List Announcements');
            $financialreport_page_ID = checkmenu('List Financialreport');
            $coca_reports_page_ID = checkmenu('List Coca Reports');
            $reservation_roster_page_ID = checkmenu('List Reservation Roster');
            $other_loans_page_ID = checkmenu('List Other Loans');
            $shareholder_page_ID = checkmenu('List Shareholder');
            $annual_reports_page_ID = checkmenu('List Annual Reports');
            $corporate_governances_page_ID = checkmenu('List Corporate Governances');
            $investor_grievances_page_ID = checkmenu('List Investor Grievances');


            if (($tender_page_ID != '' && checkrolemenu($tender_page_ID, $logged_user_level)) || ($career_page_ID != '' && checkrolemenu($career_page_ID, $logged_user_level)) || ($pressrelease_page_ID != '' && checkrolemenu($pressrelease_page_ID, $logged_user_level)) || ($publication_report_page_ID != '' && checkrolemenu($publication_report_page_ID, $logged_user_level))) : ?>
                <li class="nav-item with-sub <?= $active_list; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="home"></i> List </a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                                <li class="nav-label <?= $active_list; ?>">All List Setup</li>
                                <?php
                                if ($tender_page_ID != '' && checkrolemenu($tender_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="tender.php" class="nav-sub-link"><i data-feather="home"></i> Tender </a></li>
                                <?php endif; ?>
                                <?php
                                if ($career_page_ID != '' && checkrolemenu($career_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="career.php" class="nav-sub-link"><i data-feather="trending-up"></i> Career </a></li>
                                <?php endif; ?>
                                <?php
                                if ($pressrelease_page_ID != '' && checkrolemenu($pressrelease_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="pressrelease.php" class="nav-sub-link"><i data-feather="disc"></i>Press Release</a></li>
                                <?php endif; ?>
                                <?php
                                if ($publication_report_page_ID != '' && checkrolemenu($publication_report_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="publication_report.php" class="nav-sub-link"><i data-feather="box"></i>Publication and Report</a></li>
                                <?php endif; ?>
                                <li class="nav-label  mg-t-20 <?= $active_list; ?>">Lists</li>
                                <?php
                                if ($announcements_page_ID != '' && checkrolemenu($announcements_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="announcements.php" class="nav-sub-link"><i data-feather="layers"></i>Announcement</a></li>
                                <?php endif; ?>
                                <?php
                                if ($financialreport_page_ID != '' && checkrolemenu($financialreport_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="financialreport.php" class="nav-sub-link"><i data-feather="disc"></i>Financial Report</a></li>
                                <?php endif; ?>

                                <?php
                                if ($coca_reports_page_ID != '' && checkrolemenu($coca_reports_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="coca_reports.php" class="nav-sub-link"><i data-feather="x-square"></i>Coca Reports</a></li>
                                <?php endif; ?>
                                <?php
                                if ($reservation_roster_page_ID != '' && checkrolemenu($reservation_roster_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="reservation_roster.php" class="nav-sub-link"><i data-feather="box"></i>Reservation Roster</a></li>
                                <?php endif; ?>
                            </ul>
                            <ul>
                                <li class="nav-label <?= $active_list; ?>">Lists</li>
                                <?php
                                if ($other_loans_page_ID != '' && checkrolemenu($other_loans_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="other_loans.php" class="nav-sub-link"><i data-feather="home"></i>Other Loans</a></li>
                                <?php endif; ?>
                                <?php
                                if ($shareholder_page_ID != '' && checkrolemenu($shareholder_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="shareholder.php" class="nav-sub-link"><i data-feather="trending-up"></i> Shareholder </a></li>
                                <?php endif; ?>
                                <?php
                                if ($annual_reports_page_ID != '' && checkrolemenu($annual_reports_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="annual_reports.php" class="nav-sub-link"><i data-feather="disc"></i>Annual Reports</a></li>
                                <?php endif; ?>
                                <?php
                                if ($corporate_governances_page_ID != '' && checkrolemenu($corporate_governances_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="corporate_governances.php" class="nav-sub-link"><i data-feather="box"></i>Corporate Governances</a></li>
                                <?php endif; ?>
                                <li class="nav-label mg-t-20 <?= $active_list; ?>">Lists</li>
                                <?php
                                if ($investor_grievances_page_ID != '' && checkrolemenu($investor_grievances_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_list; ?>"> <a href="investor_grievances.php" class="nav-sub-link"><i data-feather="layers"></i>Investor Grievances</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <li class="nav-item <?= $active_dashboard; ?>">
                <a href="dashboard.php" class="nav-link"><i data-feather="package"></i>Dashboard</a>
            </li>
            <li class="nav-item <?= $active_dashboard; ?>">
                <a href="menus.php" class="nav-link"><i data-feather="package"></i>Menus</a>
            </li>
            <?php
            $welcomebanner_page_ID = checkmenu('Edit Welcome Banner');

            if ($welcomebanner_page_ID != '' && checkrolemenu($welcomebanner_page_ID, $logged_user_level)) : ?>
                <li class="nav-item with-sub <?= $active_home_menu; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="home"></i>
                        Home</a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                                <?php
                                if ($welcomebanner_page_ID != '' && checkrolemenu($welcomebanner_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_home_menu; ?>"> <a href="welcomebanner.php" class="nav-sub-link"><i data-feather="package"></i>Welcome Banner</a></li>
                                <?php
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <?php
            $overview_page_ID = checkmenu('Overview');
            $mission_vision_page_ID = checkmenu('Mission & Vision');
            $board_of_directors_page_ID = checkmenu('Board of Directors');
            $role_and_sidbi_page_ID = checkmenu('Role and Sidbi');
            $historical_journey_page_ID = checkmenu('Historical Journey');
            $shareholderabout_page_ID = checkmenu('Shareholder About');
            $organization_chart_page_ID = checkmenu('Organization Chart');

            if ($overview_page_ID != '' && checkrolemenu($overview_page_ID, $logged_user_level)) : ?>
                <li class="nav-item with-sub <?= $active_about; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="package"></i>
                        About</a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                                <?php
                                if ($overview_page_ID != '' && checkrolemenu($overview_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="overview.php?route=edit" class="nav-sub-link"><i data-feather="award"></i>Overview</a></li>
                                <?php
                                endif; ?>
                                <?php 
                                if ($mission_vision_page_ID != '' && checkrolemenu($mission_vision_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="missionandvision.php?route=edit" class="nav-sub-link"><i data-feather="briefcase"></i>Mission & Vision</a></li>
                                <?php
                                endif; ?>
                                <?php
                                if ($board_of_directors_page_ID != '' && checkrolemenu($board_of_directors_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="boardofdirector.php" class="nav-sub-link"><i data-feather="cast"></i>Board of director</a></li>
                                <?php
                                endif; ?>
                                <?php
                                if ($role_and_sidbi_page_ID != '' && checkrolemenu($role_and_sidbi_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="roleandsidbi.php?route=edit" class="nav-sub-link"><i data-feather="codepen"></i>Role and Sidbi</a></li>
                                <?php
                                endif; ?>
                                <?php 
                                if ($historical_journey_page_ID != '' && checkrolemenu($historical_journey_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="history.php" class="nav-sub-link"><i data-feather="command"></i>Historical Journey</a></li>
                                <?php
                                endif; ?>
                                <?php 
                                if ($shareholderabout_page_ID != '' && checkrolemenu($shareholderabout_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="shareholderabout.php?route=edit" class="nav-sub-link"><i data-feather="cpu"></i>Shareholder</a></li>
                                <?php
                                endif; ?>
                                <?php
                                if ($organization_chart_page_ID != '' && checkrolemenu($organization_chart_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_about; ?>"> <a href="organizationchart.php" class="nav-sub-link"><i data-feather="info"></i>Organization Chart</a></li>
                                <?php
                                endif; ?>

                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <?php
            $prayaas_page_ID = checkmenu('Prayaas');
            $institutional_finance_page_ID = checkmenu('Institutional Finance');
            $government_page_ID = checkmenu('Government Program');
            $cheifgrievances_page_ID = checkmenu('Cheif Grievances');
            $fixedscheme_page_ID = checkmenu('Fixed Scheme');
            $debenture_page_ID = checkmenu('Debenture');
            $joinus_page_ID = checkmenu('Join cccs');
            $ecosystem_page_ID = checkmenu('Ecosystem');
            $subsidiary_page_ID = checkmenu('Subsidiary');
            $environmental_page_ID = checkmenu('Environmental');
            $aboutpsig_page_ID = checkmenu('About Psig');
            $psigkey_page_ID = checkmenu('Key Output');
            $psigfinance_page_ID = checkmenu('Finance Inclusion');
            $genderfinance_page_ID = checkmenu('Gender and Finance');
            $psigother_page_ID = checkmenu('Other Initiatives');
            $listofpartners_page_ID = checkmenu('List of Partners');
            $psigcontact_page_ID = checkmenu('Psig Contact');
            $genderfinance_page_ID = checkmenu('Gender and Finance');
            $psigother_page_ID = checkmenu('Other Initiatives');
            $listofpartners_page_ID = checkmenu('List of Partners');
            $psigcontact_page_ID = checkmenu('Psig Contact');
            $rightinformation_page_ID = checkmenu('Right Information');
            $informationunder_page_ID = checkmenu('Information Under');
            $appellate_page_ID = checkmenu('Appellate');
            $informationcost_page_ID = checkmenu('Information cost');
            $consultancy_page_ID = checkmenu('Consultancy');
            $thirdparty_page_ID = checkmenu('Third Party');

            if ($prayaas_page_ID != '' && checkrolemenu($prayaas_page_ID, $logged_user_level)) : ?>
                <li class="nav-item with-sub <?= $active_media; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="package"></i>
                        Content</a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                            <li class="nav-label <?= $active_media; ?>">Content</li>
                                <?php
                                if ($prayaas_page_ID != '' && checkrolemenu($prayaas_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="prayaas.php?route=edit" class="nav-sub-link"><i data-feather="package"></i>Prayaas</a></li>
                                <?php
                                endif;
                                if ($institutional_finance_page_ID != '' && checkrolemenu($institutional_finance_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="institutionalfinance.php?route=edit" class="nav-sub-link"><i data-feather="activity"></i>Institutional Finance</a></li>
                                <?php
                                endif;
                                if ($government_page_ID != '' && checkrolemenu($government_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="government.php?route=edit" class="nav-sub-link"><i data-feather="image"></i>Government Program</a></li>
                                <?php
                                endif;
                                if ($cheifgrievances_page_ID != '' && checkrolemenu($cheifgrievances_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="cheifgrievances.php?route=edit" class="nav-sub-link"><i data-feather="info"></i>Cheif Grievances</a></li>
                                <?php
                                endif; ?>
                            <li class="nav-label mg-t-20 <?= $active_media; ?>">PSIG Programme</li>
                                <?php
                                if ($aboutpsig_page_ID != '' && checkrolemenu($aboutpsig_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="aboutpsig.php?route=edit" class="nav-sub-link"><i data-feather="package"></i>About Psig</a></li>
                                <?php
                                endif;
                                if ($psigkey_page_ID != '' && checkrolemenu($psigkey_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="psigkey.php?route=edit" class="nav-sub-link"><i data-feather="activity"></i>Key Outputs</a></li>
                                <?php
                                endif;
                                if ($psigfinance_page_ID != '' && checkrolemenu($psigfinance_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="psigfinance.php?route=edit" class="nav-sub-link"><i data-feather="image"></i>Finance Inclusion</a></li>
                                <?php
                                endif;
                                if ($genderfinance_page_ID != '' && checkrolemenu($genderfinance_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="genderfinance.php?route=edit" class="nav-sub-link"><i data-feather="info"></i>Gender and Finance</a></li>
                                <?php
                                endif;
                                if ($psigother_page_ID != '' && checkrolemenu($psigother_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="psigother.php?route=edit" class="nav-sub-link"><i data-feather="activity"></i>Other Initiatives</a></li>
                                <?php
                                endif;
                                if ($listofpartners_page_ID != '' && checkrolemenu($listofpartners_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="listofpartners.php?route=edit" class="nav-sub-link"><i data-feather="award"></i>List of Partners</a></li>
                                <?php
                                endif;
                                if ($psigcontact_page_ID != '' && checkrolemenu($psigcontact_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="psigcontact.php?route=edit" class="nav-sub-link"><i data-feather="bell"></i>Psig Contact</a></li>
                                <?php
                                endif;
                                 ?>
                            </ul>
                            <ul>
                            <li class="nav-label <?= $active_media; ?>">Content</li>
                              <?php
                                if ($fixedscheme_page_ID != '' && checkrolemenu($fixedscheme_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="fixedscheme.php?route=edit" class="nav-sub-link"><i data-feather="briefcase"></i>Fixed Scheme</a></li>
                                <?php
                                endif;
                                if ($debenture_page_ID != '' && checkrolemenu($debenture_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="debenture.php?route=edit" class="nav-sub-link"><i data-feather="chevrons-down"></i>Debenture</a></li>
                                <?php
                                endif;
                                if ($joinus_page_ID != '' && checkrolemenu($joinus_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="joinus.php?route=edit" class="nav-sub-link"><i data-feather="cloud-snow"></i>Join cccs</a></li>
                                <?php
                                endif;
                                if ($ecosystem_page_ID != '' && checkrolemenu($ecosystem_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="ecosystem.php?route=edit" class="nav-sub-link"><i data-feather="briefcase"></i>Ecosystem</a></li>
                                <?php
                                endif; ?>
                                 <li class="nav-label  mg-t-20 <?= $active_media; ?>">RTI Cell</li>
                                <?php
                                if ($rightinformation_page_ID != '' && checkrolemenu($rightinformation_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="rightinformation.php?route=edit" class="nav-sub-link"><i data-feather="chevrons-down"></i>Right Information</a></li>
                                <?php
                                endif;
                                if ($informationunder_page_ID != '' && checkrolemenu($informationunder_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="informationunder.php" class="nav-sub-link"><i data-feather="bell"></i>Information Under</a></li>
                                <?php
                                endif;
                                if ($appellate_page_ID != '' && checkrolemenu($appellate_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="appellate.php?route=edit" class="nav-sub-link"><i data-feather="award"></i>Appellate</a></li>
                                <?php
                                endif;
                                if ($informationcost_page_ID != '' && checkrolemenu($informationcost_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="informationcost.php?route=edit" class="nav-sub-link"><i data-feather="cloud-snow"></i>Information Cost</a></li>
                                <?php
                                endif;
                                if ($consultancy_page_ID != '' && checkrolemenu($consultancy_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="consultancy.php?route=edit" class="nav-sub-link"><i data-feather="info"></i>Consultancy</a></li>
                                <?php
                                endif;
                                if ($thirdparty_page_ID != '' && checkrolemenu($thirdparty_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="thirdparty.php?route=edit" class="nav-sub-link"><i data-feather="info"></i>Third Party</a></li>
                                <?php
                                endif;
                                 ?>

                            </ul>
                            <ul>
                            <li class="nav-label <?= $active_media; ?>">Content</li>
                                <?php
                                if ($subsidiary_page_ID != '' && checkrolemenu($subsidiary_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="subsidiary.php?route=edit" class="nav-sub-link"><i data-feather="hash"></i>Subsidiary</a></li>
                                <?php
                                endif;
                                if ($environmental_page_ID != '' && checkrolemenu($environmental_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="environmental.php?route=edit" class="nav-sub-link"><i data-feather="info"></i>Environmental</a></li>
                                <?php
                                endif;
                                if ($psrf_page_ID != '' && checkrolemenu($psrf_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_media; ?>"> <a href="psrf.php?route=edit" class="nav-sub-link"><i data-feather="hard-drive"></i>Psrf</a></li>
                                <?php
                                endif;
                                 ?>

                            </ul>
                           
                        </div>
                    </div>
                </li>
            <?php endif; ?>
           

            <li class="nav-item <?= $active_innerpages; ?>">
                <a href="innerpage.php" class="nav-link"><i data-feather="package"></i>Inner Pages</a>
            </li>
            <?php
            $configuration_sitesetting_page_ID = checkmenu('Site Setting');
            $configuration_emailconfiguration_page_ID = checkmenu('Email Configuration');
            $configuration_rolepermission_page_ID = checkmenu('Role Permission');
            $configuration_pagemenu_page_ID = checkmenu('Page Menu');
            $configuration_logout_page_ID = checkmenu('Log out');

            if ($configuration_sitesetting_page_ID != '' && checkrolemenu($configuration_sitesetting_page_ID, $logged_user_level)) : ?>
                <li class="nav-item with-sub <?= $active_configuration; ?>">
                    <a href="" class="nav-link dropdown-link" data-toggle="dropdown"><i data-feather="package"></i>
                        Configuration</a>
                    <div class="navbar-menu-sub">
                        <div class="d-lg-flex">
                            <ul>
                                <?php
                                if ($configuration_sitesetting_page_ID != '' && checkrolemenu($configuration_sitesetting_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_configuration; ?>"> <a href="configuration_sitesetting.php" class="nav-sub-link"><i data-feather="package"></i>Site Setting</a></li>
                                <?php
                                endif;
                                if ($configuration_emailconfiguration_page_ID != '' && checkrolemenu($configuration_emailconfiguration_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_configuration; ?>"> <a href="configuration_emailconfiguration.php" class="nav-sub-link"><i data-feather="activity"></i>Email Configuration</a></li>
                                <?php
                                endif;
                                if ($configuration_rolepermission_page_ID != '' && checkrolemenu($configuration_rolepermission_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_configuration; ?>"> <a href="configuration_rolepermission.php" class="nav-sub-link"><i data-feather="image"></i>Role Permission</a></li>
                                <?php
                                endif;
                                if ($configuration_pagemenu_page_ID != '' && checkrolemenu($configuration_pagemenu_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_configuration; ?>"> <a href="configuration_pagemenu.php" class="nav-sub-link"><i data-feather="info"></i>Page Menu</a></li>
                                <?php
                                endif;
                                if ($configuration_logout_page_ID != '' && checkrolemenu($configuration_logout_page_ID, $logged_user_level)) : ?>
                                    <li class="nav-sub-item mg-b-10 <?= $active_configuration; ?>"> <a href="configuration_logout.php" class="nav-sub-link"><i data-feather="info"></i>Log out</a></li>
                                <?php
                                endif; ?>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        </ul>

    </div><!-- navbar-menu-wrapper -->
    <div class="navbar-right">
        <div class="dropdown dropdown-profile">
            <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                <div class="avatar avatar-sm" id="profileImage1"></div>
            </a><!-- dropdown-link -->
            <div class="dropdown-menu dropdown-menu-right tx-13">
                <div class="avatar avatar-lg mg-b-15" id="profileImage"></div>
                <?php $list_datas = sqlQUERY_LABEL("SELECT `username`, `useremail`, `roleID` FROM `js_users` where userID='$logged_user_id'") or die("Unable to get records:" . sqlERROR_LABEL());
                $check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
                while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
                    $username = $row["username"];
                    $useremail = $row["useremail"];
                    $roleID = $row["roleID"];
                } ?>
                <h6 class="tx-semibold mg-b-5" id="username"><?php echo $useremail; ?></h6>
                <?php if ($roleID == '3') { ?>
                    <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>
                <?php } else { ?>
                    <p class="mg-b-25 tx-12 tx-color-03">Staff</p>
                <?php } ?>
                <a href="changepassword.php" class="dropdown-item"><i data-feather="edit-3"></i> Change Password</a>
                <a href="logout.php" class="dropdown-item"><i data-feather="log-out"></i>Sign Out</a>
            </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
    </div><!-- navbar-right -->
    <div class="navbar-search">
        <div class="navbar-search-header">
            <input type="search" class="form-control" placeholder="Type and hit enter to search...">
            <button class="btn"><i data-feather="search"></i></button>
            <a id="navbarSearchClose" href="" class="link-03 mg-l-5 mg-lg-l-10"><i data-feather="x"></i></a>
        </div><!-- navbar-search-header -->
        <div class="navbar-search-body">
            <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Recent
                Searches</label>
            <ul class="list-unstyled">
                <li><a href="dashboard-one.html">modern dashboard</a></li>
                <li><a href="app-calendar.html">calendar app</a></li>
                <li><a href="collections/modal.html">modal examples</a></li>
                <li><a href="components/el-avatar.html">avatar</a></li>
            </ul>

            <hr class="mg-y-30 bd-0">

            <label class="tx-10 tx-medium tx-uppercase tx-spacing-1 tx-color-03 mg-b-10 d-flex align-items-center">Search
                Suggestions</label>

            <ul class="list-unstyled">
                <li><a href="dashboard-one.html">cryptocurrency</a></li>
                <li><a href="app-calendar.html">button groups</a></li>
                <li><a href="collections/modal.html">form elements</a></li>
                <li><a href="components/el-avatar.html">contact app</a></li>
            </ul>
        </div><!-- navbar-search-body -->
    </div><!-- navbar-search -->
</header><!-- navbar -->