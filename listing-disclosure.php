<!-- updated : 1:00 PM  | 30-12-23 -->

<?php
require_once('head/jackus.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Disclosures - Small Industries Development Bank of India</title>
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

    <style>
    table tr:nth-child(even) {
        background: none;
    }

    .btn-primary {
        background: linear-gradient(90deg, #00B6F0 8.75%, #46C4B6 52.7%, #D2DF43 140.59%);
        border: none;
    }

    .archived_information_link {
        text-decoration: none !important;
    }
    </style>
</head>

<body class="main-wrapper-en">

    <div id="wrapper" data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">
        <?php require_once('public/header.php');?>
        <section class="about-us-banner" data-aos="fade-down"
            style="background: url('assets/front/images/Inner\ Banenr\(1\).png')  no-repeat center center / cover ;">
            <div class="container">
                <div class="inner">
                    <h1><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 लिस्टिंग प्रकटीकरण
                                                 ';
                                                else:
                                                 echo 'Listing Disclosure';
                                                endif; ?></h1>
                </div>
            </div>
        </section>
        <section class="breadcrumb-inner" data-aos="fade-right">
            <div class="container">
                <div class="inner">
                    <ul>
                        <li><a href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 मुख्य पृष्ठ
                                                 ';
                                                else:
                                                 echo 'Home';
                                                endif; ?></a></li>
                        <li><a class="active" href="index"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 लिस्टिंग प्रकटीकरण
                                                 ';
                                                else:
                                                 echo 'Listing Disclosure';
                                                endif; ?></a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="main-announcement" data-aos="fade-up">
            <div class="container">
                <div class="row mb-5">
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 घोषणाएं
                                                 ';
                                                else:
                                                 echo 'Announcements';
                                                endif; ?>  <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 तारीख
                                                 ';
                                                else:
                                                 echo 'Date';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT announcements.announcements_id, announcements.announcements_title,  announcements.announcements_date,  announcements.filename, announcements_translations.title, announcements.status FROM announcements INNER JOIN announcements_translations ON announcements.announcements_id = announcements_translations.announcements_id  AND announcements.deleted = '0' AND announcements_translations.deleted = '0'  ORDER BY announcements.announcements_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $announcements_id = $row["announcements_id"];
                                        $announcements_title = $row["announcements_title"];
                                        $announcements_date = $row["announcements_date"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                            <tr>
                                                <!--<td class="srno">1</td>-->
                                                <td><?= $announcements_date ?></td>
                                                <td>
                                                    <a title="View" target="_blank"
                                                        href="<?= SEOURL; ?>uploads/announcements/<?= $filename ?>">
                                                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $announcements_title;
                                                endif; ?></a>
                                                </td>
<?php endwhile; ?>
                           
                                        </tbody>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                                <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 सेबी-एलओडीआर के विनियमन 62 के तहत प्रकटीकरण
                                                 ';
                                                else:
                                                 echo 'Disclosure under Regulation 62 of SEBI-LODR';
                                                endif; ?> <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/announcements/outcome120224.pdf"
                                                            title="Outcome of the Board Meeting"
                                                            target="blank"><strong>Outcome of the Board Meeting</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/announcements/NBM020224.pdf"
                                                            title="Intimation about board meeting in which financial results are to be considered"
                                                            target="blank"><strong>Intimation about board meeting in
                                                                which financial results are to be
                                                                considered</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="about" title="Details of Business"
                                                            target="blank"><strong>Details of Business</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="about#board-directors" title="Details of Business"
                                                            target="blank"><strong>Board of Directors</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>
                                                        <a href="<?= SEOURL; ?>uploads/announcements/reg50boardmeetingnovember.pdf"
                                                            target="blank"><strong>Notice of Board Meeting &
                                                                Outcome</strong></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                           <td>
                              <p>
                                 <a href="https://sidbi.in/en/financialresults"target="blank">
                                 <strong>Financial Results</strong>
                                 </a>
                              </p>
                           </td>
                           </tr>
                           <tr>
                           <td>
                              <p><a href="https://sidbi.in/en/annualreports" target="_blank"><strong>Annual Report<strong></a></p>
                           </td>
                           </tr> -->
                                            <!--<tr>-->
                                            <!--   <td>-->
                                            <!--      <p>                                       -->
                                            <!--         <a href="<?= SEOURL; ?>uploads/announcements/Corporate-Governance-Report-31-12-2022.pdf" target="_blank"><strong>Corporate Governance Report</strong></a>                                    -->
                                            <!--      </p>-->
                                            <!--   </td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td>
                                                    <p>
                                                        <a href="about#shareholding"
                                                            target="_blank"><strong>Shareholding Pattern</strong></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <!--<tr>-->
                                            <!--   <td>-->
                                            <!--      <p>                                       -->
                                            <!--         <a href="<?= SEOURL; ?>uploads/announcements/Investor-Grievance-Report-Under-Regulation-13(3).pdf" target="_blank"><strong>Investor Grievance Report </strong></a>                                   -->
                                            <!--      </p>-->
                                            <!--   </td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <td>
                                                    <p>Contact details designated officials handling investor grievances
                                                    </p>
                                                    <p>K.S.Rawat</p>
                                                    <p>Email:ksrawat[at]sidbi[dot]in</p>
                                                    <p>G.Subramanian</p>
                                                    <p>Email:subramanian[at]sidbi[dot]in</p>
                                                    <p>rmd_mo[at]sidbi[dot]in</p>
                                                    <p>treasury_frontoffice[at]sidbi[dot]in</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="debenture-trustee"
                                                            title="Name of the debenture trustees with full contact details;"
                                                            target="blank"><strong>Contact details of debenture
                                                                trustees</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Default to pay interest or redemption amount- NIL</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Failure to create a charge on the assetss- Not Applicable</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Statements of deviation or variation under Regulation 52 (7) & 52
                                                        (7A)-NIL</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Annual return under section 92 of the Companies Act, 2013 - Not
                                                        Applicable</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/lodrDisclosure/CG_report_as_per_Schedule_V_SEBI_LODR_SIDBI_2022.pdf"
                                                            target="_blank"><b>Secretarial compliance report as per
                                                                sub-regulation (2) of regulation 24A of these
                                                                regulations</b></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/lodrDisclosure/Charter_of_Committees.pdf"
                                                            target="_blank"><b>Charter of Committees</b></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/lodrDisclosure/Committee-of-the-Board.pdf"
                                                            target="_blank"><b>Committees of the Board</b></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/article/articlefiles/Terms_and_conditions_of_appointment_of_independent_directors.pdf">Terms
                                                                and conditions of appointment of independent
                                                                directors</a>
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/article/articlefiles/Criteriaofmakingpaymentstonon-executivedirectors.pdf">Criteria
                                                                of making payments to Non-Executive Directors
                                                            </a></strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/lodrDisclosure/Code-of-Conduct-for-Directors-and-Senior-Management-scan.pdf">Code
                                                                of Conduct for Directors and Senior Management</a>
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/lodrDisclosure/Vigil-Mechanism-and-Whistle-Blower-Policy-scan.pdf">Vigil
                                                                Mechanism and Whistle Blower Policy</a>
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/lodrDisclosure/Policy-on-Related-party-transactions.pdf">Policy
                                                                on materiality of related party transactions and on
                                                                dealing with related party transactions</a>
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>
                                                            <a title="Download" target="_blank"
                                                                href="<?= SEOURL; ?>uploads/lodrDisclosure/Policy-for-determining-Material-Subsidiary.pdf">Policy
                                                                for determining Material Subsidiaries</a>
                                                        </strong>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/lodrDisclosure/Code-of-Conduct-for-Directors-and-Senior-Management-scan.pdf"
                                                            target="_blank"><strong>Code Of Conduct to regulate, monitor
                                                                and report trading by designated persons & their
                                                                immediate relatives and for fair disclosure</strong></a>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="<?= SEOURL; ?>uploads/article/articlefiles/Details-of-familiarization-programmes.pdf"
                                                            target="_blank"><strong>Details of familiarization
                                                                programmes imparted to independent directors including
                                                                the following</strong></a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><a href="https://development.sidbi.in/announcements"
                                                            target="_blank"><strong>Announcement of information
                                                                concerning non-convertible debt securities & Commercial
                                                                Papers & press release</strong></a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                            <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 वार्षिक रिपोर्ट्स
                                                 ';
                                                else:
                                                 echo 'Annual Reports';
                                                endif; ?> <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <!-- <th>Sr.No.</th> -->
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 डाउनलोड करना
                                                 ';
                                                else:
                                                 echo 'Download';
                                                endif; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT annual_reports.annual_reports_id, annual_reports.annual_reports_title,  annual_reports.filename, annual_reports_translations.title, annual_reports.status FROM annual_reports INNER JOIN annual_reports_translations ON annual_reports.annual_reports_id = annual_reports_translations.annual_reports_id  AND annual_reports.deleted = '0' AND annual_reports_translations.deleted = '0'  ORDER BY annual_reports.annual_reports_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $annual_reports_id = $row["annual_reports_id"];
                                        $annual_reports_title = $row["annual_reports_title"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                            <tr>
                                                <!-- <td class="89">1.</td> -->
                                                <td> <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $annual_reports_title;
                                                endif; ?></td>
                                                <td>
                                                    <a title="View" target="_blank"
                                                        href="<?= SEOURL; ?>uploads/financialreport/<?=  $filename ?>">
                                                        <i class="fa fa-download" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                          <?php endwhile; ?> 

                                        </tbody>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                            <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 वित्तीय परिणाम
                                                 ';
                                                else:
                                                 echo 'Financial Results';
                                                endif; ?> <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <!-- <th>Sr.No.</th> -->
                                                <th> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?> </th>
                                                <th> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 तारीख
                                                 ';
                                                else:
                                                 echo 'Date';
                                                endif; ?> </th>
                                                <th> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 अंग्रेज़ी
                                                 ';
                                                else:
                                                 echo 'English';
                                                endif; ?> </th>
                                                <th> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 हिंदी
                                                 ';
                                                else:
                                                 echo 'Hindi';
                                                endif; ?> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT financial_reports.financial_report_id, financial_report_translations.financial_report_id, financial_reports.financial_report_title,financial_reports.status,financial_report_translations.title, financial_reports.report_date, financial_reports.documents, financial_report_translations.documents as hin_documents,financial_report_translations.status FROM financial_reports INNER JOIN financial_report_translations ON financial_reports.financial_report_id=financial_report_translations.financial_report_id AND financial_reports.deleted = '0' AND financial_report_translations.deleted = '0' ORDER BY financial_reports.financial_report_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $financial_report_id = $row["financial_report_id"];
                                        $financial_report_title = $row["financial_report_title"];
                                        $report_date = $row["report_date"];
                                        $financial_report_eng_doc = $row["documents"];
                                        $financial_report_hin_doc = $row["hin_documents"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                            <tr>
                                                <!-- <td>1.</td> -->
                                                <td><?= $financial_report_title ?><span class="blinking">New</span></td>
                                                <td><?= $report_date ?></td>
                                                <td><a title="View" target="_blank"
                                                        href="<?= SEOURL; ?>uploads/financialreport/<?= $financial_report_eng_doc ?>">English</a>
                                                </td>
                                                <td><a title="View" target="_blank"
                                                        href="<?= SEOURL; ?>uploads/financialreport/<?= $financial_report_hin_doc ?>">Hindi</a>
                                                </td>
                                            </tr>
                                           <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                            <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 कॉर्पोरेट प्रशासन रिपोर्ट
                                                 ';
                                                else:
                                                 echo 'Corporate Governance Report';
                                                endif; ?> <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                    <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT corporate_governances.corporate_governances_id, 
                                    corporate_governances.corporate_governances_title, corporate_governances.corporate_governances_date,  corporate_governances.filename, corporate_governances_translations.title,
                                    corporate_governances.status FROM corporate_governances INNER JOIN corporate_governances_translations ON 
                                    corporate_governances.corporate_governances_id = corporate_governances_translations.corporate_governances_id  AND 
                                    corporate_governances.deleted = '0' AND corporate_governances_translations.deleted = '0'  ORDER BY 
                                    corporate_governances.corporate_governances_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $corporate_governances_id = $row["corporate_governances_id"];
                                        $corporate_governances_title = $row["corporate_governances_title"];
                                        $corporate_governances_date = $row["corporate_governances_date"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                        <tr>
                                            <!--<td class="srno">1</td>-->
                                            <td><?= $corporate_governances_date ?></td>
                                            <td>
                                                <a title="View" target="_blank"
                                                    href="<?= SEOURL; ?>uploads/publicationreport/<?= $filename ?>">

                                                    <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $corporate_governances_title;
                                                endif; ?></a>
                                            </td>
                                        </tr>
<?php endwhile; ?>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                            <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 निवेशक शिकायत रिपोर्ट
                                                 ';
                                                else:
                                                 echo 'Investor Grievance Report ';
                                                endif; ?>  <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <tr>
                                            
                                            <th>
                                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 तारीख
                                                 ';
                                                else:
                                                 echo 'Date';
                                                endif; ?>
                                            </th>
                                          
                                            <th>
                                            <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 शीर्षक
                                                 ';
                                                else:
                                                 echo 'Title';
                                                endif; ?> 
                                               
                                            </th>
                                        </tr>
                                        <tr>
                                        <?php
                                    $list_transaction = sqlQUERY_LABEL("SELECT investor_grievances.investor_grievances_id, investor_grievances.investor_grievances_title,  investor_grievances.investor_grievances_date,  investor_grievances.filename, investor_grievances_translations.title, investor_grievances.status FROM investor_grievances INNER JOIN investor_grievances_translations ON investor_grievances.investor_grievances_id = investor_grievances_translations.investor_grievances_id  AND investor_grievances.deleted = '0' AND investor_grievances_translations.deleted = '0'  ORDER BY investor_grievances.investor_grievances_id DESC") or die("Unable to get records:" . sqlERROR_LABEL());
                                    while ($row = sqlFETCHARRAY_LABEL($list_transaction)) :
                                        $investor_grievances_id = $row["investor_grievances_id"];
                                        $investor_grievances_title = $row["investor_grievances_title"];
                                        $investor_grievances_date = $row["investor_grievances_date"];
                                        $filename = $row["filename"];
                                        $title = $row["title"];
                                    ?>
                                            <td><?= $investor_grievances_date ?></td>
                                            <td>
                                                <a title="View" target="_blank"
                                                    href="<?= SEOURL; ?>uploads/investor_grievances/<?= $filename ?>">
                                                    <?php  if($get_configured_lang == 'HI'): 
                                                 echo   $title;
                                                else:
                                                 echo   $investor_grievances_title;
                                                endif; ?></a>
                                            </td>
                                        </tr>
                                       <?php endwhile; ?>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                            <th class="srno sld"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रमांक।
                                                 ';
                                                else:
                                                 echo 'Sr. No.';
                                                endif; ?></th>
                                                <th><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 फ़ाइल का नाम
                                                 ';
                                                else:
                                                 echo 'File Name';
                                                endif; ?></th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion">
                        <h4 class="accordion__title">
                        <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 क्रेडिट रेटिंग और रेटिंग एजेंसियां
                                                 ';
                                                else:
                                                 echo 'Credit rating and Rating agencies';
                                                endif; ?> <i class="accordion__icon">
                                <div class="line-01"></div>
                                <div class="line-02"></div>
                            </i>
                        </h4>
                        <div class="accordion__content" style="padding-top: 0px;">
                            <div class="row">
                                <div class="responseTable">
                                    <table class="table table-bordered mt-5" id="fixdata">
                                        <thead>
                                            <tr>
                                                <th style="width:110px">Date</th>
                                                <th>Rating Agency</th>
                                                <th>Instruments</th>
                                                <th>Rating</th>
                                                <th>Outlook</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>23-Aug-23 </td>
                                                <td>Care Ratings Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/care2308.pdf"
                                                        target="_blank"><strong>Unsecured Redeemable Bonds</strong></a>
                                                </td>
                                                <td>Care AAA: Stable(Triple A; Outlook: Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>23-Aug-23 </td>
                                                <td>Care Ratings Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/care2308.pdf"
                                                        target="_blank"><strong>Long Term/Short Term Instrument-CD/CP
                                                            Program</strong></a></td>
                                                <td>Care AAA: Stable/ Care A1+(Triple A; Outlook: Stable/A1+)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>11-Aug-23 </td>
                                                <td>ICRA</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/1108.pdf"
                                                        target="_blank"><strong>Long term Bond</strong></a></td>
                                                <td>ICRA AAA</td>
                                                <td>Stable-reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>15-June-23</td>
                                                <td>India Rating &Research</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUNE-2023/1.pdf"
                                                        target="_blank"><strong>Commercial Paper</strong></a></td>
                                                <td>IND A1+</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>15-June-23</td>
                                                <td>CRISIL rating</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUNE-2023/8_CRISIL_rating_15062023.pdf"
                                                        target="_blank"><strong>Non Convertible Debenture</strong></a>
                                                </td>
                                                <td>CRISIL AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/2_Care_ratings.pdf"
                                                        target="_blank"><strong>Unsecured Redeemable Bond</strong></a>
                                                </td>
                                                <td>CARE AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/3_or_4_both.pdf"
                                                        target="_blank"><strong>Long Term Bank Facilities</strong></a>
                                                </td>
                                                <td>CARE AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/3_or_4_both.pdf"
                                                        target="_blank"><strong>Short Term Bank Facilities</strong></a>
                                                </td>
                                                <td>CARE A1+</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/5.pdf"
                                                        target="_blank"><strong>Long Term / Short Term Instrument – CD /
                                                            CP program</strong></a></td>
                                                <td>CARE AAA; CARE A1+</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/6.pdf"
                                                        target="_blank"><strong>Fixed Deposit</strong></a></td>
                                                <td>CARE AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>31-May-23</td>
                                                <td>Care Rating Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/7.pdf"
                                                        target="_blank"><strong>MSE/RIDF Deposits</strong></a></td>
                                                <td>CARE AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>11-May-23</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/MAY-2023/9.pdf"
                                                        target="_blank"><strong>Bonds</strong></a></td>
                                                <td>ICRA AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>10-Feb-23</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/ICRA_NCD_23022023.pdf"
                                                        target="_blank"><strong>Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Revalidated</td>
                                            </tr>
                                            <tr>
                                                <td>11-Jan-23</td>
                                                <td>CRISIL</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/CRISIL_LT_NCD_11012023.pdf"
                                                        target="_blank"><strong>Rating of Non Covertible
                                                            Debenture</strong></a></td>
                                                <td>CRISIL AAA</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>11-Jan-23</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/ICRA_NCD_11012023.pdf"
                                                        target="_blank"><strong>Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Revalidated</td>
                                            </tr>
                                            <tr>
                                                <td>11-Jan-23</td>
                                                <td>CRISIL</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/CRISIL_CP_11012023.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>CRISIL A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>11-Jan-23</td>
                                                <td>CRISIL</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/CRISIL_FD_11012023.pdf"
                                                        target="_blank"><strong>Rating of Fixed Deposit
                                                            programme</strong></a></td>
                                                <td>CRISIL A1+</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>10-Jan-23</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/CareEdge_Bonds_10012023.pdf"
                                                        target="_blank"><strong>Credit rating for Unsecured Redeemable
                                                            Bonds</strong></a></td>
                                                <td>CARE AAA; Stable (Triple A; Outlook: Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>10-Jan-23</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/January/CareEdge_CPCD_10012023.pdf"
                                                        target="_blank"><strong>Credit rating for Certificate of Deposit
                                                            (CD) / Commercial Paper (CP) program</strong></a></td>
                                                <td>CARE AAA; Stable (Triple A; Outlook: Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>12-Dec-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/DEC-2022/SmallIndustriesDevelopmentBankofIndia-RatingLetter-12089.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>‘IND A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12-Dec-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/DEC-2022/SIDBI-NCD-Revalidation-December-22-signed.pdf"
                                                        target="_blank"><strong>Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Revalidated</td>
                                            </tr>
                                            <tr>
                                                <td>25-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingFD_25112022.pdf"
                                                        target="_blank"><strong>Credit rating for Fixed Deposit (FD)
                                                            programme</strong></a></td>
                                                <td>CARE AAA; Stable (Triple A; Outlook:Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>25-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingIR_25112022.pdf"
                                                        target="_blank"><strong>Issuer rating</strong></a></td>
                                                <td>CARE AAA (Is); Stable</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>25-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingMSME-RIDF_25112022.pdf"
                                                        target="_blank"><strong>Credit rating for RIDF
                                                            Deposits</strong></a></td>
                                                <td>CARE AAA; Stable</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>25-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingNCDs_25112022.pdf"
                                                        target="_blank"><strong>Credit rating for Unsecured Redeemable
                                                            Bonds</strong></a></td>
                                                <td>CARE AAA; Stable</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>25-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingSTL_25112022.pdf"
                                                        target="_blank"><strong>Credit rating for bank facilities-Short
                                                            Term Bank Facilities</strong></a></td>
                                                <td>CARE A1+</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>14-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/CareEdgeRatingNCDs_14112022.pdf"
                                                        target="_blank"><strong>Credit rating for Non-Convertible
                                                            Debenture Issue</strong></a></td>
                                                <td>CARE AAA; Stable (Triple A; Outlook: Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>07-Nov-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/ICRA_NCD_22112022.pdf"
                                                        target="_blank"><strong>Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>stable</td>
                                            </tr>
                                            <tr>
                                                <td>07-Nov-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/NOV-2022/IndiaRatingLtd_CP_07112022.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>‘IND A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>01-Nov-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/SEP-2022/CareEdgeRatingCPCD_01092022.pdf"
                                                        target="_blank"><strong>Credit rating for Certificate of Deposit
                                                            (CD) / Commercial Paper (CP) program</strong></a></td>
                                                <td>CARE AAA; Stable / CARE A1+</td>
                                                <td>Stable / A One Plus</td>
                                            </tr>
                                            <tr>
                                                <td>14-Oct-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/OCT-2022/CareEdgeRatingNCDs_14102022.pdf"
                                                        target="_blank"><strong>Credit rating for Non-Convertible
                                                            Debenture Issue</strong></a></td>
                                                <td>CARE AAA; Stable (Triple A; Outlook: Stable)</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>03-Oct-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/OCT-2022/ICRA_NCD_22102022.pdf"
                                                        target="_blank"><strong>Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>03-Oct-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/IndaiRating_CP_30082022.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>IND A1+</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>03-Oct-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/OCT-2022/IndiaRatingLtd_CP_03102022.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>IND A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>06-Sep-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/SEP-2022/CareEdgeRating_30092022_PR.pdf"
                                                        target="_blank"><strong>Total long-term/shortterm
                                                            instruments</strong></a></td>
                                                <td>CARE AAA; Stable / CARE A1+</td>
                                                <td>Reaffirmed</td>
                                            </tr>
                                            <tr>
                                                <td>01-Sep-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/SEP-2022/ICRA_NCDs_22092022.pdf"
                                                        target="_blank"><strong> Bonds Programme of Rs. 38,635
                                                            crore</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>stable</td>
                                            </tr>
                                            <tr>
                                                <td>30-Aug-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/CareEdgeRatingCPCD_30082022.pdf"
                                                        target="_blank"><strong>Certificate of Deposit/Commercial Paper
                                                            program</strong></a></td>
                                                <td>CARE AAA; Stable</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>30-Aug-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/CareEdgeRatingSTL_30082022.pdf"
                                                        target="_blank"><strong>Short-term Bank Facilities</strong></a>
                                                </td>
                                                <td>CARE A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>30-Aug-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/IndiaRatingLtd_CP_30082022.pdf"
                                                        target="_blank"><strong>Rating of Commercial Paper
                                                            programme</strong></a></td>
                                                <td>IND A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>17-Aug-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/ICRA_LT_17082022.pdf"
                                                        target="_blank"><strong>Long-term bonds programme</strong></a>
                                                </td>
                                                <td>[ICRA]AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>12-Aug-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/ICRA_NCDs_12082022.pdf"
                                                        target="_blank"><strong>Surveillance of Credit Rating of the
                                                            Bonds Programme</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>12-Aug-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/ICRA_Withdrawal_LT Bonds_12082022.pdf"
                                                        target="_blank"><strong>Long-term bonds programme</strong></a>
                                                </td>
                                                <td>[ICRA]AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>12-Aug-22</td>
                                                <td>ICRA Limited</td>
                                                <td>Withdrawal of the ICRA rating assigned to Rs. 1,365 crore Long-term
                                                    Bonds Programme</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12-Aug-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/ICRA_LT_12082022.pdf"
                                                        target="_blank"><strong>Long Term Bond</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>11-Aug-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/AUG-2022/CareEdgeRatingNCDs_11082022.pdf"
                                                        target="_blank"><strong>Unsecured Bonds</strong></a></td>
                                                <td>CARE AAA</td>
                                                <td>Stable </td>
                                            </tr>
                                            <tr>
                                                <td>27-Jul-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/IndiaRatingLtd_CP_27072022.pdf"
                                                        target="_blank"><strong>Commercial Paper</strong></a></td>
                                                <td>IND A1+</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>08-Jul-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/ICRA_NCDs_22072022.pdf"
                                                        target="_blank"><strong>Long-term bonds</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>07-Jul-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/CareEdgeRating_07072022_PR.pdf"
                                                        target="_blank"><strong>Total bank facilities-Short term/Long
                                                            term</strong></a></td>
                                                <td>CARE A1+/CARE AAA/CARE AAA (Is)</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>01-Jul-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/CareEdgeRatingCPCD_01072022.pdf"
                                                        target="_blank"><strong>Certificate of Deposit /Commercial Paper
                                                            program</strong></a></td>
                                                <td>CARE AAA; Stable / CARE A1+</td>
                                                <td>Stable / A One Plus</td>
                                            </tr>
                                            <tr>
                                                <td>01-Jul-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/CareEdgeRatingIR_01072022.pdf"
                                                        target="_blank"><strong>Issuer rating</strong></a></td>
                                                <td>CARE AAA (Is); Stable</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>01-Jul-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/CareEdgeRatingLT_01072022.pdf"
                                                        target="_blank"><strong>Credit rating for Long Term Debt
                                                            Issue</strong></a></td>
                                                <td>CARE AAA; Stable</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>01-Jul-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/JUL-2022/CareEdgeRatingSTL-BF_01072022.pdf"
                                                        target="_blank"><strong>Credit rating for bank
                                                            facilities</strong></a></td>
                                                <td>CARE A1+</td>
                                                <td>Stable</td>
                                            </tr>
                                            <tr>
                                                <td>02-May-22</td>
                                                <td>ICRA Limited</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/APR-2022/CareEdgeRatingNCDs_28042022%20&%20ICRA_02052022.pdf"
                                                        target="_blank"><strong>Long-term bonds</strong></a></td>
                                                <td>[ICRA]AAA</td>
                                                <td>[ICRA]AAA(Stable)</td>
                                            </tr>
                                            <tr>
                                                <td>28-Apr-22</td>
                                                <td>CareEdge Ratings</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/APR-2022/CareEdgeRatingCPCD_28042022.pdf"
                                                        target="_blank"><strong>Certificate of Deposit/Commercial Paper
                                                            program</strong></a></td>
                                                <td>CARE AAA; Stable / CARE A1+</td>
                                                <td>Stable / A One Plus</td>
                                            </tr>
                                            <tr>
                                                <td>27-Apr-22</td>
                                                <td>India Ratings and Research (Ind-Ra)</td>
                                                <td><a href="<?= SEOURL; ?>uploads/lodrDisclosure/APR-2022/IndiaRatingLtd_CP_27042022.pdf"
                                                        target="_blank"><strong>Commercial Paper</strong></a></td>
                                                <td>IND A1+</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="display:none;" class="table table-bordered mt-5" id="fixdatabysearch">
                                        <thead>
                                            <tr>
                                                <th class="srno sld">Sr. No.</th>
                                                <th>File Name</th>
                                                <th class="tddownload sld">
                                                    <? __('Download'); ?>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="searchData"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mn-h">
            <div class="container archived_information">

                <h2> <?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 संग्रहीत जानकारी
                                                 ';
                                                else:
                                                 echo 'Archived Information';
                                                endif; ?> </h2>
                <a href="disclosures" class="archived_information_link" target="_blank">
                    <button class="btn btn-primary"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 लोद्र खुलासे
                                                 ';
                                                else:
                                                 echo ' Lodr Disclosures';
                                                endif; ?></button>
                </a>
                <a href="disclosures" class="archived_information_link" target="_blank">
                    <button class="btn btn-primary"><?php  if($get_configured_lang == 'HI'): 
                                                 echo '
                                                 आवधिक खुलासे
                                                 ';
                                                else:
                                                 echo ' Periodic Disclosures';
                                                endif; ?></button>
                </a>
            </div>
        </section>
    </div>



    <script>
    $('select').on('change', function() {

        var idval = $(this).attr('id');
        var catval = idval.slice(0, 1);

        var getYear;
        var getMonth;

        if (catval === '1') {
            getYear = $('#' + catval + "year_select").val();

            var quartername = $('#' + catval + "quartername").val();

            if (quartername === '1') {
                getMonth = "03-31";
                ++getYear;
            } else if (quartername === '2') {
                getMonth = "06-30";
            } else if (quartername === '3') {
                getMonth = "09-30";
            } else if (quartername === '4') {
                getMonth = "12-31";
            }
        } else {
            getYear = $('#' + catval + "cat_year").val();
            getMonth = $('#' + catval + "_month").val();
        }
        theurl = 'searchdisclosure';
        $.ajax({
            url: theurl,
            type: 'POST',
            data: {
                'disyear': getYear,
                'dismonth': getMonth,
                'category_id': catval
            },
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
            },
            success: function(data) {
                data = JSON.parse(data);
                //console.log(data);
                if (parseInt(data.resultCount) > 0) {

                    if (idval === "1year_select" || idval === "1quartername") {
                        $('#fixdatabysearch').show();
                        $('#fixdata').hide();
                        $('.searchData').html(data.htmldata);
                    } else {
                        //tbody
                        $('.' + catval + 'maintable').hide();
                        $('.' + catval + 'table').show();
                        $('.' + catval + 'tbody').html(data.htmldata);
                    }
                } else {
                    //console.log(idval);
                    if (idval === "1year_select" || idval === "1quartername") {
                        $('#fixdatabysearch').show();
                        $('#fixdata').hide();
                        $('.searchData').html(data.msg);
                    } else {
                        $('.' + catval + 'maintable').hide();
                        $('.' + catval + 'table').show();
                        $('.' + catval + 'tbody').html(data.msg);
                    }
                }
            }
        });
    });
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


    <script src="/js/scripts.js"></script>
    <script src="/js/assets/js/mscroll-custom.js"></script>
    <script src="/js/assets/js/scrollBar.js"></script>
    <script>
    $(".sb-container").scrollBox();

    $(window).on('load', function() {
        $(".content").mCustomScrollbar({
            scrollButtons: {
                enable: true
            },
            callbacks: {
                alwaysTriggerOffsets: false
            }
        });
    });
    </script>
    <script type="">
        $(document).ready(function(){
	  	$(window).scroll(function () {
	    	if ($(this).scrollTop() > 50) {
	        	$('#back-to-top').fadeIn();
	    	} else {
	        	$('#back-to-top').fadeOut();
	    	}
	  	});
	  	// scroll body to 0px on click
	  	$('#back-to-top').click(function () {
	    	$('#back-to-top').tooltip('hide');
	    	$('body,html').animate({
	        	scrollTop: 0
	    	}, 800);
	    	return false;
	  	});
	  	$('#back-to-top').fadeOut();
	  	//$('#back-to-top').tooltip('hide');
	});
	
	$("ul.menu li").hover(function() {
      $(this).prev("ul.menu li").toggleClass("myClass");
    }); 

</script>

    <script>
    $(document).ready(function() {
        $(".zmdi-search").click(function() {
            $(".zmdi").toggleClass("opensearchnew");
            $(".search").toggleClass("opensearch");
            $(".topnav").toggleClass("topnavopen");
        });


    });

    /*Google Script*/
    window.addEventListener('load', function() {
        jQuery('[href*="/online-enquiry"]').click(function() {
            gtag('event', 'conversion', {
                'send_to': 'AW-11033315881/o1HhCK257oMYEKmUjI0p'
            });
        });

        jQuery('[href*="onlineloanappl.sidbi.in/OnlineApplication"]').click(function() {
            gtag('event', 'conversion', {
                'send_to': 'AW-11033315881/GEL9CLC57oMYEKmUjI0p'
            });
        });
    });

    <!--Event snippet to conversion page-- >
    var x = 0;
    var timer = setInterval(function() {
        if (jQuery('.alert-success').is(":visible") && window.location.href.includes('green-finance-scheme')) {
            if (x == 0) {
                gtag('event', 'conversion', {
                    'send_to': 'AW-11033315881/vbi3CPjqy4cYEKmUjI0p'
                });
                x = 1;
            }
            clearInterval(timer)
        }
        if (jQuery('.alert-success').is(":visible") && window.location.href.includes(
                'ubharte-sitaare-scheme')) {
            if (x == 0) {
                gtag('event', 'conversion', {
                    'send_to': 'AW-11033315881/g8YPCLnryocYEKmUjI0p'
                });
                x = 1;
            }
            clearInterval(timer)
        }
        if (jQuery('.alert-success').is(":visible") && window.location.href.includes('arise-sthapan-wca')) {
            if (x == 0) {
                gtag('event', 'conversion', {
                    'send_to': 'AW-11033315881/jZAzCOetzocYEKmUjI0p'
                });
                x = 1;
            }
            clearInterval(timer)
        }
    })
    </script>

    <script type="text/javascript">
    var _langChange = false;
    var _ChangeLang = function(_lang) {
        var _langUrls = [];
        var _langUrls = JSON.parse(
            '{"en":"https:\/\/www.sidbi.in\/en\/newlodrdisclosure","hi":"https:\/\/www.sidbi.in\/hi\/newlodrdisclosure"}'
        );
        if (_langChange) {
            return;
        }
        if (_langUrls[_lang] !== undefined && _langUrls[_lang] != '') {
            _langChange = true;
            window.location = _langUrls[_lang];
        }
    }

    $(document).click(function() {
        $('.topnav').slideUp();
        $('.zmdi-search').removeClass('active');
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#occupation').change(function() {
            if ($('#occupation').val() == 'Others, please specify') {
                $('.otherOcc').show();
            } else {
                $('.otherOcc').hide();
            }
        });

        $("#user-registration").validate({
            rules: {
                'name': {
                    required: true,
                },
                'occupation': {
                    required: true,
                },
                'captcha': {
                    required: true,
                },
                'email': {
                    required: true,
                    email: true,
                    emailt: true
                },
            },
            messages: {
                'name': {
                    required: "Name field is required",
                },
                'occupation': {
                    required: "Occupation field is required",
                },
                'captcha': {
                    required: "Captcha field is required",
                },
                'email': {
                    required: "Email field is required",
                    email: 'Enter valid mail id',
                    emailt: 'This is not valid mail'
                },
            }
        });
    });

    jQuery.validator.addMethod("emailt", function(value, element) {
        return this.optional(element) ||
            /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i
            .test(value);
    }, "Your entered invalid email id");
    </script>
    <script type="text/javascript">
    var download_id = '';
    $(document).ready(function() {
        $(".registrationForm").click(function() {
            console.log($(this).attr("data-documentid"));
            download_id = $(this).attr("data-documentid");
        });

        $(".registrationandDownloaddoc").click(function() {
            $("#documentfile_name").remove();
            $("#documentfile_modulename").remove();
            $('#user-registration').append(
                "<input type='hidden' name='documentfile' id='documentfile_name' value='" + $(this)
                .attr("data-documentfile") + "' />");
            $('#user-registration').append(
                "<input type='hidden' name='documentmodulename' id='documentfile_modulename' value='" +
                $(this).attr("data-modulename") + "' />");
            console.log($(this).attr("data-documentid"));
            download_id = $(this).attr("data-documentid");
        });

        $(".fileDownload").click(function() {
            window.setTimeout(5000);
            alert('Kindly check your email for the corresponding file.');
        });
    });

    $("#submitButton").click(function() {
        var check_emailverify = checkotpstatus();
        if (check_emailverify == true) {
            submitRegistrationForm();
            return true;
        } else {
            return false;
        }
    });

    function checkotpstatus() {
        $("#email_err").hide();
        var responcecheck = true;
        theurl = '../ajax/submitbutton';
        $.ajax({
            type: "POST",
            url: theurl,
            async: false,
            beforeSend: function(xhr) {}
        }).done(function(data) {
            if (data == 'error') {
                $("#email_err").show();
                $("#email_err").html('<span style="color:#ff0000">Email are not verfied<span>');
                responcecheck = false;
            } else {
                responcecheck = true;
            }
        });
        return responcecheck;
    }


    function submitRegistrationForm() {
        var setpath = $(location).attr('hostname');
        if (setpath == 'sidbi.in') {
            var redurl = 'https://sidbi.in/';
        } else {
            var redurl = 'https://development.sidbi.in/';
        }
        var registrationData = $('#user-registration').serialize();
        var para = download_id.split('_');
        if (para[3] == 'Structural') {
            var redirect = redurl + 'en/Articles/download/' + para[1] + '/' + para[2] + '/' + para[3];
        } else {
            if (!para[4]) {
                var redirect = redurl + 'en/PublicationAndReports/download/' + para[1] + '/' + para[2] + '/' + para[3];
            } else {
                var redirect = redurl + 'en/PublicationAndReports/download/' + para[1] + '/' + para[2] + '/' + para[3] +
                    '/' + para[4];
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

                console.log(response);

                if (response.status == 'success') {
                    alert(response.message);
                    $("#exampleModal").modal('hide');
                    window.location.reload();
                    //$('#user-registration')[0].reset();
                    /*window.setTimeout(5000);
                    alert('Your file is downloading. Please wait...');*/
                    //window.location.href = redirect;
                } else {
                    $('.capimg').attr("src", $('.capimg').attr("src") + '?id=' + Math.random());
                    alert(response.message);
                }
            },
        });
        // }
    }

    $('.creload').on('click', function() {
        var mySrc = $(this).prev().attr('src');
        var glue = '?';
        if (mySrc.indexOf('?') != -1) {
            glue = '&';
        }
        $(this).prev().attr('src', mySrc + glue + new Date().getTime());
        return false;
    });

    $(function() {
        $('.regrecaptcha').click(function(e) {
            e.preventDefault();
            $('.capimg').attr("src", $('.capimg').attr("src") + '?id=' + Math.random());
        });
    });
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
        }

        function resetZoom() {
            currentZoom = 100;
            document.body.style.zoom = `${currentZoom}%`;
        }
    </script>
</body>

</html>