<?php

	include("Account/server.php");

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

	if (isset($_GET['action'])) {

		$gameID = $_GET['gameID'];
		$action = $_GET['action'];

		switch ($action) {

			case 'like':

					$query = "INSERT INTO gameLikesDislikes (gameIdLikesDislikesGames, userIdLikesDislikesGames, ratingActionGames) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE ratingActionGames = ?;";
					$stmt = $db->prepare($query);
					$likeAction = "like";
					$stmt->bind_param("iiss", $gameID, $myID, $action, $likeAction);

				break;

			case 'dislike':

					$query = "INSERT INTO gameLikesDislikes (gameIdLikesDislikesGames, userIdLikesDislikesGames, ratingActionGames) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE ratingActionGames = ?;";
					$stmt = $db->prepare($query);
					$dislikeAction = "dislike";
					$stmt->bind_param("iiss", $gameID, $myID, $action, $dislikeAction);

				break;

			case 'unlike':

					$query = "DELETE FROM gameLikesDislikes WHERE userIdLikesDislikesGames = ? AND gameIdLikesDislikesGames = ?;";
					$stmt = $db->prepare($query);
					$stmt->bind_param("ii", $myID, $gameID);

				break;

			case 'undislike':

					$query = "DELETE FROM gameLikesDislikes WHERE userIdLikesDislikesGames = ? AND gameIdLikesDislikesGames = ?;";
					$stmt = $db->prepare($query);
					$stmt->bind_param("ii", $myID, $gameID);

				break;

			default:

				break;

		}

		$stmt->execute();

		echo getRating($gameID, $db);

		exit(0);

	}

?>