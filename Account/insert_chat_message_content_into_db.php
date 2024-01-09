<?php

	include("server.php");

	if ($_FILES['send_chat_message_image']['name'] !== "") {

		if ($_FILES['send_chat_message_image']['size'] > 5242880) {

			echo "1";

		} else {

			$myID = "";

			$toUserId = $_POST['user_input_hidden_id_value_send_chat_message'];
			$toUserIdMessageContent = $_POST['message_content_textarea_' . $toUserId . ''];

			$messageImageContentFileName = $_FILES['send_chat_message_image']['name'];
			$messageImageContentFileType = $_FILES['send_chat_message_image']['type'];
			$messageImageContentFileSource = $_FILES['send_chat_message_image']['tmp_name'];
			$messageImageContentFileSize = $_FILES['send_chat_message_image']['size'];
			$messageImageContentFileTargetPath = "/home/yv4nbnligki0/public_html/Messages_images/";

			$messageImageContentFileNewName = time() . ".png";

			$messageImageContentFileFinalTargetPath = $messageImageContentFileTargetPath . $messageImageContentFileNewName;

			$chatMessageContentTrimmed = trim($toUserIdMessageContent);
			$strippedTagsMessage = strip_tags($chatMessageContentTrimmed);

			if ($strippedTagsMessage === "") {

				$query = "SELECT * FROM users;";
				$stmt = $db->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows >= 1) {

					while ($row = $result->fetch_assoc()) {

						if ($row['username'] === $_COOKIE['username']) {

							$myID = $row['id'];

						}

					}

				}

				$query = "INSERT INTO messages (fromUserIdMessage, toUserIdMessage, messageContent, messageImage, status, clickedStatus, soundPlayedActiveStatus, messageActiveScroll) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $query)) {

					echo "Error!";
					exit();

				} else {

					$status = 0;
					$clickedStatus = 0;
					$soundPlayedActiveStatus = 0;
					$messageActiveScroll = 0;

					$encryptedMessage = "";

					mysqli_stmt_bind_param($stmt, "ssssiiii", $myID, $toUserId, $encryptedMessage, $messageImageContentFileNewName, $status, $clickedStatus, $soundPlayedActiveStatus, $messageActiveScroll);
					mysqli_stmt_execute($stmt);

					if (move_uploaded_file($messageImageContentFileSource, $messageImageContentFileFinalTargetPath)) {

						$resizeMaxSize = "1000";

						resizeImage($messageImageContentFileFinalTargetPath, $resizeMaxSize);

					}

				}

			} else {

				$query = "SELECT * FROM users;";
				$stmt = $db->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows >= 1) {

					while ($row = $result->fetch_assoc()) {

						if ($row['username'] === $_COOKIE['username']) {

							$myID = $row['id'];

						}

					}

				}

				$query = "INSERT INTO messages (fromUserIdMessage, toUserIdMessage, messageContent, messageImage, status, clickedStatus, soundPlayedActiveStatus, messageActiveScroll) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $query)) {

					echo "Error!";
					exit();

				} else {

					$status = 0;
					$clickedStatus = 0;
					$soundPlayedActiveStatus = 0;
					$messageActiveScroll = 0;

					$encryptedMessage = encrypt($strippedTagsMessage, $key);

					mysqli_stmt_bind_param($stmt, "ssssiiii", $myID, $toUserId, $encryptedMessage, $messageImageContentFileNewName, $status, $clickedStatus, $soundPlayedActiveStatus, $messageActiveScroll);
					mysqli_stmt_execute($stmt);

					if (move_uploaded_file($messageImageContentFileSource, $messageImageContentFileFinalTargetPath)) {

						$resizeMaxSize = "1000";

						resizeImage($messageImageContentFileFinalTargetPath, $resizeMaxSize);

					}

				}

			}

		}

	} else {

		$myID = "";

		$toUserId = $_POST['user_input_hidden_id_value_send_chat_message'];
		$toUserIdMessageContent = $_POST['message_content_textarea_' . $toUserId . ''];

		$messageImageContentFileName = $_FILES['send_chat_message_image']['name'];
		$messageImageContentFileType = $_FILES['send_chat_message_image']['type'];
		$messageImageContentFileSource = $_FILES['send_chat_message_image']['tmp_name'];
		$messageImageContentFileSize = $_FILES['send_chat_message_image']['size'];
		$messageImageContentFileTargetPath = "/home/yv4nbnligki0/public_html/Messages_images/";

		$messageImageContentFileNewName = time() . ".png";

		$messageImageContentFileFinalTargetPath = $messageImageContentFileTargetPath . $messageImageContentFileNewName;

		$chatMessageContentTrimmed = trim($toUserIdMessageContent);
		$strippedTagsMessage = strip_tags($chatMessageContentTrimmed);

		if ($strippedTagsMessage === "") {

			$query = "SELECT * FROM users;";
			$stmt = $db->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows >= 1) {

				while ($row = $result->fetch_assoc()) {

					if ($row['username'] === $_COOKIE['username']) {

						$myID = $row['id'];

					}

				}

			}

			$query = "INSERT INTO messages (fromUserIdMessage, toUserIdMessage, messageContent, messageImage, status, clickedStatus, soundPlayedActiveStatus, messageActiveScroll) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
			$stmt = mysqli_stmt_init($db);

			if (!mysqli_stmt_prepare($stmt, $query)) {

				echo "Error!";
				exit();

			} else {

				$status = 0;
				$clickedStatus = 0;
				$soundPlayedActiveStatus = 0;
				$messageActiveScroll = 0;

				$encryptedMessage = "";
				$messageImageContentFileNewName = "";

				mysqli_stmt_bind_param($stmt, "ssssiiii", $myID, $toUserId, $encryptedMessage, $messageImageContentFileNewName, $status, $clickedStatus, $soundPlayedActiveStatus, $messageActiveScroll);
				mysqli_stmt_execute($stmt);

			}

		} else {

			$query = "SELECT * FROM users;";
			$stmt = $db->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows >= 1) {

				while ($row = $result->fetch_assoc()) {

					if ($row['username'] === $_COOKIE['username']) {

						$myID = $row['id'];

					}

				}

			}

			$query = "INSERT INTO messages (fromUserIdMessage, toUserIdMessage, messageContent, messageImage, status, clickedStatus, soundPlayedActiveStatus, messageActiveScroll) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
			$stmt = mysqli_stmt_init($db);

			if (!mysqli_stmt_prepare($stmt, $query)) {

				echo "Error!";
				exit();

			} else {

				$status = 0;
				$clickedStatus = 0;
				$soundPlayedActiveStatus = 0;
				$messageActiveScroll = 0;

				$encryptedMessage = encrypt($strippedTagsMessage, $key);
				$messageImageContentFileNewName = "";

				mysqli_stmt_bind_param($stmt, "ssssiiii", $myID, $toUserId, $encryptedMessage, $messageImageContentFileNewName, $status, $clickedStatus, $soundPlayedActiveStatus, $messageActiveScroll);
				mysqli_stmt_execute($stmt);

			}

		}

	}

?>