<?php
/*
* JACKUS - An In-house Framework for TDS Apps
*
* Author: Touchmark Descience Private Limited. 
* https://touchmarkdes.com
* Version 4.0.1
* Copyright (c) 2010-2023 Touchmark Descience Pvt Ltd
*
*/

extract($_REQUEST);
include_once('../../jackus.php');

if (isset($_POST['val']) == 'HI') :
    $_SESSION['set_global_lang'] = $_POST['val'];
elseif (($_POST['val']) == 'EN') :
    $_SESSION['set_global_lang'] = $_POST['val'];
else :
    $_SESSION['set_global_lang'] = 'EN';
endif;
