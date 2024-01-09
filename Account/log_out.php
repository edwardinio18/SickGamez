<?php

	include("server.php");

	$query = "UPDATE users SET lastActivity = ? WHERE username = ?;";
	$stmt = $db->prepare($query);
	$lastActivity = NULL;
	$username = $_COOKIE['username'];
	$stmt->bind_param("ss", $lastActivity, $username);
	$stmt->execute();

	session_destroy();
	unset($_COOKIE['username']);
	setcookie("username", ' ', time() - (60 * 60 * 24), '/');
	setcookie("login", 0, time() - (60 * 60 * 24), '/');
	echo "<meta http-equiv='refresh' content='0; url=/index' />";

?>