<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";

	if (isset($_GET['friendRequestId'])) {

		$friendRequestId = $_GET['friendRequestId'];

	}

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	$selectMessageQuery = "UPDATE friendRequests SET clickedStatus = ? WHERE friendRequestId = ?;";
	$stmt = $db->prepare($selectMessageQuery);
	$clickedStatus = 1;
	$stmt->bind_param("ii", $clickedStatus, $friendRequestId);
	$stmt->execute();

?>