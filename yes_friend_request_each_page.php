<?php

	include("Account/server.php");

	$friendRequestIdFromDB = "";
	$userID = "";
	$myID = "";

	if (isset($_GET['friendRequestIdFromDB']) && isset($_GET['fromUserId']) && isset($_GET['toUserId'])) {

		$friendRequestIdFromDB = $_GET['friendRequestIdFromDB'];
		$userID = $_GET['fromUserId'];
		$myID = $_GET['toUserId'];

	}

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$query = "SELECT * FROM friendRequests WHERE fromUserId = ? AND toUserId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("ii", $userID, $myID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$query = "DELETE FROM friendRequests WHERE fromUserId = ? AND toUserId = ?;";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $query)) {

					echo "Error!";
					exit();

				} else {

					mysqli_stmt_bind_param($stmt, "ii", $userID, $myID);
					mysqli_stmt_execute($stmt);

					$query = "INSERT INTO friends (friend1Id, friend2Id) VALUES (?, ?);";
					$stmt = mysqli_stmt_init($db);

					if (!mysqli_stmt_prepare($stmt, $query)) {

						echo "Error!";
						exit();

					} else {

						mysqli_stmt_bind_param($stmt, "ii", $userID, $myID);
						mysqli_stmt_execute($stmt);

						$query = "INSERT INTO friends (friend1Id, friend2Id) VALUES (?, ?);";
						$stmt = mysqli_stmt_init($db);

						if (!mysqli_stmt_prepare($stmt, $query)) {

							echo "Error!";
							exit();

						} else {

							mysqli_stmt_bind_param($stmt, "ii", $myID, $userID);
							mysqli_stmt_execute($stmt);

						}

					}

				}

			}

		}

	}

?>