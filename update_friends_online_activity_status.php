<?php

	include("Account/server.php");

	$myID = fetchMyID($_COOKIE['username'], $db);

	$userAFK = "";
	$userAFKFalse = "";

	$currentPageSourceURLStringPartsPositionAccount = "";
	$currentPageSourceURL = "";

	if (isset($_GET['currentPageSourceURL'])) {

		$currentPageSourceURL = $_GET['currentPageSourceURL'];

		$currentPageSourceURLString = trim($currentPageSourceURL, "/");
		$currentPageSourceURLStringParts = explode("/", $currentPageSourceURLString);

		$currentPageSourceURLStringPartsPosition = $currentPageSourceURLStringParts[0];

		$currentPageSourceURLStringPartsPositionArray = explode("?", $currentPageSourceURLStringPartsPosition, 2);
		$currentPageSourceURLStringPartsPositionArrayFirst = $currentPageSourceURLStringPartsPositionArray[0];

		$query = "SELECT * FROM users WHERE id = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				if ($row['customActivityStatusTypeActive'] != 1) {

					if ($row['onlineActivityStatusType'] == 1) {

						if ($currentPageSourceURLStringPartsPositionArrayFirst === "game") {

							if (isset($_GET['userAFK'])) {

								$userAFK = $_GET['userAFK'];

								$userAFKStatus = "AFK";

								$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
								$stmt = $db->prepare($updateOnlineActivityStatus);
								$stmt->bind_param("si", $userAFKStatus, $myID);
								$stmt->execute();

								if (isset($_GET['afkFalse'])) {

									$gameId = $_GET['gameId'];
									$gameName = "";

									$selectGameNameQuery = "SELECT * FROM gamez WHERE gameId = ?;";
									$stmt = $db->prepare($selectGameNameQuery);
									$stmt->bind_param("i", $gameId);
									$stmt->execute();
									$selectGameNameQueryResult = $stmt->get_result();

									if ($selectGameNameQueryResult->num_rows >= 1) {

										if ($row = $selectGameNameQueryResult->fetch_assoc()) {

											$gameName = $row['gameName'];

										}

									}

									$onlineActivityStatusContent = "Playing " . $gameName;

									$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
									$stmt = $db->prepare($updateOnlineActivityStatus);
									$stmt->bind_param("si", $onlineActivityStatusContent, $myID);
									$stmt->execute();

								}

							}

						} else if ($currentPageSourceURLStringPartsPositionArrayFirst === "Account") {

							$currentPageSourceURLStringPartsPositionAccount = $currentPageSourceURLStringParts[1];

							if (isset($_GET['userAFK'])) {

								$userAFK = $_GET['userAFK'];

								$userAFKStatus = "AFK";

								$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
								$stmt = $db->prepare($updateOnlineActivityStatus);
								$stmt->bind_param("si", $userAFKStatus, $myID);
								$stmt->execute();

								if (isset($_GET['afkFalse'])) {

									if ($currentPageSourceURLStringPartsPositionAccount === "messages") {

										$onlineActivityStatusContentAccount = "Chatting";

										$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
										$stmt = $db->prepare($updateOnlineActivityStatus);
										$stmt->bind_param("si", $onlineActivityStatusContentAccount, $myID);
										$stmt->execute();

									} else if ($currentPageSourceURLStringPartsPositionAccount === "shop") {

										$onlineActivityStatusContentAccount = "Shopping";

										$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
										$stmt = $db->prepare($updateOnlineActivityStatus);
										$stmt->bind_param("si", $onlineActivityStatusContentAccount, $myID);
										$stmt->execute();

									} else {
									    
									    $onlineActivityStatusContentAccount = "";

										$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
										$stmt = $db->prepare($updateOnlineActivityStatus);
										$stmt->bind_param("si", $onlineActivityStatusContentAccount, $myID);
										$stmt->execute();   
									    
									}

								}

							}

						} else {

							if (isset($_GET['userAFK'])) {

								$userAFK = $_GET['userAFK'];

								$userAFKStatus = "AFK";

								$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
								$stmt = $db->prepare($updateOnlineActivityStatus);
								$stmt->bind_param("si", $userAFKStatus, $myID);
								$stmt->execute();

								if (isset($_GET['afkFalse'])) {

									$userAFK = $_GET['userAFK'];

									$userAFKStatus = "";

									$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
									$stmt = $db->prepare($updateOnlineActivityStatus);
									$stmt->bind_param("si", $userAFKStatus, $myID);
									$stmt->execute();

								}

							} else {
							    
							    $userAFKStatus = "";

								$updateOnlineActivityStatus = "UPDATE users SET onlineActivityStatus = ? WHERE id = ?;";
								$stmt = $db->prepare($updateOnlineActivityStatus);
								$stmt->bind_param("si", $userAFKStatus, $myID);
								$stmt->execute();
							    
							}

						}

					}

				}

			}

		}

	}

?>