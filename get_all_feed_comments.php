<?php

	include("Account/server.php");

	if (isset($_GET['feedPostCommentId'])) {

		$feedID = $_GET['feedID'];

		$query = "SELECT * FROM feedComments WHERE feedCommentFeedId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			echo "1";

		} else {

			echo "2";

		}

	} else {

		$feedID = $_GET['feedID'];

		echo getAllFeedPostComments($feedID, $db);

	}

?>