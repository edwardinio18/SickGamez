<?php

	include("Account/server.php");

	$gameCommentGameIdFromDB = "";
	$gameCommentsList = "";
	$deleteGameCommentImage = "";
	$myID = "";
	$test = "";

	if ($login == 1) {

		$myID = fetchMyID($_COOKIE['username'], $db);

	}

	$selectGameQuery = "SELECT * FROM gamez WHERE gameId = ?;";
	$stmt = $db->prepare($selectGameQuery);
	$gameCommentGameId = $_GET['gameId'];
	$stmt->bind_param("i", $gameCommentGameId);
	$stmt->execute();
	$selectGameQueryResult = $stmt->get_result();

	if ($selectGameQueryResult->num_rows >= 1) {

		if ($row = $selectGameQueryResult->fetch_assoc()) {

			$gameCommentGameIdFromDB = $row['id'];

		}

	}

	$selectGameCommentsQuery = "SELECT * FROM gameComments INNER JOIN users ON gameComments.gameCommentUserId = users.id WHERE gameCommentGameId = ? ORDER BY gameCommentDateAndTimeSubmitted DESC;";
	$gameStmt = $db->prepare($selectGameCommentsQuery);
	$gameStmt->bind_param("i", $gameCommentGameIdFromDB);
	$gameStmt->execute();
	$selectGameCommentsQueryResult = $gameStmt->get_result();

	if ($selectGameCommentsQueryResult->num_rows >= 1) {

		while ($row = $selectGameCommentsQueryResult->fetch_assoc()) {

			$gameCommentIDDB = $row['gameCommentId'];

			if ($row['id'] === $myID) {

				$deleteGameCommentImage = '<img src="Images/bin.png" class="game_comments_delete_my_comment_image" id="' . $row['gameCommentId'] . '" />';

				$userProfilePictureGameComment = $row['profileImage'];
				$userProfilePictureGameCommentPath = "/Profile_pictures/" . $userProfilePictureGameComment;

				if ($userProfilePictureGameComment == "") {

					$userProfilePictureGameCommentPath = "/Account/Images/profile_image_placeholder.png";

				}

				$gameCommentUserUsername = $row['username'];
				$gameCommentUserUserId = $row['id'];
				$gameCommentUserContent = $row['gameCommentContent'];
				$decryptedGameCommentUserContent = decrypt($gameCommentUserContent, $key);
				$strippedTagsDecryptedGameCommentUserContent = strip_tags($decryptedGameCommentUserContent);
				$gameCommentDateAndTimeSubmitted = $row['gameCommentDateAndTimeSubmitted'];
				$formattedGameCommentDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($gameCommentDateAndTimeSubmitted));

				$gameCommentUserUsernameIdDB = "game_comments_each_div_username_" . $gameCommentUserUserId;

				$customUsernameStylingTextContent = "";

				$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
				$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
				$customUsernameStylingTextId = 2;
				$customUsernameStylingTextActiveStatus = 1;
				$stmt->bind_param("sii", $gameCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
				$stmt->execute();
				$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

				if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

					if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

						$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

						?>

							<style type="text/css">
								
								#<?php echo $gameCommentUserUsernameIdDB ?> {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

				$gameCommentsList .= '<div class="game_comments_each_div" id="game_comments_each_div_' . $gameCommentIDDB . '">
			
										<img src="' . $userProfilePictureGameCommentPath . '" class="profile_picture_display_game_comments_each_div_user" />

										<a href="/Account/profile?username=' . $gameCommentUserUsername . '"><p id="' . $gameCommentUserUsernameIdDB . '" class="game_comments_each_div_username">' . $gameCommentUserUsername . '</p></a>

										<p class="game_comments_each_div_date_and_time">' . $formattedGameCommentDateAndTimeSubmitted . '</p>

										<div class="game_comments_each_div_comment_content_div">
											
											<p class="game_comments_each_div_comment_content">' . $strippedTagsDecryptedGameCommentUserContent . '</p>

										</div>

										' . $deleteGameCommentImage . '

										<p class="game_comments_each_div_comment_content_reply_me" id="game_comments_each_div_comment_content_reply_' . $gameCommentIDDB . '" data-gamecommentid="' . $gameCommentIDDB . '">Reply</p>

									</div>

									' . getAllGameCommentsReplies($gameCommentGameIdFromDB, $gameCommentIDDB, $db) . '

									';

			} else {

				$userProfilePictureGameComment = $row['profileImage'];
				$userProfilePictureGameCommentPath = "/Profile_pictures/" . $userProfilePictureGameComment;

				if ($userProfilePictureGameComment == "") {

					$userProfilePictureGameCommentPath = "/Account/Images/profile_image_placeholder.png";

				}

				$gameCommentUserUsername = $row['username'];
				$gameCommentUserUserId = $row['id'];
				$gameCommentUserContent = $row['gameCommentContent'];
				$gameCommentIDDB = $row['gameCommentId'];
				$decryptedGameCommentUserContent = decrypt($gameCommentUserContent, $key);
				$strippedTagsDecryptedGameCommentUserContent = strip_tags($decryptedGameCommentUserContent);
				$gameCommentDateAndTimeSubmitted = $row['gameCommentDateAndTimeSubmitted'];
				$formattedGameCommentDateAndTimeSubmitted = date("H:i, d/m/Y", strtotime($gameCommentDateAndTimeSubmitted));

				$gameCommentUserUsernameIdDB = "game_comments_each_div_username_" . $gameCommentUserUserId;

				$customUsernameStylingTextContent = "";

				$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
				$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
				$customUsernameStylingTextId = 2;
				$customUsernameStylingTextActiveStatus = 1;
				$stmt->bind_param("sii", $gameCommentUserUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
				$stmt->execute();
				$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

				if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

					if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

						$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

						?>

							<style type="text/css">
								
								#<?php echo $gameCommentUserUsernameIdDB ?> {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

				$gameCommentsList .= '<div class="game_comments_each_div" id="game_comments_each_div_' . $gameCommentIDDB . '">
			
										<img src="' . $userProfilePictureGameCommentPath . '" class="profile_picture_display_game_comments_each_div_user" />

										<a href="/Account/profile?username=' . $gameCommentUserUsername . '"><p id="' . $gameCommentUserUsernameIdDB . '" class="game_comments_each_div_username">' . $gameCommentUserUsername . '</p></a>

										<p class="game_comments_each_div_date_and_time">' . $formattedGameCommentDateAndTimeSubmitted . '</p>

										<div class="game_comments_each_div_comment_content_div">
											
											<p class="game_comments_each_div_comment_content">' . $strippedTagsDecryptedGameCommentUserContent . '</p>

										</div>

										<p class="game_comments_each_div_comment_content_reply" id="game_comments_each_div_comment_content_reply_' . $gameCommentIDDB . '" data-gamecommentid="' . $gameCommentIDDB . '">Reply</p>

									</div>

									' . getAllGameCommentsReplies($gameCommentGameIdFromDB, $gameCommentIDDB, $db) . '

									';

			}

		}

	} else {

		$gameCommentsList = '<p id="no_game_comments_found_label">This game currently has no comments!</p>';

	}

	echo $gameCommentsList;

?>