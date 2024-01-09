<?php

	include("Account/server.php");

	$myID = fetchMyID($_COOKIE['username'], $db);

	$feedId = $_GET['feedId'];

	$query = "SELECT * FROM feed WHERE feedId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $feedId);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			$feedImage = $row['feedImage'];
			$feedImagePath = "/home/yv4nbnligki0/public_html/Feed_images/" . $feedImage;

			unlink($feedImagePath);

			$query = "DELETE FROM feed WHERE feedId = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("i", $feedId);
			$stmt->execute();

			$query1 = "DELETE FROM feedLikesDislikes WHERE feedIdLikesDislikesFeed = ? AND userIdLikesDislikesFeed = ?;";
			$stmt1 = $db->prepare($query1);
			$stmt1->bind_param("ii", $feedId, $myID);
			$stmt1->execute();

			$query2 = "DELETE FROM feedComments WHERE feedCommentFeedId = ?;";
			$stmt2 = $db->prepare($query2);
			$stmt2->bind_param("i", $feedId);
			$stmt2->execute();

			$query3 = "DELETE FROM feedCommentsReplies WHERE feedCommentsRepliesFeedId = ?;";
			$stmt3 = $db->prepare($query3);
			$stmt3->bind_param("i", $feedId);
			$stmt3->execute();

			$query4 = "DELETE FROM feedNotifications WHERE feedNotificationsAction != ? AND feedNotificationsFeedId = ?;";
			$stmt4 = $db->prepare($query4);
			$action = "follow";
			$stmt4->bind_param("si", $action, $feedId);
			$stmt4->execute();

		}

	}

?>