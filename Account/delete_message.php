<?php

	include("server.php");

	if (isset($_GET['chatMessageId'])) {

		$query = "SELECT * FROM messages WHERE chatMessageId = ?;";
		$stmt = $db->prepare($query);
		$chatMessageId = $_GET['chatMessageId'];
		$stmt->bind_param("i", $chatMessageId);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				if ($row['messageImage'] !== "") {

					$messageImage = $row['messageImage'];
					$messageImagePath = "/home/yv4nbnligki0/public_html/Messages_images/" . $messageImage;

					unlink($messageImagePath);

					$query = "DELETE FROM messages WHERE chatMessageId = ?;";
					$stmt = $db->prepare($query);
					$chatMessageId = $_GET['chatMessageId'];
					$stmt->bind_param("i", $chatMessageId);
					$stmt->execute();

				} else {

					$query = "DELETE FROM messages WHERE chatMessageId = ?;";
					$stmt = $db->prepare($query);
					$chatMessageId = $_GET['chatMessageId'];
					$stmt->bind_param("i", $chatMessageId);
					$stmt->execute();

				}

			}

		}

	}

?>