<?php

	include("Account/server.php");

	if (isset($_GET['feedPostCommentId']) || isset($_GET['feedCommentID'])) {

		$feedID = $_GET['feedID'];

		echo getAllFeedPostComments($feedID, $db);

	}

?>