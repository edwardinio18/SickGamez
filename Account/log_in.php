<?php

	include("server.php");

	$passwordChangedSuccessfully = "";
	$redirectLocation = "";

	if ($login == 1) {

		header("location: profile?username=" . $_COOKIE["username"]);

	} else {

	if (isset($_POST['log_in'])) {

		if (isset($_POST['redirect_location'])) {

			$redirectLocation = $_POST['redirect_location'];

		}

		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {

			$usernameError = "Username is required!";
			$errors = 1;

		}

		if (empty($password)) {

			$passwordError = "Password is required!";
			$errors = 1;

		}

		if ($errors == 0) {

			date_default_timezone_set("Europe/Bucharest");

			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "SELECT * FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$username = $_POST['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows == 1) {

				while ($row = $result->fetch_assoc()) {

					if (password_verify($password, $row['password'])) {

						$_COOKIE['username'] = $username;

						$updateLastActivityQuery = "UPDATE users SET lastActivity = ? WHERE username = ?;";
						$stmt = mysqli_stmt_init($db);

						if (!mysqli_stmt_prepare($stmt, $updateLastActivityQuery)) {

							echo "Error!";
							exit();

						} else {

							$lastActivity = date("Y-m-d H:i:s", strtotime(date("h:i:sa")));
							$_COOKIE['username'] = $username;

							mysqli_stmt_bind_param($stmt, "ss", $lastActivity, $username);
							mysqli_stmt_execute($stmt);

							mysqli_stmt_close($stmt);
							mysqli_close($db);

						}

						if (isset($_POST['rememberMe'])) {

							setcookie("username", $username, time() + (60 * 60 * 24 * 7), '/');
							setcookie("login", 1, time() + (60 * 60 * 24 * 7), '/');

						} else {

							setcookie("username", $username, time() + (60 * 60 * 24), '/');
							setcookie("login", 1, time() + (60 * 60 * 24), '/');
							
						}

						if ($redirectLocation) {

							header("location: " . $redirectLocation);

							exit();

						} else {

							header("location: profile?username=$username");
							
						}

					} else {

						$wrongUserPassComb = "Username and password don't match to an account!";
						$errors = 1;

					}

				}

			} else {

				$wrongUserPassComb = "Username and password don't match to an account!";
				$errors = 1;

			}

		}

	}

?>

<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

	<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="icon" type="image/jpg" href="favicon.jpg" />

  	<link rel="apple-touch-icon" type="image/jpg" href="favicon.jpg" />

  	<meta name="description" content="Log in to your SickGamez account!" />

  	<meta name="keywords" content="SickGamez, Sickgamez, sickGamez, sickgamez, sick, gamez, games, website, games website, gamez website, gamers" />
  
  	<meta name="author" content="Edward Iakab & Toni Rad" />

	<title>SickGamez</title>

	<style type="text/css">
		
		body {

	      background: #1d1f20;
	      overflow-x: hidden;

	    }
	    
	    @font-face {

	      font-family: Austere;
	      src: url(Fonts/Austere.ttf);

	    }

	    @font-face {

	      font-family: Pixelony;
	      src: url(Fonts/Pixelony.ttf);

	    }

	    @font-face {

	      font-family: Fjalla;
	      src: url(Fonts/Fjalla.ttf);

	    }

	    @font-face {

		  font-family: GomGom;
		  src: url(Fonts/GomGom.ttf);

		}

	    #menu {

	      animation: rotation 10s infinite linear;
	      border-radius: 50%;
	      width: 4vw;
	      margin-top: 20px;
	      margin-left: 20px;
	      cursor: default;

	    }

	    @keyframes rotation {

	      from {

	        transform: rotate(0deg);

	      }

	      to {

	        transform: rotate(359deg);

	      }

	    }

	    #sideNav {

	      height: 100%;
	      width: 0px;
	      position: fixed;
	      z-index: 1;
	      top: 0;
	      left: 0;
	      background-color: #111;
	      overflow-x: hidden;
	      transition: 0.5s;
	      overflow: hidden;

	    }

	    #sideNav #menu_buttons_list {

	      padding: 8px 8px 8px 32px;
	      text-decoration: none;
	      font-size: 25px;
	      display: block;
	      margin-left: -15%;
	      list-style-type: none;

	    }

	    #sidenav_name {

	      font-family: Austere;
	      font-size: 30px;
	      cursor: default;
	      text-align: center;
	      margin-top: 60px;

	    }

	    .sidenav_name_link {

	      color: #777EB8;
	      transition: 0.3s all ease;

	    }

	    .sidenav_name_link:hover {

	      color: white;
	      text-decoration: none;

	    }

	    .menu_buttons {

	      color: #818181;
	      text-align: center;

	    }

	    .menu_buttons:hover {

	      color: white;

	    }

	    #social_media_buttons {

	      list-style-type: none;
	      margin: 0;
	      padding: 0;
	      bottom: 0;
	      position: fixed;
	      font-size: 1px;
	      margin-left: 0.1%;
	      visibility: hidden;

	    }

	    .social_buttons_images {

	      width: 64px;
	      height: 64px;
	      padding: 3px;
	      margin-bottom: 15px;

	    }

	    @media screen and (max-height: 360px) {

	      .social_buttons_images {

	        display: none;

	      }

	    }

	    .formInputs {

	    	text-align: center;
	    	width: 45%;
	    	background-color: #1d1f20;
	    	margin-top: 1.3%;
	    	border-radius: 1vw;
	    	outline: none;
	    	font-size: 2.2vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	color: grey;

	    }

	    .formInputs:focus {

	    	background-color: white;

	    }

	    #submit {

	    	text-align: center;
	    	width: 30%;
	    	background-color: #1d1f20;
	    	margin-top: 1.3%;
	    	border-radius: 1vw;
	    	outline: none;
	    	font-size: 2.2vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	color: grey;
	    	cursor: default;

	    }

	    #submit:active {

	    	background-color: white;

	    }

	    ::placeholder {

	      color: grey;

	    }

	    #log_in_label {

	    	text-align: center;
	        font-size: 7vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 100%;
	        margin-top: -2.5%;

	    }

	    @keyframes fade_in {

	    	from {

	        	opacity: 0;

	      	}

	    	to {

	        	opacity: 1;

	      	}

	    }

	    #inputError {

	    	margin-right: -27%;
	    	float: left;
	    	color: red;
	    	margin-top: 2.2%;
	    	width: 27%;
	    	font-size: 1.5vw;
	    	font-family: Pixelony;
	    	cursor: default;

	    }

	    #wrongUserPassComb {

	    	margin-right: -27%;
	    	float: left;
	    	color: red;
	    	margin-top: 3.45%;
	    	width: 27%;
	    	font-size: 1.5vw;
	    	font-family: Pixelony;
	    	cursor: default;

	    }

	    #menu_line_break {

	    	width: 85%;
	    	height: 0.05px;
	    	margin: auto;
	    	background-color: gray;

	    }

	    #forgot_password_button {

	    	text-align: center;
	    	width: 22%;
	    	background-color: #1d1f20;
	    	margin-top: 1.3%;
	    	border-radius: 1vw;
	    	outline: none;
	    	font-size: 1.5vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	color: grey;
	    	cursor: default;
	    	padding: 0.25%;

	    }

	    #forgot_password_button:active {

	    	background-color: white;

	    }

	    #forgot_password_div {

	    	text-align: center;

	    }

	    #password_changed_succesfully {

	    	color: green;
	    	font-family: Pixelony;
	    	font-size: 1.8vw;
	    	text-align: center;
	    	margin: auto;
	    	width: 65%;
	    	padding: 0;
	    	margin-top: 2%;

	    }

	    #friends_list {

			animation: rotation 10s infinite linear;
			border-radius: 50%;
			width: 4vw;
			margin-top: 20px;
			margin-left: 20px;
			cursor: default;
			position: absolute;

	    }

	    #friends_side_menu {

			height: 100%;
			width: 0px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			overflow: hidden;

	    }

	    #friends_side_menu_label {

			font-family: Austere;
			font-size: 30px;
			cursor: default;
			text-align: center;
			margin-top: 60px;

	    }

	    .friends_side_menu_link {

			color: #777EB8;
			transition: 0.3s all ease;

	    }

	    .friends_side_menu_link:hover {

	    	color: white;
	    	text-decoration: none;

	    }

	    #online_friends_label {

	    	color: white;
	    	text-align: center;
	    	font-size: 27px;
	    	display: block;
	    	margin: auto;
	    	width: 100%;
	    	margin-left: -1%;
	    	font-family: GomGom;
	    	cursor: default;

	    }

	    #online_friends_div {

	    	width: 100%;
            overflow: auto;
            height: 100%;

	    }

	    .online_friends_div_for_each {

	    	position: relative;
			width: 90%;
			height: auto;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 20px;
			margin-top: 20px;

	    }

	    .online_friends_profile_pic_display {

	    	position: absolute;
			width: 43px;
			height: 43px;
			border-radius: 100%;
			top: 0;
			bottom: 0;
			margin: auto;
			float: left;
			margin-right: -13%;
			margin-left: 2.5%;

	    }

	    .online_friends_user_div {

	    	width: intrinsic;
			width: -webkit-fit-content;
			margin-left: 55px;
			margin-top: 11px;

	    }

	    .online_friends_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    .online_friend_username {

			color: white;
			font-family: GomGom;
			font-size: 19px;
			text-align: left;
			margin-top: 0px;
			margin-bottom: 11px;
			max-width: 95px;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;

	    }

	    .online_green_dot {

	    	position: absolute;
			width: 12px;
			height: 12px;
			background-color: limegreen;
			border-radius: 100%;
			top: -1.5px;
			bottom: 0;
			margin: auto;
			margin-left: 89%;

	    }

	    #offline_friends_label {

	    	color: white;
	    	text-align: center;
	    	font-size: 27px;
	    	display: block;
	    	margin: auto;
	    	width: 100%;
	    	margin-left: -1%;
	    	font-family: GomGom;
	    	cursor: default;

	    }

	    #offline_friends_div {

	    	width: 100%;
            overflow: auto;
            height: 100%;

	    }

	    .offline_friends_div_for_each {

	    	position: relative;
			width: 90%;
			height: auto;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 20px;
			margin-top: 20px;
			opacity: 0.5;

	    }

	    .offline_friends_profile_pic_display {

	    	position: absolute;
			width: 43px;
			height: 43px;
			border-radius: 100%;
			top: 0;
			bottom: 0;
			margin: auto;
			float: left;
			margin-right: -13%;
			margin-left: 2.5%;

	    }

	    .offline_friends_user_div {

	    	width: intrinsic;
			width: -webkit-fit-content;
			margin-left: 55px;
			margin-top: 11px;

	    }

	    .offline_friends_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    .offline_friend_username {

			color: white;
			font-family: GomGom;
			font-size: 19px;
			text-align: left;
			margin-top: 0px;
			margin-bottom: 11px;
			max-width: 95px;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;

	    }

	    .offline_green_dot {

	    	position: absolute;
			width: 12px;
			height: 12px;
			background-color: lightgray;
			border-radius: 100%;
			top: -1.5px;
			bottom: 0;
			margin: auto;
			margin-left: 89%;

	    }

	    #no_friends_online {

	    	color: white;
	    	font-size: 22px;
	    	font-family: Pixelony;
	    	text-align: center;
	    	margin-top: 30px;
	    	cursor: default;

	    }

	    #no_friends_offline {

	    	color: white;
	    	font-size: 22px;
	    	font-family: Pixelony;
	    	text-align: center;
	    	margin-top: 30px;
	    	cursor: default;

	    }

	    #search_friends_div {

	    	width: 100%;
	    	height: 100%;
	    	background: #111;
	    	position: absolute;
	    	z-index: 1;

	    }

	    #search_friends {

	    	width: 100%;
	    	background-color: #1d1f20;
	    	border-radius: 10px;
	    	outline: none;
	    	font-size: 18px;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	color: grey;
	    	padding: 5px;
	    	text-align: center;

	    }

	    #search_friends:focus {

	    	background-color: white;

	    }

	    #search_friends_input_div {

	    	width: 85%;
	    	margin: auto;

	    }

	    #friends_menu_sidebar_inner_container {

	    	position: relative;
	    	height: 82.5%;

	    }

	    .search_friends_div_for_each {

	    	position: relative;
			width: 90%;
			height: auto;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 20px;
			margin-top: 20px;

	    }

	    .search_friends_profile_pic_display {

	    	position: absolute;
			width: 43px;
			height: 43px;
			border-radius: 100%;
			top: 0;
			bottom: 0;
			margin: auto;
			float: left;
			margin-right: -13%;
			margin-left: 2.5%;

	    }

	    .search_friends_user_div {

	    	width: intrinsic;
			width: -webkit-fit-content;
			margin-left: 55px;
			margin-top: 11px;

	    }

	    .search_friends_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    .search_friends_username {

	    	color: white;
			font-family: GomGom;
			font-size: 19px;
			width: intrinsic;
			width: -webkit-fit-content;
			word-wrap: break-word;
			text-align: left;
			max-width: 100px;
			margin-top: 0px;
			margin-bottom: 11px;

	    }

	    #search_friends_no_results {

	    	color: white;
	    	font-size: 22px;
	    	font-family: Pixelony;
	    	text-align: center;
	    	margin-top: 30px;
	    	cursor: default;

	    }
	    
	    #bottom_half_menu_div {

        	width: 100%;
        	height: 330px;
        	overflow: auto;
        	min-height: 330px;
        
        }
        
        ::-webkit-scrollbar {
            
            display: none;
            
        }

        .messages_notifications_each_page_div_for_each {

			width: 22vw;
			height: 5vw;
			border: 2.5px solid #777EB8;
			border-radius: 2vw;
			position: relative;
			margin: auto;
			margin-top: 5%;
			margin-bottom: 5%;
			background-color: #1d1f20;
			opacity: 0.75;
			z-index: 1;

        }

        .messages_notifications_each_page_div_for_each:hover {

        	opacity: 1;
        	cursor: pointer;

        }

        .profile_picture_display_messages_notifications_each_page_div_for_each {

        	width: 4vw;
        	height: 4vw;
        	border-radius: 100%;
        	position: absolute;
        	top: 0;
        	bottom: 0;
        	margin: auto;
        	left: 2%;

        }

        .username_messages_notifications_each_page_div_for_each {

			width: 55%;
			color: white;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 1.5%;
			left: 23%;
			text-decoration: underline;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;

        }

        .message_content_messages_notifications_each_page_div_for_each {

			width: 52.5%;
			color: white;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 48%;
			left: 23%;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;

        }

        #messages_notifications_each_page_main_div {

        	position: absolute;
        	width: 24vw;
        	height: 33%;
        	top: 0;
        	right: 0;
        	overflow: auto;

        }

        .close_messages_notifications_each_page_div_for_each {

			color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			top: -9%;
			right: 3%;
			height: 0%;

	    }

	    .close_messages_notifications_each_page_div_for_each:hover, .close_messages_notifications_each_page_div_for_each:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .messages_notifications_each_page_inner_div {

	    	height: 100%;
	    	width: 90%;

	    }

	    .friend_request_notification_each_page_div_for_each {

	    	width: 22vw;
			height: 5vw;
			border: 2.5px solid #777EB8;
			border-radius: 2vw;
			position: relative;
			margin: auto;
			margin-top: 5%;
			margin-bottom: 5%;
			background-color: #1d1f20;
			opacity: 0.75;
			z-index: 1;

	    }

	    .friend_request_notification_each_page_div_for_each:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

	    .close_friend_request_notifications_each_page_div_for_each {

	    	color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			top: -9%;
			right: 3%;
			height: 0%;

	    }

	    .close_friend_request_notifications_each_page_div_for_each:hover, .close_friend_request_notifications_each_page_div_for_each:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .friend_request_notifications_each_page_inner_div {

	    	height: 100%;
	    	width: 72.5%;

	    }

	    .profile_picture_display_friend_request_notifications_each_page_div_for_each {

	    	width: 4vw;
        	height: 4vw;
        	border-radius: 100%;
        	position: absolute;
        	top: 0;
        	bottom: 0;
        	margin: auto;
        	left: 2%;

	    }

	    .username_friend_request_notifications_each_page_div_for_each {

	    	width: intrinsic;
        	color: white;
        	font-family: GomGom;
        	font-size: 1.35vw;
        	position: absolute;
        	top: 5%;
        	left: 23%;
        	text-decoration: underline;

	    }

	    .friend_request_content_notifications_each_page_div_for_each {

	    	width: 70%;
			color: white;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 48%;
			left: 23%;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;

	    }

	    .yes_no_friend_request_notification_each_page_div_for_each_div {

			position: absolute;
			width: 15%;
			height: 100%;
			left: 75%;

	    }

	    .yes_friend_request_notification_each_page_div_for_each_div {

	    	position: absolute;
	    	width: 100%;
	    	height: 50%;
	    	opacity: 0.6;

	    }

	    .yes_friend_request_notification_each_page_div_for_each_div:hover {

	    	opacity: 1;

	    }

	    .yes_friend_request_notification_each_page_div_for_each_paragraph {

	    	position: absolute;
	    	color: green;
	    	font-family: GomGom;
	    	font-size: 2vw;
	    	left: 0;
	    	right: 0;
	    	top: -5%;
	    	margin: auto;
	    	text-align: center;
	    	background: transparent;
	    	border: none;
	    	outline: none;

	    }

	    .no_friend_request_notification_each_page_div_for_each_div {

	    	position: absolute;
	    	width: 100%;
	    	height: 50%;
	    	opacity: 0.6;
	    	top: 45%;

	    }

	    .no_friend_request_notification_each_page_div_for_each_div:hover {

	    	opacity: 1;

	    }

	    .no_friend_request_notification_each_page_div_for_each_paragraph {

	    	position: absolute;
	    	color: red;
	    	font-family: GomGom;
	    	font-size: 2vw;
	    	left: 0;
	    	right: 0;
	    	margin: auto;
	    	text-align: center;

	    }

	    #friend_requests_notifications_each_page_main_div {

	    	position: absolute;
        	width: 24vw;
        	height: 33%;
        	top: 33%;
        	right: 0;
        	overflow: auto;

	    }

	    .rememberMeLabel {

			color: silver;
			font-size: 1.5vw;
			display: block;
			position: relative;
			width: 12%;
			text-align: left;
			margin: auto;
			margin-top: 1%;

		}

		.rememberMeLabel input {

			position: absolute;
			opacity: 0;
			height: 0;
			width: 0;

		}

		.customCheckBox {

			position: absolute;
			height: 1.4vw;
			width: 1.4vw;
			background-color: white;
			margin-top: -14.5%;
			margin-left: 85%;
			border-radius: 0.6vw;

		}

		.rememberMeLabel:hover input ~ .customCheckBox {

			background-color: gray;

		}

		.rememberMeLabel input:checked ~ .customCheckBox {

			background-color: #777EB8;

		}

		.customCheckBox:after {

			content: "";
			position: absolute;
			display: none;

		}

		.rememberMeLabel input:checked ~ .customCheckBox:after {

			display: block;

		}

		.rememberMeLabel .customCheckBox:after {

			left: 31.5%;
			top: 8%;
			width: 0.5vw;
			height: 1vw;
			border: solid white;
			border-width: 0 0.15vw 0.15vw 0;
			transform: rotate(45deg);

		}

		.online_friend_activity_status {

			color: gray;
			font-family: GomGom;
			font-size: 18px;
			font-style: italic;
			cursor: default;

		}

		#my_online_activity_status_div {

			width: 100%;
			height: 50px;
			text-align: center;
			margin: auto;
			position: relative;
			cursor: default;
			margin-top: 5px;
			margin-bottom: -5px;

		}

		#my_online_activity_status_inner_div {

			height: 50px;
			text-align: center;
			margin: auto;
			position: relative;
			cursor: default;

		}

		#my_online_activity_status {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: limegreen;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_label {

			text-align: center;
			font-size: 26px;
			font-family: GomGom;
			cursor: default;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			cursor: default;
			display: inline-block;
			margin-top: 5px;

		}

		#my_online_activity_status_div:hover #my_online_activity_status_options_div {

			display: block;

		}

		#my_online_activity_status_options_div {

			display: none;
			position: absolute;
			width: 90%;
			height: 250px;
			z-index: 100;
			left: 0;
			right: 0;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 10px;
			background-color: #111;
			top: 82.5%;

		}

		.my_online_activity_status_options_inner_div_each {

			width: 100%;
			height: 45px;
			position: relative;
			margin-top: 1px;

		}

		.my_online_activity_status_options_inner_div_each:hover {

			cursor: pointer;
			opacity: 0.6;

		}

		#my_online_activity_status_options_each_online {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: limegreen;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_options_each_online_label {

			text-align: center;
			font-size: 24px;
			font-family: GomGom;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			display: -webkit-inline-box;
			margin-top: 4px;

		}

		.my_online_activity_status_options_div_line_break {

			width: 90%;
			margin: auto;
			margin-top: 0.75%;
			border: 1px solid gray;

		}

		#my_online_activity_status_options_each_away {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: yellow;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_options_each_away_label {

			text-align: center;
			font-size: 24px;
			font-family: GomGom;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			display: -webkit-inline-box;
			margin-top: 4px;

		}

		#my_online_activity_status_options_each_do_not_disturb {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: #777EB8;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_options_each_do_not_disturb_label {

			text-align: center;
			font-size: 24px;
			font-family: GomGom;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			display: -webkit-inline-box;
			margin-top: 4px;

		}

		#my_online_activity_status_options_each_invisible {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: gray;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_options_each_invisible_label {

			text-align: center;
			font-size: 24px;
			font-family: GomGom;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			display: -webkit-inline-box;
			margin-top: 4px;

		}

		#my_online_activity_status_options_each_custom {

			position: absolute;
			top: 0;
			bottom: 0;
			width: 14px;
			height: 14px;
			background-color: orange;
			border-radius: 100%;
			margin: auto;

		}

		#my_online_activity_status_options_each_custom_label {

			margin: 0;
			text-align: center;
			font-size: 24px;
			font-family: GomGom;
			color: gray;
			text-decoration: underline;
			margin-left: 22px;
			display: -webkit-inline-box;
			margin-top: 4px;

		}

		.message_content_messages_notifications_each_page_div_for_each_reply {

			width: 15%;
			color: #aaaaaa;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 48%;
			left: 80%;
			font-style: italic;
			opacity: 0.7;
			z-index: 10;

		}

		.message_content_messages_notifications_each_page_div_for_each_reply:hover {

			opacity: 1;

		}

		.reply_to_message_text_field {

			width: 51%;
			height: 27.5%;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 67%;
			left: 23%;
			opacity: 0.7;
			z-index: 10;
			border: 2.5px solid #777EB8;
			border-radius: 0.75vw;
			background-color: transparent;
			padding: 0.3vw;
			color: gray;

		}

		.reply_to_message_text_field:focus {

			background-color: white;
			outline: none;

		}

		.reply_to_message_submit {

			width: 20%;
			height: 27.5%;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 67%;
			left: 75%;
			opacity: 0.7;
			z-index: 10;
			border: 2.5px solid #777EB8;
			border-radius: 0.75vw;
			background-color: transparent;
			padding: 0.3vw;
			color: gray;

		}

		.reply_to_message_submit:active {

			background-color: white;
			outline: none;

		}

		#new_about_information {

			position: relative;
            width: 27.5px;
            height: 27.5px;
            background-color: red;
            border-radius: 100%;
            color: white;
            text-align: center;
            font-size: 18px;
            cursor: default;
            float: left;
            left: 15%;
            margin-right: -28px;

		}

		#feed_notifications_each_page_main_div {

			position: absolute;
        	width: 24vw;
        	height: 33%;
        	top: 66%;
        	right: 0;
        	overflow: auto;

		}

		.feed_notifications_each_page_div_for_each {

			width: 22vw;
			height: 5vw;
			border: 2.5px solid #777EB8;
			border-radius: 2vw;
			position: relative;
			margin: auto;
			margin-top: 5%;
			margin-bottom: 5%;
			background-color: #1d1f20;
			opacity: 0.75;
			z-index: 1;

        }

        .feed_notifications_each_page_div_for_each:hover {

        	opacity: 1;
        	cursor: pointer;

        }

        .profile_picture_display_feed_notifications_each_page_div_for_each {

        	width: 4vw;
        	height: 4vw;
        	border-radius: 100%;
        	position: absolute;
        	top: 0;
        	bottom: 0;
        	margin: auto;
        	left: 2%;

        }

        .username_feed_notifications_each_page_div_for_each {

			width: 55%;
			color: white;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 5%;
			left: 23%;
			text-decoration: underline;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;

        }

        .feed_content_feed_notifications_each_page_div_for_each {

			width: 73%;
			color: white;
			font-family: GomGom;
			font-size: 1.35vw;
			position: absolute;
			top: 48%;
			left: 23%;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;

        }

        .close_feed_notifications_each_page_div_for_each {

			color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			top: -9%;
			right: 3%;
			height: 0%;

	    }

	    .close_feed_notifications_each_page_div_for_each:hover, .close_feed_notifications_each_page_div_for_each:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .feed_notifications_each_page_inner_div {

	    	height: 100%;
	    	width: 90%;

	    }

	    #custom_activity_status_field {

			width: 137.5px;
			float: left;
			margin-left: 5px;
			height: 39px;
			margin-top: 3px;
			background-color: #1d1f20;
			border-radius: 10px;
			outline: none;
			font-size: 16px;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			text-align: left;
			padding: 5px;

	    }

	    #custom_activity_status_field:active {

	    	outline: none;

	    }

	    #custom_activity_status_field:focus {

	    	background-color: white;
	    	outline: none;

	    }

	    #close_custom_activity_status_field {

			font-size: 25px;
			border: 1.5px solid grey;
			color: grey;
			position: absolute;
			height: 25px;
			width: 25px;
			line-height: 18px;
			right: 3.6px;
			border-radius: 100%;
			bottom: 10px;
			cursor: default;

	    }

	    #close_custom_activity_status_field:hover {

	    	cursor: pointer;
	    	opacity: 0.6;

	    }

	    #my_online_activity_status_options_inner_div_each_custom_inner_div {

			width: 100%;
			height: 45px;
			position: relative;
			margin-top: 1px;

	    }

	    #custom_activity_status_field_button {

			position: absolute;
			width: 90%;
			height: 30px;
			left: 0;
			right: 0;
			margin: auto;
			bottom: -32px;
			border: 2.5px solid #777EB8;
			border-radius: 7.5px;
			background-color: #1d1f20;
			color: grey;
			font-family: Arial;
			font-weight: bold;
			font-size: 15.25px;
			line-height: 0px;

	    }

	    #custom_activity_status_field_button:active {

	    	outline: none;
	    	background-color: white;

	    }

	    #custom_activity_status_field_button:focus {

	    	outline: none;

	    }

	</style>

</head>

<body>

<img id="menu" src="Images/sickgamezlogo.jpg" onmouseover="openNav()" />

<br />

<?php if ($login == 1) : ?>

	<img id="friends_list" src="Images/friends_icon.jpg" onmouseover="openFriendsList()" />

<?php endif ?>

<div id="sideNav" onmouseleave="closeNav()">
    
	<p id="sidenav_name"><a class="sidenav_name_link" href="/index">SickGamez</a></p>

		<ul id="menu_buttons_list">

			<?php if ($login == 1) : ?>

				<li><a class="menu_buttons" href="profile?username=<?php echo $_COOKIE["username"]; ?>" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">My Account</a></li>

				<li><a class="menu_buttons" href="items" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">My Items</a></li>

				<script type="text/javascript">
					
					$(document).ready(function() {

						$("#not_signed_in").remove();

					})

				</script>

			<?php endif ?>

			<li><a class="menu_buttons" id="not_signed_in" href="not_logged_in" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">My Account</a></li>

			<li><a class="menu_buttons" id="sign_up_link" href="sign_up" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Sign Up</a></li>

			<?php if ($login == 1) : ?>

				<li><a class="menu_buttons" href="log_out" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Log out</a></li>

				<script type="text/javascript">
					
					$(document).ready(function() {

						$("#log_in_link").remove();
						$("#sign_up_link").remove();

					})

				</script>

			<?php endif ?>

    		<li><a class="menu_buttons" id="log_in_link" href="log_in?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Log in</a></li>

    		<li><a class="menu_buttons" href="search_accounts" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Search</a></li>

    		<?php if ($login == 1) : ?>

				<li><a class="menu_buttons" href="shop" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Shop</a></li>

			<?php endif ?>

    		<hr id="menu_line_break" />
        
			<div id="bottom_half_menu_div">
        		
            	<li><a class="menu_buttons" href="/index" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Home</a></li>
            
            	<li><a class="menu_buttons" href="/gamez" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Gamez</a></li>
            
            	<li><a class="menu_buttons" href="/add_game" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Add Game</a></li>

            	<li><a class="menu_buttons" href="/feed" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Feed</a></li>
            
            	<li><a class="menu_buttons" href="/creators" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Creators</a></li>
            
            	<li><a class="menu_buttons" href="/feedback" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Feedback</a></li>

            	<?php

            		$aboutQuery = "SELECT * FROM users WHERE username = ? AND newAboutActive = ?;";
            		$stmt = $db->prepare($aboutQuery);
            		$newAboutActive = 1;
            		$stmt->bind_param("si", $_COOKIE['username'], $newAboutActive);
            		$stmt->execute();
            		$aboutResult = $stmt->get_result();

            		if ($aboutResult->num_rows >= 1) {

            			if ($row = $aboutResult->fetch_assoc()) {

            				if ($row['username'] === $_COOKIE['username']) {

            					?>

            						<span id="new_about_information">!</span>

            					<?php

            				}

            			}

            		}

            	?>
            
            	<li><a class="menu_buttons" href="/about" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">About</a></li>
            
            </div>

		</ul>

		<ul id="social_media_buttons">
        
        	<li style="display: inline-block;"><a href="https://www.facebook.com/sickgamezz"><img class="social_buttons_images" src="Images/facebook_button.png"></a></li>

        	<li style="display: inline-block;"><a href="https://www.instagram.com/sick.gamez"><img class="social_buttons_images" src="Images/instagram_button.png"></a></li>

        	<li style="display: inline-block;"><a href="https://twitter.com/sick_gamez"><img class="social_buttons_images" src="Images/twitter_button.png"></a></li>

      	</ul>

</div>

	<?php if ($login == 1) : ?>

		<div id="friends_side_menu" onmouseleave="closeFriendsList()">

			<?php

				$username = $_COOKIE['username'];

			?>

			<p id="friends_side_menu_label"><a class="friends_side_menu_link" href="friends?username=<?php echo $username; ?>">Friends</a></p>

			<div id="search_friends_input_div">
				
				<input type="text" name="search_friends" id="search_friends" placeholder="Search friends" />

			</div>

			<div id="friends_menu_sidebar_inner_container">
				
				<div id="search_friends_div"></div>

				<div id="my_online_activity_status_div">

	  				<div id="my_online_activity_status_inner_div"></div>

	  				<div id="my_online_activity_status_options_div">
	  					
	  					<div class="my_online_activity_status_options_inner_div_each" id="my_online_activity_status_options_inner_div_each_online">

	  						<span id="my_online_activity_status_options_each_online"></span>

	  						<p id="my_online_activity_status_options_each_online_label">Online</p>

	  					</div>

	  					<hr class="my_online_activity_status_options_div_line_break" />

	  					<div class="my_online_activity_status_options_inner_div_each" id="my_online_activity_status_options_inner_div_each_away">

	  						<span id="my_online_activity_status_options_each_away"></span>

	  						<p id="my_online_activity_status_options_each_away_label">Away</p>

	  					</div>

	  					<hr class="my_online_activity_status_options_div_line_break" />

	  					<div class="my_online_activity_status_options_inner_div_each" id="my_online_activity_status_options_inner_div_each_do_not_disturb">

	  						<span id="my_online_activity_status_options_each_do_not_disturb"></span>

	  						<p id="my_online_activity_status_options_each_do_not_disturb_label">Do not disturb</p>

	  					</div>

	  					<hr class="my_online_activity_status_options_div_line_break" />

	  					<div class="my_online_activity_status_options_inner_div_each" id="my_online_activity_status_options_inner_div_each_invisible">

	  						<span id="my_online_activity_status_options_each_invisible"></span>

	  						<p id="my_online_activity_status_options_each_invisible_label">Invisible</p>

	  					</div>

	  					<hr class="my_online_activity_status_options_div_line_break" />

	  					<div class="my_online_activity_status_options_inner_div_each" id="my_online_activity_status_options_inner_div_each_custom">

	  						<div class="my_online_activity_status_options_inner_div_each_custom_inner_div" id="my_online_activity_status_options_inner_div_each_custom_inner_div">
	  							
	  							<span id="my_online_activity_status_options_each_custom"></span>

		  						<p id="my_online_activity_status_options_each_custom_label">Custom</p>

	  						</div>

	  					</div>

	  				</div>

	  			</div>

				<div id="online_and_offline_friends_div" style="height: 100%;">
		  			
		  			<div style="height: 42.5%;">
		  			    
		  			    <p id="online_friends_label">Online friends</p>

    			  		<div id="online_friends_div"></div>
		  			    
		  			</div>

			  		<div style="height: 42.5%;">
			  		    
			  		    <p id="offline_friends_label">Offline friends</p>

    					<div id="offline_friends_div"></div>
			  		    
			  		</div>

		  		</div>

			</div>

		</div>

	<?php endif ?>

	<ul id="social_media_buttons">
        
    	<li style="display: inline-block;"><a href="https://www.facebook.com/sickgamezz"><img class="social_buttons_images" src="Images/facebook_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://www.instagram.com/sick.gamez"><img class="social_buttons_images" src="Images/instagram_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://twitter.com/sick_gamez"><img class="social_buttons_images" src="Images/twitter_button.png"></a></li>

  	</ul>

  	<?php if ($login == 1) : ?>

  		<div id="messages_notifications_each_page_main_div"></div>

  		<div id="friend_requests_notifications_each_page_main_div"></div>

  		<div id="feed_notifications_each_page_main_div"></div>

  	<?php endif ?>

	<h1 id="log_in_label">Log in</h1>

	<?php

		if (isset($_GET['password_changed'])) {

			if ($_GET['password_changed'] == "success") {

				$passwordChangedSuccessfully = "Your password has been changed succesfully!";

				echo "<meta http-equiv='refresh' content='3; url=log_in' />";

			}

		}

	?>

	<p id="password_changed_succesfully"><?php echo $passwordChangedSuccessfully; ?></p>

	<form method="post" action="log_in" style="text-align: center; margin-top: 6%;">

		<p id="inputError"><?php echo $usernameError ?></p>
		
		<input type="text" name="username" placeholder="Username" class="formInputs" id="username" maxlength="20" <?php if ($errors == 1) echo "style='border: 2.5px solid red;'"; ?> />

		<p id="wrongUserPassComb"><?php echo $wrongUserPassComb; ?></p>

		<br />

		<p id="inputError"><?php echo $passwordError ?></p>

		<input type="password" name="password" placeholder="Password" class="formInputs" id="password" maxlength="30" <?php if ($errors == 1) echo "style='border: 2.5px solid red;'"; ?> />

		<br />

		<label id="rememberMeLabel" class="rememberMeLabel">Remember me

			<input type="checkbox" name="rememberMe" />

			<div class="customCheckBox"></div>

		</label>

		<?php

			echo '<input type="hidden" name="redirect_location" value="';

			if (isset($_GET['redirect'])) {

				echo htmlspecialchars($_GET['redirect']);

			}

			echo '" />';

		?>

		<input type="submit" name="log_in" id="submit" value="Log in!" />

	</form>

	<div id="forgot_password_div">
		
		<button id="forgot_password_button" onclick="window.location.href = 'forgot_password' ">Forgot your password?</button>

	</div>

</body>

<?php if ($login == 1) : ?>

	<script type="text/javascript">

		var replyActive = false;
		
		function openFriendsList() {

			document.getElementById("friends_side_menu").style.width = "200px";

		}

		function closeFriendsList() {

			document.getElementById("friends_side_menu").style.width = "0px";

			$("#my_online_activity_status_options_div").css("height", "250px");

			$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

			$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
			$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

			$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

			$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

		}

		setTimeout(function() {

			$("#account_deleted_successfully").fadeOut(300);

		}, 2000);

		var refreshMessageContainerInterval = setInterval(function() {

			updateAllNewMessagesEachPage();

		}, 3000);

		$(document).ready(function() {

			$(document).ready(function() {

				resetAFKTimer();

				var xhttp = new XMLHttpRequest();

				xhttp.onreadystatechange = function() {

					if (this.readyState == 4 && this.status == 200) {

						document.getElementById("logged_in_menu_user_coin_amount").innerHTML = this.responseText;

					}

				};

				xhttp.open("GET", "/coin_amount.php", true);

				xhttp.send();

				var xhttp = new XMLHttpRequest();

				xhttp.onreadystatechange = function() {

					if (this.readyState == 4 && this.status == 200) {

						document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

					}

				};

				xhttp.open("GET", "/current_online_activity_status_type.php", true);

				xhttp.send();

				updateLastActivity();
				fetchUserOnline();
				fetchUserOffline();
				updateAllNewFriendRequests();
				updateFriendsOnlineActivityStatus();
				updateAllNewMessagesEachPage();
				updateAllNewFeedNotifications();

			});

			fetchUserOnline();
			fetchUserOffline();
			updateAllNewMessagesEachPage();
			updateAllNewFriendRequests();
			updateAllNewFeedNotifications();

			setInterval(function() {

				updateLastActivity();
				fetchUserOnline();
				fetchUserOffline();
				updateAllNewFriendRequests();
				updateFriendsOnlineActivityStatus();
				updateAllNewFeedNotifications();

			}, 3000);

			function fetchUserOnline() {

				$.ajax({

					url: "/get_user_data_online.php",
					method: "GET",
					success: function(data) {

						$("#online_friends_div").html(data);

					}

				})

			}

			function fetchUserOffline() {

				$.ajax({

					url: "/get_user_data_offline.php",
					method: "GET",
					success: function(data) {

						$("#offline_friends_div").html(data);

					}

				})

			}

			function updateLastActivity() {

				$.ajax({

					url: "/update_last_activity.php",
					success: function() {



					}

				})

			}

			$("#search_friends").keyup(function() {

				var searchedFriend = $(this).val();

				if (searchedFriend != '') {

					document.getElementById("search_friends_div").style.display = "block";

					$("#search_friends_div").html("");

					$.ajax({

						url: "/get_user_data_search_friends.php",
						method: "GET",
						data: {

							search: searchedFriend

						},
						dataType: "text",
						success: function(data) {

							$("#search_friends_div").html(data);

						}

					})

				} else {

					document.getElementById("search_friends_div").style.display = "none";

				}

			});

		});

		$(document).ready(function() {

			$("#search_friends_div").hide();

		});

		function fetchAllNewMessagesEachPage() {

			$.ajax({

				url: "/fetch_all_new_messages_each_page.php",
				method: "GET",
				success: function(data) {

					$("#messages_notifications_each_page_main_div").html(data);

				}

			});

		}

		function updateAllNewMessagesEachPage() {

			$("#messages_notifications_each_page_main_div").each(function() {

				fetchAllNewMessagesEachPage();

			});

		}

		function closeNewMessageDiv(messageId) {

			replyActive = true;

			var chatMessageDiv = document.getElementById("messages_notifications_each_page_div_for_each_" + messageId + "");

			var chatMessageDivID = chatMessageDiv.id;

			chatMessageDiv.remove();

			$.ajax({

				url: "/closed_new_message.php",
				method: "GET",
				data: {

					messageId: messageId

				},
				success: function(data) {

					replyActive = false;
					
				}

			});

		}

		function fetchAllNewFriendRequests() {

			$.ajax({

				url: "/fetch_all_new_friend_requests_each_page.php",
				method: "GET",
				success: function(data) {

					$("#friend_requests_notifications_each_page_main_div").html(data);

				}

			});

		}

		function updateAllNewFriendRequests() {

			$("#friend_requests_notifications_each_page_main_div").each(function() {

				fetchAllNewFriendRequests();

			});

		}

		function closeNewFriendRequestDiv(friendRequestId) {

			var friendRequestDiv = document.getElementById("friend_request_notification_each_page_div_for_each_" + friendRequestId + "");

			var friendRequestDivId = friendRequestDiv.id;

			friendRequestDiv.remove();

			$.ajax({

				url: "/closed_new_friend_request.php",
				method: "GET",
				data: {

					friendRequestId: friendRequestId

				},
				success: function(data) {



				}

			});

		}

		function acceptYesFriendRequest(friendRequestIdFromDB, fromUserId, toUserId) {

			$.ajax({

				url: "/yes_friend_request_each_page.php",
				method: "GET",
				data: {

					friendRequestIdFromDB: friendRequestIdFromDB,
					fromUserId: fromUserId,
					toUserId: toUserId

				},
				success: function(data) {

					

				}

			});

		}

		function declineNoFriendRequest(friendRequestIdFromDB, fromUserId, toUserId) {

			$.ajax({

				url: "/no_friend_request_each_page.php",
				method: "GET",
				data: {

					friendRequestIdFromDB: friendRequestIdFromDB,
					fromUserId: fromUserId,
					toUserId: toUserId

				},
				success: function(data) {

					

				}

			});

		}

		function updateFriendsOnlineActivityStatus() {

        	var currentPageSourceURL = "<?php echo $_SERVER['REQUEST_URI']; ?>";

        	$.ajax({

        		url: "/update_friends_online_activity_status.php",
        		method: "GET",
        		data: {

        			currentPageSourceURL: currentPageSourceURL

        		},
        		success: function(data) {



        		}

        	});

        }

        var timeoutInMilisecondsAFK = 600000;
		var timeoutAFKId; 

		function startAFKTimer() {

			timeoutAFKId = window.setTimeout(userAFK, timeoutInMilisecondsAFK);

		}

		function userAFK() {

			var userAFK = "<?php echo $_COOKIE['username']; ?>";
			var currentPageSourceURL = "<?php echo $_SERVER['REQUEST_URI']; ?>";

			$.ajax({

				url: "/update_friends_online_activity_status.php",
				method: "GET",
				data: {

					userAFK: userAFK,
					currentPageSourceURL: currentPageSourceURL

				},
				success: function(data) {



				}

			});

		}

		function resetAFKTimer() {

			var userAFK = "<?php echo $_COOKIE['username']; ?>";
			var currentPageSourceURL = "<?php echo $_SERVER['REQUEST_URI']; ?>";
			var afkFalse = true;

			window.clearTimeout(timeoutAFKId);
			startAFKTimer();

			$.ajax({

				url: "/update_friends_online_activity_status.php",
				method: "GET",
				data: {

					userAFK: userAFK,
					afkFalse: afkFalse,
					currentPageSourceURL: currentPageSourceURL

				},
				success: function(data) {



				} 

			});

		}

		function setupAFKTimers() {

			document.addEventListener("mousedown", resetAFKTimer, false);
			document.addEventListener("keypress", resetAFKTimer, false);
			document.addEventListener("touchmove", resetAFKTimer, false);

		}

		window.onload = function() {

			setupAFKTimers();

		}

		$(document).on("click", "#my_online_activity_status_options_inner_div_each_online", function() {

			var onlineType = 1;

			$.ajax({

				url: "/update_custom_online_status_activity_type.php",
				method: "GET",
				data: {

					onlineType: onlineType

				},
				success: function(data) {

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

						}

					};

					xhttp.open("GET", "/current_online_activity_status_type.php", true);

					xhttp.send();

					$("#my_online_activity_status_options_div").css("height", "250px");

					$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

					$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
					$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

					$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom" style="position: absolute;"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

					$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

				}

			});

		});

		$(document).on("click", "#my_online_activity_status_options_inner_div_each_away", function() {

			var awayType = 2;

			$.ajax({

				url: "/update_custom_online_status_activity_type.php",
				method: "GET",
				data: {

					awayType: awayType

				},
				success: function(data) {

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

						}

					};

					xhttp.open("GET", "/current_online_activity_status_type.php", true);

					xhttp.send();

					$("#my_online_activity_status_options_div").css("height", "250px");

					$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

					$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
					$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

					$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom" style="position: absolute;"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

					$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

				}

			});

		});

		$(document).on("click", "#my_online_activity_status_options_inner_div_each_do_not_disturb", function() {

			var doNotDisturbType = 3;

			$.ajax({

				url: "/update_custom_online_status_activity_type.php",
				method: "GET",
				data: {

					doNotDisturbType: doNotDisturbType

				},
				success: function(data) {

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

						}

					};

					xhttp.open("GET", "/current_online_activity_status_type.php", true);

					xhttp.send();

					$("#my_online_activity_status_options_div").css("height", "250px");

					$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

					$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
					$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

					$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom" style="position: absolute;"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

					$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

				}

			});

		});

		$(document).on("click", "#my_online_activity_status_options_inner_div_each_invisible", function() {

			var invisibleType = 4;

			$.ajax({

				url: "/update_custom_online_status_activity_type.php",
				method: "GET",
				data: {

					invisibleType: invisibleType

				},
				success: function(data) {

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

						}

					};

					xhttp.open("GET", "/current_online_activity_status_type.php", true);

					xhttp.send();

					$("#my_online_activity_status_options_div").css("height", "250px");

					$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

					$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
					$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

					$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom" style="position: absolute;"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

					$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

				}

			});

		});

		setInterval(function() {

			if (replyActive) {

				clearInterval(refreshMessageContainerInterval);

			} else {

				updateAllNewMessagesEachPage();

			}

		}, 3000);

		$(document).on("click", ".message_content_messages_notifications_each_page_div_for_each_reply", function() {

			clearInterval(refreshMessageContainerInterval);

			replyActive = true;

			var replyMessageID = $(this).attr("id");
			var messageDivContainer = $(this).data("messagedivcontainerid");
			var closeMessageSpan = $(this).data("closemessagespan");
			var messageFriendUsername = $(this).data("messagefriendusername");
			var messageContent = $(this).data("messagecontent");
			var replyMessage = $(this).data("messagereply");
			var toUserId = $(this).data("touserid");
			var messageID = $(this).data("messageid");

			$("#" + replyMessage).hide();
			$("#" + messageDivContainer).css("height", "10vw");
			$("#" + closeMessageSpan).css("right", "3.5%");
			$("#" + closeMessageSpan).css("top", "-6%");
			$("#" + messageFriendUsername).css("top", "2%");
			$("#" + messageContent).css("top", "21%");
			$("#" + messageContent).css("-webkit-line-clamp", "2");
			$("#" + messageContent).css("display", "-webkit-box");
			$("#" + messageContent).css("-webkit-box-orient", "vertical");
			$("#" + messageContent).css("width", "75%");
			$("#" + messageContent).css("white-space", "normal");
			$("#" + messageContent).css("-webkit-box-orient", "vertical");
			$("#" + messageDivContainer).append('<form id="reply_to_message_form_' + replyMessageID + '" class="reply_to_message_form" method="post" data-touserid="' + toUserId + '" data-messagereplyid="' + replyMessageID + '"><input type="text" id="reply_to_message_text_field_' + replyMessageID + '" class="reply_to_message_text_field" maxlength="300" name="reply_to_message_text_field" placeholder="Type away..." data-messagereplyid="' + messageID + '" /><input type="submit" name="reply_to_message_submit" id="reply_to_message_submit_' + replyMessageID + '" class="reply_to_message_submit" value="Send!" /></form>');

			$("#reply_to_message_text_field_" + replyMessageID).focus();

		});

		$("html").on("submit", ".reply_to_message_form", function(e) {

			e.preventDefault();

			var toUserId = $(this).data("touserid");
			var replyMessageID = $(this).data("messagereplyid");

			var messageReplyContent = $("#reply_to_message_text_field_" + replyMessageID).val();
			var messageReplyContentTrimmed = messageReplyContent.trim();
			var messageReplyContentTrimmedLength = messageReplyContentTrimmed.length;

			if (messageReplyContentTrimmed === "" || messageReplyContentTrimmedLength == 0) {

				var messageReplyInputField = document.querySelector("#reply_to_message_text_field_" + replyMessageID);
				messageReplyInputField.style.border = "2.5px solid red";
				messageReplyInputField.placeholder = "Message can't be empty!";
				messageReplyInputField.style.fontSize = "1.15vw";
				messageReplyInputField.value = "";

			} else {

				var messageContentRepliedContent = $("#reply_to_message_text_field_" + replyMessageID).val();

				$.ajax({

					url: "/message_notifications_each_page_reply.php",
					method: "GET",
					data: {

						messageContentRepliedContent: messageContentRepliedContent,
						toUserId: toUserId

					},
					success: function(data) {

						replyActive = false;

						updateAllNewMessagesEachPage();

					}

				});

			}

		});

		function fetchAllNewFeedNotifications() {

			$.ajax({

				url: "/fetch_all_new_feed_notifications_each_page.php",
				method: "GET",
				success: function(data) {

					$("#feed_notifications_each_page_main_div").html(data);

				}

			});

		}

		function updateAllNewFeedNotifications() {

			$("#feed_notifications_each_page_main_div").each(function() {

				fetchAllNewFeedNotifications();

			});

		}

		function closeNewFeedNotificationsDiv(feedNotificationsId, feedTypeId, feedTypeAction) {

			var feedNotificationDiv = document.getElementById("feed_notifications_each_page_div_for_each_" + feedNotificationsId + "");

			var feedNotificationDivId = feedNotificationDiv.id;

			feedNotificationDiv.remove();

			$.ajax({

				url: "/closed_new_feed_notification.php",
				method: "GET",
				data: {

					feedNotificationsId: feedNotificationsId,
					feedTypeId: feedTypeId,
					feedTypeAction: feedTypeAction

				},
				success: function(data) {

					

				}

			});

		}

		$(document).on("click", "#my_online_activity_status_options_inner_div_each_custom", function() {

			$("#my_online_activity_status_options_div").css("height", "285px");

			$("#my_online_activity_status_options_inner_div_each_custom_inner_div").css("display", "none");

			$("#my_online_activity_status_options_inner_div_each_custom").attr("id", "my_online_activity_status_options_inner_div_each_custom_opened");

			$("#my_online_activity_status_options_inner_div_each_custom_opened").html('<div id="my_online_activity_status_options_inner_div_each_custom_inner_div_field_div" class="my_online_activity_status_options_inner_div_each_custom_inner_div_field_div"><input type="text" name="custom_activity_status_field" id="custom_activity_status_field" class="custom_activity_status_field" maxlength="15" placeholder="Type away..." /><span id="close_custom_activity_status_field" class="close_custom_activity_status_field">&times</span><button id="custom_activity_status_field_button" class="custom_activity_status_field_button" style="cursor: default;">Set custom status!</button></div>');

			$("#my_online_activity_status_options_inner_div_each_custom_opened").css("opacity", "1");
			$("#my_online_activity_status_options_inner_div_each_custom_opened").css("cursor", "default");

			$("#custom_activity_status_field").focus();

		});

		$(document).on("click", "#close_custom_activity_status_field", function() {

			$("#my_online_activity_status_options_div").css("height", "250px");

			$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

			$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
			$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

			$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

			$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

		});

		$(document).on("click", "#custom_activity_status_field_button", function() {

			var customType = 5;
			var noCustomStatus = 0;

			var customActivityStatusContent = $("#custom_activity_status_field").val();
			var customActivityStatusContentTrimmed = customActivityStatusContent.trim();
			var customActivityStatusContentTrimmedLength = customActivityStatusContentTrimmed.length;

			var customActivityStatusField = document.getElementById("custom_activity_status_field");
			customActivityStatusField.style.border = "2.5px solid #777EB8";

			if (customActivityStatusContentTrimmed === "" || customActivityStatusContentTrimmedLength == 0) {

				$.ajax({

					url: "/update_custom_online_status_activity_type.php",
					method: "GET",
					data: {

						customType: customType,
						customActivityStatusContent: customActivityStatusContent,
						noCustomStatus: noCustomStatus

					},
					success: function(data) {

						$.ajax({

							url: "/update_last_activity.php",
							method: "GET",
							data: {

								customActivityStatusContent: customActivityStatusContent

							},
							success: function(data) {

								var xhttp = new XMLHttpRequest();

								xhttp.onreadystatechange = function() {

									if (this.readyState == 4 && this.status == 200) {

										document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

									}

								};

								xhttp.open("GET", "/current_online_activity_status_type.php", true);

								xhttp.send();

								$("#my_online_activity_status_options_div").css("height", "250px");

								$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

								$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
								$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

								$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

								$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

							}

						})

					}

				});

			} else {

				$.ajax({

					url: "/update_custom_online_status_activity_type.php",
					method: "GET",
					data: {

						customType: customType,
						customActivityStatusContent: customActivityStatusContent

					},
					success: function(data) {

						$.ajax({

							url: "/update_last_activity.php",
							method: "GET",
							data: {

								customActivityStatusContent: customActivityStatusContent

							},
							success: function(data) {

								var xhttp = new XMLHttpRequest();

								xhttp.onreadystatechange = function() {

									if (this.readyState == 4 && this.status == 200) {

										document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

									}

								};

								xhttp.open("GET", "/current_online_activity_status_type.php", true);

								xhttp.send();

								$("#my_online_activity_status_options_div").css("height", "250px");

								$("#my_online_activity_status_options_inner_div_each_custom_inner_div_field_div").css("display", "none");

								$("#my_online_activity_status_options_inner_div_each_custom_opened").attr("id", "my_online_activity_status_options_inner_div_each_custom");
								$("#my_online_activity_status_options_inner_div_each_custom").attr("class", "my_online_activity_status_options_inner_div_each");

								$("#my_online_activity_status_options_inner_div_each_custom").html('<span id="my_online_activity_status_options_each_custom"></span><p id="my_online_activity_status_options_each_custom_label">Custom</p>');

								$("#my_online_activity_status_options_inner_div_each_custom").removeAttr("style");

							}

						})

					}

				});

			}

		});
		
	</script>

<?php endif ?>

<script type="text/javascript">

	window.addEventListener("load", function() {

		window.wpcc.init({

			"colors": {

				"popup": {

					"background": "#777eb8",
					"text": "#ffffff",
					"border": "#ffffff"

				},

				"button": {

					"background": "#5b60a3",
					"text": "#ffffff"

				}

			},

			"position": "top",
			"pushdown": true,
			"content": {

				"button": "Got it!",
				"link": "Learn more",
				"message": "SickGamez uses cookies in order to provide the best possible experience for its users!"

			}

		});

	});

	$(document).ready(function() {

		$(this).scrollTop(0);
		$(this).scrollLeft(0);

	});
	
	function openNav() {

		document.getElementById("sideNav").style.width = "200px";
		document.getElementById("social_media_buttons").style.visibility = "visible";

	}

	function closeNav() {

		document.getElementById("sideNav").style.width = "0px";
		document.getElementById("social_media_buttons").style.visibility = "hidden";

	}

	setTimeout(function() {

		$("#password_changed_succesfully").fadeOut(300);

	}, 2000);

</script>

<?php } ?>

</html>