<?php

	include("server.php");

	if (isset($_GET['feedPostCommentRepliedCommentId']) || isset($_GET['feedID'])) {

		$feedID = $_GET['feedID'];

		echo getAllFeedPostComments($feedID, $db);

	}

?>