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

//conditioning
if (!empty($show)) :
	$showcondition = "and `status`='$show'";
endif;

$counter = 0;
$dataArray = [];

$list_branch_datas = sqlQUERY_LABEL("SELECT `branch_id`, `branch_location`, `branch_location_hindi`, `branch_name`, `branch_name_hindi`, `branch_contact`, `branch_email`, `branch_address`, `branch_address_hindi`, `status` FROM `branch` where deleted = '0' order by branch_id ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());



	while ($row = sqlFETCHARRAY_LABEL($list_subsidiary_banner_datas)) {
	$counter++;
	$branch_id = $row["branch_id"];
	$branch_location = $row['branch_location'];
	$branch_location_hindi = $row['branch_location_hindi'];
	$branch_name = $row['branch_name'];
	$branch_name_hindi = $row['branch_name_hindi'];
	$branch_email = $row['branch_email'];
	$branch_contact = $row['branch_contact'];
	$branch_address = $row['branch_address'];
	$branch_address_hindi = $row['branch_address_hindi'];

	
	// $director_description = $row['director_description'];
	$status = $row["status"];
    $dataArray[] = [
	"count" => $counter,
	"branch_location" => $branch_location,
	"branch_location_hindi" => $branch_location_hindi,
	"branch_name" => $branch_name,
	"branch_name_hindi" => $branch_name_hindi,
	"branch_email" => $branch_email,
	"branch_contact" => $branch_contact,
	"branch_address" => $branch_address,
	"branch_address_hindi" => $branch_address_hindi,
	"status" => $status,
	"modify" => $branch_id
];
}

$output = ["data" => $dataArray];

echo json_encode($output);