<?php

	include("server.php");
	include("stripe-php-master/init.php");

	$userInfoID = fetchMyID($_COOKIE['username'], $db);
	$userInfoUsername = $_COOKIE['username'];

?>