<?php

	include("server.php");

	$query = "SELECT * FROM feedComments WHERE feedCommentUserId != ? AND feedPostedByUserId = ?;";
	$stmt = $db->prepare($query);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt->bind_param("ii", $myID, $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$query1 = "UPDATE feedComments SET clickedStatus = ?, status = ?, soundPlayedActiveStatus = ? WHERE feedCommentUserId != ? AND feedPostedByUserId = ?;";
			$stmt1 = $db->prepare($query1);
			$clickedStatus = 1;
			$status = 1;
			$soundPlayedActiveStatus = 1;
			$stmt1->bind_param("iiiii", $clickedStatus, $status, $soundPlayedActiveStatus, $myID, $myID);
			$stmt1->execute();

		}

	}

	$query2 = "SELECT * FROM feedCommentsReplies WHERE feedCommentsRepliesUserId != ? AND feedPostedByUserId = ?;";
	$stmt2 = $db->prepare($query2);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt2->bind_param("ii", $myID, $myID);
	$stmt2->execute();
	$result2 = $stmt2->get_result();

	if ($result2->num_rows >= 1) {

		while ($row2 = $result2->fetch_assoc()) {

			$query3 = "UPDATE feedCommentsReplies SET clickedStatus = ?, status = ?, soundPlayedActiveStatus = ? WHERE feedCommentsRepliesUserId != ? AND feedPostedByUserId = ?;";
			$stmt3 = $db->prepare($query3);
			$clickedStatus = 1;
			$status = 1;
			$soundPlayedActiveStatus = 1;
			$stmt3->bind_param("iiiii", $clickedStatus, $status, $soundPlayedActiveStatus, $myID, $myID);
			$stmt3->execute();

		}

	}

	$query3 = "SELECT * FROM feedLikesDislikes WHERE userIdLikesDislikesFeed != ? AND feedPostedByUserId = ?;";
	$stmt3 = $db->prepare($query3);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt3->bind_param("ii", $myID, $myID);
	$stmt3->execute();
	$result3 = $stmt3->get_result();

	if ($result3->num_rows >= 1) {

		while ($row3 = $result3->fetch_assoc()) {

			$query4 = "UPDATE feedLikesDislikes SET clickedStatus = ?, status = ?, soundPlayedActiveStatus = ? WHERE userIdLikesDislikesFeed != ? AND feedPostedByUserId = ?;";
			$stmt4 = $db->prepare($query4);
			$clickedStatus = 1;
			$status = 1;
			$soundPlayedActiveStatus = 1;
			$stmt4->bind_param("iiiii", $clickedStatus, $status, $soundPlayedActiveStatus, $myID, $myID);
			$stmt4->execute();

		}

	}

	$query5 = "SELECT * FROM followers WHERE followerUserId != ? AND followingUserId = ?;";
	$stmt5 = $db->prepare($query5);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt5->bind_param("ii", $myID, $myID);
	$stmt5->execute();
	$result5 = $stmt5->get_result();

	if ($result5->num_rows >= 1) {

		while ($row5 = $result5->fetch_assoc()) {

			$query6 = "UPDATE followers SET clickedStatus = ?, status = ?, soundPlayedActiveStatus = ? WHERE followerUserId != ? AND followingUserId = ?;";
			$stmt6 = $db->prepare($query6);
			$clickedStatus = 1;
			$status = 1;
			$soundPlayedActiveStatus = 1;
			$stmt6->bind_param("iiiii", $clickedStatus, $status, $soundPlayedActiveStatus, $myID, $myID);
			$stmt6->execute();

		}

	}

	$query7 = "SELECT * FROM feedNotifications WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ?;";
	$stmt7 = $db->prepare($query7);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt7->bind_param("ii", $myID, $myID);
	$stmt7->execute();
	$result7 = $stmt7->get_result();

	if ($result7->num_rows >= 1) {

		while ($row7 = $result7->fetch_assoc()) {

			$query8 = "UPDATE feedNotifications SET clickedStatus = ?, status = ?, soundPlayedActiveStatus = ? WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ?;";
			$stmt8 = $db->prepare($query8);
			$clickedStatus = 1;
			$status = 1;
			$soundPlayedActiveStatus = 1;
			$stmt8->bind_param("iiiii", $clickedStatus, $status, $soundPlayedActiveStatus, $myID, $myID);
			$stmt8->execute();

		}

	}

?>