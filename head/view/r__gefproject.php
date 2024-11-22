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


	$gef_doc_name = $validation_globalclass->sanitize(($_REQUEST['gef_doc_name']));
	$gef_doc_name_hin = $validation_globalclass->sanitize(($_REQUEST['gef_doc_name_hin']));


	//Insert Query
	$arrFields = array('`gef_doc_name`', '`gef_doc_name_hin`',  '`createdby`', '`status`');

	$arrValues = array("$gef_doc_name", "$gef_doc_name_hin", "$logged_user_id", "$status");


	if (sqlACTIONS("INSERT", "js_gef_documents", $arrFields, $arrValues, '')) :
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
							<table id="gefLIST" class="table table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-5p"><?= $__contentsno ?></th>
										<th class="wd-15p">Title English</th>
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
						<a href="gefproject.php" data-toggle="tooltip" data-original-title="Click to Back" class="btn btn-warning mb-3">Back</a>
					</div>
				</div>
				<?php
				$select_cipos_orders_list = sqlQUERY_LABEL("SELECT `gef_id`, `gef_heading_en`, `gef_heading_hin`, `gef_content_en`, `gef_content_hin`, `gef_title_eng`, `gef_title_hin`, `status` FROM `js_gefproject` WHERE `deleted` = '0' and `gef_id` = '$id' ORDER BY `gef_id` DESC") or die("#1-Unable to get_PRODUCT_LIST:" . sqlERROR_LABEL());
				while ($row = sqlFETCHARRAY_LABEL($select_cipos_orders_list)) :
					$gef_id = $row["gef_id"];
					$gef_heading_en = $row["gef_heading_en"];
					$gef_heading_hin = $row["gef_heading_hin"];
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
						<h4 class="card-header text-muted text-uppercase">GEF PROJECT</h4>
						<div class="card-body form-group row">
							<div class="col-md-3 border-right mg-t-20 ">
								<div class="text-uppercase">
									<span>Project Title English</span>
								</div>
								<div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
									<span><?= $gef_heading_en; ?></span>
								</div>
							</div>
							<div class="col-md-3 border-right mg-t-20 ">
								<div class="text-uppercase">
									<span>Project Title Hindi</span>
								</div>
								<div class="text-muted mg-t-10 text-uppercase" style="letter-spacing: 0.0825em;">
									<span><?= $gef_heading_hin; ?></span>
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
															<label for="gef_doc_name" class="form-label">English Title</label>
															<input type="text" class="form-control" id="gef_doc_name" name="gef_doc_name" multiple>
														</div>
														<div class="col-md-12 mb-2">
															<label for="gef_doc_name_hin" class="form-label">Hindi Title</label>
															<input type="text" class="form-control" id="gef_doc_name_hin" name="gef_doc_name_hin" multiple>
														</div>

														<div class="col-md-12 mb-2">
															<label for="documentUpload" class="form-label">Upload Documents</label>
															<input type="file" class="form-control" id="documentUpload" name="documentUpload">
														</div>
														<input type="hidden" name="hidden_gef_id" value="<?= $gef_id; ?>" hidden>
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
							<table id="gefprojectdocLIST" class="table table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-5p"><?= $__contentsno ?></th>
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