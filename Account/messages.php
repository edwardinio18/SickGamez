<?php

	include("server.php");

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

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<link rel="icon" type="image/jpg" href="favicon.jpg" />

  	<link rel="apple-touch-icon" type="image/jpg" href="favicon.jpg" />

  	<meta name="description" content="Your SickGamez messages!" />

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

	    #messages_label {

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

	    #messages_error {

	    	text-align: center;
	        font-size: 7vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 100%;
	        margin-top: -2.5%;

	    }
		
		#messages_not_accessible {

	    	text-align: center;
	        font-size: 4.5vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: red;
	        width: 95%;
	        margin: auto;
	        margin-top: 7.5%;

	    }

	    #back_arrow_link {

	    	cursor: default;
	    	opacity: 0.5;
	    	transition: 0.2s all ease;

	    }

	    #back_arrow_link:hover {

	    	opacity: 1;

	    }

	    #back_arrow_image {

	    	width: 5vw;

	    }

	    #back_arrow_div {

	    	position: fixed;
	    	bottom: 1.8%;
	    	left: 1%;

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

	    #messages_container {

	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	width: 82.5%;
	    	height: 35vw;
	    	margin: auto;

	    }

	    #left_column_messages_div {

	    	width: 30%;
	    	height: 100%;
	    	background-color: transparent;
	    	border-right: 2.5px solid #777EB8;
	    	float: left;
	    	position: sticky;

	    }

	    #start_new_conversation_div {

	    	width: 100%;
	    	height: 15%;
	    	background-color: transparent;
	    	border-bottom: 2.5px solid #777EB8;
	    	position: relative;

	    }

	    #start_new_conversation_plus {

	    	width: 4vw;
	    	position: absolute;
	    	height: 4vw;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-left: 5%;

	    }

	    #start_new_conversation_label_div {

	    	width: 75%;
	    	height: 50%;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	float: left;
	    	margin: auto;
	    	margin-left: 22%;
	    	text-align: center;

	    }

	    #start_new_conversation_label {

	    	color: lightgray;
	    	font-size: 1.75vw;
	    	font-family: GomGom;
	    	cursor: default;

	    }

	    #start_new_conversation_modal_container {

			display: none;
			position: fixed;
			z-index: 1;
			padding-top: 11.25%;
			left: 0;
			top: 2.5%;
			width: 100%;
			height: 100%;
			overflow: auto;

	    }

	    #start_new_conversation_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			width: 45%;
			height: 33vw;
			position: relative;

	    }

	    .close_start_new_conversation_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4%;
			right: 2%;
			height: 0%;

	    }

	    .close_start_new_conversation_modal:hover, .close_start_new_conversation_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #inner_modal_title {

			color: white;
			float: left;
			font-size: 2.05vw;
			position: absolute;
			top: 8%;
			left: 9.25%;
			font-family: GomGom;
			cursor: default;

	    }

	    #search_new_conversation_with_friend_input_div {

	    	width: 80%;
	    	margin: auto;

	    }

	    #search_friends_new_conversation {

	    	position: absolute;
	    	top: 19%;
	    	width: 85%;
	    	left: 7.5%;
	    	font-size: 1.55vw;
	    	color: grey;
	    	border: 2.5px solid #777EB8;
	    	border-radius: 1vw;
	    	padding: 0.4vw;
	    	background-color: #1d1f20;
	    	outline: none;
	    	text-align: center;
	    	font-weight: bold;

	    }

	    #search_friends_new_conversation:focus {

	    	background-color: white;

	    }

	    #start_new_conversation_search_friends_results {

			width: 100%;
			height: 67%;
			position: absolute;
			top: 31%;
			left: 7.5%;
			overflow: auto;

	    }

	    .start_new_conversation_search_friends_results_div_for_each {

	    	position: relative;
	    	width: 60%;
	    	height: 5vw;
	    	border: 2.5px solid #777EB8;
	    	margin-top: 2%;
	    	border-radius: 1vw;

	    }

	    .start_new_conversation_search_friends_results_profile_pic_display {

	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	left: 1.25%;

	    }

	    .start_new_conversation_search_friends_results_username_div {

	    	display: table-cell;
	    	vertical-align: middle;
	    	padding: 1vw;
	    	position: absolute;
	    	left: 14%;

	    }

	    .start_new_conversation_search_friends_results_username {

	    	color: white;
	    	font-size: 1.75vw;
	    	font-family: GomGom;
	    	cursor: default;

	    }

	    ::-webkit-scrollbar {

	    	display: none;

	    }

	    #start_new_conversation_submit {

	    	position: absolute;
	    	right: 0;
	    	top: 0;
	    	height: 5vw;
	    	width: 40%;
			border-radius: 1vw;
	    	background-color: transparent;
	    	border: 2.5px solid #777EB8;
	    	color: grey;
	    	font-family: GomGom;
	    	font-size: 3vw;
	    	cursor: default;
	    	margin-right: -42%;

	    }

	    #start_new_conversation_submit:active {

	    	background-color: white;

	    }

	    #start_new_conversation_no_friends_found {

			position: absolute;
			top: 5%;
			color: white;
			font-family: Pixelony;
			font-size: 2vw;
			left: -7.5%;
			width: 100%;
			text-align: center;

	    }

	    #right_column_messages_div {

	    	width: 70%;
	    	height: 100%;
	    	background-color: transparent;
	    	float: right;

	    }

	    .conversation_chat_text_box_send_button_div {

	    	width: 100%;
	    	height: 19%;
	    	background-color: transparent;
	    	display: flex;
	    	align-items: center;

	    }

	    #send_chat_message {

			width: 6vw;
			height: 2.75vw;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			background-color: transparent;
			cursor: default;
			color: grey;
			font-size: 1.6vw;
			font-family: GomGom;
			padding: 0;
			margin-top: 3%;
			text-align: center;
			margin-right: 6%;

	    }

	    .message_content_textarea {

			resize: none;
			width: 95%;
			height: 5.75vw;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			font-size: 1vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			margin-left: 0.75%;
			padding-left: 0.6vw;
			padding-top: 0.25vw;
			position: relative;

	    }

	    .message_content_textarea:focus {

	    	background-color: white;

	    }

	    .chat_title_with {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2vw;
	    	text-align: center;
	    	margin-top: 1%;
	    	cursor: default;
	    	display: inline-block;

	    }

	    .chat_title_with_2 {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2vw;
	    	text-align: center;
	    	margin-top: 1%;
	    	cursor: default;
	    	display: inline-block;

	    }

	    .chat_title_with_3 {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 2vw;
	    	text-align: center;
	    	margin-top: 1%;
	    	cursor: default;
	    	display: inline-block;

	    }

	    .chat_title_with_main_div {

	    	width: 100%;
	    	margin: auto;
	    	text-align: center;
	    	cursor: default;
	    	display: inline-block;

	    }

	    .conversation_chat_main_div {

	    	width: 100%;
	    	height: 66%;
	    	background-color: transparent;
	    	border-bottom: 2.5px solid #777EB8;
	    	overflow-y: scroll;

	    }

	    .send_chat_message {

			width: 6vw;
			height: 2.75vw;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			background-color: transparent;
			cursor: default;
			color: grey;
			font-size: 1.6vw;
			font-family: GomGom;
			padding: 0;
			margin-top: 3%;
			text-align: center;
			margin-right: 6%;
			position: relative;

	    }

	    .send_chat_message:active {

	    	background-color: white;
	    	outline: none;

	    }

	    .send_chat_message:focus {

	    	outline: none;

	    }

	    .chat_div_from_user {

			position: relative;
			width: 60%;
			height: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			margin-left: 2%;
			cursor: default;


	    }

	    .profile_pic_display_chat_from_user {

			position: absolute;
	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	float: left;
	    	margin-left: 1%;

	    }

	    .chat_div_from_user_date_time {

	    	color: white;
			font-size: 1vw;
			font-family: Pixelony;
			float: right;
			margin-right: 1.5%;
			margin-top: 0.5%;
			margin-bottom: -8%;
			text-decoration: underline;

	    }

	    .chat_div_from_user_message {

			width: 89%;
	    	margin-left: 14.5%;
	    	margin-top: 5%;
	    	margin-bottom: 4%;

	    }

	    .main_chat_message_content_from_user {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.3vw;
	    	width: 90%;
	    	word-wrap: break-word;
	    	margin-top: revert;
	    	text-align: left;
	    	word-spacing: 0.1vw;

	    }

	    .user_username_chat_top {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 3vw;
	    	float: left;
	    	margin: 0;
			margin-left: 9.5%;
			margin-top: 0.25%;

	    }

	    .user_username_chat_top_div {

	    	position: relative;
	    	width: 100%;
	    	height: 15%;
	    	border-bottom: 2.5px solid #777EB8;
	    	cursor: default;

	    }

	    .chat_div_from_me {

			position: relative;
			width: 60%;
			height: auto;
			border: 2.5px solid #777EB8;
			border-radius: 1vw;
			cursor: default;
			left: 38%;

	    }

	    .profile_pic_display_chat_from_me {

			position: absolute;
	    	width: 4vw;
	    	height: 4vw;
	    	border-radius: 100%;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	right: 1%;

	    }

	    .chat_div_from_me_date_time {

	    	color: white;
			font-size: 1vw;
			font-family: Pixelony;
			float: left;
			margin-left: 1.5%;
			margin-top: 0.5%;
			margin-bottom: -8%;
			text-decoration: underline;

	    }

	    .chat_div_from_me_message {

			width: 89%;
	    	margin-right: 14.5%;
	    	margin-top: 5%;
	    	margin-bottom: 4%;

	    }

	    .main_chat_message_content_from_me {

	    	color: white;
	    	font-family: GomGom;
	    	font-size: 1.3vw;
	    	width: 93%;
	    	word-wrap: break-word;
	    	margin-top: revert;
	    	text-align: left;
	    	word-spacing: 0.1vw;
	    	margin-left: 1.5%;

	    }

	    .chat_div_container_for_each {

	    	width: 100%;
	    	height: auto;
	    	background: transparent;
	    	position: relative;
	    	margin-top: 2%;

	    }

	    #left_column_messages_list_div {

	    	width: 100%;
	    	height: 72%;
	    	background-color: transparent;
	    	position: relative;
	    	overflow: auto;

	    }

	    .left_column_messages_list_div_for_each {

	    	width: 100%;
	    	height: 20%;
	    	border-bottom: 2.5px solid #777EB8;
	    	position: relative;
	    	cursor: default;

	    }

	    .left_column_messages_list_div_for_each:hover {

	    	cursor: pointer;
	    	opacity: 0.6;

	    }

	    .profile_pic_display_messages_list_left {

			width: 4.2vw;
			height: 4.2vw;
			border-radius: 100%;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 1.5%;

	    }

	    .left_column_messages_list_div_date_and_time_last_message_sent_received {

	    	color: white;
			font-size: 1vw;
			font-family: Pixelony;
			float: right;
			margin-right: 1%;
			margin-bottom: -8%;
			text-decoration: underline;

	    }

	    .left_column_messages_list_div_last_message_sent_received_content {

			width: 74%;
			margin-right: 5.5%;
			margin-top: 7.5%;
			margin-bottom: 8%;
			position: absolute;
			margin-left: 20.5%;

	    }

	    .left_column_messages_list_div_message_content {

			color: grey;
			font-family: GomGom;
			font-size: 1.3vw;
			width: 100%;
			white-space: nowrap;
			word-wrap: break-word;
			margin-top: revert;
			text-align: left;
			word-spacing: 0.1vw;
			margin-left: 1.5%;
			overflow: hidden;
			text-overflow: ellipsis;

	    }

	    .left_column_messages_list_user {

			color: white;
			position: absolute;
			font-family: GomGom;
			font-size: 1.5vw;
			left: 20%;
			top: -2%;

	    }

	    #no_friends_found_list_messages {

	    	color: white;
	    	font-family: Pixelony;
	    	font-size: 1.45vw;
	    	text-align: center;
	    	margin: auto;
	    	margin-top: 5%;
	    	cursor: default;

	    }

	    .notifications_from_user_counter {

			position: absolute;
			top: 0.1vw;
			left: 3.1vw;
			width: 1.65vw;
			height: 1.65vw;
			border-radius: 50%;
			background-color: #777EB8;
			color: white;
			text-align: center;
			line-height: 1.7vw;
			font-size: 1vw;
			font-family: GomGom;

	    }

	    .is_typing {

			color: white;
			font-family: GomGom;
			font-size: 0.85vw;
			position: absolute;
			top: 71%;
			left: 19.5%;
			font-style: italic;

	    }

	    .delete_chat_bin_image {

	    	width: 2.25vw;
	    	height: 2.25vw;
	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	margin: auto;
	    	left: 33%;
	    	filter: grayscale(100%);

	    }

	    .delete_chat_bin_image:hover {

	    	filter: grayscale(0%);
	    	cursor: pointer;

	    }

	    #confirm_delete_message_chat_modal_container {

	    	display: none;
			position: fixed;
			z-index: 1;
			padding-top: 11.25%;
			left: 0;
			top: 2.5%;
			width: 100%;
			height: 100%;
			overflow: auto;

	    }

	    #confirm_delete_message_chat_modal_content {

			background-color: #1d1f20;
			margin: auto;
			border: 2.5px solid red;
			border-radius: 1vw;
			width: 30%;
			height: 20vw;
			position: relative;

	    }

	    .close_confirm_delete_message_chat_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			top: -4%;
			right: 2%;
			height: 0%;

	    }

	    .close_confirm_delete_message_chat_modal:hover, .close_confirm_delete_message_chat_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #confirm_delete_message_inner_modal_title {

			color: white;
			float: left;
			font-size: 2.05vw;
			position: absolute;
			top: 17%;
			font-family: GomGom;
			cursor: default;
			text-align: center;

	    }

	    #yes_no_confirm_delete_message_form_div {

			width: 100%;
			height: 7vw;
			position: absolute;
			bottom: 0;

	    }

	    .yes_confirm_delete_message_button {

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

	    .yes_confirm_delete_message_button:active {

	    	background-color: white;

	    }

	    .no_confirm_delete_message_button {

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

	    .no_confirm_delete_message_button:active {

	    	background-color: white;

	    }

	    #search_friends_messages_div {

	    	width: 100%;
	    	height: 12.5%;
	    	background-color: transparent;
	    	border-bottom: 2.5px solid #777EB8;
	    	position: relative;

	    }

	    #left_column_messages_list_div_bottom {

			width: 100%;
			height: 90%;
			background-color: transparent;
			position: relative;
			overflow: auto;
			margin-top: 1%;

	    }

	    #search_friends_messages_div {

	    	width: 100%;
	    	height: 12.5%;
	    	background-color: transparent;
	    	border-bottom: 2.5px solid #777EB8;
	    	position: relative;

	    }

	    #left_column_messages_list_div_bottom {

			width: 100%;
			height: 90%;
			background-color: transparent;
			position: relative;
			overflow: auto;
			margin-top: 1%;

	    }

	    #search_friends_message_list_top {

	    	position: absolute;
	    	top: 0;
	    	bottom: 0;
	    	left: 0;
	    	right: 0;
	    	margin: auto;
	    	width: 100%;
	    	height: 100%;
	    	font-size: 1.75vw;
	    	color: grey;
	    	border: none;
	    	background-color: #1d1f20;
	    	outline: none;
	    	text-align: center;
	    	font-weight: bold;

	    }

	    #search_friends_message_list_top:focus {

	    	background-color: white;

	    }

	    #search_friends_messages_list_div {

	    	width: 100%;
	    	height: 72%;
	    	background-color: #1d1f20;
	    	border-radius: 1vw;
	    	position: absolute;
	    	z-index: 1;
	    	display: none;

	    }

	    #find_friends_search_results_existing_conversations {

	    	color: white;
	    	font-family: Pixelony;
	    	font-size: 1.75vw;
	    	text-align: center;
	    	margin-top: 3%;

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
        	height: 50%;
        	top: 0;
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

	    .user_profile_image_chat_top_div {

	    	width: 4.2vw;
			height: 4.2vw;
			border-radius: 100%;
			position: absolute;
			top: 0;
			bottom: 0;
			margin: auto;
			left: 1%;

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

        .left_column_messages_list_user_last_message_div {

			position: absolute;
			width: 77%;
			height: 42.5%;
			top: 37.5%;
			left: 20%;
			display: flex;

        }

        .left_column_messages_list_user_last_message_content {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 110%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 100%;
			padding-left: 0.125vw;
			margin-left: -1%;

        }

        .left_column_messages_list_user_last_message_date_and_time {

			font-family: GomGom;
			font-size: 1.1vw;
			color: gray;
			font-style: italic;
			width: 85%;
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
			height: 100%;
			text-align: center;
			margin-right: -5%;

        }

        .message_seen {

			color: gray;
			font-family: GomGom;
			font-size: 1.5vw;
			float: right;
			margin-right: 2.5%;
			font-style: italic;
			margin: 0;
			margin-right: 2.6%;
			cursor: default;

        }

        #no_recent_messages {

			color: white;
			font-family: Pixelony;
			font-size: 1.75vw;
			text-align: center;
			margin-top: 30%;

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

		.unseen_messages_counter_scrolled_up_div {

			position: absolute;
			z-index: 100;
			width: 4vw;
			height: 4vw;
			background-color: #777EB8;
			margin-top: 34%;
			margin-left: 2%;
			border-radius: 0.75vw;
			top: 0;

		}

		.unseen_messages_counter_scrolled_up_counter {

			color: white;
			text-align: center;
			font-family: GomGom;
			font-size: 1.75vw;

		}

		.unseen_messages_counter_scrolled_up_arrow_image {

			width: 1.5vw;
			position: absolute;
			top: 60%;
			left: 0;
			right: 0;
			margin: auto;
			filter: invert(1);

		}

		.unseen_messages_counter_scrolled_up_div:hover {

			cursor: pointer;

		}

		.send_chat_message_image {

			opacity: 0;
			position: absolute;
			z-index: -1;
			top: 0;
			left: 0;
			width: 0;
			height: 0;

		}

		#send_chat_message_inner_div {

			text-align: right;
			width: 13%;
			height: 100%;

		}

		#send_chat_message_image_span_image {

			width: 2.5vw;
			filter: invert(1);
			opacity: 0.5;

		}

		.send_chat_message_image_label:active {

			background-color: white;

		}

		.send_chat_message_image_label {

			text-align: center;
			background-color: #1d1f20;
			border-radius: 1vw;
			outline: none;
			height: 2.75vw;
			width: 6vw;
			border: 2.5px solid #777EB8;
			font-family: Arial;
			font-weight: bold;
			color: grey;
			cursor: default;
			margin: 0;
			margin-top: 6%;
			margin-right: 6%;
			position: relative;

		}

		#send_chat_message_image_span {

			display: inline-block;
			vertical-align: middle;
			text-align: center;

		}

		.send_chat_message_image_label:active > #send_chat_message_image_span {

	    	filter: invert(1);
			opacity: 1;

	    }

	    .send_chat_message_image_form {

	    	display: contents;
	    	text-align: right;

	    }

	    #send_chat_message_image_preview_div {

			display: none;
			position: absolute;
			width: 30vw;
			height: 22vw;
			border-top: 2.5px solid #777EB8;
			border-right: 2.5px solid #777EB8;
			border-top-right-radius: 1vw;
			background-color: #1d1f20;
			padding: 1%;
			margin-top: -14.5%;
			z-index: 1000;

	    }

	    #send_chat_message_image_preview_display {

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

	    .close_zoomed_in_send_chat_message_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 2vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -5.75%;

	    }

	    .close_zoomed_in_send_chat_message_image_cover_div_modal:hover, .close_zoomed_in_send_chat_message_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    .uploaded_image_too_large {

	    	border: 2.5px solid red;

	    }

	    #uploaded_image_too_large_error {

	    	display: none;
			position: absolute;
			color: red;
			font-family: Pixelony;
			font-size: 1.35vw;
			margin-left: 32.5%;
			z-index: 1000;
			margin-left: 32.5%;
			margin-top: -14%;
			cursor: default;

	    }

	    .message_image {

			position: relative;
			width: 45%;
			border-radius: 0.5vw;
			display: block;
			margin-left: 17%;
			margin-top: 8%;

	    }

	    .message_image:hover {

	    	cursor: pointer;
	    	opacity: 0.6;

	    }

	    .message_image_from_user {

			position: relative;
			width: 45%;
			border-radius: 0.5vw;
			display: block;
			margin-left: 17%;
			margin-top: 8%;

	    }

	    .message_image_from_user:hover {

	    	cursor: pointer;
	    	opacity: 0.6;

	    }

	    .zoomed_in_message_image_cover_div {

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

	    .close_zoomed_in_message_image_cover_div_modal {

			color: #aaaaaa;
			float: right;
			font-size: 3.5vw;
			font-weight: bold;
			position: absolute;
			right: 1%;
			height: 0%;
			margin-top: -1%;

	    }

	    .close_zoomed_in_message_image_cover_div_modal:hover, .close_zoomed_in_message_image_cover_div_modal:focus {

	    	cursor: pointer;
	    	text-decoration: none;
	    	color: gray;

	    }

	    #feed_notifications_each_page_main_div {

			position: absolute;
        	width: 24vw;
        	height: 50%;
        	top: 50%;
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

	<ul id="social_media_buttons">
        
    	<li style="display: inline-block;"><a href="https://www.facebook.com/sickgamezz"><img class="social_buttons_images" src="Images/facebook_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://www.instagram.com/sick.gamez"><img class="social_buttons_images" src="Images/instagram_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://twitter.com/sick_gamez"><img class="social_buttons_images" src="Images/twitter_button.png"></a></li>

  	</ul>

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

		<div id="friend_requests_notifications_each_page_main_div"></div>

		<div id="feed_notifications_each_page_main_div"></div>

		<script type="text/javascript">
					
			$(document).ready(function() {

				$("#messages_error").remove();
				$("#messages_not_accessible").remove();

			})

		</script>

		<h1 id="messages_label">Messages</h1>

		<div id="messages_container">
			
			<div id="left_column_messages_div">
				
				<div id="start_new_conversation_div">
					
					<img src="Images/plus.png" id="start_new_conversation_plus" />

					<div id="start_new_conversation_label_div">

						<p id="start_new_conversation_label">Start a new conversation</p>

					</div>

				</div>

				<div id="search_friends_messages_div">
					
					<input type="text" name="search_friends_message_list_top" id="search_friends_message_list_top" placeholder="Search chats" />

				</div>

				<div id="search_friends_messages_list_div"></div>

				<div id="left_column_messages_list_div"></div>

			</div>

			<div id="right_column_messages_div"></div>

		</div>

		<div id="confirm_delete_message_chat_modal_container">
				
			<div id="confirm_delete_message_chat_modal_content">
				
				<span class="close_confirm_delete_message_chat_modal">&times;</span>

				<p id="confirm_delete_message_inner_modal_title">Are you sure you would like to delete this message?</p>

				<div id="yes_no_confirm_delete_message_form_div">
					
					<button class="yes_confirm_delete_message_button" id="yes_confirm_delete_message_button" style="cursor: default;">Yes</button>

					<button class="no_confirm_delete_message_button" id="no_confirm_delete_message_button" style="cursor: default;">No</button>

				</div>

			</div>

		</div>

		<div id="start_new_conversation_modal_container">
				
			<div id="start_new_conversation_modal_content">
				
				<span class="close_start_new_conversation_modal">&times;</span>

				<p id="inner_modal_title">Who would you like to start a conversation with?</p>

				<div id="search_new_conversation_with_friend_input_div">
					
					<input type="text" name="search_friends_new_conversation" id="search_friends_new_conversation" placeholder="I would like to start a conversation with" />

				</div>

				<div id="start_new_conversation_search_friends_results"></div>

			</div>

		</div>

		<div id="back_arrow_div">

			<?php

				$username = $_COOKIE['username'];

			?>
			
			<a href="profile?username=<?php echo $username; ?>" id="back_arrow_link">
			
				<img src="Images/back_arrow.png" id="back_arrow_image" />

			</a>

		</div>

	<?php endif ?>

	<?php if ($login == 0) : ?>

		<h1 id="messages_error"><?php $profileAndUserError = "Error"; echo $profileAndUserError; ?></h1>

		<p id="messages_not_accessible"><?php $messagesNotAccessible = "Messages can't be accessed if not logged in!"; echo $messagesNotAccessible; ?></p>

	<?php endif ?>

</body>

<?php if ($login == 1) : ?>

	<script type="text/javascript">

		var unseenMessagesScrolledUpActive = false;
		var zoomedInMessageImage = false;
		
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

		$(document).ready(function() {

			var updateChatHistoryDataInterval = setInterval(function() {

				updateChatHistoryData();

			}, 1500);

			setInterval(function() {

				if (zoomedInMessageImage) {

					clearInterval(updateChatHistoryDataInterval);

				} else {

					updateChatHistoryData();

				}

			}, 3000);

			$(document).on("click", ".message_image", function() {

				clearInterval(updateChatHistoryDataInterval);

				zoomedInMessageImage = true;

				$(window).scrollTop();
				$(window).scrollLeft();

				setTimeout(function() {

					$(window).scrollTop();
					$(window).scrollLeft();

				}, 500);

				var messageImage = $(this).attr("id");
				var messageImageId = $(this).data("messageimageid");

				$("#message_image_" + messageImageId).css("position", "fixed");
				$("#message_image_" + messageImageId).css("max-width", "90%");
				$("#message_image_" + messageImageId).css("max-height", "90%");
				$("#message_image_" + messageImageId).css("height", "auto");
				$("#message_image_" + messageImageId).css("width", "initial");
				$("#message_image_" + messageImageId).css("z-index", "10");
				$("#message_image_" + messageImageId).css("left", "0");
				$("#message_image_" + messageImageId).css("right", "0");
				$("#message_image_" + messageImageId).css("top", "0");
				$("#message_image_" + messageImageId).css("bottom", "0");
				$("#message_image_" + messageImageId).css("margin", "auto");
				$("#message_image_" + messageImageId).css("transition", "0.15s");
				$("#message_image_" + messageImageId).css("border-radius", "0.75vw");
				$("#message_image_" + messageImageId).css("pointer-events", "none");
				$("body").css("overflow", "hidden");

				$("body").append("<div class='zoomed_in_message_image_cover_div' id='zoomed_in_message_image_cover_div_" + messageImageId + "' data-zoomedmessageimage='" + messageImageId + "'><span class='close_zoomed_in_message_image_cover_div_modal' id='close_zoomed_in_message_image_cover_div_modal_" + messageImageId + "' data-messageimageclosemodalspan='" + messageImageId + "'>&times;</span></div>");
				$(".zoomed_in_message_image_cover_div").css("display", "block");
				$("#message_image_" + messageImageId).addClass("zoomed_in_message_image");

			});

			$(document).on("click", ".close_zoomed_in_message_image_cover_div_modal", function() {

				zoomedInMessageImage = false;

				updateChatHistoryData();

				var closeMessageImageModalSpan = $(this).data("messageimageclosemodalspan");

				$(".zoomed_in_message_image_cover_div").remove();
				$("#message_image_" + closeMessageImageModalSpan).removeAttr("style");
				$("#message_image_" + closeMessageImageModalSpan).removeClass("zoomed_in_message_image");
				$("body").css("overflow", "auto");

			});

			$("html").bind("keydown", function(e) {

				if (e.keyCode === 27) {

					if ($(".zoomed_in_message_image_cover_div").is(":visible")) {

						zoomedInMessageImage = false;

						updateChatHistoryData();

						var zoomedMessageImageId = $(".zoomed_in_message_image_cover_div").data("zoomedmessageimage");

						$(".zoomed_in_message_image_cover_div").remove();
						$("#message_image_" + zoomedMessageImageId).removeAttr("style");
						$("#message_image_" + zoomedMessageImageId).removeClass("zoomed_in_message_image");
						$("body").css("overflow", "auto");

					}

				}

			});

			$(document).on("click", ".message_image_from_user", function() {

				clearInterval(updateChatHistoryDataInterval);

				zoomedInMessageImage = true;

				$(window).scrollTop();
				$(window).scrollLeft();

				setTimeout(function() {

					$(window).scrollTop();
					$(window).scrollLeft();

				}, 500);

				var messageImage = $(this).attr("id");
				var messageImageId = $(this).data("messageimageid");

				$("#message_image_from_user_" + messageImageId).css("position", "fixed");
				$("#message_image_from_user_" + messageImageId).css("max-width", "90%");
				$("#message_image_from_user_" + messageImageId).css("max-height", "90%");
				$("#message_image_from_user_" + messageImageId).css("height", "auto");
				$("#message_image_from_user_" + messageImageId).css("width", "initial");
				$("#message_image_from_user_" + messageImageId).css("z-index", "10");
				$("#message_image_from_user_" + messageImageId).css("left", "0");
				$("#message_image_from_user_" + messageImageId).css("right", "0");
				$("#message_image_from_user_" + messageImageId).css("top", "0");
				$("#message_image_from_user_" + messageImageId).css("bottom", "0");
				$("#message_image_from_user_" + messageImageId).css("margin", "auto");
				$("#message_image_from_user_" + messageImageId).css("transition", "0.15s");
				$("#message_image_from_user_" + messageImageId).css("border-radius", "0.75vw");
				$("#message_image_from_user_" + messageImageId).css("pointer-events", "none");
				$("body").css("overflow", "hidden");

				$("body").append("<div class='zoomed_in_message_image_cover_div' id='zoomed_in_message_image_cover_div_" + messageImageId + "' data-zoomedmessageimage='" + messageImageId + "'><span class='close_zoomed_in_message_image_cover_div_modal' id='close_zoomed_in_message_image_cover_div_modal_" + messageImageId + "' data-messageimageclosemodalspan='" + messageImageId + "'>&times;</span></div>");
				$(".zoomed_in_message_image_cover_div").css("display", "block");
				$("#message_image_from_user_" + messageImageId).addClass("zoomed_in_message_image");

			});

			$(document).on("click", ".close_zoomed_in_message_image_cover_div_modal", function() {

				zoomedInMessageImage = false;

				updateChatHistoryData();

				var closeMessageImageModalSpan = $(this).data("messageimageclosemodalspan");

				$(".zoomed_in_message_image_cover_div").remove();
				$("#message_image_from_user_" + closeMessageImageModalSpan).removeAttr("style");
				$("#message_image_from_user_" + closeMessageImageModalSpan).removeClass("zoomed_in_message_image");
				$("body").css("overflow", "auto");

			});

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
				updateChatHistoryData();
				updateAllFriendsLeftColumnStartConversation();
				updateAllNewFriendRequests();
				updateFriendsOnlineActivityStatus();
				updateAllNewFeedNotifications();

			});

			fetchUserOnline();
			fetchUserOffline();
			updateAllFriendsLeftColumnStartConversation();
			updateAllNewFriendRequests();
			updateAllNewFeedNotifications();

			setInterval(function() {

				updateLastActivity();
				fetchUserOnline();
				fetchUserOffline();
				updateAllFriendsLeftColumnStartConversation();
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

				});

			}

			function fetchUserOffline() {

				$.ajax({

					url: "/get_user_data_offline.php",
					method: "GET",
					success: function(data) {

						$("#offline_friends_div").html(data);

					}

				});

			}

			function updateLastActivity() {

				$.ajax({

					url: "/update_last_activity.php",
					success: function() {



					}

				});

			}

			$("#search_friends_message_list_top").keyup(function() {

				var searchedFriendMessages = $(this).val();

				if (searchedFriendMessages != '') {

					document.getElementById("search_friends_messages_list_div").style.display = "block";

					$("#search_friends_messages_list_div").html("");

					$.ajax({

						url: "get_friend_user_data_search_friends_messages.php",
						method: "GET",
						data: {

							search: searchedFriendMessages

						},
						success: function(data) {

							$("#search_friends_messages_list_div").html(data);

						}

					});

				} else {

					document.getElementById("search_friends_messages_list_div").style.display = "none";

				}

			});

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

			$(document).ready(function() {

				$("#search_friends_div").hide();

			});

			var confirmDeleteMessageImage = document.getElementById("delete_chat_bin_image");
			var confirmDeleteMessageModal = document.getElementById("confirm_delete_message_chat_modal_container");
			var confirmDeleteMessageModalSpan = document.getElementsByClassName("close_confirm_delete_message_chat_modal")[0];

			confirmDeleteMessageModalSpan.onclick = function() {

				confirmDeleteMessageModal.style.display = "none";

			}

			var startNewConversationDiv = document.getElementById("start_new_conversation_div");
			var startNewConversationModal = document.getElementById("start_new_conversation_modal_container");
			var startNewConversationModalSpan = document.getElementsByClassName("close_start_new_conversation_modal")[0];

			startNewConversationDiv.onclick = function() {

				startNewConversationModal.style.display = "block";

			}

			startNewConversationModalSpan.onclick = function() {

				startNewConversationModal.style.display = "none";

			}

			window.onclick = function(e) {

				if (e.target == startNewConversationModal || e.target == confirmDeleteMessageModal) {

					startNewConversationModal.style.display = "none";
					confirmDeleteMessageModal.style.display = "none";

				}

			}

			$("#search_friends_new_conversation").keyup(function() {

				$("#start_new_conversation_search_friends_results").show();

				var messagesSearchFriendsStartNewConversation = $(this).val();

				if (messagesSearchFriendsStartNewConversation != '') {

					$("#start_new_conversation_search_friends_results").html("");

					$.ajax({

						url: "get_user_data_search_friends_messages.php",
						method: "GET",
						data: {

							search: messagesSearchFriendsStartNewConversation

						},
						dataType: "text",
						success: function(data) {

							$("#start_new_conversation_search_friends_results").html(data);

						}

					});

				} else {

					$("#start_new_conversation_search_friends_results").html("");

				}

			});

			function createChatContainer(toUserId, toUserUsername) {

				var chatContainerContent = '<div class="user_username_chat_top_div" id="user_username_chat_top_div_' + toUserId + '" data-touserid="' + toUserId + '">';
				chatContainerContent += '</div>';
				chatContainerContent += '<div id="conversation_chat_main_div_' + toUserId + '" class="conversation_chat_main_div conversation_chat" data-touserid="' + toUserId + '">';
				chatContainerContent += fetchUserChatHistoryData(toUserId);
				chatContainerContent += '</div>';
				chatContainerContent += '<div id="conversation_chat_text_box_send_button_div_' + toUserId + '" class="conversation_chat_text_box_send_button_div">';
				chatContainerContent += '<div id="send_chat_message_image_preview_div"></div>';
				chatContainerContent += '<p id="uploaded_image_too_large_error">Image can\'t exceed 5MB!</p>';
				chatContainerContent += '<form action="" method="post" enctype="multipart/form-data" class="send_chat_message_image_form" id="send_chat_message_image_form_' + toUserId + '" data-touserid="' + toUserId + '">';
				chatContainerContent += '<textarea class="message_content_textarea" name="message_content_textarea_' + toUserId + '" id="message_content_textarea_' + toUserId + '" maxlength="300" placeholder="Type your message here" data-touserid="' + toUserId + '"></textarea>';
				chatContainerContent += '<div id="send_chat_message_inner_div">';
				chatContainerContent += '<label for="send_chat_message_image" class="send_chat_message_image_label">';
				chatContainerContent += '<span id="send_chat_message_image_span">';
				chatContainerContent += '<img src="Images/image_placeholder.png" id="send_chat_message_image_span_image" />';
				chatContainerContent += '</span>';
				chatContainerContent += '</label>';
				chatContainerContent += '<input type="hidden" name="user_input_hidden_id_value_send_chat_message" id="user_input_hidden_id_value_send_chat_message_' + toUserId + '" value="' + toUserId + '" />';
				chatContainerContent += '<input type="file" name="send_chat_message_image" class="send_chat_message_image" id="send_chat_message_image" accept=".png, .jpg, .jpeg" />';
				chatContainerContent += '<input type="submit" style="cursor: default;" name="send_chat_message" class="send_chat_message" id="send_chat_message_' + toUserId + '" value="Send" data-touserid="' + toUserId + '" />';
				chatContainerContent += '</form>';
				chatContainerContent += '</div>';
				chatContainerContent += '</div>';
				$("#right_column_messages_div").html(chatContainerContent);

			}

			var openedChat;
			var tmpPath = "";

			$(document).on("click", ".left_column_messages_list_div_for_each", function() {

				$("#search_friends_message_list_top").val("");
				$("#search_friends_messages_list_div").css("display", "none");

				openedChat = false;

				var toUserId = $(this).data("touserid");
				var toUserUsername = $(this).data("touserusername");
				createChatContainer(toUserId, toUserUsername);

				$("#send_chat_message_image").change(function(e) {

					var file = $("#send_chat_message_image")[0].files[0].name;

					tmpPath = URL.createObjectURL(e.target.files[0]);

					$("#send_chat_message_image_preview_display").attr("src", tmpPath);

					if (!($("#send_chat_message_image_preview_div").is(":visible"))) {

						$("#send_chat_message_image_preview_div").css("display", "block");

						$("#send_chat_message_image_preview_div").append('<span class="close_zoomed_in_send_chat_message_image_cover_div_modal" id="close_zoomed_in_send_chat_message_image_cover_div_modal">&times;</span><img src="' + tmpPath + '" id="send_chat_message_image_preview_display" />');

					}

				});

				var container = document.querySelector(".conversation_chat_main_div");
				container.maxScrollTop = container.scrollHeight - container.offsetHeight;
				container.scrollTop = container.scrollHeight;

				$(".conversation_chat_main_div").animate({

					scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

				});

				var scrolled;

				var chatMessageScrollInterval = setInterval(function() {

					openedChat = true;

					var container = document.querySelector(".conversation_chat_main_div");
					container.maxScrollTop = container.scrollHeight - container.offsetHeight;

					if (container.maxScrollTop - container.scrollTop <= container.offsetHeight / 3) {

						$.ajax({

							url: "update_unseen_messages_scrolled_up.php",
							method: "GET",
							data: {

								toUserId: toUserId

							},
							success: function(data) {



							}

						});

						scrolled = false;

						unseenMessagesScrolledUpActive = false;

						if (!scrolled) {

							container.scrollTop = container.scrollHeight;
							$(".conversation_chat_main_div").animate({

								scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

							});

						}

					} else {

						scrolled = true;

						unseenMessagesScrolledUpActive = true;

						$(document).on("click", ".unseen_messages_counter_scrolled_up_div", function() {

							$.ajax({

								url: "update_unseen_messages_scrolled_up.php",
								method: "GET",
								data: {

									toUserId: toUserId

								},
								success: function(data) {


									
								}

							});

							$.ajax({

								url: "get_unseen_messages_scrolled_up.php",
								method: "GET",
								data: {

									toUserId: toUserId

								},
								success: function(data) {

									$("#conversation_chat_main_div_" + toUserId).append(data);

								}

							});

							$(".conversation_chat_main_div").animate({

								scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

							});

							var visibleChatMessageContainer = $(".conversation_chat_main_div").is(":visible");

				        	if (visibleChatMessageContainer) {

				        		if (openedChat) {

				        			clearInterval(chatMessageScrollInterval);

				        		}

				        	}

						});

					}

					var visibleChatMessageContainer = $(".conversation_chat_main_div").is(":visible");

		        	if (visibleChatMessageContainer) {

		        		if (openedChat) {

		        			clearInterval(chatMessageScrollInterval);

		        		}

		        	}

				}, 3000);

			});

			setInterval(function() {

				var toUserId = $(".conversation_chat_main_div").data("touserid");

				var visibleChatMessageContainer = $(".conversation_chat_main_div").is(":visible");

	        	if (visibleChatMessageContainer) {

	        		var container = document.querySelector(".conversation_chat_main_div");
					container.maxScrollTop = container.scrollHeight - container.offsetHeight;

					if (container.maxScrollTop - container.scrollTop <= container.offsetHeight / 3) {

						$.ajax({

							url: "update_unseen_messages_scrolled_up.php",
							method: "GET",
							data: {

								toUserId: toUserId

							},
							success: function(data) {


								
							}

						});

						scrolled = false;

						unseenMessagesScrolledUpActive = false;

						if (!scrolled) {

							container.scrollTop = container.scrollHeight;
							$(".conversation_chat_main_div").animate({

								scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

							});

						}

					} else {

						scrolled = true;

						unseenMessagesScrolledUpActive = true;

						$(document).on("click", ".unseen_messages_counter_scrolled_up_div", function() {

							$.ajax({

								url: "update_unseen_messages_scrolled_up.php",
								method: "GET",
								data: {

									toUserId: toUserId

								},
								success: function(data) {


									
								}

							});

							$.ajax({

								url: "get_unseen_messages_scrolled_up.php",
								method: "GET",
								data: {

									toUserId: toUserId

								},
								success: function(data) {

									$("#conversation_chat_main_div_" + toUserId).append(data);

								}

							});

							$(".conversation_chat_main_div").animate({

								scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

							});

							var visibleChatMessageContainer = $(".conversation_chat_main_div").is(":visible");

				        	if (visibleChatMessageContainer) {

				        		if (openedChat) {

				        			clearInterval(chatMessageScrollInterval);

				        		}

				        	}

						});

					}

	        	}

			}, 3000);

			$(document).on("click", "#start_new_conversation_submit", function() {

				var toUserId = $(this).data("touserid");
				var toUserUsername = $(this).data("touserusername");
				createChatContainer(toUserId, toUserUsername);
				$("#start_new_conversation_modal_container").hide();
				$(".conversation_chat_main_div").animate({

					scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

				});

				$("#search_friends_new_conversation").val("");
				$("#start_new_conversation_search_friends_results").hide();

			});

			$(document).on("submit", ".send_chat_message_image_form", function(e) {

				e.preventDefault();
				e.stopImmediatePropagation();

				var toUserId = $(this).data("touserid");
				var chatMessageContent = $("#message_content_textarea_" + toUserId).val();
				var chatMessageContentTrimmed = chatMessageContent.trim();
				var chatMessageContentTrimmedLength = chatMessageContentTrimmed.length;

				var uploadedChatImageFileLength = document.getElementById("send_chat_message_image").files.length;
				var uploadedChatImageFile = $("#send_chat_message_image")[0].files;

				if (uploadedChatImageFileLength > 0) {

					var container = document.querySelector(".conversation_chat_main_div");
					container.maxScrollTop = container.scrollHeight - container.offsetHeight;

					if (container.maxScrollTop - container.scrollTop <= container.offsetHeight) {

						container.scrollTop = container.scrollHeight;
						$(".conversation_chat_main_div").animate({

							scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

						});

					}

					var messageTextArea = document.getElementById("message_content_textarea_" + toUserId);
					messageTextArea.style.border = "2.5px solid #777EB8";
					messageTextArea.placeholder = "Type your message here";

					var formData = new FormData(this);

					$.ajax({

						url: "insert_chat_message_content_into_db.php",
						type: "POST",
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						async: false,
						success: function(data) {

							if (data === "1") {

								$(".send_chat_message_image_label").addClass("uploaded_image_too_large");
								$("#uploaded_image_too_large_error").css("display", "block");
								$("#send_chat_message_image_preview_div").css("border-top", "2.5px solid red");
								$("#send_chat_message_image_preview_div").css("border-right", "2.5px solid red");

							} else {

								$("#uploaded_image_too_large_error").css("display", "none");

								$(".send_chat_message_image_label").removeClass("uploaded_image_too_large");

								$("#send_chat_message_image_preview_div").css("border-top", "2.5px solid #777EB8");
								$("#send_chat_message_image_preview_div").css("border-right", "2.5px solid #777EB8");

								$("#message_content_textarea_" + toUserId).val("");
								fetchAllFriendsLeftColumnStartConversation();

								$("#send_chat_message_image_preview_div").css("display", "none");

								$("#message_content_textarea_" + toUserId).blur();

								document.getElementById("send_chat_message_image").value = document.getElementById("send_chat_message_image").defaultValue;

							}

						}

					});

				} else {

					var container = document.querySelector(".conversation_chat_main_div");
					container.maxScrollTop = container.scrollHeight - container.offsetHeight;

					if (container.maxScrollTop - container.scrollTop <= container.offsetHeight) {

						container.scrollTop = container.scrollHeight;
						$(".conversation_chat_main_div").animate({

							scrollTop: $(".conversation_chat_main_div")[0].scrollHeight * $(".conversation_chat_main_div")[0].scrollHeight

						});

					}

					var messageTextArea = document.getElementById("message_content_textarea_" + toUserId);
					messageTextArea.style.border = "2.5px solid #777EB8";
					messageTextArea.placeholder = "Type your message here";

					if (chatMessageContentTrimmed === "" || chatMessageContentTrimmedLength == 0) {

						var messageTextArea = document.getElementById("message_content_textarea_" + toUserId);
						messageTextArea.style.border = "2.5px solid red";
						messageTextArea.placeholder = "Oops, you can't send a message with no content!";
						messageTextArea.value = "";

					} else {

						var formData = new FormData(this);

						$.ajax({

							url: "insert_chat_message_content_into_db.php",
							type: "POST",
							data: formData,
							cache: false,
							contentType: false,
							processData: false,
							async: false,
							success: function(data) {

								$("#message_content_textarea_" + toUserId).val("");
								fetchAllFriendsLeftColumnStartConversation();

								$("#message_content_textarea_" + toUserId).blur();

								document.getElementById("send_chat_message_image").value = document.getElementById("send_chat_message_image").defaultValue;

							}

						});

					}

				}

			});

			function fetchUserChatHistoryData(toUserId) {

				$.ajax({

					url: "fetch_user_chat_history_data.php",
					method: "GET",
					data: {

						toUserId: toUserId

					},
					success: function(data) {

						$("#conversation_chat_main_div_" + toUserId).html(data);

					}

				});

			}

			function fetchUserChatTopDivUsername(toUserId) {

				$.ajax({

					url: "fetch_user_top_chat_div_username.php",
					method: "GET",
					data: {

						toUserId: toUserId

					},
					success: function(data) {

						$("#user_username_chat_top_div_" + toUserId).html(data);

					}

				});

			}

			function updateChatHistoryData() {

				$(".conversation_chat_main_div").each(function() {

					var toUserId = $(this).data("touserid");
					fetchUserChatHistoryData(toUserId);
					fetchUserChatTopDivUsername(toUserId);

					if (unseenMessagesScrolledUpActive) {

						$.ajax({

							url: "get_unseen_messages_scrolled_up.php",
							method: "GET",
							data: {

								toUserId: toUserId

							},
							success: function(data) {

								$("#conversation_chat_main_div_" + toUserId).append(data);

							}

						});

					}

				});

			}

			function fetchAllFriendsLeftColumnStartConversation() {

				$.ajax({

					url: "fetch_all_friends_left_column_start_conversation.php",
					method: "GET",
					success: function(data) {

						$("#left_column_messages_list_div").html(data);

					}

				});

			}

			function updateAllFriendsLeftColumnStartConversation() {

				$("#left_column_messages_list_div").each(function() {

					fetchAllFriendsLeftColumnStartConversation();

				});

			}

			$(window).on("beforeunload", function(e) {

				var isTyping = "no";

				$.ajax({

					url: "update_is_typing_status.php",
					method: "GET",
					data: {

						isTyping: isTyping

					},
					success: function(data) {



					}

				});

			});

			setInterval(function() {

				if ($(".message_content_textarea").is(":focus")) {

					var isTyping = "yes";

					$.ajax({

						url: "update_is_typing_status.php",
						method: "GET",
						data: {

							isTyping: isTyping

						},
						success: function(data) {



						}

					});

				} else {

					var isTyping = "no";

					$.ajax({

						url: "update_is_typing_status.php",
						method: "GET",
						data: {

							isTyping: isTyping

						},
						success: function(data) {



						}

					});

				}

			}, 3000);

			var messageContentTextareaToUserId = $(".message_content_textarea").data("touserid");

			$(document).on("focus", ".message_content_textarea", function() {

				var messageContentTextareaToUserId = $(".message_content_textarea").data("touserid");

				$("#message_content_textarea_" + messageContentTextareaToUserId).bind("keyup", function(e) {

					if (e.keyCode == 13) {

						$("#send_chat_message_" + messageContentTextareaToUserId).trigger("click");

					}

				});

				var isTyping = "yes";

				$.ajax({

					url: "update_is_typing_status.php",
					method: "GET",
					data: {

						isTyping: isTyping

					},
					success: function() {



					}

				});

			});

			$(document).on("blur", ".message_content_textarea", function() {

				var isTyping = "no";

				$.ajax({

					url: "update_is_typing_status.php",
					method: "GET",
					data: {

						isTyping: isTyping

					},
					success: function() {



					}

				});

			});

			$(document).on("click", "#back_arrow_link", function() {

				var isTyping = "no";

				$.ajax({

					url: "update_is_typing_status.php",
					method: "GET",
					data: {

						isTyping: isTyping

					},
					success: function() {



					}

				})

			});

			$(document).on("click", ".delete_chat_bin_image", function() {

				var chatMessageId = $(this).attr("id");

				confirmDeleteMessageModal.style.display = "block";

				var noButton = document.querySelector(".no_confirm_delete_message_button");

				noButton.onclick = function() {

					$("#confirm_delete_message_chat_modal_container").hide();

				}

				$(document).on("click", ".yes_confirm_delete_message_button", function() {

					$.ajax({

						url: "delete_message.php",
						method: "GET",
						async: false,
						data: {

							chatMessageId: chatMessageId

						},
						success: function(data) {

							$("#confirm_delete_message_chat_modal_container").hide();
							fetchAllFriendsLeftColumnStartConversation();
							updateChatHistoryData();

						}

					});

				});

			});

		});

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
	        				var visibleUnseenMessageCounter = $(".notifications_from_user_counter").is(":visible");

				        	if (visibleMessageContainer || visibleUnseenMessageCounter) {

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
							        			var visibleUnseenMessageCounter = $(".notifications_from_user_counter").is(":visible");

									        	if (visibleMessageContainer || visibleUnseenMessageCounter) {

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
							        			var visibleUnseenMessageCounter = $(".notifications_from_user_counter").is(":visible");

									        	if (!visibleMessageContainer || !visibleUnseenMessageCounter) {

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

	$(document).on("click", ".close_zoomed_in_send_chat_message_image_cover_div_modal", function() {

		$("#uploaded_image_too_large_error").css("display", "none");

		$(".send_chat_message_image_label").removeClass("uploaded_image_too_large");

		$("#send_chat_message_image_preview_div").css("border-top", "2.5px solid #777EB8");
		$("#send_chat_message_image_preview_div").css("border-right", "2.5px solid #777EB8");

		$("#send_chat_message_image_preview_display").remove();

		$(".close_zoomed_in_send_chat_message_image_cover_div_modal").remove();

		$("#send_chat_message_image_preview_div").css("display", "none");

		document.getElementById("send_chat_message_image").value = document.getElementById("send_chat_message_image").defaultValue;

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