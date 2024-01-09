<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$newFriendRequestsListDivs = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$selectAllNewFriendRequestsQuery = "SELECT * FROM friendRequests WHERE toUserId = ? LIMIT 1;";
		$stmt = $db->prepare($selectAllNewFriendRequestsQuery);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$selectAllNewFriendRequestsQueryResult = $stmt->get_result();

		if ($selectAllNewFriendRequestsQueryResult->num_rows >= 1) {

			while ($row = $selectAllNewFriendRequestsQueryResult->fetch_assoc()) {

				$selectNewFriendRequestSenderDataQuery = "SELECT * FROM friendRequests INNER JOIN users ON friendRequests.fromUserId = users.id WHERE clickedStatus = ? ORDER BY dateAndTimeSent DESC;";
				$stmt = $db->prepare($selectNewFriendRequestSenderDataQuery);
				$clickedStatus = 0;
				$stmt->bind_param("i", $clickedStatus);
				$stmt->execute();
				$selectNewFriendRequestSenderDataQueryResult = $stmt->get_result();

				if ($selectNewFriendRequestSenderDataQueryResult->num_rows >= 1) {

					while ($row = $selectNewFriendRequestSenderDataQueryResult->fetch_assoc()) {

						if ($myID === $row['toUserId']) {

							$friendUsername = $row['username'];
							$friendRequestUserID = $row['id'];
							$friendRequestID = $row['friendRequestId'];

							$onlineActivityStatusType = "";

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

								$userProfilePictureFriendRequest = $row['profileImage'];
								$userProfilePictureFriendRequestPath = "/Profile_pictures/" . $userProfilePictureFriendRequest;

								if ($userProfilePictureFriendRequest == "") {

									$userProfilePictureFriendRequestPath = "Images/profile_image_placeholder.png";

								}

								$friendRequestUserIDDB = "username_friend_request_notifications_each_page_div_for_each_" . $friendRequestUserID;

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
												
												#<?php echo $friendRequestUserIDDB; ?> {

													color: <?php echo $customUsernameStylingTextContent; ?>;

												}

											</style>

										<?php

									}

								}

								$newFriendRequestsListDivs .= '<div class="friend_request_notification_each_page_div_for_each notifications_each_page_div_for_each" id="friend_request_notification_each_page_div_for_each_' . $friendRequestID . '">

																	<a href=\'javascript:closeNewFriendRequestDiv(' . $friendRequestID . ')\' class="close_friend_request_notifications_each_page_div_for_each_link" id="close_friend_request_notifications_each_page_div_for_each_link_' . $friendRequestID . '"">

																		<span class="close_friend_request_notifications_each_page_div_for_each">&times;</span>

																	</a>

																	<div class="friend_request_notifications_each_page_inner_div">

															  			<img src="' . $userProfilePictureFriendRequestPath . '" class="profile_picture_display_friend_request_notifications_each_page_div_for_each" />

															  			<p class="username_friend_request_notifications_each_page_div_for_each" id="username_friend_request_notifications_each_page_div_for_each_' . $friendRequestUserID . '">' . $friendUsername . '</p>

															  			<p class="friend_request_content_notifications_each_page_div_for_each">Wanna be friends?</p>
															  				
															  				<div class="yes_no_friend_request_notification_each_page_div_for_each_div">
															  			
																  				<div onclick=\'javascript:acceptYesFriendRequest(' . $friendRequestID . ', ' . $friendRequestUserID . ', ' . $myID . ')\' class="yes_friend_request_notification_each_page_div_for_each_div" id="yes_friend_request_notification_each_page_div_for_each_div_' . $friendRequestID . '">
																  					
																  					<p class="yes_friend_request_notification_each_page_div_for_each_paragraph">Yes!</p>

																  				</div>

																  				<div onclick=\'javascript:declineNoFriendRequest(' . $friendRequestID . ', ' . $friendRequestUserID . ', ' . $myID . ')\' class="no_friend_request_notification_each_page_div_for_each_div" id="no_friend_request_notification_each_page_div_for_each_div_' . $friendRequestID . '">
																  					
																  					<p class="no_friend_request_notification_each_page_div_for_each_paragraph">No!</p>

																  				</div>

																	  		</div>

															  		</div>

															  	</div>';

							}

						}

					}

				}

			}

		}

	}

	echo $newFriendRequestsListDivs;

?>