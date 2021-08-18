<?php

	// Update user profile
	if (isset($_POST['updateProfile'])) {

	    $valid = 1;

	    if(empty($_POST['cust_name'])) {
	        $valid = 0;
	        $error_message .= "Name is required"."<br>";
	    }

	    if(empty($_POST['cust_phone'])) {
	        $valid = 0;
	        $error_message .= "Phone is required"."<br>";
	    }

	    if(empty($_POST['cust_address'])) {
	        $valid = 0;
	        $error_message .= "Address is required"."<br>";
	    }

	    if(empty($_POST['cust_country'])) {
	        $valid = 0;
	        $error_message .= "Country is required"."<br>";
	    }

	    if(empty($_POST['cust_city'])) {
	        $valid = 0;
	        $error_message .= "City is required"."<br>";
	    }

	    if(empty($_POST['cust_state'])) {
	        $valid = 0;
	        $error_message .= "State is required"."<br>";
	    }

	    if(empty($_POST['cust_zip'])) {
	        $valid = 0;
	        $error_message .= "Zip code is required"."<br>";
	    }

	    if($valid == 1) {

	        // update data into the database
	        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_name=?, cust_cname=?, cust_phone=?, cust_country=?, cust_address=?, cust_city=?, cust_state=?, cust_zip=? WHERE cust_id=?");
	        $statement->execute(array(
	                    strip_tags($_POST['cust_name']),
	                    strip_tags($_POST['cust_cname']),
	                    strip_tags($_POST['cust_phone']),
	                    strip_tags($_POST['cust_country']),
	                    strip_tags($_POST['cust_address']),
	                    strip_tags($_POST['cust_city']),
	                    strip_tags($_POST['cust_state']),
	                    strip_tags($_POST['cust_zip']),
	                    $_SESSION['customer']['cust_id']
	                ));  
	       
	        $success_message = "Profile Information is updated successfully.";

	        $_SESSION['customer']['cust_name'] = $_POST['cust_name'];
	        $_SESSION['customer']['cust_cname'] = $_POST['cust_cname'];
	        $_SESSION['customer']['cust_phone'] = $_POST['cust_phone'];
	        $_SESSION['customer']['cust_country'] = $_POST['cust_country'];
	        $_SESSION['customer']['cust_address'] = $_POST['cust_address'];
	        $_SESSION['customer']['cust_city'] = $_POST['cust_city'];
	        $_SESSION['customer']['cust_state'] = $_POST['cust_state'];
	        $_SESSION['customer']['cust_zip'] = $_POST['cust_zip'];
	    }
	}

?>