<?php

	include("Account/server.php");

	$newMinutes = "";
	$newSeconds = "";
	$newMilliseconds = "";
	$leaderboardAllAfterThirdList = "";
	$i = 3;

	$query = "SELECT * FROM xubeGameData INNER JOIN users ON xubeGameData.xubeGameDataUsername = users.username ORDER BY totalTimeAndDeathCounterInMilliseconds ASC LIMIT 10 OFFSET 3;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();

	$numberOfRowsAfterThird = mysqli_num_rows($result);

	foreach ($result as $row) {

		$i++;

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

		$totalTime = $newMinutes . ":" . $newSeconds . "." . $newMilliseconds;

		$myID = fetchMyID($leaderboardUsername, $db);
		$myIDDB = "leaderboard_username_right_div_paragraph_" . $myID;

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

		$leaderboardAllAfterThirdList .= '<div class="leaderboard_all_after_third_place_main_div">
				
													<div class="leaderboard_all_after_third_place_left_div">
														
														<p class="leaderboard_all_after_third_place_left_div_paragraph">#' . $i . '</p>

													</div>

													<div class="leaderboard_all_after_third_place_right_div">
														
														<div class="leaderboard_profile_pic_and_username_div">
															
															<img src="' . $userProfilePictureLeaderboardPath . '" class="profile_picture_display_leaderboard_right_div" />

															<div class="leaderboard_username_right_div">
																
																<a href="Account/profile?username=' . $leaderboardUsername . '"><p class="leaderboard_username_right_div_paragraph" id="' . $myIDDB . '">' . $leaderboardUsername . '</p></a>

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

	echo $leaderboardAllAfterThirdList;

?>