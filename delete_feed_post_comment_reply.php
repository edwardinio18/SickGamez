<?php

	include("Account/server.php");

	$feedPostCommentReplyId = $_GET['feedPostCommentReplyId'];

	$query = "DELETE FROM feedCommentsReplies WHERE feedCommentsRepliesId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $feedPostCommentReplyId);
	$stmt->execute();

	$query = "DELETE FROM feedNotifications WHERE feedNotificationsLikeFeedPostId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $feedPostCommentReplyId);
	$stmt->execute();

?>