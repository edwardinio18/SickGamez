<?php

	include("server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$unSeenMessagesNotifications = 0;

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$selectMessagesNotSeenYetQuery = "SELECT DISTINCT fromUserIdMessage FROM messages WHERE toUserIdMessage = ? AND status = ?;";
		$stmt = $db->prepare($selectMessagesNotSeenYetQuery);
		$status = 0;
		$stmt->bind_param("ii", $myID, $status);
		$stmt->execute();
		$selectMessagesNotSeenYetQueryResult = $stmt->get_result();

		if ($selectMessagesNotSeenYetQueryResult->num_rows >= 1) {

			if ($row = $selectMessagesNotSeenYetQueryResult->fetch_assoc()) {

				$unSeenMessagesNotifications = mysqli_num_rows($selectMessagesNotSeenYetQueryResult);

				echo $unSeenMessagesNotifications;

			}

		} else {

			echo $unSeenMessagesNotifications;

		}

	}

?>