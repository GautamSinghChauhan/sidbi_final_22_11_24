<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2018-2020 Touchmark De`Science
*
*/
//Dont place PHP Close tag at the bottom
protectpg_includes();
?>
<div class="content">
  <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
    <div class="row">
      <div class="col-lg-12">
        <div class="row row-xs mg-b-25">

          <div data-label="Example" class="df-example demo-table table-responsive">
            <table id="branchLIST" class="table table-bordered">
              <thead>
                <tr>
                  <th class="wd-5p"><?= $__contentsno ?></th>
                  <th class="wd-25p">Location</th>
                  <th class="wd-25p">Name</th>
                  <th class="wd-25p">Contact No</th>
                  <th class="wd-25p">Email</th>
                  <!-- <th class="wd-25p">Address</th> -->
                  <th class="wd-10p"><?= $__status ?></th>
                  <th class="wd-10p"><?= $__options ?></th>
                </tr>
              </thead>
            </table>
          </div>

        </div><!-- row -->
      </div><!-- col -->

      <?php
      include viewpath('__branchsidebar.php');
      ?>

    </div><!-- row -->
  </div><!-- container -->
</div><!-- content -->