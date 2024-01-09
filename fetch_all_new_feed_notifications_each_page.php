<?php

	include("Account/server.php");

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$myID = "";
	$newNotificationsListDivs = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_COOKIE['username']) {

				$myID = $row['id'];

			}

		}

		$query = "SELECT * FROM feedNotifications INNER JOIN users ON feedNotifications.feedNotificationsFromUser = users.id WHERE feedNotificationsFromUser != ? AND feedNotificationsToUser = ? AND clickedStatus = ? AND status = ? ORDER BY feedNotificationsSubmittedDateAndTimeInserted DESC;";
		$stmt = $db->prepare($query);
		$status = 0;
		$clickedStatus = 0;
		$stmt->bind_param("iiii", $myID, $myID, $status, $clickedStatus);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				$feedNotificationsId = $row['feedNotificationsId'];
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

					$feedUserIDDB = "username_feed_notifications_each_page_div_for_each_" . $feedUserID;

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

						$feedNotificationsId = $row['feedNotificationsId'];
						$feedCommentID = $row['feedNotificationsLikeFeedPostId'];
						$feedCommentUserUsername = $row['username'];
						$feedCommentUserID = $row['id'];
						$dateAndTimeFeedCommentSubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
						$formattedDateAndTimeFeedCommentSubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedCommentSubmitted));

						$feedCommentProfilePicture = $row['profileImage'];
						$feedCommentProfilePicturePath = "/Profile_pictures/" . $feedCommentProfilePicture;

						if ($feedCommentProfilePicture == "") {

							$feedCommentProfilePicturePath = "Images/profile_image_placeholder.png";

						}

						$newNotificationsListDivs .= '<div class="feed_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">

											  			<a href=\'javascript:closeNewFeedNotificationsDiv(' . $feedNotificationsId . ', ' . $feedCommentID . ', "comment")\' class="close_feed_notifications_each_page_div_for_each_link" id="close_feed_notifications_each_page_div_for_each_link_' . $feedNotificationsId . '"">

											  				<span class="close_feed_notifications_each_page_div_for_each" id="close_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">&times;</span>

											  			</a>

														<div onclick=\'window.location.href="/Account/notifications"\' class="feed_notifications_each_page_inner_div">

												  			<img src="' . $feedCommentProfilePicturePath . '" class="profile_picture_display_feed_notifications_each_page_div_for_each" />

												  			<p class="username_feed_notifications_each_page_div_for_each" id="username_feed_notifications_each_page_div_for_each_' . $feedCommentUserID . '">' . $feedCommentUserUsername . '</p>

												  			<p class="feed_content_feed_notifications_each_page_div_for_each" id="feed_content_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">Commented on your feed post!</p>

												  		</div>

												  	</div>';

					} else if ($row['feedNotificationsAction'] === "reply") {

						$feedNotificationsId = $row['feedNotificationsId'];
						$feedCommentReplyID = $row['feedNotificationsLikeFeedPostId'];
						$feedCommentReplyUserUsername = $row['username'];
						$feedCommentReplyUserID = $row['id'];
						$dateAndTimeFeedCommentReplySubmitted = $row['feedNotificationsSubmittedDateAndTimeInserted'];
						$formattedDateAndTimeFeedCommentReplySubmitted = date("H:i, d/m/Y", strtotime($dateAndTimeFeedCommentReplySubmitted));

						$feedCommentReplyProfilePicture = $row['profileImage'];
						$feedCommentReplyProfilePicturePath = "/Profile_pictures/" . $feedCommentReplyProfilePicture;

						if ($feedCommentReplyProfilePicture == "") {

							$feedCommentReplyProfilePicturePath = "Images/profile_image_placeholder.png";

						}

						$newNotificationsListDivs .= '<div class="feed_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">

											  			<a href=\'javascript:closeNewFeedNotificationsDiv(' . $feedNotificationsId . ', ' . $feedCommentReplyID . ', "reply")\' class="close_feed_notifications_each_page_div_for_each_link" id="close_feed_notifications_each_page_div_for_each_link_' . $feedNotificationsId . '"">

											  				<span class="close_feed_notifications_each_page_div_for_each" id="close_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">&times;</span>

											  			</a>

														<div onclick=\'window.location.href="/Account/notifications"\' class="feed_notifications_each_page_inner_div">

												  			<img src="' . $feedCommentReplyProfilePicturePath . '" class="profile_picture_display_feed_notifications_each_page_div_for_each" />

												  			<p class="username_feed_notifications_each_page_div_for_each" id="username_feed_notifications_each_page_div_for_each_' . $feedCommentReplyUserID . '">' . $feedCommentReplyUserUsername . '</p>

												  			<p class="feed_content_feed_notifications_each_page_div_for_each" id="feed_content_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">Replied to a comment on your feed post!</p>

												  		</div>

												  	</div>';

					} else if ($row['feedNotificationsAction'] === "like") {

						$feedNotificationsId = $row['feedNotificationsId'];
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

						$newNotificationsListDivs .= '<div class="feed_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">

											  			<a href=\'javascript:closeNewFeedNotificationsDiv(' . $feedNotificationsId . ', ' . $feedLikesDislikesID . ', "like")\' class="close_feed_notifications_each_page_div_for_each_link" id="close_feed_notifications_each_page_div_for_each_link_' . $feedNotificationsId . '"">

											  				<span class="close_feed_notifications_each_page_div_for_each" id="close_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">&times;</span>

											  			</a>

														<div onclick=\'window.location.href="/Account/notifications"\' class="feed_notifications_each_page_inner_div">

												  			<img src="' . $feedLikesDislikesProfilePicturePath . '" class="profile_picture_display_feed_notifications_each_page_div_for_each" />

												  			<p class="username_feed_notifications_each_page_div_for_each" id="username_feed_notifications_each_page_div_for_each_' . $feedLikesDislikesUserID . '">' . $feedLikesDislikesUserUsername . '</p>

												  			<p class="feed_content_feed_notifications_each_page_div_for_each" id="feed_content_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">Liked your feed post!</p>

												  		</div>

												  	</div>';

					} else if ($row['feedNotificationsAction'] === "follow") {

						$feedNotificationsId = $row['feedNotificationsId'];
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

						$newNotificationsListDivs .= '<div class="feed_notifications_each_page_div_for_each notifications_each_page_div_for_each" id="feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">

											  			<a href=\'javascript:closeNewFeedNotificationsDiv(' . $feedNotificationsId . ', ' . $feedFollowerID . ', "follow")\' class="close_feed_notifications_each_page_div_for_each_link" id="close_feed_notifications_each_page_div_for_each_link_' . $feedNotificationsId . '"">

											  				<span class="close_feed_notifications_each_page_div_for_each" id="close_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">&times;</span>

											  			</a>

														<div onclick=\'window.location.href="/Account/notifications"\' class="feed_notifications_each_page_inner_div">

												  			<img src="' . $feedFollowerProfilePicturePath . '" class="profile_picture_display_feed_notifications_each_page_div_for_each" />

												  			<p class="username_feed_notifications_each_page_div_for_each" id="username_feed_notifications_each_page_div_for_each_' . $feedFollowerUserID . '">' . $feedFollowerUserUsername . '</p>

												  			<p class="feed_content_feed_notifications_each_page_div_for_each" id="feed_content_feed_notifications_each_page_div_for_each_' . $feedNotificationsId . '">Started following you!</p>

												  		</div>

												  	</div>';

					}

				}

			}

		}

	}

	echo $newNotificationsListDivs;

?>