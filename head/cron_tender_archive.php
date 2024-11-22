<?php

extract($_REQUEST);
include_once('jackus.php');

//CRON RUN ON EVERY ONE MINUTE
$tender_archive = sqlQUERY_LABEL("UPDATE `js_tenders` SET `tender_archive` = '1' WHERE `tender_last_date` < CURDATE() and `deleted` = '0'");

if($tender_archive):
	
	echo "Query Executed Successfully !!!";

endif;