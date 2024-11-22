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

//Insert Operation
if ($save == "save" || $save_close == "save_close") :

	$status = $validation_globalclass->sanitize($_REQUEST['status']);

	if ($status == 'on') :
		$status = '1';
	else :
		$status = '0';
	endif;

	$informationunder_provision = ($_REQUEST['informationunder_provision']);
	$informationunder_provision_hindi = ($_REQUEST['informationunder_provision_hindi']);
	$informationunder_sno = ($_REQUEST['informationunder_sno']);
	$informationunder_detail = ($_REQUEST['informationunder_detail']);
	$informationunder_detail_hindi = ($_REQUEST['informationunder_detail_hindi']);

	
	$informationunder_provision = htmlentities($informationunder_provision);
	$informationunder_provision_hindi = htmlentities($informationunder_provision_hindi);
	$informationunder_detail = htmlentities($informationunder_detail);
	$informationunder_detail_hindi = htmlentities($informationunder_detail_hindi);
	$informationunder_sno = htmlentities($informationunder_sno);


	//Insert Query
	$arrFields = array('`informationunder_provision`', '`informationunder_provision_hindi`', '`informationunder_detail`', '`informationunder_detail_hindi`', '`informationunder_sno`', '`createdby`', '`status`');

	$arrValues = array("$informationunder_provision", "$informationunder_provision_hindi", "$informationunder_detail", "$informationunder_detail_hindi", "$informationunder_sno", "$logged_user_id", "$status");

	if (sqlACTIONS("INSERT", "informationunder", $arrFields, $arrValues, '')) :
		$informationunder_id = sqlINSERTID_LABEL();

		// //Insert Query
		// $arrFields_translations = array('`informationunder_id`', '`language_id`', '`feature`', '`notice`', '`createdby`', '`status`');

		// $arrValues_translations = array("$informationunder_id", "2", "$informationunder_provision_hindi", "$informationunder_detail_hindi", "$logged_user_id", "$status");

		// if (sqlACTIONS("INSERT", "informationunder_translaction", $arrFields_translations, $arrValues_translations, '')) :
		// endif;

		$arrayCount = count($_FILES);


		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";

		if ($save == "save") : ?>
			<script type="text/javascript">
				window.location = 'informationunder.php?route=add&code=1'
			</script>
		<?php else : ?>
			<script type="text/javascript">
				window.location = 'informationunder.php?code=1'
			</script>
<?php
		endif;
		exit();
	else :

		$err[] =  "Unable to Insert Record";
	endif;

endif;
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
								<button type="submit" name="save" value="save" id="save" class="btn btn-success"><?= $__save ?></button>
								<button type="submit" name="save_close" id="save_close" value="save_close" class="btn btn-success"><?= $__save_close ?></button>
							</div>
						</div>

						<!-- BASIC Starting -->
						<div id="basic">
							<div class="divider-text"><?= $__hbasicinfo ?></div>
							<div class="form-group row">
								<label for="status" class="col-sm-2 col-form-label"><?= $__active ?></label>
								<div class="col-sm-7">
									<div class="col-form-label custom-control custom-switch">
										<input type="checkbox" class="custom-control-input" name="status" id="status" checked="">
										<label class="custom-control-label" for="status">Yes</label>
									</div>
								</div>
							</div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="informationunder_sno" class="form-label">sno<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="informationunder_sno" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="informationunder_sno" id="informationunder_sno" placeholder=""></textarea>
                                </div>
                                
                            </div>
							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="informationunder_provision" class="form-label">Provision<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="informationunder_provision" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="informationunder_provision" id="informationunder_provision" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="informationunder_provision" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="informationunder_provision_hindi" id="informationunder_provision_hindi" placeholder=""></textarea>
                                </div>
                            </div>

							<div class="form-group row">
                                <div class="col-md-2">
                                    <label for="informationunder_detail" class="form-label">Detail<span class="tx-danger"></span></label>
                                </div>
                                <div class="col-md-5">
                                    <label for="informationunder_detail" class="form-label">In English<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="informationunder_detail" id="informationunder_detail" placeholder=""></textarea>
                                </div>
                                <div class="col-md-5">
                                    <label for="informationunder_detail" class="form-label">In Hindi<span class="tx-danger"></span></label>
                                    <textarea type="text" class="form-control" name="informationunder_detail_hindi" id="informationunder_detail_hindi" placeholder=""></textarea>
                                </div>
                            </div>
						
				</div>
				<!-- End of BASIC -->

				</form>
			</div>
		</div>
	</div>
</div>
<?php
//$aboutcontent_sidebar_view_type = 'create';
//include viewpath('__aboutcontentsidebar.php');
?>
</div><!-- row -->
</div><!-- container -->
</div><!-- content -->