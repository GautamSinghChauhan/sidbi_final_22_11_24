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
extract($_REQUEST);
include_once('../../jackus.php');

echo "{";
echo '"data":[';

	$select_attached_po_document = sqlQUERY_LABEL("SELECT `innerpage_ID`, `innerpages_documents`, `status` FROM `js_innerpages` WHERE `innerpage_ID` = '$id' and `deleted` ='0'") or die("#1-UNABLE_TO_GETTING_ATTACHED_PO_DOCUMENT:".sqlERROR_LABEL());
	while($row = sqlFETCHARRAY_LABEL($select_attached_po_document)):
		$counter++;
		$innerpage_ID  = $row['innerpage_ID'];
		$innerpages_documents = $row['innerpages_documents'];

		$datas .= "{";
		   $datas .= '"count": "'.$counter.'",';
		   $datas .= '"innerpages_documents": "'.$innerpages_documents.'",';
		   $datas .= '"modify": "'.$innerpage_ID.'"';
		$datas .= " },";
	endwhile; //end of while loop

//echo '{"count":"", "categoryname":"", "status":"", "modify":"" }';
$data_formatted = substr(trim($datas), 0, -1);
echo $data_formatted;
echo "]}";
?>