<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$newMessagesListDivs = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$selectAllNewMessagesEachPageQuery = "SELECT DISTINCT fromUserIdMessage, username, profileImage, id, chatMessageId, messageContent FROM messages INNER JOIN users ON messages.fromUserIdMessage = users.id WHERE toUserIdMessage = ? AND status = ? AND clickedStatus = ? ORDER BY dateAndTimeSentMessage DESC;";
		$stmt = $db->prepare($selectAllNewMessagesEachPageQuery);
		$status = 0;
		$clickedStatus = 0;
		$stmt->bind_param("iii", $myID, $status, $clickedStatus);
		$stmt->execute();
		$selectAllNewMessagesEachPageQueryResult = $stmt->get_result();

		if ($selectAllNewMessagesEachPageQueryResult->num_rows >= 1) {

			while ($row = $selectAllNewMessagesEachPageQueryResult->fetch_assoc()) {

				$friendUsername = $row['username'];
				$friendId = $row['id'];
				$messageId = $row['chatMessageId'];
				$messageContent = $row['messageContent'];
				$decryptedMessageContent = decrypt($messageContent, $key);
				$strippedTagsMessageContent = strip_tags($decryptedMessageContent);
				$onlineActivityStatusType = "";

				$userProfilePictureMessages = $row['profileImage'];
				$userProfilePictureMessagesPath = "/Profile_pictures/" . $userProfilePictureMessages;

				if ($userProfilePictureMessages == "") {

					$userProfilePictureMessagesPath = "Images/profile_image_placeholder.png";

				}

				$query = "SELECT * FROM users WHERE id = ?;";
				$stmt = $db->prepare($query);
				$stmt->bind_param("i", $myID);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows >= 1) {

					if ($row = $result->fetch_assoc()) {

						$onlineActivityStatusType = $row['onlineActivityStatusType'];

					}

				}

				if ($onlineActivityStatusType != 3) {

					$friendUsernameIDDB = "username_messages_notifications_each_page_div_for_each_" . $friendId;

					$customUsernameStylingTextContent = "";

					$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
					$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
					$myID = fetchMyID($friendUsername, $db);
					$customUsernameStylingTextId = 2;
					$customUsernameStylingTextActiveStatus = 1;
					$stmt->bind_param("sii", $myID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
					$stmt->execute();
					$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

					if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

						if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

							$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

							?>

								<style type="text/css">
									
									#<?php echo $friendUsernameIDDB; ?> {

										color: <?php echo $customUsernameStylingTextContent; ?>;

									}

								</style>

							<?php

						}

					}

					if ($messageContent === "") {

						$newMessagesListDivs .= '<div class="messages_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="messages_notifications_each_page_div_for_each_' . $messageId . '">

									  			<a href=\'javascript:closeNewMessageDiv(' . $messageId . ')\' class="close_messages_notifications_each_page_div_for_each_link" id="close_messages_notifications_each_page_div_for_each_link_' . $messageId . '"">

									  				<span class="close_messages_notifications_each_page_div_for_each" id="close_messages_notifications_each_page_div_for_each_' . $messageId . '">&times;</span>

									  			</a>

												<div onclick=\'window.location.href="/Account/messages"\' class="messages_notifications_each_page_inner_div">

										  			<img src="' . $userProfilePictureMessagesPath . '" class="profile_picture_display_messages_notifications_each_page_div_for_each" />

										  			<p class="username_messages_notifications_each_page_div_for_each" id="username_messages_notifications_each_page_div_for_each_' . $friendId . '">' . $friendUsername . '</p>

										  			<p class="message_content_messages_notifications_each_page_div_for_each" id="message_content_messages_notifications_each_page_div_for_each_' . $messageId . '">Image attachment</p>

										  		</div>

										  		<p class="message_content_messages_notifications_each_page_div_for_each_reply" id="message_content_messages_notifications_each_page_div_for_each_reply_' . $messageId . '" data-messagedivcontainerid="messages_notifications_each_page_div_for_each_' . $messageId . '" data-closemessagespan="close_messages_notifications_each_page_div_for_each_' . $messageId . '" data-messagefriendusername="username_messages_notifications_each_page_div_for_each_' . $friendId . '" data-messagecontent="message_content_messages_notifications_each_page_div_for_each_' . $messageId . '" data-messagereply="message_content_messages_notifications_each_page_div_for_each_reply_' . $messageId . '" data-touserid="' . $friendId . '" data-messageid="' . $messageId . '">Reply</p>

										  	</div>';

					} else {

						$newMessagesListDivs .= '<div class="messages_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="messages_notifications_each_page_div_for_each_' . $messageId . '">

									  			<a href=\'javascript:closeNewMessageDiv(' . $messageId . ')\' class="close_messages_notifications_each_page_div_for_each_link" id="close_messages_notifications_each_page_div_for_each_link_' . $messageId . '"">

									  				<span class="close_messages_notifications_each_page_div_for_each" id="close_messages_notifications_each_page_div_for_each_' . $messageId . '">&times;</span>

									  			</a>

												<div onclick=\'window.location.href="/Account/messages"\' class="messages_notifications_each_page_inner_div">

										  			<img src="' . $userProfilePictureMessagesPath . '" class="profile_picture_display_messages_notifications_each_page_div_for_each" />

										  			<p class="username_messages_notifications_each_page_div_for_each" id="username_messages_notifications_each_page_div_for_each_' . $friendId . '">' . $friendUsername . '</p>

										  			<p class="message_content_messages_notifications_each_page_div_for_each" id="message_content_messages_notifications_each_page_div_for_each_' . $messageId . '">' . $strippedTagsMessageContent . '</p>

										  		</div>

										  		<p class="message_content_messages_notifications_each_page_div_for_each_reply" id="message_content_messages_notifications_each_page_div_for_each_reply_' . $messageId . '" data-messagedivcontainerid="messages_notifications_each_page_div_for_each_' . $messageId . '" data-closemessagespan="close_messages_notifications_each_page_div_for_each_' . $messageId . '" data-messagefriendusername="username_messages_notifications_each_page_div_for_each_' . $friendId . '" data-messagecontent="message_content_messages_notifications_each_page_div_for_each_' . $messageId . '" data-messagereply="message_content_messages_notifications_each_page_div_for_each_reply_' . $messageId . '" data-touserid="' . $friendId . '" data-messageid="' . $messageId . '">Reply</p>

										  	</div>';

					}

				}

			}

		}

	}

	echo $newMessagesListDivs;

?>