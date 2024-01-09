<?php

	include("server.php");

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

				$selectNewFriendRequestSenderDataQuery = "SELECT * FROM friendRequests INNER JOIN users ON friendRequests.fromUserId = users.id WHERE clickedStatus = ? ORDER BY dateAndTimeSent DESC LIMIT 5;";
				$stmt = $db->prepare($selectNewFriendRequestSenderDataQuery);
				$clickedStatus = 0;
				$stmt->bind_param("i", $clickedStatus);
				$stmt->execute();
				$selectNewFriendRequestSenderDataQueryResult = $stmt->get_result();

				if ($selectNewFriendRequestSenderDataQueryResult->num_rows >= 1) {

					while ($row = $selectNewFriendRequestSenderDataQueryResult->fetch_assoc()) {

						if ($myID === $row['toUserId']) {

							$userProfilePictureFriendRequest = $row['profileImage'];
							$userProfilePictureFriendRequestPath = "/Profile_pictures/" . $userProfilePictureFriendRequest;

							if ($userProfilePictureFriendRequest == "") {

								$userProfilePictureFriendRequestPath = "Images/profile_image_placeholder.png";

							}

							$friendUsername = $row['username'];
							$friendRequestUserID = $row['id'];
							$friendRequestID = $row['friendRequestId'];

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

							$newFriendRequestsListDivs .= '<div class="friend_requests_hover_div_main_div_for_each_div" id="friend_requests_hover_div_main_div_for_each_div_' . $friendRequestID . '">
							
																<img src="' . $userProfilePictureFriendRequestPath . '" class="profile_pic_display_friend_requests_hover_div_main_div_for_each" />

																<p class="friend_requests_hover_div_main_div_for_each_username" id="friend_requests_hover_div_main_div_for_each_username_' . $friendRequestUserID . '">' . $friendUsername . '</p>

																<p class="friend_requests_hover_div_main_div_for_each_username_2">Wanna be friends?</p>

																<div class="friend_requests_hover_div_main_div_for_each_yes_no_div">
																	
																	<button onclick=\'javascript:acceptYesFriendRequest(' . $friendRequestID . ', ' . $friendRequestUserID . ', ' . $myID . ')\' class="friend_requests_hover_div_main_div_for_each_yes_button" id="friend_requests_hover_div_main_div_for_each_yes_button_' . $friendRequestID . '" style="cursor: default;">Yes!</button>

																	<button onclick=\'javascript:declineNoFriendRequest(' . $friendRequestID . ', ' . $friendRequestUserID . ', ' . $myID . ')\' class="friend_requests_hover_div_main_div_for_each_no_button" id="friend_requests_hover_div_main_div_for_each_no_button_' . $friendRequestID . '" style="cursor: default;">No!</button>

																</div>

															</div>';

						}

					}

				}

			}

		} else {

			$newFriendRequestsListDivs = '<p class="no_friend_requests_profile_div">You don\'t have any friend requests!</p>';

		}

	}

	echo $newFriendRequestsListDivs;

?>