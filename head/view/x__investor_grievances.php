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

	$get_investor_grievances_ID = sqlQUERY_LABEL("SELECT `investor_grievances_id` FROM `investor_grievances` WHERE `investor_grievances_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_investor_grievances_ID);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='investor_grievances.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$investor_grievances_status = '0';
	} elseif ($oldstatus == '0') {
		$investor_grievances_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$investor_grievances_status");

	$sqlWhere = " `investor_grievances_id` = $investor_grievances_ID ";

	return sqlACTIONS("UPDATE", "investor_grievances", $arrFields, $arrValues, $sqlWhere);
}