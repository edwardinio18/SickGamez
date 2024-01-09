<?php

	include("Account/server.php");

	$messageReplyContent = $_GET['messageContentRepliedContent'];
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

		$query = "INSERT INTO messages (fromUserIdMessage, toUserIdMessage, messageContent, messageImage, status, clickedStatus, soundPlayedActiveStatus, messageActiveScroll) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
		$stmt = $db->prepare($query);
		$trimmedMessageReplyContent = trim($messageReplyContent);
		$strippedTagsMessageReplyContent = strip_tags($trimmedMessageReplyContent);
		$encryptedMessageReplyContent = encrypt($strippedTagsMessageReplyContent, $key);
		$status = 0;
		$clickedStatus = 1;
		$soundPlayedActiveStatus = 1;
		$messageActiveScroll = 0;
		$messageImage = "";
		$stmt->bind_param("iissiiii", $myID, $toUserId, $encryptedMessageReplyContent, $messageImage, $status, $clickedStatus, $soundPlayedActiveStatus, $messageActiveScroll);
		$stmt->execute();

		$query = "UPDATE messages SET clickedStatus = ? WHERE fromUserIdMessage = ? AND toUserIdMessage = ?;";
		$stmt = $db->prepare($query);
		$clickedStatus = 1;
		$stmt->bind_param("iii", $clickedStatus, $toUserId, $myID);
		$stmt->execute();

	}

?>