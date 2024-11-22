<?php
//get customer basic informations
if (isset($logged_customer_id)) {

	$_global_customer_datas = sqlQUERY_LABEL("SELECT * FROM `js_customer` where deleted = '0' and `user_id`='$logged_customer_id'") or die("Unable to get records:" . sqlERROR_LABEL());
	$_globalcheck_record_availabity = sqlNUMOFROW_LABEL($_global_customer_datas);

	if ($_globalcheck_record_availabity > 0) {
		while ($_global_customer_row = sqlFETCHARRAY_LABEL($_global_customer_datas)) {
			$__global_customerID = $_global_customer_row["user_id"];
			$__global_referral_code = $_global_customer_row["referral_code"];
			$__global_reference_code = $_global_customer_row["reference_code"];
			$__global_customergroup = $_global_customer_row["customergroup"];
			$__global_customerfirst = $_global_customer_row["customerfirst"];
			$__global_customerlast = $_global_customer_row["customerlast"];
			$__global_customeremail = $_global_customer_row["customeremail"];
			$__global_customerdob = dateformat_datepicker($_global_customer_row["customerdob"]);
			$__global_customergender = $_global_customer_row["customergender"];
			$__global_customerphone = $_global_customer_row["customerphone"];
			$__global_customeraddress1 = $_global_customer_row["customeraddress1"];
			$__global_customeraddress2 = $_global_customer_row["customeraddress2"];
			$__global_customerpincode = $_global_customer_row["customerpincode"];
			$__global_customerstate = $_global_customer_row["customerstate"];
			$__global_customercountry = $_global_customer_row["customercountry"];
			$__global_status = $_global_customer_row["status"];
		}
	} else {
		customer_logout();
	}

	//BILLING ADDRESS
	$_global_customerbilling_datas = sqlQUERY_LABEL("SELECT * FROM `js_billing_address` where deleted = '0' and `customerID`='$__global_customerID'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity = sqlNUMOFROW_LABEL($_global_customerbilling_datas);

	while ($_global_customerbilling_row = sqlFETCHARRAY_LABEL($_global_customerbilling_datas)) {
		$__global_bill_fname = $_global_customerbilling_row["bill_fname"];
		$__global_bill_lname = $_global_customerbilling_row["bill_lname"];
		$__global_bill_company = $_global_customerbilling_row["bill_company"];
		$__global_bill_country = $_global_customerbilling_row["bill_country"];
		$__global_bill_street1 = $_global_customerbilling_row["bill_street1"];
		$__global_bill_street2 = $_global_customerbilling_row["bill_street2"];
		$__global_bill_city = $_global_customerbilling_row["bill_city"];
		$__global_bill_state = $_global_customerbilling_row["bill_state"];
		$__global_bill_pin = $_global_customerbilling_row["bill_pin"];
	}

	//SHIPPING ADDRESS
	$_global_customershipping_datas = sqlQUERY_LABEL("SELECT * FROM `js_shipping_address` where deleted = '0' and `customerID`='$__global_customerID'") or die("Unable to get records:" . sqlERROR_LABEL());
	$check_record_availabity2 = sqlNUMOFROW_LABEL($_global_customershipping_datas);

	while ($_global_customershipping_row = sqlFETCHARRAY_LABEL($_global_customershipping_datas)) {
		$__global_ship_fname = $_global_customershipping_row["ship_fname"];
		$__global_ship_lname = $_global_customershipping_row["ship_lname"];
		$__global_ship_company = $_global_customershipping_row["ship_company"];
		$__global_ship_country = $_global_customershipping_row["ship_country"];
		$__global_ship_street1 = $_global_customershipping_row["ship_street1"];
		$__global_ship_street2 = $_global_customershipping_row["ship_street2"];
		$__global_ship_city = $_global_customershipping_row["ship_city"];
		$__global_ship_state = $_global_customershipping_row["ship_state"];
		$__global_ship_pin = $_global_customershipping_row["ship_pin"];
	}
}

function orderTOTALSUMMARY($orderID, $request)
{

	$selectod_discount_data = sqlQUERY_LABEL("select SUM(od_discount_amount) AS OD_TOTAL_DISCOUNT, od_shipping_cost, od_discount_promo_ID FROM `js_shop_order` where `od_id`='$orderID'") or die(sqlERROR_LABEL());
	$collect_od_discount_data = sqlFETCHASSOC_LABEL($selectod_discount_data);

	if ($request == 'discounttotal') {
		return $OD_TOTAL_DISCOUNT = $collect_od_discount_data['OD_TOTAL_DISCOUNT'];
	}
	$OD_TOTAL_DISCOUNT = $collect_od_discount_data['OD_TOTAL_DISCOUNT'];
	$od_dicount_promo_ID = $collect_od_discount_data['od_dicount_promo_ID'];
	$od_shipping_cost = $collect_od_discount_data['od_shipping_cost'];

	$selectpo_itemlist = sqlQUERY_LABEL("select count(*) as po_itemcount, SUM(od_price) AS OD_TOTAL, SUM(od_qty) AS OD_TOT_QTY, SUM(item_tax1) AS OD_totaltax1, SUM(item_tax2) AS OD_totaltax2 FROM `js_shop_order_item` where  `od_id`='$orderID' and od_status_item!='7' ") or die(sqlERROR_LABEL());
	$collect_itemlist_data = sqlFETCHASSOC_LABEL($selectpo_itemlist);

	$po_itemcount = $collect_itemlist_data['po_itemcount'];
	$OD_TOT_QTY = $collect_itemlist_data['OD_TOT_QTY'];
	$OD_totaltax1 = $collect_itemlist_data['OD_totaltax1'];
	$OD_totaltax2 = $collect_itemlist_data['OD_totaltax2'];
	$OD_SUB_TOTAL = $collect_itemlist_data['OD_TOTAL'];
	$OD_TOTAL = $collect_itemlist_data['OD_TOTAL'];

	$OFFER_discount_data = sqlQUERY_LABEL("select SUM(redeem_offer_value) AS OD_OFFER_DISCOUNT,SUM(item_tax1) AS OD_item_tax1 ,SUM(item_tax2) AS OD_item_tax2  FROM `js_shop_order_item` where `od_id`='$orderID' and redeem_offer_id!='0'   and deleted='0' ") or die(sqlERROR_LABEL());

	$collect_offer_discount_data = sqlFETCHASSOC_LABEL($OFFER_discount_data);

	$offer_TOTAL_DISCOUNT = $collect_offer_discount_data['OD_OFFER_DISCOUNT'];
	$offer_tax1 = $collect_offer_discount_data['OD_item_tax1'];
	$offer_tax2 = $collect_offer_discount_data['OD_item_tax2'];
	$total_offer = $offer_TOTAL_DISCOUNT;

	if ($request == 'subtotal') {
		return $OD_SUB_TOTAL;
	}
	if ($request == 'offer') {
		return $offer_TOTAL_DISCOUNT;
	}


	if ($request == 'taxtotal') {
		return ($OD_totaltax1 + $OD_totaltax2);
	}

	if ($request == 'ordertotal') {
		return (($OD_TOTAL + $OD_totaltax1 + $OD_totaltax1 + $od_shipping_cost) - $OD_TOTAL_DISCOUNT);
	}
}

function send_otp_message($otp_msg, $mobile)
{

	// $api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=PAYSMS&message=Thank+you+for+Enquiry+with+us.+Our+Account+Manager+Call+you+shortly.+For+more+Details+contact+:+OTP+'.$otp_msg.'+PAY4SMS+&number='.$mobile.'&templateid=1707161525758855774';

	$api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=RNVENT&message=' . $otp_msg . '+is+your+OTP+to+login+to+RARE.+DO+NOT+share+with+anyone.+RARE+never+calls+to+ask+for+OTP%2C+expires+in+10+mins.+-+RARE+Team+&number=' . $mobile . '&templateid=1707166903244593206';

	$smsGatewayUrl = "http://pay4sms.in/sendsms/";
	$smsgatewaydata = $smsGatewayUrl . $api_params;
	$url = $smsgatewaydata;

	$ch = curl_init();                       // initialize CURL
	curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);                         // Close CURL

	// Use file get contents when CURL is not installed on server.
	if (!$output) {
		$output =  file_get_contents($smsgatewaydata);
	}
}

function sendSMSTemplate($requesttype, $template_ID, $mobile_number, $od_id, $otp_num)
{
	$user_name = getORDER_DETAILS($od_id, 'get_shipping_first_name');

	/*****************  SMS OTP   *****************/
	if ($requesttype == 'otp') {
		$api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=RNVENT&message=' . $otp_num . '+is+your+OTP+to+login+to+RARE.+DO+NOT+share+with+anyone.+RARE+never+calls+to+ask+for+OTP%2C+expires+in+10+mins.+-+RARE+Team+&number=' . $mobile_number . '&templateid=' . $template_ID . '';
	}

	/*****************  SMS Order Confirmation   *****************/
	if ($requesttype == 'order_confirmation') {
		$order_ref_no = getORDERREF_USING_ODID($od_id);

		$selectpo_itemlist = sqlQUERY_LABEL("select count(*) as po_itemcount FROM `js_shop_order_item` where  `od_id`='$od_id' and od_status_item!='7' ") or die(sqlERROR_LABEL());
		$collect_itemlist_data = sqlFETCHASSOC_LABEL($selectpo_itemlist);
		$po_itemcount = $collect_itemlist_data['po_itemcount'];

		$api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=RNVENT&message=Hi+' . $user_name . '+,+we+have+received+your+order+for+' . $po_itemcount . '+items+(Order+No.:+' . $order_ref_no . ').+Thanks+for+shopping+with+us.+-+RARE+Team.+&number=' . $mobile_number . '&templateid=' . $template_ID . '';
	}

	/*****************  SMS Cancellation COD   *****************/
	if ($requesttype == 'cancellation_cod') {
		$order_ref_no = getORDERREF_USING_ODID($od_id);

		$api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=RNVENT&message=Hi+' . $user_name . '+,+your+item+' . $order_ref_no . '+has+been+cancelled.+Hope+you+order+again+-+RARE+Team.+&number=' . $mobile_number . '&templateid=' . $template_ID . '';
	}

	/*****************  SMS Cancellation Prepaid   *****************/
	if ($requesttype == 'cancellation_prepaid') {
		$order_ref_no = getORDERREF_USING_ODID($od_id);
		$refund_amount = general_currency_symbol . formatCASH(getcompletedTotal_cart_amount($od_id, $logged_user_id, '', 'total'));

		$selectpo_itemlist = sqlQUERY_LABEL("select count(*) as po_itemcount FROM `js_shop_order_item` where  `od_id`='$od_id' and od_status_item!='7' ") or die(sqlERROR_LABEL());
		$collect_itemlist_data = sqlFETCHASSOC_LABEL($selectpo_itemlist);
		$po_itemcount = $collect_itemlist_data['po_itemcount'];

		$api_params = '?token=e45e3233e8f54419c5be6ddc2cf37874&credit=2&sender=RNVENT&message=Hi+' . $user_name . '+,+we+have+successfully+processed+your+refund+for+your+item+' . $po_itemcount . '+returned+/+cancelled.+The+ARN+number+for+your+refund+is+' . $order_ref_no . '+and+refund+amount+is+' . $refund_amount . '.+Hope+you+order+again+-+RARE+Team.+&number=' . $mobile_number . '&templateid=' . $template_ID . '';
	}

	$smsGatewayUrl = "http://pay4sms.in/sendsms/";
	$smsgatewaydata = $smsGatewayUrl . $api_params;
	$url = $smsgatewaydata;

	$ch = curl_init();                       // initialize CURL
	curl_setopt($ch, CURLOPT_POST, false);    // Set CURL Post Data
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);                         // Close CURL

	// Use file get contents when CURL is not installed on server.
	if (!$output) {
		$output =  file_get_contents($smsgatewaydata);
	}
}

function send_otp_mail($otp_msg, $customer_email,$SMTP_EMAIL_SEND_FROM,$cc_mail,$bcc_mail,$picker_from_name)
{

	$query= "SELECT * FROM `js_users` where `useremail` = '$customer_email' ";
	$result = sqlQUERY_LABEL($query);
	while($row = sqlFETCHARRAY_LABEL($result)){	
		$customer_name = $row['username'];
	}
	if($customer_name == ''):
		$customer_name = 'User';
	else:
		$customer_name = $customer_name;
	endif;
	$time = date('jS, M Y, h:i: A');
	$subject = 'Your Verification OTP is ' . $otp_msg;
	$to = $customer_email;
	$cc = $cc_mail;
	$Bcc = $bcc_mail;
	$from = $SMTP_EMAIL_SEND_FROM;


	$mail_template = '<table class="nl-container" role="presentation" style="
	mso-table-lspace: 0pt;
	mso-table-rspace: 0pt;
	background-color: #ff385c;
	" width="100%" cellspacing="0" cellpadding="0" border="0">
	<tbody>
		<tr>
			<td>
				<table class="row row-1" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 5px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<div class="spacer_block" style="
							height: 40px;
							line-height: 40px;
							font-size: 1px;
						  ">
													 
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-2" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
			background-size: auto;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-size: auto;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 5px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="image_block block-1" role="presentation"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt" width="100%"
													cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  width: 100%;
								  padding-right: 0px;
								  padding-left: 0px;
								">
																<div class="alignment" style="line-height: 10px"
																	align="center">
																	<a href="'.SITEHOME.'" target="_blank"
																		style="outline: none" tabindex="-1"><img
																			src="'.SITEHOME.'/assets/images/radprix-logo-center.png"
																			style="
										display: block;
										height: auto;
										border: 0;
										width: 170px;
										max-width: 100%;
									  " alt="Radprix Logo" title="Radprix Logo" width="170" /></a>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
												<table class="text_block block-3" role="presentation" style="
				mso-table-lspace: 0pt;
				mso-table-rspace: 0pt;
				word-break: break-word;
			  " width="100%" cellspacing="0" cellpadding="0" border="0">
										<tbody>
											<tr>
												<td class="pad" style="
					  padding-bottom: 10px;
					  padding-left: 10px;
					  padding-right: 10px;
					  padding-top: 31px;
					">
													<div style="font-family: sans-serif">
														<div class="" style="
						  font-size: 12px;
						  mso-line-height-alt: 18px;
						  color: #ffffff;
						  line-height: 1.5;
						  font-family: Montserrat, Trebuchet MS,
							Lucida Grande, Lucida Sans Unicode,
							Lucida Sans, Tahoma, sans-serif;
						">
															<p style="
							margin: 0;
							font-size: 34px;
							text-align: center;
							mso-line-height-alt: 51px;
						  ">
																<span style="font-size: 34px"><strong><span
																			style="">Verification OTP</span></strong></span>
															</p>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-3" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 0px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="image_block block-1" role="presentation"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt" width="100%"
													cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  width: 100%;
								  padding-right: 0px;
								  padding-left: 0px;
								">
																<div class="alignment" style="line-height: 10px"
																	align="center">
																	<img class="big"
																		src="'.SITEHOME.'/assets/images/round_corner.png"
																		style="
									  display: block;
									  height: auto;
									  border: 0;
									  width: 680px;
									  max-width: 100%;
									" alt="Alternate text" title="Alternate text" width="680" />
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-4" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #ffffff;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 0px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<div class="spacer_block" style="
							height: 20px;
							line-height: 20px;
							font-size: 1px;
						  ">
													 
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-5" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #ffffff;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 0px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="text_block block-2" role="presentation" style="
							mso-table-lspace: 0pt;
							mso-table-rspace: 0pt;
							word-break: break-word;
						  " width="100%" cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  padding-bottom: 20px;
								  padding-left: 35px;
								  padding-right: 10px;
								  padding-top: 20px;
								">
																<div style="font-family: sans-serif">
																	<div class="" style="
									  font-size: 12px;
									  mso-line-height-alt: 14.399999999999999px;
									  color: #030303;
									  line-height: 1.2;
									  font-family: Montserrat, Trebuchet MS,
										Lucida Grande, Lucida Sans Unicode,
										Lucida Sans, Tahoma, sans-serif;
									">
																		<p style="
										margin: 0;
										font-size: 14px;
										text-align: center;
										mso-line-height-alt: 16.8px;
									  ">
																			<span style="font-size: 18px"><strong><span
																						style=""><span
																							style="font-size: 26px">Dear '.$customer_name.',</span><br /></span></strong></span>
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				
				<table class="row row-6" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #ffffff;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 0px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="text_block block-1" role="presentation" style="
							mso-table-lspace: 0pt;
							mso-table-rspace: 0pt;
							word-break: break-word;
						  " width="100%" cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  padding-bottom: 20px;
								  padding-left: 35px;
								  padding-right: 10px;
								  padding-top: 10px;
								">
																<div style="font-family: sans-serif">
																	<div class="" style="
									  font-size: 12px;
									  mso-line-height-alt: 18px;
									  color: #848484;
									  line-height: 1.5;
									  font-family: Montserrat, Trebuchet MS,
										Lucida Grande, Lucida Sans Unicode,
										Lucida Sans, Tahoma, sans-serif;
									">
																		<p style="
										margin: 0;
										font-size: 14px;
										text-align: center;
										mso-line-height-alt: 21px;
									  ">
																			<span style="font-size: 14px">Your <span>OTP is</span>  '.$otp_msg.' to confirm <span>your</span> <span>'.$customer_email.'</span>. <span>OTP</span> is valid for 5 minutes.</span>
																		</p>
																		<p style="
										margin: 0;
										font-size: 14px;
										text-align: center;
										mso-line-height-alt: 21px;
									  ">
																			<span style="font-size: 14px">Your <span>OTP Send Time: </span>  '.$time.'</span>
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				
				<table class="row row-7" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #ff385c;
		  " width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #ffffff;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 0px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="text_block block-1" role="presentation" style="
							mso-table-lspace: 0pt;
							mso-table-rspace: 0pt;
							word-break: break-word;
						  " width="100%" cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  padding-bottom: 20px;
								  padding-left: 35px;
								  padding-right: 10px;
								  padding-top: 10px;
								">
																<div style="font-family: sans-serif">
																	<div class="" style="
									  font-size: 12px;
									  mso-line-height-alt: 18px;
									  color: #848484;
									  line-height: 1.5;
									  font-family: Montserrat, Trebuchet MS,
										Lucida Grande, Lucida Sans Unicode,
										Lucida Sans, Tahoma, sans-serif;
									">
																		<p style="
										margin: 0;
										font-size: 14px;
										text-align: center;
										mso-line-height-alt: 21px;
									  ">
																			<span style="font-size: 14px">For any queries, please contact <a href="'.SITEHOME.'pages.php?id=19">'.$picker_from_name.'</a></span>
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>

				<table class="row row-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
					width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #ffffff;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 5px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<div class="spacer_block" style="
							height: 15px;
							line-height: 15px;
							font-size: 1px;
						  ">
													 
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-9" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
					width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #212147;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 25px;
						  padding-bottom: 5px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="text_block block-1" role="presentation" style="
							mso-table-lspace: 0pt;
							mso-table-rspace: 0pt;
							word-break: break-word;
						  " width="100%" cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  padding-bottom: 10px;
								  padding-left: 25px;
								  padding-right: 10px;
								  padding-top: 10px;
								">
																<div style="font-family: sans-serif">
																	<div class="" style="
									  font-size: 12px;
									  font-family: Montserrat, Trebuchet MS,
										Lucida Grande, Lucida Sans Unicode,
										Lucida Sans, Tahoma, sans-serif;
									  mso-line-height-alt: 14.399999999999999px;
									  color: #ffffff;
									  line-height: 1.2;
									">
																		<p style="
										margin: 0;
										font-size: 18px;
										text-align: center;
										mso-line-height-alt: 21.599999999999998px;
									  ">
																			<strong><span
																					style="color: #ffffff">Question or
																					Need Help?</span></strong>
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
												<table class="text_block block-2" role="presentation" style="
							mso-table-lspace: 0pt;
							mso-table-rspace: 0pt;
							word-break: break-word;
						  " width="100%" cellspacing="0" cellpadding="0" border="0">
													<tbody>
														<tr>
															<td class="pad" style="
								  padding-bottom: 10px;
								  padding-left: 35px;
								  padding-right: 35px;
								  padding-top: 10px;
								">
																<div style="font-family: sans-serif">
																	<div class="" style="
									  font-size: 12px;
									  mso-line-height-alt: 14.399999999999999px;
									  color: #f8f8f8;
									  line-height: 1.2;
									  font-family: Montserrat, Trebuchet MS,
										Lucida Grande, Lucida Sans Unicode,
										Lucida Sans, Tahoma, sans-serif;
									">
																		<p style="
										margin: 0;
										font-size: 14px;
										text-align: center;
										mso-line-height-alt: 16.8px;
									  ">
																			Feel free to reach us by clicking
																			the link
																			<a href="'.SITEHOME.'pages.php?id=19" style="
										  text-decoration: underline;
										  color: #ffffff;
										">here</a>. We aim to reply within 24 hours.
																		</p>
																	</div>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="row row-10" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
					width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
					<tbody>
						<tr>
							<td>
								<table class="row-content stack" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					background-color: #212147;
					color: #000000;
					width: 680px;
				  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
										<tr>
											<td class="column column-1" style="
						  mso-table-lspace: 0pt;
						  mso-table-rspace: 0pt;
						  font-weight: 400;
						  text-align: left;
						  vertical-align: top;
						  padding-top: 5px;
						  padding-bottom: 5px;
						  border-top: 0px;
						  border-right: 0px;
						  border-bottom: 0px;
						  border-left: 0px;
						" width="100%">
												<table class="divider_block block-1" role="presentation"
													style="mso-table-lspace: 0pt; mso-table-rspace: 0pt" width="100%"
													cellspacing="0" cellpadding="10" border="0">
													<tbody>
														<tr>
															<td class="pad">
																<div class="alignment" align="center">
																	<table role="presentation" style="
									  mso-table-lspace: 0pt;
									  mso-table-rspace: 0pt;
									" width="100%" cellspacing="0" cellpadding="0" border="0">
																		<tbody>
																			<tr>
																				<td class="divider_inner" style="
											font-size: 1px;
											line-height: 1px;
											border-top: 1px solid #ffffff;
										  ">
																					<span> </span>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>';
				$select_itemlist = sqlQUERY_LABEL("select `__general_facebook`, `__general_instagram`, `__general_twitter`, `__general_pintrest` FROM `js_settinggeneral` where `_generalID`='1'") or die(sqlERROR_LABEL());
				$result_count = sqlNUMOFROW_LABEL($select_itemlist);
				while ($collect_item_list = sqlFETCHARRAY_LABEL($select_itemlist)) {
					$facebook = $collect_item_list['__general_facebook'];
					$instagram = $collect_item_list['__general_instagram'];
					$twitter = $collect_item_list['__general_twitter'];
					$pinterest = $collect_item_list['__general_pintrest'];
				}

		$mail_template .=  '<table class="row row-11" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
			width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
			<tbody>
				<tr>
					<td>
						<table class="row-content stack" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			background-color: #212147;
			color: #000000;
			width: 680px;
		  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
							<tbody>
								<tr>
									<td class="column column-1" style="
				  mso-table-lspace: 0pt;
				  mso-table-rspace: 0pt;
				  font-weight: 400;
				  text-align: left;
				  vertical-align: top;
				  border-top: 0px;
				  border-right: 0px;
				  border-bottom: 0px;
				  border-left: 0px;
				" width="50%">
										<table class="social_block block-2" role="presentation"
											style="mso-table-lspace: 0pt; mso-table-rspace: 0pt" width="100%"
											cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr>
													<td class="pad" style="
						  padding-left: 20px;
						  text-align: left;
						  padding-right: 0px;
						  padding-bottom: 25px;
						">
														<div class="alignment" align="left">
															<table class="social-table" role="presentation"
																style="
							  mso-table-lspace: 0pt;
							  mso-table-rspace: 0pt;
							  display: inline-block;
							" width="141px" cellspacing="0" cellpadding="0" border="0">
																<tbody>
																	<tr>
																	<td style="padding:0 15px 0 0;"><a
																			href="'.$facebook.'"
																			target="_blank"><img
																				src="'.SITEHOME.'assets/images/facebook@2x.png"
																				alt="Facebook"
																				title="Facebook"
																				style="display: block; height: auto; border: 0;"
																				width="32" height="32"></a>
																	</td>
																	<td style="padding:0 15px 0 0;"><a
																			href="'.$twitter.'"
																			target="_blank"><img
																				src="'.SITEHOME.'assets/images/twitter@2x.png"
																				alt="Twitter"
																				title="Twitter"
																				style="display: block; height: auto; border: 0;"
																				width="32" height="32"></a>
																	</td>
																	<td style="padding:0 15px 0 0;"><a
																			href="'.$instagram.'"
																			target="_blank"><img
																				src="'.SITEHOME.'assets/images/instagram@2x.png"
																				alt="Instagram"
																				title="Instagram"
																				style="display: block; height: auto; border: 0;"
																				width="32" height="32"></a>
																	</td>
																	<td style="padding:0 15px 0 0;"><a
																			href="'.$pinterest.'"
																			target="_blank"><img
																				src="'.SITEHOME.'assets/images/pinterest@2x.png"
																				alt="Pinterest"
																				title="Pinterest"
																				style="display: block; height: auto; border: 0;"
																				width="32" height="32"></a>
																	</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
									<td class="column column-2" style="
				  mso-table-lspace: 0pt;
				  mso-table-rspace: 0pt;
				  font-weight: 400;
				  text-align: left;
				  vertical-align: top;
				  border-top: 0px;
				  border-right: 0px;
				  border-bottom: 0px;
				  border-left: 0px;
				" width="50%">
										<table class="text_block block-2" role="presentation" style="
					mso-table-lspace: 0pt;
					mso-table-rspace: 0pt;
					word-break: break-word;
				  " width="100%" cellspacing="0" cellpadding="0" border="0">
											<tbody>
												<tr>
													<td class="pad" style="
						  padding-bottom: 10px;
						  padding-left: 25px;
						  padding-right: 10px;
						  padding-top: 10px;
						">
														<div style="font-family: sans-serif">
															<div class="" style="
							  font-size: 12px;
							  mso-line-height-alt: 14.399999999999999px;
							  color: #c0c0c0;
							  line-height: 1.2;
							  font-family: Montserrat, Trebuchet MS,
								Lucida Grande, Lucida Sans Unicode,
								Lucida Sans, Tahoma, sans-serif;
							">
																<p style="
								margin: 0;
								text-align: right;
								mso-line-height-alt: 14.399999999999999px;
							  ">
																	<span
																		style="color: #c0c0c0; font-size: 12px">Copyright
																		© 2022&nbsp;
																		<a href="'.SITEHOME.'" target="_blank"
																			style="
									text-decoration: underline;
									color: #ffffff;
								  " rel="noopener">Radprix</a><br /></span>
																</p>
															</div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="row row-12" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt"
			width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
			<tbody>
				<tr>
					<td>
						<table class="row-content stack" role="presentation" style="
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			color: #000000;
			width: 680px;
		  " width="680" cellspacing="0" cellpadding="0" border="0" align="center">
							<tbody>
								<tr>
									<td class="column column-1" style="
				  mso-table-lspace: 0pt;
				  mso-table-rspace: 0pt;
				  font-weight: 400;
				  text-align: left;
				  vertical-align: top;
				  border-top: 0px;
				  border-right: 0px;
				  border-bottom: 0px;
				  border-left: 0px;
				" width="100%">
										<div class="spacer_block"
											style="height: 5px; line-height: 5px; font-size: 1px">
											 
										</div>
										<div class="spacer_block mobile_hide" style="
					height: 20px;
					line-height: 20px;
					font-size: 1px;
				  ">
											 
										</div>
										<div class="spacer_block"
											style="height: 5px; line-height: 5px; font-size: 1px">
											 
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
</tbody>
</table>';

	$sender_name = "Radprix";

	if (SMTP_EMAIL_CONFIG($to, $cc, $from, $Bcc, $sender_name, $subject, $mail_template)) {
		return "true";
	} else {
		return "false";
	}
}

function checkEmail($email)
{
	$find1 = strpos($email, '@');
	$find2 = strpos($email, '.');
	return ($find1 !== false && $find2 !== false && $find2 > $find1);
}

