<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2018-2019 Touchmark Descience Pvt Ltd
*
*/

/****************** get Common Status - detail ****************/
function getEMAILCONFIG($requesttype)
{


	/*****************  SELECT OPTION   *****************/

	$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_emailconfig` where `emailconfigID`='1'") or die("#STATUS-LABEL: Getting Status: " . sqlERROR_LABEL());
	while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
		$from_name = $getstatus_fetch['from_name'];
		$from_address = $getstatus_fetch['from_address'];
		$cc_address = $getstatus_fetch['cc_address'];
		$bgcolor = $getstatus_fetch['bgcolor'];
		$body_bgcolor = $getstatus_fetch['body_bgcolor'];
		$footer_text = $getstatus_fetch['footer_text'];
		$header_image = $getstatus_fetch['header_image'];
	}
	if ($requesttype == 'from_name') {
		return $from_name;
	}
	if ($requesttype == 'from_address') {
		return $from_address;
	}
	if ($requesttype == 'cc_address') {
		return $cc_address;
	}
	if ($requesttype == 'logo') {
		return $logo = SEOURL . 'uploads/email_logo/' . $header_image;
	}
	if ($requesttype == 'bgcolor') {
		return  $bgcolor;
	}
	if ($requesttype == 'body_bgcolor') {
		return  $body_bgcolor;
	}
	if ($requesttype == 'footer') {
		return  $footer = html_entity_decode($footer_text);
	}
}
/****************** get Common Status - detail ****************/

function getCOMMONSTATUS($selected_status_type, $selected_status_id, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `status_id`, `status_title` FROM `js_status` where `status_type`='$selected_status_type' order by status_id ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$status_id = $getstatus_fetch['status_id'];
			$status_title = $getstatus_fetch['status_title'];
?>
			<option value='<?php echo $status_id; ?>' <?php if ($selected_status_id == $status_id) {
															echo "selected";
														} ?>>
				<?php echo $status_title; ?>
			</option>
			<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `status_title` FROM `js_status` where `status_id`='$selected_status_id' and `status_type`='$selected_status_type'") or die("#STATUS-LABEL: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$status_title = $getstatus_fetch['status_title'];
			return $status_title;
		}
	}
}
/****************** end of Common Status - detail ****************/

function getPRODUCTCATEGORY($selected_id, $reason, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select' && $reason == '') {

		$list_parentcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' and status='1' order by categoryparentID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		$count_parentcateogry_list = sqlNUMOFROW_LABEL($list_parentcategory_datas);

		while ($row = sqlFETCHARRAY_LABEL($list_parentcategory_datas)) {
			$categoryID = $row["categoryID"];
			$categoryname = $row["categoryname"];
			$categoryparentID = $row["categoryparentID"];

			if ($categoryparentID == '0') {
				//generated sub-category details
				$list_subcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' and status='1' and `categoryparentID`='$categoryID' order by categoryparentID ASC") or die("#2-Unable to get records:" . sqlERROR_LABEL());
				$count_subcateogry_list = sqlNUMOFROW_LABEL($list_subcategory_datas);
			?>
				<option value="<?php echo $categoryID; ?>"><?php echo $categoryname; ?></option>
				<?php

			} //end of parent category check

			//checking sub category
			if ($count_subcateogry_list > 0) {
				while ($subrow = sqlFETCHARRAY_LABEL($list_subcategory_datas)) {
					$subcategoryID = $subrow["categoryID"];
					$subcategoryname = $subrow["categoryname"];
				?>
					<option value="<?php echo $subcategoryID; ?>">---|<?php echo $subcategoryname; ?></option>
				<?php
				} //end of while loop
			} //end of sub catggory - count

		}
	} else if ($requesttype == 'select' && $reason == 'simpleselect') {      ///only single category selected

		$list_parentcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' order by categoryparentID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		$count_parentcateogry_list = sqlNUMOFROW_LABEL($list_parentcategory_datas);

		while ($row = sqlFETCHARRAY_LABEL($list_parentcategory_datas)) {
			$categoryID = $row["categoryID"];
			$categoryname = $row["categoryname"];
			$categoryparentID = $row["categoryparentID"];

			if ($categoryparentID == '0') {
				//generated sub-category details
				$list_subcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' and `categoryparentID`='$categoryID' order by categoryparentID ASC") or die("#2-Unable to get records:" . sqlERROR_LABEL());
				$count_subcateogry_list = sqlNUMOFROW_LABEL($list_subcategory_datas);
				?>
				<option value="<?php echo $categoryID; ?>" <?php if ($selected_id == $categoryID) {
																echo 'selected="selected"';
															} ?>><?php echo $categoryname; ?></option>
				<?php

			} //end of parent category check

			//checking sub category
			if ($count_subcateogry_list > 0) {
				while ($subrow = sqlFETCHARRAY_LABEL($list_subcategory_datas)) {
					$subcategoryID = $subrow["categoryID"];
					$subcategoryname = $subrow["categoryname"];
				?>
					<option value="<?php echo $subcategoryID; ?>" <?php if ($selected_id == $subcategoryID) {
																		echo 'selected="selected"';
																	} ?>>---|<?php echo $subcategoryname; ?></option>
				<?php
				} //end of while loop
			} //end of sub catggory - count

		}
	} else if ($requesttype == 'select' && $reason == 'multiselect') {
		//multiselect
		$prdt_mcategory = explode(",", $selected_id);

		$list_parentcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' order by categoryparentID ASC") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		$count_parentcateogry_list = sqlNUMOFROW_LABEL($list_parentcategory_datas);

		while ($row = sqlFETCHARRAY_LABEL($list_parentcategory_datas)) {
			$categoryID = $row["categoryID"];
			$categoryname = $row["categoryname"];
			$categoryparentID = $row["categoryparentID"];
			if (in_array($categoryID, $prdt_mcategory)) $str_category = "selected";
			else $str_category = "";

			if ($categoryparentID == '0') {
				//generated sub-category details
				$list_subcategory_datas = sqlQUERY_LABEL("SELECT `categoryID`, `categoryparentID`, `categoryname`, `status` FROM `js_category` where deleted = '0' and `categoryparentID`='$categoryID' order by categoryparentID ASC") or die("#2-Unable to get records:" . sqlERROR_LABEL());
				$count_subcateogry_list = sqlNUMOFROW_LABEL($list_subcategory_datas);
				?>
				<option value="<?php echo $categoryID; ?>" <?php echo $str_category; ?>><?php echo $categoryname; ?></option>
				<?php

			} //end of parent category check

			//checking sub category
			if ($count_subcateogry_list > 0) {
				while ($subrow = sqlFETCHARRAY_LABEL($list_subcategory_datas)) {
					$subcategoryID = $subrow["categoryID"];
					$subcategoryname = $subrow["categoryname"];
					if (in_array($subcategoryID, $prdt_mcategory)) $str_subcategory = "selected";
					else $str_subcategory = "";
				?>
					<option value="<?php echo $subcategoryID; ?>" <?php echo $str_subcategory; ?>>---|<?php echo $subcategoryname; ?></option>
		<?php
				} //end of while loop
			} //end of sub catggory - count

		}
	}

	/*****************  SHOW LABEL  *****************/
	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT categoryname FROM `js_category` where `categoryID` = '$selected_id'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['categoryname'];
			}
		} else {
			return '--';
		}
	}
}

function getPARENTCategory($selected_type_id, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {

		$selected_query = sqlQUERY_LABEL("SELECT categoryID, categoryname FROM `js_category` where `categoryparentID` = '0' and `deleted` = '0' and `status` = '1'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		?>
		<option value="0">No Parent Category</option>
		<?php
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$categoryID = $fetch_data['categoryID'];
			$categoryname = $fetch_data['categoryname'];
		?>
			<option value="<?php echo $categoryID; ?>" <?php if ($selected_type_id == $categoryID) {
															echo "selected";
														} ?>><?php echo $categoryname; ?></option>
			<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT categoryname FROM `js_category` where `categoryparentID` = '$selected_type_id'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['categoryname'];
			}
		} else {
			return '--';
		}
	}
}

//setting page - multiple select option
function getsettingsFRONTPAGEPRODUCTS($selected_product_id, $requesttype)
{

	$product_list_array = explode(",", $selected_product_id);

	foreach ($product_list_array as $selectedproduct) {

		$selectedproduct_id = trim($selectedproduct);

		$list_product_datas = sqlQUERY_LABEL("SELECT `productID`, `producttitle`, `productsku` FROM `js_product` where productsku = '$selectedproduct_id' and  deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		$count_product_list = sqlNUMOFROW_LABEL($list_product_datas);

		if ($count_product_list > 0) {

			while ($row = sqlFETCHARRAY_LABEL($list_product_datas)) {
				$productID = $row["productID"];
				$producttitle = limit_words($row["producttitle"], 8);
				$producttitle = str_replace("\'", "'", $producttitle);

				$productsku = $row["productsku"];
			?>
				<option value="<?php echo $productsku; ?>" selected="selected"><?php echo $productsku . '-' . $producttitle; ?></option>
		<?php
			}
		}
	}
}

//Display Image Size
function getDISPLAYIMAGESIZE($selected_status_id, $requesttype)
{


	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select') { ?>

		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Small </option>

		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Medium </option>

		<option value='3' <?php if ($selected_status_id == '3') {
								echo "selected";
							} ?>> Large </option>

	<?php

	}

	if ($requesttype == 'label') {

		if ($selected_status_id == '1') {

			return "Small";
		}

		if ($selected_status_id == '2') {

			return  "Medium";
		}

		if ($selected_status_id == '3') {

			return  "Large";
		}
	}
}

//Display Footer Size
function getDISPLAYFOOTERSIZE($selected_status_id, $requesttype)
{


	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select') { ?>

		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Size x 2 </option>

		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Size x 3 </option>

	<?php

	}

	if ($requesttype == 'label') {

		if ($selected_status_id == '1') {

			return "Size x 2";
		}

		if ($selected_status_id == '2') {

			return  "Size x 3";
		}
	}
}

function getcustomerGROUP($selected_type_id, $requesttype)
{



	if ($requesttype == 'select') {

		$selected_query = sqlQUERY_LABEL("SELECT * FROM `js_customergroup` where `deleted` = '0' and `status` = '1'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
	?>
		<option value=""> Choose Customer Title </option>
		<?php
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$customergroupID = $fetch_data['customergroupID'];
			$customergrouptitle = $fetch_data['customergrouptitle'];
		?>
			<option value="<?php echo $customergroupID; ?>" <?php if ($selected_type_id == $customergroupID) {
																echo "selected";
															} ?>><?php echo $customergrouptitle; ?></option>
		<?php

		}
	} //end of select


	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT customergrouptitle FROM `js_customergroup` where `deleted` = '0' and `customergroupID` = '$selected_type_id'") or die("#CUSTOMGROUP-LABEL: Getting Custom Group: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['customergrouptitle'];
			}
		} else {
			return '--';
		}
	}
}

//Display Mode
function getDISPLAYMODE($selected_status_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Grid Only </option>
		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> List Only </option>
	<?php
	}
}

//Display Mode
function getPRODUCTSORTBY($selected_status_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Name </option>
		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Created On </option>
		<option value='3' <?php if ($selected_status_id == '3') {
								echo "selected";
							} ?>> Position </option>
	<?php
	}
}

function getGENDER($selected_status_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Male </option>
		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Female </option>
		<option value='3' <?php if ($selected_status_id == '3') {
								echo "selected";
							} ?>> Trangender </option>
	<?php
	}
	if ($requesttype == 'label') {
		if ($selected_status_id == '1') {
			return 'Male';
		}
		if ($selected_status_id == '2') {
			return 'Female';
		}
		if ($selected_status_id == '3') {
			return 'Trangender';
		}
	}
}

//Time Zone
function getTIMEZONE($selected_status_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Asia / Kolkotta </option>

	<?php
	}

	if ($requesttype == 'label') {

		if ($selected_status_id == '1') {

			return "Asia / Kolkotta";
		}
	}
}

//Language
function getLANGUAGE($selected_status_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> English</option>
		<?php
	}
}

//Currency
function getCUREENCY($selected_type_id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {
		$selected_query = sqlQUERY_LABEL("SELECT * FROM `js_currency_code`") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$id_countries = $fetch_data['id_countries'];
			$name = $fetch_data['name'];
		?>
			<option value="<?php echo $id_countries; ?>" <?php if ($selected_type_id == $id_countries) {
																echo "selected";
															} ?>><?php echo $name; ?></option>
		<?php
		}
	}
	/*****************  label  *****************/
	if ($requesttype == 'currrency_symbol') {
		$selected_query = sqlQUERY_LABEL("SELECT currrency_symbol FROM `js_currency_code` where id_countries='$selected_type_id'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			echo $fetch_data['currrency_symbol'];
		}
	}
}

//Country
function getCOUNTRY($selected__id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='' <?php if ($selected__id == '0' || $selected__id == '') {
								echo "selected";
							} ?>> Select Country </option>
		<?php

		$selected_query = sqlQUERY_LABEL("SELECT country_id, country_name FROM `js_country` where status = '1' and deleted = '0'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$country_id = $fetch_data['country_id'];
			$country_name = $fetch_data['country_name'];
		?>
			<!-- <option value="<?php echo $country_id; ?>" <?php if ($selected__id == $country_id) {
																echo "selected";
															} ?>><?php echo $country_name; ?></option> -->
			<option value="<?php echo $country_id; ?>" selected><?php echo $country_name; ?></option>
		<?php
		}
	}

	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT country_id, country_name FROM `js_country` where status = '1' and country_id = '$selected__id'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		$fetch_data = sqlFETCHARRAY_LABEL($selected_query);
		$country_name = $fetch_data['country_name'];
		return $country_name;
	}
}

function getSTATE($selected__id, $selected_country, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected__id == '0' || $selected__id == '') {
								echo "selected";
							} ?>> Select State </option>
		<?php
		if ($selected_country != '') {
			$selected_query = sqlQUERY_LABEL("SELECT state_id, state_name FROM `js_state` where country_id = '$selected_country' and status = '1' and deleted = '0' order by state_name ASC") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				$state_id = $fetch_data['state_id'];
				$state_name = $fetch_data['state_name'];
		?>
				<option value="<?php echo $state_id; ?>" <?php if ($selected__id == $state_id) {
																echo "selected";
															} ?>><?php echo $state_name; ?></option>
			<?php
			}
		} else {
			$selected_query = sqlQUERY_LABEL("SELECT state_id, state_name FROM `js_state` where status = '1' and deleted = '0' order by state_name ASC") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				$state_id = $fetch_data['state_id'];
				$state_name = $fetch_data['state_name'];
			?>
				<option value="<?php echo $state_id; ?>" <?php if ($selected__id == $state_id) {
																echo "selected";
															} ?>><?php echo $state_name; ?></option>
		<?php
			}
		}
	}

	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT state_id, state_name FROM `js_state` where  country_id = '$selected_country' and status = '1' and state_id = '$selected__id'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		$fetch_data = sqlFETCHARRAY_LABEL($selected_query);
		$state_name = $fetch_data['state_name'];
		return $state_name;
	}
}

function getCITY($selected__id, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected__id == '0' || $selected__id == '') {
								echo "selected";
							} ?>> Select City </option>
		<?php
		$selected_query = sqlQUERY_LABEL("SELECT city_id, city_title FROM `js_city` where status = '1' and deleted = '0' order by city_title ASC") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$city_id = $fetch_data['city_id'];
			$city_title = $fetch_data['city_title'];
		?>
			<option value="<?php echo $city_id; ?>" <?php if ($selected__id == $city_id) {
														echo "selected";
													} ?>><?php echo $city_title; ?></option>
		<?php
		}
	}

	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT city_id, city_title FROM `js_city` where  city_id = '$selected__id' and status = '1'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		$fetch_data = sqlFETCHARRAY_LABEL($selected_query);
		$city_title = $fetch_data['city_title'];
		return $city_title;
	}
}

//To get Email Template
function getEMAILTEMPLATE($selected_type_id, $requesttype)
{

	if ($requesttype == 'select') {

		$selected_query = sqlQUERY_LABEL("SELECT * FROM `js_emailtemplate` where `deleted` = '0' and `status` = '1'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		?>
		<option value="">Choose Template </option>
		<?php
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$template_ID = $fetch_data['template_ID'];
			$template_name = $fetch_data['template_name'];
		?>
			<option value="<?php echo $template_ID; ?>" <?php if ($selected_type_id == $template_ID) {
															echo "selected";
														} ?>><?php echo $template_name; ?></option>
		<?php

		}
	} //end of select

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT template_name FROM `js_emailtemplate` where `deleted` = '0' and `template_ID` = '$selected_type_id'") or die("#CUSTOMGROUP-LABEL: Getting Custom Group: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['template_name'];
			}
		} else {
			return '--';
		}
	}
}

//To get New Order Confirmation
function getNEWORDERCONFIRMATION($selected_type_id, $requesttype)
{

	if ($requesttype == 'select') { ?>
		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> General Contact </option>
		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Sales Representative </option>
		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Customer Support </option>
		<?php
	}
}

//To get Single Field Value
function getSINGLEDBVALUE($requested_fieldvalue, $request_wherecondition, $requested_table, $requesttype)
{

	/*****************  SHOW LABEL   *****************/
	if ($requesttype == 'label') {
		$selected_query = sqlQUERY_LABEL("SELECT $requested_fieldvalue FROM `$requested_table` where $request_wherecondition") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data[$requested_fieldvalue];
			}
		} else {
			return 'N/A';
		}
	}
}


function getodSTATUS($selected_type_id)
{

	/*****************  SHOW LABEL   *****************/
	if ($selected_type_id == '1') {
		$status = "<h6 class='badge btn-success'>Paid</h6>";
	} elseif ($selected_type_id == '2') {
		$status = "<h6 class='badge btn-secondary'>Cancelled</h6>";
	} elseif ($selected_type_id == '3') {
		$status = "<h6 class='badge btn-warning'>Pending</h6>";
	} elseif ($selected_type_id == '4') {
		$status = "<h6 class='badge btn-danger' class='text-success'>Awaiting Bank Wire Payment</h6>";
	} elseif ($selected_type_id == '5') {
		$status = "<h6 class='badge btn-info' >Under Shipment</h6></br>";
	} elseif ($selected_type_id == '6') {
		$status = "<h6 class='badge btn-dark' >Delivered</h6>";
	} elseif ($selected_type_id == '7') {
		$status = "<h6 class='badge btn-light'>Courier Process</h6>";
	} elseif ($selected_type_id == '8') {
		$status = "<h6 class='badge btn-primary'>New</h6>";
	}
	return $status;
}

function getpaymentSTATUS($selected_type_id)
{

	/*****************  SHOW LABEL   *****************/
	if ($selected_type_id == '1') {
		$status = "<h6 class='text-success'>paid</h6>";
	} elseif ($selected_type_id == '2') {
		$status = "<h6 class='text-secondary'>Cancelled</h6>";
	} else {
		$status = "<h6 class='text-warning' class='text-info'>Pending</h6>";
	}
	return $status;
}

function getCUSTOMERADDRESS($selected_type_id, $requesttype)
{

	/*****************  SHOW LABEL   *****************/
	$list_datas = sqlQUERY_LABEL("SELECT * FROM `js_shop_order` where od_id='$selected_type_id' order by od_id desc") or die("Unable to get records:" . sqlERROR_LABEL());

	$fetch_list = sqlNUMOFROW_LABEL($list_datas);

	while ($fetch_records = sqlFETCHARRAY_LABEL($list_datas)) {
		$od_shipping_address1 = $fetch_records['od_shipping_address1'];
		$od_shipping_address2 = $fetch_records['od_shipping_address2'];
		$od_shipping_city = $fetch_records['od_shipping_city'];
		$od_shipping_state = $fetch_records['od_shipping_state'];
		$od_shipping_postal_code = $fetch_records['od_shipping_postal_code'];
		$od_shipping_country = $fetch_records['od_shipping_country'];
		$od_shipping_state = getSTATE($od_shipping_state, $od_shipping_country, 'label');
		$shipping = $od_shipping_address1 . ',' . $od_shipping_address2 . ',' . $od_shipping_city . ',' . $od_shipping_state . ',' . $od_shipping_postal_code . ',' . getCOUNTRY($od_shipping_country, 'label') . '.';

		$od_payment_address1 = $fetch_records['od_payment_address1'];
		$od_payment_address2 = $fetch_records['od_payment_address2'];
		$od_payment_city = $fetch_records['od_payment_city'];
		$od_payment_state = $fetch_records['od_payment_state'];
		$od_payment_postal_code = $fetch_records['od_payment_postal_code'];
		$od_payment_country = $fetch_records['od_payment_country'];
		$od_payment_mode = $fetch_records['od_payment_mode'];

		if ($od_payment_address1 != '') {
			$billing .= $od_payment_address1;
		}

		if ($od_payment_address2 != '') {
			$billing .= ',' . $od_payment_address2;
		}

		if ($od_payment_city != '') {
			$billing .= ',' . $od_payment_city;
		}

		if ($od_payment_state != '') {
			$billing .= ',' . getSTATE($od_payment_state, $od_payment_country, 'label');
		}

		if ($od_payment_postal_code != '') {
			$billing .= ',' . $od_payment_postal_code;
		}

		if ($od_payment_country != '') {
			$billing .= ',' . getCOUNTRY($od_payment_country, 'label') . '.</br>';
		}
		// $billing .=$od_payment_address1.','.$od_payment_address2.','.$od_payment_city.','.$od_payment_state.','.$od_payment_postal_code.','.$od_payment_country.'.';
		$billing .= "<small class='text-secondary'> Via " . $od_payment_mode . "</small>";
	}

	if ($requesttype == 'shipping') {
		return $shipping;
	}
	if ($requesttype == 'billing') {
		return $billing;
	}
}


function checkmenu($selected_menu)
{

	$get_data = sqlQUERY_LABEL("SELECT page_ID from `js_pagemenu` where menu_title = '$selected_menu'  and `deleted`='0' and status = '1'") or die(sqlERROR_LABEL());

	$count_rows = sqlNUMOFROW_LABEL($get_data);
	while ($getstatus_fetch = sqlFETCHARRAY_LABEL($get_data)) {
		$page_ID = $getstatus_fetch['page_ID'];
	}
	return $page_ID;
}

/*****************  Check Role access*****************/
function checkrolemenu($page_ID, $user_level)
{
	$get_data = sqlQUERY_LABEL("SELECT page_allowed from `js_rolemenu` where role_ID = '$user_level' and `deleted`='0'") or die(sqlERROR_LABEL());
	$count_rows = sqlNUMOFROW_LABEL($get_data);
	if ($count_rows > 0) {
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($get_data)) {
			$page_allowed = explode(',', $getstatus_fetch['page_allowed']);
			if (in_array($page_ID, $page_allowed)) {
				return 1;
			} else {
				return 0;
			}
		}
	} else {
		return 0;
	}
}

/*****************  Check Role access*****************/
function checkmenupage($pagename, $pagetype, $user_level)
{

	$get_data = sqlQUERY_LABEL("SELECT page_ID from `js_pagemenu` where page_name = '$pagename' and page_type = '$pagetype' and `deleted`='0' and status = '1'") or die(sqlERROR_LABEL());
	$count_rows = sqlNUMOFROW_LABEL($get_data);
	if ($count_rows > 0) {
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($get_data)) {
			$page_ID = $getstatus_fetch['page_ID'];
		}
		$access = checkrolemenu($page_ID, $user_level);
	} else {
		$access = 0;
	}
	return $access;
}

/*****************  Get Page type function *****************/
function getParentmenu($selected_service_type, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `page_ID`, `menu_title` FROM `js_pagemenu` where parent_ID ='0' and status ='1' and deleted='0' order by menu_title ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$parent_ID = $getstatus_fetch['page_ID'];
			$menu_title = $getstatus_fetch['menu_title'];
		?>
			<option value='<?php echo $parent_ID; ?>' <?php if ($selected_service_type == $parent_ID) {
															echo "selected";
														} ?>>
				<?php echo $menu_title; ?>
			</option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `menu_title` FROM `js_pagemenu` where `page_ID`='$selected_service_type' and deleted ='0'") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$menu_title = $getstatus_fetch['menu_title'];
			return $menu_title;
		}
	}
}

/*****************  Get Page type function *****************/

function pageTYPE($selected_type_id, $requesttype)
{


	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select') {  ?>


		<option value="" <?php if ($selected_type_id == '') {
								echo "selected";
							} ?>> --None-- </option>

		<option value="1" <?php if ($selected_type_id == '1') {
								echo "selected";
							} ?>>Add</option>

		<option value="2" <?php if ($selected_type_id == '2') {
								echo "selected";
							} ?>>Edit</option>

		<option value="3" <?php if ($selected_type_id == '3') {
								echo "selected";
							} ?>>Delete</option>

		<option value="4" <?php if ($selected_type_id == '4') {
								echo "selected";
							} ?>>List</option>

		<option value="5" <?php if ($selected_type_id == '5') {
								echo "selected";
							} ?>>Preview</option>

		<option value="6" <?php if ($selected_type_id == '6') {
								echo "selected";
							} ?>>Import</option>

		<option value="7" <?php if ($selected_type_id == '7') {
								echo "selected";
							} ?>>Product Step1</option>

		<option value="8" <?php if ($selected_type_id == '8') {
								echo "selected";
							} ?>>Product Step2</option>

		<option value="9" <?php if ($selected_type_id == '9') {
								echo "selected";
							} ?>>Product Step3</option>

		<option value="10" <?php if ($selected_type_id == '10') {
								echo "selected";
							} ?>>Product Step4</option>

		<option value="11" <?php if ($selected_type_id == '11') {
								echo "selected";
							} ?>>Product Step5</option>

		<option value="12" <?php if ($selected_type_id == '12') {
								echo "selected";
							} ?>>Product Step6</option>

		<option value="13" <?php if ($selected_type_id == '13') {
								echo "selected";
							} ?>>Import Images</option>

		<option value="14" <?php if ($selected_type_id == '14') {
								echo "selected";
							} ?>>Variant Import</option>
		<option value="15" <?php if ($selected_type_id == '15') {
								echo "selected";
							} ?>>Trash</option>

		<?php

	}

	if ($requesttype == 'label') {


		if ($selected_type_id == '1') {
			return  'Add';
		}
		if ($selected_type_id == '2') {
			return  'Edit';
		}
		if ($selected_type_id == '3') {
			return  'Delete';
		}
		if ($selected_type_id == '4') {
			return  'List';
		}
		if ($selected_type_id == '5') {
			return  'Preview';
		}
		if ($selected_type_id == '6') {
			return  'Import';
		}
		if ($selected_type_id == '7') {
			return  'Product Step1';
		}
		if ($selected_type_id == '8') {
			return  'Product Step2';
		}
		if ($selected_type_id == '9') {
			return  'Product Step3';
		}
		if ($selected_type_id == '10') {
			return  'Product Step4';
		}
		if ($selected_type_id == '11') {
			return  'Product Step5';
		}
		if ($selected_type_id == '12') {
			return  'Product Step6';
		}
		if ($selected_type_id == '13') {
			return  'Import Images';
		}
		if ($selected_type_id == '14') {
			return  'Variant Import';
		}
		if ($selected_type_id == '15') {
			return  'Trash';
		}
	}

	if ($requesttype == 'getid') {

		if ($selected_type_id == 'add') {
			return  '1';
		}
		if ($selected_type_id == 'edit') {
			return  '2';
		}
		if ($selected_type_id == 'delete') {
			return  '3';
		}
		if ($selected_type_id == 'list') {
			return  '4';
		}
		if ($selected_type_id == 'preview') {
			return  '5';
		}
		if ($selected_type_id == 'import') {
			return  '6';
		}
		if ($selected_type_id == 'step1') {
			return  '7';
		}
		if ($selected_type_id == 'step2') {
			return  '8';
		}
		if ($selected_type_id == 'step3') {
			return  '9';
		}
		if ($selected_type_id == 'step4') {
			return  '10';
		}
		if ($selected_type_id == 'step5') {
			return  '11';
		}
		if ($selected_type_id == 'step6') {
			return  '12';
		}

		if ($selected_type_id == 'import_images') {
			return  '13';
		}
		if ($selected_type_id == 'import_Variant') {
			return  '14';
		}
		if ($selected_type_id == 'trash') {
			return  '15';
		}
	}
}

/*****************  Get Rolemenu *****************/
function getrole($selected_service_type, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {

		$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_rolemenu` where deleted='0' order by role_ID desc") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$role_ID = $getstatus_fetch['role_ID'];
			$role_name = $getstatus_fetch['role_name'];
		?>
			<option value='<?php echo $role_ID; ?>' <?php if ($selected_service_type == $role_ID) {
														echo "selected";
													} ?>>
				<?php echo $role_name; ?>
			</option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `role_name` FROM `js_rolemenu` where `role_ID`='$selected_service_type' and deleted ='0'") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$role_name = $getstatus_fetch['role_name'];
			return $role_name;
		}
	}
}


function orderREFNOGENERATOR($__main_orderID)
{

	if ($__main_orderID < 10) {
		$ord_id = "ORD000000" . $__main_orderID;
	} else if ($__main_orderID >= 10 and $__main_orderID <= 99) {
		$ord_id = "ORD00000" . $__main_orderID;
	} else if ($__main_orderID >= 100 and $__main_orderID <= 999) {
		$ord_id = "ORD0000" . $__main_orderID;
	} else if ($__main_orderID >= 1000 and $__main_orderID <= 9999) {
		$ord_id = "ORD000" . $__main_orderID;
	} else if ($__main_orderID >= 10000 and $__main_orderID <= 99999) {
		$ord_id = "ORD00" . $__main_orderID;
	} else if ($__main_orderID >= 100000 and $__main_orderID <= 999999) {
		$ord_id = "ORD0" . $__main_orderID;
	} else if ($__main_orderID >= 1000000 and $__main_orderID <= 9999999) {
		$ord_id = "ORD" . $__main_orderID;
	}
	return $ord_id;
}

/*****************  Get Rolemenu *****************/
function getorder_paymentSTATUS($selected_type, $order_ID, $selectedrecordID, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') { ?>
		<option value="">Choose Status</option>
		<?php

		$check_shop_order_log = sqlQUERY_LABEL("SELECT od_status FROM `js_shop_order_log` where od_id ='$order_ID' order by od_status ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		$fetch_count = sqlNUMOFROW_LABEL($check_shop_order_log);
		if ($fetch_count > 0) :
			while ($getstatus_fetch_order = sqlFETCHARRAY_LABEL($check_shop_order_log)) {
				$od_status[] = $getstatus_fetch_order['od_status'];
			}

			$array_of_od_status = implode("','", $od_status);
		endif;
		if ($order_ID != '' && $array_of_od_status != '') {
			$filterby_status = " and order_status_refno NOT IN ('$array_of_od_status')";
		}

		$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_orderstatus` where order_status_type='$selected_type' {$filterby_status} order by order_status_refno ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$order_status_id = $getstatus_fetch['order_status_id'];
			$order_status_refno = $getstatus_fetch['order_status_refno'];
			$order_status_name = $getstatus_fetch['order_status_name'];
		?>
			<option value='<?php echo $order_status_refno; ?>' <?php if ($selectedrecordID == $order_status_refno) {
																	echo "selected";
																} ?>>
				<?php echo $order_status_name; ?>
			</option>
		<?php
		}
	}
	if ($requesttype == 'select_in_delivery_agent') { ?>
		<option value="">Choose Status</option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_orderstatus` where order_status_refno IN ('5','6') and order_status_type='$selected_type' order by order_status_refno ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$order_status_id = $getstatus_fetch['order_status_id'];
			$order_status_refno = $getstatus_fetch['order_status_refno'];
			$order_status_name = $getstatus_fetch['order_status_name'];
		?>
			<option value='<?php echo $order_status_refno; ?>' <?php if ($selectedrecordID == $order_status_refno) {
																	echo "selected";
																} ?>>
				<?php echo $order_status_name; ?>
			</option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `order_status_name` FROM `js_shop_orderstatus` where `order_status_refno`='$selectedrecordID' and order_status_type='$selected_type'") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$order_status_name = $getstatus_fetch['order_status_name'];
			return $order_status_name;
		}
	}
}


function getCUSTOMERDETAILS($user_id, $request_type)
{

	$list_customer = sqlQUERY_LABEL("SELECT * FROM `js_customer` where user_id='$user_id' and deleted = '0'") or die("Unable to get records:" . sqlERROR_LABEL());

	$fetch_customer_list = sqlNUMOFROW_LABEL($list_customer);

	while ($fetch_records = sqlFETCHARRAY_LABEL($list_customer)) {
		$customer_fname = $fetch_records['customerfirst'];
		$customer_lname = $fetch_records['customerlast'];
		$customer_email = $fetch_records['customeremail'];
		$customerdob = $fetch_records["customerdob"];
		$customergender = $fetch_records["customergender"];
		$customerphone = $fetch_records["customerphone"];
		$customeraddress1 = $fetch_records["customeraddress1"];
		$customeraddress2 = $fetch_records["customeraddress2"];
		$customerpincode = $fetch_records["customerpincode"];
		$customerstate = $fetch_records["customerstate"];
		$status = $fetch_records["status"];
	}
	if ($request_type == 'name') {
		return $customer_fname . ' ' . $customer_lname;
	}
	if ($request_type == 'email') {
		return $customer_email;
	}
	if ($request_type == 'dob') {
		return $customerdob;
	}
	if ($request_type == 'phone') {
		return $customerphone;
	}
}

function getORDERQTY($od_id, $user_id)
{

	$list_order_list = sqlQUERY_LABEL("SELECT sum(od_qty) as QTY FROM `js_shop_order_item` where od_id='$od_id' and deleted = '0'") or die("Unable to get records:" . sqlERROR_LABEL());

	$fetch_order_list = sqlNUMOFROW_LABEL($list_order_list);

	while ($fetch_records = sqlFETCHARRAY_LABEL($list_order_list)) {

		$order_qty = $fetch_records['QTY'];
	}
	return $order_qty;
}


//To get Single Field Value
function getVARIANT_CODE($prdt_ID, $requesttype)
{

	/*****************  SHOW LABEL   *****************/
	if ($requesttype == 'get_variant_code') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_code` FROM `js_productvariants` where `parentproduct`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_code = $fetch_data['variant_code'];
		}
		return $variant_code;
	}

	if ($requesttype == 'variant_code_from_variant_ID') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_code` FROM `js_productvariants` where `variant_ID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_code = $fetch_data['variant_code'];
		}
		return $variant_code;
	}

	if ($requesttype == 'variant_name_from_variant_ID') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_name` FROM `js_productvariants` where `variant_ID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_name = $fetch_data['variant_name'];
		}
		return $variant_name;
	}

	if ($requesttype == 'variant_mrp_price') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_mrp_price` FROM `js_productvariants` where `variant_ID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_mrp_price = $fetch_data['variant_mrp_price'];
		}
		return $variant_mrp_price;
	}
}


function getPRDT_CODE($prdt_ID, $variant_id, $requesttype)
{

	if ($variant_id == '' || $variant_id == '0') {
		/*****************  SHOW LABEL   *****************/
		if ($requesttype == 'get_prdt_code') {

			$selected_query = sqlQUERY_LABEL("SELECT `productsku` FROM `js_product` where `productID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				$productestore_code = $fetch_data['productsku'];
			}
			return $productestore_code;
		}
	} else {
		if ($requesttype == 'get_prdt_code') {

			$selected_query = sqlQUERY_LABEL("SELECT `variant_code` FROM `js_productvariants` where `parentproduct`='$prdt_ID' and `variant_ID`='$variant_id'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				$variant_code = $fetch_data['variant_code'];
			}
			return $variant_code;
		}
	}

	if ($requesttype == 'get_prdt_name') {

		$selected_query_name = sqlQUERY_LABEL("SELECT `producttitle` FROM `js_product` where `productID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query_name)) {
			$prdt_name = $fetch_data['producttitle'];
		}
		return $prdt_name;
	}
}

function getVRIANTPRODUCTPRICE($pd_id, $var_id)
{

	if ($pd_id != '' && $var_id != '0') {
		$selected_query = sqlQUERY_LABEL("SELECT `variant_msp_price` FROM `js_productvariants` where `parentproduct`='$pd_id' and `variant_ID`='$var_id'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_msp_price = $fetch_data['variant_msp_price'];
		}

		return $variant_msp_price;
	}
}

function getTotal_cart_amount($od_id, $user_id, $ses_id, $request_type)
{
	// echo $pd_id.'-'.$user_id.'-'.$ses_id.'-'.$request_type;
	// echo "SELECT * FROM `js_shop_order_item` WHERE deleted='0' and user_id = '$user_id' and status ='1'";

	// echo "SELECT * FROM `js_shop_order_item` WHERE deleted='0' and user_id = '$user_id' and status ='1' {$filterby_odid} ";
	if (!empty($user_id)) {
		$cart_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` WHERE deleted='0' and ( user_id = '$user_id' OR od_session = '$ses_id' )  and status ='1'  ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());

		$order_query = sqlQUERY_LABEL("SELECT od_discount_amount FROM `js_shop_order` WHERE deleted='0' and ( od_userid = '$user_id' OR od_sesid = '$ses_id')") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());
	} else {
		$cart_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` WHERE deleted='0' and od_session = '$ses_id' and user_id ='' and status='1' ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());

		$order_query = sqlQUERY_LABEL("SELECT od_discount_amount FROM `js_shop_order` WHERE deleted='0' and od_sesid = '$ses_id'") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());
	}
	$order_row = sqlFETCHARRAY_LABEL($order_query);
	$od_discount_amount = $order_row['od_discount_amount'];

	$total_cart_amount = 0;
	$redeem_check = 0;
	while ($cart_row = sqlFETCHARRAY_LABEL($cart_query)) {
		$product_ID = $cart_row['pd_id'];
		$product_qty = $cart_row['od_qty'];
		$product_price = $cart_row['od_price'];
		$redeem_offer_value = $cart_row['redeem_offer_value'];
		$item_tax1 = $cart_row['item_tax1'];
		$item_tax2 = $cart_row['item_tax2'];
		$offer_type = $cart_row['offer_type'];
		if ($redeem_offer_value != '0') {
			$redeem = $redeem_offer_value;
		} else {
			$redeem = '0';
		}
		$redeem_check += $redeem;

		if ($request_type == 'subtotal') {
			if ($offer_type == '1') {
				$redeem = '0';
			} else {
				$redeem = $redeem_offer_value;
			}
			$subtotal_cart_amount += ($product_price);
		}

		if ($request_type == 'total') {
			if ($offer_type == '1') {
				$redeem = $redeem_offer_value;
			} else {
				$redeem = '0';
			}
			$total_cart_amount += ($product_price + $item_tax1 + $item_tax2) - $redeem;
		}

		if ($request_type == 'tax') {

			$total_tax_amount += ($item_tax1 + $item_tax2);
		}
	}

	// echo $redeem_check.'<br>';
	if ($request_type == 'total') {
		return $total_cart_amount;
	} elseif ($request_type == 'subtotal') {
		return $subtotal_cart_amount;
	} elseif ($request_type == 'tax') {
		return $total_tax_amount;
	}
}

function getcompletedTotal_cart_amount($od_id, $user_id, $ses_id, $request_type)
{
	// echo $pd_id.'-'.$user_id.'-'.$ses_id.'-'.$request_type;
	// echo "SELECT * FROM `js_shop_order_item` WHERE deleted='0' and user_id = '$user_id' and status ='1'";
	if ($od_id != '') {
		$filterby_odid = "and od_id = '$od_id'";
	} else {
		$filterby_odid = '';
	}
	// echo "SELECT * FROM `js_shop_order_item` WHERE deleted='0' and user_id = '$user_id' and status ='1' {$filterby_odid} ";
	if (!empty($user_id)) {
		$cart_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` WHERE deleted='0' and user_id = '$user_id' and status ='0' {$filterby_odid} ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());
		$order_query = sqlQUERY_LABEL("SELECT od_discount_amount,od_total  FROM `js_shop_order` WHERE deleted='0' and od_userid = '$user_id'  and status ='1' {$filterby_odid} ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());
	} else {
		$cart_query = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` WHERE deleted='0' and od_session = '$ses_id' and user_id ='' and status='0' {$filterby_odid} ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());

		$order_query = sqlQUERY_LABEL("SELECT od_discount_amount,od_total FROM `js_shop_order` WHERE deleted='0' and od_session = '$ses_id'  and status ='1' {$filterby_odid} ") or die("#CART-PRICE: Unable to get cart value " . sqlERROR_LABEL());
	}
	$order_row = sqlFETCHARRAY_LABEL($order_query);
	$od_discount_amount = $order_row['od_discount_amount'];
	$od_total = $order_row['od_total'];

	$total_cart_amount = 0;
	$redeem_check = 0;
	while ($cart_row = sqlFETCHARRAY_LABEL($cart_query)) {
		$product_ID = $cart_row['pd_id'];
		$product_qty = $cart_row['od_qty'];
		$product_price = $cart_row['od_price'];
		$redeem_offer_value = $cart_row['redeem_offer_value'];
		$item_tax1 = $cart_row['item_tax1'];
		$item_tax2 = $cart_row['item_tax2'];
		$offer_type = $cart_row['offer_type'];
		if ($redeem_offer_value != '0') {
			$redeem = $redeem_offer_value;
		} else {
			$redeem = '0';
		}
		$redeem_check += $redeem;

		if ($request_type == 'subtotal') {
			if ($offer_type == '1') {
				$redeem = '0';
			} else {
				$redeem = $redeem_offer_value;
			}
			$subtotal_cart_amount += ($product_price);
		}

		if ($request_type == 'total') {
			if ($offer_type == '1') {
				$redeem = $redeem_offer_value;
			} else {
				$redeem = '0';
			}
			$total_cart_amount += ($product_price + $item_tax1 + $item_tax2) - $redeem;
		}
	}

	// echo $redeem_check.'<br>';
	if ($request_type == 'total') {
		return ($od_total);
	}
	if ($request_type == 'subtotal') {
		return $subtotal_cart_amount;
	}
}


function getnewORDERREF($order_reference_id)
{
	if ($order_reference_id == '') {
		$collectITEM_Count = sqlQUERY_LABEL("SELECT od_refno, od_id FROM `js_shop_order` where deleted = '0' order by od_id DESC limit 0,1") or die("Unable to get Refno: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($collectITEM_Count) > 0) {
			while ($collectITEM_id = sqlFETCHARRAY_LABEL($collectITEM_Count)) {
				$orderCODE_detail = $collectITEM_id['od_refno'];
			}
			$orderCODE_detail++;
		} else {

			$orderCODE_detail = "RAORD-" . date('my') . '-11000';
		}
	} else {
		$collectBILL = sqlQUERY_LABEL("SELECT od_refno FROM `js_shop_order` where od_refno = '$order_reference_id'") or die("Unable to get Bill details: " . sqlERROR_LABEL());
		while ($collectBILL_id = sqlFETCHARRAY_LABEL($collectBILL)) {
			$orderCODE_detail = $collectBILL_id['od_refno'];
		}
	}
	return $orderCODE_detail;
}

function checkproductPRICE($productID)
{

	//check in product variant avialble
	$check_prdt_variant_datas = sqlQUERY_LABEL("SELECT * FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID'") or die("Unable to get records:" . sqlERROR_LABEL());

	$count_productvariant_list = sqlNUMOFROW_LABEL($check_prdt_variant_datas);

	if ($count_productvariant_list > 0) {
		//get variant first price
		$check_prdt_variant_1 = sqlQUERY_LABEL("SELECT variant_mrp_price, variant_msp_price, variant_taxsplit1, variant_taxsplit2 FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID' order by variant_msp_price ASC LIMIT 1") or die("Unable to get records:" . sqlERROR_LABEL());
		while ($variant_row_1 = sqlFETCHARRAY_LABEL($check_prdt_variant_1)) {
			$variant_mrp_price = $variant_row_1["variant_mrp_price"];
			$variant_msp_price_1 = $variant_row_1["variant_msp_price"];
			$variant_taxsplit1 = $variant_row_1["variant_taxsplit1"];
			$variant_taxsplit2 = $variant_row_1["variant_taxsplit2"];
			$tot_tax_value = $variant_taxsplit1 + $variant_taxsplit2;
		}

		//get variant last price
		$check_prdt_variant_2 = sqlQUERY_LABEL("SELECT variant_msp_price FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID'  order by variant_msp_price DESC LIMIT 1") or die("Unable to get records:" . sqlERROR_LABEL());
		while ($variant_row_2 = sqlFETCHARRAY_LABEL($check_prdt_variant_2)) {
			$variant_msp_price_2 = $variant_row_2["variant_msp_price"];
		}

		if ($variant_mrp_price > $variant_msp_price_1) {

			$productPRICETAG = '<p class="product-price font-weight-bold">
			<span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($variant_msp_price_1 + $tot_tax_value) . '</span>   &nbsp;
		<del><span class="kreen-Price-amount amount text-light"><span class="kreen-Price-currencySymbol text-light">' . general_currency_symbol . '</span>' . formatCASH($variant_mrp_price) . '</span></del></p>';
		} else {
			$productPRICETAG = '<p class="product-price font-weight-bold">
		<span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($variant_msp_price_1 + $tot_tax_value) . '</span> </p>';
		}
	} else {

		$__product_datas = sqlQUERY_LABEL("SELECT productID, productsku FROM `js_product` where productID = '$productID' and deleted = '0' and status = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($__row = sqlFETCHARRAY_LABEL($__product_datas)) {
			$product_code = $__row["productsku"];
		}

		$list_producttype_data = sqlQUERY_LABEL("SELECT * FROM `js_product` where productsku = '$product_code' and deleted = '0' and status = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row = sqlFETCHARRAY_LABEL($list_producttype_data)) {
			$prdt_mrp = $row['productMRPprice'];
			$prdt_msp = $row['productsellingprice'];
			$prdt_available_qty = $row['productavailablestock'];
			$prdt_stockstatus = $row['productstockstatus'];
		}


		if ($prdt_mrp > $prdt_msp) {
			$productPRICETAG = '<p class="product-price font-weight-bold">
			 <span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($prdt_msp) . '</span> &nbsp;
		<del><span class="kreen-Price-amount amount text-light"><span class="kreen-Price-currencySymbol text-light">' . general_currency_symbol . '</span>' . formatCASH($prdt_mrp) . '</span> </del>
		</p>';
		} else {
			$productPRICETAG = '<p class="product-price font-weight-bold">
		 <ins><span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($prdt_msp) . '</span></ins>
		</p>';
		}
	}

	return $productPRICETAG;
}


function checkproductPRICE1($productID, $product_variant_id)
{
	$check_prdt_variant_datas = sqlQUERY_LABEL("SELECT * FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID' and `variant_ID`='$product_variant_id'") or die("Unable to get records:" . sqlERROR_LABEL());

	$count_productvariant_list = sqlNUMOFROW_LABEL($check_prdt_variant_datas);
	if ($count_productvariant_list > 0) {
		//get variant first price
		$check_prdt_variant_1 = sqlQUERY_LABEL("SELECT variant_mrp_price, variant_msp_price, variant_taxsplit1, variant_taxsplit2 FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID' and `variant_ID`='$product_variant_id' order by variant_msp_price ASC LIMIT 1") or die("Unable to get records:" . sqlERROR_LABEL());
		while ($variant_row_1 = sqlFETCHARRAY_LABEL($check_prdt_variant_1)) {
			$variant_mrp_price = $variant_row_1["variant_mrp_price"];
			$variant_msp_price_1 = $variant_row_1["variant_msp_price"];
			$variant_taxsplit1 = $variant_row_1["variant_taxsplit1"];
			$variant_taxsplit2 = $variant_row_1["variant_taxsplit2"];
			$tot_tax_value = $variant_taxsplit1 + $variant_taxsplit2;
		}

		//get variant last price
		$check_prdt_variant_2 = sqlQUERY_LABEL("SELECT variant_msp_price FROM `js_productvariants` where deleted = '0' and status = '1' and variantstockstatus='1' and `parentproduct`='$productID' and `variant_ID`='$product_variant_id' order by variant_msp_price DESC LIMIT 1") or die("Unable to get records:" . sqlERROR_LABEL());
		while ($variant_row_2 = sqlFETCHARRAY_LABEL($check_prdt_variant_2)) {
			$variant_msp_price_2 = $variant_row_2["variant_msp_price"];
		}

		if ($variant_mrp_price > $variant_msp_price_1) {
			$productPRICETAG = '<p class="product-price text-dark">
			<span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($variant_msp_price_1 + $tot_tax_value) . '</span>   &nbsp;
		<del><span class="kreen-Price-amount amount text-light"><span class="kreen-Price-currencySymbol text-light">' . general_currency_symbol . '</span>' . formatCASH($variant_mrp_price) . '</span></del></p>';
		} else {
			$productPRICETAG = '<p class="product-price text-dark">
		<span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($variant_msp_price_1 + $tot_tax_value) . '</span> </p>';
		}
	} else {

		$__product_datas = sqlQUERY_LABEL("SELECT productID, productsku FROM `js_product` where productID = '$productID' and deleted = '0' and status = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($__row = sqlFETCHARRAY_LABEL($__product_datas)) {
			$product_code = $__row["productsku"];
		}

		$list_producttype_data = sqlQUERY_LABEL("SELECT * FROM `js_product` where productsku = '$product_code' and deleted = '0' and status = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row = sqlFETCHARRAY_LABEL($list_producttype_data)) {
			$prdt_mrp = $row['productMRPprice'];
			$prdt_msp = $row['productsellingprice'];
			$prdt_available_qty = $row['productavailablestock'];
			$prdt_stockstatus = $row['productstockstatus'];
		}


		if ($prdt_mrp > $prdt_msp) {
			$productPRICETAG = '<p class="product-price text-dark">
			 <span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($prdt_msp) . '</span> &nbsp;
		<del><span class="kreen-Price-amount amount text-light"><span class="kreen-Price-currencySymbol text-light">' . general_currency_symbol . '</span>' . formatCASH($prdt_mrp) . '</span> </del>
		</p>';
		} else {
			$productPRICETAG = '<p class="product-price text-dark">
		 <ins><span class="kreen-Price-amount amount"><span class="kreen-Price-currencySymbol">' . general_currency_symbol . '</span>' . formatCASH($prdt_msp) . '</span></ins>
		</p>';
		}
	}

	return $productPRICETAG;
}

function getProduct_COUNT_USING_CATEGORY_ID($category_id)
{

	$__product_category_datas = sqlQUERY_LABEL("SELECT * FROM `js_product` where productcategory = '$category_id' and deleted = '0' and status = '1'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

	$category_product_count = sqlNUMOFROW_LABEL($__product_category_datas);

	return $category_product_count;
}


function getDELIVERAGENT($selected_type, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {
		$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_deliveryagent` where status='1' and deleted ='0' order by da_first ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$da_ID = $getstatus_fetch['da_ID'];
			$da_first = $getstatus_fetch['da_first'];
			$da_last = $getstatus_fetch['da_last'];
			$da_phone = $getstatus_fetch['da_phone'];
		?>
			<option value='<?php echo $da_ID; ?>' <?php if ($selected_type == $da_ID) {
														echo "selected";
													} ?>>
				<?php echo $da_first . ' ' . $da_last . ' - ' . $da_phone; ?>
			</option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT * FROM `js_deliveryagent` where `da_ID`='$selected_type' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$da_first = $getstatus_fetch['da_first'];
			$da_last = $getstatus_fetch['da_last'];
			$da_phone = $getstatus_fetch['da_phone'];
			return $da_first . ' ' . $da_last . ' - ' . $da_phone;
		}
	}
}


function getVARIANT_ESTORECODE($prdt_ID, $requesttype)
{

	/*****************  SHOW LABEL   *****************/
	if ($requesttype == 'get_variant_estore_code') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_code` FROM `js_productvariants` where `parentproduct`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_code = $fetch_data['variant_code'];
		}
		return $variant_code;
	}

	if ($requesttype == 'variant_estore_code_from_variant_ID') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_code` FROM `js_productvariants` where `variant_ID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_code = $fetch_data['variant_code'];
		}
		return $variant_code;
	}

	if ($requesttype == 'variant_name_from_variant_ID') {

		$selected_query = sqlQUERY_LABEL("SELECT `variant_name` FROM `js_productvariants` where `variant_ID`='$prdt_ID'") or die("#SINGLEVALUE-LABEL: Getting UNIQUE TABLE VALUE: " . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$variant_name = $fetch_data['variant_name'];
		}
		return $variant_name;
	}
}

function getDELIVERAGENT_DETAILS($selected_id, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'get_da_ID_from_user_ID') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `da_ID` FROM `js_deliveryagent` where status='1' and deleted ='0'  and user_id = '$selected_id'") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$da_ID = $getstatus_fetch['da_ID'];
		}
		return $da_ID;
	}
}

function checkdashboardmenu($user_level, $check)
{
	$get_data = sqlQUERY_LABEL("select dashboard_content_allowed from js_rolemenu where role_ID = '$user_level' and `deleted`='0'") or die(sqlERROR_LABEL());
	$count_rows = sqlNUMOFROW_LABEL($get_data);
	if ($count_rows > 0) {
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($get_data)) {
			$dashboard_content_allowed = explode(',', $getstatus_fetch['dashboard_content_allowed']);
			if (in_array($check, $dashboard_content_allowed)) {
				return 1;
			} else {
				return 0;
			}
		}
	} else {
		return 0;
	}
}

function getMEMBERSHIP_ELIGIBILITY_ID($total_order_value, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'get_eligible_membership_ID') {
		if ($total_order_value > 500 && $total_order_value < 1000) {
			$filter_membership_id_value = 500;
		} else if ($total_order_value > 999 && $total_order_value < 2500) {
			$filter_membership_id_value = 1000;
		} elseif ($total_order_value > 2499) {
			$filter_membership_id_value = 2500;
		} else {
			$filter_membership_id_value = 0;
		}
		$getstatus_query = sqlQUERY_LABEL("SELECT `membership_ID`,`membership_hd_amount` FROM `js_membership` where `membership_eligibility_amt` >= '$filter_membership_id_value' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$membership_ID = $getstatus_fetch['membership_ID'];
		}
		return $membership_ID;
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'get_eligible_membership_points_expiry') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `membership_points_expiry` FROM `js_membership` where `membership_ID` = '$total_order_value' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$membership_points_expiry = $getstatus_fetch['membership_points_expiry'];
		}
		return $membership_points_expiry;
	}

	if ($requesttype == 'get_membership_title') {

		$getstatus_query = sqlQUERY_LABEL("SELECT `membership_title` FROM `js_membership` where `membership_ID` = '$total_order_value' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$membership_title = $getstatus_fetch['membership_title'];
		}
		return $membership_title;
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'get_membership_point_rs') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `membership_point_rs` FROM `js_membership` where `membership_ID` = '$total_order_value' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$membership_point_rs = $getstatus_fetch['membership_point_rs'];
		}
		return round($membership_point_rs);
	}
}

function getORDER_DETAILS($selected_status_id, $request_type)
{

	if ($request_type == 'get_od_ID_from_od_refno') {

		$getrefno_query = sqlQUERY_LABEL("SELECT od_id FROM `js_shop_order` where `od_refno`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_id = $getstatus_fetch['od_id'];
		}
		return $od_id;
	}

	if ($request_type == 'get_user_ID_from_od_id') {

		$getrefno_query = sqlQUERY_LABEL("SELECT od_userid FROM `js_shop_order` where `od_id`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_userid = $getstatus_fetch['od_userid'];
		}
		return $od_userid;
	}

	if ($request_type == 'get_od_total_from_od_id') {
		$getrefno_query = sqlQUERY_LABEL("SELECT od_total FROM `js_shop_order` where `od_id`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_total = $getstatus_fetch['od_total'];
		}
		return $od_total;
	}

	if ($request_type == 'get_od_discount_amount_from_od_id') {
		$getrefno_query = sqlQUERY_LABEL("SELECT od_discount_amount FROM `js_shop_order` where `od_id`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_discount_amount = $getstatus_fetch['od_discount_amount'];
		}
		return $od_discount_amount;
	}

	if ($request_type == 'get_od_date_from_od_id') {

		$getrefno_query = sqlQUERY_LABEL("SELECT od_date FROM `js_shop_order` where `od_id`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_date = $getstatus_fetch['od_date'];
		}
		return $od_date;
	}

	if ($request_type == 'get_shipping_first_name') {
		$getrefno_query = sqlQUERY_LABEL("SELECT od_shipping_first_name FROM `js_shop_order` where `od_id`='$selected_status_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
			$od_shipping_first_name = $getstatus_fetch['od_shipping_first_name'];
		}
		return $od_shipping_first_name;
	}
}

function getCUSTOMER_DATA($selected_type_id, $requesttype)
{

	if ($requesttype == 'customers_name') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customerfirst FROM `js_customer` Where customerID ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customers_name = $row_cus["customerfirst"];
			return ucwords($customers_name);
		}
	}

	if ($requesttype == 'customers_refno') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customer_ref_no FROM `js_customer` Where customerID ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customer_ref_no = $row_cus["customer_ref_no"];
			return $customer_ref_no;
		}
	}

	if ($requesttype == 'customers_mobile') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customers_mobile FROM `js_customers` Where customers_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customers_mobile = $row_cus["customers_mobile"];
			return $customers_mobile;
		}
	}

	if ($requesttype == 'get_userID_from_reference_code') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT user_id FROM `js_customer` Where reference_code ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$user_id = $row_cus["user_id"];
			return $user_id;
		}
	}

	if ($requesttype == 'userID') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customerfirst FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customerfirst = $row_cus["customerfirst"];
			return $customerfirst;
		}
	}

	if ($requesttype == 'get_current_membership_id') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT current_membership_id FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$current_membership_id = $row_cus["current_membership_id"];
			return $current_membership_id;
		}
	}

	if ($requesttype == 'get_customerid_from_userid') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customerID FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customerID = $row_cus["customerID"];
			return $customerID;
		}
	}

	if ($requesttype == 'user_id') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT user_id FROM `js_customer` Where customerID ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$user_id = $row_cus["user_id"];
			return $user_id;
		}
	}

	if ($requesttype == 'customerdob') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT customerdob FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customerdob = $row_cus["customerdob"];
			return $customerdob;
		}
	}

	if ($requesttype == 'get_rewards_multiplayer') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT rewards_multiplayer FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$rewards_multiplayer = $row_cus["rewards_multiplayer"];
			return $rewards_multiplayer;
		}
	}

	if ($requesttype == 'referral_code') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT referral_code FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$referral_code = $row_cus["referral_code"];
			return $referral_code;
		}
	}

	if ($requesttype == 'get_user_id_reference_code') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT reference_code FROM `js_customer` Where user_id ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$reference_code = $row_cus["reference_code"];
			return $reference_code;
		}
	}

	if ($requesttype == 'reference_code') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT reference_code FROM `js_customer` Where customerID ='$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$reference_code = $row_cus["reference_code"];
			return $reference_code;
		}
	}
}

function getAREAMANEGER_DETAILS($selected_user_ID, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'get_am_ID_from_user_ID') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `am_ID` FROM `js_area_manager` where user_id = '$selected_user_ID' and status='1' and deleted = '0' ") or die("#STATUS-LABEL: Getting page_ID: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$am_ID = $getstatus_fetch['am_ID'];
		}
		return $am_ID;
	}
	/*****************  SELECT OPTION   *****************/
}

function getPRODUCTNAME($selected_type_id)
{

	if ($selected_type_id != '') {

		$list_product_name = sqlQUERY_LABEL("SELECT producttitle FROM js_product WHERE productID = $selected_type_id") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_product_name)) {
			$product_name = $row_cus["producttitle"];
			$producttitle = html_entity_decode(trim($product_name), ENT_QUOTES, "UTF-8");
			$producttitle = trim(preg_replace('/\s\s+/', ' ', str_replace("<br />", '\n', $producttitle)));
			$producttitle = trim(str_replace("\'", "'", $producttitle));

			return ($producttitle);
		}
	}
}

function star_rating($rating)
{
	if ($rating == '1') {
		$return_star_rating = '<div class="tx-16 mg-l-10">
			  <i class="icon ion-md-star lh-0 tx-orange"></i>
			  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
			  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
			  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
			  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
			</div>';
	}
	if ($rating == '2') {
		$return_star_rating = '<div class="tx-16 mg-l-10">
		  <i class="icon ion-md-star lh-0 tx-orange"></i>
		  <i class="icon ion-md-star lh-0 tx-orange"></i>
		  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
		  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
		  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
		</div>';
	}
	if ($rating == '3') {
		$return_star_rating = '<div class="tx-16 mg-l-10">
		  <i class="icon ion-md-star lh-0 tx-orange"></i>
		  <i class="icon ion-md-star lh-0 tx-orange"></i>
		  <i class="icon ion-md-star lh-0 tx-orange"></i>
		  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
		  <i class="icon ion-md-star lh-0 tx-gray-300"></i>
		</div>';
	}
	if ($rating == '4') {
		$return_star_rating = '<div class="tx-18">
			<i class="icon ion-md-star lh-0 tx-orange"></i>
			<i class="icon ion-md-star lh-0 tx-orange"></i>
			<i class="icon ion-md-star lh-0 tx-orange"></i>
			<i class="icon ion-md-star lh-0 tx-orange"></i>
			<i class="icon ion-md-star lh-0 tx-gray-300"></i>
		  </div>';
	}
	if ($rating == '5') {
		$return_star_rating = '<div class="tx-16 mg-l-10">
                          <i class="icon ion-md-star lh-0 tx-orange"></i>
                          <i class="icon ion-md-star lh-0 tx-orange"></i>
                          <i class="icon ion-md-star lh-0 tx-orange"></i>
                          <i class="icon ion-md-star lh-0 tx-orange"></i>
                          <i class="icon ion-md-star lh-0 tx-orange"></i>
                        </div>';
	}
	return $return_star_rating;
}

function ORDER_STATUS_REPORT_DONAT_CHART($choosenmonth, $filter_by_agent, $reporttype)
{

	if ($reporttype == 'TOTAL_ORDERS') {

		$counting_order_DETAILS = sqlQUERY_LABEL("SELECT COUNT(ORDER_DETAILS.`od_id`) AS TOTAL_ORDERS FROM `js_shop_order` AS ORDER_DETAILS, `js_delivery_details` AS DELIVERY_DETAILS WHERE ORDER_DETAILS.`od_id` = DELIVERY_DETAILS.`od_id` and `carrier_name` = '$filter_by_agent' and  MONTH(ORDER_DETAILS.`od_date`) = '$choosenmonth' order by ORDER_DETAILS.`od_id` desc");

		if (sqlNUMOFROW_LABEL($counting_order_DETAILS)) {
			while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_order_DETAILS)) {
				echo $collect_order_DATA['TOTAL_ORDERS'];
			}
		} else {
			echo '0';
		}
	}

	if ($reporttype == 'TOTAL_PENDING_ORDERS') {

		$counting_order_DETAILS = sqlQUERY_LABEL("SELECT COUNT(ORDER_DETAILS.`od_id`) AS TOTAL_ORDERS FROM `js_shop_order` AS ORDER_DETAILS, `js_delivery_details` AS DELIVERY_DETAILS WHERE ORDER_DETAILS.`od_id` = DELIVERY_DETAILS.`od_id` and `carrier_name` = '$filter_by_agent' and  MONTH(ORDER_DETAILS.`od_date`) = '$choosenmonth' and ORDER_DETAILS.`od_status` != '5' and ORDER_DETAILS.`od_status` != '6' order by ORDER_DETAILS.`od_id` desc");

		if (sqlNUMOFROW_LABEL($counting_order_DETAILS)) {
			while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_order_DETAILS)) {
				echo $collect_order_DATA['TOTAL_ORDERS'];
			}
		} else {
			echo '0';
		}
	}

	if ($reporttype == 'TOTAL_IN_PROGRESS_ORDERS') {

		$counting_order_DETAILS = sqlQUERY_LABEL("SELECT COUNT(ORDER_DETAILS.`od_id`) AS TOTAL_ORDERS FROM `js_shop_order` AS ORDER_DETAILS, `js_delivery_details` AS DELIVERY_DETAILS WHERE ORDER_DETAILS.`od_id` = DELIVERY_DETAILS.`od_id` and `carrier_name` = '$filter_by_agent' and ORDER_DETAILS.`od_status` ='5'  and  MONTH(ORDER_DETAILS.`od_date`) = '$choosenmonth' order by ORDER_DETAILS.`od_id` desc");

		if (sqlNUMOFROW_LABEL($counting_order_DETAILS)) {
			while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_order_DETAILS)) {
				echo $collect_order_DATA['TOTAL_ORDERS'];
			}
		} else {
			echo '0';
		}
	}

	if ($reporttype == 'TOTAL_DELIVERED_ORDERS') {

		$counting_order_DETAILS = sqlQUERY_LABEL("SELECT COUNT(ORDER_DETAILS.`od_id`) AS TOTAL_ORDERS FROM `js_shop_order` AS ORDER_DETAILS, `js_delivery_details` AS DELIVERY_DETAILS WHERE ORDER_DETAILS.`od_id` = DELIVERY_DETAILS.`od_id` and `carrier_name` = '$filter_by_agent' and ORDER_DETAILS.`od_status` ='6' and  MONTH(ORDER_DETAILS.`od_date`) = '$choosenmonth' order by ORDER_DETAILS.`od_id` desc");

		if (sqlNUMOFROW_LABEL($counting_order_DETAILS)) {
			while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_order_DETAILS)) {
				echo $collect_order_DATA['TOTAL_ORDERS'];
			}
		} else {
			echo '0';
		}
	}
}

function CUSTOMERWISE_ORDER_DETAILS($selected_type_id, $requesttype)
{

	if ($requesttype == 'total_orders') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT COUNT(*) as TOTAL_ORDERS FROM js_shop_order where od_userid = '$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$TOTAL_ORDERS = $row["TOTAL_ORDERS"];
			return $TOTAL_ORDERS;
		}
	}

	if ($requesttype == 'total_sales') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT SUM(od_total) AS TOTAL_AMOUNT, SUM(od_discount_amount) AS TOTAL_DISCOUNT FROM js_shop_order where od_userid = '$selected_type_id' and deleted = '0'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$TOTAL_AMOUNT = $row["TOTAL_AMOUNT"];
			$TOTAL_DISCOUNT = $row["TOTAL_DISCOUNT"];
			return ($TOTAL_AMOUNT - $TOTAL_DISCOUNT);
		}
	}
}

function getORDER_COUNT($selected_type_id, $requesttype)
{

	if ($requesttype == 'customers_name') {

		$list_customers_datas = sqlQUERY_LABEL("SELECT A.user_id, B.od_userid, A.customerfirst, COUNT(A.customerlast) FROM js_customer A, js_shop_order B WHERE A.user_id = '$selected_type_id' GROUP BY A.customerfirst ") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$customers_name = $row["COUNT(A.customerlast)"];
			return $customers_name;
		}
	}
}

function customerTOTALSALES($customer_id, $request_type)
{
	if ($request_type == 'customer_sales') {
		$list_datas_customer = sqlQUERY_LABEL("SELECT * FROM `js_shop_order` where deleted = '0' and od_userid = '$customer_id'") or die("Unable to get records:" . sqlERROR_LABEL());

		while ($fetch_records = sqlFETCHARRAY_LABEL($list_datas_customer)) {

			$od_total = $fetch_records['od_total'];
			$customer_total += $od_total;
		}
		return $customer_total;
	}

	if ($request_type == 'customer_order') {
		$list_datas_customer = sqlQUERY_LABEL("SELECT count(*) as total_order FROM `js_shop_order` where deleted = '0' and od_userid = '$customer_id'") or die("Unable to get records:" . sqlERROR_LABEL());

		$fetch_records = sqlFETCHARRAY_LABEL($list_datas_customer);
		$total_orders = $fetch_records['total_order'];

		return $total_orders;
	}
}

function getCUSTOMERSELECT($selected_type_id, $requesttype)
{

	if ($requesttype == 'select') {
		$selected_query = sqlQUERY_LABEL("SELECT * FROM `js_customer` where `deleted` = '0' and `status` = '1'") or die("#PARENT-LABEL: Getting Parent Category: " . sqlERROR_LABEL());
		?>
		<option value=""> Choose Customer </option>
		<?php
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$customerid = $fetch_data['customerID'];
			$customers_name = $fetch_data['customerfirst'];
			$customerphone = $fetch_data['customerphone'];
			$user_ID = getCUSTOMER_DATA($customerid, 'user_id');

		?>
			<option value="<?php echo $user_ID; ?>" <?php if ($selected_type_id == $user_ID) {
														echo "selected";
													} ?>><?php echo $customers_name . '-' . $customerphone; ?></option>
		<?php

		}
	} //end of select
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$selected_query = sqlQUERY_LABEL("SELECT customers_name FROM `js_customers` where `deleted`= '0' and `customers_id` = '$selected_type_id'") or die("#CUSTOMGROUP-LABEL: Getting Custom Group: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['customers_name'];
			}
		} else {
			return '--';
		}
	}
}

function getVERIFIED_EMAIL_MOBILE($selected_type_id, $requesttype)
{

	if ($requesttype == 'email') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT email_verified FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$email_verified = $row_cus["email_verified"];
			return $email_verified;
		}
	}
	if ($requesttype == 'mobile_no') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT mobileno_verified FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$mobileno_verified = $row_cus["mobileno_verified"];
			return $mobileno_verified;
		}
	}
	if ($requesttype == 'username') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT username FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$username = $row_cus["username"];
			return $username;
		}
	}
	if ($requesttype == 'get_roleid') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT roleID FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$roleID = $row_cus["roleID"];
			return $roleID;
		}
	}
	if ($requesttype == 'get_mobile_no') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT user_phone FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$user_phone = $row_cus["user_phone"];
			return $user_phone;
		}
	}
	if ($requesttype == 'get_email_id') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT useremail FROM js_users WHERE userID = '$selected_type_id'") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$useremail = $row_cus["useremail"];
			return $useremail;
		}
	}
	if ($requesttype == 'login_attempt_limit') {
		$list_customers_datas = sqlQUERY_LABEL("SELECT `login_attempt_limit` FROM `js_users` WHERE (`user_phone` = '$selected_type_id' OR useremail = '$selected_type_id')") or die("#1-Unable to get records:" . sqlERROR_LABEL());
		while ($row_cus = sqlFETCHARRAY_LABEL($list_customers_datas)) {
			$login_attempt_limit = $row_cus["login_attempt_limit"];
			return $login_attempt_limit;
		}
	}
}

function COUPON_WISE_DISCOUNT_SUMMARY($since_from, $since_to, $reporttype)
{

	if ($since_from != '' && $since_to != '') {
		$filterby_date = " and DATE(od_date) between '$since_from' and '$since_to'";
	}

	$counting_order_DETAILS = sqlQUERY_LABEL("SELECT COUNT(od_discount_promo_ID) AS TOTAL_USED, od_discount_promo_ID, SUM(od_total) AS TOTAL_ORDER_AMT, SUM(od_discount_amount) AS TOTAL_DISCOUNT_AMT FROM `js_shop_order` where deleted = '0' and od_status NOT IN ('7','8') and status = '1' and od_payment_status IN('1', '3') and od_discount_promo_ID !='0' {$filterby_date} order by od_id desc");

	if (sqlNUMOFROW_LABEL($counting_order_DETAILS)) {
		while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_order_DETAILS)) {
			$TOTAL_USED_COUPON = $collect_order_DATA['TOTAL_USED'];
			$TOTAL_ORDER_AMT = $collect_order_DATA['TOTAL_ORDER_AMT'];
			$TOTAL_DISCOUNT_AMT = $collect_order_DATA['TOTAL_DISCOUNT_AMT'];
		}
	} else {
		$TOTAL_USED_COUPON = 0;
		$TOTAL_ORDER_AMT = 0;
		$TOTAL_DISCOUNT_AMT = 0;
	}
	if ($reporttype == 'TOTAL_USED_COUPON') {
		return $TOTAL_USED_COUPON;
	} else if ($reporttype == 'TOTAL_ORDER_AMT') {
		return $TOTAL_ORDER_AMT;
	} else if ($reporttype == 'TOTAL_DISCOUNT_AMT') {
		return $TOTAL_DISCOUNT_AMT;
	} else if ($reporttype == 'AFTER_DICOUNT') {
		return ($TOTAL_ORDER_AMT - $TOTAL_DISCOUNT_AMT);
	}
}

function getPROMCODE_DETAILS($selected_type_id)
{

	if ($selected_type_id != '') {

		$list_product_name = sqlQUERY_LABEL("SELECT promocode_code,promocode_name FROM js_promocode WHERE promocode_id = $selected_type_id") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_product_name)) {
			$promocode_name = $row_cus["promocode_name"];
			$promocode_code = $row_cus["promocode_code"];
		}
		return strtoupper($product_name . $promocode_code);
	}
}

function getORDERREF_USING_ODID($od_id)
{
	$getrefno_query = sqlQUERY_LABEL("SELECT od_refno FROM `js_shop_order` where `od_id`='$od_id' and deleted = '0'") or die("#ORDREF-LABEL: Getting page_ID: " . sqlERROR_LABEL());
	while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getrefno_query)) {
		$od_refno = $getstatus_fetch['od_refno'];
	}
	return $od_refno;
}

//Tab Open Type 
function gettabtype($selected_status_id, $requesttype)
{


	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select') { ?>

		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Same Window </option>

		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> New Window </option>


	<?php

	}

	if ($requesttype == 'label') {

		if ($selected_status_id == '1') {

			return "Same Window";
		}

		if ($selected_status_id == '2') {

			return  "New Window";
		}
	}
}

function getPARENTmenu_list($selected_type_id, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {

		$selected_query = sqlQUERY_LABEL("SELECT menu_ID, menu_name FROM `js_menu` where `menu_parentID` = '0' and `deleted` = '0' and `status` = '1'") or die("#PARENT-LABEL: Getting Parent Menu: " . sqlERROR_LABEL());
	?>
		<option onclick="showmenutype('0');" value="0">No Parent Menu</option>
		<?php
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
			$menu_ID = $fetch_data['menu_ID'];
			$menu_name = $fetch_data['menu_name'];
		?>
			<option onclick="showmenutype('<?php echo $menu_ID; ?>');" value="<?php echo $menu_ID; ?>" <?php if ($selected_type_id == $menu_ID) {
																											echo "selected";
																										} ?>><?php echo $menu_name; ?></option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {

		$selected_query = sqlQUERY_LABEL("SELECT menu_name FROM `js_menu` where `menu_parentID` = '$selected_type_id'") or die("#PARENT-LABEL: Getting Parent Menu: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) {
				return $fetch_data['menu_name'];
			}
		} else {
			return '--';
		}
	}
}

function getMRPprice($product_id, $variant_id, $od_qty)
{
	if ($variant_id) {
		$variant_select_MRP = sqlQUERY_LABEL("SELECT variant_mrp_price FROM `js_productvariants` where `parentproduct` = '$product_id' and `variant_ID` = '$variant_id'") or die("#PARENT-LABEL: Getting Variant MRP: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($variant_select_MRP) > 0) {
			while ($fetch_variant_data = sqlFETCHARRAY_LABEL($variant_select_MRP)) {
				$variant_MRP = $fetch_variant_data['variant_mrp_price'];

				return $variant_MRP * $od_qty;
			}
		}
	} else {
		$select_MRP = sqlQUERY_LABEL("SELECT productMRPprice FROM `js_product` where `productID` = '$product_id'") or die("#PARENT-LABEL: Getting Product MRP: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($select_MRP) > 0) {
			while ($fetch_data = sqlFETCHARRAY_LABEL($select_MRP)) {
				$product_MRP = $fetch_data['productMRPprice'];
			}
			return $product_MRP;
		}
	}
}


function ODAMOUNTREDUES($od_id)
{
	$variant_select_MRP = sqlQUERY_LABEL("SELECT SUM(od_price) as product_price,SUM(item_tax1) as item_tax1 ,SUM(item_tax2) as item_tax2 FROM `js_shop_order_item` where `od_id` = '$od_id' and `od_status_item` = '7'") or die("#PARENT-LABEL: Getting Variant MRP: " . sqlERROR_LABEL());
	if (sqlNUMOFROW_LABEL($variant_select_MRP) > 0) {
		while ($fetch_variant_data = sqlFETCHARRAY_LABEL($variant_select_MRP)) {
			$product_price = $fetch_variant_data['product_price'];
			$item_tax1 = $fetch_variant_data['item_tax1'];
			$item_tax2 = $fetch_variant_data['item_tax2'];
			$price_amout_redues = $product_price + $item_tax1 + $item_tax2;
			return round($price_amout_redues);
		}
	}
}


function getOFFERS($selected_ID, $requesttype)
{

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'select') {
		?>
		<option value=''> Select offer </option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT `offers_name`, `offers_id` FROM `js_offers` where `status`!='3' order by offers_id ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$offers_id = $getstatus_fetch['offers_id'];
			$offers_name = $getstatus_fetch['offers_name'];
		?>
			<option value='<?php echo $offers_id; ?>' <?php if ($selected_ID == $offers_id) {
															echo "selected";
														} ?>>
				<?php echo $offers_name; ?>
			</option>
		<?php
		}
	}

	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `offers_name` FROM `js_offers` where `offers_id`='$selected_ID' and `status_type`='$selected_status_type'") or die("#STATUS-LABEL: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$offers_name = $getstatus_fetch['offers_name'];
			return $offers_name;
		}
	}
}


function UPDATE_OFFERS($order_id)
{

	$sql_query_token = sqlQUERY_LABEL("SELECT  `offer_id` FROM `js_shop_order_item` where od_id = '$order_id' and od_status_item !='7' and deleted = '0' ") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
	while ($set_sql_query_token = sqlFETCHARRAY_LABEL($sql_query_token)) {

		$offer_id[] = $set_sql_query_token['offer_id'];
	}
	$offers_id = implode(",", $offer_id);
	$offers = explode(",", $offers_id);
	$unique_offer_id =  array_unique($offers);
	$check_offers_id = implode(",", $unique_offer_id);

	if ($offers_id != '0') {

		foreach ($unique_offer_id as $key) {
			$offer_qty  =  getSINGLEDBVALUE('offer_qty', " offers_id = '$key' and deleted = '0' and status = '2'", 'js_offers', 'label');
			$offer_value  =  getSINGLEDBVALUE('offer_value', " offers_id = '$key' and deleted = '0' and status = '2'", 'js_offers', 'label');
			$offer_type  =  getSINGLEDBVALUE('offers_type', " offers_id = '$key' and deleted = '0' and status = '2'", 'js_offers', 'label');
			$total_offer_avail_qty  =  getSINGLEDBVALUE('sum(od_qty)', "od_id = '$order_id' and find_in_set('$key',offer_id) and redeem_offer !='Y' and deleted = '0' and od_status_item !='7'", 'js_shop_order_item', 'label');

			$total_offer_redeem_qty  =  getSINGLEDBVALUE('sum(od_qty)', "od_id = '$order_id' and find_in_set('$key',offer_id) and redeem_offer_id ='$key' and deleted = '0' and od_status_item !='7'", 'js_shop_order_item', 'label');
			if ($total_offer_redeem_qty == '') {
				$total_offer_redeem_qty = '0';
			}


			if ($offer_type == '1') {
				$offer_avail_qty = $total_offer_avail_qty - $offer_qty;
			} else {
				$offer_avail_qty = $total_offer_avail_qty;
			}

			if ($total_offer_avail_qty > $offer_qty || $total_offer_avail_qty == $offer_qty) {
				$applied_offer_ID = $key;
			}

			if (($offer_avail_qty == $offer_value || $offer_avail_qty > $offer_value) && $applied_offer_ID != '' && $offer_type == '1') {


				$cart_offerapply_product = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` where find_in_set('$applied_offer_ID',offer_id) AND offer_product_id='' and redeem_offer!='Y' and od_status_item !='7' ORDER BY `od_price` ASC limit 0,$offer_value") or die(sqlERROR_LABEL());

				while ($cart_offerapply_row = sqlFETCHARRAY_LABEL($cart_offerapply_product)) {
					$cart_id = $cart_offerapply_row['cart_id'];
					$cart_updated_id[] = $cart_offerapply_row['cart_id'];
					$offer_type = $cart_offerapply_row['offer_type'];
					$od_price = $cart_offerapply_row['od_price'];
					$item_tax1 = $cart_offerapply_row['item_tax1'];
					$item_tax2 = $cart_offerapply_row['item_tax2'];
					if ($offer_type == '1') {
						$offer_dis_value = $od_price + $item_tax1 + $item_tax2;
					}

					$offer_cart_id = implode(",", $cart_updated_id);
					$arrFields = array('`redeem_offer`', '`redeem_offer_id`', '`redeem_offer_value`');
					$arrValues = array("Y", "$applied_offer_ID", "$offer_dis_value");

					$sqlWhere = "cart_id = '$cart_id'";

					if (sqlACTIONS("UPDATE", "js_shop_order_item", $arrFields, $arrValues, $sqlWhere)) {

						$msg = "success";
					}
				}
				if ($msg == 'success') {
					$cart_offerapply_id = sqlQUERY_LABEL("SELECT cart_id FROM `js_shop_order_item` where find_in_set('$applied_offer_ID',offer_id) and redeem_offer_id  ='0' and offer_product_id ='' and od_status_item !='7' limit 0,$offer_qty") or die(sqlERROR_LABEL());
					while ($cart_checkapply_id = sqlFETCHARRAY_LABEL($cart_offerapply_id)) {
						$cartupdate_id[] = $cart_checkapply_id['cart_id'];
					}

					$offer_update_cart_id = implode("','", $cartupdate_id);

					$arrFields1 = array('`redeem_offer`', '`offer_product_id`');
					$arrValues1 = array("Y", "$offer_cart_id");

					$sqlWhere1 = "cart_id IN('$offer_update_cart_id')";
					if (sqlACTIONS("UPDATE", "js_shop_order_item", $arrFields1, $arrValues1, $sqlWhere1)) {
					}
				}
				UPDATE_OFFERS($order_id);
			}

			// echo $offer_avail_qty.'-'.$offer_qty.'-'.$applied_offer_ID.'-'.$offer_type.'</br>';  
			if (($offer_avail_qty == $offer_qty || $offer_avail_qty > $offer_qty) && $applied_offer_ID != '' && $offer_type == '3') {

				// echo "jg";
				$cart_offerapply_product = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` where offer_id=$applied_offer_ID  AND offer_product_id= 0 and redeem_offer!='Y' and od_status_item !='7' ORDER BY `od_price` ASC LIMIT $offer_qty") or die(sqlERROR_LABEL());

				while ($cart_offerapply_row = sqlFETCHARRAY_LABEL($cart_offerapply_product)) {
					$cart_id = $cart_offerapply_row['cart_id'];
					$cart_updated_id[] = $cart_offerapply_row['cart_id'];
					$offer_type = $cart_offerapply_row['offer_type'];
					$od_price = $cart_offerapply_row['od_price'];
					$item_tax1 = $cart_offerapply_row['item_tax1'];
					$item_tax2 = $cart_offerapply_row['item_tax2'];
					$price = $od_price + $item_tax1 + $item_tax2;
					$offer_val = $offer_value / $offer_qty;
					$offer_dis_value = ($price * ($offer_val / 100));
					$flatamount = ($od_price  - $offer_dis_value);

					$offer_cart_id = implode(",", $cart_updated_id);
					$arrFields = array('`redeem_offer`', '`redeem_offer_id`', '`od_price`', '`redeem_offer_value`', '`offer_product_id`');
					$arrValues = array("Y", "$applied_offer_ID", "$flatamount", "$offer_dis_value", "$cart_id");

					$sqlWhere = "cart_id = '$cart_id'";
					// echo $cart_id;
					if (sqlACTIONS("UPDATE", "js_shop_order_item", $arrFields, $arrValues, $sqlWhere)) {

						$msg = "success";
					}
				}
				UPDATE_OFFERS($order_id);
				// exit();

			}

			if (($offer_avail_qty == $offer_qty || $offer_avail_qty > $offer_qty) && $applied_offer_ID != '' && $offer_type == '2') {


				$cart_offerapply_product = sqlQUERY_LABEL("SELECT * FROM `js_shop_order_item` where offer_id=$applied_offer_ID AND offer_product_id= 0 and redeem_offer!= 'Y' and od_status_item !='7' ORDER BY `od_price` ASC LIMIT $offer_qty") or die(sqlERROR_LABEL());

				while ($cart_offerapply_row = sqlFETCHARRAY_LABEL($cart_offerapply_product)) {

					$cart_id = $cart_offerapply_row['cart_id'];
					$cart_updated_id[] = $cart_offerapply_row['cart_id'];
					$offer_type = $cart_offerapply_row['offer_type'];
					$od_price = $cart_offerapply_row['od_price'];
					$item_tax1 = $cart_offerapply_row['item_tax1'];
					$item_tax2 = $cart_offerapply_row['item_tax2'];
					$price = $od_price + $item_tax1 + $item_tax2;
					$offer_dis_value = ($price - $offer_value);
					$flatamount = ($offer_value - ($item_tax1 + $item_tax2));

					$offer_cart_id = implode(",", $cart_updated_id);
					$arrFields = array('`redeem_offer`', '`od_price`', '`redeem_offer_id`', '`redeem_offer_value`', '`offer_product_id`');
					$arrValues = array("Y", "$flatamount", "$applied_offer_ID", "$offer_dis_value", "$cart_id");

					$sqlWhere = "cart_id = '$cart_id'";

					if (sqlACTIONS("UPDATE", "js_shop_order_item", $arrFields, $arrValues, $sqlWhere)) {

						$msg = "success";
					}
				}
				UPDATE_OFFERS($order_id);
			}
		}
	}
}

function getnewSTAFF()
{

	$collectITEM_Count = sqlQUERY_LABEL("SELECT staff_code FROM `js_staff` where deleted = '0' ") or die("Unable to get Staffcode: " . sqlERROR_LABEL());
	if (sqlNUMOFROW_LABEL($collectITEM_Count) > 0) {
		while ($collectITEM_id = sqlFETCHARRAY_LABEL($collectITEM_Count)) {
			$staffCODE_detail = $collectITEM_id['staff_code'];
		}
		$staffCODE_detail++;
	} else {
		$staffCODE_detail = "RARE-" . date('my') . '-01';
	}
	return $staffCODE_detail;
}


function GET_DASHBOARD_GRAPH($filterbydate, $request_type)
{
	if ($request_type == 'user') {
		for ($x = 1; $x <= 12; $x++) {

			$QUERY = sqlQUERY_LABEL("select count(*) AS user FROM js_customer WHERE   MONTH(createdon) = '$x' {$filterbydate}") or die("Unable to get user: " . sqlERROR_LABEL());

			while ($collect_QUERY = sqlFETCHARRAY_LABEL($QUERY)) {
				$user[] = $collect_QUERY['user'];
			}
		}
		return implode(',', $user);
	}
	if ($request_type == 'subscriber') {
		for ($x = 1; $x <= 12; $x++) {

			$QUERY = sqlQUERY_LABEL("select count(*) AS user FROM js_subscriber WHERE   MONTH(createdon) = '$x'  {$filterbydate}") or die("Unable to get user: " . sqlERROR_LABEL());

			while ($collect_QUERY = sqlFETCHARRAY_LABEL($QUERY)) {
				$user[] = $collect_QUERY['user'];
			}
		}
		return implode(',', $user);
	}
	if ($request_type == 'order') {
		for ($x = 1; $x <= 12; $x++) {

			$QUERY = sqlQUERY_LABEL("select count(*) AS user FROM js_shop_order WHERE   MONTH(createdon) = '$x' {$filterbydate}") or die("Unable to get user: " . sqlERROR_LABEL());

			while ($collect_QUERY = sqlFETCHARRAY_LABEL($QUERY)) {
				$user[] = $collect_QUERY['user'];
			}
		}
		return implode(',', $user);
	}
}

function CRYPTO_SHA256_ENCRIPTION($string, $action)
{
	$secret_key = 'qIth98pclu40B8x1A4T0UCHTDSY0CGS417ahl3kf206luBay7p';
	$secret_iv = '99FF8B0332880F69D14T098UC4H0T1D41S206110316D640AFFA8F422311C1576AF055A00498A88EEE80D337FBB1E4B8081A0901E9A1750806B2B371E7438AB968E4C1C8D3EF05A81ED';

	$output = false;
	$encrypt_method = "AES-256-CFB8";
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if ($action == 'enc') {
		$output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
	} else if ($action == 'dec') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	} else {
		return false;
	}

	return $output;
}
function getPRODUCTCOLOR($selected_ID, $requesttype)
{
	/*****************  SELECT OPTION   *****************/
	if ($requesttype == 'label') {
		$getproduct_query = sqlQUERY_LABEL("SELECT `productfiltercolortitle` FROM `js_productfiltercolor` where `productfiltercolorID`='$selected_ID'") or die("#STATUS-LABEL: Getting Status: " . sqlERROR_LABEL());
		while ($getproduct_fetch = sqlFETCHARRAY_LABEL($getproduct_query)) {
			$productfiltercolortitle = $getproduct_fetch['productfiltercolortitle'];
			return $productfiltercolortitle;
		}
	}
}

/***************** 4. get RESET PWD HASH KEY DETAILS *****************/
function getPASSWORD_RESET_LOG_DETAILS($email_ID, $hash_key, $requesttype)
{
	if ($requesttype == 'reset_key') :
		$selected_query = sqlQUERY_LABEL("SELECT `reset_key` FROM `js_pwd_reset_log` where `email_ID` = '$email_ID' and `reset_key` = '$hash_key' and `deleted` = '0'") or die("#1-getPASSWORD_RESET_LOG_DETAILS:" . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
			$reset_key = $fetch_data['reset_key'];
		endwhile;
		return $reset_key;
	endif;

	if ($requesttype == 'expiry_date') :
		$selected_query = sqlQUERY_LABEL("SELECT `expiry_date` FROM `js_pwd_reset_log` where `email_ID` = '$email_ID' and `reset_key` = '$hash_key' and `deleted` = '0'") or die("#1-getPASSWORD_RESET_LOG_DETAILS:" . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
			$expiry_date = $fetch_data['expiry_date'];
		endwhile;
		return $expiry_date;
	endif;

	if ($requesttype == 'status') :
		$selected_query = sqlQUERY_LABEL("SELECT `status` FROM `js_pwd_reset_log` where `email_ID` = '$email_ID' and `reset_key` = '$hash_key' and `deleted` = '0'") or die("#1-getPASSWORD_RESET_LOG_DETAILS:" . sqlERROR_LABEL());
		while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
			$status = $fetch_data['status'];
		endwhile;
		return $status;
	endif;
}

function getPRODUCTCOLORDETAILS($selected_type_id)
{

	if ($selected_type_id != '') {

		$list_product_name = sqlQUERY_LABEL("SELECT productcolor FROM js_product WHERE productID = $selected_type_id") or die("#1-Unable to get records:" . sqlERROR_LABEL());

		while ($row_cus = sqlFETCHARRAY_LABEL($list_product_name)) {
			$productcolor = $row_cus["productcolor"];
			$__color_title = getSINGLEDBVALUE('productfiltercolortitle', " productfiltercolorID='$productcolor' and deleted='0' and status = '1'", 'js_productfiltercolor', 'label');

			if ($__color_title == '') {
				$__color_title = 'N/A';
			} else {
				$__color_title = $__color_title;
			}

			return $__color_title;
		}
	}
}

function QUERY_SANITIZE($input)
{
	if (is_array($input)) :
		foreach ($input as $key => $value) :
			$result[$key] = sanitize($value);
		endforeach;
	else :
		$result = htmlentities($input, ENT_QUOTES, 'UTF-8');
	endif;

	return $result;
}

function getPROJECT_NAME_FROM_PROJECT_ID($selected_ID, $requesttype)
{
	if ($requesttype == 'select') :
		?>
		<option value=''>Choose Project Name</option>
		<?php
		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_name` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0'");

		$count_project_list = sqlNUMOFROW_LABEL($list_project_datas);

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :

			$projectID = $row['projectID'];
			$project_name = $row['project_name'];

		?>
			<option value='<?php echo $projectID; ?>' <?php if ($selected_ID == $projectID) {
															echo "selected";
														} ?>>
				<?php echo $project_name; ?>
			</option>
		<?php

		endwhile;

	endif;

	if ($requesttype == 'label') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_name` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$selected_ID'");

		$count_project_list = sqlNUMOFROW_LABEL($list_project_datas);

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :

			$projectID = $row['projectID'];
			$project_name = $row['project_name'];

		endwhile;

		return $project_name;

	endif;
}

function getPROJECT_DETAILS($requested_data, $requested_id)
{
	if ($requested_data == 'status') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_status` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$project_status = $row['project_status'];

			if ($project_status == '1') :
				$project_status = '<span class="badge text-bg-info text-uppercase rounded-0">In Progress</span>';
			elseif ($project_status == '2') :
				$project_status = '<span class="badge text-bg-success text-uppercase rounded-0">Completed</span>';
			elseif ($project_status == '3') :
				$project_status = '<span class="badge text-bg-primary text-uppercase rounded-0">For Sale</span>';
			elseif ($project_status == '4') :
				$project_status = '<span class="badge text-bg-danger text-uppercase rounded-0">Sold Out</span>';
			else :
				$project_status = 'N/A';
			endif;

		endwhile;

		echo $project_status;

	endif;

	if ($requested_data == 'name') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_name` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$project_name = $row['project_name'];
		endwhile;

		echo $project_name;

	endif;

	if ($requested_data == 'place') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_place` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$project_place = $row['project_place'];
		endwhile;

		echo $project_place;

	endif;

	if ($requested_data == 'address') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_address` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$project_address = $row['project_address'];
		endwhile;

		echo $project_address;

	endif;

	if ($requested_data == 'sqft') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `project_sqft` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$project_sqft = $row['project_sqft'];
		endwhile;

		echo $project_sqft;

	endif;

	if ($requested_data == 'bedrooms_count') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `no_of_bedrooms` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$no_of_bedrooms = $row['no_of_bedrooms'];
		endwhile;

		echo $no_of_bedrooms;

	endif;

	if ($requested_data == 'bedrooms_count') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `projectID`, `no_of_bedrooms` FROM `js_projectdetails` WHERE `status` = '1' AND `deleted` = '0' AND `projectID` = '$requested_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$no_of_bedrooms = $row['no_of_bedrooms'];
		endwhile;

		echo $no_of_bedrooms;

	endif;
}
function get_LANG_LIST($selected_value, $requesttype)
{

	if ($requesttype == 'select_option') :
		$return =
			'<option value="EN" ' . (($selected_value == "EN") ?  "selected" : "") . '>ENGLISH</option>
		<option value="HI" ' . (($selected_value == "HI") ?  "selected" : "") . '>HINDI</option>';
		return $return;
	endif;
}
function getHINDITITLE($selected_id, $requesttype)
{

	if ($requesttype == 'get_pressrelease_hindi_title') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `pressrelease_title` FROM `js_pressrelease_hindi` WHERE  `deleted` = '0' AND `pressrelease_id` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$pressrelease_title = $row['pressrelease_title'];
		endwhile;

		return $pressrelease_title;

	endif;
	if ($requesttype == 'get_presscoverage_hindi_title') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `presscoverage_title` FROM `js_presscoverage_hindi` WHERE  `deleted` = '0' AND `pressrelease_id` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$presscoverage_title = $row['presscoverage_title'];
		endwhile;

		return $presscoverage_title;

	endif;
	if ($requesttype == 'getcircular_hindi_title') :
		$list_project_datas = sqlQUERY_LABEL("SELECT `circulars_title` FROM `js_circulars_hindi` WHERE  `deleted` = '0' AND `circulars_ID` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$circulars_title = $row['circulars_title'];
		endwhile;

		return $circulars_title;

	endif;
	if ($requesttype == 'get_pressreleasetrash_hindi_title') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `pressrelease_title` FROM `js_pressrelease_hindi` WHERE  `deleted` = '1' AND `pressrelease_id` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$pressrelease_title = $row['pressrelease_title'];
		endwhile;

		return $pressrelease_title;
 
	endif;
	if ($requesttype == 'get_presscoveragetrash_hindi_title') :

		$list_project_datas = sqlQUERY_LABEL("SELECT `presscoverage_title` FROM `js_presscoverage_hindi` WHERE  `deleted` = '1' AND `pressrelease_id` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$presscoverage_title = $row['presscoverage_title'];
		endwhile;

		return $presscoverage_title;

	endif;
	if ($requesttype == 'getciruclartrash_hindi_title') :
		$list_project_datas = sqlQUERY_LABEL("SELECT `circulars_title` FROM `js_circulars_hindi` WHERE  `deleted` = '1' AND `circulars_ID` = '$selected_id'");

		while ($row = sqlFETCHARRAY_LABEL($list_project_datas)) :
			$circulars_title = $row['circulars_title'];
		endwhile;

		return $circulars_title;

	endif;
}
function needfor_enquiryform($selected_type_id, $requesttype)
{

	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select') {  ?>


		<option value="" <?php if ($selected_type_id == '') {
								echo "selected";
							} ?>> --None-- </option>

		<option value="1" <?php if ($selected_type_id == '1') {
								echo "selected";
							} ?>></option>

		<option value="2" <?php if ($selected_type_id == '2') {
								echo "selected";
							} ?>>Edit</option>

		<option value="3" <?php if ($selected_type_id == '3') {
								echo "selected";
							} ?>>Delete</option>

		<option value="4" <?php if ($selected_type_id == '4') {
								echo "selected";
							} ?>>List</option>

		<option value="5" <?php if ($selected_type_id == '5') {
								echo "selected";
							} ?>>Preview</option>

		<option value="6" <?php if ($selected_type_id == '6') {
								echo "selected";
							} ?>>Import</option>

		<option value="7" <?php if ($selected_type_id == '7') {
								echo "selected";
							} ?>>Product Step1</option>

		<option value="8" <?php if ($selected_type_id == '8') {
								echo "selected";
							} ?>>Product Step2</option>

		<option value="9" <?php if ($selected_type_id == '9') {
								echo "selected";
							} ?>>Product Step3</option>

		<option value="10" <?php if ($selected_type_id == '10') {
								echo "selected";
							} ?>>Product Step4</option>

		<option value="11" <?php if ($selected_type_id == '11') {
								echo "selected";
							} ?>>Product Step5</option>

		<option value="12" <?php if ($selected_type_id == '12') {
								echo "selected";
							} ?>>Product Step6</option>

		<option value="13" <?php if ($selected_type_id == '13') {
								echo "selected";
							} ?>>Import Images</option>

		<option value="14" <?php if ($selected_type_id == '14') {
								echo "selected";
							} ?>>Variant Import</option>
		<option value="15" <?php if ($selected_type_id == '15') {
								echo "selected";
							} ?>>Trash</option>

	<?php
	}
}
function getTRASHCOUNT($requesttype)
{
	if ($requesttype == 'get_trash_count') {

		$counting_TRASH_DETAILS = sqlQUERY_LABEL("SELECT COUNT(`enquiryform_ID`) AS TOTAL_TRASH FROM `js_enquiryform` WHERE `deleted` = '1'");

		if (sqlNUMOFROW_LABEL($counting_TRASH_DETAILS)) {
			while ($collect_order_DATA = sqlFETCHARRAY_LABEL($counting_TRASH_DETAILS)) {
				echo $collect_order_DATA['TOTAL_TRASH'];
			}
		} else {
			echo '0';
		}
	}
}

function getENQUIRYFORM_NEEDFOR_LIST($selected_value, $requesttype)
{
	if ($requesttype == 'select') :
	?>
		<option value="">Select Need</option>
		<option value="1" <?php if ($selected_value == '1') : echo "selected";
							endif; ?>>Machinery loan</option>
		<option value="2" <?php if ($selected_value == '2') : echo "selected";
							endif; ?>>Loans for factory building & Machinery</option>
		<option value="3" <?php if ($selected_value == '3') : echo "selected";
							endif; ?>>Working Capital</option>
		<option value="4" <?php if ($selected_value == '4') : echo "selected";
							endif; ?>>Loan against property</option>
		<option value="5" <?php if ($selected_value == '5') : echo "selected";
							endif; ?>>Green Finance products</option>
		<option value="6" <?php if ($selected_value == '6') : echo "selected";
							endif; ?>>Equity Support</option>
		<option value="7" <?php if ($selected_value == '7') : echo "selected";
							endif; ?>>Refinance</option>
		<option value="8" <?php if ($selected_value == '8') : echo "selected";
							endif; ?>>NBFC assistance</option>
		<option value="9" <?php if ($selected_value == '9') : echo "selected";
							endif; ?>>Term Loan/Working Capital</option>
		<option value="10" <?php if ($selected_value == '10') : echo "selected";
							endif; ?>>Micro-Finance</option>
		<option value="11" <?php if ($selected_value == '11') : echo "selected";
							endif; ?>>PSIG Programmes</option>
		<option value="12" <?php if ($selected_value == '12') : echo "selected";
							endif; ?>>Small Finance Banks</option>
		<option value="13" <?php if ($selected_value == '13') : echo "selected";
							endif; ?>>Bonds/Debentures/Fixed Deposits</option>
		<option value="14" <?php if ($selected_value == '14') : echo "selected";
							endif; ?>>Others</option>
	<?php
	endif;

	if ($requesttype == 'label') :
		switch ($selected_value):
			case '1':
				$return_result = 'Machinery loan';
				break;
			case '2':
				$return_result = 'Loans for factory building & Machinery';
				break;
			case '3':
				$return_result = 'Working Capital';
				break;
			case '4':
				$return_result = 'Loan against property';
				break;
			case '5':
				$return_result = 'Green Finance products';
				break;
			case '6':
				$return_result = 'Equity Support';
				break;
			case '7':
				$return_result = 'Refinance';
				break;
			case '8':
				$return_result = 'NBFC assistance';
				break;
			case '9':
				$return_result = 'Term Loan/Working Capital';
				break;
			case '10':
				$return_result = 'Micro-Finance';
				break;
			case '11':
				$return_result = 'PSIG Programmes';
				break;
			case '12':
				$return_result = 'Small Finance Banks';
				break;
			case '13':
				$return_result = 'Bonds/Debentures/Fixed Deposits';
				break;
			case '14':
				$return_result = 'Others';
				break;
		endswitch;
		return $return_result;
	endif;

	if ($requesttype == 'email_label') :
		switch ($selected_value):
			case '1':
				$return_result = 'bd.dcv@sidbi.in';
				break;
			case '2':
				$return_result = 'bd.dcv@sidbi.in';
				break;
			case '3':
				$return_result = 'bd.dcv@sidbi.in';
				break;
			case '4':
				$return_result = 'bd.dcv@sidbi.in';
				break;
			case '5':
				$return_result = 'gcfv@sidbi.in';
				break;
			case '6':
				$return_result = 'vcf@sidbi.in';
				break;
			case '7':
				$return_result = 'ifvrefinance@sidbi.in';
				break;
			case '8':
				$return_result = 'snv@sidbi.in';
				break;
			case '9':
				$return_result = 'bd.dcv@sidbi.in';
				break;
			case '10':
				$return_result = 'snv@sidbi.in';
				break;
			case '11':
				$return_result = 'psig_srf_users@sidbi.in';
				break;
			case '12':
				$return_result = 'ifvsfb@sidbi.in';
				break;
			case '13':
				$return_result = 'rmd_mo@sidbi.in';
				break;
			case '14':
				$return_result = 'websupport@sidbi.in';
				break;
		endswitch;
		return $return_result;
	endif;

}

function getENQUIRYFORM_DETAILS($selected_id, $request_type)
{
	/*****************  NAME OPTION   *****************/
	if ($request_type == 'get_name_in_select') {
	?>
		<option value=''> Select Name </option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT `name` FROM `js_enquiryform` WHERE `deleted` = '0' and `status` = '1' order by enquiryform_ID ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$name = $getstatus_fetch['name'];
		?>
			<option value='<?php echo $name; ?>' <?php if ($selected_id == $name) {
														echo "selected";
													} ?>>
				<?php echo $name; ?>
			</option>
		<?php
		}
	}
	/*****************  EMAIL OPTION   *****************/
	if ($request_type == 'get_email_in_select') {
		?>
		<option value=''> Select Email-ID </option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT `email` FROM `js_enquiryform` WHERE `deleted` = '0' and `status` = '1' order by enquiryform_ID ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$email = $getstatus_fetch['email'];
		?>
			<option value='<?php echo $email; ?>' <?php if ($selected_id == $email) {
														echo "selected";
													} ?>>
				<?php echo $email; ?>
			</option>
		<?php
		}
	}
	/*****************  MOBILE NUMBER OPTION   *****************/
	if ($request_type == 'get_mobile_in_select') {
		?>
		<option value=''> Select Mobile Number </option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT `mobile_number` FROM `js_enquiryform` WHERE `deleted` = '0' and `status` = '1'order by enquiryform_ID ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$mobile = $getstatus_fetch['mobile_number'];
		?>
			<option value='<?php echo $mobile; ?>' <?php if ($selected_id == $mobile) {
														echo "selected";
													} ?>>
				<?php echo $mobile; ?>
			</option>
		<?php
		}
	}
}

function getGRIEVANCE_BRANCH($selected_value, $requesttype)
{

	$branches = [
		"Adityapur", "Agartala", "Agra", "Ahmedabad", "Aizwal", "Ambattur", "Andheri", "Aurangabad", "Bahadurgarh", "Baroda", "Bengaluru", "Bhilwara", "Bhiwadi", "Bhopal", "Bhubaneswar", "Chandigarh", "Changodar", "Chennai", "Chinchwad", "Coimbatore", "Default Branch", "Dehradun", "Dimapur", "Erode", "Faridabad", "Gandhidham", "Gangtok", "Gurugram", "Guwahati", "Haridwar", "Hosur", "Hubli", "Hyderabad", "Indore", "Itanagar", "Jaipur", "Jalandhar", "Jammu", "Jodhpur", "Kanchipuram", "Kanpur", "Kishangarh", "Kochi", "Kolhapur", "Kolkata", "Kundli", "Lucknow", "Ludhiana", "Madurai", "Mahesana_rro", "Morbi", "Mysore", "Nagpur", "Nasik", "New Delhi", "Noida", "Odhav_ahmedabad", "Panaji", "Patna", "Peenya", "Prayagraj", "Puducherry", "Pune", "QC test", "Raipur", "Rajkot", "Ranchi", "Rudrapur", "Shilong", "Shimla", "Sitapura Industrial Area", "Surat", "Thane", "Tirupur", "Udaipur", "Varanasi", "Vasai", "Vatva", "Vijayawada", "Visakhapatnam", "Vishwakarma Industrial Area", "Yamunanagar"
	];

	$uniqueBranches = array_unique($branches);
	sort($uniqueBranches);

	if ($requesttype == 'select') :
		?>
		<option value="">Select Branch</option>
		<?php
		foreach ($uniqueBranches as $index => $branch) :
		?>
			<option value="<?php echo $index + 1; ?>" <?php if ($selected_value == ($index + 1)) : echo "selected";
														endif; ?>><?php echo $branch; ?></option>
		<?php endforeach; ?>
	<?php
	endif;

	if ($requesttype == 'label') :
		$selectedBranch = isset($uniqueBranches[$selected_value - 1]) ? $uniqueBranches[$selected_value - 1] : '';
		return $selectedBranch;
	endif;
}


function getGRIEVANCE_REASON_TYPE($selected_value, $requesttype)
{
	$complaintReasons = [
		"Communication Issues",
		"Loan sanction Issue",
		"Loan Recovery Issues viz. OTS etc.",
		"Subsidy Issue",
		"HR Related Issues",
		"Issues related to status report CICs viz. CIBIL etc.",
		"COVID-19 related issues",
		"Levy of foreclosure charges",
		"Levy of charges without prior notice/excessive charges",
		"Staff behaviour",
		"Other / General issues",
	];

	$uniqueReasons = array_unique($complaintReasons);
	sort($uniqueReasons);

	if ($requesttype == 'select') :
	?>
		<option value="">Select Reason For Raising Complaint</option>
		<?php
		foreach ($uniqueReasons as $index => $reason) :
		?>
			<option value="<?php echo $index + 1; ?>" <?php if ($selected_value == ($index + 1)) : echo "selected";
														endif; ?>><?php echo $reason; ?></option>
		<?php endforeach; ?>
	<?php
	endif;

	if ($requesttype == 'label') :
		$selectedReason = isset($uniqueReasons[$selected_value - 1]) ? $uniqueReasons[$selected_value - 1] : '';
		return $selectedReason;
	endif;
}

function getSTATELIST($selected_id, $requesttype)
{
	if ($requesttype == 'select') :
	?>
		<option value=''> Select State</option>
		<?php
		$getstatus_query = sqlQUERY_LABEL("SELECT `state_id`, `state_name` FROM `js_states` ORDER BY `state_id` ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) :
			$state_id = $getstatus_fetch['state_id'];
			$state_name = $getstatus_fetch['state_name'];
		?>
			<option value='<?= $state_id; ?>' <?php if ($selected_id == $state_id) :
													echo "selected";
												endif; ?>>
				<?= $state_name; ?>
			</option>
		<?php
		endwhile;
	endif;

	if ($requesttype == 'label') :
		$selected_query = sqlQUERY_LABEL("SELECT `state_name` FROM `js_states` WHERE `state_id` = '$selected_id'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) :
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
				$state_name = $fetch_data['state_name'];
				return $state_name;
			endwhile;
		endif;
	endif;
}

function getDISTRICT_DETAILS($state_id, $selected_id, $requesttype)
{
	if ($requesttype == 'label') :
		$selected_query = sqlQUERY_LABEL("SELECT `name` FROM `js_districts` WHERE `state_id` = '$state_id' and `id` = '$selected_id'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) :
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
				$name = $fetch_data['name'];
				return $name;
			endwhile;
		endif;
	endif;
}

function getGRIEVANCES_CUSTOMER_TYPE($selected_value, $requesttype)
{
	if ($requesttype == 'select') :
		?>
		<option value="">Select Customer Type</option>
		<option value="1" <?php if ($selected_value == '1') : echo "selected";
							endif; ?>>SIDBI Customer</option>
		<option value="2" <?php if ($selected_value == '2') : echo "selected";
							endif; ?>>Non-SIDBI Customer</option>
<?php
	endif;
	if ($requesttype == 'label') :
		switch ($selected_value):
			case '1':
				$return_result = 'SIDBI Customer';
				break;
			case '2':
				$return_result = 'Non-SIDBI Customer';
				break;
		endswitch;
		return $return_result;
	endif;
}

function GRIVANCES_REF_NO()
{
	$day = date('d');
	$month = date('m');
	$year = date('Y');
	$collect_grivances_REFNO_COUNT = sqlQUERY_LABEL("SELECT `grivances_ref_no` FROM `js_grievanceform` WHERE `grivances_ref_no` != '' AND YEAR(`createdon`) = '$year' ORDER BY `grivances_ref_no` DESC LIMIT 0,1") or die("UNABLE_TO_GETTING_INVOICE_REFNO_COUNT: " . sqlERROR_LABEL());

	if (sqlNUMOFROW_LABEL($collect_grivances_REFNO_COUNT) > 0) :
		while ($collect_row_data = sqlFETCHARRAY_LABEL($collect_grivances_REFNO_COUNT)) :
			$getGRIVANCESREFNO = $collect_row_data['grivances_ref_no'];
		endwhile;
		$getGRIVANCESREFNO++;
	else :
		$getGRIVANCESREFNO = 'SIDBI/G/' . $year . '/' . $month . '/' . $day . '/' . '000001';
	endif;

	return $getGRIVANCESREFNO;
}

function ENQUIRY_REF_NO()
{
	$day = date('d');
	$month = date('m');
	$year = date('Y');
	$collect_enquiry_REFNO_COUNT = sqlQUERY_LABEL("SELECT `enquiry_ref_no` FROM `js_enquiryform` WHERE `enquiry_ref_no` != '' AND YEAR(`createdon`) = '$year' ORDER BY `enquiry_ref_no` DESC LIMIT 0,1") or die("UNABLE_TO_GETTING_INVOICE_REFNO_COUNT: " . sqlERROR_LABEL());

	if (sqlNUMOFROW_LABEL($collect_enquiry_REFNO_COUNT) > 0) :
		while ($collect_row_data = sqlFETCHARRAY_LABEL($collect_enquiry_REFNO_COUNT)) :
			$getENQUIRYREFNO = $collect_row_data['enquiry_ref_no'];
		endwhile;
		$getENQUIRYREFNO++;
	else :
		$getENQUIRYREFNO = 'SIDBI/E/' . $year . '/' . $month . '/' . $day . '/' . '000001';
	endif;

	return $getENQUIRYREFNO;
}

function get_LANGUAGE_TYPE($selected_value, $requesttype)
{
	if ($requesttype == 'select') :
		?>
		<option value="">Select Language</option>
		<option value="1" <?php if ($selected_value == '1') : echo "selected";
							endif; ?>>English</option>
		<option value="2" <?php if ($selected_value == '2') : echo "selected";
							endif; ?>>Hindi</option>
<?php
	endif;
	if ($requesttype == 'label') :
		switch ($selected_value):
			case '1':
				$return_result = 'English';
				break;
			case '2':
				$return_result = 'Hindi';
				break;
		endswitch;
		return $return_result;
	endif;
}
function getTENDER_DETAILS($language_type, $tender_title, $requesttype)
{
	if ($requesttype == 'get_tender_id'):
		if ($language_type == 'en'):
		$selected_query = sqlQUERY_LABEL("SELECT `tender_id` FROM `tenders` WHERE `tender_title` = '$tender_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
		if (sqlNUMOFROW_LABEL($selected_query) > 0) :
			while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
				$tender_id = $fetch_data['tender_id'];
				return $tender_id;
			endwhile;
			endif;
			elseif($language_type =='hi'):
			$selected_query = sqlQUERY_LABEL("SELECT `tender_id` FROM `tender_translations` WHERE `tender_title` = '$tender_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$tender_id = $fetch_data['tender_id'];
					return $tender_id;
				endwhile;
			endif;
			else:
			$selected_query = sqlQUERY_LABEL("SELECT `tender_id` FROM `tenders` WHERE `tender_title` = '$tender_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$tender_id = $fetch_data['tender_id'];
					return $tender_id;
				endwhile;
			endif;
		endif;
	endif;
}


function getCAREER_DETAILS($language_type, $career_title, $requesttype)
{
	if ($requesttype == 'get_career_id') :
		if ($language_type == 'en') :
			$selected_query = sqlQUERY_LABEL("SELECT `career_id` FROM `careers` WHERE `career_title` = '$career_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$career_id = $fetch_data['career_id'];
					return $career_id;
				endwhile;
			endif;
		elseif ($language_type == 'hi') :
			$selected_query = sqlQUERY_LABEL("SELECT `career_id` FROM `career_translations` WHERE `career_title` = '$career_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$career_id = $fetch_data['career_id'];
					return $career_id;
				endwhile;
			endif;
		else :
			$selected_query = sqlQUERY_LABEL("SELECT `career_id` FROM `careers` WHERE `career_title` = '$career_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$career_id = $fetch_data['career_id'];
					return $career_id;
				endwhile;
			endif;
		endif;
	endif;
}

function getPRESSRELEASE_DETAILS($language_type, $pressrelease_title, $requesttype)
{
	if ($requesttype == 'get_pressrelease_id') :
		if ($language_type == 'en') :
			$selected_query = sqlQUERY_LABEL("SELECT `pressrelease_id` FROM `pressreleases` WHERE `pressrelease_title` = '$pressrelease_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$pressrelease_id = $fetch_data['pressrelease_id'];
					return $pressrelease_id;
				endwhile;
			endif;
		elseif ($language_type == 'hi') :
			$selected_query = sqlQUERY_LABEL("SELECT `pressrelease_id` FROM `pressrelease_translations` WHERE `pressrelease_title` = '$pressrelease_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$pressrelease_id = $fetch_data['pressrelease_id'];
					return $pressrelease_id;
				endwhile;
			endif;
		else :
			$selected_query = sqlQUERY_LABEL("SELECT `pressrelease_id` FROM `pressreleases` WHERE `pressrelease_title` = '$pressrelease_title'") or die("#STATELABEL-LABEL: GETTING_STATE_LABEL: " . sqlERROR_LABEL());
			if (sqlNUMOFROW_LABEL($selected_query) > 0) :
				while ($fetch_data = sqlFETCHARRAY_LABEL($selected_query)) :
					$pressrelease_id = $fetch_data['pressrelease_id'];
					return $pressrelease_id;
				endwhile;
			endif;
		endif;
	endif;
}
function getMENU_PARENTDETAILS($selected_id, $request_type)
{
	/*****************  SELECT OPTION   *****************/
	if ($request_type == 'selectPARENT_for') {
		$getstatus_query = sqlQUERY_LABEL("SELECT `menu_ID`, `menu_english_title` FROM `js_megamenu` where parent_id ='0' and status ='1' and deleted='0' order by menu_english_title ASC") or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) {
			$menu_ID = $getstatus_fetch['menu_ID'];
			$menu_english_title = $getstatus_fetch['menu_english_title'];
		?>
			<option value='<?php echo $menu_ID; ?>' <?php if ($selected_id == $menu_ID) {
														echo "selected";
													} ?>>
				<?php echo $menu_english_title; ?>
			</option>
<?php
		}
	}
}
function getMENU_DETAILS($selected_status_id, $requesttype)
{


	/*****************  SELECT OPTION   *****************/

	if ($requesttype == 'select_menu_for') { ?>
	<option value='0' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> choose menu </option>

		<option value='1' <?php if ($selected_status_id == '1') {
								echo "selected";
							} ?>> Megamenu </option>

		<option value='2' <?php if ($selected_status_id == '2') {
								echo "selected";
							} ?>> Header </option>
		<option value='3' <?php if ($selected_status_id == '3') {
								echo "selected";
							} ?>> Footer </option>
	<?php

	}

	if ($requesttype == 'label_menu_for') {

		if ($selected_status_id == '1') {

			return "Megamenu";
		}

		if ($selected_status_id == '2') {

			return  "Header";
		}
		if ($selected_status_id == '3') {

			return  "Footer";
		}
	}
}
function get_CHILDMENU_TITLE($selected_id, $requesttype){

if ($requesttype == 'show_menu_in_megamenu') :
	$list_menu_title = sqlQUERY_LABEL("SELECT `menu_ID`, `parent_id`, `menu_for`, `menu_type`, `menu_english_title`, `menu_hindi_title` FROM `js_megamenu` WHERE `menu_for` = '$selected_id'  and `deleted` = '0'")or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());

	while ($row = sqlFETCHARRAY_LABEL($list_menu_title)) :
		$menu_english_title = $row['menu_english_title'];
	endwhile;

	return $menu_english_title;
endif;
}
function get_PARENT_MENU_TITLE($parent_ID, $request_type){
if ($request_type == 'label_parent_megamenu') :

	$listmenu_datas = sqlQUERY_LABEL("SELECT `menu_ID`, `menu_english_title` FROM `js_megamenu` WHERE  `deleted` = '0' AND `menu_ID` = '$parent_ID'");

	while ($row = sqlFETCHARRAY_LABEL($listmenu_datas)) :
		$menu_english_title = $row['menu_english_title'];
	endwhile;

	return $menu_english_title;

endif;

}
function check_CHILDMENU_TITLE($menu_ID, $requesttype){
if ($requesttype == 'check_childmenu_in_header') :
	$list_menu_title = sqlQUERY_LABEL("SELECT `menu_ID`, `menu_english_title`, `menu_hindi_title` FROM `js_megamenu` WHERE `menu_for` = '2' AND `menu_type`='2' AND `parent_id`=$menu_ID AND `deleted`='0'")or die("#STATUS-SELECT: Getting Status: " . sqlERROR_LABEL());
	$count_menu_list = sqlNUMOFROW_LABEL($list_menu_title);
	if($count_menu_list > 0):
		return "1";
	endif;
endif;
}

function filterInvalidUtf8($string)
{
    return mb_convert_encoding($string, 'UTF-8', 'UTF-8');
}

function generateOTP($length = 6)
{
	$otp = '';

	// Use only digits for the OTP
	$characters = '0123456789';

	$max = strlen($characters) - 1;

	for ($i = 0; $i < $length; $i++) {
		$otp .= $characters[rand(0, $max)];
	}

	return $otp;
}
/***************** 4. GET ACTIVE FINANCIALYEAR_DETAILS *****************/
function getFINANCIALYEAR_DETAILS($selected_status_id, $start_year, $end_year, $requesttype)
{
	if ($requesttype == 'select') :
		$getstatus_query = sqlQUERY_LABEL("SELECT `fy_id`, `fy_label` FROM `financial_year` WHERE `status` = '1' AND `deleted`='0' ORDER BY `fy_id` ASC") or die("#getFINANCIALYEAR_DETAILS: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) :
			$fy_id = $getstatus_fetch['fy_id'];
			$fy_label = $getstatus_fetch['fy_label'];
		?>
			<option value='<?= $fy_id; ?>' <?php if ($selected_status_id == $fy_id) :
												echo "selected";
											endif; ?>>
				<?= $fy_label; ?>
			</option>
		<?php
		endwhile;
	endif;
	if ($requesttype == 'list_of_year') :
		$getstatus_query = sqlQUERY_LABEL("SELECT `fy_id`, `fy_label` FROM `financial_year` WHERE `status` = '1' AND `deleted`='0' ORDER BY `fy_id` ASC") or die("#getFINANCIALYEAR_DETAILS: " . sqlERROR_LABEL());
		while ($getstatus_fetch = sqlFETCHARRAY_LABEL($getstatus_query)) :
			$fy_id = $getstatus_fetch['fy_id'];
			$fy_label = $getstatus_fetch['fy_label'];
			$get_YEAR = explode('-', $fy_label);
		?>
			<option value='<?= $get_YEAR[0]; ?>' <?php if ($selected_status_id == $get_YEAR[0]) :
														echo "selected";
													endif; ?>>
				<?= $get_YEAR[0]; ?>
			</option>
<?php
		endwhile;
	endif;
	if ($requesttype == 'get_fy_id') :
		$fy_label = $start_year . '-' . $end_year;
		$list_fy_data = sqlQUERY_LABEL("SELECT `fy_id` FROM `financial_year` where deleted = '0' and `fy_label` = '$fy_label'") or die("#1-getFINANCIALYEAR_DETAILS: unable to getting get_fy_id :" . sqlERROR_LABEL());
		$count_fy_list = sqlNUMOFROW_LABEL($list_fy_data);
		while ($row = sqlFETCHARRAY_LABEL($list_fy_data)) :
			$fy_id = $row["fy_id"];
		endwhile;
		return $fy_id;
	endif;
	if ($requesttype == 'get_fy_starting') :
		$list_fy_data = sqlQUERY_LABEL("SELECT `fy_starting` FROM `financial_year` where `deleted` = '0' and `fy_id` = '$selected_status_id'") or die("#2-getFINANCIALYEAR_DETAILS: unable to getting get_fy_starting :" . sqlERROR_LABEL());
		$count_fy_list = sqlNUMOFROW_LABEL($list_fy_data);
		while ($row = sqlFETCHARRAY_LABEL($list_fy_data)) :
			$fy_starting = $row["fy_starting"];
		endwhile;
		return $fy_starting;
	endif;
	if ($requesttype == 'get_fy_ending') :
		$list_fy_data = sqlQUERY_LABEL("SELECT `fy_ending` FROM `financial_year` where `deleted` = '0' and `fy_id` = '$selected_status_id'") or die("#3-getFINANCIALYEAR_DETAILS: unable to getting get_fy_ending :" . sqlERROR_LABEL());
		$count_fy_list = sqlNUMOFROW_LABEL($list_fy_data);
		while ($row = sqlFETCHARRAY_LABEL($list_fy_data)) :
			$fy_ending = $row["fy_ending"];
		endwhile;
		return $fy_ending;
	endif;
	if ($requesttype == 'get_fy_label') :
		$list_fy_data = sqlQUERY_LABEL("SELECT `fy_label` FROM `financial_year` where deleted = '0' and fy_id = '$selected_status_id'") or die("#4-getFINANCIALYEAR_DETAILS: unable to getting get_fy_ending :" . sqlERROR_LABEL());
		$count_fy_list = sqlNUMOFROW_LABEL($list_fy_data);
		while ($row = sqlFETCHARRAY_LABEL($list_fy_data)) :
			$fy_label = $row["fy_label"];
		endwhile;
		return $fy_label;
	endif;
}
