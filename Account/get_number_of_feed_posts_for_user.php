<?php

	$feedPostsCounter = 0;

	include("server.php");

	if (isset($_GET['userID'])) {

		$userID = $_GET['userID'];

		$query = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

			if ($feedPostsCounter == 1) {

				$feedPostsCounter = mysqli_num_rows($result) . " feed post";

			}

		} else {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

		}

	} else {

		$myID = fetchMyID($_COOKIE['username'], $db);

		$query = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

			if ($feedPostsCounter == 1) {

				$feedPostsCounter = mysqli_num_rows($result) . " feed post";

			}

		} else {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

		}

	}

	echo $feedPostsCounter;

?>