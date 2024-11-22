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

//`projectproduct_id`, `projectproductparentID`, `projectproductname`, `projectproductimage`, `projectproductdescrption`, `projectproductseourl`, `projectproductmetatitle`, `projectproductmetakeywords`, `projectproductmetadescrption`, `projectproductdesignsettings`, `createdby`, `createdon`, `updatedon`, `status`, `deleted` FROM `projectproduct`
if ($type == 'delete') {

	$get_projectproduct_id = sqlQUERY_LABEL("SELECT `projectproduct_id` FROM `projectproduct` WHERE `projectproduct_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_projectproduct_id);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='projectproduct.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$projectproduct_status = '0';
	} elseif ($oldstatus == '0') {
		$projectproduct_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$projectproduct_status");

	$sqlWhere = "projectproduct_id=$projectproduct_id";

	return sqlACTIONS("UPDATE", "projectproduct", $arrFields, $arrValues, $sqlWhere);
}
