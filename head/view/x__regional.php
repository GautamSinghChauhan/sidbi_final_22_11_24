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

//`regional_id`, `regionalparentID`, `regionalname`, `regionalimage`, `regionaldescrption`, `regionalseourl`, `regionalmetatitle`, `regionalmetakeywords`, `regionalmetadescrption`, `regionaldesignsettings`, `createdby`, `createdon`, `updatedon`, `status`, `deleted` FROM `regional`
if ($type == 'delete') {

	$get_regional_id = sqlQUERY_LABEL("SELECT `regional_id` FROM `regional` WHERE `regional_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_regional_id);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='regional.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$regional_status = '0';
	} elseif ($oldstatus == '0') {
		$regional_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$regional_status");

	$sqlWhere = "regional_id=$regional_id";

	return sqlACTIONS("UPDATE", "regional", $arrFields, $arrValues, $sqlWhere);
}
