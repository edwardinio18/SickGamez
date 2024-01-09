<?php

	include("server.php");

	$myFriendRequestsList = "";
	$friendRequestsCounter = 0;

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$numberOfFriendRequestsQuery = "SELECT * FROM friendRequests WHERE toUserId = ?;";
		$stmt = $db->prepare($numberOfFriendRequestsQuery);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$numberOfFriendRequestsQueryResult = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$friendRequestsCounter = mysqli_num_rows($numberOfFriendRequestsQueryResult) . " friend requests";

			if ($friendRequestsCounter == 1) {

				$friendRequestsCounter = mysqli_num_rows($numberOfFriendRequestsQueryResult) . " friend request";

			}

		}

	}

	echo "<p id='friend_request_counter'>" . $friendRequestsCounter . "</p>";

	if ($errors == 0) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_COOKIE['username']) {

					$myID = $row['id'];

				}

			}

			$selectFriendRequestForMeQuery = "SELECT * FROM friendRequests WHERE toUserId = ? LIMIT 1;";
			$stmt = $db->prepare($selectFriendRequestForMeQuery);
			$stmt->bind_param("i", $myID);
			$stmt->execute();
			$selectFriendRequestForMeQueryResult = $stmt->get_result();

			if ($selectFriendRequestForMeQueryResult->num_rows >= 1) {

				while ($row = $selectFriendRequestForMeQueryResult->fetch_assoc()) {

					$selectFriendRequestSenderDataQuery = "SELECT * FROM friendRequests INNER JOIN users ON friendRequests.fromUserId = users.id ORDER BY dateAndTimeSent DESC;";
					$stmt = $db->prepare($selectFriendRequestSenderDataQuery);
					$stmt->execute();
					$selectFriendRequestSenderDataQueryResult = $stmt->get_result();

					if ($selectFriendRequestSenderDataQueryResult->num_rows >= 1) {

						while ($row = $selectFriendRequestSenderDataQueryResult->fetch_assoc()) {

							if ($myID === $row['toUserId']) {

								$userProfilePictureFriendRequest = $row['profileImage'];
								$userProfilePictureFriendRequestPath = "/Profile_pictures/" . $userProfilePictureFriendRequest;

								if ($userProfilePictureFriendRequest == "") {

									$userProfilePictureFriendRequestPath = "Images/profile_image_placeholder.png";

								}

								$friendRequestUserUsername = $row['username'];
								$friendRequestText = " would like to be your friend!";
								$friendRequestUserID = $row['id'];
								$dateAndTimeFriendRequestSent = $row['dateAndTimeSent'];
								$formattedDateAndTimeFriendRequestSent = date("H:i, d/m/Y", strtotime($dateAndTimeFriendRequestSent));

								$friendRequestUserIDDB = "friend_request_text_" . $friendRequestUserID;

								$customUsernameStylingTextContent = "";

								$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
								$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
								$customUsernameStylingTextId = 2;
								$customUsernameStylingTextActiveStatus = 1;
								$stmt->bind_param("sii", $friendRequestUserID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
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

								$myFriendRequestsList .= "<div class='friend_request_div'>
			
															<img src='" . $userProfilePictureFriendRequestPath . "' class='friend_request_profile_pic_display' />

															<p class='friend_request_from_user_date_time'> " . $formattedDateAndTimeFriendRequestSent . " </p>

															<div class='friend_request_text_div'>

																<p class='friend_request_text' id='friend_request_text_" . $friendRequestUserID . "'>" . $friendRequestUserUsername . "</p>
																
																<p class='friend_request_text_2'>" . $friendRequestText . "</p>

															</div>

															<form action='' method='post'>

																<input type='hidden' name='id' value='" . $friendRequestUserID . "' />
																
																<input type='submit' name='accept_friend_request' id='accept_friend_request' value='Accept!' />

																<input type='submit' name='decline_friend_request' id='decline_friend_request' value='Decline!' />

															</form>

														</div>";

							}

						}

					}

				}

				echo $myFriendRequestsList;

			} else {

				$noFriendRequests = "<p id='no_friend_requests'>You currently have no friend requests!</p>";
				$errors = 1;

				echo $noFriendRequests;

			}

		}

	}

?>