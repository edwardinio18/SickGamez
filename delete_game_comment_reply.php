<?php

	include("Account/server.php");

	if (isset($_GET['gameCommentReplyId'])) {

		$query = "DELETE FROM gameCommentsReplies WHERE gameCommentsRepliesId = ?;";
		$stmt = $db->prepare($query);
		$gameCommentReplyId = $_GET['gameCommentReplyId'];
		$stmt->bind_param("i", $gameCommentReplyId);
		$stmt->execute();

	}

?>