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

	$get_reservation_roster_ID = sqlQUERY_LABEL("SELECT `reservation_roster_id` FROM `reservation_roster` WHERE `reservation_roster_id` = '$delete_id'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_reservation_roster_ID);

	if ($count_rows == '1') {

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='reservation_roster.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	}
}

if ($type == 'changestatus') {

	if ($oldstatus == '1') {
		$reservation_roster_status = '0';
	} elseif ($oldstatus == '0') {
		$reservation_roster_status = '1';
	}

	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$reservation_roster_status");

	$sqlWhere = "reservation_roster_id=$reservation_roster_ID";

	return sqlACTIONS("UPDATE", "reservation_roster", $arrFields, $arrValues, $sqlWhere);
}