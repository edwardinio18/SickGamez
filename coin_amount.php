<?php

	include("Account/server.php");

	$coinAmount = "";

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$username = $_COOKIE['username'];
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			$coinAmount = $row['coinAmount'];

		}

	}

	echo $coinAmount;

?>