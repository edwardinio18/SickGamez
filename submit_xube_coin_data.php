<?php

	include("get_user_info_game_api.php");
	include("valid.php");

	if (isset($_POST['fromAPI']) && $_POST['fromAPI'] === "1") {

		$coinAmount = $_POST['coinAmount'];
		$validationKey = $_POST['validationKey'];
		$currentUsernameCoinAmountDB = "";

		$selectValidationKeyQuery = "SELECT * FROM xubeCoinData WHERE validationKey = ?;";
		$stmt = $db->prepare($selectValidationKeyQuery);
		$stmt->bind_param("s", $validationKey);
		$stmt->execute();
		$selectValidationKeyQueryResult = $stmt->get_result();

		if ($selectValidationKeyQueryResult->num_rows >= 1) {

			header("location: /403");

		} else {

			$result = validateValidationKey($validationKey);

			if ($result) {

				$insertCoinQuery = "INSERT INTO xubeCoinData (xubeCoinDataUserId, xubeCoinDataCoinAmount, validationKey) VALUES (?, ?, ?);";
				$stmt = $db->prepare($insertCoinQuery);
				$stmt->bind_param("iis", $userInfoID, $coinAmount, $validationKey);
				$stmt->execute();

				$selectCurrentUserCoinAmountQuery = "SELECT * FROM users WHERE id = ?;";
				$stmt = $db->prepare($selectCurrentUserCoinAmountQuery);
				$stmt->bind_param("i", $userInfoID);
				$stmt->execute();
				$selectCurrentUserCoinAmountQueryResult = $stmt->get_result();

				if ($selectCurrentUserCoinAmountQueryResult->num_rows >= 1) {

					if ($row = $selectCurrentUserCoinAmountQueryResult->fetch_assoc()) {

						$currentUsernameCoinAmountDB = $row['coinAmount'];

					}

				}

				$updateUserCoinAmountQuery = "UPDATE users SET coinAmount = ? WHERE id = ?;";
				$stmt = $db->prepare($updateUserCoinAmountQuery);
				$totalNewCoinAmount = $coinAmount + $currentUsernameCoinAmountDB;
				$stmt->bind_param("ii", $totalNewCoinAmount, $userInfoID);
				$stmt->execute();

			} else {

				header("location: /403");

			}

		}

	} else {

		header("location: /403");

	}

?>