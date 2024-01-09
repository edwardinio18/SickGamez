<?php

	include("server.php");

	$userCoinAmount = "";
	$shopItemCostPrice = "";
	$shopItemId = $_GET['shopItemDivData'];
	$notEnoughCoinsToBuy = "";
	$myID = "";

	$selectUserCoinsQuery = "SELECT * FROM users WHERE username = ?;";
	$stmt = $db->prepare($selectUserCoinsQuery);
	$username = $_COOKIE['username'];
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$selectUserCoinsQueryResult = $stmt->get_result();

	if ($selectUserCoinsQueryResult->num_rows >= 1) {

		if ($row = $selectUserCoinsQueryResult->fetch_assoc()) {

			$userCoinAmount = $row['coinAmount'];
			$myID = $row['id'];

		}

	}

	$selectShopProductQuery = "SELECT * FROM shopProducts WHERE id = ?;";
	$stmt = $db->prepare($selectShopProductQuery);
	$stmt->bind_param("i", $shopItemId);
	$stmt->execute();
	$selectShopProductQueryResult = $stmt->get_result();

	if ($selectShopProductQueryResult->num_rows >= 1) {

		if ($row = $selectShopProductQueryResult->fetch_assoc()) {

			$shopItemCostPrice = $row['shopProductCostPrice'];

		}

	}

	$totalAfterPotentialBuy = $userCoinAmount - $shopItemCostPrice;

	if ($totalAfterPotentialBuy < 0) {

		$notEnoughCoinsToBuy = '<div id="not_enough_coins_to_buy_modal_container">
				
									<div id="not_enough_coins_to_buy_modal_content">
										
										<span class="close_not_enough_coins_to_buy_modal">&times;</span>

										<p id="not_enough_coins_to_buy_inner_modal_title">Whoops, you don\'t have enough coins to buy this item!</p>

										<div id="not_enough_coins_to_buy_div">
											
											<button class="not_enough_coins_to_buy_ok_button" id="not_enough_coins_to_buy_ok_button" style="cursor: default;">Got it!</button>

										</div>

									</div>

								</div>';

		echo $notEnoughCoinsToBuy;

	} else {

		$updateUserCoinAmountQuery = "UPDATE users SET coinAmount = ? WHERE username = ?;";
		$stmt = $db->prepare($updateUserCoinAmountQuery);
		$stmt->bind_param("is", $totalAfterPotentialBuy, $username);
		$stmt->execute();

		$insertPurchasedItemUserQuery = "INSERT INTO shopProductsUsersList (shopProductsUsersListId, shopProductsUsersListUserId, shopProductsActiveStatus) VALUES (?, ?, ?);";
		$stmt = $db->prepare($insertPurchasedItemUserQuery);
		$shopProductsActiveStatus = 0;
		$stmt->bind_param("iii", $shopItemId, $myID, $shopProductsActiveStatus);
		$stmt->execute();

		echo "<meta http-equiv='refresh' content='0; url=/Account/shop' />";

	}

?>