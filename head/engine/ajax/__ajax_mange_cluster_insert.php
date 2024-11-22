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

extract($_REQUEST);
include_once('../../jackus.php');

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) : //CHECK AJAX REQUEST
	if ($_GET['type'] == 'add') :
   $name =$_POST['full_name'];
   $occupation =$_POST['occupation'];
   $gender =$_POST['gender'];
   $category =$_POST['category'];
   $otherocc =$_POST['otherocc'];
   $email =$_POST['email'];
   $email_otp =$_POST['email_otp'];
  

			$arrFields = array('`full_name`','`occupation`','`gender`','`category`','`other_occupation`','`email`','`verfication_code`','`createdby`', '`status`');
			$arrValues = array("$name","$occupation", "$gender", "$category","$otherocc", "$email", "$email_otp", "$logged_user_id", "1");

		// 	if ($hidden_BANK_ID != '' && $hidden_BANK_ID != 0 && (!empty($hidden_BANK_ID))) :

		// 		$sqlwhere = "`bank_id` = '$hidden_BANK_ID' ";
		// 		//UPDATE BANK DETAILS
		// 		if (sqlACTIONS("UPDATE", "gs_bank", $arrFields, $arrValues, $sqlwhere)) :
		// 			//SUCCESS
		// 			$response['result'] = true;
		// 			$response['result_success'] = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">Bank Updated Successfully !!! <button class="btn-close ms-5" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button></div>';
		// 		else :
		// 			$response['result'] = false;
		// 			$response['result_error'] = 'Something went wrong !!!';
		// 		endif;
		// 	else :
		// 		//INSERT BANK DETAILS
				if (sqlACTIONS("INSERT", "js_msmedownload", $arrFields, $arrValues, '')) :
		// 			//SUCCESS
					$response['result'] = true;
		// 			$response['result_success'] = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">Bank Created Successfully !!! <button class="btn-close ms-5" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button></div>';
				else :
					$response['result'] = false;
		// 			$response['result_error'] = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between" role="alert">Unable to Create the Bank !!! <button class="btn-close ms-5" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button></div>';
				endif;
		// 	endif;
		// endif;
		echo json_encode($response);
    endif;
endif;