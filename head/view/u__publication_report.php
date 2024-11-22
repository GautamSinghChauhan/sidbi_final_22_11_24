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

//Update Operation
if ($save == "update" && $hidden_publication_ID != '') :
	
	$tender_status = $validation_globalclass->sanitize($_REQUEST['tender_status']);

	if ($tender_status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;
	
	$publication_title = $validation_globalclass->sanitize(ucwords($_REQUEST['publication_title']));
	$publication_hindi_title = $validation_globalclass->sanitize(ucwords($_REQUEST['publication_hindi_title']));

	//Update Query
	$arrFields = array('`publication_title`', '`publication_hindi_title`','`createdby`', '`status`');

	$arrValues = array("$publication_title", "$publication_title_hindi", "$logged_user_id", "$status");

	$sqlWhere = " publication_id = $hidden_publication_ID ";

	if (sqlACTIONS("UPDATE", "js_publication_title", $arrFields, $arrValues, $sqlWhere)) :
      
	

		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		?>
			<script type="text/javascript">
				window.location = 'publication_report.php?code=2'
			</script>
		<?php

		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;
if ($route == 'edit' && $id != '') {

	$list_datas = sqlQUERY_LABEL("SELECT `publication_id`, `publication_title`, `publication_hindi_title`, `createdby`, `status` FROM `js_publication_title` where `publication_id`='$id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($list_datas);
	while ($row = sqlFETCHARRAY_LABEL($list_datas)) {
		$publication_id = $row["publication_id"];
		$publication_title = $row["publication_title"];
		$publication_hindi_title = $row["publication_hindi_title"];
	
		$status = $row["status"];
	}
}
?>


<div class="content">
	<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
		<div class="row">
			<div class="col-lg-12">
				<div class="mg-b-25">

					<form method="post" enctype="multipart/form-data" data-parsley-validate>

						<div id="stick-here"></div>
						<div id="stickThis" class="form-group row mg-b-0">
							<div class="col-3 col-sm-6">
								<?php pageCANCEL($currentpage, $__cancel); ?>
							</div>
							<div class="col-9 col-sm-6 text-right">
								<button type="submit" name="save" value="update" class="btn btn-warning"><?php echo $__update ?></button>
								<input type="hidden" name="hidden_publication_ID" value="<?= $publication_id; ?>" />
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="tender_status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="tender_status" id="tender_status" checked="">
										<label class="custom-control-label" for="tender_status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row align-items-end">
								<div class="col-md-2">
									<label for="publication_title" class="form-label">Publication Title<span class="tx-danger">*</span></label>
								</div>

								<div class="col-md-5">
									<label for="overview_title" class="form-label">In English<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="publication_title" id="publication_title" value="<?= $publication_title; ?>" required autocomplete="off" />
								</div>
								<div class="col-md-5">
									<label for="tender_title_hindi" class="form-label">In Hindi<span class="tx-danger">*</span></label>
									<input type="text" class="form-control" name="publication_title_hindi" id="publication_title_hindi" value="<?= $publication_hindi_title; ?>" required autocomplete="off" />
								</div>
							</div>

                        </div>
						<!-- End of BASIC -->
						
						<!-- DOCUMENT Starting -->
						
						<!-- End of DOCUMENT -->
						
					</form>
				</div><!-- row -->
			</div><!-- col -->
			
			
			<?php
			//$aboutcontent_sidebar_view_type = 'create';
			//include viewpath('__aboutcontentsidebar.php');
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->