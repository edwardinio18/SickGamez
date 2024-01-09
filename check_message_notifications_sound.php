<?php

	include("Account/server.php");

	$checkCustomNotificationsSoundActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
	$stmt = $db->prepare($checkCustomNotificationsSoundActiveStatusQuery);
	$myID = fetchMyID($_COOKIE['username'], $db);
	$customNotificationsSoundId = 3;
	$customNotificationsSoundActiveStatus = 1;
	$stmt->bind_param("sii", $myID, $customNotificationsSoundId, $customNotificationsSoundActiveStatus);
	$stmt->execute();
	$checkCustomNotificationsSoundActiveStatusQueryResult = $stmt->get_result();

	$customNotificationsSoundContent = "";
	$customNotificationsSoundPath = "";

	if ($checkCustomNotificationsSoundActiveStatusQueryResult->num_rows >= 1) {

		if ($row = $checkCustomNotificationsSoundActiveStatusQueryResult->fetch_assoc()) {

			$customNotificationsSoundContent = $row['notificationsSound'];
			$customNotificationsSoundPath = "/Notifications_sounds/" . $customNotificationsSoundContent;

		}

	}

	echo $customNotificationsSoundPath;

?>