<?php

	include("Account/server.php");

	$gameCommentCounter = 0;
	$gameCommentGameIdFromDB = "";

	$selectGameQuery = "SELECT * FROM gamez WHERE gameId = ?;";
	$stmt = $db->prepare($selectGameQuery);
	$gameCommentGameId = $_GET['gameId'];
	$stmt->bind_param("i", $gameCommentGameId);
	$stmt->execute();
	$selectGameQueryResult = $stmt->get_result();

	if ($selectGameQueryResult->num_rows >= 1) {

		if ($row = $selectGameQueryResult->fetch_assoc()) {

			$gameCommentGameIdFromDB = $row['id'];

		}

	}

	$selectGameCommentsCounterQuery = "SELECT * FROM gameComments WHERE gameCommentGameId = ?;";
	$gameCommentStmt = $db->prepare($selectGameCommentsCounterQuery);
	$gameCommentStmt->bind_param("i", $gameCommentGameIdFromDB);
	$gameCommentStmt->execute();
	$selectGameCommentsCounterQueryResult = $gameCommentStmt->get_result();

	if ($selectGameCommentsCounterQueryResult->num_rows >= 1) {

		$gameCommentCounter = mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comments";

		if ($gameCommentCounter == 1) {

			$gameCommentCounter = mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comment";

		}

		$query = "SELECT * FROM gameCommentsReplies WHERE gameCommentsRepliesGameId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $gameCommentGameIdFromDB);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$gameCommentCounter = mysqli_num_rows($result) + mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comments";

		} else {

			$gameCommentCounter = mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comments";

			if ($gameCommentCounter == 1) {

				$gameCommentCounter = mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comment";

			}

		}

	} else {

		$gameCommentCounter = mysqli_num_rows($selectGameCommentsCounterQueryResult) . " comments";

	}

	echo $gameCommentCounter;

?>