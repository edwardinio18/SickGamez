<?php

	include("server.php");

	$toUserId = $_GET['toUserId'];

	$toUserUsername = getUserUsername($toUserId, $db);

	$query = "SELECT * FROM users WHERE id = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $toUserId);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			$username = $row['username'];
			$usernameID = $row['id'];

			$userProfilePictureFriend = $row['profileImage'];
			$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

			if ($userProfilePictureFriend == "") {

				$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

			}

			$toUserIdDB = "user_username_chat_top_" . $toUserId;

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$customUsernameStylingTextId = 2;
			$customUsernameStylingTextActiveStatus = 1;
			$stmt->bind_param("sii", $toUserId, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
			$stmt->execute();
			$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

			if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

				if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

					$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

					?>

						<style type="text/css">
							
							#<?php echo $toUserIdDB; ?> {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

		}

	}

	echo '<div class="user_username_and_profile_image_chat_top_div">
	
				<img src="' . $userProfilePictureFriendPath . '" class="user_profile_image_chat_top_div" />

				<p class="user_username_chat_top" id="' . $toUserIdDB . '">' . $toUserUsername . '</p>

			</div>'

?>






