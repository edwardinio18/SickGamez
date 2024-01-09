<?php

	include("Account/server.php");

	$feedPostCommentReplyContent = "";
	$feedID = "";
	$feedPostCommentId = "";
	$feedIdFromDB = "";
	$myID = "";
	$loggedInUserUsername = $_COOKIE['username'];
	$feedUserIdFromDB = "";

	if (isset($_GET['feedPostCommentId']) && isset($_GET['feedID']) && isset($_GET['feedPostCommentReplyContent'])) {

		$feedPostCommentReplyContent = $_GET['feedPostCommentReplyContent'];
		$feedID = $_GET['feedID'];
		$feedPostCommentId = $_GET['feedPostCommentId'];

		$trimmedFeedPostCommentReply = trim($feedPostCommentReplyContent);
		$strippedTagsFeedPostCommentReply = strip_tags($trimmedFeedPostCommentReply);

		if ($strippedTagsFeedPostCommentReply === "") {

			echo "1";

		} else {

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

			$selectFeedPostQuery = "SELECT * FROM feed WHERE feedId = ?;";
			$stmt = $db->prepare($selectFeedPostQuery);
			$stmt->bind_param("i", $feedID);
			$stmt->execute();
			$selectFeedPostQueryResult = $stmt->get_result();

			if ($selectFeedPostQueryResult->num_rows >= 1) {

				if ($row = $selectFeedPostQueryResult->fetch_assoc()) {

					$feedIdFromDB = $row['feedId'];
					$feedUserIdFromDB = $row['feedUserId'];

				}

			}

			$insertFeedPostCommentReplyQuery = "INSERT INTO feedCommentsReplies (feedCommentsRepliesFeedId, feedCommentsRepliesUserId, feedCommentsRepliesContent, feedCommentsRepliesCommentId, clickedStatus, status, soundPlayedActiveStatus, feedPostedByUserId) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
			$feedPostCommentReplyStmt = $db->prepare($insertFeedPostCommentReplyQuery);
			$encryptedFeedPostCommentReply = encrypt($strippedTagsFeedPostCommentReply, $key);
			$clickedStatus = 0;
			$status = 0;
			$soundPlayedActiveStatus = 0;
			$feedPostedByUserId = $feedUserIdFromDB;
			$feedPostCommentReplyStmt->bind_param("iisiiiii", $feedIdFromDB, $myID, $encryptedFeedPostCommentReply, $feedPostCommentId, $clickedStatus, $status, $soundPlayedActiveStatus, $feedPostedByUserId);
			$feedPostCommentReplyStmt->execute();

			$query = "INSERT INTO feedNotifications (feedNotificationsFromUser, feedNotificationsToUser, feedNotificationsAction, feedNotificationsLikeFeedPostId, feedNotificationsFeedPostCommentId, feedNotificationsFeedId, clickedStatus, status, soundPlayedActiveStatus, feedCommentCommentReplyContent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			$stmt = $db->prepare($query);
			$action = "reply";
			$clickedStatus = 0;
			$status = 0;
			$soundPlayedActiveStatus = 0;
			$encryptedFeedPostCommentReply = encrypt($strippedTagsFeedPostCommentReply, $key);
			$feedCommentCommentReplyContent = $encryptedFeedPostCommentReply;
			$recentlyInsertFeedCommentId = $feedPostCommentReplyStmt->insert_id;
			$stmt->bind_param("iissiiiiis", $myID, $feedUserIdFromDB, $action, $recentlyInsertFeedCommentId, $feedPostCommentId, $feedIdFromDB, $clickedStatus, $status, $soundPlayedActiveStatus, $feedCommentCommentReplyContent);
			$stmt->execute();

		}

	}

?>