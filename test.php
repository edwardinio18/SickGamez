<?php

	include("Account/server.php");

	$JSON = array();

	function JSONData($db, $key) {

		$query = "SELECT * FROM messages;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_assoc()) {

			$decryptedMessageContent = decrypt($row['messageContent'], $key);

			$JSON[] = array(

				"chatMessageId" => $row['chatMessageId'],
				"fromUserIdMessage" => $row['fromUserIdMessage'],
				"toUserIdMessage" => $row['toUserIdMessage'],
				"messageContent" => $decryptedMessageContent,
				"messageImage" => $row['messageImage'],
				"status" => $row['status'],
				"clickedStatus" => $row['clickedStatus'],
				"soundPlayedActiveStatus" => $row['soundPlayedActiveStatus'],
				"messageActiveScroll" => $row['messageActiveScroll'],
				"dateAndTimeSentMessage" => $row['dateAndTimeSentMessage'],

			);

		}

		return json_encode($JSON);

	}

	$fileName = date("d-m-Y") . ".json";

	if (file_put_contents("APIs/" . $fileName, JSONData($db, $key))) {

		echo $fileName . " file created!";

	} else {

		echo "An error has occured!";

	}

?>