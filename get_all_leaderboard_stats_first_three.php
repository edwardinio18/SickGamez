<?php

	include("Account/server.php");

	$newMinutes = "";
	$newSeconds = "";
	$newMilliseconds = "";
	$leaderboardFirstList = "";
	$leaderboardSecondList = "";
	$leaderboardThirdList = "";
	$leaderboardFirstPlace = "";
	$leaderboardSecondPlace = "";
	$leaderboardThirdPlace = "";
	$leaderboardFirstThreePlacesList = "";

	$query = "SELECT * FROM xubeGameData ORDER BY totalTimeAndDeathCounterInMilliseconds ASC LIMIT 1 OFFSET 0;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$leaderboardFirstPlace = $row['xubeGameDataUsername'];

		}

	}

	$query = "SELECT * FROM xubeGameData ORDER BY totalTimeAndDeathCounterInMilliseconds ASC LIMIT 1 OFFSET 1;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$leaderboardSecondPlace = $row['xubeGameDataUsername'];

		}

	}

	$query = "SELECT * FROM xubeGameData ORDER BY totalTimeAndDeathCounterInMilliseconds ASC LIMIT 1 OFFSET 2;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$leaderboardThirdPlace = $row['xubeGameDataUsername'];

		}

	}

	$query = "SELECT * FROM xubeGameData INNER JOIN users ON xubeGameData.xubeGameDataUsername = users.username WHERE xubeGameDataUsername = ? ORDER BY totalTimeAndDeathCounterInMilliseconds ASC;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $leaderboardFirstPlace);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['minutes'] < 10) {

				$newMinutes = "0" . $row['minutes'];

			} else {

				$newMinutes = $row['minutes'];

			}

			if ($row['seconds'] < 10) {

				$newSeconds = "0" . $row['seconds'];

			} else {

				$newSeconds = $row['seconds'];

			}

			if ($row['milliseconds'] < 10) {

				$newMilliseconds = "0" . $row['milliseconds'];

			} else {

				$newMilliseconds = $row['milliseconds'];

			}

			$userProfilePictureLeaderboard = $row['profileImage'];
			$userProfilePictureLeaderboardPath = "/Profile_pictures/" . $userProfilePictureLeaderboard;

			if ($userProfilePictureLeaderboard == "") {

				$userProfilePictureLeaderboardPath = "Images/profile_image_placeholder.png";

			}

			$leaderboardUsername = $row['username'];
			$dateAndTimeDataSubmitted = $row['dateAndTimeDataSubmitted'];
			$formattedDateAndTimeDataSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeDataSubmitted));
			$deathCounter = $row['deathCounter'];

			$myID = fetchMyID($leaderboardUsername, $db);
			$myIDDB = "leaderboard_username_right_div_paragraph_" . $myID;

			$totalTime = $newMinutes . ":" . $newSeconds . "." . $newMilliseconds;

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$myID = fetchMyID($leaderboardUsername, $db);
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
							
							#<?php echo $myIDDB; ?> {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

			$leaderboardFirstList .= '<div id="leaderboard_first_place_main_div">

												<div id="leaderboard_first_place_left_div">
													
													<p id="leaderboard_first_place_left_div_paragraph">#1</p>

												</div>

												<div id="leaderboard_first_place_right_div">
													
													<div class="leaderboard_profile_pic_and_username_div">
														
														<img src="' . $userProfilePictureLeaderboardPath . '" class="profile_picture_display_leaderboard_right_div" />

														<div class="leaderboard_username_right_div">
															
															<a href="Account/profile?username=' . $leaderboardUsername . '"><p class="leaderboard_username_right_div_paragraph" id="leaderboard_username_right_div_paragraph_' . $myID . '">' . $leaderboardUsername . '</p></a>

														</div>

														<div class="leaderboard_date_and_time_right_div">
															
															<p class="leaderboard_date_and_time_right_div_paragraph">' . $formattedDateAndTimeDataSubmitted . '</p>

														</div>

													</div>

													<hr class="leaderboard_username_and_timer_line_break" />

													<div class="leaderboard_timer_div">
														
														<p class="leaderboard_timer_div_paragraph">Duration</p>

														<p class="leaderboard_timer_div_paragraph_content">' . $totalTime . '</p>

													</div>

													<hr class="leaderboard_timer_and_deaths_line_break" />

													<div class="leaderboard_deaths_div">
														
														<p class="leaderboard_deaths_div_paragraph">Deaths</p>

														<p class="leaderboard_deaths_div_paragraph_content">' . $deathCounter . '</p>

													</div>

												</div>

											</div>';

		}

	}

	$query = "SELECT * FROM xubeGameData INNER JOIN users ON xubeGameData.xubeGameDataUsername = users.username WHERE xubeGameDataUsername = ? ORDER BY totalTimeAndDeathCounterInMilliseconds ASC;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $leaderboardSecondPlace);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['minutes'] < 10) {

				$newMinutes = "0" . $row['minutes'];

			} else {

				$newMinutes = $row['minutes'];

			}

			if ($row['seconds'] < 10) {

				$newSeconds = "0" . $row['seconds'];

			} else {

				$newSeconds = $row['seconds'];

			}

			if ($row['milliseconds'] < 10) {

				$newMilliseconds = "0" . $row['milliseconds'];

			} else {

				$newMilliseconds = $row['milliseconds'];

			}

			$userProfilePictureLeaderboard = $row['profileImage'];
			$userProfilePictureLeaderboardPath = "/Profile_pictures/" . $userProfilePictureLeaderboard;

			if ($userProfilePictureLeaderboard == "") {

				$userProfilePictureLeaderboardPath = "Images/profile_image_placeholder.png";

			}

			$leaderboardUsername = $row['username'];
			$dateAndTimeDataSubmitted = $row['dateAndTimeDataSubmitted'];
			$formattedDateAndTimeDataSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeDataSubmitted));
			$deathCounter = $row['deathCounter'];

			$myID = fetchMyID($leaderboardUsername, $db);
			$myIDDB = "leaderboard_username_right_div_paragraph_" . $myID;

			$totalTime = $newMinutes . ":" . $newSeconds . "." . $newMilliseconds;

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$myID = fetchMyID($leaderboardUsername, $db);
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
							
							#<?php echo $myIDDB; ?> {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

			$leaderboardSecondList .= '<div id="leaderboard_second_place_main_div">
												
											<div id="leaderboard_second_place_left_div">
												
												<p id="leaderboard_second_place_left_div_paragraph">#2</p>

											</div>

											<div id="leaderboard_second_place_right_div">
												
												<div class="leaderboard_profile_pic_and_username_div">
													
													<img src="' . $userProfilePictureLeaderboardPath . '" class="profile_picture_display_leaderboard_right_div" />

													<div class="leaderboard_username_right_div">
														
														<a href="Account/profile?username=' . $leaderboardUsername . '"><p class="leaderboard_username_right_div_paragraph" id="leaderboard_username_right_div_paragraph_' . $myID . '">' . $leaderboardUsername . '</p></a>

													</div>

													<div class="leaderboard_date_and_time_right_div">
														
														<p class="leaderboard_date_and_time_right_div_paragraph">' . $formattedDateAndTimeDataSubmitted . '</p>

													</div>

												</div>

												<hr class="leaderboard_username_and_timer_line_break" />

												<div class="leaderboard_timer_div">
													
													<p class="leaderboard_timer_div_paragraph">Duration</p>

													<p class="leaderboard_timer_div_paragraph_content">' . $totalTime . '</p>

												</div>

												<hr class="leaderboard_timer_and_deaths_line_break" />

												<div class="leaderboard_deaths_div">
													
													<p class="leaderboard_deaths_div_paragraph">Deaths</p>

													<p class="leaderboard_deaths_div_paragraph_content">' . $deathCounter . '</p>

												</div>

											</div>

										</div>';

		}

	}

	$query = "SELECT * FROM xubeGameData INNER JOIN users ON xubeGameData.xubeGameDataUsername = users.username WHERE xubeGameDataUsername = ? ORDER BY totalTimeAndDeathCounterInMilliseconds ASC;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $leaderboardThirdPlace);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['minutes'] < 10) {

				$newMinutes = "0" . $row['minutes'];

			} else {

				$newMinutes = $row['minutes'];

			}

			if ($row['seconds'] < 10) {

				$newSeconds = "0" . $row['seconds'];

			} else {

				$newSeconds = $row['seconds'];

			}

			if ($row['milliseconds'] < 10) {

				$newMilliseconds = "0" . $row['milliseconds'];

			} else {

				$newMilliseconds = $row['milliseconds'];

			}

			$userProfilePictureLeaderboard = $row['profileImage'];
			$userProfilePictureLeaderboardPath = "/Profile_pictures/" . $userProfilePictureLeaderboard;

			if ($userProfilePictureLeaderboard == "") {

				$userProfilePictureLeaderboardPath = "Images/profile_image_placeholder.png";

			}

			$leaderboardUsername = $row['username'];
			$dateAndTimeDataSubmitted = $row['dateAndTimeDataSubmitted'];
			$formattedDateAndTimeDataSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeDataSubmitted));
			$deathCounter = $row['deathCounter'];

			$myID = fetchMyID($leaderboardUsername, $db);
			$myIDDB = "leaderboard_username_right_div_paragraph_" . $myID;

			$totalTime = $newMinutes . ":" . $newSeconds . "." . $newMilliseconds;

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$myID = fetchMyID($leaderboardUsername, $db);
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
							
							#<?php echo $myIDDB; ?> {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

			$leaderboardThirdList .= '<div id="leaderboard_third_place_main_div">
												
												<div id="leaderboard_third_place_left_div">
													
													<p id="leaderboard_third_place_left_div_paragraph">#3</p>

												</div>

												<div id="leaderboard_third_place_right_div">
													
													<div class="leaderboard_profile_pic_and_username_div">
														
														<img src="' . $userProfilePictureLeaderboardPath . '" class="profile_picture_display_leaderboard_right_div" />

														<div class="leaderboard_username_right_div">
															
															<a href="Account/profile?username=' . $leaderboardUsername . '"><p class="leaderboard_username_right_div_paragraph" id="leaderboard_username_right_div_paragraph_' . $myID . '">' . $leaderboardUsername . '</p></a>

														</div>

														<div class="leaderboard_date_and_time_right_div">
															
															<p class="leaderboard_date_and_time_right_div_paragraph">' . $formattedDateAndTimeDataSubmitted . '</p>

														</div>

													</div>

													<hr class="leaderboard_username_and_timer_line_break" />

													<div class="leaderboard_timer_div">
														
														<p class="leaderboard_timer_div_paragraph">Duration</p>

														<p class="leaderboard_timer_div_paragraph_content">' . $totalTime . '</p>

													</div>

													<hr class="leaderboard_timer_and_deaths_line_break" />

													<div class="leaderboard_deaths_div">
														
														<p class="leaderboard_deaths_div_paragraph">Deaths</p>

														<p class="leaderboard_deaths_div_paragraph_content">' . $deathCounter . '</p>

													</div>

												</div>

											</div>';

		}

	}

	$leaderboardFirstThreePlacesList = $leaderboardFirstList . $leaderboardSecondList . $leaderboardThirdList;

	echo $leaderboardFirstThreePlacesList;

?>