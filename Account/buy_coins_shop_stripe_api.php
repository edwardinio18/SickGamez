<?php

	include("server.php");
	include("stripe-php-master/init.php");

	error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");

	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer-master/src/Exception.php';
    
    require 'PHPMailer-master/src/PHPMailer.php';
    
    require 'PHPMailer-master/src/SMTP.php';

	function replaceFirstOccurance($from, $to, $content) {

		$from = '/' . preg_quote($from, '/') . '/';

		return preg_replace($from, $to, $content, 1);

	}

	$payload = @file_get_contents('php://input');
	$event = null;

	try {

	    $event = \Stripe\Event::constructFrom(json_decode($payload, true));

	} catch(\UnexpectedValueException $e) {

	    http_response_code(400);
	    exit();

	}

	if ($event->type === "payment_intent.succeeded") {

		$coinsBoughtAmountLabel = replaceFirstOccurance(" ", "", $event->data->object->charges->data[0]->description);
		$coinsBoughtAmountStrippedLabel = substr($coinsBoughtAmountLabel, strpos($coinsBoughtAmountLabel, "x") + 1);
		$coinsBoughtAmount = "";
		$coinsBoughtEventId = $event->id;
		$coinsBoughtPrice = $event->data->object->amount;
		$coinsBoughtReceiptURL = $event->data->object->charges->data[0]->receipt_url;
		$coinsBoughtPurchaseId = $event->data->object->id;
		$coinsBoughtDescription = replaceFirstOccurance(" ", "", $event->data->object->charges->data[0]->description);
		$coinsBoughtDescriptionStripped = substr($coinsBoughtAmountLabel, strpos($coinsBoughtAmountLabel, "x") + 1);
		$coinsBoughtEmail = $event->data->object->charges->data[0]->billing_details->email;

		$currentUserCoinAmount = "";

		$query = "SELECT * FROM buyCoins WHERE buyCoinsName = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("s", $coinsBoughtAmountStrippedLabel);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$coinsBoughtAmount = $row['buyCoinsAmount'];

			}

		}

		$query = "INSERT INTO buyCoinsBoughtUsersList (buyCoinsBoughtAmount, buyCoinsBoughtEventId, buyCoinsBoughtPrice, buyCoinsBoughtReceiptURL, buyCoinsBoughtPurchaseId, buyCoinsBoughtDescription, buyCoinsBoughtUserEmail) VALUES (?, ?, ?, ?, ?, ?, ?);";
		$stmt = $db->prepare($query);
		$stmt->bind_param("issssss", $coinsBoughtAmount, $coinsBoughtEventId, $coinsBoughtPrice, $coinsBoughtReceiptURL, $coinsBoughtPurchaseId, $coinsBoughtDescriptionStripped, $coinsBoughtEmail);
		$stmt->execute();

		$query = "SELECT * FROM users WHERE email = ?;";
		$stmt = $db->prepare($query);
		$stmt->bind_param("s", $coinsBoughtEmail);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows >= 1) {

			if ($row = $result->fetch_assoc()) {

				$currentUserCoinAmount = $row['coinAmount'];

			}

		}

		$query = "UPDATE users SET coinAmount = ? WHERE email = ?;";
		$stmt = $db->prepare($query);
		$newTotalCoinAmountAfterPurchase = $currentUserCoinAmount + $coinsBoughtAmount;
		$stmt->bind_param("is", $newTotalCoinAmountAfterPurchase, $coinsBoughtEmail);
		$stmt->execute();

		$to = $coinsBoughtEmail;
        $subject = "Coins bought receipt";
        $message = '<html><body>';
       	$message .= '<h1>Thank you for your purchase!</h1>';
        $message .= '<p>Below you\'ll find a link to your receipt!</p>';
        $message .= '<br />';
        $message .= '<p>';
        $message .= '<a href="' . $coinsBoughtReceiptURL . '">My receipt</a>';
        $message .= '</p>';
        $headers = array("From: sickgamez@sickgamez.com", "X-Mailer: PHP/" . PHP_VERSION);
        $headers = implode("\r\n", $headers);
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "X-Priority: 1\r\n";

        mail($to, $subject, $message, $headers);

	}

	http_response_code(200);

?>