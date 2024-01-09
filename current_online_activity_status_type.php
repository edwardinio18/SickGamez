<?php

	include("Account/server.php");

	$currentOnlineActivityStatusTypeContent = "";

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $_COOKIE['username']);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		if ($row = $result->fetch_assoc()) {

			if ($row['customActivityStatusTypeActive'] != 1) {

				if ($row['onlineActivityStatusType'] == 1) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: limegreen;

							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">Online</p>';

				}

				if ($row['onlineActivityStatusType'] == 2) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: yellow;

							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">Away</p>';

				}

				if ($row['onlineActivityStatusType'] == 3) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: #777EB8;

							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">Do not disturb</p>';

				}

				if ($row['onlineActivityStatusType'] == 4) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: gray;

							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">Invisible</p>';

				}

			} else {

				if ($row['onlineActivityStatusType'] == 1) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: limegreen;

							}

							#my_online_activity_status_label {

								max-width: 80%;
								white-space: nowrap;
								text-overflow: ellipsis;
								overflow: hidden;
								padding-left: 1px;

							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">' . $row['onlineActivityStatus'] . '</p>';

				}

				if ($row['onlineActivityStatusType'] == 2) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: yellow;

							}

							#my_online_activity_status_label {

								max-width: 80%;
								white-space: nowrap;
								text-overflow: ellipsis;
								overflow: hidden;
								padding-left: 1px;
								
							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">' . $row['onlineActivityStatus'] . '</p>';

				}

				if ($row['onlineActivityStatusType'] == 3) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: #777EB8;

							}

							#my_online_activity_status_label {

								max-width: 80%;
								white-space: nowrap;
								text-overflow: ellipsis;
								overflow: hidden;
								padding-left: 1px;
								
							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">' . $row['onlineActivityStatus'] . '</p>';

				}

				if ($row['onlineActivityStatusType'] == 4) {

					?>

						<style type="text/css">
							
							#my_online_activity_status {

								background-color: gray;

							}

							#my_online_activity_status_label {

								max-width: 80%;
								white-space: nowrap;
								text-overflow: ellipsis;
								overflow: hidden;
								padding-left: 1px;
								
							}

						</style>

					<?php

					$currentOnlineActivityStatusTypeContent .= '<span id="my_online_activity_status"></span>

		  														<p id="my_online_activity_status_label">' . $row['onlineActivityStatus'] . '</p>';

				}

			}

		}

	}

	echo $currentOnlineActivityStatusTypeContent;

?>