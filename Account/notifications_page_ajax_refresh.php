<?php

	include("server.php");

	$toUserId = "";

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$myNotificationsList = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

	}

	$query = "SELECT * FROM feedNotifications INNER JOIN users ON feedNotifications.feedNotificationsFromUser = users.id WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? ORDER BY feedNotificationsSubmittedDateAndTimeInserted DESC;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("ii", $myID, $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$feedID = $row['feedNotificationsLikeFeedPostId'];
			$feedUserUsername = $row['username'];
			$feedUserID = $row['id'];
			$dateAndTimeFeedSubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
			$formattedDateAndTimeFeedSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedSubmitted));

			$feedProfilePicture = $row['profileImage'];
			$feedProfilePicturePath = "/Profile_pictures/" . $feedProfilePicture;

			if ($feedProfilePicture == "") {

				$feedProfilePicturePath = "Images/profile_image_placeholder.png";

			}

			$feedUserIDDB = "notifications_div_main_div_for_each_username_" . $feedUserID;

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$customUsernameStylingTextId = 2;
			$customUsernameStylingTextActiveStatus = 1;
			$stmt->bind_param("sii", $feedUserID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
			$stmt->execute();
			$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

			if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

				if ($row1 = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

					$customUsernameStylingTextContent = $row1['customUsernameTextStyling'];

					?>

						<style type="text/css">
							
							#<?php echo $feedUserIDDB; ?> {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

			if ($row['feedNotificationsAction'] === "comment") {

				$feedCommentID = $row['feedNotificationsLikeFeedPostId'];
				$feedCommentUserUsername = $row['username'];
				$feedCommentUserID = $row['id'];
				$dateAndTimeFeedCommentSubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
				$formattedDateAndTimeFeedCommentSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedCommentSubmitted));
				$feedCommentCommentReplyContent = $row['feedCommentCommentReplyContent'];
				$decryptedFeedCommentCommentReplyContent = decrypt($feedCommentCommentReplyContent, $key);

				$feedCommentProfilePicture = $row['profileImage'];
				$feedCommentProfilePicturePath = "/Profile_pictures/" . $feedCommentProfilePicture;

				if ($feedCommentProfilePicture == "") {

					$feedCommentProfilePicturePath = "Images/profile_image_placeholder.png";

				}

				$myNotificationsList .= '<div class="notifications_div_main_div_for_each_div_comment" id="notifications_div_main_div_for_each_div_comment_' . $feedCommentID . '">
								
											<img src="' . $feedCommentProfilePicturePath . '" class="profile_pic_display_notifications_div_main_div_for_each_comment" id="profile_pic_display_notifications_div_main_div_for_each_comment_' . $feedCommentID . '" />

											<a href="/Account/profile?username=' . $feedCommentUserUsername . '"><p class="notifications_div_main_div_for_each_username_comment" id="notifications_div_main_div_for_each_username_' . $feedCommentUserID . '">' . $feedCommentUserUsername . '</p></a>

											<div class="notifications_div_main_div_for_each_content_div_comment" id="notifications_div_main_div_for_each_content_div_comment_' . $feedCommentID . '">
												
												<p class="notifications_div_main_div_for_each_content_comment" id="notifications_div_main_div_for_each_content_comment_' . $feedCommentID . '">Commented on your feed post!</p>

												<p class="notifications_div_main_div_for_each_content_comment_content" id="notifications_div_main_div_for_each_content_comment_content_' . $feedCommentID . '">"' . $decryptedFeedCommentCommentReplyContent . '"</p>

												<p class="notifications_div_main_div_for_each_content_date_and_time_comment">' . $formattedDateAndTimeFeedCommentSubmitted . '</p>

											</div>

											<div class="notifications_div_main_div_for_each_right_side_image_div_comment">
												
												<img src="Images/comment_reply.png" class="notifications_div_main_div_for_each_right_side_image_div_image_comment" />

											</div>

										</div>';

			} else if ($row['feedNotificationsAction'] === "reply") {

				$feedCommentReplyID = $row['feedNotificationsLikeFeedPostId'];
				$feedCommentReplyUserUsername = $row['username'];
				$feedCommentReplyUserID = $row['id'];
				$dateAndTimeFeedCommentReplySubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
				$formattedDateAndTimeFeedCommentReplySubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedCommentReplySubmitted));
				$feedCommentCommentReplyContent = $row['feedCommentCommentReplyContent'];
				$decryptedFeedCommentCommentReplyContent = decrypt($feedCommentCommentReplyContent, $key);

				$feedCommentReplyProfilePicture = $row['profileImage'];
				$feedCommentReplyProfilePicturePath = "/Profile_pictures/" . $feedCommentReplyProfilePicture;

				if ($feedCommentReplyProfilePicture == "") {

					$feedCommentReplyProfilePicturePath = "Images/profile_image_placeholder.png";

				}

				$myNotificationsList .= '<div class="notifications_div_main_div_for_each_div_comment_reply" id="notifications_div_main_div_for_each_div_comment_reply_' . $feedCommentReplyID . '">
								
											<img src="' . $feedCommentReplyProfilePicturePath . '" class="profile_pic_display_notifications_div_main_div_for_each_comment_reply" id="profile_pic_display_notifications_div_main_div_for_each_comment_reply_' . $feedCommentReplyID . '" />

											<a href="/Account/profile?username=' . $feedCommentReplyUserUsername . '"><p class="notifications_div_main_div_for_each_username_comment_reply" id="notifications_div_main_div_for_each_username_' . $feedCommentReplyUserID . '">' . $feedCommentReplyUserUsername . '</p></a>

											<div class="notifications_div_main_div_for_each_content_div_comment_reply" id="notifications_div_main_div_for_each_content_div_comment_reply_' . $feedCommentReplyID . '">
												
												<p class="notifications_div_main_div_for_each_content_comment_reply" id="notifications_div_main_div_for_each_content_comment_reply_' . $feedCommentReplyID . '">Replied to a comment on your feed post!</p>

												<p class="notifications_div_main_div_for_each_content_comment_content" id="notifications_div_main_div_for_each_content_comment_content_' . $feedCommentReplyID . '">"' . $decryptedFeedCommentCommentReplyContent . '"</p>

												<p class="notifications_div_main_div_for_each_content_date_and_time_comment_reply">' . $formattedDateAndTimeFeedCommentReplySubmitted . '</p>

											</div>

											<div class="notifications_div_main_div_for_each_right_side_image_div_comment_reply">
												
												<img src="Images/comment_reply.png" class="notifications_div_main_div_for_each_right_side_image_div_image_comment_reply" />

											</div>

										</div>';

			} else if ($row['feedNotificationsAction'] === "like") {

				$feedLikesDislikesID = $row['feedNotificationsLikeFeedPostId'];
				$feedLikesDislikesUserUsername = $row['username'];
				$feedLikesDislikesUserID = $row['id'];
				$dateAndTimeFeedLikesDislikesSubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
				$formattedDateAndTimeFeedLikesDislikesSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedLikesDislikesSubmitted));

				$feedLikesDislikesProfilePicture = $row['profileImage'];
				$feedLikesDislikesProfilePicturePath = "/Profile_pictures/" . $feedLikesDislikesProfilePicture;

				if ($feedLikesDislikesProfilePicture == "") {

					$feedLikesDislikesProfilePicturePath = "Images/profile_image_placeholder.png";

				}

				$myNotificationsList .= '<div class="notifications_div_main_div_for_each_div_like" id="notifications_div_main_div_for_each_div_like_' . $feedLikesDislikesID . '">
								
											<img src="' . $feedLikesDislikesProfilePicturePath . '" class="profile_pic_display_notifications_div_main_div_for_each_like" id="profile_pic_display_notifications_div_main_div_for_each_like_' . $feedLikesDislikesID . '" />

											<a href="/Account/profile?username=' . $feedLikesDislikesUserUsername . '"><p class="notifications_div_main_div_for_each_username_like" id="notifications_div_main_div_for_each_username_' . $feedLikesDislikesUserID . '">' . $feedLikesDislikesUserUsername . '</p></a>

											<div class="notifications_div_main_div_for_each_content_div_like" id="notifications_div_main_div_for_each_content_div_like_' . $feedLikesDislikesID . '">
												
												<p class="notifications_div_main_div_for_each_content_like" id="notifications_div_main_div_for_each_content_like_' . $feedLikesDislikesID . '">Liked your feed post!</p>

												<p class="notifications_div_main_div_for_each_content_date_and_time_like">' . $formattedDateAndTimeFeedLikesDislikesSubmitted . '</p>

											</div>

											<div class="notifications_div_main_div_for_each_right_side_image_div_like">
												
												<img src="Images/like.png" class="notifications_div_main_div_for_each_right_side_image_div_image_like" />

											</div>

										</div>';

			} else if ($row['feedNotificationsAction'] === "follow") {

				$feedFollowerID = $row['feedNotificationsLikeFeedPostId'];
				$feedFollowerUserUsername = $row['username'];
				$feedFollowerUserID = $row['id'];
				$dateAndTimeFeedFollowerSubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
				$formattedDateAndTimeFeedFollowerSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedFollowerSubmitted));

				$feedFollowerProfilePicture = $row['profileImage'];
				$feedFollowerProfilePicturePath = "/Profile_pictures/" . $feedFollowerProfilePicture;

				if ($feedFollowerProfilePicture == "") {

					$feedFollowerProfilePicturePath = "Images/profile_image_placeholder.png";

				}

				$myNotificationsList .= '<div class="notifications_div_main_div_for_each_div_follower" id="notifications_div_main_div_for_each_div_follower_' . $feedFollowerID . '">
								
											<img src="' . $feedFollowerProfilePicturePath . '" class="profile_pic_display_notifications_div_main_div_for_each_follower" id="profile_pic_display_notifications_div_main_div_for_each_follower_' . $feedFollowerID . '" />

											<a href="/Account/profile?username=' . $feedFollowerUserUsername . '"><p class="notifications_div_main_div_for_each_username_follower" id="notifications_div_main_div_for_each_username_' . $feedFollowerUserID . '">' . $feedFollowerUserUsername . '</p></a>

											<div class="notifications_div_main_div_for_each_content_div_follower" id="notifications_div_main_div_for_each_content_div_follower_' . $feedFollowerID . '">
												
												<p class="notifications_div_main_div_for_each_content_follower" id="notifications_div_main_div_for_each_content_follower_' . $feedFollowerID . '">Started following you!</p>

												<p class="notifications_div_main_div_for_each_content_date_and_time_follower">' . $formattedDateAndTimeFeedFollowerSubmitted . '</p>

											</div>

											<div class="notifications_div_main_div_for_each_right_side_image_div_follower">
												
												<img src="Images/follower.png" class="notifications_div_main_div_for_each_right_side_image_div_image_follower" />

											</div>

										</div>';

			}

		}

	} else {

		$myNotificationsList = '<p id="no_feed_notifications">You don\'t have any feed notifications!</p>';

	}

	echo $myNotificationsList;

?>