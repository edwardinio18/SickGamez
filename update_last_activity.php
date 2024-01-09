<?php

	include("Account/server.php");

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $_COOKIE['username']);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				if ($row['customActivityStatusTypeActive'] == 1) {

					if ($row['onlineActivityStatusType'] == 1) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatusType = 1;
						$stmt->bind_param("sis", $lastActivity, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 2) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatusType = 2;
						$stmt->bind_param("sis", $lastActivity, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 3) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatusType = 3;
						$stmt->bind_param("sis", $lastActivity, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 4) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatusType = 4;
						$stmt->bind_param("sis", $lastActivity, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

				} else {

					if ($row['onlineActivityStatusType'] == 1) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatusType = 1;
						$stmt->bind_param("sis", $lastActivity, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 2) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatus = "Away";
						$onlineActivityStatusType = 2;
						$stmt->bind_param("ssis", $lastActivity, $onlineActivityStatus, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 3) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatus = "Do not disturb";
						$onlineActivityStatusType = 3;
						$stmt->bind_param("ssis", $lastActivity, $onlineActivityStatus, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

					if ($row['onlineActivityStatusType'] == 4) {

						$query = "UPDATE users SET lastActivity = ?, onlineActivityStatus = ?, onlineActivityStatusType = ? WHERE username = ?;";
						$stmt = $db->prepare($query);
						$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
						$username = $_COOKIE['username'];
						$onlineActivityStatus = "";
						$onlineActivityStatusType = 4;
						$stmt->bind_param("ssis", $lastActivity, $onlineActivityStatus, $onlineActivityStatusType, $username);
						$stmt->execute();

					}

				}

			}

		}

	}

?>