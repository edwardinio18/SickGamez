<?php

	include("Account/server.php");

	$feedID = $_GET['feedID'];

	echo getRatingFeed($feedID, $db);

?>