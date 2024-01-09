<?php

	include("server.php");

	$toUserId = "";

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$myFriendsListMessagesRecent = "";
	$messageContent = "";
	$decrypedMessageContent = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	$query = "SELECT c.* FROM messages c JOIN (SELECT CASE WHEN fromUserIdMessage = ? THEN toUserIdMessage ELSE fromUserIdMessage END AS other, MAX(chatMessageId) AS latest FROM messages WHERE fromUserIdMessage = ? OR toUserIdMessage = ? GROUP BY other) m ON (c.fromUserIdMessage = ? AND c.toUserIdMessage = m.other OR c.toUserIdMessage = ? AND c.fromUserIdMessage = m.other) AND c.chatMessageId = m.latest ORDER BY chatMessageId DESC LIMIT 5;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("iiiii", $myID, $myID, $myID, $myID, $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['fromUserIdMessage'] === $myID) {

				$toUserId = $row['toUserIdMessage'];
				$messageContent = $row['messageContent'];
				$decryptedMessageContent = decrypt($messageContent, $key);
				$dateAndTimeSentLastMessage = $row['dateAndTimeSentMessage'];
				$formattedDateAndTimeSentLastMessage = date("H:i, d/m/Y", strtotime($dateAndTimeSentLastMessage));

			} else {

				$toUserId = $row['fromUserIdMessage'];
				$messageContent = $row['messageContent'];
				$decryptedMessageContent = decrypt($messageContent, $key);
				$dateAndTimeSentLastMessage = $row['dateAndTimeSentMessage'];
				$formattedDateAndTimeSentLastMessage = date("H:i, d/m/Y", strtotime($dateAndTimeSentLastMessage));

			}

			$query1 = "SELECT * FROM users WHERE id = ?;";
			$stmt1 = $db->prepare($query1);
			$stmt1->bind_param("i", $toUserId);
			$stmt1->execute();
			$result1 = $stmt1->get_result();

			if ($result1->num_rows >= 1) {

				if ($row1 = $result1->fetch_assoc()) {

					$userProfilePictureMessages = $row1['profileImage'];
					$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

					if ($userProfilePictureMessages == "") {

						$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

					}

					$friendUsername = $row1['username'];
					$friendUserID = $row1['id'];

					$friendUserIDDB = "recent_messages_hover_div_main_div_for_each_username_" . $friendUserID;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $friendUserID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $friendUserIDDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					if ($messageContent === "") {

						$myFriendsListMessagesRecent .= '<div onclick=\'window.location.href="messages"\' class="recent_messages_hover_div_main_div_for_each_div">
							
															<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_recent_messages_hover_div_main_div_for_each" />

															' . unSeenMessagesCounter($friendUserID, $myID, $db) . '

															<p class="recent_messages_hover_div_main_div_for_each_username" id="recent_messages_hover_div_main_div_for_each_username_' . $friendUserID . '">' . $friendUsername . '</p>

															<div class="recent_messages_hover_div_main_div_for_each_content_div">
																
																<p class="recent_messages_hover_div_main_div_for_each_content">Image attachment</p>

																<p class="recent_messages_hover_div_main_div_for_each_content_date_and_time">' . $formattedDateAndTimeSentLastMessage . '</p>

															</div>

															' . fetchIsTypingStatus($friendUserID, $db) . '

														</div>';

					} else {

						$myFriendsListMessagesRecent .= '<div onclick=\'window.location.href="messages"\' class="recent_messages_hover_div_main_div_for_each_div">
							
															<img src="' . $userProfilePictureMessagesPath . '" class="profile_pic_display_recent_messages_hover_div_main_div_for_each" />

															' . unSeenMessagesCounter($friendUserID, $myID, $db) . '

															<p class="recent_messages_hover_div_main_div_for_each_username" id="recent_messages_hover_div_main_div_for_each_username_' . $friendUserID . '">' . $friendUsername . '</p>

															<div class="recent_messages_hover_div_main_div_for_each_content_div">
																
																<p class="recent_messages_hover_div_main_div_for_each_content">' . $decryptedMessageContent . '</p>

																<p class="recent_messages_hover_div_main_div_for_each_content_date_and_time">' . $formattedDateAndTimeSentLastMessage . '</p>

															</div>

															' . fetchIsTypingStatus($friendUserID, $db) . '

														</div>';
						
					}

				}

			}

		}

	} else {

		echo '<p id="no_recent_messages">You don\'t have any conversations!</p>';

	}

	echo $myFriendsListMessagesRecent;

?>