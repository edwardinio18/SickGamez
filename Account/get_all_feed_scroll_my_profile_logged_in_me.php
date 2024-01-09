<?php

	include("server.php");
	include_once("colors.inc.php");
	include_once("Color.php");

	use Mexitek\PHPColors\Color;

	if (isset($_GET['limit']) && isset($_GET['start'])) {

		$feedList = "";
		$myID = fetchMyID($_COOKIE['username'], $db);
		$userID = $_GET['userID'];

		$limit = $_GET['limit'];
		$start = $_GET['start'];

		$query = "SELECT * FROM feed INNER JOIN users ON feed.feedUserId = users.id WHERE feedUserId = ? ORDER BY dateAndTimeFeedSubmitted DESC LIMIT " . $start . ", " . $limit . ";";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				$feedID = $row['feedId'];
				$feedUserUsername = $row['username'];
				$feedUserID = $row['id'];
				$feedContent = $row['feedContent'];
				$feedImage = $row['feedImage'];
				$feedImagePath = "/Feed_images/" . $feedImage;
				$dateAndTimeFeedSubmitted = $row['dateAndTimeFeedSubmitted'];
				$formattedDateAndTimeFeedSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedSubmitted));
				$decryptedFeedContent = decrypt($feedContent, $key);

				$feedProfilePicture = $row['profileImage'];
				$feedProfilePicturePath = "/Profile_pictures/" . $feedProfilePicture;

				if ($feedProfilePicture == "") {

					$feedProfilePicturePath = "Images/profile_image_placeholder.png";

				}

				$customUsernameStylingTextContent = "";
				$feedUserUsernameIDDB = "username_feed_div_for_each_" . $feedID;

				$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
				$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
				$customUsernameStylingTextId = 2;
				$customUsernameStylingTextActiveStatus = 1;
				$stmt->bind_param("sii", $feedUserID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
				$stmt->execute();
				$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

				if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

					if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

						$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

						?>

							<style type="text/css">
								
								#<?php echo $feedUserUsernameIDDB ?> {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

				$feedPostZoomedInCoverDiv = "zoomed_in_feed_post_image_cover_div_" . $feedID;

				$mostCommonColorObject = new GetMostCommonColors();

				$resultNumber = 5;
				$reduceBrightness = 1;
				$reduceGradients = 1;
				$delta = 30;
				$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Feed_images/" . $feedImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
				$mostCommonColorBackgroundColorHashtag = "#";
				$mostCommonColorBackgroundColor = "";
				$firstColor = "";
				$secondColor = "";
				$colorFactor = 0.5;

				$colorArrayCount = count($mostCommonColor);

				$mostCommonColorMinumumColorsArrayDark = array();
				$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
				$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

				$mostCommonColorMinumumColorsArrayLight = array();
				$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
				$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

				$darkColor = false;
				$lightColor = false;

				if ($colorArrayCount < 5) {

					foreach ($mostCommonColor as $hex => $count) {

						$singleMostCommonColorHex = $mostCommonColorBackgroundColorHashtag . $hex;

						$singleMostCommonColor = new Color($singleMostCommonColorHex);

						$singleMostCommonColorDark = $singleMostCommonColor->isDark();

						$singleMostCommonColorLight = $singleMostCommonColor->isLight();

						if ($singleMostCommonColorDark) {

							$darkColor = true;

							$singleMostCommonColorDarkLightened = $singleMostCommonColor->lighten();
							array_push($mostCommonColorMinumumColorsArrayDark, $singleMostCommonColorDarkLightened);

						} else if ($singleMostCommonColorLight) {

							$lightColor = true;

							$singleMostCommonColorLightDarkened = $singleMostCommonColor->darken();
							array_push($mostCommonColorMinumumColorsArrayLight, $singleMostCommonColorLightDarkened);

						}

					}

					if ($darkColor) {

						$firstElementColorArrayDark = reset($mostCommonColorMinumumColorsArrayDark);
						$lastElementColorArrayDark = end($mostCommonColorMinumumColorsArrayDark);

						?>

							<style type="text/css">
								
								#<?php echo $feedPostZoomedInCoverDiv; ?> {

									background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

							    }

							</style>

						<?php

					} else if ($lightColor) {

						$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
						$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

						?>

							<style type="text/css">
								
								#<?php echo $feedPostZoomedInCoverDiv; ?> {

									background-color: <?php echo colorAverage($firstElementColorArrayLight, $lastElementColorArrayLight, $colorFactor); ?>;

							    }

							</style>

						<?php

					}

				} else {

					foreach ($mostCommonColor as $hex => $count) {

						if ($hex === array_keys($mostCommonColor)[0]) {

							$firstColor = "#" . $hex;

						}

						if ($hex === array_keys($mostCommonColor)[4]) {

							$secondColor = "#" . $hex;

						}

						$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

					}

					?>

						<style type="text/css">
							
							#<?php echo $feedPostZoomedInCoverDiv; ?> {

								background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

						    }

						</style>

					<?php

				}

				if ($feedContent === "") {

					$feedContentIDDB = "bottom_feed_div_time_and_date_added_for_each_" . $feedID;

					$feedList .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
									<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
										
										<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

										<a href="Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername .  '</p></a>

										' . followFeedUserButton($feedUserID, $myID, $feedID, $db) . '

									</div>

									<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

										<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

									</div>

									<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

										<div class="bottom_feed_like_div_for_each">

											<div id="like_div">
										
												<img src="Images/like.png" id="like_button_image_' . $feedID . '"

													' . likeMainFeed($feedID, $db) . '

												data-feedid="' . $feedID . '" data-feeduserid="' . $feedUserID . '" />

												<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

											</div>

										</div>

										<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

										<div class="comments_feed_div_for_each_main_outer_div" id="comments_feed_div_for_each_main_outer_div_' . $feedID . '"></div>

										<div class="comment_view_comments_feed_div_for_each_outer_div" id="comment_view_comments_feed_div_for_each_outer_div_' . $feedID . '">

											<p class="comment_feed_div_for_each" id="comment_feed_div_for_each_' . $feedID . '" data-feeddivforeach="main_outer_feed_div_for_each_' . $feedID . '" data-feeddivforeachuserid="' . $feedUserID . '" data-feeddivforeachid="' . $feedID . '" data-feeddivforeachimage="' . $feedImagePath . '" data-feeddivforeachdateandtimesubmitted="' . $formattedDateAndTimeFeedSubmitted . '" data-feeddivforeachcaption="' . $feedContent . '" data-likescounter="' . getLikesFeed($feedID, $db) . '" data-likefeedpost="' . likeMainFeed($feedID, $db) . '" data-feeddivforeachuserprofileimage="' . $feedProfilePicturePath . '" data-feeddivforeachuserusername="' . $feedUserUsername . '">Comment</p>

											<div class="comment_view_comments_feed_div_for_each_inner_bottom_div" id="comment_view_comments_feed_div_for_each_inner_bottom_div_' . $feedID . '">

												' . checkIfFeedPostCommentsExist($feedID, $db) . '

											</div>

										</div>

									</div>

								</div>';

					?>

						<style type="text/css">
							
							#<?php echo $feedContentIDDB; ?> {

								color: white;
								font-family: GomGom;
								font-size: 1.5vw;
								width: 97.5%;
								word-break: break-word;
								margin: 0;
								margin-left: 1.5%;
								cursor: default;
								text-align: right;
								float: none;
								text-decoration: underline;

							}

						</style>

					<?php

				} else {

					$feedContentCaptionIDDB = "bottom_feed_div_caption_for_each_" . $feedID;

					$feedList .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
									<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
										
										<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

										<a href="Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername .  '</p></a>

										' . followFeedUserButton($feedUserID, $myID, $feedID, $db) . '

									</div>

									<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

										<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

									</div>

									<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

										<div class="bottom_feed_like_div_for_each">

											<div id="like_div">
										
												<img src="Images/like.png" id="like_button_image_' . $feedID . '"

													' . likeMainFeed($feedID, $db) . '

												data-feedid="' . $feedID . '" data-feeduserid="' . $feedUserID . '" />

												<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

											</div>

										</div>

										<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

										<p class="bottom_feed_div_caption_for_each" id="bottom_feed_div_caption_for_each_' . $feedID . '">' . $decryptedFeedContent . '</p>

										<div class="comments_feed_div_for_each_main_outer_div" id="comments_feed_div_for_each_main_outer_div_' . $feedID . '"></div>

										<div class="comment_view_comments_feed_div_for_each_outer_div" id="comment_view_comments_feed_div_for_each_outer_div_' . $feedID . '">

											<p class="comment_feed_div_for_each" id="comment_feed_div_for_each_' . $feedID . '" data-feeddivforeach="main_outer_feed_div_for_each_' . $feedID . '" data-feeddivforeachuserid="' . $feedUserID . '" data-feeddivforeachid="' . $feedID . '" data-feeddivforeachimage="' . $feedImagePath . '" data-feeddivforeachdateandtimesubmitted="' . $formattedDateAndTimeFeedSubmitted . '" data-feeddivforeachcaption="' . $decryptedFeedContent . '" data-likescounter="' . getLikesFeed($feedID, $db) . '" data-likefeedpost="' . likeMainFeed($feedID, $db) . '" data-feeddivforeachuserprofileimage="' . $feedProfilePicturePath . '" data-feeddivforeachuserusername="' . $feedUserUsername . '">Comment</p>

											<div class="comment_view_comments_feed_div_for_each_inner_bottom_div" id="comment_view_comments_feed_div_for_each_inner_bottom_div_' . $feedID . '">

												' . checkIfFeedPostCommentsExist($feedID, $db) . '

											</div>

										</div>

									</div>

								</div>';

					?>

						<style type="text/css">
							
							#<?php echo $feedContentCaptionIDDB; ?> {

								color: white;
								font-family: GomGom;
								font-size: 1.5vw;
								width: 97.5%;
								word-break: break-word;
								margin: 0;
								margin-left: 0.75%;
								cursor: default;

							}

						</style>

					<?php

				}

			}

		}

	}

	echo $feedList;

?>