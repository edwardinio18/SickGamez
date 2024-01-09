<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	if (isset($_GET['action'])) {

		$feedID = $_GET['feedID'];
		$action = $_GET['action'];
		$feedUserID = $_GET['feedUserID'];

		switch ($action) {

			case 'like':

					$query = "INSERT INTO feedLikesDislikes (feedIdLikesDislikesFeed, userIdLikesDislikesFeed, ratingActionFeed, clickedStatus, status, soundPlayedActiveStatus, feedPostedByUserId) VALUES (?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE ratingActionFeed = ?;";
					$stmt = $db->prepare($query);
					$likeAction = "like";
					$clickedStatus = 0;
					$status = 0;
					$soundPlayedActiveStatus = 0;
					$feedPostedByUserId = $feedUserID;
					$stmt->bind_param("iisiiiis", $feedID, $myID, $action, $clickedStatus, $status, $soundPlayedActiveStatus, $feedPostedByUserId, $likeAction);

					$query1 = "INSERT INTO feedNotifications (feedNotificationsFromUser, feedNotificationsToUser, feedNotificationsAction, feedNotificationsLikeFeedPostId, feedNotificationsFeedPostCommentId, feedNotificationsFeedId, clickedStatus, status, soundPlayedActiveStatus, feedCommentCommentReplyContent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
					$stmt1 = $db->prepare($query1);
					$action = "like";
					$clickedStatus = 0;
					$status = 0;
					$soundPlayedActiveStatus = 0;
					$feedCommentCommentReplyContent = "";
					$stmt1->bind_param("iisiiiiiis", $myID, $feedUserID, $action, $feedID, $feedID, $feedID, $clickedStatus, $status, $soundPlayedActiveStatus, $feedCommentCommentReplyContent);
					$stmt1->execute();

				break;

			case 'unlike':

					$query = "DELETE FROM feedLikesDislikes WHERE userIdLikesDislikesFeed = ? AND feedIdLikesDislikesFeed = ?;";
					$stmt = $db->prepare($query);
					$stmt->bind_param("ii", $myID, $feedID);

					$query1 = "DELETE FROM feedNotifications WHERE feedNotificationsFromUser = ? AND feedNotificationsLikeFeedPostId = ?;";
					$stmt1 = $db->prepare($query1);
					$stmt1->bind_param("ii", $myID, $feedID);
					$stmt1->execute();

				break;

			default:

				break;

		}

		$stmt->execute();

		echo getRatingFeed($feedID, $db);

		exit(0);

	}

?>