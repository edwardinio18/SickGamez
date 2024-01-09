<?php

	include("server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$pendingFriendRequestsCounter = 0;

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$selectFriendRequestForMeQuery = "SELECT * FROM friendRequests WHERE toUserId = ?;";
		$stmt = $db->prepare($selectFriendRequestForMeQuery);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$selectFriendRequestForMeQueryResult = $stmt->get_result();

		if ($selectFriendRequestForMeQueryResult->num_rows >= 1) {

			if ($row = $selectFriendRequestForMeQueryResult->fetch_assoc()) {

				$pendingFriendRequestsCounter = mysqli_num_rows($selectFriendRequestForMeQueryResult);

				echo $pendingFriendRequestsCounter;

			}

		} else {

			echo $pendingFriendRequestsCounter;

		}

	}

?>