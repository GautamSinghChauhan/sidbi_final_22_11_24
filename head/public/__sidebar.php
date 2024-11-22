<?php

if ($currentpage == 'dashboard.php') {
  $dashboard_active = "active";
}

if ($currentpage == 'tender.php') {
  $tender_active = "active";
}

?>
<aside class="aside aside-fixed">

  <div class="aside-header">
    <a href="./index" class="aside-logo"><img src="public/img/logo.png" alt="enquiry" width="50">
      <span class="mt-5">SIDBI</span></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <div class="aside-loggedin">
      <!-- <div class="d-flex align-items-center justify-content-start">

    <div class="aside-header">
        <a href="./index" class="aside-logo"><img src="public/img/logo.png" alt="enquiry" width="50">
            <span class="mt-5">SIDBI</span></a>
        <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
        </a>
    </div>
    <div class="aside-body">
        <div class="aside-loggedin">

            <div class="d-flex align-items-center justify-content-start">

            <a href="" class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></a>
            <div class="aside-alert-link">
              <a href="" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
              <a href="" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>
              <a href="" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
            </div>
          </div>
          <div class="aside-loggedin-user">
            <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
              <h6 class="tx-semibold mg-b-0">Katherine Pechon</h6>
              <i data-feather="chevron-down"></i>
            </a>
            <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
          </div> -->
      <div class="collapse" id="loggedinMenu">
        <ul class="nav nav-aside mg-b-0">
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="edit"></i> <span>Edit
                Profile</span></a></li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="user"></i> <span>View
                Profile</span></a></li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="settings"></i> <span>Account
                Settings</span></a></li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="help-circle"></i> <span>Help
                Center</span></a></li>
          <li class="nav-item"><a href="" class="nav-link"><i data-feather="log-out"></i> <span>Sign
                Out</span></a></li>
        </ul>
      </div>
    </div><!-- aside-loggedin -->
    <ul class="nav nav-aside">
      <li class="nav-item <?= $dashboard_active; ?>"><a href="dashboard.php" class="nav-link"><span>Dashboard</span></a></li>

      <li class="nav-item with-sub mg-t-25">
        <a href="" class="nav-link"><span>About</span></a>
        <ul>
          <li><a href="overview.php?route=edit"> - Overview</a></li>
          <li><a href="missionandvision.php?route=edit"> - Mission & Vision</a></li>
          <li><a href="boardofdirector.php"> - Board of Directors</a></li>
          <li><a href="page-groups.html"> - Historical Joureny</a></li>
          <li><a href="page-events.html"> - Financials</a></li>
        </ul>
      </li>

      <li class="nav-item with-sub mg-t-25">
        <a href="" class="nav-link"><span>Corporate</span></a>
        <ul>
          <li><a href="page-profile-view.html"> - Inforamtion / Policies</a></li>
          <li><a href="page-connections.html"> - Chife Grievance Officer</a></li>
          <li><a href="page-groups.html"> - Complaints</a></li>
          <li><a href="page-events.html"> - Listing Disclosures</a></li>
        </ul>
      </li>
      <ul class="nav nav-aside">
        <li class="nav-item  <?= $tender_active; ?>"><a href="tender.php" class="nav-link"><span>Tender</span></a></li>


        <li class="nav-item with-sub mg-t-25">
          <a href="" class="nav-link"><span>Media</span></a>
          <ul>
            <li><a href="pressrelease.php"> - Press Release</a></li>
            <li><a href="page-connections.html"> - SIDBI News</a></li>
            <li><a href="page-groups.html"> - Social Media</a></li>
            <li><a href="page-events.html"> - Videos / Photos</a></li>
            <li><a href="page-events.html"> - Press Coverage</a></li>

          </ul>
        </li>

        <li class="nav-item"><a href="innerpage.php" class="nav-link"><span>Inner Pages</span></a></li>
        <li class="nav-item with-sub mg-t-25">
          <a href="" class="nav-link"><span>Contact Us</span></a>
          <ul>
            <li><a href="enquiries.php"> - Enquiry</a></li>
            <li><a href="page-connections.html"> - SIDBI News</a></li>
            <li><a href="page-groups.html"> - Social Media</a></li>
            <li><a href="page-events.html"> - Videos / Photos</a></li>
            <li><a href="page-events.html"> - Press Coverage</a></li>

          </ul>
        </li>

        <li class="nav-item with-sub mg-t-25">
          <a href="" class="nav-link"><span>General</span></a>
          <ul>
            <li><a href="page-profile-view.html"> - Header</a></li>
            <li><a href="page-connections.html"> - Footer</a></li>
            <li><a href="page-groups.html"> - Social Media</a></li>
            <li><a href="page-events.html"> - Main Menu</a></li>
            <li><a href="page-events.html"> - Master</a></li>
            <li><a href="disclaimer"> - Disclaimer</a></li>

          </ul>
        </li>

        <li class="nav-item with-sub mg-t-25">
          <a href="" class="nav-link"><span>Configuration</span></a>
          <ul>
            <li><a href="page-profile-view.html"> - Site Setting</a></li>
            <li><a href="page-connections.html"> - Email Configuration</a></li>
            <li><a href="rolepermission.php"> - Role Permission</a></li>
            <li><a href="pagemenu.php"> - Page Menu</a></li>
            <li><a href="page-events.html"> - Log out</a></li>
          </ul>
        </li>





      </ul>
  </div>
</aside>