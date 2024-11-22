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

extract($_REQUEST);
include_once('../jackus.php');

if($type == 'delete') {
	
		$check_enquiries_AVAILABLE = sqlQUERY_LABEL("select * from  js_enquiryform where `enquiryform_ID`='$delete_id' and status='1'") or die(sqlERROR_LABEL());
	
			$count_rows = sqlNUMOFROW_LABEL($check_enquiries_AVAILABLE);
		
			echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /> Do you want to move the contents to trash?<br />";
			echo "<hr><a href='enquiries.php?action=delete&id=".$delete_id."' class='btn btn-success btn-sm'>Delete</a>";
			echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";	
	}

if($type == 'changestatus') {
	
	if($oldstatus == '1') {
		$status = '0';
	} elseif($oldstatus == '0') {
		$status = '1';
	}
	
	//Update query
	$arrFields=array('`status`');

	$arrValues=array("$status");

	$sqlWhere= "enquiryform_ID=$enquiryform_ID";
	return sqlACTIONS("UPDATE","js_enquiryform",$arrFields,$arrValues, $sqlWhere);
}

if ($type == 'trash_delete') {

	$get_pressrelease_trash_ID = sqlQUERY_LABEL("SELECT `enquiryform_ID` FROM `js_enquiryform` WHERE `deleted` = '1'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_pressrelease_trash_ID);

	if ($count_rows >= '0') {
		echo "<div class='col-lg-12'>Do you want to permanently delete these trashed contents ?<br />";
		echo "<hr><a href='enquiries.php?action=clear_trash' class='btn btn-success btn-sm'>Clear Trash</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Cancel</a></div>";
	}
}
