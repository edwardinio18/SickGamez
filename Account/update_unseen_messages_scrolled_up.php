<?php

	include("server.php");

	$fromUserId = $_GET['toUserId'];
	$toUserId = fetchMyID($_COOKIE['username'], $db);

	$query = "UPDATE messages SET messageActiveScroll = ? WHERE fromUserIdMessage = ? AND toUserIdMessage = ?;";
	$stmt = $db->prepare($query);
	$messageActiveScroll = 1;
	$stmt->bind_param("iii", $messageActiveScroll, $fromUserId, $toUserId);
	$stmt->execute();

?>