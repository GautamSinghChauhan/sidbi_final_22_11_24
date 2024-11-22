<?php

extract($_REQUEST);
include_once('jackus.php');

//CRON RUN ON EVERY ONE MINUTE
$career_archive = sqlQUERY_LABEL("UPDATE `careers` SET `career_archive` = '1' WHERE `career_end_date` < CURDATE() and `deleted` = '0'");

if($career_archive):

	echo "Query Executed Successfully !!!";
	
endif;