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

if ($type == 'delete') {

	$get_other_loans_ID = sqlQUERY_LABEL("SELECT `other_loans_id` FROM `other_loans` WHERE `other_loans_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_other_loans_ID);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='other_loans.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$other_loans_status = '0';
	} elseif ($oldstatus == '0') {
		$other_loans_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$other_loans_status");

	$sqlWhere = "other_loans_id=$other_loans_ID";

	return sqlACTIONS("UPDATE", "other_loans", $arrFields, $arrValues, $sqlWhere);
}