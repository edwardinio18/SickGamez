<?php

	include("server.php");
	include_once("/Applications/XAMPP/xamppfiles/htdocs/SickGamez/Account/colors.inc.php");
	include_once("/Applications/XAMPP/xamppfiles/htdocs/SickGamez/Account/Color.php");

	use Mexitek\PHPColors\Color;

	$username = "";

	if (isset($_GET['username'])) {

		$username = $_GET['username'];

	}

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$userID = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_GET['username']) {

				$userID = $row['id'];

			}

		}

		$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($numberOfFeedPostsQuery);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$numberOfFeedPostsQueryResult = $stmt->get_result();

	}

	$userNotFound = "User doesn't exist!";
	$profileNotAccessible = "User feed can't be accessed!";
	$profileAndUserError = "Error";

	$myFeedPostsList = "";
	$feedPostsCounter = 0;
	$myFeedPostsListForOthers = "";
	$feedPostsListEmptyForOthers = "";
	$feedPostsListEmpty = "";

?>

<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<script type="text/javascript" src="/Wheel_of_fortune/Winwheel.js"></script>

	<link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

	<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<link rel="icon" type="image/jpg" href="favicon.jpg" />

  	<link rel="apple-touch-icon" type="image/jpg" href="favicon.jpg" />

  	<meta name="description" content="Your SickGamez gamez list!" />

  	<meta name="keywords" content="SickGamez, Sickgamez, sickGamez, sickgamez, sick, gamez, games, website, games website, gamez website, gamers" />
  
  	<meta name="author" content="Edward Iakab & Toni Rad" />

	<title>SickGamez</title>

	<style type="text/css">
		
		body {

	      background: #1d1f20;
	      cursor: default;
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

	    #feed_label {

	    	text-align: center;
	        font-size: 7vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 100%;
	        margin-top: -2.5%;

	    }

	    #feed_label_for_others {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        margin-top: -2.5%;
	        display: inline-block;

	    }

	    #feed_label_for_others_2 {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        margin-top: -2.5%;
	        display: inline-block;

	    }

	    @keyframes fade_in {

	    	from {

	        	opacity: 0;

	      	}

	    	to {

	        	opacity: 1;

	      	}

	    }

	    #menu_line_break {

	    	width: 85%;
	    	height: 0.05px;
	    	margin: auto;
	    	background-color: gray;

	    }

	    #logged_in_menu_username {

	    	color: silver;
	    	text-align: center;
			font-size: 21px;
			margin: 0;
			cursor: default;
			display: inline-block;
			margin-top: 2%;

	    }

	    #logged_in_menu_username_2 {

	    	color: silver;
	    	text-align: center;
			font-size: 21px;
			margin: auto;
			cursor: default;
			display: inline-block;
			margin-top: 2%;

	    }

	    #profile_and_user_error_label {

	    	text-align: center;
	        font-size: 7vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: -2.5%;

	    }

		#profile_not_accessible {

	    	text-align: center;
	        font-size: 5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: 7.5%;

	    }

		#user_not_found {

	    	text-align: center;
	        font-size: 5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: 1%;

	    }

	    #back_arrow_link {

	    	cursor: default;
	    	opacity: 0.5;
	    	transition: 0.2s all ease;

	    }

	    #back_arrow_link:hover {

	    	opacity: 1;
			color: transparent;
			background: transparent;
			text-decoration: none;

	    }

	    #back_arrow_image {

	    	width: 5vw;

	    }

	    #back_arrow_div {

	    	position: fixed;
	    	bottom: 1.8%;
	    	left: 1%;

	    }

	    #or_label {

	    	color: white;
	    	font-size: 3.2vw;
	    	font-family: Austere;
			margin: auto;
			text-align: center;
			animation: fade_in 2s ease;

	    }

	    #number_of_feed_posts {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.5vw;
	    	margin-top: 2.5vw;
	    	font-family: Pixelony;

	    }

	    .followers_div {

	    	position: relative;
	    	width: 70vw;
	    	height: 7.5vw;
	    	margin: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	margin-top: 2%;
	    	margin-left: 7.5vw;

	    }

	    .profile_pic_display_followers {

	    	position: absolute;
	    	width: 6.25vw;
	    	height: 6.25vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-left: 1%;

	    }

	    .follower_username_div {

	    	width: intrinsic;
			width: -webkit-fit-content;
			margin-left: 12%;
			margin-top: 2.25%;
			padding: 0.3vw;

	    }

	    .follower_username {

	    	color: white;
			font-family: GomGom;
			font-size: 2.5vw;
			width: intrinsic;
			width: -webkit-fit-content;
			word-wrap: break-word;
			text-align: left;

	    }

	    .follower_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    #remove_follower {

	    	position: absolute;
	    	right: 0;
	    	top: 0;
	    	height: 100%;
	    	width: 20vw;
			border-radius: 1vw;
	    	background-color: transparent;
	    	border: 2px solid #777EB8;
	    	color: grey;
	    	font-family: GomGom;
	    	font-size: 2.8vw;
	    	cursor: default;
	    	margin-right: -30.75%;

	    }

	    #remove_follower:active {

	    	background-color: white;

	    }

	    #no_feed_posts_found {

	    	text-align: center;
	    	color: white;
	    	font-size: 3vw;
	    	font-family: Pixelony;
	    	width: 75%;
	    	margin: auto;
	    	margin-top: 11vw;

	    }

	    #no_feed_posts_found_for_others {

	    	text-align: center;
	    	color: white;
	    	font-size: 3vw;
	    	font-family: Pixelony;
	    	width: 75%;
	    	margin: auto;
	    	margin-top: 11vw;

	    }

	    #number_of_feed_posts_for_others {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.5vw;
	    	margin-top: 2.5vw;
	    	font-family: Pixelony;

	    }

	    .followers_div_for_others {

	    	position: relative;
	    	width: 70vw;
	    	height: 7.5vw;
	    	margin: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	margin-top: 2%;

	    }

	    .profile_pic_display_followers_for_others {

	    	position: absolute;
	    	width: 6.25vw;
	    	height: 6.25vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-left: 1%;

	    }

	    .follower_username_div_for_others {

	    	width: intrinsic;
			width: -webkit-fit-content;
			margin-left: 12%;
			margin-top: 2.25%;
			padding: 0.3vw;

	    }

	    .follower_username_for_others {

	    	color: white;
			font-family: GomGom;
			font-size: 2.5vw;
			width: intrinsic;
			width: -webkit-fit-content;
			word-wrap: break-word;
			text-align: left;

	    }

	    .follower_user_link_for_others:hover {

	    	text-decoration: underline;
	    	color: white;

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

	    #logged_in_menu_user_coin_div {

			width: 100%;
			height: 50px;
			text-align: center;
			margin: auto;
			margin-top: 10px;
			position: relative;
			margin-bottom: -10px;
			cursor: default;

        }

        #logged_in_menu_user_coin_div:hover #logged_in_menu_user_coin_image {

        	filter: grayscale(0%);

        }

        #logged_in_menu_user_coin_image {

			width: 35px;
			height: 35px;
			margin: auto;
			vertical-align: middle;
			filter: grayscale(100%);
			margin-top: -10px;

        }

        #logged_in_menu_user_coin_amount {

			text-align: center;
			font-size: 30px;
			font-family: GomGom;
			cursor: default;
			color: white;
			display: inline;
			margin-left: 2.5%;
			cursor: default;

        }

        #logged_in_menu_user_inner_coin_div {

			height: 50px;
			text-align: center;
			margin: auto;
			position: relative;
			cursor: default;

        }

        #logged_in_menu_username_div {

	    	width: 100%;
	    	height: -webkit-fit-content;
	    	margin: auto;
	    	text-align: center;
	    	margin-top: -10%;
	    	cursor: default;

	    }

	    #feed_label_for_others_div {

	    	width: 100%;
	    	margin: auto;
	    	text-align: center;
	    	cursor: default;
	    	display: inline-block;

	    }

	    .wheel_of_fortune_canvas {

            width: 50vw;
            height: 50vw;
            position: absolute;
            z-index: 5;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;

        }

        #wheel_of_fortune_spin_button {

            width: 12.5vw;
            height: 12.5vw;
            position: absolute;
            z-index: 5;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            border: 0.35vw solid #777EB8;
            border-radius: 100%;
            font-family: Pixelony;
            font-size: 3vw;
            color: grey;
            background-color: black;

        }

        #wheel_of_fortune_spin_button:active {

            outline: none;
            background-color: white;

        }

        #wheel_of_fortune_spin_button:focus {

            outline: none;

        }

        #wheel_of_fortune_prize_won_paragraph {

            width: 40vw;
            height: 5vw;
            position: absolute;
            z-index: 8;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            font-family: Pixelony;
            font-size: 2.35vw;
            color: green;
            padding: 1vw;
            background-color: darkgray;
            border-radius: 1vw;
            cursor: default;

        }

        #wheel_of_fortune_prize_won_paragraph_2 {

            width: 30vw;
            height: 7vw;
            position: absolute;
            z-index: 7;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            font-family: Pixelony;
            font-size: 1.8vw;
            color: green;
            padding: 1vw;
            background-color: darkgray;
            border-radius: 1vw;
            cursor: default;
            margin-top: 10%;

        }

        #wheel_of_fortune_inner_paragraph_div {

            display: block;

        }

        #wheel_of_fortune_arrow_image {

            width: 12vw;
            height: 12vw;
            position: absolute;
            z-index: 6;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            margin-top: 10%;
            filter: brightness(0) invert(1);
            padding-top: 9vw;
            padding-left: 4.5vw;
            padding-right: 4.5vw;

        }

        #wheel_of_fortune_arrow_image:hover {

            cursor: pointer;

        }

        #wheel_of_fortune_arrow_image:active ~ #wheel_of_fortune_spin_button {

            background-color: white;

        }

        #wheel_of_fortune_arrow_image:active {

            filter: brightness(1) invert(0);

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

	    #main_outer_feed_div {

			width: 75vw;
			height: auto;
			margin: auto;
			margin-top: 7.5%;

		}

		#main_outer_feed_div_for_others {

			position: relative;
			width: 75vw;
			height: auto;
			margin: auto;
			margin-top: 7.5%;

		}

		.main_outer_feed_div_for_each {

			position: relative;
			width: 62.5%;
			height: auto;
			margin: auto;
			margin-top: -7%;
			margin-bottom: 10%;

		}

		.top_feed_div_for_each {

			position: relative;
			width: 100%;
			height: 13%;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-bottom: 2.5px solid #777EB8;
			border-top-left-radius: 1vw;
			border-top-right-radius: 1vw;

		}

		.main_center_image_feed_div_for_each {

			position: relative;
			width: 100%;
			height: auto;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;

		}

		.profile_picture_display_feed_div_for_each {

			width: 4vw;
			height: 4vw;
			border-radius: 100%;
			top: 0;
			bottom: 0;
			left: 0.75%;
			margin: auto;
			margin-top: 0.25vw;
			margin-bottom: 0.25vw;
			margin-left: 0.25vw;

		}

		.username_feed_div_for_each {

			color: white;
			font-family: GomGom;
			font-size: 1.75vw;
			position: absolute;
			left: 10%;
			top: 20%;
			cursor: default;

		}

		.username_feed_div_for_each:hover {

			text-decoration: underline;
			cursor: pointer;

		}

		.follow_user_button_div_for_each {

			color: grey;
			font-family: Pixelony;
			background-color: #1d1f20;
			float: right;
			position: absolute;
			right: 1%;
			top: 0;
			bottom: 0;
			margin: auto;
			height: 2.75vw;
			width: 8.5vw;
			outline: none;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			font-size: 1.25vw;

		}

		.follow_user_button_div_for_each:active {

			background-color: white;
			outline: none;

		}

		.follow_user_button_div_for_each:focus {

			outline: none;

		}

		.bottom_feed_div_for_each {

			position: relative;
			width: 100%;
			height: 12%;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-bottom: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-top: 2.5px solid #777EB8;
			border-bottom-left-radius: 1vw;
			border-bottom-right-radius: 1vw;
			padding: 0.3vw;

		}

		.feed_image_content_div_for_each_image {

			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 99.9%;

		}

		.feed_image_content_div_for_each_image:hover {

			opacity: 0.6;
			cursor: pointer;

		}

		.bottom_feed_div_caption_for_each {

			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			width: 97.5%;
			word-break: break-word;
			margin: 0;
			margin-left: 0.75%;
			cursor: default;
			margin-top: 0.5vw;

		}

		.bottom_feed_div_time_and_date_added_for_each {

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

		#form_outer_submit_feed_post_div {

			width: 100%;
			margin: auto;
			text-align: center;
			position: absolute;
			bottom: 1%;

		}

		#form_outer_submit_feed_post_div_line_break {

			width: 55%;
			background-color: gray;
			height: 0.05vw;
			margin: auto;
			margin-top: 4%;
			opacity: 0.35;

		}

		#submit_feed_post_caption_textarea {

			resize: none;
			width: 41vw;
			height: 8vw;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			font-size: 1.25vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			padding-left: 0.6vw;
			float: left;
			padding-top: 0.25vw;
			margin-left: 0.75%;

	    }

	    #submit_feed_post_caption_textarea:focus {

	    	background-color: white;

	    }

	    #submit_feed_post_caption_submit_button {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 3.85vw;
			width: 7.5vw;
			font-size: 1.7vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			cursor: default;
			margin-top: 4%;

	    }

	    #submit_feed_post_caption_submit_button:active {

	    	background-color: white;

	    }

	    #upload_feed_post_image {

			opacity: 0;
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			width: 0;
			height: 0;

		}

		.upload_feed_post_label {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 3.85vw;
			width: 7.5vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			cursor: default;
			margin: 0;

		}

		#submit_and_image_form_inner_div {

			position: absolute;
			width: 6.5vw;
			height: 6vw;
			margin-left: 23%;
			margin-top: 0.5%;

		}

		#upload_feed_post_image_span_image {

			width: 3.5vw;
			filter: invert(1);
			opacity: 0.5;

		}

		.upload_feed_post_label:active {

			background-color: white;

		}

		#upload_feed_post_image_label_span {

			display: inline-block;
			vertical-align: middle;
			text-align: center;

		}

		.upload_feed_post_label:active > #upload_feed_post_image_label_span {

	    	filter: invert(1);
			opacity: 1;

	    }

	    #submit_feed_post_inner_div {

			display: grid;
			position: relative;
			right: 0.7%;
			float: right;

	    }

	    #submit_feed_post_form {

	    	display: contents;

	    }

	    #submit_feed_post_image_preview_div {

			display: none;
			position: absolute;
			width: 91%;
			height: 33vw;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-left: 2.5px solid #777EB8;
			border-top-right-radius: 1vw;
			border-top-left-radius: 1vw;
			background-color: #1d1f20;
			padding: 1%;
			z-index: 1000;
			margin-top: -66.5%;
			margin-left: 4.5%;

	    }

	    #submit_feed_post_image_preview_display {

			position: absolute;
			max-width: 90%;
			max-height: 90%;
			width: initial;
			height: auto;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			border-radius: 0.75vw;

	    }

	    .close_zoomed_in_submit_feed_post_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -2.25%;

	    }

	    .close_zoomed_in_submit_feed_post_image_cover_div_modal:hover, .close_zoomed_in_submit_feed_post_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #no_uploaded_feed_post_image {

			display: none;
			position: absolute;
			color: red;
			font-family: Pixelony;
			font-size: 1.35vw;
			z-index: 1000;
			margin-top: -1%;
			cursor: default;
			text-align: center;
			left: 0;
			right: 0;
			margin: auto;
			margin-top: -5%;

	    }

	    .no_uploaded_feed_post_image_label {

	    	border: 2.5px solid red;

	    }

	    .uploaded_image_too_large {

	    	border: 2.5px solid red;

	    }

	    #uploaded_image_too_large_error {

			display: none;
			color: red;
			font-family: Pixelony;
			font-size: 1.35vw;
			z-index: 1000;
			margin-top: -7.5%;
			cursor: default;
			text-align: center;

	    }

	    #no_feed_found {

			color: white;
			font-family: Pixelony;
			font-size: 2.5vw;
			text-align: center;
			margin-top: 15%;
			margin-bottom: 20%;
			cursor: default;

	    }

	    .zoomed_in_feed_post_image_cover_div {

			display: none;
			position: fixed;
			z-index: 9;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			opacity: 1;

	    }

	    .close_zoomed_in_feed_post_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -1%;

	    }

	    .close_zoomed_in_feed_post_image_cover_div_modal:hover, .close_zoomed_in_feed_post_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .unfollow_user_button_div_for_each {

			color: grey;
			font-family: Pixelony;
			background-color: #1d1f20;
			float: right;
			position: absolute;
			right: 1%;
			top: 0;
			bottom: 0;
			margin: auto;
			height: 2.75vw;
			width: 9vw;
			outline: none;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			font-size: 1.25vw;
			opacity: 1;

		}

		.unfollow_user_button_div_for_each:active {

			background-color: white;
			outline: none;

		}

		.unfollow_user_button_div_for_each:focus {

			outline: none;

		}

		.delete_feed_post_bin_image {

			width: 2.75vw;
			height: 2.75vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			right: 1.5%;
			filter: grayscale(100%);

	    }

	    .delete_feed_post_bin_image:hover {

	    	filter: grayscale(0%);
	    	cursor: pointer;

	    }

	    #confirm_delete_feed_post_modal_container {

	    	display: none;
			position: fixed;
			z-index: 1;
			padding-top: 13.25%;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;

	    }

	    #confirm_delete_feed_post_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid red;
			border-radius: 1vw;
			width: 30%;
			height: 20vw;
			position: relative;

	    }

	    .close_confirm_delete_feed_post_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4%;
			right: 2%;
			height: 0%;

	    }

	    .close_confirm_delete_feed_post_modal:hover, .close_confirm_delete_feed_post_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #confirm_delete_feed_post_inner_modal_title {

			color: white;
			float: left;
			font-size: 2.05vw;
			position: absolute;
			top: 17%;
			font-family: GomGom;
			cursor: default;
			text-align: center;

	    }

	    #yes_no_confirm_delete_feed_post_form_div {

			width: 100%;
			height: 7vw;
			position: absolute;
			bottom: 0;

	    }

	    .yes_confirm_delete_feed_post_button {

			width: 46%;
			height: 90%;
			position: absolute;
			left: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .yes_confirm_delete_feed_post_button:active {

	    	background-color: white;

	    }

	    .no_confirm_delete_feed_post_button {

	    	width: 46%;
			height: 90%;
			position: absolute;
			right: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .no_confirm_delete_feed_post_button:active {

	    	background-color: white;

	    }

	    .bottom_feed_like_div_for_each {

	    	position: absolute;
	    	width: 50%;
	    	height: 2vw;

	    }

	    #scroll_down_arrow_image {

	    	width: 5vw;
			transform: rotate(-90deg);
			cursor: default;
	    	opacity: 0.5;
	    	transition: 0.2s all ease;

	    }

	    #scroll_down_arrow_image:hover {

	    	opacity: 1;

	    }

	    #scroll_up_arrow_image {

	    	display: inline-block;
	    	width: 5vw;
			transform: rotate(90deg);
			cursor: default;
	    	opacity: 0.5;
	    	transition: 0.2s all ease;

	    }

	    #scroll_up_arrow_image:hover {

	    	opacity: 1;

	    }

	    #scroll_down_up_arrow_div {

	    	position: fixed;
	    	bottom: 1.8%;
	    	left: 1%;

	    }

	    #submit_feed_post_modal_container {

			display: none;
			position: fixed;
			z-index: 1;
			padding-top: 3.5%;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background: rgba(0, 0, 0, 0.25);

	    }

	    #submit_feed_post_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			width: 50%;
			height: 45vw;
			position: relative;

	    }

	    .close_submit_feed_post_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3vw;
			font-weight: bold;
			position: absolute;
			top: -2.75%;
			right: 0.5%;
			height: 0%;

	    }

	    .close_submit_feed_post_modal:hover, .close_submit_feed_post_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #submit_feed_post_main_outer_div_bottom {

			position: fixed;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-top-left-radius: 1vw;
			border-top-right-radius: 1vw;
			width: 50%;
			height: 6vw;
			background-color: #1d1f20;

	    }

	    #submit_feed_post_main_outer_div_bottom:active {

	    	background-color: white;

	    }

	    #submit_feed_post_main_outer_div_bottom_plus_image {

	    	position: absolute;
	    	width: 4.75vw;
	    	height: 4.75vw;
	    	top: 0;
	    	bottom: 0;
	    	left: 1.5%;
	    	margin: auto;

	    }

	    #submit_feed_post_main_outer_div_bottom_main_text {

	    	color: grey;
	    	font-family: GomGom;
	    	font-size: 2.75vw;
	    	cursor: default;
	    	letter-spacing: 0.05vw;
	    	text-align: center;
	    	margin-top: 1.5%;

	    }

	    .comment_feed_div_for_each {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			opacity: 0.5;
			margin: 0;
			cursor: default;
			margin-left: 0.5%;
			margin-top: 0.35%;
			width: 0vw;
			display: inline;

	    }

	    .comment_feed_div_for_each:hover {

	    	opacity: 1;
	    	cursor: pointer;

	    }

	    .comment_feed_post_modal_container {

			display: block;
			position: fixed;
			z-index: 1;
			padding-top: 5.5%;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background: rgba(0, 0, 0, 0.25);

	    }

	    .comment_feed_post_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			width: 50%;
			height: 40vw;
			position: relative;

	    }

	    .close_comment_feed_post_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -3.5%;
			right: 0.75%;
			height: 0%;

	    }

	    .close_comment_feed_post_modal:hover, .close_comment_feed_post_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .form_outer_comment_feed_post_div {

			width: 100%;
			margin: auto;
			text-align: center;
			position: absolute;
			bottom: 1%;

		}

		.comment_feed_post_textarea {

			resize: none;
			width: 41vw;
			height: 8vw;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			font-size: 1.25vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			padding-left: 0.6vw;
			float: left;
			padding-top: 0.25vw;
			margin-left: 0.75%;

	    }

	    .comment_feed_post_textarea:focus {

	    	background-color: white;

	    }

	    .comment_feed_post_submit_button {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 8vw;
			width: 7.5vw;
			font-size: 1.7vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			cursor: default;

	    }

	    .comment_feed_post_submit_button:active {

	    	background-color: white;

	    }

	    .feed_post_preview_div {

			position: absolute;
			width: 85%;
			height: 70%;
			left: 0;
			right: 0;
			margin: auto;
			top: 8%;
			overflow: auto;
			padding-bottom: 1vw;

	    }

	    .feed_post_preview_div_image_display {

			display: block;
			max-width: 100%;
			max-height: 100%;
			width: initial;
			height: auto;
			margin: auto;

	    }

	    .feed_post_preview_div_caption {

	    	position: relative;
			width: 100%;
			height: auto;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-bottom: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-top: 2.5px solid #777EB8;
			border-bottom-left-radius: 1vw;
			border-bottom-right-radius: 1vw;
			padding: 0.3vw;

	    }

	    .feed_post_preview_div_image_display_outer_main_div {

	    	border-left: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;

	    }

	    .top_feed_div {

			position: relative;
			width: 100%;
			height: 15%;
			margin: auto;
			border-left: 2.5px solid #777EB8;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-bottom: 2.5px solid #777EB8;
			border-top-left-radius: 1vw;
			border-top-right-radius: 1vw;

	    }

	    .feed_post_profile_picture_display_user {

			width: 3.25vw;
			height: 3.25vw;
			border-radius: 100%;
			top: 0;
			bottom: 0;
			left: 4%;
			margin: auto;
			margin-top: 0.25vw;
			margin-bottom: 0.25vw;
			margin-left: 0.3vw;

	    }

	    .feed_post_username {

			color: white;
			font-family: GomGom;
			font-size: 1.75vw;
			position: absolute;
			left: 9.5%;
			top: 14%;
			cursor: default;

		}

		.feed_post_username:hover {

			text-decoration: underline;
			cursor: pointer;

		}

		.comment_view_comments_feed_div_for_each_line_break {

			cursor: default;
			color: gray;
			margin-left: 0.5%;
			font-size: 1.5vw;
			font-style: italic;

		}

		.view_comments_feed_div_for_each {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			opacity: 0.5;
			margin: 0;
			cursor: default;
			margin-left: 0;
			margin-top: 0.35%;
			width: 0vw;
			display: inline;

	    }

	    .view_comments_feed_div_for_each:hover {

	    	opacity: 1;
	    	cursor: pointer;

	    }

	    .hide_comments_feed_div_for_each {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			opacity: 0.5;
			margin: 0;
			cursor: default;
			margin-left: 0;
			margin-top: 0.35%;
			width: 0vw;
			display: inline;

	    }

	    .hide_comments_feed_div_for_each:hover {

	    	opacity: 1;
	    	cursor: pointer;

	    }

	    .comments_feed_div_for_each_main_outer_div {

	    	display: none;
			position: relative;
			width: 100%;
			height: auto;
			margin-bottom: 1%;
			overflow: auto;
			max-height: 25vw;
			margin-top: 1%;

	    }

	    .comment_feed_div_for_each_main_div_for_each {

	    	position: relative;
	    	width: 80%;
	    	height: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
			margin-left: 0.75%;
			margin-top: 2.5%;

	    }

	    .profile_picture_display_comment_feed_div_for_each {

	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	left: 1%;
	    	margin: auto;

	    }

	    .comment_feed_div_for_each_username_link {

	    	color: white;
	    	cursor: default;
	    	text-decoration: none;

	    }

	    .comment_feed_div_for_each_username_link:hover {

	    	text-decoration: none;
	    	color: white;
	    	cursor: default;

	    }

	    .comment_feed_div_for_each_username {

			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			margin: 0;
			margin-left: 15%;
			width: fit-content;

	    }

	    .comment_feed_div_for_each_username:hover {

	    	cursor: pointer;
	    	text-decoration: underline;

	    }

	    .comment_feed_div_for_each_time_and_date {

	    	position: absolute;
	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.35vw;
	    	right: 1.5%;
	    	top: 1%;
	    	text-decoration: underline;
	    	cursor: default;

	    }

	    .comment_feed_div_for_each_content {

			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			margin-left: 15%;
			width: 83%;
			cursor: default;
			word-wrap: break-word;

	    }

	    .comment_view_comments_feed_div_for_each_inner_bottom_div {

	    	display: inline;

	    }

	    .feed_post_comments_delete_my_comment_image {

			width: 2.2vw;
			height: 2.2vw;
			position: absolute;
			top: 5%;
			margin: auto;
			right: -8%;
			filter: grayscale(100%);

	    }

	    .feed_post_comments_delete_my_comment_image:hover {

	    	filter: grayscale(0%);
	    	cursor: pointer;

	    }

	    .feed_post_comments_reply_delete_my_comment_image {

			width: 2.2vw;
			height: 2.2vw;
			position: absolute;
			top: 5%;
			margin: auto;
			right: -8%;
			filter: grayscale(100%);

	    }

	    .feed_post_comments_reply_delete_my_comment_image:hover {

	    	filter: grayscale(0%);
	    	cursor: pointer;

	    }

	    .confirm_delete_feed_post_comment_modal_container {

			position: fixed;
			z-index: 1;
			padding-top: 11.25%;
			left: 0;
			top: 2.5%;
			width: 100%;
			height: 100%;
			overflow: auto;

	    }

	    .confirm_delete_feed_post_comment_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid red;
			border-radius: 1vw;
			width: 30%;
			height: 20vw;
			position: relative;

	    }

	    .close_confirm_delete_feed_post_comment_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4%;
			right: 2%;
			height: 0%;

	    }

	    .close_confirm_delete_feed_post_comment_modal:hover, .close_confirm_delete_feed_post_comment_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .confirm_delete_feed_post_comment_inner_modal_title {

			color: white;
			float: left;
			font-size: 2.05vw;
			position: absolute;
			top: 17%;
			font-family: GomGom;
			cursor: default;
			text-align: center;

	    }

	    .yes_no_confirm_delete_feed_post_comment_form_div {

			width: 100%;
			height: 7vw;
			position: absolute;
			bottom: 0;

	    }

	    .yes_confirm_delete_feed_post_comment_button {

			width: 46%;
			height: 90%;
			position: absolute;
			left: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .yes_confirm_delete_feed_post_comment_button:active {

	    	background-color: white;

	    }

	    .no_confirm_delete_feed_post_comment_button {

	    	width: 46%;
			height: 90%;
			position: absolute;
			right: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .no_confirm_delete_feed_post_comment_button:active {

	    	background-color: white;

	    }

	    .feed_post_comments_each_div_comment_content_reply_me {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			position: absolute;
			right: -13%;
			top: 35%;
			cursor: default;
			opacity: 0.5;
			padding: 1vw;

	    }

	    .feed_post_comments_each_div_comment_content_reply_me:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

	    .feed_post_comments_each_div_comment_content_reply {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			position: absolute;
			right: -13%;
			top: 10%;
			cursor: default;
			opacity: 0.5;
			padding: 1vw;

		}

		.feed_post_comments_each_div_comment_content_reply:hover {

			cursor: pointer;
			opacity: 1;

		}

		.feed_post_comments_reply_each_div_comment_content_reply_me {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			position: absolute;
			right: -13%;
			top: 35%;
			cursor: default;
			opacity: 0.5;
			padding: 1vw;

	    }

	    .feed_post_comments_reply_each_div_comment_content_reply_me:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

	    .feed_post_comments_reply_each_div_comment_content_reply {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			position: absolute;
			right: -13%;
			top: 10%;
			cursor: default;
			opacity: 0.5;
			padding: 1vw;

	    }

	    .feed_post_comments_reply_each_div_comment_content_reply:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

		.comment_feed_post_reply_comment_modal_container {

			display: block;
			position: fixed;
			z-index: 1;
			padding-top: 12.5%;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background: rgba(0, 0, 0, 0.25);

	    }

	    .comment_feed_post_reply_comment_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			width: 50%;
			height: 30vw;
			position: relative;

	    }

	    .close_comment_feed_post_reply_comment_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -3.5%;
			right: 0.75%;
			height: 0%;

	    }

	    .close_comment_feed_post_reply_comment_modal:hover, .close_comment_feed_post_reply_comment_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .form_outer_comment_feed_post_reply_comment_post_div {

			width: 100%;
			margin: auto;
			text-align: center;
			position: absolute;
			bottom: 1%;

		}

		.comment_feed_post_reply_comment_textarea {

			resize: none;
			width: 41vw;
			height: 8vw;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			font-size: 1.25vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			padding-left: 0.6vw;
			float: left;
			padding-top: 0.25vw;
			margin-left: 0.75%;

	    }

	    .comment_feed_post_reply_comment_textarea:focus {

	    	background-color: white;

	    }

	    .comment_feed_post_reply_comment_submit_button {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 8vw;
			width: 7.5vw;
			font-size: 1.7vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			cursor: default;

	    }

	    .comment_feed_post_reply_comment_submit_button:active {

	    	background-color: white;

	    }

	    .comment_feed_post_reply_comment_preview_div {

			display: flex;
			justify-content: center;
			align-items: center;
			position: absolute;
			width: 100%;
			height: 50%;
			left: 0;
			right: 0;
			margin: auto;
			top: 12.5%;
			overflow: auto;

	    }

	    .comment_feed_post_reply_comment_div_for_each_main_div_for_each {

	    	position: relative;
	    	width: 80%;
	    	height: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
			margin-left: 0.75%;
			margin-top: 2.5%;

	    }

	    .profile_picture_display_comment_feed_post_reply_comment_div_for_each {

	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	left: 1%;
	    	margin: auto;

	    }

	    .comment_feed_post_reply_comment_div_for_each_username_link {

	    	color: white;
	    	cursor: default;
	    	text-decoration: none;

	    }

	    .comment_feed_post_reply_comment_div_for_each_username_link:hover {

	    	text-decoration: none;
	    	color: white;
	    	cursor: default;

	    }

	    .comment_feed_post_reply_comment_div_for_each_username {

			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			margin: 0;
			margin-left: 15%;
			width: fit-content;

	    }

	    .comment_feed_post_reply_comment_div_for_each_username:hover {

	    	cursor: pointer;
	    	text-decoration: underline;

	    }

	    .comment_feed_post_reply_comment_div_for_each_time_and_date {

	    	position: absolute;
	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.35vw;
	    	right: 1.5%;
	    	top: 1%;
	    	text-decoration: underline;
	    	cursor: default;

	    }

	    .comment_feed_post_reply_comment_div_for_each_content {

			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			margin-left: 15%;
			width: 83%;
			cursor: default;
			word-wrap: break-word;

	    }

	    .comment_feed_reply_div_for_each_main_div_for_each {

	    	position: relative;
	    	width: 80%;
	    	height: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
			margin-left: 8.5%;
			margin-top: 2.5%;

	    }

	    .profile_picture_display_comment_feed_reply_div_for_each {

	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	left: 1%;
	    	margin: auto;

	    }

	    .comment_feed_reply_div_for_each_username_link {

	    	color: white;
	    	cursor: default;
	    	text-decoration: none;

	    }

	    .comment_feed_reply_div_for_each_username_link:hover {

	    	text-decoration: none;
	    	color: white;
	    	cursor: default;

	    }

	    .comment_feed_reply_div_for_each_username {

			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			margin: 0;
			margin-left: 15%;
			width: fit-content;

	    }

	    .comment_feed_reply_div_for_each_username:hover {

	    	cursor: pointer;
	    	text-decoration: underline;

	    }

	    .comment_feed_reply_div_for_each_time_and_date {

	    	position: absolute;
	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.35vw;
	    	right: 1.5%;
	    	top: 1%;
	    	text-decoration: underline;
	    	cursor: default;

	    }

	    .comment_feed_reply_div_for_each_content {

			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			margin-left: 15%;
			width: 83%;
			cursor: default;
			word-wrap: break-word;

	    }

	    .feed_post_comments_each_div_comment_content_view_replies {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			opacity: 0.5;
			margin: 0;
			cursor: default;
			margin-left: 0;
			margin-top: 0.35%;
			display: inline;
			position: relative;
			left: -0.5%;
			padding: 1vw;

	    }

	    .feed_post_comments_each_div_comment_content_view_replies:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

	    .feed_post_comments_each_div_comment_content_hide_replies {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			font-style: italic;
			opacity: 0.5;
			margin: 0;
			cursor: default;
			margin-left: 0;
			margin-top: 0.35%;
			display: inline;
			position: relative;
			left: -0.5%;
			padding: 1vw;

	    }

	    .feed_post_comments_each_div_comment_content_hide_replies:hover {

	    	cursor: pointer;
	    	opacity: 1;

	    }

	    .confirm_delete_feed_post_comment_reply_modal_container {

			position: fixed;
			z-index: 1;
			padding-top: 11.25%;
			left: 0;
			top: 2.5%;
			width: 100%;
			height: 100%;
			overflow: auto;

	    }

	    .confirm_delete_feed_post_comment_reply_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid red;
			border-radius: 1vw;
			width: 30%;
			height: 20vw;
			position: relative;

	    }

	    .close_confirm_delete_feed_post_comment_reply_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4%;
			right: 2%;
			height: 0%;

	    }

	    .close_confirm_delete_feed_post_comment_reply_modal:hover, .close_confirm_delete_feed_post_comment_reply_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .confirm_delete_feed_post_comment_reply_inner_modal_title {

			color: white;
			float: left;
			font-size: 2.05vw;
			position: absolute;
			top: 17%;
			font-family: GomGom;
			cursor: default;
			text-align: center;

	    }

	    .yes_no_confirm_delete_feed_post_comment_reply_form_div {

			width: 100%;
			height: 7vw;
			position: absolute;
			bottom: 0;

	    }

	    .yes_confirm_delete_feed_post_comment_reply_button {

			width: 46%;
			height: 90%;
			position: absolute;
			left: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .yes_confirm_delete_feed_post_comment_reply_button:active {

	    	background-color: white;

	    }

	    .no_confirm_delete_feed_post_comment_reply_button {

	    	width: 46%;
			height: 90%;
			position: absolute;
			right: 2.5%;
			border: 2.5px solid red;
			border-radius: 1vw;
			background: transparent;
			color: grey;
			font-size: 3.5vw;
			font-family: GomGom;

	    }

	    .no_confirm_delete_feed_post_comment_reply_button:active {

	    	background-color: white;

	    }

	    .like_button_image {

	    	width: 2vw;
	    	height: 2vw;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	left: 6.5%;
	    	opacity: 0.5;

	    }

	    .like_button_image:hover {

	    	opacity: 1;

	    }

	    .feed_like_button_image {

	    	width: 2vw;
	    	height: 2vw;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	left: 6.5%;
	    	opacity: 0.5;

	    }

	    .feed_like_button_image:hover {

	    	opacity: 1;

	    }

	    #like_div {

	    	width: 30%;
	    	height: 100%;
	    	text-align: center;
	    	display: inline-block;
	    	vertical-align: middle;
	    	position: absolute;

	    }

	    #like_counter {

	    	width: auto;
	    	height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 50%;
			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			cursor: default;

	    }

	    .like_counter {

	    	width: auto;
	    	height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 50%;
			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			cursor: default;

	    }

	    #feed_like_counter {

	    	width: auto;
	    	height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 50%;
			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			cursor: default;

	    }

	    .feed_like_counter {

	    	width: auto;
	    	height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 50%;
			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			cursor: default;

	    }

	    .clicked {

	    	opacity: 1;

	    }

	    .unclicked {

	    	opacity: 0.5;

	    }

	    #funding_modal_container {

			display: block;
			position: fixed;
			z-index: 1;
			padding-top: 12.5%;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background: rgba(0, 0, 0, 0.25);

	    }

	    #funding_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			width: 50%;
			height: 27.5vw;
			position: relative;

	    }

	    #close_funding_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4.5%;
			right: 0.75%;
			height: 0%;

	    }

	    #close_funding_modal:hover, #close_funding_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #funding_main_title {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2.75vw;
	    	text-align: center;
	    	margin-top: 0.5%;
	    	cursor: default;

	    }

	    #funding_main_center_middle_div {

			position: relative;
			width: 90%;
			height: 70%;
			margin: auto;
			margin-top: 2.5%;

	    }

	    #funding_main_center_middle_label {

			color: white;
			font-family: GomGom;
			font-size: 2vw;
			cursor: default;
			text-align: center;
			margin-top: 5%;

	    }

	    #funding_main_center_down_arrow_image {

	    	width: 4.5vw;
	    	display: block;
	    	margin: auto;
	    	filter: invert(1);

	    }

	    #funding_main_center_link {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2.5vw;
	    	text-decoration: none;
	    	width: fit-content;
	    	text-align: center;

	    }

	    #funding_main_center_link:hover {

	    	text-decoration: underline;

	    }

	    #funding_main_center_link_label {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2.5vw;
	    	text-decoration: none;
	    	width: fit-content;
	    	text-align: center;

	    }

	    #funding_main_center_link_label:hover {

	    	text-decoration: underline;

	    }

	    #funding_main_center_link_main_outer_div {

	    	display: block;
	    	margin: auto;
			width: fit-content;

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

				<script type="text/javascript">

					function loadDoc3() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("logged_in_menu_user_coin_amount").innerHTML = this.responseText;

								}

							};

							xhttp.open("GET", "/coin_amount.php", true);

							xhttp.send();

						}, 3000);

					}

					function loadDoc4() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("my_online_activity_status_inner_div").innerHTML = this.responseText;

								}

							};

							xhttp.open("GET", "/current_online_activity_status_type.php", true);

							xhttp.send();

						}, 3000);

					}

					loadDoc3();

					loadDoc4();

				</script>

				<div id="logged_in_menu_username_div">

					<?php

						$customUsernameStylingTextContent = "";

						$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
						$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
						$myID = fetchMyID($_COOKIE['username'], $db);
						$customUsernameStylingTextId = 2;
						$customUsernameStylingTextActiveStatus = 1;
						$stmt->bind_param("sii", $myID, $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
						$stmt->execute();
						$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

						if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

							if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

								$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#logged_in_menu_username_2 {

												color: silver;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#logged_in_menu_username_2 {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>
					
					<p id="logged_in_menu_username">Logged in as </p> <p id="logged_in_menu_username_2"><?php echo $_COOKIE["username"]; ?></p>

				</div>

				<div id="logged_in_menu_user_coin_div">
					
					<div id="logged_in_menu_user_inner_coin_div">

						<img src="Images/gold_coin.png" id="logged_in_menu_user_coin_image" />

						<p id="logged_in_menu_user_coin_amount"></p>

					</div>

				</div>

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

	<?php if ($fpSG == 0) : ?>

  		<div id="funding_modal_container">

			<div id="funding_modal_content">

				<span id="close_funding_modal">&times;</span>

				<p id="funding_main_title">! Attention !</p>

				<div id="funding_main_center_middle_div">
					
					<p id="funding_main_center_middle_label">Hey there fellow SickGamer, we've officially launched our funding ( GoGetFunding ) page, go check it out! All donations are highly appreciated, thank you!</p>

					<img src="Images/down_arrow.png" id="funding_main_center_down_arrow_image" />

					<div id="funding_main_center_link_main_outer_div">
						
						<a href="https://gogetfunding.com/games-website-sickgamez-sickgamez-com" target="_blank" id="funding_main_center_link"><p id="funding_main_center_link_label">Click me!</p></a>

					</div>

				</div>

			</div>

		</div>

  	<?php endif ?>

	<?php if ($login == 1) : ?>

        <?php

            if ($wof == 0) {

                ?>

                    <div align="center" id="wheel_of_fortune_div" style="position: fixed; left: 0; right: 0; top: 0; bottom: 0; margin: auto; width: 50vw; z-index: 10;">

                        <table cellpadding="0" cellspacing="0" border="0" id="wheel_of_fortune_table" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; margin: auto; width: 50vw;">

                            <tr style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; margin: auto; width: 50vw;">

                                <td width="438" height="582" class="the_wheel" align="center" valign="center" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; margin: auto; width: 50vw;">

                                    <img src="Images/down_arrow.png" id="wheel_of_fortune_arrow_image" style="position: absolute; left: 0; right: 0; top: 50%; bottom: 0; margin: auto; margin-top: -12%; transform: rotate(180deg);" onclick="startSpin();" />

                                    <div id="wheel_of_fortune_inner_paragraph_div"></div>

                                    <canvas id="canvas" class="wheel_of_fortune_canvas" width="500" height="500" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; margin: auto; width: 50vw;"></canvas>

                                    <button id="wheel_of_fortune_spin_button" onclick="startSpin();" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0; margin: auto;">Spin!</button>

                                </td>

                            </tr>

                        </table>

                    </div>

                <?php

            }

        ?>

    <?php endif ?>

	<?php if ($login == 1) : ?>

  		<div id="messages_notifications_each_page_main_div"></div>

  		<div id="friend_requests_notifications_each_page_main_div"></div>

  		<div id="feed_notifications_each_page_main_div"></div>

  	<?php endif ?>

<?php

	if (isset($_GET['username'])) {

		$query = "SELECT * FROM users WHERE username = ?;";
		$stmt = $db->prepare($query);
		$username = $_GET['username'];
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				if ($login == 1 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie || $login == 0 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie) {

					?>

						<script type="text/javascript">
				
							$(document).ready(function() {

								$("#feed_label_for_others").remove();
								$("#feed_label_for_others_2").remove();
								$("#number_of_feed_posts_for_others").remove();
								$("#no_feed_posts_found_for_others").remove();


							})

						</script>

					<?php

				}

			}

		} else {

			?>

				<h1 id="profile_and_user_error_label"><?php echo $profileAndUserError; ?></h1>

				<p id="profile_not_accessible"><?php echo $profileNotAccessible; ?></p>

				<h2 id="or_label">OR</h2>

				<p id="user_not_found"><?php echo $userNotFound; ?></p>

				<script type="text/javascript">
				
					$(document).ready(function() {

						$("#feed_label_for_others").remove();
						$("#feed_label_for_others_2").remove();
						$("#number_of_feed_posts_for_others").remove();
						$("#no_feed_posts_found_for_others").remove();

					})

				</script>

			<?php

		}

?>

<?php

	if ($login == 1 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie || $login == 0 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$myID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_COOKIE['username']) {

					$myID = $row['id'];

				}

			}

			$query1 = "SELECT * FROM feed WHERE feedUserId = ?;";
			$stmt = $db->prepare($query1);
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$result1 = $stmt->get_result();

			if ($result1->num_rows == 0) {

				$feedPostsListEmpty = "Your feed is currently empty!";
				$feedPostsCounter = "0 feed posts";

			} else {

				?>

					<style type="text/css">
						
						#no_feed_posts_found {

							display: none;

						}

					</style>

				<?php

			}

		}

?>

<h1 id="feed_label">My Feed</h1>

<?php

	$query = "SELECT * FROM feed WHERE feedUserId = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("i", $myID);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows >= 1) {

		$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

		if ($feedPostsCounter == 1) {

			$feedPostsCounter = mysqli_num_rows($result) . " feed post";

		}

	} else {

		$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

	}

?>

<p id="number_of_feed_posts"><?php echo $feedPostsCounter; ?></p>

<p id="no_feed_posts_found"><?php echo $feedPostsListEmpty; ?></p>

<?php } ?>

<div id="scroll_down_up_arrow_div">

	<a href="profile?username=<?php echo $username; ?>" id="back_arrow_link">

		<img src="Images/back_arrow.png" id="back_arrow_image" />

	</a>
	
	<img src="Images/back_arrow.png" id="scroll_down_arrow_image" />

	<img src="Images/back_arrow.png" id="scroll_up_arrow_image" />

</div>

<?php

	$query = "SELECT * FROM users;";
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$userID = "";

	if ($result->num_rows >= 1) {

		while ($row = $result->fetch_assoc()) {

			if ($row['username'] === $_GET['username']) {

				$userID = $row['id'];

			}

		}

		$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($numberOfFeedPostsQuery);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$numberOfFeedPostsQueryResult = $stmt->get_result();

	}

?>

<?php if ($login == 1 && $numberOfFeedPostsQueryResult->num_rows >= 1) : ?>

	<?php

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$userID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_GET['username']) {

					$userID = $row['id'];

				}

			}

			?>

				<div id="confirm_delete_feed_post_modal_container">
				
					<div id="confirm_delete_feed_post_modal_content">
						
						<span class="close_confirm_delete_feed_post_modal">&times;</span>

						<p id="confirm_delete_feed_post_inner_modal_title">Are you sure you would like to delete this feed post?</p>

						<div id="yes_no_confirm_delete_feed_post_form_div">
							
							<button class="yes_confirm_delete_feed_post_button" id="yes_confirm_delete_feed_post_button" style="cursor: default;">Yes</button>

							<button class="no_confirm_delete_feed_post_button" id="no_confirm_delete_feed_post_button" style="cursor: default;">No</button>

						</div>

					</div>

				</div>

				<script type="text/javascript">
					
					var limit = 5;
					var start = 0;
					var action = "inactive";
					var userID = "<?php echo $userID; ?>";

					$(document).on("click", ".feed_image_content_div_for_each_image", function() {

						$(window).scrollTop();
						$(window).scrollLeft();

						setTimeout(function() {

							$(window).scrollTop();
							$(window).scrollLeft();

						}, 500);

						var feedPostImage = $(this).attr("id");
						var feedPostImageId = $(this).data("feedpostimageid");

						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("position", "fixed");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("max-width", "90%");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("max-height", "90%");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("height", "auto");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("width", "initial");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("z-index", "1000");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("left", "0");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("right", "0");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("top", "0");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("bottom", "0");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("margin", "auto");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("transition", "0.15s");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("border-radius", "0.75vw");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("pointer-events", "none");
						$("body").css("overflow", "hidden");

						$("body").append("<div class='zoomed_in_feed_post_image_cover_div' id='zoomed_in_feed_post_image_cover_div_" + feedPostImageId + "' data-zoomedfeedpostimage='" + feedPostImageId + "'><span class='close_zoomed_in_feed_post_image_cover_div_modal' id='close_zoomed_in_feed_post_image_cover_div_modal_" + feedPostImageId + "' data-feedpostclosemodalspan='" + feedPostImageId + "'>&times;</span></div>");
						$(".zoomed_in_feed_post_image_cover_div").css("display", "block");
						$("#feed_image_content_div_for_each_image_" + feedPostImageId).addClass("zoomed_in_feed_post_image");

					});

					$("html").bind("keydown", function(e) {

						if (e.keyCode === 27) {

							if ($(".zoomed_in_feed_post_image_cover_div").is(":visible")) {

								var zoomedFeedPostImageId = $(".zoomed_in_feed_post_image_cover_div").data("zoomedfeedpostimage");

								$(".zoomed_in_feed_post_image_cover_div").remove();
								$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeAttr("style");
								$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeClass("zoomed_in_feed_post_image");
								$("body").css("overflow", "auto");

							}

						}

					});

					$(document).on("click", ".close_zoomed_in_feed_post_image_cover_div_modal", function() {

						var closeFeedPostImageModalSpan = $(this).data("feedpostclosemodalspan");

						$(".zoomed_in_feed_post_image_cover_div").remove();
						$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeAttr("style");
						$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeClass("zoomed_in_feed_post_image");
						$("body").css("overflow", "auto");

					});

					var confirmDeleteFeedPostImage = document.getElementById("delete_feed_post_bin_image");
					var confirmDeleteFeedPostModal = document.getElementById("confirm_delete_feed_post_modal_container");
					var confirmDeleteFeedPostModalSpan = document.getElementsByClassName("close_confirm_delete_feed_post_modal")[0];

					confirmDeleteFeedPostModalSpan.onclick = function() {

						confirmDeleteFeedPostModal.style.display = "none";

					}

					window.onclick = function(e) {

						if (e.target == confirmDeleteFeedPostModal) {

							confirmDeleteFeedPostModal.style.display = "none";

						}

					}

					function getAllFeedMyProfileLoggedInMe(limit, start) {

						$.ajax({

							url: "get_all_feed_my_profile_logged_in_me.php",
							method: "GET",
							data: {

								limit: limit,
								start: start,
								userID: userID

							},
							success: function(data) {

								$("#main_outer_feed_div").html(data);

							}

						});

					}

					function getAllFeedScrollMyProfileLoggedInMe(limit, start) {

						$.ajax({

							url: "get_all_feed_scroll_my_profile_logged_in_me.php",
							method: "GET",
							data: {

								limit: limit,
								start: start,
								userID: userID

							},
							cache: false,
							success: function(data) {

								$("#main_outer_feed_div").append(data);

								if (data == "") {

									action = "active";

								} else {

									action = "inactive";

								}

							}

						});

					}

					$(document).on("click", ".delete_feed_post_bin_image", function() {

						var feedId = $(this).data("feedid");
						var deleteFeedPost = true;

						confirmDeleteFeedPostModal.style.display = "block";

						var noButton = document.querySelector(".no_confirm_delete_feed_post_button");

						noButton.onclick = function() {

							$("#confirm_delete_feed_post_modal_container").hide();

						}

						$(document).on("click", ".yes_confirm_delete_feed_post_button", function() {

							$.ajax({

								url: "/delete_feed_post.php",
								method: "GET",
								data: {

									feedId: feedId,
									userID: userID

								},
								success: function(data) {

									$("#confirm_delete_feed_post_modal_container").hide();

									start = 0;
									limit = limit + 5;

									$.ajax({

										url: "get_all_feed_my_profile_logged_in_me.php",
										method: "GET",
										data: {

											limit: limit,
											start: start,
											deleteFeedPost: deleteFeedPost,
											userID: userID

										},
										success: function(data) {

											$.ajax({

												url: "get_number_of_feed_posts_for_user.php",
												method: "GET",
												success: function(data) {

													$("#number_of_feed_posts").html(data);

												}

											});

											$("#main_outer_feed_div").html(data);

											$("html, body").animate({

												scrollTop: 0

											});

										}

									});

								}

							});

						});

					});

					if (action == "inactive") {

						action = "active";

					}

					$(window).scroll(function() {

						if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

							action = "active";
							start = start + limit;

							getAllFeedScrollMyProfileLoggedInMe(limit, start);

						}

					});

					$(document).on("click", ".view_comments_feed_div_for_each", function() {

						var feedID = $(this).data("feedid");
						var feedPostCommentCount = $(this).data("feedpostcommentcount");

						$.ajax({

							url: "get_all_feed_comments_my_profile_logged_in_me.php",
							method: "GET",
							data: {

								feedID: feedID,
								userID: userID

							},
							success: function(data) {

								$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

								$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

								$("#view_comments_feed_div_for_each_" + feedID).remove();

								$("#comment_view_comments_feed_div_for_each_inner_bottom_div_" + feedID).append('<p class="hide_comments_feed_div_for_each" id="hide_comments_feed_div_for_each_' + feedID + '" data-feedid="' + feedID + '" data-feedpostcommentcount="' + feedPostCommentCount + '">Hide comments</p>');

							}

						});

					});

					$(document).on("click", ".hide_comments_feed_div_for_each", function() {

						var feedID = $(this).data("feedid");
						var feedPostCommentCount = $(this).data("feedpostcommentcount");

						$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "none");

						$("#comments_feed_div_for_each_main_outer_div_" + feedID).empty();

						$("#hide_comments_feed_div_for_each_" + feedID).remove();

						$("#comment_view_comments_feed_div_for_each_inner_bottom_div_" + feedID).append('<p class="view_comments_feed_div_for_each" id="view_comments_feed_div_for_each_' + feedID + '" data-feedid="' + feedID + '" data-feedpostcommentcount="' + feedPostCommentCount + '">View comments (' + feedPostCommentCount + ')</p>');

					});

					$(document).on("click", ".feed_post_comments_each_div_comment_content_view_replies", function() {

						var feedPostCommentId = $(this).data("feedpostcommentid");
						var feedID = $(this).data("feedid");
						var feedPostCommentCount = $(this).data("feedpostcommentcount");

						$.ajax({

							url: "get_all_feed_comments_replies_my_profile_logged_in_me.php",
							method: "GET",
							data: {

								feedPostCommentId: feedPostCommentId,
								feedID: feedID,
								userID: userID

							},
							success: function(data) {

								$("#feed_post_comments_view_replies_main_outer_div_" + feedPostCommentId).html(data);

								$("#feed_post_comments_each_div_comment_content_view_replies_" + feedPostCommentId).remove();

								$("#feed_post_comments_check_if_replies_exist_div_" + feedPostCommentId).append('<p class="feed_post_comments_each_div_comment_content_hide_replies" id="feed_post_comments_each_div_comment_content_hide_replies_' + feedPostCommentId + '" data-feedid="' + feedID + '" data-feedpostcommentid="' + feedPostCommentId + '" data-feedpostcommentcount="' + feedPostCommentCount + '">Hide replies</p>');

							}

						});

					});

					$(document).on("click", ".feed_post_comments_each_div_comment_content_hide_replies", function() {

						var feedPostCommentId = $(this).data("feedpostcommentid");
						var feedID = $(this).data("feedid");
						var feedPostCommentCount = $(this).data("feedpostcommentcount");

						$("#feed_post_comments_view_replies_main_outer_div_" + feedPostCommentId).empty();

						$("#feed_post_comments_each_div_comment_content_hide_replies_" + feedPostCommentId).remove();

						$("#feed_post_comments_check_if_replies_exist_div_" + feedPostCommentId).append('<p class="feed_post_comments_each_div_comment_content_view_replies" id="feed_post_comments_each_div_comment_content_view_replies_' + feedPostCommentId + '" data-feedid="' + feedID + '" data-feedpostcommentid="' + feedPostCommentId + '" data-feedpostcommentcount="' + feedPostCommentCount + '">View replies (' + feedPostCommentCount + ')</p>');

					});

					$(document).on("click", ".feed_post_comments_reply_delete_my_comment_image", function() {

						$("body").css("overflow", "hidden");

						var feedPostCommentReplyId = $(this).attr("id");
						var feedPostCommentRepliedCommentId = $(this).data("feedpostcommentid");
						var feedID = $(this).data("feedid");

						$("body").append('<div class="confirm_delete_feed_post_comment_reply_modal_container" id="confirm_delete_feed_post_comment_reply_modal_container_' + feedPostCommentReplyId + '"><div class="confirm_delete_feed_post_comment_reply_modal_content" id="confirm_delete_feed_post_comment_reply_modal_content_' + feedPostCommentReplyId + '"><span id="close_confirm_delete_feed_post_comment_reply_modal_' + feedPostCommentReplyId + '" class="close_confirm_delete_feed_post_comment_reply_modal">&times;</span><p class="confirm_delete_feed_post_comment_reply_inner_modal_title" id="confirm_delete_feed_post_comment_reply_inner_modal_title_' + feedPostCommentReplyId + '">Are you sure you would like to delete this comment?</p><div class="yes_no_confirm_delete_feed_post_comment_reply_form_div" id="yes_no_confirm_delete_feed_post_comment_reply_form_div_' + feedPostCommentReplyId + '"><button class="yes_confirm_delete_feed_post_comment_reply_button" id="yes_confirm_delete_feed_post_comment_reply_button_' + feedPostCommentReplyId + '" data-feedpostcommentreplyid="' + feedPostCommentReplyId + '" data-feedpostcommentrepliedcommentid="' + feedPostCommentRepliedCommentId + '" data-feedid="' + feedID + '" style="cursor: default;">Yes</button><button class="no_confirm_delete_feed_post_comment_reply_button" id="no_confirm_delete_feed_post_comment_reply_button_' + feedPostCommentReplyId + '" style="cursor: default;">No</button></div></div></div>');

						var confirmDeleteFeedPostCommentReplyModal = document.getElementById("confirm_delete_feed_post_comment_reply_modal_container_" + feedPostCommentReplyId);
						var confirmDeleteFeedPostCommentReplyModalSpan = document.getElementsByClassName("close_confirm_delete_feed_post_comment_reply_modal")[0];

						confirmDeleteFeedPostCommentReplyModalSpan.onclick = function() {

							$(".confirm_delete_feed_post_comment_reply_modal_container").remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == confirmDeleteFeedPostCommentReplyModal) {

								$(".confirm_delete_feed_post_comment_reply_modal_container").remove();
								$("body").css("overflow", "auto");

							}

						}

						var noButtonFeedPostCommentReply = document.getElementById("no_confirm_delete_feed_post_comment_reply_button_" + feedPostCommentReplyId);

						noButtonFeedPostCommentReply.onclick = function() {

							$(".confirm_delete_feed_post_comment_reply_modal_container").remove();
							$("body").css("overflow", "auto");

						}

					});

					$(document).on("click", ".yes_confirm_delete_feed_post_comment_reply_button", function() {

						var feedPostCommentReplyId = $(this).data("feedpostcommentreplyid");
						var feedPostCommentRepliedCommentId = $(this).data("feedpostcommentrepliedcommentid");
						var feedID = $(this).data("feedid");

						$.ajax({

							url: "/delete_feed_post_comment_reply.php",
							method: "GET",
							data: {

								feedPostCommentReplyId: feedPostCommentReplyId,
								feedPostCommentRepliedCommentId: feedPostCommentRepliedCommentId,
								userID: userID

							},
							success: function(data) {

								$.ajax({

									url: "get_all_feed_comments_replies_my_profile_logged_in_me.php",
									method: "GET",
									data: {

										feedPostCommentRepliedCommentId: feedPostCommentRepliedCommentId,
										feedPostCommentReplyId: feedPostCommentReplyId,
										userID: userID

									},
									success: function(data) {

										if (data === "1") {

											$.ajax({

												url: "get_all_feed_comments_after_insert_reply_result_my_profile_logged_in_me.php",
												method: "GET",
												data: {

													feedPostCommentRepliedCommentId: feedPostCommentRepliedCommentId,
													feedID: feedID,
													feedPostCommentReplyId: feedPostCommentReplyId,
													userID: userID

												},
												success: function(data) {

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

													$("#feed_post_comments_each_div_comment_content_view_replies_" + feedID).remove();

													$("#confirm_delete_feed_post_comment_reply_modal_container_" + feedPostCommentReplyId).remove();

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollTop();
													$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollLeft();

													$("body").css("overflow", "auto");

												}

											});

										} else if (data === "2") {

											$.ajax({

												url: "get_all_feed_comments_after_insert_reply_result_my_profile_logged_in_me.php",
												method: "GET",
												data: {

													feedPostCommentRepliedCommentId: feedPostCommentRepliedCommentId,
													feedID: feedID,
													feedPostCommentReplyId: feedPostCommentReplyId,
													userID: userID

												},
												success: function(data) {

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

													$("#confirm_delete_feed_post_comment_reply_modal_container_" + feedPostCommentReplyId).remove();

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

													$("#feed_post_comments_each_div_comment_content_view_replies_" + feedID).remove();

													$("#feed_post_comments_each_div_comment_content_hide_replies_" + feedID).remove();

													$("body").css("overflow", "auto");

												}

											});

										}

									}

								});

							}

						});

					});

					$(document).on("click", ".feed_post_comments_reply_each_div_comment_content_reply_me", function() {

						$("body").css("overflow", "hidden");

						var feedID = $(this).data("feedid");
						var feedCommentID = $(this).data("feedcommentid");
						var feedCommentUserUsername = $(this).data("feedcommentuserusername");
						var feedCommentUserProfileImage = $(this).data("feedcommentuserprofileimage");
						var feedCommentDateAndTimeSubmitted = $(this).data("feedcommentdateandtimesubmitted");
						var feedCommentContent = $(this).data("feedcommentcontent");
						var feedCommentUserUserId = $(this).data("feedcommentuseruserid");

						createCommentReplyModalContainer(feedID, feedCommentID, feedCommentUserUsername, feedCommentUserProfileImage, feedCommentDateAndTimeSubmitted, feedCommentContent, feedCommentUserUserId);

						var closeFeedPostCommentReplyModal = document.getElementById("comment_feed_post_reply_comment_modal_container_" + feedCommentID);
						var closeFeedPostCommentReplyModalSpan = document.getElementsByClassName("close_comment_feed_post_reply_comment_modal")[0];

						closeFeedPostCommentReplyModalSpan.onclick = function() {

							$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == closeFeedPostCommentReplyModal) {

								$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
								$("body").css("overflow", "auto");

							}

						}

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".comment_feed_post_reply_comment_modal_container").is(":visible")) {

									$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
									$("body").css("overflow", "auto");

								}

							}

						});

					});

					$(document).on("click", ".feed_post_comments_reply_each_div_comment_content_reply", function() {

						$("body").css("overflow", "hidden");

						var feedID = $(this).data("feedid");
						var feedCommentID = $(this).data("feedcommentid");
						var feedCommentUserUsername = $(this).data("feedcommentuserusername");
						var feedCommentUserProfileImage = $(this).data("feedcommentuserprofileimage");
						var feedCommentDateAndTimeSubmitted = $(this).data("feedcommentdateandtimesubmitted");
						var feedCommentContent = $(this).data("feedcommentcontent");
						var feedCommentUserUserId = $(this).data("feedcommentuseruserid");

						createCommentReplyModalContainer(feedID, feedCommentID, feedCommentUserUsername, feedCommentUserProfileImage, feedCommentDateAndTimeSubmitted, feedCommentContent, feedCommentUserUserId);

						var closeFeedPostCommentReplyModal = document.getElementById("comment_feed_post_reply_comment_modal_container_" + feedCommentID);
						var closeFeedPostCommentReplyModalSpan = document.getElementsByClassName("close_comment_feed_post_reply_comment_modal")[0];

						closeFeedPostCommentReplyModalSpan.onclick = function() {

							$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == closeFeedPostCommentReplyModal) {

								$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
								$("body").css("overflow", "auto");

							}

						}

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".comment_feed_post_reply_comment_modal_container").is(":visible")) {

									$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
									$("body").css("overflow", "auto");

								}

							}

						});

					});

					$(document).on("click", ".feed_post_comments_delete_my_comment_image", function() {

						$("body").css("overflow", "hidden");

						var feedPostCommentId = $(this).attr("id");
						var feedID = $(this).data("feedid");

						$("body").append('<div class="confirm_delete_feed_post_comment_modal_container" id="confirm_delete_feed_post_comment_modal_container_' + feedPostCommentId + '"><div class="confirm_delete_feed_post_comment_modal_content" id="confirm_delete_feed_post_comment_modal_content_' + feedPostCommentId + '"><span id="close_confirm_delete_feed_post_comment_modal_' + feedPostCommentId + '" class="close_confirm_delete_feed_post_comment_modal">&times;</span><p class="confirm_delete_feed_post_comment_inner_modal_title" id="confirm_delete_feed_post_comment_inner_modal_title_' + feedPostCommentId + '">Are you sure you would like to delete this comment?</p><div class="yes_no_confirm_delete_feed_post_comment_form_div" id="yes_no_confirm_delete_feed_post_comment_form_div_' + feedPostCommentId + '"><button class="yes_confirm_delete_feed_post_comment_button" id="yes_confirm_delete_feed_post_comment_button_' + feedPostCommentId + '" data-feedpostcommentid="' + feedPostCommentId + '" data-feedid="' + feedID + '" style="cursor: default;">Yes</button><button class="no_confirm_delete_feed_post_comment_button" id="no_confirm_delete_feed_post_comment_button_' + feedPostCommentId + '" style="cursor: default;">No</button></div></div></div>');

						var confirmDeleteFeedPostCommentModal = document.getElementById("confirm_delete_feed_post_comment_modal_container_" + feedPostCommentId);
						var confirmDeleteFeedPostCommentModalSpan = document.getElementsByClassName("close_confirm_delete_feed_post_comment_modal")[0];

						confirmDeleteFeedPostCommentModalSpan.onclick = function() {

							$(".confirm_delete_feed_post_comment_modal_container").remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == confirmDeleteFeedPostCommentModal) {

								$(".confirm_delete_feed_post_comment_modal_container").remove();
								$("body").css("overflow", "auto");

							}

						}

						var noButtonFeedPostComment = document.getElementById("no_confirm_delete_feed_post_comment_button_" + feedPostCommentId);

						noButtonFeedPostComment.onclick = function() {

							$(".confirm_delete_feed_post_comment_modal_container").remove();
							$("body").css("overflow", "auto");

						}

					});

					$(document).on("click", ".yes_confirm_delete_feed_post_comment_button", function() {

						var feedPostCommentId = $(this).data("feedpostcommentid");
						var feedID = $(this).data("feedid");

						$.ajax({

							url: "/delete_feed_post_comment.php",
							method: "GET",
							data: {

								feedPostCommentId: feedPostCommentId,
								feedID: feedID,
								userID: userID

							},
							success: function(data) {

								$.ajax({

									url: "get_all_feed_comments_my_profile_logged_in_me.php",
									method: "GET",
									data: {

										feedPostCommentId: feedPostCommentId,
										feedID: feedID,
										userID: userID

									},
									success: function(data) {

										if (data === "1") {

											$.ajax({

												url: "get_all_feed_comments_after_delete_result_my_profile_logged_in_me.php",
												method: "GET",
												data: {

													feedPostCommentId: feedPostCommentId,
													feedID: feedID,
													userID: userID

												},
												success: function(data) {

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

													$("#view_comments_feed_div_for_each_" + feedID).remove();

													$("#confirm_delete_feed_post_comment_modal_container_" + feedPostCommentId).remove();

													$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollTop();
													$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollLeft();

													$("body").css("overflow", "auto");

												}

											});

										} else if (data === "2") {

											$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "none");

											$("#comments_feed_div_for_each_main_outer_div_" + feedID).empty();

											$("#hide_comments_feed_div_for_each_" + feedID).remove();

											$("#view_comments_feed_div_for_each_" + feedID).remove();

											$("#comment_view_comments_feed_div_for_each_line_break_" + feedID).remove();

											$("#confirm_delete_feed_post_comment_modal_container_" + feedPostCommentId).remove();

											$("body").css("overflow", "auto");

										}

									}

								});

							}

						});

					});

					function createCommentReplyModalContainer(feedID, feedCommentID, feedCommentUserUsername, feedCommentUserProfileImage, feedCommentDateAndTimeSubmitted, feedCommentContent, feedCommentUserUserId) {

						var placeholder = "Add a comment!";

						var commentReplyContainer = '<div id="comment_feed_post_reply_comment_modal_container_' + feedCommentID + '" class="comment_feed_post_reply_comment_modal_container">';
						commentReplyContainer += '<div id="comment_feed_post_reply_comment_modal_content_' + feedCommentID + '" class="comment_feed_post_reply_comment_modal_content">';
						commentReplyContainer += '<span class="close_comment_feed_post_reply_comment_modal" id="close_comment_feed_post_reply_comment_modal_' + feedCommentID + '">&times;</span>';
						commentReplyContainer += '<div id="comment_feed_post_reply_comment_preview_div_' + feedCommentID + '" class="comment_feed_post_reply_comment_preview_div">';
						commentReplyContainer += '<div class="comment_feed_post_reply_comment_div_for_each_main_div_for_each" id="comment_feed_post_reply_comment_div_for_each_main_div_for_each_' + feedCommentID + '">';
						commentReplyContainer += '<img src="' + feedCommentUserProfileImage + '" class="profile_picture_display_comment_feed_post_reply_comment_div_for_each" id="profile_picture_display_comment_feed_post_reply_comment_div_for_each_' + feedCommentID + '" />';
						commentReplyContainer += '<a href="/Account/profile?username=' + feedCommentUserUsername + '" class="comment_feed_post_reply_comment_div_for_each_username_link" id="comment_feed_post_reply_comment_div_for_each_username_link_' + feedCommentID + '"><p class="comment_feed_post_reply_comment_div_for_each_username" id="comment_feed_div_for_each_username_' + feedCommentUserUserId + '">' + feedCommentUserUsername + '</p></a>';
						commentReplyContainer += '<p class="comment_feed_post_reply_comment_div_for_each_time_and_date" id="comment_feed_post_reply_comment_div_for_each_time_and_date_' + feedCommentID + '">' + feedCommentDateAndTimeSubmitted + '</p>';
						commentReplyContainer += '<p class="comment_feed_post_reply_comment_div_for_each_content" id="comment_feed_post_reply_comment_div_for_each_content_' + feedCommentID + '">' + feedCommentContent + '</p>';
						commentReplyContainer += '</div>';
						commentReplyContainer += '</div>';
						commentReplyContainer += '<div id="form_outer_comment_feed_post_reply_comment_post_div_' + feedCommentID + '" class="form_outer_comment_feed_post_reply_comment_post_div">';
						commentReplyContainer += '<form action="" method="post" id="comment_feed_post_reply_comment_form_' + feedCommentID + '" class="comment_feed_post_reply_comment_form" data-feedpostcommentid="' + feedCommentID + '" data-feedid="' + feedID + '" data-feedpostcommentid="' + feedCommentID + '">';
						commentReplyContainer += '<textarea id="comment_feed_post_reply_comment_textarea_' + feedCommentID + '" maxlength="200" class="comment_feed_post_reply_comment_textarea" name="comment_feed_post_reply_comment_textarea" placeholder="' + placeholder + '"></textarea>';
						commentReplyContainer += '<input type="submit" name="comment_feed_post_reply_comment_submit_button" id="comment_feed_post_reply_comment_submit_button_' + feedCommentID + '" class="comment_feed_post_reply_comment_submit_button" value="Submit!" style="cursor: default;" />';
						commentReplyContainer += '</form>';
						commentReplyContainer += '</div>';
						commentReplyContainer += '</div>';
						commentReplyContainer += '</div>';
						$("body").append(commentReplyContainer);

					}

					$(document).on("click", ".feed_post_comments_each_div_comment_content_reply_me", function() {

						$("body").css("overflow", "hidden");

						var feedID = $(this).data("feedid");
						var feedCommentID = $(this).data("feedcommentid");
						var feedCommentUserUsername = $(this).data("feedcommentuserusername");
						var feedCommentUserProfileImage = $(this).data("feedcommentuserprofileimage");
						var feedCommentDateAndTimeSubmitted = $(this).data("feedcommentdateandtimesubmitted");
						var feedCommentContent = $(this).data("feedcommentcontent");
						var feedCommentUserUserId = $(this).data("feedcommentuseruserid");

						createCommentReplyModalContainer(feedID, feedCommentID, feedCommentUserUsername, feedCommentUserProfileImage, feedCommentDateAndTimeSubmitted, feedCommentContent, feedCommentUserUserId);

						var closeFeedPostCommentReplyModal = document.getElementById("comment_feed_post_reply_comment_modal_container_" + feedCommentID);
						var closeFeedPostCommentReplyModalSpan = document.getElementsByClassName("close_comment_feed_post_reply_comment_modal")[0];

						closeFeedPostCommentReplyModalSpan.onclick = function() {

							$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == closeFeedPostCommentReplyModal) {

								$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
								$("body").css("overflow", "auto");

							}

						}

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".comment_feed_post_reply_comment_modal_container").is(":visible")) {

									$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
									$("body").css("overflow", "auto");

								}

							}

						});

					});

					$(document).on("click", ".feed_post_comments_each_div_comment_content_reply", function() {

						$("body").css("overflow", "hidden");

						var feedID = $(this).data("feedid");
						var feedCommentID = $(this).data("feedcommentid");
						var feedCommentUserUsername = $(this).data("feedcommentuserusername");
						var feedCommentUserProfileImage = $(this).data("feedcommentuserprofileimage");
						var feedCommentDateAndTimeSubmitted = $(this).data("feedcommentdateandtimesubmitted");
						var feedCommentContent = $(this).data("feedcommentcontent");
						var feedCommentUserUserId = $(this).data("feedcommentuseruserid");

						createCommentReplyModalContainer(feedID, feedCommentID, feedCommentUserUsername, feedCommentUserProfileImage, feedCommentDateAndTimeSubmitted, feedCommentContent, feedCommentUserUserId);

						var closeFeedPostCommentReplyModal = document.getElementById("comment_feed_post_reply_comment_modal_container_" + feedCommentID);
						var closeFeedPostCommentReplyModalSpan = document.getElementsByClassName("close_comment_feed_post_reply_comment_modal")[0];

						closeFeedPostCommentReplyModalSpan.onclick = function() {

							$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == closeFeedPostCommentReplyModal) {

								$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
								$("body").css("overflow", "auto");

							}

						}

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".comment_feed_post_reply_comment_modal_container").is(":visible")) {

									$("#comment_feed_post_reply_comment_modal_container_" + feedCommentID).remove();
									$("body").css("overflow", "auto");

								}

							}

						});

					});

					$(document).on("submit", ".comment_feed_post_reply_comment_form", function(e) {

						e.preventDefault();
						e.stopImmediatePropagation();

						var feedID = $(this).data("feedid");
						var feedPostCommentId = $(this).data("feedpostcommentid");
						var submitCommentReply = true;

						var feedPostCommentReplyContent = $("#comment_feed_post_reply_comment_textarea_" + feedPostCommentId).val();
						var feedPostCommentReplyContentTrimmed = feedPostCommentReplyContent.trim();
						var feedPostCommentReplyContentTrimmedLength = feedPostCommentReplyContentTrimmed.length;

						if (feedPostCommentReplyContentTrimmed === "" || feedPostCommentReplyContentTrimmedLength == 0) {

							var feedPostCommentReplyTextarea = document.querySelector("#comment_feed_post_reply_comment_textarea_" + feedPostCommentId);
							feedPostCommentReplyTextarea.style.border = "2.5px solid red";
							feedPostCommentReplyTextarea.placeholder = "Can't submit empty comment!";
							feedPostCommentReplyTextarea.value = "";

						} else {

							var feedPostCommentReplyContent = $("#comment_feed_post_reply_comment_textarea_" + feedPostCommentId).val();

							$.ajax({

								url: "/insert_feed_post_comment_reply_into_db.php",
								method: "GET",
								data: {

									feedPostCommentReplyContent: feedPostCommentReplyContent,
									feedID: feedID,
									feedPostCommentId: feedPostCommentId,
									userID: userID

								},
								success: function(data) {

									$.ajax({

										url: "get_all_feed_comments_my_profile_logged_in_me.php",
										method: "GET",
										data: {

											feedPostCommentId: feedPostCommentId,
											feedID: feedID,
											userID: userID

										},
										success: function(data) {

											if (data === "1") {

												$.ajax({

													url: "get_all_feed_comments_after_insert_reply_result_my_profile_logged_in_me.php",
													method: "GET",
													data: {

														feedPostCommentId: feedPostCommentId,
														feedID: feedID,
														userID: userID

													},
													success: function(data) {

														$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

														$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

														$("#feed_post_comments_each_div_comment_content_view_replies_" + feedID).remove();

														$("#comment_feed_post_reply_comment_modal_container_" + feedPostCommentId).remove();

														$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollTop();
														$("#comments_feed_div_for_each_main_outer_div_" + feedID).scrollLeft();

														$("body").css("overflow", "auto");

													}

												});

											} else if (data === "2") {

												$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "none");

												$("#comments_feed_div_for_each_main_outer_div_" + feedID).empty();

												$("#hide_comments_feed_div_for_each_" + feedID).remove();

												$("#view_comments_feed_div_for_each_" + feedID).remove();

												$("#comment_view_comments_feed_div_for_each_line_break_" + feedID).remove();

												$("#comment_feed_post_reply_comment_modal_container_" + feedPostCommentId).remove();

												$("body").css("overflow", "auto");

											}

										}

									});

								}

							});

						}

					});

					function createCommentModalContainer(feedID, feedUserID, feedIDImage, feedIDDateAndTimeSubmitted, feedIDCaption, feedIDLikes, feedUserProfilePicture, feedUserUsername) {

						var placeholder = "Add a comment!";

						var commentContainer = '<div id="comment_feed_post_modal_container_' + feedID + '" class="comment_feed_post_modal_container">';
						commentContainer += '<div id="comment_feed_post_modal_content_' + feedID + '" class="comment_feed_post_modal_content">';
						commentContainer += '<span class="close_comment_feed_post_modal" id="close_comment_feed_post_modal_' + feedID + '">&times;</span>';
						commentContainer += '<div id="feed_post_preview_div_' + feedID + '" class="feed_post_preview_div">';
						commentContainer += '<div class="top_feed_div" id="top_feed_div_' + feedID + '">';
						commentContainer += '<img src="' + feedUserProfilePicture + '" class="feed_post_profile_picture_display_user" id="feed_post_profile_picture_display_user_' + feedID + '" />';
						commentContainer += '<a href="Account/profile?username=' + feedUserUsername + '"><p class="feed_post_username" id="username_feed_div_for_each_' + feedID + '">' + feedUserUsername + '</p></a>';
						commentContainer += '</div>';
						commentContainer += '<div id="feed_post_preview_div_image_display_outer_main_div_' + feedID + '" class="feed_post_preview_div_image_display_outer_main_div">';
						commentContainer += '<img src="' + feedIDImage + '" id="feed_post_preview_div_image_display_' + feedID + '" class="feed_post_preview_div_image_display" />';
						commentContainer += '</div>';
						commentContainer += '<div id="feed_post_preview_div_caption_' + feedID + '" class="feed_post_preview_div_caption">';
						commentContainer += '<div class="bottom_feed_like_div_for_each" id="bottom_feed_like_div_for_each_' + feedID + '">';
						commentContainer += '<div id="like_div">';
						commentContainer += '<img src="Images/like.png" id="like_button_image_' + feedID + '" class="feed_like_button_image unclicked" />';
						commentContainer += '<span id="feed_like_counter_' + feedID + '" class="feed_like_counter">' + feedIDLikes + '</span>';
						commentContainer += '</div>';
						commentContainer += '</div>';
						commentContainer += '<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' + feedID + '">' + feedIDDateAndTimeSubmitted + '</p>';
						commentContainer += '<p class="bottom_feed_div_caption_for_each" id="bottom_feed_div_caption_for_each_' + feedID + '">' + feedIDCaption + '</p>';
						commentContainer += '</div>';
						commentContainer += '</div>';
						commentContainer += '<div id="form_outer_comment_feed_post_div_' + feedID + '" class="form_outer_comment_feed_post_div">';
						commentContainer += '<form action="" method="post" id="comment_feed_post_form_' + feedID + '" class="comment_feed_post_form" data-feedid="' + feedID + '">';
						commentContainer += '<textarea id="comment_feed_post_textarea_' + feedID + '" maxlength="200" class="comment_feed_post_textarea" name="comment_feed_post_textarea" placeholder="' + placeholder + '"></textarea>';
						commentContainer += '<input type="submit" name="comment_feed_post_submit_button" id="comment_feed_post_submit_button_' + feedID + '" class="comment_feed_post_submit_button" value="Submit!" style="cursor: default;" />';
						commentContainer += '</form>';
						commentContainer += '</div>';
						commentContainer += '</div>';
						commentContainer += '</div>';
						$("body").append(commentContainer);

						$.ajax({

							url: "/get_feed_post_rating.php",
							method: "GET",
							data: {

								feedID: feedID,
								userID: userID

							},
							success: function(data) {

								res = JSON.parse(data);

								$("#feed_like_counter_" + feedID).html(res.likes);

							}

						});

					}

					$(document).on("click", ".comment_feed_div_for_each", function() {

						var feedID = $(this).data("feeddivforeachid");
						var feedUserID = $(this).data("feeddivforeachuserid");
						var feedIDImage = $(this).data("feeddivforeachimage");
						var feedIDDateAndTimeSubmitted = $(this).data("feeddivforeachdateandtimesubmitted");
						var feedIDCaption = $(this).data("feeddivforeachcaption");
						var feedIDLikes = $(this).data("likescounter");
						var feedUserProfilePicture = $(this).data("feeddivforeachuserprofileimage");
						var feedUserUsername = $(this).data("feeddivforeachuserusername");

						createCommentModalContainer(feedID, feedUserID, feedIDImage, feedIDDateAndTimeSubmitted, feedIDCaption, feedIDLikes, feedUserProfilePicture, feedUserUsername);

						$("#comment_feed_post_modal_container_" + feedID).css("display", "block");
						$("body").css("overflow", "hidden");

						var commentFeedPostModal = document.querySelector(".comment_feed_post_modal_container");
						var commentFeedPostModalSpan = document.getElementsByClassName("close_comment_feed_post_modal")[0];

						commentFeedPostModalSpan.onclick = function() {

							$(".comment_feed_post_modal_container").remove();
							$("body").css("overflow", "auto");

						}

						window.onclick = function(e) {

							if (e.target == commentFeedPostModal) {

								$(".comment_feed_post_modal_container").remove();
								$("body").css("overflow", "auto");

							}

						}

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".comment_feed_post_modal_container").is(":visible")) {

									$(".comment_feed_post_modal_container").remove();
									$("body").css("overflow", "auto");

								}

							}

						});

					});

					$(document).on("submit", ".comment_feed_post_form", function(e) {

						e.preventDefault();
						e.stopImmediatePropagation();

						var feedID = $(this).data("feedid");
						var submitComment = true;

						var feedPostCommentContent = $("#comment_feed_post_textarea_" + feedID).val();
						var feedPostCommentContentTrimmed = feedPostCommentContent.trim();
						var feedPostCommentContentTrimmedLength = feedPostCommentContentTrimmed.length;

						if (feedPostCommentContentTrimmed === "" || feedPostCommentContentTrimmedLength == 0) {

							var feedPostCommentTextarea = document.querySelector("#comment_feed_post_textarea_" + feedID);
							feedPostCommentTextarea.style.border = "2.5px solid red";
							feedPostCommentTextarea.placeholder = "Can't submit empty comment!";
							feedPostCommentTextarea.value = "";

						} else {

							var feedPostCommentContent = $("#comment_feed_post_textarea_" + feedID).val();

							$.ajax({

								url: "/insert_feed_post_comment_into_db.php",
								method: "GET",
								data: {

									feedPostCommentContent: feedPostCommentContent,
									feedID: feedID,
									userID: userID

								},
								success: function(data) {

									$(".comment_feed_post_modal_container").remove();
									$("body").css("overflow", "auto");

									start = 0;
									limit = limit + 5;

									$.ajax({

										url: "get_all_feed_my_profile_logged_in_me.php",
										method: "GET",
										data: {

											limit: limit,
											start: start,
											submitComment: submitComment,
											userID: userID

										},
										success: function(data) {

											$("#main_outer_feed_div").html(data);

										}

									});

								}

							});

						}

					});

					$(document).on("click", ".like_button_image", function() {

						var feedID = $(this).data("feedid");
						var feedUserID = $(this).data("feeduserid");
						$clickedButton = $(this);

						if ($clickedButton.hasClass("unclicked")) {

							action = 'like';

						} else if ($clickedButton.hasClass("clicked")) {

							action = 'unlike';

						}

						$.ajax({

							url: "/like_dislike_feed.php",
							method: "GET",
							data: {

								action: action,
								feedID: feedID,
								feedUserID: feedUserID,
								userID: userID

							},
							success: function(data) {

								res = JSON.parse(data);

								if (action == 'like') {

									$clickedButton.removeClass("unclicked");
									$clickedButton.addClass("clicked");

								} else if (action = 'unlike') {

									$clickedButton.removeClass("clicked");
									$clickedButton.addClass("unclicked");

								}

								$("#like_counter_" + feedID).html(res.likes);

								$("img#dislike_counter_" + feedID).removeClass("clicked").addClass("unclicked");

							}

						});

					});

					$(document).ready(function() {

						action = "inactive";

						$(window).scroll(function() {

							if ($(window).scrollTop() > 250) {

								$("#scroll_up_arrow_image").css("display", "inline-block");

							} else {

								$("#scroll_up_arrow_image").css("display", "none");

							}

							if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() + 250) {

								$("#scroll_down_arrow_image").css("display", "none");

							} else {

								$("#scroll_down_arrow_image").css("display", "inline-block");
							}

						});

						$(document).on("click", "#scroll_down_arrow_image", function() {

							$("html, body").animate({

								scrollTop: $(document).height() - $(window).height()

							}, function() {

								$(window).scroll(function() {

									if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

										action = "active";
										start = start + limit;

										getAllFeedScrollMyProfileLoggedInMe(limit, start);

									}

								});

							});

						});

						$(document).on("click", "#scroll_up_arrow_image", function() {

							$("html, body").animate({

								scrollTop: 0

							});

						});

						$(document).ready(function() {

							$("#scroll_up_arrow_image").css("display", "none");

						});

					});

					if (action == "inactive") {

						action = "active";

					}

					$(window).scroll(function() {

						if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

							action = "active";
							start = start + limit;

							getAllFeedScrollMyProfileLoggedInMe(limit, start);

						}

					});

					$(document).ready(function() {

						limit = 5;
						start = 0;
						getAllFeedMyProfileLoggedInMe(limit, start);
						action = "inactive";

						$(window).scroll(function() {

							if ($(window).scrollTop() > 250) {

								$("#scroll_up_arrow_image").css("display", "inline-block");

							} else {

								$("#scroll_up_arrow_image").css("display", "none");

							}

							if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() + 250) {

								$("#scroll_down_arrow_image").css("display", "none");

							} else {

								$("#scroll_down_arrow_image").css("display", "inline-block");
							}

						});

						$(document).on("click", "#scroll_down_arrow_image", function() {

							$("html, body").animate({

								scrollTop: $(document).height() - $(window).height()

							}, function() {

								if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

									action = "active";

									getAllFeedScrollMyProfileLoggedInMe(limit, start);

								}

							});

						});

						$(document).on("click", "#scroll_up_arrow_image", function() {

							$("html, body").animate({

								scrollTop: 0

							});

						});

						$(document).ready(function() {

							$("#scroll_up_arrow_image").css("display", "none");

						});

					});

					$(document).on("click", ".follow_user_button_div_for_each", function() {

						var followingUserId = $(this).data("feeduserid");
						var feedId = $(this).data("feedid");
						var followUnfollow = true;

						$.ajax({

							url: "/follow_user.php",
							method: "GET",
							data: {

								followingUserId: followingUserId,
								feedId: feedId,
								userID: userID

							},
							success: function(data) {

								start = 0;
								limit = limit + 5;

								$.ajax({

									url: "get_all_feed_my_profile_logged_in_me.php",
									method: "GET",
									data: {

										limit: limit,
										start: start,
										followUnfollow: followUnfollow,
										userID: userID

									},
									success: function(data) {

										$("#main_outer_feed_div").html(data);

									}

								});

							}

						});

					});

					$(document).on("click", ".unfollow_user_button_div_for_each", function() {

						var unfollowUserId = $(this).data("feeduserid");
						var followUnfollow = true;

						$.ajax({

							url: "/unfollow_user.php",
							method: "GET",
							data: {

								unfollowUserId: unfollowUserId,
								userID: userID

							},
							success: function(data) {

								start = 0;
								limit = limit + 5;

								$.ajax({

									url: "get_all_feed_my_profile_logged_in_me.php",
									method: "GET",
									data: {

										limit: limit,
										start: start,
										followUnfollow: followUnfollow,
										userID: userID

									},
									success: function(data) {

										$("#main_outer_feed_div").html(data);

									}

								});

							}

						});

					});

				</script>

			<?php

		}

	?>

	<div id="feed_label_for_others_div">

		<?php

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$myID = fetchMyID($_GET['username'], $db);
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
							
							#feed_label_for_others {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

		?>
		
		<h1 id="feed_label_for_others"><?php echo $username; ?></h1><h1 id="feed_label_for_others_2">'s Feed</h1>

	</div>

	<?php

		$userUsername = $_GET['username'];
		$userID = fetchMyID($userUsername, $db);

		$query = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

			if ($feedPostsCounter == 1) {

				$feedPostsCounter = mysqli_num_rows($result) . " feed post";

			}

		} else {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

		}

	?>

	<p id="number_of_feed_posts_for_others"><?php echo $feedPostsCounter; ?></p>

	<div id="main_outer_feed_div"></div>

<?php endif ?>

<?php } else { ?>

	<?php

		?>

			<h1 id="profile_and_user_error_label"><?php echo $profileAndUserError; ?></h1>

			<p id="profile_not_accessible"><?php echo $profileNotAccessible; ?></p>

			<h2 id="or_label">OR</h2>

			<p id="user_not_found"><?php echo $userNotFound; ?></p>

			<script type="text/javascript">
				
				$(document).ready(function() {



				})

			</script>

		<?php

	?>

<?php } ?>

<?php

	if (isset($_GET['username'])) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$userID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_GET['username']) {

					$userID = $row['id'];

				}

			}

			$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
			$stmt = $db->prepare($numberOfFeedPostsQuery);
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$numberOfFeedPostsQueryResult = $stmt->get_result();

		}

	} else {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$userID = "";

		if ($result->num_rows >= 1) {

			$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
			$stmt = $db->prepare($numberOfFeedPostsQuery);
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$numberOfFeedPostsQueryResult = $stmt->get_result();

		}

	}

?>

<?php if ($login == 0 && $numberOfFeedPostsQueryResult->num_rows >= 1) : ?>

	<?php

		if (isset($_GET['username'])) {

			$query = "SELECT * FROM users;";
			$stmt = $db->prepare($query);
			$stmt->execute();
			$result = $stmt->get_result();
			$userID = "";

			if ($result->num_rows >= 1) {

				while ($row = $result->fetch_assoc()) {

					if ($row['username'] === $_GET['username']) {

						$userID = $row['id'];

					}

				}

				?>

					<script type="text/javascript">

						var limit = 5;
						var start = 0;
						var action = "inactive";

						$(document).on("click", ".feed_image_content_div_for_each_image", function() {

							$(window).scrollTop();
							$(window).scrollLeft();

							setTimeout(function() {

								$(window).scrollTop();
								$(window).scrollLeft();

							}, 500);

							var feedPostImage = $(this).attr("id");
							var feedPostImageId = $(this).data("feedpostimageid");

							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("position", "fixed");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("max-width", "90%");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("max-height", "90%");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("height", "auto");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("width", "initial");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("z-index", "1000");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("left", "0");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("right", "0");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("top", "0");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("bottom", "0");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("margin", "auto");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("transition", "0.15s");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("border-radius", "0.75vw");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).css("pointer-events", "none");
							$("body").css("overflow", "hidden");

							$("body").append("<div class='zoomed_in_feed_post_image_cover_div' id='zoomed_in_feed_post_image_cover_div_" + feedPostImageId + "' data-zoomedfeedpostimage='" + feedPostImageId + "'><span class='close_zoomed_in_feed_post_image_cover_div_modal' id='close_zoomed_in_feed_post_image_cover_div_modal_" + feedPostImageId + "' data-feedpostclosemodalspan='" + feedPostImageId + "'>&times;</span></div>");
							$(".zoomed_in_feed_post_image_cover_div").css("display", "block");
							$("#feed_image_content_div_for_each_image_" + feedPostImageId).addClass("zoomed_in_feed_post_image");

						});

						$("html").bind("keydown", function(e) {

							if (e.keyCode === 27) {

								if ($(".zoomed_in_feed_post_image_cover_div").is(":visible")) {

									var zoomedFeedPostImageId = $(".zoomed_in_feed_post_image_cover_div").data("zoomedfeedpostimage");

									$(".zoomed_in_feed_post_image_cover_div").remove();
									$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeAttr("style");
									$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeClass("zoomed_in_feed_post_image");
									$("body").css("overflow", "auto");

								}

							}

						});

						$(document).on("click", ".close_zoomed_in_feed_post_image_cover_div_modal", function() {

							var closeFeedPostImageModalSpan = $(this).data("feedpostclosemodalspan");

							$(".zoomed_in_feed_post_image_cover_div").remove();
							$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeAttr("style");
							$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeClass("zoomed_in_feed_post_image");
							$("body").css("overflow", "auto");

						});

						function getAllFeedScrollNotLoggedIn(limit, start) {

							$.ajax({

								url: "/get_all_feed_scroll_not_logged_in.php",
								method: "GET",
								data: {

									limit: limit,
									start: start

								},
								cache: false,
								success: function(data) {

									$("#main_outer_feed_div").append(data);

									if (data == "") {

										action = "active";

									} else {

										action = "inactive";

									}

								}

							});

						}

						if (action == "inactive") {

							action = "active";

						}

						$(window).scroll(function() {

							if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

								action = "active";
								start = start + limit;

								getAllFeedScrollNotLoggedIn(limit, start);

							}

						});

						function getAllFeedNotLoggedIn(limit, start) {

							$.ajax({

								url: "/get_all_feed_not_logged_in.php",
								method: "GET",
								data: {

									limit: limit,
									start: start

								},
								success: function(data) {

									$("#main_outer_feed_div").html(data);

								}

							});

						}

						$(document).on("click", ".view_comments_feed_div_for_each", function() {

							var feedID = $(this).data("feedid");
							var feedPostCommentCount = $(this).data("feedpostcommentcount");


							$.ajax({

								url: "/get_all_feed_comments_not_logged_in.php",
								method: "GET",
								data: {

									feedID: feedID

								},
								success: function(data) {

									$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "block");

									$("#comments_feed_div_for_each_main_outer_div_" + feedID).html(data);

									$("#view_comments_feed_div_for_each_" + feedID).remove();

									$("#comment_view_comments_feed_div_for_each_inner_bottom_div_" + feedID).append('<p class="hide_comments_feed_div_for_each" style="padding: 0.2vw;" id="hide_comments_feed_div_for_each_' + feedID + '" data-feedid="' + feedID + '" data-feedpostcommentcount="' + feedPostCommentCount + '">Hide comments</p>');

								}

							});

						});

						$(document).on("click", ".hide_comments_feed_div_for_each", function() {

							var feedID = $(this).data("feedid");
							var feedPostCommentCount = $(this).data("feedpostcommentcount");

							$("#comments_feed_div_for_each_main_outer_div_" + feedID).css("display", "none");

							$("#comments_feed_div_for_each_main_outer_div_" + feedID).empty();

							$("#hide_comments_feed_div_for_each_" + feedID).remove();

							$("#comment_view_comments_feed_div_for_each_inner_bottom_div_" + feedID).append('<p class="view_comments_feed_div_for_each" style="padding: 0.2vw;" id="view_comments_feed_div_for_each_' + feedID + '" data-feedid="' + feedID + '" data-feedpostcommentcount="' + feedPostCommentCount + '">View comments</p>');

						});

						$(document).on("click", ".feed_post_comments_each_div_comment_content_view_replies", function() {

							var feedPostCommentId = $(this).data("feedpostcommentid");
							var feedID = $(this).data("feedid");
							var feedPostCommentCount = $(this).data("feedpostcommentcount");

							$.ajax({

								url: "/get_all_feed_comments_replies_not_logged_in.php",
								method: "GET",
								data: {

									feedPostCommentId: feedPostCommentId,
									feedID: feedID

								},
								success: function(data) {

									$("#feed_post_comments_view_replies_main_outer_div_" + feedPostCommentId).html(data);

									$("#feed_post_comments_each_div_comment_content_view_replies_" + feedPostCommentId).remove();

									$("#feed_post_comments_check_if_replies_exist_div_" + feedPostCommentId).append('<p class="feed_post_comments_each_div_comment_content_hide_replies" id="feed_post_comments_each_div_comment_content_hide_replies_' + feedPostCommentId + '" data-feedid="' + feedID + '" data-feedpostcommentid="' + feedPostCommentId + '" data-feedpostcommentcount="' + feedPostCommentCount + '">Hide replies</p>');

								}

							});

						});

						$(document).on("click", ".feed_post_comments_each_div_comment_content_hide_replies", function() {

							var feedPostCommentId = $(this).data("feedpostcommentid");
							var feedID = $(this).data("feedid");
							var feedPostCommentCount = $(this).data("feedpostcommentcount");

							$("#feed_post_comments_view_replies_main_outer_div_" + feedPostCommentId).empty();

							$("#feed_post_comments_each_div_comment_content_hide_replies_" + feedPostCommentId).remove();

							$("#feed_post_comments_check_if_replies_exist_div_" + feedPostCommentId).append('<p class="feed_post_comments_each_div_comment_content_view_replies" id="feed_post_comments_each_div_comment_content_view_replies_' + feedPostCommentId + '" data-feedid="' + feedID + '" data-feedpostcommentid="' + feedPostCommentId + '" data-feedpostcommentcount="' + feedPostCommentCount + '">View replies (' + feedPostCommentCount + ')</p>');

						});

						$(document).ready(function() {

							action = "inactive";

							$(window).scroll(function() {

								if ($(window).scrollTop() > 250) {

									$("#scroll_up_arrow_image").css("display", "inline-block");

								} else {

									$("#scroll_up_arrow_image").css("display", "none");

								}

								if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() + 250) {

									$("#scroll_down_arrow_image").css("display", "none");

								} else {

									$("#scroll_down_arrow_image").css("display", "inline-block");
								}

							});

							$(document).on("click", "#scroll_down_arrow_image", function() {

								$("html, body").animate({

									scrollTop: $(document).height() - $(window).height()

								}, function() {

									$(window).scroll(function() {

										if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

											action = "active";
											start = start + limit;

											getAllFeedScrollNotLoggedIn(limit, start);

										}

									});

								});

							});

							$(document).on("click", "#scroll_up_arrow_image", function() {

								$("html, body").animate({

									scrollTop: 0

								});

							});

							$(document).ready(function() {

								$("#scroll_up_arrow_image").css("display", "none");

							});

						});

						$(document).ready(function() {

							limit = 5;
							start = 0;
							getAllFeedNotLoggedIn(limit, start);
							action = "inactive";

							$(window).scroll(function() {

								if ($(window).scrollTop() > 250) {

									$("#scroll_up_arrow_image").css("display", "inline-block");

								} else {

									$("#scroll_up_arrow_image").css("display", "none");

								}

								if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() + 250) {

									$("#scroll_down_arrow_image").css("display", "none");

								} else {

									$("#scroll_down_arrow_image").css("display", "inline-block");
								}

							});

							$(document).on("click", "#scroll_down_arrow_image", function() {

								$("html, body").animate({

									scrollTop: $(document).height() - $(window).height()

								}, function() {

									if ($(window).scrollTop() + $(window).height() > $("#main_outer_feed_div").height() && action == "inactive") {

										action = "active";

										getAllFeedScrollNotLoggedIn(limit, start);

									}

								});

							});

							$(document).on("click", "#scroll_up_arrow_image", function() {

								$("html, body").animate({

									scrollTop: 0

								});

							});

							$(document).ready(function() {

								$("#scroll_up_arrow_image").css("display", "none");

							});

						});

					</script>

				<?php

			}

		}

	?>

	<div id="feed_label_for_others_div">

		<?php

			$customUsernameStylingTextContent = "";

			$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
			$myID = fetchMyID($_GET['username'], $db);
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
							
							#feed_label_for_others {

								color: <?php echo $customUsernameStylingTextContent; ?>;

							}

						</style>

					<?php

				}

			}

		?>
		
		<h1 id="feed_label_for_others"><?php echo $username; ?></h1><h1 id="feed_label_for_others_2">'s Feed</h1>

	</div>

	<?php

		$query = "SELECT * FROM feed WHERE feedUserId = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("i", $userID);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

			if ($feedPostsCounter == 1) {

				$feedPostsCounter = mysqli_num_rows($result) . " feed post";

			}

		} else {

			$feedPostsCounter = mysqli_num_rows($result) . " feed posts";

		}

	?>

	<p id="number_of_feed_posts_for_others"><?php echo $feedPostsCounter; ?></p>

	<p id="no_feed_posts_found_for_others"><?php echo $feedPostsListEmptyForOthers; ?></p>

	<div id="main_outer_feed_div"></div>

<?php endif ?>

<?php

	if (isset($_GET['username'])) {

		$query = "SELECT * FROM users;";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$userID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_GET['username']) {

					$userID = $row['id'];

				}

			}

			$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
			$stmt = $db->prepare($numberOfFeedPostsQuery);
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$numberOfFeedPostsQueryResult = $stmt->get_result();

		}
		
	}

?>

<?php if ($login == 0 && $numberOfFeedPostsQueryResult->num_rows == 0) : ?>

	<?php

		if (isset($_GET['username'])) {

			$query = "SELECT * FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$username = $_GET['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$userID = "";

			if ($result->num_rows >= 1) {

				$username = $_GET['username'];
				$feedPostsListEmptyForOthers = $username . "'s feed is currently empty!";
				$feedPostsCounter = "0 feed posts";

				?>

					<div id="feed_label_for_others_div">

						<?php

							$customUsernameStylingTextContent = "";

							$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
							$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
							$myID = fetchMyID($_GET['username'], $db);
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
											
											#feed_label_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						?>
						
						<h1 id="feed_label_for_others"><?php echo $username; ?></h1><h1 id="feed_label_for_others_2">'s Feed</h1>

					</div>

					<p id="number_of_feed_posts_for_others"><?php echo $feedPostsCounter; ?></p>

					<p id="no_feed_posts_found_for_others"><?php echo $feedPostsListEmptyForOthers; ?></p>

				<?php

			}

		}

	?>

<?php endif ?>

<?php

	if (isset($_GET['username'])) {

		$query = "SELECT * FROM users WHERE username = ?;";
		$stmt = $db->prepare($query);
		$username = $_GET['username'];
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		$userID = "";

		if ($result->num_rows >= 1) {

			while ($row = $result->fetch_assoc()) {

				if ($row['username'] === $_GET['username']) {

					$userID = $row['id'];

				}

			}

			$numberOfFeedPostsQuery = "SELECT * FROM feed WHERE feedUserId = ?;";
			$stmt = $db->prepare($numberOfFeedPostsQuery);
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$numberOfFeedPostsQueryResult = $stmt->get_result();

		}
		
	}

?>

<?php if ($login == 1 && $numberOfFeedPostsQueryResult->num_rows == 0) : ?>

	<?php

		$query = "SELECT * FROM users WHERE username = ?;";
		$stmt = $db->prepare($query);
		$username = $_COOKIE['username'];
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();

		if (isset($_GET['username']) && $result->num_rows > 0 && $_GET['username'] == $username) {

			$feedPostsListEmpty = "Your feed is currently empty!";
			$feedPostsCounter = "0 feed posts";

		} else {

			if (isset($_GET['username'])) {

				$username = $_GET['username'];
				$feedPostsListEmpty = $username . "'s feed is currently empty!";
				$feedPostsCounter = "0 feed posts";

				?>

					<div id="feed_label_for_others_div">

						<?php

							$customUsernameStylingTextContent = "";

							$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
							$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
							$myID = fetchMyID($_GET['username'], $db);
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
											
											#feed_label_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						?>
						
						<h1 id="feed_label_for_others"><?php echo $username; ?></h1><h1 id="feed_label_for_others_2">'s Feed</h1>

					</div>

					<p id="number_of_feed_posts_for_others"><?php echo $feedPostsCounter; ?></p>

					<p id="no_feed_posts_found_for_others"><?php echo $feedPostsListEmpty; ?></p>

				<?php

			}

		}

	?>

<?php endif ?>

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

		var theWheel = new Winwheel({

            'numSegments'  : 12,
            'outerRadius'  : 230,
            'textFontSize' : 25,
            'segments'     :
            [
               {'fillStyle' : '#000000', 'textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '    Hard luck!'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '100'},
               {'fillStyle' : '#000000','textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '500'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '200'},
               {'fillStyle' : '#000000','textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '    Hard luck!'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '10'},
               {'fillStyle' : '#000000','textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '350'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '50'},
               {'fillStyle' : '#000000','textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '    Hard luck!'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '75'},
               {'fillStyle' : '#000000','textFillStyle' : 'white', 'textFontFamily' : 'Pixelony', 'text' : '150'},
               {'fillStyle' : '#ffffff','textFillStyle' : 'black', 'textFontFamily' : 'Pixelony', 'text' : '150'},
            ],
            'animation' :
            {
                'type'     : 'spinToStop',
                'duration' : (Math.floor(Math.random() * 12) + 3),
                'spins'    : (Math.floor(Math.random() * 15) + 1),
                'callbackFinished' : alertPrize
            }

        });


        var wheelPower    = 1;
        var wheelSpinning = false;

        function startSpin() {

            if (wheelSpinning == false) {

                theWheel.startAnimation();

                wheelSpinning = true;

            }

            $.ajax({

            	url: "/start_wheel_of_fortune_spinning.php",
            	success: function(data) {

            		
            		
            	}

            })

        }

        function alertPrize(indicatedSegment) {

        	setTimeout(function() {

        		$("#wheel_of_fortune_div").fadeOut(400, function() {

        			$(this).remove();

        		});

        	}, 2500);

        	if (indicatedSegment.text === "    Hard luck!") {

        		$("#wheel_of_fortune_inner_paragraph_div").append("<p id='wheel_of_fortune_prize_won_paragraph' style='position: absolute; left: 0; right: 0; top: 0; margin: auto;'>Ouch, better luck next time!</p>");
        		$("#wheel_of_fortune_inner_paragraph_div").append("<p id='wheel_of_fortune_prize_won_paragraph_2' style='position: absolute; left: 0; right: 0; top: 51%; margin: auto; margin-top: 6%;'>Come back tomorrow for another spin!</p>");
        		$("#wheel_of_fortune_spin_button").prop("disabled", true);
        		document.getElementById("wheel_of_fortune_spin_button").disabled = true;

        		var prize = 0;

        		$.ajax({

        			url: "/insert_wheel_of_fortune_prize.php",
        			method: "GET",
        			data: {

        				prize: prize

        			},
        			success: function(data) {



        			}

        		});

        	} else {

        		$("#wheel_of_fortune_inner_paragraph_div").append("<p id='wheel_of_fortune_prize_won_paragraph' style='position: absolute; left: 0; right: 0; top: 0; margin: auto;'>You won " + indicatedSegment.text + " coins!</p>");
        		$("#wheel_of_fortune_inner_paragraph_div").append("<p id='wheel_of_fortune_prize_won_paragraph_2' style='position: absolute; left: 0; right: 0; top: 51%; margin: auto; margin-top: 6%;'>Come back tomorrow for another spin!</p>");
        		$("#wheel_of_fortune_spin_button").prop("disabled", true);
        		document.getElementById("wheel_of_fortune_spin_button").disabled = true;

        		var prize = indicatedSegment.text;

        		$.ajax({

        			url: "/insert_wheel_of_fortune_prize.php",
        			method: "GET",
        			data: {

        				prize: prize

        			},
        			success: function(data) {



        			}

        		});

        	}

        }

        var checkMessageNotifications = true;
        var checkMessageNotificationsSoundPlayed = false;

        if (checkMessageNotifications) {

        	var checkMessageNotificationsInterval = setInterval(function() {

        		$.ajax({

	        		url: "/check_message_notifications_sound.php",
	        		method: "GET",
	        		success: function(data) {

	        			if (data != "") {

	        				var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

				        	if (visibleMessageContainer) {

				        		setTimeout(function() {

				        			var sound = new Audio(data);

				        			sound.play().then(function() {



				        			});

				        		}, 3000);

				        		checkMessageNotificationsSoundPlayed = true;

				        		clearInterval(checkMessageNotificationsInterval);

				        		if (checkMessageNotificationsSoundPlayed == true) {

						        	var checkMessageNotificationsInterval2 = setInterval(function() {

						        		$.ajax({

							        		url: "/check_message_notifications_sound.php",
							        		method: "GET",
							        		success: function(data) {

							        			var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

									        	if (visibleMessageContainer) {

									        		var sound = new Audio(data);

								        			sound.play().then(function() {



								        			});

									        	}

							        		}

							        	});

						        	}, 300000);

						        }

				        	} else {

				        		checkMessageNotificationsSoundPlayed = false;

				        		if (checkMessageNotificationsSoundPlayed == false) {

						        	var checkMessageNotificationsInterval2 = setInterval(function() {

						        		$.ajax({

							        		url: "/check_message_notifications_sound.php",
							        		method: "GET",
							        		success: function(data) {

							        			var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

									        	if (!visibleMessageContainer) {

									        		setInterval(checkMessageNotificationsInterval2);

									        	}

							        		}

							        	});

						        	}, 300000);

						        }

				        	}

	        			}

	        		}

	        	});

	        }, 3000);

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

	$(document).ready(function() {

		$(document).on("click", "#funding_main_center_link_label", function() {

			$.ajax({

				url: "/set_funding_cookie.php",
				method: "GET",
				success: function(data) {

					$("#funding_modal_container").remove();

				}

			});

		});

		$(document).on("click", "#close_funding_modal", function() {

			$.ajax({

				url: "/set_funding_cookie.php",
				method: "GET",
				success: function(data) {

					$("#funding_modal_container").remove();

				}

			});

		});

	});

</script>

</html>