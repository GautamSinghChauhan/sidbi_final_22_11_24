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


if ($type == 'delete') :

	// $check_home_id = sqlQUERY_LABEL("SELECT `home_id` FROM  `home` WHERE `home_id` = '$delete_id'") or die(sqlERROR_LABEL());

		echo "<div class='col-lg-12'>This action cannot be revoked...!!!<br /><br />";
		echo "<hr><a href='menus.php?action=delete&id=" . $delete_id . "' class='btn btn-success btn-sm'>Delete</a>";
		echo "<a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	// else :
	// 	echo "<div class='col-lg-12'>Sorry cannot delete--!!!<br /><br />
	// 		<b class='text-danger'>Reason</b>
	// 		- Recipe is already used and Active. <br /><br />
	// 		</div>";
	// 	echo "<hr><a href='javascript:;' class='btn btn-danger btn-sm' data-dismiss='modal' style='margin-left:20px'> Close</a></div>";
	 
endif;



if ($type == 'changestatus') :

	if ($oldstatus == '1') :
		$status = '0';
	elseif ($oldstatus == '0') :
		$status = '1';
	endif;
    
	//Update query
	$arrFields = array('`status`');

	$arrValues = array("$status");

	$sqlWhere = " `menu_ID` = '$menu_ID' ";

	return sqlACTIONS("UPDATE", "js_megamenu", $arrFields, $arrValues, $sqlWhere);
endif;
