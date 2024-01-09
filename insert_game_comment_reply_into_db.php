<?php

	include("Account/server.php");

	$gameCommentGameID = $_GET['gameId'];
	$gameIdFromDB = "";
	$loggedInUserUsername = $_COOKIE['username'];
	$gameCommentContent = "";
	$myID = "";
	$gameCommentID = "";

	if (isset($_GET['gameCommentContent']) && isset($_GET['gameCommentID'])) {

		$gameCommentID = $_GET['gameCommentID'];

		$gameCommentContent = $_GET['gameCommentContent'];

		$trimmedGameComment = trim($gameCommentContent);
		$strippedTagsGameComment = strip_tags($trimmedGameComment);

		if ($strippedTagsGameComment === "") {

			echo "1";

		} else {

			$userQuery = "SELECT * FROM users WHERE username = ?;";
			$userStmt = $db->prepare($userQuery);
			$userStmt->bind_param("s", $loggedInUserUsername);
			$userStmt->execute();
			$userQueryResult = $userStmt->get_result();

			if ($userQueryResult->num_rows >= 1) {

				if ($row = $userQueryResult->fetch_assoc()) {

					$myID = $row['id'];

				}

			}

			$selectGameQuery = "SELECT * FROM gamez WHERE gameId = ?;";
			$stmt = $db->prepare($selectGameQuery);
			$stmt->bind_param("i", $gameCommentGameID);
			$stmt->execute();
			$selectGameQueryResult = $stmt->get_result();

			if ($selectGameQueryResult->num_rows >= 1) {

				if ($row = $selectGameQueryResult->fetch_assoc()) {

					$gameIdFromDB = $row['id'];

				}

			}

			$insertGameCommentQuery = "INSERT INTO gameCommentsReplies (gameCommentsRepliesGameId, gameCommentsRepliesUserId, gameCommentsRepliesContent, gameCommentsRepliesCommentId) VALUES (?, ?, ?, ?);";
			$gameCommentStmt = $db->prepare($insertGameCommentQuery);
			$encryptedGameComment = encrypt($strippedTagsGameComment, $key);
			$gameCommentStmt->bind_param("iisi", $gameIdFromDB, $myID, $encryptedGameComment, $gameCommentID);
			$gameCommentStmt->execute();

		}

	}

?>