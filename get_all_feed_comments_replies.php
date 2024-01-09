<?php

	include("Account/server.php");

	if (isset($_GET['feedPostCommentRepliedCommentId']) || isset($_GET['feedPostCommentReplyId'])) {

		$feedPostCommentRepliedCommentId = $_GET['feedPostCommentRepliedCommentId'];

		$query = "SELECT * FROM feedCommentsReplies WHERE feedCommentsRepliesCommentId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $feedPostCommentRepliedCommentId);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			echo "1";

		} else {

			echo "2";

		}

	} else {

		$feedPostCommentId = $_GET['feedPostCommentId'];

		echo getAllFeedPostCommentsReplies($feedPostCommentId, $db);

	}

?>