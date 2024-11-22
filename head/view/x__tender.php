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

	$get_pressrelease_ID = sqlQUERY_LABEL("SELECT `tender_id` FROM `tenders` WHERE `tender_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_pressrelease_ID);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='tender.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'delete_document') {

	echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
	echo "<hr><a href='javascript:;' onclick='confirmDELETE(" . $delete_id . ")' class='btn btn-success btn-sm'>Delete</a>";
	echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
}

if ($type == 'confirm_document_delete') {

	$response = [];
	$sqlWhere = " `tender_document_id` = '$ID' ";

	$delete_document = sqlACTIONS("DELETE", "js_tender_documents", '', '', $sqlWhere);
	if ($delete_document) :
		$response['success'] = true;
	endif;
	echo json_encode($response);
}


if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$tender_status = '0';
	} elseif ($oldstatus == '0') {
		$tender_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$tender_status");

	$sqlWhere = "tender_id=$tender_ID";

	return sqlACTIONS("UPDATE", "tenders", $arrFields, $arrValues, $sqlWhere);
}
