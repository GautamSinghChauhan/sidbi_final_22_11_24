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

if (isset($save_doc) && $save_doc = 'save_doc') :


	$document_title_english = $validation_globalclass->sanitize(($_REQUEST['document_title_english']));
	$document_title_hindi = $validation_globalclass->sanitize(($_REQUEST['document_title_hindi']));
	$year = $validation_globalclass->sanitize(($_REQUEST['year']));
	$document_name = $validation_globalclass->sanitize($_REQUEST['document_name']);

	//Insert Query
	$arrFields = array('`document_title_english`', '`document_title_hindi`', '`year`', '`document_name`', '`createdby`', '`status`');

	$arrValues = array("$document_title_english", "$document_title_hindi", "$year", "$document_name", "$logged_user_id", "$status");


	if (sqlACTIONS("INSERT", "cipos_orders_document", $arrFields, $arrValues, '')) :
		//SUCCESS
		echo "<div style='width: 350px; text-align: center; margin: 10% auto 0px; font-family: arial; font-size: 14px; border: 1px solid #ddd; padding: 20px 40px;'>Please wait while we update...</div>";
	endif;
endif;
?>

<div class="content">
	<div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
		<div class="row">
			<?php if ($route == '') : ?>
				<div class="col-lg-12">
					<div class="row row-xs mg-b-25">
						<div data-label="Example" class="df-example demo-table table-responsive">
							<table id="ciposLIST" class="table table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-5p"><?= $__contentsno ?></th>
										<th class="wd-15p">Title English</th>
										<th class="wd-10p">Title Hindi</th>
										<th class="wd-10p">Year</th>
										<th class="wd-10p"><?= $__status ?></th>
										<th class="wd-10p"><?= $__options ?></th>
									</tr>
								</thead>
							</table>
						</div>
					</div><!-- row -->
				</div><!-- col -->
			<?php elseif (isset($route) && $route == 'preview') : ?>
				<div id="stick-here"></div>
				<div id="stickThis" class="form-group row mg-b-0" style="width: 1185px;">
					<div class="col-9 col-sm-12 mg-l-60 mg-md-l-0 text-right">
						<a href="cpios.php" data-toggle="tooltip" data-original-title="Click to Back" class="btn btn-warning mb-3">Back</a>
					</div>
				</div>
				<?php
				$select_cipos_orders_list = sqlQUERY_LABEL("SELECT `cipos_id`, `title_eng`, `title_hindi`, `year`, `status` FROM `cipos_orders` WHERE `deleted` = '0' and `cipos_id` = '$id' ORDER BY `cipos_id` DESC") or die("#1-Unable to get_PRODUCT_LIST:" . sqlERROR_LABEL());
				while ($row = sqlFETCHARRAY_LABEL($select_cipos_orders_list)) :
					$cipos_id = $row["cipos_id"];
					$title_eng = $row["title_eng"];
					$title_hindi = $row["title_hindi"];
					$year = $row["year"];
					$status = $row["status"];
					if ($status == 1) :
						$status_label = '<span class="text-success tx-bold">Active</span>';
					elseif ($status == 0) :
						$status_label = '<span class="text-danger tx-bold">In-Active</span>';
					endif;
				endwhile;
				?>
				<div class="col-md-12">
					<div class="card">
						<h4 class="card-header text-muted text-uppercase">CIPOS ORDERS</h4>
						<div class="card-body form-group row">
							<div class="col-md-3 border-right mg-t-20 ">
								<div class="text-uppercase">
									<span>Cipos Title English</span>
								</div>
								<div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
									<span><?= $title_eng; ?></span>
								</div>
							</div>
							<div class="col-md-3 border-right mg-t-20 ">
								<div class="text-uppercase">
									<span>Cipos Title Hindi</span>
								</div>
								<div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
									<span><?= $title_hindi; ?></span>
								</div>
							</div>
							<div class="col-md-3 mg-t-20">
								<div class="text-uppercase">
									<span>Year</span>
								</div>
								<div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
									<span><?= $year; ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="upload_document_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true" data-backdrop="static" data-keyboard="false">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content tx-14">
							<div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel2">Please Upload Document</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body receiving-upload-file-data">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="title-content bold-title with-underline green">
												<div class="box-2 features-ul">
													<div class="card-body p-0 row">
														<div class="col-md-12 mb-2">
															<label for="document_title_english" class="form-label">English Title</label>
															<input type="text" class="form-control" id="document_title_english" name="document_title_english" multiple>
														</div>
														<div class="col-md-12 mb-2">
															<label for="document_title_hindi" class="form-label">Hindi Title</label>
															<input type="text" class="form-control" id="document_title_hindi" name="document_title_hindi" multiple>
														</div>
														<div class="col-md-12 mb-2">
															<label for="year" class="form-label">Year</label>
															<input type="text" class="form-control" id="year" name="year" multiple>
														</div>
														<div class="col-md-12 mb-2">
															<label for="document_name" class="form-label">Document Name</label>
															<input type="text" class="form-control" id="document_name" name="document_name" multiple>
														</div>
														<div class="col-md-12 mb-2">
															<label for="documentUpload" class="form-label">Upload Documents</label>
															<input type="file" class="form-control" id="documentUpload" name="documentUpload">
														</div>
														<input type="hidden" name="hidden_cipos_id" value="<?= $cipos_id; ?>" hidden>
														<div class=" col-md-12 mt-3 text-right">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
															<button type="submit" class="btn btn-success" name="save_doc" value="save_doc">Save</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="row row-xs mg-b-25">
						<div class="col-9 col-sm-12 mg-l-60 mg-md-l-0 mt-4 text-right">
							<button type="button" data-toggle="modal" data-target="#upload_document_modal" class="btn btn-success mb-3">+Add Documents</a>
						</div></button>
						<div data-label="Example" class="df-example demo-table table-responsive">
							<table id="ciposfyLIST" class="table table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-5p"><?= $__contentsno ?></th>
										<th class="wd-15p">Document Title English</th>
										<th class="wd-10p">Document Title Hindi</th>
										<th class="wd-10p">Document Name</th>
										<th class="wd-10p"><?= $__status ?></th>
										<th class="wd-10p"><?= $__options ?></th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->