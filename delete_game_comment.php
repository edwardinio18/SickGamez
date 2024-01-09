<?php

	include("Account/server.php");

	if (isset($_GET['gameCommentId'])) {

		$query = "DELETE FROM gameComments WHERE gameCommentId = ?;";
		$stmt = $db->prepare($query);
		$gameCommentId = $_GET['gameCommentId'];
		$stmt->bind_param("i", $gameCommentId);
		$stmt->execute();

	}

?>