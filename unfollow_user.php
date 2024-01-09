<?php

	include("Account/server.php");

	$myID = fetchMyID($_COOKIE['username'], $db);

	$unfollowUserId = $_GET['unfollowUserId'];

	$query = "DELETE FROM followers WHERE followerUserId = ? AND followingUserId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ii", $myID, $unfollowUserId);
	$stmt->execute();

	$query = "DELETE FROM feedNotifications WHERE feedNotificationsFromUser = ? AND feedNotificationsToUser = ?";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ii", $myID, $unfollowUserId);
	$stmt->execute();

?>