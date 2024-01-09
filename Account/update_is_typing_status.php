<?php

	include("server.php");

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

	$updateIsTypingQuery = "UPDATE users SET isTyping = ? WHERE id = ?;";
	$stmt = $db->prepare($updateIsTypingQuery);
	$isTyping = $_GET['isTyping'];
	$stmt->bind_param("si", $isTyping, $myID);
	$stmt->execute();

?>