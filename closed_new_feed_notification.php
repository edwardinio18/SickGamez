<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$feedNotificationsId = "";
	$feedTypeId = "";
	$feedTypeAction = "";

	if (isset($_GET['feedNotificationsId'])) {

		$feedNotificationsId = $_GET['feedNotificationsId'];

	}

	if (isset($_GET['feedTypeId'])) {

		$feedTypeId = $_GET['feedTypeId'];

	}

	if (isset($_GET['feedTypeAction'])) {

		$feedTypeAction = $_GET['feedTypeAction'];

	}

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	if ($feedTypeAction === "comment") {

		$query = "UPDATE feedComments SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedCommentUserId != ? AND feedPostedByUserId = ? AND feedCommentId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedTypeId);
		$stmt->execute();

		$query = "UPDATE feedNotifications SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? AND feedNotificationsId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedNotificationsId);
		$stmt->execute();

	} else if ($feedTypeAction === "reply") {

		$query = "UPDATE feedCommentsReplies SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedCommentsRepliesUserId != ? AND feedPostedByUserId = ? AND feedCommentsRepliesId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedTypeId);
		$stmt->execute();

		$query = "UPDATE feedNotifications SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? AND feedNotificationsId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedNotificationsId);
		$stmt->execute();

	} else if ($feedTypeAction === "like") {

		$query = "UPDATE feedLikesDislikes SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE userIdLikesDislikesFeed != ? AND feedPostedByUserId = ? AND feedIdLikesDislikesFeed = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedTypeId);
		$stmt->execute();

		$query = "UPDATE feedNotifications SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? AND feedNotificationsId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedNotificationsId);
		$stmt->execute();

	} else if ($feedTypeAction === "follow") {

		$query = "UPDATE followers SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE followerUserId != ? AND followingUserId = ? AND followersId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedTypeId);
		$stmt->execute();

		$query = "UPDATE feedNotifications SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? AND feedNotificationsId = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$stmt->bind_param("iiiii", $clickedStatus, $soundPlayedActiveStatus, $myID, $myID, $feedNotificationsId);
		$stmt->execute();

	}

?>