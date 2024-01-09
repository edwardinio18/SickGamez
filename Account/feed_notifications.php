<?php

	include("server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$feedNotificationsCounter = 0;

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	$query = "SELECT * FROM feedComments WHERE feedCommentUserId != ? AND status = ? AND feedPostedByUserId = ?;";
	$stmt = $db->prepare($query);
	$status = 0;
	$stmt->bind_param("iii", $myID, $status, $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	$query1 = "SELECT * FROM feedCommentsReplies WHERE feedCommentsRepliesUserId != ? AND status = ? AND feedPostedByUserId = ?;";
	$stmt1 = $db->prepare($query1);
	$status = 0;
	$stmt1->bind_param("iii", $myID, $status, $myID);
	$stmt1->execute();
	$result1 = $stmt1->get_result();

	$query2 = "SELECT * FROM feedLikesDislikes WHERE userIdLikesDislikesFeed != ? AND status = ? AND feedPostedByUserId = ?;";
	$stmt2 = $db->prepare($query2);
	$status = 0;
	$stmt2->bind_param("iii", $myID, $status, $myID);
	$stmt2->execute();
	$result2 = $stmt2->get_result();

	$query3 = "SELECT * FROM followers WHERE followingUserId = ? AND status = ? AND feedPostedByUserId = ?;";
	$stmt3 = $db->prepare($query3);
	$status = 0;
	$stmt3->bind_param("iii", $myID, $status, $myID);
	$stmt3->execute();
	$result3 = $stmt3->get_result();

	if ($result->num_rows >= 1) {

		$feedNotificationsCounter += mysqli_num_rows($result);

	}

	if ($result1->num_rows >= 1) {

		$feedNotificationsCounter += mysqli_num_rows($result1);

	}

	if ($result2->num_rows >= 1) {

		$feedNotificationsCounter += mysqli_num_rows($result2);

	}

	if ($result3->num_rows >= 1) {

		$feedNotificationsCounter += mysqli_num_rows($result3);

	}

	echo $feedNotificationsCounter;

?>