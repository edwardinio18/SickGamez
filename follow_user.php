<?php

	include("Account/server.php");

	$myID = fetchMyID($_COOKIE['username'], $db);

	$followingUserId = $_GET['followingUserId'];
	$feedId = $_GET['feedId'];

	$query = "INSERT INTO followers (followerUserId, followingUserId, clickedStatus, status, soundPlayedActiveStatus, feedPostedByUserId) VALUES (?, ?, ?, ?, ?, ?);";
	$stmt = $db->prepare($query);
	$clickedStatus = 0;
	$status = 0;
	$soundPlayedActiveStatus = 0;
	$feedPostedByUserId = $followingUserId;
	$stmt->bind_param("iiiiii", $myID, $followingUserId, $clickedStatus, $status, $soundPlayedActiveStatus, $feedPostedByUserId);
	$stmt->execute();

	$query1 = "INSERT INTO feedNotifications (feedNotificationsFromUser, feedNotificationsToUser, feedNotificationsAction, feedNotificationsLikeFeedPostId, feedNotificationsFeedPostCommentId, feedNotificationsFeedId, clickedStatus, status, soundPlayedActiveStatus, feedCommentCommentReplyContent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	$stmt1 = $db->prepare($query1);
	$action = "follow";
	$clickedStatus = 0;
	$status = 0;
	$soundPlayedActiveStatus = 0;
	$feedCommentCommentReplyContent = "";
	$recentlyInsertFeedCommentId = $stmt->insert_id;
	$stmt1->bind_param("iisiiiiiis", $myID, $followingUserId, $action, $recentlyInsertFeedCommentId, $recentlyInsertFeedCommentId, $feedId, $clickedStatus, $status, $soundPlayedActiveStatus, $feedCommentCommentReplyContent);
	$stmt1->execute();

?>