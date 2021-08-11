<?php

	// Check if the customer is logged in or not
	if(!isset($_SESSION['customer'])) {
	    header('location: '.BASE_URL.'logout.php');
	    exit;
	} else {
	    // If customer is logged in, but admin make him inactive, then force logout this user.
	    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
	    $statement->execute(array($_SESSION['customer']['cust_id'],0));
	    $total = $statement->rowCount();
	    if($total) {
	        header('location: '.BASE_URL.'logout.php');
	        exit;
	    }
	}

?>