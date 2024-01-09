<?php

	include("Account/server.php");

	$prize = $_GET['prize'];
	$totalAfterPrizeAdded = "";
	$username = $_COOKIE['username'];
	$myID = fetchMyID($username, $db);

	$selectUserCoinAmountQuery = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($selectUserCoinAmountQuery);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$selectUserCoinAmountQueryResult = $stmt->get_result();
	$userCoinAmount = "";

	if ($selectUserCoinAmountQueryResult->num_rows >= 1) {

		if ($row = $selectUserCoinAmountQueryResult->fetch_assoc()) {

			$userCoinAmount = $row['coinAmount'];

		}

	}

	$updateUserCoinAmountQuery = "UPDATE users SET coinAmount = ? WHERE username = ?;";
	$stmt = $db->prepare($updateUserCoinAmountQuery);
	$totalAfterPrizeAdded = $userCoinAmount + $prize;
	$stmt->bind_param("is", $totalAfterPrizeAdded, $username);
	$stmt->execute();

?>