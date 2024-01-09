<?php

	include("Account/server.php");

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $_COOKIE['username']);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			if ($row['customActivityStatusTypeActive'] == 1) {

				if (isset($_GET['onlineType'])) {

					$query = "UPDATE users SET onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatusType = 1;
					$stmt->bind_param("is", $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['awayType'])) {

					$query = "UPDATE users SET onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatusType = 2;
					$stmt->bind_param("is", $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['doNotDisturbType'])) {

					$query = "UPDATE users SET onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatusType = 3;
					$stmt->bind_param("is", $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['invisibleType'])) {

					$query = "UPDATE users SET onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatusType = 4;
					$stmt->bind_param("is", $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

			} else {

				if (isset($_GET['onlineType'])) {

					$query = "UPDATE users SET onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatusType = 1;
					$stmt->bind_param("is", $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['awayType'])) {

					$query = "UPDATE users SET onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatus = "Away";
					$onlineActivityStatusType = 2;
					$stmt->bind_param("sis", $onlineActivityStatus, $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['doNotDisturbType'])) {

					$query = "UPDATE users SET onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatus = "Do not disturb";
					$onlineActivityStatusType = 3;
					$stmt->bind_param("sis", $onlineActivityStatus, $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

				if (isset($_GET['invisibleType'])) {

					$query = "UPDATE users SET onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatus = "";
					$onlineActivityStatusType = 4;
					$stmt->bind_param("sis", $onlineActivityStatus, $onlineActivityStatusType, $_COOKIE['username']);
					$stmt->execute();

				}

			}

			if (isset($_GET['customType']) && isset($_GET['customActivityStatusContent'])) {

				if (isset($_GET['noCustomStatus'])) {

					$query = "UPDATE users SET onlineActivityStatus = ?, customActivityStatusTypeActive = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatus = $_GET['customActivityStatusContent'];
					$customActivityStatusTypeActive = 0;
					$stmt->bind_param("sis", $onlineActivityStatus, $customActivityStatusTypeActive, $_COOKIE['username']);
					$stmt->execute();

				} else {

					$query = "UPDATE users SET onlineActivityStatus = ?, customActivityStatusTypeActive = ? WHERE username = ?;";
					$stmt = $db->prepare($query);
					$onlineActivityStatus = $_GET['customActivityStatusContent'];
					$customActivityStatusTypeActive = 1;
					$stmt->bind_param("sis", $onlineActivityStatus, $customActivityStatusTypeActive, $_COOKIE['username']);
					$stmt->execute();

				}

			}

		}

	}

?>