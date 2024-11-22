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

if ($type == 'delete'):
		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='financialreport.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
endif;

if ($type == 'changestatus') {

	if ($oldstatus == 1) {
		$status = 0;
	} elseif ($oldstatus == 0) {
		$status = 1;
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$status");

	$sqlWhere = " `financial_report_id` = '$financial_report_id' ";

	$return_result = sqlACTIONS("UPDATE", "financial_reports", $arrFields, $arrValues, $sqlWhere);
	$return_result = sqlACTIONS("UPDATE", "financial_report_translations", $arrFields, $arrValues, $sqlWhere);
}