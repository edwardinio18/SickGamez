<?php

	include("server.php");

	$ownedItemDataId = $_GET['ownedItemId'];
	$shopProductsActiveStatus = 1;

	$updateActivateQuery = "UPDATE shopProductsUsersList SET shopProductsActiveStatus = ? WHERE shopProductUsersId = ?;";
	$stmt = $db->prepare($updateActivateQuery);
	$stmt->bind_param("ii", $shopProductsActiveStatus, $ownedItemDataId);
	$stmt->execute();

	echo "<meta http-equiv='refresh' content='0; url=/Account/items' />";

?>