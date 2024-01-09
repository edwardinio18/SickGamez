<?php

	include("server.php");

	$output = "";

	$query = "SELECT * FROM feedNotifications WHERE feedNotificationsToUser = ?;";
	$stmt = $db->prepare($query);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$stmt->bind_param("i", $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			$output .= '<p id="notifications_mark_all_as_read">Mark all as read</p>';

		}

	} else {

		$output .= "";

	}

	echo $output;

?>