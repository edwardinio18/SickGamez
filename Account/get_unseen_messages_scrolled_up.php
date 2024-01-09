<?php

	include("server.php");

	$messageCounterScrolled = "";

	$fromUserId = $_GET['toUserId'];
	$toUserId = fetchMyID($_COOKIE['username'], $db);

	$query = "SELECT * FROM messages WHERE fromUserIdMessage = ? AND toUserIdMessage = ? AND status = ? AND messageActiveScroll = ?;";
	$stmt = $db->prepare($query);
	$status = 1;
	$messageActiveScroll = 0;
	$stmt->bind_param("iiii", $fromUserId, $toUserId, $status, $messageActiveScroll);
	$stmt->execute();
	$result = $stmt->get_result();
	$counter = mysqli_num_rows($result);

	if ($counter > 0) {

		$messageCounterScrolled = '<div id="unseen_messages_counter_scrolled_up_div_' . $toUserId . '" class="unseen_messages_counter_scrolled_up_div"> 
					
										<p id="unseen_messages_counter_scrolled_up_counter_' . $toUserId . '" class="unseen_messages_counter_scrolled_up_counter">' . $counter . '</p>

										<img src="Images/down_arrow.png" class="unseen_messages_counter_scrolled_up_arrow_image" />

									</div>';

	}

	echo $messageCounterScrolled;

?>