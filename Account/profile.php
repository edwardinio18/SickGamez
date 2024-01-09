<?php

	include("server.php");
	include_once("colors.inc.php");
	include_once("Color.php");

	use Mexitek\PHPColors\Color;

	$query = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	$userNotFound = "User doesn't exist!";
	$profileNotAccessible = "Profile can't be accessed if not logged in!";
	$profileAndUserError = "Error";
	$userNotFoundLoggedIn = "User doesn't exist!";
	$profileNotAccessibleLoggedIn = "Profile can't be accessed!";
	$games = "";
	$gamesNoneFound = "";
	$gameActiveStatus = "";
	$gamesList = "";
	$pendingGameCounter = 0;
	$gameCounter = 0;
	$gameCoverImage = "";
	$gameID = "";
	$emptyPost = "";
	$postSubmitted = "";
	$myPosts = "";
	$myPostsList = "";
	$postsCounter = 0;
	$dateAndTimePostAdded = "";
	$noPosts = "";
	$myPostsListForOthers = "";
	$noPostsForOthers = "";
	$atLeastOneGameUploaded = 0;
	$myFriendsList = "";
	$friendsCounter = 0;
	$friendsListEmpty = "";
	$myFriendsListForOthers = "";
	$uploadedImageError = "";
	$followersListEmpty = "";
	$myFollowersList = "";
	$followersCounter = 0;
	$myFollowersListForOthers = "";
	$feedPostsCounter = 0;
	$feedPostsListEmpty = "";
	$myFeedPostsList = "";
	$noFeedPostsForOthers = "";
	$myFeedPostsListForOthers = "";

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

  	<meta name="description" content="This is the profile of the respective SickGamez user you have searched for, or even your own profile!" />

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

	    #user_profile_label {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: GomGom;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 100%;
	        margin-top: -2.5%;
	        word-spacing: 1vw;
	        display: inline;

	    }

	    #user_not_found {

	    	text-align: center;
	        font-size: 5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: 2%;

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

	    #welcome_label {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: GomGom;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 55%;
	        margin: auto;
	        display: inline;
	        word-wrap: break-word;
	        word-spacing: 0.5vw;
	        margin-left: 1.2vw;

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

	    #or_label {

	    	color: white;
	    	font-size: 3.2vw;
	    	font-family: Austere;
			margin: auto;
			text-align: center;
			animation: fade_in 2s ease;

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

	    #username_link {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 3.5vw;
	    	text-decoration: none;

	    }

	    #user_not_found_logged_in {

	    	text-align: center;
	        font-size: 5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: 1%;

	    }

	    #profile_not_accessible_logged_in {

	    	text-align: center;
	        font-size: 5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: 7.5%;

	    }

	    #profileBio {

	    	color: gray;
	    	font-size: 1.2vw;
	    	text-align: center;
	    	font-style: italic;
	    	word-wrap: break-word;
	    	width: 25%;
	    	margin: auto;
	    	margin-top: 1.4%;
	    	animation: fade_in 2s ease;
	    	cursor: default;

	    }

	    #profileBioForOthers {

	    	color: gray;
	    	font-size: 1.2vw;
	    	text-align: center;
	    	font-style: italic;
	    	word-wrap: break-word;
	    	width: 25%;
	    	margin: auto;
	    	margin-top: 1.4%;
	    	animation: fade_in 2s ease;
	    	cursor: default;

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

	    #account_settings {

	    	color: grey;
			cursor: default;
			width: 17vw;
			padding: 4%;
			background-color: #1d1f20;
			float: right;
			border-radius: 1vw;
			font-size: 1.3vw;
			border: 2.5px solid #777EB8;
			font-family: Pixelony;
			margin-top: 0%;
	    	
	    }

	    #account_settings:active {

	    	background-color: white;

	    }

	    #profile_pic_display {

	    	width: 5vw;
	    	height: 5vw;
	    	margin: auto;
	    	border-radius: 100%;
	    	vertical-align: middle;
	    	margin-top: -3%;

	    }

	    #profile_pic_display:hover {

	    	opacity: 0.5;

	    }

	    #profile_pic_display_for_others {

	    	width: 5vw;
	    	height: 5vw;
	    	margin: auto;
	    	border-radius: 100%;
	    	vertical-align: middle;
	    	margin-top: -3%;

	    }

	    #profile_pic_display_for_others:hover {

	    	opacity: 0.5;

	    }

	    #profile_top_div {

	    	text-align: center;

	    }

	    .lists {

	    	background: transparent;
	    	height: 31vw;
	    	width: 30vw;
	    	float: left;
	    	margin-left: 2.5%;
	    	border-radius: 1vw;
	    	border: 2.5px solid #777EB8;
	    	cursor: default;

	    }

	    #main_lists {


	    	text-align: center;
	    	margin-top: 2.75%;
	    	position: absolute;
	    	width: 100%;
	    	cursor: default;

	    }

	    .lists_title {

	    	color: white;
	    	font-size: 2.2vw;
	    	font-family: GomGom;
	    	margin: 0;
	    	margin-top: 2%;
	    	cursor: default;
	    	word-spacing: 0.35vw;

	    }

	    .scrolling_lists_div {

	    	height: 20.5vw;
	    	overflow: auto;
	    	margin-top: -0.6vw;

	    }

	    #gamez_not_found {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 8vw;
	    	word-wrap: break-word;

	    }

	    #number_of_gamez {

	    	color: white;
	    	font-size: 1.1vw;
	    	margin-top: 1.2vw;
	    	font-family: Pixelony;

	    }

	    #lists_title_link {

	    	color: white;
	    	text-decoration: none;
	    	outline: none;

	    }

	    #lists_title_link:hover {

	    	color: white;
	    	text-decoration: underline;

	    }

	    .gamez {

	    	position: relative;
	    	width: 24vw;
	    	height: 6vw;
	    	margin: auto;
	    	display: flex;
	    	justify-content: center;
	    	align-items: center;
	    	cursor: pointer;
	    	border-radius: 2vw;
  			margin-top: 2vw;

	    }

	    .gamez:hover {

		    opacity: 1;
		    border-radius: 2vw;
		    cursor: pointer;

	    }

	    .gamez::before {

	    	content: "";
		    position: absolute;
		    z-index: -1;
		    top: 0;
		    bottom: 0;
		    left: 0;
		    right: 0;
		    opacity: 0.5;
		    border-radius: 2vw;
		    cursor: pointer;

	    }

	    #gamez_title {

	    	position: absolute;
	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2.3vw;
	    	opacity: 1;
	    	border-radius: 2vw;
	    	cursor: pointer;

	    }

	    #gamez_title_div {

	    	position: absolute;
	    	width: 24vw;
	    	height: 6vw;
	    	display: flex;
	    	justify-content: center;
	    	align-items: center;
	    	border-radius: 2vw;
	    	cursor: pointer;

	    }

	    #gamez_title_div:hover #gamez_title  {

	    	font-size: 4vw;
	    	opacity: 0;
	    	border-radius: 2vw;
	    	cursor: pointer;
	    	transition: 0.25s all ease;

	    }

	    #gamez_button {

	    	background-color: transparent;
	    	border: none;
	    	cursor: pointer;

	    }

	    #postsForm {

	    	resize: none;
			width: 22vw;
			height: 6vw;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			font-size: 1vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			padding-left: 0.6vw;
			padding-top: 0.25vw;
			float: left;
			margin-left: 2%;
			margin-top: 2%;

	    }

	    #postsForm:focus {

	    	background-color: white;

	    }

	    #submitPost {

	    	text-align: center;
	    	background-color: #1d1f20;
	    	border-radius: 1vw;
	    	outline: none;
	    	height: 2.9vw;
	    	width: 6vw;
	    	font-size: 1.2vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	color: grey;
	    	cursor: default;
	    	margin-top: 5%;

	    }

	    #submitPost:active {

	    	background-color: white;

	    }

	    #empty_post {

	    	color: red;
	    	float: left;
	    	width: 100%;
	    	font-family: Pixelony;
	    	font-size: 1.3vw;
	    	margin-top: -6.5%;
	    	margin-bottom: -7%;

	    }

	    #post_submitted {

	    	color: green;
	    	float: left;
	    	width: 100%;
	    	font-family: Pixelony;
	    	font-size: 1.3vw;
	    	margin-top: -6.5%;
	    	margin-bottom: -7%;

	    }

	    #number_of_posts {

	    	color: white;
	    	font-size: 1.1vw;
	    	font-family: Pixelony;
	    	margin: 0;
	    	margin-top: 2.2vw;

	    }

	    .posts_scrolling_div {

			height: 85%;
			margin-bottom: 7%;
			margin-top: 0%;

	    }

	    .posts_div {

	    	position: relative;
	    	width: 90%;
	    	height: auto;
	    	margin: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	margin-top: 5%;

	    }

	    .profile_pic_display_posts {

	    	position: absolute;
	    	width: 3.5vw;
	    	height: 3.5vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	left: 2%;

	    }

	    .post_text_div {

	    	width: 80%;
	    	margin-left: 17.25%;
	    	margin-top: 7%;

	    }

	    .main_post_text {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.3vw;
	    	width: 97.5%;
	    	word-wrap: break-word;
	    	margin-top: 5%;
	    	text-align: left;
	    	word-spacing: 0.1vw;

	    }

	    .post_text_date_time {

			color: white;
			font-size: 1.1vw;
			font-family: Pixelony;
			float: right;
			margin-right: 3%;
			margin-top: 1%;
			margin-bottom: -8%;
			text-decoration: underline;

	    }

	    #no_posts_found {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 5.5vw;

	    }

	    #empty_post_2 {

	    	color: red;
	    	float: left;
	    	width: 100%;
	    	font-family: Pixelony;
	    	font-size: 1.3vw;
	    	margin-top: 7%;
	    	margin-bottom: -7%;

	    }

	    #no_posts_found_for_others {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 5.5vw;
	    	word-wrap: break-word;

	    }

	    .scrolling_lists_div_for_others {

	    	height: 22vw;
	    	overflow: auto;
	    	margin-top: 0vw;

	    }

	    #add_friend_div {

			display: inline-block;
			margin-left: 0.5vw;
			margin-right: -12vw;
			position: absolute;

	    }

	    #add_friend {

	    	width: 17vw;
			font-size: 1.25vw;
			font-family: Pixelony;
			background: transparent;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			color: gray;
			cursor: default;
			padding: 0.5vw;
			outline: none;

	    }

	    #add_friend:active {

	    	background-color: white;

	    }

	    #friend_request_icon {

			width: 3.5vw;
			margin-right: -19%;
			margin-left: -5%;
			filter: grayscale(100%);
			border: 2.5px solid #777EB8;
			border-radius: 1vw;

	    }

	    #friend_request_icon:hover {

	    	filter: grayscale(0%);

	    }

	    #profile_top_right_corner_div {

	    	float: right;
			position: relative;
			margin-top: -4%;
			margin-right: 1%;
			margin-bottom: -5%;

	    }

	    #friend_request_div {

			height: 0vw;
			margin-right: 100%;
			margin-left: -25%;
			margin-top: 0%;
			position: relative;

	    }

	    #friend_request_div:hover > #friend_requests_hover_div {

	    	display: block;

	    }

	    #notification_number {

			position: absolute;
			top: -0.5vw;
			right: 0.5vw;
			width: 1.75vw;
			height: 1.75vw;
			border-radius: 50%;
			background-color: #777EB8;
			color: white;
			text-align: center;
			line-height: 1.7vw;
			font-size: 1vw;
			font-family: GomGom;

	    }

	    #cancel_friend_request {

	    	width: 18vw;
			font-size: 1.25vw;
			font-family: Pixelony;
			background: transparent;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			color: gray;
			cursor: default;
			padding: 0.5vw;
			outline: none;

	    }

	    #cancel_friend_request:active {

	    	background-color: white;
	    	outline: none;

	    }

	    #are_friends {

	    	width: 10vw;
			font-size: 1.25vw;
			font-family: Pixelony;
			background: transparent;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			color: gray;
			cursor: default;
			padding: 0.5vw;
			outline: none;
			margin: 0;
			margin-bottom: 5%;
			margin-top: -5%;

	    }

	    #are_friends_message {

	    	width: 10vw;
			font-size: 1.25vw;
			font-family: Pixelony;
			background: transparent;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			color: gray;
			cursor: default;
			padding: 0.5vw;
			outline: none;

	    }

	    #are_friends_message:active {

	    	background-color: white;

	    }

	    #number_of_friends {

	    	color: white;
	    	font-size: 1.1vw;
	    	margin-top: 1.2vw;
	    	font-family: Pixelony;

	    }

	    .friends_div {

	    	position: relative;
	    	width: 90%;
	    	height: 25%;
	    	margin: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	margin-top: 5%;

	    }

	    .profile_pic_display_friends {

	    	position: absolute;
	    	width: 3.85vw;
	    	height: 3.85vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-right: -13%;
	    	margin-left: -48.5%;

	    }

	    .friend_username_div {

	    	width: intrinsic;
	    	width: -webkit-fit-content;
	    	margin-left: 17.25%;
	    	margin-top: 2%;
	    	padding: 0.5vw;

	    }

	    .friend_username {

	    	color: white;
			font-family: GomGom;
			font-size: 1.65vw;
			width: intrinsic;
			width: -webkit-fit-content;
			word-wrap: break-word;
			text-align: left;

	    }

	    .friend_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    #no_friends_found {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 6vw;

	    }

	    #no_friends_found_for_others {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 6vw;
	    	word-wrap: break-word;

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

	    #messages_icon {

			width: 3.555vw;
			margin-right: -19%;
			margin-left: -5%;
			filter: grayscale(100%);
			border: 2.5px solid #777EB8;
			border-radius: 1vw;

	    }

	    #messages_icon:hover {

	    	filter: grayscale(0%);

	    }

		#messages_div {

			height: 0vw;
			margin-right: 100%;
			margin-left: -50%;
			margin-top: 0%;
			position: relative;

	    }

	    #messages_div:hover > #recent_messages_hover_div {

	    	display: block;

	    }

	    #notification_number_messages {

	    	position: absolute;
			top: -0.5vw;
			right: 4.75vw;
			width: 1.75vw;
			height: 1.75vw;
			border-radius: 50%;
			background-color: #777EB8;
			color: white;
			text-align: center;
			line-height: 1.7vw;
			font-size: 1vw;
			font-family: GomGom;

	    }

	    #feed_notifications_icon {

			width: 3.555vw;
			margin-right: -19%;
			margin-left: -5%;
			filter: grayscale(100%);
			border: 2.5px solid #777EB8;
			border-radius: 1vw;

	    }

	    #feed_notifications_icon:hover {

	    	filter: grayscale(0%);

	    }

		#feed_notifications_div {

			height: 0vw;
			margin-right: 100%;
			margin-left: -75%;
			margin-top: 0%;
			position: relative;

	    }

	    #feed_notifications_div:hover > #recent_feed_notifications_hover_div {

	    	display: block;

	    }

	    #notification_number_feed_notifications {

			position: absolute;
			top: -0.5vw;
			right: 9.15vw;
			width: 1.75vw;
			height: 1.75vw;
			border-radius: 50%;
			background-color: #777EB8;
			color: white;
			text-align: center;
			line-height: 1.7vw;
			font-size: 1vw;
			font-family: GomGom;

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

        #are_friends_div_profile {

        	margin-top: -7.5%;

        }

        #are_friends_message_link {

        	text-decoration: none;

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

        #items_icon {

			width: 3.555vw;
			margin-right: -19%;
			margin-left: -5%;
			filter: grayscale(100%);
			border: 2.5px solid #777EB8;
			border-radius: 1vw;

	    }

	    #items_icon:hover {

	    	filter: grayscale(0%);

	    }

		#items_div {

			height: 0vw;
			margin-right: 100%;
			margin-left: -100%;
			margin-top: 0%;
			position: relative;

	    }

	    #welcome_label_username_content {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: GomGom;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 55%;
	        margin: auto;
	        display: inline;
	        word-wrap: break-word;
	        word-spacing: 0.5vw;

	    }

	    #label_profile_username_content {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: GomGom;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 55%;
	        margin: auto;
	        display: inline;
	        word-wrap: break-word;
	        word-spacing: 0.5vw;
	        margin-left: 1vw;

	    }

	    #label_profile_for_others {

			color: white;
			font-size: 2.2vw;
			font-family: GomGom;
			margin: 0;
			cursor: default;
			word-spacing: 0.35vw;
			display: inline-block;
			margin-top: 2%;

	    }

	    #label_profile_for_others_2 {

	    	color: white;
			font-size: 2.2vw;
			font-family: GomGom;
			margin: 0;
			cursor: default;
			word-spacing: 0.35vw;
			display: inline-block;
			margin-top: 2%;

	    }

	    #for_others_label_div {

	    	width: -webkit-fit-content;
	    	height: -webkit-fit-content;
	    	margin: auto;

	    }

	    #for_others_label_div:hover .label_profile_for_others {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #for_others_label_div:hover .label_profile_for_others_2 {

	    	text-decoration: underline;
	    	cursor: pointer;
	    	
	    }

	    #lists_title_friends_div:hover #label_profile_for_others {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_friends_div:hover #label_profile_for_others_2 {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_posts_div:hover #label_profile_for_others {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_posts_div:hover #label_profile_for_others_2 {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_feed_posts_div:hover #label_profile_for_others {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_feed_posts_div:hover #label_profile_for_others_2 {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_followers_div:hover #label_profile_for_others {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #lists_title_followers_div:hover #label_profile_for_others_2 {

	    	text-decoration: underline;
	    	cursor: pointer;

	    }

	    #logged_in_menu_username_div {

	    	width: 100%;
	    	height: -webkit-fit-content;
	    	margin: auto;
	    	text-align: center;
	    	margin-top: -10%;
	    	cursor: default;

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

        #friend_requests_hover_div {

			display: none;
			position: absolute;
			width: 22vw;
			height: 17vw;
			border: 2.5px solid #777EB8;
			background-color: #1d1f20;
			border-radius: 1vw;
			left: -225%;
			z-index: 5;
			top: 3.55vw;

        }

        #friend_requests_hover_div_title_div {

        	position: absolute;
        	width: 100%;
        	height: 17.5%;

        }

        #friend_requests_hover_div_title {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.5vw;
        	text-align: center;
        	margin: 0;
        	margin-top: 1%;
        	cursor: default;

        }

        #friend_requests_hover_div_main_div {

        	position: absolute;
        	top: 16%;
        	width: 100%;
        	height: 80%;
        	overflow: auto;
        	margin-top: -1%;

        }

        .friend_requests_hover_div_main_div_for_each_div {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .profile_pic_display_friend_requests_hover_div_main_div_for_each {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .friend_requests_hover_div_main_div_for_each_username {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.4vw;
			top: 3%;
			left: 24%;
			cursor: default;
			text-decoration: underline;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			width: 42.5%;

        }

        .friend_requests_hover_div_main_div_for_each_username_2 {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.2vw;
			top: 50%;
			left: 24%;
			cursor: default;

        }

        .friend_requests_hover_div_main_div_for_each_yes_no_div {

			position: absolute;
			right: 1%;
			height: 100%;
			width: 28%;
			bottom: 0;

        }

        .friend_requests_hover_div_main_div_for_each_yes_button {

			border: 2.5px solid #777EB8;
			border-radius: 0.5vw;
			background-color: transparent;
			color: gray;
			font-family: GomGom;
			font-size: 1.25vw;
			width: 95%;
			position: absolute;
			top: 5%;
			margin: auto;
			left: 2%;
			height: 42.5%;

        }

        .friend_requests_hover_div_main_div_for_each_yes_button:active {

        	background-color: white;

        }

        .friend_requests_hover_div_main_div_for_each_no_button {

			border: 2.5px solid #777EB8;
			border-radius: 0.5vw;
			background-color: transparent;
			color: gray;
			font-family: GomGom;
			font-size: 1.25vw;
			width: 95%;
			position: absolute;
			bottom: 5%;
			margin: auto;
			left: 2%;
			height: 42.5%;

        }

        .friend_requests_hover_div_main_div_for_each_no_button:active {

        	background-color: white;

        }

        .no_friend_requests_profile_div {

        	font-family: Pixelony;
        	font-size: 1.35vw;
        	color: white;
        	text-align: center;
        	width: 80%;
        	margin: auto;
        	margin-top: 15%;
        	cursor: default;

        }

        #recent_messages_hover_div {

			display: none;
			position: absolute;
			width: 22vw;
			height: 17vw;
			border: 2.5px solid #777EB8;
			background-color: #1d1f20;
			border-radius: 1vw;
			left: -112.5%;
			z-index: 5;
			top: 3.55vw;

        }

        #recent_messages_hover_div_title_div {

        	position: absolute;
        	width: 100%;
        	height: 17.5%;

        }

        #recent_messages_hover_div_title {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.5vw;
        	text-align: center;
        	margin: 0;
        	margin-top: 1%;
        	cursor: default;

        }

        #recent_messages_hover_div_main_div {

        	position: absolute;
        	top: 16%;
        	width: 100%;
        	height: 80%;
        	overflow: auto;
        	margin-top: -1%;

        }

        .recent_messages_hover_div_main_div_for_each_div {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .recent_messages_hover_div_main_div_for_each_div:hover {

        	cursor: pointer;
        	opacity: 0.5;

        }

        .profile_pic_display_recent_messages_hover_div_main_div_for_each {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .recent_messages_hover_div_main_div_for_each_username {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.4vw;
			top: 3%;
			left: 24%;
			cursor: pointer;
			text-decoration: underline;

        }

        .recent_messages_hover_div_main_div_for_each_content_div {

			position: absolute;
			top: 45%;
			height: 45%;
			width: 75%;
			left: 24%;
			display: flex;

        }

        .recent_messages_hover_div_main_div_for_each_content {

			font-family: GomGom;
			font-size: 1vw;
			color: gray;
			font-style: italic;
			width: 50%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 100%;
			padding-left: 0.125vw;
			margin-left: -1%;
			cursor: pointer;
			margin-top: 1%;

        }

        .recent_messages_hover_div_main_div_for_each_content_date_and_time {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 65%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 100%;
			text-align: center;
			margin-top: 1%;
			cursor: pointer;
			margin-right: -3%;
			padding-right: 0.5vw;

        }

        #no_recent_messages {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.35vw;
        	text-align: center;
        	margin-top: 15%;
        	cursor: default;

        }

        #no_recent_feed_notifications {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.35vw;
        	text-align: center;
        	margin-top: 10%;
        	cursor: default;

        }

        .notifications_from_user_counter {

			position: absolute;
			top: 0.55vw;
			left: 3.0vw;
			width: 1.35vw;
			height: 1.35vw;
			border-radius: 50%;
			background-color: #777EB8;
			color: white;
			text-align: center;
			line-height: 1.4vw;
			font-size: 0.85vw;
			font-family: GomGom;

	    }

	    .is_typing {

			color: white;
			font-family: GomGom;
			font-size: 0.8vw;
			position: absolute;
			top: 75%;
			left: 23%;
			font-style: italic;

	    }

	    .zoomed_in_profile_picture_cover_div {

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

	    .zoomed_in_profile_picture_for_others_cover_div {

	    	display: none;
			position: fixed;
			z-index: 9;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			opacity: 1;
			background-color: rgb(90, 90, 90);

	    }

	    .close_zoomed_in_profile_picture_for_others_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -1%;

	    }

	    .close_zoomed_in_profile_picture_for_others_cover_div_modal:hover, .close_zoomed_in_profile_picture_for_others_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .close_zoomed_in_profile_picture_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -1%;

	    }

	    .close_zoomed_in_profile_picture_cover_div_modal:hover, .close_zoomed_in_profile_picture_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .profile_pic_display_inner_div_class {

	    	display: inline;
	    	position: relative;

	    }

	    .profile_pic_display_inner_div_class:hover #profile_pic_display_edit_button {

	    	display: inline;

	    }

	    #profile_pic_display_edit_button {

	    	display: none;
			position: absolute;
			left: -5%;
			right: 0;
			bottom: 0;
			margin: auto;
			border: 2px solid #777EB8;
			border-radius: 1vw;
			background-color: #1d1f20;
			opacity: 0.65;
			width: 3vw;
			margin-top: -4%;
			margin-bottom: -6%;
			color: white;
			font-family: GomGom;
			font-size: 1vw;

	    }

	    #profile_pic_display_edit_button:active {

	    	opacity: 1;

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

		#imagePost {

			opacity: 0;
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			width: 0;
			height: 0;

		}

		.imagePostLabel {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 2.9vw;
			width: 6vw;
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

		#imagePostLabelSpanImage {

			width: 2.5vw;
			filter: invert(1);
			opacity: 0.5;

		}

		.imagePostLabel:active {

			background-color: white;

		}

		#imagePostLabelSpan {

			display: inline-block;
			vertical-align: middle;
			text-align: center;

		}

		.imagePostLabel:active > #imagePostLabelSpan {

	    	filter: invert(1);
			opacity: 1;

	    }

	    #image_too_big {

	    	color: red;
	    	float: left;
	    	width: 100%;
	    	font-family: Pixelony;
	    	font-size: 1.3vw;
	    	margin-top: 0.5%;
	    	margin-bottom: -7%;

	    }

	    #image_too_big_2 {

	    	color: red;
	    	float: left;
	    	width: 100%;
	    	font-family: Pixelony;
	    	font-size: 1.3vw;
	    	margin-top: 7%;
	    	margin-bottom: -7%;

	    }

	    .profile_post_image {

			position: relative;
			width: 45%;
			border-radius: 0.5vw;
			display: block;
			margin-left: 17%;
			margin-top: 8%;

	    }

	    .profile_post_image:hover {

	    	cursor: pointer;
	    	opacity: 0.6;

	    }

	    .zoomed_in_profile_post_image_cover_div {

	    	display: none;
			position: absolute;
			z-index: 9;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			opacity: 1;

	    }

	    .close_zoomed_in_profile_post_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -1%;

	    }

	    .close_zoomed_in_profile_post_image_cover_div_modal:hover, .close_zoomed_in_profile_post_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #submit_profile_post_image_preview_div {

			display: none;
			position: absolute;
			width: 26.5vw;
			height: 20vw;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-left: 2.5px solid #777EB8;
			border-top-right-radius: 1vw;
			border-top-left-radius: 1vw;
			background-color: #1d1f20;
			padding: 1%;
			z-index: 1000;
			margin-top: -21.85%;
			margin-left: 1.7%;

	    }

	    #submit_profile_post_image_preview_display {

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

	    .close_zoomed_in_submit_profile_post_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -5.75%;

	    }

	    .close_zoomed_in_submit_profile_post_image_cover_div_modal:hover, .close_zoomed_in_submit_profile_post_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .uploaded_image_too_large {

	    	border: 2.5px solid red;

	    }

	    .lists_title_friends_followers {

			display: inline-block;
			margin-right: 1.5vw;
			margin-left: 1.5vw;

	    }

	    #main_friends_list_outer_div {

	    	display: block;

	    }

	    #main_followers_list_outer_div {

	    	display: none;

	    }

	    #number_of_followers {

	    	color: white;
	    	font-size: 1.1vw;
	    	margin-top: 1.2vw;
	    	font-family: Pixelony;

	    }

	    #no_followers_found {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 6vw;

	    }

	    .lists_title_friends_followers_inner_div {

	    	display: inline-block;
			margin-left: 3vw;
			margin-right: 3vw;

	    }

	    .lists_title_posts_feed_posts_inner_div {

	    	display: inline-block;
			margin-left: 3vw;
			margin-right: 3vw;

	    }

	    #no_followers_found_for_others {

	    	text-align: center;
	    	color: white;
	    	font-size: 1.6vw;
	    	font-family: Pixelony;
	    	width: 60%;
	    	margin: auto;
	    	margin-top: 6vw;

	    }

	    .followers_div {

	    	position: relative;
	    	width: 90%;
	    	height: 25%;
	    	margin: auto;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	margin-top: 5%;

	    }

	    .profile_pic_display_followers {

	    	position: absolute;
	    	width: 3.85vw;
	    	height: 3.85vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-right: -13%;
	    	margin-left: -48.5%;

	    }

	    .follower_username_div {

	    	width: intrinsic;
	    	width: -webkit-fit-content;
	    	margin-left: 17.25%;
	    	margin-top: 2%;
	    	padding: 0.5vw;

	    }

	    .follower_username {

	    	color: white;
			font-family: GomGom;
			font-size: 1.65vw;
			width: intrinsic;
			width: -webkit-fit-content;
			word-wrap: break-word;
			text-align: left;

	    }

	    .follower_user_link:hover {

	    	text-decoration: underline;
	    	color: white;

	    }

	    #recent_feed_notifications_hover_div {

	    	display: none;
			position: absolute;
			width: 22vw;
			height: 17vw;
			border: 2.5px solid #777EB8;
			background-color: #1d1f20;
			border-radius: 1vw;
			left: -75%;
			z-index: 5;
			top: 3.55vw;

        }

        #recent_feed_notifications_hover_div_title_div {

        	position: absolute;
        	width: 100%;
        	height: 17.5%;

        }

        #recent_feed_notifications_hover_div_title {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.5vw;
        	text-align: center;
        	margin: 0;
        	margin-top: 1%;
        	cursor: default;

        }

        #recent_feed_notifications_hover_div_main_div {

			position: absolute;
			top: 27%;
			width: 100%;
			height: 70%;
			overflow: auto;
			margin-top: -2%;

        }

        #recent_feed_notifications_hover_div {

			display: none;
			position: absolute;
			width: 22vw;
			height: 17vw;
			border: 2.5px solid #777EB8;
			background-color: #1d1f20;
			border-radius: 1vw;
			left: -75%;
			z-index: 5;
			top: 3.55vw;

        }

        #recent_feed_notifications_hover_div_title_div {

        	position: absolute;
        	width: 100%;
        	height: 17.5%;

        }

        #recent_feed_notifications_hover_div_title {

        	color: white;
        	font-family: Pixelony;
        	font-size: 1.5vw;
        	text-align: center;
        	margin: 0;
        	margin-top: 1%;
        	cursor: default;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_comment {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_comment:hover {

        	cursor: pointer;
        	opacity: 0.5;

        }

        .profile_pic_display_recent_feed_notifications_hover_div_main_div_for_each_feed_comment {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_username_feed_comment {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			top: 3%;
			left: 24%;
			cursor: pointer;
			text-decoration: underline;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_div_feed_comment {

			position: absolute;
			top: 45%;
			height: 45%;
			width: 75%;
			left: 24%;
			display: flex;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_feed_comment {

			font-family: GomGom;
			font-size: 1vw;
			color: gray;
			font-style: italic;
			width: 100%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 70%;
			padding-left: 0.125vw;
			margin-left: -1%;
			cursor: pointer;
			margin-top: -1.25%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_date_and_time_feed_comment {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 65%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 69%;
			text-align: left;
			margin-top: 0.5%;
			cursor: pointer;
			margin-right: -3%;
			padding-right: 0.5vw;
			position: absolute;
			top: 49%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_comment_reply {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_comment_reply:hover {

        	cursor: pointer;
        	opacity: 0.5;

        }

        .profile_pic_display_recent_feed_notifications_hover_div_main_div_for_each_feed_comment_reply {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_username_feed_comment_reply {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			top: 3%;
			left: 24%;
			cursor: pointer;
			text-decoration: underline;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_div_feed_comment_reply {

			position: absolute;
			top: 45%;
			height: 45%;
			width: 75%;
			left: 24%;
			display: flex;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_feed_comment_reply {

			font-family: GomGom;
			font-size: 1vw;
			color: gray;
			font-style: italic;
			width: 100%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 70%;
			padding-left: 0.125vw;
			margin-left: -1%;
			cursor: pointer;
			margin-top: -1.25%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_date_and_time_feed_comment_reply {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 65%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 69%;
			text-align: left;
			margin-top: 0.5%;
			cursor: pointer;
			margin-right: -3%;
			padding-right: 0.5vw;
			position: absolute;
			top: 49%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_like {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_feed_like:hover {

        	cursor: pointer;
        	opacity: 0.5;

        }

        .profile_pic_display_recent_feed_notifications_hover_div_main_div_for_each_feed_like {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_username_feed_like {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			top: 3%;
			left: 24%;
			cursor: pointer;
			text-decoration: underline;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_div_feed_like {

			position: absolute;
			top: 45%;
			height: 45%;
			width: 75%;
			left: 24%;
			display: flex;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_feed_like {

			font-family: GomGom;
			font-size: 1vw;
			color: gray;
			font-style: italic;
			width: 100%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 70%;
			padding-left: 0.125vw;
			margin-left: -1%;
			cursor: pointer;
			margin-top: -1.25%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_date_and_time_feed_like {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 65%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 69%;
			text-align: left;
			margin-top: 0.5%;
			cursor: pointer;
			margin-right: -3%;
			padding-right: 0.5vw;
			position: absolute;
			top: 49%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_follower {

        	position: relative;
        	width: 90%;
        	height: 5.5vw;
        	border: 2.5px solid #777EB8;
        	border-radius: 1vw;
        	margin: auto;
        	margin-top: 3%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_div_follower:hover {

        	cursor: pointer;
        	opacity: 0.5;

        }

        .profile_pic_display_recent_feed_notifications_hover_div_main_div_for_each_follower {

			position: absolute;
			width: 3.85vw;
			height: 3.85vw;
			top: 0;
			bottom: 0;
			left: 2%;
			border-radius: 100%;
			margin: auto;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_username_follower {

			position: absolute;
			color: white;
			font-family: GomGom;
			font-size: 1.3vw;
			top: 3%;
			left: 24%;
			cursor: pointer;
			text-decoration: underline;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_div_follower {

			position: absolute;
			top: 45%;
			height: 45%;
			width: 75%;
			left: 24%;
			display: flex;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_follower {

			font-family: GomGom;
			font-size: 1vw;
			color: gray;
			font-style: italic;
			width: 100%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 70%;
			padding-left: 0.125vw;
			margin-left: -1%;
			cursor: pointer;
			margin-top: -1.25%;

        }

        .recent_feed_notifications_hover_div_main_div_for_each_content_date_and_time_follower {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 65%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 69%;
			text-align: left;
			margin-top: 0.5%;
			cursor: pointer;
			margin-right: -3%;
			padding-right: 0.5vw;
			position: absolute;
			top: 49%;

        }

        #notifications_mark_all_as_read {

			color: grey;
			font-family: GomGom;
			font-size: 1.2vw;
			text-align: center;
			cursor: default;
			font-style: italic;
			text-decoration: underline;
			opacity: 0.6;
			width: 8vw;
			margin: auto;
			margin-top: -1.5%;

        }

        #notifications_mark_all_as_read:hover {

        	cursor: pointer;
        	opacity: 1;

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

	    .lists_title_posts_feed {

			display: inline-block;
			margin-right: 1.5vw;
			margin-left: 1.5vw;

	    }

	    #my_posts_main_outer_div_container {

	    	height: 80%;

	    }

	    #main_feed_posts_list_outer_div {

	    	display: none;

	    }

	    #number_of_feed_posts {

			color: white;
			font-size: 1.1vw;
			margin-top: 1.2vw;
			font-family: Pixelony;

	    }

	    #no_feed_posts_found {

	    	display: none;
			text-align: center;
			color: white;
			font-size: 1.6vw;
			font-family: Pixelony;
			width: 60%;
			margin: auto;
			margin-top: 5.5vw;

	    }

	    #main_posts_list_outer_div {

			height: 60%;
			margin-top: 0%;
			display: block;

	    }

	    .main_outer_feed_div_for_each {

			position: relative;
			width: 90%;
			height: auto;
			margin: auto;
			margin-top: 5%;

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

			width: 3.85vw;
			height: 3.85vw;
			border-radius: 100%;
			margin-top: 0.25vw;
			margin-bottom: 0.25vw;
			margin-left: -21.75vw;

		}

		.username_feed_div_for_each {

			color: white;
			font-family: GomGom;
			font-size: 1.75vw;
			position: absolute;
			left: 18%;
			top: 18%;
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
			margin-top: 0.25vw;
			text-align: left;

		}

		.bottom_feed_div_time_and_date_added_for_each {

			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			width: 50%;
			word-break: break-word;
			margin: 0;
			margin-left: 1.5%;
			cursor: default;
			text-align: right;
			float: none;
			text-decoration: underline;
			position: relative;
			right: -47.5%;

		}

		.like_button_image {

			width: 2vw;
			height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 4%;

		}

		#main_outer_feed_div {

			position: relative;
			width: 100%;
			height: auto;
			margin: auto;
			margin-top: -5vw;

		}

		.bottom_feed_like_div_for_each {

			position: absolute;
			width: 30%;
			height: 2vw;

	    }

	    #like_div {

			width: 30%;
			height: 100%;
			text-align: center;
			vertical-align: middle;

		}

		.like_counter {

			width: auto;
			height: 2vw;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 37.5%;
			color: white;
			font-family: GomGom;
			font-size: 1.5vw;
			cursor: default;
			margin-top: 1%;

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

	    #no_feed_posts_found_for_others {

	    	display: none;
			text-align: center;
			color: white;
			font-size: 1.6vw;
			font-family: Pixelony;
			width: 60%;
			margin: auto;
			margin-top: 5.5vw;
			word-wrap: break-word;

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

	<?php

		if (isset($_GET["username"])) {

			$query = "SELECT * FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$username = $_GET["username"];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {

				if ($row = $result->fetch_assoc()) {

					$userProfilePictureDB = $row['profileImage'];
					$userProfilePictureDBPath = "/home/yv4nbnligki0/public_html/Profile_pictures/" . $userProfilePictureDB;

					$userProfileLabel = "'s Profile";
					$userProfilePicture = "/Profile_pictures/" . $row["profileImage"];

					if ($row['profileImage'] == "") {

						$userProfilePictureDBPath = "/home/yv4nbnligki0/public_html/Images/profile_image_placeholder.png";

						$userProfilePicture = "Images/profile_image_placeholder.png";

					}

					if ($login == 1 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie || $login == 0 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie) {

						?>

							<script type="text/javascript">
					
								$(document).ready(function() {

									$("#profile_pic_display_for_others").remove();
									$("#profileBioForOthers").remove();
									$("#gamez_list").remove();
									$("#friends_list_main").remove();
									$("#posts_list").remove();
									$("#add_friend_form").remove();

								})

							</script>

						<?php

					} else {

						$profileBioForOthers = $row["bio"];
						$decryptedBioForOthers = decrypt($profileBioForOthers, $key);
						$decryptedStrippedTagsBio = strip_tags($decryptedBioForOthers);

					}

				}

			} else {

				$userNotFound = "User doesn't exist!";
				$profileNotAccessible = "Profile can't be accessed if not logged in!";
				$profileAndUserError = "Error";

			}

		}

	?>

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

	<?php

		if ($login == 1 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie || $login == 0 && $result->num_rows > 0 && $_GET['username'] === $usernameCookie) {

			$customBackgroundImageContent = "";
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
								
								#welcome_label_username_content {

									color: white;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								#welcome_label_username_content {

									color: <?php echo $customUsernameStylingTextContent; ?>;

								}

							</style>

						<?php

					}

				}

			}

			$checkCustomBackGroundActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomBackGroundActiveStatusQuery);
			$myID = fetchMyID($_COOKIE['username'], $db);
			$customBackgroundImageId = 1;
			$customBackgroundImageActiveStatus = 1;
			$stmt->bind_param("sii", $myID, $customBackgroundImageId, $customBackgroundImageActiveStatus);
			$stmt->execute();
			$checkCustomBackGroundActiveStatusQueryResult = $stmt->get_result();

			if ($checkCustomBackGroundActiveStatusQueryResult->num_rows >= 1) {

				if ($row = $checkCustomBackGroundActiveStatusQueryResult->fetch_assoc()) {

					$customBackgroundImageContent = $row['backgroundProfileImage'];
					$customBackgroundImageContentPath = "/Background_profile_images/";
					$customBackgroundImageContentPathWhole = $customBackgroundImageContentPath . $customBackgroundImageContent;

					if ($customBackgroundImageContent == "") {

						?>

							<style type="text/css">
								
								body {

									background: #1d1f20;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								body {

									background: url("<?php echo $customBackgroundImageContentPathWhole ?>") no-repeat center center fixed;
									-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;

								}

								.lists {

									background: #1d1f20;
									height: 31vw;
									width: 30vw;
									float: left;
									margin-left: 2.5%;
									border-radius: 1vw;
									border: 2.5px solid #777EB8;
									cursor: default;
									opacity: 0.9;

								}

								#items_icon {

								    width: 3.5vw;
								    margin-right: -19%;
								    margin-left: -5%;
								    filter: grayscale(100%);
								    border: 2.5px solid #777EB8;
								    border-radius: 1vw;
								    background: #1d1f20;
								    opacity: 0.9;

								}

								#messages_icon {

								    width: 3.555vw;
								    margin-right: -19%;
								    margin-left: -5%;
								    filter: grayscale(100%);
								    border: 2.5px solid #777EB8;
								    border-radius: 1vw;
								    background: #1d1f20;
								    opacity: 0.9;

								}

								#friend_request_icon {

								    width: 3.5vw;
								    margin-right: -19%;
								    margin-left: -5%;
								    filter: grayscale(100%);
								    border: 2.5px solid #777EB8;
								    border-radius: 1vw;
								    background: #1d1f20;
								    opacity: 0.9;

								}

								#feed_notifications_icon {

									width: 3.555vw;
									margin-right: -19%;
									margin-left: -5%;
									filter: grayscale(100%);
									border: 2.5px solid #777EB8;
									border-radius: 1vw;
									background: #1d1f20;
								    opacity: 0.9;

								}

								#account_settings {

								    color: grey;
								    cursor: default;
								    width: 17vw;
								    padding: 4%;
								    background-color: #1d1f20;
								    float: right;
								    border-radius: 1vw;
								    font-size: 1.3vw;
								    border: 2.5px solid #777EB8;
								    font-family: Pixelony;
								    margin-top: 0%;
								    opacity: 0.9;
								    
								}

								#recent_messages_hover_div {

									display: none;
									position: absolute;
									width: 22vw;
									height: 17vw;
									border: 2.5px solid #777EB8;
									background-color: #1d1f20;
									border-radius: 1vw;
									left: -112.5%;
									z-index: 5;
									top: 3.55vw;
									opacity: 0.9;

								}

								#friend_requests_hover_div {

									display: none;
									position: absolute;
									width: 22vw;
									height: 17vw;
									border: 2.5px solid #777EB8;
									background-color: #1d1f20;
									border-radius: 1vw;
									left: -225%;
									z-index: 5;
									top: 3.55vw;
									opacity: 0.9;

						        }

							</style>

						<?php

					}

				}

			}

			?>

				<script type="text/javascript">

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("notification_number").innerHTML = this.responseText;
							document.getElementById("notification_number").classList.add("existing_notification");

							if (this.responseText == 0) {

								document.getElementById("notification_number").classList.remove("existing_notification");

							}

						}

					};

					xhttp.open("GET", "friend_requests_notifications.php", true);

					xhttp.send();

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("notification_number_messages").innerHTML = this.responseText;
							document.getElementById("notification_number_messages").classList.add("existing_notification");

							if (this.responseText == 0) {

								document.getElementById("notification_number_messages").classList.remove("existing_notification");

							}

						}

					};

					xhttp.open("GET", "messages_notifications.php", true);

					xhttp.send();

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("notification_number_feed_notifications").innerHTML = this.responseText;
							document.getElementById("notification_number_feed_notifications").classList.add("existing_notification");

							if (this.responseText == 0) {

								document.getElementById("notification_number_feed_notifications").classList.remove("existing_notification");

							}

						}

					};

					xhttp.open("GET", "feed_notifications.php", true);

					xhttp.send();
			
					function loadDoc() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("notification_number").innerHTML = this.responseText;
									document.getElementById("notification_number").classList.add("existing_notification");

									if (this.responseText == 0) {

										document.getElementById("notification_number").classList.remove("existing_notification");

									}

								}

							};

							xhttp.open("GET", "friend_requests_notifications.php", true);

							xhttp.send();

						}, 3000);

					}

					function loadDoc2() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("notification_number_messages").innerHTML = this.responseText;
									document.getElementById("notification_number_messages").classList.add("existing_notification");

									if (this.responseText == 0) {

										document.getElementById("notification_number_messages").classList.remove("existing_notification");

									}

								}

							};

							xhttp.open("GET", "messages_notifications.php", true);

							xhttp.send();

						}, 3000);

					}

					function loadDoc5() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("notification_number_feed_notifications").innerHTML = this.responseText;
									document.getElementById("notification_number_feed_notifications").classList.add("existing_notification");

									if (this.responseText == 0) {

										document.getElementById("notification_number_feed_notifications").classList.remove("existing_notification");

									}

								}

							};

							xhttp.open("GET", "feed_notifications.php", true);

							xhttp.send();

						}, 3000);

					}

					function loadDoc6() {

						setInterval(function() {

							var xhttp = new XMLHttpRequest();

							xhttp.onreadystatechange = function() {

								if (this.readyState == 4 && this.status == 200) {

									document.getElementById("recent_feed_notifications_hover_div_mark_all_as_read_div").innerHTML = this.responseText;

								}

							};

							xhttp.open("GET", "notifications_mark_all_as_read_page_ajax_refresh.php", true);

							xhttp.send();

						}, 3000);

					}

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("recent_feed_notifications_hover_div_mark_all_as_read_div").innerHTML = this.responseText;

						}

					};

					xhttp.open("GET", "notifications_mark_all_as_read_page_ajax_refresh.php", true);

					xhttp.send();

					loadDoc();
					loadDoc2();
					loadDoc5();
					loadDoc6();
					
				</script>

			<?php

			$getUsernameCookie = "SELECT * FROM users WHERE username = ?;";
			$stmt = $db->prepare($getUsernameCookie);
			$stmt->bind_param("s", $usernameCookie);
			$stmt->execute();
			$getUsernameCookieResult = $stmt->get_result();

			$bioDesc = $row['bio'];
			$decryptedBio = decrypt($bioDesc, $key);
			$decryptedStrippedTagsBio = strip_tags($decryptedBio);

			if ($row = $getUsernameCookieResult->fetch_assoc()) {

				$profileUsernameCookie = $row['username'];

			}

			$selectGameQuery = "SELECT * FROM gamez WHERE username = ?;";
			$stmt = $db->prepare($selectGameQuery);
			$stmt->bind_param("s", $usernameCookie);
			$stmt->execute();
			$selectGameQueryResult = $stmt->get_result();

			if ($errors == 0) {

				if ($selectGameQueryResult->num_rows >= 1) {

					$selectGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
					$stmt = $db->prepare($selectGamesQuery);
					$activeStatus = 1;
					$stmt->bind_param("si", $usernameCookie, $activeStatus);
					$stmt->execute();
					$selectGamesQueryResult = $stmt->get_result();

					while ($row = $selectGameQueryResult->fetch_assoc()) {

						$gameActiveStatus = $row['activeStatus'];

						if ($gameActiveStatus == 1) {

							$gameCoverImage = "/Game_cover_images/" . $row["gameCoverImage"];

							?>

							<style type="text/css">
								
								#gamez_image {

									background-position: center center;
									background-size: cover;
									background-repeat: no-repeat;
									width: 24vw;
									height: 6vw;
									border-radius: 1vw;
									cursor: pointer;
									opacity: 0.5;

								}

								#gamez_title_div:hover #gamez_title  {

							    	font-size: 4vw;
							    	opacity: 0;
							    	border-radius: 2vw;
							    	cursor: pointer;
							    	transition: 0.25s all ease;

							    }

							    .gamez:hover #gamez_image {

							    	opacity: 1;

							    }

							</style>

							<?php

							$games = $row['gameName'];
							$gameID = $row['gameId'];
							$gamesList .= "<li class='gamez' onclick=\"window.location.href='/game?id=" . $gameID . "'\">
			
											<div id='gamez_image' class='gamez_image' style='background-image: url(" . $gameCoverImage . ");'></div>

											<div id='gamez_title_div'>

												<p id='gamez_title'>" . $games . "</p>

											</div>

										</li>";

							?>

								<script type="text/javascript">
			
									$(document).ready(function() {

										$("#gamez_not_found").remove();

									})

								</script>

							<?php

						}

					}

				} else {

					$gamesNoneFound = "Your gamez list is currently empty!";
					$errors = 1;
					$gameCounter = "0 gamez active";
					$pendingGameCounter = "0 gamez pending";

				}

			}

			if ($errors == 0) {

				if ($atLeastOneGameUploaded == 0) {

					$selectUserGameQuery = "SELECT * FROM gamez WHERE username = ?;";
					$stmt = $db->prepare($selectUserGameQuery);
					$username = $_COOKIE['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$selectUserGameQueryResult = $stmt->get_result();

					if ($selectUserGameQueryResult->num_rows >= 1) {

						$selectNumberOfActiveGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfActiveGamesQuery);
						$activeStatus = 1;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfActiveGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfActiveGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfActiveGamesQueryResult->fetch_assoc()) {

								$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " gamez active";

								if ($gameCounter == 1) {

									$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " game active";

								}

							}

						} else {

							$gameCounter = "0 gamez active";

						}

						$selectNumberOfPendingGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfPendingGamesQuery);
						$activeStatus = 0;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfPendingGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfPendingGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfPendingGamesQueryResult->fetch_assoc()) {

								$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " gamez pending";

								if ($pendingGameCounter == 1) {

									$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " game pending";

								}

							}

						} else {

							$pendingGameCounter = "0 gamez pending";

						}

					}

				}

			}

	?>

		<div id="profile_top_right_corner_div">

			<div id="items_div">
					
				<a href="items">
					
					<img src="Images/backpack.png" id="items_icon" />

				</a>

			</div>

			<div id="feed_notifications_div">
					
				<a href="notifications">
					
					<img src="Images/feed_notifications.png" id="feed_notifications_icon" />

					<span id="notification_number_feed_notifications"></span>

				</a>

				<div id="recent_feed_notifications_hover_div">
					
					<div id="recent_feed_notifications_hover_div_title_div">
						
						<p id="recent_feed_notifications_hover_div_title">Recent Notifications</p>

						<div id="recent_feed_notifications_hover_div_mark_all_as_read_div"></div>

					</div>

					<div id="recent_feed_notifications_hover_div_main_div"></div>

				</div>

			</div>

			<div id="messages_div">
					
				<a href="messages">
					
					<img src="Images/messages.png" id="messages_icon" />

					<span id="notification_number_messages"></span>

				</a>

				<div id="recent_messages_hover_div">
					
					<div id="recent_messages_hover_div_title_div">
						
						<p id="recent_messages_hover_div_title">Recent Messages</p>

					</div>

					<div id="recent_messages_hover_div_main_div"></div>

				</div>

			</div>
			
			<div id="friend_request_div">
					
				<a href="friend_requests">
					
					<img src="Images/friend_request.png" id="friend_request_icon" />

					<span id="notification_number"></span>

				</a>

				<div id="friend_requests_hover_div">
					
					<div id="friend_requests_hover_div_title_div">
						
						<p id="friend_requests_hover_div_title">Friend Requests</p>

					</div>

					<div id="friend_requests_hover_div_main_div"></div>

				</div>

			</div>

			<button onclick="window.location.href = 'account_settings'" id="account_settings">Account Settings</button>

		</div>

		<div id="profile_top_div">

			<?php

				$mostCommonColorObject = new GetMostCommonColors();

				$resultNumber = 5;
				$reduceBrightness = 1;
				$reduceGradients = 1;
				$delta = 30;
				$mostCommonColor = $mostCommonColorObject->Get_Color($userProfilePictureDBPath, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
				$mostCommonColorBackgroundColorHashtag = "#";
				$mostCommonColorBackgroundColor = "";
				$firstColor = "";
				$secondColor = "";
				$colorFactor = 0.5;

				foreach ($mostCommonColor as $hex => $count) {

					if ($hex === array_keys($mostCommonColor)[0]) {

						$firstColor = "#" . $hex;

					}

					if ($hex === array_keys($mostCommonColor)[4]) {

						$secondColor = "#" . $hex;

					}

				}

				$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

				?>

					<style type="text/css">
						
						.zoomed_in_profile_picture_cover_div {

							background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

					    }

					</style>

				<?php

			?>
			
			<div id="profile_pic_display_inner_div" class="profile_pic_display_inner_div_class">
				
				<img src="<?php echo $userProfilePicture; ?>" id="profile_pic_display" />

				<button id="profile_pic_display_edit_button" onclick="window.location.href = 'user_profile_picture_settings' ">Edit</button>

			</div>
			
			<h1 id="welcome_label">Welcome, <h1 id="welcome_label_username_content"><?php echo $profileUsernameCookie; ?></h1></h1>

			<p id="profileBio"><?php echo $decryptedStrippedTagsBio; ?></p>

		</div>

		<div id="main_lists">
			
			<div class="lists">
				
				<p class="lists_title"><a href="gamez?username=<?php echo "$username"; ?>" id="lists_title_link">My gamez</a></p>

				<p id="number_of_gamez"><?php echo $gameCounter . " ( " . $pendingGameCounter . " ) "; ?></p>
						
				<p id="gamez_not_found"><?php echo $gamesNoneFound; ?></p>

				<div class="scrolling_lists_div">

					<?php echo $gamesList; ?>

				</div>

			</div>

			<div class="lists">

				<?php

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$myID = "";
					$friendsCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_COOKIE['username']) {

								$myID = $row['id'];

							}

						}

						$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ?;";
						$stmt = $db->prepare($numberOfFriendsQuery);
						$stmt->bind_param("i", $myID);
						$stmt->execute();
						$numberOfFriendsQueryResult = $stmt->get_result();

						if ($numberOfFriendsQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_friends_found").remove();

									})

								</script>

							<?php

							$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friends";

							if ($friendsCounter == 1) {

								$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friend";

							}

						} else {

							$friendsCounter = "0 friends";
							$errors = 1;
							$friendsListEmpty = "Your friends list is currently empty!";

						}

					}

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

						$selectFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ? LIMIT 1;";
						$stmt = $db->prepare($selectFriendsQuery);
						$stmt->bind_param("i", $myID);
						$stmt->execute();
						$selectFriendsQueryResult = $stmt->get_result();

						if ($selectFriendsQueryResult->num_rows >= 1) {

							while ($row = $selectFriendsQueryResult->fetch_assoc()) {

								$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id;";
								$stmt = $db->prepare($selectFriendDataQuery);
								$stmt->execute();
								$selectFriendDataQueryResult = $stmt->get_result();

								if ($selectFriendDataQueryResult->num_rows >= 1) {

									while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

										if ($myID === $row['friend1Id']) {

											$friendUsername = $row['username'];
											$friend2Id = $row['friend2Id'];
											$friend2IdDB = "friend_username_" . $friend2Id;

											$userProfilePictureFriend = $row['profileImage'];
											$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

											if ($userProfilePictureFriend == "") {

												$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

											}

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['friend2Id'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $friend2IdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFriendsList .= "<div class='friends_div'>
						
																	<img src='" . $userProfilePictureFriendPath . "' class='profile_pic_display_friends' />

																	<div class='friend_username_div'>
																		
																		<a href='profile?username=" . $friendUsername . "' class='friend_user_link'>
								
																			<p class='friend_username' id='" . $friend2IdDB . "'>" . $friendUsername . "</p>

																		</a>

																	</div>

																</div>";

										}

									}

								}

							}

						}

					}

					$selectFriendsQuery = "SELECT * FROM friends;";
					$stmt = $db->prepare($selectFriendsQuery);
					$stmt->execute();
					$selectFriendsQueryResult = $stmt->get_result();

					if ($selectFriendsQueryResult->num_rows == 0) {

						$friendsListEmpty = "Your friends list is currently empty!";
						$friendsCounter = "0 friends";

					}

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$myID = "";
					$followersCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_COOKIE['username']) {

								$myID = $row['id'];

							}

						}

						$numberOfFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ?;";
						$stmt = $db->prepare($numberOfFollowersQuery);
						$stmt->bind_param("i", $myID);
						$stmt->execute();
						$numberOfFollowersQueryResult = $stmt->get_result();

						if ($numberOfFollowersQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_followers_found").remove();

									})

								</script>

							<?php

							$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " followers";

							if ($followersCounter == 1) {

								$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " follower";

							}

						} else {

							$followersCounter = "0 followers";
							$errors = 1;
							$followersListEmpty = "Your followers list is currently empty!";

						}

					}

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

						$selectFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ? LIMIT 1;";
						$stmt = $db->prepare($selectFollowersQuery);
						$stmt->bind_param("i", $myID);
						$stmt->execute();
						$selectFollowersQueryResult = $stmt->get_result();

						if ($selectFollowersQueryResult->num_rows >= 1) {

							while ($row = $selectFollowersQueryResult->fetch_assoc()) {

								$selectFollowerDataQuery = "SELECT * FROM followers INNER JOIN users ON followers.followerUserId = users.id;";
								$stmt = $db->prepare($selectFollowerDataQuery);
								$stmt->execute();
								$selectFollowerDataQueryResult = $stmt->get_result();

								if ($selectFollowerDataQueryResult->num_rows >= 1) {

									while ($row = $selectFollowerDataQueryResult->fetch_assoc()) {

										if ($myID === $row['followingUserId']) {

											$followerUsername = $row['username'];
											$followerId = $row['followerUserId'];
											$followerIdDB = "follower_username_" . $followerId;

											$userProfilePictureFollower = $row['profileImage'];
											$userProfilePictureFollowerPath = "/Profile_pictures/" . $userProfilePictureFollower;

											if ($userProfilePictureFollower == "") {

												$userProfilePictureFollowerPath = "Images/profile_image_placeholder.png";

											}

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['followerUserId'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $followerIdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFollowersList .= "<div class='followers_div'>
						
																	<img src='" . $userProfilePictureFollowerPath . "' class='profile_pic_display_followers' />

																	<div class='follower_username_div'>
																		
																		<a href='profile?username=" . $followerUsername . "' class='follower_user_link'>
								
																			<p class='follower_username' id='" . $followerIdDB . "'>" . $followerUsername . "</p>

																		</a>

																	</div>

																</div>";

										}

									}

								}

							}

						}

					}

					$selectFollowersQuery = "SELECT * FROM followers;";
					$stmt = $db->prepare($selectFollowersQuery);
					$stmt->execute();
					$selectFollowersQueryResult = $stmt->get_result();

					if ($selectFollowersQueryResult->num_rows == 0) {

						$followersListEmpty = "Your followers list is currently empty!";
						$followersCounter = "0 followers";

					}

				?>
				
				<div id="lists_title_friends_followers_div">
					
					<p class="lists_title lists_title_friends_followers" id="lists_title_friends"><a href="friends?username=<?php echo "$username"; ?>" id="lists_title_link">My friends</a></p>

					<p class="lists_title lists_title_friends_followers" id="lists_title_followers"><a href="followers?username=<?php echo "$username"; ?>" id="lists_title_link">My followers</a></p>

				</div>

				<div id="main_friends_list_outer_div">
					
					<p id="number_of_friends"><?php echo $friendsCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_friends_found"><?php echo $friendsListEmpty; ?></p>
						
						<?php echo $myFriendsList; ?>

					</div>

				</div>

				<div id="main_followers_list_outer_div">
					
					<p id="number_of_followers"><?php echo $followersCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_followers_found"><?php echo $followersListEmpty; ?></p>
						
						<?php echo $myFollowersList; ?>

					</div>

				</div>

			</div>

			<div class="lists">

				<?php

					$errors = 0;

					if (isset($_POST['submitPost'])) {

						if ((!empty($_FILES['imagePost']['name'])) && (!empty($_POST['posts']))) {

							$uploadedPostImageName = $_FILES['imagePost']['name'];
							$uploadedPostImageType = $_FILES['imagePost']['type'];
							$uploadedPostImageSource = $_FILES['imagePost']['tmp_name'];
							$uploadedPostImageSize = $_FILES['imagePost']['size'];
							$uploadedPostImageTargetPath = "/home/yv4nbnligki0/public_html/Profile_posts_images/";

							$postContent = $_POST['posts'];
							$postsContentTrim = trim($postContent);
							$strippedTagsPostsContent = strip_tags($postsContentTrim);
							$encryptedPost = encrypt($strippedTagsPostsContent, $key);

							if (empty($strippedTagsPostsContent)) {

								if ($uploadedPostImageSize > 5242880) {

									$uploadedImageError = "Image can't exceed 5MB!";
									$errors = 1;

									?>

										<script type="text/javascript">
											
											$(".imagePostLabel").addClass("uploaded_image_too_large");

										</script>

										<style type="text/css">
											
											.imagePostLabel {

												border: 2.5px solid red;

											}

										</style>

									<?php

									$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username;";
									$stmt = $db->prepare($selectPostsQuery);
									$stmt->execute();
									$selectPostsQueryResult = $stmt->get_result();

									if ($selectPostsQueryResult->num_rows == 0) {

										?>

											<script type="text/javascript">
								
												$(document).ready(function() {

													$("#empty_post").remove();
													$("#image_too_big").remove();

												})

											</script>

										<?php

									} else {

										?>

											<script type="text/javascript">
								
												$(document).ready(function() {

													$("#empty_post_2").remove();
													$("#image_too_big_2").remove();

												})

											</script>

										<?php

									}

									echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

								} else {

									$postsQuery = "INSERT INTO posts (username, post, postImage, postId) VALUES (?, ?, ?, ?);";
									$stmt = mysqli_stmt_init($db);

									if (!mysqli_stmt_prepare($stmt, $postsQuery)) {

										echo "Error!";
										exit();

									} else {

										$username = $_COOKIE['username'];
										$PostID = bin2hex(random_bytes(20));
										$encryptedPost = "";

										$uploadedPostImageName = time() . ".png";

										mysqli_stmt_bind_param($stmt, "ssss", $username, $encryptedPost, $uploadedPostImageName, $PostID);
										mysqli_stmt_execute($stmt);

										if (move_uploaded_file($uploadedPostImageSource, $uploadedPostImageTargetPath . $uploadedPostImageName)) {

											$resizeMaxSize = "1000";

											resizeImage($uploadedPostImageTargetPath . $uploadedPostImageName, $resizeMaxSize);

											$postSubmitted = "Post submitted succesfully!";

											echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

										}

									}

								}

							} else {

								if ($uploadedPostImageSize > 5242880) {

									$uploadedImageError = "Image can't exceed 5MB!";
									$errors = 1;

									?>

										<script type="text/javascript">
											
											$(".imagePostLabel").addClass("uploaded_image_too_large");

										</script>

										<style type="text/css">
											
											.imagePostLabel {

												border: 2.5px solid red;

											}

										</style>

									<?php

									$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username;";
									$stmt = $db->prepare($selectPostsQuery);
									$stmt->execute();
									$selectPostsQueryResult = $stmt->get_result();

									if ($selectPostsQueryResult->num_rows == 0) {

										?>

											<script type="text/javascript">
								
												$(document).ready(function() {

													$("#empty_post").remove();
													$("#image_too_big").remove();

												})

											</script>

										<?php

									} else {

										?>

											<script type="text/javascript">
								
												$(document).ready(function() {

													$("#empty_post_2").remove();
													$("#image_too_big_2").remove();

												})

											</script>

										<?php

									}

									echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

								} else {

									$postsQuery = "INSERT INTO posts (username, post, postImage, postId) VALUES (?, ?, ?, ?);";
									$stmt = mysqli_stmt_init($db);

									if (!mysqli_stmt_prepare($stmt, $postsQuery)) {

										echo "Error!";
										exit();

									} else {

										$username = $_COOKIE['username'];
										$PostID = bin2hex(random_bytes(20));

										$uploadedPostImageName = time() . ".png";

										mysqli_stmt_bind_param($stmt, "ssss", $username, $encryptedPost, $uploadedPostImageName, $PostID);
										mysqli_stmt_execute($stmt);

										if (move_uploaded_file($uploadedPostImageSource, $uploadedPostImageTargetPath . $uploadedPostImageName)) {

											$resizeMaxSize = "1000";

											resizeImage($uploadedPostImageTargetPath . $uploadedPostImageName, $resizeMaxSize);

											$postSubmitted = "Post submitted succesfully!";

											echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

										}

									}

								}

							}

						} else if ((!empty($_FILES['imagePost']['name'])) && empty($_POST['posts'])) {

							$uploadedPostImageName = $_FILES['imagePost']['name'];
							$uploadedPostImageType = $_FILES['imagePost']['type'];
							$uploadedPostImageSource = $_FILES['imagePost']['tmp_name'];
							$uploadedPostImageSize = $_FILES['imagePost']['size'];
							$uploadedPostImageTargetPath = "/home/yv4nbnligki0/public_html/Profile_posts_images/";

							if ($uploadedPostImageSize > 5242880) {

								$uploadedImageError = "Image can't exceed 5MB!";
								$errors = 1;

								?>

									<script type="text/javascript">
											
										$(".imagePostLabel").addClass("uploaded_image_too_large");

									</script>

									<style type="text/css">
										
										.imagePostLabel {

											border: 2.5px solid red;

										}

									</style>

								<?php

								$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username;";
								$stmt = $db->prepare($selectPostsQuery);
								$stmt->execute();
								$selectPostsQueryResult = $stmt->get_result();

								if ($selectPostsQueryResult->num_rows == 0) {

									?>

										<script type="text/javascript">
							
											$(document).ready(function() {

												$("#empty_post").remove();
												$("#image_too_big").remove();

											})

										</script>

									<?php

								} else {

									?>

										<script type="text/javascript">
							
											$(document).ready(function() {

												$("#empty_post_2").remove();
												$("#image_too_big_2").remove();

											})

										</script>

									<?php

								}

								echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

							} else {

								$postsQuery = "INSERT INTO posts (username, post, postImage, postId) VALUES (?, ?, ?, ?);";
								$stmt = mysqli_stmt_init($db);

								if (!mysqli_stmt_prepare($stmt, $postsQuery)) {

									echo "Error!";
									exit();

								} else {

									$username = $_COOKIE['username'];
									$PostID = bin2hex(random_bytes(20));
									$encryptedPost = "";

									$uploadedPostImageName = time() . ".png";

									mysqli_stmt_bind_param($stmt, "ssss", $username, $encryptedPost, $uploadedPostImageName, $PostID);
									mysqli_stmt_execute($stmt);

									if (move_uploaded_file($uploadedPostImageSource, $uploadedPostImageTargetPath . $uploadedPostImageName)) {

										$resizeMaxSize = "1000";

										resizeImage($uploadedPostImageTargetPath . $uploadedPostImageName, $resizeMaxSize);

										$postSubmitted = "Post submitted succesfully!";

										echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

									}

								}

							}

						} else if (empty($_FILES['imagePost']['name']) && (!empty($_POST['posts']))) {

							$post = $_POST['posts'];
							$postsTrim = trim($post);
							$strippedTagsPosts = strip_tags($postsTrim);
							$encryptedPost = encrypt($strippedTagsPosts, $key);

							if (empty($strippedTagsPosts)) {

								$emptyPost = "The post box can't be empty!";
								$errors = 1;

								?>

									<style type="text/css">
										
										#postsForm {

											border: 2.5px solid red;

										}

									</style>

								<?php

								$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username;";
								$stmt = $db->prepare($selectPostsQuery);
								$stmt->execute();
								$selectPostsQueryResult = $stmt->get_result();

								if ($selectPostsQueryResult->num_rows == 0) {

									?>

										<script type="text/javascript">
							
											$(document).ready(function() {

												$("#empty_post").remove();

											})

										</script>

									<?php

								} else {

									?>

										<script type="text/javascript">
							
											$(document).ready(function() {

												$("#empty_post_2").remove();

											})

										</script>

									<?php

								}

							} else {

								$errors = 0;

							}

							if ($strippedTagsPosts == ' ') {

								$emptyPost = "The post box can't be empty!";
								$errors = 1;

								?>

									<style type="text/css">
										
										#postsForm {

											border: 2.5px solid red;

										}

									</style>

								<?php

							}

							if ($errors == 0) {

								$postsQuery = "INSERT INTO posts (username, post, postImage, postId) VALUES (?, ?, ?, ?);";
								$stmt = mysqli_stmt_init($db);

								if (!mysqli_stmt_prepare($stmt, $postsQuery)) {

									echo "Error!";
									exit();

								} else {

									$username = $_COOKIE['username'];
									$PostID = bin2hex(random_bytes(20));
									$postImage = "";

									mysqli_stmt_bind_param($stmt, "ssss", $username, $encryptedPost, $postImage, $PostID);
									mysqli_stmt_execute($stmt);

									$postSubmitted = "Post submitted succesfully!";

									echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

								}

							}

						} else if ((empty($_FILES['imagePost']['name'])) && (empty($_POST['posts']))) {

							$emptyPost = "Can't submit empty post!";
							$errors = 1;

							?>

								<style type="text/css">
									
									#postsForm {

										border: 2.5px solid red;

									}

								</style>

							<?php

							$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username;";
							$stmt = $db->prepare($selectPostsQuery);
							$stmt->execute();
							$selectPostsQueryResult = $stmt->get_result();

							if ($selectPostsQueryResult->num_rows == 0) {

								?>

									<script type="text/javascript">
						
										$(document).ready(function() {

											$("#empty_post").remove();
											$("#image_too_big").remove();

										})

									</script>

								<?php

							} else {

								?>

									<script type="text/javascript">
						
										$(document).ready(function() {

											$("#empty_post_2").remove();
											$("#image_too_big_2").remove();

										})

									</script>

								<?php

							}

							echo "<meta http-equiv='refresh' content='3; url=profile?username=$username' />";

						}

					}

					$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username ORDER BY dateAndTimeAdded DESC;";
					$stmt = $db->prepare($selectPostsQuery);
					$stmt->execute();
					$selectPostsQueryResult = $stmt->get_result();

					if ($selectPostsQueryResult->num_rows >= 1) {

						while ($row = $selectPostsQueryResult->fetch_assoc()) {

							$usernameDB = $row['username'];
							$currentUsername = $_GET['username'];

							$userProfilePicturePosts = $row['profileImage'];
							$userProfilePicturePostsPath = "/Profile_pictures/" . $userProfilePicturePosts;

							if ($userProfilePicturePosts == "") {

								$userProfilePicturePostsPath = "Images/profile_image_placeholder.png";

							}

							$myPosts = $row['post'];
							$decryptedPost = decrypt($myPosts, $key);
							$strippedTagsPost = strip_tags($decryptedPost);
							$dateAndTimePostAdded = $row['dateAndTimeAdded'];
							$formattedDateAndTimePostAdded = date("H:i, d/m/Y", strtotime($dateAndTimePostAdded));
							$myPostImage = $row['postImage'];
							$myPostImagePath = "/Profile_posts_images/" . $myPostImage;
							$myPostID = $row['postMainId'];

							if ($usernameDB === $currentUsername) {

								?>

									<script type="text/javascript">
							
										$(document).ready(function() {

											$("#no_posts_found").remove();

										})

									</script>

								<?php

								$myPostIDDB = "post_text_div_" . $myPostID;
								$myPostDivIDDB = "posts_div_" . $myPostID;

								if ($myPostImage !== "") {

									$myPostZoomedInCoverDiv = "zoomed_in_profile_post_image_cover_div_" . $myPostID;

									$mostCommonColorObject = new GetMostCommonColors();

									$resultNumber = 5;
									$reduceBrightness = 1;
									$reduceGradients = 1;
									$delta = 30;
									$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Profile_posts_images/" . $myPostImage, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
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
													
													#<?php echo $myPostZoomedInCoverDiv; ?> {

														background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

												    }

												</style>

											<?php

										} else if ($lightColor) {

											$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
											$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

											?>

												<style type="text/css">
													
													#<?php echo $myPostZoomedInCoverDiv; ?> {

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
												
												#<?php echo $myPostZoomedInCoverDiv; ?> {

													background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

											    }

											</style>

										<?php

									}

								}

								if ($myPosts === "") {

									$myPostsList .= "<div class='posts_div' id='posts_div_" . $myPostID . "'>
							
														<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

														<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

														<img src='" . $myPostImagePath . "' class='profile_post_image' id='profile_post_image_" . $myPostID . "' data-profilepostimageid='" . $myPostID . "' />

													</div>";

									?>

										<style type="text/css">

											#<?php echo $myPostDivIDDB; ?> {

												padding-bottom: 1vw;

											}

										</style>

									<?php

								} else {

									if ($myPostImage === "") {

										$myPostsList .= "<div class='posts_div' id='posts_div_" . $myPostID . "'>
								
																<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																<div class='post_text_div' id='post_text_div_" . $myPostID . "'>
																	
																	<p class='main_post_text'> " . $strippedTagsPost . " </p>

																</div>

															</div>";

									} else {

										$myPostsList .= "<div class='posts_div' id='posts_div_" . $myPostID . "'>
							
																<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																<img src='" . $myPostImagePath . "' class='profile_post_image' id='profile_post_image_" . $myPostID . "' data-profilepostimageid='" . $myPostID . "' />

																<div class='post_text_div' id='post_text_div_" . $myPostID . "'>
																	
																	<p class='main_post_text'> " . $strippedTagsPost . " </p>

																</div>

															</div>";

										?>

											<style type="text/css">
												
												#<?php echo $myPostIDDB; ?> {

													margin-top: -2%;

												}

											</style>

										<?php

									}

								}

							} else {

								$noPosts = "You currently have no posts!";
								$errors = 2;

								$selectNumberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
								$stmt = $db->prepare($selectNumberOfPostsQuery);
								$username = $_COOKIE['username'];
								$stmt->bind_param("s", $username);
								$stmt->execute();
								$selectNumberOfPostsQueryResult = $stmt->get_result();

								if ($selectNumberOfPostsQueryResult->num_rows >= 1) {

									$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " posts";

									if ($postsCounter == 1) {

										$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " post";

									}

								} else {

									$postsCounter = "0 posts";

								}

							}

						}

					}

					$selectNumberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
					$stmt = $db->prepare($selectNumberOfPostsQuery);
					$username = $_COOKIE['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$selectNumberOfPostsQueryResult = $stmt->get_result();

					if ($selectNumberOfPostsQueryResult->num_rows >= 1) {

						$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " posts";

						if ($postsCounter == 1) {

							$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " post";

						}

					} else {

						$postsCounter = "0 posts";

					}

					$selectNumberOfPostsQuery = "SELECT * FROM posts;";
					$stmt = $db->prepare($selectNumberOfPostsQuery);
					$stmt->execute();
					$selectNumberOfPostsQueryResult = $stmt->get_result();

					if ($selectNumberOfPostsQueryResult->num_rows == 0) {

						$noPosts = "You currently have no posts!";

					}

				?>

				<?php

					$myFeedPostsList = "";
					$myID = fetchMyID($_COOKIE['username'], $db);

					$query2 = "SELECT * FROM feed INNER JOIN users ON feed.feedUserId = users.id WHERE feedUserId = ? ORDER BY dateAndTimeFeedSubmitted DESC LIMIT 10;";
					$stmt2 = $db->prepare($query2);
					$stmt2->bind_param("i", $myID);
					$stmt2->execute();
					$result2 = $stmt2->get_result();

					if ($result2->num_rows >= 1) {

						while ($row = $result2->fetch_assoc()) {

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

								$myFeedPostsList .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
														<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
															
															<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

															<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

														</div>

														<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

															<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

														</div>

														<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

															<div class="bottom_feed_like_div_for_each">

																<div id="like_div">
															
																	<img src="Images/like.png" class="like_button_image" />

																	<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																</div>

															</div>

															<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

														</div>

													</div>';

							} else {

								$feedContentCaptionIDDB = "bottom_feed_div_caption_for_each_" . $feedID;

								$myFeedPostsList .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
														<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
															
															<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

															<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

														</div>

														<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

															<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

														</div>

														<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

															<div class="bottom_feed_like_div_for_each">

																<div id="like_div">
															
																	<img src="Images/like.png" class="like_button_image" />

																	<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																</div>

															</div>

															<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

															<p class="bottom_feed_div_caption_for_each" id="bottom_feed_div_caption_for_each_' . $feedID . '">' . $decryptedFeedContent . '</p>

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
											padding: 0.1vw;

										}

									</style>

								<?php

							}

						}

					} else {

						$feedPostsListEmpty = "You currently have no feed posts!";

						?>

							<style type="text/css">
								
								#no_feed_posts_found {

									display: block;

								}

							</style>

						<?php

					}

					$query1 = "SELECT * FROM feed WHERE feedUserId = ?;";
					$stmt1 = $db->prepare($query1);
					$stmt1->bind_param("s", $myID);
					$stmt1->execute();
					$result1 = $stmt1->get_result();

					if ($result1->num_rows >= 1) {

						$feedPostsCounter = mysqli_num_rows($result1) . " feed posts";

						if ($feedPostsCounter == 1) {

							$feedPostsCounter = mysqli_num_rows($result1) . " feed post";

						}

					} else {

						$feedPostsCounter = "0 feed posts";

					}

				?>

				<div id="lists_title_posts_feed_div">

					<p class="lists_title lists_title_posts_feed" id="lists_title_posts"><a href="posts?username=<?php echo "$username"; ?>" id="lists_title_link">My posts</a></p>

					<p class="lists_title lists_title_posts_feed" id="lists_title_feed"><a href="feed?username=<?php echo "$username"; ?>" id="lists_title_link">My feed posts</a></p>

				</div>

				<div id="main_posts_list_outer_div">
						
					<p id="empty_post"><?php echo $emptyPost; ?></p>

					<p id="image_too_big"><?php echo $uploadedImageError; ?></p>

					<p id="post_submitted"><?php echo $postSubmitted; ?></p>

					<p id="number_of_posts"><?php echo $postsCounter; ?></p>

					<div class="scrolling_lists_div posts_scrolling_div">

						<p id="empty_post_2"><?php echo $emptyPost; ?></p>

						<p id="image_too_big_2"><?php echo $uploadedImageError; ?></p>

						<p id="no_posts_found"><?php echo $noPosts; ?></p>

						<?php echo $myPostsList; ?>

					</div>

					<div id="submit_profile_post_image_preview_div"></div>

					<form action="" method="post" enctype="multipart/form-data" style="margin-top: -6%;">
						
						<textarea name="posts" id="postsForm" maxlength="400" placeholder="What's on your mind?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'What\'s on your mind? ' " <?php if ($errors == 1 && empty($post)) echo "style='border: 2.5px solid red;'"; ?> ></textarea>

						<div id="submit_and_image_form_inner_div">
							
							<label for="imagePost" class="imagePostLabel">

								<span id="imagePostLabelSpan">

									<img src="Images/image_placeholder.png" id="imagePostLabelSpanImage" />

								</span>

							</label>

							<input type="file" name="imagePost" id="imagePost" accept=".png, .jpg, .jpeg" />

							<input type="submit" name="submitPost" id="submitPost" value="Submit!" />

						</div>

					</form>

				</div>

				<div id="main_feed_posts_list_outer_div">
					
					<p id="number_of_feed_posts"><?php echo $feedPostsCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_feed_posts_found"><?php echo $feedPostsListEmpty; ?></p>
						
						<?php echo $myFeedPostsList; ?>

						<div id="main_outer_feed_div"></div>

					</div>

				</div>

			</div>

		</div>

		<script type="text/javascript">
			
			$(document).ready(function() {

				$("#user_profile_label").remove();
				$("#messages_notifications_each_page_main_div").remove();
				$("#label_profile_username_content").remove();
				$("#friend_requests_notifications_each_page_main_div").remove();
				$("#feed_notifications_each_page_main_div").remove();

			})

		</script>

	<?php } ?>

	<?php if ($login == 1 && $result->num_rows > 0) : ?>

		<div id="messages_notifications_each_page_main_div"></div>

		<div id="friend_requests_notifications_each_page_main_div"></div>

		<div id="feed_notifications_each_page_main_div"></div>

		<?php

			$customBackgroundImageContentForOthers = "";
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

					if ($customUsernameStylingTextContent == "") {

						?>

							<style type="text/css">
								
								#label_profile_username_content {

									color: white;
									margin-left: 1vw;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								#label_profile_username_content {

									color: <?php echo $customUsernameStylingTextContent; ?>;
									margin-left: 1vw;

								}

							</style>

						<?php

					}

				}

			}

			$checkCustomBackGroundActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomBackGroundActiveStatusQuery);
			$myID = fetchMyID($_GET['username'], $db);
			$customBackgroundImageId = 1;
			$customBackgroundImageActiveStatus = 1;
			$stmt->bind_param("sii", $myID, $customBackgroundImageId, $customBackgroundImageActiveStatus);
			$stmt->execute();
			$checkCustomBackGroundActiveStatusQueryResult = $stmt->get_result();

			if ($checkCustomBackGroundActiveStatusQueryResult->num_rows >= 1) {

				if ($row = $checkCustomBackGroundActiveStatusQueryResult->fetch_assoc()) {

					$customBackgroundImageContentForOthers = $row['backgroundProfileImage'];
					$customBackgroundImageContentPath = "/Background_profile_images/";
					$customBackgroundImageContentPathWhole = $customBackgroundImageContentPath . $customBackgroundImageContentForOthers;

					if ($customBackgroundImageContentForOthers == "") {

						?>

							<style type="text/css">
								
								body {

									background: #1d1f20;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								body {

									background: url("<?php echo $customBackgroundImageContentPathWhole ?>") no-repeat center center fixed;
									-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;

								}

								.lists {

									background: #1d1f20;
									height: 31vw;
									width: 30vw;
									float: left;
									margin-left: 2.5%;
									border-radius: 1vw;
									border: 2.5px solid #777EB8;
									cursor: default;
									opacity: 0.9;

								}

								#are_friends_message {

								    width: 10vw;
								    font-size: 1.25vw;
								    font-family: Pixelony;
								    background: transparent;
								    border: 2.5px solid #777EB8;
								    border-radius: 1vw;
								    color: gray;
								    cursor: default;
								    padding: 0.5vw;
								    outline: none;
								    background: #1d1f20;
								    opacity: 0.9;

								}

								#are_friends {

								    width: 10vw;
								    font-size: 1.25vw;
								    font-family: Pixelony;
								    background: #1d1f20;
								    border: 2.5px solid #777EB8;
								    border-radius: 1vw;
								    color: gray;
								    cursor: default;
								    padding: 0.5vw;
								    outline: none;
								    margin: 0;
								    margin-bottom: 5%;
								    margin-top: -5%;
								    opacity: 0.9;

								}

								#add_friend {

							    	width: 17vw;
									font-size: 1.25vw;
									font-family: Pixelony;
									background: #1d1f20;
									border: 2.5px solid #777EB8;
									border-radius: 1vw;
									color: gray;
									cursor: default;
									padding: 0.5vw;
									outline: none;
									opacity: 0.9;

							    }

							    #cancel_friend_request {

							    	width: 18vw;
									font-size: 1.25vw;
									font-family: Pixelony;
									background: #1d1f20;
									border: 2.5px solid #777EB8;
									border-radius: 1vw;
									color: gray;
									cursor: default;
									padding: 0.5vw;
									outline: none;
									opacity: 0.9;

							    }

							</style>

						<?php

					}

				}

			}

			$selectGameQuery = "SELECT * FROM gamez WHERE username = ?;";
			$stmt = $db->prepare($selectGameQuery);
			$username = $_GET['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$selectGameQueryResult = $stmt->get_result();

			if ($errors == 0) {

				if ($selectGameQueryResult->num_rows >= 1) {

					$selectGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
					$stmt = $db->prepare($selectGamesQuery);
					$activeStatus = 1;
					$stmt->bind_param("si", $username, $activeStatus);
					$stmt->execute();
					$selectGamesQueryResult = $stmt->get_result();

					while ($row = $selectGameQueryResult->fetch_assoc()) {

						$gameActiveStatus = $row['activeStatus'];

						if ($gameActiveStatus == 1) {

							$gameCoverImage = "/Game_cover_images/" . $row["gameCoverImage"];

							?>

							<style type="text/css">
								
								#gamez_image {

									background-position: center center;
									background-size: cover;
									background-repeat: no-repeat;
									width: 24vw;
									height: 6vw;
									border-radius: 1vw;
									cursor: pointer;
									opacity: 0.5;

								}

								#gamez_title_div:hover #gamez_title  {

							    	font-size: 4vw;
							    	opacity: 0;
							    	border-radius: 2vw;
							    	cursor: pointer;
							    	transition: 0.25s all ease;

							    }

							    .gamez:hover #gamez_image {

							    	opacity: 1;

							    }

							</style>

							<?php

							$games = $row['gameName'];
							$gameID = $row['gameId'];
							$gamesList .= "<li class='gamez' onclick=\"window.location.href='/game?id=" . $gameID . "'\">
			
											<div id='gamez_image' class='gamez_image' style='background-image: url(" . $gameCoverImage . ");'></div>

											<div id='gamez_title_div'>

												<p id='gamez_title'>" . $games . "</p>

											</div>

										</li>";

							?>

								<script type="text/javascript">
			
									$(document).ready(function() {

										$("#gamez_not_found").remove();

									})

								</script>

							<?php

						}

					}

				} else {

					$gamesNoneFound = $username . "'s gamez list is currently empty!";
					$errors = 1;
					$gameCounter = "0 gamez active";
					$pendingGameCounter = "0 gamez pending";

				}

			}

			if ($errors == 0) {

				if ($atLeastOneGameUploaded == 0) {

					$selectUserGameQuery = "SELECT * FROM gamez WHERE username = ?;";
					$stmt = $db->prepare($selectUserGameQuery);
					$username = $_GET['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$selectUserGameQueryResult = $stmt->get_result();

					if ($selectUserGameQueryResult->num_rows >= 1) {

						$selectNumberOfActiveGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfActiveGamesQuery);
						$activeStatus = 1;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfActiveGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfActiveGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfActiveGamesQueryResult->fetch_assoc()) {

								$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " gamez active";

								if ($gameCounter == 1) {

									$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " game active";

								}

							}

						} else {

							$gameCounter = "0 gamez active";

						}

						$selectNumberOfPendingGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfPendingGamesQuery);
						$activeStatus = 0;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfPendingGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfPendingGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfPendingGamesQueryResult->fetch_assoc()) {

								$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " gamez pending";

								if ($pendingGameCounter == 1) {

									$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " game pending";

								}

							}

						} else {

							$pendingGameCounter = "0 gamez pending";

						}

					}

				}

			}

		?>

		<div id="profile_top_div">

			<?php

				$mostCommonColorObject = new GetMostCommonColors();

				$resultNumber = 5;
				$reduceBrightness = 1;
				$reduceGradients = 1;
				$delta = 30;
				$mostCommonColor = $mostCommonColorObject->Get_Color($userProfilePictureDBPath, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
				$mostCommonColorBackgroundColorHashtag = "#";
				$mostCommonColorBackgroundColor = "";
				$firstColor = "";
				$secondColor = "";
				$colorFactor = 0.5;

				foreach ($mostCommonColor as $hex => $count) {

					if ($hex === array_keys($mostCommonColor)[0]) {

						$firstColor = "#" . $hex;

					}

					if ($hex === array_keys($mostCommonColor)[4]) {

						$secondColor = "#" . $hex;

					}

				}

				$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

				?>

					<style type="text/css">
						
						.zoomed_in_profile_picture_for_others_cover_div {

							background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

					    }

					</style>

				<?php

			?>
			
			<img src="<?php echo $userProfilePicture; ?>" id="profile_pic_display_for_others" />

			<h1 id="label_profile_username_content"><?php echo $username ?></h1><h1 id="user_profile_label"><?php echo $userProfileLabel; ?></h1>

			<div id="add_friend_div">

				<?php

					if (isset($_POST['add_friend'])) {

						$query = "SELECT * FROM users WHERE username = ? OR username = ?;";
						$stmt = $db->prepare($query);
						$fromUser = $_COOKIE['username'];
						$toUser = $_GET['username'];
						$stmt->bind_param("ss", $fromUser, $toUser);
						$stmt->execute();
						$result = $stmt->get_result();
						$fromUserId = "";
						$toUserId = "";

						if ($result->num_rows >= 1) {

							while ($row = $result->fetch_assoc()) {

								if ($fromUser === $row['username']) {

									$fromUserId = $row['id'];

								}

								if ($toUser === $row['username']) {

									$toUserId = $row['id'];

								}

							}

						}

						$query = "INSERT INTO friendRequests (fromUserId, toUserId, clickedStatus) VALUES (?, ?, ?);";
						$stmt = mysqli_stmt_init($db);

						if (!mysqli_stmt_prepare($stmt, $query)) {

							echo "Error!";
							exit();

						} else {

							$clickedStatus = 0;

							mysqli_stmt_bind_param($stmt, "iii", $fromUserId, $toUserId, $clickedStatus);
							mysqli_stmt_execute($stmt);

							$username = $_GET['username'];

							echo "<meta http-equiv='refresh' content='0; url=profile?username=$username' />";

						}

					}

					if (isset($_POST['cancel_friend_request'])) {

						$query = "SELECT * FROM users WHERE username = ? OR username = ?;";
						$stmt = $db->prepare($query);
						$fromUser = $_COOKIE['username'];
						$toUser = $_GET['username'];
						$stmt->bind_param("ss", $fromUser, $toUser);
						$stmt->execute();
						$result = $stmt->get_result();
						$fromUserId = "";
						$toUserId = "";

						if ($result->num_rows >= 1) {

							while ($row = $result->fetch_assoc()) {

								if ($fromUser === $row['username']) {

									$fromUserId = $row['id'];

								}

								if ($toUser === $row['username']) {

									$toUserId = $row['id'];

								}

							}

						}

						$query = "DELETE FROM friendRequests WHERE fromUserId = ? AND toUserId = ?;";
						$stmt = mysqli_stmt_init($db);

						if (!mysqli_stmt_prepare($stmt, $query)) {

							echo "Error!";
							exit();

						} else {

							mysqli_stmt_bind_param($stmt, "ii", $fromUserId, $toUserId);
							mysqli_stmt_execute($stmt);

						}

					}

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$fromUserId = "";
					$toUserId = "";

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_COOKIE['username']) {

								$fromUserId = $row['id'];

							}

							if ($row['username'] === $_GET['username']) {

								$toUserId = $row['id'];

							}

						}

						$selectFriendRequestQuery = "SELECT * FROM friendRequests WHERE fromUserId = ? AND toUserId = ?;";
						$stmt = $db->prepare($selectFriendRequestQuery);
						$stmt->bind_param("ii", $fromUserId, $toUserId);
						$stmt->execute();
						$selectFriendRequestQueryResult = $stmt->get_result();

						if ($selectFriendRequestQueryResult->num_rows == 1) {

							?>

								<script type="text/javascript">
									
									$(document).ready(function() {

										$("#add_friend").remove();

									})

								</script>

							<?php

						} else {

							?>

								<script type="text/javascript">
									
									$(document).ready(function() {

										$("#friend_request_sent").remove();
										$("#cancel_friend_request").remove();

									})

								</script>

							<?php

						}

						$checkIfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ? AND friend2Id = ?;";
						$stmt = $db->prepare($checkIfFriendsQuery);
						$stmt->bind_param("ii", $fromUserId, $toUserId);
						$stmt->execute();
						$checkIfFriendsQueryResult = $stmt->get_result();
						$areFriends = "";

						if ($checkIfFriendsQueryResult->num_rows >= 1) {

							$areFriends .= '<div id="are_friends_div_profile">
								
												<p id="are_friends">Friends</p>

												<a href="/Account/messages" id="are_friends_message_link"><p id="are_friends_message">Message</p></a>

											</div>';

							echo $areFriends;

							?>

								<script type="text/javascript">
									
									$(document).ready(function() {

										$("#add_friend_form").remove();

									})

								</script>

							<?php

						}

					}

				?>

				<form action="" method="post" id="add_friend_form" style="text-align: center; display: grid; margin-top: 5%;">
					
					<input type="submit" name="add_friend" id="add_friend" value="Send friend request!" />

					<input type="submit" name="cancel_friend_request" id="cancel_friend_request" value="Cancel friend request!" />

				</form>

			</div>

			<p id="profileBioForOthers"><?php echo $decryptedStrippedTagsBio; ?></p>

		</div>

		<div id="main_lists">
			
			<div class="lists" id="gamez_list">

				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<a id="label_profile_for_others_link" href="gamez?username=<?php echo "$username"; ?>"><p id="label_profile_for_others_2" class="label_profile_for_others_2">Gamez</p></a>

				</div>

				<p id="number_of_gamez"><?php echo $gameCounter . " ( " . $pendingGameCounter . " ) "; ?></p>
						
				<p id="gamez_not_found"><?php echo $gamesNoneFound; ?></p>

				<div class="scrolling_lists_div">

					<?php echo $gamesList; ?>

				</div>

			</div>

			<div class="lists" id="friends_list_main">

				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<div id="lists_title_friends_followers_div">

						<div id="lists_title_friends_div" class="lists_title_friends_followers_inner_div">
							
							<a href="friends?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Friends</p></a>

						</div>

						<div id="lists_title_followers_div" class="lists_title_friends_followers_inner_div">
							
							<a href="followers?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Followers</p></a>

						</div>

					</div>

				</div>

				<?php

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$userID = "";
					$friendsCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_GET['username']) {

								$userID = $row['id'];

							}

						}

						$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ?;";
						$stmt = $db->prepare($numberOfFriendsQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFriendsQueryResult = $stmt->get_result();

						if ($numberOfFriendsQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_friends_found_for_others").remove();

									})

								</script>

							<?php

							$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friends";

							if ($friendsCounter == 1) {

								$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friend";

							}

						} else {

							$friendsCounter = "0 friends";
							$errors = 1;
							$friendsListEmpty = $username . "'s friends list is currently empty!";

						}

					}

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

						$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ? LIMIT 1;";
						$stmt = $db->prepare($numberOfFriendsQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFriendsQueryResult = $stmt->get_result();

						if ($numberOfFriendsQueryResult->num_rows >= 1) {

							while ($row = $numberOfFriendsQueryResult->fetch_assoc()) {

								$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id;";
								$stmt = $db->prepare($selectFriendDataQuery);
								$stmt->execute();
								$selectFriendDataQueryResult = $stmt->get_result();

								if ($selectFriendDataQueryResult->num_rows >= 1) {

									while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

										if ($userID === $row['friend1Id']) {

											$userProfilePictureFriend = $row['profileImage'];
											$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

											if ($userProfilePictureFriend == "") {

												$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

											}

											$friendUsername = $row['username'];
											$friend2Id = $row['friend2Id'];
											$friend2IdDB = "friend_username_" . $friend2Id;

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['friend2Id'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $friend2IdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFriendsListForOthers .= "<div class='friends_div'>
	
																	<img src='" . $userProfilePictureFriendPath . "' class='profile_pic_display_friends' />

																	<div class='friend_username_div'>
																		
																		<a href='profile?username=" . $friendUsername . "' class='friend_user_link'>
								
																			<p class='friend_username' id='" . $friend2IdDB . "'>" . $friendUsername . "</p>

																		</a>

																	</div>

																</div>";

										}

									}

								}

							}

						}

					}

					$selectFriendsQuery = "SELECT * FROM friends;";
					$stmt = $db->prepare($selectFriendsQuery);
					$stmt->execute();
					$selectFriendsQueryResult = $stmt->get_result();

					if ($selectFriendsQueryResult->num_rows == 0) {

						$friendsListEmpty = $username . "'s friends list is currently empty!";
						$friendsCounter = "0 friends";

					}

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$userID = "";
					$followersCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_GET['username']) {

								$userID = $row['id'];

							}

						}

						$numberOfFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ?;";
						$stmt = $db->prepare($numberOfFollowersQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFollowersQueryResult = $stmt->get_result();

						if ($numberOfFollowersQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_followers_found_for_others").remove();

									})

								</script>

							<?php

							$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " followers";

							if ($followersCounter == 1) {

								$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " follower";

							}

						} else {

							$followersCounter = "0 followers";
							$errors = 1;
							$followersListEmpty = $username . "'s followers list is currently empty!";

						}

					}

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

						$numberOfFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ? LIMIT 1;";
						$stmt = $db->prepare($numberOfFollowersQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFollowersQueryResult = $stmt->get_result();

						if ($numberOfFollowersQueryResult->num_rows >= 1) {

							while ($row = $numberOfFollowersQueryResult->fetch_assoc()) {

								$selectFollowerDataQuery = "SELECT * FROM followers INNER JOIN users ON followers.followerUserId = users.id;";
								$stmt = $db->prepare($selectFollowerDataQuery);
								$stmt->execute();
								$selectFollowerDataQueryResult = $stmt->get_result();

								if ($selectFollowerDataQueryResult->num_rows >= 1) {

									while ($row = $selectFollowerDataQueryResult->fetch_assoc()) {

										if ($userID === $row['followingUserId']) {

											$userProfilePictureFollower = $row['profileImage'];
											$userProfilePictureFollowerPath = "/Profile_pictures/" . $userProfilePictureFollower;

											if ($userProfilePictureFollower == "") {

												$userProfilePictureFollowerPath = "Images/profile_image_placeholder.png";

											}

											$followerUsername = $row['username'];
											$followerId = $row['followerUserId'];
											$followerIdDB = "follower_username_" . $followerId;

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['followerUserId'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $followerIdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFollowersListForOthers .= "<div class='followers_div'>
	
																			<img src='" . $userProfilePictureFollowerPath . "' class='profile_pic_display_followers' />

																			<div class='follower_username_div'>
																				
																				<a href='profile?username=" . $followerUsername . "' class='follower_user_link'>
										
																					<p class='follower_username' id='" . $followerIdDB . "'>" . $followerUsername . "</p>

																				</a>

																			</div>

																		</div>";

										}

									}

								}

							}

						}

					}

					$selectFollowersQuery = "SELECT * FROM followers;";
					$stmt = $db->prepare($selectFollowersQuery);
					$stmt->execute();
					$selectFollowersQueryResult = $stmt->get_result();

					if ($selectFollowersQueryResult->num_rows == 0) {

						$followersListEmpty = $username . "'s followers list is currently empty!";
						$followersCounter = "0 followers";

					}

				?>

				<div id="main_friends_list_outer_div">
					
					<p id="number_of_friends"><?php echo $friendsCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_friends_found_for_others"><?php echo $friendsListEmpty; ?></p>
						
						<?php echo $myFriendsListForOthers; ?>

					</div>

				</div>

				<div id="main_followers_list_outer_div">
					
					<p id="number_of_followers"><?php echo $followersCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_followers_found_for_others"><?php echo $followersListEmpty; ?></p>
						
						<?php echo $myFollowersListForOthers; ?>

					</div>

				</div>

			</div>

			<div class="lists" id="posts_list">

				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<div id="lists_title_posts_feed_div">

						<div id="lists_title_posts_div" class="lists_title_posts_feed_posts_inner_div">
							
							<a href="posts?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Posts</p></a>

						</div>

						<div id="lists_title_feed_posts_div" class="lists_title_posts_feed_posts_inner_div">
							
							<a href="feed?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Feed Posts</p></a>

						</div>

					</div>

				</div>

				<?php

					$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username ORDER BY dateAndTimeAdded DESC;";
					$stmt = $db->prepare($selectPostsQuery);
					$stmt->execute();
					$selectPostsQueryResult = $stmt->get_result();

					if ($selectPostsQueryResult->num_rows >= 1) {

						while ($row = $selectPostsQueryResult->fetch_assoc()) {

							$usernameDB = $row['username'];
							$currentUsername = $_GET['username'];

							$userProfilePicturePosts = $row['profileImage'];
							$userProfilePicturePostsPath = "/Profile_pictures/" . $userProfilePicturePosts;

							if ($userProfilePicturePosts == "") {

								$userProfilePicturePostsPath = "Images/profile_image_placeholder.png";

							}

							$myPostsForOthers = $row['post'];
							$decryptedPostForOthers = decrypt($myPostsForOthers, $key);
							$strippedTagsPost = strip_tags($decryptedPostForOthers);
							$dateAndTimePostAdded = $row['dateAndTimeAdded'];
							$formattedDateAndTimePostAdded = date("H:i, d/m/Y", strtotime($dateAndTimePostAdded));
							$myPostImageForOthers = $row['postImage'];
							$myPostImagePathForOthers = "/Profile_posts_images/" . $myPostImageForOthers;
							$myPostIDForOthers = $row['postMainId'];

							if ($usernameDB === $currentUsername) {

								$myPostIDDBForOthers = "post_text_div_" . $myPostIDForOthers;
								$myPostDivIDDBForOthers = "posts_div_" . $myPostIDForOthers;

								$myPostZoomedInCoverDivForOthers = "zoomed_in_profile_post_image_cover_div_" . $myPostIDForOthers;

								if ($myPostImageForOthers !== "") {

									$mostCommonColorObject = new GetMostCommonColors();

									$resultNumber = 5;
									$reduceBrightness = 1;
									$reduceGradients = 1;
									$delta = 30;
									$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Profile_posts_images/" . $myPostImageForOthers, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
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
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

														background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

												    }

												</style>

											<?php

										} else if ($lightColor) {

											$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
											$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

											?>

												<style type="text/css">
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

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

											?>

												<style type="text/css">
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

														background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

												    }

												</style>

											<?php

										}

									}

								}

								if ($myPostsForOthers === "") {

									$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
							
																<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																<img src='" . $myPostImagePathForOthers . "' class='profile_post_image' id='profile_post_image_" . $myPostIDForOthers . "' data-profilepostimageid='" . $myPostIDForOthers . "' />

															</div>";

									?>

										<style type="text/css">

											#<?php echo $myPostDivIDDBForOthers; ?> {

												padding-bottom: 1vw;

											}

										</style>

									<?php

								} else {

									if ($myPostImageForOthers === "") {

										$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
								
																	<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																	<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																	<div class='post_text_div' id='post_text_div_" . $myPostIDForOthers . "'>
																		
																		<p class='main_post_text'> " . $strippedTagsPost . " </p>

																	</div>

																</div>";

									} else {

										$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
							
																	<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																	<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																	<img src='" . $myPostImagePathForOthers . "' class='profile_post_image' id='profile_post_image_" . $myPostIDForOthers . "' data-profilepostimageid='" . $myPostIDForOthers . "' />

																	<div class='post_text_div' id='post_text_div_" . $myPostIDForOthers . "'>
																		
																		<p class='main_post_text'> " . $strippedTagsPost . " </p>

																	</div>

																</div>";

										?>

											<style type="text/css">
												
												#<?php echo $myPostIDDBForOthers; ?> {

													margin-top: -2%;

												}

											</style>

										<?php

									}

								}

							}

						}

					}

					$numberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
					$stmt = $db->prepare($numberOfPostsQuery);
					$username = $_GET['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$numberOfPostsQueryResult = $stmt->get_result();

					if ($numberOfPostsQueryResult->num_rows >= 1) {

						?>

							<script type="text/javascript">
					
								$(document).ready(function() {

									$("#no_posts_found_for_others").remove();

								})

							</script>

						<?php

						while ($row = $numberOfPostsQueryResult->fetch_assoc()) {

							$postsCounter = mysqli_num_rows($numberOfPostsQueryResult) . " posts";

							if ($postsCounter == 1) {

								$postsCounter = mysqli_num_rows($numberOfPostsQueryResult) . " post";

							}

						}

					} else {

						$noPostsForOthers = $username . " currently has no posts!";
						$errors = 1;
						$postsCounter = "0 posts";

					}

					if ($errors == 0) {

						$selectNumberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
						$stmt = $db->prepare($selectNumberOfPostsQuery);
						$username = $_GET['username'];
						$stmt->bind_param("s", $username);
						$stmt->execute();
						$selectNumberOfPostsQueryResult = $stmt->get_result();

						if ($selectNumberOfPostsQueryResult->num_rows >= 1) {

							$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " posts";

							if ($postsCounter == 1) {

								$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " post";

							}

						} else {

							$postsCounter = "0 posts";

						}

					}

				?>

				<?php

					$myFeedPostsList = "";
					$userID = fetchMyID($_GET['username'], $db);

					$query2 = "SELECT * FROM feed INNER JOIN users ON feed.feedUserId = users.id WHERE feedUserId = ? ORDER BY dateAndTimeFeedSubmitted DESC LIMIT 10;";
					$stmt2 = $db->prepare($query2);
					$stmt2->bind_param("i", $userID);
					$stmt2->execute();
					$result2 = $stmt2->get_result();

					if ($result2->num_rows >= 1) {

						while ($row = $result2->fetch_assoc()) {

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

								$myFeedPostsListForOthers .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
														<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
															
															<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

															<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

														</div>

														<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

															<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

														</div>

														<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

															<div class="bottom_feed_like_div_for_each">

																<div id="like_div">
															
																	<img src="Images/like.png" class="like_button_image" />

																	<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																</div>

															</div>

															<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

														</div>

													</div>';

							} else {

								$feedContentCaptionIDDB = "bottom_feed_div_caption_for_each_" . $feedID;

								$myFeedPostsListForOthers .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
		
														<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
															
															<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

															<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

														</div>

														<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

															<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

														</div>

														<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

															<div class="bottom_feed_like_div_for_each">

																<div id="like_div">
															
																	<img src="Images/like.png" class="like_button_image" />

																	<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																</div>

															</div>

															<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

															<p class="bottom_feed_div_caption_for_each" id="bottom_feed_div_caption_for_each_' . $feedID . '">' . $decryptedFeedContent . '</p>

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
											padding: 0.1vw;

										}

									</style>

								<?php

							}

						}

					} else {

						$noFeedPostsForOthers = $username . " currently has no feed posts!";

						?>

							<style type="text/css">
								
								#no_feed_posts_found_for_others {

									display: block;

								}

							</style>

						<?php

					}

					$query1 = "SELECT * FROM feed WHERE feedUserId = ?;";
					$stmt1 = $db->prepare($query1);
					$stmt1->bind_param("s", $userID);
					$stmt1->execute();
					$result1 = $stmt1->get_result();

					if ($result1->num_rows >= 1) {

						$feedPostsCounter = mysqli_num_rows($result1) . " feed posts";

						if ($feedPostsCounter == 1) {

							$feedPostsCounter = mysqli_num_rows($result1) . " feed post";

						}

					} else {

						$feedPostsCounter = "0 feed posts";

					}

				?>

				<div id="main_posts_list_outer_div">

					<p id="number_of_posts"><?php echo $postsCounter; ?></p>

					<div class="scrolling_lists_div_for_others posts_scrolling_div">
						
						<p id="no_posts_found_for_others"><?php echo $noPostsForOthers; ?></p>

						<?php echo $myPostsListForOthers; ?>

					</div>

				</div>

				<div id="main_feed_posts_list_outer_div">

					<p id="number_of_feed_posts"><?php echo $feedPostsCounter; ?></p>

					<div class="scrolling_lists_div_for_others feed_posts_scrolling_div">
						
						<p id="no_feed_posts_found_for_others"><?php echo $noFeedPostsForOthers; ?></p>

						<?php echo $myFeedPostsListForOthers; ?>

					</div>

				</div>

			</div>

		</div>

	<?php endif ?>

	<?php if ($login == 0 && $result->num_rows > 0) : ?>

		<?php

			$customBackgroundImageContentForOthers = "";
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

					if ($customUsernameStylingTextContent == "") {

						?>

							<style type="text/css">
								
								#label_profile_username_content {

									color: white;
									margin-left: 1vw;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								#label_profile_username_content {

									color: <?php echo $customUsernameStylingTextContent; ?>;
									margin-left: 1vw;

								}

							</style>

						<?php

					}

				}

			}

			$checkCustomBackGroundActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
			$stmt = $db->prepare($checkCustomBackGroundActiveStatusQuery);
			$myID = fetchMyID($_GET['username'], $db);
			$customBackgroundImageId = 1;
			$customBackgroundImageActiveStatus = 1;
			$stmt->bind_param("sii", $myID, $customBackgroundImageId, $customBackgroundImageActiveStatus);
			$stmt->execute();
			$checkCustomBackGroundActiveStatusQueryResult = $stmt->get_result();

			if ($checkCustomBackGroundActiveStatusQueryResult->num_rows >= 1) {

				if ($row = $checkCustomBackGroundActiveStatusQueryResult->fetch_assoc()) {

					$customBackgroundImageContentForOthers = $row['backgroundProfileImage'];
					$customBackgroundImageContentPath = "/Background_profile_images/";
					$customBackgroundImageContentPathWhole = $customBackgroundImageContentPath . $customBackgroundImageContentForOthers;

					if ($customBackgroundImageContentForOthers == "") {

						?>

							<style type="text/css">
								
								body {

									background: #1d1f20;

								}

							</style>

						<?php

					} else {

						?>

							<style type="text/css">
								
								body {

									background: url("<?php echo $customBackgroundImageContentPathWhole ?>") no-repeat center center fixed;
									-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;

								}

								.lists {

									background: #1d1f20;
									height: 31vw;
									width: 30vw;
									float: left;
									margin-left: 2.5%;
									border-radius: 1vw;
									border: 2.5px solid #777EB8;
									cursor: default;
									opacity: 0.9;

								}

							</style>

						<?php

					}

				}

			}

			$selectGameQuery = "SELECT * FROM gamez WHERE username = ?;";
			$stmt = $db->prepare($selectGameQuery);
			$username = $_GET['username'];
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$selectGameQueryResult = $stmt->get_result();

			if ($errors == 0) {

				if ($selectGameQueryResult->num_rows >= 1) {

					$selectGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
					$stmt = $db->prepare($selectGamesQuery);
					$activeStatus = 1;
					$stmt->bind_param("si", $username, $activeStatus);
					$stmt->execute();
					$selectGamesQueryResult = $stmt->get_result();

					while ($row = $selectGameQueryResult->fetch_assoc()) {

						$gameActiveStatus = $row['activeStatus'];

						if ($gameActiveStatus == 1) {

							$gameCoverImage = "/Game_cover_images/" . $row["gameCoverImage"];

							?>

							<style type="text/css">
								
								#gamez_image {

									background-position: center center;
									background-size: cover;
									background-repeat: no-repeat;
									width: 24vw;
									height: 6vw;
									border-radius: 1vw;
									cursor: pointer;
									opacity: 0.5;

								}

								#gamez_title_div:hover #gamez_title  {

							    	font-size: 4vw;
							    	opacity: 0;
							    	border-radius: 2vw;
							    	cursor: pointer;
							    	transition: 0.25s all ease;

							    }

							    .gamez:hover #gamez_image {

							    	opacity: 1;

							    }

							</style>

							<?php

							$games = $row['gameName'];
							$gameID = $row['gameId'];
							$gamesList .= "<li class='gamez' onclick=\"window.location.href='/game?id=" . $gameID . "'\">
			
											<div id='gamez_image' class='gamez_image' style='background-image: url(" . $gameCoverImage . ");'></div>

											<div id='gamez_title_div'>

												<p id='gamez_title'>" . $games . "</p>

											</div>

										</li>";

							?>

								<script type="text/javascript">
			
									$(document).ready(function() {

										$("#gamez_not_found").remove();

									})

								</script>

							<?php

						}

					}

				} else {

					$gamesNoneFound = $username . "'s gamez list is currently empty!";
					$errors = 1;
					$gameCounter = "0 gamez active";
					$pendingGameCounter = "0 gamez pending";

				}

			}

			if ($errors == 0) {

				if ($atLeastOneGameUploaded == 0) {

					$selectUserGameQuery = "SELECT * FROM gamez WHERE username = ?;";
					$stmt = $db->prepare($selectUserGameQuery);
					$username = $_GET['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$selectUserGameQueryResult = $stmt->get_result();

					if ($selectUserGameQueryResult->num_rows >= 1) {

						$selectNumberOfActiveGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfActiveGamesQuery);
						$activeStatus = 1;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfActiveGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfActiveGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfActiveGamesQueryResult->fetch_assoc()) {

								$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " gamez active";

								if ($gameCounter == 1) {

									$gameCounter = mysqli_num_rows($selectNumberOfActiveGamesQueryResult) . " game active";

								}

							}

						} else {

							$gameCounter = "0 gamez active";

						}

						$selectNumberOfPendingGamesQuery = "SELECT * FROM gamez WHERE username = ? AND activeStatus = ?;";
						$stmt = $db->prepare($selectNumberOfPendingGamesQuery);
						$activeStatus = 0;
						$stmt->bind_param("si", $username, $activeStatus);
						$stmt->execute();
						$selectNumberOfPendingGamesQueryResult = $stmt->get_result();

						if ($selectNumberOfPendingGamesQueryResult->num_rows >= 1) {

							while ($row = $selectNumberOfPendingGamesQueryResult->fetch_assoc()) {

								$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " gamez pending";

								if ($pendingGameCounter == 1) {

									$pendingGameCounter = mysqli_num_rows($selectNumberOfPendingGamesQueryResult) . " game pending";

								}

							}

						} else {

							$pendingGameCounter = "0 gamez pending";

						}

					}

				}

			}

		?>

		<div id="profile_top_div">

			<?php

				$mostCommonColorObject = new GetMostCommonColors();

				$resultNumber = 5;
				$reduceBrightness = 1;
				$reduceGradients = 1;
				$delta = 30;
				$mostCommonColor = $mostCommonColorObject->Get_Color($userProfilePictureDBPath, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
				$mostCommonColorBackgroundColorHashtag = "#";
				$mostCommonColorBackgroundColor = "";
				$firstColor = "";
				$secondColor = "";
				$colorFactor = 0.5;

				foreach ($mostCommonColor as $hex => $count) {

					if ($hex === array_keys($mostCommonColor)[0]) {

						$firstColor = "#" . $hex;

					}

					if ($hex === array_keys($mostCommonColor)[4]) {

						$secondColor = "#" . $hex;

					}

				}

				$mostCommonColorBackgroundColorHexCode = $mostCommonColorBackgroundColorHashtag . $mostCommonColorBackgroundColor;

				?>

					<style type="text/css">
						
						.zoomed_in_profile_picture_for_others_cover_div {

							background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

					    }

					</style>

				<?php

			?>
			
			<img src="<?php echo $userProfilePicture; ?>" id="profile_pic_display_for_others" />

			<h1 id="label_profile_username_content"><?php echo $username ?></h1><h1 id="user_profile_label"><?php echo $userProfileLabel; ?></h1>

			<p id="profileBioForOthers"><?php echo $decryptedStrippedTagsBio; ?></p>

		</div>

		<div id="main_lists">
			
			<div class="lists">
				
				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<a id="label_profile_for_others_link" href="gamez?username=<?php echo "$username"; ?>"><p id="label_profile_for_others_2" class="label_profile_for_others_2">Gamez</p></a>

				</div>

				<p id="number_of_gamez"><?php echo $gameCounter . " ( " . $pendingGameCounter . " ) "; ?></p>
						
				<p id="gamez_not_found"><?php echo $gamesNoneFound; ?></p>

				<div class="scrolling_lists_div">

					<?php echo $gamesList; ?>

				</div>

			</div>

			<div class="lists">

				<?php

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$userID = "";
					$friendsCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_GET['username']) {

								$userID = $row['id'];

							}

						}

						$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ?;";
						$stmt = $db->prepare($numberOfFriendsQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFriendsQueryResult = $stmt->get_result();

						if ($numberOfFriendsQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_friends_found_for_others").remove();

									})

								</script>

							<?php

							$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friends";

							if ($friendsCounter == 1) {

								$friendsCounter = mysqli_num_rows($numberOfFriendsQueryResult) . " friend";

							}

						} else {

							$friendsCounter = "0 friends";
							$errors = 1;
							$friendsListEmpty = $username . "'s friends list is currently empty!";

						}

					}

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

						$numberOfFriendsQuery = "SELECT * FROM friends WHERE friend1Id = ? LIMIT 1;";
						$stmt = $db->prepare($numberOfFriendsQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFriendsQueryResult = $stmt->get_result();

						if ($numberOfFriendsQueryResult->num_rows >= 1) {

							while ($row = $numberOfFriendsQueryResult->fetch_assoc()) {

								$selectFriendDataQuery = "SELECT * FROM friends INNER JOIN users ON friends.friend2Id = users.id;";
								$stmt = $db->prepare($selectFriendDataQuery);
								$stmt->execute();
								$selectFriendDataQueryResult = $stmt->get_result();

								if ($selectFriendDataQueryResult->num_rows >= 1) {

									while ($row = $selectFriendDataQueryResult->fetch_assoc()) {

										if ($userID === $row['friend1Id']) {

											$userProfilePictureFriend = $row['profileImage'];
											$userProfilePictureFriendPath = "/Profile_pictures/" . $userProfilePictureFriend;

											if ($userProfilePictureFriend == "") {

												$userProfilePictureFriendPath = "Images/profile_image_placeholder.png";

											}

											$friendUsername = $row['username'];
											$friend2Id = $row['friend2Id'];
											$friend2IdDB = "friend_username_" . $friend2Id;

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['friend2Id'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $friend2IdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFriendsListForOthers .= "<div class='friends_div'>
	
																	<img src='" . $userProfilePictureFriendPath . "' class='profile_pic_display_friends' />

																	<div class='friend_username_div'>
																		
																		<a href='profile?username=" . $friendUsername . "' class='friend_user_link'>
								
																			<p class='friend_username' id='" . $friend2IdDB . "'>" . $friendUsername . "</p>

																		</a>

																	</div>

																</div>";

										}

									}

								}

							}

						}

					}

					$selectFriendsQuery = "SELECT * FROM friends;";
					$stmt = $db->prepare($selectFriendsQuery);
					$stmt->execute();
					$selectFriendsQueryResult = $stmt->get_result();

					if ($selectFriendsQueryResult->num_rows == 0) {

						$friendsListEmpty = $username . "'s friends list is currently empty!";
						$friendsCounter = "0 friends";

					}

					$query = "SELECT * FROM users;";
					$stmt = $db->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					$userID = "";
					$followersCounter = 0;

					if ($result->num_rows >= 1) {

						while ($row = $result->fetch_assoc()) {

							if ($row['username'] === $_GET['username']) {

								$userID = $row['id'];

							}

						}

						$numberOfFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ?;";
						$stmt = $db->prepare($numberOfFollowersQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFollowersQueryResult = $stmt->get_result();

						if ($numberOfFollowersQueryResult->num_rows >= 1) {

							?>

								<script type="text/javascript">
						
									$(document).ready(function() {

										$("#no_followers_found_for_others").remove();

									})

								</script>

							<?php

							$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " followers";

							if ($followersCounter == 1) {

								$followersCounter = mysqli_num_rows($numberOfFollowersQueryResult) . " follower";

							}

						} else {

							$followersCounter = "0 followers";
							$errors = 1;
							$followersListEmpty = $username . "'s followers list is currently empty!";

						}

					}

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

						$numberOfFollowersQuery = "SELECT * FROM followers WHERE followingUserId = ? LIMIT 1;";
						$stmt = $db->prepare($numberOfFollowersQuery);
						$stmt->bind_param("i", $userID);
						$stmt->execute();
						$numberOfFollowersQueryResult = $stmt->get_result();

						if ($numberOfFollowersQueryResult->num_rows >= 1) {

							while ($row = $numberOfFollowersQueryResult->fetch_assoc()) {

								$selectFollowerDataQuery = "SELECT * FROM followers INNER JOIN users ON followers.followerUserId = users.id;";
								$stmt = $db->prepare($selectFollowerDataQuery);
								$stmt->execute();
								$selectFollowerDataQueryResult = $stmt->get_result();

								if ($selectFollowerDataQueryResult->num_rows >= 1) {

									while ($row = $selectFollowerDataQueryResult->fetch_assoc()) {

										if ($userID === $row['followingUserId']) {

											$userProfilePictureFollower = $row['profileImage'];
											$userProfilePictureFollowerPath = "/Profile_pictures/" . $userProfilePictureFollower;

											if ($userProfilePictureFollower == "") {

												$userProfilePictureFollowerPath = "Images/profile_image_placeholder.png";

											}

											$followerUsername = $row['username'];
											$followerId = $row['followerUserId'];
											$followerIdDB = "follower_username_" . $followerId;

											$customUsernameStylingTextContent = "";

											$checkCustomUsernameStylingTextActiveStatusQuery = "SELECT * FROM shopProductsUsersList INNER JOIN users ON shopProductsUsersList.shopProductsUsersListUserId = users.id WHERE shopProductsUsersListUserId = ? AND shopProductsUsersListId = ? AND shopProductsActiveStatus = ?;";
											$stmt = $db->prepare($checkCustomUsernameStylingTextActiveStatusQuery);
											$customUsernameStylingTextId = 2;
											$customUsernameStylingTextActiveStatus = 1;
											$stmt->bind_param("sii", $row['followerUserId'], $customUsernameStylingTextId, $customUsernameStylingTextActiveStatus);
											$stmt->execute();
											$checkCustomUsernameStylingTextActiveStatusQueryResult = $stmt->get_result();

											if ($checkCustomUsernameStylingTextActiveStatusQueryResult->num_rows >= 1) {

												if ($row = $checkCustomUsernameStylingTextActiveStatusQueryResult->fetch_assoc()) {

													$customUsernameStylingTextContent = $row['customUsernameTextStyling'];

													?>

													<style type="text/css">
														
														#<?php echo $followerIdDB; ?> {

															color: <?php echo $customUsernameStylingTextContent; ?>;

														}

													</style>

												<?php

												}

											}

											$myFollowersList .= "<div class='followers_div'>
	
																		<img src='" . $userProfilePictureFollowerPath . "' class='profile_pic_display_followers' />

																		<div class='follower_username_div'>
																			
																			<a href='profile?username=" . $followerUsername . "' class='follower_user_link'>
									
																				<p class='follower_username' id='" . $followerIdDB . "'>" . $followerUsername . "</p>

																			</a>

																		</div>

																	</div>";

										}

									}

								}

							}

						}

					}

					$selectFollowersQuery = "SELECT * FROM followers;";
					$stmt = $db->prepare($selectFollowersQuery);
					$stmt->execute();
					$selectFollowersQueryResult = $stmt->get_result();

					if ($selectFollowersQueryResult->num_rows == 0) {

						$followersListEmpty = $username . "'s followers list is currently empty!";
						$followersCounter = "0 followers";

					}

				?>
				
				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<div id="lists_title_friends_followers_div">

						<div id="lists_title_friends_div" class="lists_title_friends_followers_inner_div">
							
							<a href="friends?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Friends</p></a>

						</div>

						<div id="lists_title_followers_div" class="lists_title_friends_followers_inner_div">
							
							<a href="followers?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Followers</p></a>

						</div>

					</div>

				</div>

				<div id="main_friends_list_outer_div">
					
					<p id="number_of_friends"><?php echo $friendsCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_friends_found_for_others"><?php echo $friendsListEmpty; ?></p>
						
						<?php echo $myFriendsListForOthers; ?>

					</div>

				</div>

				<div id="main_followers_list_outer_div">
					
					<p id="number_of_followers"><?php echo $followersCounter; ?></p>

					<div class="scrolling_lists_div">

						<p id="no_followers_found_for_others"><?php echo $followersListEmpty; ?></p>
						
						<?php echo $myFollowersList; ?>

					</div>

				</div>

			</div>

			<div class="lists">

				<?php

					$selectPostsQuery = "SELECT * FROM posts INNER JOIN users ON posts.username = users.username ORDER BY dateAndTimeAdded DESC;";
					$stmt = $db->prepare($selectPostsQuery);
					$stmt->execute();
					$selectPostsQueryResult = $stmt->get_result();

					if ($selectPostsQueryResult->num_rows >= 1) {

						while ($row = $selectPostsQueryResult->fetch_assoc()) {

							$usernameDB = $row['username'];
							$currentUsername = $_GET['username'];

							$userProfilePicturePosts = $row['profileImage'];
							$userProfilePicturePostsPath = "/Profile_pictures/" . $userProfilePicturePosts;

							if ($userProfilePicturePosts == "") {

								$userProfilePicturePostsPath = "Images/profile_image_placeholder.png";

							}

							$myPostsForOthers = $row['post'];
							$decryptedPostForOthers = decrypt($myPostsForOthers, $key);
							$strippedTagsPost = strip_tags($decryptedPostForOthers);
							$dateAndTimePostAdded = $row['dateAndTimeAdded'];
							$formattedDateAndTimePostAdded = date("H:i, d/m/Y", strtotime($dateAndTimePostAdded));
							$myPostImageForOthers = $row['postImage'];
							$myPostImagePathForOthers = "/Profile_posts_images/" . $myPostImageForOthers;
							$myPostIDForOthers = $row['postMainId'];

							if ($usernameDB === $currentUsername) {

								$myPostIDDBForOthers = "post_text_div_" . $myPostIDForOthers;
								$myPostDivIDDBForOthers = "posts_div_" . $myPostIDForOthers;

								$myPostZoomedInCoverDivForOthers = "zoomed_in_profile_post_image_cover_div_" . $myPostIDForOthers;

								if ($myPostImageForOthers !== "") {

									$mostCommonColorObject = new GetMostCommonColors();

									$resultNumber = 5;
									$reduceBrightness = 1;
									$reduceGradients = 1;
									$delta = 30;
									$mostCommonColor = $mostCommonColorObject->Get_Color("/home/yv4nbnligki0/public_html/Profile_posts_images/" . $myPostImageForOthers, $resultNumber, $reduceBrightness, $reduceGradients, $delta);
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
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

														background-color: <?php echo colorAverage($firstElementColorArrayDark, $lastElementColorArrayDark, $colorFactor); ?>;

												    }

												</style>

											<?php

										} else if ($lightColor) {

											$firstElementColorArrayLight = reset($mostCommonColorMinumumColorsArrayLight);
											$lastElementColorArrayLight = end($mostCommonColorMinumumColorsArrayLight);

											?>

												<style type="text/css">
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

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

											?>

												<style type="text/css">
													
													#<?php echo $myPostZoomedInCoverDivForOthers; ?> {

														background-color: <?php echo colorAverage($firstColor, $secondColor, $colorFactor); ?>;

												    }

												</style>

											<?php

										}

									}

								}

								if ($myPostsForOthers === "") {

									$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
							
																<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																<img src='" . $myPostImagePathForOthers . "' class='profile_post_image' id='profile_post_image_" . $myPostIDForOthers . "' data-profilepostimageid='" . $myPostIDForOthers . "' />

															</div>";

									?>

										<style type="text/css">

											#<?php echo $myPostDivIDDBForOthers; ?> {

												padding-bottom: 1vw;

											}

										</style>

									<?php

								} else {

									if ($myPostImageForOthers === "") {

										$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
								
																	<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																	<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																	<div class='post_text_div' id='post_text_div_" . $myPostIDForOthers . "'>
																		
																		<p class='main_post_text'> " . $strippedTagsPost . " </p>

																	</div>

																</div>";

									} else {

										$myPostsListForOthers .= "<div class='posts_div' id='posts_div_" . $myPostIDForOthers . "'>
							
																	<img src='" . $userProfilePicturePostsPath . "' class='profile_pic_display_posts' />

																	<p class='post_text_date_time'> " . $formattedDateAndTimePostAdded . " </p>

																	<img src='" . $myPostImagePathForOthers . "' class='profile_post_image' id='profile_post_image_" . $myPostIDForOthers . "' data-profilepostimageid='" . $myPostIDForOthers . "' />

																	<div class='post_text_div' id='post_text_div_" . $myPostIDForOthers . "'>
																		
																		<p class='main_post_text'> " . $strippedTagsPost . " </p>

																	</div>

																</div>";

										?>

											<style type="text/css">
												
												#<?php echo $myPostIDDBForOthers; ?> {

													margin-top: -2%;

												}

											</style>

										<?php

									}

								}

							}

						}

					}

					$numberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
					$stmt = $db->prepare($numberOfPostsQuery);
					$username = $_GET['username'];
					$stmt->bind_param("s", $username);
					$stmt->execute();
					$numberOfPostsQueryResult = $stmt->get_result();

					if ($numberOfPostsQueryResult->num_rows >= 1) {

						?>

							<script type="text/javascript">
					
								$(document).ready(function() {

									$("#no_posts_found_for_others").remove();

								})

							</script>

						<?php

						while ($row = $numberOfPostsQueryResult->fetch_assoc()) {

							$postsCounter = mysqli_num_rows($numberOfPostsQueryResult) . " posts";

							if ($postsCounter == 1) {

								$postsCounter = mysqli_num_rows($numberOfPostsQueryResult) . " post";

							}

						}

					} else {

						$noPostsForOthers = $username . " currently has no posts!";
						$errors = 1;
						$postsCounter = "0 posts";

					}

					if ($errors == 0) {

						$selectNumberOfPostsQuery = "SELECT * FROM posts WHERE username = ?;";
						$stmt = $db->prepare($selectNumberOfPostsQuery);
						$username = $_GET['username'];
						$stmt->bind_param("s", $username);
						$stmt->execute();
						$selectNumberOfPostsQueryResult = $stmt->get_result();

						if ($selectNumberOfPostsQueryResult->num_rows >= 1) {

							$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " posts";

							if ($postsCounter == 1) {

								$postsCounter = mysqli_num_rows($selectNumberOfPostsQueryResult) . " post";

							}

						} else {

							$postsCounter = "0 posts";

						}

					}

				?>
				
				<div id="for_others_label_div">

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

								if ($customUsernameStylingTextContent == "") {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: white;

											}

										</style>

									<?php

								} else {

									?>

										<style type="text/css">
											
											#label_profile_for_others {

												color: <?php echo $customUsernameStylingTextContent; ?>;

											}

										</style>

									<?php

								}

							}

						}

					?>

					<?php

						$myFeedPostsList = "";
						$userID = fetchMyID($_GET['username'], $db);

						$query2 = "SELECT * FROM feed INNER JOIN users ON feed.feedUserId = users.id WHERE feedUserId = ? ORDER BY dateAndTimeFeedSubmitted DESC LIMIT 10;";
						$stmt2 = $db->prepare($query2);
						$stmt2->bind_param("i", $userID);
						$stmt2->execute();
						$result2 = $stmt2->get_result();

						if ($result2->num_rows >= 1) {

							while ($row = $result2->fetch_assoc()) {

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

									$myFeedPostsListForOthers .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
			
															<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
																
																<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

																<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

															</div>

															<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

																<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

															</div>

															<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

																<div class="bottom_feed_like_div_for_each">

																	<div id="like_div">
																
																		<img src="Images/like.png" class="like_button_image" />

																		<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																	</div>

																</div>

																<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

															</div>

														</div>';

								} else {

									$feedContentCaptionIDDB = "bottom_feed_div_caption_for_each_" . $feedID;

									$myFeedPostsListForOthers .= '<div class="main_outer_feed_div_for_each" id="main_outer_feed_div_for_each_' . $feedID . '" data-feedid="' . $feedID . '">
			
															<div class="top_feed_div_for_each" id="top_feed_div_for_each_' . $feedID . '">
																
																<img src="' . $feedProfilePicturePath . '" class="profile_picture_display_feed_div_for_each" id="profile_picture_display_feed_div_for_each_' . $feedID . '" />

																<a href="/Account/profile?username=' . $feedUserUsername .'"><p class="username_feed_div_for_each" id="username_feed_div_for_each_' . $feedID . '">' . $feedUserUsername . '</p></a>

															</div>

															<div class="main_center_image_feed_div_for_each" id="main_center_image_feed_div_for_each_' . $feedID . '">

																<img src="' . $feedImagePath . '" class="feed_image_content_div_for_each_image" id="feed_image_content_div_for_each_image_' . $feedID . '" data-feedpostimageid="' . $feedID . '" />

															</div>

															<div class="bottom_feed_div_for_each" id="bottom_feed_div_for_each_' . $feedID . '">

																<div class="bottom_feed_like_div_for_each">

																	<div id="like_div">
																
																		<img src="Images/like.png" class="like_button_image" />

																		<span id="like_counter_' . $feedID . '" class="like_counter">' . getLikesFeed($feedID, $db) . '</span>

																	</div>

																</div>

																<p class="bottom_feed_div_time_and_date_added_for_each" id="bottom_feed_div_time_and_date_added_for_each_' . $feedID . '">' . $formattedDateAndTimeFeedSubmitted . '</p>

																<p class="bottom_feed_div_caption_for_each" id="bottom_feed_div_caption_for_each_' . $feedID . '">' . $decryptedFeedContent . '</p>

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
												padding: 0.1vw;

											}

										</style>

									<?php

								}

							}

						} else {

							$noFeedPostsForOthers = $username . " currently has no feed posts!";

							?>

								<style type="text/css">
									
									#no_feed_posts_found_for_others {

										display: block;

									}

								</style>

							<?php

						}

						$query1 = "SELECT * FROM feed WHERE feedUserId = ?;";
						$stmt1 = $db->prepare($query1);
						$stmt1->bind_param("s", $userID);
						$stmt1->execute();
						$result1 = $stmt1->get_result();

						if ($result1->num_rows >= 1) {

							$feedPostsCounter = mysqli_num_rows($result1) . " feed posts";

							if ($feedPostsCounter == 1) {

								$feedPostsCounter = mysqli_num_rows($result1) . " feed post";

							}

						} else {

							$feedPostsCounter = "0 feed posts";

						}

					?>

					<div id="lists_title_posts_feed_div">

						<div id="lists_title_posts_div" class="lists_title_posts_feed_posts_inner_div">
							
							<a href="posts?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Posts</p></a>

						</div>

						<div id="lists_title_feed_posts_div" class="lists_title_posts_feed_posts_inner_div">
							
							<a href="feed?username=<?php echo "$username"; ?>" id="label_profile_for_others_link"><p id="label_profile_for_others_2">Feed Posts</p></a>

						</div>

					</div>

				</div>

				<div id="main_posts_list_outer_div">

					<p id="number_of_posts"><?php echo $postsCounter; ?></p>

					<div class="scrolling_lists_div_for_others posts_scrolling_div">
						
						<p id="no_posts_found_for_others"><?php echo $noPostsForOthers; ?></p>

						<?php echo $myPostsListForOthers; ?>

					</div>

				</div>

				<div id="main_feed_posts_list_outer_div">

					<p id="number_of_feed_posts"><?php echo $feedPostsCounter; ?></p>

					<div class="scrolling_lists_div_for_others feed_posts_scrolling_div">
						
						<p id="no_feed_posts_found_for_others"><?php echo $noFeedPostsForOthers; ?></p>

						<?php echo $myFeedPostsListForOthers; ?>

					</div>

				</div>

			</div>

		</div>

	<?php endif ?>

	<?php if ($login == 0 && $result->num_rows == 0) : ?>

		<h1 id="profile_and_user_error_label"><?php echo $profileAndUserError; ?></h1>

		<p id="profile_not_accessible"><?php echo $profileNotAccessible; ?></p>

		<h2 id="or_label">OR</h2>

		<p id="user_not_found"><?php echo $userNotFound; ?></p>

	<?php endif ?>

	<?php if ($login == 1 && $result->num_rows == 0) : ?>

		<h1>das</h1>

		<h1 id="profile_and_user_error_label"><?php echo $profileAndUserError; ?></h1>

		<p id="profile_not_accessible_logged_in"><?php echo $profileNotAccessibleLoggedIn; ?></p>

		<h2 id="or_label">OR</h2>

		<p id="user_not_found_logged_in"><?php echo $userNotFoundLoggedIn; ?></p>

	<?php endif ?>

</body>

<?php if ($login == 1) : ?>

	<script type="text/javascript">

		var replyActive = false;
		var tmpPath = "";
		
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

		var refreshMessageContainerInterval = setInterval(function() {

			updateAllNewMessagesEachPage();

		}, 3000);

		setTimeout(function() {

			$("#account_deleted_successfully").fadeOut(300);

		}, 2000);

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
				updateAllNewMessagesEachPage();
				updateAllNewFriendRequests();
				updateAllNewFriendRequestsProfileDiv();
				updateAllNewRecentMessagesProfileDiv();
				updateAllNewRecentNotificationsProfileDiv();
				updateFriendsOnlineActivityStatus();
				updateAllNewFeedNotifications();

			});

			fetchUserOnline();
			fetchUserOffline();
			updateAllNewMessagesEachPage();
			updateAllNewFriendRequests();
			updateAllNewFriendRequestsProfileDiv();
			updateAllNewRecentMessagesProfileDiv();
			updateAllNewRecentNotificationsProfileDiv();
			updateAllNewFeedNotifications();

			setInterval(function() {

				updateLastActivity();
				fetchUserOnline();
				fetchUserOffline();
				updateAllNewFriendRequests();
				updateAllNewFriendRequestsProfileDiv();
				updateAllNewRecentMessagesProfileDiv();
				updateAllNewRecentNotificationsProfileDiv();
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

	        				const notificationNumber = document.querySelector("#notification_number");
							const notificationNumber2 = document.querySelector("#notification_number_messages");
							var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

							if (notificationNumber.classList.contains("existing_notification") || notificationNumber2.classList.contains("existing_notification") || visibleMessageContainer) {

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

							        			const notificationNumber = document.querySelector("#notification_number");
												const notificationNumber2 = document.querySelector("#notification_number_messages");
												var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

									        	if (notificationNumber.classList.contains("existing_notification") || notificationNumber2.classList.contains("existing_notification") || visibleMessageContainer) {

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

							        			const notificationNumber = document.querySelector("#notification_number");
												const notificationNumber2 = document.querySelector("#notification_number_messages");
												var visibleMessageContainer = $(".notifications_each_page_div_for_each").is(":visible");

									        	if ((!notificationNumber.classList.contains("existing_notification")) || (!notificationNumber2.classList.contains("existing_notification")) || (!visibleMessageContainer)) {

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

	    function fetchAllNewFriendRequestsProfileDiv() {

	    	$.ajax({

	    		url: "fetch_all_friend_requests_profile_div.php",
	    		method: "GET",
	    		success: function(data) {

	    			$("#friend_requests_hover_div_main_div").html(data);

	    		}

	    	});

	    }

	    function updateAllNewFriendRequestsProfileDiv() {

			$("#friend_requests_hover_div_main_div").each(function() {

				fetchAllNewFriendRequestsProfileDiv();

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

		function fetchAllRecentMessagesProfileDiv() {

			$.ajax({

				url: "fetch_all_recent_messages_profile_div.php",
				method: "GET",
				success: function(data) {

					$("#recent_messages_hover_div_main_div").html(data);

				}

			});

		}

		function updateAllNewRecentMessagesProfileDiv() {

			$("#recent_messages_hover_div_main_div").each(function() {

				fetchAllRecentMessagesProfileDiv();

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

		function fetchAllRecentNotificationsProfileDiv() {

			$.ajax({

				url: "fetch_all_recent_notifications_profile_div.php",
				method: "GET",
				success: function(data) {

					$("#recent_feed_notifications_hover_div_main_div").html(data);

				}

			});

		}

		function updateAllNewRecentNotificationsProfileDiv() {

			$("#recent_feed_notifications_hover_div_main_div").each(function() {

				fetchAllRecentNotificationsProfileDiv();

			});

		}

		$(document).on("click", "#notifications_mark_all_as_read", function() {

			$.ajax({

				url: "mark_all_notifications_as_read.php",
				method: "GET",
				success: function(data) {

					var xhttp = new XMLHttpRequest();

					xhttp.onreadystatechange = function() {

						if (this.readyState == 4 && this.status == 200) {

							document.getElementById("notification_number_feed_notifications").innerHTML = this.responseText;
							document.getElementById("notification_number_feed_notifications").classList.add("existing_notification");

							if (this.responseText == 0) {

								document.getElementById("notification_number_feed_notifications").classList.remove("existing_notification");

							}

						}

					};

					xhttp.open("GET", "feed_notifications.php", true);

					xhttp.send();

				}

			});

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

		$("#post_submitted").fadeOut(300);

	}, 2000);

	$("#profile_pic_display_for_others").on("click", function() {

		$(window).scrollTop();
		$(window).scrollLeft();

		setTimeout(function() {

			$(window).scrollTop();
			$(window).scrollLeft();

		}, 500);

		$("#profile_pic_display_for_others").css("position", "absolute");
		$("#profile_pic_display_for_others").css("width", "45vw");
		$("#profile_pic_display_for_others").css("height", "45vw");
		$("#profile_pic_display_for_others").css("z-index", "10");
		$("#profile_pic_display_for_others").css("left", "0");
		$("#profile_pic_display_for_others").css("right", "0");
		$("#profile_pic_display_for_others").css("top", "0");
		$("#profile_pic_display_for_others").css("bottom", "0");
		$("#profile_pic_display_for_others").css("margin", "auto");
		$("#profile_pic_display_for_others").css("transition", "0.15s");
		$("#profile_pic_display_for_others").css("border-radius", "100%");
		$("#profile_pic_display_for_others").css("pointer-events", "none");
		$("body").append("<div class='zoomed_in_profile_picture_for_others_cover_div'><span class='close_zoomed_in_profile_picture_for_others_cover_div_modal'>&times;</span></div>");
		$(".zoomed_in_profile_picture_for_others_cover_div").css("display", "block");
		$("#profile_pic_display_for_others").addClass("zoomed_in_profile_pic_display_for_others");
		$("body").css("overflow", "hidden");

	});

	$("#profile_pic_display").on("click", function() {

		$(window).scrollTop();
		$(window).scrollLeft();

		setTimeout(function() {

			$(window).scrollTop();
			$(window).scrollLeft();

		}, 500);

		$("#profile_pic_display").css("position", "absolute");
		$("#profile_pic_display").css("width", "45vw");
		$("#profile_pic_display").css("height", "45vw");
		$("#profile_pic_display").css("z-index", "10");
		$("#profile_pic_display").css("left", "0");
		$("#profile_pic_display").css("right", "0");
		$("#profile_pic_display").css("top", "0");
		$("#profile_pic_display").css("bottom", "0");
		$("#profile_pic_display").css("margin", "auto");
		$("#profile_pic_display").css("transition", "0.15s");
		$("#profile_pic_display").css("border-radius", "100%");
		$("#profile_pic_display").css("pointer-events", "none");
		$("#profile_pic_display_inner_div").removeClass("profile_pic_display_inner_div_class");
		$("body").append("<div class='zoomed_in_profile_picture_cover_div'><span class='close_zoomed_in_profile_picture_cover_div_modal'>&times;</span></div>");
		$(".zoomed_in_profile_picture_cover_div").css("display", "block");
		$("#profile_pic_display").addClass("zoomed_in_profile_pic_display");
		$("body").css("overflow", "hidden");

	});

	$(document).on("click", ".close_zoomed_in_profile_picture_for_others_cover_div_modal", function() {

		$(".zoomed_in_profile_picture_for_others_cover_div").remove();
		$("#profile_pic_display_for_others").removeAttr("style");
		$("#profile_pic_display_for_others").removeClass("zoomed_in_profile_pic_display_for_others");

	});

	$(document).on("click", ".close_zoomed_in_profile_picture_cover_div_modal", function() {

		$(".zoomed_in_profile_picture_cover_div").remove();
		$("#profile_pic_display").removeAttr("style");
		$("#profile_pic_display").removeClass("zoomed_in_profile_pic_display");
		$("#profile_pic_display_inner_div").addClass("profile_pic_display_inner_div_class");

	});

	$("html").bind("keydown", function(e) {

		if (e.keyCode === 27) {

			if ($(".zoomed_in_profile_picture_cover_div").is(":visible")) {

				$(".zoomed_in_profile_picture_cover_div").remove();
				$("#profile_pic_display").removeAttr("style");
				$("#profile_pic_display").removeClass("zoomed_in_profile_pic_display");
				$("#profile_pic_display_inner_div").addClass("profile_pic_display_inner_div_class");
				$("body").css("overflow", "auto");

			}

			if ($(".zoomed_in_profile_picture_for_others_cover_div").is(":visible")) {

				$(".zoomed_in_profile_picture_for_others_cover_div").remove();
				$("#profile_pic_display_for_others").removeAttr("style");
				$("#profile_pic_display_for_others").removeClass("zoomed_in_profile_pic_display_for_others");
				$("body").css("overflow", "auto");

			}

			if ($(".zoomed_in_profile_post_image_cover_div").is(":visible")) {

				$(".lists").removeAttr("style");

				var zoomedProfilePostImageId = $(".zoomed_in_profile_post_image_cover_div").data("zoomedprofilepostimage");

				$(".zoomed_in_profile_post_image_cover_div").remove();
				$("#profile_post_image_" + zoomedProfilePostImageId).removeAttr("style");
				$("#profile_post_image_" + zoomedProfilePostImageId).removeClass("zoomed_in_profile_post_image");
				$("body").css("overflow", "auto");

			}

		}

	});

	$(document).on("click", ".profile_post_image", function() {

		$(window).scrollTop();
		$(window).scrollLeft();

		setTimeout(function() {

			$(window).scrollTop();
			$(window).scrollLeft();

		}, 500);

		var profilePostImage = $(this).attr("id");
		var profilePostImageId = $(this).data("profilepostimageid");

		$(".lists").css("opacity", "1");

		$("#profile_post_image_" + profilePostImageId).css("position", "fixed");
		$("#profile_post_image_" + profilePostImageId).css("max-width", "90%");
		$("#profile_post_image_" + profilePostImageId).css("max-height", "90%");
		$("#profile_post_image_" + profilePostImageId).css("height", "auto");
		$("#profile_post_image_" + profilePostImageId).css("width", "initial");
		$("#profile_post_image_" + profilePostImageId).css("z-index", "10");
		$("#profile_post_image_" + profilePostImageId).css("left", "0");
		$("#profile_post_image_" + profilePostImageId).css("right", "0");
		$("#profile_post_image_" + profilePostImageId).css("top", "0");
		$("#profile_post_image_" + profilePostImageId).css("bottom", "0");
		$("#profile_post_image_" + profilePostImageId).css("margin", "auto");
		$("#profile_post_image_" + profilePostImageId).css("transition", "0.15s");
		$("#profile_post_image_" + profilePostImageId).css("border-radius", "0.75vw");
		$("#profile_post_image_" + profilePostImageId).css("pointer-events", "none");
		$("body").css("overflow", "hidden");

		$("body").append("<div class='zoomed_in_profile_post_image_cover_div' id='zoomed_in_profile_post_image_cover_div_" + profilePostImageId + "' data-zoomedprofilepostimage='" + profilePostImageId + "'><span class='close_zoomed_in_profile_post_image_cover_div_modal' id='close_zoomed_in_profile_post_image_cover_div_modal_" + profilePostImageId + "' data-profilepostimageclosemodalspan='" + profilePostImageId + "'>&times;</span></div>");
		$(".zoomed_in_profile_post_image_cover_div").css("display", "block");
		$("#profile_post_image_" + profilePostImageId).addClass("zoomed_in_profile_post_image");

	});

	$(document).on("click", ".close_zoomed_in_profile_post_image_cover_div_modal", function() {

		var closeProfilePostImageModalSpan = $(this).data("profilepostimageclosemodalspan");

		$(".zoomed_in_profile_post_image_cover_div").remove();
		$("#profile_post_image_" + closeProfilePostImageModalSpan).removeAttr("style");
		$("#profile_post_image_" + closeProfilePostImageModalSpan).removeClass("zoomed_in_profile_post_image");
		$("body").css("overflow", "auto");

		$(".lists").removeAttr("style");

	});

	$("#imagePost").change(function(e) {

		var file = $("#imagePost")[0].files[0].name;

		tmpPath = URL.createObjectURL(e.target.files[0]);

		$("#submit_profile_post_image_preview_display").attr("src", tmpPath);

		if (!($("#submit_profile_post_image_preview_div").is(":visible"))) {

			$("#submit_profile_post_image_preview_div").css("display", "block");

			$("#submit_profile_post_image_preview_div").append('<span class="close_zoomed_in_submit_profile_post_image_cover_div_modal" id="close_zoomed_in_submit_profile_post_image_cover_div_modal">&times;</span><img src="' + tmpPath + '" id="submit_profile_post_image_preview_display" />');

		}

	});

	$(document).on("click", ".close_zoomed_in_submit_profile_post_image_cover_div_modal", function() {

		$("#uploaded_image_too_large_error").css("display", "none");

		$(".imagePostLabel").removeClass("uploaded_image_too_large");

		$("#submit_profile_post_image_preview_div").css("border-top", "2.5px solid #777EB8");
		$("#submit_profile_post_image_preview_div").css("border-right", "2.5px solid #777EB8");
		$("#submit_profile_post_image_preview_div").css("border-left", "2.5px solid #777EB8");

		$("#submit_profile_post_image_preview_display").remove();

		$(".close_zoomed_in_submit_profile_post_image_cover_div_modal").remove();

		$("#submit_profile_post_image_preview_div").css("display", "none");

		document.getElementById("imagePost").value = document.getElementById("imagePost").defaultValue;

	});

	$("#lists_title_friends").hover(function() {

		$("#main_friends_list_outer_div").css("display", "block");
		$("#main_followers_list_outer_div").css("display", "none");

	});

	$("#lists_title_followers").hover(function() {

		$("#main_followers_list_outer_div").css("display", "block");
		$("#main_friends_list_outer_div").css("display", "none");

	});

	$("#lists_title_friends_div").hover(function() {

		$("#main_friends_list_outer_div").css("display", "block");
		$("#main_followers_list_outer_div").css("display", "none");

	});

	$("#lists_title_followers_div").hover(function() {

		$("#main_followers_list_outer_div").css("display", "block");
		$("#main_friends_list_outer_div").css("display", "none");

	});

	$("#lists_title_posts").hover(function() {

		$("#main_posts_list_outer_div").css("display", "block");
		$("#main_feed_posts_list_outer_div").css("display", "none");

	});

	$("#lists_title_feed").hover(function() {

		$("#main_feed_posts_list_outer_div").css("display", "block");
		$("#main_posts_list_outer_div").css("display", "none");

	});

	$("#lists_title_posts_div").hover(function() {

		$("#main_posts_list_outer_div").css("display", "block");
		$("#main_feed_posts_list_outer_div").css("display", "none");

	});

	$("#lists_title_feed_posts_div").hover(function() {

		$("#main_feed_posts_list_outer_div").css("display", "block");
		$("#main_posts_list_outer_div").css("display", "none");

	});

	$(document).on("click", ".feed_image_content_div_for_each_image", function() {

		$(window).scrollTop();
		$(window).scrollLeft();

		setTimeout(function() {

			$(window).scrollTop();
			$(window).scrollLeft();

		}, 500);

		var feedPostImage = $(this).attr("id");
		var feedPostImageId = $(this).data("feedpostimageid");

		$(".lists").css("opacity", "1");

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

				$(".lists").removeAttr("style");

				var zoomedFeedPostImageId = $(".zoomed_in_feed_post_image_cover_div").data("zoomedfeedpostimage");

				$(".zoomed_in_feed_post_image_cover_div").remove();
				$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeAttr("style");
				$("#feed_image_content_div_for_each_image_" + zoomedFeedPostImageId).removeClass("zoomed_in_feed_post_image");
				$("body").css("overflow", "auto");

			}

		}

	});

	$(document).on("click", ".close_zoomed_in_feed_post_image_cover_div_modal", function() {

		$(".lists").removeAttr("style");

		var closeFeedPostImageModalSpan = $(this).data("feedpostclosemodalspan");

		$(".zoomed_in_feed_post_image_cover_div").remove();
		$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeAttr("style");
		$("#feed_image_content_div_for_each_image_" + closeFeedPostImageModalSpan).removeClass("zoomed_in_feed_post_image");
		$("body").css("overflow", "auto");

	});

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