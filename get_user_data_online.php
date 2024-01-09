<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$myFriendsList = "";
	$myFriendsListEmpty = "";

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

				$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id;";
				$stmt = $db->prepare($selectFriendDataQuery);
				$stmt->execute();
				$selectFriendDataQueryResult = $stmt->get_result();

				if ($selectFriendDataQueryResult->num_rows >= 1) {

					while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

						if ($myID === $row['friend1Id']) {

							$friendUsername = $row['username'];
							$friendUsernameId = $row['id'];

							$friendUsernameIdDB = "online_friend_username_" . $friendUsernameId;
							$awayOnlineStatusFriend = "away_yellow_dot_" . $friendUsernameId;
							$doNotDisturbOnlineStatusFriend = "do_not_disturb_purple_dot_" . $friendUsernameId;

							$onlineFriendsDivForEachFriendUserId = "online_friends_div_for_each_" . $friendUsernameId;
							$onlineFriendsUserMainDivId = "online_friends_user_div_" . $friendUsernameId;
							$onlineFriendsUsernameId = "online_friend_username_" . $friendUsernameId;
							$onlineFriendsActivityStatusId = "online_friend_activity_status_" . $friendUsernameId;

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

							$current_timestamp = strtotime(date("Y-m-d H:i:s") . '-5 second');
							$current_timestamp = date("Y-m-d H:i:s", $current_timestamp);

							$user_last_activity = fetchUserLastActivity($row['username'], $db);

							if ($user_last_activity > $current_timestamp) {

								if ($row['onlineActivityStatusType'] == 1) {

									$userProfilePictureFriend = $row['profileImage'];
									$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

									if ($userProfilePictureFriend == "") {

										$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

									}

									$friendOnlineActivityStatus = $row['onlineActivityStatus'];

									if ($friendOnlineActivityStatus == "") {

										$friendOnlineActivityStatus = "";

									} else {

										$selectUserQuery = "SELECT * FROM users WHERE id = ?;";
										$stmt = $db->prepare($selectUserQuery);
										$stmt->bind_param("i", $friendUsernameId);
										$stmt->execute();
										$selectUserQueryResult = $stmt->get_result();

										if ($selectUserQueryResult->num_rows >= 1) {

											if ($row = $selectUserQueryResult->fetch_assoc()) {

												?>

													<style type="text/css">
														
														#<?php echo $onlineFriendsDivForEachFriendUserId; ?> {

															position: relative;
															width: 90%;
															height: 60px;
															margin: auto;
															border: 2.5px solid #777EB8;
															border-radius: 20px;
															margin-top: 20px;

														}

														#<?php echo $onlineFriendsUserMainDivId; ?> {

															width: 95px;
															margin-left: 55px;
															margin-top: 12px;
															height: 51px;

														}

														#<?php echo $onlineFriendsUsernameId; ?> {

															color: white;
															font-family: GomGom;
															font-size: 19px;
															text-align: left;
															margin-top: -10px;
															margin-bottom: 0;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;

														}

														#<?php echo $onlineFriendsActivityStatusId; ?> {

															color: gray;
															font-family: GomGom;
															font-size: 16.5px;
															font-style: italic;
															cursor: default;
															margin: 0;
															margin-top: -3px;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;
															padding-left: 1px;

														}

													</style>

												<?php

											}

										}

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

									}

									$myFriendsList .= '<div class="online_friends_div_for_each" id="online_friends_div_for_each_' . $friendUsernameId . '">

															<img src="' . $userProfilePictureFriendPath . '" class="online_friends_profile_pic_display" />

															<div class="online_friends_user_div" id="online_friends_user_div_' . $friendUsernameId . '">
																
																<a class="online_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																	
																	<p class="online_friend_username" id="online_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																</a>

																<p class="online_friend_activity_status" id="online_friend_activity_status_' . $friendUsernameId . '">' . $friendOnlineActivityStatus . '</p>

															</div>

															<span class="online_green_dot"></span>

														</div>';

								}

								if ($row['onlineActivityStatusType'] == 2) {

									$userProfilePictureFriend = $row['profileImage'];
									$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

									if ($userProfilePictureFriend == "") {

										$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

									}

									$friendOnlineActivityStatus = $row['onlineActivityStatus'];

									if ($friendOnlineActivityStatus == "") {

										$friendOnlineActivityStatus = "";

									} else {

										$selectUserQuery = "SELECT * FROM users WHERE id = ?;";
										$stmt = $db->prepare($selectUserQuery);
										$stmt->bind_param("i", $friendUsernameId);
										$stmt->execute();
										$selectUserQueryResult = $stmt->get_result();

										if ($selectUserQueryResult->num_rows >= 1) {

											if ($row = $selectUserQueryResult->fetch_assoc()) {

												?>

													<style type="text/css">
														
														#<?php echo $onlineFriendsDivForEachFriendUserId; ?> {

															position: relative;
															width: 90%;
															height: 60px;
															margin: auto;
															border: 2.5px solid #777EB8;
															border-radius: 20px;
															margin-top: 20px;

														}

														#<?php echo $onlineFriendsUserMainDivId; ?> {

															width: 95px;
															margin-left: 55px;
															margin-top: 12px;
															height: 51px;

														}

														#<?php echo $onlineFriendsUsernameId; ?> {

															color: white;
															font-family: GomGom;
															font-size: 19px;
															text-align: left;
															margin-top: -10px;
															margin-bottom: 0;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;

														}

														#<?php echo $onlineFriendsActivityStatusId; ?> {

															color: gray;
															font-family: GomGom;
															font-size: 16.5px;
															font-style: italic;
															cursor: default;
															margin: 0;
															margin-top: -3px;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;
															padding-left: 1px;

														}

														#<?php echo $awayOnlineStatusFriend; ?> {

															background-color: yellow;

														}

													</style>

												<?php

											}

										}

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

									}

									$myFriendsList .= '<div class="online_friends_div_for_each" id="online_friends_div_for_each_' . $friendUsernameId . '">

															<img src="' . $userProfilePictureFriendPath . '" class="online_friends_profile_pic_display" />

															<div class="online_friends_user_div" id="online_friends_user_div_' . $friendUsernameId . '">
																
																<a class="online_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																	
																	<p class="online_friend_username" id="online_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																</a>

																<p class="online_friend_activity_status" id="online_friend_activity_status_' . $friendUsernameId . '">' . $friendOnlineActivityStatus . '</p>

															</div>

															<span class="online_green_dot" id="away_yellow_dot_' . $friendUsernameId . '"></span>

														</div>';

								}

								if ($row['onlineActivityStatusType'] == 3) {

									$userProfilePictureFriend = $row['profileImage'];
									$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

									if ($userProfilePictureFriend == "") {

										$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

									}

									$friendOnlineActivityStatus = $row['onlineActivityStatus'];

									if ($friendOnlineActivityStatus == "") {

										$friendOnlineActivityStatus = "";

									} else {

										$selectUserQuery = "SELECT * FROM users WHERE id = ?;";
										$stmt = $db->prepare($selectUserQuery);
										$stmt->bind_param("i", $friendUsernameId);
										$stmt->execute();
										$selectUserQueryResult = $stmt->get_result();

										if ($selectUserQueryResult->num_rows >= 1) {

											if ($row = $selectUserQueryResult->fetch_assoc()) {

												?>

													<style type="text/css">
														
														#<?php echo $onlineFriendsDivForEachFriendUserId; ?> {

															position: relative;
															width: 90%;
															height: 60px;
															margin: auto;
															border: 2.5px solid #777EB8;
															border-radius: 20px;
															margin-top: 20px;

														}

														#<?php echo $onlineFriendsUserMainDivId; ?> {

															width: 95px;
															margin-left: 55px;
															margin-top: 12px;
															height: 51px;

														}

														#<?php echo $onlineFriendsUsernameId; ?> {

															color: white;
															font-family: GomGom;
															font-size: 19px;
															text-align: left;
															margin-top: -10px;
															margin-bottom: 0;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;

														}

														#<?php echo $onlineFriendsActivityStatusId; ?> {

															color: gray;
															font-family: GomGom;
															font-size: 16.5px;
															font-style: italic;
															cursor: default;
															margin: 0;
															margin-top: -3px;
															max-width: 95px;
															white-space: nowrap;
															text-overflow: ellipsis;
															overflow: hidden;
															padding-left: 1px;

														}

														#<?php echo $doNotDisturbOnlineStatusFriend; ?> {

															background-color: #777EB8;

														}

													</style>

												<?php

											}

										}

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

									}

									$myFriendsList .= '<div class="online_friends_div_for_each" id="online_friends_div_for_each_' . $friendUsernameId . '">

															<img src="' . $userProfilePictureFriendPath . '" class="online_friends_profile_pic_display" />

															<div class="online_friends_user_div" id="online_friends_user_div_' . $friendUsernameId . '">
																
																<a class="online_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																	
																	<p class="online_friend_username" id="online_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																</a>

																<p class="online_friend_activity_status" id="online_friend_activity_status_' . $friendUsernameId . '">' . $friendOnlineActivityStatus . '</p>

															</div>

															<span class="online_green_dot" id="do_not_disturb_purple_dot_' . $friendUsernameId . '"></span>

														</div>';

								}

							}

						}

					}

				}

			}

		} else {

			$myFriendsList = '<p id="no_friends_online">You don\'t have any online friends!</p>';

		}

	} else {

		$myFriendsList = '<p id="no_friends_online">You don\'t have any online friends!</p>';

	}

	echo $myFriendsList;

?>