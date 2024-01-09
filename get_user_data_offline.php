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

				$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id ORDER BY lastActivity DESC;";
				$stmt = $db->prepare($selectFriendDataQuery);
				$stmt->execute();
				$selectFriendDataQueryResult = $stmt->get_result();

				if ($selectFriendDataQueryResult->num_rows >= 1) {

					while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

						if ($myID === $row['friend1Id']) {

							$friendUsername = $row['username'];
							$friendUsernameId = $row['id'];

							$friendUsernameIdDB = "offline_friend_username_" . $friendUsernameId;

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

							$offlineFriendsDivForEachFriendUserId = "offline_friends_div_for_each_" . $friendUsernameId;
							$offlineFriendsUserMainDivId = "offline_friends_user_div_" . $friendUsernameId;
							$offlineFriendsUsernameId = "offline_friend_username_" . $friendUsernameId;
							$offlineFriendsActivityStatusId = "offline_friend_activity_status_" . $friendUsernameId;

							$current_timestamp = strtotime(date("Y-m-d H:i:s") . '-5 second');
							$current_timestamp = date("Y-m-d H:i:s", $current_timestamp);

							$user_last_activity = fetchUserLastActivity($row['username'], $db);

							$timeDifferenceBetweeenUserActivityLastSeenWholeString = "";

							if ($user_last_activity < $current_timestamp || $row['onlineActivityStatusType'] == 4) {

								if ($row['onlineActivityStatusType'] == 4) {

									if ($user_last_activity < $current_timestamp) {

										$timeDifferenceBetweeenUserActivityLastSeen = strtotime($current_timestamp) - strtotime($user_last_activity);

										if ($timeDifferenceBetweeenUserActivityLastSeen < 3600) {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) . " minutes ago";

											if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) == "0") {

												$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 minute ago";

											}

										} else if ($timeDifferenceBetweeenUserActivityLastSeen > 3600 && $timeDifferenceBetweeenUserActivityLastSeen < 86400) {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) . " hours ago";

											if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) == "0") {

												$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 hour ago";

											}

										} else if ($timeDifferenceBetweeenUserActivityLastSeen > 86400 && $timeDifferenceBetweeenUserActivityLastSeen < 604800) {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) . " days ago";

											if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) == "0") {

												$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 day ago";

											}

										} else if ($timeDifferenceBetweeenUserActivityLastSeen > 604800 && $timeDifferenceBetweeenUserActivityLastSeen < 2628000) {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) . " weeks ago";

											if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) == "0") {

												$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 week ago";

											}

										} else if ($timeDifferenceBetweeenUserActivityLastSeen > 2628000 && $timeDifferenceBetweeenUserActivityLastSeen < 31536000) {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) . " months ago";

											if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) == "0") {

												$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 month ago";

											}

										}

										$userProfilePictureFriend = $row['profileImage'];
										$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

										if ($userProfilePictureFriend == "") {

											$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

										}

										$friendOfflineActivityStatus = $row['onlineActivityStatus'];

										if ($friendOfflineActivityStatus == "") {

											$friendOfflineActivityStatus = "";

										} else {

											?>

											<style type="text/css">
												
												#<?php echo $offlineFriendsDivForEachFriendUserId; ?> {

													position: relative;
													width: 90%;
													height: 60px;
													margin: auto;
													border: 2.5px solid #777EB8;
													border-radius: 20px;
													margin-top: 20px;

												}

												#<?php echo $offlineFriendsUserMainDivId; ?> {

													width: 95px;
													margin-left: 55px;
													margin-top: 12px;
													height: 51px;

												}

												#<?php echo $offlineFriendsUsernameId; ?> {

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

												#<?php echo $offlineFriendsActivityStatusId; ?> {

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

										$myFriendsList .= '<div class="offline_friends_div_for_each" id="offline_friends_div_for_each_' . $friendUsernameId . '">

																<img src="' . $userProfilePictureFriendPath . '" class="offline_friends_profile_pic_display" />

																<div class="offline_friends_user_div" id="offline_friends_user_div_' . $friendUsernameId . '">
																	
																	<a class="offline_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																		
																		<p class="offline_friend_username" id="offline_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																	</a>

																	<p class="offline_friend_activity_status" id="offline_friend_activity_status_' . $friendUsernameId . '">' . $timeDifferenceBetweeenUserActivityLastSeenWholeString . '</p>

																</div>

																<span class="offline_green_dot"></span>

															</div>';

									} else {

										$userProfilePictureFriend = $row['profileImage'];
										$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

										if ($userProfilePictureFriend == "") {

											$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

										}

										$friendOfflineActivityStatus = $row['onlineActivityStatus'];

										if ($friendOfflineActivityStatus == "") {

											$friendOfflineActivityStatus = "";

										} else {

											?>

											<style type="text/css">
												
												#<?php echo $offlineFriendsDivForEachFriendUserId; ?> {

													position: relative;
													width: 90%;
													height: 60px;
													margin: auto;
													border: 2.5px solid #777EB8;
													border-radius: 20px;
													margin-top: 20px;

												}

												#<?php echo $offlineFriendsUserMainDivId; ?> {

													width: 95px;
													margin-left: 55px;
													margin-top: 12px;
													height: 51px;

												}

												#<?php echo $offlineFriendsUsernameId; ?> {

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

												#<?php echo $offlineFriendsActivityStatusId; ?> {

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

										$myFriendsList .= '<div class="offline_friends_div_for_each" id="offline_friends_div_for_each_' . $friendUsernameId . '">

																<img src="' . $userProfilePictureFriendPath . '" class="offline_friends_profile_pic_display" />

																<div class="offline_friends_user_div" id="offline_friends_user_div_' . $friendUsernameId . '">
																	
																	<a class="offline_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																		
																		<p class="offline_friend_username" id="offline_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																	</a>

																	<p class="offline_friend_activity_status" id="offline_friend_activity_status_' . $friendUsernameId . '">' . $friendOfflineActivityStatus . '</p>

																</div>

																<span class="offline_green_dot"></span>

															</div>';
										
									}

								} else {

									$timeDifferenceBetweeenUserActivityLastSeen = strtotime($current_timestamp) - strtotime($user_last_activity);

									if ($timeDifferenceBetweeenUserActivityLastSeen < 3600) {

										$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) . " minutes ago";

										if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60)) == "0") {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 minute ago";

										}

									} else if ($timeDifferenceBetweeenUserActivityLastSeen > 3600 && $timeDifferenceBetweeenUserActivityLastSeen < 86400) {

										$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) . " hours ago";

										if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60)) == "0") {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 hour ago";

										}

									} else if ($timeDifferenceBetweeenUserActivityLastSeen > 86400 && $timeDifferenceBetweeenUserActivityLastSeen < 604800) {

										$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) . " days ago";

										if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24)) == "0") {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 day ago";

										}

									} else if ($timeDifferenceBetweeenUserActivityLastSeen > 604800 && $timeDifferenceBetweeenUserActivityLastSeen < 2628000) {

										$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) . " weeks ago";

										if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7)) == "0") {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 week ago";

										}

									} else if ($timeDifferenceBetweeenUserActivityLastSeen > 2628000 && $timeDifferenceBetweeenUserActivityLastSeen < 31536000) {

										$timeDifferenceBetweeenUserActivityLastSeenWholeString = floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) . " months ago";

										if (floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) == "1" || floor($timeDifferenceBetweeenUserActivityLastSeen/(60*60*24*7*4)) == "0") {

											$timeDifferenceBetweeenUserActivityLastSeenWholeString = "1 month ago";

										}

									}

									$userProfilePictureFriend = $row['profileImage'];
									$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

									if ($userProfilePictureFriend == "") {

										$userProfilePictureFriendPath = "/Account/Images/profile_image_placeholder.png";

									}

									?>

										<style type="text/css">
											
											#<?php echo $offlineFriendsDivForEachFriendUserId; ?> {

												position: relative;
												width: 90%;
												height: 60px;
												margin: auto;
												border: 2.5px solid #777EB8;
												border-radius: 20px;
												margin-top: 20px;

											}

											#<?php echo $offlineFriendsUserMainDivId; ?> {

												width: 95px;
												margin-left: 55px;
												margin-top: 12px;
												height: 51px;

											}

											#<?php echo $offlineFriendsUsernameId; ?> {

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

											#<?php echo $offlineFriendsActivityStatusId; ?> {

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

									$myFriendsList .= '<div class="offline_friends_div_for_each" id="offline_friends_div_for_each_' . $friendUsernameId . '">

															<img src="' . $userProfilePictureFriendPath . '" class="offline_friends_profile_pic_display" />

															<div class="offline_friends_user_div" id="offline_friends_user_div_' . $friendUsernameId . '">
																
																<a class="offline_friends_user_link" href="/Account/profile?username=' . $row['username'] . '">
																	
																	<p class="offline_friend_username" id="offline_friend_username_' . $friendUsernameId . '">' . $row['username'] . '</p>

																</a>

																<p class="offline_friend_activity_status" id="offline_friend_activity_status_' . $friendUsernameId . '">' . $timeDifferenceBetweeenUserActivityLastSeenWholeString . '</p>

															</div>

															<span class="offline_green_dot"></span>

														</div>';

								}

							}

						}

					}

				}

			}

		} else {

			$myFriendsList = '<p id="no_friends_offline">You don\'t have any offline friends!</p>';

		}

	} else {

		$myFriendsList = '<p id="no_friends_offline">You don\'t have any offline friends!</p>';

	}

	echo $myFriendsList;

?>