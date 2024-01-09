<?php

include("/home/yv4nbnligki0/public_html/Account/server.php");

$response = new stdClass();

$servername = "localhost:3306";
$username = "user";
$password = "Edwardalex012345!";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$boardSize = 500;
$colors = 16;
$timeout = 1 * 60; // in seconds

$request = $_GET["r"];

if ($request == "all-tiles") {

	$logged_in = false;
	$userid = null;

	if (!isset($_POST["is-bot"])) {

		// check if the user is logged in here, and set the userid to the username
		if ($_COOKIE['username'] && $_COOKIE['login'] == 1) {
		    
		    $userid = $_COOKIE['username'];
		    $logged_in = true;
		    
		} else {
		    
		    $logged_in = false;
		    
		}

	} else {

		if (!isset($_POST["username"]) ||
			!isset($_POST["password"])) {

			$response->status = "required-params-not-found";

		} else {

			// check if the username/password combination is correct
			// and set $logged_in to true or false (do not actually log in the user tho)
			// also set $response->status to "username-not-found" or "password-failed"
			
			$usernameDB = "";
			$passwordDB = "";
			
			$query = "SELECT * FROM users WHERE username = ?;";
			$stmt = $db->prepare($query);
			$stmt->bind_param("s", $_POST['username']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			if ($result->num_rows >= 1) {
			    
			    if ($row = $result->fetch_assoc()) {
			        
                    $usernameDB = $row['username'];
                    $passwordDB = $row['password'];
                    
                    if (password_verify($_POST['password'], $passwordDB)) {
                        
                        $userid = $usernameDB;
                        $logged_in = true;
                        
                    } else {
                        
                        $logged_in = false;
                        $response->status = "password-failed";
                        
                    }
			        
			    }
			    
			} else {
			    
			    $logged_in = false;
			    $response->status = "username-not-found";
			    
			}

		}

	} // please also don't forget to delete the line with the comment that tells you to delete it, approx 20 lines below

	if (!$logged_in) {
	    
	    if (!isset($_POST["is-bot"]))
    		    
            $response->status = "user-not-logged-in";
    
    } else {
    
    		$stmt = $conn->prepare("SELECT X,Y,Color FROM place_tiles;");
    		$stmt->execute();
    		$tiles = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    		// save the request time
    		$code = bin2hex(random_bytes(10));
    		$stmt = $conn->prepare("INSERT INTO place_requests (RequestCode, UserId, LastUpdate) VALUES (?, ?, current_timestamp()) ON DUPLICATE KEY UPDATE RequestCode=?,UserId=?,LastUpdate=current_timestamp();");
    		$stmt->bind_param("ssss",
    			$code, $userid, $code, $userid);
    		$stmt->execute();
    
    		$response->tiles = $tiles;
    		$response->request_code = $code;
    		$response->timeout = $timeout;
    		$response->status = "success";
    
    	}
	    
} else if ($request == "send-tile") {

	if (!isset($_POST["tile"]) ||
		!isset($_POST["x"]) ||
		!isset($_POST["y"]) ||
		!isset($_POST["req"])) {

		$response->status = "required-params-not-found";

	} else {

		$tile = $_POST["tile"];
		$posX = $_POST["x"];
		$posY = $_POST["y"];
		$reqCode = $_POST["req"];
		$userid = null;

		// validation
		$errors = false;
		if ($tile < 0 || $tile >= $colors) {
			$response->status = "tile-color-invalid";
			$errors = true;
		}
		if ($posX < 0 || $posX >= $boardSize || $posY < 0 || $posY >= $boardSize) {
			$response->status = "position-out-of-bounds";
			$errors = true;
		}
		if ($reqCode == null) {
			$response->status = "reqcode-not-found";
			$errors = true;
		} else {
			// get the username from the request code
			$stmt = $conn->prepare("SELECT * FROM place_requests WHERE RequestCode=?;");
			$stmt->bind_param("s",
				$reqCode);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 0) {
				$response->status = "reqcode-invalid";
				$errors = true;
			}
			else $userid = $result->fetch_assoc()["UserId"];
		}

		if (!$errors) {

			$timeoutDenied = false;
			$timeoutRemaining = "";

			// check the timestamp
			$stmt = $conn->prepare("SELECT TIME_TO_SEC(TIMEDIFF(current_timestamp(), Timestamp)) AS `Interval` FROM place_timestamps WHERE UserId=?;");
			$stmt->bind_param("s",
				$userid);
			$stmt->execute();
			$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			if (count($result) == 0) {
				$timeoutDenied = false;
			} else {
				$interval = $result[0]["Interval"];
				// check if the cooldown has passed
				if ($interval < $timeout) {
					$timeoutDenied = true;
					$timeoutRemaining = $interval;
				}
				else $timeoutDenied = false;
			}

			if ($timeoutDenied) {

				$response->status = "timeout-denied";
				$response->timeout = $timeout;

			} else {

				$stmt = $conn->prepare("INSERT INTO place_tiles (X, Y, Color, Timestamp) VALUES (?, ?, ?, current_timestamp()) ON DUPLICATE KEY UPDATE Color=?,Timestamp=current_timestamp();");
				$stmt->bind_param("iiii",
					$posX,
					$posY,
					$tile,
					$tile);
				$stmt->execute();

				$stmt = $conn->prepare("INSERT INTO place_timestamps (UserId, Timestamp) VALUES (?, current_timestamp()) ON DUPLICATE KEY UPDATE Timestamp=current_timestamp();");
				$stmt->bind_param("s",
					$userid);
				$stmt->execute();

				$stmt = $conn->prepare("INSERT INTO place_history (X, Y, Color, UserId, Timestamp) VALUES (?, ?, ?, ?, current_timestamp());");
				$stmt->bind_param("iiis",
					$posX,
					$posY,
					$tile,
					$userid);
				$stmt->execute();

				$response->status = "success";

			}

		}

	}

} else if ($request == "new-tiles") {

	if (!isset($_POST["req"])) {

		$response->status = "required-params-not-found";

	} else {

		// get the last update timestamp
		$stmt = $conn->prepare("SELECT LastUpdate FROM place_requests WHERE RequestCode=?;");
		$stmt->bind_param("s",
			$_POST["req"]);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows == 0) {

			$response->status = "reqcode-invalid";

		} else {

			$lastUpdate = $result->fetch_assoc()["LastUpdate"];

			$stmt = $conn->prepare("SELECT X,Y,Color FROM place_tiles WHERE Timestamp >= ?;");
			$stmt->bind_param("s",
				$lastUpdate);
			$stmt->execute();
			$tiles = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

			// reupdate the timestamp
			$stmt = $conn->prepare("UPDATE place_requests SET LastUpdate=current_timestamp() WHERE RequestCode=?;");
			$stmt->bind_param("s",
				$_POST["req"]);
			$stmt->execute();

			$response->tiles = $tiles;
			$response->status = "success";

		}

	}

} else if ($request == "tile") {

	if (!isset($_GET["x"]) ||
		!isset($_GET["x"])) {

		$response->status = "required-params-not-found";

	} else {

		$x = $_GET["x"];
		$y = $_GET["y"];

		$stmt = $conn->prepare("SELECT * FROM place_history WHERE X=? AND Y=? ORDER BY Timestamp DESC");
		$stmt->bind_param("ii",
			$x, $y);
		$stmt->execute();
		$result = $stmt->get_result();

		$response->times_changed = $result->num_rows;
		$response->color = 0;

		$response->history = array();
		$index = 0;
		while ($row = $result->fetch_assoc()) {

			if ($index == 0)
				$response->color = $row["Color"];

			$resp_row = new stdClass();
			$resp_row->set_to = $row["Color"];
			$resp_row->set_by = $row["UserId"];
			$resp_row->set_by_link = "https://www.sickgamez.com/Account/profile?username=" . $row["UserId"];
			$resp_row->set_at = $row["Timestamp"];
			$response->history[] = $resp_row;

		}

	}

} else {

	$response->status = "request-not-found";

}

header('Content-type: application/json');

echo(json_encode($response));

?>