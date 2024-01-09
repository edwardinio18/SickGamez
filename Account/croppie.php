<?php

	include("server.php");

	if (isset($_POST['image'])) {

		if (isset($_POST['webcam'])) {

			$stype = "";

			$query = "SELECT profileImage FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$username = $_COOKIE['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($profileImage);

			$image = $_POST['image'];

			if ($stmt->fetch()) {

				$userProfilePicture = $profileImage;

				if ($userProfilePicture == "") {

					$image = $_POST['image'];

					list($type, $image) = explode(';',$image);
					list(, $image) = explode(',',$image);

					$image = base64_decode($image);
					$image_name = time() . '.png';

					if (file_put_contents('/home/yv4nbnligki0/public_html/Profile_pictures/' . $image_name, $image)) {

						$filename = "/home/yv4nbnligki0/public_html/Profile_pictures/" . $image_name;
						list($width, $height) = getimagesize($filename);
						$canvas = imagecreatetruecolor('200', '200');

						switch ($stype) {

						    case 'png':

						        $background = imagecolorallocate($canvas , 0, 0, 0);
						        imagecolortransparent($canvas, $background);
						        imagealphablending($canvas, false);
						        imagesavealpha($canvas, true);

						        break;

						    default:

						        break;

						}


						$current_image = imagecreatefrompng($filename);
						imagecopy($canvas, $current_image, 0, 0, $width / 2 - 100, $height / 2 - 100, '200', '200');
						imagepng($canvas, $filename, 9);
						chmod($filename, 0644);

					}

					$sql = "UPDATE users SET profileImage = ? WHERE username = ?;";
					$stmt = mysqli_stmt_init($db);

					if (!mysqli_stmt_prepare($stmt, $sql)) {

						echo "Error!";
						exit();

					} else {

						mysqli_stmt_bind_param($stmt, "ss", $image_name, $username);
						mysqli_stmt_execute($stmt);

						mysqli_stmt_close($stmt);
						mysqli_close($db);

					}

					echo "<meta http-equiv='refresh' content='0; url=user_profile_picture_settings?profile_picture_changed=success' />";

				}

				$old_profile_picture_path = "/home/yv4nbnligki0/public_html/Profile_pictures/" . $userProfilePicture;
				unlink($old_profile_picture_path);

				$image = $_POST['image'];

				list($type, $image) = explode(';',$image);
				list(, $image) = explode(',',$image);

				$image = base64_decode($image);
				$image_name = time() . '.png';

				if (file_put_contents('/home/yv4nbnligki0/public_html/Profile_pictures/' . $image_name, $image)) {

					$filename = "/home/yv4nbnligki0/public_html/Profile_pictures/" . $image_name;
					list($width, $height) = getimagesize($filename);
					$canvas = imagecreatetruecolor('200', '200');

					switch ($stype) {

					    case 'png':

					        $background = imagecolorallocate($canvas , 0, 0, 0);
					        imagecolortransparent($canvas, $background);
					        imagealphablending($canvas, false);
					        imagesavealpha($canvas, true);

					        break;

					    default:

					        break;
					        
					}


					$current_image = imagecreatefrompng($filename);
					imagecopy($canvas, $current_image, 0, 0, $width / 2 - 100, $height / 2 - 100, '200', '200');
					imagepng($canvas, $filename, 9);
					chmod($filename, 0644);

				}

				$sql = "UPDATE users SET profileImage = ? WHERE username = ?;";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $sql)) {

					echo "Error!";
					exit();

				} else {

					mysqli_stmt_bind_param($stmt, "ss", $image_name, $username);
					mysqli_stmt_execute($stmt);

					mysqli_stmt_close($stmt);
					mysqli_close($db);

				}

				echo "<meta http-equiv='refresh' content='0; url=user_profile_picture_settings?profile_picture_changed=success' />";

			}

		} else {

			$query = "SELECT profileImage FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$username = $_COOKIE['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($profileImage);

			$image = $_POST['image'];

			if ($stmt->fetch()) {

				$userProfilePicture = $profileImage;

				if ($userProfilePicture == "") {

					$image = $_POST['image'];

					list($type, $image) = explode(';',$image);
					list(, $image) = explode(',',$image);

					$image = base64_decode($image);
					$image_name = time() . '.png';
					file_put_contents('/home/yv4nbnligki0/public_html/Profile_pictures/' . $image_name, $image);

					$sql = "UPDATE users SET profileImage = ? WHERE username = ?;";
					$stmt = mysqli_stmt_init($db);

					if (!mysqli_stmt_prepare($stmt, $sql)) {

						echo "Error!";
						exit();

					} else {

						mysqli_stmt_bind_param($stmt, "ss", $image_name, $username);
						mysqli_stmt_execute($stmt);

						mysqli_stmt_close($stmt);
						mysqli_close($db);

					}

					echo "<meta http-equiv='refresh' content='0; url=user_profile_picture_settings?profile_picture_changed=success' />";

				}

				$old_profile_picture_path = "/home/yv4nbnligki0/public_html/Profile_pictures/" . $userProfilePicture;
				unlink($old_profile_picture_path);

				$image = $_POST['image'];

				list($type, $image) = explode(';',$image);
				list(, $image) = explode(',',$image);

				$image = base64_decode($image);
				$image_name = time() . '.png';
				file_put_contents('/home/yv4nbnligki0/public_html/Profile_pictures/' . $image_name, $image);

				$sql = "UPDATE users SET profileImage = ? WHERE username = ?;";
				$stmt = mysqli_stmt_init($db);

				if (!mysqli_stmt_prepare($stmt, $sql)) {

					echo "Error!";
					exit();

				} else {

					mysqli_stmt_bind_param($stmt, "ss", $image_name, $username);
					mysqli_stmt_execute($stmt);

					mysqli_stmt_close($stmt);
					mysqli_close($db);

				}

				echo "<meta http-equiv='refresh' content='0; url=user_profile_picture_settings?profile_picture_changed=success' />";

			}
			
		}

	}

?>