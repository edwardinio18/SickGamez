<?php

	include("Account/server.php");

	if ($_FILES['upload_feed_post_image']['name'] !== "") {

		if ($_FILES['upload_feed_post_image']['size'] > 5242880) {

			echo "1";

		} else {

			$myID = "";

			$feedPostContent = $_POST['submit_feed_post_caption_textarea'];

			$feedPostImageContentFileName = $_FILES['upload_feed_post_image']['name'];
			$feedPostImageContentFileType = $_FILES['upload_feed_post_image']['type'];
			$feedPostImageContentFileSource = $_FILES['upload_feed_post_image']['tmp_name'];
			$feedPostImageContentFileSize = $_FILES['upload_feed_post_image']['size'];
			$feedPostImageContentFileTargetPath = "/Applications/XAMPP/xamppfiles/htdocs/SickGamez/Feed_images/";

			$feedPostImageContentFileNewName = time() . ".png";

			$feedPostImageContentFileFinalTargetPath = $feedPostImageContentFileTargetPath . $feedPostImageContentFileNewName;

			$feedPostContentTrimmed = trim($feedPostContent);
			$strippedTagsFeedPostContent = strip_tags($feedPostContentTrimmed);

			if ($strippedTagsFeedPostContent === "") {

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

				$query = "INSERT INTO feed (feedUserId, feedContent, feedImage) VALUES (?, ?, ?);";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $query)) {

					echo "Error!";
					exit();

				} else {

					$encryptedFeedContent = "";

					mysqli_stmt_bind_param($stmt, "iss", $myID, $encryptedFeedContent, $feedPostImageContentFileNewName);
					mysqli_stmt_execute($stmt);

					if (move_uploaded_file($feedPostImageContentFileSource, $feedPostImageContentFileFinalTargetPath)) {

						$resizeMaxSize = "1500";

						resizeImage($feedPostImageContentFileFinalTargetPath, $resizeMaxSize);

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

				$query = "INSERT INTO feed (feedUserId, feedContent, feedImage) VALUES (?, ?, ?);";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $query)) {

					echo "Error!";
					exit();

				} else {

					$encryptedFeedContent = encrypt($strippedTagsFeedPostContent, $key);

					mysqli_stmt_bind_param($stmt, "iss", $myID, $encryptedFeedContent, $feedPostImageContentFileNewName);
					mysqli_stmt_execute($stmt);

					if (move_uploaded_file($feedPostImageContentFileSource, $feedPostImageContentFileFinalTargetPath)) {

						$resizeMaxSize = "1500";

						resizeImage($feedPostImageContentFileFinalTargetPath, $resizeMaxSize);

					}

				}

			}

		}

	}

?>