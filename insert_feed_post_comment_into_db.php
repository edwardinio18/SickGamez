<?php

	include("Account/server.php");

	$feedCommentFeedID = $_GET['feedID'];
	$feedIdFromDB = "";
	$loggedInUserUsername = $_COOKIE['username'];
	$feedCommentContent = "";
	$myID = "";
	$feedUserIdFromDB = "";

	if (isset($_GET['feedPostCommentContent'])) {

		$feedCommentContent = $_GET['feedPostCommentContent'];

		$trimmedFeedCommentContent = trim($feedCommentContent);
		$strippedTagsFeedComment = strip_tags($trimmedFeedCommentContent);

		$userQuery = "SELECT * FROM users WHERE username = ?;";
		$userStmt = $db->prepare($userQuery);
		$userStmt->bind_param("s", $loggedInUserUsername);
		$userStmt->execute();
		$userQueryResult = $userStmt->get_result();

		if ($userQueryResult->num_rows >= 1) {

			if ($row = $userQueryResult->fetch_assoc()) {

				$myID = $row['id'];

			}

		}

		$selectFeedQuery = "SELECT * FROM feed WHERE feedId = ?;";
		$stmt = $db->prepare($selectFeedQuery);
		$stmt->bind_param("i", $feedCommentFeedID);
		$stmt->execute();
		$selectFeedQueryResult = $stmt->get_result();

		if ($selectFeedQueryResult->num_rows >= 1) {

			if ($row = $selectFeedQueryResult->fetch_assoc()) {

				$feedIdFromDB = $row['feedId'];
				$feedUserIdFromDB = $row['feedUserId'];

			}

		}

		$insertFeedCommentQuery = "INSERT INTO feedComments (feedCommentFeedId, feedCommentUserId, feedCommentContent, clickedStatus, status, soundPlayedActiveStatus, feedPostedByUserId) VALUES (?, ?, ?, ?, ?, ?, ?);";
		$feedCommentStmt = $db->prepare($insertFeedCommentQuery);
		$encryptedFeedComment = encrypt($strippedTagsFeedComment, $key);
		$clickedStatus = 0;
		$status = 0;
		$soundPlayedActiveStatus = 0;
		$feedPostedByUserId = $feedUserIdFromDB;
		$feedCommentStmt->bind_param("iisiiii", $feedIdFromDB, $myID, $encryptedFeedComment, $clickedStatus, $status, $soundPlayedActiveStatus, $feedPostedByUserId);
		$feedCommentStmt->execute();

		$query = "INSERT INTO feedNotifications (feedNotificationsFromUser, feedNotificationsToUser, feedNotificationsAction, feedNotificationsLikeFeedPostId, feedNotificationsFeedPostCommentId, feedNotificationsFeedId, clickedStatus, status, soundPlayedActiveStatus, feedCommentCommentReplyContent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		$stmt = $db->prepare($query);
		$action = "comment";
		$clickedStatus = 0;
		$status = 0;
		$soundPlayedActiveStatus = 0;
		$encryptedFeedComment = encrypt($strippedTagsFeedComment, $key);
		$feedCommentCommentReplyContent = $encryptedFeedComment;
		$recentlyInsertFeedCommentId = $feedCommentStmt->insert_id;
		$stmt->bind_param("iisiiiiiis", $myID, $feedUserIdFromDB, $action, $recentlyInsertFeedCommentId, $feedCommentFeedID, $feedIdFromDB, $clickedStatus, $status, $soundPlayedActiveStatus, $feedCommentCommentReplyContent);
		$stmt->execute();

	}

?>