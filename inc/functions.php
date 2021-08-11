<?php

	ob_start();
	session_start();
	include("admin/inc/config.php");
	include("admin/inc/functions.php");
	include("admin/inc/CSRF_Protect.php");
	$csrf = new CSRF_Protect();
	$error_message = '';
	$success_message = '';
	$error_message1 = '';
	$success_message1 = '';
    
?>