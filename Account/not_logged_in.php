<?php

	include("server.php");

	if ($login == 1) {

		header("location: profile?username=" . $_COOKIE["username"]);

	} else {

?>

<!DOCTYPE html>

<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

	<link rel="stylesheet" type="text/css" href="//wpcc.io/lib/1.0.2/cookieconsent.min.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="//wpcc.io/lib/1.0.2/cookieconsent.min.js"></script>

	<link rel="icon" type="image/jpg" href="favicon.jpg" />

  	<link rel="apple-touch-icon" type="image/jpg" href="favicon.jpg" />

  	<meta name="description" content="You must be logged in to view your account!" />

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

	    #menu_line_break {

	    	width: 85%;
	    	height: 0.05px;
	    	margin: auto;
	    	background-color: gray;

	    }

	    #not_logged_in_label {

	    	text-align: center;
	        font-size: 4vw;
	        font-family: Pixelony;
	        animation: fade_in 2s ease;
	        cursor: default;
	        color: white;
	        width: 75%;
	        margin: auto;
	        margin-top: 3.5%;

	    }

	    @keyframes fade_in {

	    	from {

	        	opacity: 0;

	      	}

	    	to {

	        	opacity: 1;

	      	}

	    }

	    #log_in_button {

	    	color: grey;
	    	cursor: default;
	    	width: 25vw;
	    	background-color: #1d1f20;
	    	margin-top: 5%;
	    	border-radius: 1vw;
	    	font-size: 2.2vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;

	    }

	    #log_in_button:active {

	    	background-color: white;

	    }

	    #log_in_div {

	    	display: flex;
	    	justify-content: center;
	    	align-items: center;

	    }

	    #or_label {

	    	color: white;
	    	margin-top: 5.7%;
	    	font-size: 3.2vw;
	    	font-family: Austere;
	    	margin-left: 2.5%;

	    }

	    #sign_up_button {

	    	color: grey;
	    	cursor: default;
	    	width: 25vw;
	    	background-color: #1d1f20;
	    	margin-top: 5%;
	    	border-radius: 1vw;
	    	font-size: 2.2vw;
	    	border: 2.5px solid #777EB8;
	    	font-family: Arial;
	    	font-weight: bold;
	    	margin-left: 2.5%;

	    }

	    #sign_up_button:active {

	    	background-color: white;

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

	</style>

</head>

<body>

<img id="menu" src="Images/sickgamezlogo.jpg" onmouseover="openNav()" />

<div id="sideNav" onmouseleave="closeNav()">
    
	<p id="sidenav_name"><a class="sidenav_name_link" href="/index">SickGamez</a></p>

		<ul id="menu_buttons_list">

			<li><a class="menu_buttons" href="not_logged_in" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">My Account</a></li>

			<li><a class="menu_buttons" href="sign_up" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Sign Up</a></li>

    		<li><a class="menu_buttons" href="log_in" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Log In</a></li>

    		<li><a class="menu_buttons" href="search_accounts" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Search</a></li>

    		<hr id="menu_line_break" />
        
			<div id="bottom_half_menu_div">
        		
            	<li><a class="menu_buttons" href="/index" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Home</a></li>
            
            	<li><a class="menu_buttons" href="/gamez" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Gamez</a></li>
            
            	<li><a class="menu_buttons" href="/add_game" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Add Game</a></li>

            	<li><a class="menu_buttons" href="/feed" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Feed</a></li>
            
            	<li><a class="menu_buttons" href="/creators" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Creators</a></li>
            
            	<li><a class="menu_buttons" href="/feedback" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">Feedback</a></li>
            
            	<li><a class="menu_buttons" href="/about" style="padding: 8px 8px 8px 32px; text-decoration: none; font-size: 27px; display: block; transition: 0.3s; margin-left: -15%;">About</a></li>
            
            </div>

		</ul>

		<ul id="social_media_buttons">
        
        	<li style="display: inline-block;"><a href="https://www.facebook.com/sickgamezz"><img class="social_buttons_images" src="Images/facebook_button.png"></a></li>

        	<li style="display: inline-block;"><a href="https://www.instagram.com/sick.gamez"><img class="social_buttons_images" src="Images/instagram_button.png"></a></li>

        	<li style="display: inline-block;"><a href="https://twitter.com/sick_gamez"><img class="social_buttons_images" src="Images/twitter_button.png"></a></li>

      	</ul>

</div>

	<ul id="social_media_buttons">
        
    	<li style="display: inline-block;"><a href="https://www.facebook.com/sickgamezz"><img class="social_buttons_images" src="Images/facebook_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://www.instagram.com/sick.gamez"><img class="social_buttons_images" src="Images/instagram_button.png"></a></li>

    	<li style="display: inline-block;"><a href="https://twitter.com/sick_gamez"><img class="social_buttons_images" src="Images/twitter_button.png"></a></li>

  	</ul>

	<h1 id="not_logged_in_label">Whoops, seems like you're not logged in to your account!</h1>

	<div id="log_in_div">
		
		<button onclick="window.location.href = 'log_in'" id="log_in_button">Log in!</button>

		<h2 id="or_label">OR</h2>

		<button onclick="window.location.href = 'sign_up'" id="sign_up_button">Sign up!</button>

	</div>

</body>

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

</script>

<?php } ?>

</html>