<?php

	include("server.php");

	$searchedFriendUsernameMessage = "";

	if (isset($_GET['search'])) {

		$searchedFriendUsernameMessage = $_GET['search'] . "%";

	}

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$myFriendsList = "";
	$myFriendsListEmpty = "";
	$searchedFriendsList = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ? LIMIT 1;";
		$stmt = $db->prepare($numberOfFriendsQuery);
		$stmt->bind_param("i", $myID);
		$stmt->execute();
		$numberOfFriendsQueryResult = $stmt->get_result();

		if ($numberOfFriendsQueryResult->num_rows >= 1) {

			while ($row = $numberOfFriendsQueryResult->fetch_assoc()) {

				$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id WHERE LOWER(username) LIKE LOWER(?) AND friend1Id = ?;";
				$stmt = $db->prepare($selectFriendDataQuery);
				$stmt->bind_param("si", $searchedFriendUsernameMessage, $myID);
				$stmt->execute();
				$selectFriendDataQueryResult = $stmt->get_result();

				if ($selectFriendDataQueryResult->num_rows >= 1) {

					while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

						if ($myID === $row['friend1Id']) {

							$userProfilePictureFriend = $row['profileImage'];
							$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

							if ($userProfilePictureFriend == "") {

								$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

							}

							$friendUsername = $row['username'];
							$friendUsernameId = $row['id'];

							$friendUsernameIdDB = "start_new_conversation_search_friends_results_username_" . $friendUsernameId;

							$customUsernameStylingTextContent = "";

							$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
							$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
							$customUsernameStylingTextId = 2;
							$customUsernameStylingTextActiveStatus = 1;
							$stmt->bind_param("sii", $friendUsernameId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
							$stmt->execute();
							$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

							if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

								if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

									$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

									?>

										<style type="text/css">
											
											#<?php echo $friendUsernameIdDB; ?> {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

							$searchedFriendsList .= '<div class="start_new_conversation_search_friends_results_div_for_each">
						
														<img src="' . $userProfilePictureFriendPath . '" class="start_new_conversation_search_friends_results_profile_pic_display" />

														<div class="start_new_conversation_search_friends_results_username_div">
															
															<p class="start_new_conversation_search_friends_results_username" id="start_new_conversation_search_friends_results_username_' . $friendUsernameId . '">' . $friendUsername . '</p>

														</div>

														<button id="start_new_conversation_submit" data-touserid="' . $friendUsernameId . '" data-touserusername="' . $row['username'] . '">Go!</button>

													</div>';

						}

					}

				} else {

					$searchedFriendsList = '<p id="start_new_conversation_no_friends_found">No friends found!</p>';

				}

			}

		} else {

			$searchedFriendsList = '<p id="start_new_conversation_no_friends_found">No friends found!</p>';

		}

	}

	echo $searchedFriendsList;

?>