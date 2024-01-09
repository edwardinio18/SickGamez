<?php

	include("Account/server.php");

	$feedPostCommentId = $_GET['feedPostCommentId'];

	$query = "SELECT * FROM feedCommentsReplies WHERE feedCommentsRepliesCommentId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $feedPostCommentId);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$query = "DELETE FROM feedCommentsReplies WHERE feedCommentsRepliesCommentId = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("i", $feedPostCommentId);
			$stmt->execute();

			$query = "DELETE FROM feedComments WHERE feedCommentId = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("i", $feedPostCommentId);
			$stmt->execute();

			$query = "DELETE FROM feedNotifications WHERE feedNotificationsFeedPostCommentId = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("i", $feedPostCommentId);
			$stmt->execute();

			$query = "DELETE FROM feedNotifications WHERE feedNotificationsLikeFeedPostId = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("i", $feedPostCommentId);
			$stmt->execute();

		}

	} else {

		$query = "DELETE FROM feedComments WHERE feedCommentId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentId);
		$stmt->execute();

		$query = "DELETE FROM feedNotifications WHERE feedNotificationsLikeFeedPostId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentId);
		$stmt->execute();

	}

?>