<?php

	include("server.php");

	$toUserId = $_GET['toUserId'];

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	echo fetchUserChatHistory($myID, $toUserId, $db);

?>