<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";

	if (isset($_GET['messageId'])) {

		$messageId = $_GET['messageId'];

	}

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	$selectMessageQuery = "UPDATE messages SET clickedStatus = ?, soundPlayedActiveStatus = ? WHERE chatMessageId = ?;";
	$stmt = $db->prepare($selectMessageQuery);
	$clickedStatus = 1;
	$soundPlayedActiveStatus = 1;
	$stmt->bind_param("iii", $clickedStatus, $soundPlayedActiveStatus, $messageId);
	$stmt->execute();

?> 